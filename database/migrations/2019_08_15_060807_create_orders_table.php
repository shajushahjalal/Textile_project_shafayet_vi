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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->double('total',20,2)->default(0);
            $table->double('discount',20,2)->default(0);
            $table->double('shippingCost',20,2)->default(0);
            $table->double('subTotal',20,2)->default(0);
            $table->double('paid',20,2)->default(0);
            $table->enum('orderStatus',['pending','approve','shipping','delivered','cancel','rejected'])->default('pending');
            $table->string('paymentType')->nullable();
            $table->enum('paymentStatus',['pending','paid','unpaid'])->default('pending');
            $table->unsignedBigInteger('created_by');
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
        Schema::dropIfExists('orders');
    }
}
