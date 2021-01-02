<?php

use Illuminate\Support\Facades\Route;
//use app\Http\Controllers\loginC;


Route::get('/', function () {
    return view('welcome');
});
//Route::get('/login','loginC@index')->name('login');
//Route::get('/login', [loginC::class, 'index']);

Route::get('/login', 'seller\loginController@index');
Route::post('/login', 'seller\loginController@verify');
Route::get('/logout', 'seller\logoutController@index')->name('logout');


Route::group(['middleware' => ['session']], function () {
    Route::get('/seller', 'seller\profileController@index');

    Route::get('/seller/addProduct', 'seller\productController@index');
    Route::post('/seller/addProduct', 'seller\productController@addProduct');

    Route::get('/seller/deleteProduct', 'seller\productController@deleteProductView');
    Route::post('/seller/deleteProduct', 'seller\productController@deleteProduct');

    Route::get('/seller/publishedProduct', 'seller\productController@publishedProductView');
    Route::post('/seller/publishedProduct', 'seller\productController@publishedProduct');

    Route::get('/seller/unpublishedProduct', 'seller\productController@unPublishedProductView');
    Route::post('/seller/unpublishedProduct', 'seller\productController@unPublishedProduct');
});

/*Route::get('/home', 'seller\homeController@index')->middleware('session');*/