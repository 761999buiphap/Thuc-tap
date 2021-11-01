<?php

namespace App\Http\Controllers;
use App\Http\Requests\RequestPassword;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\GiongCay;
use App\KhachHang;

class UserController extends Controller
{
    //
    public function getDanhSach($id)
    {
        $user = User::where('quyen',$id)->get();
        return view('ADMIN.pages.users.danhsach',['user'=>$user,'id'=>$id]);
    }

    public function getThem($id)
    {
        $user = User::where('quyen',$id)->get();
        $u_them = $id;
        return view('ADMIN.pages.users.danhsach',['user'=>$user,'id'=>$id,'u_them'=>$u_them]);
    }
    public function postThem(request $request,$id)
    {
        $this->validate($request,
        [
            'ten' => 'required|unique:users,name',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
            'password_xacnhan'=>'required|same:password',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên',
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
        $user->quyen = $id;

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

        return redirect('them-user')->with('thongbao','Thêm thành công');
    }

    public function getSua($id,$id_user)
    {
        $user = User::where('quyen',$id_user)->get();
        $u_sua = User::where('id',$id)->get();

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.users.danhsach',['user'=>$user,'u_sua'=>$u_sua,'id'=>$id_user,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'ten' => 'required',
            'password'=>'required|min:8',
            'password_xacnhan'=>'required|same:password',
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Tên user phải có độ dài từ 8 kí tự',
            'password_xacnhan.required'=>'Bạn chưa xác nhận lại mật khẩu',
            'password_xacnhan.same' => 'Mật khẩu xác nhận không khớp',


        ]);
        $user = User::find($request->id_user);
        $user->name = $request->ten;
        $user->email = $request->email;
        $user->trangthai = $request->trangthai;
        $user->password = bcrypt( $request->password);
        $user->quyen = $id;

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
        return redirect('danhsach-user/'.$id)->with('thongbao','Thêm thành công');
    }
    public function postTimKiem(Request $request)
    {
        if(empty($request->ten) && empty($request->trangthai))
            $user = User::where('quyen',$request->quyen)->all();
        elseif(!empty($request->ten) && empty($request->trangthai))
            $user = User::where('quyen',$request->quyen)->where('name','like',$request->ten)->get();
        elseif(empty($request->ten) && !empty($request->trangthai))
            $user = User::where('quyen',$request->quyen)->where('trangthai',$request->trangthai)->get();
        else
            $user = User::where('quyen',$request->quyen)->where('name','like',$request->ten)->where('trangthai',$request->trangthai)->get();
        $sua_tk = $user;
        if($user !=' ')
        {
            foreach($user as $vl)
            {
                $id=$vl->quyen;
            }
        }
        else
        {
            $id='0';
        }

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('ADMIN.pages.users.danhsach',['user'=>$user,'sua_tk'=>$sua_tk,'id'=>$id,'md'=>$id,'arr_user'=>$arr_user]);
    }
    public function getXoa($id)
    {
        $user = User::find($id);
        $id = $user->quyen;
        $user -> delete();

        return redirect('danhsach-user/'.$id)->with('thongbao','Xóa thành công');
    }
    public function getDangNhap()
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        return view('user.pages.dangnhap',['giongcay'=>$giongcay]);
    }
    public function postDangNhap(request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ],[
            'email.required'=>"Bạn chưa nhập email",
            'email.email'=>"Bạn chưa nhập đúng định dạng email",
            'password.required'=>'Bạn chưa nhập password',
        ]);
       
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'trangthai'=>"Đang hoạt động"]))
        {
            $quyen = Auth::user()->quyen;
            if($quyen == 0 )
            {
                return redirect('danhsach-baocao')->with('thongbao','Đăng nhập thành công!');
            }
            else
            {
                return redirect('trangchu')->with('thongbao','Chào mừng bạn đến với cây giống Nông Nghiệp!');
            }
        }
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'trangthai'=>"Ngừng hoạt động"]))
        {
            return redirect('dangnhap')->with('thongbaodangnhap','Tài khoản này không được phép truy nhập!');
        }
        else {
            return redirect('dangnhap')->with('thongbaodangnhap','Email hoặc mật khẩu không đúng!');
			
		}
    }
    public function postDangKi(request $request)
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
        $user->trangthai = "Đang hoạt động";
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
        return redirect('dangnhap')->with('thongbao','Thành công! Hãy đăng nhập để đặt mua sản phẩm');
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('trangchu');
    }
    public function getThongTin()
    {
        $user = User::all()->where('id',Auth::user()->id);
        return view('ADMIN.pages.caidat.thongtin',['user'=>$user]);
    }
    public function postDoiMatKhau(request $request,$id)
    {
        $this->validate($request,[
            'mk1'=>'required|min:8|max:32',
            'mk2'=>'required|same:mk1',
        ],[
            'mk1.required'=>'*Bạn chưa nhập mật khẩu mới !',
            'mk2.required'=>'*Bạn chưa nhập mật khẩu xác nhận !',
            'mk1.min'=>'*Mật khẩu phải có độ dài từ 8 kí tự !',
            'mk1.max'=>'*Mật khẩu chỉ được tối đa 32 kí tự !',
            'mk2.same'=>'*Mật khẩu xác nhận không đúng !',
        
        ]);
        $user = User::find($id);
        $user->password = bcrypt($request->mk1);
        $user->save();
        $user = User::where('id',$id)->get();
        $doimk =' ';
       return view('ADMIN.pages.caidat.thongtin',['user'=>$user,'doimk'=>$doimk]);
    }
    public function NgungHoatDong($id,$idd)
    {
        $user = User::find($id);
        $user->trangthai = "Ngừng hoạt động";

        $user->save();

        return redirect('danhsach-user/'.$idd)->with('thongbao','Chuyển trạng thái thành công!');
    }
    public function DangHoatDong($id,$idd)
    {
        $user = User::find($id);
        $user->trangthai = "Đang hoạt động";

        $user->save();

        return redirect('danhsach-user/'.$idd)->with('thongbao','Chuyển trạng thái thành công!');
    }
}
