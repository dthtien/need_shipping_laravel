<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XNDonHang extends Model
{
    protected $table='xndonhang';
    protected $fillable=['dh_id','ship_id'];
    public $timestamp=false;
    public function baidang()
    {
    	return $this->belongsTo('App\BaiDang','dh_id');
    }
}
