<div class="h-full flex flex-col">
  <div class="px-5 py-4 border-b border-default-200 flex items-center justify-between">
    <h4 class="text-lg font-semibold text-default-800">Your Cart</h4>
    <button type="button" onclick="closeCartDrawer()" class="text-default-500 hover:text-default-800">
      <i data-lucide="x" class="w-5 h-5"></i>
    </button>
  </div>
  <div class="p-4 flex-1 overflow-y-auto">
    @if(isset($cartItems) && $cartItems->count() > 0)
      <div class="space-y-4">
        @foreach($cartItems as $item)
        <div class="flex items-center gap-3" data-cart-item-id="{{ $item->id }}">
          <img src="{{ $item->menuItem->image ? (str_starts_with($item->menuItem->image, 'http') ? $item->menuItem->image : asset($item->menuItem->image)) : '/images/dishes/burger.png' }}" class="h-14 w-14 rounded object-cover" onerror="this.src='/images/dishes/burger.png'">
          <div class="flex-1">
            <div class="flex justify-between">
              <h5 class="text-sm font-medium text-default-800">{{ $item->menuItem->name }}</h5>
              <button onclick="removeFromSideCart({{ $item->id }})" class="text-red-500 hover:text-red-600"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
            </div>
            @if($item->size)
            <p class="text-xs text-default-500">Size: {{ ucfirst($item->size) }}</p>
            @endif
            <div class="mt-2 flex items-center justify-between">
              <div class="inline-flex justify-between border border-default-200 p-1 rounded-full">
                <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center" onclick="updateSideQuantity({{ $item->id }}, -1)">–</button>
                <input type="text" class="w-8 border-0 text-sm text-center text-default-800 focus:ring-0 p-0 bg-transparent" value="{{ $item->quantity }}" min="1" max="100" readonly>
                <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-6 w-6 text-sm inline-flex items-center justify-center" onclick="updateSideQuantity({{ $item->id }}, 1)">+</button>
              </div>
              <div class="text-sm font-medium text-default-800">PKR {{ number_format($item->price * $item->quantity, 2) }}</div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    @else
      <div class="text-center py-10">
        <i data-lucide="shopping-cart" class="w-10 h-10 mx-auto text-default-300 mb-3"></i>
        <p class="text-default-600">Your cart is empty</p>
      </div>
    @endif
  </div>
  <div class="border-t border-default-200 p-4">
    <div class="flex justify-between mb-2">
      <span class="text-sm text-default-600">Subtotal</span>
      <span class="text-sm font-medium text-default-800">PKR {{ number_format($total, 2) }}</span>
    </div>
    <a href="{{ route('checkout.index') }}" class="w-full inline-flex items-center justify-center rounded-full border border-primary bg-primary px-6 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Checkout</a>
  </div>
</div>
