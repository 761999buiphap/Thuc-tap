@extends('ADMIN.layout.index')

@section('noidung')
<div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
        <div class="col-md-10">
            <h5 style="padding: 5px;"><span style="color: white;margin-left: 3px;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Báo cáo - Thống kê</i></h5>
        </div>
</div>
<div class="container-fluid " style="padding:1% 3%;">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group" style="border:2px solid #337ab7;border-radius:5px;">
                <li class="list-group-item active">
                    <div class="col-md-6" >
                        <h1 style="font-size:80px;"><li  class="fa fa-comments"></li></h1>
                    </div>
                    <div class="col-md-6" >
                        <h1 style="margin-left:60%;">{{count($binhluan)}}</h1>
                        <p style="width:100%;">Bình luận hôm nay</p>
                        <h4>Tổng: {{count($tong_binhluan)}}</h4>
                    </div>
                </li>
                <li class="list-group-item" style="background-color:#f4f4f4;">
                    <div class="col-md-10">
                        <strong style="color:#337ab7;">Xem chi tiết</strong>
                    </div>
                    <div class="col-md-2">
                        <a href="binhluan-baocao"><span  class="fa fa-arrow-circle-right"></span></a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-3">
            <ul class="list-group" style="border:2px solid #388E3C;border-radius:5px;">
                <li class="list-group-item active" style="background-color:#388E3C;border:none;">
                    <div class="col-md-6" >
                        <h1 style="font-size:80px;"><li  class="fa fa-tasks"></li></h1>
                    </div>
                    <div class="col-md-6" >
                        <h1 style="margin-left:60%;">{{count($khachhang)}}</h1>
                        <p style="width:100%;">Khách hàng mới hôm nay</p>
                        <h4>Tổng: {{count($tong_khachhang)}}</h4>
                    </div>
                </li>
                <li class="list-group-item" style="background-color:#f4f4f4;">
                    <div class="col-md-10">
                        <strong style="color:#388E3C;">Xem chi tiết</strong>
                    </div>
                    <div class="col-md-2">
                        <a href="khachhang-baocao" style="color:#388E3C;"><span  class="fa fa-arrow-circle-right"></span></a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-3">
            <ul class="list-group" style="border:2px solid #FFA726;border-radius:5px;">
                <li class="list-group-item active" style="background-color:#FFA726;border:none;">
                    <div class="col-md-6" >
                        <h1 style="font-size:80px;"><li  class="fa fa-shopping-cart"></li></h1>
                    </div>
                    <div class="col-md-6" >
                        <h1 style="margin-left:60%;">{{count($donhang)}}</h1>
                        <p style="width:100%;">Đơn hàng hôm nay</p>
                        <h4>Tổng: {{count($tong_donhang)}}</h4>
                    </div>
                </li>
                <li class="list-group-item" style="background-color:#f4f4f4;">
                    <div class="col-md-10">
                        <strong style="color:#FFA726;">Xem chi tiết</strong>
                    </div>
                    <div class="col-md-2">
                        <a href="donhang-baocao" style="color:#FFA726;"><span  class="fa fa-arrow-circle-right"></span></a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-3">
            <ul class="list-group" style="border:2px solid #E53935;border-radius:5px;">
                <li class="list-group-item active"style="background-color:#E53935;border:none;">
                    <div class="col-md-6" >
                        <h1 style="font-size:80px;"><li  class="fa fa-phone"></li></h1>
                    </div>
                    <div class="col-md-6" >
                        <h1 style="margin-left:60%;">{{count($lienhe)}}</h1>
                        <p style="width:100%;">Liên hệ hôm nay</p>
                        <h4>Tổng: {{count($tong_lienhe)}}</h4>
                    </div>
                </li>
                <li class="list-group-item" style="background-color:#f4f4f4;">
                    <div class="col-md-10">
                        <strong style="color:#E53935;">Xem chi tiết</strong>
                    </div>
                    <div class="col-md-2">
                        <a href="lienhe-baocao"  style="color:#E53935;"><span  class="fa fa-arrow-circle-right"></span></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <hr style="border:1px solid #f2f2f2">
    <!-- Chart code -->
<!-- Styles -->
<style>
#chartdiv_doanhthu {
  width	: 100%;
  height	: 500px;
}
#chartdiv_truynhap {
  width	: 100%;
  height	: 500px;
}        
#chartdiv_banchay {
  width	: 100%;
  height	: 500px;
}       
</style>
<script>
var chart = AmCharts.makeChart("chartdiv_doanhthu", {
    "type": "serial",
    "theme": "none",
    "marginRight": 40,
    "marginLeft": 40,
    "autoMarginOffset": 20,
    "mouseWheelZoomEnabled":true,
    "dataDateFormat": "YYYY-MM-DD",
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0,
        "position": "left",
        "ignoreAxisWidth":true
    }],
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "oppositeAxis":false,
        "offset":30,
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount":true,
        "color":"#AAAAAA"
    },
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha":1,
        "cursorColor":"#258cbb",
        "limitToGraph":"g1",
        "valueLineAlpha":0.2,
        "valueZoomable":true
    },
    "valueScrollbar":{
      "oppositeAxis":false,
      "offset":50,
      "scrollbarHeight":10
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "dashLength": 1,
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
    },
    "dataProvider": [
    <?php foreach($data_thang as $key => $value){ ?>
        {
        "date": "<?php echo $key ?>",
        "value": "<?php echo $value ?>",
    },<?php } ?>],
});

chart.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
    chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
}
</script>
<script>
var chart = AmCharts.makeChart( "chartdiv_truynhap", {
  "type": "serial",
  "theme": "none",
  "marginRight": 40,
  "marginLeft": 40,
  "autoMarginOffset": 20,
  "dataDateFormat": "YYYY-MM-DD",
  "valueAxes": [ {
    "id": "v1",
    "axisAlpha": 0,
    "position": "left",
    "ignoreAxisWidth": true
  } ],
  "balloon": {
    "borderThickness": 1,
    "shadowAlpha": 0
  },
  "graphs": [ {
    "id": "g1",
    "balloon": {
      "drop": true,
      "adjustBorderColor": false,
      "color": "#ffffff",
      "type": "smoothedLine"
    },
    "fillAlphas": 0.2,
    "bullet": "round",
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "bulletSize": 5,
    "hideBulletsCount": 50,
    "lineThickness": 2,
    "title": "red line",
    "useLineColorForBulletBorder": true,
    "valueField": "value",
    "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
  } ],
  "chartCursor": {
    "valueLineEnabled": true,
    "valueLineBalloonEnabled": true,
    "cursorAlpha": 0,
    "zoomable": false,
    "valueZoomable": true,
    "valueLineAlpha": 0.5
  },
  "valueScrollbar": {
    "autoGridCount": true,
    "color": "#000000",
    "scrollbarHeight": 50
  },
  "categoryField": "date",
  "categoryAxis": {
    "parseDates": true,
    "dashLength": 1,
    "minorGridEnabled": true
  },
  "export": {
    "enabled": true
  },
  "dataProvider": [ 
    <?php foreach($data_thang_truycap as $key => $value){ ?>
        {
        "date": "<?php echo $key ?>",
        "value": "<?php echo $value ?>",
    },<?php } ?>],
} );

</script>
<script>
var chart = AmCharts.makeChart( "", {
  "type": "serial",
  "theme": "none",
  "marginRight": 40,
  "marginLeft": 40,
  "autoMarginOffset": 20,
  "dataDateFormat": "YYYY-MM-DD",
  "valueAxes": [ {
    "id": "v1",
    "axisAlpha": 0,
    "position": "left",
    "ignoreAxisWidth": true
  } ],
  "balloon": {
    "borderThickness": 1,
    "shadowAlpha": 0
  },
  "graphs": [ {
    "id": "g1",
    "balloon": {
      "drop": true,
      "adjustBorderColor": false,
      "color": "#ffffff",
      "type": "smoothedLine"
    },
    "fillAlphas": 0.2,
    "bullet": "round",
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "bulletSize": 5,
    "hideBulletsCount": 50,
    "lineThickness": 2,
    "title": "red line",
    "useLineColorForBulletBorder": true,
    "valueField": "value",
    "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
  } ],
  "chartCursor": {
    "valueLineEnabled": true,
    "valueLineBalloonEnabled": true,
    "cursorAlpha": 0,
    "zoomable": false,
    "valueZoomable": true,
    "valueLineAlpha": 0.5
  },
  "valueScrollbar": {
    "autoGridCount": true,
    "color": "#000000",
    "scrollbarHeight": 50
  },
  "categoryField": "date",
  "categoryAxis": {
    "parseDates": true,
    "dashLength": 1,
    "minorGridEnabled": true
  },
  "export": {
    "enabled": true
  },
  "dataProvider": [ 
      
    <?php foreach($arr as $key => $value){ ?>
        {
        "date": "<?php echo $value[0] ?>",
        "value": "<?php echo $value[1] ?>",
    },<?php } ?>],
} );

</script>
<script>
var chart = AmCharts.makeChart("chartdiv_banchay", {
    "type": "serial",
    "theme": "none",
    "legend": {
        "equalWidths": false,
        "useGraphSettings": true,
        "valueAlign": "left",
        "valueWidth": 120
    },
    "dataProvider": [
    <?php foreach($arr as $key => $value){ ?>
    {
        "date": "<?php echo $arr_s[$value[0]]->ten ?>",
        "distance": "<?php echo $value[1] ?>",
        "townSize": 25,
        "duration": "<?php echo $value[2] ?>",
    },<?php } ?>],
    "valueAxes": [{
        "id": "distanceAxis",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "position": "left",
        "title": "Số lượng bán ra"
    }, {
        "id": "",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "labelsEnabled": false,
        "position": "right"
    }, {
        "id": "durationAxis",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "position": "left",
        "title": "distance",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "position": "right",
        "title": "Doanh thu(Nghìn đồng)"
    }],
    "graphs": [{
        "alphaField": "alpha",
        "balloonText": "[[value]] ",
        "dashLengthField": "dashLength",
        "fillAlphas": 0.7,
        "legendPeriodValueText": "total: [[value.sum]] ",
        "legendValueText": "[[value]] ",
        "title": "Số lượng",
        "type": "column",
        "valueField": "distance",
        "valueAxis": "distanceAxis"
    }, {
        "bullet": "square",
        "bulletBorderAlpha": 1,
        "bulletBorderThickness": 1,
        "dashLengthField": "dashLength",
        "legendValueText": "[[value]] đồng",
        "title": "Doanh thu",
        "fillAlphas": 0,
        "valueField": "duration",
        "valueAxis": "durationAxis"
    }],
    "chartCursor": {
        "categoryBalloonDateFormat": "DD",
        "cursorAlpha": 0.1,
        "cursorColor":"#000000",
         "fullWidth":true,
        "valueBalloonsEnabled": false,
        "zoomable": false
    },
    "dataDateFormat": "YYYY-MM-DD",
    "categoryField": "date",
    "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "tickLength": 0,
    "labelRotation": 45

  },
    "export": {
    	"enabled": true
     }
});
</script>
<!-- HTML -->
<div class="row " >
    <div class="col">
    <div id="chartdiv_doanhthu"></div>													
        <div class="row"></div>
        <div class="row mb-5" >
            <div class="col-md-5"></div>
            <div class="col-md-7" ><h4>Biểu đồ thống kê doanh thu</h4></div>
        </div>
    </div>
    <div class="col">
    <div id="chartdiv_truynhap"></div>													
        <div class="row"></div>
        <div class="row mb-5" >
            <div class="col-md-2"></div>
            <div class="col" ><h4> Biểu đồ thống kê lượt truy nhập theo tháng</h4></div>
        </div>
    </div>
</div>
<div class="row " >
    <div class="col">
    <div id="chartdiv_banchay"></div>													
        <div class="row"></div>
        <div class="row mb-5" >
            <div class="col-md-5"></div>
            <div class="col-md-7" ><h4>Biểu đồ thống kê doanh thu</h4></div>
        </div>
    </div>
</div>
</div>

@endsection