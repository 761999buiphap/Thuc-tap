<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cay extends Model
{
    //
    protected $table = "Cay";

    public function loaicay(){
        return $this->belongsTo('App\LoaiCay','id_loaicay','id');
    }

    public function hoadonchitiet(){
        return $this->hasMany('App\HoaDonChiTiet','id_sach','id');
    }
    public function giohang(){
        return $this->hasMany('App\GioHang','id_sach','id');
    }


}
