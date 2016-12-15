<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiDang extends Model
{
    //
    protected $table='baidang';
    protected $fillable=['diachishop','sdtshop','diachinnhan','sdtnnhan','ghichu','tenmathang','cannang','tienung','phiship','user_id','update_at','khoangcach'];
    public $timestamp=false;
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function xndonhang()
    {
    	return $this->hasOne('App\XNDonHang','id');
    }
}
