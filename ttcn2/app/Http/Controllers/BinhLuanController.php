<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BinhLuan;
use App\Sach;
use App\User;
class BinhLuanController extends Controller
{
    //
    public function getDanhSach()
    {
        $binhluan = BinhLuan::all();
        $sach = Sach::all();
        $users = User::all();

        $arr_sach = [];
        $arr_users = [];
        foreach($sach as $value)
        {
            $arr_sach[$value->id] = $value->tensach;
        }
        foreach($users as $value)
        {
            $arr_users[$value->id] = $value->name;
        }



        return view('admin.pages.binhluan.danhsach',['binhluan'=>$binhluan,'arr_sach'=>$arr_sach,'arr_users'=>$arr_users]);
    }
    public function getThem()
    {
        $sach = Sach::all();
        $user = User::all();
        return view('admin.pages.binhluan.them',['sach'=>$sach,'user'=>$user]);
    }
    public function postThem(Request $request)
    {
        $binhluan = new BinhLuan;
        $this->validate($request,
        [
            'noidung'=>'required',
        
            
        ],
        [
            'noidung.required'=>'Bạn chưa nhập vào nội dung',

        ]);
        $binhluan->noidung=$request->noidung;
        $binhluan->id_sach = $request->sach;
        $binhluan->id_users = $request->user;
        $binhluan->save();

         return redirect('them-binhluan')->with('thongbao','Thêm thành công');
    
    }
    public function getSua($id)
    {
        $sach = Sach::all();
        $user = User::all();
        $binhluan = BinhLuan::find($id);
        return view('admin.pages.binhluan.sua',['binhluan'=>$binhluan,'sach'=>$sach,'user'=>$user]);
    }
    public function postSua(Request $request,$id)
    {
        $binhluan = BinhLuan::find($id);
        $this->validate($request,
        [
            'noidung'=>'required',
        
            
        ],
        [
            'noidung.required'=>'Bạn chưa nhập vào nội dung',

        ]);
        $binhluan->noidung=$request->noidung;
        $binhluan->id_sach = $request->sach;
        $binhluan->id_users = $request->user;
        $binhluan->save();

         return redirect('sua-binhluan/'.$id)->with('thongbao','Sửa thành công');
    
    }
    public function getXoa($id)
    {
        $binhluan = BinhLuan::find($id);

        $binhluan->delete();

        return redirect('danhsach-binhluan')->with('thongbao','Xóa thành công');

    }
    
}
