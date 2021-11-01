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
    <h4 style="color:green;"><img src="https://img.icons8.com/dusk/30/000000/bookmark.png"/> BÁO CÁO MẶT HÀNG BÁN CHẠY</h4>
    <form action="ketqua-baocao-mathangbanchay" method="post" class="form-group">
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

@if(isset($arr))
<div style="width:90%;">
    <table class="table table-hover " style="width:90%;">
                <thead>
                <tr><th></th><th>#</th><th>Tên sách</th><th>Số lượng sách bán ra</th><th>Số lượng sách còn trong kho</th></tr>
                </thead>
                <tbody>
                  <tr>
                    <?php $i=1;
                    foreach($arr as $s=>$vl){
                    ?>
                    <tr>
                    <td>{{$i}}</td>
                      <td>{{$arr_s[$vl[0]]->id}}</td>
                      <td>{{$arr_s[$vl[0]]->tensach}}</td>
                      <td>{{$vl[1]}}</td>
                      <?php
                        $soluong= $arr_s[$vl[0]]->soluong;
                        $tonkho = $soluong - $vl[1]?>
                      <td>{{$tonkho}}</td>
                    </tr>
                    <?php $i++; if($i>10)break; }?>
                  
                  </tr>

                 
                </tbody>
    </table>
                    </div>
@endif
</div>
@endsection
