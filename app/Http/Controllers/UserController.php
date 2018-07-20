<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Validator;

use App\User;
use App\Http\Requests\PostChangeInfo;
use App\Http\Requests\PostChangePassword;

class UserController extends Controller
{
	public function __construct() {
		$this->middleware('checklogin');
	}

	//return view
	public function changeInfo(){
		return view('user/changeInfo');
	}

	public function changePassword() {
		return view('user/changePassword');
	}

	public function postchangeInfo(PostChangeInfo $req) {
		$user = new User();
		$user = $user->find($req->all()['id']);

		$user->name 	= $req->all()['name'];
		$user->email 	= $req->all()['email'];
		$user->address 	= $req->all()['address'];
		$user->birthday = $req->all()['birthday'];
		$user->phone 	= $req->all()['phone'];

		$user->save();
		
		return redirect('/changeInfo');
	}

	public function postchangePassword(PostChangePassword $req) {
		//$user = new User();
		$redirectTo = "/changePassword";
		if($req->newpass == $req->renewpass) {
			//update password
			User::find(Auth::user()->id)
				->update(['password' => Hash::make($req->newpass)]);
		} else {
			/// nothing
		}


		return redirect($redirectTo);
	}
}
