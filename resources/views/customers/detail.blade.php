@extends('layouts.admin', ['subtitle' => "Customers", 'title' => "Customers Details"])

@section('content')

<div class="grid lg:grid-cols-3 grid-cols-1 gap-6">
    <div class="lg:col-span-1">
        <div class="p-6 rounded-lg border border-default-200">
            <img src="/images/avatars/avatar1.png" alt="" class="w-24 rounded-full p-1 border border-gray-200 bg-gray-100 dark:bg-gray-700 dark:border-gray-600">
            <h4 class="mb-1 mt-3 text-lg">Kaiya Botosh</h4>

            <div class="text-start mt-6">
                <h4 class="text-sm uppercase mb-2.5">About Me :</h4>
                <p class="text-gray-400 mb-6">
                    Hi I'm Kaiya Botosh,has been the industry's standard dummy text ever since the
                    1500s, when an unknown printer took a galley of type.
                </p>
                <p class="text-zinc-400 mb-3"><b>Full Name :</b> <span class="ms-2">Kaiya Botosh</span></p>

                <p class="text-zinc-400 mb-3"><b>Mobile :</b><span class="ms-2">(123) 123 1234</span></p>

                <p class="text-zinc-400 mb-3"><b>Email :</b> <span class="ms-2 ">user@email.domain</span></p>

                <p class="text-zinc-400 mb-1.5"><b>Location :</b> <span class="ms-2">USA</span></p>
            </div>
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="border rounded-lg border-default-200">
            <div class="px-6 py-4">
                <div class="flex flex-wrap justify-between items-center gap-6">
                    <h4 class="text-xl font-medium text-default-900">Customer Order history</h4>

                    <div class="flex items-center">
                        <span class="text-base text-default-950 me-3">Sort By :</span>

                        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                            <button type="button" class="hs-dropdown-toggle flex items-center gap-2 font-medium text-default-950 text-sm py-2.5 px-4 xl:px-5 rounded-lg border border-default-200 transition-all">
                                All <i data-lucide="chevron-down" class="h-4 w-4"></i>
                            </button><!-- end dropdown button -->

                            <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[200px] transition-[opacity,margin] mt-4 opacity-0 hidden z-20 bg-white dark:bg-default-50 shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-lg border border-default-100 p-1.5">
                                <ul class="flex flex-col gap-1">
                                    <li><a class="flex items-center gap-3 font-normal py-2 px-3 transition-all text-default-700 bg-default-400/20 rounded" href="javascript:void(0)">All</a></li>
                                    <li><a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-400/20 rounded" href="javascript:void(0)">Refund</a></li>
                                    <li><a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-400/20 rounded" href="javascript:void(0)">Paid</a></li>
                                    <li><a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-400/20 rounded" href="javascript:void(0)">Cancel</a></li>
                                </ul><!-- end dropdown items -->
                            </div><!-- end dropdown menu -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="rounded-lg divide-y divide-default-200">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-default-200">
                                <thead class="bg-default-100">
                                    <tr class="text-start">
                                        <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Date</th>
                                        <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Order ID</th>
                                        <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800 min-w">Menu</th>
                                        <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Amount</th>
                                        <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800 min-w-[10rem]">Status</th>
                                    </tr><!-- end table-head-row -->
                                </thead><!-- end t-head -->
                                <tbody class="divide-y divide-default-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">01/Sep/22</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">#4357</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                            <div class="flex items-center gap-4">
                                                <div class="shrink">
                                                    <div class="h-11 w-11">
                                                        <img src="/images/dishes/small/pizza.png" class="max-w-full h-full">
                                                    </div>
                                                </div>
                                                <div class="grow">
                                                    <p class="text-sm text-default-500 mb-1">Veg Pizza</p>
                                                    <div class="flex items-center gap-2">
                                                        <div class="flex gap-1.5">
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                        </div>
                                                        <h6 class="text-xs text-default-500 mt-1">(54)</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$45.24</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-yellow-500/20 text-yellow-500">Refund</span>
                                        </td>
                                    </tr><!-- end table-row -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">01/Sep/22</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">#4358</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                            <div class="flex items-center gap-4">
                                                <div class="shrink">
                                                    <div class="h-11 w-11">
                                                        <img src="/images/dishes/small/bread.png" class="max-w-full h-full">
                                                    </div>
                                                </div>
                                                <div class="grow">
                                                    <p class="text-sm text-default-500 mb-1">Butter Bread</p>
                                                    <div class="flex items-center gap-2">
                                                        <div class="flex gap-1.5">
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                        </div>
                                                        <h6 class="text-xs text-default-500 mt-1">(23)</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$50.34</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-green-500/20 text-green-500">Paid</span>
                                        </td>
                                    </tr><!-- end table-row -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">04/Sep/22</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">#4360</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                            <div class="flex items-center gap-4">
                                                <div class="shrink">
                                                    <div class="h-11 w-11">
                                                        <img src="/images/dishes/small/rice.png" class="max-w-full h-full">
                                                    </div>
                                                </div>
                                                <div class="grow">
                                                    <p class="text-sm text-default-500 mb-1">Mutton Biryani</p>
                                                    <div class="flex items-center gap-2">
                                                        <div class="flex gap-1.5">
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                        </div>
                                                        <h6 class="text-xs text-default-500 mt-1">(12)</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$34.21</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-red-500/20 text-red-500">Cancel</span>
                                        </td>
                                    </tr><!-- end table-row -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">04/Sep/22</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">#4359</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                            <div class="flex items-center gap-4">
                                                <div class="shrink">
                                                    <div class="h-11 w-11">
                                                        <img src="/images/dishes/small/pizza-2.png" class="max-w-full h-full">
                                                    </div>
                                                </div>
                                                <div class="grow">
                                                    <p class="text-sm text-default-500 mb-1">Seafood Pizza</p>
                                                    <div class="flex items-center gap-2">
                                                        <div class="flex gap-1.5">
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-default-200 fill-default-200"></i></button>
                                                        </div>
                                                        <h6 class="text-xs text-default-500 mt-1">(25)</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$25.00</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-green-500/20 text-green-500">Paid</span>
                                        </td>
                                    </tr><!-- end table-row -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">07/Sep/22</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">#4361</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                            <div class="flex items-center gap-4">
                                                <div class="shrink">
                                                    <div class="h-11 w-11">
                                                        <img src="/images/dishes/small/cooki.png" class="max-w-full h-full">
                                                    </div>
                                                </div>
                                                <div class="grow">
                                                    <p class="text-sm text-default-500 mb-1">Butter Cookies</p>
                                                    <div class="flex items-center gap-2">
                                                        <div class="flex gap-1.5">
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-default-200 fill-default-200"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-default-200 fill-default-200"></i></button>
                                                        </div>
                                                        <h6 class="text-xs text-default-500 mt-1">(25)</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$49.99</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-amber-500/20 text-amber-500">Refund</span>
                                        </td>
                                    </tr><!-- end table-row -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">10/Sep/22</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">#4362</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                            <div class="flex items-center gap-4">
                                                <div class="shrink">
                                                    <div class="h-11 w-11">
                                                        <img src="/images/dishes/small/salad.png" class="max-w-full h-full">
                                                    </div>
                                                </div>
                                                <div class="grow">
                                                    <p class="text-sm text-default-500 mb-1">Fresh Salad</p>
                                                    <div class="flex items-center gap-2">
                                                        <div class="flex gap-1.5">
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-default-200 fill-default-200"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-default-200 fill-default-200"></i></button>
                                                        </div>
                                                        <h6 class="text-xs text-default-500 mt-1">(46)</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$24.19</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-amber-500/20 text-amber-500">Refund</span>
                                        </td>
                                    </tr><!-- end table-row -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">12/Sep/22</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">#4363</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                            <div class="flex items-center gap-4">
                                                <div class="shrink">
                                                    <div class="h-11 w-11">
                                                        <img src="/images/dishes/small/bbq.png" class="max-w-full h-full">
                                                    </div>
                                                </div>
                                                <div class="grow">
                                                    <p class="text-sm text-default-500 mb-1">Barbeque</p>
                                                    <div class="flex items-center gap-2">
                                                        <div class="flex gap-1.5">
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-default-200 fill-default-200"></i></button>
                                                        </div>
                                                        <h6 class="text-xs text-default-500 mt-1">(25)</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$15.43</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-green-500/20 text-green-500">Paid</span>
                                        </td>
                                    </tr><!-- end table-row -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">31/Aug/22</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">#4356</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                            <div class="flex items-center gap-4">
                                                <div class="shrink">
                                                    <div class="h-11 w-11">
                                                        <img src="/images/dishes/small/burger.png" class="max-w-full h-full">
                                                    </div>
                                                </div>
                                                <div class="grow">
                                                    <p class="text-sm text-default-500 mb-1">Burger</p>
                                                    <div class="flex items-center gap-2">
                                                        <div class="flex gap-1.5">
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-yellow-400 fill-yellow-400"></i></button>
                                                            <button><i data-lucide="star" class="h-5 w-5 text-default-200 fill-default-200"></i></button>
                                                        </div>
                                                        <h6 class="text-xs text-default-500 mt-1">(42)</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$28.99</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-green-500/20 text-green-500">Paid</span>
                                        </td>
                                    </tr><!-- end table-row -->
                                </tbody><!-- end t-body -->
                            </table><!-- end table -->
                        </div><!-- end overflo-hidden -->
                    </div><!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection