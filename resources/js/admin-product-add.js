/*
Template Name: Yum - Multipurpose Food Tailwind CSS Template
Version: 1.0
Author: coderthemes
Email: support@coderthemes.com
*/

import Quill from 'quill'
import flatpickr from 'flatpickr';

const quill = new Quill('#editor', {
    theme: 'snow'
});

flatpickr('#datepicker-basic', { defaultDate: new Date() })
flatpickr('#timepicker', {
    enableTime: true,
    noCalendar: true,
    dateFormat: 'H:i',
    defaultDate: '13:45'
});

// jQuery is loaded globally via CDN in layout footer
$(document).ready(function () {
    let mainImageFile = null;
    let additionalImage1File = null;
    let additionalImage2File = null;
    
    // Trigger file select when clicking the upload box
    $('.mainImageUpload').on('click', function () {
        $('#mainImageInput').click();
    });

    // Preview selected main image
    $('#mainImageInput').on('change', function () {
        const file = this.files && this.files[0];
        if (file && file.type.startsWith('image/')) {
            mainImageFile = file; // persist for save even if input is reset
            const reader = new FileReader();
            reader.onload = function (e) {
                const previewUrl = e.target.result;
                const imgEl = $('<img>', {
                    id: 'mainImagePreview',
                    src: previewUrl,
                    class: 'max-w-full max-h-96 rounded-lg'
                });
                $('.mainImageUpload').replaceWith(imgEl);
            };
            reader.readAsDataURL(file);
        }
        // allow re-selecting the same file (we stored it in mainImageFile)
        $(this).val('');
    });

    // Additional Image 1 functionality
    $('.additionalImage1Upload').on('click', function () {
        $('#additionalImage1Input').click();
    });

    $('#additionalImage1Input').on('change', function () {
        const file = this.files && this.files[0];
        if (file && file.type.startsWith('image/')) {
            additionalImage1File = file;
            const reader = new FileReader();
            reader.onload = function (e) {
                const previewUrl = e.target.result;
                const imgEl = $('<img>', {
                    id: 'additionalImage1Preview',
                    src: previewUrl,
                    class: 'max-w-full max-h-24 rounded-lg'
                });
                $('.additionalImage1Upload').replaceWith(imgEl);
            };
            reader.readAsDataURL(file);
        }
        $(this).val('');
    });

    // Additional Image 2 functionality
    $('.additionalImage2Upload').on('click', function () {
        $('#additionalImage2Input').click();
    });

    $('#additionalImage2Input').on('change', function () {
        const file = this.files && this.files[0];
        if (file && file.type.startsWith('image/')) {
            additionalImage2File = file;
            const reader = new FileReader();
            reader.onload = function (e) {
                const previewUrl = e.target.result;
                const imgEl = $('<img>', {
                    id: 'additionalImage2Preview',
                    src: previewUrl,
                    class: 'max-w-full max-h-24 rounded-lg'
                });
                $('.additionalImage2Upload').replaceWith(imgEl);
            };
            reader.readAsDataURL(file);
        }
        $(this).val('');
    });

    // Save handler
    $('#saveProductBtn').on('click', function (e) {
        e.preventDefault();
        const storeUrl = $('#routeProductsStore').val();
        const listUrl = $('#routeProductsList').val();
        const csrf = $('#csrfToken').val();

        const name = $('#productName').val();
        const menu_section_id = $('#productCategory').val();
        const price = $('#productPrice').val();
        const cost_price = $('#productCostPrice').val();
        const OrderType = $('#orderType').val();
        const size = $('#productSize').val();
        const description = quill.getText().trim();

        if (!name || !menu_section_id || !price) {
            alert('Please fill in Product Name, Category and Price.');
            return;
        }

        const fd = new FormData();
        fd.append('_token', csrf);
        fd.append('name', name);
        fd.append('menu_section_id', menu_section_id);
        fd.append('price', price);
        if (cost_price) fd.append('cost_price', cost_price);
        if (OrderType) fd.append('OrderType', OrderType);
        if (description) fd.append('description', description);
        if (size) fd.append('size', size);

        if (mainImageFile) {
            fd.append('image', mainImageFile);
        }

        if (additionalImage1File) {
            fd.append('additional_image_1', additionalImage1File);
        }

        if (additionalImage2File) {
            fd.append('additional_image_2', additionalImage2File);
        }

        $.ajax({
            url: storeUrl,
            type: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function () {
                window.location.href = listUrl;
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Failed to save product. Please check your inputs.');
            }
        });
    });
});
