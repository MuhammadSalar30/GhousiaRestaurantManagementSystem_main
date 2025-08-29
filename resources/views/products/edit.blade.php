@extends('layouts.admin', ['subtitle'=> "Products", 'title' => "Edit Products"])

@section('content')

<div class="grid lg:grid-cols-3 gap-6">
    <div class="p-6 rounded-lg border border-default-200">

        <!-- Main Image Section -->
        <div class="p-6 flex flex-col items-center justify-center rounded-lg border border-default-200 mb-4">
            <h5 class="text-base text-primary font-medium mb-2">Product Main Image</h5>
            <p class="text-sm text-default-600 mb-4">Upload main product image</p>

            <!-- Image Preview -->
            <div class="mb-4">
                <div id="mainImagePreview" class="w-48 h-48 border-2 border-dashed border-default-300 rounded-lg flex items-center justify-center bg-default-50">
                    @if (!empty($data->image))
                        <img src="{{ asset($data->image) }}" alt="Main Product Image" class="w-full h-full object-cover rounded-lg">
                    @else
                        <div class="text-center">
                            <i data-lucide="image" class="w-12 h-12 text-default-400 mx-auto mb-2"></i>
                            <p class="text-xs text-default-500">No image selected</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- File Input -->
            <div class="w-full">
                <label for="mainImageInput" class="block w-full cursor-pointer">
                    <input type="file" id="mainImageInput" accept="image/*" class="hidden" onchange="previewMainImage(this)">
                    <div class="w-full py-2 px-4 bg-primary text-white text-center rounded-lg hover:bg-primary-600 transition-colors">
                        Choose Main Image
                    </div>
                </label>
            </div>
            <input type="hidden" id="productId" value="{{ $data->id }}" />
        </div>

        <!-- Additional Images Section -->
        <h4 class="text-base font-medium text-default-800 mb-4">Additional Images</h4>
        <div class="space-y-4">

            <!-- Additional Image 1 -->
            <div class="additional-image-container">
                <label class="block text-sm font-medium text-default-700 mb-2">Additional Image 1</label>
                <div class="p-4 flex flex-col items-center justify-center rounded-lg border border-default-200">
                    <!-- Image Preview -->
                    <div class="mb-3">
                        <div id="additionalImage1Preview" class="w-24 h-24 border-2 border-dashed border-default-300 rounded-lg flex items-center justify-center bg-default-50">
                            @if (!empty($data->additional_image_1))
                                <img src="{{ asset($data->additional_image_1) }}" alt="Additional Image 1" class="w-full h-full object-cover rounded-lg">
                            @else
                                <div class="text-center">
                                    <i data-lucide="image" class="w-6 h-6 text-default-400 mx-auto mb-1"></i>
                                    <p class="text-xs text-default-500">No image</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- File Input -->
                    <div class="w-full">
                        <label for="additionalImage1Input" class="block w-full cursor-pointer">
                            <input type="file" id="additionalImage1Input" accept="image/*" class="hidden" onchange="previewAdditionalImage1(this)">
                            <div class="w-full py-1.5 px-3 bg-primary text-white text-center rounded-lg hover:bg-primary-600 transition-colors text-sm">
                                Choose Image
                            </div>
                        </label>
                    </div>
                    <input type="hidden" id="additionalImage1Path" value="{{ $data->additional_image_1 ?? '' }}" />
                </div>
            </div>

            <!-- Additional Image 2 -->
            <div class="additional-image-container">
                <label class="block text-sm font-medium text-default-700 mb-2">Additional Image 2</label>
                <div class="p-4 flex flex-col items-center justify-center rounded-lg border border-default-200">
                    <!-- Image Preview -->
                    <div class="mb-3">
                        <div id="additionalImage2Preview" class="w-24 h-24 border-2 border-dashed border-default-300 rounded-lg flex items-center justify-center bg-default-50">
                            @if (!empty($data->additional_image_2))
                                <img src="{{ asset($data->additional_image_2) }}" alt="Additional Image 2" class="w-full h-full object-cover rounded-lg">
                            @else
                                <div class="text-center">
                                    <i data-lucide="image" class="w-6 h-6 text-default-400 mx-auto mb-1"></i>
                                    <p class="text-xs text-default-500">No image</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- File Input -->
                    <div class="w-full">
                        <label for="additionalImage2Input" class="block w-full cursor-pointer">
                            <input type="file" id="additionalImage2Input" accept="image/*" class="hidden" onchange="previewAdditionalImage2(this)">
                            <div class="w-full py-1.5 px-3 bg-primary text-white text-center rounded-lg hover:bg-primary-600 transition-colors text-sm">
                                Choose Image
                            </div>
                        </label>
                    </div>
                    <input type="hidden" id="additionalImage2Path" value="{{ $data->additional_image_2 ?? '' }}" />
                </div>
            </div>

        </div>

    </div>


    <div class="lg:col-span-2">
        <div class="p-6 rounded-lg border border-default-200">
            <div class="grid lg:grid-cols-2 gap-6 mb-6">
                <div class="space-y-6">
                    <div>
                        <input class="block w-full bg-transparent rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Product Name" value="{{ $data->name }}" id="productName">
                    </div>

                    <div>
                        <select class="block w-full bg-transparent rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Select Product Category" id="productCategory">
                            <option>Select Product Category</option>
                            @foreach (AllCategory() as $Cate)
                            <option value="{{ $Cate->id }}" {{ $data->menu_section_id == $Cate->id ? 'selected' : '' }} >{{ $Cate->name }}</option>

                            @endforeach
                            {{-- <option value="bbq">BBQ</option> --}}
                            {{-- <option value="mexican">Mexican</option> --}}
                        </select>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-6">
                        <div>
                            <input class="block w-full bg-transparent rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="number" placeholder="Selling Price" value="{{ number_format((float)$data->price, 0, '', '') }}" id="productPrice" step="1" min="0">
                        </div>

                        <div>
                            <input class="block w-full bg-transparent rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="number" placeholder="Cost Price" value="{{ number_format((float)($data->cost_price ?? 0), 0, '', '') }}" id="productCostPrice" step="1" min="0">
                        </div>
                    </div>

                    {{-- <div>
                        <input class="block w-full bg-transparent rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="number" placeholder="Quantity in Stock" value="80">
                    </div> --}}

                    <div>
                        <select class="block w-full bg-transparent rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Select Product Category" id="orderType">
                            <option>Order Type</option>
                            <option {{ $data->OrderType == 'delivery' ? 'selected' : '' }} value="delivery">Delivery</option>
                            <option {{ $data->OrderType == 'pickup' ? 'selected' : '' }} value="pickup">Pickup</option>
                            <option {{ $data->OrderType == 'dine-in' ? 'selected' : '' }} value="dine-in">Dine-in</option>
                        </select>
                    </div>

                    <div>
                        <select class="block w-full bg-transparent rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" id="productSize">
                            <option value="">Size (optional)</option>
                            <option value="full" {{ $data->size == 'full' ? 'selected' : '' }}>Full</option>
                            <option value="half" {{ $data->size == 'half' ? 'selected' : '' }}>Half</option>
                            <option value="quarter" {{ $data->size == 'quarter' ? 'selected' : '' }}>Quarter</option>
                        </select>
                    </div>

                    <div class="flex justify-between">
                        <h4 class="text-sm font-medium text-default-600">Discount</h4>
                        <div class="flex items-center gap-4">
                            <label class="block text-sm text-default-600" for="addDiscount">Add Discount</label>
                            <input type="checkbox" id="addDiscount" class="relative w-[3.25rem] h-7 bg-default-200 focus:ring-0 checked:bg-none checked:!bg-primary border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 appearance-none focus:ring-transparent before:inline-block before:w-6 before:h-6 before:bg-white before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:transition before:ease-in-out before:duration-200" checked>
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
                    {{-- <div>
                        <textarea class="block w-full bg-transparent rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" rows="5" placeholder="Short Description">Mexican burritos are usually made with a wheat tortilla and contain grilled meat, cheese toppings, and fresh vegetables which are sources of vitamins, proteins, fibers, minerals, and antioxidants.</textarea>
                    </div> --}}

                    <div>
                        <label class="block text-sm font-medium text-default-900 mb-2" for="desceditor">Product Description</label>
                        <div id="desceditor" class="h-36 mb-2">
                            {{ $data->description }}
                        </div>

                        <p class="text-sm text-default-600">Add a description for your product</p>
                    </div>

                    <div class="flex justify-between">
                        <h4 class="text-sm font-medium text-default-600">Return Policy</h4>
                        <div class="flex items-center gap-4">
                            <label class="block text-sm text-default-600" for="returnPolicy">Return Policy</label>
                            <input type="checkbox" id="returnPolicy" class="relative w-[3.25rem] h-7 bg-default-200 focus:ring-0 checked:bg-none checked:!bg-primary border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 appearance-none focus:ring-transparent before:inline-block before:w-6 before:h-6 before:bg-white before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:transition before:ease-in-out before:duration-200">
                        </div>
                    </div>

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
                <button class="py-2.5 px-4 inline-flex rounded-lg text-sm font-medium bg-primary text-white transition-all hover:bg-primary-500" id="saveProductBtn">Save</button>
                {{-- <button class="py-2.5 px-4 inline-flex rounded-lg text-sm font-medium bg-primary text-white transition-all hover:bg-primary-500">Save</button> --}}
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
{{-- @vite(['resources/js/admin-product-add.js']) --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
// Global variables for image files
var MainImagae;
var AdditionalImage1File;
var AdditionalImage2File;
</script>

<script type="module">
    import Quill from 'https://cdn.skypack.dev/quill';
    import flatpickr from 'https://cdn.skypack.dev/flatpickr';

    const quill = new Quill('#desceditor', {
        theme: 'snow'
    });

        // Replace HTML with plain text content in the editor on load
        quill.setText($('#desceditor').text());

    flatpickr("#datepicker-basic", { defaultDate: new Date() });

    flatpickr("#timepicker", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        defaultDate: "13:45"
    });
    $(document).ready(function () {
        // Initialize with existing images if they exist
        @if (!empty($data->image))
            // Main image already exists, no need to set up upload click
        @else
            $('.mainImageUpload').click(function () {
                $('#mainImageInput').click();
            });
        @endif

        // Additional Image 1 handling is now done by previewAdditionalImage1 function

        // Additional Image 2 handling is now done by previewAdditionalImage2 function

        // Image click handlers are now handled by the new upload buttons

        $('#saveProductBtn').on('click', function (e) {
        e.preventDefault();
        const id = $('#productId').val();
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('_method', 'POST');
        formData.append('name', $('#productName').val());
        formData.append('menu_section_id', $('#productCategory').val());
        formData.append('price', $('#productPrice').val());
        formData.append('cost_price', $('#productCostPrice').val());
        formData.append('OrderType', $('#orderType').val());
        const size = $('#productSize').val();
        if (size) formData.append('size', size);
        formData.append('description', quill.getText().trim());

        // Main Image
        if (window.MainImagae) {
            console.log('Adding main image:', window.MainImagae);
            formData.append('image', window.MainImagae);
        } else {
            console.log('No main image to upload');
        }

        // Additional Images - Send actual file objects, not paths
        if (window.AdditionalImage1File) {
            console.log('Adding additional image 1:', window.AdditionalImage1File);
            formData.append('additional_image_1', window.AdditionalImage1File);
        }
        if (window.AdditionalImage2File) {
            console.log('Adding additional image 2:', window.AdditionalImage2File);
            formData.append('additional_image_2', window.AdditionalImage2File);
        }

        $.ajax({
            url: '{{ route('products.update', ['id' => 'ID_PLACEHOLDER']) }}'.replace('ID_PLACEHOLDER', id),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                window.location.href = '{{ route('second', ['products', 'list']) }}';
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Failed to save product. Please check your inputs.');
            }
        });
    });
});

// Image preview functions
function previewMainImage(input) {
    console.log('previewMainImage called', input);
    const preview = document.getElementById('mainImagePreview');

    if (input.files && input.files[0]) {
        console.log('Main image file selected:', input.files[0]);
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover rounded-lg" alt="Main Product Preview">`;
        };

        reader.readAsDataURL(input.files[0]);
        window.MainImagae = input.files[0]; // Update the global variable
        console.log('Main image stored in window.MainImagae:', window.MainImagae);
    } else {
        preview.innerHTML = `
            <div class="text-center">
                <i data-lucide="image" class="w-12 h-12 text-default-400 mx-auto mb-2"></i>
                <p class="text-xs text-default-500">No image selected</p>
            </div>
        `;
        // Re-initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }
}

function previewAdditionalImage1(input) {
    const preview = document.getElementById('additionalImage1Preview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover rounded-lg" alt="Additional Image 1 Preview">`;
        };

        reader.readAsDataURL(input.files[0]);
        window.AdditionalImage1File = input.files[0]; // Update the global variable
    } else {
        preview.innerHTML = `
            <div class="text-center">
                <i data-lucide="image" class="w-6 h-6 text-default-400 mx-auto mb-1"></i>
                <p class="text-xs text-default-500">No image</p>
            </div>
        `;
        // Re-initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }
}

function previewAdditionalImage2(input) {
    const preview = document.getElementById('additionalImage2Preview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover rounded-lg" alt="Additional Image 2 Preview">`;
        };

        reader.readAsDataURL(input.files[0]);
        window.AdditionalImage2File = input.files[0]; // Update the global variable
    } else {
        preview.innerHTML = `
            <div class="text-center">
                <i data-lucide="image" class="w-6 h-6 text-default-400 mx-auto mb-1"></i>
                <p class="text-xs text-default-500">No image</p>
            </div>
        `;
        // Re-initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }
}

</script>


@endsection
