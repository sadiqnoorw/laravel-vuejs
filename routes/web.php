<?php

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

Route::group(['middleware' => 'auth'], function(){

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/restaurants', 'RestaurantController@index')->name('restos');
	Route::get('/restaurants/menu/{id}', 'MenuController@index')->name('restos.menu');
	Route::get('/restaurants/orders/{id}', 'RestaurantOrderController@index')->name('resto.orders');
	Route::get('/restaurants/orders/{id}/add', 'RestaurantOrderController@add')->name('resto.orders.add');

});