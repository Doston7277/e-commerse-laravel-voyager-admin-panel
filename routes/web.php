<?php

use Illuminate\Support\Facades\Route;
use App\Controller\ViewController;
use App\Http\Controllers\ProductController;
// Frontend
Route::get('/', 'ViewController@index');
Route::get('/about', 'ViewController@about');
Route::get('/blog', 'ViewController@blog');
Route::get('/contact', 'ViewController@contact');
Route::get('/product', 'ViewController@product');

Route::get('/product/{id}', 'ViewController@product_det');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
