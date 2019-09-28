<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('categoryName');
            $table->string('pageTitle')->nullable();
            $table->string('metaTag')->nullable();
            $table->string('metaDescription')->nullable();
            $table->integer('haveSubCategory');
            $table->integer('position');
            $table->string('categoryImage')->nullable();
            $table->integer('publicationStatus'); 
            $table->integer('is_delete')->default(0);
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
        Schema::dropIfExists('categories');
    }
}
