<?php

use App\Http\Controllers\ChocolateController;
use App\Http\Controllers\AboutController; 
use App\Http\Controllers\ContactController; 
use Illuminate\Support\Facades\Route;

Route::get('/', [ChocolateController::class, 'index'])->name('home');
Route::get('/chocolates', [ChocolateController::class, 'showChocolates'])->name('chocolates.index');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact'); // Shows the contact form
Route::post('/contact/send', [ContactController::class, 'sendContact'])->name('contact.send');

Route::get('/chocolates/{id}', [ChocolateController::class, 'getChocolateDetails'])->name('chocolates.details');
