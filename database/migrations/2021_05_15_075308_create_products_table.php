<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_slug')->unique();
            $table->string('product_code')->unique()->nullable();
            $table->longText('product_details')->nullable();
            $table->string('product_image')->nullable();
            $table->float('product_price',8,2);
            $table->tinyInteger('product_status')->default('1')->nullable(); // 1=active
            $table->tinyInteger('featured_product')->default('1')->nullable(); // 1=active
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
}
