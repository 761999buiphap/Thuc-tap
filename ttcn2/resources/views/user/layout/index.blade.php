<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Document</title>
	<base href="{{asset('')}}">
	<style>
		/* Make the image fully responsive */
		.carousel-inner img {
			width: 100%;
			height: 500px;
		}
		.noterr{
			padding: 15px 20px;
			background-color: rgb(192, 252, 229);
			color:#014421;
			width: 50%;
			margin:1% 0px 0px 25%;
			border-radius: 5px;
			text-align: center;
			border: 1px solid grey;
		}
		.headder{
			height: 100px;
			width:100%;
			display: inline-block;
			position: relative;
			background-color: white;
		}
		.headder a{
			color: black;
			text-decoration: none;
		}
		.header_logo{
			width: 20%;
			position: absolute;
			top:20%;left: 7%;
		}

		.header_form{
			position: absolute;
			display: inline-block;
			top:32%;left: 30%;
			width:40%;
			

		}
		.header_form input[type=text]{
			width:73%;height: 34px;
			padding:2%;
			border:1px solid #026e36;
			border-radius: 3px;
			outline: none;
		}
		.header_form input[type=submit]{
			width: 20%;height: 34px;
			background-color: #026e36;
			color:white;
			border: none;
			border-radius: 3px;
		}
		.header_giohang{
			position: absolute;
			left:73%;bottom: 30%;
		}
		.header_dangnhap{
			position: absolute;
			left:80%;bottom: 30%;
			text-align:center;
		}
		.header_dangki{
			position: absolute;
			left:90%;bottom: 30%;
			text-align:center;
		}
		.header_form input[type=text]:focus{

			box-shadow: 0 0px 5px 0 rgb(24, 162, 180);
		}

		.thanhquanli{
		
			font-family: arial;
			width: 100%;height: 40px;
			background-color: #026e36;
			color: white;
			margin-top:0px;
		}
		.dulieu{
			background-color: #026e36;
			color: white;
			border: none;
		
		}

		.div1_dulieu {
			position: relative;
			float: left;
			display: inline-block;
			margin-left: 7%;
		}
		.div1_dulieu1 {
			background-color: #479c70;
			display: none;
			position: absolute;
			min-width: 250px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
		}
		.div1_dulieu1 a {
			padding: 12px 16px;
			text-decoration: none;
			display: block;

		}
		.div1_dulieu:hover .div1_dulieu1 {
			display: block;
			}
		.div1_dulieu:hover, .thanhquanli a:hover {
			background-image: linear-gradient(#026e36, rgb(54, 161, 63));
				color: green;
		}
		.thanhquanli a{
					text-decoration:none; 
					padding:9px;
					font-weight:bold;
					z-index:3;
					border: 1px solid #026e36;
		}
		.banner{
			width: 100%;height: 450px;
		}
		.banner img{
			width: 100%;height: 450px;z-index: -1;

		}

		.body-chinh{
			height: 6500px;width: 100%;
			margin:1% 0;
		}
		.body-danhmuc{
			width: 22%;
			height: 100%;
			margin-left:7%;
			float: left;
			text-align: center;
			background-color: white;
			border:1px solid green;

		}
		.p{
			background-color: #026e36;
			background-image: linear-gradient(#026e36, rgb(54, 161, 63));
			margin: 0px;
			padding:10px;
			text-align: center;
			color: white;
		}
		.body-danhmuc-giatot{
			width: 100%;height: 46%;
			display: grid;
			grid-template-columns: auto;
			text-align: center;
		
		}
		.body-danhmuc-giatot>.divv,.body-danhmuc-sachmuanhieu>div{
			background-color: white;
			font-size: 20px;
			margin: 30px;
			padding: 15px;
		}
		.body-danhmuc-sachmuanhieu{
			width: 100%;height: 46%;
			display: grid;
			grid-template-columns: auto;
		}
		.chitiet{
			color:green;
		}
		.chitiet:hover{
			color:red;
		}
		.body-sanpham{
			width: 65%;
			height: 100%;
			float:left;
			display: grid;
			grid-template-columns: auto;
			margin-left:1%;

		}
		.body-sanpham >div{
			background-color: white;
			font-size: 20px;
			padding:15px;
		}
		
		.body-sanpham-mamnon,.body-sanpham-thieunhi,.body-sanpham-kinang,.body-sanpham-kinhdoanh,.body-sanpham-mevabe, .body-sanpham-vanhoc,.body-sanpham-thamkhao{
			display: grid;
			grid-template-columns: auto auto auto auto;
			text-align: center;
		}
		.psanpham{
			background-color: rgb(77, 70, 70);
			background-image: linear-gradient(rgb(77, 70, 70), rgb(177, 170, 173));
			margin: 0px;
			padding:10px;
			text-align: center;
			font-weight: bold;
			color: white;
		}
		.tintuc{
			height: 350px;width: 100%;
			background-color: white;
			margin-bottom: 10px;
		}
		.tintuc1{
			display: grid;
			grid-template-columns: auto auto auto ;
		}
		.tintuc1>div{
			width: 270px;height:250px;
			margin-left: 20%;
			border:1px solid #e5e5e5;
			padding:10px;
		}
		.tintuc1_a:hover{
			color:red;
		}
		.gioithieu{
			width: 100%;height: 150px;
			background-color: white;
			display: grid;
			grid-template-columns: auto auto auto auto;
		}
		.gioithieu>div{
			margin: 20px;
			width: 250px;
			text-align: center;
		}
		.footer-1{
			width: 100%;height: 220px;
			background-color: #014421;
			display: grid;
			grid-template-columns: auto auto auto auto;
		}
		.footer-1>div{
			color: white;
			margin: 10px;

		}
		.tintuc1 a{
			text-decoration: none;
			color: black;
			font-weight: bold;
		}
		.footer-2{
			width: 100%;height: 50px;
			background-color: #026e36;
			color: white;
			text-align: center;
			padding-top:30px;
		}
		.chitietsach{
			width: 85%;
			height: 1000px;
			background-color: white;
			margin: auto;
			position: relative;
		}
		.chitietsach img{
			width:36%;
			margin: 5% 5% 0px 0%;
			float: left;
		}
		.gia{
			float: left;
			border-right: 1px solid #ccc;
			padding-right: 5%;
			padding-bottom: 7%;
			margin-right: 5%;
		}
		.camket{
			color: #014421;
			
		}
		.noidung{
			position: absolute;
			top:7%;width: 53%;left: 47%;height:100%;
		}
		.trangtintuc{
			width: 64%;height:95%;
			margin:0px 3% 0px 7%;
			float: left;
			display: grid;
			grid-template-columns: auto auto auto;
			background-color: white;
		}
			.trangtintuc>div{
				background-color: white;
				padding:10px;
				margin-bottom: 3px;
				width: 250px;height: 200px;
			}
			.body-danhmuc-tintuc{
				float: left;
				width:23%;height: 700px;
				background-color: white;
			}

			.body-danhmuc-tintuc li{
				color: black;
				border-bottom: 1px solid #026e36;
				background-color: aqua;
				width: 100%;
				list-style-type: none;
			}
			.p{
				background-color: #026e36;
				background-image: linear-gradient(#026e36, rgb(54, 161, 63));
				margin: 0px;
				padding:10px;
				text-align: center;
				color: white;
			}
			.p1{
				background-color:  #026e36;
				color: white;
				margin: 0px;
				padding:10px;
				text-align: center;
			}
			.p1:hover{
				color:rgb(255, 53, 53);
				background-color: rgb(77, 70, 70);
				background-image: linear-gradient(rgb(77, 70, 70), rgb(177, 170, 173));
			}
			
			.tinmoi{
				height:350px;
				display: grid;
				grid-template-columns: auto;
				margin-bottom:5%;
			}
			.div-body{
				width: 50%;
				height: 400px;
				background-color: brown;
				opacity:0.9;
				margin: 1% auto;
				text-align: center;
				padding: 7%;
				border: 1px solid #026e36;
			}
			.div-body h2{
				color:#026e36
			}
			.ten
			{
				background-image: url(https://img.icons8.com/ios-filled/30/000000/email-open.png);
			}
			.div-body input[type=text]{
				background-color: transparent; /* make the button transparent */
				background-repeat: no-repeat;  /* make the background image appear only once */
				background-position: 20px 5px;  /* equivalent to 'top left' */
				cursor: pointer;        /* make the cursor like hovering over an <a> element */
				height: 50px;           /* make this the size of your image */
				padding-left: 20px;     /* make text start to the right of the image */
				vertical-align: middle; /* align the text vertically centered */
				width: 65%;
				padding:0px 60px;
				font-size: larger;
				margin-top:5%;
				border:1px solid #bbb;
				outline:none;
			}
			.div-body input[type=text]:focus{
				border: 1px solid #026e36;
			}
			.div-body input[type=submit]{
				width: 84%;
				padding:0px 60px;
				font-size: larger;
				height: 50px;           /* make this the size of your image */
				margin-top:5%;
				border:1px solid #bbb;
			}
			.div-body input[type=submit]:hover{
				background-color: #026e36;
				color: white;
			}
			.matkhau{
				background-image: url(https://img.icons8.com/ios-filled/30/000000/forgot-password.png);
			}
			.thongtingiohang{
				width: 86%;
				height: 800px;
				margin: auto;
				background-color: white;
				padding: 10px;
			}
			th,td{
				border-bottom: 1px solid #bbb;
				text-align: center;
				width:10%;
			}
			.muahang{
				float:right;
			}
			.tieptucmuahang{
				border: 1px solid #026e36;
				text-decoration: none;
				padding: 15px 30px;
				color:#026e36;
				border-radius: 50px;
				font-weight: bold;
			}
			.tieptucmuahang:hover{
				background-color: #026e36;
				color:white;
			}
			.thanhtoan:hover{
				color:#026e36;
				border: 1px solid #026e36;
				background-color: white;
			}
			.thanhtoan{
				background-color: #026e36;
				text-decoration: none;
				padding: 15px 50px;
				color:white;
				border-radius: 50px;
			}
			.lienhe{
            float: left;
    width: 64%;height:1450px;
    margin:0px 3% 0px 7%;
    background-color: white;
}
    .lienhe h2{
        margin-left: 10px;
    }
    .lienhe img{
        margin: 15% 15%;
    }
	.lienhe div{
		margin-left: 5%;
	}

	</style>
</head>
<body style="font-family: Arial, Helvetica, sans-serif;background-color:#f5f5f5;">
	<!--header-->
    @include('user.layout.header')

	<!--body-->
    @yield('noidung')
	
	<!--footer-->
    @include('user.layout.footer')

</body>
</html>