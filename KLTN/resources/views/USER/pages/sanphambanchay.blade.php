@extends('USER.layout.index')

@section('noidung')
<div class="container-fluid" style="height:85px;padding-left: 7%;">
        <h3 style="font-weight: bold;color: black;">Sản phẩm bán chạy</h3>
        <p><a style="text-decoration:none;color: rgb(18, 107, 110);" href="">Trang chủ</a>  <span style="color: #ccc;"> / </span>  <span style="font-weight: bold;color:rgb(18, 107, 110);">Sản phẩm bán chạy</span></p>
    </div>
<div id="sanpham" class="container-fluid" style="background-color: #f4f4f4;">
    <div class="row" style="margin-left:5%;">
    @foreach($arr as $key=>$vl)
    <div id="sp_hover" class=" col-md-2 thumbnail" style="text-align:center; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);margin: 10px;">
        <a  href="/chitietcay/{{$vl[0]}}" style="color:#4e4e4e;text-decoration:none;font-size:18px;">
        <img src="../admin/img/cay/{{$arr_s[$vl[0]]->anh}}" alt="Image" style="max-width:100%;height:210px;">
        <span style="word-wrap:break-word;">{{$arr_s[$vl[0]]->ten}}</span><br>
        <span style="font-size:13px;font-weight:none;margin-right:3%;"><li class="fa fa-eye" style="color:blue;"></li>@if(empty($arr_s[$vl[0]]->view)) 0 @endif {{$arr_s[$vl[0]]->view}}</span><span  style="font-size:13px;"><li class="fa fa-star" style="color:#FBC02D;"></li>@if(empty($arr_s[$vl[0]]->danhgia)) 0 @endif {{$arr_s[$vl[0]]->danhgia}}</span>
        <p><?php if($arr_s[$vl[0]]->khuyenmai==0)
			echo "<span  style='color:rgb(18, 107, 110);'>".number_format($arr_s[$vl[0]]->gia) ."₫</span>";
		else
			echo "<strike style='font-size:1vw;margin-right:3%;color:#9E9E9E'>" .number_format($arr_s[$vl[0]]->gia) ."₫</strike><span style='color:rgb(18, 107, 110);'>" .number_format($arr_s[$vl[0]]->khuyenmai)."₫</span>";
		?></p>  
        </a>
    </div>
    @endforeach    
</div>
</div>
@endsection