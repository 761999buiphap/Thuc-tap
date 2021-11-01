<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cay;
use App\LoaiCay;
use App\GiongCay;
use App\User;

class CayController extends Controller
{
    public function getDanhSach($id_loaicay)
    {
        $giongcay = GiongCay::all();
        $loaicay = LoaiCay::all();
        $cay = Cay::where('id_loaicay',$id_loaicay)->get();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.cay.danhsach',['giongcay'=>$giongcay,'loaicay'=>$loaicay,'cay'=>$cay,'id'=>$id_loaicay,'arr_user'=>$arr_user]);
    }
    public function getThem($id)
    {
        $giongcay = GiongCay::all();
        $loaicay = LoaiCay::all();
        $cay = Cay::where('id_loaicay',$id)->get();
        $arr_gc = LoaiCay::where('id',$id)->get();
        $lc_them = $id;
        foreach($arr_gc as $value){
            $gc = $value->id_giongcay;
        }

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.cay.danhsach',['giongcay'=>$giongcay,'loaicay'=>$loaicay,'cay'=>$cay,'id'=>$id,'lc_them'=>$lc_them,'gc'=>$gc,'arr_user'=>$arr_user]);
    }
    public function postThem(Request $request,$id)
    {
        $this->validate($request,
        [
            'ten' => 'required',
            'gia' => 'required',
            'soluong' => 'required',
            'khuyenmai' => 'required',
            'tieude' => 'required',
            'mota' => 'required',
            'nguongoc' => 'required',
            'anh' => 'required',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên',
            'gia.required'=>'Bạn chưa nhập giá',
            'soluong.required'=>'Bạn chưa nhập số lượng',
            'khuyenmai.required'=>'Bạn chưa nhập khuyến mại',
            'tieude.required'=>'Bạn chưa nhập tiêu đề',
            'mota.required'=>'Bạn chưa nhập mô tả',
            'nguongoc.required'=>'Bạn chưa nhập nguồn gốc',
            'anh.required'=>'Bạn chưa tải ảnh lên',
        ]);
        $c = new Cay;
        $c->ten = $request->ten;
        $c->gia = $request->gia;
        $c->soluong = $request->soluong;
        $c->khuyenmai = $request->khuyenmai;
        $c->tieude = $request->tieude;
        $c->mota = $request->mota;
        $c->nguongoc = $request->nguongoc;
        $c->trangthai = $request->trangthai;
        $c->id_loaicay = $request->id_loaicay;
        $c->id_users = $request->id_users;
        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            $file->move("admin/img/cay",$anh);
            $c->anh = $anh;
        }
        else
        {
            $sach->anh=" ";
        }
        $c->save();
        $giongcay = GiongCay::all();
        $loaicay = LoaiCay::all();
        $cay = Cay::where('id_loaicay',$id)->get();
        
        $arr_gc = LoaiCay::where('id',$id)->get();
        foreach($arr_gc as $value){
            $gc = $value->id_giongcay;
        }

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.cay.danhsach',['giongcay'=>$giongcay,'loaicay'=>$loaicay,'cay'=>$cay,'id'=>$id,'gc'=>$gc,'arr_user'=>$arr_user]);
    }
    public function getSua($id,$id_loaicay)
    {
        $giongcay = GiongCay::all();
        $loaicay = LoaiCay::all();
        $cay = Cay::where('id_loaicay',$id_loaicay)->get();
        $arr_gc = LoaiCay::where('id',$id_loaicay)->get();
       
        foreach($arr_gc as $value){
            $select_gc = $value->id_giongcay;
        }
        $c_sua = Cay::where('id',$id)->get();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.cay.danhsach',['giongcay'=>$giongcay,'loaicay'=>$loaicay,'cay'=>$cay,'c_sua'=>$c_sua,'id'=>$id_loaicay,'md'=>$id,'select_gc'=>$select_gc,'arr_user'=>$arr_user]);
    }
    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'ten' => 'required',
            'gia' => 'required',
            'soluong' => 'required',
            'khuyenmai' => 'required',
            'tieude' => 'required',
            'mota' => 'required',
            'nguongoc' => 'required',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên',
            'gia.required'=>'Bạn chưa nhập giá',
            'soluong.required'=>'Bạn chưa nhập số lượng',
            'khuyenmai.required'=>'Bạn chưa nhập khuyến mại',
            'tieude.required'=>'Bạn chưa nhập tiêu đề',
            'mota.required'=>'Bạn chưa nhập mô tả',
            'nguongoc.required'=>'Bạn chưa nhập nguồn gốc',
        ]);
        $c = Cay::find($id);
        $c->ten = $request->ten;
        $c->gia = $request->gia;
        $c->soluong = $request->soluong;
        $c->khuyenmai = $request->khuyenmai;
        $c->tieude = $request->tieude;
        $c->mota = $request->mota;
        $c->nguongoc = $request->nguongoc;
        $c->trangthai = $request->trangthai;
        $c->id_loaicay = $request->id_loaicay;
        $c->id_users = $request->id_users;
        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            $file->move("admin/img/cay",$anh);
            $c->anh = $anh;
        }
        else
        {
            $c->anh= $request->anh_cu;
        }
        $c->save();
        $giongcay = GiongCay::all();
        $loaicay = LoaiCay::all();
        $cay = Cay::where('id_loaicay',$request->id_loaicay)->get();
        $arr_gc = LoaiCay::where('id',$id)->get();
        foreach($arr_gc as $value){
            $gc = $value->id_giongcay;
        }

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.cay.danhsach',['giongcay'=>$giongcay,'loaicay'=>$loaicay,'cay'=>$cay,'id'=>$request->id_loaicay,'c'=>$c,'arr_user'=>$arr_user]);
    }
    public function postTimKiem(Request $request)
    {
        if(!empty($request->gia))
        {
            if($request->gia == 50000){$giatu = 0;$giaden = 50000;}
            elseif($request->gia == 100000){$giatu = 50000;$giaden = 100000;}
            elseif($request->gia == 1000000){$giatu = 100000;$giaden = 1000000;}
            elseif($request->gia == 10000000){$giatu = 1000000;$giaden = 10000000;}
            elseif($request->gia == 10000001){$giatu = 10000000;$giaden = 0;}
        }
        $giongcay = GiongCay::all();
        $loaicay = LoaiCay::all();
        if(empty($request->ten) && empty($request->gia) && empty($request->trangthai))
            $cay = Cay::where('id_loaicay',$request->id_loaicay)->get();
        else if(!empty($request->ten) && empty($request->gia) && empty($request->trangthai))
            $cay = Cay::where('id_loaicay',$request->id_loaicay)->where('ten','like',$request->ten)->get();
        else if(empty($request->ten) && empty($request->gia) && !empty($request->trangthai))
            $cay = Cay::where('id_loaicay',$request->id_loaicay)->where('trangthai',"$request->trangthai")->get();
        else if(empty($request->ten) && !empty($request->gia) && empty($request->trangthai))
        {
            if($giaden == 0)
                $cay = Cay::where('id_loaicay',$request->id_loaicay)->where('gia','<',$giaden)->get();
            else
                $cay = Cay::where('id_loaicay',$request->id_loaicay)->whereBetween('gia',[$giatu,$giaden])->get();
        }
        else if(!empty($request->ten) && empty($request->gia) && !empty($request->trangthai))
            $cay = Cay::where('id_loaicay',$request->id_loaicay)->where('ten','like',"$request->ten")->where('trangthai',"$request->trangthai")->get();
        else if(!empty($request->ten) && !empty($request->gia) && empty($request->trangthai))
        {    
            if($giaden == 0)
                $cay = Cay::where('id_loaicay',$request->id_loaicay)->where('ten','like',"$request->ten")->where('gia','<',$giaden)->get();
            else
                $cay = Cay::where('id_loaicay',$request->id_loaicay)->where('ten','like',"$request->ten")->whereBetween('gia',[$giatu,$giaden])->get();
        } 
        else if(empty($request->ten) && !empty($request->gia) && !empty($request->trangthai))
        {
            if($giaden == 0)
                $cay = Cay::where('id_loaicay',$request->id_loaicay)->where('gia','<',$giaden)->where('trangthai',"$request->trangthai")->get();
            else
                $cay = Cay::where('id_loaicay',$request->id_loaicay)->whereBetween('gia',[$giatu,$giaden])->where('trangthai',"$request->trangthai")->get();
        } 
        else
        {
            if($giaden == 0)
                $cay = Cay::where('id_loaicay',$request->id_loaicay)->where('ten','like',"$request->ten")->where('gia','<',$giaden)->get();
            else
                $cay = Cay::where('id_loaicay',$request->id_loaicay)->where('ten','like',"$request->ten")->whereBetween('gia',[$giatu,$giaden])->get();
        } 

        $sua_tk = $cay;$c_sua=$cay;        
        if(empty($cay))
        {
            foreach($cay as $vl)
            {
                $id=$vl->id_loaicay;
            }
        }
        else
        {
            foreach($loaicay as $vl)
            {
                $id = $vl->id;
                break;
            }
        }
        $arr_gc = LoaiCay::where('id',$id)->get();
       
        foreach($arr_gc as $value){
            $select_gc = $value->id_giongcay;
        }

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.cay.danhsach',['giongcay'=>$giongcay,'loaicay'=>$loaicay,'cay'=>$cay,'sua_tk'=>$sua_tk,'id'=>$id,'select_gc'=>$select_gc,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function NgungHoatDong($id,$idd)
    {
        $cay = Cay::find($id);
        $cay->trangthai = "Ngừng hoạt động";

        $cay->save();

        return redirect('danhsach-cay/'.$idd)->with('thongbao','Chuyển trạng thái thành công!');
    }
    public function DangHoatDong($id,$idd)
    {
        $cay = Cay::find($id);
        $cay->trangthai = "Đang hoạt động";

        $cay->save();

        return redirect('danhsach-cay/'.$idd)->with('thongbao','Chuyển trạng thái thành công!');
    }
}
