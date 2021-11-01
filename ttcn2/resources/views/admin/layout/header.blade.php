<body  style="background-color:#f2f2f2;">
<div class="header">
		<img class="header_logo" src="admin_asset/img/header/logo.JPG" alt="">
		@if(Auth::check())
		<img style="float:left;margin-left:72%;margin-top:10px;" src="https://img.icons8.com/material-rounded/25/26e07f/search-client.png"/> 
		<p style="float:left;"><i style="color:green;"> Xin chào: {{Auth::user()->name}} !</i></p>
		<img style="float:left;margin:10px 0px 0px 1%;" src="https://img.icons8.com/metro/25/26e07f/export.png"/>
		<a style="float:left;margin:15px 0px 0px 3px;color:green;" href="logout">Đăng xuất</a>
	
		@endif
	</div>
	<div class="thanhquanli" >

			<div id='diva' class="div1_dulieu">
				<img src="https://img.icons8.com/metro/20/ffffff/elective.png"/><br><span style="font-size:15px;font-weight:bold"> SÁCH</span>
				<div class="div1_dulieu1">
					<a  href="danhsach-loaisach">LOẠI SÁCH</a>
					<a  href='danhsach-sach/1'>SÁCH</a>
				</div>
			</div>
			<div id='diva'>
				<img src="https://img.icons8.com/material-sharp/20/ffffff/new-slide.png"/><br><a    href="danhsach-slide">SLIDE</a>
			</div>
			<div id='diva' class="div1_dulieu">
				<img src="https://img.icons8.com/metro/20/ffffff/elective.png"/><br><span style="font-size:15px;font-weight:bold"> TIN TỨC</span>
				<div class="div1_dulieu1">
					<a  href="danhsach-loaitin">LOẠI TIN</a>
					<a   href="danhsach-tintuc/1">TIN TỨC</a>
				</div>
			</div>
			<div id='diva'>
				<img src="https://img.icons8.com/metro/20/ffffff/purchase-order.png"/><br><a   href="danhsach-donhang">ĐƠN HÀNG</a>
			</div id='diva'v>
			<div id='diva'>
				<img src="https://img.icons8.com/material/20/ffffff/change-user-male.png"/><br><a   href="danhsach-user/admin">TÀI KHOẢN</a>
			</div>
			<div id='diva'>
				<img src="https://img.icons8.com/ios-filled/20/ffffff/comment-discussion.png"/><br><a   href="danhsach-binhluan">COMMENT</a>
			</div>
			<div id='diva'>
  				<img src="https://img.icons8.com/ios-glyphs/20/ffffff/try-and-buy.png"/><br><a   href="danhsach-khachhang">KHÁCH HÀNG</a>
			</div>
			<div id='diva'>
				<img src="https://img.icons8.com/ios-filled/20/ffffff/add-bookmark.png"/><br><a   href="baocao">BÁO CÁO</a>
			</div>
			<div id='diva'>
				<img src="https://img.icons8.com/material-sharp/20/ffffff/gear.png"/><br><a   href="thongtincanhan">CÀI ĐẶT</a>
			</div>
			<!--<a  id='diva' style="padding:20px;margin-top:20px;" href="danhsach-slide"><img  src="https://img.icons8.com/wired/30/ffffff/car.png"/>SLIDE</a>
			<img style="margin: 0 10px 0 7% ;" src="https://img.icons8.com/wired/30/ffffff/car.png"/><a href="danhsach-tintuc">TIN TỨC</a>
			<img style="margin: 0 10px 0 7% ;" src="https://img.icons8.com/wired/30/ffffff/car.png"/><a href="">ĐƠN HÀNG</a>
			<img style="margin: 0 10px 0 7% ;" src="https://img.icons8.com/wired/30/ffffff/car.png"/><a href="danhsach-user/user">TÀI KHOẢN</a>
			<img style="margin: 0 10px 0 7% ;" src="https://img.icons8.com/wired/30/ffffff/car.png"/><a href="">CÀI ĐẶT</a>-->


			</div>
		</body>