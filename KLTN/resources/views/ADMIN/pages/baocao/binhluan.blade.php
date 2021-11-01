@extends('ADMIN.layout.index')

@section('noidung')
<div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10">
            <h5 style="padding: 5px;"><span style="color: white;margin-left: 3px;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Báo cáo - Thống kê » Bình luận</i> </h5>
        </div>
</div>
<div class="container-fluid" style="width:94%;border:1px solid #ccc;margin:3%;padding:2% 3%;">
    <h4 ><span class="fa fa-recycle"></span> Báo cáo - Thống kê bình luận</h4><br>
    <form action="/baocaobinhluan" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <div class="row">
        <div class="col">
            <label for="">Cây giống:</label>
            <select class="form-control" name="cay" id="">
                <option value=" ">---</option>
                @foreach($cay as $value)
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
                <th style="background-color: #EF5350;color: white;">STT</th>
                <th style="background-color: #EF5350;color: white;">Tên cây</th>
                <th style="background-color: #EF5350;color: white;">Tên tài khoản</th>
                <th style="background-color: #EF5350;color: white;">Nội dung</th>
                <th style="background-color: #EF5350;color: white;">Ngày</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=1;
            foreach($binhluan as $value){ ?>
            <tr>
                <td>{{$i}}</td>
                <td>{{$arr_cay[$value->id_cay]}}</td>
                <td>{{$arr_user[$value->id_users]}}</td>
                <td><textarea class="form-control" name="" id="" cols="20" rows="1">{{$value->noidung}}</textarea></td>
                <td>{{date("d-m-Y", strtotime($value->ngay))}}</td>
            </tr>
            <?php $i++; } ?>
          </tbody>
        </table>

    </div>
    <!-- Chart code -->
@if(isset($data_thang))
<script>
    var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "none",
    "marginRight": 70,
    "dataProvider": [
        <?php foreach($data_thang as $key => $value){ ?>
        {
        "country": "Tháng <?php echo $key ?>",
        "visits":"<?php echo $value; ?>",
        "color": "#EF5350"
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
<div id="chartdiv"></div>													
<div class="row"></div>
  <div class="row mb-5" >
    <div class="col-md-5"></div>
    <div class="col-md-7" >Biểu đồ thống kê bình luận theo tháng</div>
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