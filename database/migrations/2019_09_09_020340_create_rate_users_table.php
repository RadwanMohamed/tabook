<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("client_id")->unsigned();
            $table->bigInteger("delegate_id")->unsigned();
            $table->double("rate")->nullable();
            $table->timestamps();
            $table->foreign("client_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("delegate_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate_users');
    }
}
