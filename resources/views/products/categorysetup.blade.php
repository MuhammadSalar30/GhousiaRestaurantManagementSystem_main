@extends('layouts.admin', ['subtitle' => "Products", 'title' => isset($category) ? "Edit Category" : "Category Setup"])

@section('content')

@if(isset($category))
<div class="mb-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-default-800">Edit Category: {{ $category->name }}</h1>
            <p class="text-sm text-default-600 mt-1">Update category information and settings</p>
        </div>
        <a href="{{ route('second', ['products', 'categorylist']) }}" class="inline-flex items-center px-4 py-2 bg-default-100 text-default-700 rounded-lg hover:bg-default-200 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4 me-2"></i>
            Back to Categories
        </a>
    </div>
</div>
@endif

@if(session('status'))
<div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
    {{ session('status') }}
</div>
@endif

@if($errors->any())
<div class="mb-6 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg">
    <ul class="list-disc list-inside">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form id="catForm" action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" method="POST" enctype="multipart/form-data">
@csrf
@if(isset($category))
    <input type="hidden" name="category_id" value="{{ $category->id }}">
@endif
<div class="grid lg:grid-cols-3 gap-6">
    <div class="p-6 rounded-lg border border-default-200">
        <div class="p-6 flex flex-col items-center justify-center rounded-lg border border-default-200 mb-4">
            <h5 class="text-base text-primary font-medium mb-2">Category Image</h5>
            <p class="text-sm text-default-600 mb-4">Upload category image (optional)</p>

            <!-- Image Preview -->
            <div class="mb-4">
                <div id="imagePreview" class="w-32 h-32 border-2 border-dashed border-default-300 rounded-lg flex items-center justify-center bg-default-50">
                    @if(isset($category) && $category->image && file_exists(public_path($category->image)))
                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover rounded-lg">
                    @else
                        <div class="text-center">
                            <i data-lucide="image" class="w-8 h-8 text-default-400 mx-auto mb-2"></i>
                            <p class="text-xs text-default-500">No image selected</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- File Input -->
            <div class="w-full">
                <label for="categoryImage" class="block w-full cursor-pointer">
                    <input type="file" id="categoryImage" name="image" accept="image/*" class="hidden" onchange="previewImage(this)">
                    <div class="w-full py-2 px-4 bg-primary text-white text-center rounded-lg hover:bg-primary-600 transition-colors">
                        Choose Image
                    </div>
                </label>
            </div>
        </div>
    </div>



    <div class="lg:col-span-2">

        <div class="p-6 rounded-lg border border-default-200">
            <div class="grid lg:grid-cols-2 gap-6 mb-6">
                <div class="space-y-6">
                    <div>
                        <input class="block w-full bg-transparent rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Category Name" id="name" name="name" value="{{ isset($category) ? $category->name : old('name') }}" required>
                    </div>


                    <div class="grid lg:grid-cols-2 gap-6">
                        <div class="hidden"></div>

                        <div>
                            <label class="block text-sm text-default-600 mb-2">Discount %</label>
                            <input name="discount" class="block w-full bg-transparent rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="number" step="0.01" min="0" max="100" placeholder="e.g. 10" value="{{ isset($category) ? $category->discount : old('discount') }}">
                        </div>
                    </div>

                    <div>
                        <textarea name="description" class="block w-full bg-transparent rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" rows="5" placeholder="Description (optional)"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm text-default-600 mb-2">Sort Order</label>
                        <input name="sort_order" class="block w-full bg-transparent rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="number" placeholder="0">
                    </div>

                    <div class="flex justify-between">
                        <h4 class="text-sm font-medium text-default-600">Discount</h4>
                        <div class="flex items-center gap-4">
                            <label class="block text-sm text-default-600" for="addDiscount">Add Discount</label>
                            <input type="checkbox" id="addDiscount" class="relative w-[3.25rem] h-7 bg-default-200 focus:ring-0 checked:bg-none checked:!bg-primary border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 appearance-none focus:ring-transparent before:inline-block before:w-6 before:h-6 before:bg-white before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:transition before:ease-in-out before:duration-200">
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <h4 class="text-sm font-medium text-default-600">Expiry Date</h4>
                        <div class="flex items-center gap-4">
                            <label class="block text-sm text-default-600" for="addExpiryDate">Add Expiry Date</label>
                            <input type="checkbox" id="addExpiryDate" class="relative w-[3.25rem] h-7 bg-default-200 focus:ring-0 checked:bg-none checked:!bg-primary border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 appearance-none focus:ring-transparent before:inline-block before:w-6 before:h-6 before:bg-white before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:transition before:ease-in-out before:duration-200">
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <textarea class="block w-full bg-transparent rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" rows="5" placeholder="Short Description"></textarea>
                    </div>

                    <div class="hidden"></div>

                    <div class="hidden"></div>

                    <div>
                        <p class="text-xs text-default-500 mb-3">Date Added</p>
                        <div class="grid lg:grid-cols-2 gap-6">
                            <div>
                                <div class="relative">
                                    <span class="absolute top-1/2 start-2.5 -translate-y-1/2"><i data-lucide="calendar-days" class="h-4 w-4 text-default-700"></i></span>
                                    <span class="absolute top-1/2 end-2.5 -translate-y-1/2"><i data-lucide="chevron-down" class="h-4 w-4 text-default-700"></i></span>
                                    <input type="text" class="py-2.5 w-full px-9 block bg-default-100 rounded-md border-0 text-sm text-default-700 font-medium focus:border-default-200 focus:ring-0" id="datepicker-basic">
                                </div><!-- end relative -->
                            </div>

                            <div>
                                <div class="relative">
                                    <span class="absolute top-1/2 start-2.5 -translate-y-1/2"><i data-lucide="calendar-days" class="h-4 w-4 text-default-700"></i></span>
                                    <span class="absolute top-1/2 end-2.5 -translate-y-1/2"><i data-lucide="chevron-down" class="h-4 w-4 text-default-700"></i></span>
                                    <input type="text" class="py-2.5 w-full px-9 block bg-default-100 rounded-md border-0 text-sm text-default-700 font-medium focus:border-default-200 focus:ring-0" id="timepicker">
                                </div><!-- end relative -->
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit" class="w-full inline-flex items-center justify-center rounded-lg border border-primary bg-primary px-6 py-3 text-center text-sm font-medium text-white shadow-sm transition-all duration-500 hover:bg-primary-600">
                            @if(isset($category))
                                <i data-lucide="save" class="w-4 h-4 me-2"></i>
                                Update Category
                            @else
                                <i data-lucide="plus" class="w-4 h-4 me-2"></i>
                                Create Category
                            @endif
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="mt-8 p-6 rounded-lg border border-default-200">
    <div class="flex items-center justify-between mb-4">
        <h4 class="text-base font-medium text-default-800">All Categories</h4>
        <input type="text" id="catSearch" placeholder="Search..." class="py-2.5 px-4 rounded-lg border border-default-200 bg-transparent text-sm" />
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="text-left text-default-600">
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Items</th>
                    <th class="px-4 py-2">Discount</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody id="catTable">
                @foreach(($categories ?? []) as $row)
                <tr class="border-t border-default-200">
                    <td class="px-4 py-2">
                        <div class="w-10 h-10 rounded-lg overflow-hidden bg-default-100 flex items-center justify-center">
                            @if($row->image && file_exists(public_path($row->image)))
                                <img src="{{ asset($row->image) }}" alt="{{ $row->name }}" class="w-full h-full object-cover">
                            @else
                                <i data-lucide="image" class="w-5 h-5 text-default-400"></i>
                            @endif
                        </div>
                    </td>
                    <td class="px-4 py-2">{{ $row->name }}</td>
                    <td class="px-4 py-2">{{ method_exists($row,'items') ? ($row->items_count ?? $row->items()->count()) : 0 }}</td>
                    <td class="px-4 py-2">{{ isset($row->discount) ? $row->discount : 0 }}%</td>
                    <td class="px-4 py-2">
                        <div class="flex gap-3">
                            <a href="{{ route('category.edit', $row->id) }}" class="transition-all hover:text-primary"><i data-lucide="pencil" class="w-5 h-5"></i></a>
                            <a href="javascript:void(0)" data-action="delete" data-id="{{ $row->id }}" class="transition-all hover:text-red-500"><i data-lucide="trash-2" class="w-5 h-5"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="lg:col-span-3">
        <div class="flex flex-wrap justify-end items-center gap-4">
            <div class="flex flex-wrap items-center gap-4">
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <button type="button" class="hs-dropdown-toggle flex items-center gap-2 font-medium text-default-700 text-sm py-2.5 px-4 rounded-md bg-default-100 transition-all">
                        Save as Draft <i data-lucide="chevron-down" class="h-4 w-4"></i>
                    </button><!-- end dropdown button -->

                    <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[200px] transition-[opacity,margin] mt-4 opacity-0 hidden z-20 bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-lg border border-default-100 p-1.5 dark:bg-default-50">
                        <ul class="flex flex-col gap-1">
                            <li><a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="javascript:void(0)">Publish</a></li>
                            <li><a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="javascript:void(0)">Save as Darft</a></li>
                            <li><a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="javascript:void(0)">Discard</a></li>
                        </ul><!-- end dropdown items -->
                    </div><!-- end dropdown menu -->
                </div>
                <button class="py-2.5 px-4 inline-flex rounded-lg text-sm font-medium bg-primary text-white transition-all hover:bg-primary-500" id="btnsave" type="submit">Save</button>
            </div>
        </div>
    </div>
</div>
</form>



@endsection

@section('script')
    @vite(['resources/js/admin-product-add.js'])
    <script>
    // Image preview function
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover rounded-lg" alt="Category Preview">`;
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.innerHTML = `
                <div class="text-center">
                    <i data-lucide="image" class="w-8 h-8 text-default-400 mx-auto mb-2"></i>
                    <p class="text-xs text-default-500">No image selected</p>
                </div>
            `;
            // Re-initialize Lucide icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        }
    }

    // Search filter
    $(document).on('input','#catSearch', function(){
      const q = $(this).val().toLowerCase();
      $('#catTable tr').each(function(){
        const name = $(this).find('td:first').text().toLowerCase();
        $(this).toggle(name.includes(q));
      });
    });

    // Delete with confirmation
    $(document).on('click','[data-action="delete"]', function(){
      const id = $(this).data('id');
      if(!confirm('Delete this category? Items under it will be deleted.')) return;
      $.ajax({ url:'{{ url('/category') }}/'+id, type:'DELETE', data:{ _token:'{{ csrf_token() }}' }, success: () => location.reload() });
    });
    </script>
@endsection

