<?php

use App\Http\Controllers\ChocolateController;
use App\Http\Controllers\AboutController; 
use App\Http\Controllers\ContactController; 
use Illuminate\Support\Facades\Route;

Route::get('/', [ChocolateController::class, 'index'])->name('home');
Route::get('/chocolates', [ChocolateController::class, 'showChocolates'])->name('chocolates.index');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');


Route::get('/chocolates/{id}', [ChocolateController::class, 'getChocolateDetails'])->name('chocolates.details');


use Illuminate\Support\Facades\Mail;

Route::get('/test-email', function () {
    Mail::raw('This is a test email!', function ($message) {
        $message->to('selkiechocolate@mail.com')
                ->subject('Test Email');
    });

    return 'Test email sent!';
});
