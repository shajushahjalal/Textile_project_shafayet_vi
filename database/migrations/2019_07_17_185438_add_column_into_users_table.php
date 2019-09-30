<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIntoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstName')->nullable()->after('name');
            $table->string('lastName')->nullable()->after('firstName');            
            $table->string('city')->nullable()->after('email');
            $table->string('zip')->nullable()->after('city');
            $table->string('country')->after('zip');
            $table->text('state')->nullable()->after('country');
            $table->string('phoneNo')->nullable()->after('state');          
            $table->text('address')->nullable()->after('phoneNo');
            $table->integer('is_admin')->default(0)->after('address');
            $table->text('image')->nullable()->after('is_admin');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstName');
            $table->dropColumn('lastName');  
            $table->dropColumn('city');
            $table->dropColumn('zip');
            $table->dropColumn('country');
            $table->dropColumn('state');
            $table->dropColumn('phoneNo');
            $table->dropColumn('address');
            $table->dropColumn('image');
        });
    }
}
