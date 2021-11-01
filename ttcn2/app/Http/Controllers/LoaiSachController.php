<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\LoaiSach;

class LoaiSachController extends Controller
{
    //
    public function getDanhSach()
    {
        $loaisach = LoaiSach::paginate(9);
        return view('admin.pages.loaisach.danhsach',['loaisach'=>$loaisach]);
    }
    public function getSua(Request $request)
    {
        $loaisach=LoaiSach::find($request->id);
        return view('admin.pages.loaisach.sua',['loaisach'=>$loaisach]);
    }
    public function postSua(Request $request,$id)
    {
        $loaisach = LoaiSach::find($id);
        $this->validate($request,
        [
            'ten' => 'required|min:3|max:100'
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên thể loại',
            'ten.min'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            'ten.max'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
        ]);

        $loaisach ->ten = $request->ten;
        $loaisach->save();

        return redirect('sua-loaisach/'.$id)->with('thongbao','Sửa thành công');

    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'ten' => 'required|min:3|max:100'
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên thể loại',
            'ten.min'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            'ten.max'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
        ]);

        $loaisach = new LoaiSach;
        $loaisach->ten = $request->ten;

        $loaisach->save();

        return redirect('danhsach-loaisach')->with('thongbao','Thêm thành công');
    }
    public function getXoa($id)
    {
        $loaisach = LoaiSach::find($id);

        $loaisach->delete();

        return redirect('danhsach-loaisach')->with('thongbao','Xóa thành công');
    }
    public function postTimKiem(request $request)
    {
        $tukhoa = $request->tukhoa;
        $loaisach = LoaiSach::where('ten','like',"%$tukhoa%")->paginate(9);
        return view('admin.pages.loaisach.danhsach',['loaisach'=>$loaisach,'tukhoa'=>$tukhoa]);
    }
}
