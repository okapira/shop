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

Route::get('/', 'ItemsController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// 一般
Route::resource('items', 'ItemsController', ['only' => ['index', 'show']]);
// 管理者
Route::group(['prefix' => 'admin'], function() {
   Route::resource('items', 'Admin\ItemsController');
});

// ログイン認証しているユーザーのみがアクセス可能な領域
Route::group(['middleware' => ['auth']], function () {
    // ユーザー機能
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::get('carts', 'ItemsController@carts')->name('items.carts');
    });
    // カート機能
    Route::group(['prefix' => 'carts'], function () {
        Route::get('/', 'CartsController@index')->name('carts.index');
        Route::post('{id}/add', 'CartsController@store')->name('carts.add'); // カートに商品追加
        Route::delete('{id}/remove', 'CartsController@destroy')->name('carts.remove'); // カートから商品除外
    });
});

Route::get('thanks', 'ItemsController@thanks')->name('items.thanks');