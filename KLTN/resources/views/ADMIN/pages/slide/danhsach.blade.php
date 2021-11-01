@extends('ADMIN.layout.index')

@section('noidung')
 <!--tiêu đề-->
 <div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10 p-0" >
            <h5 style="padding: 5px;"><span style="color: white;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Slide</i></h5>
        </div>
        <div class="col-md-1" >
            <button type="button" class="btn btn-primary float-left mt-2" data-toggle="collapse" data-target="#demo" style="background-color: #EF5350"><li class="fa fa-search"></li> Tìm kiếm</button>
        </div>
        <div class="col-md-1">
            <!--them moi slide-->
            <a href="/them-slide" class="btn " style="background-color: #EF5350;color: white;margin-top:7%;"><li class="fa fa-plus"></li> Thêm mới</a>
            <div id="myModal_them" class="modal" role="dialog">
                <div class="modal-dialog ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fa fa-plus" style="color: rgb(18, 107, 110);"> Thêm slide</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                        <form action="them-slide"  method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Ảnh: </label>
                                <input  type="file" name="anh">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Tiêu đề: </label>
                                <input class="form-control" type="text" name="tieude" placeholder="Nhập vào tên">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Nội dung: </label>
                                <input class="form-control" type="text" name="noidung" placeholder="Nhập vào tên">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Link: </label>
                                <input class="form-control" type="text" name="link" placeholder="Nhập vào tên">
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
        <form action="/timkiem-giongcay" method="post" class="form-group " style="margin-top:1%;">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="row">
            <div class="col-md-4">
                <label for="">Tên giống cây:</label>
                <input class="form-control float-left" type="text" name="ten" placeholder="Nhập vào tên giống cây">
            </div>
            <div class="col-md-1">
                <button class="form-control float-left " style="background-color: #EF5350;margin-top:30%;" type="submit"><img src="https://img.icons8.com/emoji/25/000000/magnifying-glass-tilted-left-emoji.png"/></button>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="padding:1% 2%;">
    <table class="table table-hover table-bordered table-striped" >
          <thead>
            <tr>
                <th style="background-color: #EF5350;color: white;">STT</th>
                <th style="background-color: #EF5350;color: white;"># mã</th>
                <th style="background-color: #EF5350;color: white;">Ảnh</th>
                <th style="background-color: #EF5350;color: white;">Tiêu đề</th>
                <th style="background-color: #EF5350;color: white;">Nội dung</th>
                <th style="background-color: #EF5350;color: white;">Link</th>
                <th style="background-color: #EF5350;color: white;">Người quản lí</th>
                <th style="background-color: #EF5350;color: white;">Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=1;
            foreach($slide as $value){ ?>
            <tr>
                <td>{{$i}}</td>
                <td >{{$value->id}}</td>
                <td><img src="../admin/img/slide/{{$value->anh}}" alt="" style="width:100px;"></td>
                <td>{{$value->tieude}}</td>
                <td>{{$value->noidung}}</td>
                <td>{{$value->link}}</td>
                <td>{{$arr_user[$value->id_users]}}</td>
                <td>
                    <a href="/sua-slide/{{$value->id}}" class="fa fa-edit"></a>
                    <div id="myModal<?php echo $value->id; ?>" class="modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fa fa-edit" style="color:rgb(18, 107, 110);"> Sửa slide</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                <div class="container">
                                @if(isset($s_sua))
                                @foreach($s_sua as $vl)
                                <form action="sua-slide/{{$value->id}}"  method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                                <input type="hidden" name="anh_cu" value="{{$vl->anh}}" />
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Ảnh: </label>
                                        <input  type="file" name="anh"><br>
                                        <img src="../admin/img/slide/{{$vl->anh}}" alt="" style="width:30%;">
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Tiêu đề: </label>
                                        <input class="form-control" type="text" name="tieude" value="{{$vl->tieude}}" placeholder="Nhập vào tên">
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Nội dung: </label>
                                        <input class="form-control" type="text" name="noidung" value="{{$vl->noidung}}" placeholder="Nhập vào tên">
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Link: </label>
                                        <input class="form-control" type="text" name="link" value="{{$vl->link}}" placeholder="Nhập vào tên">
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
    @if(isset($s_sua))
    <script>
    $('#myModal<?php echo $md; ?>').modal('show');
    </script>
    @endif
    @if(isset($gc_them))
    <script>$('#myModal_them').modal('show');</script>
    @endif
@endsection