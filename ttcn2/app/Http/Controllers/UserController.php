<?php

namespace App\Http\Controllers;
use App\Http\Requests\RequestPassword;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //
    public function getDanhSach($id)
    {
        $user = User::where('quyen',$id)->paginate(10);
        return view('admin.pages.users.danhsach',['user'=>$user]);
    }

    public function getThem()
    {
        return view('admin.pages.users.them');
    }
    public function postThem(request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|min:3|max:100',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
            'sdt'=>'required',
            'password1'=>'required|same:password',

            
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên sách',
            'ten.min'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            'ten.max'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            'email.required'=>'Bạn chưa nhập nội dung email',
            'email.email'=> 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập password',
            'sdt.required'=>'Bạn chưa nhập số điện thoại',
            'password.min'=>'Tên loại sách phải có độ dài từ 8 kí tự',
            'password1.required'=>'Bạn chưa nhập lại mật khẩu',
            'password1.same' => 'Mật khẩu nhập lại chưa khớp',


        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sdt = $request->sdt;
        $user->password =bcrypt( $request->password);
        $user->quyen = $request->quyen;

        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            $file->move("admin_asset/img/user/",$anh);
            $user->anh=$anh;
        }
        else
        {
            $user->anh="user.jpg";
        }

        $user->save();

        return redirect('them-user')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin.pages.users.sua',['user'=>$user]);
    }

    public function postSua(request $request,$id)
    {
        $user = User::find($id);
        $this->validate($request,
        [
            'name' => 'required|min:3|max:100',
            //'password'=>'min:8',
            'password1'=>'same:password',

            
        ],
        [
            'ten.required'=>'Bạn chưa nhập tên sách',
            'ten.min'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            'ten.max'=>'Tên loại sách phải có độ dài từ 3 đến 100 kí tự',
            //'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Tên loại sách phải có độ dài từ 8 kí tự',
            //'password1.required'=>'Bạn chưa nhập lại mật khẩu',
            'password1.same' => 'Mật khẩu nhập lại chưa khớp',


        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)&&!empty($request->password1))
        {
            $user->password =bcrypt( $request->password);
        }
        $user->quyen = $request->quyen;

        if($request->hasFile('anh'))
        {
            $file = $request->file('anh');
            $anh = $file->getClientOriginalName();
            $file->move("admin_asset/img/user/",$anh);
            $user->anh=$anh;
        }
        else
        {
            $user->anh=$user->anh;
        }

        $user->update();

        return redirect('sua-user/'.$id)->with('thongbao','Sửa thành công');
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
        return view('user.dangnhap');
    }
    public function postDangNhap(request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:8',
        ],[
            'email.required'=>'Bạn chưa nhập Email',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Tên loại sách phải có độ dài từ 8 kí tự',
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $quyen = Auth::user()->quyen;
            if($quyen == "admin" )
                return redirect('danhsach-sach/1');
            else
                return redirect('trangchu');
        }
        else
        {
           return redirect('admin.pages.dangnhap')->with('thongbao','Đăng nhập không thành công');
        }
    }
    public function getDangKi()
    {
        return view('admin.pages.dangki');
    }
    public function postDangKi(request $request)
    {
        $this->validate($request,[
            'ten'=>'required|min:8|max:32',
            'sdt'=>'required|',
            'email'=>'required|email|unique:users,email',
            'mk1'=>'required|min:8|max:32',
            'mk2'=>'required|same:mk1'
        ],[
            'ten.required'=>'Bạn chưa nhập tên người dùng',
            'ten.min'=>'Tên người dùng phải có ít nhất 8 kí tự',
            'sdt.required'=>"Bạn chưa nhập số điện thoại",
            'email.required'=>"Bạn chưa nhập email",
            'email.email'=>"Bạn chưa nhập đúng định dạng email",
            'email.unique'=>"Email đã đồn tại",
            'mk1.required'=>'Bạn chưa nhập mật khẩu',
            'mk1.min'=>"Mật khẩu phải có ít nhất 8 kí tự ",
            'mk1.max'=>"Mật khẩu tối đa chỉ được 32 kí tự",
            'mk2.required'=>'Bạn chưa nhập mật khẩu xác nhận',
            'mk2.same'=>'Mật khẩu xác nhận không khớp',
        ]);
        $user = new User;
        $user->name = $request->ten;
        $user->sdt = $request->sdt;
        $user->email = $request->email;
        $user->password = bcrypt($request->mk1);
        $user->quyen = 'user';
        $user->save();

        return view('admin.pages.dangki');
    
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('trangchu');
    }
    public function thongtincanhan()
    {
        $user = User::all()->where('id',Auth::user()->id);
        return view('admin.pages.thongtincanhan.thongtin',['user'=>$user]);
    }
    public function doimatkhau(request $request,$id)
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
        $user = User::all()->where('id',Auth::user()->id);

        return view('admin.pages.thongtincanhan.thongtin',['user'=>$user]);
    }
   
}
