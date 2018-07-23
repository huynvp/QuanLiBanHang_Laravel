<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('khachhang')->unsigned();
            $table->datetime('ngaynhapdon')->default(DB::raw('CURRENT_TIMESTAMP(0)'));
            $table->datetime('ngaygiao')->nullable();
            $table->boolean('trangthai_donhang')->default(true);
            $table->biginteger('thanhtien_hoadon')->default(0);

            $table->foreign('khachhang')->references('id')->on('users');
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
        Schema::dropIfExists('donhang');
    }
}
