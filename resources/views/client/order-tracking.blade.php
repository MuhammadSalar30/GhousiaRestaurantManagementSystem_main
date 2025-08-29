@extends('layouts.default', ['title' => 'Track Order'])

@section('content')

@include('layouts.shared/page-title', ['title' => 'Track Order'] )

<section class="lg:py-10 py-6">
    <div class="container">
        <div class="max-w-4xl mx-auto">
            <!-- Order Header -->
            <div class="bg-white border border-default-200 rounded-lg p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-semibold text-default-800 mb-2">Order {{ $order->generateOrderNumber() }}</h2>
                        <p class="text-default-600">Placed on {{ $order->created_at->format('M d, Y h:i A') }}</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $order->status_badge }}">
                            {{ $order->status_label }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Order Status Timeline -->
            <div class="bg-white border border-default-200 rounded-lg p-6 mb-8">
                <h3 class="text-lg font-semibold text-default-800 mb-6">Order Status</h3>
                
                <div class="relative">
                    <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-default-200"></div>
                    
                    @php
                        $statuses = [
                            'pending' => 'Order Placed',
                            'confirmed' => 'Order Confirmed',
                            'preparing' => 'Preparing Your Order',
                            'ready' => 'Order Ready',
                            'on_the_way' => 'On the Way',
                            'delivered' => 'Delivered'
                        ];
                        
                        $statusOrder = ['pending', 'confirmed', 'preparing', 'ready', 'on_the_way', 'delivered'];
                        $currentStatusIndex = array_search($order->status, $statusOrder);
                    @endphp
                    
                    @foreach($statuses as $status => $label)
                        @php
                            $statusIndex = array_search($status, $statusOrder);
                            $isCompleted = $statusIndex <= $currentStatusIndex;
                            $isCurrent = $status === $order->status;
                        @endphp
                        
                        <div class="relative flex items-center mb-8 last:mb-0">
                            <div class="flex-shrink-0 w-8 h-8 rounded-full border-2 flex items-center justify-center
                                {{ $isCompleted ? 'bg-primary border-primary' : 'bg-white border-default-300' }}">
                                @if($isCompleted)
                                    <i data-lucide="check" class="h-4 w-4 text-white"></i>
                                @endif
                            </div>
                            <div class="ml-4">
                                <p class="font-medium {{ $isCompleted ? 'text-primary' : 'text-default-500' }}">{{ $label }}</p>
                                @if($isCurrent && $order->estimated_delivery_time)
                                    <p class="text-sm text-default-500">
                                        Estimated time: {{ $order->estimated_delivery_time->format('h:i A') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Order Details -->
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Order Items -->
                <div class="bg-white border border-default-200 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-default-800 mb-6">Order Items</h3>
                    
                    <div class="space-y-4">
                        @foreach($order->orderItems as $item)
                        <div class="flex items-center space-x-4">
                            <img src="{{ $item->menuItem->image ? (str_starts_with($item->menuItem->image, 'http') ? $item->menuItem->image : asset($item->menuItem->image)) : '/images/dishes/burger.png' }}" 
                                 class="h-12 w-12 rounded-lg object-cover"
                                 alt="{{ $item->item_name }}"
                                 onerror="this.src='/images/dishes/burger.png'">
                            <div class="flex-1">
                                <h4 class="font-medium text-default-800">{{ $item->item_name }}</h4>
                                @if($item->item_size)
                                    <p class="text-sm text-default-500">Size: {{ ucfirst($item->item_size) }}</p>
                                @endif
                                <p class="text-sm text-default-600">{{ $item->quantity }} x {{ $item->formatted_item_price }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-default-800">{{ $item->formatted_total_price }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Order Summary -->
                    <div class="border-t border-default-200 pt-4 mt-6">
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-default-600">Subtotal:</span>
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
                                <span class="text-default-600">Tax:</span>
                                <span class="font-medium">Rs. {{ number_format($order->tax_amount, 2) }}</span>
                            </div>
                            @endif
                            <div class="border-t border-default-200 pt-2">
                                <div class="flex justify-between">
                                    <span class="text-lg font-semibold">Total:</span>
                                    <span class="text-lg font-semibold">{{ $order->formatted_total }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delivery Information -->
                <div class="bg-white border border-default-200 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-default-800 mb-6">Order Information</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-medium text-default-600">Customer Name:</label>
                            <p class="text-default-800">{{ $order->customer_name }}</p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-default-600">Phone Number:</label>
                            <p class="text-default-800">{{ $order->customer_phone }}</p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-default-600">Order Type:</label>
                            <p class="text-default-800 capitalize">{{ str_replace('_', ' ', $order->order_type) }}</p>
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
                        
                        <div>
                            <label class="text-sm font-medium text-default-600">Payment Method:</label>
                            <p class="text-default-800 capitalize">{{ str_replace('_', ' ', $order->payment_method) }}</p>
                        </div>
                        
                        @if($order->notes)
                        <div>
                            <label class="text-sm font-medium text-default-600">Order Notes:</label>
                            <p class="text-default-800">{{ $order->notes }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 mt-8">
                <a href="{{ route('second', ['client', 'home']) }}" class="inline-flex items-center justify-center px-6 py-3 border border-default-300 rounded-full text-sm font-medium text-default-700 bg-white hover:bg-default-50 transition-colors">
                    Continue Shopping
                </a>
                <a href="{{ route('orders.history') }}" class="inline-flex items-center justify-center px-6 py-3 border border-primary bg-primary rounded-full text-sm font-medium text-white hover:bg-primary-600 transition-colors">
                    View Order History
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
