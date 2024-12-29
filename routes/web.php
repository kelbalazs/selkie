<?php

use App\Http\Controllers\ChocolateController;
use App\Http\Controllers\AboutController; 
use App\Http\Controllers\ContactController; 
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

// Homepage route
Route::get('/', [ChocolateController::class, 'index'])->name('home');

// Route to display list of chocolates (hardcoded data)
Route::get('/chocolates', [ChocolateController::class, 'showChocolates'])->name('chocolates.index');

// Route to display details of a specific chocolate (hardcoded data)
Route::get('/chocolates/{id}', [ChocolateController::class, 'getChocolateDetails'])->name('chocolates.details');

// About page route
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Cart routes
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/view', [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/cart/reset', [CartController::class, 'resetCart'])->name('cart.reset');

// Checkout routes
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');  // Checkout page
Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');  // Process checkout
Route::get('/checkout/success', [CheckoutController::class, 'checkoutSuccess'])->name('checkout.success');  // Success page

// Order confirmation route
Route::get('/order/confirmation/{orderId}', [CheckoutController::class, 'confirmation'])->name('order.confirmation');

// Contact form routes
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');

// Test email route
Route::get('/test-email', function () {
    Mail::raw('This is a test email!', function ($message) {
        $message->to('selkiechocolate@mail.com')
                ->subject('Test Email');
    });

    return 'Test email sent!';
});
