@extends('ADMIN.layout.index')

@section('noidung')
 <!--tiêu đề-->
 <div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10 p-0">
            <h5 style="padding: 5px;"><span style="color: white;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Bình luận</i></h5>
        </div>
        <div class="col-md-1" >
            <button type="button" class="btn btn-primary float-left mt-2" data-toggle="collapse" data-target="#demo" style="background-color: #EF5350"><li class="fa fa-search"></li> Tìm kiếm</button>
        </div>
        <div class="col-md-1">
            <!--them moi khach hang-->
            <a href="/them-binhluan" class="btn" style="background-color: #EF5350;color: white;margin-top:7%;"><li class="fa fa-plus"></li> Thêm mới</a>
            <div id="myModal_them" class="modal" role="dialog">
                <div class="modal-dialog ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fa fa-plus" style="color: rgb(18, 107, 110);"> Thêm bình luận</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                        <form action="them-binhluan"  method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Tên cây: </label>
                                <select class="form-control" name="cay" id="">
                                    @foreach($cay as $value)
                                    <option value="{{$value->id}}">{{$value->ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Tài khoản: </label>
                                <select class="form-control" name="taikhoan" id="">
                                    @foreach($tb_user as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Nội dung : </label>
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
        <form action="/timkiem-binhluan" method="post" class="form-group " style="margin-top:1%;">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <div class="row">
            <div class="col-md-4">
                <label for="">Cây:</label>
                <select class="form-control float-left" name="cay" id="" >
                <option value=" ">---</option>
                @foreach($cay as $value)
                <option value="{{$value->id}}">{{$value->ten}}</option>
                @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="">Người quản lí:</label>
                <select class="form-control float-left" name="taikhoan" id="" >
                <option value=" ">---</option>
                @foreach($tb_user as $value)
                <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
                </select>     
            </div>
                <div class="col-md-4">
                <label for="">Từ ngày: </label><br>
                <input class="form-control" type="date" name="tungay" >
            </div>
            <div class="col-md-4">
                <label for="">Đến ngày: </label><br>
                <input class="form-control" type="date" name="denngay" >
            </div>
            <div class="col">
                <button class="form-control float-left" style="background-color: #EF5350;width:20%;margin-top:3%;" type="submit"><img src="https://img.icons8.com/emoji/25/000000/magnifying-glass-tilted-left-emoji.png"/></button>
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
                <th style="background-color: #EF5350;color: white;">Tên cây</th>
                <th style="background-color: #EF5350;color: white;">Tên tài khoản</th>
                <th style="background-color: #EF5350;color: white;">Nội dung</th>
                <th style="background-color: #EF5350;color: white;">Ngày</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=1;
            foreach($binhluan as $value){ ?>
            <tr>
                <td>
                    <a href="/sua-binhluan/{{$value->id}}" class="btn btn-warning "style="width:60px;padding:3px;">Edit</a>
                    <div id="myModal<?php echo $value->id; ?>" class="modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fa fa-edit" style="color:rgb(18, 107, 110);"> Sửa bình luận</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                <div class="container">
                                @if(isset($bl_sua))
                                @foreach($bl_sua as $vl)
                                <form action="sua-binhluan/{{$value->id}}"  method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Tên cây: </label>
                                        <select class="form-control" name="cay" id="">
                                            @foreach($cay as $value)
                                            <option
                                            @if($vl->id_cay==$value->id)
                                            {{"selected"}}
                                            @endif
                                             value="{{$value->id}}">{{$value->ten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Tài khoản: </label>
                                        <select class="form-control" name="taikhoan" id="">
                                            @foreach($tb_user as $value)
                                            <option 
                                            @if($vl->id_users==$value->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Nội dung : </label>
                                        <textarea class="form-control" name="noidung" id="" cols="30" rows="6"  placeholder="Nhập vào nội dung">{{$vl->noidung}}</textarea>
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
                        <button type="button" class="btn btn-danger" style="width:60px;padding:3px;" data-toggle="modal" data-target="#myModal_xoa<?php echo $i; ?>">Delete</button>
                        <div id="myModal_xoa<?php echo $i; ?>" class="modal " role="dialog" >
                            <div class="modal-dialog" style="margin-top:15%;">
                                <div class="modal-content" style="text-align:center;">
                                <div class="modal-body">
                                    <img src="https://img.icons8.com/fluency/40/ffffff/instagram-check-mark.png"/>
                                    <h4>Bạn có chắc chắn muốn xóa!</h4>
                                    <button type="button" class="btn btn-info" data-dismiss="modal" style="font-weight: bold;">Thoát</button>
                                    <a href="/xoa-binhluan/{{$value->id}}" type="button" class="btn btn-danger" href="">Xác nhận</a>
                                </div>
                                </div>
                            </div>
                        </div>
                </td>    
                <td>{{$i}}</td>
                <td>{{$arr_cay[$value->id_cay]}}</td>
                <td>{{$arr_user[$value->id_users]}}</td>
                <td><textarea class="form-control" name="" id="" cols="20" rows="1">{{$value->noidung}}</textarea></td>
                <td>{{date("d-m-Y", strtotime($value->ngay))}}</td>        
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
    @if(isset($bl_sua))
    <script>
    $('#myModal<?php echo $md; ?>').modal('show');
    </script>
    @endif
    @if(isset($bl_them))
    <script>$('#myModal_them').modal('show');</script>
    @endif
@endsection