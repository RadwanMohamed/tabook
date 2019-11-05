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

$factory->define(\App\Order::class, function (Faker $faker) {
//`delegate_id`, `client_id`, `service_id`
    $status = [\App\Order::DONE,\App\Order::NEW];
    return [
        'notesToDelgates' => $faker->paragraph,
        'address' => $faker->address ,
        'quantity' => random_int(1,5) ,
        'status' => $status[random_int(0,1)],
        "delegate_id" => (User::where("role",User::DELEGATE)->get()[random_int(0,5)])->id,
        "client_id" => (User::where("role",User::CLIENT)->get()[random_int(0,5)])->id,
        "service_id" => random_int(1,2),


    ];
});
