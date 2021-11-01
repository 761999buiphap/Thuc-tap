@extends('ADMIN.layout.index')

@section('noidung')
<!--tiêu đề-->
<div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10" style="padding:0%;">
            <h5 style="padding: 5px;"><span style="color: white;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;"><?php foreach($loaicay as $tgc){if($tgc->id == $id){foreach($giongcay as $g){if($tgc->id_giongcay == $g->id) echo $g->ten ." » " .$tgc->ten ;}}} ?></i></h5>
        </div>
        <div class="col-md-1" >
            <button type="button" class="btn btn-primary float-left mt-2" data-toggle="collapse" data-target="#demo" style="background-color: #EF5350"><li class="fa fa-search"></li> Tìm kiếm</button>
        </div>
        <div class="col-md-1">
            <!--them moi giong cay-->
            <a href="/them-cay/{{$id}}" class="btn" style="background-color: #EF5350;color: white;margin-top:8%;"><li class="fa fa-plus"></li> Thêm mới</a>
            <div id="myModal_them" class="modal" role="dialog">
                <div class="modal-dialog " >
                    <div class="modal-content" >
                    <div class="modal-header">
                        <h4 class="modal-title fa fa-plus" style="color: rgb(18, 107, 110);"> Thêm loại <?php foreach($loaicay as $tgc){if($tgc->id == $id){ echo $tgc->ten;}} ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" >
                        <div class="container" style="width:100%;">
                        @if(isset($lc_them))
                        <form action="/them-cay/{{$id}}"  method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <input type="hidden" name="id_giongcay" value="{{$lc_them}}">
                            <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                            <div class="row">
                            <div class="col-md-6">
                                <label for="">Giống cây: </label>
                                <select class="form-control" name="id_giongcay" id="" style="cursor: no-drop;">
                                    @foreach($giongcay as $value)
                                    <option 
                                    @if($gc==$value->id)
                                    {{"selected"}}
                                    @endif
                                     value="{{$value->id}}">{{$value->ten}}</option>
                                     @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                            <label for="">Loại cây: </label>
                                <select class="form-control " name="id_loaicay" id="" style="cursor: no-drop;">
                                    @foreach($loaicay as $value)
                                    @if($value->id_giongcay == $gc)
                                    <option
                                    @if($lc_them==$value->id)
                                    {{"selected"}}
                                    @endif
                                     value="{{$value->id}}">{{$value->ten}}</option>
                                     @endif
                                     @endforeach
                                </select>
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col">
                                <label for="">Ảnh: </label>
                                <input type="file" name="anh">
                            </div><br>
                            </div>
                            <div class="row">
                            <div class="col">
                                <label for="">Tên: </label>
                                <input class="form-control" type="text" name="ten" placeholder="Nhập vào tên">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-6">
                                <label for="">Gía: </label>
                                <input class="form-control" type="text" name="gia" placeholder="Nhập vào giá">
                            </div>
                            <div class="col-md-6">
                                <label for="">Số lượng: </label>
                                <input class="form-control" type="text" name="soluong" placeholder="Số lượng">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col-md-6">
                                <label for="">Nguồn gốc: </label>
                                <input class="form-control" type="text" name="nguongoc" placeholder="Nguồn gốc">
                            </div>
                            <div class="col-md-6">
                                <label for="">Khuyến mại: </label>
                                <input class="form-control" type="text" name="khuyenmai" placeholder="Khuyến mại">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col">
                                <label for="">Tiêu đề: </label>
                                <input class="form-control" type="text" name="tieude" placeholder="Tiêu đề">
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col">
                                <label for="">Mô tả: </label>
                                <textarea class="form-control" name="mota" placeholder="Mô tả" id="" cols="30" rows="8"></textarea>
                            </div>
                            </div><br>
                            <div class="row">
                            <div class="col">
                                <label for="">Trạng thái: </label>
                                <select class="form-control" name="trangthai" id="">
                                    <option value="Đang hoạt động">Đang hoạt động</option>
                                    <option value="Ngừng hoạt động">Ngừng hoạt động</option>
                                </select>
                            </div>
                            </div><br>
                            <input class="form-control" style="width:20%;background-color:rgb(18, 107, 110);color:white;margin-left:40%;" type="submit" value="Xác nhận">
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
        <form action="/timkiem-cay" method="post" class="form-group " style="margin-top:1%;">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input type="hidden" name="id_loaicay" value="{{$id}}" />
        <div class="row">
            <div class="col-md-3">
                <label for="">Tên cây:</label>
                <input class="form-control float-left" type="text" name="ten" placeholder="Nhập vào tên cây">
            </div>
            <div class="col-md-3">
                <label for="">Mức giá:</label>
                <select class="form-control" name="gia" id="" value=" ">
                    <option value=" ">---</option>
                    <option value="50000">Từ 0 đến 50.000đ</option>
                    <option value="100000">Từ 50.000đ đến 100.000đ</option>
                    <option value="1000000">Từ 100.000đ đến 1.000.000đ</option>
                    <option value="10000000">Từ 1.000.000đ đến 10.000.000đ</option>
                    <option value="10000001">lớn hơn 10.000.000đ</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="">Trạng thái:</label>
                <select class="form-control" name="trangthai" id="" value=" ">
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
    <div class="container-fluid" >
        <div class="col-md-3" style="padding: 1% 0;">
            <div class="container-fluid ">
                <div id="danhsach_tintuc" >
                    <a href="" style="font-weight: bold;background:linear-gradient( #EF5350 ,#b96462 100%);color: white;text-align: center;"><li class=" fa fa-bars"></li> DANH MỤC LOẠI CÂY</a>
                    @foreach($giongcay as $gc)
                    <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse<?php echo $gc->id ?>">{{$gc->ten}}<span style="float:right;">»</span></a>
                    </h4>
                    <div id="collapse<?php echo $gc->id ?>" class="panel-collapse collapse p-2" >
                    @foreach($loaicay as $lc)
                        @if($lc->id_giongcay == $gc->id)
                        <a href="/danhsach-cay/{{$lc->id}}"  style="background-color:white;color:rgb(18, 107, 110);">» {{$lc->ten}}</a>
                        @endif
                    @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-9" style="padding: 1% 0;">
            <table class="table table-hover table-bordered table-striped" >
                <thead>
                  <tr>
                    <th style="background-color: #EF5350;color: white;">Thao tác</th>
                    <th style="background-color: #EF5350;color: white;">STT</th>
                    <th style="background-color: #EF5350;color: white;">Ảnh</th>
                      <th style="background-color: #EF5350;color: white;">Tên cây</th>
                      <th style="background-color: #EF5350;color: white;">Gía</th>
                      <th style="background-color: #EF5350;color: white;">Số lượng</th>
                      <th style="background-color: #EF5350;color: white;">Khuyến mại</th>
                      <th style="background-color: #EF5350;color: white;">Tiêu đề</th>
                      <th style="background-color: #EF5350;color: white;">Mô tả</th>
                      <th style="background-color: #EF5350;color: white;">Nguồn gốc</th>
                      <th style="background-color: #EF5350;color: white;">lượt xem</th>
                      <th style="background-color: #EF5350;color: white;">Đánh giá</th>
                      <th style="background-color: #EF5350;color: white;">Trạng thái</th>
                      <th style="background-color: #EF5350;color: white;width:8%;">Người quản lí</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;
                foreach($cay as $value){ ?>
                  <tr>
                    <td>
                        <!--Sửa cay-->
                        <a class="btn btn-warning " style="padding:1% 10%;" href="/sua-cay/{{$value->id}}/{{$id}}">Edit</a>
                        <div id="myModal<?php echo $value->id; ?>"  class="modal" role="dialog">
                            <div class="modal-dialog " >
                                <div class="modal-content" >
                                <div class="modal-header">
                                    <h4 class="modal-title fa fa-edit" style="color: rgb(18, 107, 110);" > Sửa cây <?php foreach($loaicay as $tgc){if($tgc->id == $id){ echo $tgc->ten;}} ?></h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" >
                                    <div class="container" style="width:100%;">
                                    @if(isset($c_sua))
                                    @foreach($c_sua as $vl_sua)
                                    <form action="/sua-cay/{{$vl_sua->id}}"  method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden" name="id_loaicay" value="{{$id}}">
                                        <input type="hidden" name="anh_cu" value="{{$vl_sua->anh}}">
                                        <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                                        <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Giống cây: </label>
                                            <select class="form-control" name="id_giongcay" id="" disabled="" style="cursor: no-drop;" >
                                            @foreach($giongcay as $value)
                                            <option 
                                            @if($select_gc==$value->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{$value->id}}">{{$value->ten}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="">Loại cây: </label>
                                            <select class="form-control " name="id_loaicay" id="" disabled="" style="cursor: no-drop;">
                                            @foreach($c_sua as $vl)
                                            @foreach($loaicay as $value)
                                            @if($value->id_giongcay == $select_gc)
                                            <option
                                            @if($vl->id_loaicay == $value->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{$value->id}}">{{$value->ten}}</option>
                                            @endif
                                            @endforeach
                                            @endforeach
                                            </select>
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col">
                                            <label for="">Ảnh: </label>
                                            <input type="file" name="anh">
                                            <img src="../admin/img/cay/{{$vl_sua->anh}}" alt="" style="width:25%;">
                                        </div><br>
                                        </div>
                                        <div class="row">
                                        <div class="col">
                                            <label for="">Tên: </label>
                                            <input class="form-control" type="text" name="ten"  value="{{$vl_sua->ten}}" placeholder="Nhập vào tên">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Gía: </label>
                                            <input class="form-control" type="text" name="gia" value="{{$vl_sua->gia}}" placeholder="Nhập vào giá">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Số lượng: </label>
                                            <input class="form-control" type="text" name="soluong" value="{{$vl_sua->soluong}}" placeholder="Số lượng">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Nguồn gốc: </label>
                                            <input class="form-control" type="text" name="nguongoc" value="{{$vl_sua->nguongoc}}" placeholder="Nguồn gốc">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Khuyến mại: </label>
                                            <input class="form-control" type="text" name="khuyenmai" value="{{$vl_sua->khuyenmai}}" placeholder="Khuyến mại">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col">
                                            <label for="">Tiêu đề: </label>
                                            <textarea class="form-control" name="tieude" id="" cols="30" rows="3" placeholder="Tiêu đề" >{{$vl_sua->tieude}}</textarea>
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col">
                                            <label for="">Mô tả: </label>
                                            <textarea class="form-control" name="mota" id="" cols="30" rows="3" placeholder="Mô tả" >{{$vl_sua->mota}}</textarea>
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col">
                                            <label for="">Trạng thái: </label>
                                            <select class="form-control" name="trangthai" id="">
                                            <option
                                                @if($vl_sua->trangthai=='Đang hoạt động')
                                                {{"selected"}}
                                                @endif
                                                value="Đang hoạt động">Đang hoạt động</option>
                                                <option
                                                @if($vl_sua->trangthai=='Ngừng hoạt động')
                                                {{"selected"}}
                                                @endif
                                                value="Ngừng hoạt động" >Ngừng hoạt động</option>
                                            </select>
                                        </div>
                                        </div><br>
                                        <input class="form-control" style="width:20%;background-color:rgb(18, 107, 110);color:white;margin-left:40%;" type="submit" value="Xác nhận">
                                    </form>
                                    @endforeach
                                    @endif
                                    @if(isset($sua_tk))      
                                    @foreach($sua_tk as $vl_sua)
                                    <form action="/sua-cay/{{$vl_sua->id}}"  method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden" name="id_loaicay" value="{{$id}}">
                                        <input type="hidden" name="anh_cu" value="{{$vl_sua->anh}}">
                                        <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
                                        <div class="row">
                                        <div class="col-md-6">
                                            <label for="" class="fa fa-edit">Giống cây: </label>
                                            <select class="form-control" name="id_giongcay" id="" style="cursor: no-drop;" disabled="">
                                            @foreach($giongcay as $value)
                                            <option 
                                            @if($select_gc==$value->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{$value->id}}">{{$value->ten}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                        <label for="">Loại cây: </label>
                                            <select class="form-control " name="id_loaicay" id="" style="cursor: no-drop;" disabled="">
                                            @foreach($sua_tk as $vl)
                                            @foreach($loaicay as $value)
                                            @if($value->id_giongcay == $select_gc)
                                            <option
                                            @if($vl->id_loaicay == $value->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{$value->id}}">{{$value->ten}}</option>
                                            @endif
                                            @endforeach
                                            @endforeach
                                            </select>
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col">
                                            <label for="">Ảnh: </label>
                                            <input type="file" name="anh">
                                            <img src="../admin/img/cay/{{$vl_sua->anh}}" alt="" style="width:25%;">
                                        </div><br>
                                        </div>
                                        <div class="row">
                                        <div class="col">
                                            <label for="">Tên: </label>
                                            <input class="form-control" type="text" name="ten"  value="{{$vl_sua->ten}}" placeholder="Nhập vào tên">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Gía: </label>
                                            <input class="form-control" type="text" name="gia" value="{{$vl_sua->gia}}" placeholder="Nhập vào giá">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Số lượng: </label>
                                            <input class="form-control" type="text" name="soluong" value="{{$vl_sua->soluong}}" placeholder="Số lượng">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Nguồn gốc: </label>
                                            <input class="form-control" type="text" name="nguongoc" value="{{$vl_sua->nguongoc}}" placeholder="Nguồn gốc">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Khuyến mại: </label>
                                            <input class="form-control" type="text" name="khuyenmai" value="{{$vl_sua->khuyenmai}}" placeholder="Khuyến mại">
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col">
                                            <label for="">Tiêu đề: </label>
                                            <textarea class="form-control" name="tieude" id="" cols="30" rows="3" placeholder="Tiêu đề" >{{$vl_sua->tieude}}</textarea>
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col">
                                            <label for="">Mô tả: </label>
                                            <textarea class="form-control" name="mota" id="" cols="30" rows="3" placeholder="Mô tả" >{{$vl_sua->mota}}</textarea>
                                        </div>
                                        </div><br>
                                        <div class="row">
                                        <div class="col">
                                            <label for="">Trạng thái: </label>
                                            <select class="form-control" name="trangthai" id="">
                                            <option
                                                @if($vl_sua->trangthai=='Đang hoạt động')
                                                {{"selected"}}
                                                @endif
                                                value="Đang hoạt động">Đang hoạt động</option>
                                                <option
                                                @if($vl_sua->trangthai=='Ngừng hoạt động')
                                                {{"selected"}}
                                                @endif
                                                value="Ngừng hoạt động" >Ngừng hoạt động</option>
                                            </select>
                                        </div>
                                        </div><br>
                                        <input class="form-control" style="width:20%;background-color:rgb(18, 107, 110);color:white;margin-left:40%;" type="submit" value="Xác nhận">
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
                      <td><button type="button"  data-toggle="modal" data-target="#myModal<?php echo $i; ?>" style="border:none;padding:0;"><img src="../admin/img/cay/{{$value->anh}}" alt="" style="width:100%;height:30px;"></button></td>
                      <td>{{$value->ten}}</td>
                      <td>{{number_format($value->gia)}}</td>
                      <td>{{$value->soluong}}</td>
                      <td>{{$value->khuyenmai}}</td>
                      <td ><textarea name="" id="" cols="10" rows="1" style="background-color:#f9f9f9;">{{$value->tieude}}</textarea></td>
                      <td ><textarea name="" id="" cols="10" rows="1" style="background-color:#f9f9f9;">{{$value->mota}}</textarea></td>
                      <td>{{$value->nguongoc}}</td>
                      <td>{{$value->view}}</td>
                      <td>{{$value->danhgia}}</td>
                      <td >
                        @if($value->trangthai == "Đang hoạt động")
                        <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" style="border:none;"><span style="color:green">{{$value->trangthai}}</span></button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/ngunghoatdong-cay/{{$value->id}}/{{$id}}"><li class="fa fa-random"></li> Ngừng hoạt động</a>
                        </div>
                        @endif  
                        @if($value->trangthai == "Ngừng hoạt động")
                        <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" style="border:none;"><span style="color:red;">{{$value->trangthai}}</span></button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="/danghoatdong-cay/{{$value->id}}/{{$id}}"><li class="fa fa-retweet"></li> Đang hoạt động</a>
                        </div>
                        @endif                
                    </td>
                    <td>{{$arr_user[$value->id_users]}}</td>
                  </tr>
                  <div id="myModal<?php echo $i; ?>" class="modal fade" role="dialog" >
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <img src="../admin/img/cay/{{$value->anh}}" alt="" style="width:100%;height:100%;">
                    </div>
                    </div>
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
    @if(isset($c_sua))
    <script>
    $('#myModal<?php echo $md; ?>').modal('show');
    </script>
    @endif
    @if(isset($lc_them))
    <script>$('#myModal_them').modal('show');</script>
    @endif
@endsection