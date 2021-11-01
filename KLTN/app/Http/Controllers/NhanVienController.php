<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVien;
use App\User;
class NhanVienController extends Controller
{
    //
    public function getDanhSach()
    {
        $nhanvien = NhanVien::all();
        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.nhanvien.danhsach',['nhanvien'=>$nhanvien,'arr_user'=>$arr_user]);
    }
    public function getThem()
    {
        $nhanvien = NhanVien::all();
        $nv_them = [];

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.nhanvien.danhsach',['nhanvien'=>$nhanvien,'nv_them'=>$nv_them,'arr_user'=>$arr_user]);
    }
    public function postThem(request $request)
    {
        $this->validate($request,
        [
            'hoten' =>'required',
            'gioitinh' =>'required',
            'sdt' =>'required',
            'diachi' =>'required',
            'ten' => 'required|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
            'password_xacnhan'=>'required|same:password',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên',
            'hoten.required'=>'Bạn chưa nhập họ tên',
            'gioitinh.required'=>'Bạn chưa chọn giới tính',
            'sdt.required'=>'Bạn chưa nhập số điện thoại',
            'diachi.required'=>'Bạn chưa nhập địa chỉ',
            'ten.unique' => 'Tên người dùng đã tồn tại',
            'email.required'=>'Bạn chưa nhập nội dung email',
            'email.email'=> 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Tên user phải có độ dài từ 8 kí tự',
            'password_xacnhan.required'=>'Bạn chưa xác nhận lại mật khẩu',
            'password_xacnhan.same' => 'Mật khẩu xác nhận không khớp',


        ]);

        $user = new User;
        $user->name = $request->ten;
        $user->email = $request->email;
        $user->trangthai = $request->trangthai;
        $user->password = bcrypt( $request->password);
        $user->quyen = $request->quyen;

        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            $file->move("admin/img/user",$anh);
            $user->anh=$anh;
        }
        else
        {
            $user->anh="user_mau.png";
        }
        $user->save();

        $u = User::where('email',$request->email)->get();
        $nhanvien = new NhanVien;
        $nhanvien->ten = $request->hoten;
        $nhanvien->gioitinh = $request->gioitinh;
        $nhanvien->sdt = $request->sdt;
        $nhanvien->diachi = $request->diachi;
        $nhanvien->email = $request->email;
        foreach($u as $vl)
        {
            $nhanvien->taikhoan = $vl->id;
        }
        $nhanvien->trangthai = $request->trangthai;
        $nhanvien->id_users = $request->id_users;
        $nhanvien->save();
        return redirect('danhsach-nhanvien')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $nhanvien = NhanVien::all();
        $nv_sua = NhanVien::where('id',$id)->get();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.nhanvien.danhsach',['nhanvien'=>$nhanvien,'nv_sua'=>$nv_sua,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function postSua(request $request,$id)
    {
        $nhanvien = NhanVien::find($id);
        $this->validate($request,
        [
            'hoten' =>'required',
            'gioitinh' =>'required',
            'sdt' =>'required',
            'diachi' =>'required',
        ],
        [
            'hoten.required'=>'Bạn chưa nhập họ tên',
            'gioitinh.required'=>'Bạn chưa chọn giới tính',
            'sdt.required'=>'Bạn chưa nhập số điện thoại',
            'diachi.required'=>'Bạn chưa nhập địa chỉ',
        ]);
        $nhanvien->ten = $request->hoten;
        $nhanvien->gioitinh = $request->gioitinh;
        $nhanvien->sdt = $request->sdt;
        $nhanvien->diachi = $request->diachi;
        $nhanvien->email = $request->email;
        $nhanvien->taikhoan = $request->taikhoan;
        $nhanvien->trangthai = $request->trangthai;
        $nhanvien->id_users = $request->id_users;
        $nhanvien->save();

        if(isset($request->timkiem))
            $nhanvien = NhanVien::where('ten',$request->timkiem)->get();
        else
            $nhanvien = NhanVien::all();

            $tb_user = User::all();
            $arr_user = [];
            foreach($tb_user as $value)
            {
                $arr_user[$value->id] = $value->name;
            }
        return view('ADMIN.pages.nhanvien.danhsach',['nhanvien'=>$nhanvien,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function postTimKiem(Request $request)
    {
        if(empty($request->ten) && empty($request->gioitinh) && empty($request->trangthai))
            $nhanvien = NhanVien::all();
        elseif(!empty($request->ten) && empty($request->gioitinh && empty($request->trangthai)))
           $nhanvien = NhanVien::where('ten','like',"%$request->ten%")->get();
        elseif(empty($request->ten) && !empty($request->gioitinh && empty($request->trangthai)))
            $nhanvien = NhanVien::where('gioitinh',$request->gioitinh)->get();
        elseif(empty($request->ten) && empty($request->gioitinh && !empty($request->trangthai)))
            $nhanvien = NhanVien::where('trangthai',$request->trangthai)->get();
        elseif(!empty($request->ten) && !empty($request->gioitinh && empty($request->trangthai)))
            $nhanvien = NhanVien::where('gioitinh',$request->gioitinh)->where('ten','like',"%$request->ten%")->get();
        elseif(!empty($request->ten) && empty($request->gioitinh && !empty($request->trangthai)))
            $nhanvien = NhanVien::where('trangthai',$request->trangthai)->where('ten','like',"%$request->ten%")->get();
        elseif(empty($request->ten) && !empty($request->gioitinh && !empty($request->trangthai)))
            $nhanvien = NhanVien::where('gioitinh',$request->gioitinh)->where('trangthai',$request->trangthai)->get();
        else
            $nhanvien = NhanVien::where('ten','like',"%$request->ten%")->where('gioitinh',$request->gioitinh)->where('trangthai',$request->trangthai)->get();
        $timkiem = $request->ten;

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.nhanvien.danhsach',['nhanvien'=>$nhanvien,'timkiem'=>$timkiem,'arr_user'=>$arr_user]);
    }
}
