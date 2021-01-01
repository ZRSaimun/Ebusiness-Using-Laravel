<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin','adminController@adminDashboard')->name('adminDashboard');
//Route::get('/adminLogin','loginController@adminLogin')->name('adminLogin');
//Route::get('/logout','logoutController@index')->name('logout');
