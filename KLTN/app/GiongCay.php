<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiongCay extends Model
{
    //
    protected $table = "GiongCay";

    public function loaicay(){
        return $this->hasMany('App\LoaiCay','id_giongcay','id');
    }
    public function users(){
        return $this->belongsTo('App\User','id_users','id');
    }
}
