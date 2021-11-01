<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSach extends Model
{
    //

    protected $table = "LoaiSach";

    public function sach(){
        return $this->hasMany('App\Sach','id_loaisach','id');
    }
}
