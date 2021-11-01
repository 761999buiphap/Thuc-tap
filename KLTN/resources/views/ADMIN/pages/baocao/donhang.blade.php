@extends('ADMIN.layout.index')

@section('noidung')
<div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10">
            <h5 style="padding: 5px;"><span style="color: white;margin-left: 3px;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Báo cáo - Thống kê » Đơn hàng</i> </h5>
        </div>
</div>
@if(isset($donhang))
<div class="container-fluid" style="width:94%;border:1px solid #ccc;margin:3%;padding:2% 3%;">
    <h4 ><span class="fa fa-recycle"></span> Báo cáo - Thống kê Đơn hàng</h4><br>
    <form action="baocaodonhang" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <div class="row">
        <div class="col">
            <label for="">Trạng thái đơn hàng:</label>
            <select class="form-control" name="trangthai" id="">
            <option value=" ">---</option>
            <option value="Chờ xử lí">Chờ xử lí</option>
                <option value="Đã giao">Đã giao</option>
                <option value="Đã hủy">Đã hủy</option>
            </select>
        </div>
        <div class="col">
            <label for="">Phương thức giao hàng:</label>
            <select class="form-control" name="phuongthuc" id="">
                <option value=" ">---</option>
                <option value="Nhận tiền khi giao hàng">Nhận tiền khi giao hàng</option>
                <option value="Chuyển khoản">Chuyển khoản</option>
            </select>
        </div>
        <div class="col">
            <label for="">Khách hàng:</label>
            <select class="form-control" name="khachhang" id="">
                <option value=" ">---</option>
                @foreach($khachhang as $value)
                <option value="{{$value->id}}">{{$value->ten}}</option>
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
        <div class="col-md-2">
            <input class="form-control " type="submit" style="margin-top:15%;color:white;background-color:#EF5350;" value="Xác nhận">
        </div>
    </div>
    </form>
</div>
<div class="container-fluid" style="padding:1% 3%;">
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
            <?php 
            $i=1;
            foreach($donhang as $value){ ?>
            <tr>
                <td scope="row" style="text-align:center;"><a href="/chitietdonhang-baocao/{{$value->id}}" class="fa fa-eye" style="text-decoration:none;"></a></td>
                <td>{{$i}}</td>
                <td>{{$value->id}}</td>
                <td>{{$arr_khachhang[$value->id_khachhang]['ten']}}</td>
                <td>{{$arr_khachhang[$value->id_khachhang]['sdt']}}</td>
                <td>{{$arr_khachhang[$value->id_khachhang]['diachi']}}</td>
                <td style="text-align:center;">
                    @if($value->trangthai == "Chờ xử lí")
                    <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" style="border:none;"><span style="color:orange">{{$value->trangthai}}</span></button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="/dagiao/{{$value->id}}"><li class="fa fa-retweet"></li> Đã giao</a>
                    <a class="dropdown-item" href="/dahuy/{{$value->id}}"><li class="fa fa-random"></li> Đã hủy</a>
                    </div>
                    @endif
                    @if($value->trangthai == "Đã giao")
                    <span style="color:blue">{{$value->trangthai}}</span>
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
<div class="container">
    <a class="btn " type="button" href="donhang-baocao" style="margin-left:45%;background-color:#EF5350;color:white;"> ← Quay lại</a>
</div>
@endif
    <!-- Chart code -->
@if(isset($data_thang))
<script>
    var chart = AmCharts.makeChart("chartdiv_cot", {
    "type": "serial",
    "theme": "none",
    "marginRight": 70,
    "dataProvider": [
        <?php foreach($data_thang as $key => $value){ ?>
        {
        "country": "Tháng <?php echo $key ?>",
        "visits":"<?php echo $value; ?>",
        "color": "rgb(255, 102, 0)"
    },<?php } ?>],
    "valueAxes": [{
        "axisAlpha": 0,
        "position": "left",
        "title": "Số bình luận"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<b>[[category]]: [[value]]</b>",
        "fillColorsField": "color",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "type": "column",
        "valueField": "visits"
    }],
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start",
        "labelRotation": 45
    },
    "export": {
        "enabled": true
    }

    });
</script>
  <?php 
    
    $gioitinh = [];
    $gioitinh['Nam']=0;
    $gioitinh['Nữ']=0;
    foreach($khachhang as $kh)
    {
        $gioitinh[$kh->gioitinh]+=1;
    }
  ?>
  
<!-- HTML -->
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <div id="chartdiv_cot"></div>													
        <div class="row"></div>
        <div class="row mb-5" >
            <div class="col-md-5"></div>
            <div class="col-md-7" >Biểu đồ thống kê bình luận theo tháng</div>
        </div>
    </div>
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