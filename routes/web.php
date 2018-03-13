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
