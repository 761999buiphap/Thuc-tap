@extends('ADMIN.layout.index')

@section('noidung')
 <!--tiêu đề-->
 <div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10 p-0">
            <h5 style="padding: 5px;"><span style="color: white;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Slide</i></h5>
        </div>
        <div class="col-md-1" >
            <button type="button" class="btn btn-primary float-left mt-2" data-toggle="collapse" data-target="#demo" style="background-color: #EF5350"><li class="fa fa-search"></li> Tìm kiếm</button>
        </div>
        <div class="col-md-1">
            <!--them moi slide-->
            <a href="/them-nhanvien" class="btn" style="background-color: #EF5350;color: white;margin-top:7%;"> <li class='fa fa-plus'></li> Thêm mới</a>
            <div id="myModal_them" class="modal" role="dialog">
                <div class="modal-dialog ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fa fa-plus" style="color: rgb(18, 107, 110);"> Thêm nhân viên</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                        <form action="them-nhanvien"  method="post" enctype="multipart/form-data">
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
                                <input class="form-control" type="text" name="sdt" placeholder="Nhập vào tên">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Email: </label>
                                <input class="form-control" type="text" name="email" placeholder="Nhập vào tên">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Địa chỉ: </label>
                                <input class="form-control" type="text" name="diachi" placeholder="Nhập vào tên">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="" style="color:#EF5350">TÀI KHOẢN* </label>
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Quyền: </label>
                                <input type="radio" name="quyen" value="0"><label for=""> Admin</label>
                                <input type="radio" name="quyen" value="1"><label for=""> User</label>
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
        <form action="/timkiem-nhanvien" method="post" class="form-group " style="margin-top:1%;">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="row">
            <div class="col-md-3">
                <label for="">Tên nhân viên:</label>
                <input class="form-control float-left" type="text" name="ten" placeholder="Nhập vào tên nhân viên">
            </div>
            <div class="col-md-3">
                <label for="">Giới tính:</label>
                <select class="form-control" name="gioitinh" id="">
                    <option value=" ">---</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="">Trạng thái hoạt động:</label>
                <select class="form-control" name="trangthai" id="">
                    <option value=" ">---</option>
                    <option value="Đang hoạt động">Đang hoạt động</option>
                    <option value="Ngừng hoạt động">Ngừng hoạt động</option>
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
                <th style="background-color: #EF5350;color: white;">STT</th>
                <th style="background-color: #EF5350;color: white;"># mã</th>
                <th style="background-color: #EF5350;color: white;">Tên</th>
                <th style="background-color: #EF5350;color: white;">Giới tính</th>
                <th style="background-color: #EF5350;color: white;">Số điện thoại</th>
                <th style="background-color: #EF5350;color: white;">Email</th>
                <th style="background-color: #EF5350;color: white;">Địa chỉ</th>
                <th style="background-color: #EF5350;color: white;">Tên tài khoản</th>
                <th style="background-color: #EF5350;color: white;">Trạng thái</th>
                <th style="background-color: #EF5350;color: white;">Người quản lí</th>
                <th style="background-color: #EF5350;color: white;">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=1;
            foreach($nhanvien as $value){ ?>
            <tr>
                <td>{{$i}}</td>
                <td >{{$value->id}}</td>
                <td>{{$value->ten}}</td>
                <td>{{$value->gioitinh}}</td>
                <td>{{$value->sdt}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->diachi}}</td>
                <td>{{$arr_user[$value->taikhoan]}}</td>
                <td>{{$value->trangthai}}</td>
                <td>{{$arr_user[$value->id_users]}}</td>
                <td>
                    <a href="/sua-nhanvien/{{$value->id}}" class="fa fa-edit"></a>
                    <div id="myModal<?php echo $value->id; ?>" class="modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fa fa-edit" style="color:rgb(18, 107, 110);"> Sửa nhân viên</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                <div class="container">
                                @if(isset($nv_sua))
                                @foreach($nv_sua as $vl)
                                <form action="sua-nhanvien/{{$value->id}}"  method="post" enctype="multipart/form-data">
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
                                        <label for="">Tài khoản: </label>
                                        <input class="form-control" type="text" name="" value="{{$arr_user[$vl->taikhoan]}}" placeholder="Nhập vào tài khoản" readonly="" style="cursor:no-drop;">
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Trạng thái: </label>
                                        <select class="form-control" name="trangthai" id="">
                                        <option
                                                @if($vl->trangthai=='Đang hoạt động')
                                                {{"selected"}}
                                                @endif
                                                value="Đang hoạt động">Đang hoạt động</option>
                                                <option
                                                @if($vl->trangthai=='Ngừng hoạt động')
                                                {{"selected"}}
                                                @endif
                                                value="Ngừng hoạt động" >Ngừng hoạt động</option>
                                        </select>
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
                        <button type="button" class="btn fa fa-trash" data-toggle="modal" data-target="#myModal_xoa<?php echo $i; ?>"></button>
                        <div id="myModal_xoa<?php echo $i; ?>" class="modal " role="dialog" >
                            <div class="modal-dialog" style="margin-top:15%;">
                                <div class="modal-content" style="text-align:center;">
                                <div class="modal-body">
                                    <img src="https://img.icons8.com/fluency/40/ffffff/instagram-check-mark.png"/>
                                    <h4>Bạn có chắc chắn muốn xóa!</h4>
                                    <button type="button" class="btn btn-info" data-dismiss="modal" style="font-weight: bold;">Thoát</button>
                                    <a href="/xoa-slide/{{$value->id}}" type="button" class="btn btn-danger" href="">Xác nhận</a>
                                </div>
                                </div>
                            </div>
                        </div>
                </td>            
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
    @if(isset($nv_sua))
    <script>
    $('#myModal<?php echo $md; ?>').modal('show');
    </script>
    @endif
    @if(isset($nv_them))
    <script>$('#myModal_them').modal('show');</script>
    @endif
@endsection