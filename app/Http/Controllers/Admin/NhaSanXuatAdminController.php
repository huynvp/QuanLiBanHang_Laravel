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
    	$nsx = NhaSanXuat::where('trangthai_nhasanxuat', '1')->paginate(5);
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
		$data = NhaSanXuat::find($req->id);

		return response()->json($data);
	}

	function postUpdate(Request $req) {
		Validator::make($req->all(), $this->rule, $this->mess)->validate();
		
		$nsx = NhaSanXuat::find($req->id);
		$nsx->ten_nhasanxuat = $req->name;
		$nsx->email_nhasanxuat = $req->email;
		$nsx->diachi_nhasanxuat = $req->address;
		$nsx->dienthoai_nhasanxuat = $req->phone;

		$nsx->save();

		return $this->getAll();
	}
	
	function delete(Request $req) {		
		$nsx = NhaSanXuat::find($req->id);
		$nsx->trangthai_nhasanxuat = 0;
		$nsx->save();
		return response()->json(['status' => 'Xóa nhà sản xuất thành công']);
	}

	function search(Request $req) {
		$data = NhaSanXuat::Where('ten_nhasanxuat', 'like', '%'. $req->name .'%')->paginate(5);

		return response()->json($data);
	}
}
