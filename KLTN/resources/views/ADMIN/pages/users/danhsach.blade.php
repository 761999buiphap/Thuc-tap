@extends('ADMIN.layout.index')

@section('noidung')
    <!--tiêu đề-->
    <div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10 p-0">
            <h5 style="padding: 5px;"><span style="color: white;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Tài khoản » <?php if($id == 1){ echo 'User';}else{echo 'Admin';}  ?></i></h5>
        </div>
        <div class="col-md-1" >
            <button type="button" class="btn btn-primary float-left mt-2" data-toggle="collapse" data-target="#demo" style="background-color: #EF5350"><li class="fa fa-search"></li> Tìm kiếm</button>
        </div>
        <div class="col-md-1">
             <!--them moi user-->
             <a href="/them-user/{{$id}}"class="btn" style="background-color: #EF5350;color: white;margin-top:7%;"><li class="fa fa-plus"></li> Thêm mới</a>
            <div id="myModal_them" class="modal" role="dialog">
                <div class="modal-dialog ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fa fa-plus" style="color: rgb(18, 107, 110);"> Thêm <?php if($id == 1){ echo 'User';}else{echo 'Admin';}  ?> </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                        @if(isset($u_them))
                        <form action="/them-user/{{$id}}"  method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
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
                                <label for="">Email: </label>
                                <input class="form-control" type="text" name="email" placeholder="Nhập vào email">
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
                        @endif
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="demo" class="collapse container-fluid"  style="padding:0 3%;">
        <form action="/timkiem-user" method="post" class="form-group " style="margin-top:1%;">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input type="hidden" name="quyen" value="{{$id}}" />
        <div class="row">
            <div class="col-md-4">
                <label for="">Tên tài khoản:</label>
                <input class="form-control float-left" type="text" name="ten" placeholder="Nhập vào tên tài khoản">
            </div>
            <div class="col-md-4">
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
    <div class="container-fluid">
        <div class="col-md-3" style="padding: 1% 0;">
            <div class="container-fluid ">
                <div id="danhsach_tintuc" >
                    <a href=""  style="font-weight: bold;background:linear-gradient( #EF5350 ,#b96462 100%);color: white;text-align: center;"><li class=" fa fa-bars"></li> DANH MỤC TÀI KHOẢN</a>
                    <a href="/danhsach-user/0"> Admin <span style="float:right;">»</span></a>
                    <a href="/danhsach-user/1"> User<span style="float:right;">»</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-9" style="padding: 1% 0;">
        <table class="table table-hover table-bordered table-striped" >
                <thead>
                  <tr>
                    <th style="background-color: #EF5350;color: white;width:8%;">Thao tác</th>
                    <th style="background-color: #EF5350;color: white;">STT</th>
                     <th style="background-color: #EF5350;color: white;"># Mã</th>
                     <th style="background-color: #EF5350;color: white;">Ảnh</th>
                      <th style="background-color: #EF5350;color: white;">Name</th>
                      <th style="background-color: #EF5350;color: white;">Email</th>
                      <th style="background-color: #EF5350;color: white;">Quyền</th>
                      <th style="background-color: #EF5350;color: white;">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;
                    foreach($user as $value){ ?>
                  <tr>
                    <td>
                        <a href="/sua-user/{{$value->id}}/{{$id}}" class="btn btn-warning "style="width:60px;padding:3px;">Edit</a>
                        <div id="myModal<?php echo $value->id; ?>" class="modal"  role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fa fa-edit" style="color: rgb(18, 107, 110);"> Sửa <?php if($id == 1){ echo 'User';}else{echo 'Admin';}  ?></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                <div class="container">
                                    @if(isset($u_sua))      
                                    @foreach($u_sua as $vl)
                                    <form action="/sua-user/{{$id}}"  method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <input type="hidden" name="id_user" value="{{$vl->id}}" />
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Ảnh: </label>
                                            <input type="file" name="anh">
                                            <img src="../admin/img/{{$vl->anh}}" alt="" style="width:30%;">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Name: </label>
                                            <input class="form-control" type="text" name="ten" value="{{$vl->name}}" placeholder="Nhập vào tên">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Email: </label>
                                            <input class="form-control" type="text" name="email" value="{{$vl->email}}"  placeholder="Nhập vào email" readonly="" style="cursor: no-drop;">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Password: </label>
                                            <input class="form-control" type="password" name="password"  value="" placeholder="Nhập vào mật khẩu">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Xác nhận lại password: </label>
                                            <input class="form-control" type="password" name="password_xacnhan"  value="" placeholder="Nhập vào mật khẩu">
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
                                    @if(isset($sua_tk))      
                                    @foreach($sua_tk as $vl)
                                    <form action="/sua-user/{{$id}}"  method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <input type="hidden" name="id_user" value="{{$vl->id}}" />
                                    <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Ảnh: </label>
                                            <input type="file" name="anh">
                                            <img src="../admin/img/{{$vl->anh}}" alt="" style="width:30%;">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Name: </label>
                                            <input class="form-control" type="text" name="ten" value="{{$vl->name}}" placeholder="Nhập vào tên">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Email: </label>
                                            <input class="form-control" type="text" name="email" value="{{$vl->email}}"  placeholder="Nhập vào email" readonly="" style="cursor: no-drop;">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Password: </label>
                                            <input class="form-control" type="password" name="password"  value="" placeholder="Nhập vào mật khẩu">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Xác nhận lại password: </label>
                                            <input class="form-control" type="password" name="password_xacnhan"  value="" placeholder="Nhập vào mật khẩu">
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
                        <div id="myModal_xoa" class="modal " role="dialog" >
                            <div class="modal-dialog" style="margin-top:15%;">
                                <div class="modal-content" style="text-align:center;">
                                <div class="modal-body">
                                    <img src="https://img.icons8.com/fluency/40/ffffff/instagram-check-mark.png"/>
                                    <h4>Bạn có chắc chắn muốn xóa!</h4>
                                    <button type="button" class="btn btn-info" data-dismiss="modal" style="font-weight: bold;">Thoát</button>
                                    <a type="button" class="btn btn-danger" href="">Xác nhận</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{$i}}</td>
                    <td>{{$value->id}}</td>
                    <td>
                        <img src="../admin/img/{{$value->anh}}" alt="" style="width:10%;">
                    </td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>
                        <?php 
                            if($value->quyen == 0){echo 'Admin';}
                            elseif($value->quyen == 1){echo 'User';} ?>
                    </td>
                    <td >
                        @if($value->trangthai == "Đang hoạt động")
                        <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" style="border:none;"><span style="color:green">{{$value->trangthai}}</span></button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/ngunghoatdong-users/{{$value->id}}/{{$id}}"><li class="fa fa-random"></li> Ngừng hoạt động</a>
                        </div>
                        @endif  
                        @if($value->trangthai == "Ngừng hoạt động")
                        <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" style="border:none;"><span style="color:red;">{{$value->trangthai}}</span></button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/danghoatdong-users/{{$value->id}}/{{$id}}"><li class="fa fa-retweet"></li> Đang hoạt động</a>
                        </div>
                        @endif                
                    </td>
                  </tr>
                  <?php $i++; } ?>
                </tbody>
              </table>
              <div class="row">
                <ul class="pagination" style="margin-left:72%;">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                  </ul>
            </div>
        </div>
      </div>
      @if(count($errors) > 0)
    <?php foreach($errors->all() as $err){ ?>
    <div class="alert alert-danger alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:2%;width:25%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{$err}}
    </div>
    <?php } ?>
    @endif
    @if(isset($u_sua))
    <script>
    $('#myModal<?php echo $md; ?>').modal('show');
    </script>
    @endif
    @if(isset($u_them))
    <script>$('#myModal_them').modal('show');</script>
    @endif
@endsection