<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\UserRequest;
use App\Http\Requests\DangNhapRequest;
use App\Http\Requests\ThongTinRequest;
use App\Http\Requests\DoiMatKhauRequest;
//auth
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App\Helpers;

class siteUserController extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function home()
	{
		return view('ns.index');
	}
	public function dangky()
	{
		return view('ns.dangky');
	}


	//Xử lý đăng ký
	public function xldangky(UserRequest $request)
	{
		 // Lấy địa chỉ chính xác
		$user= new User;
		$adr=Helper::get_infor_from_address($request->Address);
		if($adr->status=='OK')
		{
		$user->diachi= $adr->results[0]->formatted_address;
		$user->kinhdo=$adr->results[0]->geometry->location->lng;//Lấy kinh độ
		$user->vido=$adr->results[0]->geometry->location->lat;//Lâsy vĩ độ
	}
	else{
		$user->diachi=$request->Address;
		$user->kinhdo=0;
		$user->vido=0;
	}
		$user->email=$request->Email;
		$user->password=bcrypt($request->Password);
		$user->name=$request->FullName;
		$user->sdt=$request->Phone;
		$user->loai=$request->TypeAcc;
		$user->remember_token=$request->_token;
		$user->level=0;
		$user->save();
		return redirect()->route('user.dangnhap')->with(['tb'=>'Đăng ký thành công. Mời bạn đăng nhập']);
	} 
	// kết thúc xử lý đăng ký
	//
	//Xử Lý đăng nhập
	public function dangnhap()
	{
		if(!Auth::check()){ 
			
		return view('ns.dangnhap');
	}
	else return redirect()->route('user.home');
	}
	public function xldangnhap(DangNhapRequest $request)
	{
		$auth=array(
			'email'=> $request->Email,
			'password'=> $request->Password,
			);
		if (Auth::attempt($auth))
		{
			if($_SERVER['HTTP_REFERER'])
				{
				return redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
			//echo Auth::user()->name;
			return redirect()->route('user.index');
		}
		}
		else {
		return redirect()->route('user.dangnhap')->with(['loi'=>'Tài khoản hoặc mật khẩu không chính xác']);
		 }
	}
	//Kết thúc xử lý đăng nhập

	// đăng xuất
	public function dangxuat()
	{
		Auth::logout();
		return redirect()->route('user.dangnhap');
	}

	// hiện thông tin người dùng
	public function thongtin()
	{
	if(Auth::check()){ 
		return view('ns.thongtin');
	}
	  else
      {
         return redirect()->route('user.dangnhap')->with(['loi'=>'Bạn phải đăng nhập trước']);
      }
	}
	// Xử lý cập cập nhật thông tin
	public function xlcapnhat(ThongTinRequest $request)
	{
	if(Auth::check())
	{ 
		$data = User::findOrFail(Auth::user()->id);
		$adr=Helpers::get_infor_from_address($request->Address);
		$data->name=$request->Name;
		$data->sdt=$request->Phone;
		$data->loai=$request->TypeAcc;
		if($adr->status=='OK')
		{
		$data->diachi=$adr->results[0]->formatted_address;
		$data->kinhdo=$adr->results[0]->geometry->location->lng;//Lấy kinh độ
		$data->vido=$adr->results[0]->geometry->location->lat;//Lấy vi độ
		}
		else
		{
			$data->diachi= $request->Address;
			$data->kinhdo=0;
			$data->vido=0;
		}
		$data->save();
		return redirect()->route('user.thongtin')->with(['tb'=>'Cập nhật thông tin thành công']);
	}
		else
      {
         return redirect()->route('user.dangnhap')->with(['loi'=>'Bạn phải đăng nhập trước']);
      }
	}
	//end
	//**
	//Đổi mật khẩu
	public function doimatkhau(DoiMatKhauRequest $request)
	{
		if(Auth::check()){ 
		$auth=array(
			'email'=> Auth::user()->email,
			'password'=> $request->oldPassword,
			);
		if(Auth::validate($auth)) {
			$data = User::findOrFail(Auth::user()->id);
			$data->password=bcrypt($request->newPassword);
			$data->save();
			return redirect()->route('user.thongtin')->with(['tb'=>'Cập nhật thông tin thành công']);
		}
		else 
			return redirect()->route('user.thongtin')->with(['loi'=>'Sai mật khẩu cũ. Không đổi được mật khẩu']);
	}
	else
      {
         return redirect()->route('user.dangnhap')->with(['loi'=>'Bạn phải đăng nhập trước']);
      }
  }

}
