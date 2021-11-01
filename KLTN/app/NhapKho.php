<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhapKho extends Model
{
    //
    protected $table = "NhapKho";

    public function chitietphieunhap(){
        return $this->hasMany('App\ChiTietPhieuNhap','id_nhapkho','id');
    }
}
