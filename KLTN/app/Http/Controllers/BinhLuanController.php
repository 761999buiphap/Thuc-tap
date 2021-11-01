<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BinhLuan;
use App\Cay;
use App\User;
class BinhLuanController extends Controller
{
    //
    public function getDanhSach()
    {
        $binhluan = BinhLuan::all();

        $arr_user = [];
        $arr_cay = [];
        $cay = Cay::all();
        foreach($cay as $value)
        {
            $arr_cay[$value->id] = $value->ten;
        }
        $tb_user = User::where('quyen','1')->get();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.binhluan.danhsach',['binhluan'=>$binhluan,'arr_user'=>$arr_user,'arr_cay'=>$arr_cay,'cay'=>$cay,'tb_user'=>$tb_user]);
    }
    public function getThem()
    {
        $binhluan = BinhLuan::all();
        $bl_them = [];

        $arr_user = [];
        $arr_cay = [];
        $cay = Cay::all();
        foreach($cay as $value)
        {
            $arr_cay[$value->id] = $value->ten;
        }
        $tb_user = User::where('quyen','1')->get();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.binhluan.danhsach',['binhluan'=>$binhluan,'bl_them'=>$bl_them,'arr_user'=>$arr_user,'arr_cay'=>$arr_cay,'cay'=>$cay,'tb_user'=>$tb_user]);
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'noidung' => 'required',
        ],
        [
            'noidung.required'=>'Bạn chưa nhập nội dung',
        ]);

        $binhluan = new BinhLuan;
        $binhluan->id_cay = $request->cay;
        $binhluan->id_users = $request->taikhoan;
        $binhluan->noidung = $request->noidung;
        $binhluan->ngay = date("Y-m-d");
        $binhluan->save();

        return redirect('danhsach-binhluan')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $binhluan = BinhLuan::all();
        $bl_sua = BinhLuan::where('id',$id)->get();

        $arr_user = [];
        $arr_cay = [];
        $cay = Cay::all();
        foreach($cay as $value)
        {
            $arr_cay[$value->id] = $value->ten;
        }
        $tb_user = User::where('quyen','1')->get();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.binhluan.danhsach',['binhluan'=>$binhluan,'bl_sua'=>$bl_sua,'md'=>$id,'arr_user'=>$arr_user,'arr_cay'=>$arr_cay,'cay'=>$cay,'tb_user'=>$tb_user]);
    }
    public function postSua(request $request,$id)
    {
        $bl = BinhLuan::find($id);
        $this->validate($request,
        [
            'noidung' => 'required',
        ],
        [
            'noidung.required'=>'Bạn chưa nhập nội dung',
        ]);

        $bl->id_cay = $request->cay;
        $bl->id_users = $request->taikhoan;
        $bl->noidung = $request->noidung;
        $bl->save();

        if(isset($request->timkiem))
            $binhluan = BinhLuan::where('ten',$request->timkiem)->get();
        else
            $binhluan = BinhLuan::all();

         $arr_user = [];
        $arr_cay = [];
        $cay = Cay::all();
        foreach($cay as $value)
        {
            $arr_cay[$value->id] = $value->ten;
        }
        $tb_user = User::where('quyen','1')->get();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.binhluan.danhsach',['binhluan'=>$binhluan,'md'=>$id,'arr_user'=>$arr_user,'arr_cay'=>$arr_cay,'cay'=>$cay,'tb_user'=>$tb_user]);
    }
    public function getXoa($id)
    {
        $bl = BinhLuan::find($id);
        $bl->delete();
        $binhluan = BinhLuan::all();

        return redirect('danhsach-binhluan')->with('thongbao','Thêm thành công');
    }
    public function postTimKiem(Request $request)
    {
        if(empty($request->cay) && empty($request->taikhoan) && empty($request->tungay) && empty($request->denngay))
            $binhluan = BinhLuan::all();
        elseif((!empty($request->cay)) && $request->taikhoan == 0 && empty($request->tungay) && empty($request->denngay))
            $binhluan = BinhLuan::where('id_cay','like',"$request->cay")->get();
        elseif((empty($request->cay)) && !empty($request->taikhoan) && empty($request->tungay) && empty($request->denngay))
            $binhluan = BinhLuan::where('id_users',"$request->taikhoan")->get();
        elseif((empty($request->cay)) && $request->taikhoan == 0 && !empty($request->tungay) && empty($request->denngay))
            $binhluan = BinhLuan::where('created_at','>=',$request->tungay)->get();
         elseif((empty($request->cay)) && $request->taikhoan == 0 && empty($request->tungay) && !empty($request->denngay))
            $binhluan = BinhLuan::where('created_at','<=',$request->denngay)->get();
        elseif(!empty($request->cay) && !empty($request->taikhoan) && empty($request->tungay) && empty($request->denngay))
            $binhluan = BinhLuan::where('id_cay','like',"$request->cay")->where('id_users',"$request->taikhoan")->get();
        elseif(!empty($request->cay) && $request->taikhoan == 0 && !empty($request->tungay) && empty($request->denngay))
            $binhluan = BinhLuan::where('id_cay','like',"$request->cay")->where('created_at','>=',$request->tungay)->get();
        elseif(!empty($request->cay) && $request->taikhoan == 0 && empty($request->tungay) && !empty($request->denngay)) 
            $binhluan = BinhLuan::where('id_cay','like',"$request->cay")->where('created_at','<=',$request->denngay)->get();
        elseif(!empty($request->cay) && !empty($request->taikhoan) && !empty($request->tungay) && empty($request->denngay)) 
            $binhluan = BinhLuan::where('id_cay','like',"$request->cay")->where('id_users',"$request->taikhoan")->where('created_at','>=',$request->tungay)->get();
        elseif(!empty($request->cay) && !empty($request->taikhoan) && empty($request->tungay) && !empty($request->denngay)) 
            $binhluan = BinhLuan::where('id_cay','like',"$request->cay")->where('id_users',"$request->taikhoan")->where('created_at','<=',$request->denngay)->get();
        elseif(!empty($request->cay) && $request->taikhoan == 0 && !empty($request->tungay) && !empty($request->denngay)) 
            $binhluan = BinhLuan::where('id_cay','like',"$request->cay")->whereBetween('created_at', array($request->tungay,$request->denngay))->get();
        elseif(empty($request->cay) && !empty($request->taikhoan) && !empty($request->tungay) && empty($request->denngay)) 
            $binhluan = BinhLuan::where('id_users',"$request->taikhoan")->where('created_at','>=',$request->tungay)->get();
        elseif(empty($request->cay) && !empty($request->taikhoan) && empty($request->tungay) && !empty($request->denngay)) 
            $binhluan = BinhLuan::where('id_users',"$request->taikhoan")->where('created_at','<=',$request->denngay)->get();
        elseif(empty($request->cay) && empty($request->taikhoan) && !empty($request->tungay) && !empty($request->denngay)) 
            $binhluan = BinhLuan::whereBetween('created_at', array($request->tungay,$request->denngay))->get();
        else
            $binhluan = BinhLuan::where('id_cay','like',"$request->cay")->where('id_users',"$request->taikhoan")->whereBetween('created_at', array($request->tungay,$request->denngay))->get();

        $arr_user = [];
        $arr_cay = [];
        $cay = Cay::all();
        foreach($cay as $value)
        {
            $arr_cay[$value->id] = $value->ten;
        }
        $tb_user = User::where('quyen','1')->get();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.binhluan.danhsach',['binhluan'=>$binhluan,'arr_user'=>$arr_user,'arr_cay'=>$arr_cay,'cay'=>$cay,'tb_user'=>$tb_user]);
    }
}
