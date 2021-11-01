<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiCay extends Model
{
    //

    protected $table = "LoaiCay";

    public function cay(){
        return $this->hasMany('App\Cay','id_loaicay','id');
    }

    public function giongcay(){
        return $this->belongsTo('App\GiongCay','id_giongcay','id');
    }
}
