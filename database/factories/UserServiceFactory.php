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

$factory->define(\App\UserService::class, function (Faker $faker) {
  //  `service_id`, `user_id`, `activation`
    $acti  = [\App\Service::ENABLED,\App\Service::DISABLED];
    return [
        'service_id' => random_int(1,2),
        "user_id" => (User::where("role",User::DELEGATE)->get()[random_int(0,5)])->id,
        "activation" => $acti[random_int(0,1)],
    ];
});
