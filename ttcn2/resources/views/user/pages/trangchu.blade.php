@extends('user.layout.index')

@section('noidung')

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
  		@foreach($slide as $sl)
		<div class="carousel-item">
		<img src="admin_asset/img/slide/{{$sl->anh}}" alt="New York" width="1100" height="500">
		<div class="carousel-caption">
			<h3>{{$sl->noidung}}</h3>
			<p>{{$sl->link}}</p>
		</div>   
		</div>
		@endforeach
    <div class="carousel-item active">
      <img src="user_asset/img/banner/anh-sach.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>We had such a great time in LA!</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<div class="body-chinh">
		<div class="body-danhmuc">
			<p class="p">GÍA TỐT MỖI NGÀY</p>
			<div class="body-danhmuc-giatot">
			@foreach($sachmuanhieu as $smn)
			<form action="themgiohang/{{$smn->id}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="divv">
					<div style="text-align:center;">
					@if($smn->soluong == 0)
						<span style="position:absolute;text-align:center;background-color:grey;z-index:3;color:white;padding:2px 2%;">Hết hàng</span>
						<img style="width:120px; opacity: 0.5;" src="admin_asset/img/{{$smn->anh}}" alt="">
					@else
						<img style="width:120px;" src="admin_asset/img/{{$smn->anh}}" alt="">
					@endif
					</div>
					<p>{{$smn->tensach}}</p>
					@if($smn->khuyenmai==0)<span>{{number_format($smn->gia)}}đ</span>@else<strike style="font-size:1vw;">{{number_format($smn->gia)}}đ</strike><span style="color:red;">{{number_format($smn->khuyenmai)}}đ</span>@endif<br>
					<select name="soluong" id="">
					<?php
					for($i=1;$i<=10;$i++)
					{?>
						<option><?php echo $i; ?></option>	
					<?php } ?>					
					</select><br>
					<div class="btn-group">
					<a type="button" class="btn btn-primary" href="chitietsach/{{$smn->id}}">Chi tiết</a>
					@if(Auth::check())
						<button type="submit" class="btn btn-primary"><img src="https://img.icons8.com/material-sharp/24/fa314a/shopping-cart.png"/></button>
					@else
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><img src="https://img.icons8.com/material-sharp/24/fa314a/shopping-cart.png"/></button>					
					@endif
					</div>
				</div>
			</form>
				@endforeach
			</div>
			<a href="giatotmoingay" style="color: red;">Xem thêm</a>
			<p class="p">SÁCH MUA NHIỀU</p>
			<div class="body-danhmuc-sachmuanhieu">
			<?php $i=0; ?>
				@foreach($arr as $k=>$vl)
				<div >
				<div style="text-align:center;">
					@if($arr_s[$vl[0]]->soluong == 0)
						<span style="position:absolute;text-align:center;background-color:grey;color:white;padding:2px 20px;z-index:3;">Hết hàng</span>
						<img style="width:120px; opacity: 0.5;" src="admin_asset/img/{{$arr_s[$vl[0]]->anh}}" alt="">
					@else
						<img style="width:120px;" src="admin_asset/img/{{$arr_s[$vl[0]]->anh}}" alt="">
					@endif
					</div>
					<p>Sách: covid</p>
					@if($arr_s[$vl[0]]->khuyenmai==0)<span>{{number_format($arr_s[$vl[0]]->gia)}}đ</span>@else<strike style="font-size:1vw;">{{number_format($arr_s[$vl[0]]->gia)}}đ</strike><span style="color:red;">{{number_format($arr_s[$vl[0]]->khuyenmai)}}đ</span>@endif<br>
					<div class="btn-group">
					<button class="btn btn-primary"  href="">Chi tiết</button>
					@if(Auth::check())
						<button type="submit" class="btn btn-primary"><img src="https://img.icons8.com/material-sharp/24/fa314a/shopping-cart.png"/></button>
					@else
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><img src="https://img.icons8.com/material-sharp/24/fa314a/shopping-cart.png"/></button>					
					@endif
					</div>				
					</div>
					<?php $i++; if($i>8){break;} ?>
				@endforeach
			</div>
			<a href="sachmuanhieu" style="color: red;position:absolute;margin-top:27%;">Xem thêm</a>
		</div>
		<div class="body-sanpham">
		<?php $i=0;?>
			@foreach($loaisach as $ls)
				<h5 style="padding-left:3%;padding-top:1%;background-color:#fafafa;width:100%;height:100%;border-radius:3px;"> {{$ls->ten}} </h5>
				<div class="body-sanpham-mamnon">
				<?php foreach($sach[$i] as $s) 
				{ ?>
						<div >
							<form action="themgiohang/{{$s->id}}" method="post" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{csrf_token()}}" />
							<div style="text-align:center;">
							@if($s->soluong == 0)
								<span style="position:absolute;text-align:center;background-color:grey;z-index:3;color:white;padding:2px 20px;">Hết hàng</span>
								<img style="width:120px;height:140px; opacity: 0.5;" src="admin_asset/img/{{$s->anh}}" alt="">
								@else
									<img style="width:120px;height:140px;" src="admin_asset/img/{{$s->anh}}" alt="">
								@endif
							</div>
							<p style='font-size:1vw;'>{{$s->tensach}}  </p>
							<?php if($s->khuyenmai==0)
								echo "<span>$s->gia đ</span>";
							else
								echo "<strike style='font-size:1vw;'>$s->gia đ</strike><span style='color:red;'>$s->khuyenmai đ</span>";
							?>
							<br>
							<select name="soluong" id="">
							<?php
							for($j=1;$j<=10;$j++)
							{?>
								<option><?php echo $j; ?></option>	
							<?php  } ?>					
							</select><br>
							<div class='btn-group'>
							
								<a type="button" class="btn btn-primary" href="chitietsach/{{$s->id}}">Chi tiết</a>
								@if(Auth::check())
									<button type="submit" class="btn btn-primary"><img src="https://img.icons8.com/material-sharp/24/fa314a/shopping-cart.png"/></button>
								@else
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><img src="https://img.icons8.com/material-sharp/24/fa314a/shopping-cart.png"/></button>					
								@endif
							</div>
						</form>
						</div>
				<?php }
				?>
				</div>
				<?php $i++; ?>
			@endforeach
		</div>
	</div>
	<div class="tintuc">
		<p style="margin:10px 0px 10px 0px;text-align: center;background-color: #026e36;background-image: linear-gradient(#026e36, rgb(54, 161, 63));font-size:30px;padding:10px;color: white;">TIN TỨC</p>
		<div class="tintuc1">
			@foreach($tintuc as $tt)
			<div >
				<a><img style="width:100%;height: 150px; " src="admin_asset/img/tintuc/{{$tt->anh}}" alt=""></a><br>
				<a class="tintuc1_a" href="chitiettintuc/{{$tt->id}}">{{$tt->tieude}}</a>
				<p style="height:30px;overflow: hidden;">{{$tt->noidung}}</p>
			</div>
			@endforeach
		</div>
		
	</div>
	<div class="gioithieu">
		<div>
			<img src="https://img.icons8.com/ios-filled/50/26e07f/golf-cart.png"/>
			<p><span style="color: green;font-weight: bold;">MIỄN PHÍ VẬN CHUYỂN</span><br> cho đơn hàng trên 300,000 VNĐ</p>
		</div>
		<div>
			<img src="https://img.icons8.com/android/50/26e07f/money.png"/>
			<p><span style="color: green;font-weight: bold;">SHIP COD TOÀN QUỐC</span><br> Thanh toán khi nhận sách</p>
		</div>
		<div>
			<img src="https://img.icons8.com/ios-filled/50/26e07f/happy--v1.png"/>
			<p><span style="color: green;font-weight: bold;">MIỄN PHÍ ĐỔI TRẢ HÀNG</span><br> MIỄN PHÍ ĐỔI TRẢ HÀNG</p>
		</div>
		<div>
			<img src="https://img.icons8.com/ios-filled/50/26e07f/phone.png"/>
			<p><span style="color: green;font-weight: bold;">HOTLINE:<br></span>0968832922</p>
		</div>
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