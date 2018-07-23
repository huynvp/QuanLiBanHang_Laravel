<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id_sanpham');
            $table->string('ten_sanpham');
            $table->biginteger('giaban');
            $table->integer('luotxem')->default(0);
            $table->integer('luotban')->default(0);
            $table->text('mota');
            $table->string('xuatxu');
            $table->integer('loai')->unsigned();
            $table->integer('nhasanxuat')->unsigned();
            $table->boolean('trangthai_sanpham')->default(true);
            $table->foreign('loai')->references('id_loai')->on('loai');
            $table->foreign('nhasanxuat')->references('id_nhasanxuat')->on('nhasanxuat');
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
        Schema::dropIfExists('sanpham');
    }
}
