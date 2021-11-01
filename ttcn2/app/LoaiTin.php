<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    //
    protected $table = "LoaiTin";

    public function tintuc(){
        return $this->hasMany('App\TinTuc','id_loaitin','id');
    }
}
