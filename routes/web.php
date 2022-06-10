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

Route::get('/','HomeController@index')->name('welcome');
Route::post('/reservation','ReservationController@reserve')->name('reservation.reserve');
Route::post('/contact','ContactController@sendMessage')->name('contact.send');
Route::post('/signin','SigninController@login')->name('signin.send');
Route::get('/signin','SigninController@index')->name('signin.get');
Route::get('/signup','SignupController@index')->name('signup.get');
Route::post('/signup','SignupController@register')->name('signup.send');
Route::post('/signout','SignoutController@index')->name('signout.send');


Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'], function (){
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::resource('employee','EmployeeController');
    Route::resource('customer','CustomerController');

    Route::get('reservation','ReservationController@index')->name('reservation.index');
    Route::post('reservation/{id}','ReservationController@status')->name('reservation.status');
    Route::delete('reservation/{id}','ReservationController@destory')->name('reservation.destroy');

    Route::get('contact','ContactController@index')->name('contact.index');
    Route::get('contact/{id}','ContactController@show')->name('contact.show');
    Route::delete('contact/{id}','ContactController@destroy')->name('contact.destroy');
});

Route::group(['prefix'=>'viewer','namespace'=>'viewer'], function (){
    Route::get('dashboard', 'DashboardController@index')->name('viewer.dashboard');
    Route::get('history', 'HistoryController@index')->name('viewer.history');
    Route::resource('customerV','CustomerVController');
});
