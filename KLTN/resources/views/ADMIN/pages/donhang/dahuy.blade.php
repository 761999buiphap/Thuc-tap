@extends('ADMIN.layout.index')

@section('noidung')
<!--tiêu đề-->
<div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-8">
            <h5 style="padding: 5px;"><span style="color: white;margin-left: 3px;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Đơn hàng » Đã hủy</i></h5>
        </div>
        @if(isset($donhang))
        <div class="col-md-4" >
            <form action="/timkiem-donhang" method="post" class="form-group " style="margin-top:1%;">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="hidden" name="trangthai" value="Đã hủy" />
                <input class="form-control float-left" type="date" name="ngay" style="width:85%;">
                <button class="form-control float-left" style="background-color: #EF5350;width: 15%;" type="submit"><img src="https://img.icons8.com/emoji/25/000000/magnifying-glass-tilted-left-emoji.png"/></button>
            </form>
        </div>
        @endif
</div>
@if(isset($donhang))
<div class="container-fluid " style="padding:0 3%;">
    <h3 style="color:rgb(18, 107, 110);"><li class="fa fa-cubes pb-5"></li> DANH SÁCH ĐƠN HÀNG</h3>
    <table class="table table-hover table-striped" >
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
        <td>{{$value->trangthai}}</td>
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
<div class="container" >
    <h3 style="color: rgb(18, 107, 110);padding:1% 0;"><li class="fa fa-cubes"></li> CHI TIẾT ĐƠN HÀNG</h3>
    <div class="row" >
        <?php 
        $tong = 0;
        foreach($chitietdonhang as $value)
        {
            $tong+=$value->gia;
        }
        ?>
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
<div class="container">
<table class="table table-hover table-striped mt-5" >
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
        <td><img src="../admin/img/cay/{{$arr_cay[$value->id_cay]['anh']}}" alt="" style="width:27%;height:55px;"></td>
        <td>{{$arr_cay[$value->id_cay]['ten']}}</td>
        <td>{{$value->soluong}}</td>
        <td>{{number_format($value->gia)}}₫</td>
        </tr>
        <?php $i++; } ?>
    </tbody>
    </table>
</div>
@endif

@endsection