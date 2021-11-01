<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    //
    protected $table = "GioHang";

    public function cay(){
        return $this->hasMany('App\Cay','id_cay','id');
    }
    public function users(){
        return $this->belongsTo('App\User','id_users','id');
    }
    
}
