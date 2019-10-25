<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIntoGalaryContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galary_contents', function (Blueprint $table) {
            $table->unsignedBigInteger('galary_submenu_id')->after('galary_id');
            $table->foreign('galary_submenu_id')->references('id')->on('galary_sub_menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
