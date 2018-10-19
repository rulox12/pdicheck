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
    return view('implementation.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('createcomm', 'Admin\commerceController@create')->name('createcomm');

Route::get('createcommv', function () {
    return view('commerce/index');
})->name('createcommv');

Route::get('createsitev', 'Admin\siteController@indexv')->name('createsitev');

Route::get('listCommerce', 'Admin\commerceController@index')->name('listCommerce');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
