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
            $table->double('kinhdo')->nullable();
            $table->double('vido')->nullable();
        });
        Schema::table('baidang',function($table){
            $table->double('kinhdoshop')->nullable();
            $table->double('vidoshop')->nullable();
            $table->double('kinhdonnhan')->nullable();
            $table->double('vidonnhan')->nullable();
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
