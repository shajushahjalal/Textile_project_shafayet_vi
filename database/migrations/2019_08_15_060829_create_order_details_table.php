<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->unsignedBigInteger('product_variation_id');
            $table->foreign('product_variation_id')->references('id')->on('product_variations');
            $table->double('soldQuantity')->default(0);
            $table->double('sellingPrice')->default(0);
            $table->enum('status',['pending','approve','shipping','delivered','cancel','rejected'])->default('pending');
            $table->integer('is_received')->default(0);
            $table->integer('is_review')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('order_details');
    }
}
