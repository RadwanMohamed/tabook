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

$factory->define(User::class, function (Faker $faker) {

    //`firstName`, `secondName`, `lastName`, `email`, `phone`, `password`, `city`, `street`, `house`, `guide`, `lat`, `lang`, `locationName`, `nationality`, `language`, `pic1`, `pic2`, `pic3`, `resistanceType`, `applicationType`, `balance`, `fcmToken`, `deviceType`, ``, `rate`, `role`, `type`, `max_order_number`
   $arr =  [User::ADMIN,User::CLIENT,User::DELEGATE] ;
   $statusArr = [User::SUSPENDED,User::ACTIVE,User::DISACTIVE];

    return [
        'firstName' => $faker->name,
        'secondName' => $faker->name,
        'lastName' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'phone'    => $faker->phoneNumber,
        'role'     => $role = $arr[random_int(0,2)],
        "status"   => $statusArr[random_int(0,2)],
        "max_order_number" =>  ($role == User::DELEGATE)? random_int(1,10) : null,
    ];
});
