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
Route::get('/adminLogin','loginController@adminLogin')->name('adminLogin');
Route::post('/adminLogin','loginController@verifyAdmin');

Route::get('/admin/adminRegi','adminRegistrationController@adminRegistrationview')->name('adminRegistration');
Route::post('/admin/adminRegi','adminRegistrationController@adminRegistration');
Route::get('/admin/retail/regi','adminRegistrationController@registrationOfSellerRView')->name('registrationOfSellerR');
Route::post('/admin/retail/regi','adminRegistrationController@registrationOfSellerR');
Route::get('/logout','logoutController@index')->name('logout');

Route::get('/admin/profile','adminController@adminProfile')->name('adminProfile');
Route::get('/admin/profile/PersonalInfo','adminController@editAdminPresonalInfo')->name('editAdminPresonalInfo');
Route::get('/admin/profile/pic','adminController@editAdminProfilePic')->name('editAdminProfilePic');