<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users',function($table){
            $table->double('kinhdo');
            $table->double('vido');
        });
        Schema::table('baidang',function($table){
            $table->double('kinhdoshop');
            $table->double('vidoshop');
            $table->double('kinhdonnhan');
            $table->double('vidoshopnnhan');
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
