<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Service::class, function (Faker $faker) {

    //`firstName`, `secondName`, `lastName`, `email`, `phone`, `password`, `city`, `street`, `house`, `guide`, `lat`, `lang`, `locationName`, `nationality`, `language`, `pic1`, `pic2`, `pic3`, `resistanceType`, `applicationType`, `balance`, `fcmToken`, `deviceType`, ``, `rate`, `role`, `type`, `max_order_number`
   $arr =  ["buy","replace"] ;
    return [
        'name' => $arr[random_int(0,1)],
        'price' => random_int(1,200) ,
    ];
});
