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
Route::get('/admin/profile/PersonalInfo','adminController@AdminPresonalInfo')->name('AdminPresonalInfo');
Route::post('/admin/profile/PersonalInfo','adminController@editAdminPresonalInfo');
Route::get('/admin/profile/pic','adminController@adminProfilePic')->name('AdminProfilePic');
Route::post('/admin/profile/pic','adminController@editAdminProfilePic');

Route::get('/admin/seller','adminController@sellerListView')->name('sellerListView');
Route::get('/admin/seller/blocking','adminController@blockingSeller');

