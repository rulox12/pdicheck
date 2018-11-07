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

Route::get('/up', function(){
    return view('implementation/update');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('sites', 'Admin\siteController');

Route::resource('commerces', 'Admin\commerceController');

Route::resource('integrationtype', 'Admin\typeIntegrationController');

Route::resource('implementation', 'admin\implementationController');

Route::resource('pdf', 'admin\pdfController');