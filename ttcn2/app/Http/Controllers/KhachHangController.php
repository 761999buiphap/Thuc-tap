<?php

namespace App\Http\Controllers;

use App\khachHang;
use App\HoaDon;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    //
    public function getDanhSach()
    {
        $khachhang = KhachHang::all();
        return view('admin.pages.khachhang.danhsach',['khachhang'=>$khachhang]);
    }
    public function getChiTiet($id)
    {
        $hoadon = HoaDon::where('id_khachhang',$id)->get();
        $khachhang = KhachHang::where('id',$id)->get();

        return view('admin.pages.khachhang.chitietkhachhang',['hoadon'=>$hoadon,'khachhang'=>$khachhang]);
    }
}
