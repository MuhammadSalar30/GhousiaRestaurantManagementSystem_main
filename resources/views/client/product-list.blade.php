@extends('layouts.default', ['title' => 'Product List'])

@section('content')

@include('layouts.shared/page-title', ['subtitle' => "Product", 'title' => "List"])

<section class="py-10">
    <div class="container">
        <div class="lg:flex gap-6">
            <div class="hs-overlay hs-overlay-open:translate-x-0 hidden max-w-xs lg:max-w-full lg:w-1/4 w-full -translate-x-full fixed top-0 start-0 transition-all transform h-full z-60 lg:z-auto bg-white lg:translate-x-0 lg:block lg:static lg:start-auto dark:bg-default-50" id="filter_Offcanvas" tabindex="-1">
                <div class="flex justify-between items-center py-3 px-4 border-b border-default-200 lg:hidden">
                    <h3 class="font-medium text-default-800">
                        Filter Options
                    </h3>

                    <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md text-default-500 hover:text-default-700 text-sm" data-hs-overlay="#filter_Offcanvas" type="button">
                        <span class="sr-only">Close modal</span>
                        <i class="h-5 w-5" data-lucide="x"></i>
                    </button>
                </div>

                <div class="h-[calc(100vh-128px)] overflow-y-auto lg:h-auto" data-simplebar>
                    <div class="p-6 lg:p-0 divide-y divide-default-200">
                        <div>
                            <button class="hs-collapse-toggle py-4 inline-flex justify-between items-center gap-2 transition-all uppercase font-medium text-lg text-default-900 w-full open" data-hs-collapse="#all_categories" id="hs-basic-collapse" type="button">
                                Category
                            </button>
                            <div class="hs-collapse w-full overflow-hidden transition-[height] duration-300 open" id="all_categories">
                                <div class="relative flex flex-col space-y-4 mb-6">
                                    <div class="flex items-center">
                                        <input class="form-checkbox rounded-full text-primary border-default-400 bg-transparent w-5 h-5 focus:ring-0 focus:ring-transparent ring-offset-0 cursor-pointer" id="all" name="all" type="checkbox" {{ empty($selected_categories ?? []) ? 'checked' : '' }}>
                                        <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="all">All</label>
                                    </div>

                                    @foreach(($categories ?? []) as $cat)
                                    <div class="flex items-center">
                                        <input class="form-checkbox rounded-full text-primary border-default-400 bg-transparent w-5 h-5 focus:ring-0 focus:ring-transparent ring-offset-0 cursor-pointer" id="cat_{{ $cat->id }}" name="cat_{{ $cat->id }}" type="checkbox" {{ in_array($cat->id, ($selected_categories ?? [])) ? 'checked' : '' }}>
                                        <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="cat_{{ $cat->id }}">{{ $cat->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div><!-- end category -->

                        <div>
                            <button class="hs-collapse-toggle py-4 inline-flex justify-between items-center gap-2 transition-all uppercase font-medium text-lg text-default-900 w-full open" data-hs-collapse="#price_range" id="hs-basic-collapse" type="button">
                                Price Range
                            </button>
                            <div class="hs-collapse w-full overflow-hidden transition-[height] duration-300 open" id="price_range">
                                <div class="relative flex flex-col space-y-5 mb-6">
                                    <div class="space-y-2 py-4">
                                        <div id="product-price-range"></div>

                                        <div class="flex flex-wrap xl:flex-nowrap gap-2 items-center !mt-4">
                                            <div class="inline-flex items-center justify-center whitespace-nowrap w-full xl:w-1/2 gap-1 border border-default-200 py-2 px-4 rounded-full">
                                                Min price (PKR):
                                                <input class="border-none p-0 w-10 bg-transparent focus:ring-0" id="minCost" type="text" value="{{ $min_price ?? 0 }}" />
                                            </div>
                                            <div class="inline-flex items-center justify-center whitespace-nowrap w-full xl:w-1/2 gap-1 border border-default-200 py-2 px-4 rounded-full">
                                                Max price (PKR):
                                                <input class="border-none p-0 w-10 bg-transparent focus:ring-0" id="maxCost" type="text" value="{{ $max_price ?? 5000 }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="relative flex flex-col space-y-4 mb-6">
                                        <div class="flex items-center">
                                            <input class="form-radio rounded-full text-primary border-default-400 bg-transparent w-5 h-5 focus:ring-0 focus:ring-transparent cursor-pointer" id="all_price" name="radio" type="radio">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="all_price">All
                                                Price</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input class="form-radio rounded-full text-primary border-default-400 bg-transparent w-5 h-5 focus:ring-0 focus:ring-transparent cursor-pointer" id="under_500" name="radio" type="radio">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="under_500">Under PKR 500</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input class="form-radio rounded-full text-primary border-default-400 bg-transparent w-5 h-5 focus:ring-0 focus:ring-transparent cursor-pointer" id="500_1500" name="radio" type="radio">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="500_1500">PKR 500 to 1,500</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input class="form-radio rounded-full text-primary border-default-400 bg-transparent w-5 h-5 focus:ring-0 focus:ring-transparent cursor-pointer" id="1500_3000" name="radio" type="radio">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="1500_3000">PKR 1,500 to 3,000</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input checked class="form-radio rounded-full text-primary border-default-400 bg-transparent w-5 h-5 focus:ring-0 focus:ring-transparent cursor-pointer" id="3000_5000" name="radio" type="radio">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="3000_5000">PKR 3,000 to 5,000</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input class="form-radio rounded-full text-primary border-default-400 bg-transparent w-5 h-5 focus:ring-0 focus:ring-transparent cursor-pointer" id="$500_$1,000" name="radio" type="radio">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="$500_$1,000">500 to 1,000</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input class="form-radio rounded-full text-primary border-default-400 bg-transparent w-5 h-5 focus:ring-0 focus:ring-transparent cursor-pointer" id="$1,000_$10,000" name="radio" type="radio">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="$1,000_$10,000">1,000 to 10,000</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end range -->

                        <div>
                            <button class="hs-collapse-toggle py-4 inline-flex justify-between items-center gap-2 transition-all uppercase font-medium text-lg text-default-900 w-full open" data-hs-collapse="#cafe_restaurant" id="hs-basic-collapse" type="button">
                                Popular Café / Restaurant
                            </button>
                            <div class="hs-collapse w-full overflow-hidden transition-[height] duration-300 open" id="cafe_restaurant">
                                <div class="relative flex flex-col space-y-5 mb-6">
                                    <div class="flex gap-x-6">
                                        <div class="flex items-center w-1/2">
                                            <input checked class="form-checkbox bg-transparent border-default-200 rounded text-primary focus:ring-transparent checked:bg-primary h-5 w-5 cursor-pointer" id="monginis" type="checkbox">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="monginis">Monginis</label>
                                        </div>

                                        <div class="flex items-center w-1/2">
                                            <input checked class="form-checkbox bg-transparent border-default-200 rounded text-primary focus:ring-transparent checked:bg-primary h-5 w-5 cursor-pointer" id="ferrero" type="checkbox">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="ferrero">Ferrero</label>
                                        </div>
                                    </div>
                                    <div class="flex gap-x-6">
                                        <div class="flex items-center w-1/2">
                                            <input checked class="form-checkbox bg-transparent border-default-200 rounded text-primary focus:ring-transparent checked:bg-primary h-5 w-5 cursor-pointer" id="burger_king" type="checkbox">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="burger_king">Burger
                                                King</label>
                                        </div>

                                        <div class="flex items-center w-1/2">
                                            <input class="form-checkbox bg-transparent border-default-200 rounded text-primary focus:ring-transparent checked:bg-primary h-5 w-5 cursor-pointer" id="starbucks" type="checkbox">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="starbucks">Starbucks</label>
                                        </div>
                                    </div>
                                    <div class="flex gap-x-6">
                                        <div class="flex items-center w-1/2">
                                            <input class="form-checkbox bg-transparent border-default-200 rounded text-primary focus:ring-transparent checked:bg-primary h-5 w-5 cursor-pointer" id="macDonald" type="checkbox">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="macDonald">MacDonald's</label>
                                        </div>

                                        <div class="flex items-center w-1/2">
                                            <input checked class="form-checkbox bg-transparent border-default-200 rounded text-primary focus:ring-transparent checked:bg-primary h-5 w-5 cursor-pointer" id="tim_hortons" type="checkbox">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="tim_hortons">Tim
                                                Hortons</label>
                                        </div>
                                    </div>
                                    <div class="flex gap-x-6">
                                        <div class="flex items-center w-1/2">
                                            <input class="form-checkbox bg-transparent border-default-200 rounded text-primary focus:ring-transparent checked:bg-primary h-5 w-5 cursor-pointer" id="coffee_cafe" type="checkbox">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="coffee_cafe">Coffee
                                                Café</label>
                                        </div>

                                        <div class="flex items-center w-1/2">
                                            <input class="form-checkbox bg-transparent border-default-200 rounded text-primary focus:ring-transparent checked:bg-primary h-5 w-5 cursor-pointer" id="dominos" type="checkbox">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="dominos">Dominos</label>
                                        </div>
                                    </div>
                                    <div class="flex gap-x-6">
                                        <div class="flex items-center w-1/2">
                                            <input class="form-checkbox bg-transparent border-default-200 rounded text-primary focus:ring-transparent checked:bg-primary h-5 w-5 cursor-pointer" id="café_beats" type="checkbox">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="café_beats">Café
                                                Beats</label>
                                        </div>

                                        <div class="flex items-center w-1/2">
                                            <input checked class="form-checkbox bg-transparent border-default-200 rounded text-primary focus:ring-transparent checked:bg-primary h-5 w-5 cursor-pointer" id="blaze_pizza" type="checkbox">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="blaze_pizza">Blaze
                                                Pizza</label>
                                        </div>
                                    </div>
                                    <div class="flex gap-x-6">
                                        <div class="flex items-center w-1/2">
                                            <input checked class="form-checkbox bg-transparent border-default-200 rounded text-primary focus:ring-transparent checked:bg-primary h-5 w-5 cursor-pointer" id="tgb" type="checkbox">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="tgb">TGB</label>
                                        </div>

                                        <div class="flex items-center w-1/2">
                                            <input class="form-checkbox bg-transparent border-default-200 rounded text-primary focus:ring-transparent checked:bg-primary h-5 w-5 cursor-pointer" id="red_robbin" type="checkbox">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="red_robbin">Red
                                                Robbin</label>
                                        </div>
                                    </div>
                                    <div class="flex gap-x-6">
                                        <div class="flex items-center w-1/2">
                                            <input class="form-checkbox bg-transparent border-default-200 rounded text-primary focus:ring-transparent checked:bg-primary h-5 w-5 cursor-pointer" id="nestle" type="checkbox">
                                            <label class="ps-3 inline-flex items-center text-default-600 text-sm select-none" for="nestle">Nestle</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end popular-cafe & restaurant -->

                        <div>
                            <button class="hs-collapse-toggle py-4 inline-flex justify-between items-center gap-2 transition-all uppercase font-medium text-lg text-default-900 w-full open" data-hs-collapse="#popular_tags" id="hs-basic-collapse" type="button">
                                Popular tags
                            </button>
                            <div class="hs-collapse w-full overflow-hidden transition-[height] duration-300 open" id="popular_tags">
                                <div class="relative mb-6">
                                    <div class="flex flex-wrap gap-1.5">
                                        @php $tags = collect($categories ?? [])->shuffle()->take(12); @endphp
                                        @forelse($tags as $tag)
                                            <a href="{{ route('second',['client','product-list']) }}?categories={{ $tag->id }}&min_price={{ $min_price ?? 0 }}&max_price={{ $max_price ?? 5000 }}" class="text-default-950 px-3 py-1 rounded-full border border-default-200 cursor-pointer hover:bg-primary/10 hover:text-primary hover:border-primary-500/60 transition-all">
                                                {{ $tag->name }}
                                            </a>
                                        @empty
                                            <div class="text-default-950 px-3 py-1 rounded-full border border-default-200">No Tags</div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div><!-- end popular tags -->

                        <div class="py-6">
                            <div class="relative rounded-lg bg-[url(/images/other/offer-bg.png)] bg-opacity-5 bg-center bg-cover overflow-hidden">
                                <div class="absolute inset-0 bg-primary/10 -z-10"></div>
                                <div class="p-12">
                                    <div class="flex justify-center mb-6">
                                        <img src="/images/other/filter-offer-dish.png">
                                    </div>
                                    <div class="text-center mb-10">
                                        <h3 class="text-2xl font-medium text-default-900 mb-2">
                                            Burger Combo</h3>
                                        <p class="text-sm text-default-500">Lorem ipsum dolor sit
                                            amet, consectetur adipiscing elit, sed do.</p>
                                    </div>
                                    <div class="flex items-center justify-center gap-2 w-full font-medium text-default-950 mb-6">
                                        Sort By :
                                        <span class="inline-flex items-center gap-4 text-sm py-2 px-4 xl:px-5 bg-default-50 rounded-full">
                                            PKR 59
                                        </span>
                                    </div>
                                    <button class="inline-flex items-center justify-center gap-2 w-full py-2.5 px-4 rounded-full bg-primary text-white hover:bg-primary-500 transition-all" type="button">
                                        Shop Now <i class="h-5 w-5" data-lucide="move-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block lg:hidden py-4 px-4 border-t border-default-200">
                    <a class="w-full inline-flex items-center justify-center rounded border border-primary bg-primary px-6 py-2.5 text-center text-sm font-medium text-white shadow-sm transition-all hover:border-primary-700 hover:bg-primary focus:ring focus:ring-primary/50" href="javascript:void(0)">Reset</a>
                </div>
            </div>

            <div class="lg:w-3/4">
                <div class="flex flex-wrap md:flex-nowrap items-center justify-between gap-4 mb-10">
                    <div class="flex flex-wrap md:flex-nowrap items-center gap-4">
                        <button type="button" class="inline-flex lg:hidden items-center gap-4 text-sm py-2.5 px-4 xl:px-5 rounded-full text-default-950 border border-default-200 transition-all" data-hs-overlay="#filter_Offcanvas">
                            Filter <i data-lucide="settings-2" class="h-4 w-4"></i>
                        </button>

                        <h6 class="lg:flex hidden text-default-950 text-base">Showing 1–10 of 99 results</h6>
                    </div>
                    <div class="flex items-center">
                        <span class="text-base text-default-950 me-3">Sort By :</span>
                        @php $sort = request()->query('sort', 'latest'); @endphp
                        <select id="sortSelect" class="py-2.5 px-4 xl:px-5 rounded-full border border-default-200 text-sm" onchange="applySort()">
                            <option value="rating" {{ $sort==='rating'?'selected':'' }}>Ratings / Reviews</option>
                            <option value="latest" {{ $sort==='latest'?'selected':'' }}>Latest</option>
                        </select>
                    </div>
                </div><!-- end flex -->

                <div class="grid grid-cols-1 gap-5">
@if(isset($items) && count($items))
@foreach($items as $item)
                    <div class="border border-default-200 rounded-lg p-4 hover:border-primary transition-all duration-300 drak:hover:shadow-[0px_0px_16px_0px_rgba(245,130,32,0.50)]">
                        <div class="flex flex-col md:flex-row md:items-center justify-center gap-4 relative">
                            <div class="shrink-0">
                                <div class="w-40 h-32 rounded-lg overflow-hidden">
                                    <img src="{{ $item->image ? (str_starts_with($item->image, 'http') ? $item->image : asset($item->image)) : '/images/dishes/burger.png' }}"
                                         class="w-full h-full object-cover"
                                         alt="{{ $item->name }}"
                                         onerror="this.src='/images/dishes/burger.png'">
                                </div>
                            </div>
                            <div class="flex-grow flex items-center gap-4">
                                <div class="grow">
                                    <div class="">
                                        <div class="flex items-center justify-between mb-4">
                                            <a href="{{ route('third', ['client', 'product-detail', $item->id]) }}" class="text-default-800 text-2xl font-semibold line-clamp-1 after:absolute after:inset-0">{{ $item->name }}</a>
                                            <button type="button" class="wishlist-btn h-6 w-6 transition-all relative z-10 {{ (isset($wishlist_ids) && in_array($item->id, $wishlist_ids)) ? 'text-red-500 fill-red-500' : 'text-default-200 hover:text-red-500' }}" aria-label="Wishlist" onclick="toggleWishlist({{ $item->id }}, this)">
                                                <i data-lucide="heart" class="h-6 w-6 {{ (isset($wishlist_ids) && in_array($item->id, $wishlist_ids)) ? 'fill-red-500' : '' }}"></i>
                                            </button>
                                        </div>
                                        @if(!empty($item->description))
                                        <p class="text-base text-default-600 max-w-2xl line-clamp-2 mb-6">{{ $item->description }}</p>
                                        @else
                                        <div class="mb-6"></div>
                                        @endif
                                        <div class="flex flex-wrap md:flex-nowrap items-center gap-4 mb-6">
                                            <button onclick="addToCart({{ $item->id }})" class="relative z-10 inline-flex items-center justify-center rounded-full border border-primary bg-primary px-12 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Add to cart</button>
                                            <div class="relative z-10 inline-flex justify-between border border-default-200 p-1.5 rounded-full">
                                                <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center" onclick="updateQuantity({{ $item->id }}, -1)">–</button>
                                                <input type="text" class="w-10 border-0 text-center focus:ring-0 p-0 bg-transparent text-default-950" value="1" min="1" max="100" readonly id="quantity-{{ $item->id }}">
                                                <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center" onclick="updateQuantity({{ $item->id }}, 1)">+</button>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <h4 class="font-semibold text-lg sm:text-2xl text-primary">PKR {{ number_format((float) ($item->display_price ?? $item->min_price ?? $item->price ?? 0), 0) }}</h4>
                                            <div class="flex items-center gap-2">
                                                <div class="flex gap-1.5">
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-default-200 text-default-200"></i></span>
                                                </div>
                                                <h6 class="text-xs text-default-500 mt-1">(45)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endforeach
@endif
@if(false)
                        <div class="flex flex-col md:flex-row md:items-center justify-center gap-4 relative">
                            <div class="shrink-0">
                                <div class="w-full h-full">
                                    <img src="/images/dishes/red-velvet-pastry.png" class="w-full h-full">
                                </div>
                            </div><!-- end shrink-0 -->
                            <div class="flex-grow flex items-center gap-4">
                                <div class="grow">
                                    <div class="">
                                        <div class="flex items-center justify-between mb-4">
                                            <a href="{{ route('second', ['client', 'product-detail']) }}" class="text-default-800 text-2xl font-semibold line-clamp-1 after:absolute after:inset-0">Red Velvet Pastry</a>
                                            <i data-lucide="heart" class="relative z-10 h-6 w-6 text-default-200 cursor-pointer hover:text-red-500 hover:fill-red-500"></i>
                                        </div>
                                        <p class="text-base text-default-600 max-w-2xl line-clamp-2 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                        <div class="flex flex-wrap md:flex-nowrap items-center gap-4 mb-6">
                                            <a href="{{ route('second', ['client', 'cart']) }}" class="relative z-10 inline-flex items-center justify-center rounded-full border border-primary bg-primary px-12 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Add to cart</a>
                                            <div class="relative z-10 inline-flex justify-between border border-default-200 p-1.5 rounded-full">
                                                <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center">–</button>
                                                <input type="text" class="w-10 border-0 text-center focus:ring-0 p-0 bg-transparent text-default-950" value="5" min="0" max="100" readonly="">
                                                <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center">+</button>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <h4 class="font-semibold text-lg sm:text-2xl text-primary">$15 <span class="align-baseline text-xl text-default-400 font-medium line-through">$25</span> </h4>
                                            <div class="flex items-center gap-2">
                                                <div class="flex gap-1.5">
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-default-200 text-default-200"></i></span>
                                                </div>
                                                <h6 class="text-xs text-default-500 mt-1">(45)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end grow -->
                            </div><!-- end grow -->
                        </div><!-- end flex -->
                    </div><!-- end grid-col -->

                    <div class="border border-default-200 rounded-lg p-4 hover:border-primary transition-all duration-300 drak:hover:shadow-[0px_0px_16px_0px_rgba(245,130,32,0.50)]">
                        <div class="flex flex-col md:flex-row md:items-center justify-center gap-4 relative">
                            <div class="shrink-0">
                                <div class="w-full h-full">
                                    <img src="/images/dishes/chickpea-hummus.png" class="w-full h-full">
                                </div>
                            </div><!-- end shrink-0 -->
                            <div class="flex-grow flex items-center gap-4">
                                <div class="grow">
                                    <div class="">
                                        <div class="flex items-center justify-between mb-4">
                                            <a href="{{ route('second', ['client', 'product-detail']) }}" class="text-default-800 text-2xl font-semibold line-clamp-1 after:absolute after:inset-0">Chickpea Hummus</a>
                                            <i data-lucide="heart" class="h-6 w-6 text-red-500 fill-red-500 cursor-pointer"></i>
                                        </div>
                                        <p class="text-base text-default-600 max-w-2xl line-clamp-2 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                        <div class="flex flex-wrap md:flex-nowrap items-center gap-4 mb-6">
                                            <a href="{{ route('second', ['client', 'cart']) }}" class="relative z-10 inline-flex items-center justify-center rounded-full border border-primary bg-primary px-12 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Add to cart</a>
                                            <div class="relative z-10 inline-flex justify-between border border-default-200 p-1.5 rounded-full">
                                                <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center">–</button>
                                                <input type="text" class="w-10 border-0 text-center focus:ring-0 p-0 bg-transparent text-default-950" value="1" min="0" max="100" readonly="">
                                                <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center">+</button>
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-4">
                                            <h4 class="font-semibold text-lg sm:text-2xl text-primary">$52 <span class="align-baseline text-xl text-default-400 font-medium line-through">$75</span> </h4>
                                            <div class="flex items-center gap-2">
                                                <div class="flex gap-1.5">
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                </div>
                                                <h6 class="text-xs text-default-500 mt-1">(58)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end grow -->
                            </div><!-- end grow -->
                        </div><!-- end flex -->
                    </div><!-- end grid-col -->

                    <div class="border border-default-200 rounded-lg p-4 hover:border-primary transition-all duration-300 drak:hover:shadow-[0px_0px_16px_0px_rgba(245,130,32,0.50)]">
                        <div class="flex flex-col md:flex-row md:items-center justify-center gap-4 relative">
                            <div class="shrink-0">
                                <div class="w-full h-full">
                                    <img src="/images/dishes/burger.png" class="w-full h-full">
                                </div>
                            </div><!-- end shrink-0 -->
                            <div class="flex-grow flex items-center gap-4">
                                <div class="grow">
                                    <div class="">
                                        <div class="flex items-center justify-between mb-4">
                                            <a href="{{ route('second', ['client', 'product-detail']) }}" class="text-default-800 text-2xl font-semibold line-clamp-1 after:absolute after:inset-0">Veg Burger</a>
                                            <i data-lucide="heart" class="relative z-10 h-6 w-6 text-default-200 cursor-pointer hover:text-red-500 hover:fill-red-500"></i>
                                        </div>
                                        <p class="text-base text-default-600 max-w-2xl line-clamp-2 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                        <div class="flex flex-wrap md:flex-nowrap items-center gap-4 mb-6">
                                            <a href="{{ route('second', ['client', 'cart']) }}" class="relative z-10 inline-flex items-center justify-center rounded-full border border-primary bg-primary px-12 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Add to cart</a>
                                            <div class="relative z-10 inline-flex justify-between border border-default-200 p-1.5 rounded-full">
                                                <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center">–</button>
                                                <input type="text" class="w-10 border-0 text-center focus:ring-0 p-0 bg-transparent text-default-950" value="2" min="0" max="100" readonly="">
                                                <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center">+</button>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <h4 class="font-semibold text-lg sm:text-2xl text-primary">$34 <span class="align-baseline text-xl text-default-400 font-medium line-through">$44</span> </h4>
                                            <div class="flex items-center gap-2">
                                                <div class="flex gap-1.5">
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-default-200 text-default-200"></i></span>
                                                </div>
                                                <h6 class="text-xs text-default-500 mt-1">(96)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end grow -->
                            </div><!-- end grow -->
                        </div><!-- end flex -->
                    </div><!-- end grid-col -->

                    <div class="border border-default-200 rounded-lg p-4 hover:border-primary transition-all duration-300 drak:hover:shadow-[0px_0px_16px_0px_rgba(245,130,32,0.50)]">
                        <div class="flex flex-col md:flex-row md:items-center justify-center gap-4 relative">
                            <div class="shrink-0">
                                <div class="w-full h-full">
                                    <img src="/images/dishes/steamed-dumpling.png" class="w-full h-full">
                                </div>
                            </div><!-- end shrink-0 -->
                            <div class="flex-grow flex items-center gap-4">
                                <div class="grow">
                                    <div class="">
                                        <div class="flex items-center justify-between mb-4">
                                            <a href="{{ route('second', ['client', 'product-detail']) }}" class="text-default-800 text-2xl font-semibold line-clamp-1 after:absolute after:inset-0">Steamed Dumpling</a>
                                            <i data-lucide="heart" class="relative z-10 h-6 w-6 text-default-200 cursor-pointer hover:text-red-500 hover:fill-red-500"></i>
                                        </div>
                                        <p class="text-base text-default-600 max-w-2xl line-clamp-2 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                        <div class="flex flex-wrap md:flex-nowrap items-center gap-4 mb-6">
                                            <a href="{{ route('second', ['client', 'cart']) }}" class="relative z-10 inline-flex items-center justify-center rounded-full border border-primary bg-primary px-12 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Add to cart</a>
                                            <div class="relative z-10 inline-flex justify-between border border-default-200 p-1.5 rounded-full">
                                                <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center">–</button>
                                                <input type="text" class="w-10 border-0 text-center focus:ring-0 p-0 bg-transparent text-default-950" value="2" min="0" max="100" readonly="">
                                                <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center">+</button>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <h4 class="font-semibold text-lg sm:text-2xl text-primary">$19 <span class="align-baseline text-xl text-default-400 font-medium line-through">$15</span> </h4>
                                            <div class="flex items-center gap-2">
                                                <div class="flex gap-1.5">
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                </div>
                                                <h6 class="text-xs text-default-500 mt-1">(1.2k)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end grow -->
                            </div><!-- end grow -->
                        </div><!-- end flex -->
                    </div><!-- end grid-col -->

                    <div class="border border-default-200 rounded-lg p-4 hover:border-primary transition-all duration-300 drak:hover:shadow-[0px_0px_16px_0px_rgba(245,130,32,0.50)]">
                        <div class="flex flex-col md:flex-row md:items-center justify-center gap-4 relative">
                            <div class="shrink-0">
                                <div class="w-full h-full">
                                    <img src="/images/dishes/garlic-herb-bread.png" class="w-full h-full">
                                </div>
                            </div><!-- end shrink-0 -->
                            <div class="flex-grow flex items-center gap-4">
                                <div class="grow">
                                    <div class="">
                                        <div class="flex items-center justify-between mb-4">
                                            <a href="{{ route('second', ['client', 'product-detail']) }}" class="text-default-800 text-2xl font-semibold line-clamp-1 after:absolute after:inset-0">Indian Food</a>
                                            <i data-lucide="heart" class="h-6 w-6 text-red-500 fill-red-500 cursor-pointer"></i>
                                        </div>
                                        <p class="text-base text-default-600 max-w-2xl line-clamp-2 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                        <div class="flex flex-wrap md:flex-nowrap items-center gap-4 mb-6">
                                            <a href="{{ route('second', ['client', 'cart']) }}" class="relative z-10 inline-flex items-center justify-center rounded-full border border-primary bg-primary px-12 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Add to cart</a>
                                            <div class="relative z-10 inline-flex justify-between border border-default-200 p-1.5 rounded-full">
                                                <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center">–</button>
                                                <input type="text" class="w-10 border-0 text-center focus:ring-0 p-0 bg-transparent text-default-950" value="2" min="0" max="100" readonly="">
                                                <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center">+</button>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <h4 class="font-semibold text-lg sm:text-2xl text-primary">$89 <span class="align-baseline text-xl text-default-400 font-medium line-through">$99</span> </h4>
                                            <div class="flex items-center gap-2">
                                                <div class="flex gap-1.5">
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                </div>
                                                <h6 class="text-xs text-default-500 mt-1">(4.4k)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end grow -->
                            </div><!-- end grow -->
                        </div><!-- end flex -->
                    </div><!-- end grid-col -->

                    <div class="border border-default-200 rounded-lg p-4 hover:border-primary transition-all duration-300 drak:hover:shadow-[0px_0px_16px_0px_rgba(245,130,32,0.50)]">
                        <div class="flex flex-col md:flex-row md:items-center justify-center gap-4 relative">
                            <div class="shrink-0">
                                <div class="w-full h-full">
                                    <img src="/images/dishes/hot-chocolate.png" class="w-full h-full">
                                </div>
                            </div><!-- end shrink-0 -->
                            <div class="flex-grow flex items-center gap-4">
                                <div class="grow">
                                    <div class="">
                                        <div class="flex items-center justify-between mb-4">
                                            <a href="{{ route('second', ['client', 'product-detail']) }}" class="text-default-800 text-2xl font-semibold line-clamp-1 after:absolute after:inset-0">Hot Chocolate</a>
                                            <i data-lucide="heart" class="relative z-10 h-6 w-6 text-default-200 cursor-pointer hover:text-red-500 hover:fill-red-500"></i>
                                        </div>
                                        <p class="text-base text-default-600 max-w-2xl line-clamp-2 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                        <div class="flex flex-wrap md:flex-nowrap items-center gap-4 mb-6">
                                            <a href="{{ route('second', ['client', 'cart']) }}" class="relative z-10 inline-flex items-center justify-center rounded-full border border-primary bg-primary px-12 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Add to cart</a>
                                            <div class="relative z-10 inline-flex justify-between border border-default-200 p-1.5 rounded-full">
                                                <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center">–</button>
                                                <input type="text" class="w-10 border-0 text-center focus:ring-0 p-0 bg-transparent text-default-950" value="2" min="0" max="100" readonly="">
                                                <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center">+</button>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <h4 class="font-semibold text-lg sm:text-2xl text-primary">$34 <span class="align-baseline text-xl text-default-400 font-medium line-through">$44</span> </h4>
                                            <div class="flex items-center gap-2">
                                                <div class="flex gap-1.5">
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-default-200 text-default-200"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-default-200 text-default-200"></i></span>
                                                </div>
                                                <h6 class="text-xs text-default-500 mt-1">(78)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end grow -->
                            </div><!-- end grow -->
                        </div><!-- end flex -->
                    </div><!-- end grid-col -->

                    <div class="border border-default-200 rounded-lg p-4 hover:border-primary transition-all duration-300 drak:hover:shadow-[0px_0px_16px_0px_rgba(245,130,32,0.50)]">
                        <div class="flex flex-col md:flex-row md:items-center justify-center gap-4 relative">
                            <div class="shrink-0">
                                <div class="w-full h-full">
                                    <img src="/images/dishes/spaghetti.png" class="w-full h-full">
                                </div>
                            </div><!-- end shrink-0 -->
                            <div class="flex-grow flex items-center gap-4">
                                <div class="grow">
                                    <div class="">
                                        <div class="flex items-center justify-between mb-4">
                                            <a href="{{ route('second', ['client', 'product-detail']) }}" class="text-default-800 text-2xl font-semibold line-clamp-1 after:absolute after:inset-0">Spaghetti</a>
                                            <i data-lucide="heart" class="relative z-10 h-6 w-6 text-default-200 cursor-pointer hover:text-red-500 hover:fill-red-500"></i>
                                        </div>
                                        <p class="text-base text-default-600 max-w-2xl line-clamp-2 mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                        <div class="flex flex-wrap md:flex-nowrap items-center gap-4 mb-6">
                                            <a href="{{ route('second', ['client', 'cart']) }}" class="relative z-10 inline-flex items-center justify-center rounded-full border border-primary bg-primary px-12 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-500">Add to cart</a>
                                            <div class="relative z-10 inline-flex justify-between border border-default-200 p-1.5 rounded-full">
                                                <button type="button" class="minus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center">–</button>
                                                <input type="text" class="w-10 border-0 text-center focus:ring-0 p-0 bg-transparent text-default-950" value="2" min="0" max="100" readonly="">
                                                <button type="button" class="plus flex-shrink-0 bg-default-200 text-default-800 rounded-full h-8 w-8 text-xl inline-flex items-center justify-center">+</button>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <h4 class="font-semibold text-lg sm:text-2xl text-primary">$34 <span class="align-baseline text-xl text-default-400 font-medium line-through">$44</span> </h4>
                                            <div class="flex items-center gap-2">
                                                <div class="flex gap-1.5">
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i></span>
                                                    <span><i data-lucide="star" class="w-5 h-5 fill-default-200 text-default-200"></i></span>
                                                </div>
                                                <h6 class="text-xs text-default-500 mt-1">(89)</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end grow -->
                            </div><!-- end grow -->
                        </div><!-- end flex -->
                    </div><!-- end grid-col -->
@endif
                </div><!-- end grid -->

                <div class="flex flex-wrap justify-center md:flex-nowrap md:justify-end gap-y-6 gap-x-10 pt-6">
                    <nav>
                        <ul class="inline-flex items-center space-x-2 rounded-md text-sm">
                            <li>
                                <a href="javascript:void(0)" aria-current="page" class="inline-flex items-center justify-center h-9 w-9 border border-primary rounded-full text-white bg-primary">1 </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="inline-flex items-center justify-center h-9 w-9 bg-default-100 rounded-full transition-all duration-500 text-default-800 hover:bg-primary hover:border-primary hover:text-white">2 </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="inline-flex items-center justify-center h-9 w-9 bg-default-100 rounded-full transition-all duration-500 text-default-800 hover:bg-primary hover:border-primary hover:text-white">...</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="inline-flex items-center justify-center h-9 w-9 bg-default-100 rounded-full transition-all duration-500 text-default-800 hover:bg-primary hover:border-primary hover:text-white">9 </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="inline-flex items-center justify-center h-9 w-9 bg-default-100 rounded-full transition-all duration-500 text-default-800 hover:bg-primary hover:border-primary hover:text-white">10 </a>
                            </li>
                        </ul><!-- end ul -->
                    </nav><!-- end nav -->

                    <nav>
                        <ul class="inline-flex items-center space-x-2 rounded-md text-sm">
                            <li>
                                <a href="javascript:void(0)" class="inline-flex items-center justify-center h-9 w-9 bg-default-100 rounded-full transition-all duration-500 text-default-800 hover:bg-primary hover:border-primary hover:text-white">
                                    <i data-lucide="chevron-left" class="h-5 w-5"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="inline-flex items-center justify-center h-9 w-9 bg-default-100 rounded-full transition-all duration-500 text-default-800 hover:bg-primary hover:border-primary hover:text-white">
                                    <i data-lucide="chevron-right" class="h-5 w-5"></i>
                                </a>
                            </li>
                        </ul><!-- end ul -->
                    </nav><!-- end nav -->
                </div><!-- end flex -->
            </div><!-- end width -->
        </div><!-- end flex -->
    </div>
</section>

@endsection

@section('script')
  @vite(['resources/js/product-range.js', 'resources/js/product-list-filters.js'])
  <script>
    // Cart functionality for product list
    function updateQuantity(itemId, change) {
        const quantityInput = document.getElementById(`quantity-${itemId}`);
        const currentQuantity = parseInt(quantityInput.value);
        const newQuantity = Math.max(1, Math.min(100, currentQuantity + change));
        quantityInput.value = newQuantity;
    }

    function addToCart(itemId) {
        const quantity = parseInt(document.getElementById(`quantity-${itemId}`).value);

        console.log('Adding to cart from list:', { itemId, quantity });

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (!csrfToken) {
            alert('CSRF token not found. Please refresh the page.');
            return;
        }

        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                menu_item_id: itemId,
                quantity: quantity,
                size: null
            })
        })
        .then(response => {
            console.log('Response status:', response.status);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                // Instant UI bump then sync with server count
                if (typeof bumpCartCount === 'function') { bumpCartCount(quantity); }
                if (typeof updateCartCount === 'function') { updateCartCount(data.cart_count); }
                if (typeof showAddToCartToast === 'function') { showAddToCartToast(); }
            } else {
                alert('Error: ' + (data.message || 'Unknown error occurred'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error adding the item to cart. Please try again. Error: ' + error.message);
        });
    }

    function toggleWishlist(itemId, el) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (!csrfToken) {
            showNotification('CSRF token not found. Please refresh the page.', 'error');
            return;
        }

        fetch('/wishlist/toggle', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify({ menu_item_id: itemId })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Wishlist response:', data);
            if (data.success) {
                const heartIcon = el.querySelector('i[data-lucide="heart"]');

                if (data.wishlisted) {
                    // Added to wishlist
                    el.classList.remove('text-default-200');
                    el.classList.add('text-red-500', 'fill-red-500');
                    heartIcon.classList.add('fill-red-500');
                    showNotification(data.message, 'success');
                } else {
                    // Removed from wishlist
                    el.classList.remove('text-red-500', 'fill-red-500');
                    el.classList.add('text-default-200');
                    heartIcon.classList.remove('fill-red-500');
                    showNotification(data.message, 'info');
                }
            } else {
                showNotification(data.message || 'Failed to update wishlist', 'error');
            }
        })
        .catch(error => {
            console.error('Wishlist error:', error);
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
    function updateCartCount(count) {
        // Update cart count in navbar if it exists
        const cartCountElement = document.querySelector('.cart-count');
        if (cartCountElement) {
            cartCountElement.textContent = count;
        }
    }
  </script>
@endsection
