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


/* 管理画面 */
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
    Route::get('lessons', 'Admin\HomeController@getLessons')->name('admin.lessons');
    Route::get('lessons/new', 'Admin\HomeController@getLessonForm')->name('admin.lessons.new');
    Route::post('lessons/store', 'Admin\HomeController@storeLessonData')->name('admin.lessons.store');
    Route::get('lessons/{id}', 'Admin\HomeController@showLessonInfo')->name('admin.lessons.edit');
    Route::get('lessons/edit/{id}', 'Admin\HomeController@getLessonEditForm')->name('admin.lessons.edit');
    Route::post('lessons/update/{id}', 'Admin\HomeController@updateLessonData')->name('admin.lessons.update');
    Route::get('schedule', 'Admin\HomeController@getScheduleForm')->name('admin.schedule');
    Route::post('schedule/store', 'Admin\HomeController@storeLessonSchedule')->name('admin.schedule.store');

    Route::get('apply/list', 'Admin\HomeController@getApplyList')->name('admin.apply.list');

});
