<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dịch vụ</title>
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
            left: 40%;
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
    .div5{
        position: relative;
        height: 400px;
        margin-top: 7%;
    }
    .div9 {
        display: grid;
        grid-template-columns: auto auto auto auto;
        grid-gap: 5px;
        padding:5px;
        }

    .div9 > div {
        text-align: center;
        }
    .div9 > div >img{
        box-Shadow: 0px 0px 2px 1px #bbb;
        width:85%;
        height:150px;
    }
    .span1:hover{
        color:red;
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
<body style="font-family:arial;">
    <div id="header" class="header"></div>       
        <img class="imgtrangchu" src="Capture.PNG" alt="hinh anh trang chu">
        <div class="thanhmenu">
            <ul class="thanhdieuhuong"">
                
                <li class="li" style="background-color: rgb(24, 162, 180)"><a class="dangnhap" href="dangnhap.php" >ĐĂNG NHẬP</a></li>
                <li class="li" style="background-color: rgb(24, 162, 180); border-right:1px solid #bbb;"><a class="dangnhap" href="dangki.php" >ĐĂNG KÍ</a></li>
                <li class="li"><a class="menu" href="lienhe.php">LIÊN HỆ</a></li>
                <li class="li"><a class="menu" href="giaodien.php" style="color: rgb(24, 162, 180);"><u>GIAO DIỆN</u></a></li>
                <li class="li"><a class="menu" href="dichvu.php" >DỊCH VỤ</a></li>
                <li  class="li"><a class="menu" href="tinbai.php">TIN TỨC - SỰ KIỆN</a></li>
                <li class="li"><a class="menu" href="trangchu.php" > TRANG CHỦ</a></li>
            </ul>
        </div>
    </div>
    <div class="div1">
        <h2 style="color:white;position: absolute;left: 45%; top: 10%;font-family: arial;">GIAO DIỆN</h2>
        <ul class="div1_ul">
            <li style="float: left ;font-weight:bolder;font-family: arial; "><a style="color: white;text-decoration: none;" href="trangchu.php">Trang chủ > </a></li>
            <li style="float: left ;font-weight:bolder;font-family: arial;"><a style="color: white;text-decoration: none;" href="giaodien.php">Giao diện</a></li>
        </ul>
    </div>
    <h1 style="text-align:center;margin-top:7%;"><span class="span1">Giao diện của<span><span style="color: rgb(0, 174, 255);"> phòng khám<span></h1>
    <div class="div9" >
        <div>
            <img id="i1"  src="hinhanh/AD_hsbs.JPG" alt="">
            <h3>Thông tin bác sĩ</h3>
        </div>
        <div>
            <img id="i2" src="hinhanh/AD_hsnv.JPG" alt="">
            <h3>Thông tin nhân viên</h3>
        </div>
        <div>
            <img id="i3" src="hinhanh/AD_hsbn.JPG" alt="">            
            <h3>Thông tin bệnh nhân</h3>
        </div>
        <div>
            <img id="i4" src="hinhanh/AD_blbs.JPG" alt="">
            <h3>Bảng lương bác sĩ</h3>
        </div> 
        <div>
            <img id="i5" src="hinhanh/AD_blnv.JPG" alt="">
            <h3>Bảng lương nhân viên</h3>
        </div>  
        <div>            
            <img id="i6" src="hinhanh/AD_ykien.JPG" alt="">
            <h3>Tổng hợp ý kiến khách hàng</h3>
        </div>
        <div>
            <img id="i7" src="hinhanh/BS_lichhen.JPG" alt="">
            <h3>Lịch hẹn</h3>
        </div>
        <div>
            <img id="i8" src="hinhanh/BS_phieuketqua.JPG" alt="">
            <h3>Chuẩn đoán</h3>
        </div>
        <div>
            <img id="i9" src="hinhanh/NV_phieukham.JPG" alt="">
            <h3>Phiếu khám bệnh</h3>
        </div>
        <div>
            <img id="i10" src="hinhanh/NV_phieuketqua.JPG" alt="">
            <h3>Phiếu kết quả</h3>
        </div>
        <div>
            <img id="i11" src="hinhanh/BN_phieuykien.JPG" alt="">
            <h3>Phiếu ý kiến khách hàng</h3>
        </div>
        <div>
            <img id="i12" src="hinhanh/BN_lichsukham.JPG" alt="">
            <h3>Hồ sơ bệnh nhân</h3>
        </div>
        <div>
            <img id="i13" src="hinhanh/thongtincanhan.JPG" alt="">
            <h3>Thông tin cá nhân</h3>
        </div>
        <div>
            <img id="i14" src="hinhanh/taikhoan.JPG" alt="">
            <h3>Tài khoản</h3>
        </div>
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
    //Lời gọi hàm
    document.getElementById("dienthoai").addEventListener("click", dt);
    //Khi nhan vao dien thoai
    function dt()
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
    document.getElementById("i1").addEventListener("click", ii1);
    document.getElementById("i2").addEventListener("click", ii2);
    document.getElementById("i3").addEventListener("click", ii3);
    document.getElementById("i4").addEventListener("click", ii4);
    document.getElementById("i5").addEventListener("click", ii5);
    document.getElementById("i6").addEventListener("click", ii6);
    document.getElementById("i7").addEventListener("click", ii7);
    document.getElementById("i8").addEventListener("click", ii8);
    document.getElementById("i9").addEventListener("click", ii9);
    document.getElementById("i10").addEventListener("click", ii10);
    document.getElementById("i11").addEventListener("click", ii11);
    document.getElementById("i12").addEventListener("click", ii12);
    document.getElementById("i13").addEventListener("click", ii13);
    document.getElementById("i14").addEventListener("click", ii14);

    //các hàm xử lý
    function ii1() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1030px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button>"+
        "<img style='width: 100%;height:100% ;' src='hinhanh/AD_hsbs.jpg' alt=''></div>";
        macdinh2();
    
    }
    function ii2() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1030px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button>"+
        "<img style='width: 100%;height:100% ;' src='hinhanh/AD_hsnv.jpg' alt=''></div>";
        macdinh2();
    
    }
    function ii3() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1030px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button>"+
        "<img style='width: 100%;height:100% ;' src='hinhanh/AD_hsbn.jpg' alt=''></div>";
        macdinh2();
    
    }
    function ii4() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1030px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button>"+
        "<img style='width: 100%;height:100% ;' src='hinhanh/AD_blbs.jpg' alt=''></div>";
        macdinh2();
    
    }
    function ii5() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1030px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button>"+
        "<img style='width: 100%;height:100% ;' src='hinhanh/AD_blnv.jpg' alt=''></div>";
        macdinh2();
    
    }
    function ii6() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1030px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button>"+
        "<img style='width: 100%;height:100% ;' src='hinhanh/AD_ykien.jpg' alt=''></div>";
        macdinh2();
    
    }
    function ii7() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1030px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button>"+
        "<img style='width: 100%;height:100% ;' src='hinhanh/BS_lichhen.jpg' alt=''></div>";
        macdinh2();
    
    }
    function ii8() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1030px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button>"+
        "<img style='width: 100%;height:100% ;' src='hinhanh/BS_phieuketqua' alt=''></div>";
        macdinh2();
    
    }
    function ii9() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1030px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button>"+
        "<img style='width: 100%;height:100% ;' src='hinhanh/NV_phieukham.jpg' alt=''></div>";
        macdinh2();
    
    }
    function ii10() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1030px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button>"+
        "<img style='width: 100%;height:100% ;' src='hinhanh/NV_phieuketqua.jpg' alt=''></div>";
        macdinh2();
    
    }
    function ii11() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1030px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button>"+
        "<img style='width: 100%;height:100% ;' src='hinhanh/BN_phieuykien.jpg' alt=''></div>";
        macdinh2();
    
    }
    function ii12() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1030px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button>"+
        "<img style='width: 100%;height:100% ;' src='hinhanh/BN_lichsukham.jpg' alt=''></div>";
        macdinh2();
    
    }
    function ii13() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1030px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button>"+
        "<img style='width: 100%;height:100% ;' src='hinhanh/thongtincanhan.jpg' alt=''></div>";
        macdinh2();
    
    }
    function ii14() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1030px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button>"+
        "<img style='width: 100%;height:100% ;' src='hinhanh/taikhoan.jpg' alt=''></div>";
        macdinh2();
    
    }

    function macdinh()
    {
    document.getElementById("p2").style.display = "block";
    document.getElementById("p2").innerHTML = "phap";
    document.getElementById("p2").style.width = "80%";
    document.getElementById("p2").style.height = "550px";
    document.getElementById("p2").style.position = "fixed";
    document.getElementById("p2").style.background = "white";
    document.getElementById("p2").style.top= "5%";
    document.getElementById("p2").style.left= "10%";

    }
    function macdinh2(){

    document.getElementById("p3").style.display = "block";
    document.getElementById("p3").style.background = "black";
    document.getElementById("p3").style.width = "100%";
    document.getElementById("p3").style.height = "700px";
    document.getElementById("p3").style.position = "fixed";
    document.getElementById("p3").style.top = "0px";
    document.getElementById("p3").style.opacity = "0.7";
    document.getElementById("p2").style.zindex = "2";
    document.getElementById("p3").style.zindex = "1";

    document.getElementById("p5").addEventListener("click", pp5);
    }
    function pp5() {
        document.getElementById("p2").style.display = "none";
        document.getElementById("p3").style.display = "none";

    }

</script>
</html>
