<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SanPham;
use App\NhaSanXuat;
use App\Loai;
use Validator;

class SanPhamAdminController extends Controller
{
	protected $nsx, $loai;

	protected $rule = ['name' => 'required',
					'price' => 'required',
					'origin' => 'required',
					'image_product' => 'mimetypes:image/png'];
	protected $mess = ['name.required' => 'Tên sản phẩm không được để trống',
					'price.required' => 'Giá sản phẩm không được để trống',
					'origin.required' => 'Xuất xứ sản phẩm không được để trống',
					'image_product.mimetypes' => 'Định dạng hình ảnh phải có dạng *.png'];

	function __construct() {
		$this->nsx = NhaSanXuat::select('ten_nhasanxuat', 'id_nhasanxuat')->where('trangthai_nhasanxuat', 1)->get();
		$this->loai = Loai::select('tenloai', 'id_loai')->where('trangthai_loai', 1)->get();
	}

	function getAll() {
		$product = SanPham::join('loai', 'sanpham.loai', '=', 'loai.id_loai')
		->join('nhasanxuat', 'sanpham.nhasanxuat', '=', 'nhasanxuat.id_nhasanxuat')
		->where('trangthai_sanpham', 1)
		->get();
		return view('admin.sanpham.index', ['product' => $product]);
	}

	function getInsert() {
		return view('admin.sanpham.insert', ['nsx' => $this->nsx, 'loai' => $this->loai]);
	}

	function getUpdate($id) {
		$sp = SanPham::find($id);
		return view('admin.sanpham.update', ['product' => $sp, 'nsx' => $this->nsx, 'loai' => $this->loai]);
	}

	function getDetail($id) {
		$product = SanPham::where('id_sanpham', '=', $id)
			->join('loai', 'sanpham.loai', '=', 'loai.id_loai')
			->join('nhasanxuat', 'sanpham.nhasanxuat', '=', 'nhasanxuat.id_nhasanxuat')
			->get();

		return view('admin.sanpham.detail', ['product' => $product]);
	}

	function postInsert(Request $req) {
        Validator::make($req->all(), $this->rule, $this->mess)->validate();

		SanPham::Create([
			'ten_sanpham'=> $req->name,
			'giaban' 	=> $req->price,
			'mota' 		=> $req->descript,
			'xuatxu' 	=> $req->origin,
			'loai' 		=> $req->categories,
			'nhasanxuat'=> $req->producer
		]);

		$maxProduct = SanPham::max('id_sanpham');

		if($req->hasFile('image_product')) {
			$type = substr($req->image_product->getClientOriginalExtension(), 0, 3);
			//$filename = "image". $maxProduct ."." . $type;
			$filename = "image". $maxProduct .".png";
			$req->image_product->move('image/product', $filename);
		}

		return Redirect(route('indexAdminSanPham'));
	}

	function postUpdate(Request $req) {
		Validator::make($req->all(), $this->rule, $this->mess)->validate();

		$sp = SanPham::find($req->id);

		$sp->ten_sanpham 	= $req->name;
		$sp->giaban 		= $req->price;
		$sp->mota 			= $req->descript;
		$sp->xuatxu	 		= $req->origin;
		$sp->loai 			= $req->categories;
		$sp->nhasanxuat 	= $req->producer;

		$sp->save();

		if($req->hasFile('image_product')) {
			$type = substr($req->image_product->getClientOriginalExtension(), 0, 3);
			//$filename = "image". $maxProduct ."." . $type;
			$filename = "image". $req->id .".png";
			$req->image_product->move('image/product', $filename);
		}

		return Redirect(route('indexAdminSanPham'));
	}

	function delete(Request $req) {
		$sp = SanPham::find($req->sp);
		$sp->trangthai_sanpham = 0;
		$sp->save();

		return Redirect(route('indexAdminSanPham'));
	}
}
