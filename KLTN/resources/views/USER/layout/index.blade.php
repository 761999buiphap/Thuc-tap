<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trang chủ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../user/css/trangchu.css">
  <link rel="stylesheet" href="../user/css/slidesanpham.css">
  <base href="{{asset('')}}">
  <script src="js/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<style>
    /* Make the image fully responsive */
    .carousel-inner img {
      width: 100%;
      height: 100%;
    }
    .noterr{
        border:2px solid rgb(18, 107, 110);
        padding:5px;
        text-align:center;
        border-radius:5px;
        margin-top:5%;
        color:rgb(18, 107, 110);
    }
    #danhsach_cay{
    border: 1px solid #ececec;
    width: 100%;
    }
    #danhsach_cay a{
        background-color: white;
        display: block;
        width: 100%;
        border-bottom: 1px solid #ececec;
        text-decoration: none;
        color:black;
        font-weight: bold;
        padding: 5%;width: 100%;
    }
    #danhmuc a{
        background-color: white;
        display: block;
        width: 21%;
        border-top: 1px solid #ccc;
        text-decoration: none;
        color:rgb(18, 107, 110);
        font-weight: bold;
        padding: 4%;width: 100%;
    }
    .carousel-inner img {
        width: 100%;
        height: 100%;
        }
        
    .buttons_added {
        opacity:1;
        display:inline-block;
        display:-ms-inline-flexbox;
        display:inline-flex;
        white-space:nowrap;
        vertical-align:top;
    }
    .is-form {
        overflow:hidden;
        position:relative;
        background-color:#f9f9f9;
        height:4rem;
        width:1.9rem;
        padding:0;
        text-shadow:1px 1px 1px #fff;
        border:1px solid #ddd;
    }
    .is-form:focus,.input-text:focus {
        outline:none;
    }
    .is-form.minus {
        border-radius:4px 0 0 4px;
    }
    .is-form.plus {
        border-radius:0 4px 4px 0;
    }
    .input-qty {
        background-color:#fff;
        height:4rem;
        text-align:center;
        font-size:1.4rem;
        display:inline-block;
        vertical-align:top;
        margin:0;
        border-top:1px solid #ddd;
        border-bottom:1px solid #ddd;
        border-left:0;
        border-right:0;
        padding:0;
    }
    .input-qty::-webkit-outer-spin-button,.input-qty::-webkit-inner-spin-button {
        -webkit-appearance:none;
        margin:0;
    }
    </style>
<body>
    <!--header-->
	@include('USER.layout.header')

    <!--body-->
    @yield('noidung')

    <!--footer-->
	@include('USER.layout.footer')

</body>
<script>
    
    (function(){  
    $('#carousel_number').carousel({ 
    interval: 3600 
    });  
    
    $('#carousel_alphabe').carousel({ 
    interval: 3600 
    });
    $('#carousel_alphabe_2').carousel({ 
    interval: 3600 
    });
    $('#carousel_alphabe_doitac').carousel({ 
    interval: 3600 
    });
    }());
 
    
    
    
    (function(){  $('.carousel-showmanymoveone .item').each(function(){    
    var itemToClone = $(this);
        
    for (var i=1;i<4;i++) {      
    
    itemToClone = itemToClone.next();
        
    if (!itemToClone.length) {        
    itemToClone = $(this).siblings(':first');      
    }
        

    itemToClone.children(':first-child').clone()        
    .addClass("cloneditem-"+(i))        
    .appendTo($(this));    
    }  
    });
    }());
</script>
</html>