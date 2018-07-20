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
			->name('indexSanPham');
		Route::get('insert', 'Admin\SanPhamAdminController@getInsert')
			->name('getInsertSanPham');
		Route::get('update/{id}', 'Admin\SanPhamAdminController@getUpdate')
			->name('getUpdateSanPham');
		Route::get('detail/{id}', 'Admin\SanPhamAdminController@getDetail')
			->name('detailSanPham');
		Route::post('insert', 'Admin\SanPhamAdminController@postInsert')
			->name('postInsertSanPham');
		Route::post('update', 'Admin\SanPhamAdminController@postUpdate')
			->name('postUpdateSanPham');
		Route::post('delete', 'Admin\SanPhamAdminController@delete')
		->name('deleteSanPham');
	});

	Route::middleware('checkadmin')->prefix('nhasanxuat')->group(function() {

	});

	Route::middleware('checkadmin')->prefix('loai')->group(function() {

	});

	Route::middleware('checkadmin')->prefix('donhang')->group(function() {

	});
});