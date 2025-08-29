<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\CategorySetupController;
use App\Http\Controllers\Controller as AppController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
require __DIR__.'/auth.php';

Route::group(['prefix' => '/','middleware' => 'auth'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('/home', fn()=>view('index'))->name('home');

    // Category Setup routes
    Route::get('/categorysetup', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('categorysetup');
    Route::get('/category/{id}/edit', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category.store');
    Route::post('/category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('category.destroy');

    // Product store, update & delete endpoints
    Route::post('/products/store', [AppController::class, 'storeMenuItem'])->name('products.store');
    Route::post('/products/update/{id}', [AppController::class, 'updateMenuItem'])->name('products.update');
    Route::delete('/products/delete/{id}', [AppController::class, 'deleteMenuItem'])->name('products.delete');

    // Cart routes - MUST come before generic routing
    Route::get('/client/cart', [CartController::class, 'index'])->name('client.cart');
    Route::get('/cart/side', [CartController::class, 'side'])->name('cart.side');
    Route::get('/client/wishlist', [App\Http\Controllers\WishlistController::class, 'index'])->name('client.wishlist');
    Route::post('/wishlist/toggle', [App\Http\Controllers\WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::put('/cart/{id}/quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::delete('/cart', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');

    // Rating routes - MUST come before generic routing
    Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
    Route::get('/ratings/{menuItemId}', [RatingController::class, 'getItemRatings'])->name('ratings.getItemRatings');
    Route::get('/ratings/{menuItemId}/user', [RatingController::class, 'getUserRating'])->name('ratings.getUserRating');

    // Cart routes (Updated to use correct method names)
    Route::middleware('auth')->group(function () {
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
        Route::put('/cart/{id}/quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
        Route::delete('/cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
        Route::delete('/cart', [CartController::class, 'clearCart'])->name('cart.clear');
        Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
        Route::get('/cart/debug', [CartController::class, 'debug'])->name('cart.debug'); // Temporary debug route
    });

    // Checkout routes
    Route::middleware('auth')->group(function () {
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
        Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
        Route::get('/checkout/payment/{order}', [CheckoutController::class, 'payment'])->name('checkout.payment');
        Route::post('/checkout/payment/{order}/complete', [CheckoutController::class, 'completePayment'])->name('checkout.payment.complete');
        Route::get('/checkout/payment/{order}/cancel', [CheckoutController::class, 'cancelPayment'])->name('checkout.payment.cancel');
        Route::get('/checkout/confirmation/{order}', [CheckoutController::class, 'confirmation'])->name('order.confirmation');
        Route::post('/checkout/calculate-delivery-fee', [CheckoutController::class, 'calculateDeliveryFeeAjax'])->name('checkout.calculate-delivery-fee');
    });

    // Order tracking routes
    Route::middleware('auth')->group(function () {
        Route::get('/orders/{order}/track', [CheckoutController::class, 'trackOrder'])->name('orders.track');
        Route::get('/orders/history', [CheckoutController::class, 'orderHistory'])->name('orders.history');
    });

    // Test login route
    Route::post('/test-login', function(Request $request) {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                // Determine redirect URL based on user role
                $redirectUrl = '/client/home';
                if ($user && $user->role === 'admin') {
                    $redirectUrl = '/admin/dashboard';
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Login successful',
                    'redirect' => $redirectUrl,
                    'user' => [
                        'name' => $user->name,
                        'email' => $user->email,
                        'role' => $user->role
                    ]
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid credentials'
                ], 422);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    });

    // User Profile routes
    Route::middleware('auth')->group(function () {
        Route::put('/user/password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('user.password.update');
    });

    // Admin routes
    Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Test route to verify admin access
        Route::get('/test', function () {
            return '<h1>Admin Test Page</h1><p>If you can see this, admin routing is working!</p><a href="/client/home">Back to Home</a>';
        });

        // Admin Order Management routes
        Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/export', [App\Http\Controllers\Admin\OrderController::class, 'export'])->name('orders.export');
        Route::get('/orders/data', [App\Http\Controllers\Admin\OrderController::class, 'getData'])->name('orders.data');
        Route::get('/orders/{order}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('orders.show');
        Route::post('/orders/{order}/status', [App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('orders.update-status');
        Route::post('/orders/{order}/payment-status', [App\Http\Controllers\Admin\OrderController::class, 'updatePaymentStatus'])->name('orders.update-payment-status');
        Route::delete('/orders/{order}', [App\Http\Controllers\Admin\OrderController::class, 'destroy'])->name('orders.destroy');
    });

    // Generic routing - MUST come last
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});
    // Route::get('/categorydelete',[CategorySetupController::class,'categorydelete']);
    // Route::get('/itemcategorysetup',[CategorySetupController::class,'itemcategorysetup']);
    // Route::get('/categorygetdata',[CategorySetupController::class,'categorygetdata'])->name('categorygetdata');
    // Route::get('/categorysearch',[CategorySetupController::class,'categorysearch'])->name('categorysearch');


