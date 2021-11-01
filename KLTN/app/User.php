<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function giongcay(){
        return $this->hasMany('App\GiongCay','id_users','id');
    }
    public function loaicay(){
        return $this->hasMany('App\LoaiCay','id_users','id');
    }
    public function cay(){
        return $this->hasMany('App\Cay','id_users','id');
    }
    public function slide(){
        return $this->hasMany('App\Slide','id_users','id');
    }
    public function nhanvien(){
        return $this->hasMany('App\NhanVien','id_users','id');
    }
}
