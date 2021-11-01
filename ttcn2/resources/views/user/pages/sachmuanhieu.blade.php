@extends('user.layout.index')

@section('noidung')
<p style="padding:1%;background-color:#fafafa;width:85%;margin-left:7%;margin-top:1%;margin-bottom:0px;border-radius:3px;">Trang chủ /<span style="color:blue;"> Sách mua nhiều</span> </p>
    <div style="display:grid;grid-template-columns: auto auto auto auto;background-color:white;margin-left:7%;width:85%;margin-bottom:2%;">
        <?php $i=0; foreach($arr as $k=>$vl) 
				{?>
					<div style="margin:3% 0 3% 7%;text-align:center;">
                    <div style="text-align:center;">
					@if($arr_s[$vl[0]]->soluong == 0)
						<span style="position:absolute;text-align:center;background-color:grey;z-index:3;color:white;padding:2px 2%;">Hết hàng</span>
						<img style="width:120px; opacity: 0.5;" src="admin_asset/img/{{$arr_s[$vl[0]]->anh}}" alt="">
					@else
                        <img style='width:120px;height:140px; 'src='admin_asset/img/{{$arr_s[$vl[0]]->anh}}' alt=''>
					@endif
					</div>
						<p style='font-size:1vw;'>{{$arr_s[$vl[0]]->tensach }}</p>
							@if($arr_s[$vl[0]]->khuyenmai==0)<span>{{$arr_s[$vl[0]]->gia }}đ</span>@else<strike style='font-size:1vw;'> {{$arr_s[$vl[0]]->gia }}đ</strike><span style='color:red;'>{{$arr_s[$vl[0]]->khuyenmai }} đ</span>@endif
                            <br><div class='btn-group'>
                            <a type="button" class="btn btn-primary" href="chitietsach/{{$arr_s[$vl[0]]->id}}">Chi tiết</a>
							@if(Auth::check())
								<button type="submit" class="btn btn-primary"><img src="https://img.icons8.com/material-sharp/24/fa314a/shopping-cart.png"/></button>
							@else
							    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><img src="https://img.icons8.com/material-sharp/24/fa314a/shopping-cart.png"/></button>					
							@endif
							</div>
						</div>
				<?php $i++;if($i>23){break;} } ?>
    </div>
    
	<div class="modal" id="myModal">
    <div class="div-body" style="height:70%;margin-top:7%;">
        <h2  style="color:white;">ĐĂNG NHẬP</h2>
        <form action="dangnhap" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input class="ten" type="text" name="email" placeholder="Email">
            <input class="matkhau" type="text" name="password" placeholder="Password">
            <input style="width:65%;" type="submit" value="Đăng nhập">
            <h4><a  style="color:white;" href="">Bạn chưa có tài khoản ?</a></h4>
        </form>
  </div>
</div>
@endsection