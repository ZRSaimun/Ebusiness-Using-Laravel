<?php

use Illuminate\Support\Facades\Route;
//use app\Http\Controllers\loginC;
use Illuminate\Support\Facades\Auth;

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
//Route::get('/login', 'loginC@index')->name('login');
//Route::get('/login', [loginC::class, 'index']);


//Route::get('/login', 'seller\loginController@index');
//Route::post('/login', 'seller\loginController@verify');
Route::get('/logout', 'seller\logoutController@index')->name('logout');


//Route::get('/seller', 'seller\profileController@index');
Route::group(['middleware' => ['session']], function () {


    Route::get('/seller/addProduct', 'seller\productController@index');
    Route::post('/seller/addProduct', 'seller\productController@addProduct');

    Route::get('/seller/deleteProduct', 'seller\productController@deleteProductView');
    Route::post('/seller/deleteProduct', 'seller\productController@deleteProduct');

    Route::get('/seller/publishedProduct', 'seller\productController@publishedProductView');
    Route::post('/seller/publishedProduct', 'seller\productController@publishedProduct');

    Route::get('/seller/unpublishedProduct', 'seller\productController@unPublishedProductView');
    Route::post('/seller/unpublishedProduct', 'seller\productController@unPublishedProduct');

    Route::get('/seller/editProduct', 'seller\productController@editProductView');
    Route::post('/seller/editProduct', 'seller\productController@editProduct')->name('editPP');

    Route::get('/seller/addCoupon', 'seller\productController@addCouponView');
    Route::get('/seller/addCouponq', 'seller\productController@addCouponView1');
    Route::post('/seller/addCoupon', 'seller\productController@addCoupon');

    Route::get('/seller/addCatagory', 'seller\productController@addCatagoryView');
    Route::post('/seller/addCatagory', 'seller\productController@addCatagory');

    Route::get('/seller/reviewProduct', 'seller\sellController@reviewProductView');
    Route::get('/seller/reviewProduct/{productID}', 'seller\sellController@reviewProductDetails');
    //Route::post('/seller/reviewProduct', 'seller\sellController@reviewProduct');

    Route::get('/seller/totalIncome', 'seller\sellController@totalIncomeView');
    Route::get('seller/totalIncomeDetails/', 'seller\sellController@totalIncomeView');
    Route::get('/seller/totalIncomeDetails/{productID}', 'seller\sellController@totalIncomeDetails');
    //Route::post('/seller/totalIncome', 'seller\sellController@totalIncome');

    Route::get('/seller/deliverdOrders', 'seller\sellController@deliveredOrderView');

    Route::get('/seller/pendingOrders', 'seller\sellController@pendingOrderView');
    Route::post('/seller/pendingOrders', 'seller\sellController@pendingOrder');

    Route::get('/seller/reportCustomer', 'seller\sellController@reportCustomerView');
    Route::get('/seller/reportCustomer/{customerID}', 'seller\sellController@reportCustomerDetails');
    Route::post('/seller/reportCustomer/{customerID}', 'seller\sellController@reportCustomer');
    
    //Retail Seller
    Route::get('/logout', 'retailseller\logoutController@index')->name('logout');

Route::group(['middleware' => ['session']], function () {


    Route::get('/retailseller/addProduct', 'retailseller\productController@index');
    Route::post('/retailseller/addProduct', 'retailseller\productController@addProduct');

    Route::get('/retailseller/deleteProduct', 'retailseller\productController@deleteProductView');
    Route::post('/retailseller/deleteProduct', 'retailseller\productController@deleteProduct');

    Route::get('/retailseller/publishedProduct', 'retailseller\productController@publishedProductView');
    Route::post('/retailseller/publishedProduct', 'retailseller\productController@publishedProduct');

    Route::get('/retailseller/unpublishedProduct', 'retailseller\productController@unPublishedProductView');
    Route::post('/retailseller/unpublishedProduct', 'retailseller\productController@unPublishedProduct');

    Route::get('/retailseller/editProduct', 'retailseller\productController@editProductView');
    Route::post('/retailseller/editProduct', 'retailseller\productController@editProduct')->name('editPP');

    Route::get('/retailseller/addCoupon', 'retailseller\productController@addCouponView');
    Route::get('/retailseller/addCouponq', 'retailseller\productController@addCouponView1');
    Route::post('/retailseller/addCoupon', 'retailseller\productController@addCoupon');

    Route::get('/retailseller/addCatagory', 'retailseller\productController@addCatagoryView');
    Route::post('/retailseller/addCatagory', 'retailseller\productController@addCatagory');

    Route::get('/retailseller/reviewProduct', 'retailseller\sellController@reviewProductView');
    Route::get('/retailseller/reviewProduct/{productID}', 'retailseller\sellController@reviewProductDetails');


    Route::get('/retailseller/totalIncome', 'retailseller\sellController@totalIncomeView');
    Route::get('retailseller/totalIncomeDetails/', 'retailseller\sellController@totalIncomeView');
    Route::get('/retailseller/totalIncomeDetails/{productID}', 'retailseller\sellController@totalIncomeDetails');
   
    Route::get('/retailseller/deliverdOrders', 'retailseller\sellController@deliveredOrderView');

    Route::get('/retailseller/pendingOrders', 'retailseller\sellController@pendingOrderView');
    Route::post('/retailseller/pendingOrders', 'retailseller\sellController@pendingOrder');

    Route::get('/retailseller/reportCustomer', 'retailseller\sellController@reportCustomerView');
    Route::get('/retailseller/reportCustomer/{customerID}', 'retailseller\sellController@reportCustomerDetails');
    Route::post('/retailseller/reportCustomer/{customerID}', 'retailseller\sellController@reportCustomer');
    
});

Auth::routes();

Route::get('/seller', 'seller\profileController@index')->name('home');
Route::get('/login/github', 'Auth\LoginController@github')->name('github-login');
Route::get('/login/github/redirect', 'Auth\LoginController@githubRedirect')->name('githubReditrect');
Route::get('/retailseller', 'retailseller\profileController@index')->name('home');

//ADMIN
Route::get('/adminLogin','loginController@adminLogin')->name('adminLogin');
Route::post('/adminLogin','loginController@verifyAdmin');

Route::get('/adminLogin/github','loginController@githubloginSocialAdmin')->name('adminSocialLogin');
Route::get('/adminLogin/github/redirect','loginController@githubloginSocialRedirectAdmin')->name('adminSocialLoginRedirect');

Route::get('/admin','adminController@adminDashboard')->name('adminDashboard')->middleware('adminRoute');

Route::group(['middleware' => ['adminVerifyy']], function () {

Route::get('/admin/adminRegi','adminRegistrationController@adminRegistrationview')->name('adminRegistration');
Route::post('/admin/adminRegi','adminRegistrationController@adminRegistration');
Route::get('/admin/retail/regi','adminRegistrationController@registrationOfSellerRView')->name('registrationOfSellerR');
Route::post('/admin/retail/regi','adminRegistrationController@registrationOfSellerR');
Route::get('/logout','logoutController@index')->name('logout');


Route::get('/admin/adminRegi', 'adminRegistrationController@adminRegistrationview')->name('adminRegistration');
Route::post('/admin/adminRegi', 'adminRegistrationController@adminRegistration');
Route::get('/admin/retail/regi', 'adminRegistrationController@registrationOfSellerRView')->name('registrationOfSellerR');
Route::post('/admin/retail/regi', 'adminRegistrationController@registrationOfSellerR');
Route::get('/logout', 'logoutController@index')->name('logout');

Route::get('/admin/profile', 'adminController@adminProfile')->name('adminProfile');


Route::get('/admin/profile/PersonalInfo', 'adminController@AdminPresonalInfo')->name('AdminPresonalInfo');
Route::post('/admin/profile/PersonalInfo', 'adminController@editAdminPresonalInfo');
Route::get('/admin/profile/pic', 'adminController@adminProfilePic')->name('AdminProfilePic');
Route::post('/admin/profile/pic', 'adminController@editAdminProfilePic');

Route::get('/admin/seller','adminController@sellerListView')->name('sellerListView');
Route::get('/admin/seller/blocking','adminController@blockingSeller');
Route::get('/admin/seller/delete','adminController@deleteSeller');
Route::get('/admin/seller/add','adminController@adminAddSellerView')->name('adminAddSellerView');
Route::post('/admin/seller/add','adminController@adminAddSeller');
Route::get('/admin/verifySeller','adminController@adminVerifySellerView')->name('adminVerifySellerView');
Route::get('/admin/SellerVerify','adminController@adminSellerVerify')->name('adminSellerVerify');


Route::get('/admin/retailManager','adminController@adminRetailView')->name('adminRetailView');
Route::get('/admin/retailManager/delete','adminController@deleteRetail');

Route::get('/admin/event/addEvent','adminController@addEventView')->name('addEventView');
Route::post('/admin/event/addEvent','adminController@addEvent');
Route::get('/admin/event','adminController@eventView')->name('eventView');

Route::get('/admin/customer','adminController@customerView')->name('customerView');
Route::get('/admin/customer/{id}','adminController@customerBanView')->name('customerBanView');
Route::post('/admin/customer/{id}','adminController@customerBan');
Route::get('/admin/customer/unban/{id}','adminController@customerUnban')->name('customerUnban');

Route::get('/admin/getCustomerPDF','adminPdfController@index')->name('customerPDF');

Route::get('/admin/list/catagory','adminController@aCatagoryView')->name('aCatagoryView');
Route::get('/admin/revenue','adminController@revenueView')->name('revenueView');

Route::get('/admin/revenueGenarate','adminPdfController@index1')->name('revenueGenaratePDF');

Route::get('/admin/reportinggView','adminController@reportinggView')->name('reportingg');
Route::get('/admin/report/delete','adminController@reportDelete');

Route::get('/admin/list/product','adminController@adminProductList')->name('adminProductList');
Route::get('/admin/list/order','adminController@adminorderList')->name('adminorderList');

});

