@extends('ADMIN.layout.index')

@section('noidung')
 <!--tiêu đề-->
 <div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10 p-0">
            <h5 style="padding: 5px;"><span style="color: white;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Liên hệ</i></h5>
        </div>
        <div class="col-md-1" >
            <button type="button" class="btn btn-primary float-left mt-2" data-toggle="collapse" data-target="#demo" style="background-color: #EF5350"><li class="fa fa-search"></li> Tìm kiếm</button>
        </div>
        <div class="col-md-1">
            <!--them moi khach hang-->
            <a href="/them-lienhe" class="btn" style="background-color: #EF5350;color: white;margin-top:7%;"><li class="fa fa-plus"></li> Thêm mới</a>
            <div id="myModal_them" class="modal" role="dialog">
                <div class="modal-dialog ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fa fa-plus" style="color: rgb(18, 107, 110);"> Thêm khách hàng</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                        <form action="them-lienhe"  method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Tên: </label>
                                <input class="form-control" type="text" name="hoten" placeholder="Nhập vào tên">
                            </div>
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
                                <label for="">Nội dung liên hệ: </label>
                                <textarea class="form-control" name="noidung" id="" cols="30" rows="6" placeholder="Nhập vào nội dung"></textarea>
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
        <form action="/timkiem-lienhe" method="post" class="form-group " style="margin-top:1%;">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="row">
            <div class="col-md-3">
                <label for="">Tên liên hệ:</label>
                <input class="form-control float-left" type="text" name="ten"  placeholder="Nhập vào tên liên hệ">
            </div>
            <div class="col-md-3">
                <label for="">Từ ngày: </label><br>
                <input class="form-control" type="date" name="tungay" >
            </div>
            <div class="col-md-3">
                <label for="">Đến ngày: </label><br>
                <input class="form-control" type="date" name="denngay" >
            </div>
            <div class="col">
                <button class="form-control float-left" style="background-color: #EF5350;width: 50%;margin-top:8%;" type="submit"><img src="https://img.icons8.com/emoji/25/000000/magnifying-glass-tilted-left-emoji.png"/></button>
            </div>
        </div>
        </form>
    </div>
    <div class="container-fluid" style="padding:1% 2%;">
    <table class="table table-hover table-bordered table-striped" >
          <thead>
            <tr>
                <th style="background-color: #EF5350;color: white;width:11%;">Thao tác</th>
                <th style="background-color: #EF5350;color: white;">STT</th>
                <th style="background-color: #EF5350;color: white;">Ngày</th>
                <th style="background-color: #EF5350;color: white;">Tên</th>
                <th style="background-color: #EF5350;color: white;">Số điện thoại</th>
                <th style="background-color: #EF5350;color: white;">Email</th>
                <th style="background-color: #EF5350;color: white;">Nội dung liên hệ</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=1;
            foreach($lienhe as $value){ ?>
            <tr>
                <td>
                    <a href="/sua-lienhe/{{$value->id}}" class="btn btn-warning "style="width:60px;padding:3px;">Edit</a>
                    <div id="myModal<?php echo $value->id; ?>" class="modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fa fa-edit" style="color:rgb(18, 107, 110);"> Sửa khách hàng</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                <div class="container">
                                @if(isset($lh_sua))
                                @foreach($lh_sua as $vl)
                                <form action="sua-lienhe/{{$value->id}}"  method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Tên: </label>
                                        <input class="form-control" type="text" name="hoten" value="{{$vl->hoten}}" placeholder="Nhập vào tên" >
                                    </div>
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
                                        <input class="form-control" type="text" name="email" value="{{$vl->email}}" placeholder="Nhập vào email">
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Nội dung liên hệ: </label>
                                        <textarea class="form-control" name="noidung" id="" cols="30" rows="6" placeholder="Nhập vào nội dung">{{$vl->noidung}}</textarea>
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
                        <button type="button"class="btn btn-danger" style="width:60px;padding:3px;"data-toggle="modal" data-target="#myModal_xoa<?php echo $i; ?>">Delete</button>
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
                <td>{{$i}}</td>
                <td> {{date("d-m-Y", strtotime($value->ngay))}}</td>
                <td>{{$value->hoten}}</td>
                <td>{{$value->sdt}}</td>
                <td>{{$value->email}}</td>
                <td><textarea class="form-control" name="" id="" cols="20" rows="1">{{$value->noidung}}</textarea></td>         
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
    @if(isset($lh_sua))
    <script>
    $('#myModal<?php echo $md; ?>').modal('show');
    </script>
    @endif
    @if(isset($lh_them))
    <script>$('#myModal_them').modal('show');</script>
    @endif
@endsection