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
Route::get('/pending_orders','customerController@pendingOrders')->name('customer.pending_orders');
Route::get('/order_history','customerController@orderHistory')->name('customer.order_history');
Route::get('/cart','customerController@cart')->name('customer.cart');
Route::get('/wishlist','customerController@wishlist')->name('customer.wishlist');

Route::get('/settings','customerController@settings')->name('customer.settings');
Route::post('/settings','customerController@updateAccountInfo')->name('customer.updateAccountInfo');
Route::get('/report','customerController@reportProblem')->name('customer.report');

Route::get('/cancelorder/{id}','customerController@cancelOrder');
Route::get('/remove_from_cart/{id}','customerController@removeFromCart');
Route::get('/confirm_cart/{id}','customerController@confirmCart');








//rafi
Route::get('/admin','adminController@adminDashboard')->name('adminDashboard');
Route::get('/adminLogin','loginController@adminLogin')->name('adminLogin');
Route::get('/logout','logoutController@index')->name('logout');

Route::get('/admin/profile','adminController@adminProfile')->name('adminProfile');
Route::get('/admin/profile/PersonalInfo','adminController@editAdminPresonalInfo')->name('editAdminPresonalInfo');
Route::get('/admin/profile/pic','adminController@editAdminProfilePic')->name('editAdminProfilePic'); 


