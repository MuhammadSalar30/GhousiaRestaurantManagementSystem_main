@extends('layouts.default', ['title' => 'Wishlist'])

@section('content')

@include('layouts.shared/page-title', ['title' => 'Wishlist'] )

<section class="lg:py-10 py-6">
    <div class="container">
        <div class="border border-default-200 divide-y divide-default-200 rounded-lg overflow-hidden ">
            @forelse(($wishlistItems ?? []) as $w)
            <div class="px-4 py-4 flex flex-wrap justify-between items-center" data-wishlist-item-id="{{ $w->id }}">
                <div class="md:w-1/2 w-auto">
                    <div class="flex items-center">
                        <img src="{{ $w->menuItem && $w->menuItem->image ? (str_starts_with($w->menuItem->image, 'http') ? $w->menuItem->image : asset($w->menuItem->image)) : '/images/dishes/burger.png' }}" class="lg:h-28 lg:w-28 w-14 h-14 lg:me-4 me-2" onerror="this.src='/images/dishes/burger.png'">
                        <div class="md:w-auto w-2/3">
                            <h4 class="text-xl font-semibold text-default-800 mb-2 line-clamp-1">{{ $w->menuItem->name ?? 'Item' }}</h4>
                            <p class="text-sm text-default-600 line-clamp-2">{{ $w->menuItem->description ?? '' }}</p>
                        </div>
                    </div>
                </div>

                <div class="md:w-auto w-full lg:mt-0 mt-4">
                    <div class="flex lg:flex-col justify-between gap-2">
                        <a href="{{ route('third', ['client','product-detail', $w->menuItem->id ?? 0]) }}" class="py-3 px-6 font-medium text-center text-white bg-primary rounded-full hover:bg-primary-500 transition-all">View</a>
                        <button onclick="removeFromWishlist({{ $w->menuItem->id ?? 0 }})" class="py-3 px-6 font-medium text-center lg:text-primary rounded-full lg:hover:bg-primary/20 lg:bg-transparent bg-primary text-white transition-all">Remove</button>
                    </div>
                </div>
            </div>
            @empty
            <div class="p-8 text-center">
                <i data-lucide="heart" class="w-16 h-16 mx-auto text-default-300 mb-4"></i>
                <h4 class="text-lg font-medium text-default-600 mb-2">Your wishlist is empty</h4>
                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center justify-center rounded-full border border-primary bg-primary px-6 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Browse Items</a>
            </div>
            @endforelse
        </div><!-- end grid-cols -->
    </div>
</section>

@endsection

@section('script')
<script>
function removeFromWishlist(menuItemId) {
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  fetch('/wishlist/toggle', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
    body: JSON.stringify({ menu_item_id: menuItemId })
  })
  .then(r => r.json())
  .then(data => {
    if (data.success) {
      showNotification(data.message, 'info');
      setTimeout(() => location.reload(), 1000);
    }
  })
  .catch(error => {
    console.error('Error:', error);
    showNotification('Something went wrong. Please try again.', 'error');
  });
}

function showNotification(message, type = 'success') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.wishlist-notification');
    existingNotifications.forEach(notification => notification.remove());

    // Create notification element
    const notification = document.createElement('div');
    notification.className = `wishlist-notification fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full`;

    // Set colors based on type
    if (type === 'success') {
        notification.className += ' bg-green-500 text-white';
    } else if (type === 'info') {
        notification.className += ' bg-blue-500 text-white';
    } else if (type === 'error') {
        notification.className += ' bg-red-500 text-white';
    }

    notification.innerHTML = `
        <div class="flex items-center gap-2">
            <i data-lucide="${type === 'success' ? 'heart' : type === 'info' ? 'heart-off' : 'alert-circle'}" class="h-4 w-4"></i>
            <span>${message}</span>
        </div>
    `;

    document.body.appendChild(notification);

    // Trigger Lucide icons for the notification
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // Animate in
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);

    // Auto remove after 3 seconds
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 300);
    }, 3000);
}
</script>
@endsection
