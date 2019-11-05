<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \App\User::truncate();
        \App\Service::truncate();
        \App\Order::truncate();
        \App\UserService::truncate();
        factory(\App\User::class,50)->create();
        factory(\App\Service::class,50)->create();
        factory(\App\Order::class,50)->create();
        factory(\App\UserService::class,50)->create();
    }
}
