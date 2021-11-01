@extends('USER.layout.index')

@section('noidung')
<base href="{{asset('')}}">
<style>
   
    .email
    {
        background-image: url(https://img.icons8.com/ios-filled/30/000000/email-open.png);
    }
    .ten
    {
        background-image: url(https://img.icons8.com/ios-filled/30/000000/email-open.png);
    }
    .matkhau1
    {
        background-image: url(https://img.icons8.com/ios-filled/30/000000/forgot-password.png);
    }
    .tendangki{
        background-image: url(https://img.icons8.com/fluent-systems-filled/30/000000/change-user-male.png);
    }
    .sdt{
        background-image: url(https://img.icons8.com/fluent-systems-filled/30/000000/phone-not-being-used.png);
    }
    .matkhau2{
        background-image: url(https://img.icons8.com/ios-glyphs/30/000000/climate-change.png);
    }
    .div-body input[type=text],.div-body input[type=password]{
        background-color: transparent; /* make the button transparent */
        background-repeat: no-repeat;  /* make the background image appear only once */
        background-position: 20px 5px;  /* equivalent to 'top left' */
        cursor: pointer;        /* make the cursor like hovering over an <a> element */
        height: 50px;           /* make this the size of your image */
        padding-left: 20px;     /* make text start to the right of the image */
        vertical-align: middle; /* align the text vertically centered */
        width: 100%;
        padding:0px 60px;
        font-size: larger;
        border:1px solid #bbb;
        outline:none;
        margin-bottom:5%;
    }
    .div-body input[type=text]:focus{
        box-shadow: 0 0px 5px 0 rgb(24, 162, 180);
        background-color:white;

    }
    .div-body input[type=submit]{
        width: 100%;
        color:grey;
        padding:0px 60px;
        font-size: larger;
        height: 50px;    
        margin-top:5%;       /* make this the size of your image */
        border:1px solid #bbb;
    }
    .div-body input[type=submit]:hover{
        background-color: rgb(18, 107, 110);
        color: white;
    }
    .matkhau
    {
        background-image: url(https://img.icons8.com/ios-filled/30/000000/forgot-password.png);
    }
    
</style>
<div class="container-fluid" style="height:85px;padding-left: 7%;">
        <h3 style="font-weight: bold;color: black;">Đăng nhập</h3>
        <p><a style="text-decoration:none;color: rgb(18, 107, 110);" href="">Trang chủ</a>  <span style="color: #ccc;"> / </span>  <span style="font-weight: bold;color:rgb(18, 107, 110);">Đăng nhập</span></p>
</div>
<div class="container-fluid" style="background-color:#f4f4f4;padding:1% 6%;">
<div class="row">
    <div class="col div-body">
    <ul class="list-group">
    <li class="list-group-item active" style="background:linear-gradient( #b96462,#EF5350 100%);">
        <h4 style="text-align: center;">ĐĂNG NHẬP</h4>
    </li>
    <li class="list-group-item">
        <form action="dangnhap" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <h4 style="color:black;">Email:</h4>
            <input class="ten form-control" type="text" name="email" placeholder="Email của bạn">
            <h4 style="color:black;">Mật khẩu:</h4>
            <input class="matkhau form-control" type="password" name="password" placeholder="Nhập mật khẩu">
            <input class="form-control" type="submit" value="Đăng nhập" >
        </form>
    </li>
    </ul>
    </div>
    <div class="col" >
        <ul class="list-group">
        <li class="list-group-item active" style="background:linear-gradient( #b96462,#EF5350 100%);">
            <h4 style="text-align: center;">ĐĂNG KÍ THÀNH VIÊN MỚI</h4>
        </li>
        <li class="list-group-item">
                        <form action="dangki"  method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="row">
                            <div class="col">
                                <label for="" style="color:#EF5350">THÔNG TIN* </label><br>
                                <label for="">Họ tên: </label>
                                <input class="form-control" type="text" name="hoten" placeholder="Nhập vào tên">
                                <div class="row">
                                <div class="col-md-9">
                                    <label for="">Số điện thoại: </label>
                                    <input class="form-control" type="text" name="sdt" placeholder="Nhập vào số điện thoại">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Giới tính: </label><br>
                                    <input  type="radio" name="gioitinh" value="Nam">  <label for=""> Nam</label>
                                    <input type="radio" name="gioitinh" value="Nữ">  <label for=""> Nữ</label>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col">
                                    <label for="">Email: </label>
                                    <input class="form-control" type="text" name="email" placeholder="Nhập vào email">
                                </div>
                                <div class="col">
                                    <label for="">Thành phố: </label>
                                    <select class="form-control" name="thanhpho" id="">
                                        <option value="Hà Nội">Hà Nội</option>
                                        <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                    </select>
                                </div>
                                </div>
                                <label for="">Địa chỉ: </label>
                                <input class="form-control" type="text" name="diachi" placeholder="Nhập vào địa chỉ">
                            
                                </li>
                                <li class="list-group-item">
                                <label for="" style="color:#EF5350">TÀI KHOẢN* </label><br>
                                <label for="">Ảnh: </label>
                                <input type="file" name="anh">
                                <label for="">Name: </label>
                                <input class="form-control" type="text" name="ten" placeholder="Nhập vào tên tài khoản">
                                <label for="">Password: </label>
                                <input class="form-control" type="password" name="password" placeholder="Nhập vào mật khẩu">
                                <label for="">Xác nhận lại password: </label>
                                <input class="form-control" type="password" name="password_xacnhan" placeholder="Xác nhận lại mật khẩu">
                                <input class="form-control" style="width:20%;background-color:rgb(18, 107, 110);color:white;margin:5% 40%;" type="submit" value="Xác nhận">
                        </form>
                        </li>
    </div>
</div>
</div>
<!--Báo lỗi-->
    @if(count($errors) > 0)
    <?php foreach($errors->all() as $err){ ?>
    <div class="alert alert-danger alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:1%;width:25%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{$err}}
    </div>
    <?php } ?>
    @endif
    @if(session('thongbao'))
    <div class="alert alert-success alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:1%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{session('thongbao')}}
  </div>
    @endif
    @if(session('thongbaodangnhap'))
    <div class="alert alert-danger alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:1%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{session('thongbaodangnhap')}}
  </div>
    @endif
@endsection