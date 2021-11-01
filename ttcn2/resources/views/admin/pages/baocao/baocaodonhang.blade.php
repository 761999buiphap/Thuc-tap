@extends('admin.layout.index')

@section('noidung')
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
  <style>
      #diva{
          height:60px;
      }
      #chartdiv {
  width: 100%;
  height: 500px;
}		
#chartdiv_cot {
  width: 100%;
  height: 500px;
}

.amcharts-export-menu-top-right {
  top: 10px;
  right: 0;
}
     
  </style>

  <div class="div2" style="margin-top:1%;padding:3px 0;">
    <form style="margin-top:3px;margin-left:73%;" class="div2form" method="POST" action="tk-slide">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
  
    </form>
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Báo cáo</span> </p>
    
    </div>
    @if(isset($tukhoa))
    <div style="padding:10px;background-color:pink;">
        <span >Từ khóa tìm kiếm:</span><i style="color:red;font-size:20px;">" {{$tukhoa}} "</i>
    </div>
    @endif
    <div class="slide-body" style="height:1000px;padding:3%;">
    <h4 style="color:green;"><img src="https://img.icons8.com/dusk/30/000000/bookmark.png"/> BÁO CÁO ĐƠN HÀNG</h4>
    <form action="ketqua-baocao-donhang" method="post" class="form-group">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <div class="row">
    <div class="col-md-4">
        <label for="date">Từ ngày:</label>
        <input type="date" class="form-control" name="tungay" >
    </div>
    <div class="col-md-4">
        <label for="date">Đến ngày:</label>
        <input type="date" class="form-control" name="denngay">
    </div>
    <div class="col-md-4">
        <label for="date"></label>
        <button class="btn btn-info" style="margin-top:7%;">Xác nhận</button>
    </div>
    </div>

    </form>

    @if(isset($donhang))
    <!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Danh sách đơn hàng</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu2">Biểu đồ thống kê theo số lượng đơn hàng</a>
  </li>
  
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div class="tab-pane container active" id="home">
    <table class="table table-hover" style="width: 87%;">
                <thead>
                <tr><th></th><th>#</th><th>Mã đơn hàng</th><th>Mã khách hàng</th><th >Phương thức vận chuyển</th><th >Phương thức thanh toán</th><th >Tổng tiền</th><th>Trạng thái </th></tr>
                </thead>
                <tbody>
                  <tr>
                    <?php $i=1;
                    foreach ($donhang as $value) {
                      ?>
                        <tr>
                        <tr><td><a href="chitiet-donhang/{{$value->id}}"><img src="https://img.icons8.com/color/30/000000/opened-folder.png"/></a></td>
                        <td>{{$i}}</td>
                      <td>{{$value->id}}</td>
                      <td>{{$value->id_khachhang}}</td>
                      <td>{{$value->phuongthucvanchuyen}}</td>
                      <td> {{$value->phuongthucthanhtoan}}</td>
                      <td>{{number_format($value->tongtien)}}</td>
                      @if($value->trangthai == 1)
                        <td>Giao hàng</td>
                      @elseif($value->trangthai == 0)
                      <td>Chưa giao</td>
                      @else
                      <td>Đã hủy</td>
                      @endif
                        </tr>
                    <?php $i++; }?>
                  
                  </tr>

                 
                </tbody>
              </table>
</div>
<div class="tab-pane container fade" id="menu1">
  <?php 
    $arr_khachhang = [];
    foreach($khachhang as $kh)
    {
        $arr_khachhang[$kh->id] = $kh->gioitinh;
    }
    $gioitinh = [];
    $gioitinh['Nam']=0;
    $gioitinh['Nữ']=0;
    foreach($donhang as $dh)
    {
        $gioitinh[ $arr_khachhang[$dh->id_khachhang]]+=1;
    }
  ?>
  <!-- Chart code -->
  <script>
  var chart = AmCharts.makeChart( "chartdiv", {
    "type": "pie",
    "theme": "none",
    "dataProvider": 
    [ 
    <?php foreach($gioitinh as $key=>$value){?>
    {
      "country": "<?php echo $key; ?>",
      "value": "<?= round($value, 2) ?>",
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

  <!-- HTML -->
  <div id="chartdiv"></div>
  <div class="row"></div>
  <div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-7" >Biểu đồ thống kê đơn hàng theo giới tính</div>
</div>
</div>
<div class="tab-pane container fade" id="menu2">
  <!-- Chart code -->
  <script>
  var chart = AmCharts.makeChart("chartdiv_cot", {
    "type": "serial",
    "theme": "none",
    "marginRight": 70,
    "dataProvider": [
      <?php foreach($data_thang as $key => $value){ ?>
    {
      "country": "Tháng <?php echo $key ?>",
      "visits": "<?php echo $value; ?>",
      "color": "#FF0F00"
    },<?php } ?>],
    "valueAxes": [{
      "axisAlpha": 0,
      "position": "left",
      "title": "Số lượng đơn hàng"
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
  <div id="chartdiv_cot"></div>
  <div class="row"></div>
  <div class="row">
    <div class="col-md-5"></div>
    <div class="col-md-7" >Biểu đồ thống kê đơn hàng theo tháng</div>
  </div>
  </div>
</div>

@endif
</div>

@endsection
