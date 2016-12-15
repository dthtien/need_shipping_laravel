<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BaiDangRequest;
use App\BaiDang;
use Auth;

class siteBaiDangController extends Controller
{
    //
    public function Taodonhang()
    {
     if(Auth::check()){   
    	return view('ns.taodonhang');
    }
    else
    {
       return redirect()->route('user.dangnhap')->with(['loi'=>'Bạn phải đăng nhập trước']);
    }
    }
 // xử lý tạo đơn hàng
    public function xlTaodonhang(BaiDangRequest $request)
    {
       if(Auth::check()){ 
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
       function calculated_distance($x1,$y1,$x2,$y2)
       {
        $x=abs($x1-$x2);
        $y=abs($y1-$y2);
        return ceil(sqrt($x*$x+$y*$y)*111.18);
       }
       // echo Auth::user()->id;
        $baidang = new BaiDang;
        $adr=get_infor_from_address($request->ShopAddress);
        $adre=get_infor_from_address($request->RecAddress);
        if($adr && $adre)
        {
        $baidang->diachishop= $adr->results[0]->formatted_address;
        $baidang->diachinnhan= $adre->results[0]->formatted_address;
        $baidang->khoangcach= calculated_distance($adr->results[0]->geometry->location->lng,$adr->results[0]->geometry->location->lat,$adre->results[0]->geometry->location->lng,$adre->results[0]->geometry->location->lat);
        $baidang->kinhdoshop=$adr->results[0]->geometry->location->lng;//Lấy kinh độ
        $baidang->vidoshop=$adr->results[0]->geometry->location->lat;//Lâsy vĩ độ
        $baidang->kinhdonnhan=$adre->results[0]->geometry->location->lng;//Lấy kinh độ
        $baidang->vidonnhan=$adre->results[0]->geometry->location->lat;//Lâsy vĩ độ
      }
      else
      {
        $baidang->diachishop=$request->ShopAddress;
        $baidang->diachinnhan=$request->RecAddress;
        $baidang->khoangcach=0;
      }
        $baidang->sdtshop= $request->ShopPhone;
        $baidang->sdtnnhan = $request->RecPhone;
        $baidang->ghichu= $request->Note;
        $baidang->tenmathang=$request->NameGoods;
        $baidang->cannang=$request->Number;
        $baidang->tienung=$request->Deposit;
        $baidang->phiship=$request->ShipMoney;
        $baidang->user_id=Auth::user()->id;
        //tính khoảng cách
    	  $baidang->save();
        return redirect()->route('user.Taodonhang')->with(['thongbao'=>'Tạo đơn hàng thành công']);
      }
       else
      {
         return redirect()->route('user.dangnhap')->with(['loi'=>'Bạn phải đăng nhập trước']);
      }

    }
// lấy danh sách đơn hàng
    public function donhang()
    {
      if(Auth::check()){  
      $donhang=new BaiDang;
      $data= $donhang->orderBy('khoangcach', 'asc')->paginate(2);
      return view('ns.donhang',compact('data'));
    }
    else 
    {
      return redirect()->route('user.dangnhap')->with(['loi'=>'Bạn phải đăng nhập trước']); 
    }
    }
}
