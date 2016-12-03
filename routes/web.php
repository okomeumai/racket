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
Route::post('/admins', 'AdminsController@create');
//商品を更新したい
Route::patch('/admins/{id}', 'AdminsController@update');
//商品を削除したい
Route::delete('/admins/{id}', 'AdminsController@destroy');


//トップページ表示
Route::get('/', 'ItemsController@top');

//商品一覧
//各カテゴリーデータの表示。ハテナをつけると変数が入っている場合と空の場合の２つ場合を表現できる
Route::get('/items/{category?}', 'ItemsController@index');


//カート
Route::get('/carts', 'CartsController@index');
Route::post('/carts/buy', 'CartsController@buy');
Route::post('/carts/{category}/{id}', 'CartsController@create');
Route::delete('/carts/{id}', 'CartsController@destroy');
Route::patch('/carts/{id}', 'CartsController@update');



//購入完了
Route::post('/cart/buy', 'CartsController@buy');
