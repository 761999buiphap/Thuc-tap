<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TinTuc;

class TinTucController extends Controller
{
    //
    public function getDanhSach($id)
    {
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::where('id_loaitin',$id)->paginate(10);

        return view('admin.pages.tintuc.danhsach',['tintuc'=>$tintuc,'loaitin'=>$loaitin]);
    }
    public function getThem()
    {
        $loaitin = LoaiTin::all();
        return view('admin.pages.tintuc.them',['loaitin'=>$loaitin]);
    }
    public function postThem(request $request)
    {
        $this->validate($request,
        [
            'tieude' => 'required|min:3|max:100',
            'noidung'=>'required',

            
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên sách',
            'ten.min'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            'ten.max'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            'noidung.required'=>'Bạn chưa nhập nội dung',

        ]);

        $tintuc = new TinTuc;
        $tintuc->tieude = $request->tieude;
        $tintuc->noidung = $request->noidung;
        $tintuc->noibat = $request->noibat;
        $tintuc->id_loaitin = $request->loaitin;


        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            $file->move("admin_asset/img/tintuc/",$anh);
            $tintuc->anh=$anh;
        }
        else
        {
            $tintuc->anh="";
        }

        $tintuc->save();

        return redirect('them-tintuc')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view('admin.pages.tintuc.sua',['tintuc'=>$tintuc,'loaitin'=>$loaitin]);
    }
    public function postSua(request $request,$id)
    {
        $tintuc = TinTuc::find($id);
        $this->validate($request,
        [
            'tieude' => 'required|min:3|max:100',
            'noidung'=>'required',
            
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên sách',
            'ten.min'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            'ten.max'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            'noidung.required'=>'Bạn chưa nhập nội dung',

        ]);

        $tintuc->tieude = $request->tieude;
        $tintuc->noidung = $request->noidung;
        $tintuc->noibat = $request->noibat;
        $tintuc->id_loaitin = $request->loaitin;

        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            $file->move("admin_asset/img/tintuc/",$anh);
            $tintuc->anh=$anh;
        }
        else
        {
            $tintuc->anh=$tintuc->anh;
        }

        $tintuc->save();

        return redirect('sua-tintuc/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id)
    {
        $tintuc = TinTuc::find($id);

        $tintuc -> delete();

        return redirect('danhsach-tintuc/1')->with('thongbao','Xóa thành công');
    }
    public function postTimKiem(request $request)
    {
        $loaitin = LoaiTin::all();
        $tukhoa = $request->tukhoa;
        $tintuc = TinTuc::where('tieude','like',"%$tukhoa%")->paginate(10);
        return view('admin.pages.tintuc.danhsach',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa,'loaitin'=>$loaitin]);
    }
}
