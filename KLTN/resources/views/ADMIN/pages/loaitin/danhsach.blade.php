@extends('ADMIN.layout.index')

@section('noidung')
 <!--tiêu đề-->
 <div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10 p-0">
            <h5 style="padding: 5px;"><span style="color: white;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Loại tin</i></h5>
        </div>
        <div class="col-md-1" >
            <button type="button" class="btn btn-primary float-left mt-2" data-toggle="collapse" data-target="#demo" style="background-color: #EF5350"><li class="fa fa-search"></li> Tìm kiếm</button>
        </div>
        <div class="col-md-1">
            <!--them moi tin tuc-->
            <a href="/them-loaitin" class="btn " style="background-color: #EF5350;color: white;margin-top:7%;"><li class="fa fa-plus"></li> Thêm mới</a>
            <div id="myModal_them" class="modal" role="dialog">
                <div class="modal-dialog ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fa fa-plus" style="color: rgb(18, 107, 110);"> Thêm loại tin</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                        <form action="them-loaitin"  method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Tên: </label>
                                <input class="form-control" type="text" name="ten" placeholder="Nhập vào tên loại tin">
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
        <form action="/timkiem-loaitin" method="post" class="form-group " style="margin-top:1%;">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="row">
            <div class="col-md-4">
                <label for="">Tên loại tin:</label>
                <input class="form-control float-left" type="text" name="ten"  placeholder="Nhập vào tên loại tin">
            </div>
            <div class="col-md-4">
                <label for="">Trạng thái:</label>
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
    <div class="container-fluid" style="padding:1%;">
    <table class="table table-hover table-bordered table-striped" >
          <thead>
            <tr>
                <th style="background-color: #EF5350;color: white;width:6%;">Thao tác</th>
                <th style="background-color: #EF5350;color: white;">STT</th>
                <th style="background-color: #EF5350;color: white;"># mã</th>
                <th style="background-color: #EF5350;color: white;">Tên loại tin</th>
                <th style="background-color: #EF5350;color: white;">Trạng thái</th>
                <th style="background-color: #EF5350;color: white;">Người quản lí</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=1;
            foreach($loaitin as $value){ ?>
            <tr>
            <td>
                    <a href="/sua-loaitin/{{$value->id}}" class="btn btn-warning "style="padding:1% 10%;">Edit</a>
                    <div id="myModal<?php echo $value->id; ?>" class="modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fa fa-edit" style="color: rgb(18, 107, 110);"> Sửa loại tin</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                <div class="container">
                                    <form action="/sua-loaitin/{{$value->id}}"  method="post" >
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Tên: </label>
                                            <input class="form-control" type="text" name="ten" @if(isset($lt_sua)){ value="@foreach($lt_sua as $vl){{{$vl->tenloaitin}}}@endforeach" @endif placeholder="Nhập vào tên loại tin">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Trạng thái: </label>
                                            <select class="form-control" name="trangthai" id="">
                                                <option value="Đang hoạt động ">Đang hoạt động</option>
                                                <option value="Ngừng hoạt động" >Ngừng hoạt động</option>
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
                        <div id="myModal_xoa<?php echo $i; ?>" class="modal " role="dialog" >
                            <div class="modal-dialog" style="margin-top:15%;">
                                <div class="modal-content" style="text-align:center;">
                                <div class="modal-body">
                                    <img src="https://img.icons8.com/fluency/40/ffffff/instagram-check-mark.png"/>
                                    <h4>Bạn có chắc chắn muốn xóa!</h4>
                                    <button type="button" class="btn btn-info" data-dismiss="modal" style="font-weight: bold;">Thoát</button>
                                    <a href="/xoa-giongcay/{{$value->id}}" type="button" class="btn btn-danger" href="">Xác nhận</a>
                                </div>
                                </div>
                            </div>
                        </div>
                </td>   
                <td>{{$i}}</td>
                <td >{{$value->id}}</td>
                <td>{{$value->tenloaitin}}</td>
                <td >
                        @if($value->trangthai == "Đang hoạt động")
                        <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" style="border:none;"><span style="color:green">{{$value->trangthai}}</span></button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/ngunghoatdong/{{$value->id}}"><li class="fa fa-random"></li> Ngừng hoạt động</a>
                        </div>
                        @endif  
                        @if($value->trangthai == "Ngừng hoạt động")
                        <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" style="border:none;"><span style="color:red;">{{$value->trangthai}}</span></button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/danghoatdong/{{$value->id}}"><li class="fa fa-retweet"></li> Đang hoạt động</a>
                        </div>
                        @endif                
                </td>
                <td>{{$arr_user[$value->id_users]}}</td>         
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
    @if(isset($lt_sua))
    <script>
    $('#myModal<?php echo $md; ?>').modal('show');
    </script>
    @endif
    @if(isset($lt_them))
    <script>$('#myModal_them').modal('show');</script>
    @endif
@endsection