<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baidang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('diachishop');
            $table->string('sdtshop');
            $table->string('diachinnhan');
            $table->string('sdtnnhan');
            $table->string('ghichu');
            $table->string('tenmathang');
            $table->integer('cannang');
            $table->integer('tienung');
            $table->integer('phiship');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('baidang');
    }
}
