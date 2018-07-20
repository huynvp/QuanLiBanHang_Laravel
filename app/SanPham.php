<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    //
    protected $table = 'sanpham';
    protected $fillable = ['ten_sanpham','giaban', 'mota', 'xuatxu', 'loai', 'nhasanxuat'];

    public $timestamps = true;

    public function Loai() {
    	return $this->hasMany('App\Loai', 'id');
    }
}
