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

    return view('backend.layouts.app');
});

route::get("login","Backend\Auth\LoginController@showLoginForm");
route::post("login","Backend\Auth\LoginController@login");
route::get("logout","Backend\Auth\LoginController@logout");

Route::group(["middleware"=>["web","admin"]],function (){
    Route::resource("admin","Backend\Admin\AdminController");
    Route::get("orders","Backend\Order\OrderController@index");
    Route::get("charge","Backend\Charge\ChargeController@index");
    Route::post("application/update","Backend\Application\ApplicationController@update");
    Route::resource("application","Backend\Application\ApplicationController");



    Route::get("dash","Backend\HomeController@index");
    Route::get("/","Backend\HomeController@index");
    Route::get("/home","Backend\HomeController@index");
});
