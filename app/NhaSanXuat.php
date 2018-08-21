<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    //
    protected $table = 'nhasanxuat';

    protected $fillable = ['ten_nhasanxuat', 'email_nhasanxuat', 'diachi_nhasanxuat', 'dienthoai_nhasanxuat'];
}
