@extends('layouts.admin', ['subtitle' => "Orders", 'title' => "Orders List"])

@section('css')
<style>
    .status-select {
        border: none;
        background: transparent;
        font-weight: 500;
    }
    .status-select:focus {
        outline: none;
        box-shadow: none;
    }
</style>
@endsection

@section('content')

<div class="grid xl:grid-cols-12 gap-6">
    <div class="xl:col-span-12">
        <div class="space-y-6">
            <!-- Statistics Cards -->
            <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-6">
                <div class="border rounded-lg p-6 overflow-hidden border-default-200">
                    <div class="flex items-center gap-4">
                        <div class="inline-flex items-center justify-center rounded-full bg-primary/20 text-primary h-16 w-16">
                            <i data-lucide="shopping-bag" class="h-8 w-8"></i>
                        </div>
                        <div class="">
                            <p class="text-base text-default-500 font-medium mb-1">Total Orders</p>
                            <h4 class="text-2xl text-default-950 font-semibold mb-2">{{ $stats['total_orders'] ?? 0 }}</h4>
                        </div>
                    </div>
                </div>

                <div class="border rounded-lg p-6 overflow-hidden border-default-200">
                    <div class="flex items-center gap-4">
                        <div class="inline-flex items-center justify-center rounded-full bg-yellow-500/20 text-yellow-500 h-16 w-16">
                            <i data-lucide="clock" class="h-8 w-8"></i>
                        </div>
                        <div>
                            <p class="text-base text-default-500 font-medium mb-1">Pending Orders</p>
                            <h4 class="text-2xl text-default-950 font-semibold mb-2">{{ $stats['pending_orders'] ?? 0 }}</h4>
                        </div>
                    </div>
                </div>

                <div class="border rounded-lg p-6 overflow-hidden border-default-200">
                    <div class="flex items-center gap-4">
                        <div class="inline-flex items-center justify-center rounded-full bg-green-500/20 text-green-500 h-16 w-16">
                            <i data-lucide="check-circle" class="h-8 w-8"></i>
                        </div>
                        <div class="">
                            <p class="text-base text-default-500 font-medium mb-1">Delivered Orders</p>
                            <h4 class="text-2xl text-default-950 font-semibold mb-2">{{ $stats['delivered_orders'] ?? 0 }}</h4>
                        </div>
                    </div>
                </div>

                <div class="border rounded-lg p-6 overflow-hidden border-default-200">
                    <div class="flex items-center gap-4">
                        <div class="inline-flex items-center justify-center rounded-full bg-blue-500/20 text-blue-500 h-16 w-16">
                            <i data-lucide="dollar-sign" class="h-8 w-8"></i>
                        </div>
                        <div class="">
                            <p class="text-base text-default-500 font-medium mb-1">Total Revenue</p>
                            <h4 class="text-2xl text-default-950 font-semibold mb-2">Rs. {{ number_format($stats['total_revenue'] ?? 0, 2) }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters and Search -->
            <div class="border rounded-lg border-default-200 p-6 mb-6">
                <form method="GET" action="{{ route('admin.orders.index') }}" class="space-y-4">
                    <div class="grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-2 gap-4">
                        <!-- Search -->
                        <div>
                            <label class="block text-sm font-medium text-default-700 mb-2">Search</label>
                            <input type="text" name="search" value="{{ request('search') }}"
                                   placeholder="Order ID, Customer name, phone..."
                                   class="w-full px-3 py-2 border border-default-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>

                        <!-- Status Filter -->
                        <div>
                            <label class="block text-sm font-medium text-default-700 mb-2">Status</label>
                            <select name="status" class="w-full px-3 py-2 border border-default-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option value="">All Statuses</option>
                                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ request('status') === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="preparing" {{ request('status') === 'preparing' ? 'selected' : '' }}>Preparing</option>
                                <option value="ready" {{ request('status') === 'ready' ? 'selected' : '' }}>Ready</option>
                                <option value="on_the_way" {{ request('status') === 'on_the_way' ? 'selected' : '' }}>On the Way</option>
                                <option value="delivered" {{ request('status') === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>

                        <!-- Order Type Filter -->
                        <div>
                            <label class="block text-sm font-medium text-default-700 mb-2">Order Type</label>
                            <select name="order_type" class="w-full px-3 py-2 border border-default-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option value="">All Types</option>
                                <option value="delivery" {{ request('order_type') === 'delivery' ? 'selected' : '' }}>Delivery</option>
                                <option value="takeaway" {{ request('order_type') === 'takeaway' ? 'selected' : '' }}>Takeaway</option>
                                <option value="dine-in" {{ request('order_type') === 'dine-in' ? 'selected' : '' }}>Dine-in</option>
                            </select>
                        </div>

                        <!-- Date From -->
                        <div>
                            <label class="block text-sm font-medium text-default-700 mb-2">Date From</label>
                            <input type="date" name="date_from" value="{{ request('date_from') }}"
                                   class="w-full px-3 py-2 border border-default-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>

                        <!-- Date To -->
                        <div>
                            <label class="block text-sm font-medium text-default-700 mb-2">Date To</label>
                            <input type="date" name="date_to" value="{{ request('date_to') }}"
                                   class="w-full px-3 py-2 border border-default-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-600 transition-colors">
                            <i data-lucide="search" class="h-4 w-4 inline mr-2"></i>Filter
                        </button>
                        <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 bg-default-100 text-default-700 rounded-lg hover:bg-default-200 transition-colors">
                            <i data-lucide="x" class="h-4 w-4 inline mr-2"></i>Clear
                        </a>
                        <a href="{{ route('admin.orders.export', request()->query()) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                            <i data-lucide="download" class="h-4 w-4 inline mr-2"></i>Export CSV
                        </a>
                    </div>
                </form>
            </div>

            <!-- Orders Table -->
            <div class="border rounded-lg border-default-200">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl text-default-800 font-semibold">Orders Management</h2>
                        <div class="text-sm text-default-600">
                            Showing {{ $orders->firstItem() ?? 0 }} to {{ $orders->lastItem() ?? 0 }} of {{ $orders->total() }} orders
                        </div>
                    </div>

                    <div class="relative overflow-x-auto">
                        <table class="min-w-full divide-y divide-default-200">
                            <thead class="bg-default-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-default-800">Order ID</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-default-800">Customer</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-default-800">Type</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-default-800">Amount</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-default-800">Status</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-default-800">Date</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-default-800">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-default-200">
                                @forelse($orders as $order)
                                <tr>
                                    <td class="px-6 py-4 text-sm font-medium text-default-800">
                                        {{ $order->generateOrderNumber() }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-default-600">
                                        <div>
                                            <div class="font-medium">{{ $order->customer_name }}</div>
                                            <div class="text-xs text-default-500">{{ $order->customer_phone }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full
                                            {{ $order->order_type === 'delivery' ? 'bg-blue-100 text-blue-800' :
                                               ($order->order_type === 'takeaway' ? 'bg-orange-100 text-orange-800' : 'bg-purple-100 text-purple-800') }}">
                                            {{ ucfirst(str_replace('_', ' ', $order->order_type)) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium">{{ $order->formatted_total }}</td>
                                    <td class="px-6 py-4">
                                        <select class="status-select text-xs rounded-full px-3 py-1 border-0 {{ $order->status_badge }}"
                                                data-order-id="{{ $order->id }}">
                                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="preparing" {{ $order->status === 'preparing' ? 'selected' : '' }}>Preparing</option>
                                            <option value="ready" {{ $order->status === 'ready' ? 'selected' : '' }}>Ready</option>
                                            <option value="on_the_way" {{ $order->status === 'on_the_way' ? 'selected' : '' }}>On the Way</option>
                                            <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-default-500">
                                        {{ $order->created_at->format('M d, Y h:i A') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('admin.orders.show', $order->id) }}"
                                           class="text-blue-600 hover:text-blue-800">
                                            <i data-lucide="eye" class="h-4 w-4"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center text-default-500">
                                        <div class="flex flex-col items-center">
                                            <i data-lucide="shopping-bag" class="h-12 w-12 text-default-300 mb-4"></i>
                                            <p class="text-lg font-medium">No orders found</p>
                                            <p class="text-sm">Orders will appear here when customers place them.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($orders->hasPages())
                    <div class="mt-6">
                        {{ $orders->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle status updates
    const statusSelects = document.querySelectorAll('.status-select');

    statusSelects.forEach(select => {
        select.addEventListener('change', function() {
            const orderId = this.dataset.orderId;
            const newStatus = this.value;
            const originalStatus = this.dataset.originalStatus || this.value;

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
                    // Update the select styling
                    this.className = `status-select text-xs rounded-full px-3 py-1 border-0 ${data.status_badge}`;
                    this.dataset.originalStatus = newStatus;

                    // Show success message
                    showNotification('Order status updated successfully!', 'success');
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

    // Auto-refresh orders every 30 seconds
    setInterval(function() {
        // Only refresh if no filters are applied to avoid disrupting user's view
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.toString() === '') {
            location.reload();
        }
    }, 30000);
});

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

// Delete order function
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
                // Remove the row from table
                document.querySelector(`tr[data-order-id="${orderId}"]`).remove();
                showNotification('Order deleted successfully!', 'success');
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
</script>
@endsection
