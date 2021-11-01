<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trang quản lí</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../ADMIN/css/giaodienquanli.css">
  <link rel="stylesheet" href="slidesanpham.css">
  <base href="{{asset('')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
  <style>
      #diva{
          height:60px;
      }
      #chartdiv {
    width: 100%;
    height: 500px;
    }		
    #chartdiv_cot {
    width: 100%;
    height: 500px;
    }

    .amcharts-export-menu-top-right {
    top: 10px;
    right: 0;
    }
    #danhsach_tintuc a{
    background-color: #f5f5f5;
    display: block;
    width: 100%;
    border-bottom: 1px solid #ccc;
    text-decoration: none;
    color:rgb(18, 107, 110);
    font-weight: bold;
    padding: 3%;width: 100%;
}
#danhsach_tintuc a:hover{
    background-color: #EF5350;
    color:white;
    
}

</style>
</head>
<body>
    <!--header-->
	@include('admin.layout.header')

    <!--body-->
    @yield('noidung')

    <!--footer-->
    @include('admin.layout.footer')
</body>
</html>