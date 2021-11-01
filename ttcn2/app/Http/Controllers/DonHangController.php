<?php

namespace App\Http\Controllers;

use App\HoaDon;
use App\HoaDonChiTiet;
use App\KhachHang;
use App\Sach;
use App\LoaiSach;

use Illuminate\Http\Request;

class DonHangController extends Controller
{
    //
    public function getDanhSach()
    {
        $hoadon = HoaDon::where('trangthai','0')->orderBy('id','DESC')->paginate(6);
        $hoadondagiao = HoaDon::where('trangthai','1')->orderBy('id','DESC')->paginate(6);
        $hoadonbihuy = HoaDon::where('trangthai','2')->orderBy('id','DESC')->paginate(6);

        $khachhang = KhachHang::all();
        $arr_khachhang = [];
        foreach($khachhang as $value)
        {
            $arr_khachhang[$value['id']] = $value;
        }

        return view('admin.pages.donhang.danhsach',['hoadon'=>$hoadon,'hoadondagiao'=>$hoadondagiao,'arr_khachhang'=>$arr_khachhang,'hoadonbihuy'=>$hoadonbihuy]);
    }
    public function getChiTiet($id)
    {
        $hoadon = HoaDon::where('id',$id)->get();
        foreach($hoadon as $value)
        {
            $id_khachhang = $value['id_khachhang'];
        }
        $khachhang = KhachHang::where('id',$id_khachhang)->get();

        $hoadonchitiet = HoaDonChiTiet::where('id_hoadon',$id)->orderBy('id','DESC')->paginate(5);

        $sach = Sach::all();
        $arr_sach = [];
        foreach($sach as $value)
        {
            $arr_sach[$value['id']] = $value;
        }

        $tong = 0;


        return view('admin.pages.donhang.chitiet',['hoadon'=>$hoadon,'khachhang'=>$khachhang,'hoadonchitiet'=>$hoadonchitiet,'sach'=>$arr_sach]);
    }
    public function getGiaoHang($id)
    {
        $donhang = HoaDon::find($id);
        $donhang->trangthai = 1;

        $donhang->save();
        
        $hoadon = HoaDon::where('trangthai','0')->orderBy('id','DESC')->paginate(6);
        $hoadonbihuy = HoaDon::where('trangthai','2')->orderBy('id','DESC')->paginate(6);
        $hoadondagiao = HoaDon::where('trangthai','1')->orderBy('id','DESC')->paginate(6);

        $khachhang = KhachHang::all();
        $arr_khachhang = [];
        foreach($khachhang as $value)
        {
            $arr_khachhang[$value['id']] = $value;
        }

        return view('admin.pages.donhang.danhsach',['hoadon'=>$hoadon,'hoadondagiao'=>$hoadondagiao,'arr_khachhang'=>$arr_khachhang,'hoadonbihuy'=>$hoadonbihuy]);


    }
    public function getHuyDonHang(request $request,$id)
    {
        $hoadonchitiet = HoaDonChiTiet::where('id_hoadon',$id)->get();
        $hoadon = HoaDon::where('id',$id)->get();

        foreach($hoadonchitiet as $hdct)
        {
            $hdct->delete();
        }
        foreach($hoadon as $hd)
        {
            $hd->delete();
        }
        $hoadon = HoaDon::where('trangthai','0')->orderBy('id','DESC')->paginate(6);
        $hoadondagiao = HoaDon::where('trangthai','1')->orderBy('id','DESC')->paginate(6);
        $hoadonbihuy = HoaDon::where('trangthai','2')->orderBy('id','DESC')->paginate(6);

        $khachhang = KhachHang::all();
        $arr_khachhang = [];
        foreach($khachhang as $value)
        {
            $arr_khachhang[$value['id']] = $value;
        }

        return view('admin.pages.donhang.danhsach',['hoadon'=>$hoadon,'hoadondagiao'=>$hoadondagiao,'arr_khachhang'=>$arr_khachhang,'hoadonbihuy'=>$hoadonbihuy]);
    }
    
}
