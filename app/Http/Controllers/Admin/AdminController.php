<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Admin;
use Validator;


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
		return view('admin.index');
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
