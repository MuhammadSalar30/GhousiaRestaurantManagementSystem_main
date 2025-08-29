@extends('layouts.admin', ['subtitle' => "Restaurant", 'title' => "Restaurant List"])

@section('content')

<div class="grid 2xl:grid-cols-4 md:grid-cols-2 gap-6 mb-6">
    <div class="relative p-6 rounded-lg border border-default-200">
        <img src="/images/restaurants/1.png" class="h-14 w-14 mx-auto mb-4">

        <h4 class="text-base uppercase font-medium text-center text-default-900">Healthy Feast Corner</h4>
        <h4 class="text-base font-medium text-center text-default-600 mb-10">Kianna Vetrovs</h4>

        <div class="flex justify-around mb-8">
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">34</h4>
                <h5 class="text-sm text-default-800">Total Product</h5>
            </div>
            <div class="border-s border-default-200"></div>
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">425</h4>
                <h5 class="text-sm text-default-800">Total Sales</h5>
            </div>
        </div>

        <div class="space-y-5 mb-6">
            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="map-pin"></i>
                </div>
                <p class="text-sm text-default-700 d">2123 Osprey the Blue Mountains, Townline,
                    Feversham, ON NOC 1CO, Canada</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="mail"></i>
                </div>
                <p class="text-sm text-default-700 d">kianna.vectrovs@mail.com</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="phone"></i>
                </div>
                <p class="text-sm text-default-700 d">(123) 456-7890</p>
            </div>
        </div>

        <a href="{{ route('second', ['restaurants', 'details']) }}" class="px-8 py-3 inline-flex rounded-full font-medium text-white bg-primary transition-all hover:bg-primary-500">View Details</a>
    </div>

    <div class="relative p-6 rounded-lg border border-default-200">
        <img src="/images/restaurants/2.png" class="h-14 w-14 mx-auto mb-4">

        <h4 class="text-base uppercase font-medium text-center text-default-900">Farmhouse Dish Heaven</h4>
        <h4 class="text-base font-medium text-center text-default-600 mb-10">Gustavo Philips</h4>

        <div class="flex justify-around mb-8">
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">12</h4>
                <h5 class="text-sm text-default-800">Total Product</h5>
            </div>
            <div class="border-s border-default-200"></div>
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">1.2k</h4>
                <h5 class="text-sm text-default-800">Total Sales</h5>
            </div>
        </div>

        <div class="space-y-5 mb-6">
            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="map-pin"></i>
                </div>
                <p class="text-sm text-default-700 d">2045 Scotch Line, Essa,
                    Ontario, L9R 1V2, Alliston, CA</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="mail"></i>
                </div>
                <p class="text-sm text-default-700 d">gustavo.philips@mail.com</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="phone"></i>
                </div>
                <p class="text-sm text-default-700 d">(123) 456-7890</p>
            </div>
        </div>

        <a href="{{ route('second', ['restaurants', 'details']) }}" class="px-8 py-3 inline-flex rounded-full font-medium text-white bg-primary transition-all hover:bg-primary-500">View Details</a>
    </div>

    <div class="relative p-6 rounded-lg border border-default-200">
        <img src="/images/restaurants/3.png" class="h-14 w-14 mx-auto mb-4">

        <h4 class="text-base uppercase font-medium text-center text-default-900">kitchen creation</h4>
        <h4 class="text-base font-medium text-center text-default-600 mb-10">Wilson Lipshutz</h4>

        <div class="flex justify-around mb-8">
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">14</h4>
                <h5 class="text-sm text-default-800">Total Product</h5>
            </div>
            <div class="border-s border-default-200"></div>
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">42</h4>
                <h5 class="text-sm text-default-800">Total Sales</h5>
            </div>
        </div>

        <div class="space-y-5 mb-6">
            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="map-pin"></i>
                </div>
                <p class="text-sm text-default-700 d">6058 Townhigh Mountains, Sideroad,
                    Clarksburg, ON.</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="mail"></i>
                </div>
                <p class="text-sm text-default-700 d">wilson.123@mail.com</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="phone"></i>
                </div>
                <p class="text-sm text-default-700 d">(123) 456-7890</p>
            </div>
        </div>

        <a href="{{ route('second', ['restaurants', 'details']) }}" class="px-8 py-3 inline-flex rounded-full font-medium text-white bg-primary transition-all hover:bg-primary-500">View Details</a>
    </div>

    <div class="relative p-6 rounded-lg border border-default-200">
        <img src="/images/restaurants/4.png" class="h-14 w-14 mx-auto mb-4">

        <h4 class="text-base uppercase font-medium text-center text-default-900">Country Cooking Cove</h4>
        <h4 class="text-base font-medium text-center text-default-600 mb-10">Marilyn Geidt</h4>

        <div class="flex justify-around mb-8">
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">53</h4>
                <h5 class="text-sm text-default-800">Total Product</h5>
            </div>
            <div class="border-s border-default-200"></div>
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">2.4k</h4>
                <h5 class="text-sm text-default-800">Total Sales</h5>
            </div>
        </div>

        <div class="space-y-5 mb-6">
            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="map-pin"></i>
                </div>
                <p class="text-sm text-default-700 d">A-67 Concession 8, Nottawasaga RD,
                    Glen Huron, Poland</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="mail"></i>
                </div>
                <p class="text-sm text-default-700 d">marilyn.geidt@mail.com</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="phone"></i>
                </div>
                <p class="text-sm text-default-700 d">(123) 456-7890</p>
            </div>
        </div>

        <a href="{{ route('second', ['restaurants', 'details']) }}" class="px-8 py-3 inline-flex rounded-full font-medium text-white bg-primary transition-all hover:bg-primary-500">View Details</a>
    </div>

    <div class="relative p-6 rounded-lg border border-default-200">
        <img src="/images/restaurants/5.png" class="h-14 w-14 mx-auto mb-4">

        <h4 class="text-base uppercase font-medium text-center text-default-900">Gourmet Flavor nook</h4>
        <h4 class="text-base font-medium text-center text-default-600 mb-10">Kaylynn Lipshutz</h4>

        <div class="flex justify-around mb-8">
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">05</h4>
                <h5 class="text-sm text-default-800">Total Product</h5>
            </div>
            <div class="border-s border-default-200"></div>
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">1.4k</h4>
                <h5 class="text-sm text-default-800">Total Sales</h5>
            </div>
        </div>

        <div class="space-y-5 mb-6">
            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="map-pin"></i>
                </div>
                <p class="text-sm text-default-700 d">2123 Osprey the Blue Mountains, Townline,
                    Feversham, ON NOC 1CO, Canada</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="mail"></i>
                </div>
                <p class="text-sm text-default-700 d">kaylynn.lipshutz@mail.com</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="phone"></i>
                </div>
                <p class="text-sm text-default-700 d">(123) 456-7890</p>
            </div>
        </div>

        <a href="{{ route('second', ['restaurants', 'details']) }}" class="px-8 py-3 inline-flex rounded-full font-medium text-white bg-primary transition-all hover:bg-primary-500">View Details</a>
    </div>

    <div class="relative p-6 rounded-lg border border-default-200">
        <img src="/images/restaurants/6.png" class="h-14 w-14 mx-auto mb-4">

        <h4 class="text-base uppercase font-medium text-center text-default-900">Culinary Craft Cabin</h4>
        <h4 class="text-base font-medium text-center text-default-600 mb-10">Jaylon Rhiel Madsen</h4>

        <div class="flex justify-around mb-8">
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">05</h4>
                <h5 class="text-sm text-default-800">Total Product</h5>
            </div>
            <div class="border-s border-default-200"></div>
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">1.4k</h4>
                <h5 class="text-sm text-default-800">Total Sales</h5>
            </div>
        </div>

        <div class="space-y-5 mb-6">
            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="map-pin"></i>
                </div>
                <p class="text-sm text-default-700 d">3,4 - Twilight Bungalows, Sideroad,
                    Clarksburg, Russia</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="mail"></i>
                </div>
                <p class="text-sm text-default-700 d">rhiel.madsen@mail.com</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="phone"></i>
                </div>
                <p class="text-sm text-default-700 d">(123) 456-7890</p>
            </div>
        </div>

        <a href="{{ route('second', ['restaurants', 'details']) }}" class="px-8 py-3 inline-flex rounded-full font-medium text-white bg-primary transition-all hover:bg-primary-500">View Details</a>
    </div>

    <div class="relative p-6 rounded-lg border border-default-200">
        <img src="/images/restaurants/7.png" class="h-14 w-14 mx-auto mb-4">

        <h4 class="text-base uppercase font-medium text-center text-default-900">Rustic Spice Shack</h4>
        <h4 class="text-base font-medium text-center text-default-600 mb-10">Rayna Herwitz</h4>

        <div class="flex justify-around mb-8">
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">15</h4>
                <h5 class="text-sm text-default-800">Total Product</h5>
            </div>
            <div class="border-s border-default-200"></div>
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">257</h4>
                <h5 class="text-sm text-default-800">Total Sales</h5>
            </div>
        </div>

        <div class="space-y-5 mb-6">
            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="map-pin"></i>
                </div>
                <p class="text-sm text-default-700 d">1003 Nusha Apartment, Townline st.,
                    Helsinki, NGC Road , Finland</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="mail"></i>
                </div>
                <p class="text-sm text-default-700 d">rusticspice123@mail.com</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="phone"></i>
                </div>
                <p class="text-sm text-default-700 d">(123) 456-7890</p>
            </div>
        </div>

        <a href="{{ route('second', ['restaurants', 'details']) }}" class="px-8 py-3 inline-flex rounded-full font-medium text-white bg-primary transition-all hover:bg-primary-500">View Details</a>
    </div>

    <div class="relative p-6 rounded-lg border border-default-200">
        <img src="/images/restaurants/8.png" class="h-14 w-14 mx-auto mb-4">

        <h4 class="text-base uppercase font-medium text-center text-default-900">Savory Bites Cafe</h4>
        <h4 class="text-base font-medium text-center text-default-600 mb-10">Terry Torff</h4>

        <div class="flex justify-around mb-8">
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">28</h4>
                <h5 class="text-sm text-default-800">Total Product</h5>
            </div>
            <div class="border-s border-default-200"></div>
            <div class="text-center">
                <h4 class="text-lg font-medium text-primary mb-2.5">357</h4>
                <h5 class="text-sm text-default-800">Total Sales</h5>
            </div>
        </div>

        <div class="space-y-5 mb-6">
            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="map-pin"></i>
                </div>
                <p class="text-sm text-default-700 d">784 Flowsome Avenue st., Shine Road,
                    Sa Francisco , USA 547215</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="mail"></i>
                </div>
                <p class="text-sm text-default-700 d">savorybitescafe24@mail.com</p>
            </div>

            <div class="flex gap-3">
                <div class="flex-shrink">
                    <i class="w-5 h-5 text-default-800" data-lucide="phone"></i>
                </div>
                <p class="text-sm text-default-700 d">(123) 456-7890</p>
            </div>
        </div>

        <a href="{{ route('second', ['restaurants', 'details']) }}" class="px-8 py-3 inline-flex rounded-full font-medium text-white bg-primary transition-all hover:bg-primary-500">View Details</a>
    </div>
</div><!-- end grid -->

<div class="flex flex-wrap justify-center md:flex-nowrap md:justify-end gap-y-6 gap-x-10">
    <nav>
        <ul class="inline-flex items-center space-x-2 rounded-md text-sm">
            <li>
                <a aria-current="page" class="inline-flex items-center justify-center h-9 w-9 border border-primary rounded-full text-white bg-primary" href="javascript:void(0)">1 </a>
            </li>
            <li>
                <a class="inline-flex items-center justify-center h-9 w-9 bg-default-100 rounded-full transition-all duration-500 text-default-800 hover:bg-primary hover:border-primary hover:text-white" href="javascript:void(0)">2 </a>
            </li>
            <li>
                <a class="inline-flex items-center justify-center h-9 w-9 bg-default-100 rounded-full transition-all duration-500 text-default-800 hover:bg-primary hover:border-primary hover:text-white" href="javascript:void(0)">...</a>
            </li>
            <li>
                <a class="inline-flex items-center justify-center h-9 w-9 bg-default-100 rounded-full transition-all duration-500 text-default-800 hover:bg-primary hover:border-primary hover:text-white" href="javascript:void(0)">9 </a>
            </li>
            <li>
                <a class="inline-flex items-center justify-center h-9 w-9 bg-default-100 rounded-full transition-all duration-500 text-default-800 hover:bg-primary hover:border-primary hover:text-white" href="javascript:void(0)">10 </a>
            </li>
        </ul><!-- end ul -->
    </nav><!-- end nav -->
</div>

@endsection