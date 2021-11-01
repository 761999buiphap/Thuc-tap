<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    //
    protected $table = "HoaDon";

    public function hoadonchitiet(){
        return $this->hasMany('App\HoaDonChiTiet','id_hoadon','id');
    }
    public function khachhang(){
        return $this->belongsTo('App\KhachHang','id_khachhang','id');
    }
}
