<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuNhap extends Model
{
    //
    protected $table = "ChiTietPhieuNhap";
    
    public function phieunhap(){
        return $this->belongsTo('App\NhapKho','id_nhapkho','id');
    }
}
