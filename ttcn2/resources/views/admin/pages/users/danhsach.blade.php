@extends('admin.layout.index')

@section('noidung')

<!--
    <div class="body-chinh">
        <div class="body-sanpham">
            <a href="" id="themloaisach">+ Thêm tài khoản</a>
            <table>
                <tr><th>STT</th><th>Tên</th><th>Email</th><th>Password</th><th>Password nhập lại</th><th>Xóa</th><th>Sửa</th></tr>
                <tr><td>1</td><td>Bui phap</td><td>buithiphap761999@gmail.com</td><td>761999</td><td>761999</td><td><a href="">Delete</a></td><td><a href="">Edit</a></td></tr>
                <tr><td>1</td><td>Bui phap</td><td>buithiphap761999@gmail.com</td><td>761999</td><td>761999</td><td><a href="">Delete</a></td><td><a href="">Edit</a></td></tr>
                <tr><td>1</td><td>Bui phap</td><td>buithiphap761999@gmail.com</td><td>761999</td><td>761999</td><td><a href="">Delete</a></td><td><a href="">Edit</a></td></tr>
                <tr><td>1</td><td>Bui phap</td><td>buithiphap761999@gmail.com</td><td>761999</td><td>761999</td><td><a href="">Delete</a></td><td><a href="">Edit</a></td></tr>
                <tr><td>1</td><td>Bui phap</td><td>buithiphap761999@gmail.com</td><td>761999</td><td>761999</td><td><a href="">Delete</a></td><td><a href="">Edit</a></td></tr>
            </table>
        </div>
	</div>-->
    <div class="div2" >
        <form class="div2form" method="POST" style="top:16%;">
            
            <input style="width:170px;" type="text" name="mabn" placeholder="Nhập thông tin cần tìm">
            <button style="background-color: #E67E22;border:none;border-radius:3px;color:white;padding:6px;margin-top:3px;" type="submit" ><img src="https://img.icons8.com/pastel-glyph/15/ffffff/search--v1.png"/> Lọc tìm</button>

        </form>
        <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Tin tức</span> </p>
        <a href="them-user" id="themloaisach" style="position: absolute;left:20%;top:0%;">+ Thêm mới</a>
        
        </div>
    <div class="sach-body">
        <div class="sach-body-danhmuc" style="background-color:white;">
            <p class="p">DANH MỤC TÀI KHOẢN</p>
            <p class="p1"><a style="text-decoration:none;color:black;" href="danhsach-user/admin" >Admin</a></p>
            <p class="p1"><a style="text-decoration:none;color:black;" href="danhsach-user/user" >User</a></p>
		</div>
        <div class="sach-body-sanpham">
            @if(session('thongbao'))
            <div style="height:8px;margin-top:0px;margin-bottom:0px;" class="noterr">
                {{session('thongbao')}}
            </div>
             @endif
            <table style="position:absolute;top:25%;">
                <tr><th>ID</th><th>Ảnh</th><th style="width:120px;">Tên</th><th>Email</th><th>Password</th><th>Quyền đăng nhập</th><th>Ngày tạo</th><th>Ngày sửa</th><th style="width:50px;">Xóa</th><th>Sửa</th></tr>
                @foreach($user as $us)
                    <tr><td>{{$us->id}}</td><td><img style="width: 70px;" src="admin_asset/img/user/{{$us->anh}}" alt=""></td><td>{{$us->name}}</td><td>{{$us->email}}</td><td><textarea name="" id="" cols="10" rows="3"> {{$us->password}}</textarea></td><td>{{$us->quyen}}</td><td>{{$us->created_at}}</td><td>{{$us->updated_at}}</td><td><a  href="xoa-user/{{$us->id}}"><img src="https://img.icons8.com/fluent/22/000000/delete-forever.png"/></a></td><td><a  href="sua-user/{{$us->id}}"><img src="https://img.icons8.com/color/22/000000/edit--v3.png"/></a></td></tr>
                @endforeach
            </table>
        </div>
        <div style="position:absolute;top:1000px;left:80%;" class="pagination">
        {!! $user->links() !!}
        </div>
	</div>

@endsection

