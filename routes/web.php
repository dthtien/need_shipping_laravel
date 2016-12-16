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
Route::get('test',function()
	{
		    // Lấy địa chỉ chính xác
     function get_infor_from_address($address) {
      $prepAddr = str_replace(' ', '+', stripUnicode($address));
      $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
      $output = json_decode($geocode);
      return $output;
    }

      // Loại bỏ dấu tiếng Việt để cho kết quả chính xác hơn
    function stripUnicode($str){
      if (!$str) return false;
      $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd'=>'đ|Đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
      foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
      return $str;
    }
       //hàm tính khoảng cách vì địa điểm là ở Việt Nam nên không ảnh hướng đến độ cong
       // Tính theo định lý Pythagore
    function calculated_distance($longitude1,$latitude1,$longitude2,$latitude2)
    {
      $longitudeDiff=abs($longitude1-$longitude2);//độ lệch tung độ
      $latitudeDiff=abs($latitude1-$latitude2);
      $distance=2*asin(sqrt(sin($latitudeDiff/2)*sin($latitudeDiff/2)+cos($latitude1)*cos($latitude2)*sin($longitudeDiff/2)*sin($longitudeDiff/2)));// công thức Haversine

      return $distance*6731;
    }
function haversineGreatCircleDistance( $longitudeFrom,$latitudeFrom, $longitudeTo,$latitudeTo,  $earthRadius = 6371)
{

  $latFrom = deg2rad($latitudeFrom);
  $lonFrom = deg2rad($longitudeFrom);
  $latTo = deg2rad($latitudeTo);
  $lonTo = deg2rad($longitudeTo);
  $latDelta = abs($latTo - $latFrom);
  $lonDelta = abs($lonTo - $lonFrom);
  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
  return ceil($angle * $earthRadius);
}
    echo haversineGreatCircleDistance(106.6810339,10.8147611,106.6869229,10.805218)."<br>";
    // echo calculated_distance(106.6810339,10.8147611,106.6869229,10.805218);
	});