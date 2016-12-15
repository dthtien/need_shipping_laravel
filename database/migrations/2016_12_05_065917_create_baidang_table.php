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
            $table->string('diachishop')->nullable();
            $table->string('sdtshop')->nullable();
            $table->string('diachinnhan')->nullable();
            $table->string('sdtnnhan')->nullable();
            $table->string('ghichu')->nullable();
            $table->string('tenmathang')->nullable();
            $table->integer('cannang')->nullable();
            $table->integer('tienung')->nullable();
            $table->integer('phiship')->nullable();
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
