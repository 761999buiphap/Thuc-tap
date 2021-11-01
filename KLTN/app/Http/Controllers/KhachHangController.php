<?php

namespace App\Http\Controllers;

use App\khachHang;
use App\HoaDon;
use App\User;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    //
    public function getDanhSach()
    {
        $khachhang = KhachHang::all();
        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.khachhang.danhsach',['khachhang'=>$khachhang,'arr_user'=>$arr_user]);
    }
    public function getThem()
    {
        $khachhang = KhachHang::all();
        $kh_them = [];

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.khachhang.danhsach',['khachhang'=>$khachhang,'kh_them'=>$kh_them,'arr_user'=>$arr_user]);
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
        $user->quyen = 1;

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
        $khachhang = new KhachHang;
        $khachhang->ten = $request->hoten;
        $khachhang->gioitinh = $request->gioitinh;
        $khachhang->sdt = $request->sdt;
        $khachhang->diachi = $request->diachi;
        $khachhang->thanhpho = $request->thanhpho;
        $khachhang->email = $request->email;
        foreach($u as $vl)
        {
            $khachhang->taikhoan = $vl->id;
        }
        $khachhang->save();
        return redirect('danhsach-khachhang')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $khachhang = KhachHang::all();
        $kh_sua = KhachHang::where('id',$id)->get();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.khachhang.danhsach',['khachhang'=>$khachhang,'kh_sua'=>$kh_sua,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function postSua(request $request,$id)
    {
        $khachhang = KhachHang::find($id);
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
        $khachhang->ten = $request->hoten;
        $khachhang->gioitinh = $request->gioitinh;
        $khachhang->sdt = $request->sdt;
        $khachhang->diachi = $request->diachi;
        $khachhang->thanhpho = $request->thanhpho;
        $khachhang->email = $request->email;
        $khachhang->taikhoan = $request->taikhoan;
        $khachhang->save();

        if(isset($request->timkiem))
            $khachhang = KhachHang::where('ten',$request->timkiem)->get();
        else
            $khachhang = KhachHang::all();

            $tb_user = User::all();
            $arr_user = [];
            foreach($tb_user as $value)
            {
                $arr_user[$value->id] = $value->name;
            }
        return view('ADMIN.pages.khachhang.danhsach',['khachhang'=>$khachhang,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function postTimKiem(Request $request)
    {
        if(!empty($request->ten) && empty($request->gioitinh))
            $khachhang = KhachHang::where('ten','like',"%$request->ten%")->get();
        if(empty($request->ten) && !empty($request->gioitinh))
            $khachhang = KhachHang::where('gioitinh',$request->gioitinh)->get();
        if(!empty($request->ten) && !empty($request->gioitinh))
            $khachhang = KhachHang::where('ten','like',"%$request->ten%")->where('gioitinh',$request->gioitinh)->get();
        $timkiem = $request->ten;

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }

        return view('ADMIN.pages.khachhang.danhsach',['khachhang'=>$khachhang,'timkiem'=>$timkiem,'arr_user'=>$arr_user]);
    }

    public function getChiTiet($id)
    {
        $hoadon = HoaDon::where('id_khachhang',$id)->get();
        $khachhang = KhachHang::where('id',$id)->get();

        return view('admin.pages.khachhang.chitietkhachhang',['hoadon'=>$hoadon,'khachhang'=>$khachhang]);
    }
}
