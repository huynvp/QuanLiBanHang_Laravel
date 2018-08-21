<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

/*Route::get('/index', function() {
	return view('index');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')
	->name('home');

//user
Route::get('/changeInfo', 'UserController@changeInfo')
	->name('changeInfo');
Route::get('/changePassword', 'UserController@changePassword')
	->name('changePassword');
Route::post('/changeInfo', 'UserController@postchangeInfo')
	->name('UpdateInfo');
Route::post('/changePassword', 'UserController@postchangePassword')
	->name('changePassword');


//admin
Route::prefix('admin')->group(function(){
	Route::get('login', 'Admin\AdminController@getLogin')
		->name('getLoginAdmin');
	Route::post('login', 'Admin\AdminController@postLogin')
		->name('postLoginAdmin');
	Route::get('logout', 'Admin\AdminController@logout')
		->name('logoutAdmin');
	
	Route::get('/', 'Admin\AdminController@getIndex')
		->name('getIndexAdmin')->middleware('checkadmin');

	Route::middleware('checkadmin')->prefix('sanpham')->group(function() {
		Route::get('', 'Admin\SanPhamAdminController@getAll')
			->name('indexAdminSanPham');
		Route::get('insert', 'Admin\SanPhamAdminController@getInsert')
			->name('getAdminInsertSanPham');
		Route::get('update/{id}', 'Admin\SanPhamAdminController@getUpdate')
			->name('getAdminUpdateSanPham');
		Route::get('detail/{id}', 'Admin\SanPhamAdminController@getDetail')
			->name('detailAdminSanPham');
		
			Route::post('insert', 'Admin\SanPhamAdminController@postInsert')
			->name('postAdminInsertSanPham');
		
		Route::put('update', 'Admin\SanPhamAdminController@postUpdate')
			->name('postAdminUpdateSanPham');
		
		Route::delete('delete', 'Admin\SanPhamAdminController@delete')
			->name('deleteAdminSanPham');
	});

	Route::middleware('checkadmin')->prefix('nhasanxuat')->group(function() {
		Route::get('', 'Admin\NhaSanXuatAdminController@index')
			->name('indexAdminNhaSanXuat');
		Route::get('getAll', 'Admin\NhaSanXuatAdminController@getall')
			->name('getAllAdminNhaSanXuat');
		Route::get('getOnce', 'Admin\NhaSanXuatAdminController@getonce')
			->name('getOnceAdminNhaSanXuat');
		Route::get('search', 'Admin\NhaSanXuatAdminController@search')
			->name('searchAdminNhaSanXuat');

		Route::post('insert', 'Admin\NhaSanXuatAdminController@postInsert') 
			->name('postAdminInsertNhaSanXuat');
		Route::put('update', 'Admin\NhaSanXuatAdminController@postUpdate')
			->name('updateAdminNhaSanXuat');
		Route::delete('delete', 'Admin\NhaSanXuatAdminController@delete')
			->name('deleteAdminNhaSanXuat');
	});

	Route::middleware('checkadmin')->prefix('loai')->group(function() {
		Route::get('', 'Admin\LoaiAdminController@index')
			->name('indexAdminLoai');
		Route::get('/getAll', 'Admin\LoaiAdminController@getall')
			->name('getAllAdminLoai');

		Route::post('/insert', 'Admin\LoaiAdminController@add')
			->name('potsAddAdminLoai');
	});

	Route::middleware('checkadmin')->prefix('donhang')->group(function() {
		Route::get('', 'Admin\DonHangAdminController@index')
			->name('indexAdminDonHang');
	});
});