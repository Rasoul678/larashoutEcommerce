<?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    require 'admin.php';
    Auth::routes();

    Route ::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');

    Route::get('/product/{slug}', 'Site\ProductController@show')->name('product.show');

    Route::post('/product/add/cart', 'Site\ProductController@addToCart')->name('product.add.cart');
