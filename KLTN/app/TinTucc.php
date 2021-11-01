<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTucc extends Model
{
    //
    protected $table = "TinTucc";
    
    public function loaitin(){
        return $this->belongsTo('App\LoaiTin','id_loaitin','id');
    }

}
