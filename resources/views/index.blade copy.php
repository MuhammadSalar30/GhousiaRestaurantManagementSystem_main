@extends('layouts.shared/main')

<head>

     @include('layouts.shared/title-meta')

     @include('layouts.shared/head-css')

</head>

<body>
     <!-- =========== Navbar Start =========== -->
     <header class="sticky top-0 inset-x-0 items-center z-40 w-full bg-transparent transition-all duration-300 backdrop-blur" id="navbar">
          <div class="h-16 flex items-center">
               <div class="container">
                    <nav class="flex items-center justify-between gap-4">
                         <div class="flex items-center gap-4">
                              <!-- Navbar Brand Logo -->
                              <a href="{{ route('any', ['index']) }}">
                                 {{-- <img src="/images/logo-dark.png" alt="logo" class="h-12 flex dark:hidden">
                            <img src="/images/logo-light.png" alt="logo" class="h-12 hidden dark:flex"> --}}
                                   <img src="/images/assets/logo.png" alt="logo" class="h-10 flex dark:hidden">
                                  <img src="/images/assets/logo.png" alt="logo" class="h-12 hidden dark:flex">
                              </a>
                         </div>

                         <!-- Navigation Menu -->
                         <div class="flex-grow hidden lg:block mx-auto relative">
                              <ul class="menu flex items-center justify-center">
                                   <!-- Contact us Link -->
                                   <li class="menu-item">
                                        <div class="flex items-center">
                                             <a class="inline-flex items-center text-sm lg:text-base font-medium text-primary-500/75 py-2 px-4 rounded-full hover:text-primary-600" href="#home">Home</a>
                                        </div>
                                   </li>
                                   <!-- Contact us Link -->
                                   <li class="menu-item">
                                        <div class="flex items-center">
                                             <a class="inline-flex items-center text-sm lg:text-base font-medium  text-primary-500/75 py-2 px-4 rounded-full hover:text-primary-600" href="#demo">Demos</a>
                                        </div>
                                   </li>
                                   <!-- Contact us Link -->
                                   <li class="menu-item">
                                        <div class="flex items-center">
                                             <a class="inline-flex items-center text-sm lg:text-base font-medium  text-primary-500/75 py-2 px-4 rounded-full hover:text-primary-600" href="#features">Features</a>
                                        </div>
                                   </li>
                              </ul>
                         </div>

                         <div>
                              <a href="#demo" class="inline-flex items-center gap-2.5 text-white focus:outline-none font-semibold rounded text-sm px-4 py-2 text-center md:me-0  shadow-lg shadow-transparent transition-all duration-500 ease-in-out hover:-translate-y-[2px] bg-primary">
                                   <i class="h-5 w-5" data-lucide="shopping-cart"></i> Order Now
                              </a>
                         </div>
                    </nav>
               </div>
          </div>
     </header>

     <section class="lg:pt-24 lg:pb-36 py-6 relative bg-gradient-to-t from-orange-600/20 via-orange-600/5 to-orange-600/0" id="home">
          <div class="absolute inset-0 "></div>
          <div class="container relative">
               <div class="grid lg:grid-cols-10 gap-12">
                    <div class=" z-10 self-center lg:col-span-4">
                         <div class="text-center lg:text-start">
                              <h1 class="lg:text-4xl/normal md:text-3xl/snug text-2xl font-medium capitalize  text-primary-950 dark:text-primary-50">
                                   Multipurpose <span class="text-primary font-semibold">Food</span> Client & Admin App with Tailwind
                              </h1>

                              <p class="mt-5">Discover the ease of having your preferred dishes delivered straight to your door. 🚪</p>

                              <a class="w-auto inline-flex items-center font-semibold gap-2 px-6 py-2.5 rounded-full transition-all duration-300 text-white bg-primary hover:shadow-primary-200/10 hover:shadow-xl mt-10" href="#demo">View
                                   Demos <i class="h-5 w-5" data-lucide="eye"></i>
                              </a>
                         </div>
                    </div><!-- end grid-col -->

                    <div class="relative flex items-center justify-center lg:col-start-6 lg:col-end-11">
                         <img src="/images/demo/1.png" class="mx-auto shadow-lg rounded-lg">
                    </div>


               </div>
               <div class="text-center mt-20">
                    <p class="text-2xl font-medium">Developed Using</p>
                    <div class="inline-flex flex-wrap items-center justify-center gap-4 mt-8">
                         <div class="w-16 h-16 flex justify-center items-center rounded-full bg-white dark:bg-default-200">
                              <img src="/images/demo/logo/tailwindcss.svg" class="w-9 h-9">
                         </div>
                         <div class="w-16 h-16 flex justify-center items-center rounded-full bg-white dark:bg-default-200">
                              <img src="/images/demo/logo/html.svg" class="w-9 h-9">
                         </div>
                         <div class="w-16 h-16 flex justify-center items-center rounded-full bg-white dark:bg-default-200">
                              <img src="/images/demo/logo/css.svg" class="w-9 h-9">
                         </div>
                         <div class="w-16 h-16 flex justify-center items-center rounded-full bg-white dark:bg-default-200">
                              <img src="/images/demo/logo/javascript.svg" class="w-9 h-9">
                         </div>
                         <div class="w-16 h-16 flex justify-center items-center rounded-full bg-white dark:bg-default-200">
                              <img src="/images/demo/logo/vitejs-logo.svg" class="w-9 h-9">
                         </div>
                         <div class="w-16 h-16 flex justify-center items-center rounded-full bg-white dark:bg-default-200">
                              <img src="/images/demo/logo/bun.svg" class="w-9 h-9">
                         </div>

                         <!--                    <div class="w-16 h-16 flex justify-center items-center rounded-full bg-white shadow-lg border border-default-100 dark:bg-default-100">-->
                         <!--                        <img src="/images/demo/logo/figma.svg" class="w-9 h-9">-->
                         <!--                    </div>-->
                    </div>
               </div>
          </div>
     </section>

     <section class="py-20" id="demo">
          <div class="container">
               <div class=" mx-auto text-center mb-14">
                    <span class="inline-flex text-base border-x-2 border-x-primary-600 text-primary-700 font-semibold px-2 rounded-full bg-primary-100  mb-2">Apps</span>
                    <h2 class="text-3xl font-semibold text-default-950 mb-2.5">Client & Admin Apps</h2>
                    <p class="text-base font-medium text-default-900">
                         Empowering Food Business: Seamless Control for Clients, Effortless Management for Admins!
                    </p>
               </div>

               <!-- =========== demos Section Start =========== -->

               <div class="grid lg:grid-cols-2 grid-cols-1 gap-8 justify-content-center" data-aos="fade-up" data-aos-duration="1000">
                    <a href="{{ route('second', ['client','home']) }}" target="_blank">
                         <div class="relative group  rounded-lg text-center transition-all duration-500 shadow border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-5">
                                   <div class="relative rounded-lg overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded-lg border border-default-100" src="/images/demo/1.png">
                                        <div class="absolute flex items-center justify-center h-full w-full bg-default-500/20 inset-0 opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-5 text-xl font-semibold text-primary-900 text-center capitalize">Client Web</h5>
                              </div>
                         </div>
                    </a>
                    <a href="{{ route('second', ['admin', 'dashboard']) }}" target="_blank">
                         <div class="relative group  rounded-lg text-center transition-all duration-500 shadow border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-5">
                                   <div class="relative rounded-lg overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded-lg border border-default-100" src="/images/demo/admin.png">
                                        <div class="absolute flex items-center justify-center h-full w-full bg-default-500/20 inset-0 opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-5 text-xl font-semibold text-primary-900 text-center capitalize">Admin Panel</h5>
                              </div>
                         </div>
                    </a>
               </div><!-- end grid -->
          </div><!-- end container -->
     </section>

     <section class="py-20">
          <div class="container">
               <div class=" mx-auto text-center mb-14">
                    <span class="inline-flex text-base border-x-2 border-x-primary-600 text-primary-700 font-semibold px-2 rounded-full bg-primary-100 mb-2">User</span>
                    <h2 class="text-3xl font-semibold text-default-950 mb-2.5">Client App</h2>
                    <p class="text-base font-medium text-default-900">
                         Instant Flavor, Effortless Ordering: Your Culinary Journey Starts Here with Our Food Client Web App!
                    </p>
               </div>

               <div class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8 justify-content-center" data-aos="fade-up" data-aos-duration="1000">
                    <a class="" href="{{ route('second', ['client', 'product-grid']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded-lg overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded-lg border border-default-100" src="/images/demo/2.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20 opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Product Grid</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->

                    <a class="" href="{{ route('second', ['client', 'product-list']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded-lg overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded-lg border border-default-100" src="/images/demo/3.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20 opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Product List</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->

                    <a class="" href="{{ route('second', ['client', 'product-detail']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded-lg overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded-lg border border-default-100" src="/images/demo/4.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Product
                                        Details</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->
                    <a class="" href="{{ route('second', ['client', 'cart']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded-lg overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded-lg border border-default-100" src="/images/demo/5.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Cart</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->
                    <a class="" href="{{ route('checkout.index') }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded-lg overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded-lg border border-default-100" src="/images/demo/7.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Checkout</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->
                    <a class="" href="{{ route('second', ['client', 'wishlist']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/6.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Wishlist</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->
               </div><!-- end grid -->
          </div><!-- end container -->
     </section>

     <section class="py-20" id="admin">
          <div class="container">
               <div class=" mx-auto text-center mb-14">
                    <span class="inline-flex text-base border-x-2 border-x-primary-600 text-primary-700 font-semibold px-2 rounded-full bg-primary-100  mb-2">Control</span>
                    <h2 class="text-3xl font-semibold text-default-950 mb-2.5">Admin Panel</h2>
                    <p class="text-base font-medium text-default-900">
                         Effortless Kitchen Management: Elevate Your Culinary Business with Our Admin Web App!
                    </p>
               </div>

               <!-- =========== demos Section Start =========== -->
               <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-8 justify-content-center" data-aos="fade-up" data-aos-duration="1000">

                    <a class="" href="{{ route('second', ['admin', 'wallet']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/1.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Wallet</h5>
                              </div>
                         </div>
                    </a>
                    <a class="" href="{{ route('second', ['admin', 'manage']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/19.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Manage</h5>
                              </div>
                         </div>
                    </a>
                    <a class="" href="{{ route('second', ['restaurants', 'list']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/13.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Restaurants List</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->
                    <a class="" href="{{ route('second', ['restaurants', 'details']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/12.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Restaurants Details</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->
                    <a class="" href="{{ route('second', ['customers', 'detail']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/16.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Customers Details </h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->

                    <a class="" href="{{ route('second', ['client', 'product-list']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/9.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Product List</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->
               </div><!-- end grid -->
          </div><!-- end container -->
     </section>

     <section class="py-20">
          <div class="container">
               <div class=" mx-auto text-center mb-14">
                    <span class="inline-flex text-base border-x-2 border-x-primary-600 text-primary-700 font-semibold px-2 rounded-full bg-primary-100  mb-2">Security</span>
                    <h2 class="text-3xl font-semibold text-default-950 mb-2.5">Auth Pages</h2>
                    <p class="text-base font-medium text-default-900">
                         Well, of course we would provide Authentication pages, which are just right for your App.
                    </p>
               </div>

               <!-- =========== demos Section Start =========== -->
               <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-8 justify-content-center" data-aos="fade-up" data-aos-duration="1000">

                    <a class="" href="{{ route('second', ['auth', 'login']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/login.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Login</h5>
                              </div>
                         </div>
                    </a>
                    <a class="" href="{{ route('second', ['auth', 'register']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/register.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Register</h5>
                              </div>
                         </div>
                    </a>
                    <a class="" href="{{ route('second', ['auth', 'recoverpw']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/forgotpassword.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Forgot
                                        Password</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->
                    <div class="lg:col-span-3">
                         <div class="flex justify-center">
                              <div class="lg:w-1/3">
                                   <a class="" href="{{ route('second', ['auth', 'reset-password']) }}" target="_blank">
                                        <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                                             <div class="p-4">
                                                  <div class="relative rounded overflow-hidden ">
                                                       <img alt="demo-img" class="w-full rounded" src="/images/demo/resetpassword.png">
                                                       <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                                            <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                                 Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                                       </div>
                                                  </div>
                                                  <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Reset
                                                       Password</h5>
                                             </div>
                                        </div>
                                   </a><!-- end grid-col -->
                              </div>
                         </div>
                    </div>
               </div><!-- end grid -->
          </div><!-- end container -->
     </section>

     <section class="py-20">
          <div class="container">
               <div class=" mx-auto text-center mb-14">
                    <span class="inline-flex text-base border-x-2 border-x-primary-600 text-primary-700 font-semibold px-2 rounded-full bg-primary-100  mb-2">Helper</span>
                    <h2 class="text-3xl font-semibold text-default-950 mb-2.5">Extra Pages</h2>
                    <p class="text-base font-medium text-default-900">
                         Beyond Taste: Explore Food Varieties with our Extra Pages Web App – Where Culinary Diversity Meets Innovation!
                    </p>
               </div>

               <!-- =========== demos Section Start =========== -->
               <div class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8 justify-content-center" data-aos="fade-up" data-aos-duration="1000">


                    <a class="" href="{{ route('second', ['client', 'faqs']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/8.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20 opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">FAQs</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->

                    <a class="" href="{{ route('second', ['client', 'error-404']) }}" target="_blank">
                         <div class="relative group  rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4 ">
                                   <div class="relative rounded">
                                        <img alt="demo-img" class="w-full rounded  transition-all" src="/images/demo/10.png">
                                        <div class="absolute rounded inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Error 404</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->

                    <a class="" href="{{ route('second', ['client', 'contact-us']) }}" target="_blank">
                         <div class="relative group  rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/9.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Contact Us</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->

                    <a class="" href="{{ route('second', ['products', 'details']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/8.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Product details</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->

                    <a class="" href="{{ route('second', ['products', 'add']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/7.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Product Add</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->


                    <a class="" href="{{ route('second', ['products', 'edit']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/6.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Product Edit</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->

                    <a class="" href="{{ route('second', ['customers', 'list']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/17.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Customers List</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->

                    <a class="" href="{{ route( 'second', ['customers', 'add']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/15.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Customers Add</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->

                    <a class="" href="{{ route('second', ['customers', 'edit']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/14.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Customers Edit</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->


                    <a class="" href="{{ route('second', ['seller', 'list']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/5.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Seller List</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->

                    <a class="" href="{{ route('second', ['seller', 'details']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/4.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Seller Details</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->

                    <a class="" href="{{ route('second', ['seller', 'add']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/3.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Seller Add</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->

                    <a class="" href="{{ route('second', ['seller', 'edit']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/2.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Seller Edit</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->

                    <a class="" href="{{ route('second', ['admin', 'settings']) }}" target="_blank">
                         <div class="relative group rounded-lg text-center transition-all duration-500 shadow-md border border-default-100 bg-white hover:-translate-y-1 dark:bg-default-100">
                              <div class="p-4">
                                   <div class="relative rounded overflow-hidden ">
                                        <img alt="demo-img" class="w-full rounded" src="/images/demo/admin/21.png">
                                        <div class="absolute inset-0 flex items-center justify-center h-full w-full bg-default-500/20  opacity-0 transition-all duration-300 group-hover:opacity-100 cursor-pointer">
                                             <div class="py-1.5 ps-5 pe-2 inline-flex items-center justify-center font-semibold align-middle duration-500 text-base text-center bg-primary hover:bg-primary-600 text-white rounded-full">
                                                  Live Preview <span class="h-8 w-8 inline-flex items-center justify-center rounded-full bg-white border border-white text-primary ms-3"><i class="h-5 w-5" data-lucide="external-link"></i></span></div>
                                        </div>
                                   </div>
                                   <h5 class="mt-4 text-lg font-semibold text-primary-900 text-center capitalize">Settings</h5>
                              </div>
                         </div>
                    </a><!-- end grid-col -->
               </div><!-- end grid -->
          </div><!-- end container -->
     </section>

     <section class="py-20 bg-default-50/80" id="features">
          <div class="container">
               <div class=" mx-auto text-center mb-14">
                    <span class="inline-flex text-base border-x-2 border-x-primary-600 text-primary-700 font-semibold px-2 rounded-full bg-primary-100  mb-2">Features</span>
                    <h2 class="text-3xl font-semibold text-default-950 mb-2.5">Awesome Template Features</h2>
               </div>

               <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-6">
                    <div class="bg-white dark:bg-default-50 rounded-xl border border-default-200 hover:shadow-lg transition-all duration-300">
                         <div class="p-6">
                              <div class="flex flex-col justify-center items-center text-center gap-4">
                                   <div class="shrink">
                                        <div class="inline-flex items-center justify-center h-12 w-12 bg-primary-100 text-primary-600 rounded-md">
                                             <i class="h-6 w-6" data-lucide="airplay"></i>
                                        </div>
                                   </div>
                                   <div class="grow">
                                        <h4 class="text-lg font-semibold text-default-950 mb-2">Ultra Responsive</h4>
                                        <p class="text-sm font-medium text-default-600">Our fully Responsive design ensures your
                                             content is beautifully presented no matter what device your audience is using.</p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="bg-white dark:bg-default-50 rounded-xl border border-default-200 hover:shadow-lg transition-all duration-300">
                         <div class="p-6">
                              <div class="flex flex-col justify-center items-center text-center gap-4">
                                   <div class="shrink">
                                        <div class="inline-flex items-center justify-center h-12 w-12 bg-primary-100 text-primary-600 rounded-md">
                                             <i class="h-6 w-6" data-lucide="package"></i>
                                        </div>
                                   </div>
                                   <div class="grow">
                                        <h4 class="text-lg font-semibold text-default-950 mb-2">Production Ready</h4>
                                        <p class="text-sm font-medium text-default-600">Our solutions have undergone extensive testing
                                             to ensure they can handle the demands of a production environment.</p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="bg-white dark:bg-default-50 rounded-xl border border-default-200 hover:shadow-lg transition-all duration-300">
                         <div class="p-6">
                              <div class="flex flex-col justify-center items-center text-center gap-4">
                                   <div class="shrink">
                                        <div class="inline-flex items-center justify-center h-12 w-12 bg-primary-100 text-primary-600 rounded-md">
                                             <i class="h-6 w-6" data-lucide="figma"></i>
                                        </div>
                                   </div>
                                   <div class="grow">
                                        <h4 class="text-lg font-semibold text-default-950 mb-2">Hygienic Design</h4>
                                        <p class="text-sm font-medium text-default-600">Our designs feature smooth and continuous
                                             surfaces, minimizing areas where dirt, bacteria, or contaminants can accumulate.</p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="bg-white dark:bg-default-50 rounded-xl border border-default-200 hover:shadow-lg transition-all duration-300">
                         <div class="p-6">
                              <div class="flex flex-col justify-center items-center text-center gap-4">
                                   <div class="shrink">
                                        <div class="inline-flex items-center justify-center h-12 w-12 bg-primary-100 text-primary-600 rounded-md">
                                             <i class="h-6 w-6" data-lucide="circuit-board"></i>
                                        </div>
                                   </div>
                                   <div class="grow">
                                        <h4 class="text-lg font-semibold text-default-950 mb-2">High Performance</h4>
                                        <p class="text-sm font-medium text-default-600">We understand that your requirements are
                                             unique. Our high-performance solutions are customizable to match your specific
                                             goals.</p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="bg-white dark:bg-default-50 rounded-xl border border-default-200 hover:shadow-lg transition-all duration-300">
                         <div class="p-6">
                              <div class="flex flex-col justify-center items-center text-center gap-4">
                                   <div class="shrink">
                                        <div class="inline-flex items-center justify-center h-12 w-12 bg-primary-100 text-primary-600 rounded-md">
                                             <i class="h-6 w-6" data-lucide="globe-2"></i>
                                        </div>
                                   </div>
                                   <div class="grow">
                                        <h4 class="text-lg font-semibold text-default-950 mb-2">Multi Browser Support</h4>
                                        <p class="text-sm font-medium text-default-600">Our e-commerce store is rigorously tested and
                                             optimized to work flawlessly on all major web browsers, offering a consistent shopping
                                             experience to all our customers.</p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="bg-white dark:bg-default-50 rounded-xl border border-default-200 hover:shadow-lg transition-all duration-300">
                         <div class="p-6">
                              <div class="flex flex-col justify-center items-center text-center gap-4">
                                   <div class="shrink">
                                        <div class="inline-flex items-center justify-center h-12 w-12 bg-primary-100 text-primary-600 rounded-md">
                                             <i class="h-6 w-6" data-lucide="file-text"></i>
                                        </div>
                                   </div>
                                   <div class="grow">
                                        <h4 class="text-lg font-semibold text-default-950 mb-2">Well Documented</h4>
                                        <p class="text-sm font-medium text-default-600">Our documentation is a treasure trove of
                                             valuable information, from getting started guides to advanced tutorials. It's all there
                                             to help you make the most of our services.</p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="bg-white dark:bg-default-50 rounded-xl border border-default-200 hover:shadow-lg transition-all duration-300">
                         <div class="p-6">
                              <div class="flex flex-col justify-center items-center text-center gap-4">
                                   <div class="shrink">
                                        <div class="inline-flex items-center justify-center h-12 w-12 bg-primary-100 text-primary-600 rounded-md">
                                             <i class="h-6 w-6" data-lucide="users-2"></i>
                                        </div>
                                   </div>
                                   <div class="grow">
                                        <h4 class="text-lg font-semibold text-default-950 mb-2">Great Support</h4>
                                        <p class="text-sm font-medium text-default-600">Our support team is always ready to help.
                                             Whether you have questions, encounter issues, or need guidance, we're just a message or
                                             call away.</p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="bg-white dark:bg-default-50 rounded-xl border border-default-200 hover:shadow-lg transition-all duration-300">
                         <div class="p-6">
                              <div class="flex flex-col justify-center items-center text-center gap-4">
                                   <div class="shrink">
                                        <div class="inline-flex items-center justify-center h-12 w-12 bg-primary-100 text-primary-600 rounded-md">
                                             <i class="h-6 w-6" data-lucide="move"></i>
                                        </div>
                                   </div>
                                   <div class="grow">
                                        <h4 class="text-lg font-semibold text-default-950 mb-2">Highly Customizable</h4>
                                        <p class="text-sm font-medium text-default-600">Our product is designed to adapt to your
                                             specific requirements. Whether you're an individual, a business, or an organization, we
                                             provide the tools to customize it to your liking.</p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="bg-white dark:bg-default-50 rounded-xl border border-default-200 hover:shadow-lg transition-all duration-300">
                         <div class="p-6">
                              <div class="flex flex-col justify-center items-center text-center gap-4">
                                   <div class="shrink">
                                        <div class="inline-flex items-center justify-center h-12 w-12 bg-primary-100 text-primary-600 rounded-md">
                                             <i class="h-6 w-6" data-lucide="feather"></i>
                                        </div>
                                   </div>
                                   <div class="grow">
                                        <h4 class="text-lg font-semibold text-default-950 mb-2">Light as a Feather</h4>
                                        <p class="text-sm font-medium text-default-600">From our years of experience and expertise in Development, we know users vary, they could have slow of fast network.
                                             They all deserve seamless experience in shopping with you.
                                             That's why our product is developed with fewer lines.</p>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="bg-white dark:bg-default-50 rounded-xl border border-default-200 hover:shadow-lg transition-all duration-300">
                         <div class="p-6">
                              <div class="flex flex-col justify-center items-center text-center gap-4">
                                   <div class="shrink">
                                        <div class="inline-flex items-center justify-center h-12 w-12 bg-primary-100 text-primary-600 rounded-md">
                                             <i class="h-6 w-6" data-lucide="star"></i>
                                        </div>
                                   </div>
                                   <div class="grow">
                                        <h4 class="text-lg font-semibold text-default-950 mb-2">UX Considered</h4>
                                        <p class="text-sm font-medium text-default-600">A good design does not need any explanation because a good design can speak for itself. Out app doesn't only have a good User Interface, we also have considered User experience.</p>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

               <p class="text-base text-center mt-6 font-medium text-primary-900">All these sounds yummy, right? Wait until you purchase it. 😉</p>
          </div>
     </section>

     <footer class="relative  bg-[url(/public/images/other/offer-bg.png)]">
          <div class="pt-20 pb-10" data-aos="fade-up" data-aos-duration="1000">
               <div class="container relative">
                    <div class="text-center">
                         <div class=" mx-auto mb-12">
                              <a class="flex items-center justify-center" href="#">
                                   <img class="h-10" src="/images/logo-dark.png">
                              </a>
                              <h2 class="md:text-3xl text-xl font-semibold text-default-900 capitalize my-5">Get Food for yourself</h2>
                              <p class="font-semibold text-default-800">Start working with <span class="text-primary">Food</span>
                                   to showcase your app to millions of people.</p>
                         </div>

                         <a class="inline-flex items-center gap-2.5 text-white focus:outline-none font-semibold rounded text-sm px-4 py-2 text-center md:me-0  shadow-lg shadow-transparent transition-all duration-500 ease-in-out hover:-translate-y-[2px] bg-primary" href="#"><i class="h-5 w-5" data-lucide="shopping-cart"></i> Buy Now</a>
                    </div>
               </div>
          </div>

          <div class="container relative">
               <p class="py-6 text-center font-medium text-default-900">
                    <script>
                         document.write(new Date().getFullYear().toString());
                    </script>
                    © Yum.
                    Crafted and Coded with <span class="text-red-500">❤️</span> by <a class="text-primary-700" href="https://coderthemes.com/" target="_blank">Coderthemes</a>
               </p>
          </div>
     </footer>


     @include('layouts.shared/back-to-top')

     @include('layouts.shared/footer-scripts')

</body>
