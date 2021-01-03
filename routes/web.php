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

Route::get('/', function () {
    return ('welcome');
});

//soumik 
Route::get('/login',function () { return view('login.index'); })->name('generalLoginPage');
Route::post('/login','loginController@verifyLogin')->name('verifyLogin');

Route::get('/dashboard','customerController@dashboard')->name('customer.index');




//rafi
Route::get('/admin','adminController@adminDashboard')->name('adminDashboard');
Route::get('/adminLogin','loginController@adminLogin')->name('adminLogin');
Route::get('/logout','logoutController@index')->name('logout');

Route::get('/admin/profile','adminController@adminProfile')->name('adminProfile');
Route::get('/admin/profile/PersonalInfo','adminController@editAdminPresonalInfo')->name('editAdminPresonalInfo');
Route::get('/admin/profile/pic','adminController@editAdminProfilePic')->name('editAdminProfilePic'); 


