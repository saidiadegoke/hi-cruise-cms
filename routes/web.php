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



Route::get('/about', 'CruiseController@about')->name('about');
Route::get('/contact', 'CruiseController@contact')->name('contact');
Route::get('/eugene', 'CruiseController@eugene')->name('eugene');
Route::get('/eugene1', 'CruiseController@eugene1')->name('eugene1');
Route::get('/gallery', 'CruiseController@gallery')->name('gallery');
Route::get('/packages', 'CruiseController@packages')->name('packages');


Route::post('/details', 'ReservationController@fetchDetails')->name('details');
Route::get('/details/{yatch}/{package}', 'ReservationController@details')->name('package_details');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/offline', 'PaymentController@offlinePayment')->name('offline_payment');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::get('/{customer}/reservations', 'ReservationController@all')->name('reservations');
Route::post('/reservations/new', 'ReservationController@store')->name('reserve');
Route::get('payments/{reference?}/{reservation?}', "PaymentController@response")->name('response');

Route::get('/print_receipt/{reservation}', "ReservationController@printReciept")->name('print_receipt');

Route::prefix('admin')->middleware('auth')->group(function() {
	Route::get('/', 'Admin\AdminController@index')->name('admin');
	Route::resource('slides', 'Admin\SlidesController');

});
