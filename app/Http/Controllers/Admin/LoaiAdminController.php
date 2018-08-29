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
    	$data = Loai::where('trangthai_loai', 1)->paginate(10);
    	return response()->json($data);
    }

    function getonce(Request $req) {
    	$data = Loai::find($req->id);
    	return response()->json($data);
    }

    function add(Request $req) {
    	$loai = Loai::create(['tenloai' => $req->name]);
    	
    	return response()->json();
    }

    function update(Request $req) {
    	$loai = Loai::find($req->id);
    	$loai->tenloai = $req->name;
    	$loai->save();

    	return $this->getall();
    }

    function delete(Request $req) {
    	$loai = Loai::find($req->id);
    	$loai->trangthai_loai = 0;
    	$loai->save();

    	return $this->getAll();
    }

    function search(Request $req) {

    }
}
