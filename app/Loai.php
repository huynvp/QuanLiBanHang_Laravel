<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loai extends Model
{
    //
    protected $table = 'loai';

    protected $fillable = ['tenloai', 'trangthai_loai'];

    protected $primaryKey = 'id_loai';
}
