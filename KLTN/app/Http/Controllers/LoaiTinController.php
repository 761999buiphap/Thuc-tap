<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TinTuc;
use App\User;
class LoaiTinController extends Controller
{
    //
    public function getDanhSach()
    {
        $loaitin = LoaiTin::all();
        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.loaitin.danhsach',['loaitin'=>$loaitin,'arr_user'=>$arr_user]);
    }
    public function getThem()
    {
        $loaitin = LoaiTin::all();
        $lt_them = [];

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.loaitin.danhsach',['loaitin'=>$loaitin,'lt_them'=>$lt_them,'arr_user'=>$arr_user]);
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'ten' => 'required|unique:loaitin,tenloaitin',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên loại tin',
            'ten.unique'=>'Đã tồn tại loại tin này',
        ]);

        $loaitin = new LoaiTin;
        $loaitin->tenloaitin = $request->ten;
        $loaitin->id_users = $request->id_users;
        $loaitin->trangthai = $request->trangthai;
        $loaitin->save();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return redirect('danhsach-loaitin')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $loaitin = LoaiTin::all();
        $lt_sua = LoaiTin::where('id',$id)->get();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.loaitin.danhsach',['loaitin'=>$loaitin,'lt_sua'=>$lt_sua,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function postSua(request $request,$id)
    {
        $lt = LoaiTin::find($id);
        $this->validate($request,
        [
            'ten' => 'required',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên loại tin',
        ]);
        $lt->tenloaitin = $request->ten;
        $lt->id_users = $request->id_users;
        $lt->trangthai = $request->trangthai;
        $lt->save();
        if(isset($request->timkiem))
            $loaitin = LoaiTin::where('tenloaitin',$request->timkiem)->get();
        else
            $loaitin = LoaiTin::all();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.loaitin.danhsach',['loaitin'=>$loaitin,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function getXoa($id)
    {
        $gc = GiongCay::find($id);
        $gc->delete();
        $giongcay = GiongCay::all();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.giongcay.danhsach',['giongcay'=>$giongcay,'arr_user'=>$arr_user]);
    }
    public function postTimKiem(Request $request)
    {
        if(empty($request->ten) && empty($request->trangthai))
            $loaitin = LoaiTin::all();
        else if(!empty($request->ten) && empty($request->trangthai))
            $loaitin = LoaiTin::where('tenloaitin','like',"$request->ten")->get();
        else if(empty($request->ten) && !empty($request->trangthai))
            $loaitin = LoaiTin::where('trangthai',"$request->trangthai")->get();
        else if(!empty($request->ten) && !empty($request->trangthai))
            $loaitin = LoaiTin::where('tenloaitin','like',"$request->ten")->where('trangthai',"$request->trangthai")->get();
        $timkiem = $request->ten;

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.loaitin.danhsach',['loaitin'=>$loaitin,'timkiem'=>$timkiem,'arr_user'=>$arr_user]);
    }
    public function NgungHoatDong($id)
    {
        $loaitin = LoaiTin::find($id);
        $loaitin->trangthai = "Ngừng hoạt động";

        $loaitin->save();

        return redirect('danhsach-loaitin')->with('thongbao','Chuyển trạng thái thành công!');
    }
    public function DangHoatDong($id)
    {
        $loaitin = LoaiTin::find($id);
        $loaitin->trangthai = "Đang hoạt động";

        $loaitin->save();

        return redirect('danhsach-loaitin')->with('thongbao','Chuyển trạng thái thành công!');
    }
}
