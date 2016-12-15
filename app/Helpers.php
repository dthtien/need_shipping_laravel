<?php 
namespace App;
use Illuminate\Database\Eloquent\Model;

class Helpers extends Model
{
	public static function calculated_distance($longitudeFrom,$latitudeFrom, $longitudeTo,$latitudeTo,  $earthRadius = 6371)
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

    //Loại bỏ dấu
	 public static function stripUnicode($str){
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
	  // Lấy thông tin về địa chỉ
     public static function get_infor_from_address($address) {
      $prepAddr = str_replace(' ', '+', Helpers::stripUnicode($address));
      $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
      $output = json_decode($geocode);
      return $output;
    }

      // Loại bỏ dấu tiếng Việt để cho kết quả chính xác hơn
}