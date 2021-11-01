<?php

namespace App\Http\Controllers;
use App\Lienhe;
use Illuminate\Http\Request;

class LienHeController extends Controller
{
    //
    public function getDanhSach()
    {
        $lienhe = LienHe::all();
        return view('ADMIN.pages.lienhe.danhsach',['lienhe'=>$lienhe]);
    }
    public function getThem()
    {
        $lienhe = LienHe::all();
        $lh_them = [];
        return view('ADMIN.pages.lienhe.danhsach',['lienhe'=>$lienhe,'lh_them'=>$lh_them]);
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'hoten' =>'required',
            'noidung' =>'required',
            'sdt' =>'required',
            'email'=>'required|email',
        ],
        [
            'hoten.required'=>'Bạn chưa nhập tên',
            'noidung.required'=>'Bạn chưa nhập nội dung',
            'sdt.required'=>'Bạn chưa nhập số điện thoại',
            'diachi.required'=>'Bạn chưa nhập địa chỉ',
            'email.required'=>'Bạn chưa nhập nội dung email',
            'email.email'=> 'Bạn chưa nhập đúng định dạng email',
        ]);

        $lienhe = new LienHe;
        $lienhe->ngay = date("Y-m-d");
        $lienhe->hoten = $request->hoten;
        $lienhe->sdt = $request->sdt;
        $lienhe->noidung = $request->noidung;
        $lienhe->email = $request->email;
        $lienhe->save();

        return redirect('danhsach-lienhe')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $lienhe = LienHe::all();
        $lh_sua = LienHe::where('id',$id)->get();

        return view('ADMIN.pages.lienhe.danhsach',['lienhe'=>$lienhe,'lh_sua'=>$lh_sua,'md'=>$id]);
    }
    public function postSua(request $request,$id)
    {
        $lienhe = LienHe::find($id);
        $this->validate($request,
        [
            'hoten' =>'required',
            'noidung' =>'required',
            'sdt' =>'required',
            'email'=>'required|email',
        ],
        [
            'hoten.required'=>'Bạn chưa nhập tên',
            'noidung.required'=>'Bạn chưa nhập nội dung',
            'sdt.required'=>'Bạn chưa nhập số điện thoại',
            'diachi.required'=>'Bạn chưa nhập địa chỉ',
            'email.required'=>'Bạn chưa nhập nội dung email',
            'email.email'=> 'Bạn chưa nhập đúng định dạng email',
        ]);

        $lienhe->ngay = date("Y-m-d");
        $lienhe->hoten = $request->hoten;
        $lienhe->sdt = $request->sdt;
        $lienhe->noidung = $request->noidung;
        $lienhe->email = $request->email;
        $lienhe->save();

        if(isset($request->timkiem))
            $lienhe = LienHe::where('ten',$request->timkiem)->get();
        else
            $lienhe = LienHe::all();

        return redirect('danhsach-lienhe')->with('thongbao','Thêm thành công');
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
        if(empty($request->ten) && empty($request->tungay) && empty($request->denngay))
        {
            $lienhe = LienHe::all();
        }
        elseif(!empty($request->ten) && empty($request->tungay) && empty($request->denngay))
        {
            $lienhe = LienHe::where('hoten','like',"$request->ten")->get();
        }
        elseif(empty($request->ten) && !empty($request->tungay) && empty($request->denngay))
        {
            $lienhe = LienHe::where('created_at','>=',$request->tungay)->get();
        }
        elseif(empty($request->ten) && empty($request->tungay) && !empty($request->denngay))
        {
            $lienhe = LienHe::where('created_at','<=',$request->denngay)->get();
        }
        elseif(!empty($request->ten) && !empty($request->tungay) && empty($request->denngay))
        {
            $lienhe = LienHe::where('hoten','like',"$request->ten")->where('created_at','>=',$request->tungay)->get();
        }
        elseif(!empty($request->ten) && empty($request->tungay) && !empty($request->denngay))
        {
            $lienhe = LienHe::where('hoten','like',"$request->ten")->where('created_at','<=',$request->denngay)->get();
        }
        elseif(empty($request->ten) && !empty($request->tungay) && !empty($request->denngay))
        {
            $lienhe = LienHe::whereBetween('created_at', array($request->tungay,$request->denngay))->get();
        }
        else
            $lienhe = LienHe::where('hoten','like',"$request->ten")->whereBetween('created_at', array($request->tungay,$request->denngay))->get();
        $timkiem = $request->ten;

        return view('ADMIN.pages.lienhe.danhsach',['lienhe'=>$lienhe,'timkiem'=>$timkiem]);
    }
}

