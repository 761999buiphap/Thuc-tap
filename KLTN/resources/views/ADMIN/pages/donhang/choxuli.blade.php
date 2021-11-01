@extends('ADMIN.layout.index')

@section('noidung')
<!--tiêu đề-->
<div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-11 p-0" >
            <h5 style="padding: 5px;"><span style="color: white;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Chi tiết đơn hàng » Chờ xử lí</i></h5>
        </div>
        @if(isset($donhang))
        <div class="col-md-1" >
            <button type="button" class="btn btn-primary float-left mt-2" data-toggle="collapse" data-target="#demo" style="background-color: #EF5350"><li class="fa fa-search"></li> Tìm kiếm</button>
        </div>
        @endif
</div>
@if(isset($donhang))
<div id="demo" class="collapse container-fluid"  style="padding:0 3%;">
    <form action="/timkiem-donhang" method="post" class="form-group " style="margin-top:1%;">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <div class="row">
        <div class="col-md-4">
            <label for="">Trạng thái đơn hàng:</label><br>
            <select class="form-control" name="trangthai" id="">
                <option value=" ">---</option>
                <option value="Chờ xử lí">Chờ xử lí</option>
                <option value="Đã giao">Đã giao</option>
                <option value="Đã hủy">Đã hủy</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Khách hàng: </label>
            <select class="form-control" name="khachhang" id="">
                <option value=" ">---</option>
                @foreach($khachhang as $value)
                <option value="{{$value->id}}">{{$value->ten}}</option>
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
        <div class="col-md-1">
            <label for=""> </label>
            <button class="form-control" style="background-color: #EF5350;" type="submit"><img src="https://img.icons8.com/emoji/25/000000/magnifying-glass-tilted-left-emoji.png"/></button>
        </div>
    </div>
    </form>
  </div>
<div class="container-fluid " style="padding:1% 2%;">
    <h4 style="color:rgb(18, 107, 110);"><li class="fa fa-cubes pb-1"></li> DANH SÁCH ĐƠN HÀNG</h4>
    <table class="table table-hover table-bordered table-striped" >
    <thead>
    <tr>
        <th style="background-color: #EF5350;color: white;" scope="col">Xem chi tiết</th>
        <th style="background-color: #EF5350;color: white;" scope="col">STT</th>
        <th style="background-color: #EF5350;color: white;" scope="col">Mã đơn hàng</th>
        <th style="background-color: #EF5350;color: white;" scope="col">Tên khách hàng</th>
        <th style="background-color: #EF5350;color: white;" scope="col">Số điện thoại</th>
        <th style="background-color: #EF5350;color: white;" scope="col">Địa chỉ</th>
        <th style="background-color: #EF5350;color: white;" scope="col">Trạng thái đơn hàng</th>
        <th style="background-color: #EF5350;color: white;" scope="col">Phương thức thanh toán</th>
        <th style="background-color: #EF5350;color: white;" scope="col">Ghi chú</th>
        <th style="background-color: #EF5350;color: white;" scope="col">Ngày</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1;
        foreach($donhang as $value){ ?>
        <tr>
        <td scope="row" style="text-align:center;"><a href="/chitietdonhang-donhang/{{$value->id}}" class="fa fa-eye" style="text-decoration:none;"></a></td>
        <td>{{$i}}</td>
        <td>{{$value->id}}</td>
        <td>{{$arr_khachhang[$value->id_khachhang]['ten']}}</td>
        <td>{{$arr_khachhang[$value->id_khachhang]['sdt']}}</td>
        <td>{{$arr_khachhang[$value->id_khachhang]['diachi']}}</td>
        <td style="text-align:center;">
            @if($value->trangthai == "Chờ xử lí")
            <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" style="border:none;"><span style="color:orange;">{{$value->trangthai}}</span></button>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="/dagiao/{{$value->id}}"><li class="fa fa-retweet"></li> Đã giao</a>
            <a class="dropdown-item" href="/dahuy/{{$value->id}}"><li class="fa fa-random"></li> Đã hủy</a>
            </div>
            @endif
            @if($value->trangthai == "Đã giao")
            <span style="color:green;">{{$value->trangthai}}</span>
            @endif
            @if($value->trangthai == "Đã hủy")
            <span style="color:red">{{$value->trangthai}}</span>
            @endif
        </td>
        <td>{{$value->phuongthuc}}</td>
        <td>{{$value->ghichu}}</td>
        <td>{{date("d-m-Y", strtotime($value->ngay))}}</td>
        </tr>
        <?php $i++; } ?>
    </tbody>
    </table>
</div>
@endif
@if(isset($chitietdonhang))
    <?php 
        $tong = 0;
        foreach($chitietdonhang as $value)
        {
            $tong+=$value->gia;
        }
    ?>
<div class="container-fluid ">
    <div class="row" style="margin-left:1%;margin-top:1%;">
        <div class="col-md-2">
            <img src="../admin/img/img.jpg" style="width:100%;border:2px solid grey;" alt="">
        </div>
        <div class="col">
            <div class="row col">
                <h4 style="color:rgb(18, 107, 110);"><li class="fa fa-cubes"></li>THÔNG TIN HÓA ĐƠN</h4>
            </div>
            <div class="row">
            @foreach($khachhang as $value)
            <div class="col">
                <h5><span style="font-weight:bold;color:black;">Tên khách hàng:</span> <span style="font-weight:bold;color:rgb(18, 107, 110);">{{$value->ten}}</span></h5>
                <h5><span style="font-weight:bold;color:black;">Giới tính:</span> <span style="font-weight:bold;color:rgb(18, 107, 110);">{{$value->gioitinh}}</span></h5>
                <h5><span style="font-weight:bold;color:black;">Email:</span> <span style="font-weight:bold;color:rgb(18, 107, 110);">{{$value->email}}</span></h5>
                <h5><span style="font-weight:bold;color:black;">Số điện thoại:</span> <span style="font-weight:bold;color:rgb(18, 107, 110);">{{$value->sdt}}</span></h5>
                <h5><span style="font-weight:bold;color:black;">Địa chỉ:</span> <span style="font-weight:bold;color:rgb(18, 107, 110);">{{$value->diachi}}</span></h5>
            </div>
            @endforeach
            @foreach($madonhang as $value)
            <div class="col">
                <h5><span style="font-weight:bold;color:black;">Mã đơn hàng:</span> <span style="font-weight:bold;color:rgb(18, 107, 110);">#{{$value->id}}</span></h5>
                <h5><span style="font-weight:bold;color:black;">Trạng thái:</span> <span style="font-weight:bold;color:rgb(18, 107, 110);">{{$value->trangthai}}</span></h5>
                <h5><span style="font-weight:bold;color:black;">Ghi chú:</span> <span style="font-weight:bold;color:rgb(18, 107, 110);">{{$value->ghichu}}</span></h5>
                <h5><span style="font-weight:bold;color:black;">Ngày đặt hàng:</span> <span style="font-weight:bold;color:rgb(18, 107, 110);">{{date("d-m-Y", strtotime($value->ngay))}}</span></h5>
                <h5><span style="font-weight:bold;color:black;">Tổng giá trị đơn hàng:</span> <span style="font-weight:bold;color:rgb(18, 107, 110);">{{number_format($tong)}}₫</span></h5>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container-fluid " style="margin:1% 2%;width:98%;">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home"><strong> CHI TIẾT ĐƠN HÀNG </strong></a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="home" class="container-fluid tab-pane active"><br>
        <table class="table table-hover table-bordered table-striped" >
        <thead>
        <tr>
        <th style="background-color: #EF5350;color: white;" scope="col">STT</th>
        <th style="background-color: #EF5350;color: white;" scope="col">Ảnh</th>
        <th style="background-color: #EF5350;color: white;" scope="col">Tên sản phẩm</th>
        <th style="background-color: #EF5350;color: white;" scope="col">Số lượng</th>
        <th style="background-color: #EF5350;color: white;" scope="col">Gía</th>
        </tr>
        </thead>
        <tbody>
            <?php $i=1;
            foreach($chitietdonhang as $value){ ?>
            <tr>
            <td>{{$i}}</td>
            <td><img src="../admin/img/cay/{{$arr_cay[$value->id_cay]['anh']}}" alt="" style="width:27%;height:30px;"></td>
            <td>{{$arr_cay[$value->id_cay]['ten']}}</td>
            <td>{{$value->soluong}}</td>
            <td>{{number_format($value->gia)}}₫</td>
            </tr>
            <?php $i++; } ?>
        </tbody>
        </table>
        </div>
        <a id="tieptucxemsanpham" href="/choxuli" > ← Quay lại</a>
    </div>
</div>
@endif

@endsection