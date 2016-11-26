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
//管理画面
//全データの表示
Route::get('/admins', 'AdminsController@index');
//商品を追加したい

//商品を削除したい




//商品一覧
//全データの表示(消費者が見るページなので最終的にはここは消す?)
Route::get('/items', 'ItemsController@index');
//商品一覧からall_rounderだけ引っ張ってきたい。
Route::get('/items/all_rounder', 'ItemsController@all_rounder');
//商品一覧からserve_and_volleyだけ引っ張ってきたい。
Route::get('/items/serve_and_volley', 'ItemsController@serve_and_volley');
//商品一覧からbaselinerだけ引っ張ってきたい。
Route::get('/items/baseliner', 'ItemsController@baseliner');


//カート
Route::get('/carts', 'CartsController@index');
Route::delete('/cart/{id}', 'CartsController@destroy');


//購入完了
Route::post('/cart/buy', 'CartsController@buy');
