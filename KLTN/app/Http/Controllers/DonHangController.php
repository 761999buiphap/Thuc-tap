<?php

namespace App\Http\Controllers;
use DB,Session;
use App\HoaDon;
use App\HoaDonChiTiet;
use App\KhachHang;
use App\Cay;
use App\LoaiCay;
use App\GiongCay;
use App\NhapKho;
use App\ChiTietPhieuNhap;
use App\User;

use Illuminate\Http\Request;

class DonHangController extends Controller
{
    //
    public function ChoXuLi()
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();

        $khachhang = KhachHang::all();
        $arr_khachhang = [];
        foreach($khachhang as $value)
        {
            $arr_khachhang[$value->id]['taikhoan'] = $value->taikhoan;
            $arr_khachhang[$value->id]['ten'] = $value->ten;
            $arr_khachhang[$value->id]['sdt'] = $value->sdt;
            $arr_khachhang[$value->id]['diachi'] = $value->diachi;
        }
        $donhang = HoaDon::all();
        return view("Admin.pages.donhang.choxuli",['giongcay'=>$giongcay,'donhang'=>$donhang,'arr_khachhang'=>$arr_khachhang,'khachhang'=>$khachhang]);
    }
    public function DaGiao($id)
    {
        $donhang = HoaDon::find($id);
        $donhang->trangthai = 'Đã giao';

        $donhang->save();

        return redirect('choxuli')->with('thongbao','Chuyển trạng thái đơn hàng thành công!');
    }
    public function DaHuy()
    {
        $donhang = HoaDon::find($id);
        $donhang->trangthai = 'Đã hủy';

        $donhang->save();

        return redirect('choxuli')->with('thongbao','Chuyển trạng thái đơn hàng thành công!');
    }
    public function ChiTietDonHang($id)
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $donhang = HoaDon::where('id',$id)->get();
        foreach($donhang as $value)
        {
            $trangthai=$value->trangthai;
            $id_khachhang = $value->id_khachhang;
        }
        $khachhang = KhachHang::where('id',$id_khachhang)->get();
        $chitietdonhang = HoaDonChiTiet::where('id_hoadon',$id)->get();
        $madonhang  = HoaDon::where('id',$id)->get();
        $cay = Cay::where('trangthai','Đang hoạt động')->get();
        $arr_cay = [];
        foreach($cay as $value)
        {
            $arr_cay[$value->id]['anh'] = $value->anh;
            $arr_cay[$value->id]['ten'] = $value->ten;
        }
        return view("Admin.pages.donhang.choxuli",['giongcay'=>$giongcay,'chitietdonhang'=>$chitietdonhang,'khachhang'=>$khachhang,'madonhang'=>$madonhang,'arr_cay'=>$arr_cay]);

    }
    public function postTimKiem(request $request)
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();

        $khachhang = KhachHang::all();
        $arr_khachhang = [];
        foreach($khachhang as $value)
        {
            $arr_khachhang[$value->id]['taikhoan'] = $value->taikhoan;
            $arr_khachhang[$value->id]['ten'] = $value->ten;
            $arr_khachhang[$value->id]['sdt'] = $value->sdt;
            $arr_khachhang[$value->id]['diachi'] = $value->diachi;
        }
        if(empty($request->trangthai) && empty($request->khachhang) && empty($request->tungay) && empty($request->denngay))
            $donhang = HoaDon::all();
        else if(!empty($request->trangthai) && empty($request->khachhang) && empty($request->tungay) && empty($request->denngay))
            $donhang = HoaDon::where('trangthai',$request->trangthai)->get();
        else if(empty($request->trangthai) && !empty($request->khachhang) && empty($request->tungay) && empty($request->denngay))
            $donhang = HoaDon::where('id_khachhang',$request->khachhang)->get();
        else if(empty($request->trangthai) && empty($request->khachhang) && !empty($request->tungay) && empty($request->denngay))
            $donhang = HoaDon::where('created_at','>=',$request->tungay)->get();
        else if(empty($request->trangthai) && empty($request->khachhang) && empty($request->tungay) && !empty($request->denngay))
            $donhang = HoaDon::where('created_at','<=',$request->denngay)->get();
        else if(!empty($request->trangthai) && !empty($request->khachhang) && empty($request->tungay) && empty($request->denngay))
            $donhang = HoaDon::where('trangthai',$request->trangthai)->where('id_khachhang',$request->khachhang)->get();
        else if(!empty($request->trangthai) && empty($request->khachhang) && !empty($request->tungay) && empty($request->denngay))
            $donhang = HoaDon::where('created_at','>=',$request->tungay)->where('trangthai',$request->trangthai)->get();
        else if(!empty($request->trangthai) && empty($request->khachhang) && empty($request->tungay) && !empty($request->denngay))
            $donhang = HoaDon::where('created_at','<=',$request->denngay)->where('trangthai',$request->trangthai)->get();
        else if(!empty($request->trangthai) && !empty($request->khachhang) && !empty($request->tungay) && empty($request->denngay))
            $donhang = HoaDon::where('trangthai',$request->trangthai)->where('id_khachhang',$request->khachhang)->where('created_at','>=',$request->tungay)->get();
        else if(!empty($request->trangthai) && !empty($request->khachhang) && empty($request->tungay) && !empty($request->denngay))
            $donhang = HoaDon::where('trangthai',$request->trangthai)->where('created_at','<=',$request->denngay)->where('id_khachhang',$request->khachhang)->get();
        else if(empty($request->trangthai) && !empty($request->khachhang) && !empty($request->tungay) && empty($request->denngay))
            $donhang = HoaDon::where('created_at','>=',$request->tungay)->where('id_khachhang',$request->khachhang)->get();
        else if(empty($request->trangthai) && !empty($request->khachhang) && empty($request->tungay) && !empty($request->denngay))
            $donhang = HoaDon::where('created_at','<=',$request->denngay)->where('id_khachhang',$request->khachhang)->get();
        else if(empty($request->trangthai) && !empty($request->khachhang) && !empty($request->tungay) && !empty($request->denngay))
            $donhang = HoaDon::whereBetween('created_at',[$request->tungay,$request->denngay])->where('id_khachhang',$request->khachhang)->get();
        else if(empty($request->trangthai) && empty($request->khachhang) && !empty($request->tungay) && !empty($request->denngay))
            $donhang = HoaDon::whereBetween('created_at',[$request->tungay,$request->denngay])->get();
        else if(!empty($request->trangthai) && empty($request->khachhang) && !empty($request->tungay) && !empty($request->denngay))
            $donhang = HoaDon::where('trangthai',$request->trangthai)->whereBetween('created_at',[$request->tungay,$request->denngay])->get();
        else
            $donhang = HoaDon::where('trangthai',$request->trangthai)->whereBetween('created_at',[$request->tungay,$request->denngay])->where('id_khachhang',$request->khachhang)->get();
        
        return view("Admin.pages.donhang.choxuli",['giongcay'=>$giongcay,'donhang'=>$donhang,'arr_khachhang'=>$arr_khachhang,'khachhang'=>$khachhang]);
       
    }
    public function TimKiemPhieuNhap(request $request)
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        if(empty($request->nguoiquanli) && empty($request->tungay) && empty($request->denngay))
        {
            $nhapkho = NhapKho::all();
        }
        else if(!empty($request->nguoiquanli) && empty($request->tungay) && empty($request->denngay))
        {
            $nhapkho = NhapKho::where('id_users',$request->nguoiquanli)->get();
        }
        else if(empty($request->nguoiquanli) && !empty($request->tungay) && empty($request->denngay))
        {
            $nhapkho = NhapKho::where('created_at','>=',$request->tungay)->get();
        }
        else if(empty($request->nguoiquanli) && empty($request->tungay) && !empty($request->denngay))
        {
            $nhapkho = NhapKho::where('created_at','<=',$request->denngay)->get();
        }
        else if(!empty($request->nguoiquanli) && !empty($request->tungay) && empty($request->denngay))
        {
            $denngay = date("Y-m-d");
            $nhapkho = NhapKho::where('id_users',$request->nguoiquanli)->whereBetween('created_at', array($request->tungay,$denngay))->get();
        }
        else if(!empty($request->nguoiquanli) && empty($request->tungay) && !empty($request->denngay))
        {
            $denngay = date("Y-m-d");
            $nhapkho = NhapKho::where('id_users',$request->nguoiquanli)->where('created_at','<',$denngay)->get();
        }
        else if(empty($request->nguoiquanli) && !empty($request->tungay) && !empty($request->denngay))
        {
            $nhapkho = NhapKho::whereBetween('created_at', array($request->tungay,$request->denngay))->get();
        }
        else
            $nhapkho = NhapKho::where('id_users',$request->nguoiquanli)->whereBetween('created_at', array($request->tungay,$request->denngay))->get();
        $users = User::where('trangthai','Đang hoạt động')->get();
        foreach($users as $value)
        {
            $arr_users[$value->id] = $value;
        }
        return view("Admin.pages.donhang.nhapkho",['giongcay'=>$giongcay,'nhapkho'=>$nhapkho,'arr_users'=>$arr_users]);
   
    }
    public function NhapKho()
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $nhapkho = NhapKho::all();
        $users = User::where('trangthai','Đang hoạt động')->get();
        foreach($users as $value)
        {
            $arr_users[$value->id] = $value;
        }
        return view("Admin.pages.donhang.nhapkho",['giongcay'=>$giongcay,'nhapkho'=>$nhapkho,'arr_users'=>$arr_users]);
    }
    public function ChiTietPhieuNhap($id)
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $nhapkho = NhapKho::find($id);
        $users = User::where('trangthai','Đang hoạt động')->get();
        foreach($users as $value)
        {
            $arr_users[$value->id] = $value;
        }
        $cay = Cay::where('trangthai','Đang hoạt động')->get();
        foreach($cay as $value)
        {
            $arr_cay[$value->id] = $value;
        }
        $chitietphieunhap = ChiTietPhieuNhap::where('id_nhapkho',$id)->get();
        return view("Admin.pages.donhang.chitietphieunhap",['giongcay'=>$giongcay,'nhapkho'=>$nhapkho,'arr_users'=>$arr_users,'arr_cay'=>$arr_cay,'chitietphieunhap'=>$chitietphieunhap]);

    }
    public function ThemPhieuNhap(request $request)
    {       
        $this->validate($request,
        [
            'bengiao' =>'required',
        ],
        [
            'bengiao.required'=>'Bạn chưa nhập thông tin nguồn giao',
        ]);
        $phieunhap = new NhapKho;
        $phieunhap->ngay = date("Y-m-d");
        $phieunhap->bengiao = $request->bengiao;
        $phieunhap->id_users = $request->id_users;
        if(!empty($request->ghichu))
            $phieunhap->ghichu = $request->ghichu;
        else
            $phieunhap->ghichu = ' ';

        $phieunhap->save();
        $id_phieunhap = $phieunhap->id;
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $cay = Cay::where('trangthai','Đang hoạt động')->get();
        return redirect('them-chitietphieunhap/'.$id_phieunhap)->with('thongbao','Tạo hóa đơn thành công!');
    }
    public function ThemChiTietPhieuNhap(request $request)
    {        
        $this->validate($request,
        [
            'cay' =>'required',
            'soluong' =>'required',
            'gia' =>'required',
        ],
        [
            'cay.required'=>'Bạn chưa chọn cây giống',
            'soluong.required'=>'Bạn chưa nhập số lượng',
            'gia.required'=>'Bạn chưa nhập giá',
        ]);
        $phieunhap = new ChiTietPhieuNhap;
        $phieunhap->id_cay = $request->cay;
        $phieunhap->id_nhapkho = $request->id_nhapkho;
        $phieunhap->soluong = $request->soluong;
        $phieunhap->gia = $request->gia;
        if(!empty($request->ghichu))
            $phieunhap->ghichu = $request->ghichu;
        else
            $phieunhap->ghichu = ' ';
        $phieunhap->save();

        $update_cay = Cay::find($request->cay);
        $update_cay->soluong += $request->soluong;
        $update_cay->save();

        $chitietphieunhap = ChiTietPhieuNhap::where('id_nhapkho',$request->id_nhapkho)->get();
        $id_phieunhap = $request->id_nhapkho;
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $cay = Cay::where('trangthai','Đang hoạt động')->get();
        foreach($cay as $value)
        {
            $arr_cay[$value->id] = $value;
        }
        return redirect('them-chitietphieunhap/'.$id_phieunhap)->with('thongbao','Đã thêm vào phiếu nhập!');
    }
    public function getThemChiTietPhieuNhap($id)
    {        
        $chitietphieunhap = ChiTietPhieuNhap::where('id_nhapkho',$id)->get();
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $cay = Cay::where('trangthai','Đang hoạt động')->get();
        foreach($cay as $value)
        {
            $arr_cay[$value->id] = $value;
        }
        return view("Admin.pages.donhang.themchitietphieunhap",['giongcay'=>$giongcay,'id_phieunhap'=>$id,'cay'=>$cay,'chitietphieunhap'=>$chitietphieunhap,'arr_cay'=>$arr_cay]);
    }
    public function ThemHoaDon()
    {
        return view("Admin.pages.hoadon.them");
    }
    public function postThemHoaDon(request $request)
    {
        $data = Session::all();
        $i = count($data);
        
        Session::put('n',$request->ten);
        Session::put('b',$request->mk);
        $data = Session::all();
        echo $i;
        //return view("Admin.pages.hoadon.them",['data'=>$data]);
    }
}