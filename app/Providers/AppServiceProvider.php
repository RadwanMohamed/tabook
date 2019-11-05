<?php

namespace App\Providers;

use App\RateUser;
use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        RateUser::created(function ($rateUser){
            $rateValue = 0;
            $count = 0;
           $rates = RateUser::where(["delegate_id"=>$rateUser->delegate_id])->get();
           foreach ($rates as $rate)
           {
               $rateValue +=$rate->rate;
               $count++;
           }
           User::where("id",$rateUser->delegate_id)->update(["rate"=>$rateValue/$count]);
        });
    }
}
