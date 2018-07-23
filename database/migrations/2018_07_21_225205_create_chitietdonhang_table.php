<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('madonhang')->unsigned();
            $table->integer('masanpham')->unsigned();
            $table->integer('soluong');
            $table->biginteger('giatien');

            $table->foreign('madonhang')->references('id')->on('donhang');
            $table->foreign('masanpham')->references('id_sanpham')->on('sanpham');

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
        Schema::dropIfExists('chitietdonhang');
    }
}
