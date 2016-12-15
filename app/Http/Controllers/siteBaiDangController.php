<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BaiDangRequest;
use App\BaiDang;
use Auth;
use App\Helpers;
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
    $baidang = new BaiDang;
    $adr=Helpers::get_infor_from_address($request->ShopAddress);
    $adre= Helpers::get_infor_from_address($request->RecAddress);
    if(($adr->status=='OK') && ($adre->status=='OK'))
    {
      $baidang->diachishop= $adr->results[0]->formatted_address;
      $baidang->diachinnhan= $adre->results[0]->formatted_address;
      $baidang->khoangcach= Helpers::calculated_distance($adr->results[0]->geometry->location->lng,$adr->results[0]->geometry->location->lat,$adre->results[0]->geometry->location->lng,$adre->results[0]->geometry->location->lat);
      $baidang->kinhdoshop=$adr->results[0]->geometry->location->lng;//Lấy kinh độ
      $baidang->vidoshop=$adr->results[0]->geometry->location->lat;//Lâsy vĩ độ
      $baidang->kinhdonnhan=$adre->results[0]->geometry->location->lng;//Lấy kinh độ
      $baidang->vidonnhan=$adre->results[0]->geometry->location->lat;//Lâsy vĩ độ
      }
      else
      {
        $baidang->diachishop=$request->ShopAddress;
        $baidang->diachinnhan=$request->RecAddress;
        $baidang->kinhdoshop=0;
        $baidang->vidoshop=0;
        $baidang->kinhdonnhan=0;
        $baidang->vidonnhan=0;
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
    $data= $donhang->orderBy('updated_at', 'desc')->paginate(2);
    return view('ns.donhang',compact('data'));
  }
  else 
  {
    return redirect()->route('user.dangnhap')->with(['loi'=>'Bạn phải đăng nhập trước']); 
  }
}
}
