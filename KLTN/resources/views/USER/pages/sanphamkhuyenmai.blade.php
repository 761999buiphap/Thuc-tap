@extends('USER.layout.index')

@section('noidung')
<div class="container-fluid" style="height:85px;padding-left: 7%;">
        <h3 style="font-weight: bold;color: black;">Sản phẩm khuyến mại</h3>
        <p><a style="text-decoration:none;color: rgb(18, 107, 110);" href="">Trang chủ</a>  <span style="color: #ccc;"> / </span>  <span style="font-weight: bold;color:rgb(18, 107, 110);">Sản phẩm khuyến mại</span></p>
    </div>
<div id="sanpham" class="container-fluid" style="background-color: #f4f4f4;">
    <div class="row" style="margin-left:5%;">
    @foreach($sanphamkhuyenmai as $value)
    <div id="sp_hover" class=" col-md-2 thumbnail" style="text-align:center; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);margin: 10px;">
        <a  href="/chitietcay/{{$value->id}}" style="color:#4e4e4e;text-decoration:none;font-size:18px;">
        <img src="../admin/img/cay/{{$value->anh}}" alt="Image" style="max-width:100%;height:210px;">
        <span style="word-wrap:break-word;">{{$value->ten}}</span><br>
        <span style="font-size:13px;font-weight:none;margin-right:3%;"><li class="fa fa-eye" style="color:blue;"></li>@if(empty($value->view)) 0 @endif {{$value->view}}</span><span  style="font-size:13px;"><li class="fa fa-star" style="color:#FBC02D;"></li>@if(empty($value->danhgia)) 0 @endif {{$value->danhgia}}</span>
        <p><?php if($value->khuyenmai==0)
			echo "<span  style='color:rgb(18, 107, 110);'>".number_format($value->gia) ."₫</span>";
		else
			echo "<strike style='font-size:1vw;margin-right:3%;color:#9E9E9E'>" .number_format($value->gia) ."₫</strike><span style='color:rgb(18, 107, 110);'>" .number_format($value->khuyenmai)."₫</span>";
		?></p> 
        </a>
    </div>
    @endforeach    
</div>
</div>
@endsection