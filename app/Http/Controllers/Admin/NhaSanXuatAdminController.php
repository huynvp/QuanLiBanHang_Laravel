<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\NhaSanXuat;
use Validator;
class NhaSanXuatAdminController extends Controller
{
	//
	private $rule = [
		"name" => "required",
		"phone" => "required",
		"email" => "required|email",
		"address" => "required",
	];

	private $mess = [
		"name.required" => "Tên nhà sản xuất không được trống",
		"phone.required" => "Điện thoại nhà sản xuất không được trống",
		"email.required" => "Email nhà sản xuất không được trống",
		"address.required" => "Địa chỉ nhà sản xuất không được trống",
		"email.email" => "Email không đúng định dạng",
	];

    function index() {
    	return view('admin.nhasanxuat.index');
    }
    function getAll() {
    	$nsx = NhaSanXuat::where('trangthai_nhasanxuat', '1')->get();
    	return response()->json($nsx);
    }

    function postInsert(Request $req) {
    	Validator::make($req->all(), $this->rule, $this->mess)->validate();

    	NhaSanXuat::Create([
    		'ten_nhasanxuat' 		=> $req->name,
    		'email_nhasanxuat' 		=> $req->email,
    		'diachi_nhasanxuat' 	=> $req->address,
    		'dienthoai_nhasanxuat' 	=> $req->phone
    	]);
    	return response()->json($req);
	}

	function getOnce(Request $req) {
		$data = NhaSanXuat::where('id_nhasanxuat', $req->id)->get();

		return response()->json($data);
	}

	function postUpdate(Request $req) {
		Validator::make($req->all(), $this->rule, $this->mess)->validate();
		
		NhaSanXuat::where('id_nhasanxuat', $req->id)
			->update([
				'ten_nhasanxuat' => $req->name,
				'email_nhasanxuat' => $req->email,
				'diachi_nhasanxuat' => $req->address,
				'dienthoai_nhasanxuat' => $req->phone
			]);

		return $this->getAll();
	}
	
	function delete(Request $req) {		
		NhaSanXuat::where('id_nhasanxuat', $req->id)
			->update(['trangthai_nhasanxuat' => 0]);
		return response()->json(['status' => 'Xóa nhà sản xuất thành công']);
	}

	function search(Request $req) {
		$data = NhaSanXuat::Where('ten_nhasanxuat', 'like', '%'. $req->name .'%')->get();

		return response()->json($data);
	}
}
