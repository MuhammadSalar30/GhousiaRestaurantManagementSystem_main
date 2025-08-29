@extends('layouts.default', ['title' => 'Cart'])

@section('content')
 
@include('layouts.shared/page-title', ['title' => 'Cart'] )

<section class="lg:py-10 py-6">
    <div class="container">
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-6">
            <div class="lg:col-span-2 col-span-1">
                <div class="border border-default-200 rounded-lg">
                    <div class="border-b border-default-200 px-6 py-5">
                        <h4 class="text-lg font-medium text-default-800">Shopping Cart</h4>
                    </div>

                    <div class="flex flex-col overflow-hidden">
                        @if(isset($cartItems) && $cartItems->count() > 0)
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="overflow-hidden">
                                    <table class="min-w-full divide-y divide-default-200">
                                        <thead class="bg-default-400/10">
                                            <tr>
                                                <th scope="col" class="min-w-[14rem] px-5 py-3 text-start text-xs font-medium text-default-500 uppercase">Products</th>
                                                <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-default-500 uppercase">Price</th>
                                                <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-default-500 uppercase">Quantity</th>
                                                <th scope="col" class="px-5 py-3 text-center text-xs font-medium text-default-500 uppercase">Sub-Total</th>
                                                <th scope="col" class="px-5 py-3 text-center text-xs font-medium text-default-500 uppercase">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-default-200">
                                            @foreach($cartItems as $item)
                                            <tr data-cart-item-id="{{ $item->id }}">
                                                <td class="px-5 py-3 whitespace-nowrap">
                                                    <div class="flex items-center gap-2">
                                                        <img src="{{ $item->menuItem->image ? (str_starts_with($item->menuItem->image, 'http') ? $item->menuItem->image : asset($item->menuItem->image)) : '/images/dishes/burger.png' }}"
                                                             class="h-18 w-18"
                                                             alt="{{ $item->menuItem->name }}"
                                                             onerror="this.src='/images/dishes/burger.png'">
                                                        <div>
                                                            <h4 class="text-sm font-medium text-default-800">{{ $item->menuItem->name }}</h4>
                                                            @if($item->size)
                                                            <span class="text-xs text-default-500">Size: {{ ucfirst($item->size) }}</span>
                                                            @endif
                                                    </div>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-3 whitespace-nowrap text-sm text-default-800">PKR {{ number_format($item->price, 2) }}</td>
                                                <td class="px-5 py-3 whitespace-nowrap">
                                                    <div class="inline-flex justify-between border border-default-200 p-1 rounded-full">
                                                        <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center" onclick="updateQuantity({{ $item->id }}, -1)">–</button>
                                                        <input type="text" class="w-8 border-0 text-sm text-center text-default-800 focus:ring-0 p-0 bg-transparent" value="{{ $item->quantity }}" min="1" max="100" readonly="">
                                                        <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center" onclick="updateQuantity({{ $item->id }}, 1)">+</button>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-3 whitespace-nowrap text-sm text-center text-default-800">PKR {{ number_format($item->price * $item->quantity, 2) }}</td>
                                                <td class="px-5 py-3 whitespace-nowrap text-center">
                                                    <button onclick="removeFromCart({{ $item->id }})" class="text-red-500 hover:text-red-700">
                                                        <i data-lucide="x-circle" class="w-5 h-5"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="p-8 text-center">
                            <i data-lucide="shopping-cart" class="w-16 h-16 mx-auto text-default-300 mb-4"></i>
                            <h4 class="text-lg font-medium text-default-600 mb-2">Your cart is empty</h4>
                            <p class="text-default-500 mb-4">Add some delicious items to get started!</p>
                            <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center justify-center rounded-full border border-primary bg-primary px-6 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">
                                Continue Shopping
                            </a>
                    </div>
                        @endif

                        @if(isset($cartItems) && $cartItems->count() > 0)
                    <div class="border-t border-default-200 px-6 py-5">
                        <div class="flex flex-wrap justify-between items-center gap-2">
                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center justify-center rounded-full border border-primary text-primary hover:bg-primary hover:text-white px-6 py-3 text-center text-sm font-medium shadow-sm transition-all duration-500">
                                    Continue Shopping
                                </a>

                                <button onclick="clearCart()" class="inline-flex items-center justify-center rounded-full border border-red-500 text-red-500 hover:bg-red-500 hover:text-white px-6 py-3 text-center text-sm font-medium shadow-sm transition-all duration-500">
                                    Clear Cart
                            </button>
                        </div>
                    </div>
                        @endif
                </div><!-- end grid-cols -->
                </div>
            </div>

            @if(isset($cartItems) && $cartItems->count() > 0)
            <div>
                <div class="border border-default-200 rounded-lg p-5 mb-5">
                    <h4 class="text-lg font-semibold text-default-800 mb-5">Cart Totals</h4>
                    <div class="mb-6">
                        <div class="flex justify-between mb-3">
                            <p class="text-sm text-default-500">Sub-total</p>
                            <p class="text-sm text-default-700 font-medium">PKR {{ number_format($total, 2) }}</p>
                        </div>
                        <div class="flex justify-between mb-3">
                            <p class="text-sm text-default-500">Delivery</p>
                            <p class="text-sm text-default-700 font-medium">Free</p>
                        </div>
                        <div class="flex justify-between mb-3">
                            <p class="text-sm text-default-500">Tax</p>
                            <p class="text-sm text-default-700 font-medium">PKR {{ number_format($total * 0.15, 2) }}</p>
                        </div>
                        <div class="border-b border-default-200 my-4"></div>
                        <div class="flex justify-between mb-3">
                            <p class="text-base text-default-700">Total</p>
                            <p class="text-base text-default-700 font-medium">PKR {{ number_format($total * 1.15, 2) }} PKR</p>
                        </div>
                    </div>

                    <a href="{{ route('checkout.index') }}" class="w-full inline-flex items-center justify-center rounded-full border border-primary bg-primary px-10 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Proceed to Checkout</a>
                </div>

                <div class="border border-default-200 rounded-lg">
                    <div class="px-6 py-5 border-b border-default-200">
                        <h4 class="text-lg font-semibold text-default-800">Coupon Code</h4>
                    </div>
                    <div class="p-6">
                        <input id="couponCode" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200" type="text" placeholder="Enter Coupon Code">

                        <div class="flex justify-end mt-4">
                            <button onclick="applyCoupon()" class="inline-flex items-center justify-center rounded-full border border-primary bg-primary px-6 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Apply Coupon</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

@endsection

@section('script')
  @vite(['resources/js/form-input-spin.js'])
  <script>
    function updateQuantity(cartItemId, change) {
        const row = document.querySelector(`[data-cart-item-id="${cartItemId}"]`);
        const quantityInput = row.querySelector('input[type="text"]');
        const currentQuantity = parseInt(quantityInput.value);
        const newQuantity = Math.max(1, currentQuantity + change);

        if (newQuantity !== currentQuantity) {
            fetch(`/cart/${cartItemId}/quantity`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ quantity: newQuantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    quantityInput.value = newQuantity;
                    // Update subtotal
                    const price = parseFloat(row.querySelector('td:nth-child(2)').textContent.replace('PKR ', '').replace(',', ''));
                    const subtotal = price * newQuantity;
                    row.querySelector('td:nth-child(4)').textContent = `PKR ${subtotal.toFixed(2)}`;
                    updateCartTotals();
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }

    function removeFromCart(cartItemId) {
        if (confirm('Are you sure you want to remove this item from your cart?')) {
            fetch(`/cart/${cartItemId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const row = document.querySelector(`[data-cart-item-id="${cartItemId}"]`);
                    row.remove();
                    updateCartTotals();

                    // Check if cart is empty
                    if (document.querySelectorAll('[data-cart-item-id]').length === 0) {
                        location.reload();
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }

    function clearCart() {
        if (confirm('Are you sure you want to clear your entire cart?')) {
            fetch('/cart', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }

    function updateCartTotals() {
        // This function would recalculate totals based on current cart items
        // For now, we'll just reload the page to get updated totals
        location.reload();
    }

    function applyCoupon() {
        const couponCode = document.getElementById('couponCode').value;
        if (couponCode.trim() === '') {
            alert('Please enter a coupon code');
            return;
        }

        // Here you would implement coupon validation logic
        alert('Coupon functionality will be implemented soon!');
    }
  </script>
@endsection
