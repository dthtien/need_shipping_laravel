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
    return view('ns.index');
});

Route::get('admin', 'Admin\AdminController@index');
Route::get('admin/give-role-permissions', 'Admin\AdminController@getGiveRolePermissions');
Route::post('admin/give-role-permissions', 'Admin\AdminController@postGiveRolePermissions');
Route::get('login',['as'=>'admin.login','uses'=>'LoginController@login']);
Route::post('login',['as'=>'admin.postlogin','uses'=>'LoginController@checklogin']);
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('admin/baidang', 'BaiDangController\BaiDangController');
Route::resource('admin/bai-dang', 'BaiDangController\BaiDangController');
Auth::routes();

Route::get('/home', 'HomeController@admin');
Route::get('index',['as'=>'user.home1','uses'=>'HomeController@index']);
Route::get('trangchu',['as'=>'user.home','uses'=>'HomeController@index']);
Route::get('dangky',['as'=>'user.dangky','uses'=>'siteUserController@dangky']);
Route::get('register',['as'=>'user.dangky','uses'=>'siteUserController@dangky']);
Route::post('xldangky',['as'=>'postdangky','uses'=>'siteUserController@xldangky']);
Route::get('dangnhap',['as'=>'user.dangnhap','uses'=>'siteUserController@dangnhap']);
Route::post('xldangnhap',['as'=>'postdangnhap','uses'=>'siteUserController@xldangnhap']);
Route::get('dangxuat',['as'=>'user.dangxuat','uses'=>'siteUserController@dangxuat']);
Route::get('Taodonhang',['as'=>'user.Taodonhang','uses'=>'siteBaiDangController@Taodonhang']);
Route::post('xlTaodonhang',['as'=>'postTaodonhang','uses'=>'siteBaiDangController@xlTaodonhang']);
Route::get('donhang',['as'=>'user.donhang','uses'=>'siteBaiDangController@donhang']);
Route::get('thongtin',['as'=>'user.thongtin','uses'=>'siteUserController@thongtin']);
Route::post('xlcapnhat',['as'=>'postcapnhat','uses'=>'siteUserController@xlcapnhat']);
Route::post('doimatkhau',['as'=>'postcapnhatmatkhau','uses'=>'siteUserController@doimatkhau']);
Route::get('chinhsach',function(){return view('ns.dieukhoan');});
Route::post('xacnhandh',['as'=>'postxacnhandh','uses'=>'XNDonHangController@xacnhandh']);
Route::get('don-hang-da-nhan',['as'=>'donhangdanhan','uses'=>'XNDonHangController@donhangdanhan']);
Route::get('don-hang-da-dang',['as'=>'donhangdadang','uses'=>'XNDonHangController@donhangdadang']);
Route::post('hoanthanhdonhang',['as'=>'posthoanthanhdonhang','uses'=>'XNDonHangController@hoanthanhdonhang']);
Route::post('xoadonhang',['as'=>'postxoadonhang','uses'=>'XNDonHangController@xoadonhang']);
Route::resource('admin/xndonhang', 'XNDonHangController\\xndonhangController');