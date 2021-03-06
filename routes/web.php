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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('sites', 'Admin\siteController');

Route::resource('commerces', 'Admin\commerceController');

Route::resource('item', 'Admin\itemController');

Route::resource('integrationtype', 'Admin\typeIntegrationController');

Route::resource('implementation', 'Admin\implementationController');

Route::resource('pdf', 'Admin\pdfController');

Route::resource('return', 'Admin\returController');


Route::get('/register', 'admin\RegisterController@create')->name('indexcreateuser');
Route::post('/registeruser', 'admin\RegisterController@store')->name('createuser');
Route::get('/getusers', 'admin\RegisterController@getusers')->name('getusers');


Route::get('/pdft', function(){
    $pdf = resolve('dompdf.wrapper');
    $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->stream();
});