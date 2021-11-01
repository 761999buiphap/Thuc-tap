<div class="headder">
		<img class="header_logo" src="user_asset/img/header/logo.JPG" alt="">
		<form class="header_form" action="timkiemsach">
			<input type="text" name="tukhoa" value="" placeholder="Tìm kiếm...">
			<input type="submit" value="Tìm kiếm">
		</form>
		<div class="header_giohang">
			<img style="width:50%;margin-left:10px;" src="https://img.icons8.com/windows/70/26e07f/fast-cart.png"/>
			@if(Auth::check())
				<br><a  href="giohang">Giỏ hàng</a>
			@else
				<br><a  href="dangnhap">Giỏ hàng</a>
			@endif
		</div>
		@if(Auth::check())
		<div class="header_dangnhap" >
			<img style="margin-left:15px;"  src="https://img.icons8.com/fluent-systems-filled/30/26e07f/user.png"/>
			<br><a ><i style="color:green;">Xin chào: {{Auth::user()->name}} !</i></a>
		</div>
		<div class="header_dangki">
			<img style="margin-left:38px;"  src="https://img.icons8.com/windows/30/26e07f/export.png"/>
			<br><a style="margin-left:32px;" href="logout">Đăng xuất</a>
		</div>
		@else
		<div class="header_dangnhap">
			<img style="margin-left:15px;"  src="https://img.icons8.com/fluent-systems-filled/30/26e07f/user.png"/>
			<br><a href="dangnhap">Đăng nhập</a>
		</div>
		<div class="header_dangki">
			<img style="margin-left:12px;" src="https://img.icons8.com/ios-glyphs/30/26e07f/edit-user-male.png"/>
			<br><a href="">Đăng kí</a>
		</div>
		@endif
	</div>
	
	<div class="thanhquanli" >
			<div class="div1_dulieu">
				<button class="dulieu" ><img src="https://img.icons8.com/ios-filled/30/ffffff/list.png"/><span style="font-size:15px;font-weight:bold"> DANH MỤC SÁCH</span></button>
				<div class="div1_dulieu1">
				<a style="color:white;" href='trangchu'><img style="margin-right: 10px;" src="https://img.icons8.com/ios-filled/20/26e07f/book.png"/>Trang chủ</a>
					@foreach($loaisach as $ls)
						<a style="color:white;" href='loaisach/{{$ls->id}}'><img style="margin-right: 10px;" src="https://img.icons8.com/ios-filled/20/26e07f/book.png"/>{{$ls->ten}}</a>
					@endforeach
					</div>
			</div>
			<img style="margin: 0 10px 0 3% ;" src="https://img.icons8.com/material/30/ffffff/google-news.png"/><a style="text-decoration:none;border:none;color:white;position:absolute;margin-top:0px;" href="tintuc/1">TIN TỨC</a>
			<img style="margin: 0 10px 0 8% ;" src="https://img.icons8.com/material-sharp/30/ffffff/edit-online-order.png"/>
			@if(Auth::check())
				<a style="text-decoration:none;border:none;color:white;margin-top:0px;position:absolute;margin-top:0px;" href="danhsachdonhang">ĐƠN HÀNG</a>
			@else
				<a style="text-decoration:none;border:none;color:white;margin-top:0px;position:absolute;margin-top:0px;" href="dangnhap">ĐƠN HÀNG</a>
			@endif
			<img style="margin: 0 10px 0 10% ;" src="https://img.icons8.com/material-rounded/30/ffffff/business-contact.png"/>
			<a style="text-decoration:none;border:none;color:white;margin-top:0px;position:absolute;margin-top:0px;" href="lienhe">LIÊN HỆ</a>
			<img style="margin: 0 10px 0 11% ;" src="https://img.icons8.com/wired/30/ffffff/free-shipping.png"/><span>Ship COD Trên Toàn Quốc</span>
			<img style="margin: 0 10px 0 4% ;" src="https://img.icons8.com/wired/30/ffffff/phone-not-being-used.png"/><span>0968832922</span>
		</div>
	