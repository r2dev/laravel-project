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

Route::group(['middleware' => ['web']], function () {

    Route::get('/', "ProductController@index");
    Route::get('product/{product}', "ProductController@detail");
    Route::get('admin', "AdminController@index");
    Route::post('admin', "AdminController@create");
    Route::get('cart', "CartController@index");
    Route::post('cart/{product}', "CartController@add_product");
    Route::auth();

});
