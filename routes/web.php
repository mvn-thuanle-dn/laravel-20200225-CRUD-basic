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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/products', 'ProductController@index')->name('products.index');

Route::get('/products/create', 'ProductController@create')->name('products.create');
Route::post('/products/create', 'ProductController@store')->name('products.store');

Route::get('/products/edit/{product}', 'ProductController@edit')->name('products.edit');
Route::put('/products/edit/{product}', 'ProductController@update')->name('products.update');

Route::delete('/products/destroy/{product}', 'ProductController@destroy')->name('products.destroy');

