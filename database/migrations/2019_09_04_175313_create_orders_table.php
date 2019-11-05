<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text("notesToDelgates")->nullable();
            $table->string("address");
            $table->integer("quantity");
            $table->string("status")->default(\App\Order::NEW);
            $table->dateTime("delay")->nullable();
            $table->text("delay_notes")->nullable();
            $table->bigInteger("delegate_id")->unsigned();
            $table->bigInteger("client_id")->unsigned();
            $table->bigInteger("service_id")->unsigned();
            $table->string("price");


            $table->foreign("client_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("delegate_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("service_id")->references("id")->on("services")->onDelete("cascade");
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
        Schema::dropIfExists('orders');
    }
}
