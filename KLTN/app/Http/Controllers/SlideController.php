<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\User;
class SlideController extends Controller
{
    //
    public function getDanhSach()
    {
        $slide = Slide::all();
        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.slide.danhsach',['slide'=>$slide,'arr_user'=>$arr_user]);
    }
    public function getThem()
    {
        $slide = Slide::all();
        $gc_them = [];

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.slide.danhsach',['slide'=>$slide,'gc_them'=>$gc_them,'arr_user'=>$arr_user]);
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'tieude' => 'required',
            'noidung' => 'required',
            'link' => 'required',
            'anh' => 'required',

        ],
        [
            'tieude.required'=>'Bạn chưa nhập tiêu đề',
            'noidung.required'=>'Bạn chưa nhập nội dung',
            'link.required'=>'Bạn chưa nhập link',
            'anh.required'=>'Bạn chưa chọn ảnh',
        ]);

        $slide = new Slide;
        $slide->tieude = $request->tieude;
        $slide->noidung = $request->noidung;
        $slide->link = $request->link;
        $slide->id_users = $request->id_users;
        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            $file->move("admin/img/slide",$anh);
            $slide->anh = $anh;
        }
        else
        {
            $slide->anh=" ";
        }
        $slide->save();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return redirect('danhsach-slide')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $slide = Slide::all();
        $s_sua = Slide::where('id',$id)->get();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.slide.danhsach',['slide'=>$slide,'s_sua'=>$s_sua,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function postSua(request $request,$id)
    {
        $slide = Slide::find($id);
        $this->validate($request,
        [
            'tieude' => 'required',
            'noidung' => 'required',
            'link' => 'required',

        ],
        [
            'tieude.required'=>'Bạn chưa nhập tiêu đề',
            'noidung.required'=>'Bạn chưa nhập nội dung',
            'link.required'=>'Bạn chưa nhập link',
        ]);
        $slide->tieude = $request->tieude;
        $slide->noidung = $request->noidung;
        $slide->link = $request->link;
        $slide->id_users = $request->id_users;
        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            $file->move("admin/img/slide",$anh);
            $slide->anh = $anh;
        }
        else
        {
            $slide->anh=$request->anh_cu;
        }
        $slide->save();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return redirect('danhsach-slide')->with('thongbao','Thêm thành công');
    }
    public function getXoa($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        $slide = Slide::all();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.slide.danhsach',['slide'=>$slide,'arr_user'=>$arr_user]);
    }
    public function postTimKiem(Request $request)
    {
        $slide = Slide::where('tieude','like',"$request->ten")->get();
        $timkiem = $request->ten;

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.slide.danhsach',['slide'=>$slide,'timkiem'=>$timkiem,'arr_user'=>$arr_user]);
    }
}
