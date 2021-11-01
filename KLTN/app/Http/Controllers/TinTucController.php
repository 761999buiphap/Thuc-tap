<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TinTucc;
use App\User;
class TinTucController extends Controller
{
    //
    public function getDanhSach($id)
    {
        $loaitin = LoaiTin::all();
        $tintuc = TinTucc::where('id_loaitin',$id)->get();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.tintuc.danhsach',['tintuc'=>$tintuc,'loaitin'=>$loaitin,'id'=>$id,'arr_user'=>$arr_user]);
    }
    public function getThem($id)
    {
        $loaitin = LoaiTin::all();
        $tintuc = TinTucc::where('id_loaitin',$id)->get();
        $tt_them = $id;

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.tintuc.danhsach',['loaitin'=>$loaitin,'tintuc'=>$tintuc,'id'=>$id,'tt_them'=>$tt_them,'arr_user'=>$arr_user]);
    }
    public function postThem(Request $request,$id)
    {
        $this->validate($request,
        [
            'tieude' => 'required',
            'anh' => 'required',
            'noidung' => 'required',
        ],
        [
            'tieude.required'=>'Bạn chưa nhập tiêu đề',
            'anh.required'=>'Bạn chưa chọn ảnh',
            'noidung.required'=>'Bạn chưa nhập nội dung',
        ]);

        $tintuc = new TinTucc;
        $tintuc->tieude = $request->tieude;
        $tintuc->noidung = $request->noidung;
        $tintuc->id_users = $request->id_users;
        $tintuc->id_loaitin = $request->id_loaitin;
        $tintuc->noibat = $request->noibat;
        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            $file->move("admin/img/tintuc",$anh);
            $tintuc->anh = $anh;
        }
        else
        {
            $tintuc->anh=" ";
        }
        $tintuc->save();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return redirect('danhsach-tintuc/'.$request->id_loaitin)->with('thongbao','Thêm thành công');
    }
    public function getSua($id,$id_loaitin)
    {
        $loaitin = LoaiTin::all();
        $tintuc = TinTucc::where('id_loaitin',$id_loaitin)->get();
        $tt_sua = TinTucc::where('id',$id)->get();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.tintuc.danhsach',['loaitin'=>$loaitin,'tintuc'=>$tintuc,'tt_sua'=>$tt_sua,'id'=>$id_loaitin,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function postSua(Request $request,$id)
    {
        $loaitin = LoaiTin::all();
        $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->get();
        $tt = TinTucc::find($id);
        $this->validate($request,
        [
            'tieude' => 'required',
            'noidung' => 'required',
        ],
        [
            'tieude.required'=>'Bạn chưa nhập tiêu đề',
            'noidung.required'=>'Bạn chưa nhập nội dung',
        ]);
        $tt->tieude = $request->tieude;
        $tt->noidung = $request->noidung;
        $tt->id_users = $request->id_users;
        $tt->id_loaitin = $request->id_loaitin;
        $tt->noibat = $request->noibat;
        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            $file->move("admin/img/tintuc",$anh);
            $tt->anh = $anh;
        }
        else
        {
            $tt->anh=$request->anh_cu;
        }
        $tt->save();

        if(isset($request->timkiem))
            $tintuc = TinTucc::where('ten',$request->timkiem)->get();
        else
            $tintuc = TinTucc::all();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return redirect('danhsach-tintuc/'.$request->id_loaitin)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id,$id_loaitin)
    {
        $loaitin = LoaiTin::all();
        $tintuc = TinTucc::find($id);
        $tintuc->delete();
        $tintuc = TinTucc::all();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return redirect('danhsach-tintuc/'.$id_loaitin)->with('thongbao','Xóa thành công');
    }
    public function postTimKiem(Request $request)
    {
        $loaitin = LoaiTin::all();
        if(empty($request->ten) && $request->noibat == 3 && empty($request->tungay) && empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->get();
        else if(!empty($request->ten) && $request->noibat == 3 && empty($request->tungay) && empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('tieude','like',$request->ten)->get();
        else if(empty($request->ten) && $request->noibat != 3 && empty($request->tungay) && empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('noibat',$request->noibat)->get();
        else if(empty($request->ten) && $request->noibat == 3 && !empty($request->tungay) && empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('created_at','>=',$request->tungay)->get();
        else if(empty($request->ten) && $request->noibat == 3 && empty($request->tungay) && !empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('created_at','<=',$request->denngay)->get();
        else if(!empty($request->ten) && $request->noibat == 3 && empty($request->tungay) && empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('tieude','like',"$request->ten")->get();
        else if(!empty($request->ten) && $request->noibat != 3 && empty($request->tungay) && empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('tieude','like',"$request->ten")->where('noibat','=',$request->noibat)->get();
        else if(!empty($request->ten) && $request->noibat == 3 && !empty($request->tungay) && empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('tieude','like',"$request->ten")->where('created_at','>=',$request->tungay)->get();
        else if(!empty($request->ten) && $request->noibat == 3 && empty($request->tungay) && !empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('tieude','like',"$request->ten")->where('created_at','<=',$request->denngay)->get();
        else if(!empty($request->ten) && $request->noibat != 3 && !empty($request->tungay) && empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('tieude','like',"$request->ten")->where('noibat','=',$request->noibat)->where('created_at','>=',$request->tungay)->get();
        else if(!empty($request->ten) && $request->noibat != 3 && empty($request->tungay) && !empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('tieude','like',"$request->ten")->where('noibat','=',$request->noibat)->where('created_at','<=',$request->denngay)->get();
        else if(empty($request->ten) && $request->noibat != 3 && !empty($request->tungay) && empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('noibat','=',$request->noibat)->where('created_at','>=',$request->tungay)->get();
        else if(empty($request->ten) && $request->noibat != 3 && empty($request->tungay) && !empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('noibat','=',$request->noibat)->where('created_at','<=',$request->denngay)->get();
        else if(empty($request->ten) && $request->noibat != 3 && !empty($request->tungay) && !empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('noibat','=',$request->noibat)->whereBetween('created_at',[$request->tungay,$request->denngay])->get();
        else if(empty($request->ten) && $request->noibat == 3 && !empty($request->tungay) && !empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->whereBetween('created_at',[$request->tungay,$request->denngay])->get();
        else if(!empty($request->ten) && $request->noibat == 3 && !empty($request->tungay) && !empty($request->denngay))
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('tieude','like',"$request->ten")->whereBetween('created_at',[$request->tungay,$request->denngay])->get();
        else
            $tintuc = TinTucc::where('id_loaitin',$request->id_loaitin)->where('tieude','like',"$request->ten")->where('noibat','=',$request->noibat)->where('created_at','>=',$request->tungay)->where('created_at','<=',$request->denngay)->get();

            $sua_tk = $tintuc;
        $id=$request->id_loaitin;

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.tintuc.danhsach',['loaitin'=>$loaitin,'tintuc'=>$tintuc,'sua_tk'=>$sua_tk,'id'=>$id,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function KhongNoiBat($id,$idd)
    {
        $tintuc = TinTucc::find($id);
        $tintuc->noibat = 0;

        $tintuc->save();

        return redirect('danhsach-tintuc/'.$idd)->with('thongbao','Chuyển trạng thái thành công!');
    }
    public function NoiBat($id,$idd)
    {
        $tintuc = TinTucc::find($id);
        $tintuc->noibat = 1;

        $tintuc->save();

        return redirect('danhsach-tintuc/'.$idd)->with('thongbao','Chuyển trạng thái thành công!');
    }
}
