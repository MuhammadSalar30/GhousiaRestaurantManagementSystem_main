@include('layouts.shared/preloader')

<!-- Offer/Help Menu - Commented out to remove black header -->
{{-- <div class="h-8 lg:flex items-center hidden bg-primary-950 text-white z-20">
  <div class="container">
    <nav class="grid lg:grid-cols-3 items-center gap-4">
      <!-- Language Dropdown -->
      <!-- <div class="flex relative">
        <div class="hs-dropdown relative inline-flex [--trigger:hover] [--placement:bottom]">
          <a class="hs-dropdown-toggle after:absolute hover:after:-bottom-10 after:inset-0 relative flex items-center text-base" href="javascript:void(0)">
            <img alt="Image" class="h-3.5 me-3" src="/images/flags/us.jpg">
            <span class="font-medium text-xs">English (USA)</span>
          </a>

          <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[140px] transition-[opacity,margin] mt-4 opacity-0 hidden z-50 bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-lg border border-default-100 p-1.5 dark:bg-default-50">
            <ul class="flex flex-col gap-1">
              <li>
                <a class="flex items-center gap-2 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="javascript:void(0)"><img alt="flag" class="h-4" src="/images/flags/us.jpg">
                  English</a>
              </li>
              <li>
                <a class="flex items-center gap-2 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="javascript:void(0)"><img alt="flag" class="h-4" src="/images/flags/french.jpg"> French</a>
              </li>
              <li>
                <a class="flex items-center gap-2 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="javascript:void(0)"><img alt="flag" class="h-4" src="/images/flags/germany.jpg">
                  German</a>
              </li>
              <li>
                <a class="flex items-center gap-2 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="javascript:void(0)"><img alt="flag" class="h-4" src="/images/flags/spain.jpg"> Spanish</a>
              </li>
            </ul>
          </div>
        </div>
      </div> -->

      <!-- Offer Link -->
      {{-- <h5 class="text-sm text-primary-50 text-center">Free Delivery Over $50 <a class="font-semibold underline" href="javascript:void(0)">Claim Offer</a></h5>

      <ul class="flex items-center justify-end gap-4">
        <li class="flex menu-item">
          <a class="text-sm hover:text-primary" href="{{ route('second', ['client', 'faqs']) }}">Help</a>
        </li>

        <li class="flex menu-item">
          <a class="text-sm hover:text-primary" href="{{ route('second', ['client', 'contact-us']) }}">Contact Us</a>
        </li>
      </ul>
    </nav>
  </div>
</div> --}}

<!-- Main Navigation Menu -->
<header id="navbar" class="sticky top-0 z-20 border-b border-default-200 bg-transparent transition-all">
  <div class="lg:h-20 h-14 flex items-center">
    <div class="container">
      <div class="grid lg:grid-cols-3 grid-cols-2 items-center gap-4">
        <div class="flex">
          <!-- Mobile Menu Toggle Button -->
          <button class="lg:hidden block " data-hs-overlay="#mobile-menu">
            <i data-lucide="menu" class="w-7 h-7 text-default-600 me-4 hover:text-primary"></i>
          </button>

          <!-- Navbar Brand Logo -->
          <a href="{{ route('second', ['client','home']) }}">
            <img src="/images/assets/logo.png" alt="logo" class="h-10 w-auto max-w-[300px] flex dark:hidden">
            <img src="/images/assets/logo.png" alt="logo" class="h-12 w-auto max-w-[360px] hidden dark:flex">
            {{-- <img src="/images/logo-dark.png" alt="logo" class="h-10 flex dark:hidden">
            <img src="/images/logo-light.png" alt="logo" class="h-10 hidden dark:flex"> --}}
          </a>
        </div>

        <!-- Nevigation Menu -->
        <ul class="menu lg:flex items-center justify-center hidden relative">
          <!-- Home Menu -->
          <li class="menu-item">
            <a class="inline-flex items-center text-sm lg:text-base font-medium text-default-800 py-2 px-4 rounded-full hover:text-primary" href="{{ route('second', ['client','home']) }}">Home </a>
          </li>

          <!-- Product Menu -->
          <li class="menu-item">
            <div class="hs-dropdown relative inline-flex [--trigger:hover] [--placement:bottom]">
              <a class="hs-dropdown-toggle after:absolute hover:after:-bottom-10 after:inset-0 inline-flex items-center text-sm lg:text-base font-medium text-default-700 py-2 px-4 rounded-full hover:text-primary" href="{{ route('second', ['client', 'product-grid']) }}">Products <i class="w-4 h-4 ms-2" data-lucide="chevron-down"></i></a>

              <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[200px] transition-[opacity,margin] mt-4 opacity-0 hidden z-10 bg-white shadow-lg rounded-lg border border-default-100 p-1.5 dark:bg-default-50">
                <ul class="flex flex-col gap-1">
                  <li>
                    <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="{{ route('second', ['client', 'product-grid']) }}">Product Grid</a>
                  </li>
                  <li>
                    <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="{{ route('second', ['client', 'product-list']) }}">Product List</a>
                  </li>
                  {{-- <li>
                    <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="{{ route('second', ['client', 'product-detail']) }}">Product Detail</a>
                  </li> --}}
                </ul>
              </div>
            </div>
          </li>

          {{-- <!-- Mega Menu -->
          <li class="menu-item">
            <div class="hs-dropdown relative inline-flex [--trigger:hover] [--auto-close:inside]">
              <a class="hs-dropdown-toggle after:absolute hover:after:-bottom-10 after:inset-0 inline-flex items-center text-sm whitespace-nowrap lg:text-base font-medium text-default-700 py-2 px-4 rounded-full hover:text-primary cursor-pointer" href="javascript:void(0)">
                Mega Menu <i class="w-4 h-4 ms-2" data-lucide="chevron-down"></i>
              </a>

              <div id="megaMenu" class="hs-dropdown-menu hs-dropdown-open:opacity-100 top-full inset-x-0 w-full min-w-full absolute mt-4 transition-[opacity,margin] opacity-0 hidden z-10 duration-300">
                <div class="container">
                  <div class="bg-white shadow-lg rounded-lg border border-default-200 overflow-hidden dark:bg-default-50">
                    <div class="grid grid-cols-12">
                      <div class="col-span-12">
                        <div class="py-10 px-6">
                          <div class="grid grid-cols-4 gap-8">
@foreach(($menuSections ?? []) as $section)
                            <div class="space-y-4">
                              <h6 class="text-lg font-semibold text-default-800 border-b border-default-200 pb-2">{{ $section->name }}</h6>
                              <ul class="space-y-2">
                                @php
                                  // Group items by name to avoid duplicates for different sizes
                                  $uniqueItems = $section->items->groupBy('name')->map(function($group) {
                                    // Get the first item from each group (they all have the same name)
                                    return $group->first();
                                  });
                                @endphp
                                @foreach($uniqueItems as $item)
                                <li>
                                  <a class="text-sm font-medium text-default-600 hover:text-primary transition-all flex items-center justify-between group"
                                     href="{{ route('third', ['client', 'product-detail', $item->id]) }}">
                                    <span>{{ $item->name }}</span>
                                    {{-- size hidden in mega menu per requirement --}}
                                  {{-- </a>
                                  </li>
                                  @endforeach
                                </ul>
                              </div>
                              @endforeach
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li> --}} 
           {{-- <!-- Cart Page -->
           <li class="menu-item">
            <a class="inline-flex items-center text-sm lg:text-base font-medium text-default-700 py-2 px-4 rounded-full hover:text-primary" href="{{ route('second', ['client', 'cart']) }}" target="_blank">Cart</a>
          </li>
         <!-- WishList -->
         <li class="menu-item">
            <a class="inline-flex items-center text-sm lg:text-base font-medium text-default-700 py-2 px-4 rounded-full hover:text-primary" href="{{ route('second', ['client', 'wishlist']) }}" target="_blank">Wishlist</a>
          </li>
  <!-- Checkout Page -->
  {{-- <li class="menu-item">
    <a class="inline-flex items-center text-sm lg:text-base font-medium text-default-700 py-2 px-4 rounded-full hover:text-primary" href="{{ route('checkout.index') }}" target="_blank">Checkout</a>
  </li> --}}
  {{-- <li class="menu-item">
    <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="{{ route('checkout.index') }}">Checkout</a>
  </li>  --}}

          <!-- Pages Menu -->
          {{-- <li class="menu-item">
            <div class="hs-dropdown relative inline-flex [--trigger:hover] [--placement:bottom]">
              <a class="hs-dropdown-toggle after:absolute hover:after:-bottom-10 after:inset-0 inline-flex items-center text-sm lg:text-base font-medium text-default-700 py-2 px-4 rounded-full hover:text-primary" href="javascript:void(0)">
                Pages <i class="w-4 h-4 ms-2" data-lucide="chevron-down"></i>
              </a>

              <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[200px] transition-[opacity,margin] mt-4 opacity-0 hidden z-10 bg-white shadow-md rounded-lg border border-default-100 p-1.5 dark:bg-default-50">
                <ul class="flex flex-col gap-1">
                  <li>
                    <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="{{ route('second', ['client', 'cart']) }}">Cart</a>
                  </li>
                  <li>
                    <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="{{ route('second', ['client', 'wishlist']) }}">Wishlist</a>
                  </li>
                  <li>
                    <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="{{ route('checkout.index') }}">Checkout</a>
                  </li>
                  <li>
                    <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="{{ route('second', ['client', 'faqs']) }}">FAQs</a>
                  </li>
                  <li>
                    <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="{{ route('second', ['client', 'contact-us']) }}">Contact Us</a>
                  </li>
                  <li>
                    <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="{{ route('second', ['client', 'error-404']) }}">Error 404</a>
                  </li>

                </ul>
              </div>
            </div>
          </li> --}}

          <!-- Admin Link -->
          <li class="menu-item">
            <a class="inline-flex items-center text-sm lg:text-base font-medium text-default-700 py-2 px-4 rounded-full hover:text-primary" href="{{ route('second', ['admin', 'dashboard']) }}" target="_blank">Admin</a>
          </li>
        </ul>

        <ul class="flex items-center justify-end gap-x-6">
          <!-- Search Form Input -->
          <li class="2xl:flex relative menu-item hidden">
            <input class="ps-10 pe-4 py-2.5 block w-64 border-transparent placeholder-primary-500 rounded-full text-sm bg-primary-400/40 text-primary" placeholder="Search for items..." type="search">
            <span class="absolute start-4 top-3">
              <i class="w-4 h-4 text-primary-500" data-lucide="search"></i>
            </span>
          </li>

          <!-- Search Button (small screen) -->
          <li class="2xl:hidden flex menu-item">
            <button data-hs-overlay="#mobileSearchSidebar" class="relative flex text-base transition-all text-default-600 hover:text-primary">
              <i class="w-5 h-5" data-lucide="search"></i>
            </button>
          </li>
          <!-- Wishlist Icon -->
          <li class="flex menu-item">
            <a href="{{ route('second', ['client', 'wishlist']) }}" class="relative flex text-base transition-all text-default-600 hover:text-primary">
              <i class="w-5 h-5" data-lucide="heart"></i>
              <span class="wishlist-count absolute z-10 -top-2.5 end-0 inline-flex items-center justify-center p-1 h-5 w-5 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 bg-red-500 rounded-full">0</span>
            </a>
          </li>
          <!-- Cart Page link -->
          <li class="flex menu-item">
            <a href="{{ route('second', ['client', 'cart']) }}" class="relative flex text-base transition-all text-default-600 hover:text-primary">
              <i class="w-5 h-5" data-lucide="shopping-bag"></i>
              <span class="cart-count absolute z-10 -top-2.5 end-0 inline-flex items-center justify-center p-1 h-5 w-5 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 bg-red-500 rounded-full">0</span>
            </a>
          </li>

          <!-- Login Button -->
          <li class="flex menu-item">
            <button onclick="openModal('loginModal')" class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium text-default-700 bg-white border border-default-200 rounded-full hover:bg-default-50 hover:text-primary transition-all min-w-[80px]">
              Login
            </button>
          </li>

          <!-- Sign Up Button -->
          <li class="flex menu-item">
            <button onclick="openModal('signupModal')" class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium text-white bg-primary rounded-full hover:bg-primary-600 transition-all min-w-[80px]">
              Sign Up
            </button>
          </li>

          <!-- User Dropdown (for logged in users) -->
          <li class="flex menu-item hidden" id="userDropdown">
            <div class="hs-dropdown relative inline-flex [--trigger:hover] [--placement:bottom]">
              <a class="hs-dropdown-toggle after:absolute hover:after:-bottom-10 after:inset-0 relative flex items-center text-base transition-all text-default-600 hover:text-primary" href="javascript:void(0)">
                <i class="w-5 h-5" data-lucide="user"></i>
              </a>

              <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[200px] transition-[opacity,margin] mt-4 opacity-0 hidden z-20 bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-lg border border-default-100 p-1.5 dark:bg-default-50">
                <ul class="flex flex-col gap-1">
                  <li>
                    <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="{{ route('second', ['admin', 'dashboard']) }}" target="_blank"><i class="h-4 w-4" data-lucide="user-circle"></i> Admin</a>
                  </li>
                  <li>
                    <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="{{ route('second', ['client', 'cart']) }}"><i class="h-4 w-4" data-lucide="shopping-cart"></i>
                      Cart</a>
                  </li>
                  <li>
                    <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="{{ route('second', ['client', 'wishlist']) }}"><i class="h-4 w-4" data-lucide="heart"></i>
                      Wishlist</a>
                  </li>
                  <li>
                    <button class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded w-full text-left" onclick="openModal('changePasswordModal')"><i class="h-4 w-4" data-lucide="key"></i> Change Password</button>
                  </li>
                  <li>
                    <button class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded w-full text-left" onclick="logout()"><i class="h-4 w-4" data-lucide="log-out"></i> Log Out</button>
                  </li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>

<!-- Mobile Nav (Bottom Navbar) -->
<div class="flex lg:hidden">
  <div class="fixed inset-x-0 bottom-0 h-16 w-full grid grid-cols-3 items-center justify-items-center border-t border-default-200 bg-white dark:bg-default-50 z-40">
    <a href="{{ route('second', ['client','home']) }}" class="flex flex-col items-center justify-center gap-1 text-default-600" type="button">
      <i class="fa-solid fa-house text-lg"></i>
      <span class="text-xs font-medium">Home</span>
    </a>
    <a href="{{ route('second', ['client', 'product-grid']) }}" class="flex flex-col items-center justify-center gap-1 text-default-600" type="button">
      <i class="fa-solid fa-utensils text-lg"></i>
      <span class="text-xs font-medium">Food</span>
    </a>
    <a href="{{ route('second', ['client', 'wishlist']) }}" class="flex flex-col items-center justify-center gap-1 text-default-600" type="button">
      <i class="fa-regular fa-heart text-lg"></i>
      <span class="text-xs font-medium">Wishlist</span>
    </a>
  </div>
</div>

<!-- Mobile Menu (Sidebar Menu) -->
<div id="mobile-menu" class="hs-overlay hs-overlay-open:translate-x-0 hidden -translate-x-full fixed top-0 left-0 transition-all transform h-full max-w-[270px] w-full z-60  border-r border-default-200 bg-white dark:bg-default-50" tabindex="-1">
  <div class="flex justify-center items-center border-b border-dashed border-default-200 h-16 transition-all duration-300">
    <a href="{{ route('second', ['client','home']) }}">
      <img src="/images/logo-dark.png" alt="logo" class="h-10 flex dark:hidden">
      <img src="/images/logo-light.png" alt="logo" class="h-10 hidden dark:flex">
    </a>
  </div>
  <div class="h-[calc(100%-4rem)]" data-simplebar>
    <nav class="hs-accordion-group p-4 w-full flex flex-col flex-wrap">
      <ul class="space-y-2.5">
        <li>
          <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['client','home']) }}">
            Home
          </a>
        </li>

        <li class="hs-accordion" id="product-categories-accordion">
          <a class="hs-accordion-toggle flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-primary hs-accordion-active:bg-default-100 text-sm font-medium text-default-700 rounded-md hover:bg-default-100" href="javascript:;">
            Product <i data-lucide="chevron-down" class="w-5 h-5 ms-auto hs-accordion-active:rotate-180 transition-all"></i>
          </a>

          <div id="product-categories-accordion" class="hs-accordion-content w-full overflow-hidden transition-[height] hidden">
            <ul class="pt-2 ps-2">
              <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['client', 'product-grid']) }}">
                  Product Grid
                </a>
              </li>
              <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['client', 'product-list']) }}">
                  Product List
                </a>
              </li>
              <li>
                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['client', 'product-detail']) }}">
                  Product Details
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li>
          <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['client', 'wishlist']) }}">
            My Wishlist
          </a>
        </li>

        <li>
          <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['client', 'contact-us']) }}">
            Contact Us
          </a>
        </li>

        <li>
          <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['client', 'faqs']) }}">
            FAQs
          </a>
        </li>

        <li>
          <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['client', 'error-404']) }}">
            Error Page
          </a>
        </li>

        <li>
          <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['auth', 'login']) }}">
            Login
          </a>
        </li>

        <li>
          <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['auth', 'register']) }}">
            Register
          </a>
        </li>

        <li>
          <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['auth', 'recoverpw']) }}">
            Forgot Password
          </a>
        </li>

        <li>
          <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm font-medium text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['auth', 'reset-password']) }}">
            Reset Password
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>

<!-- Topbar Search Modal (Small Screen) -->
<div id="mobileSearchSidebar" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-60 overflow-x-hidden overflow-y-auto">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div class="flex flex-col bg-white shadow-sm rounded-lg">
      <div class="relative flex w-full">
        <span class="absolute start-4 top-3">
          <i class="w-4 h-4 text-primary-500" data-lucide="search"></i>
        </span>

        <input class="px-10 py-2.5 block w-full border-transparent placeholder-primary-500 rounded-lg text-sm bg-transparent text-primary-500" placeholder="Search for items..." type="search">

        <button class="absolute end-4 top-3" data-hs-overlay="#mobileSearchSidebar">
          <i class="w-4 h-4 text-primary-500" data-lucide="x"></i>
        </button>
      </div>
    </div>
  </div>
</div>

<script>
        // Load cart count on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadCartCount();
        });

        window.loadCartCount = function() {
            fetch('/cart/count')
                .then(response => response.json())
                .then(data => {
                    document.querySelectorAll('.cart-count').forEach(function(el){ el.textContent = data.count; });
                    if (typeof showBottomCartBar === 'function' && data.count > 0) { showBottomCartBar(); }
                })
                .catch(error => {
                    console.error('Error loading cart count:', error);
                });
        }

        window.updateCartCount = function(count) {
            document.querySelectorAll('.cart-count').forEach(function(el){ el.textContent = count; });
            if (typeof showBottomCartBar === 'function' && count > 0) { showBottomCartBar(); }
        }
        </script>
