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



Route::get('/about', 'CruiseController@about')->name('about');
Route::get('/contact', 'CruiseController@contact')->name('contact');
Route::get('/eugene', 'CruiseController@eugene')->name('eugene');
Route::get('/eugene1', 'CruiseController@eugene1')->name('eugene1');
Route::get('/gallery', 'CruiseController@gallery')->name('gallery');
Route::get('/packages', 'CruiseController@packages')->name('packages');
