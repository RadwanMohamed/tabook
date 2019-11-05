<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("firstName")->nullable();
            $table->string("secondName")->nullable();
            $table->string("lastName")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->unique();
            $table->string("password");
            $table->string("city")->nullable();
            $table->string("street")->nullable();
            $table->integer("house")->nullable();
            $table->string("guide")->nullable();
            $table->string("lat")->nullable();
            $table->string("lang")->nullable();
            $table->string("locationName")->nullable();
            $table->string("nationality")->nullable();
            $table->string("language")->nullable();
            $table->string("pic1")->nullable();
            $table->string("pic2")->nullable();
            $table->string("pic3")->nullable();
            $table->string("profile")->nullable();
            $table->string("resistanceType")->nullable();
            $table->string("applicationType")->nullable();
            $table->string("balance")->default(0);
            $table->string("fcmToken")->nullable();
            $table->string("deviceType")->nullable();
            $table->string("status")->default(\App\User::SUSPENDED);
            $table->double("rate")->nullable();
            $table->string("role")->default(\App\User::CLIENT);
            $table->string("type")->nullable();
            $table->string("max_order_number")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
