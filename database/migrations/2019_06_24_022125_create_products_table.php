<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoryId');
            $table->foreign('categoryId')->references('id')->on('categories');
            $table->BigInteger('subCategoryId')->nullable();
            $table->string('productName');
            
            $table->string('pageTitle')->nullable();
            $table->string('metaTag')->nullable();
            $table->string('metaDescription')->nullable();

            $table->double('buyPrice',20,2)->default(0);
            $table->double('sellingPrice',20,2);
            $table->double('sellingPriceWithDiscount',20,2);
            $table->text('customField')->nullable();
            $table->text('description')->nullable();
            $table->string('video')->nullable();
            $table->string('image')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->integer('is_delete')->default(0);
            $table->integer('publicationStatus');
            $table->integer('create_by');
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
