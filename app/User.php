<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    const ANDROID = "android";
    const IPHONE  = "iphone";
    const CLIENT  = "client";
    const DELEGATE  = "delegate";
    const ADMIN     = "admin";
    const RESTAURANT = 'restaurant';
    const HOME  = 'home';
    const HOTEL = "hotel";
    const ACTIVE   = "active";
    const DISACTIVE = "disactive";
    const SUSPENDED = "suspended";
    use  Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'secondName', 'lastName', 'email', 'phone', 'password', 'city', 'street', 'house', 'guide', 'lat', 'lang', 'locationName', 'nationality', 'language', 'pic1', 'pic2', 'pic3', 'resistanceType', 'applicationType', 'price', 'fcmToken', 'deviceType','role','type','max_order_number','status','profile'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',"pivot"
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function delegateOrders()
    {
        return $this->hasMany("App\Order","delegate_id");
    }
    function clientOrders()
    {
        return $this->hasMany("App\Order","client_id");
    }
    public function services()
    {
        return $this->belongsToMany("App\Service","user_services","user_id","service_id");
    }
}
