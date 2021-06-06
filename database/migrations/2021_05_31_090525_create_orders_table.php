<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->decimal('total_amount',8,2);
            $table->tinyInteger ('is_delivered')->default('0'); // 0=No
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('delivery_id'); 
            $table->unsignedInteger('delivery_method'); //0= Cash On Delivery
          
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('delivery_id')->references('id')->on('deliveries')->onDelete('cascade');
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
