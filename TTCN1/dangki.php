<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <link rel="stylesheet" href="">
    <style>
        .header{
        height: 100px;
        width: 100%;
    
        top: 0;}
        .imgtrangchu{
        width: 30%;
        height: 95px;
        top: 10px;
        left: 9px;
        
        position: absolute;}
        .thanhdieuhuong{
        list-style-type: none;
        width: 61%;
        height: 40px;
        top: 25px;
        right: 12px;
        overflow: hidden;
        position: absolute;}
        .li{
        float: right;}
        .menu{
     
        display: block;
        text-align: center;
        padding: 10px 10px;
        text-decoration: none;
        color: black;
        font-size: 14px;
        font-family: arial;
        font-weight:bolder;}
        .menu:hover{
        color:rgb(24, 162, 180);
        text-decoration-line: underline;}
    .dangnhap{
        display: block;
        text-align: center;
        padding: 10px 10px;
        text-decoration: none;
        color: black;
        font-size: 14px;
        font-family: arial;
        font-weight:bolder;}
        .dangnhap:hover{
        color:white;}
    .div1{
        background-size: 100% 100%;
        width: 100%;
        height: 150px;
        background-image: url(hinhanh/nen1.jpg);
        background-repeat: no-repeat,repeat;
        position: relative;
        text-align: center;}
    .div1_ul{
            position: absolute;
             display: block;
            list-style-type: none;
            left: 41%;
            top: 50%;}
    .div10_trai{
        width: 550px;
        height: 35%; 
        position: absolute; 
        left: 50%; 
        top:5%;}
    .div10_ul_1{
        list-style-type: none;
        position: absolute;
        display: block;
        overflow: hidden;
        padding: 0px 15px;
        top:0px;}
    .div10_ul_2{
        list-style-type: none;
        position: absolute;
        display: block;
        overflow: hidden;
        padding: 10px 15px;
        top: 25%;}
    .div10_ul_3{
        list-style-type: none;
        position: absolute;
        left: 47%;
        top: 40%;
        display: block;
        overflow: hidden;}
    .dangkinhanbaogia{
        position: absolute;
        border: 1px solid white;
        top: 20%;
        right: 7%; 
        width: 180px; 
        background-color: rgb(24, 162, 180); 
        text-decoration:none; 
        font-family: arial; 
        padding: 14px 25px;
        color: white; }
    .dangkinhanbaogia:hover{
        border-color: yellow;
        color: yellow;}
    #khungdangki{
        width: 40%;
        height: 800px;
        margin-bottom: 10%;
        margin-top: 7%;
        margin-left: 28%;
        padding: 3%; }
    input[type=text],input[type=password]{
        padding: 12px 20px;
        margin: 10px 0px;outline: none;
        width: 85%;}
    input[type=text]:hover,input[type=password]:hover{
        box-shadow: 0 3px 10px 0 rgb(24, 162, 180);
        border:rgb(24, 162, 180);}
    label,#submit,#khungdangki>h3{
        font-family: Arial;}
    
    #huy,#dangki{
        padding: 12px 20px;
        margin-top: 10%;
        border-radius: 10px;
        background-color: rgb(173, 75, 75);
        color: white;
    }
    #huy:hover,#dangki:hover{
        color:black;
        background-color: rgb(24, 162, 180);
    }
    
    .dienthoai{
    position:fixed;
    bottom: 20%;
    right: 2%; 
    border-radius: 50%;
    width: 55px; 
    height: 55px;
    animation-name: example;
    animation-iteration-count: infinite;
    animation-duration: 1s;
    animation-direction: alternate;
}
@keyframes example{
    50% {-ms-transform: rotate(50deg);transform: rotate(50deg); }
    

}
</style>
</head>
<body>
    <div id="header" class="header"></div>       
        <img class="imgtrangchu" src="Capture.PNG" alt="hinh anh trang chu">
        <div class="thanhmenu">
            <ul class="thanhdieuhuong">
                
                <li class="li" style="background-color: rgb(24, 162, 180);"><a class="dangnhap" href="dangnhap.php" style="color: white;" >ĐĂNG NHẬP</a></li>
                <li class="li" style="background-color: rgb(24, 162, 180); border-right:1px solid #bbb;"><a class="dangnhap" href="dangki.php" >ĐĂNG KÍ</a></li>
                <li class="li"><a class="menu" href="lienhe.php">LIÊN HỆ</a></li>
                <li class="li"><a class="menu" href="giaodien.php">GIAO DIỆN</a></li>
                <li class="li"><a class="menu" href="dichvu.php">DỊCH VỤ</a></li>
                <li  class="li"><a class="menu" href="tinbai.php">TIN TỨC - SỰ KIỆN</a></li>
                <li class="li"><a class="menu" href="trangchu.php"  > TRANG CHỦ</a></li>
            </ul>
        </div>
    </div>
    <div class="div1">
        <h2 style="color:white;position: absolute;left: 45%; top: 10%;font-family: arial;">ĐĂNG KÍ</h2>
        <ul class="div1_ul">
            <li style="float: left ;font-weight:bolder;font-family: arial; "><a style="color: white;text-decoration: none;" href="trangchu.php">Trang chủ > </a></li>
            <li style="float: left ;font-weight:bolder;font-family: arial;"><a style="color: white;text-decoration: none;" href="dangnhap.php">Đăng kí</a></li>
        </ul>
    </div>
    <h2 style="text-align: center; margin-top: 7%;color:rgb(24, 162, 180);">PHẦN MỀM QUẢN LÝ PHÒNG KHÁM NHA KHOA BAMBU.FIT</h2>
    <div style="color:red; text-align:center;font-family:arial;">
    <?php 
        $tentk=$matkhau=$matkhau1=$email=$sdt="";
        $tentkerr=$matkhauerr=$matkhau1err=$emailerr=$sdterr="";
        if(isset($_POST['dangki']))
        {            
                if(empty($_POST['tentk']))
                {
                    $tentkerr="* nhập vao tên đăng nhập"; 
                }
                else
                    $tentk=$_POST['tentk'];
                if(empty($_POST['matkhau']))
                {
                    $matkhauerr="* nhập vào mật khẩu"; 
                 }
                else
                    $matkhau=$_POST['matkhau'];
                if(empty($_POST['matkhau1']))
                {
                    $matkhau1err="* nhập vao mật khẩu"; 
                 }
                else
                     $matkhau1=$_POST['matkhau1'];
                if(empty($_POST['email']))
                {
                     $emailerr="* nhập vào E-mail"; 
                  }
                 else
                     $email=$_POST['email'];
                if(empty($_POST['sdt']))
                {
                    $sdterr="* nhập vao số điện thoại"; 
                 }
                else
                    $sdt=$_POST['sdt'];
       
            $CONN = new mysqli('localhost','root','','qlpknk');
            if(!empty($_POST['tentk']) && !empty($_POST['matkhau']) && !empty($_POST['matkhau1']) && !empty($_POST['email']) && !empty($_POST['sdt']))
            {
                $mabn=$_POST['tentk'];
                $truyvankt="SELECT mabn FROM hosobenhnhan WHERE mabn='$mabn'";
                $ketnoikt=mysqli_query($CONN,$truyvankt);
                $rowkt = mysqli_num_rows($ketnoikt);
                if($rowkt<=0)
                {
                    echo "<h1>Không có trong danh sách bệnh nhân  !</h1>";
                }
                else
                {
                    $truyvan = "SELECT tentk FROM taikhoan WHERE tentk='$tentk'";
                    $ketnoi= mysqli_query($CONN,$truyvan) or die("sai");
                    $row = mysqli_num_rows($ketnoi);
                    if($row>0)
                    {
                        echo "<h1>Đã tồn tại tài khoản này !</h1>";
                    }
                    else
                    {
                        $truyvan1= "INSERT INTO taikhoan(tentk,matkhau,email,sdt) VALUE('$tentk','$matkhau','$email','$sdt')";
                        $ketnoi1 = mysqli_query($CONN,$truyvan1);
                        echo "<h1>Đăng kí thành công !</h1>";
                    }
                }
               
                

              
               

            }

        }
        
    ?>
    </div>
    <div class="div2">
        <form method="POST">
            <fieldset id="khungdangki">
                <h3>ĐĂNG KÍ</h3>
                <label for="tentk">Tên đăng nhập:</label>
                <input type="text" id="tentk" name="tentk" placeholder="Mã bệnh nhân"><p style="color:red;"><?php echo $tentkerr  ?></p>
                <label for="matkhau" >Mật khẩu:</label>
                <input type="password" id="matkhau" name="matkhau" placeholder="Passwork"> <p style="color:red;"><?php echo $matkhauerr  ?></p>
                <label for="matkhau" >Xác nhận lại mật khẩu:</label><br>
                <input type="password" id="matkhau1" name="matkhau1" placeholder="Passwork"> <p style="color:red;"><?php echo $matkhau1err  ?></p>
                <label for="matkhau" >E-mail:</label><br>
                <input type="text" id="email" name="email" placeholder="E-mail"> <p style="color:red;"><?php echo $emailerr  ?></p>
                <label for="matkhau" >Số điện thoại:</label><br>
                <input type="text" id="sdt" name="sdt" placeholder="Number phone"> <p style="color:red;"><?php echo  $sdterr  ?></p>
                <input style="margin-left: 400px;" type="submit" id="dangki" name="dangki" value="Đăng kí">

            </fieldset>
        </form>
        
    </div>
    <div  style="position: relative; background-color:rgb(24, 162, 180);padding: 1% 7%;">
        <h3 style="color: white; font-family: arial;" >"HÃY ĐỂ CHÚNG TÔI QUẢN TRỊ, VẬN HÀNH VÀ BẢO TRÌ PHẦN MỀM NHA KHOA CHO BẠN"</h3>
        <a class="dangkinhanbaogia" href="lienhe.php">Đăng kí,nhận báo giá</a>
    </div>
    <div  style="height: 300px; background-color: #f2f2f2;position: relative; ">
        <img style="position: absolute; left: 7%;" src="hinhanh/lienhe.JPG" alt="">
        <div style=" width: 40%;top: 20%;left: 7%; position: absolute;">
            <p><strong>Địa chỉ</strong>: Số 10 tầng 2, TTTM V+, tòa nhà Hòa Bình Green City 505 Minh Khai, Quận Hai Bà Trưng, Hà Nội</p>
            <p><strong>Điện thoại</strong> : 024.22151674 - <strong>Hotline 24/7</strong> : 0942 116 117</p>
            <p><strong>Email</strong>: info@bambu.vn</p>
            <p><strong>Giấy phép ĐKKD</strong>: Số 0104002632 cấp ngày 30/01/2008 bởi Sở Kế Hoạch và Đầu Tư TP. Hà Nội</p>
        </div>
        
        <div class="div10_trai">
            <ul class="div10_ul_1">
                <li style="float: right ;padding: 10px;font-family: arial;">HÌNH THỨC THANH TOÁN</li>
                <li style="float: right ;border-right: 2px solid #bbb; padding: 10px;font-family: arial;">KẾT NỐI VỚI BAMBU.VN</li>
            </ul>
            <ul class="div10_ul_2">
                <li style="float: left;"><a href=""><img  src="hinhanh/facebook.JPG" alt=""></a></li>
                <li style="float: left;"><a href=""><img src="hinhanh/youtube.JPG" alt=""></a></li>
                <li style="float: left;"><a href=""><img src="hinhanh/twe.JPG" alt=""></a></li>
                <li style="float: left;"><a href=""><img src="hinhanh/instagram.JPG" alt=""></a></li>
                <li style="float: left;"><a href=""><img src="hinhanh/goole.JPG" alt=""></a></li>
            </ul> 
        </div>
        <ul class="div10_ul_3">
            <li style="float: left;width: 290px; "><img  src="hinhanh/phongban.JPG" alt=""></li>
            <iframe style="float: left; width: 290px; height: 173px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.8057955710287!2d105.86774071440692!3d21.000420494122245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135adddb6e65abf%3A0xa475a1d91f7768a6!2sC%C3%94NG%20TY%20TNHH%20BAMBU%20VI%E1%BB%86T%20NAM!5e0!3m2!1svi!2s!4v1599795769835!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </ul>
       
    </div>
    <p style="background-color:grey;text-align: center;padding: 1%;">@ Copyright 2018 bambu.net.vn. Thiết kế phát triển bởi Bambu®</p>
    <a href="#header"><img style="position:fixed;bottom: 5%;right: 2%; border-radius: 50%;width: 55px; height: 55px; " src="hinhanh/muiten.jpg" alt=""></a>
    <img id="dienthoai" class="dienthoai" src="hinhanh/dienthoai.png" alt="">
    <a href="https://www.messenger.com/login.php" target="_blank"><img style="position:fixed;bottom: 30%;right: 2%; border-radius: 50%;width: 55px; height: 55px; " src="hinhanh/mess.jpg" alt=""></a>
    <div id="p3"></div>
    <div  id="p2" ></div>
</body>
<script>
    document.getElementById("dienthoai").addEventListener("click", dtt);
    function dtt()
    {
        document.getElementById("p2").style.display = "block";
        document.getElementById("p2").style.width = "25%";
        document.getElementById("p2").style.height = "300px";
        document.getElementById("p2").style.position = "fixed";
        document.getElementById("p2").style.background = "white";
        document.getElementById("p2").style.top= "0px";
        document.getElementById("p2").style.left= "64%";
        document.getElementById("p2").style.boxShadow= "0px 0px 2px 1px #bbb";
        document.getElementById("p2").style.border="1px solid #bbb";
        document.getElementById("p2").style.borderRadius="5px";
        document.getElementById("p2").innerHTML ="<div style='background-color:rgb(24, 162, 180);'><button id='p5' style='margin:2px 2px 2px 92%;padding:3px 6px;color:white;background-color:red;'>X</button></div><div style='width:100%;height:140px;text-align:center;'><img style='width:110px;border-radius:50%;height:110px;margin-top:3%;' src='hinhanh/canhan.jpg' alt=''></div><div style='width:100%;height:130px;background-color:#f2f2f2;font-family:arial;text-align:center;'><br><p>Liên hệ qua số điện thoại<br><strong style='font-size:25px;'>0968832922</strong></p></div>";
        

        document.getElementById("p5").addEventListener("click", pp5);
    }
    function pp5() {
        document.getElementById("p2").style.display = "none";
        document.getElementById("p3").style.display = "none";

    }

</script>
</html>
