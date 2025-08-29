@extends('layouts.default', ['title' => 'Checkout'])

@section('content')

@include('layouts.shared/page-title', ['title' => 'Checkout'] )

<section class="lg:py-10 py-6">
    <div class="container">
        <form id="checkoutForm" method="POST" action="{{ route('checkout.process') }}">
            @csrf
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-6">
                <div class="lg:col-span-2 col-span-1">
                    <div class="mb-8">
                        <h4 class="text-lg font-medium text-default-800 mb-6">Customer Information</h4>

                        <div class="grid lg:grid-cols-4 gap-6">
                            <div class="lg:col-span-2">
                                <label for="customer_name" class="block text-sm text-default-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                                <input id="customer_name" name="customer_name" class="block w-full bg-transparent dark:bg-default-50 rounded-full py-2.5 px-4 border border-default-200" type="text" placeholder="Enter your full name" value="{{ auth()->user()->name ?? '' }}" required>
                                @error('customer_name')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="lg:col-span-2">
                                <label for="customer_email" class="block text-sm text-default-700 mb-2">Email <span class="text-red-500">*</span></label>
                                <input id="customer_email" name="customer_email" class="block w-full bg-transparent dark:bg-default-50 rounded-full py-2.5 px-4 border border-default-200" type="email" placeholder="example@example.com" value="{{ auth()->user()->email ?? '' }}" required>
                                @error('customer_email')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="lg:col-span-2">
                                <label for="customer_phone" class="block text-sm text-default-700 mb-2">Phone Number <span class="text-red-500">*</span></label>
                                <input id="customer_phone" name="customer_phone" class="block w-full bg-transparent dark:bg-default-50 rounded-full py-2.5 px-4 border border-default-200" type="text" placeholder="+92 300-1234567" required>
                                @error('customer_phone')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="lg:col-span-2">
                                <label for="order_type" class="block text-sm text-default-700 mb-2">Order Type <span class="text-red-500">*</span></label>
                                <select id="order_type" name="order_type" class="block w-full bg-transparent dark:bg-default-50 rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200" required>
                                    <option value="delivery" selected>Delivery</option>
                                    <option value="takeaway">Takeaway</option>
                                    <option value="dine-in">Dine In</option>
                                </select>
                                @error('order_type')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Delivery Address Section (shown only for delivery) -->
                            <div id="delivery_section" class="lg:col-span-4">
                                <h5 class="text-md font-medium text-default-800 mb-4">Delivery Address</h5>

                                <div class="grid lg:grid-cols-3 gap-4">
                                    <div class="lg:col-span-3">
                                        <label for="delivery_address" class="block text-sm text-default-700 mb-2">Complete Address <span class="text-red-500">*</span></label>
                                        <textarea id="delivery_address" name="delivery_address" class="block w-full bg-transparent dark:bg-default-50 rounded-lg py-2.5 px-4 border border-default-200" rows="3" placeholder="House/Flat No, Street, Landmark"></textarea>
                                        @error('delivery_address')
                                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="delivery_area" class="block text-sm text-default-700 mb-2">Area <span class="text-red-500">*</span></label>
                                        <select id="delivery_area" name="delivery_area" class="block w-full bg-transparent dark:bg-default-50 rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200">
                                            <option value="">Select Area</option>
                                            <option value="Gulshan-e-Iqbal">Gulshan-e-Iqbal</option>
                                            <option value="North Nazimabad">North Nazimabad</option>
                                            <option value="Clifton">Clifton</option>
                                            <option value="Defence (DHA)">Defence (DHA)</option>
                                            <option value="Korangi">Korangi</option>
                                            <option value="Malir">Malir</option>
                                            <option value="Saddar">Saddar</option>
                                            <option value="Tariq Road">Tariq Road</option>
                                            <option value="Bahadurabad">Bahadurabad</option>
                                            <option value="Nazimabad">Nazimabad</option>
                                            <option value="Federal B Area">Federal B Area</option>
                                            <option value="Gulberg">Gulberg</option>
                                            <option value="Johar Town">Johar Town</option>
                                            <option value="Shah Faisal">Shah Faisal</option>
                                            <option value="Landhi">Landhi</option>
                                            <option value="Orangi Town">Orangi Town</option>
                                            <option value="Baldia Town">Baldia Town</option>
                                            <option value="SITE">SITE</option>
                                            <option value="New Karachi">New Karachi</option>
                                            <option value="Surjani Town">Surjani Town</option>
                                        </select>
                                        @error('delivery_area')
                                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="delivery_city" class="block text-sm text-default-700 mb-2">City</label>
                                        <input id="delivery_city" name="delivery_city" class="block w-full bg-transparent dark:bg-default-50 rounded-full py-2.5 px-4 border border-default-200 bg-gray-100" type="text" value="Karachi" readonly>
                                    </div>


                                </div>
                            </div>

                            <!-- Table Number Section (shown only for dine-in) -->
                            <div id="table_section" class="lg:col-span-2" style="display: none;">
                                <label for="table_no" class="block text-sm text-default-700 mb-2">Table Number</label>
                                <input id="table_no" name="table_no" class="block w-full bg-transparent dark:bg-default-50 rounded-full py-2.5 px-4 border border-default-200" type="text" placeholder="Enter table number">
                                @error('table_no')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h4 class="text-lg font-medium text-default-800 mb-6">Payment Option</h4>

                        <div class="border border-default-200 rounded-lg p-6 lg:w-5/6 mb-5">
                            <div class="grid lg:grid-cols-4 grid-cols-2">
                                <div class="text-center p-6">
                                    <label for="paymentCOD" class="flex flex-col items-center justify-center mb-4 cursor-pointer">
                                        <i data-lucide="dollar-sign" class="text-primary mb-4"></i>
                                        <h5 class="text-sm font-medium text-default-700">Cash on Delivery</h5>
                                    </label>
                                    <input id="paymentCOD" class="text-primary w-5 h-5 bg-transparent border-default-200 focus:ring-0" type="radio" name="payment_method" value="cash_on_delivery" checked>
                                </div>

                                <div class="text-center p-6">
                                    <label for="paymentOnline" class="flex flex-col items-center justify-center mb-4 cursor-pointer">
                                        <i data-lucide="credit-card" class="text-primary mb-4"></i>
                                        <h5 class="text-sm font-medium text-default-700">Online Payment</h5>
                                    </label>
                                    <input id="paymentOnline" class="text-primary w-5 h-5 bg-transparent border-default-200 focus:ring-0" type="radio" name="payment_method" value="online_payment">
                                </div>
                            </div>
                        </div>

                        <div id="card_details" class="grid lg:grid-cols-2 gap-6" style="display: none;">
                            <div class="lg:col-span-2">
                                <label for="card_holder_name" class="block text-sm text-default-700 mb-2">Name on Card</label>
                                <input id="card_holder_name" name="card_holder_name" class="block w-full bg-transparent dark:bg-default-50 rounded-full py-2.5 px-4 border border-default-200" type="text" placeholder="Enter card holder name">
                            </div>

                            <div class="lg:col-span-2">
                                <label for="card_number" class="block text-sm text-default-700 mb-2">Card Number</label>
                                <input id="card_number" name="card_number" class="block w-full bg-transparent dark:bg-default-50 rounded-full py-2.5 px-4 border border-default-200" type="text" placeholder="Enter card number">
                            </div>

                            <div>
                                <label for="card_expiry" class="block text-sm text-default-700 mb-2">Expire Date</label>
                                <input id="card_expiry" name="card_expiry" class="block w-full bg-transparent dark:bg-default-50 rounded-full py-2.5 px-4 border border-default-200" type="text" placeholder="MM/YY">
                            </div>

                            <div>
                                <label for="card_cvc" class="block text-sm text-default-700 mb-2">CVC</label>
                                <input id="card_cvc" name="card_cvc" class="block w-full bg-transparent dark:bg-default-50 rounded-full py-2.5 px-4 border border-default-200" type="text" placeholder="Enter CVV number">
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-medium text-default-800 mb-6">Additional Information</h4>

                        <div>
                            <label for="notes" class="block text-sm text-default-700 mb-2">Order Notes <span class="text-default-500">(Optional)</span></label>
                            <textarea id="notes" name="notes" class="block w-full bg-transparent dark:bg-default-50 rounded-lg py-2.5 px-4 border border-default-200" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="border border-default-200 rounded-lg p-5">
                        <h4 class="text-lg font-semibold text-default-700 mb-5">Order Summary</h4>

                        @if(isset($cartItems) && $cartItems->count() > 0)
                            @foreach($cartItems as $item)
                            @if($item->menuItem)
                            <div class="flex items-center mb-4">
                                <img src="{{ $item->menuItem->image ? (str_starts_with($item->menuItem->image, 'http') ? $item->menuItem->image : asset($item->menuItem->image)) : '/images/dishes/burger.png' }}"
                                     class="h-20 w-20 me-2 rounded-lg object-cover"
                                     alt="{{ $item->menuItem->name }}"
                                     onerror="this.src='/images/dishes/burger.png'">
                                <div class="flex-1">
                                    <h4 class="text-sm text-default-600 mb-1">{{ $item->menuItem->name }}</h4>
                                    @if($item->size)
                                        <p class="text-xs text-default-400 mb-1">Size: {{ ucfirst($item->size) }}</p>
                                    @endif
                                    <h4 class="text-sm text-default-400">{{ $item->quantity }} x <span class="text-primary font-semibold">Rs. {{ number_format($item->price, 2) }}</span></h4>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-semibold text-default-700">Rs. {{ number_format($item->price * $item->quantity, 2) }}</p>
                                </div>
                            </div>
                            @else
                            <div class="flex items-center mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                                <div class="text-red-600">
                                    <p class="text-sm">Item not found (ID: {{ $item->menu_item_id }})</p>
                                    <p class="text-xs">This item may have been deleted from the menu.</p>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        @else
                            <div class="text-center py-8">
                                <p class="text-default-500">Your cart is empty</p>
                                <a href="{{ route('second', ['client', 'home']) }}" class="text-primary hover:underline">Continue Shopping</a>
                            </div>
                        @endif

                        @if(isset($cartItems) && $cartItems->count() > 0)
                        <div class="mb-6">
                            <div class="flex justify-between mb-3">
                                <p class="text-sm text-default-500">Sub-total</p>
                                <p class="text-sm text-default-700 font-medium" id="subtotal">Rs. {{ number_format($subtotal ?? 0, 2) }}</p>
                            </div>
                            <div class="flex justify-between mb-3">
                                <p class="text-sm text-default-500">Delivery Fee</p>
                                <p class="text-sm text-default-700 font-medium" id="delivery_fee">Rs. {{ number_format($deliveryFee ?? 0, 2) }}</p>
                            </div>
                            <div class="flex justify-between mb-3">
                                <p class="text-sm text-default-500">Tax ({{ $taxRate ?? 0 }}%)</p>
                                <p class="text-sm text-default-700 font-medium" id="tax_amount">Rs. {{ number_format($taxAmount ?? 0, 2) }}</p>
                            </div>
                            @if(isset($discountAmount) && $discountAmount > 0)
                            <div class="flex justify-between mb-3">
                                <p class="text-sm text-default-500">Discount</p>
                                <p class="text-sm text-default-700 font-medium text-green-600">-Rs. {{ number_format($discountAmount, 2) }}</p>
                            </div>
                            @endif
                            <div class="border-b border-default-200 my-4"></div>
                            <div class="flex justify-between mb-3">
                                <p class="text-base text-default-700 font-semibold">Total</p>
                                <p class="text-base text-default-700 font-semibold" id="total_amount">Rs. {{ number_format($total ?? 0, 2) }}</p>
                            </div>
                        </div>

                        <button type="submit" class="w-full inline-flex items-center justify-center rounded-full border border-primary bg-primary px-10 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500" id="place_order_btn">
                            <span class="loading-spinner hidden mr-2">
                                <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                            <span class="btn-text">Place Order</span>
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const orderTypeSelect = document.getElementById('order_type');
    const deliverySection = document.getElementById('delivery_section');
    const tableSection = document.getElementById('table_section');
    const deliveryAddressField = document.getElementById('delivery_address');
    const deliveryAreaField = document.getElementById('delivery_area');
    const tableNoField = document.getElementById('table_no');

    const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
    const cardDetailsSection = document.getElementById('card_details');

    // Handle order type change
    function handleOrderTypeChange() {
        const orderType = orderTypeSelect.value;

        if (orderType === 'delivery') {
            deliverySection.style.display = 'block';
            tableSection.style.display = 'none';
            deliveryAddressField.required = true;
            deliveryAreaField.required = true;
            tableNoField.required = false;
        } else if (orderType === 'dine-in') {
            deliverySection.style.display = 'none';
            tableSection.style.display = 'block';
            deliveryAddressField.required = false;
            deliveryAreaField.required = false;
            tableNoField.required = true;
        } else { // takeaway
            deliverySection.style.display = 'none';
            tableSection.style.display = 'none';
            deliveryAddressField.required = false;
            deliveryAreaField.required = false;
            tableNoField.required = false;
        }
    }

    // Handle payment method change
    function handlePaymentMethodChange() {
        const selectedPayment = document.querySelector('input[name="payment_method"]:checked').value;

        if (selectedPayment === 'online_payment') {
            cardDetailsSection.style.display = 'grid';
            document.getElementById('card_holder_name').required = true;
            document.getElementById('card_number').required = true;
            document.getElementById('card_expiry').required = true;
            document.getElementById('card_cvc').required = true;
        } else {
            cardDetailsSection.style.display = 'none';
            document.getElementById('card_holder_name').required = false;
            document.getElementById('card_number').required = false;
            document.getElementById('card_expiry').required = false;
            document.getElementById('card_cvc').required = false;
        }
    }

    // Event listeners
    orderTypeSelect.addEventListener('change', handleOrderTypeChange);
    paymentMethodRadios.forEach(radio => {
        radio.addEventListener('change', handlePaymentMethodChange);
    });

    // Initialize
    handleOrderTypeChange();
    handlePaymentMethodChange();

    // Form submission
    const checkoutForm = document.getElementById('checkoutForm');
    const placeOrderBtn = document.getElementById('place_order_btn');
    const loadingSpinner = placeOrderBtn.querySelector('.loading-spinner');
    const btnText = placeOrderBtn.querySelector('.btn-text');

    checkoutForm.addEventListener('submit', function(e) {
        // Show loading state
        placeOrderBtn.disabled = true;
        loadingSpinner.classList.remove('hidden');
        btnText.textContent = 'Processing...';
    });

    // Phone number formatting
    const phoneInput = document.getElementById('customer_phone');
    phoneInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.startsWith('92')) {
            value = '+' + value;
        } else if (value.startsWith('0')) {
            value = '+92' + value.substring(1);
        } else if (!value.startsWith('+92')) {
            value = '+92' + value;
        }
        e.target.value = value;
    });
});
</script>
@endsection
