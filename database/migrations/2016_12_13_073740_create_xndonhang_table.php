<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXndonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xndonhang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dh_id');
            $table->foreign('dh_id')->references('id')->on('baidang')->onDelete('cascade');
            $table->integer('ship_id');
            $table->foreign('ship_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('xndonhang');
    }
}
