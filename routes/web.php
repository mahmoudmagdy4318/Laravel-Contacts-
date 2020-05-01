<?php

use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Resource_;

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

Route::resource('phone', 'PhoneController')->middleware('auth');
Route::resource('contact', 'ContactController')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home/editAddress', 'HomeController@editAddress')->name('home.editAddress')->middleware('auth');
Route::put('/home/updateAddress', 'HomeController@updateAddress')->name('home.updateAddress')->middleware('auth');
