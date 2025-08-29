<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of orders
     */
    public function index(Request $request)
    {
        $query = Order::with(['user', 'orderItems'])
            ->orderBy('created_at', 'desc');

        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // Filter by order type
        if ($request->has('order_type') && $request->order_type !== '') {
            $query->where('order_type', $request->order_type);
        }

        // Filter by date range
        if ($request->has('date_from') && $request->date_from !== '') {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->has('date_to') && $request->date_to !== '') {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Search by order number or customer name
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('customer_name', 'like', "%{$search}%")
                  ->orWhere('customer_email', 'like', "%{$search}%")
                  ->orWhere('customer_phone', 'like', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%");
            });
        }

        $orders = $query->paginate(20);

        // Calculate statistics
        $stats = $this->getOrderStatistics();

        return view('admin.orders.list', compact('orders', 'stats'));
    }

    /**
     * Display the specified order
     */
    public function show($id)
    {
        $order = Order::with(['user', 'orderItems.menuItem'])->findOrFail($id);
        
        return view('admin.orders.details', compact('order'));
    }

    /**
     * Update order status
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,preparing,ready,on_the_way,delivered,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $oldStatus = $order->status;
        
        $order->update([
            'status' => $request->status
        ]);

        // Update estimated delivery time if status is confirmed
        if ($request->status === 'confirmed' && $oldStatus === 'pending') {
            $estimatedMinutes = $this->calculateEstimatedDeliveryTime($order->order_type);
            $order->setEstimatedDeliveryTime($estimatedMinutes);
        }

        return response()->json([
            'success' => true,
            'message' => 'Order status updated successfully',
            'status' => $order->status,
            'status_label' => $order->status_label,
            'status_badge' => $order->status_badge
        ]);
    }

    /**
     * Update payment status
     */
    public function updatePaymentStatus(Request $request, $id)
    {
        $request->validate([
            'payment_status' => 'required|in:pending,paid,failed,refunded'
        ]);

        $order = Order::findOrFail($id);
        
        $order->update([
            'payment_status' => $request->payment_status
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Payment status updated successfully',
            'payment_status' => $order->payment_status
        ]);
    }

    /**
     * Delete an order
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        
        // Only allow deletion of cancelled orders
        if ($order->status !== 'cancelled') {
            return response()->json([
                'success' => false,
                'message' => 'Only cancelled orders can be deleted'
            ], 400);
        }

        $order->delete();

        return response()->json([
            'success' => true,
            'message' => 'Order deleted successfully'
        ]);
    }

    /**
     * Get order statistics for dashboard
     */
    private function getOrderStatistics()
    {
        $today = Carbon::today();
        $thisMonth = Carbon::now()->startOfMonth();

        return [
            'total_orders' => Order::count(),
            'today_orders' => Order::whereDate('created_at', $today)->count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'confirmed_orders' => Order::where('status', 'confirmed')->count(),
            'preparing_orders' => Order::where('status', 'preparing')->count(),
            'ready_orders' => Order::where('status', 'ready')->count(),
            'on_the_way_orders' => Order::where('status', 'on_the_way')->count(),
            'delivered_orders' => Order::where('status', 'delivered')->count(),
            'cancelled_orders' => Order::where('status', 'cancelled')->count(),
            'total_revenue' => Order::where('status', 'delivered')->sum('total_price'),
            'today_revenue' => Order::where('status', 'delivered')
                ->whereDate('created_at', $today)
                ->sum('total_price'),
            'month_revenue' => Order::where('status', 'delivered')
                ->where('created_at', '>=', $thisMonth)
                ->sum('total_price'),
            'delivery_orders' => Order::where('order_type', 'delivery')->count(),
            'takeaway_orders' => Order::where('order_type', 'takeaway')->count(),
            'dine_in_orders' => Order::where('order_type', 'dine-in')->count(),
        ];
    }

    /**
     * Calculate estimated delivery time based on order type
     */
    private function calculateEstimatedDeliveryTime($orderType)
    {
        switch ($orderType) {
            case 'delivery':
                return 45; // 45 minutes for delivery
            case 'takeaway':
                return 20; // 20 minutes for takeaway
            case 'dine-in':
                return 25; // 25 minutes for dine-in
            default:
                return 30;
        }
    }

    /**
     * Export orders to CSV
     */
    public function export(Request $request)
    {
        $query = Order::with(['user', 'orderItems']);

        // Apply same filters as index
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        if ($request->has('order_type') && $request->order_type !== '') {
            $query->where('order_type', $request->order_type);
        }

        if ($request->has('date_from') && $request->date_from !== '') {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->has('date_to') && $request->date_to !== '') {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $orders = $query->get();

        $filename = 'orders_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($orders) {
            $file = fopen('php://output', 'w');
            
            // CSV headers
            fputcsv($file, [
                'Order ID',
                'Order Number',
                'Customer Name',
                'Customer Email',
                'Customer Phone',
                'Order Type',
                'Status',
                'Payment Method',
                'Payment Status',
                'Subtotal',
                'Tax Amount',
                'Delivery Fee',
                'Total Price',
                'Order Date',
                'Delivery Address',
                'Notes'
            ]);

            // CSV data
            foreach ($orders as $order) {
                fputcsv($file, [
                    $order->id,
                    $order->generateOrderNumber(),
                    $order->customer_name,
                    $order->customer_email,
                    $order->customer_phone,
                    $order->order_type,
                    $order->status,
                    $order->payment_method,
                    $order->payment_status,
                    $order->subtotal,
                    $order->tax_amount,
                    $order->delivery_fee,
                    $order->total_price,
                    $order->created_at->format('Y-m-d H:i:s'),
                    $order->delivery_address,
                    $order->notes
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Get orders data for AJAX requests
     */
    public function getData(Request $request)
    {
        $query = Order::with(['user', 'orderItems']);

        // Apply filters
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $orders = $query->orderBy('created_at', 'desc')->take(10)->get();

        return response()->json([
            'orders' => $orders->map(function($order) {
                return [
                    'id' => $order->id,
                    'order_number' => $order->generateOrderNumber(),
                    'customer_name' => $order->customer_name,
                    'total_price' => $order->formatted_total,
                    'status' => $order->status,
                    'status_label' => $order->status_label,
                    'status_badge' => $order->status_badge,
                    'order_type' => $order->order_type,
                    'created_at' => $order->created_at->format('M d, Y h:i A'),
                    'items_count' => $order->getTotalItemsCount()
                ];
            })
        ]);
    }
}
