<!DOCTYPE html>
<html lang="en">
<head>
	<!--<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="admin_asset/css/suasach.css">
	<link rel="stylesheet" href="admin_asset/css/themslide.css">
	<link rel="stylesheet" href="admin_asset/css/sach.css">
	<link rel="stylesheet" href="admin_asset/css/slide.css">
	<link rel="stylesheet" href="admin_asset/css/themslide.css">
	<link rel="stylesheet" href="admin_asset/css/dstintuc.css">
		<link rel="stylesheet" href="admin_asset/css/loaisach1.css">-->

	<title>Document</title>
	<base href="{{asset('')}}">
	<style>
	.pagination li{
		list-style:none;
		float:left;
		margin-left:5px;
		border:1px solid #ddd;
		color:blue;
		padding:10px 15px;
		background-color:while;
	}
	.header{
    height: 45px;
    width:100%;
    display: inline-block;
    position: relative;
	background-color: white;

	}
	.div2{
		border:1px solid #006832;
		background-color: #026e36;
		background-image: linear-gradient(#026e36, rgb(54, 161, 63));
	}
    .div2form{
            display:inline-block;
            position:absolute;
            margin:10px 2px 0 71%;
        }
    .div2form input{
            padding:5px;
    }
	.header a{
		color: black;
		text-decoration: none;
	}
	.header_logo{
		width: 15%;
		position: absolute;
		top:0%;left: 5%;
	}

	.header_form{
		position: absolute;
		display: inline-block;
		top:32%;left: 30%;
		width:40%;
		

	}
	.header_form input[type=text]{
		width:73%;height: 10px;
		padding:2%;
		border:1px solid #5CAB10;
		border-radius: 3px;
		outline: none;
	}
	.header_form input[type=submit]{
		width: 20%;height: 34px;
		background-color: #036EAD;
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
	}
	.header_dangki{
		position: absolute;
		left:88%;bottom: 30%;
	}
	.header_form input[type=text]:focus{

		box-shadow: 0 0px 5px 0 rgb(24, 162, 180);
	}

	.thanhquanli{
		font-family: arial;
		width: 100%;height: 45px;
		color: white;
		display: grid;
    	grid-template-columns: auto auto auto auto auto auto auto auto auto;
	}
	.thanhquanli>div{
		height:45px;
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
	}
	.div1_dulieu1 {
		margin-top:5px;
		display: none;
		position: absolute;
		background-color: #E67E22;
		min-width: 270px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
	}

	.div1_dulieu1 a {
			color:white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
	}
	#diva{
			text-align:center;
			background-color: #006832;
			padding:5px;
    }
	#diva:hover{
		background-color: #5CAB10;

	}
	.div1_dulieu1 a:hover {background-image: linear-gradient(white, white);
				color: #E67E22;}

	.thanhquanli a,#bt1{
		text-decoration:none; 
		padding:9px;
		color:white;
		font-weight:bold;
		z-index:2;
	}
	.div1_dulieu1 a{
		border: 1px solid white;

	}
	.div1_dulieu:hover .div1_dulieu1 {
		display: block;
		}

	#bt1{
		padding-right: 190px;
	}
	.bodythemloaisach{
		height: 600px;
		background-color:white;
		padding:1% 3% ;
	}
	.bodythemloaisach th{
		background-color: #5CAB10;
	}

	#nen{
		display: none;
		width: 100%;
		height: 650px;
		position: fixed;
		background-color: black;
		z-index: 2;
		top: 0px;
		opacity: 0.5;
	}
	#divthemloaisach{
		display: none;
		left:20%;
		top:20%;
		position: fixed;
		width: 60%;
		height: 400px;
		background-color: #026e36;
		z-index: 3;
		padding:10px;

	}
	#divthemloaisach label{
		margin:20% 0px 0px 23% ;
		color: white;
	}
	#divthemloaisach input[type=text]{
		padding:10px;
		width: 400px;
		margin:0px 0px 0px 23% ;
	}
	#divthemloaisach input[type=submit]{
		padding:10px 20px;
		margin: 10% 0px 0px 45%;
	}
	#themloaisach1{
		position: absolute;
		top:18%;
		margin-left: 91%;
		padding: 8px 5px;
		background-color: #3498DB;
		text-decoration: none;
		border-radius: 3px;
		color: white;
		border: none;
	}
	.bodythemloaisach table{
		position:absolute;
		background-color: white;
		border-collapse: collapse;
	}
	.bodythemloaisach th,.bodythemloaisach td{
		border: 1px solid black;
		padding: 10px 20px;
		width: 150px;
		text-align: center;
		
	}
	.err{
		padding: 15px 20px;
		background-color: pink;
		color: red;
		width: 50%;
		margin:1% 0px 0px 25%;
		border-radius: 5px;
		text-align: center;
		border: 1px solid grey;

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
	.sualoaisach fieldset{
		background-color: white;
		width: 70%;
		height: 350px;
		margin: auto;
		padding-top: 5%;
		margin-bottom:2%;
	}
	.themsach fieldset{
		background-color: white;
		width: 70%;
		height: 900px;
		margin: auto;
		padding-top: 5%;
		margin-bottom:2%;
	}
	.suasach fieldset{
		background-color: white;
		width: 70%;
		height: 1200px;
		margin: auto;
	}
	.themslide fieldset{
		background-color: white;
		width: 70%;
		height: 500px;
		margin: auto;
		padding-top: 5%;
		margin-bottom:3%;
	}
	.themuser fieldset{
		background-color:white;
	}
	input[type=password],.suasach textarea,.themslide input[type=file],select ,fieldset input[type=text],.fieldset input[type=file]{
		padding:10px 20px;
		width: 500px;
		margin-left: 18%;
		margin-bottom: 3%;
		outline: none;

	}
	fieldset label{
		margin-left: 18%;
		font-weight: bold;

	}
	fieldset input[type=submit]{
		padding: 10px 20px;
		background-color: #026e36;
		color: white;
		margin-left:45%;
	}
	.sach-body{
		height: 1000px;width: 100%;
		background-color: white;
		margin:5px 0%;
	}
	.slide-body{
		height: 600px;
		background-color: white;
	}
	.slide-body td{
		border: 1px solid #ccc;
		padding: 5px 28px;
    
	}
	.slide-body th{
		border: 1px solid #ccc;
		padding: 2px 28px;
		font-size:14px;
		background-color:#5CAB10;
		
	}
	.slide-body table{
		border-collapse: collapse;
		margin: 1% 0 0 1%;
		background-color: white;
		position: absolute;
		text-align:center;
	}
	.sach-body-danhmuc{
		width: 20%;
		height: 90%;
		float: left;
		background-color: white;
		margin:1% 1% 0px 1%;
	}
	.tintuc-body {
		height: 800px;width: 100%;
		background-color: white;
	
	}
	.tintuc-body table{
		background-color: white;
		border-collapse: collapse;
		margin-top:1%;left:4%;
		text-align: center;
	}
	.tintuc-body th,.tintuc-body td{
		border: 1px solid #ccc;
		padding:7px;
	}
	.tintuc-body th{
		padding:10px 20px;
	}
	.p{
		background-color:#5CAB10;
		margin: 0px;
		padding:10px;
		text-align: center;
		color: white;
	}
	
	.p1{
				color: #026e36;
				margin: 0px;
				padding:10px;
				text-align: center;
				border: 1px solid #ccc;
				border-top:none;
			}
	.p1:hover{
		color:white;
		background-color: #d5e63e;
		background-image: linear-gradient(#d5e63e, rgb(54, 161, 63));
	}
	#bt{
		border: none;
		border-bottom:1px solid #026e36;
		background-color: rgb(253, 251, 251);
		text-align: center;
		width: 260px;

	}
	.sach-body-sanpham{
		width: 77%;
		float:left;
		display: grid;
		grid-template-columns: auto;
	}
	.sach-body-sanpham table{
		background-color: white;
		border-collapse: collapse;
		margin:1% 0;
		text-align: center;
	}
	.sach-body-sanpham th,.sach-body-sanpham td{
		border: 1px solid #ccc;
	}
	.sach-body-sanpham th{
		padding:10px 5px;
		background-color:#5CAB10;
		font-size: 1vw;

	}
	.div-body{
        width: 50%;
        height: 400px;
        background-color: #fcfdfd;
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
	#themloaisach{
		position: absolute;
		margin-left: 72%;
		font-size: 0.9vw;
		padding: 8px ;
		margin-top:120px;
		background-color: #3498DB;
		text-decoration: none;
		color: white;
		border-radius: 3px;
	}
	th{
		background:grey;
		color:white;
	}
	.xoa{
		text-decoration:none;
		background: #E74C3C;
		padding:5px;
		color:white;
		font-size:13px;
		border-radius:3px;
	}
	.sua{
		text-decoration:none;
		background: #E67E22;
		color:white;
		padding: 5px ;
		font-size:13px;
		margin:0px 5px;
	}
	.table-loaisach th{
		background-color:#5CAB10;
	}
	

	</style>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; background-color: #f2f2f2;">
	<!--header-->
	@include('admin.layout.header')

    <!--body-->
    @yield('noidung')

	<!--footer-->
	@include('admin.layout.footer')
</body>
<script>
	document.getElementById("bt").addEventListener("click", btt);
	
	function btt(){
		document.getElementById("p3").style.display = "block";
		document.getElementById("loaisach").style.display = "block";
		document.getElementById("p2").style.width = "25%";
		document.getElementById("p2").style.height = "300px";
		document.getElementById("p2").style.background = "red";
	}
	document.getElementById("p3").addEventListener("click", dong);
	function dong(){
		document.getElementById("p3").style.display = "none";
		document.getElementById("loaisach").style.display = "none";
	}

</script>
<script src="[ckeditor-build-path]/ckeditor.js"></script>
</html>