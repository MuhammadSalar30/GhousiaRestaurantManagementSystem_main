@extends('layouts.admin', ['subtitle' => "Admin", 'title' => "Wallet"])

@section('content')

<div class="grid xl:grid-cols-4 gap-6">
    <div class="xl:col-span-3">
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-6 mb-6">
            <div class="lg:col-span-2">
                <div class="border border-default-200 rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-default-800 mb-6">Card Details</h3>
                        <div class="grid lg:grid-cols-3 grid-cols-1 gap-x-6 gap-y-10 divide-y divide-default-200 lg:divide-y-0 lg:divide-x">
                            <div class="lg:col-span-2 col-span-1">
                                <div class="relative">
                                    <div class="swiper card-wallet mb-6 md:mx-6">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="rounded-lg overflow-hidden bg-cover bg-right-bottom bg-no-repeat bg-indigo-600/80 bg-[url(/images/payment/wallate-card-bg.png)]">
                                                    <div class="p-6">
                                                        <div class="mb-8">
                                                            <div class="h-11 w-16 overflow-hidden">
                                                                <img src="/images/payment/visa.svg" class="max-w-full h-full">
                                                            </div>
                                                        </div>
                                                        <div class="mb-6">
                                                            <div class="flex items-center justify-between mb-9">
                                                                <div class="flex items-end h-8">
                                                                    <img src="/images/payment/card-chip.png" class="max-w-full h-full">
                                                                </div>
                                                                <div class="flex gap-4">
                                                                    <span class="text-xl text-white font-semibold font-sans tracking-widest">0123</span> <span class="text-xl text-white font-semibold font-sans tracking-widest">2345</span> <span class="text-xl text-white font-semibold font-sans tracking-widest">4567</span> <span class="text-xl text-white font-semibold font-sans tracking-widest">6789</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center justify-between">
                                                            <div class="w-1/2">
                                                                <p class="text-base text-white mb-0.5">Card Holder</p>
                                                                <h3 class="text-lg font-semibold text-white uppercase">Kierra Madsen</h3>
                                                            </div>
                                                            <div class="w-1/2">
                                                                <p class="text-base text-white mb-0.5">Expire Date</p>
                                                                <h3 class="text-lg font-semibold text-white">10/28</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="swiper-slide">
                                                <div class="rounded-lg overflow-hidden bg-cover bg-right-bottom bg-no-repeat bg-red-600/80 bg-[url(/images/payment/wallate-card-bg.png)]">
                                                    <div class="p-6">
                                                        <div class="mb-8">
                                                            <div class="h-11 w-16 overflow-hidden">
                                                                <img src="/images/payment/master.svg" class="max-w-full h-full">
                                                            </div>
                                                        </div>
                                                        <div class="mb-6">
                                                            <div class="flex items-center justify-between mb-9">
                                                                <div class="flex items-end h-8">
                                                                    <img src="/images/payment/card-chip.png" class="max-w-full h-full">
                                                                </div>
                                                                <div class="flex gap-4">
                                                                    <span class="text-xl text-white font-semibold font-sans tracking-widest">0123</span> <span class="text-xl text-white font-semibold font-sans tracking-widest">2345</span> <span class="text-xl text-white font-semibold font-sans tracking-widest">4567</span> <span class="text-xl text-white font-semibold font-sans tracking-widest">6789</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center justify-between">
                                                            <div class="w-1/2">
                                                                <p class="text-base text-white mb-0.5">Card Holder</p>
                                                                <h3 class="text-lg font-semibold text-white uppercase">Kierra Madsen</h3>
                                                            </div>
                                                            <div class="w-1/2">
                                                                <p class="text-base text-white mb-0.5">Expire Date</p>
                                                                <h3 class="text-lg font-semibold text-white">10/28</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="swiper-slide">
                                                <div class="rounded-lg overflow-hidden bg-cover bg-right-bottom bg-no-repeat bg-primary/80 bg-[url(/images/payment/wallate-card-bg.png)]">
                                                    <div class="p-6">
                                                        <div class="mb-8">
                                                            <div class="h-11 w-16 overflow-hidden">
                                                                <img src="/images/payment/rupay.svg" class="max-w-full h-full">
                                                            </div>
                                                        </div>
                                                        <div class="mb-6">
                                                            <div class="flex items-center justify-between mb-9">
                                                                <div class="flex items-end h-8">
                                                                    <img src="/images/payment/card-chip.png" class="max-w-full h-full">
                                                                </div>
                                                                <div class="flex gap-4">
                                                                    <span class="text-xl text-white font-semibold font-sans tracking-widest">0123</span> <span class="text-xl text-white font-semibold font-sans tracking-widest">2345</span> <span class="text-xl text-white font-semibold font-sans tracking-widest">4567</span> <span class="text-xl text-white font-semibold font-sans tracking-widest">6789</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center justify-between">
                                                            <div class="w-1/2">
                                                                <p class="text-base text-white mb-0.5">Card Holder</p>
                                                                <h3 class="text-lg font-semibold text-white uppercase">Kierra Madsen</h3>
                                                            </div>
                                                            <div class="w-1/2">
                                                                <p class="text-base text-white mb-0.5">Expire Date</p>
                                                                <h3 class="text-lg font-semibold text-white">10/28</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="swiper-slide">
                                                <div class="rounded-lg overflow-hidden bg-cover bg-right-bottom bg-no-repeat bg-default-600/80 bg-[url(/images/payment/wallate-card-bg.png)]">
                                                    <div class="p-6">
                                                        <div class="mb-8">
                                                            <div class="h-11 w-16 overflow-hidden">
                                                                <img src="/images/payment/paypal.svg" class="max-w-full h-full">
                                                            </div>
                                                        </div>
                                                        <div class="mb-6">
                                                            <div class="flex items-center justify-between mb-9">
                                                                <div class="flex items-end h-8">
                                                                    <img src="/images/payment/card-chip.png" class="max-w-full h-full">
                                                                </div>
                                                                <div class="flex gap-4">
                                                                    <span class="text-xl text-white font-semibold font-sans tracking-widest">0123</span> <span class="text-xl text-white font-semibold font-sans tracking-widest">2345</span> <span class="text-xl text-white font-semibold font-sans tracking-widest">4567</span> <span class="text-xl text-white font-semibold font-sans tracking-widest">6789</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center justify-between">
                                                            <div class="w-1/2">
                                                                <p class="text-base text-white mb-0.5">Card Holder</p>
                                                                <h3 class="text-lg font-semibold text-white uppercase">Kierra Madsen</h3>
                                                            </div>
                                                            <div class="w-1/2">
                                                                <p class="text-base text-white mb-0.5">Expire Date</p>
                                                                <h3 class="text-lg font-semibold text-white">10/28</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- card-slider -->

                                    <div class="md:flex hidden items-center gap-1 w-full ">
                                        <div class="card-button-prev cursor-pointer after:content-[] absolute top-1/2 -translate-y-1/2 start-0 text-default-700">
                                            <i class="fa-solid fa-angle-left text-xl"></i>
                                        </div>
                                        <div class="card-button-next cursor-pointer after:content-[] absolute top-1/2 -translate-y-1/2 end-0 text-default-700">
                                            <i class="fa-solid fa-angle-right text-xl"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-6">
                                    <div class="space-y-2">
                                        <div class="relative flex h-2 w-full overflow-hidden rounded-full bg-default-200">
                                            <div class="w-[35%] flex h-full items-center justify-center bg-primary rounded-full text-white" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="flex flex-wrap gap-3 items-center justify-between">
                                            <div class="font-medium text-default-400">Weekly payment limit</div>
                                            <div class="text-sm font-medium text-default-950"><span class="text-default-400">$11200.10</span> / $4000</div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end grid-cols -->

                            <div class="lg:col-span-1">
                                <div class="pt-10 lg:pt-0 lg:ps-10 lg:text-end text-start">
                                    <h1 class="text-2xl font-semibold text-primary">$2850.75</h1>
                                    <p class="text-base mb-6">Current Balance</p>

                                    <h2 class="text-xl text-green-500 font-semibold">$4595.50</h2>
                                    <p class="text-base mb-6">Income</p>

                                    <h2 class="text-lg text-red-500 font-semibold mb-1">$412.40</h2>
                                    <p class="text-base mb-6">Outgoing</p>

                                    <div class="mb-4">
                                        <input type="checkbox" id="hs-basic-usage" class="relative w-[3.25rem] h-7 bg-default-200 focus:ring-0 checked:bg-none checked:!bg-primary border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 appearance-none focus:ring-transparent before:inline-block before:w-6 before:h-6 before:bg-white before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:transition before:ease-in-out before:duration-200">
                                        <label for="hs-basic-usage" class="sr-only">switch</label>
                                    </div>

                                    <p class="text-base">Deacivate card</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end grid-col -->

            <div class="lg:col-span-1">
                <div class="space-y-6">
                    <div class="border border-default-200 rounded-lg">
                        <div class="p-6">
                            <p class="text-base font-medium text-default-600 mb-6">Earning Amount</p>
                            <h3 class="text-2xl font-semibold text-default-900 mb-6">$23,568.00</h3>
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-green-500/20 text-green-500">
                                    <i data-lucide="trending-up" class="h-5 w-5"></i>
                                </span>
                                <span class="text-lg text-default-500 font-medium">23%</span>
                            </div>
                        </div>
                    </div><!-- end cad -->
                    <div class="border border-default-200 rounded-lg">
                        <div class="p-6">
                            <p class="text-base font-medium text-default-600 mb-6">Earning Amount</p>
                            <h3 class="text-2xl font-semibold text-default-900 mb-6">$5,631.50</h3>
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-red-500/20 text-red-500">
                                    <i data-lucide="trending-down" class="h-5 w-5"></i>
                                </span>
                                <span class="text-lg text-default-500 font-medium">05%</span>
                            </div>
                        </div>
                    </div><!-- end cad -->
                </div><!-- end space-y-6 -->
            </div><!-- end grid-col -->
        </div><!-- end grid -->

        <div class="grid grid-cols-1">
            <div class="border rounded-lg overflow-hidden border-default-200">
                <h2 class="text-lg text-default-800 font-semibold px-6 py-4">Transaction history</h2>

                <div class="relative overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-default-200">
                                <thead>
                                    <tr class="text-start bg-default-100">
                                        <th class="px-6 py-3 text-start text-sm font-medium text-default-800">Assets</th>
                                        <th class="px-6 py-3 text-start text-sm font-medium text-default-800">Type</th>
                                        <th class="px-6 py-3 text-start text-sm font-medium text-default-800">Date</th>
                                        <th class="px-6 py-3 text-start text-sm font-medium text-default-800">Status</th>
                                        <th class="px-6 py-3 text-start text-sm font-medium text-default-800">Amount</th>
                                    </tr><!-- end table-head-row -->
                                </thead><!-- end t-head -->
                                <tbody class="divide-y divide-default-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">Tesco Market</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">Shopping</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">13 Dec 2020</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-500">Credit</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">$75.67</td>
                                    </tr><!-- end table-row -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">Ann Marlin</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">Shopping</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">31 Nov 2020</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-500">Debit</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">$430</td>
                                    </tr><!-- end table-row -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">John Mathew Kayne</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">Sport</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">06 Dec 2020</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-500">Debit</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">$350</td>
                                    </tr><!-- end table-row -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">Fiorgio Restaurant</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">Food</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">07 Dec 2020</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-yellow-500">Refund</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">$19.50</td>
                                    </tr><!-- end table-row -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">ElectroMen Market</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">Shopping</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">14 Dec 2020</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-500">Credit</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">$250.00</td>
                                    </tr><!-- end table-row -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">Ann Marlin</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">Grocery</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">31 Nov 2020</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-500">Credit</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-600">$430</td>
                                    </tr><!-- end table-row -->
                                </tbody><!-- end t-body -->
                            </table><!-- end table -->
                        </div><!-- end overflo-hidden -->
                    </div><!-- end table-responsive -->
                </div><!-- end overflo-x-auto -->
            </div>
        </div>
    </div><!-- end grid-col -->

    <div class="xl:col-span-1">
        <div class="border border-default-200 rounded-lg">
            <div class="p-6">
                <div class="bg-white rounded-lg shadow dark:bg-default-100 border border-default-100 mb-6">
                    <div class="p-4 w-full">
                        <span class="flex items-center justify-start gap-4 w-full">
                            <span class="shrink">
                                <span class="inline-flex h-12 w-12 rounded-full overflow-hidden">
                                    <img src="/images/avatars/avatar3.png" class="max-w-full h-full rounded-full">
                                </span>
                            </span>
                            <div class="flex items-center w-full">
                                <span class="grow text-start">
                                    <span class="block text-lg font-medium text-default-950">Kaiya Botosh</span>
                                    <span class="block text-xs font-medium text-default-950">demoexample@mail.com</span>
                                </span>
                                <span class="shrink"><i data-lucide="chevron-down" class="h-5 w-5"></i></span>
                            </div>
                        </span>
                    </div>
                </div><!-- end flex -->

                <div class="text-center mb-6">
                    <h6 class="text-lg text-default-600 font-semibold mb-2">Total Balance</h6>
                    <h3 class="text-3xl text-default-900 font-semibold mb-2">$81,957.50</h3>
                    <div class="flex items-center justify-center gap-2 mb-6">
                        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-green-500/20 text-green-500">
                            <i data-lucide="trending-up" class="h-4 w-4"></i>
                        </span>
                        <span class="text-base text-default-500 font-medium">23.47%</span>
                    </div><!-- end flex -->
                    <div class="flex items-center justify-center flex-wrap gap-4">
                        <button class="flex items-center justify-center gap-2 rounded-full border border-primary bg-primary px-10 py-3 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:border-primary-700 hover:bg-primary-500">Send</button>
                        <button class="flex items-center justify-center gap-2 rounded-full border border-primary bg-primary px-10 py-3 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:border-primary-700 hover:bg-primary-500">Received</button>
                    </div><!-- end flex -->
                </div><!-- end text-center -->

                <div class="bg-white rounded-lg shadow dark:bg-default-100 border border-default-100 mb-6">
                    <div class="p-4">
                        <h6 class="text-lg text-default-900 font-semibold mb-3">Quick transfer</h6>
                        <div class="flex flex-wrap 2xl:flex-nowrap items-center gap-2 mb-6">
                            <div class="flex flex-col items-center gap-1 cursor-pointer">
                                <div class="h-12 w-12">
                                    <img src="/images/avatars/avatar3.png" class="rounded-full">
                                </div>
                                <p class="text-xs font-medium text-default-700">Hanna</p>
                            </div><!-- end flex -->
                            <div class="flex flex-col items-center gap-1 cursor-pointer">
                                <div class="h-12 w-12">
                                    <img src="/images/avatars/avatar4.png" class="rounded-full">
                                </div>
                                <p class="text-xs font-medium text-default-700">Alena</p>
                            </div><!-- end flex -->
                            <div class="flex flex-col items-center gap-1 cursor-pointer">
                                <div class="h-12 w-12">
                                    <img src="/images/avatars/avatar6.png" class="rounded-full">
                                </div>
                                <p class="text-xs font-medium text-default-700">Angel</p>
                            </div><!-- end flex -->
                            <div class="flex flex-col items-center gap-1 cursor-pointer">
                                <div class="h-12 w-12">
                                    <img src="/images/avatars/avatar5.png" class="rounded-full">
                                </div>
                                <p class="text-xs font-medium text-default-700">Jhon</p>
                            </div><!-- end flex -->
                            <div class="flex flex-col items-center gap-1 cursor-pointer">
                                <div class="h-12 w-12">
                                    <img src="/images/avatars/avatar1.png" class="rounded-full">
                                </div>
                                <p class="text-xs font-medium text-default-700">Jocelyn</p>
                            </div><!-- end flex -->
                        </div><!-- end flex -->
                        <div class="flex items-center gap-3">
                            <div class="grow">
                                <input type="text" class="py-2.5 px-4 block w-full bg-transparent border-default-200 rounded-full text-sm focus:border-default-200 focus:ring-0" placeholder="0">
                            </div><!-- end grow -->
                            <div class="shrink">
                                <button class="flex items-center justify-center gap-2 rounded-full border border-primary bg-primary px-10 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:border-primary-700 hover:bg-primary-500">Send</button>
                            </div><!-- end shrink -->
                        </div><!-- end flex -->
                    </div>
                </div><!-- end card -->

                <div class="">
                    <h6 class="relative inline-block text-lg text-default-900 font-semibold mb-3">Notifications <span class="absolute top-1 start-full inline-flex items-center w-2 h-2 rounded-full bg-primary"></span></h6>

                    <div class="flex items-start flex-wrap sm:flex-nowrap gap-4 w-full mb-4">
                        <div class="shrink">
                            <span class="inline-flex h-12 w-12 rounded-full overflow-hidden">
                                <img src="/images/avatars/avatar3.png" class="max-w-full h-full rounded-full">
                            </span>
                        </div>
                        <div class="flex items-center w-full">
                            <span class="grow text-start">
                                <span class="block text-lg font-medium text-default-900">Madelyn Torff</span>
                                <span class="block text-xs font-medium text-default-600 mb-0.5">Just sent you $500</span>
                                <span class="inline-block text-xs font-medium text-primary border-b border-primary">Click for more detail</span>
                            </span>
                            <span class="text-sm text-default-800 font-medium shrink">Just now</span>
                        </div>
                    </div>
                    <div class="flex items-start flex-wrap sm:flex-nowrap gap-4 w-full mb-4">
                        <div class="shrink">
                            <span class="inline-flex items-center justify-center h-12 w-12 bg-yellow-500/20 text-yellow-500 rounded-full overflow-hidden">
                                <i data-lucide="wallet" class="h-6 w-6 "></i>
                            </span>
                        </div>
                        <div class="flex items-center w-full">
                            <span class="grow text-start">
                                <span class="block text-lg font-medium text-default-900">Madelyn Torff</span>
                                <span class="block text-xs font-medium text-default-600 mb-0.5">Just sent you $500</span>
                            </span>
                            <span class="text-sm text-default-800 font-medium shrink">Just now</span>
                        </div>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="javascript:void(0)" class="flex items-center justify-center gap-2 rounded-full border border-primary bg-primary px-6 py-2.5 text-center text-xs font-semibold text-white shadow-sm transition-all duration-200 hover:border-primary-700 hover:bg-primary-500">Pay now</a>
                        <a href="javascript:void(0)" class="flex items-center justify-center gap-2 rounded-full border border-primary px-6 py-2.5 text-center text-xs font-semibold text-primary shadow-sm transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">Later</a>
                    </div>
                </div>
            </div><!-- end p-6 -->
        </div><!-- end card -->
    </div><!-- end grid-col -->
</div>
<!-- end grid -->

@endsection

@section('script')
  @vite(['resources/js/admin-wallet.js'])
@endsection
