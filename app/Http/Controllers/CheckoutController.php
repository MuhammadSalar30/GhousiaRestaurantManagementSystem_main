<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\MenuSection;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get menu sections with items for the navbar
     */
    private function getMenuSections()
    {
        return MenuSection::with(['items' => function($query) {
            $query->select('id', 'name', 'menu_section_id');
        }])->orderBy('name')->get();
    }

    /**
     * Show the checkout page
     */
    public function index()
    {
        // Debug: Check authentication
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access checkout.');
        }

        $user = Auth::user();
        $cartItems = $user->cart()->with('menuItem')->get();

        // Debug: Log cart information
        \Log::info('Checkout Debug', [
            'user_id' => $user->id,
            'cart_items_count' => $cartItems->count(),
            'cart_items' => $cartItems->toArray()
        ]);

        if ($cartItems->count() === 0) {
            return redirect()->route('client.cart')->with('error', 'Your cart is empty. Please add items before checkout.');
        }

        // Calculate totals
        $subtotal = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });

        // Calculate delivery fee based on order type (will be updated via AJAX)
        $deliveryFee = 0; // Default for pickup/dine-in

        // Calculate tax (assuming 5% tax rate)
        $taxRate = 5;
        $taxAmount = ($subtotal + $deliveryFee) * ($taxRate / 100);

        // Calculate discount (if any)
        $discountAmount = 0;

        // Calculate total
        $total = $subtotal + $deliveryFee + $taxAmount - $discountAmount;

        // Get menu sections for navbar
        $menuSections = $this->getMenuSections();

        return view('client.checkout', compact(
            'cartItems',
            'subtotal',
            'deliveryFee',
            'taxRate',
            'taxAmount',
            'discountAmount',
            'total',
            'menuSections'
        ));
    }

    /**
     * Process the checkout and create order
     */
    public function process(Request $request)
    {
        \Log::info('Checkout process started', ['request_data' => $request->all()]);

        // Create a test order if no data is provided (for testing)
        if (!$request->has('customer_name')) {
            \Log::info('Creating test order');
            $order = Order::create([
                'customer_name' => 'Test User',
                'customer_email' => 'test@example.com',
                'customer_phone' => '+923451234567',
                'order_type' => 'delivery',
                'delivery_address' => 'Test Address, Karachi',
                'delivery_area' => 'Gulshan',
                'payment_method' => 'cash_on_delivery',
                'subtotal' => 500.00,
                'tax_amount' => 0.00,
                'delivery_fee' => 100.00,
                'discount_amount' => 0.00,
                'total_price' => 600.00,
                'status' => 'confirmed',
                'notes' => 'Test order',
            ]);

            \Log::info('Test order created', ['order_id' => $order->id, 'order_number' => $order->generateOrderNumber()]);
            return redirect()->route('order.confirmation', $order->id)
                ->with('success', 'Test order created! Order ID: ' . $order->generateOrderNumber());
        }

        // Validate the request
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'order_type' => 'required|in:delivery,takeaway,dine-in',
            'delivery_address' => 'required_if:order_type,delivery|nullable|string',
            'delivery_area' => 'required_if:order_type,delivery|nullable|string',
            'table_no' => 'required_if:order_type,dine-in|nullable|string|max:10',
            'payment_method' => 'required|in:cash_on_delivery,online_payment',
            // Card details will be collected on the payment page if online payment is selected
            'notes' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            \Log::error('Checkout validation failed', ['errors' => $validator->errors()]);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Get cart items
        $cartItems = Auth::user()->cart()->with('menuItem')->get();
        \Log::info('Cart items count', ['count' => $cartItems->count(), 'user_id' => Auth::id()]);

        if ($cartItems->count() === 0) {
            \Log::error('Cart is empty during checkout');
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        try {
            DB::beginTransaction();

            // Calculate totals
            $subtotal = $cartItems->sum(function($item) {
                return $item->price * $item->quantity;
            });

            // Calculate delivery fee
            $deliveryFee = $this->calculateDeliveryFee($request->order_type, $request->delivery_area);

            // Calculate tax (5% tax rate)
            $taxRate = 5;
            $taxAmount = ($subtotal + $deliveryFee) * ($taxRate / 100);

            // Calculate discount (if any)
            $discountAmount = 0;

            // Calculate total
            $totalPrice = $subtotal + $deliveryFee + $taxAmount - $discountAmount;

            // Map UI payment option to DB enum
            $dbPaymentMethod = $request->payment_method === 'online_payment' ? 'card' : $request->payment_method;

            // Create the order
            $order = Order::create([
                'user_id' => Auth::id(),
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'order_type' => $request->order_type,
                'table_no' => $request->table_no,
                'delivery_address' => $request->delivery_address,
                'delivery_area' => $request->delivery_area,
                'delivery_city' => 'Karachi',
                'payment_method' => $dbPaymentMethod,
                'payment_status' => 'pending',
                'subtotal' => $subtotal,
                'tax_amount' => $taxAmount,
                'delivery_fee' => $deliveryFee,
                'discount_amount' => $discountAmount,
                'total_price' => $totalPrice,
                'status' => ($request->payment_method === 'cash_on_delivery') ? 'confirmed' : 'pending',
                'notes' => $request->notes,
            ]);

            // Set estimated delivery time
            $estimatedMinutes = $this->calculateEstimatedDeliveryTime($request->order_type);
            $order->setEstimatedDeliveryTime($estimatedMinutes);

            // Create order items
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_item_id' => $cartItem->menu_item_id,
                    'item_name' => $cartItem->menuItem->name,
                    'item_description' => $cartItem->menuItem->description,
                    'item_size' => $cartItem->size,
                    'item_price' => $cartItem->price,
                    'quantity' => $cartItem->quantity,
                    'total_price' => $cartItem->price * $cartItem->quantity,
                ]);
            }

            // Clear the cart
            Auth::user()->cart()->delete();

            DB::commit();

            // Redirect based on payment method
            if ($request->payment_method === 'online_payment') {
                // Send user to payment page (simulated UI)
                return redirect()->route('checkout.payment', $order->id)
                    ->with('success', 'Order created. Please complete your online payment.');
            }

            // COD flow: go straight to confirmation page
            \Log::info('Order created successfully', ['order_id' => $order->id, 'order_number' => $order->generateOrderNumber()]);
            return redirect()->route('order.confirmation', $order->id)
                ->with('success', 'Order placed successfully! Order ID: ' . $order->generateOrderNumber());

        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()
                ->with('error', 'Something went wrong while processing your order. Please try again.')
                ->withInput();
        }
    }

    /**
     * Calculate delivery fee based on order type and area
     */
    private function calculateDeliveryFee($orderType, $deliveryArea = null)
    {
        if ($orderType !== 'delivery') {
            return 0;
        }

        // Define delivery fees for different areas in Karachi
        $deliveryFees = [
            'Gulshan-e-Iqbal' => 150,
            'North Nazimabad' => 150,
            'Clifton' => 200,
            'Defence (DHA)' => 200,
            'Korangi' => 120,
            'Malir' => 120,
            'Saddar' => 180,
            'Tariq Road' => 150,
            'Bahadurabad' => 150,
            'Nazimabad' => 150,
            'Federal B Area' => 130,
            'Gulberg' => 160,
            'Johar Town' => 140,
            'Shah Faisal' => 130,
            'Landhi' => 120,
            'Orangi Town' => 100,
            'Baldia Town' => 100,
            'SITE' => 120,
            'New Karachi' => 130,
            'Surjani Town' => 140,
        ];

        return $deliveryFees[$deliveryArea] ?? 150; // Default delivery fee
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
     * Show order confirmation page
     */
    public function confirmation($orderId)
    {
        $order = Order::with('orderItems.menuItem')->where('id', $orderId)->where('user_id', Auth::id())->firstOrFail();

        // Get menu sections for navbar
        $menuSections = $this->getMenuSections();

        return view('client.order-confirmation', compact('order', 'menuSections'));
    }

    /**
     * Show mock payment page for Online Payment
     */
    public function payment($orderId)
    {
        $order = Order::with('orderItems.menuItem')->where('id', $orderId)->where('user_id', Auth::id())->firstOrFail();
        if ($order->payment_method !== 'online_payment') {
            return redirect()->route('order.confirmation', $orderId);
        }
        $menuSections = $this->getMenuSections();
        return view('client.payment', compact('order', 'menuSections'));
    }

    /**
     * Complete online payment (simulate gateway success)
     */
    public function completePayment(Request $request, $orderId)
    {
        $order = Order::where('id', $orderId)->where('user_id', Auth::id())->firstOrFail();
        if ($order->payment_method !== 'online_payment') {
            return redirect()->route('order.confirmation', $orderId);
        }
        $order->update(['payment_status' => 'paid', 'status' => 'confirmed']);
        return redirect()->route('order.confirmation', $orderId)->with('success', 'Payment successful. Your order has been placed!');
    }

    /**
     * Cancel online payment (simulate gateway cancel)
     */
    public function cancelPayment($orderId)
    {
        $order = Order::where('id', $orderId)->where('user_id', Auth::id())->firstOrFail();
        if ($order->payment_method !== 'online_payment') {
            return redirect()->route('order.confirmation', $orderId);
        }
        // Keep payment_status pending and allow retry
        return redirect()->route('checkout.payment', $orderId)->with('error', 'Payment was cancelled. You can try again.');
    }

    /**
     * AJAX endpoint to calculate delivery fee
     */
    public function calculateDeliveryFeeAjax(Request $request)
    {
        $orderType = $request->order_type;
        $deliveryArea = $request->delivery_area;

        $deliveryFee = $this->calculateDeliveryFee($orderType, $deliveryArea);

        return response()->json([
            'delivery_fee' => $deliveryFee,
            'formatted_delivery_fee' => 'Rs. ' . number_format($deliveryFee, 2)
        ]);
    }

    /**
     * Track a specific order
     */
    public function trackOrder($orderId)
    {
        $order = Order::with('orderItems.menuItem')->where('id', $orderId)->where('user_id', Auth::id())->firstOrFail();

        // Get menu sections for navbar
        $menuSections = $this->getMenuSections();

        return view('client.order-tracking', compact('order', 'menuSections'));
    }

    /**
     * Show order history for the authenticated user
     */
    public function orderHistory()
    {
        $orders = Order::with('orderItems.menuItem')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Get menu sections for navbar
        $menuSections = $this->getMenuSections();

        return view('client.order-history', compact('orders', 'menuSections'));
    }
}
