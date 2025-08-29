@extends('layouts.default', ['title' => 'Contact Us'])

@section('content')

@include('layouts.shared/page-title', ['title' => 'Contact Us'] )

<section class="lg:py-16 py-6">
    <div class="container">
        <div class="grid lg:grid-cols-5 gap-10">
            <div class="lg:col-span-2">
                <h1 class="text-2xl font-semibold text-default-800 mb-2">Contact Information</h1>
                <p class="text-sm text-default-600 max-w-xl mb-8">Loremum et malesuada fames ac ante ipsum primis in faucibus. Sed molestie accumsan dui, non iaculis.</p>

                <div class="flex items-center justify-center">
                    <img src="/images/other/contact.png" class="max-w-full h-full">
                </div>
            </div><!-- end grid-cols -->

            <div class="lg:col-span-3">
                <form>
                    <div class="grid lg:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-base/normal text-default-950 mb-2" for="firstName">First Name</label>
                            <input id="firstName" class="block w-full rounded-full py-2.5 px-4 bg-transparent dark:bg-default-50 border border-default-200 focus:ring-transparent focus:border-default-200" type="text" placeholder="First name">
                        </div>
                        <div>
                            <label class="block text-base/normal text-default-950 mb-2" for="lastName">Last Name</label>
                            <input id="lastName" class="block w-full rounded-full py-2.5 px-4 bg-transparent dark:bg-default-50 border border-default-200 focus:ring-transparent focus:border-default-200" type="text" placeholder="Last Name">
                        </div>
                        <div class="lg:col-span-2">
                            <label class="block text-base/normal text-default-950 mb-2" for="e_mail">E-mail</label>
                            <input id="e_mail" class="block w-full rounded-full py-2.5 px-4 bg-transparent dark:bg-default-50 border border-default-200 focus:ring-transparent focus:border-default-200" type="email" placeholder="Enter your email">
                        </div>
                        <div class="lg:col-span-2">
                            <label class="block text-base/normal text-default-950 mb-2" for="message">Message</label>
                            <textarea id="message" class="block w-full rounded-lg py-2.5 px-4 bg-transparent dark:bg-default-50 border border-default-200 focus:ring-transparent focus:border-default-200" rows="5" type="text" placeholder="Enter your message"></textarea>
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="inline-flex items-center justify-center px-10 py-3 rounded-full text-base font-medium bg-primary text-white capitalize transition-all hover:bg-primary-500">Send Message</a>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- end grid -->
    </div><!-- end container -->
</section>

<section class="lg:py-16 py-6">
    <div class="container">
        <div class="grid lg:grid-cols-3 gap-6">
            <div class="bg-default-400/10 rounded-lg">
                <div class="p-8">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-primary">
                            <i data-lucide="phone" class="h-5 w-5 text-primary fill-white"></i>
                        </span>
                        <h4 class="text-lg font-medium text-default-950">Call Us</h4>
                    </div>
                    <p class="text-default-500 text-sm mb-2">+1 234 XXXX 123</p>
                    <p class="text-default-500 text-sm">+1 234 XXXX 567</p>
                </div>
            </div><!-- end grid-cols -->
            <div class="bg-default-400/10 rounded-lg">
                <div class="p-8">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-primary text-white">
                            <i data-lucide="mail" class="h-5 w-5 text-primary fill-white"></i>
                        </span>
                        <h4 class="text-lg font-medium text-default-950">Email</h4>
                    </div>
                    <p class="text-default-500 text-sm mb-2">demomail123@mail.com</p>
                    <p class="text-default-500 text-sm">helpdemo123@mail.com</p>
                </div>
            </div><!-- end grid-cols -->
            <div class="bg-default-400/10 rounded-lg">
                <div class="p-8">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-primary text-white">
                            <i data-lucide="map-pin" class="h-5 w-5 text-primary fill-white"></i>
                        </span>
                        <h4 class="text-lg font-medium text-default-950">Address</h4>
                    </div>
                    <p class="text-default-500 text-sm mb-2">37125 Maya Estate Dr, Victoria Road,</p>
                    <p class="text-default-500 text-sm">Warsaw, Poland - 234834</p>
                </div>
            </div><!-- end grid-cols -->
        </div><!-- end grid -->
    </div><!-- container -->
</section>
@endsection
