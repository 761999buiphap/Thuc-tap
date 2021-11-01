<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    //
    protected $table = "BinhLuan";

    public function sach(){
        return $this->hasMany('App\Sach','id_sach','id');
    }
    public function users(){
        return $this->belongsTo('App\User','id_users','id');
    }
}
