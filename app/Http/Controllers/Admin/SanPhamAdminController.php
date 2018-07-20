<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SanPham;
use Validator;

class SanPhamAdminController extends Controller
{
	function getAll() {
		$product = SanPham::join('loai', 'sanpham.loai', '=', 'loai.id_loai')
		->join('nhasanxuat', 'sanpham.nhasanxuat', '=', 'nhasanxuat.id_nhasanxuat')
		->get();
		return view('admin.sanpham.index', ['product' => $product]);
	}

	function getInsert() {
		return view('admin.sanpham.insert');
	}

	function getUpdate($id) {
		return view('admin.sanpham.update', ['product' => $id]);
	}

	function getDetail($id) {
		$product = SanPham::where('id_sanpham', '=', $id)
			->join('loai', 'sanpham.loai', '=', 'loai.id_loai')
			->join('nhasanxuat', 'sanpham.nhasanxuat', '=', 'nhasanxuat.id_nhasanxuat')
			->get();

		return view('admin.sanpham.detail', ['product' => $product]);
	}

	function postInsert(Request $req) {
		//validate

		$validator = $req->validate([
				'name' => 'required',
				'price' => 'required',
				'origin' => 'required',
				'image_product' => 'required|image'
			], 
			[
				'name.required' => 'Tên sản phẩm không được để trống',
				'price.required' => 'Giá sản phẩm không được để trống',
				'origin.required' => 'Xuất xứ sản phẩm không được để trống',
				'image_product.required' => 'Chọn hình ảnh cần upload',
				'image_product.image' => 'Định dạng file phải là hình ảnh (đuôi là: jpeg, png, bmp, gif, or svg)'
			]);

		if ($validator->fails()) {
            return redirect(route('getInsertSanPham'))
                        ->withErrors($validator)
                        ->withInput();
        }

		SanPham::Create([
			'ten_sanpham' 		=> $req->name,
			'giaban' 			=> $req->price,
			'mota' 				=> $req->descript,
			'xuatxu' 			=> $req->origin,
			'loai' 				=> $req->categories,
			'nhasanxuat'		=> $req->producer
		]);

		$maxProduct = SanPham::max('id_sanpham');

		if($req->hasFile('image_product')) {
			$type = substr($req->image_product->getClientOriginalExtension(), 0, 3);
			$filename = "image". $maxProduct ."." . $type;
			$req->image_product->move('image/product', $filename);
		}

		return Redirect(route('indexSanPham'));
	}

	function postUpdate(Request $req) {

	}

	function postDelete(Request $req) {
		
	}
}
