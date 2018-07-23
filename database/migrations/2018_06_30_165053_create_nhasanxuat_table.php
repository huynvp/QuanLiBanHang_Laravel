<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhasanxuatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhasanxuat', function (Blueprint $table) {
            $table->increments('id_nhasanxuat');
            $table->string('ten_nhasanxuat');
            $table->string('email_nhasanxuat');
            $table->string('diachi_nhasanxuat');
            $table->string('dienthoai_nhasanxuat');
            $table->boolean('trangthai_nhasanxuat')->default(true);
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
        Schema::dropIfExists('nhasanxuat');
    }
}
