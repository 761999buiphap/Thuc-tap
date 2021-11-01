<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="la.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="chicago.jpg" alt="Chicago" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="ny.jpg" alt="New York" width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

@extends('user.layout.index')

@section('noidung')
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" ></li>
  <li data-target="#demo" data-slide-to="1" ></li>
  <li data-target="#demo" data-slide-to="2" class="active"></li>
  </ul>
  <div class="carousel-inner">
	@foreach($slide as $sl)
		<div class="carousel-item">
		<img src="user_asset/img/banner/{{$sl->anh}}" alt="New York" width="1100" height="500">
		<div class="carousel-caption">
			<h3>{{$sl->noidung}}</h3>
			<p>{{$sl->link}}</p>
		</div>   
		</div>
		@endforeach
	<div class="carousel-item">
      <img src="user_asset/img/banner/anh-sach.jpg" alt="New York" width="1100" height="500">
      <div class="carousel-caption">
        <h3>aaaaaaaaaaaaaa</h3>
        <p>bbbbbbbbbbbb</p>
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


@foreach($sachmuanhieu as $smn)
				<div >
					<img style="width:120px; " src="admin_asset/img/{{$smn->anh}}" alt="">
					<p>Sách: {{$smn->tensach}}</p>
					@if($smn->khuyenmai==0)<span>{{$smn->gia}}đ</span>@else<strike style="font-size:1vw;">{{$smn->gia}}đ</strike><span style="color:red;">{{$smn->khuyenmai}}đ</span>@endif<br>
					<div class="btn-group">
					<button class="btn btn-primary" class="chitiet" href="">Chi tiết</button>
					<button class="btn btn-primary"><img src="https://img.icons8.com/material-sharp/24/fa314a/shopping-cart.png"/></button>
				</div>
				@endforeach