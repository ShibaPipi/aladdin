<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->prefix('v1')->middleware('cors')->group(function () {
    //用户注册
    Route::post('/users', 'UserController@store')->name('users.store');
    //用户登录
    Route::post('/login', 'UserController@login')->name('users.login');
    //用户列表
    Route::get('/users', 'UserController@index')->name('users.index');
    //用户信息
    Route::get('/users/{user}', 'UserController@show')->where('user', '[0-9]+')->name('users.show');
    Route::middleware('api.refresh')->group(function () {
        //当前用户信息
        Route::get('/users/info', 'UserController@info')->name('users.info');
        //用户退出
        Route::get('/logout', 'UserController@logout')->name('users.logout');
    });

    // 文章列表
    Route::get('/posts', 'PostController@index')->name('posts.index');
    // 文章详情
    Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
    // 编辑 / 修改文章
    Route::post('/posts', 'PostController@store')->name('posts.store');

    // 采购列表
    Route::get('/purchases', 'PurchaseController@index')->name('purchases.index');
    // 新增采购
    Route::post('/purchases', 'PurchaseController@store')->name('purchases.store');
    // 装运列表
    Route::get('/shipments', 'ShipmentController@index')->name('shipments.index');
    // 新增装运
    Route::post('/shipments', 'ShipmentController@store')->name('shipments.store');
});
Route::resource('cars', 'CarController');
