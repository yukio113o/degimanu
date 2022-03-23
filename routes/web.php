<?php

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

Route::get('/', 'ProductController@index');

Route::post('products/{product}/reviews', 'ReviewController@store');
Route::get('products/{product}/favorite', 'ProductController@favorite')->name('product.favorite');
Route::resource('products', 'ProductController');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
