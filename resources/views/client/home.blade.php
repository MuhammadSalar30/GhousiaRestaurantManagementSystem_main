@extends('layouts.default', ['title' => 'Home'])

@section('content')

<!-- Login Modal -->
<div id="loginModal" class="fixed inset-0 z-50 hidden overflow-y-auto" style="background-color: rgba(0, 0, 0, 0.5);">
  <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
    <div class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
      <!-- Close Button -->
      <div class="absolute top-4 right-4">
        <button type="button" class="text-gray-400 hover:text-gray-600 focus:outline-none" onclick="closeModal('loginModal')">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <div class="text-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Sign in</h1>
        <p class="mt-2 text-sm text-gray-600">
          Don't have an account yet?
          <a class="text-blue-600 hover:underline font-medium cursor-pointer" onclick="switchToSignup()">
            Sign up here
          </a>
        </p>
      </div>

      <div class="mt-5">
        <!-- Form -->
        <form id="loginForm">
          <div class="space-y-4">
              <!-- Form Group -->
              <div>
                <label for="loginEmail" class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                <input type="email" id="loginEmail" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required placeholder="Enter your email">
              </div>
              <!-- End Form Group -->

              <!-- Form Group -->
              <div>
                <div class="flex justify-between items-center">
                  <label for="loginPassword" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                  <a class="text-sm text-blue-600 hover:underline cursor-pointer" onclick="showForgotPassword()">Forgot password?</a>
                </div>
                <input type="password" id="loginPassword" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required placeholder="Enter your password">
              </div>
              <!-- End Form Group -->

              <!-- Checkbox -->
              <div class="flex items-center">
                <div class="flex">
                  <input id="remember-me" name="remember-me" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                </div>
                <div class="ms-3">
                  <label for="remember-me" class="text-sm dark:text-white">Remember me</label>
                </div>
              </div>
              <!-- End Checkbox -->

              <button type="submit" class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">Sign in</button>
            </div>
          </form>
          <!-- End Form -->
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Sign Up Modal -->
<div id="signupModal" class="fixed inset-0 z-50 hidden overflow-y-auto" style="background-color: rgba(0, 0, 0, 0.5);">
  <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
    <div class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
      <!-- Close Button -->
      <div class="absolute top-4 right-4">
        <button type="button" class="text-gray-400 hover:text-gray-600 focus:outline-none" onclick="closeModal('signupModal')">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <div class="text-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Sign up</h1>
        <p class="mt-2 text-sm text-gray-600">
          Already have an account?
          <a class="text-blue-600 hover:underline font-medium cursor-pointer" onclick="switchToLogin()">
            Sign in here
          </a>
        </p>
      </div>

      <div class="mt-5">
        <!-- Form -->
        <form id="signupForm">
          <div class="space-y-4">
              <!-- Form Group -->
              <div>
                <label for="signupName" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                <input type="text" id="signupName" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required placeholder="Enter your full name">
              </div>

              <div>
                <label for="signupEmail" class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                <input type="email" id="signupEmail" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required placeholder="Enter your email address">
              </div>

              <div>
                <label for="signupPassword" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" id="signupPassword" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required placeholder="Enter your password">
              </div>

              <div>
                <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <input type="password" id="confirmPassword" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required placeholder="Confirm your password">
              </div>
              <!-- End Form Group -->

              <!-- Checkbox -->
              <div class="flex items-center">
                <div class="flex">
                  <input id="accept-terms" name="accept-terms" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" required>
                </div>
                <div class="ms-3">
                  <label for="accept-terms" class="text-sm dark:text-white">I accept the <a class="text-blue-600 decoration-2 hover:underline font-medium" href="#">Terms and Conditions</a></label>
                </div>
              </div>
              <!-- End Checkbox -->

              <button type="submit" class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">Sign up</button>
            </div>
          </form>
          <!-- End Form -->
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Change Password Modal -->
<div id="changePasswordModal" class="fixed inset-0 z-50 hidden overflow-y-auto" style="background-color: rgba(0, 0, 0, 0.5);">
  <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
    <div class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
      <!-- Close Button -->
      <div class="absolute top-4 right-4">
        <button type="button" class="text-gray-400 hover:text-gray-600 focus:outline-none" onclick="closeModal('changePasswordModal')">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <div class="text-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Change Password</h1>
        <p class="mt-2 text-sm text-gray-600">
          Enter your current password and choose a new one
        </p>
      </div>

      <div class="mt-5">
        <!-- Form -->
        <form id="changePasswordForm">
          <div class="space-y-4">
            <!-- Current Password -->
            <div>
              <label for="currentPassword" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
              <input type="password" id="currentPassword" name="current_password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required placeholder="Enter your current password">
            </div>

            <!-- New Password -->
            <div>
              <label for="newPassword" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
              <input type="password" id="newPassword" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required placeholder="Enter your new password">
            </div>

            <!-- Confirm New Password -->
            <div>
              <label for="confirmNewPassword" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
              <input type="password" id="confirmNewPassword" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required placeholder="Confirm your new password">
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">Change Password</button>
          </div>
        </form>
        <!-- End Form -->
      </div>
    </div>
  </div>
</div>

<!-- Hero Section -->
<section class="lg:py-16 py-6 relative">
    <div class="absolute inset-0 blur-[60px] bg-gradient-to-l from-orange-600/20 via-orange-600/5 to-orange-600/0"></div>
    <div class="container relative">
        <div class="grid lg:grid-cols-2 items-center">
            <div class="py-20 px-10">
                <div class="flex items-center justify-center lg:justify-start order-last lg:order-first z-10">
                    <div class="text-center lg:text-start">
                        <span class="inline-flex py-2 px-4 text-sm text-primary rounded-full bg-primary/20 mb-8 lg:mb-2">#Special Food 🍇</span>
                        <h1 class="lg:text-6xl/normal md:text-5xl/snug text-3xl font-bold text-default-950 capitalize mb-5">We Offer
                            <span class="inline-flex relative">
                                <span>Delicious</span>
                                <img src="/images/home/circle-line.png" class="absolute -z-10 h-full w-full lg:flex hidden">
                            </span>
                            <span class="text-primary">Food</span> And Quick Service
                        </h1>
                        <p class="text-lg text-default-700 font-medium mb-8 md:max-w-md lg:mx-0 mx-auto">Imagine you don’t need a diet because we provide healthy and delicious food for you!.</p>
                        <div class="flex flex-wrap items-center justify-center lg:justify-normal gap-5 mt-10">
                            <a href="{{ route('second', ['client', 'product-grid']) }}" class="py-3 px-6 sm:py-4 sm:px-8 md:py-5 md:px-10 font-medium text-white bg-primary rounded-full hover:bg-primary-500 transition-all text-sm sm:text-base">Order Now</a>
                            {{-- Removed How to Order link per requirement --}}
                        </div>
                        <div class="mt-14">
                            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4">
                                {{-- Removed avatar pictures --}}
                                {{-- <div>
                                    <h1 class="text-base font-medium text-default-800">Our Happy Customer</h1>
                                    <p class="text-base text-default-900"><i data-lucide="star" class="h-4 w-4 inline text-yellow-400 fill-yellow-400"></i> 4.7 <span class="text-default-500 text-sm">(13.7k Reviews)</span></p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end grid-col -->

            <div class="relative flex items-center justify-center py-20">
                <span class="absolute top-0 start-0 text-3xl -rotate-[40deg]">🔥</span>
                <span class="absolute top-0 end-[10%] -rotate-12 h-14 w-14 inline-flex items-center justify-center bg-yellow-400 text-white rounded-lg">
                    <i data-lucide="clock-3" class="h-6 w-6"></i>
                </span>
                <span class="absolute top-1/4 end-0 -rotate-12 h-4 w-4 inline-flex items-center justify-center bg-primary text-white rounded"></span>
                <div class="absolute bottom-1/4 -end-0 2xl:-end-24 hidden md:block lg:hidden xl:block">
                    <img src="/images/home/arrow.png">
                    <div class="flex items-center gap-2 p-2 pe-6 bg-default-50 rounded-full shadow-lg">
                        {{-- Removed testimonial avatar --}}
                        <div class="">
                            <h6 class="text-sm font-medium text-default-900">Jakob Culhane</h6>
                            <p class="text-[10px] font-medium text-default-900">Healthy and Delicious Food</p>
                            <span class="inline-flex gap-0.5">
                                <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="h-3 w-3 text-default-200 fill-default-200"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <span class="absolute bottom-0 end-0 -rotate-12 h-4 w-4 inline-flex items-center justify-center bg-primary text-white rounded-full"></span>
                <span class="absolute -bottom-16 end-1/3 text-3xl">🔥</span>
                <div class="absolute bottom-0 start-0">
                    <div class="flex items-center gap-2 p-2 pe-6 bg-default-50 rounded-full shadow-lg">
                        <span class="inline-flex items-center justify-center h-16 w-16 bg-primary/20 rounded-full"><img src="/images/icons/category/burger-1.svg" class="h-10 w-10 rounded-full"></span>
                        <div class="">
                            <h6 class="text-sm font-medium text-default-900">MCD Veg Burger</h6>
                            <span class="inline-flex gap-0.5">
                                <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="h-3 w-3 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="h-3 w-3 text-default-200 fill-default-200"></i>
                            </span>
                            <h6 class="text-sm font-medium text-default-900"><span class="text-sm text-primary">$</span> 8.14</h6>
                        </div>
                    </div>
                </div>
                <!-- end icons && img -->

                <img src="/images/assets/logo.png" class="mx-auto">
            </div><!-- end grid-col -->
        </div><!-- end grid -->
    </div><!-- end container -->
</section>

{{-- <!-- About Us Section -->
<section class="lg:py-16 py-6">
    <div class="container">
        <div class="grid lg:grid-cols-2 items-start gap-10">
            <div class="flex items-center justify-center h-full w-full bg-default-500/5 rounded-lg">
                <img src="/images/home/about-us.png" class="h-full w-full">
            </div>
            <div class="">
                <span class="inline-flex py-2 px-4 text-sm text-primary rounded-full bg-primary/20 mb-6">About Us</span>
                <h2 class="text-3xl font-semibold text-default-900 max-w-xl mb-6">Where quality food meet Excellent services.</h2>
                <p class="text-default-500 font-medium max-w-2xl mb-16 xl:mb-20">It’s the perfect dining experience where every dish is crafted with fresh, high-quality ingredients and served by friendly staff who go.</p>

                <div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-6">
                    <div class="bg-transparent rounded-md shadow-lg border border-default-100 hover:border-primary transition-all duration-200">
                        <div class="p-6">
                            <div class="mb-6">
                                <img src="/images/icons/cup.png" class="">
                            </div>
                            <h3 class="text-xl font-medium text-default-900 mb-6">Fast Foods</h3>
                            <p class="text-base text-default-500">Healthy Foods are nutrient-Dense Foods</p>
                        </div>
                    </div><!-- end grid-cols -->
                    <div class="bg-transparent rounded-md shadow-lg border border-default-100 hover:border-primary transition-all duration-200">
                        <div class="p-6">
                            <div class="mb-6">
                                <img src="/images/icons/vegetables.png" class="">
                            </div>
                            <h3 class="text-xl font-medium text-default-900 mb-6">Healthy Foods</h3>
                            <p class="text-base text-default-500">Healthy Foods are nutrient-Dense Foods</p>
                        </div>
                    </div><!-- end grid-cols -->
                    <div class="bg-transparent rounded-md shadow-lg border border-default-100 hover:border-primary transition-all duration-200">
                        <div class="p-6">
                            <div class="mb-6">
                                <img src="/images/icons/truck.png" class="">
                            </div>
                            <h3 class="text-xl font-medium text-default-900 mb-6">Fast Delivery</h3>
                            <p class="text-base text-default-500">Healthy Foods are nutrient-Dense Foods</p>
                        </div>
                    </div><!-- end grid-cols -->
                </div><!-- end grid -->

                <div class="flex flex-wrap items-center md:justify-start justify-center gap-4 mt-10">
                    <a href="javascript:void(0)" class="py-3 px-10 font-medium text-white bg-primary rounded-full hover:bg-primary-500 transition-all">Get started</a>
                    <div class="flex items-center gap-2">
                        <img src="/images/avatars/avatar3.png" class="h-12 w-12 rounded-full">
                        <div class="">
                            <h6 class="text-base font-medium text-default-900">Marley Culhane</h6>
                            <p class="text-sm font-medium text-default-500">Founder CEO</p>
                        </div>
                    </div>
                </div><!-- end flex -->
            </div>
        </div>
    </div>
</section> --}}

{{-- <!-- Menu Section -->
<section class="lg:py-16 py-6">
    <div class="container">
        <div class="grid lg:grid-cols-4 lg:gap-10 gap-6">
            <div>
                <div>
                    <span class="inline-flex py-2 px-4 text-sm text-primary rounded-full bg-primary/20 mb-6">Menu</span>
                    <h2 class="text-3xl font-semibold text-default-900 mb-6">Special Menu for you...</h2>
                </div>

                <div class="flex flex-wrap w-full">
                    <div class="lg:h-[30rem] h-auto lg:w-full w-screen custom-scroll overflow-auto lg:mx-0 -mx-4 px-2">
                        <nav class="flex lg:flex-col gap-2" aria-label="Tabs" role="tablist" data-hs-tabs-vertical="true">
                            <!-- Coffee Menu Tab Button -->
                            <button type="button" class="flex p-1" id="coffee-menu-item" data-hs-tab="#coffee-menu" aria-controls="coffee-menu" role="tab">
                                <span class="hs-tab-active:bg-primary text-default-900 flex items-center justify-start gap-4 p-2 pe-6 lg:w-2/3 w-full transition-all hover:text-primary rounded-full">
                                    <span class="hs-tab-active:bg-white h-14 w-14 inline-flex items-center justify-center rounded-full">
                                        <img src="/images/icons/category/cup.svg" class="h-8 w-8">
                                    </span>
                                    <span class="hs-tab-active:text-white text-base font-medium">Coffee</span>
                                </span>
                            </button>

                            <!-- Burger Menu Tab Button -->
                            <button type="button" class="flex p-1" id="burger-menu-item" data-hs-tab="#burger-menu" aria-controls="burger-menu" role="tab">
                                <span class="hs-tab-active:bg-primary text-default-900 flex items-center justify-start gap-4 p-2 pe-6 lg:w-2/3 w-full transition-all hover:text-primary rounded-full">
                                    <span class="hs-tab-active:bg-white h-14 w-14 inline-flex items-center justify-center rounded-full">
                                        <img src="/images/icons/category/burger-1.svg" class="h-8 w-8">
                                    </span>
                                    <span class="hs-tab-active:text-white text-base font-medium">Burger</span>
                                </span>
                            </button>

                            <!-- Noodles Menu Tab Button -->
                            <button type="button" class="flex p-1" id="noodles-menu-item" data-hs-tab="#noodles-menu" aria-controls="noodles-menu" role="tab">
                                <span class="hs-tab-active:bg-primary text-default-900 flex items-center justify-start gap-4 p-2 pe-6 lg:w-2/3 w-full transition-all hover:text-primary rounded-full">
                                    <span class="hs-tab-active:bg-white h-14 w-14 inline-flex items-center justify-center rounded-full">
                                        <img src="/images/icons/category/noodles.svg" class="h-8 w-8">
                                    </span>
                                    <span class="hs-tab-active:text-white text-base font-medium">Noodles</span>
                                </span>
                            </button>

                            <!-- Pizza Menu Tab Button -->
                            <button type="button" class="flex p-1 active" id="pizza-menu-item" data-hs-tab="#pizza-menu" aria-controls="pizza-menu" role="tab">
                                <span class="hs-tab-active:bg-primary text-default-900 flex items-center justify-start gap-4 p-2 pe-6 lg:w-2/3 w-full transition-all hover:text-primary rounded-full">
                                    <span class="hs-tab-active:bg-white  p-4 h-14 w-14 inline-flex items-center justify-center rounded-full">
                                        <img src="/images/icons/category/pizza-slice 1.svg" class="h-8 w-8">
                                    </span>
                                    <span class="hs-tab-active:text-white text-base font-medium">Pizza</span>
                                </span>
                            </button>

                            <!-- Wraps Menu Tab Button -->
                            <button type="button" class="flex p-1" id="wraps-menu-item" data-hs-tab="#wraps-menu" aria-controls="wraps-menu" role="tab">
                                <span class="hs-tab-active:bg-primary text-default-900 flex items-center justify-start gap-4 p-2 pe-6 lg:w-2/3 w-full transition-all hover:text-primary rounded-full">
                                    <span class="hs-tab-active:bg-white h-14 w-14 inline-flex items-center justify-center rounded-full">
                                        <img src="/images/icons/category/taco.svg" class="h-8 w-8">
                                    </span>
                                    <span class="hs-tab-active:text-white text-base font-medium">Wraps</span>
                                </span>
                            </button>

                            <!-- Appetizers Menu Tab Button -->
                            <button type="button" class="flex p-1" id="appetizers-menu-item" data-hs-tab="#appetizers-menu" aria-controls="appetizers-menu" role="tab">
                                <span class="hs-tab-active:bg-primary text-default-900 flex items-center justify-start gap-4 p-2 pe-6 lg:w-2/3 w-full transition-all hover:text-primary rounded-full">
                                    <span class="hs-tab-active:bg-white h-14 w-14 inline-flex items-center justify-center rounded-full">
                                        <img src="/images/icons/category/skewer.svg" class="h-8 w-8">
                                    </span>
                                    <span class="hs-tab-active:text-white text-base font-medium">Appetizers</span>
                                </span>
                            </button>

                            <!-- Desserts Menu Tab Button -->
                            <button type="button" class="flex p-1" id="desserts-menu-item" data-hs-tab="#desserts-menu" aria-controls="desserts-menu" role="tab">
                                <span class="hs-tab-active:bg-primary text-default-900 flex items-center justify-start gap-4 p-2 pe-6 lg:w-2/3 w-full transition-all hover:text-primary rounded-full">
                                    <span class="hs-tab-active:bg-white h-14 w-14 inline-flex items-center justify-center rounded-full">
                                        <img src="/images/icons/category/dessert.svg" class="h-8 w-8">
                                    </span>
                                    <span class="hs-tab-active:text-white text-base font-medium">Desserts</span>
                                </span>
                            </button>
                        </nav><!-- end tab -->
                    </div>
                </div>
            </div>

            <div class="lg:col-span-3">
                <div class="relative lg:mt-24">
                    <div class="bg-primary/10 rounded-lg lg:pb-16">
                        <div class="lg:p-6 p-4">
                            <div id="pizza-menu" role="tabpanel" aria-labelledby="pizza-menu-item">
                                <div class="grid grid-cols-1">
                                    <div class="swiper menu-swiper w-full h-full">
                                        <div class="swiper-wrapper">
                                            @php
                                              $allItems = collect($menuSections ?? [])->flatMap(function($section){
                                                return $section->items ?? collect();
                                              })->groupBy('name')->map(function($group){ return $group->first(); });
                                            @endphp
                                            @foreach($allItems as $item)
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="{{ $item->image ? (str_starts_with($item->image, 'http') ? $item->image : asset($item->image)) : '/images/dishes/burger.png' }}" class="h-full w-full object-cover">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">{{ $item->name }}</h5>
                                                                <a href="{{ route('third', ['client', 'product-detail', $item->id]) }}" class="inline-flex items-center text-white border-b border-dashed border-white text-sm sm:text-base hover:border-yellow-400 transition-colors">Order Now <i data-lucide="chevron-right" class="h-4 w-4 sm:h-5 sm:w-5 ml-1"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                            </div>
                                            @endforeach
                                                        </div>
                                    </div><!-- end dynamic menu slider -->
                                </div><!--end grid-->
                            </div>
                            <!-- end pizza-menu -->

                            <div id="burger-menu" class="hidden" role="tabpanel" aria-labelledby="burger-menu-item">
                                <div class="grid grid-cols-1">
                                    <div class="swiper menu-swiper w-full h-full">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/burger-1.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Cheese Burger</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 5.99</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/burger-2.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Fried Egg Burger</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 12.75</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/burger-3.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Meat Burger</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 19.25</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/burger-4.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Gourmet cheeseburger</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 16.52</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                        </div>
                                    </div><!-- end pizza menu slider -->
                                </div><!--end grid-->
                            </div>
                            <!-- end burger-menu -->

                            <div id="coffee-menu" class="hidden" role="tabpanel" aria-labelledby="coffee-menu-item">
                                <div class="grid grid-cols-1">
                                    <div class="swiper menu-swiper w-full h-full">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/coffee-1.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Espresso Coffee</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 5.99</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/coffee-2.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Cappuccino</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 12.45</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/coffee-3.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Iced Cold Coffee</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 25.14</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/coffee-4.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Flat white</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 8.75</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                        </div><!-- end pizza menu slider -->
                                    </div>
                                </div><!--end grid-->
                            </div>
                            <!-- end coffee-menu -->

                            <div id="desserts-menu" class="hidden" role="tabpanel" aria-labelledby="desserts-menu-item">
                                <div class="grid grid-cols-1">
                                    <div class="swiper menu-swiper w-full h-full">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/cake-1.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Brownie Cake</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 12.99</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/cake-2.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Berry Cheesecake</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 18.25</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/cake-3.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Chocolate Donuts</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 35.46</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/cake-4.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Carrot Cake</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 19.62</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                        </div>
                                    </div><!-- end pizza menu slider -->
                                </div><!--end grid-->
                            </div>
                            <!-- end desserts-menu -->

                            <div id="noodles-menu" class="hidden" role="tabpanel" aria-labelledby="noodles-menu-item">
                                <div class="grid grid-cols-1">
                                    <div class="swiper menu-swiper w-full h-full">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/noodles-1.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Asian Noodles</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 12.78</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/noodles-3.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Meat Noodles</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 31.00</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/noodles-3.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Veg Noodles</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 22.99</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/noodles-1.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Italian Noodles Pasta</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 18.82</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                        </div>
                                    </div><!-- end pizza menu slider -->
                                </div><!--end grid-->
                            </div>
                            <!-- end noodles-menu -->

                            <div id="wraps-menu" class="hidden" role="tabpanel" aria-labelledby="wraps-menu-item">
                                <div class="grid grid-cols-1">
                                    <div class="swiper menu-swiper w-full h-full">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/wraps-1.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Asian wraps</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 12.78</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/wraps-2.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Meat wraps</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 31.00</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/wraps-3.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Veg wraps</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 22.99</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/wraps-4.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Buritto wraps Pasta</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 18.82</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                        </div>
                                    </div><!-- end pizza menu slider -->
                                </div><!--end grid-->
                            </div>
                            <!-- end wraps-menu -->

                            <div id="appetizers-menu" class="hidden" role="tabpanel" aria-labelledby="appetizers-menu-item">
                                <div class="grid grid-cols-1">
                                    <div class="swiper menu-swiper w-full h-full">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/appetizer-1.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Veg Salad</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 12.78</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/appetizer-2.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Chicken Skewers </h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 31.00</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/appetizer-3.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Nachos Salsa Dip</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 22.99</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                            <div class="swiper-slide">
                                                <div class="relative rounded-lg overflow-hidden cursor-pointer">
                                                    <img src="/images/home/banner/appetizer-4.png" class="h-full w-full">
                                                    <div class="absolute inset-0 bg-default-950/20">
                                                        <div class="inline-flex items-end h-full w-full">
                                                            <div class="p-6">
                                                                <h5 class="text-xl font-medium text-white mb-2">Paneer tikka Skewers</h5>
                                                                <h5 class="text-xl font-semibold text-white mb-2"><span class="text-base font-medium text-yellow-400">$</span> 18.82</h5>
                                                                <a href="{{ route('second', ['client', 'product-grid']) }}" class="inline-flex items-center text-white border-b border-dashed border-white">Order Now <i data-lucide="chevron-right" class="h-5 w-5"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end slide -->
                                        </div>
                                    </div><!-- end pizza menu slider -->
                                </div><!--end grid-->
                            </div>
                            <!-- end appetizers-menu -->
                        </div>
                    </div>

                    <div class="lg:flex items-center gap-1 absolute !-top-10 !end-15 hidden">
                        <div class="swiper-button-next after:content-[] h-12 w-12 flex justify-center items-center rounded-full text-white bg-primary transition-all">
                            <i class="fa-solid fa-angle-left"></i>
                        </div>
                        <div class="swiper-button-prev after:content-[] h-12 w-12 flex justify-center items-center rounded-full text-white bg-primary transition-all">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>


                    <div class="lg:flex hidden">
                        <div class="swiper-pagination !bottom-12 !start-0"></div>

                        <span class="absolute bottom-0 start-1/4 z-10">
                            <img src="/images/home/onion.png">
                        </span>
                        <span class="absolute -bottom-12 -end-0 z-10">
                            <img src="/images/home/leaf.png">
                        </span>
                    </div>
                </div><!-- end menu-sliders -->
            </div>
        </div>
    </div><!-- end container -->
</section> --}}

<!-- Testimonials Section -->
{{-- <section class="lg:py-16 py-6">
    <div class="container">
        <div class="grid lg:grid-cols-2 grid-cols-1 items-center gap-20">
            <div>
                <div class="relative">
                    <img src="/images/home/testimonial-img.png" class="lg:mx-0 mx-auto">

                    <div class="absolute -bottom-10 end-20">
                        <div class="bg-white shadow-lg rounded-xl dark:bg-default-100">
                            <div class="p-6">
                                <h6 class="text-base font-semibold text-default-900 mb-2">Our Reviewers</h6>
                                <div class="flex items-center justify-center -space-x-1">
                                    <div class="h-12 w-12">
                                        <img class="h-full w-full rounded-full object-cover object-center ring ring-default-100" src="/images/avatars/avatar1.png" />
                                    </div>
                                    <div class="h-12 w-12">
                                        <img class="h-full w-full rounded-full object-cover object-center ring ring-default-100" src="/images/avatars/avatar2.png" />
                                    </div>
                                    <div class="h-12 w-12">
                                        <img class="h-full w-full rounded-full object-cover object-center ring ring-default-100" src="/images/avatars/avatar3.png" />
                                    </div>
                                    <div class="flex h-12 w-12 items-center justify-center overflow-hidden rounded-full bg-primary text-default-50 font-medium ring ring-default-100">
                                        <span class="text-base"> 12K </span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end Reviewers -->
                    </div>
                </div>
            </div>

            <div>
                <span class="inline-flex py-2 px-4 text-sm text-primary rounded-full bg-primary/20 mb-6">Testimonials</span>
                <h2 class="text-3xl font-semibold text-default-900 max-w-xl mb-4">What They Say About Us.</h2>

                <div class="product-img-slider sticky-side-div">
                    <div class="swiper clients-testimonial p-2 ">
                        <div class="swiper-wrapper mb-4">
                            <div class="swiper-slide">
                                <div class="relative cursor-pointer">
                                    <div class="flex items-center gap-3 mb-12">
                                        <img src="/images/avatars/avatar1.png" class="h-12 w-12 rounded-full">
                                        <div class="">
                                            <h6 class="text-base/none font-medium text-default-900 mb-2">Madelyn Baptista</h6>
                                            <div class="flex gap-1.5">
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="relative px-12">
                                        <div class="absolute -top-5 start-0">
                                            <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary rotate-180"></i>
                                        </div>
                                        <div class="absolute -bottom-5 end-0">
                                            <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary"></i>
                                        </div>
                                        <p class="text-base text-default-400 font-medium">Food is the best. Besides the many and delicious meals, the service is also very good, especially in the very fast delivery. I highly recommend Food to you.</p>
                                    </div>
                                </div>
                            </div><!-- end slide -->
                            <div class="swiper-slide">
                                <div class="relative cursor-pointer">
                                    <div class="flex items-center gap-3 mb-12">
                                        <img src="/images/avatars/avatar1.png" class="h-12 w-12 rounded-full">
                                        <div class="">
                                            <h6 class="text-base/none font-medium text-default-900 mb-2">Marc Y. Sellers</h6>
                                            <div class="flex gap-1.5">
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative px-12">
                                        <div class="absolute -top-5 start-0">
                                            <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary rotate-180"></i>
                                        </div>
                                        <div class="absolute -bottom-5 end-0">
                                            <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary"></i>
                                        </div>
                                        <p class="text-base text-default-400 font-medium">Food is the best. Besides the many and delicious meals, the service is also very good, especially in the very fast delivery. I highly recommend Food to you.</p>
                                    </div>
                                </div>
                            </div><!-- end slide -->
                            <div class="swiper-slide">
                                <div class="relative cursor-pointer">
                                    <div class="flex items-center gap-3 mb-12">
                                        <img src="/images/avatars/avatar1.png" class="h-12 w-12 rounded-full">
                                        <div class="">
                                            <h6 class="text-base/none font-medium text-default-900 mb-2">Nancy C. Hunter</h6>
                                            <div class="flex gap-1.5">
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative px-12">
                                        <div class="absolute -top-5 start-0">
                                            <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary rotate-180"></i>
                                        </div>
                                        <div class="absolute -bottom-5 end-0">
                                            <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary"></i>
                                        </div>
                                        <p class="text-base text-default-400 font-medium">Food is the best. Besides the many and delicious meals, the service is also very good, especially in the very fast delivery. I highly recommend Food to you.</p>
                                    </div>
                                </div>
                            </div><!-- end slide -->
                            <div class="swiper-slide">
                                <div class="relative cursor-pointer">
                                    <div class="flex items-center gap-3 mb-12">
                                        <img src="/images/avatars/avatar1.png" class="h-12 w-12 rounded-full">
                                        <div class="">
                                            <h6 class="text-base/none font-medium text-default-900 mb-2">Jeannette C. Siebert</h6>
                                            <div class="flex gap-1.5">
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                                <button><i data-lucide="star" class="h-4 w-4 text-yellow-400 fill-yellow-400"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative px-12">
                                        <div class="absolute -top-5 start-0">
                                            <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary rotate-180"></i>
                                        </div>
                                        <div class="absolute -bottom-5 end-0">
                                            <i data-lucide="quote" class="h-8 w-8 text-primary fill-primary"></i>
                                        </div>
                                        <p class="text-base text-default-400 font-medium">Food is the best. Besides the many and delicious meals, the service is also very good, especially in the very fast delivery. I highly recommend Food to you.</p>
                                    </div>
                                </div>
                            </div><!-- end slide -->
                        </div>
                    </div>
                    <div class="swiper h-24 clients-testimonial-pagination relative !mt-6">
                        <div class="swiper-wrapper ps-12 !py-6 space-x-2">
                            <div class="swiper-slide cursor-pointer !w-12 !h-12">
                                <img src="/images/avatars/avatar1.png" class="h-12 w-12 rounded-full">
                            </div>
                            <div class="swiper-slide cursor-pointer !w-12 !h-12">
                                <img src="/images/avatars/avatar2.png" class="h-12 w-12 rounded-full">
                            </div>
                            <div class="swiper-slide cursor-pointer !w-12 !h-12">
                                <img src="/images/avatars/avatar3.png" class="h-12 w-12 rounded-full">
                            </div>
                            <div class="swiper-slide cursor-pointer !w-12 !h-12">
                                <img src="/images/avatars/avatar4.png" class="h-12 w-12 rounded-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!-- Offer Section -->
{{-- <section class="lg:py-28 py-10 relative bg-no-repeat bg-cover bg-[url(/images/home/offer-bg.png)]">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="container">
        <div class="relative lg:w-1/2 w-full">
            <h4 class="font-handrawn text-2xl text-yellow-500 mb-6">Special Combo Offer</h4>
            <h2 class="text-4xl font-semibold text-white mb-8">We make best Food in your town</h2>
            <p class="text-base text-white/75 max-w-2xl mb-10">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            <div class="inline-flex flex-wrap items-center justify-center gap-4">
                <a href="javascript:void(0)" class="py-4 px-10 font-medium text-white bg-primary rounded-full hover:bg-primary-500 transition-all">Get started</a>
                <h4 class="text-yellow-400 font-medium text-2xl">$23.47 <span class="text-lg line-through text-white/75">$44.99</span></h4>
            </div>

            <div class="absolute end-0 lg:-bottom-16 bottom-10">
                <img src="/images/home/offer-popup.svg" class="lg:w-auto w-20">
            </div>
        </div>
    </div><!-- end container -->
</section> --}}

{{-- <!-- Download App Section -->
<section class="lg:py-16 py-6">
    <div class="container">
        <div class="bg-primary/10 rounded-lg">
            <div class="grid lg:grid-cols-2 items-center gap-6">
                <div class="relative lg:p-20 p-6 h-full">
                    <span class="absolute end-16 top-1/3 text-xl rotate-45">😃</span>
                    <span class="absolute end-0 top-1/2 text-xl rotate-45">🔥</span>
                    <span class="absolute bottom-40 end-40 h-2 w-2 inline-flex items-center justify-center bg-primary text-white rounded-full"></span>
                    <div class="hidden sm:block absolute -bottom-10 lg:bottom-10 lg:end-0 end-10">
                        <div class="bg-default-50 rounded-full p-2 shadow-lg">
                            <div class="flex items-center gap-4">
                                <div class="h-14 w-14 rounded-full overflow-hidden">
                                    <img src="/images/avatars/avatar4.png">
                                </div>
                                <div class="">
                                    <h6 class="text-base font-medium text-default-900 mb-1">Richard Watson</h6>
                                    <p class="text-sm font-medium text-default-500">Food Courier</p>
                                </div>
                                <div class="h-14 w-14 inline-flex items-center justify-center rounded-full bg-primary text-white">
                                    <i data-lucide="phone" class=""></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="inline-flex py-2 px-4 text-sm text-primary rounded-full bg-primary/20 mb-6">Download App</span>
                    <h2 class="text-3xl/relaxed font-semibold text-default-900 max-w-sm mb-6">Get Started With Us Today!</h2>
                    <p class="text-default-900 text-base max-w-md mb-10">Discover food wherever and whenever and get your food delivered quickly.</p>
                    <a href="javascript:void(0)" class="inline-flex py-4 px-10 font-medium text-white bg-primary rounded-full hover:bg-primary-500 transition-all">Get started</a>
                </div>
                <div class="relative pt-20 px-20">
                    <span class="absolute end-10 bottom-28 text-3xl -rotate-45">🔥</span>
                    <span class="absolute bottom-10 end-20 h-3 w-3 inline-flex items-center justify-center bg-primary text-white rounded-full"></span>
                    <span class="absolute top-1/4 end-10 h-2.5 w-2.5 inline-flex items-center justify-center bg-yellow-400 text-white rounded-full"></span>
                    <span class="absolute end-1/4 top-12 text-xl -rotate-45">😋</span>
                    <span class="absolute start-10 top-12 h-2 w-2 inline-flex items-center justify-center bg-primary text-white rounded-full"></span>
                    <img src="/images/home/mockup.png" class="max-w-full max-h-full">
                </div>
            </div>
        </div>
    </div>
</section> --}}


@endsection

@section('script')
@vite(['resources/js/home.js'])

<script>
// Modal switching functions
window.switchToSignup = function() {
    closeModal('loginModal');
    setTimeout(() => {
        openModal('signupModal');
    }, 250);
}

window.switchToLogin = function() {
    closeModal('signupModal');
    setTimeout(() => {
        openModal('loginModal');
    }, 250);
}

window.showForgotPassword = function() {
    alert('Forgot password functionality will be implemented soon!');
}



// Login form submission
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;
    const rememberMe = document.getElementById('remember-me').checked;

    // Basic validation
    if (!email || !password) {
        showError('Please fill in all fields');
        return;
    }

    // Email validation
    if (!isValidEmail(email)) {
        showError('Please enter a valid email address');
        return;
    }

    console.log('Login attempt:', { email, password: '***', remember: rememberMe });

    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Signing in...';
    submitBtn.disabled = true;

    // Check CSRF token
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        showError('CSRF token not found. Please refresh the page.');
        return;
    }

    // Send AJAX request to login endpoint
    const formData = new URLSearchParams({
        email: email,
        password: password,
        remember: rememberMe ? '1' : '0'
    });

    console.log('Sending login request with data:', formData.toString());
    console.log('CSRF Token:', csrfToken.getAttribute('content'));

    fetch('/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            'Cache-Control': 'no-cache'
        },
        body: formData,
        credentials: 'same-origin'
    })
    .then(response => {
        console.log('Response status:', response.status);
        console.log('Response type:', response.headers.get('content-type'));

        if (response.status === 422) {
            // Validation error
            return response.json().then(data => {
                console.log('Validation errors:', data);
                const errorMessage = data.message || 'The provided credentials do not match our records.';
                throw new Error(errorMessage);
            });
        }

        if (response.status === 419) {
            // CSRF token mismatch
            throw new Error('Session expired. Please refresh the page and try again.');
        }

        if (response.ok) {
            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                return response.json();
            } else {
                return response.text().then(text => {
                    console.log('Expected JSON but got:', text.substring(0, 500));
                    throw new Error('Server returned HTML instead of JSON. Check server logs.');
                });
            }
        } else {
            return response.text().then(text => {
                console.log('Error response text:', text.substring(0, 500));
                throw new Error(`Login failed (${response.status}): ${text.substring(0, 100)}`);
            });
        }
    })
    .then(data => {
        console.log('Login response data:', data);

        if (data.success) {
            // Close modal
            closeModal('loginModal');

            // Show success message
            const welcomeMessage = data.user && data.user.role === 'admin'
                ? 'Welcome back, Admin!'
                : 'Login successful! Welcome back.';
            showSuccess(welcomeMessage);

            console.log('User role:', data.user.role);
            console.log('Redirect URL:', data.redirect);

            // Redirect based on user role
            setTimeout(() => {
                if (data.redirect) {
                    console.log('Redirecting to:', data.redirect);
                    // Prevent redirect loops by checking current URL
                    if (window.location.pathname !== data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        console.log('Already on target page, not redirecting');
                    }
                } else {
                    console.log('No redirect URL, reloading page');
                    window.location.reload();
                }
            }, 2000); // 2 second delay to see the message
        } else {
            showError(data.message || 'Login failed. Please check your credentials.');
        }
    })
    .catch(error => {
        console.error('Login error:', error);
        showError(error.message || 'Login failed. Please check your credentials and try again.');
    })
    .finally(() => {
        // Reset button state
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    });
});

// Signup form submission
document.getElementById('signupForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const name = document.getElementById('signupName').value;
    const email = document.getElementById('signupEmail').value;
    const password = document.getElementById('signupPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const acceptTerms = document.getElementById('accept-terms').checked;

    // Basic validation
    if (!name || !email || !password || !confirmPassword) {
        showError('Please fill in all fields');
        return;
    }

    // Email validation
    if (!isValidEmail(email)) {
        showError('Please enter a valid email address');
        return;
    }

    if (password !== confirmPassword) {
        showError('Passwords do not match');
        return;
    }

    if (password.length < 8) {
        showError('Password must be at least 8 characters long');
        return;
    }

    if (!acceptTerms) {
        showError('Please accept the terms and conditions');
        return;
    }

    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Creating account...';
    submitBtn.disabled = true;

    // Send AJAX request to registration endpoint
    fetch('/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: new URLSearchParams({
            name: name,
            email: email,
            password: password,
            password_confirmation: confirmPassword
        })
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Registration failed');
        }
    })
    .then(data => {
        if (data.success) {
            // Close modal
            closeModal('signupModal');

            // Show success message
            showSuccess('Registration successful! Welcome to our restaurant.');

            // Reload page to update authentication state
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            showError(data.message || 'Registration failed. Please try again.');
        }
    })
    .catch(error => {
        console.error('Registration error:', error);
        showError('Registration failed. Please check your information and try again.');
    })
    .finally(() => {
        // Reset button state
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    });
});

// Change Password form submission
document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const currentPassword = document.getElementById('currentPassword').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmNewPassword = document.getElementById('confirmNewPassword').value;

    // Basic validation
    if (!currentPassword || !newPassword || !confirmNewPassword) {
        showError('Please fill in all fields');
        return;
    }

    if (newPassword !== confirmNewPassword) {
        showError('New passwords do not match');
        return;
    }

    if (newPassword.length < 8) {
        showError('New password must be at least 8 characters long');
        return;
    }

    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Changing password...';
    submitBtn.disabled = true;

    // Send AJAX request to change password endpoint
    fetch('/user/password', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: new URLSearchParams({
            current_password: currentPassword,
            password: newPassword,
            password_confirmation: confirmNewPassword
        })
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            return response.text().then(text => {
                console.log('Error response:', text);
                throw new Error('Password change failed');
            });
        }
    })
    .then(data => {
        if (data.success) {
            // Close modal
            closeModal('changePasswordModal');

            // Clear form
            document.getElementById('changePasswordForm').reset();

            // Show success message
            showSuccess('Password changed successfully!');
        } else {
            showError(data.message || 'Password change failed. Please try again.');
        }
    })
    .catch(error => {
        console.error('Password change error:', error);
        showError('Password change failed. Please check your current password and try again.');
    })
    .finally(() => {
        // Reset button state
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    });
});

function showLoggedInState() {
    // Hide login and signup buttons
    const loginButtons = document.querySelectorAll('[data-hs-overlay="#loginModal"], [data-hs-overlay="#signupModal"]');
    loginButtons.forEach(button => {
        button.parentElement.style.display = 'none';
    });

    // Show user dropdown
    const userDropdown = document.getElementById('userDropdown');
    if (userDropdown) {
        userDropdown.classList.remove('hidden');
    }
}

function logout() {
    // Send logout request to backend
    fetch('/logout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        // Show login and signup buttons
        const loginButtons = document.querySelectorAll('[data-hs-overlay="#loginModal"], [data-hs-overlay="#signupModal"]');
        loginButtons.forEach(button => {
            button.parentElement.style.display = 'flex';
        });

        // Hide user dropdown
        const userDropdown = document.getElementById('userDropdown');
        if (userDropdown) {
            userDropdown.classList.add('hidden');
        }

        showSuccess('Logged out successfully!');

        // Reload page to update authentication state
        setTimeout(() => {
            window.location.reload();
        }, 1000);
    })
    .catch(error => {
        console.error('Logout error:', error);
        showError('An error occurred during logout.');
    });
}

// Helper functions for showing messages
function showSuccess(message) {
    // Create and show success notification
    const notification = createNotification(message, 'success');
    document.body.appendChild(notification);

    // Remove after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

function showError(message) {
    // Create and show error notification
    const notification = createNotification(message, 'error');
    document.body.appendChild(notification);

    // Remove after 5 seconds
    setTimeout(() => {
        notification.remove();
    }, 5000);
}

function createNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg max-w-sm ${
        type === 'success'
            ? 'bg-green-500 text-white'
            : 'bg-red-500 text-white'
    }`;
    notification.innerHTML = `
        <div class="flex items-center">
            <span class="mr-2">${type === 'success' ? '✓' : '✗'}</span>
            <span>${message}</span>
        </div>
    `;
    return notification;
}

// Email validation function
function isValidEmail(email) {
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailRegex.test(email);
}

// Update wishlist count (similar to cart count)
function updateWishlistCount() {
    // You can implement this to fetch wishlist count from backend
    // For now, it will show 0 as default
    const wishlistCount = document.querySelector('.wishlist-count');
    if (wishlistCount) {
        // This would typically be fetched from your backend
        // wishlistCount.textContent = actualWishlistCount;
    }
}

// Close modal when clicking outside
document.addEventListener('click', function(e) {
    const loginModal = document.getElementById('loginModal');
    const signupModal = document.getElementById('signupModal');

    // Check if click is on the backdrop (not the modal content)
    if (e.target === loginModal || e.target === loginModal?.querySelector('div')) {
        closeModal('loginModal');
    }

    if (e.target === signupModal || e.target === signupModal?.querySelector('div')) {
        closeModal('signupModal');
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal('loginModal');
        closeModal('signupModal');
    }
});

// Modal functions - Global
window.openModal = function(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        // Add fade-in animation
        setTimeout(() => {
            const modalContent = modal.querySelector('div > div');
            if (modalContent) {
                modalContent.style.opacity = '1';
                modalContent.style.transform = 'scale(1)';
            }
        }, 10);
    }
}

window.closeModal = function(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        const modalContent = modal.querySelector('div > div');
        if (modalContent) {
            modalContent.style.opacity = '0';
            modalContent.style.transform = 'scale(0.95)';
        }

        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 200);
    }
}

// Initialize modal styles
document.addEventListener('DOMContentLoaded', function() {
    console.log('Modal functions loaded:', {
        openModal: typeof window.openModal,
        closeModal: typeof window.closeModal,
        switchToSignup: typeof window.switchToSignup,
        switchToLogin: typeof window.switchToLogin
    });

    const modals = document.querySelectorAll('#loginModal, #signupModal, #changePasswordModal');
    modals.forEach(modal => {
        const modalContent = modal.querySelector('div > div');
        if (modalContent) {
            modalContent.style.opacity = '0';
            modalContent.style.transform = 'scale(0.95)';
            modalContent.style.transition = 'opacity 0.2s ease-out, transform 0.2s ease-out';
        }
    });

    // Add click outside to close
    modals.forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                const modalId = modal.id;
                closeModal(modalId);
            }
        });
    });

    // Add ESC key to close
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            modals.forEach(modal => {
                if (!modal.classList.contains('hidden')) {
                    closeModal(modal.id);
                }
            });
        }
    });
});
</script>
@endsection
