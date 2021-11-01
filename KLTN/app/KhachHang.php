<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    //
    protected $table = "KhachHang";

    public function hoadon(){
        return $this->hasMany('App\HoaDon','id_khachhang','id');
    }
    public function users(){
        return $this->belongsTo('App\User','taikhoan','id');
    }
}
