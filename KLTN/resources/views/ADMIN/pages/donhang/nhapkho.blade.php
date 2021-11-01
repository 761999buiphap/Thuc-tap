@extends('ADMIN.layout.index')

@section('noidung')
<div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-9 p-0">
            <h5 style="padding: 5px;"><span style="color: white;margin-left: 3px;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Nhập kho</i></h5>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-primary float-left mt-2" data-toggle="collapse" data-target="#demo" style="background-color: #EF5350; margin-left:40%;"><li class="fa fa-plus"></li> Tạo phiếu nhập</button>
        </div>
        <div class="col-md-1" >
            <button type="button" class="btn btn-primary float-left mt-2" data-toggle="collapse" data-target="#demo_tk" style="background-color: #EF5350"><li class="fa fa-search"></li> Tìm kiếm</button>
        </div>
</div>
<div id="demo_tk" class="collapse container-fluid"  style="padding:0 2%;">
        <form action="timkiem-phieunhap" method="post" class="form-group " style="margin-top:1%;">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
        <div class="row">
            <div class="col">
                <label for="">Người quản lí:</label>
                <select class="form-control" name="nguoiquanli" id="">
                    <option value=" ">---</option>
                    @foreach($arr_users as $key => $vl)
                    <option value="{{$key}}">{{$vl->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="">Từ ngày:</label>
                <input class="form-control" type="date" name="tungay" value=" ">
            </div>
            <div class="col">
                <label for="">Đến ngày:</label>
                <input class="form-control" type="date" name="denngay" value=" ">
            </div>
            <div class="col">
                <button class="form-control float-left " style="background-color: #EF5350;width: 30%;margin-top:8%;color:white;" type="submit">Xác nhận</button>
            </div>
        </div>
        </form>
</div>
<div id="demo" class="collapse container-fluid"  style="padding:0 2%;">
        <form action="them-phieunhap" method="post" class="form-group " style="margin-top:1%;">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input type="hidden" name="id_users" value="{{Auth::user()->id}}" />
        <div class="row">
            <div class="col">
                <label for="">Thông tin nguồn giao:</label>
                <input class="form-control float-left" type="text" name="bengiao"  placeholder="Thông tin nguồn giao">
            </div>
            <div class="col">
                <label for="">Ghi chú:</label>
                <textarea class="form-control" name="ghichu" id="" cols="100" rows="5" placeholder="Ghi chú đơn hàng"></textarea>
            </div>
            <div class="col">
                <button class="form-control float-left " style="background-color: #EF5350;width: 30%;margin-top:5%;color:white;" type="submit">Xác nhận</button>
            </div>
        </div>
        </form>
</div>
<div class="container-fluid" style="padding:1% 2%;">
<h4 style="color:rgb(18, 107, 110);"><li class="fa fa-cubes pb-1"></li> DANH SÁCH HÓA ĐƠN NHẬP KHO</h4>
    <table class="table table-hover table-bordered table-striped" >
          <thead>
            <tr>
                <th style="background-color: #EF5350;color: white;width:8%;">Xem chi tiết</th>
                <th style="background-color: #EF5350;color: white;">STT</th>
                <th style="background-color: #EF5350;color: white;"># Số hóa đơn</th>
                <th style="background-color: #EF5350;color: white;">Thông tin nguồn giao</th>
                <th style="background-color: #EF5350;color: white;">Ghi chú</th>
                <th style="background-color: #EF5350;color: white;">Ngày</th>
                <th style="background-color: #EF5350;color: white;">Người quản lí</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=1;
            foreach($nhapkho as $value){ ?>
            <tr>
                <td scope="row" style="text-align:center;"><a href="/chitietphieunhap/{{$value->id}}" class="fa fa-eye" style="text-decoration:none;"></a></td>
                <td>{{$i}}</td>
                <td>{{$value->id}}</td>
                <td>{{$value->bengiao}}</td>
                <td>{{$value->ghichu}}</td>
                <td>{{date("d-m-Y", strtotime($value->ngay))}}</td>
                <td>{{$arr_users[$value->id_users]->name}}</td>
            </tr>
            <?php $i++; } ?>
          </tbody>
        </table>

</div>
@if(count($errors) > 0)
    <?php foreach($errors->all() as $err){ ?>
    <div class="alert alert-danger alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:2%;width:25%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{$err}}
    </div>
    <?php } ?>
@endif
@endsection