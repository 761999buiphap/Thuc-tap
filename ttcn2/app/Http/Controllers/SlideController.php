<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    //
    public function getDanhSach()
    {
        $slide = Slide::paginate(5);
        return view('admin.pages.slide.danhsach',['slide'=>$slide]);
    }

    public function getThem()
    {
        return view('admin.pages.slide.them');
    }

    public function getSua($id)
    {
        $slide = Slide::find($id);
        return view('admin.pages.slide.sua',['slide'=>$slide]);
    }

    public function getXoa($id)
    {
        $slide = Slide::find($id);

        $slide->delete();

        return redirect('danhsach-slide')->with('thongbao','Xóa thành công');

    }

    public function postThem(request $request)
    {
        $this->validate($request,
        [
            'noidung'=>'required',
            'link'=>'required',
            
        ],
        [
            'noidung.required'=>'Bạn chưa nhập vào nội dung',
            'link.required'=>'Bạn chưa nhập link',

        ]);
        $slide = new Slide;
        $slide->noidung=$request->noidung;
        $slide->link = $request->link;
        $slide->trangthai = $request->trangthai;

        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            $file->move("admin_asset/img/slide/",$anh);
            $slide->anh=$anh;
        }
        else
        {
            $slide->anh="";
        }
        $slide->save();

         return redirect('them-slide')->with('thongbao','Thêm thành công');
    }

    public function postSua(Request $request,$id)
    {
        $slide = Slide::find($id);
        $this->validate($request,
        [
            'noidung'=>'required',
            'link'=>'required',
            
        ],
        [
            'noidung.required'=>'Bạn chưa nhập vào nội dung',
            'link.required'=>'Bạn chưa nhập link',

        ]);
        $slide->noidung=$request->noidung;
        $slide->link = $request->link;
        $slide->trangthai = $request->trangthai;

        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            $file->move("admin_asset/img/slide/",$anh);
            $slide->anh=$anh;
        }
        else
        {
            $slide->anh=$slide->anh;
        }
        $slide->save();

         return redirect('sua-slide/'.$id)->with('thongbao','Sửa thành công');
    
    }
    public function postTimKiem(request $request)
    {
        $tukhoa = $request->tukhoa;
        $slide = Slide::where('noidung','like',"%$tukhoa%")->paginate(5);
        return view('admin.pages.slide.danhsach',['slide'=>$slide,'tukhoa'=>$tukhoa]);
    }

}
