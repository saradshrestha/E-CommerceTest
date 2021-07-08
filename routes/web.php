<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/','ShopController@index')->name('index');

Route::get('/category/{slug}','ShopController@categoryShow')->name('productCategory');

Route::get('/product/{slug}','ShopController@productShow')->name('productShow');
Route::get('/products/{data}','ShopController@productList')->name('productList');
Route::post('/product/{slug}/review','ReviewController@addReview')->name('addReview');

Route::get ('/cart/show','CartController@showToCart')->name('showToCart');
Route::post('/cart/remove/{id}','CartController@removeCart')->name('removeCart');
Route::post('/cart/order-place','CartController@orderPlace')->name('orderPlce');
Route::post('/cart/{product_id}','CartController@addToCart')->name('addToCart');


Route::post('/search','ShopController@findSearch')->name('findSearch');


Route::middleware('auth')->group (function(){
	Route::get('/orders','OrderController@viewOrders')->name('viewOrders');
	Route::post('/order/placement','OrderController@addOrder')->name('addOrder');

	Route::get('/password-change','UserController@passwordChange')->name('changePassword');
	Route::put('/password-change-submit','UserController@passwordChangeSubmit')->name('changePasswordSubmit');

	Route::get ('/user/{username}','UserProfileController@showProfile')->name('showProfile');
	Route::get ('/user/{username}/edit','UserProfileController@editProfile')->name('editProfile');
	Route::put ('/user/update','UserProfileController@updateProfile')->name('updateProfile');

	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

});



Route::prefix  ('/admin')->group(function(){
	Route::get('/login', 'AdminLoginController@adminLogin')->name('adminLogin');
	Route::get('/', 'AdminLoginController@adminLogin')->name('adminLogin');
	Route::post('/login','AdminLoginController@adminLoginSubmit')->name('adminLoginSubmit');

	Route::group(['middleware' => 'admin'],function(){
		Route::get('/dashboard','AdminLoginController@dashboard')->name('adminDashboard'); 
		Route::get('/logout', 'AdminLoginController@adminLogout')->name('adminLogout');
		Route::get('/password-change','AdminController@passwordChange')->name('passwordChange');
		Route::post('/password-change-submit','AdminController@passwordChangeSubmit')->name('passwordChangeSubmit');

		// Routes for Category 
		Route::get('/category','CategoryController@index')->name('categoryIndex');
		Route::get('/category/create','CategoryController@create')->name('categoryCreate');
		Route::post('/category/create/submit','CategoryController@store')->name('categoryStore');
		Route::get('/category/{category}/edit','CategoryController@edit')->name ('categoryEdit');
		Route::PUT('/category/{category}','CategoryController@update')->name ('categoryUpdate');
		Route::post('/category/delete/{category}','CategoryController@destroy')->name('categoryDelete');
		Route::post('/category/changeStatus','CategoryController@changeStatus')->name('changeStatus');

		// Routes for Product 
		Route::get('/product','ProductController@index')->name('productIndex');
		Route::get('/product/create','ProductController@create')->name('productCreate');
		Route::post('/product/create/submit','ProductController@store')->name('productStore');
		Route::get('/product/{product}/edit','ProductController@edit')->name ('productEdit');
		Route::PUT('/product/{product}','ProductController@update')->name ('productUpdate');
		Route::post('/product/delete/{product}','ProductController@destroy')->name ('productDelete');

		Route::post('/product/featurestatus','ProductController@changeFeature')->name('changeFeature');
		Route::post('/product/changeStatus','ProductController@changeStatus')->name('productchangeStatus');


	});

});






