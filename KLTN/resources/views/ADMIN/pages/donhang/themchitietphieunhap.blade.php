@extends('ADMIN.layout.index')

@section('noidung')
<div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10">
            <h5 style="padding: 5px;"><span style="color: white;margin-left: 3px;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Nhập kho</i></h5>
        </div>
</div>
<div id="demo" class=" container-fluid"  style="padding:0 3%;">
        <form action="/them-chitietphieunhap" method="post" class="form-group " style="margin-top:1%;">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input type="hidden" name="id_nhapkho" value="{{$id_phieunhap}}" />
        <div class="row">
            <div class="col">
                <label for="">Cây:</label>
                <select class="form-control" name="cay" id="">
                    <option value=" ">---</option>
                    @foreach($cay as $value)
                    <option value="{{$value->id}}">{{$value->ten}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="">Giá nhập:</label>
                <input class="form-control float-left" type="text" name="gia"  placeholder="Giá nhập">
            </div>
            <div class="col">
                <label for="">Số lượng:</label>
                <input class="form-control float-left" type="text" name="soluong"  placeholder="Thông tin nguồn giao">
            </div>
            <div class="col">
                <label for="">Ghi chú:</label>
                <input class="form-control float-left" type="text" name="ghichu"  placeholder="Ghi chú">
            </div>
            <div class="col-md-2">
                <button class="form-control float-left " style="background-color: #EF5350;width: 80%;margin-top:13%;color:white;" type="submit">Xác nhận</button>
            </div>
        </div>
        </form>
    </div>
@if(isset($chitietphieunhap))
<div class="container-fluid" style="padding:1% 3%;">
    <table class="table table-hover table-bordered table-striped" >
          <thead>
            <tr>
                <th style="background-color: #EF5350;color: white;">STT</th>
                <th style="background-color: #EF5350;color: white;">Tên cây</th>
                <th style="background-color: #EF5350;color: white;">Giá nhập</th>
                <th style="background-color: #EF5350;color: white;">Số lượng</th>
                <th style="background-color: #EF5350;color: white;">Ghi chú</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=1;
            foreach($chitietphieunhap as $value){ ?>
            <tr>
                <td>{{$i}}</td>
                <td>{{$arr_cay[$value->id_cay]->ten}}</td>
                <td>{{number_format($value->gia)}}</td>
                <td>{{$value->soluong}}</td>
                <td>{{$value->ghichu}}</td>
            </tr>
            <?php $i++; } ?>
          </tbody>
        </table>

    </div>
@endif
@if(count($errors) > 0)
    <?php foreach($errors->all() as $err){ ?>
    <div class="alert alert-danger alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:2%;width:25%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{$err}}
    </div>
    <?php } ?>
@endif
@endsection