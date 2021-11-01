@extends('ADMIN.layout.index')

@section('noidung')
<div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10">
            <h5 style="padding: 5px;"><span style="color: white;margin-left: 3px;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Báo cáo - Thống kê » Khách hàng</i> </h5>
        </div>
</div>
<div class="container-fluid" style="width:94%;border:1px solid #ccc;margin:3%;padding:2% 3%;">
    <h4 ><span class="fa fa-recycle"></span> Báo cáo - Thống kê khách hàng</h4><br>
    <form action="/baocaokhachhang" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <div class="row">
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
                <th style="background-color: #EF5350;color: white;">STT</th>
                <th style="background-color: #EF5350;color: white;"># mã</th>
                <th style="background-color: #EF5350;color: white;">Tên</th>
                <th style="background-color: #EF5350;color: white;">Giới tính</th>
                <th style="background-color: #EF5350;color: white;">Số điện thoại</th>
                <th style="background-color: #EF5350;color: white;">Email</th>
                <th style="background-color: #EF5350;color: white;">Địa chỉ</th>
                <th style="background-color: #EF5350;color: white;">Tên tài khoản</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=1;
            foreach($khachhang as $value){ ?>
            <tr>
                <td>{{$i}}</td>
                <td >{{$value->id}}</td>
                <td>{{$value->ten}}</td>
                <td>{{$value->gioitinh}}</td>
                <td>{{$value->sdt}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->diachi}}</td>
                <td>{{$arr_user[$value->taikhoan]}}</td>
            </tr>
            <?php $i++; } ?>
          </tbody>
        </table>

    </div>
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
  <!-- Chart code -->
  <script>
  var chart = AmCharts.makeChart("chartdiv", {
    "type": "pie",
    "theme": "none",
    "dataProvider": 
    [ 
    <?php foreach($gioitinh as $key=>$value){?>
    {
      "country": "<?php echo $key; ?>",
      "value": "<?= round($value, 2) ?>",
      "color": "#EF5350"
    }, <?php } ?> ],
    "valueField": "value",
    "titleField": "country",
    "outlineAlpha": 0.4,
    "depth3D": 15,
    "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 30,
    "export": {
      "enabled": true
    }
  } );
  </script>
  <?php 
    
    $thanhpho = [];
    $thanhpho['Hồ Chí Minh']=0;
    $thanhpho['Hà Nội']=0;
    $thanhpho['Đà Nẵng']=0;
    $thanhpho['An Giang']=0;
    $thanhpho['Bắc Giang']=0;
    $thanhpho['Bắc Cạn']=0;
    $thanhpho['Bạc Liêu']=0;
    $thanhpho['Bắc Ninh']=0;
    $thanhpho['Bến Tre']=0;
    $thanhpho['Bình Định']=0;
    $thanhpho['Bình Dương']=0;
    $thanhpho['Bình Phước']=0;
    $thanhpho['Bình Thuận']=0;
    $thanhpho['Cà Mau']=0;
    $thanhpho['Cần Thơ']=0;
    $thanhpho['Cao Bằng']=0;
    $thanhpho['Đắc Lắk']=0;
    $thanhpho['Đắc Nông']=0;
    foreach($khachhang as $kh)
    {
        $thanhpho[$kh->thanhpho]+=1;
    }
  ?>
  <script>
    var chart = AmCharts.makeChart("chartdiv_thanhpho", {
    "type": "serial",
    "theme": "none",
    "marginRight": 70,
    "dataProvider": [
        <?php foreach($thanhpho as $key => $value){ ?>
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
<!-- HTML -->
<div class="row">
    <div class="col">
    <div id="chartdiv_cot"></div>													
        <div class="row"></div>
        <div class="row mb-5" >
            <div class="col-md-5"></div>
            <div class="col-md-7" >Biểu đồ thống kê khách hàng theo tháng</div>
        </div>
    </div>
    <div class="col">
        <div id="chartdiv"></div>													
        <div class="row"></div>
            <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-7" >Biểu đồ thống kê khách hàng theo giới tính</div>
        </div>
    </div>
</div>
<div id="chartdiv_thanhpho"></div>													

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