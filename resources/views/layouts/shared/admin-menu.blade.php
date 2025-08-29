<!-- Start Sidebar -->
<div id="application-sidebar" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed inset-y-0 start-0 z-60 w-64 bg-white border-e border-default-200 overflow-y-auto lg:block lg:translate-x-0 lg:right-auto lg:bottom-0 dark:bg-default-50">
    <div class="flex sticky top-0 items-center justify-center px-6 h-18 border-b border-dashed border-default-200">
        <a href="{{ route('second', ['admin', 'dashboard']) }}">
             <img src="/images/assets/logo.png" alt="logo" class="h-10 flex dark:hidden">
            <img src="/images/assets/logo.png" alt="logo" class="h-12 hidden dark:flex">
            {{-- <img src="/images/logo-dark.png" alt="logo" class="h-10 flex dark:hidden">
            <img src="/images/logo-light.png" alt="logo" class="h-10 hidden dark:flex"> --}}
        </a>
    </div>

    <div class="h-[calc(100%-390px)]" data-simplebar>
        <ul class="admin-menu p-4 w-full flex flex-col gap-1.5">
            <li class="menu-item">
                <a class="flex items-center gap-x-3.5 py-3 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['admin', 'dashboard']) }}">
                    <i data-lucide="layout-grid" class="w-5 h-5"></i>
                    Dashboard
                </a>
            </li>

            <li class="menu-item">
                <a class="flex items-center gap-x-3.5 py-3 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['admin', 'manage']) }}">
                    <i data-lucide="settings-2" class="w-5 h-5"></i>
                    Manage
                </a>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-hs-collapse="#menuOrders" class="hs-collapse-toggle flex items-center gap-x-3.5 py-3 px-4 text-sm text-default-700 rounded-md hover:bg-default-100">
                    <i data-lucide="list-ordered" class="w-5 h-5"></i>
                    Orders
                    <i data-lucide="chevron-down" class="w-4 h-4 ms-auto transition-all hs-collapse-open:rotate-180"></i>
                </a>

                <div id="menuOrders" class="hs-collapse w-full overflow-hidden transition-[height] duration-300 hidden">
                    <ul class="space-y-2 mt-2">
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('admin.orders.index') }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Order List
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-hs-collapse="#menuCustomers" class="hs-collapse-toggle flex items-center gap-x-3.5 py-3 px-4 text-sm text-default-700 rounded-md hover:bg-default-100">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    Customers
                    <i data-lucide="chevron-down" class="w-4 h-4 ms-auto transition-all hs-collapse-open:rotate-180"></i>
                </a>

                <div id="menuCustomers" class="hs-collapse w-full overflow-hidden transition-[height] duration-300 hidden">
                    <ul class="space-y-2 mt-2">
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['customers', 'list']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Customers List
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['customers', 'detail']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Customers Details
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['customers', 'add']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Customers Add
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['customers', 'edit']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Customers Edit
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-hs-collapse="#menuRestaurants" class="hs-collapse-toggle flex items-center gap-x-3.5 py-3 px-4 text-sm text-default-700 rounded-md hover:bg-default-100">
                    <i data-lucide="hotel" class="w-5 h-5"></i>
                    Restaurants
                    <i data-lucide="chevron-down" class="w-4 h-4 ms-auto transition-all hs-collapse-open:rotate-180"></i>
                </a>

                <div id="menuRestaurants" class="hs-collapse w-full overflow-hidden transition-[height] duration-300 hidden">
                    <ul class="space-y-2 mt-2">
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['restaurants', 'list']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Restaurants List
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['restaurants', 'details']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Restaurants Details
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['restaurants', 'add']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Restaurants Add
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['restaurants', 'edit']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Restaurants Edit
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-hs-collapse="#menuProduct" class="hs-collapse-toggle flex items-center gap-x-3.5 py-3 px-4 text-sm text-default-700 rounded-md hover:bg-default-100">
                    <i data-lucide="shopping-bag" class="w-5 h-5"></i>
                    Product
                    <i data-lucide="chevron-down" class="w-4 h-4 ms-auto transition-all hs-collapse-open:rotate-180"></i>
                </a>

                <div id="menuProduct" class="hs-collapse w-full overflow-hidden transition-[height] duration-300 hidden">
                    <ul class="space-y-2 mt-2">


                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['products', 'categorysetup']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Category Setup
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['products', 'categorylist']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Category List
                            </a>
                        </li>


                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['products', 'list']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Product List
                            </a>
                        </li>



                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['products', 'details']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Product Details
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['products', 'add']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Product Add
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['products', 'edit']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Product Edit
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-hs-collapse="#menuSeller" class="hs-collapse-toggle flex items-center gap-x-3.5 py-3 px-4 text-sm text-default-700 rounded-md hover:bg-default-100">
                    <i data-lucide="user-cog" class="w-5 h-5"></i>
                    Seller
                    <i data-lucide="chevron-down" class="w-4 h-4 ms-auto transition-all hs-collapse-open:rotate-180"></i>
                </a>

                <div id="menuSeller" class="hs-collapse w-full overflow-hidden transition-[height] duration-300 hidden">
                    <ul class="space-y-2 mt-2">
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['seller', 'list']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Seller List
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['seller', 'details']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Seller Details
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['seller', 'add']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Seller Add
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class="flex items-center gap-x-2.5 py-2 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['seller', 'edit']) }}">
                                <i data-lucide="dot" class="w-6 h-6"></i>
                                Seller Edit
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a class="flex items-center gap-x-3.5 py-3 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['admin', 'wallet']) }}">
                    <i data-lucide="wallet" class="w-5 h-5"></i>
                    Wallet
                </a>
            </li>
        </ul>
    </div>

    <ul class="admin-menu px-4 pt-10 flex flex-col gap-2">
        <li class="menu-item">
            <div class="flex flex-col items-center text-center p-4 text-sm text-default-700 rounded-md bg-no-repeat bg-cover bg-[url(/public/images/other/offer-bg.png)] bg-primary/5" href="javascript:void(0)">
                <div class="h-16 w-16 border border-default-100 bg-white dark:bg-default-50 text-primary shadow-lg rounded-full flex items-center justify-center -mt-10 mb-4">
                    <i data-lucide="headphones" class="w-6 h-6"></i>
                </div>
                <p class="text-sm text-default-700 mb-4">🔥 Upgrade Your Plan. Find Out here</p>
                <button class="px-4 py-2 bg-primary/10 text-primary text-sm font-medium rounded transition-all hover:bg-primary hover:text-white">Contact Support</button>
            </div>
        </li>

        <li class="menu-item">
            <a class="flex items-center gap-x-3.5 py-3 px-4 text-sm text-default-700 rounded-md hover:bg-default-100" href="{{ route('second', ['admin', 'settings']) }}">
                <i data-lucide="settings" class="w-5 h-5"></i>
                Settings
            </a>
        </li>

        <li class="menu-item">
            <a class="flex items-center gap-x-3.5 py-3 px-4 text-sm text-red-700 rounded-md hover:bg-red-400/10 hover:text-red-800" href="{{ route('second', ['auth', 'login']) }}">
                <i data-lucide="log-out" class="w-5 h-5"></i>
                Logout
            </a>
        </li>
    </ul>
</div>
<!-- End Sidebar -->
