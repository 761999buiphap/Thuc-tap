@extends('ADMIN.layout.index')

@section('noidung')
 <!--tiêu đề-->
 <div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10 p-0">
            <h5 style="padding: 5px;"><span style="color: white;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Khách hàng</i></h5>
        </div>
        <div class="col-md-1" >
            <button type="button" class="btn btn-primary float-left mt-2" data-toggle="collapse" data-target="#demo" style="background-color: #EF5350"><li class="fa fa-search"></li> Tìm kiếm</button>
        </div>
        
        <div class="col-md-1">
            <!--them moi khach hang-->
            <a href="/them-khachhang" class="btn" style="background-color: #EF5350;color: white;margin-top:7%;"><li class="fa fa-plus"></li> Thêm mới</a>
            <div id="myModal_them" class="modal" role="dialog">
                <div class="modal-dialog ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fa fa-plus" style="color: rgb(18, 107, 110);"> Thêm khách hàng</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                        <form action="them-khachhang"  method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                            <div class="row">
                            <div class="col-md-5">
                                <label for="" style="color:#EF5350">THÔNG TIN* </label>
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Tên: </label>
                                <input class="form-control" type="text" name="hoten" placeholder="Nhập vào tên">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Giới tính: </label>
                                <input type="radio" name="gioitinh" value="Nam"><label for=""> Nam</label>
                                <input type="radio" name="gioitinh" value="Nữ"><label for=""> Nữ</label>                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Số điện thoại: </label>
                                <input class="form-control" type="text" name="sdt" placeholder="Nhập vào số điện thoại">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Email: </label>
                                <input class="form-control" type="text" name="email" placeholder="Nhập vào email">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Địa chỉ: </label>
                                <input class="form-control" type="text" name="diachi" placeholder="Nhập vào địa chỉ">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Thành phố: </label>
                                <select class="form-control" name="thanhpho" id="">
                                <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                                <option value="An Giang">An Giang</option>
                                <option value="Bắc Giang">Bắc Giang</option>
                                <option value="Bắc Cạn">Bắc Cạn</option>
                                <option value="Bạc Liêu">Bạc Liêu</option>
                                <option value="Bắc Ninh">Bắc Ninh</option>
                                <option value="Bến Tre">Bến Tre</option>
                                <option value="Bình Định">Bình Định</option>
                                <option value="Bình Dương">Bình Dương</option>
                                <option value="Bình Phước">Bình Phước</option>
                                <option value="Bình Thuận">Bình Thuận</option>
                                <option value="Cà Mau">Cà Mau</option>
                                <option value="Cần Thơ">Cần Thơ</option>
                                <option value="Cao Bằng">Cao Bằng</option>
                                <option value="Đắc Lắk">Đắc Lắk</option>
                                <option value="Đắc Nông">Đắc Nông</option>
                                </select>
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="" style="color:#EF5350">TÀI KHOẢN* </label>
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Ảnh: </label>
                                <input type="file" name="anh">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Name: </label>
                                <input class="form-control" type="text" name="ten" placeholder="Nhập vào tên">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Password: </label>
                                <input class="form-control" type="password" name="password" placeholder="Nhập vào mật khẩu">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Xác nhận lại password: </label>
                                <input class="form-control" type="password" name="password_xacnhan" placeholder="Nhập vào mật khẩu">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Trạng thái: </label>
                                <select class="form-control" name="trangthai" id="">
                                    <option value="Đang hoạt động">Đang hoạt động</option>
                                    <option value="Ngừng hoạt động">Ngừng hoạt động</option>
                                </select>
                            </div>
                            </div><br>
                            <input class="form-control" style="width:10%;background-color:rgb(18, 107, 110);color:white;margin-left:15%;" type="submit" value="Xác nhận">
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="demo" class="collapse container-fluid"  style="padding:0 3%;">
        <form action="/timkiem-khachhang" method="post" class="form-group " style="margin-top:1%;">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="row">
            <div class="col-md-4">
                <label for="">Tên khách hàng:</label>
                <input class="form-control float-left" type="text" name="ten"  placeholder="Nhập vào tên khách hàng">
            </div>
            <div class="col-md-4">
                <label for="">Giới tính:</label>
                <select class="form-control" name="gioitinh" id="">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="col-md-1">
                <button class="form-control float-left " style="background-color: #EF5350;margin-top:30%;" type="submit"><img src="https://img.icons8.com/emoji/25/000000/magnifying-glass-tilted-left-emoji.png"/></button>
            </div>
        </div>
        </form>
    </div>
    <div class="container-fluid" style="padding:1% 2%;">
    <table class="table table-hover table-bordered table-striped" >
          <thead>
            <tr>
                <th style="background-color: #EF5350;color: white;width:7%;">Thao tác</th>
                <th style="background-color: #EF5350;color: white;">STT</th>
                <th style="background-color: #EF5350;color: white;"># mã</th>
                <th style="background-color: #EF5350;color: white;">Tên</th>
                <th style="background-color: #EF5350;color: white;">Giới tính</th>
                <th style="background-color: #EF5350;color: white;">Số điện thoại</th>
                <th style="background-color: #EF5350;color: white;">Email</th>
                <th style="background-color: #EF5350;color: white;">Địa chỉ</th>
                <th style="background-color: #EF5350;color: white;">Tên tài khoản</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=1;
            foreach($khachhang as $value){ ?>
            <tr>
            <td>
                    <a href="/sua-khachhang/{{$value->id}}" class="btn btn-warning "style="width:60px;padding:3px;">Edit</a>
                    <div id="myModal<?php echo $value->id; ?>" class="modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fa fa-edit" style="color:rgb(18, 107, 110);"> Sửa khách hàng</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                <div class="container">
                                @if(isset($kh_sua))
                                @foreach($kh_sua as $vl)
                                <form action="sua-khachhang/{{$value->id}}"  method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                                <input type="hidden" name="taikhoan" value="{{$vl->taikhoan}}" />
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Tên: </label>
                                        <input class="form-control" type="text" name="hoten" value="{{$vl->ten}}" placeholder="Nhập vào tên">
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Giới tính: </label>
                                        <input type="radio" name="gioitinh" value="Nam" @if($vl->gioitinh == "Nam") {{"checked"}}@endif><label for=""> Nam</label>
                                        <input type="radio" name="gioitinh" value="Nữ" @if($vl->gioitinh == "Nữ") {{"checked"}}@endif><label for=""> Nữ</label>                            </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Số điện thoại: </label>
                                        <input class="form-control" type="text" name="sdt" value="{{$vl->sdt}}" placeholder="Nhập vào số điện thoại">
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Email: </label>
                                        <input class="form-control" type="text" name="email" value="{{$vl->email}}" placeholder="Nhập vào email" readonly="" style="cursor:no-drop;">
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Địa chỉ: </label>
                                        <input class="form-control" type="text" name="diachi" value="{{$vl->diachi}}" placeholder="Nhập vào địa chỉ">
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Thành phố: </label>
                                        <select class="form-control" name="thanhpho" id="">
                                            <option value="Hà Nội">Hà Nội</option>
                                            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                        </select>
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Tài khoản: </label>
                                        <input class="form-control" type="text" name="" value="{{$arr_user[$vl->taikhoan]}}" placeholder="Nhập vào tài khoản" readonly="" style="cursor:no-drop;">
                                    </div>
                                    </div><br>
                                    <input class="form-control" style="width:10%;background-color:rgb(18, 107, 110);color:white;margin-left:15%;" type="submit" value="Xác nhận">
                                </form>
                                @endforeach
                                @endif
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                </td>     
                <td>{{$i}}</td>
                <td >{{$value->id}}</td>
                <td>{{$value->ten}}</td>
                <td>{{$value->gioitinh}}</td>
                <td>{{$value->sdt}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->diachi}}</td>
                <td>{{$arr_user[$value->taikhoan]}}</td>       
            </tr>
            <?php $i++; } ?>
          </tbody>
        </table>

    </div>
    <!--Báo lỗi-->
    @if(count($errors) > 0)
    <?php foreach($errors->all() as $err){ ?>
    <div class="alert alert-danger alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:2%;width:25%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{$err}}
    </div>
    <?php } ?>
    @endif
    @if(isset($kh_sua))
    <script>
    $('#myModal<?php echo $md; ?>').modal('show');
    </script>
    @endif
    @if(isset($kh_them))
    <script>$('#myModal_them').modal('show');</script>
    @endif
@endsection