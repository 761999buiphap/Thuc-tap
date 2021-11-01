@extends('ADMIN.layout.index')

@section('noidung')
 <!--tiêu đề-->
 <div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10 p-0">
            <h5 style="padding: 5px;"><span style="color: white;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;"> <?php foreach($loaitin as $tlt){if($tlt->id == $id){ echo $tlt->tenloaitin;}}  ?></i></h5>
        </div>
        <div class="col-md-1" >
            <button type="button" class="btn btn-primary float-left mt-2" data-toggle="collapse" data-target="#demo" style="background-color: #EF5350"><li class="fa fa-search"></li> Tìm kiếm</button>
        </div>
        <div class="col-md-1">
            <!--them moi giong cay-->
            <a href="/them-tintuc/{{$id}}" class="btn " style="background-color: #EF5350;color: white;margin-top:8%;"><li class="fa fa-plus"></li> Thêm mới</a>
            <div id="myModal_them" class="modal" role="dialog">
                <div class="modal-dialog ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fa fa-plus" style="color: rgb(18, 107, 110);"> Thêm <?php foreach($loaitin as $tlt){if($tlt->id == $id){ echo $tlt->tenloaitin;}}  ?> </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                        @if(isset($tt_them))
                        <form action="/them-tintuc/{{$id}}"  method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <input type="hidden" name="id_loaitin" value="{{$tt_them}}">
                            <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Loại tin: </label>
                                <select class="form-control" name="id_loaitin" id="">
                                    @foreach($loaitin as $value)
                                    <option
                                    @if($tt_them==$value->id)
                                    {{"selected"}}
                                    @endif
                                     value="{{$value->id}}">{{$value->tenloaitin}}</option>
                                     @endforeach
                                </select>
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Ảnh: </label>
                                <input  type="file" name="anh" >
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Tiêu đề: </label>
                                <input class="form-control" type="text" name="tieude" placeholder="Nhập vào tiêu đề">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Nội dung: </label>
                                <textarea class="form-control" name="noidung" id="" cols="30" rows="8" placeholder="Nhập vào nội dung"></textarea>
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-5">
                                <label for="">Nổi bật: </label>
                                <select class="form-control" name="noibat" id="">
                                    <option value="1">Có</option>
                                    <option value="0">Không</option>
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
        <form action="/timkiem-tintuc" method="post" class="form-group " style="margin-top:1%;">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input type="hidden" name="id_loaitin" value="{{$id}}" />
        <div class="row">
            <div class="col-md-4">
                <label for="">Tiêu đề tin tức:</label>
                <input class="form-control float-left" type="text" name="ten"  placeholder="Nhập vào tiêu đề">
            </div>
            <div class="col-md-4">
                <label for="">Từ ngày:</label>
                <input class="form-control" name="tungay" type="date">
            </div>
            <div class="col-md-4">
                <label for="">Đến ngày:</label>
                <input class="form-control" name="denngay" type="date">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="">Nổi bật:</label>
                <select class="form-control" name="noibat" id="" >
                    <option value="3">---</option>
                    <option value="1">Có nổi bật</option>
                    <option value="0">Không nổi bật</option>
                </select>
            </div>
            <div class="col-md-1">
                <button class="form-control float-left " style="background-color: #EF5350;margin-top:30%;" type="submit"><img src="https://img.icons8.com/emoji/25/000000/magnifying-glass-tilted-left-emoji.png"/></button>
            </div>
        </div>
        </form>
    </div>
    <div class="container-fluid" >
        <div class="col-md-2" style="padding: 1% 0;">
            <div class="container-fluid ">
                <div id="danhsach_tintuc" >
                    <a href="" style="font-weight: bold;background:linear-gradient( #EF5350 ,#b96462 100%);color: white;text-align: center;"><li class=" fa fa-bars"></li> DANH MỤC LOẠI TIN</a>
                    @foreach($loaitin as $value)
                    <a href="/danhsach-tintuc/{{$value->id}}">{{$value->tenloaitin}} <span style="float:right;">»</span></a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-10" style="padding: 1% 0;">
        <table class="table table-hover table-bordered table-striped" >
                <thead>
                  <tr>
                    <th style="background-color: #EF5350;color: white;width:15%;">Thao tác</th>
                      <th style="background-color: #EF5350;color: white;">STT</th>
                      <th style="background-color: #EF5350;color: white;">#Mã</th>
                      <th style="background-color: #EF5350;color: white;width:10%;">Ảnh</th>
                    <th style="background-color: #EF5350;color: white;">Tiêu đề</th>
                    <th style="background-color: #EF5350;color: white;">Nội dung</th>
                    <th style="background-color: #EF5350;color: white;">Nổi bật</th>
                    <th style="background-color: #EF5350;color: white;width:10%;">Ngày</th>
                      <th style="background-color: #EF5350;color: white;width:11%;">Người quản lí</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;
                foreach($tintuc as $value){ ?>
                <tr>
                    <td >
                        <a href="/sua-tintuc/{{$value->id}}/{{$id}}" class="btn btn-warning "style="width:60px;padding:3px;">Edit</a>
                        <div id="myModal<?php echo $value->id; ?>" class="modal"  role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fa fa-edit" style="color: rgb(18, 107, 110);"> Sửa <?php foreach($loaitin as $tlt){if($tlt->id == $id){ echo $tlt->tenloaitin;}}  ?></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                <div class="container">
                                    @if(isset($tt_sua))      
                                    @foreach($tt_sua as $vl)
                                    <form action="/sua-tintuc/{{$value->id}}"  method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <input type="hidden" name="id_loaitin" value="{{$id}}">
                                    <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                                    <input type="hidden" name="anh_cu" value="{{$vl->anh}}" />
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Loại tin: </label>
                                        <select class="form-control" name="id_loaitin" id="">
                                            @foreach($loaitin as $value)
                                            <option
                                            @if($vl->id_loaitin==$value->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{$value->id}}">{{$value->tenloaitin}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Ảnh: </label>
                                        <input  type="file" name="anh" value="{{$vl->anh}}">
                                        <img src="../admin/img/tintuc/{{$vl->anh}}" alt="" style="width:30%;">
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Tiêu đề: </label>
                                        <input class="form-control" type="text" name="tieude" value="{{$vl->tieude}}" placeholder="Nhập vào tiêu đề">
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Nội dung: </label>
                                        <textarea class="form-control" name="noidung" id="" cols="30" rows="8"  placeholder="Nhập vào nội dung">{{$vl->noidung}}</textarea>
                                    </div>
                                    </div><br>
                                    <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Nổi bật: </label>
                                        <select class="form-control" name="noibat" id="" >
                                                <option
                                                @if($vl->noibat=='1')
                                                {{"selected"}}
                                                @endif
                                                value="1">Có</option>
                                                <option
                                                @if($vl->noibat=='0')
                                                {{"selected"}}
                                                @endif
                                                value="0" >Không</option>
                                            </select>
                                    </div>
                                    </div><br>
                                    <input class="form-control" style="width:10%;background-color:rgb(18, 107, 110);color:white;margin-left:15%;" type="submit" value="Xác nhận">
                                </form>
                                    @endforeach
                                    @endif
                                    @if(isset($sua_tk))      
                                    @foreach($sua_tk as $vl)
                                    <form action="/sua-loaicay/{{$value->id}}"  method="post" >
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden" name="id_giongcay" value="{{$id}}">
                                        <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                                        <div class="row">
                                        <div class="col-md-5">
                                            <select class="form-control" name="" id="">
                                            @foreach($tintuc as $value)
                                                <option
                                                @if($vl->id_loaitin==$value->id)
                                                {{"selected"}}
                                                @endif
                                                value="{{$value->id}}">{{$value->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label for="">Tên: </label>
                                            <input class="form-control" type="text" name="ten" value="{{$vl->ten}}" >
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
                        <button type="button" class="btn btn-danger" style="width:60px;padding:3px;" data-toggle="modal" data-target="#myModal_xoa<?php echo $i; ?>">Delete</button>
                        <div id="myModal_xoa<?php echo $i; ?>" class="modal " role="dialog" >
                            <div class="modal-dialog" style="margin-top:15%;">
                                <div class="modal-content" style="text-align:center;">
                                <div class="modal-body">
                                    <img src="https://img.icons8.com/fluency/40/ffffff/instagram-check-mark.png"/>
                                    <h4>Bạn có chắc chắn muốn xóa!</h4>
                                    <button type="button" class="btn btn-info" data-dismiss="modal" style="font-weight: bold;">Thoát</button>
                                    <a href="/xoa-tintuc/{{$value->id}}/{{$id}}" type="button" class="btn btn-danger" href="">Xác nhận</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </td> 
                    <td>{{$i}}</td>
                    <td >{{$value->id}}</td>
                    <td><img src="../admin/img/tintuc/{{$value->anh}}" alt="" style="width:50%;"></td>
                    <td><textarea class="form-control" name="" id="" cols="25" rows="1">{{$value->tieude}}</textarea></td>
                    <td><textarea class="form-control" name="" id="" cols="25" rows="1">{{$value->noidung}}</textarea></td>
                    <td >
                        @if($value->noibat == "0")
                        <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" style="border:none;"><span style="color:red">Không nổi bật</span></button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/noibat/{{$value->id}}/{{$id}}"><li class="fa fa-random"></li> Nổi bật</a>
                        </div>
                        @endif  
                        @if($value->noibat == "1")
                        <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" style="border:none;"><span style="color:green;">Nổi bật</span></button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/khongnoibat/{{$value->id}}/{{$id}}"><li class="fa fa-retweet"></li> Không nổi bật</a>
                        </div>
                        @endif                
                    </td>
                    <td>{{date("d-m-Y", strtotime($value->created_at))}}</td>
                    <td>{{$arr_user[$value->id_users]}}</td>
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
    @if(isset($tt_sua))
    <script>
    $('#myModal<?php echo $md; ?>').modal('show');
    </script>
    @endif
    @if(isset($tt_them))
    <script>$('#myModal_them').modal('show');</script>
    @endif
@endsection