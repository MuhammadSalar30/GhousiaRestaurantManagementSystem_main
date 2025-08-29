@extends('layouts.default', ['title' => 'Order Confirmation'])

@section('content')

@include('layouts.shared/page-title', ['title' => 'Order Confirmation'] )

<section class="lg:py-10 py-6">
    <div class="container">
        <div class="max-w-5xl mx-auto">
            <!-- Order Header -->
            <div class="border border-default-200 rounded-lg p-6 mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="text-default-700 text-sm">Your Order is
                        <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/10 text-green-600">Received</span>
                    </div>
                    <div class="text-default-700 text-sm">Order No:
                        <span class="font-semibold">{{ $order->generateOrderNumber() }}</span>
                    </div>
                </div>
                <p class="mt-3 text-default-500 text-sm">
                    Your order has been received, we might call you for confirmation or address details if required.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Order Details -->
                <div class="border border-default-200 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-default-800 mb-6">Order Details</h4>

                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span class="text-default-600">Order Number:</span>
                            <span class="font-medium text-default-800">{{ $order->generateOrderNumber() }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-default-600">Order Date:</span>
                            <span class="font-medium text-default-800">{{ $order->created_at->format('M d, Y h:i A') }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-default-600">Order Type:</span>
                            <span class="font-medium text-default-800 capitalize">{{ str_replace('_', ' ', $order->order_type) }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-default-600">Status:</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/10 text-green-600">
                                Received
                            </span>
                        </div>

                        @if($order->estimated_delivery_time)
                        <div class="flex justify-between">
                            <span class="text-default-600">Estimated {{ $order->order_type === 'delivery' ? 'Delivery' : 'Ready' }} Time:</span>
                            <span class="font-medium text-default-800">{{ $order->estimated_delivery_time->format('h:i A') }}</span>
                        </div>
                        @endif

                        <div class="flex justify-between">
                            <span class="text-default-600">Payment Method:</span>
                            <span class="font-medium text-default-800 capitalize">{{ str_replace('_', ' ', $order->payment_method) }}</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-default-600">Payment Type:</span>
                            <div class="flex items-center gap-2">
                                <span class="font-medium text-default-800 capitalize">
                                    {{ $order->payment_method === 'cash_on_delivery' ? 'Cash' : ucfirst(str_replace('_', ' ', $order->payment_method)) }}
                                </span>
                                <button onclick="window.print()" class="inline-flex items-center px-3 py-1 bg-orange-500 text-white text-xs rounded-md hover:bg-orange-600 transition-colors">
                                    <i data-lucide="printer" class="h-3 w-3 mr-1"></i>
                                    Print
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Information -->
                <div class="border border-default-200 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-default-800 mb-6">Customer Information</h4>

                    <div class="space-y-4">
                        <div>
                            <span class="text-default-600 block">Name:</span>
                            <span class="font-medium text-default-800">{{ $order->customer_name }}</span>
                        </div>

                        <div>
                            <span class="text-default-600 block">Email:</span>
                            <span class="font-medium text-default-800">{{ $order->customer_email }}</span>
                        </div>

                        <div>
                            <span class="text-default-600 block">Phone:</span>
                            <span class="font-medium text-default-800">{{ $order->customer_phone }}</span>
                        </div>

                        @if($order->order_type === 'delivery' && $order->delivery_address)
                        <div>
                            <span class="text-default-600 block">Delivery Address:</span>
                            <span class="font-medium text-default-800">
                                {{ $order->delivery_address }}<br>
                                {{ $order->delivery_area }}, {{ $order->delivery_city }}
                            </span>
                        </div>
                        @endif

                        @if($order->order_type === 'dine-in' && $order->table_no)
                        <div>
                            <span class="text-default-600 block">Table Number:</span>
                            <span class="font-medium text-default-800">{{ $order->table_no }}</span>
                        </div>
                        @endif

                        @if($order->notes)
                        <div>
                            <span class="text-default-600 block">Order Notes:</span>
                            <span class="font-medium text-default-800">{{ $order->notes }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="border border-default-200 rounded-lg p-6 mt-8">
                <h4 class="text-lg font-semibold text-default-800 mb-6">Order Items</h4>

                <div class="space-y-4">
                    @foreach($order->orderItems as $item)
                    <div class="flex items-center justify-between py-4 border-b border-default-100 last:border-b-0">
                        <div class="flex items-center space-x-4">
                            <img src="{{ $item->menuItem->image ? (str_starts_with($item->menuItem->image, 'http') ? $item->menuItem->image : asset($item->menuItem->image)) : '/images/dishes/burger.png' }}"
                                 class="h-16 w-16 rounded-lg object-cover"
                                 alt="{{ $item->item_name }}"
                                 onerror="this.src='/images/dishes/burger.png'">
                            <div>
                                <h5 class="font-medium text-default-800">{{ $item->item_name }}</h5>
                                @if($item->item_size)
                                    <p class="text-sm text-default-500">Size: {{ ucfirst($item->item_size) }}</p>
                                @endif
                                <p class="text-sm text-default-600">{{ $item->formatted_item_price }} x {{ $item->quantity }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="font-semibold text-default-800">{{ $item->formatted_total_price }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Order Summary -->
                <div class="border-t border-default-200 pt-6 mt-6">
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-default-600">Subtotal:</span>
                            <span class="font-medium text-default-800">{{ $order->formatted_subtotal }}</span>
                        </div>

                        @if($order->delivery_fee > 0)
                        <div class="flex justify-between">
                            <span class="text-default-600">Delivery Fee:</span>
                            <span class="font-medium text-default-800">Rs. {{ number_format($order->delivery_fee, 2) }}</span>
                        </div>
                        @endif

                        @if($order->tax_amount > 0)
                        <div class="flex justify-between">
                            <span class="text-default-600">Tax:</span>
                            <span class="font-medium text-default-800">Rs. {{ number_format($order->tax_amount, 2) }}</span>
                        </div>
                        @endif

                        @if($order->discount_amount > 0)
                        <div class="flex justify-between">
                            <span class="text-default-600">Discount:</span>
                            <span class="font-medium text-green-600">-Rs. {{ number_format($order->discount_amount, 2) }}</span>
                        </div>
                        @endif

                        <div class="border-t border-default-200 pt-3">
                            <div class="flex justify-between">
                                <span class="text-lg font-semibold text-default-800">Total:</span>
                                <span class="text-lg font-semibold text-default-800">{{ $order->formatted_total }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border border-default-200 rounded-lg p-6 mt-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex-1"></div>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center justify-center px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                            Place another order
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
