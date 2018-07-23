<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giohang', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('makhachhang')->unsigned();
            $table->integer('masanpham')->unsigned();
            $table->datetime('ngaythem')->default(DB::raw('CURRENT_TIMESTAMP(0)'));

            $table->foreign('makhachhang')->references('id')->on('users');
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
        Schema::dropIfExists('giohang');
    }
}
