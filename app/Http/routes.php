<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'frontend\HomeController@index');
Route::get('san-pham/{slug}.{id}.html',[ 'as'=>'product.details','uses' => 'frontend\HomeController@productDetails']);
Route::get('gio-hang.html',[ 'as'=>'product.cart','uses' => 'frontend\HomeController@cartList']);
Route::post('cart/{id}/store',[ 'as'=>'cart.store','uses' => 'frontend\HomeController@cartStore']);
Route::post('cart/update',[ 'as'=>'cart.update','uses' => 'frontend\HomeController@cartUpdate']);
Route::post('productComment/{id}',['as'=>'product.comment','uses' => 'frontend\HomeController@productComment']);
//Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::get('/',['as'=>'dashboard','uses'=>'backend\DashboardController@index']);
	//Route::post('ajax/image',['as'=>'ajax.image','uses' => 'backend\AjaxGlobalController@image']);
	Route::controllers(['ajax'=>'backend\AjaxGlobalController']);
	Route::controllers(['calendar'=>'backend\CalendarController']);
	// Roles
	Route::get('roles',['as'=>'roles.index','uses' => 'Auth\RolesController@index']);
	Route::get('roles/create',['as'=>'roles.create','uses' => 'Auth\RolesController@create']);
	Route::post('roles/store',['as'=>'roles.store','uses' => 'Auth\RolesController@store']);
	Route::get('roles/{id}/show',['as'=>'roles.show','uses' => 'Auth\RolesController@show']);
	Route::get('roles/{id}/edit',['as'=>'roles.edit','uses' => 'Auth\RolesController@edit']);
	Route::put('roles/{id}',['as'=>'roles.update','uses' => 'Auth\RolesController@update']);
	Route::get('roles/{id}/destroy',['as'=>'roles.destroy','uses' => 'Auth\RolesController@destroy']);
	Route::get('roles/data',['as'=>'roles.data','uses' => 'Auth\RolesController@data']);


	// Users
	Route::get('users',['as'=>'users.index','uses' => 'Auth\UsersController@index']);
	Route::get('users/create',['as'=>'users.create','uses' => 'Auth\UsersController@create']);
	Route::post('users/store',['as'=>'users.store','uses' => 'Auth\UsersController@store']);
	Route::get('users/{id}/show',['as'=>'users.show','uses' => 'Auth\UsersController@show']);
	Route::get('users/{id}/edit',['as'=>'users.edit','uses' => 'Auth\UsersController@edit']);
	Route::put('users/{id}',['as'=>'users.update','uses' => 'Auth\UsersController@update']);
	Route::get('users/{id}/destroy',['as'=>'users.destroy','uses' => 'Auth\UsersController@destroy']);


	Route::get('profile',['as'=>'profile.index','uses' => 'Auth\ProfileController@index']);
	Route::get('profile/edit',['as'=>'profile.edit','uses' => 'Auth\ProfileController@edit']);
	Route::put('profile',['as'=>'profile.update','uses' => 'Auth\ProfileController@update']);


	// ArticleCategorys
	Route::get('articlecategorys',['as'=>'articlecategorys.index','uses' => 'backend\ArticleCategorysController@index']);
	Route::get('articlecategorys/create',['as'=>'articlecategorys.create','uses' => 'backend\ArticleCategorysController@create']);
	Route::post('articlecategorys/store',['as'=>'articlecategorys.store','uses' => 'backend\ArticleCategorysController@store']);
	Route::get('articlecategorys/{id}/show',['as'=>'articlecategorys.show','uses' => 'backend\ArticleCategorysController@show']);
	Route::get('articlecategorys/{id}/edit',['as'=>'articlecategorys.edit','uses' => 'backend\ArticleCategorysController@edit']);
	Route::put('articlecategorys/{id}',['as'=>'articlecategorys.update','uses' => 'backend\ArticleCategorysController@update']);
	Route::get('articlecategorys/{id}/destroy',['as'=>'articlecategorys.destroy','uses' => 'backend\ArticleCategorysController@destroy']);
	Route::get('articlecategorys/data',['as'=>'articlecategorys.data','uses' => 'backend\ArticleCategorysController@data']);


	// Articles
	Route::get('articles',['as'=>'articles.index','uses' => 'backend\ArticlesController@index']);
	Route::get('articles/create',['as'=>'articles.create','uses' => 'backend\ArticlesController@create']);
	Route::post('articles/store',['as'=>'articles.store','uses' => 'backend\ArticlesController@store']);
	Route::get('articles/{id}/show',['as'=>'articles.show','uses' => 'backend\ArticlesController@show']);
	Route::get('articles/{id}/edit',['as'=>'articles.edit','uses' => 'backend\ArticlesController@edit']);
	Route::put('articles/{id}',['as'=>'articles.update','uses' => 'backend\ArticlesController@update']);
	Route::get('articles/{id}/destroy',['as'=>'articles.destroy','uses' => 'backend\ArticlesController@destroy']);
	Route::get('articles/data',['as'=>'articles.data','uses' => 'backend\ArticlesController@data']);

	// ProductsCategorys
	Route::get('productcategorys',['as'=>'productcategorys.index','uses' => 'backend\ProductCategorysController@index']);
	Route::get('productcategorys/create',['as'=>'productcategorys.create','uses' => 'backend\ProductCategorysController@create']);
	Route::post('productcategorys/store',['as'=>'productcategorys.store','uses' => 'backend\ProductCategorysController@store']);
	Route::get('productcategorys/{id}/show',['as'=>'productcategorys.show','uses' => 'backend\ProductCategorysController@show']);
	Route::get('productcategorys/{id}/edit',['as'=>'productcategorys.edit','uses' => 'backend\ProductCategorysController@edit']);
	Route::put('productcategorys/{id}',['as'=>'productcategorys.update','uses' => 'backend\ProductCategorysController@update']);
	Route::get('productcategorys/{id}/destroy',['as'=>'productcategorys.destroy','uses' => 'backend\ProductCategorysController@destroy']);
	Route::get('productcategorys/data',['as'=>'productcategorys.data','uses' => 'backend\ProductCategorysController@data']);

	// Products
	Route::get('products',['as'=>'products.index','uses' => 'backend\ProductsController@index']);
	Route::get('products/create',['as'=>'products.create','uses' => 'backend\ProductsController@create']);
	Route::post('products/store',['as'=>'products.store','uses' => 'backend\ProductsController@store']);
	Route::get('produts/{id}/show',['as'=>'products.show','uses' => 'backend\ProductsController@show']);
	Route::get('products/{id}/edit',['as'=>'products.edit','uses' => 'backend\ProductsController@edit']);
	Route::put('products/{id}',['as'=>'products.update','uses' => 'backend\ProductsController@update']);
	Route::get('products/{id}/destroy',['as'=>'products.destroy','uses' => 'backend\ProductsController@destroy']);
	Route::get('products/data',['as'=>'products.data','uses' => 'backend\ProductsController@data']);

	// Slide
	Route::get('slides',['as'=>'slides.index','uses' => 'backend\SlidesController@index']);
	Route::get('slides/create',['as'=>'slides.create','uses' => 'backend\SlidesController@create']);
	Route::post('slides/store',['as'=>'slides.store','uses' => 'backend\SlidesController@store']);
	Route::get('slides/{id}/show',['as'=>'slides.show','uses' => 'backend\SlidesController@show']);
	Route::get('slides/{id}/edit',['as'=>'slides.edit','uses' => 'backend\SlidesController@edit']);
	Route::put('slides/{id}',['as'=>'slides.update','uses' => 'backend\SlidesController@update']);
	Route::get('slides/{id}/destroy',['as'=>'slides.destroy','uses' => 'backend\SlidesController@destroy']);
	Route::get('slides/data',['as'=>'slides.data','uses' => 'backend\SlidesController@data']);
});
