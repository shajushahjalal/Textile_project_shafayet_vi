<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('applicationName');
            $table->string('titleName');
            $table->string('phoneNo',50);
            $table->string('email',100);
            $table->string('city',100)->nullable();
            $table->string('zipCode',50)->nullable();            
            $table->string('address')->nullable();
            $table->string('state',100);
            $table->string('country',100);
            $table->double('shippingCost',10,2)->default(0);
            $table->string('currency');
            $table->string('dateFormat',50);
            $table->string('logo')->nullable();           
            $table->string('favicon')->nullable(); 
            $table->string('version',50); 
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
        Schema::dropIfExists('system_infos');
    }
}
