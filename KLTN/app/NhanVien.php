<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    //
    protected $table = "NhanVien";

    public function users(){
        return $this->belongsTo('App\User','id_users','id');
        return $this->belongsTo('App\User','taikhoan','id');
    }
}
