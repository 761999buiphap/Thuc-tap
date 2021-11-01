<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GiongCay;
use App\User;

class GiongCayController extends Controller
{
    //
    public function getDanhSach()
    {
        $giongcay = GiongCay::all();
        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.giongcay.danhsach',['giongcay'=>$giongcay,'arr_user'=>$arr_user]);
    }
    public function getThem()
    {
        $giongcay = GiongCay::all();
        $gc_them = [];

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.giongcay.danhsach',['giongcay'=>$giongcay,'gc_them'=>$gc_them,'arr_user'=>$arr_user]);
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'ten' => 'required|unique:giongcay,ten',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên',
            'ten.unique'=>'Đã tồn tại giống cây này',
        ]);

        $giongcay = new GiongCay;
        $giongcay->ten = $request->ten;
        $giongcay->id_users = $request->id_users;
        $giongcay->trangthai = $request->trangthai;
        $giongcay->save();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return redirect('danhsach-giongcay')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $giongcay = GiongCay::all();
        $gc_sua = GiongCay::where('id',$id)->get();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.giongcay.danhsach',['giongcay'=>$giongcay,'gc_sua'=>$gc_sua,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function postSua(request $request,$id)
    {
        $gc = GiongCay::find($id);
        $this->validate($request,
        [
            'ten' => 'required',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên',
        ]);
        $gc->ten = $request->ten;
        $gc->id_users = $request->id_users;
        $gc->trangthai = $request->trangthai;
        $gc->save();
        if(isset($request->timkiem))
            $giongcay = GiongCay::where('ten',$request->timkiem)->get();
        else
            $giongcay = GiongCay::all();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.giongcay.danhsach',['giongcay'=>$giongcay,'md'=>$id,'arr_user'=>$arr_user]);
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
            $giongcay = GiongCay::all();
        else if(!empty($request->ten) && empty($request->trangthai))
            $giongcay = GiongCay::where('ten','like',"$request->ten")->get();
        else if(empty($request->ten) && !empty($request->trangthai))
            $giongcay = GiongCay::where('trangthai',"$request->trangthai")->get();
        else if(!empty($request->ten) && !empty($request->trangthai))
            $giongcay = GiongCay::where('ten','like',"$request->ten")->where('trangthai',"$request->trangthai")->get();
        $timkiem = $request->ten;

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.giongcay.danhsach',['giongcay'=>$giongcay,'timkiem'=>$timkiem,'arr_user'=>$arr_user]);
    }
    public function NgungHoatDong($id)
    {
        $giongcay = GiongCay::find($id);
        $giongcay->trangthai = "Ngừng hoạt động";

        $giongcay->save();

        return redirect('danhsach-giongcay')->with('thongbao','Chuyển trạng thái thành công!');
    }
    public function DangHoatDong($id)
    {
        $giongcay = GiongCay::find($id);
        $giongcay->trangthai = "Đang hoạt động";

        $giongcay->save();

        return redirect('danhsach-giongcay')->with('thongbao','Chuyển trạng thái thành công!');
    }
}
