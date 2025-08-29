@extends('layouts.admin', ['subtitle' => "Order Details", 'title' => "Order #" . $order->generateOrderNumber()])

@section('css')
<style>
    .status-badge {
        font-weight: 500;
    }
    .order-timeline {
        position: relative;
    }
    .order-timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e5e7eb;
    }
    .timeline-item {
        position: relative;
        padding-left: 40px;
        margin-bottom: 20px;
    }
    .timeline-item::before {
        content: '';
        position: absolute;
        left: 8px;
        top: 8px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #e5e7eb;
        border: 3px solid #fff;
        box-shadow: 0 0 0 2px #e5e7eb;
    }
    .timeline-item.active::before {
        background: #3b82f6;
        box-shadow: 0 0 0 2px #3b82f6;
    }
    .timeline-item.completed::before {
        background: #10b981;
        box-shadow: 0 0 0 2px #10b981;
    }
</style>
@endsection

@section('content')

<div class="grid xl:grid-cols-12 gap-6">
    <div class="xl:col-span-12">
        <!-- Order Header -->
        <div class="border rounded-lg border-default-200 p-6 mb-6">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between">
                <div>
                    <h1 class="text-2xl font-semibold text-default-800 mb-2">Order {{ $order->generateOrderNumber() }}</h1>
                    <div class="flex flex-wrap items-center gap-4 text-sm text-default-600">
                        <span><i data-lucide="calendar" class="h-4 w-4 inline mr-1"></i>{{ $order->created_at->format('M d, Y h:i A') }}</span>
                        <span><i data-lucide="user" class="h-4 w-4 inline mr-1"></i>{{ $order->customer_name }}</span>
                        <span><i data-lucide="phone" class="h-4 w-4 inline mr-1"></i>{{ $order->customer_phone }}</span>
                    </div>
                </div>
                <div class="mt-4 lg:mt-0 flex flex-wrap gap-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $order->status_badge }}">
                        {{ $order->status_label }}
                    </span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                        {{ $order->order_type === 'delivery' ? 'bg-blue-100 text-blue-800' :
                           ($order->order_type === 'takeaway' ? 'bg-orange-100 text-orange-800' : 'bg-purple-100 text-purple-800') }}">
                        {{ ucfirst(str_replace('_', ' ', $order->order_type)) }}
                    </span>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Order Items -->
            <div class="lg:col-span-2">
                <div class="border rounded-lg border-default-200 p-6 mb-6">
                    <h3 class="text-lg font-semibold text-default-800 mb-4">Order Items</h3>

                    <div class="space-y-4">
                        @foreach($order->orderItems as $item)
                        <div class="flex items-center space-x-4 p-4 bg-default-50 rounded-lg">
                            <img src="{{ $item->menuItem->image ? (str_starts_with($item->menuItem->image, 'http') ? $item->menuItem->image : asset($item->menuItem->image)) : '/images/dishes/burger.png' }}"
                                 class="h-16 w-16 rounded-lg object-cover"
                                 alt="{{ $item->item_name }}"
                                 onerror="this.src='/images/dishes/burger.png'">
                            <div class="flex-1">
                                <h4 class="font-medium text-default-800">{{ $item->item_name }}</h4>
                                @if($item->item_size)
                                    <p class="text-sm text-default-500">Size: {{ ucfirst($item->item_size) }}</p>
                                @endif
                                <p class="text-sm text-default-600">{{ $item->formatted_item_price }} each</p>
                            </div>
                            <div class="text-center">
                                <p class="text-sm text-default-500">Qty</p>
                                <p class="font-semibold text-default-800">{{ $item->quantity }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-default-500">Total</p>
                                <p class="font-semibold text-default-800">{{ $item->formatted_total_price }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Order Summary -->
                    <div class="border-t border-default-200 pt-4 mt-6">
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-default-600">Subtotal ({{ $order->getTotalItemsCount() }} items):</span>
                                <span class="font-medium">{{ $order->formatted_subtotal }}</span>
                            </div>
                            @if($order->delivery_fee > 0)
                            <div class="flex justify-between">
                                <span class="text-default-600">Delivery Fee:</span>
                                <span class="font-medium">Rs. {{ number_format($order->delivery_fee, 2) }}</span>
                            </div>
                            @endif
                            @if($order->tax_amount > 0)
                            <div class="flex justify-between">
                                <span class="text-default-600">Tax ({{ $order->tax_rate ?? 5 }}%):</span>
                                <span class="font-medium">Rs. {{ number_format($order->tax_amount, 2) }}</span>
                            </div>
                            @endif
                            @if($order->discount_amount > 0)
                            <div class="flex justify-between">
                                <span class="text-default-600">Discount:</span>
                                <span class="font-medium text-green-600">-Rs. {{ number_format($order->discount_amount, 2) }}</span>
                            </div>
                            @endif
                            <div class="border-t border-default-200 pt-2">
                                <div class="flex justify-between">
                                    <span class="text-lg font-semibold">Total:</span>
                                    <span class="text-lg font-semibold text-primary">{{ $order->formatted_total }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Notes -->
                @if($order->notes)
                <div class="border rounded-lg border-default-200 p-6">
                    <h3 class="text-lg font-semibold text-default-800 mb-4">Order Notes</h3>
                    <p class="text-default-600">{{ $order->notes }}</p>
                </div>
                @endif
            </div>

            <!-- Order Management Sidebar -->
            <div class="lg:col-span-1">
                <!-- Status Management -->
                <div class="border rounded-lg border-default-200 p-6 mb-6">
                    <h3 class="text-lg font-semibold text-default-800 mb-4">Order Status</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-default-700 mb-2">Update Status</label>
                        <select id="orderStatus" class="w-full px-3 py-2 border border-default-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="preparing" {{ $order->status === 'preparing' ? 'selected' : '' }}>Preparing</option>
                            <option value="ready" {{ $order->status === 'ready' ? 'selected' : '' }}>Ready</option>
                            <option value="on_the_way" {{ $order->status === 'on_the_way' ? 'selected' : '' }}>On the Way</option>
                            <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <!-- Order Timeline -->
                    <div class="order-timeline">
                        @php
                            $statuses = [
                                'pending' => 'Order Placed',
                                'confirmed' => 'Order Confirmed',
                                'preparing' => 'Preparing',
                                'ready' => 'Ready for Pickup/Delivery',
                                'on_the_way' => 'On the Way',
                                'delivered' => 'Delivered'
                            ];

                            $statusOrder = ['pending', 'confirmed', 'preparing', 'ready', 'on_the_way', 'delivered'];
                            $currentStatusIndex = array_search($order->status, $statusOrder);
                        @endphp

                        @foreach($statuses as $status => $label)
                            @php
                                $statusIndex = array_search($status, $statusOrder);
                                $isCompleted = $statusIndex < $currentStatusIndex;
                                $isCurrent = $status === $order->status;
                                $class = $isCompleted ? 'completed' : ($isCurrent ? 'active' : '');
                            @endphp

                            <div class="timeline-item {{ $class }}">
                                <div class="text-sm">
                                    <p class="font-medium {{ $isCompleted || $isCurrent ? 'text-primary' : 'text-default-500' }}">{{ $label }}</p>
                                    @if($isCurrent && $order->estimated_delivery_time)
                                        <p class="text-xs text-default-500">
                                            Est: {{ $order->estimated_delivery_time->format('h:i A') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="border rounded-lg border-default-200 p-6 mb-6">
                    <h3 class="text-lg font-semibold text-default-800 mb-4">Customer Information</h3>

                    <div class="space-y-3">
                        <div>
                            <label class="text-sm font-medium text-default-600">Name:</label>
                            <p class="text-default-800">{{ $order->customer_name }}</p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-default-600">Email:</label>
                            <p class="text-default-800">{{ $order->customer_email }}</p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-default-600">Phone:</label>
                            <p class="text-default-800">{{ $order->customer_phone }}</p>
                        </div>

                        @if($order->order_type === 'delivery' && $order->delivery_address)
                        <div>
                            <label class="text-sm font-medium text-default-600">Delivery Address:</label>
                            <p class="text-default-800">
                                {{ $order->delivery_address }}<br>
                                {{ $order->delivery_area }}, {{ $order->delivery_city }}
                            </p>
                        </div>
                        @endif

                        @if($order->order_type === 'dine-in' && $order->table_no)
                        <div>
                            <label class="text-sm font-medium text-default-600">Table Number:</label>
                            <p class="text-default-800">{{ $order->table_no }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Payment Information -->
                <div class="border rounded-lg border-default-200 p-6 mb-6">
                    <h3 class="text-lg font-semibold text-default-800 mb-4">Payment Information</h3>

                    <div class="space-y-3">
                        <div>
                            <label class="text-sm font-medium text-default-600">Payment Method:</label>
                            <p class="text-default-800 capitalize">{{ str_replace('_', ' ', $order->payment_method) }}</p>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-default-600">Payment Status:</label>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-800' :
                                   ($order->payment_status === 'failed' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-default-600">Total Amount:</label>
                            <p class="text-lg font-semibold text-primary">{{ $order->formatted_total }}</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="border rounded-lg border-default-200 p-6">
                    <h3 class="text-lg font-semibold text-default-800 mb-4">Actions</h3>

                    <div class="space-y-3">
                        <a href="{{ route('admin.orders.index') }}" class="w-full inline-flex items-center justify-center px-4 py-2 border border-default-300 rounded-lg text-sm font-medium text-default-700 bg-white hover:bg-default-50 transition-colors">
                            <i data-lucide="arrow-left" class="h-4 w-4 mr-2"></i>Back to Orders
                        </a>

                        @if($order->status === 'cancelled')
                        <button onclick="deleteOrder({{ $order->id }})" class="w-full inline-flex items-center justify-center px-4 py-2 border border-red-300 rounded-lg text-sm font-medium text-red-700 bg-red-50 hover:bg-red-100 transition-colors">
                            <i data-lucide="trash-2" class="h-4 w-4 mr-2"></i>Delete Order
                        </button>
                        @endif

                        <button onclick="printOrder()" class="w-full inline-flex items-center justify-center px-4 py-2 border border-primary bg-primary rounded-lg text-sm font-medium text-white hover:bg-primary-600 transition-colors">
                            <i data-lucide="printer" class="h-4 w-4 mr-2"></i>Print Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const statusSelect = document.getElementById('orderStatus');
    const orderId = {{ $order->id }};

    statusSelect.addEventListener('change', function() {
        const newStatus = this.value;
        const originalStatus = '{{ $order->status }}';

        // Show loading state
        this.disabled = true;

        fetch(`/admin/orders/${orderId}/status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                status: newStatus
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update status badge
                const statusBadge = document.querySelector('.status-badge');
                if (statusBadge) {
                    statusBadge.className = `inline-flex items-center px-3 py-1 rounded-full text-sm font-medium ${data.status_badge}`;
                    statusBadge.textContent = data.status_label;
                }

                // Update timeline
                updateTimeline(newStatus);

                showNotification('Order status updated successfully!', 'success');

                // Reload page after 2 seconds to show updated timeline
                setTimeout(() => {
                    location.reload();
                }, 2000);
            } else {
                // Revert to original status
                this.value = originalStatus;
                showNotification(data.message || 'Failed to update status', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Revert to original status
            this.value = originalStatus;
            showNotification('An error occurred while updating status', 'error');
        })
        .finally(() => {
            this.disabled = false;
        });
    });
});

function updateTimeline(newStatus) {
    const statusOrder = ['pending', 'confirmed', 'preparing', 'ready', 'on_the_way', 'delivered'];
    const currentStatusIndex = statusOrder.indexOf(newStatus);

    const timelineItems = document.querySelectorAll('.timeline-item');

    timelineItems.forEach((item, index) => {
        item.classList.remove('active', 'completed');

        if (index < currentStatusIndex) {
            item.classList.add('completed');
        } else if (index === currentStatusIndex) {
            item.classList.add('active');
        }
    });
}

function deleteOrder(orderId) {
    if (confirm('Are you sure you want to delete this order? This action cannot be undone.')) {
        fetch(`/admin/orders/${orderId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Order deleted successfully!', 'success');
                // Redirect to orders list after 2 seconds
                setTimeout(() => {
                    window.location.href = '{{ route("admin.orders.index") }}';
                }, 2000);
            } else {
                showNotification(data.message || 'Failed to delete order', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('An error occurred while deleting order', 'error');
        });
    }
}

function printOrder() {
    // Create a print-friendly version
    const printContent = `
        <div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px;">
            <div style="text-align: center; border-bottom: 2px solid #333; padding-bottom: 20px; margin-bottom: 20px;">
                <h1>Restaurant Order</h1>
                <h2>Order #{{ $order->generateOrderNumber() }}</h2>
                <p>{{ $order->created_at->format('M d, Y h:i A') }}</p>
            </div>

            <div style="margin-bottom: 20px;">
                <h3>Customer Information</h3>
                <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
                <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                @if($order->order_type === 'delivery' && $order->delivery_address)
                <p><strong>Delivery Address:</strong> {{ $order->delivery_address }}, {{ $order->delivery_area }}, {{ $order->delivery_city }}</p>
                @endif
                @if($order->order_type === 'dine-in' && $order->table_no)
                <p><strong>Table Number:</strong> {{ $order->table_no }}</p>
                @endif
            </div>

            <div style="margin-bottom: 20px;">
                <h3>Order Items</h3>
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 1px solid #ddd;">
                            <th style="text-align: left; padding: 10px;">Item</th>
                            <th style="text-align: center; padding: 10px;">Qty</th>
                            <th style="text-align: right; padding: 10px;">Price</th>
                            <th style="text-align: right; padding: 10px;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 10px;">
                                {{ $item->item_name }}
                                @if($item->item_size)<br><small>Size: {{ ucfirst($item->item_size) }}</small>@endif
                            </td>
                            <td style="text-align: center; padding: 10px;">{{ $item->quantity }}</td>
                            <td style="text-align: right; padding: 10px;">{{ $item->formatted_item_price }}</td>
                            <td style="text-align: right; padding: 10px;">{{ $item->formatted_total_price }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="text-align: right; margin-top: 20px;">
                <p><strong>Subtotal: {{ $order->formatted_subtotal }}</strong></p>
                @if($order->delivery_fee > 0)
                <p><strong>Delivery Fee: Rs. {{ number_format($order->delivery_fee, 2) }}</strong></p>
                @endif
                @if($order->tax_amount > 0)
                <p><strong>Tax: Rs. {{ number_format($order->tax_amount, 2) }}</strong></p>
                @endif
                <p style="font-size: 18px; border-top: 2px solid #333; padding-top: 10px;"><strong>Total: {{ $order->formatted_total }}</strong></p>
            </div>

            @if($order->notes)
            <div style="margin-top: 20px;">
                <h3>Order Notes</h3>
                <p>{{ $order->notes }}</p>
            </div>
            @endif
        </div>
    `;

    const printWindow = window.open('', '_blank');
    printWindow.document.write(printContent);
    printWindow.document.close();
    printWindow.print();
}

function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white transition-all duration-300 transform translate-x-full ${
        type === 'success' ? 'bg-green-600' :
        type === 'error' ? 'bg-red-600' :
        'bg-blue-600'
    }`;
    notification.textContent = message;

    document.body.appendChild(notification);

    // Animate in
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);

    // Remove after 3 seconds
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}
</script>
@endsection
