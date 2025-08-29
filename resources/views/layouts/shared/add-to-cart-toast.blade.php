<div id="bottomCartBar" class="fixed left-0 right-0 bottom-0 z-40">
  <div class="container">
    <div class="mx-auto mb-4 flex items-center justify-center">
      <button id="bottomCartButton" type="button" onclick="openCartDrawer()" class="flex items-center gap-3 bg-primary text-white rounded-full shadow-lg px-6 py-3 hidden">
        <i data-lucide="shopping-bag" class="h-5 w-5"></i>
        <span class="text-sm font-medium">View Cart</span>
        <span class="ml-2 inline-flex items-center justify-center p-1 h-5 w-5 text-xs font-bold bg-white/20 rounded-full"><span class="cart-count">0</span></span>
      </button>
    </div>
  </div>
</div>

<div id="cartDrawer" class="fixed inset-0 z-50 hidden">
  <div class="absolute inset-0 bg-black/30" onclick="closeCartDrawer()"></div>
  <div class="absolute right-0 top-0 h-full w-full sm:w-[420px] bg-white shadow-xl animate-slide-in">
    <div id="cartDrawerBody" class="h-full"></div>
  </div>
</div>

<style>
@keyframes slideIn { from { transform: translateX(100%);} to { transform: translateX(0);} }
.animate-slide-in { animation: slideIn .25s ease-out; }
</style>

<script>
  function openCartDrawer() {
    const drawer = document.getElementById('cartDrawer');
    const body = document.getElementById('cartDrawerBody');
    if (!drawer || !body) return;
    drawer.classList.remove('hidden');
    fetch('/cart/side')
      .then(r => r.text())
      .then(html => {
        body.innerHTML = html;
        if (window.lucide && typeof window.lucide.createIcons === 'function') { window.lucide.createIcons(); }
      })
      .catch(() => { body.innerHTML = '<div class="p-6">Failed to load cart.</div>'; });
  }

  function closeCartDrawer() {
    const drawer = document.getElementById('cartDrawer');
    if (drawer) drawer.classList.add('hidden');
  }

  function updateSideQuantity(cartItemId, change) {
    const row = document.querySelector(`#cartDrawer [data-cart-item-id="${cartItemId}"]`);
    if (!row) return;
    const input = row.querySelector('input[type="text"]');
    const current = parseInt(input.value);
    const next = Math.max(1, Math.min(100, current + change));
    if (next === current) return;
    fetch(`/cart/${cartItemId}/quantity`, {
      method: 'PUT',
      headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
      body: JSON.stringify({ quantity: next })
    })
    .then(r => r.json())
    .then(data => {
      if (data.success) { openCartDrawer(); loadCartCount(); }
    });
  }

  function removeFromSideCart(cartItemId) {
    fetch(`/cart/${cartItemId}`, {
      method: 'DELETE',
      headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
    })
    .then(r => r.json())
    .then(data => { if (data.success) { openCartDrawer(); loadCartCount(); } });
  }

  function showBottomCartBar() {
    var btn = document.getElementById('bottomCartButton');
    if (btn) btn.classList.remove('hidden');
  }

  // Immediate UI bump for a smoother feel; server refresh will follow
  window.bumpCartCount = function(amount) {
    const els = document.querySelectorAll('.cart-count');
    els.forEach(function(el){
      const n = parseInt(el.textContent || '0');
      el.textContent = Math.max(0, n + (amount||0));
    });
    showBottomCartBar();
  }

  function refreshCartCounts() {
    fetch('/cart/count')
      .then(r => r.json())
      .then(data => {
        // Update bottom bar count
        const el = document.querySelector('#bottomCartBar .cart-count');
        if (el) el.textContent = data.count;
        if (data.count > 0) { showBottomCartBar(); }
        // Also update all global counters (navbar, etc.)
        if (typeof window.updateCartCount === 'function') { window.updateCartCount(data.count); }
      });
  }

  document.addEventListener('DOMContentLoaded', function(){
    if (typeof window.loadCartCount === 'function') { window.loadCartCount(); }
    else { refreshCartCounts(); }
  });

  // Backwards compatibility for existing calls
  window.showAddToCartToast = function() {
    // Show temporary notification and ensure bottom bar is visible
    showBottomCartBar();
    const existing = document.getElementById('inlineCartNotice');
    if (existing) existing.remove();
    const notice = document.createElement('div');
    notice.id = 'inlineCartNotice';
    notice.className = 'fixed bottom-24 left-1/2 -translate-x-1/2 z-50 bg-white border border-default-200 rounded-full shadow px-4 py-2 text-sm text-default-800';
    notice.textContent = 'Item added successfully';
    document.body.appendChild(notice);
    setTimeout(() => { notice.remove(); }, 1800);
  }
</script>
