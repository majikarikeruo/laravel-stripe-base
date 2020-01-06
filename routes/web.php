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


大枠のレイアウトが似てるページ
→共通している部分と、ページによって確実に違う部分を
別ファイルに分けて管理する


@extends("")


@section("")


@endsection



*/


/*
routes/web.php
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/info', 'UserController@getUserInfo')->name('user.info');
Route::get('/user/edit', 'UserController@editUserInfo')->name('user.edit');
Route::post('/user/update', 'UserController@updateUserInfo')->name('user.update');

Route::post('/user/paid', 'UserController@becomePaidMember')->name('user.paid');
Route::post('/user/cancel', 'UserController@cancelPaidMember')->name('user.cancel');


Route::get('/user/payment', 'User\PaymentController@getCurrentPayment')->name('user.payment');
Route::get('/user/payment/form', 'User\PaymentController@getPaymentForm')->name('user.payment.form');
Route::post('/user/payment/store', 'User\PaymentController@storePaymentInfo')->name('user.payment.store');
Route::post('/user/payment/destroy', 'User\PaymentController@deletePaymentInfo')->name('user.payment.destroy');


//prefix・・・前につける　　middleware・・・関数実行前に通るプログラム（チェック）
Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function() {
    Route::get('/home', function () {
        return view('admin.home');
    });
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login')->name('admin.login');
    Route::get('register', 'Admin\Auth\RegisterController@showRegisterForm')->name('admin.register');
    Route::post('register', 'Admin\Auth\RegisterController@register')->name('admin.register');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function(){
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
    Route::get('home', 'Admin\HomeController@index')->name('admin.home');
});
