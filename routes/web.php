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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/clients', 'ClientesController@index')->name('clients');
Route::get('/client/form/create', 'ClientesController@create')->name('client_create');
Route::post('/client/store', 'ClientesController@store')->name('client_store');
Route::post('/client/{id}/update', 'ClientesController@update')->name('client_update');
Route::post('/client/{id}/remove', 'ClientesController@destroy')->name('client_remove');

Route::get('/products', 'ProdutosController@index')->name('products');
Route::get('/product/form/create', 'ProdutosController@create')->name('product_create');
Route::post('/product/store', 'ProdutosController@store')->name('product_store');
Route::post('/product/{id}/update', 'ProdutosController@update')->name('product_update');

Route::get('/brands', 'MarcasController@index')->name('brands');
Route::get('/brand/form/create', 'MarcasController@create')->name('brand_create');
Route::post('/brand/store', 'MarcasController@store')->name('brand_store');
Route::post('/brand/{id}/update', 'MarcasController@update')->name('brand_update');
Route::post('/brand/{id}/remove', 'MarcasController@destroy')->name('brand_remove');

Route::get('/brand/{id}/models', 'MarcasController@models')->name('brand_models');

Route::get('/models', 'ModelosController@index')->name('models');
Route::get('/model/form/create', 'ModelosController@create')->name('model_create');
Route::post('/model/store', 'ModelosController@store')->name('model_store');
Route::post('/model/{id}/update', 'ModelosController@update')->name('model_update');
Route::post('/model/{id}/remove', 'ModelosController@destroy')->name('model_remove');

Route::get('/ropes', 'CordasController@index')->name('ropes');
Route::get('/rope/form/create', 'CordasController@create')->name('rope_create');
Route::post('/rope/store', 'CordasController@store')->name('rope_store');
Route::post('/rope/{id}/update', 'CordasController@update')->name('rope_update');

Route::get('/orders', 'OrdensController@index')->name('orders');
Route::get('/order/select-client', 'OrdensController@selectClient')->name('order_select_client');
Route::get('/order/form/create', 'OrdensController@create')->name('order_create');
Route::get('/order/{id}', 'OrdensController@show')->name('order');
Route::post('/order/store', 'OrdensController@store')->name('order_store');
Route::post('/order/{id}/update', 'OrdensController@update')->name('order_update');
