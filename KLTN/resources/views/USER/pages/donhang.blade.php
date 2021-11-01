@extends('USER.layout.index')

@section('noidung')
<!-- chi tiet -->
@if(isset($donhang))
<div class="container">
    <h3 style="color: rgb(18, 107, 110);padding:1% 0;"><li class="fa fa-cubes"></li> DANH MỤC ĐƠN HÀNG CỦA BẠN</h3>
    <table class="table table-hover" >
    <thead>
        <tr>
        <th scope="col">Xem chi tiết</th>
        <th scope="col">STT</th>
        <th scope="col">Mã đơn hàng</th>
        <th scope="col">Tên khách hàng</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Trạng thái đơn hàng</th>
        <th scope="col">Phương thức thanh toán</th>
        <th scope="col">Ghi chú</th>
        <th scope="col">Ngày</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1;
        foreach($donhang as $value){ ?>
        <tr>
        <th scope="row"><a href="/chitietdonhang/{{$value->id}}" class="fa fa-eye" style="text-decoration:none;"></a></th>
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
<div class="container">
    <h3 style="color: rgb(18, 107, 110);padding:1% 0;"><li class="fa fa-cubes"></li> CHI TIẾT ĐƠN HÀNG</h3>
    <div class="row">
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
<table class="table table-hover" >
    <thead>
        <tr>
        <th scope="col">STT</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Gía</th>
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