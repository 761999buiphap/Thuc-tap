@extends('admin.layout.index')

@section('noidung')
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
      #diva{
          height:60px;
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
<div class="slide-body" style="height:500px;display: grid;grid-template-columns: auto auto ;text-align:center;">
      <div>
        <button id="bc1" class="btn btn-info" style="padding:10% 5%;margin-top:5%;"><a href="baocao-donhang" style="color:white;text-decoration:none;"><h2>BÁO CÁO ĐƠN HÀNG</h2></a></button>
      </div>
      <div>
        <button class="btn btn-danger" style="padding:10% 3%;margin-top:5%;"><a href="baocao-khachhang" style="color:white;text-decoration:none;"><h2>BÁO CÁO KHÁCH HÀNG</h2></a></button>
      </div>
      <div>
        <button class="btn btn-warning" style="padding:10% 3%;margin-top:5%;"><a href="baocao-doanhthu" style="color:white;text-decoration:none;"><h2>BÁO CÁO DOANH THU</h2></a></button>
      </div>
      <div>
        <button class="btn btn-success" style="padding:7% 6%;margin-top:5%;"><a href="baocao-mathangbanchay" style="color:white;text-decoration:none;"><h2>BÁO CÁO MẶT HÀNG <BR> BÁN CHẠY</h2></a></button>
      </div>
</div>

@endsection
