@extends('layouts.default', ['title' => 'Faqs'])

@section('content')

@include('layouts.shared/page-title', ['title' => 'FAQs'] )

<section class="lg:py-16 py-6">
    <div class="container">
        <h1 class="text-4xl font-medium text-default-800 mb-6">Frequently Asked Questions</h1>
        <div class="grid lg:grid-cols-6 gap-10">
            <div class="lg:col-span-4">
                <div class="hs-accordion-group space-y-4">
                    <div class="hs-accordion hs-accordion-active:shadow-[0px_8px_20px_0px_rgba(0,0,0,0.1)] hs-accordion-active:border-primary rounded-lg border border-default-200 overflow-hidden active" id="faq-1">
                        <button class="hs-accordion-active:bg-primary hs-accordion-active:text-white hs-accordion-toggle capitalize px-6 py-4 inline-flex items-center justify-between gap-x-3 w-full text-left text-default-950 transition-all" aria-controls="faq-accordion-1">
                            <h5 class="text-base font-semibold">
                                How to contact with Customer Service?
                            </h5>
                            <div class="hs-accrdion-active:text-white inline-flex items-center justify-center rounded-full">
                                <i data-lucide="plus" class="w-4 h-4 block hs-accordion-active:hidden"></i>
                                <i data-lucide="minus" class="w-4 h-4 hidden hs-accordion-active:block"></i>
                            </div>
                        </button>
                        <div id="faq-accordion-1" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300" aria-labelledby="faq-1">
                            <div class="px-6 py-4">
                                <p class="text-default-600 text-sm font-medium mb-4">
                                    Nulla malesuada iaculis nisi, vitae sagittis lacus laoreet in. Morbi aliquet pulvinar orci non vulputate. Donec aliquet ullamcorper gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed molestie accumsan dui, non iaculis magna mattis id. Ut consectetur massa at viverra euismod. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent eget sem purus.
                                </p>
                                <ul class="list-disc ps-6 text-default-600">
                                    <li class="mb-1">Vivamus sed est non arcu porta aliquet et vitae nulla.</li>
                                    <li class="mb-1">Integer et lacus vitae justo fermentum rutrum. In nec ultrices massa.</li>
                                    <li class="mb-1">Proin blandit nunc risus, at semper turpis sagittis nec.</li>
                                    <li class="mb-1">Quisque ut dolor erat.</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end accordion-item -->

                    <div class="hs-accordion hs-accordion-active:shadow-[0px_8px_20px_0px_rgba(0,0,0,0.1)] hs-accordion-active:border-primary rounded-lg border border-default-200 overflow-hidden" id="faq-2">
                        <button class="hs-accordion-active:bg-primary hs-accordion-active:text-white hs-accordion-toggle capitalize px-6 py-4 inline-flex items-center justify-between gap-x-3 w-full text-left text-default-950 transition-all" aria-controls="faq-2">
                            <h5 class="text-base font-semibold">
                                Website response taking time, how to improve?
                            </h5>
                            <div class="hs-accrdion-active:text-white inline-flex items-center justify-center rounded-full">
                                <i data-lucide="plus" class="w-4 h-4 block hs-accordion-active:hidden"></i>
                                <i data-lucide="minus" class="w-4 h-4 hidden hs-accordion-active:block"></i>
                            </div>
                        </button>
                        <div id="faq-2" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="faq-2">
                            <div class="px-6 py-4">
                                <p class="text-default-600 text-sm font-medium mb-4">
                                    Nulla malesuada iaculis nisi, vitae sagittis lacus laoreet in. Morbi aliquet pulvinar orci non vulputate. Donec aliquet ullamcorper gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed molestie accumsan dui, non iaculis magna mattis id. Ut consectetur massa at viverra euismod. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent eget sem purus.
                                </p>
                                <ul class="list-disc ps-6 text-default-600">
                                    <li class="mb-1">Vivamus sed est non arcu porta aliquet et vitae nulla.</li>
                                    <li class="mb-1">Integer et lacus vitae justo fermentum rutrum. In nec ultrices massa.</li>
                                    <li class="mb-1">Proin blandit nunc risus, at semper turpis sagittis nec.</li>
                                    <li class="mb-1">Quisque ut dolor erat.</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end accordion-item -->

                    <div class="hs-accordion hs-accordion-active:shadow-[0px_8px_20px_0px_rgba(0,0,0,0.1)] hs-accordion-active:border-primary rounded-lg border border-default-200 overflow-hidden" id="faq-3">
                        <button class="hs-accordion-active:bg-primary hs-accordion-active:text-white hs-accordion-toggle capitalize px-6 py-4 inline-flex items-center justify-between gap-x-3 w-full text-left text-default-950 transition-all" aria-controls="faq-3">
                            <h5 class="text-base font-semibold">
                                In elementum est a ante sodales iaculis.
                            </h5>
                            <div class="hs-accrdion-active:text-white inline-flex items-center justify-center rounded-full">
                                <i data-lucide="plus" class="w-4 h-4 block hs-accordion-active:hidden"></i>
                                <i data-lucide="minus" class="w-4 h-4 hidden hs-accordion-active:block"></i>
                            </div>
                        </button>
                        <div id="faq-3" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="faq-3">
                            <div class="px-6 py-4">
                                <p class="text-default-600 text-sm font-medium mb-2">
                                    Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
                                </p>
                                <ul class="list-disc ps-6 text-default-600">
                                    <li class="mb-1">Vivamus sed est non arcu porta aliquet et vitae nulla.</li>
                                    <li class="mb-1">Integer et lacus vitae justo fermentum rutrum. In nec ultrices massa.</li>
                                    <li class="mb-1">Proin blandit nunc risus, at semper turpis sagittis nec.</li>
                                    <li class="mb-1">Quisque ut dolor erat.</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end accordion-item -->

                    <div class="hs-accordion hs-accordion-active:shadow-[0px_8px_20px_0px_rgba(0,0,0,0.1)] hs-accordion-active:border-primary rounded-lg border border-default-200 overflow-hidden" id="faq-4">
                        <button class="hs-accordion-active:bg-primary hs-accordion-active:text-white hs-accordion-toggle capitalize px-6 py-4 inline-flex items-center justify-between gap-x-3 w-full text-left text-default-950 transition-all" aria-controls="faq-4">
                            <h5 class="text-base font-semibold">
                                How do I Tracking My Order?
                            </h5>
                            <div class="hs-accrdion-active:text-white inline-flex items-center justify-center rounded-full">
                                <i data-lucide="plus" class="w-4 h-4 block hs-accordion-active:hidden"></i>
                                <i data-lucide="minus" class="w-4 h-4 hidden hs-accordion-active:block"></i>
                            </div>
                        </button>
                        <div id="faq-4" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="faq-4">
                            <div class="px-6 py-4">
                                <p class="text-default-600 text-sm font-medium mb-2">
                                    Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
                                </p>
                                <p class="text-default-600 text-sm font-medium">
                                    Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.
                                </p>
                            </div>
                        </div>
                    </div><!-- end accordion-item -->

                    <div class="hs-accordion hs-accordion-active:shadow-[0px_8px_20px_0px_rgba(0,0,0,0.1)] hs-accordion-active:border-primary rounded-lg border border-default-200 overflow-hidden" id="faq-5">
                        <button class="hs-accordion-active:bg-primary hs-accordion-active:text-white hs-accordion-toggle capitalize px-6 py-4 inline-flex items-center justify-between gap-x-3 w-full text-left text-default-950 transition-all" aria-controls="faq-5">
                            <h5 class="text-base font-semibold">
                                App installation failed, how to update system information?
                            </h5>
                            <div class="hs-accrdion-active:text-white inline-flex items-center justify-center rounded-full">
                                <i data-lucide="plus" class="w-4 h-4 block hs-accordion-active:hidden"></i>
                                <i data-lucide="minus" class="w-4 h-4 hidden hs-accordion-active:block"></i>
                            </div>
                        </button>
                        <div id="faq-5" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="faq-5">
                            <div class="px-6 py-4">
                                <p class="text-default-600 text-sm font-medium mb-2">
                                    Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
                                </p>
                                <p class="text-default-600 text-sm font-medium">
                                    Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.
                                </p>
                            </div>
                        </div>
                    </div><!-- end accordion-item -->
                </div><!-- end accordion -->
            </div><!-- end grid-cols -->
            <div class="lg:col-span-2">
                <div class="bg-primary/10 rounded-lg">
                    <div class="p-8">
                        <h4 class="text-xl font-medium text-default-950 mb-2">Don’t find your answer, Ask for support.</h4>
                        <p class="text-base mb-6">Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed molestie accumsan dui, non iaculis primis in faucibu raesent eget sem purus.</p>

                        <div class="">
                            <div class="mb-4">
                                <label class="sr-only" for="EmailAddress">Email</label>
                                <input id="EmailAddress" class="block w-full bg-white dark:bg-default-50 rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200" type="email" placeholder="Email Address">
                            </div>
                            <div class="mb-4">
                                <label class="sr-only" for="subject">Subject</label>
                                <input id="subject" class="block w-full bg-white dark:bg-default-50 rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200" type="text" placeholder="Subject">
                            </div>
                            <div class="mb-4">
                                <label class="sr-only" for="message">Message (Optional)</label>
                                <textarea id="message" class="block w-full bg-white dark:bg-default-50 rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200" rows="5" type="text" placeholder="Message (Optional)"></textarea>
                            </div>
                            <div>
                                <a href="javascript:void(0)" class="py-2.5 px-10 flex justify-center w-full text-center font-medium text-white bg-primary rounded-lg hover:bg-primary-500 transition-all">Contact us</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- end grid -->
    </div>
</section>

@endsection