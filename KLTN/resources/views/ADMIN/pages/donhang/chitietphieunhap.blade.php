@extends('ADMIN.layout.index')

@section('noidung')
<div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10">
            <h5 style="padding: 5px;"><span style="color: white;margin-left: 3px;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Nhập kho  » Chi tiết phiếu nhập</i></h5>
        </div>
</div>
<div class="container-fluid ">
    <div class="row" style="margin-left:1%;margin-top:1%;">
        <div class="col-md-2">
            <img src="../admin/img/img.jpg" style="width:70%;border:2px solid grey;" alt="">
        </div>
        <div class="col">
            <div class="row col">
                <h4 style="color:rgb(18, 107, 110);">THÔNG TIN HÓA ĐƠN</h4>
            </div>
            <div class="row">
                <div class="col">
                <strong>Số hóa đơn: <span style="color:rgb(18, 107, 110);">#{{$nhapkho->id}}</span></strong><br>
                <strong>Thông tin nguồn giao: <span style="color:rgb(18, 107, 110);">{{$nhapkho->bengiao}}</span></strong><br>
                <strong>Ghi chú: <span style="color:rgb(18, 107, 110);">{{$nhapkho->ghichu}}</span></strong><br>
                </div>
                <div class="col">
                    <strong>Ngày: <span style="color:rgb(18, 107, 110);">{{date("d-m-Y", strtotime($nhapkho->ngay))}}</span></strong><br>
                    <strong>Người quản lí: <span style="color:rgb(18, 107, 110);">{{$arr_users[$nhapkho->id_users]->name}}</span></strong>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid " style="margin:1% 2% 5% 1%;width:98%;">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home"><strong> CHI TIẾT PHIẾU NHẬP </strong></a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="home" class="container-fluid tab-pane active"><br>
        <table class="table table-hover table-bordered table-striped" >
          <thead>
            <tr>
                <th style="background-color: #EF5350;color: white;">STT</th>
                <th style="background-color: #EF5350;color: white;"># Số hóa đơn</th>
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
                <td>{{$value->id}}</td>
                <td>{{$arr_cay[$value->id_cay]->ten}}</td>
                <td>{{number_format($value->gia)}}</td>
                <td>{{$value->soluong}}</td>
                <td>{{$value->ghichu}}</td>
            </tr>
            <?php $i++; } ?>
          </tbody>
        </table>
        </div>
        <a id="tieptucxemsanpham" href="nhapkho" > ← Quay lại</a>
    </div>
</div>
@endsection