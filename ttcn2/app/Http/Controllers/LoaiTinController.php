<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TinTuc;
class LoaiTinController extends Controller
{
    //
    public function getDanhSach()
    {
        $loaitin = LoaiTin::all();
        return view('admin.pages.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
    public function getSua(Request $request)
    {
        $loaitin=LoaiTin::find($request->id);
        return view('admin.pages.loaitin.sua',['loaitin'=>$loaitin]);
    }
    public function postSua(Request $request,$id)
    {
        $loaitin = LoaiTin::find($id);
        $this->validate($request,
        [
            'ten' => 'required|min:3|max:100'
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên thể loại',
            'ten.min'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            'ten.max'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
        ]);

        $loaitin ->tenloaitin = $request->ten;
        $loaitin->save();

        return redirect('sua-loaitin/'.$id)->with('thongbao','Sửa thành công');

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

        $loaitin = new LoaiTin;
        $loaitin->tenloaitin = $request->ten;

        $loaitin->save();

        return redirect('danhsach-loaitin')->with('thongbao','Thêm thành công');
    }
    public function getXoa($id)
    {
        $tintuc = TinTuc::where('id_loaitin',$id)->get();
        foreach($tintuc as $tt)
        {
            $tt->delete();
        }
        
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();

        return redirect('danhsach-loaitin')->with('thongbao','Xóa thành công');
    }
    public function postTimKiem(request $request)
    {
        $tukhoa = $request->tukhoa;
        $loaitin = LoaiTin::where('tenloaitin','like',"%$tukhoa%")->get();
        return view('admin.pages.loaitin.danhsach',['loaitin'=>$loaitin,'tukhoa'=>$tukhoa]);
    }
}
