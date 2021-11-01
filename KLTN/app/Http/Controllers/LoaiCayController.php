<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\GiongCay;
use App\LoaiCay;
use App\User;

class LoaiCayController extends Controller
{
    //
    public function getDanhSach($id)
    {
        $ten_giongcay = GiongCay::where('id',$id)->get();
        $giongcay = GiongCay::all();
        $loaicay = LoaiCay::where('id_giongcay',$id)->get();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.loaicay.danhsach',['giongcay'=>$giongcay,'loaicay'=>$loaicay,'id'=>$id,'ten_giongcay'=>$ten_giongcay,'arr_user'=>$arr_user]);
    }
    public function getThem($id)
    {
        $giongcay = GiongCay::all();
        $loaicay = LoaiCay::where('id_giongcay',$id)->get();
        $lc_them = $id;

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.loaicay.danhsach',['giongcay'=>$giongcay,'loaicay'=>$loaicay,'id'=>$id,'lc_them'=>$lc_them,'arr_user'=>$arr_user]);
    }
    public function postThem(Request $request,$id)
    {
        $this->validate($request,
        [
            'ten' => 'required|unique:loaicay,ten',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên',
            'ten.unique'=>'Đã tồn tại loại cây này',
        ]);

        $loaicay = new LoaiCay;
        $loaicay->ten = $request->ten;
        $loaicay->trangthai = $request->trangthai;
        $loaicay->id_users = $request->id_users;
        $loaicay->id_giongcay = $request->id_giongcay;
        $loaicay->save();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return redirect('danhsach-loaicay/'.$request->id_giongcay)->with('thongbao','Thêm thành công');
    }
    public function getSua($id,$id_giongcay)
    {
        $giongcay = GiongCay::all();
        $loaicay = LoaiCay::where('id_giongcay',$id_giongcay)->get();
        $lc_sua = LoaiCay::where('id',$id)->get();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.loaicay.danhsach',['giongcay'=>$giongcay,'loaicay'=>$loaicay,'lc_sua'=>$lc_sua,'id'=>$id_giongcay,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function postSua(Request $request,$id)
    {
        $giongcay = GiongCay::all();
        $loaicay = LoaiCay::where('id_giongcay',$request->id_giongcay)->get();
        $lc = LoaiCay::find($id);
        $this->validate($request,
        [
            'ten' => 'required',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên',
        ]);
        $lc->ten = $request->ten;
        $lc->trangthai = $request->trangthai;
        $lc->id_giongcay = $request->id_giongcay;
        $lc->save();

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

        return redirect('danhsach-loaicay/'.$request->id_giongcay)->with('thongbao','Thêm thành công');
    }
    public function postTimKiem(Request $request)
    {

        $giongcay = GiongCay::all();

        if(empty($request->ten) && empty($request->trangthai))
            $loaicay = LoaiCay::where('id_giongcay',$request->id_giongcay)->get();
        else if(!empty($request->ten) && empty($request->trangthai))
            $loaicay = LoaiCay::where('id_giongcay',$request->id_giongcay)->where('ten','like',$request->ten)->get();
        else if(empty($request->ten) && !empty($request->trangthai))
            $loaicay = LoaiCay::where('id_giongcay',$request->id_giongcay)->where('trangthai',"$request->trangthai")->get();
        else if(!empty($request->ten) && !empty($request->trangthai))
            $loaicay = LoaiCay::where('id_giongcay',$request->id_giongcay)->where('ten','like',"$request->ten")->where('trangthai',"$request->trangthai")->get();
        $sua_tk = $loaicay;
        $id=$request->id_giongcay;
      
        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.loaicay.danhsach',['giongcay'=>$giongcay,'loaicay'=>$loaicay,'sua_tk'=>$sua_tk,'id'=>$id,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function NgungHoatDong($id,$idd)
    {
        $loaicay = LoaiCay::find($id);
        $loaicay->trangthai = "Ngừng hoạt động";

        $loaicay->save();

        return redirect('danhsach-loaicay/'.$idd)->with('thongbao','Chuyển trạng thái thành công!');
    }
    public function DangHoatDong($id,$idd)
    {
        $loaicay = LoaiCay::find($id);
        $loaicay->trangthai = "Đang hoạt động";

        $loaicay->save();

        return redirect('danhsach-loaicay/'.$idd)->with('thongbao','Chuyển trạng thái thành công!');
    }
}
