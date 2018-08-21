<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Loai;
use Validator;

class LoaiAdminController extends Controller
{
    //

    function index() {
    	return view('admin.loai.index');
    }

    function getall() {
    	$data = Loai::where('trangthai_loai', 1)->get();
    	return response()->json($data);
    }

    function add(Request $req) {

    	return response()->json();
    }
}
