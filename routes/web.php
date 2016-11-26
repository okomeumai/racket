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

Route::get('/admins', 'AdminsController@index');


Route::get('/items', 'ItemsController@index');



Route::get('/carts', 'CartsController@index');
