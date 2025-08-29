import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //css
                'resources/css/style.css',
                'node_modules/swiper/swiper-bundle.min.css',
                'node_modules/nouislider/dist/nouislider.min.css',

                //js
                'resources/js/theme.js',
                'resources/js/head.js',
                'resources/js/home.js',
                'resources/js/product-detail.js',
                'resources/js/form-input-spin.js',
                'resources/js/product-range.js',
                'resources/js/auth.js',
                'resources/js/admin-manage.js',
                'resources/js/admin-order-list.js',
                'resources/js/admin-restaurants-details.js',
                'resources/js/admin-product-add.js',
                'resources/js/admin-seller-list.js',
                'resources/js/admin-wallet.js',
                'resources/js/admin-customers-list.js'
            ],
            refresh: true,
        }),
    ],
});
