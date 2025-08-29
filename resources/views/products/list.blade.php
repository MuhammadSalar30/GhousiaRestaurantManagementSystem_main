@extends('layouts.admin', ['subtitle' => "Products", 'title' => "Products List"])

@section('content')

<div class="grid grid-cols-1">
    <div class="border rounded-lg border-default-200">
        <div class="px-6 py-4 overflow-hidden ">
            <div class="flex flex-wrap md:flex-nowrap items-center justify-between gap-4">
                <h2 class="text-xl text-default-800 font-semibold">Item List</h2>

                <div class="flex flex-wrap items-center gap-4">
                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                        <button type="button" class="hs-dropdown-toggle flex items-center gap-2 font-medium text-default-700 text-sm py-2.5 px-4 rounded-md bg-default-100 transition-all">
                            Save as Draft <i data-lucide="chevron-down" class="h-4 w-4"></i>
                        </button><!-- end dropdown button -->

                        <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[200px] transition-[opacity,margin] mt-4 opacity-0 hidden z-20 bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-lg border border-default-100 p-1.5 dark:bg-default-50">
                            <ul class="flex flex-col gap-1">
                                <li><a class="flex items-center gap-3 font-normal py-2 px-3 transition-all text-default-700 bg-default-100 rounded" href="javascript:void(0)">All</a></li>
                                <li><a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="javascript:void(0)">Publish</a></li>
                                <li><a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="javascript:void(0)">Save as Draft</a></li>
                                <li><a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="javascript:void(0)">Discard</a></li>
                            </ul><!-- end dropdown items -->
                        </div><!-- end dropdown menu -->
                    </div>
                    <a href="{{ route('second', ['products', 'add']) }}" class="py-2.5 px-4 inline-flex rounded-lg text-sm font-medium bg-primary text-white transition-all hover:bg-primary-500">Add Product</a>
                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-default-200">
                        <thead class="bg-default-100">
                            <tr class="text-start">
                                <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Product</th>
                                <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Category</th>
                                <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Price</th>
                                <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Size</th>
                                <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Description</th>
                                {{-- <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Create By</th> --}}
                                <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Status</th>
                                <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Action</th>
                            </tr><!-- end table-head-row -->
                        </thead><!-- end t-head -->
                        <tbody class="divide-y divide-default-200">
                            @foreach (AllItems() as $item)

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    <a href="{{ route('third', ['products', 'details', $item->id]) }}" class="flex items-center gap-3">
                                        <div class="shrink relative group">
                                            <img src="{{ $item->image ? asset($item->image) : '/images/dishes/small/pizza.png' }}" class="h-12 w-12 rounded-lg object-cover">
                                            <!-- Edit Icon Overlay -->
                                            <a href="{{ route('third', ['products', 'edit', $item->id]) }}" class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200 rounded-lg" onclick="event.stopPropagation();">
                                                <i data-lucide="edit-2" class="w-4 h-4 text-white"></i>
                                            </a>
                                        </div>
                                        <p class="text-base text-default-500 transition-all hover:text-primary">{{ $item->name }}</p>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">{{ GetCategoryName($item->menu_section_id) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">PKR {{ $item->price }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">{{ $item->size ? ucfirst($item->size) : '-' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">{{ strip_tags($item->description) }}</td>
                                {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">Admin</td> --}}
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-medium bg-green-500/20 text-green-500">{{$item->status}}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-3">
                                        <a href="{{ route('third', ['products', 'edit', $item->id]) }}" class="transition-all hover:text-primary"><i data-lucide="pencil" class="w-5 h-5"></i></a>
                                        <a href="{{ route('third', ['products', 'details', $item->id]) }}" class="transition-all hover:text-primary"><i data-lucide="eye" class="w-5 h-5"></i></a>
                                        <a href="javascript:void(0)" data-action="delete" data-id="{{ $item->id }}" class="transition-all hover:text-red-500"><i data-lucide="trash-2" class="w-5 h-5"></i></a>
                                    </div>
                                </td>
                            </tr><!-- end table-row -->
                            @endforeach

                            {{-- <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    <a href="{{ route('second', ['products', 'details']) }}" class="flex items-center gap-3">
                                        <div class="shrink">
                                            <img src="/images/dishes/small/bbq.png" class="h-12 w-12">
                                        </div>
                                        <p class="text-base text-default-500 transition-all hover:text-primary">Paneer BBQ</p>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">BBQ</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$40</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">75</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">Admin</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-medium bg-green-500/20 text-green-500">Publish</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-3">
                                        <a href="{{ route('second', ['products', 'edit']) }}" class="transition-all hover:text-primary"><i data-lucide="pencil" class="w-5 h-5"></i></a>
                                        <a href="{{ route('second', ['products', 'details']) }}" class="transition-all hover:text-primary"><i data-lucide="eye" class="w-5 h-5"></i></a>
                                        <a href="javascript:void(0)" class="transition-all hover:text-red-500"><i data-lucide="trash-2" class="w-5 h-5"></i></a>
                                    </div>
                                </td>
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    <a href="{{ route('second', ['products', 'details']) }}" class="flex items-center gap-3">
                                        <div class="shrink">
                                            <img src="/images/dishes/small/bread.png" class="h-12 w-12">
                                        </div>
                                        <p class="text-base text-default-500 transition-all hover:text-primary">Bread</p>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">Italian</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$10</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">120</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">Admin</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-medium bg-green-500/20 text-green-500">Publish</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-3">
                                        <a href="{{ route('second', ['products', 'edit']) }}" class="transition-all hover:text-primary"><i data-lucide="pencil" class="w-5 h-5"></i></a>
                                        <a href="{{ route('second', ['products', 'details']) }}" class="transition-all hover:text-primary"><i data-lucide="eye" class="w-5 h-5"></i></a>
                                        <a href="javascript:void(0)" class="transition-all hover:text-red-500"><i data-lucide="trash-2" class="w-5 h-5"></i></a>
                                    </div>
                                </td>
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    <a href="{{ route('second', ['products', 'details']) }}" class="flex items-center gap-3">
                                        <div class="shrink">
                                            <img src="/images/dishes/small/cooki.png" class="h-12 w-12">
                                        </div>
                                        <p class="text-base text-default-500 transition-all hover:text-primary">Cookies Bisticks </p>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">Cooki</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$10</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">90</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">Admin</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-medium bg-red-500/20 text-red-500">Draft</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-3">
                                        <a href="{{ route('second', ['products', 'edit']) }}" class="transition-all hover:text-primary"><i data-lucide="pencil" class="w-5 h-5"></i></a>
                                        <a href="{{ route('second', ['products', 'details']) }}" class="transition-all hover:text-primary"><i data-lucide="eye" class="w-5 h-5"></i></a>
                                        <a href="javascript:void(0)" class="transition-all hover:text-red-500"><i data-lucide="trash-2" class="w-5 h-5"></i></a>
                                    </div>
                                </td>
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    <a href="{{ route('second', ['products', 'details']) }}" class="flex items-center gap-3">
                                        <div class="shrink">
                                            <img src="/images/dishes/small/rice.png" class="h-12 w-12">
                                        </div>
                                        <p class="text-base text-default-500 transition-all hover:text-primary">Veg Rice</p>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">Italian</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$25</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">40</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">Admin</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-medium bg-green-500/20 text-green-500">Publish</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-3">
                                        <a href="{{ route('second', ['products', 'edit']) }}" class="transition-all hover:text-primary"><i data-lucide="pencil" class="w-5 h-5"></i></a>
                                        <a href="{{ route('second', ['products', 'details']) }}" class="transition-all hover:text-primary"><i data-lucide="eye" class="w-5 h-5"></i></a>
                                        <a href="javascript:void(0)" class="transition-all hover:text-red-500"><i data-lucide="trash-2" class="w-5 h-5"></i></a>
                                    </div>
                                </td>
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    <a href="{{ route('second', ['products', 'details']) }}" class="flex items-center gap-3">
                                        <div class="shrink">
                                            <img src="/images/dishes/small/salad.png" class="h-12 w-12">
                                        </div>
                                        <p class="text-base text-default-500 transition-all hover:text-primary">Salad</p>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">salad</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$20</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">45</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">Admin</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-medium bg-red-500/20 text-red-500">Draft</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-3">
                                        <a href="{{ route('second', ['products', 'edit']) }}" class="transition-all hover:text-primary"><i data-lucide="pencil" class="w-5 h-5"></i></a>
                                        <a href="{{ route('second', ['products', 'details']) }}" class="transition-all hover:text-primary"><i data-lucide="eye" class="w-5 h-5"></i></a>
                                        <a href="javascript:void(0)" class="transition-all hover:text-red-500"><i data-lucide="trash-2" class="w-5 h-5"></i></a>
                                    </div>
                                </td>
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    <a href="{{ route('second', ['products', 'details']) }}" class="flex items-center gap-3">
                                        <div class="shrink">
                                            <img src="/images/dishes/small/pizza-2.png" class="h-12 w-12">
                                        </div>
                                        <p class="text-base text-default-500 transition-all hover:text-primary">Mushroom Pizza</p>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">Italian</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$50</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">20</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">Admin</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-medium bg-green-500/20 text-green-500">Publish</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-3">
                                        <a href="{{ route('second', ['products', 'edit']) }}" class="transition-all hover:text-primary"><i data-lucide="pencil" class="w-5 h-5"></i></a>
                                        <a href="{{ route('second', ['products', 'details']) }}" class="transition-all hover:text-primary"><i data-lucide="eye" class="w-5 h-5"></i></a>
                                        <a href="javascript:void(0)" class="transition-all hover:text-red-500"><i data-lucide="trash-2" class="w-5 h-5"></i></a>
                                    </div>
                                </td>
                            </tr><!-- end table-row -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                    <a href="{{ route('second', ['products', 'details']) }}" class="flex items-center gap-3">
                                        <div class="shrink">
                                            <img src="/images/dishes/burrito-bowl.png" class="h-12 w-12">
                                        </div>
                                        <p class="text-base text-default-500 transition-all hover:text-primary">Burrito Bowl</p>
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">Mexican</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">$45</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">80</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-500">Admin</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-medium bg-green-500/20 text-green-500">Publish</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-3">
                                        <a href="{{ route('second', ['products', 'edit']) }}" class="transition-all hover:text-primary"><i data-lucide="pencil" class="w-5 h-5"></i></a>
                                        <a href="{{ route('second', ['products', 'details']) }}" class="transition-all hover:text-primary"><i data-lucide="eye" class="w-5 h-5"></i></a>
                                        <a href="javascript:void(0)" class="transition-all hover:text-red-500"><i data-lucide="trash-2" class="w-5 h-5"></i></a>
                                    </div>
                                </td>
                            </tr><!-- end table-row --> --}}
                        </tbody><!-- end t-body -->
                    </table><!-- end table -->
                </div><!-- end overflo-hidden -->
            </div><!-- end table-responsive -->
        </div>
    </div>
</div><!-- end grid -->

@endsection

@section('script')
<script>
$(document).on('click', 'a[data-action="delete"]', function(e) {
    e.preventDefault();
    const id = $(this).data('id');
    if (!confirm('Are you sure you want to delete this product?')) return;
    $.ajax({
        url: '{{ route('products.delete', ['id' => 'ID_PLACEHOLDER']) }}'.replace('ID_PLACEHOLDER', id),
        type: 'DELETE',
        data: {_token: '{{ csrf_token() }}'},
        success: function(){
            location.reload();
        },
        error: function(xhr){
            console.error(xhr.responseText);
            alert('Failed to delete product.');
        }
    });
});
</script>
@endsection
