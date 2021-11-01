<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    //
    protected $table = "Sach";

    public function loaisach(){
        return $this->belongsTo('App\LoaiSach','id_loaisach','id');
    }

    public function hoadonchitiet(){
        return $this->hasMany('App\HoaDonChiTiet','id_sach','id');
    }
    public function giohang(){
        return $this->hasMany('App\GioHang','id_sach','id');
    }


}
