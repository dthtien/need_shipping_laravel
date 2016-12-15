<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\XNDonHang;
use App\BaiDang;
use App\User;
use Auth;

class XNDonHangController extends Controller
{
	// xndonhang
	public function xacnhandh(Request $request)
	{
  	//Kiểm tra người dùng
		if(Auth::check())
		{  
			if(Auth::user()->loai=='Shipper')
			{
				$id=$request->dh_id;
				$num = XNDonHang::where('dh_id','=',$id)->get()->count();
				if($num==0)
				{
		  	//Thêm đơn hàng vào DB
					$data= new XNDonHang;
					$data->ship_id=Auth::user()->id;
					$data->dh_id= $request->dh_id;
					$data->is_su=0;
					$data->save();
					return redirect()->route('user.donhang')->with(['tb'=>'Nhận đơn hàng thành công!']);
				}
				else {
					return redirect()->route('user.donhang')->with(['loi'=>'Đơn hàng đã có người nhận Hoặc đã giao thành công']);
				}
			}
			else
			{
				return redirect()->route('user.donhang')->with(['loi'=>'Chức năng này chỉ dành cho Shipper!']);
			}
		}
		else 
		{
			return redirect('index');
		}
	}
// endxacnhadh

//Lấy các đơn hàng của shipper đã nhận
	public function donhangdanhan()
	{
		if(Auth::check()){  
			if(Auth::user()->loai=='Shipper'){
				$num= new XNDonHang;
				$data= $num->where('ship_id','=',Auth::user()->id)->where('is_su','=',0)->orderBy('updated_at', 'desc')->paginate(2);
				return view('ns.donhangdanhan',compact('data'));
			}
			else 
			{
				return redirect()->route('user.home');
			}
		}
		else 
		{
			return redirect()->route('user.dangnhap')->with(['loi'=>'Bạn phải đăng nhập trước']); 
		}
	}

//Lấy dánh sach đơn hàng đã đăng
	public function donhangdadang()
	{
		if(Auth::check()){ 
			if(Auth::user()->loai!='Shipper'){ 
				$data=User::findOrFail(Auth::user()->id)->baidang()->orderBy('updated_at', 'desc')->paginate(2);;
				return view('ns.donhangdadang',compact('data'));
			}
			else 
			{
				return redirect()->route('user.home');
			}
		}
		else 
		{
			return redirect()->route('user.dangnhap')->with(['loi'=>'Bạn phải đăng nhập trước']); 
		}
	}

	public function hoanthanhdonhang(Request $request)
	{
		if(Auth::check()){  
			if(Auth::user()->loai=='Shipper'){
				$data=XNDonHang::findOrFail($request->id);
				$data->is_su=1;
				$data->save();
				return redirect()->route('donhangdanhan')->with(['tb'=>'Giao hàng thành công!']);
			}
			else 
			{
				return redirect()->route('user.home');
			}
		}
		else 
		{
			return redirect()->route('user.dangnhap')->with(['loi'=>'Bạn phải đăng nhập trước']); 
		}

	}
	public function xoadonhang(Request $request)
	{
		if(Auth::check()){  
			if(Auth::user()->loai=='Shipper'){
				XNDonHang::destroy($request->id);
				return redirect()->route('donhangdanhan')->with(['tb'=>'Đã xóa đơn hàng ra khỏi danh sách!']);
			}
			else 
			{
				return redirect()->route('user.home');
			}
		}
		else 
		{
			return redirect()->route('user.dangnhap')->with(['loi'=>'Bạn phải đăng nhập trước']); 
		}

	}
}
