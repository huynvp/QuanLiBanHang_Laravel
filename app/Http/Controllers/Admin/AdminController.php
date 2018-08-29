<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Admin;
use Validator;

use App\NhaSanXuat;
use App\Loai;
use App\DonHang;
use App\SanPham;



class AdminController extends Controller
{
	protected $redirectTo = '/admin';
	protected $guard = 'admin';

	use AuthenticatesUsers;

	//get view
	public function getLogin() {
		return view('admin.login');
	}

	public function getIndex() {

		$nsx = array();
		$loai = array();
		$sp = array();

		$loai['sum'] = Loai::where('trangthai_loai', 1)->count();
		$loai['del'] = Loai::where('trangthai_loai', 0)->count();
		$id_max = Loai::where('trangthai_loai', 1)->max('id_loai');
		$loai['last'] = Loai::find($id_max)->tenloai;

		$nsx['sum'] = NhaSanXuat::where('trangthai_nhasanxuat', 1)->count();
		$nsx['del'] = NhaSanXuat::where('trangthai_nhasanxuat', 0)->count();
		$id_max = NhaSanXuat::where('trangthai_nhasanxuat', 1)->max('id_nhasanxuat');
		$nsx['last'] = NhaSanXuat::find($id_max)->ten_nhasanxuat;

		return view('admin.index', ['nhasanxuat' => $nsx, 'loai' => $loai, 'sanpham' => $sp]);
	}

	//post controller
	public function postLogin(Request $req) {
		if(Auth::guard('admin')->attempt(['username' => $req->username, 'password' => $req->password])) {
			return redirect(route('getIndexAdmin'));
		} else {
			return redirect(route('getLoginAdmin'));
		}
	}

	//log out admin
	public function logout() {
		Auth::guard('admin')->logout();
		return Redirect(route('getLoginAdmin'));
	}

}
