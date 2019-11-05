<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["middleware"=>["api"]],function (){

    //Auth Routes
    Route::post("register","Api\Auth\RegisterController@register");
    Route::post("login","Api\Auth\LoginController@login");
    Route::post("password/reset","Api\Auth\ResetPasswordController@newPassword");
    Route::get("application/information","Api\Application\ApplicationController@index");
    Route::get("delegate/service","Api\Delegate\DelegateController@allEnabledServices");

    Route::group(["middleware"=>["api",'auth:api']],function(){
        // orders routes
        Route::post("order/complete","Api\Order\OrderController@setOrderDone");
        Route::post("order/{order}/delay","Api\Order\OrderController@delayOrder");
      Route::resource("order","Api\Order\OrderController");


      //delegates
        Route::get("delegates","Api\Delegate\DelegateController@index");
        Route::get("delegates/myorders","Api\Delegate\DelegateOrderController@getMyOrders");
        Route::get("delegates/previousorders","Api\Delegate\DelegateOrderController@getPreviousOrders");


        Route::post("delegate/service/enable","Api\Delegate\DelegateController@enableService");
        Route::post("delegate/service/disable","Api\Delegate\DelegateController@disableService");

         //clients
        Route::get("clients","Api\Client\ClientController@index");
        Route::get("clients/myorders","Api\Client\ClientOrderController@getMyOrders");
        Route::get("clients/previousorders","Api\Client\ClientOrderController@getPreviousOrders");

        //user Routes
        Route::post("user/charge","Api\User\UserChargeController@charge");
        Route::resource("users","Api\User\UserController");

        // Application information

        Route::get("services/vendors","Api\Service\ServiceController@enabledServicesforVendors");
        Route::get("services/vendor","Api\Service\ServiceController@enabledServicesByVendor");
        Route::resource("services","Api\Service\ServiceController");
        Route::post("delegate/rate","Api\Delegate\ReteDelegateController@store");
    });

});
//ssh b1k4kjcv1s2j@garag-app.com
//Radwan123@

 // eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImM1MGI2YWRjNTkwN2I2MzVmNmFlZjMzODgzNjI0ZTNkZDAwOTU0M2NjYzQwY2Q4ZTVmMDNhZWZiMzFiZmY3MDJkYjg3NzNmOTNhYWJmNThkIn0.eyJhdWQiOiIxIiwianRpIjoiYzUwYjZhZGM1OTA3YjYzNWY2YWVmMzM4ODM2MjRlM2RkMDA5NTQzY2NjNDBjZDhlNWYwM2FlZmIzMWJmZjcwMmRiODc3M2Y5M2FhYmY1OGQiLCJpYXQiOjE1NjgzNTk1OTksIm5iZiI6MTU2ODM1OTU5OSwiZXhwIjoxNTk5OTgxOTk5LCJzdWIiOiI1NyIsInNjb3BlcyI6W119.RBKYm0oERptjWh-G9pg9CzfFbiECkGU2ffciAkM7rRps6mMBHqukqU5Ktf5agJJiQ395XMpS5_UEt6yt6HZqyszuEa80XAG7qsd05VNTlsizJgt7B9PKxG8k4rMUXE7Ez8ZsMBGizY2zNte0xcfp63IX_qLHxZ2I_4_-DPdo-wNSB0zbqkbOmOaNhY4ZrBsbey5_9s1oIE0OQiQY5k_ooEkjwoRks7dZHrYH7qhj-ndmZ7wMzrSQXuve68f8xihIlcKlIiDIg7zgjcVb6TrogmJUwFwHvD0vP2ztvuAfIXpJYdOMY61b5Tm_8AoBw9K51kD68UnWaanQgLQlj57-weC2qrB8YZYMiyowxcr_y7jp4jhvs_iEJ1Z1PHUPHjqh6aHMTLTqd11wDyPVvc-BYsgYJMejPbn0N6WrAabb0jKKnbXlROW1voibJ4wSIVldlYPymqYPpiaVWwTumVue4Zsf_OP58YGk8b7s_A3R_23FfA6M9DEPuKJh1vYDxEzO46Pn0ksYiiaCWQosIUq_7KJRq1ewFkiiecjZYnGokFOjsBVkfKxKykdaGz2O4Gq8zk0ks48iLj4DVTkXICOuszmrBviTT8M1KH8m0n1x8fMgQ9J9ABpnMfNiZ5NHU4ePdJJTZyY6yD7HB6eB36hBRQriZTC6QucMSxKrN6y_5Mo
