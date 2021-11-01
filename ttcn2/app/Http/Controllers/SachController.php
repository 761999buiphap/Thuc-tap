<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sach;
use App\LoaiSach;

class SachController extends Controller
{
    //
    public function getDanhSach($id)
    {
        $loaisach = LoaiSach::all();
        $sach = Sach::where('id_loaisach',$id)->paginate(10);
        return view('admin.pages.sach.danhsach',['loaisach'=>$loaisach],['sach'=>$sach]);
    }
    public function getSua($id)
    {
        $loaisach = LoaiSach::all();
        $sach = Sach::find($id);
        return view('admin.pages.sach.sua',['loaisach'=>$loaisach],['sach'=>$sach]);
    }
    public function getThem()
    {
        $loaisach = LoaiSach::all();
        return view('admin.pages.sach.them',['loaisach'=>$loaisach]);
    }
    public function postSua(request $request,$id)
    {
        $sach=Sach::find($id);
        $this->validate($request,
        [
            'ten' => 'required|min:3|max:100',
            'loaisach'=>'required',
            'nxb'=>'required',
            'tacgia'=>'required',
            'mota'=>'required',
            'gia'=>'required',
            'khuyenmai'=>'required',
            'nam'=>'required'
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên sách',
            'ten.min'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            'ten.max'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            'loaisach.required'=>'Bạn chưa nhập tên loại sách',
            'nxb.required'=>'Bạn chưa nhập tên nhà xuất bản',
            'tacgia.required'=>'Bạn chưa nhập tên tác giả',
            'mota.required'=>'Bạn chưa nhập mô tả',
            'gia.required'=>'Bạn chưa nhập giá',
            'khuyenmai.required'=>'Bạn chưa nhập khuyến mại',
            'mota.required'=>'Bạn chưa nhập mota',

            ]);
        
        $sach->tensach=$request->ten;
        $sach->id_loaisach = $request->loaisach;
        $sach->nxb=$request->nxb;
        $sach->tacgia=$request->tacgia;
        $sach->mota=$request->mota;
        $sach->gia=$request->gia;
        $sach->soluong=$request->soluong;
        $sach->nam=$request->nam;
        $sach->khuyenmai=$request->khuyenmai;

        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            unlink("admin_asset/img/".$sach->anh);
            $file->move("admin_asset/img/",$anh);
            $sach->anh=$anh;
        }
        else
        {
            $sach->anh="";
        }
        $sach->save();

        return redirect('sua-sach/'.$id)->with('thongbao','Sửa thành công');
    
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'ten' => 'required|min:3|max:100',
            'loaisach'=>'required',
            'nxb'=>'required',
            'tacgia'=>'required',
            'mota'=>'required',
            'gia'=>'required',
            'khuyenmai'=>'required',
            'nam'=>'required'
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên sách',
            'ten.min'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            'ten.max'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            'loaisach.required'=>'Bạn chưa nhập tên loại sách',
            'nxb.required'=>'Bạn chưa nhập tên nhà xuất bản',
            'tacgia.required'=>'Bạn chưa nhập tên tác giả',
            'mota.required'=>'Bạn chưa nhập mô tả',
            'gia.required'=>'Bạn chưa nhập giá',
            'khuyenmai.required'=>'Bạn chưa nhập khuyến mại',
            'mota.required'=>'Bạn chưa nhập mota',

            ]);
        $sach = new Sach;
        $sach->tensach=$request->ten;
        $sach->id_loaisach = $request->loaisach;
        $sach->nxb=$request->nxb;
        $sach->tacgia=$request->tacgia;
        $sach->mota=$request->mota;
        $sach->gia=$request->gia;
        $sach->soluong=$request->soluong;
        $sach->nam=$request->nam;
        $sach->khuyenmai=$request->khuyenmai;

        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            $file->move("admin_asset/img/",$anh);
            $sach->anh=$anh;
        }
        else
        {
            $sach->anh="";
        }
        $sach->save();

        return redirect('them-sach')->with('thongbao','Thêm thành công');
    }
    public function getXoa($id)
    {
        $sach = Sach::find($id);

        $sach->delete();

        return redirect('danhsach-sach/1')->with('thongbao','Xóa thành công');
    }
    public function postTimKiem(request $request)
    {
        $loaisach = LoaiSach::all();
        $tukhoa = $request->tukhoa;
        $sach = Sach::where('tensach','like',"%$tukhoa%")->paginate(10);
        return view('admin.pages.sach.danhsach',['sach'=>$sach,'loaisach'=>$loaisach,'tukhoa'=>$tukhoa]);
    }
    public function vd($id)
    {
        return view('admin.pages.sach.vd');
    }
}