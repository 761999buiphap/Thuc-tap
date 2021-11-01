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
        height: 600px;
        margin-top: 7%;
    }
    .div5dichvu{
        font-family: Arial;
        margin-top: 3%;
        text-decoration: none;
        color: black;
    }
    .div5dichvu:hover{
        color: red;
        font-size:35px;
    }
    .div5tinhnangtrai{
        left: 15%;
        position: absolute;
        width: 35%;
        top: 25%;
    }
    .div5tinhnangphai{
        left: 60%;
        position: absolute;
        width: 35%;
        top: 25%;
    }
    .div5h3{
        color: black;
        text-decoration: none;
        font-family: Arial;
    }
    .div5h3:hover{
        color: red;
        
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
            <ul class="thanhdieuhuong"">
                
                <li class="li" style="background-color: rgb(24, 162, 180)"><a class="dangnhap" href="dangnhap.php" >ĐĂNG NHẬP</a></li>
                <li class="li" style="background-color: rgb(24, 162, 180); border-right:1px solid #bbb;"><a class="dangnhap" href="dangki.php" >ĐĂNG KÍ</a></li>
                <li class="li"><a class="menu" href="lienhe.php">LIÊN HỆ</a></li>
                <li class="li"><a class="menu" href="dichvu.php" style="color: rgb(24, 162, 180);"><u>DỊCH VỤ</u></a></li>
                <li  class="li"><a class="menu" href="tinbai.php">TIN TỨC - SỰ KIỆN</a></li>
                <li class="li"><a class="menu" href="trangchu.php" > TRANG CHỦ</a></li>
            </ul>
        </div>
    </div>
    <div class="div1">
        <h2 style="color:white;position: absolute;left: 45%; top: 10%;font-family: arial;">DỊCH VỤ</h2>
        <ul class="div1_ul">
            <li style="float: left ;font-weight:bolder;font-family: arial; "><a style="color: white;text-decoration: none;" href="trangchu.php">Trang chủ > </a></li>
            <li style="float: left ;font-weight:bolder;font-family: arial;"><a style="color: white;text-decoration: none;" href="dichvu.php">Dịch vụ</a></li>
        </ul>
    </div>
    <div class="div5" >
        <h2 style="text-align: center;"><a class="div5dichvu" href=""> DỊCH VỤ</a></h2>
        <hr style="background-color: rgb(24, 162, 180)" width="10%">
            <div class="div5tinhnangtrai">
                <h3 id="laycao" class="div5h3"  >Lấy cao răng</h3>
                <p>Thủ thuật lấy vôi răng là một trong những thủ thuật phổ biến nhất tại các phòng khám nha khoa. </p>
                <h3 id="dthu" class="div5h3"  >Nhổ răng</h3>
                <p>Doanh thu bác sĩ - nhân viên được tính theo lương cơ bản từng phòng khám, cộng thêm thưởng doanh thu, thưởng thủ thuật, thêm giờ, thưởng khác....</p>
                <h3 id="tkhoan" class="div5h3"  >Niềng răng</h3>
                <p> Một hàm răng đều và trắng luôn là mơ ước của rất nhiều người. Tuy nhiên, không phải ai cũng có may mắn này.<br><br><br></p>
                
        </div>
        <div class="div5tinhnangphai">

            <h3 id="ttin" class="div5h3"  >Tẩy trắng răng laser </h3>
            <p>Tẩy trắng răng là một phương pháp làm trắng răng được chỉ định trong trường hợp men răng bị ố màu do quá trình ăn uống hàng ngày.  </p>  
            <h3 id="lhen" class="div5h3" >Răng sứ thẩm mỹ </h3>
            <p>Trường hợp răng nhiễm Tetracycline, các phương pháp tẩy trắng răng sẽ không có hiệu quả. Vì vậy, bạn cần tìm cho mình một giải pháp giúp giải quyết tình trạng này. Bọc răng sứ chính là phương pháp giúp làm răng trắng hữu hiệu nhất trong trường hợp này. </p>
            
            
        </div>
        <img style="position: absolute;left: 52%;border-radius: 50%;top: 45%;width:6%;" src="hinhanh/nhor.jpg" alt="">
        <img style="position: absolute;left: 7%;border-radius: 50%;top: 45%;width:6%;" src="hinhanh/nr1.png" alt="">
        <img style="position: absolute;left: 7%;border-radius: 50%;top: 28%;width:6%;height:80px;" src="hinhanh/lcr1.jpg" alt="">
        <img style="position: absolute;left: 7%;border-radius: 50%;top: 60%;width:6%;" src="hinhanh/niengr.jpg" alt="">
        <img style="position: absolute;left: 52%;border-radius: 50%;top: 28%;width:6%;" src="hinhanh/rs.png" alt="">
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
    document.getElementById("lhen").addEventListener("click", lh);
    document.getElementById("tkhoan").addEventListener("click", tk);
    document.getElementById("dgia").addEventListener("click", dg);
    document.getElementById("ttin").addEventListener("click", tt);
    document.getElementById("cdoan").addEventListener("click", cd);
    document.getElementById("laycao").addEventListener("click", lc);
    document.getElementById("dthu").addEventListener("click", dtbs);
    document.getElementById("tthuat").addEventListener("click", tt);
    

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
    function lc() 
    {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 36%;font-family:arial;'>DỊCH VỤ NIỀNG RĂNG</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 35%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;'>Niềng răng</a></li></ul></div>"+
    "<p style='font-family:arial;text-align: justify;font-size:18px;margin:5%;width:60%;'>Một hàm răng đều và trắng luôn là mơ ước của rất nhiều người. Tuy nhiên, không phải ai cũng có may mắn này. Vì vậy, các phương pháp chỉnh nha được sinh ra để giúp bạn giải quyết tình trạng răng thưa, răng móm và răng hô. Niềng răng là một phương pháp chỉnh nha sử dụng tác động vật lý để đưa răng vào đúng vị trí. Niềng răng được sử dụng rất phổ biến trong các trường hợp như: răng thưa, răng móm, răng hô…<br> Các loại niềng răng:<br>- Niềng răng thưa:Răng thưa là tình trạng giữa các răng có khoảng cách lớn hơn so với bình thường. Nguyên nhân gây ra tình trạng răng thưa có thể kể đến như:Yếu tố di truyền,Răng sữa bị hỏng nặng, Thói quen sinh hoạt…<br>- Niềng răng móm:Răng móm là tình trạng phần hàm dưới bị đưa ra quá nhiều so với hàm trên. Vì vậy, hàm trên và hàm dưới không thể căn khít, ảnh hưởng tới chức năng nhai. Những người bị móm thường có phần cằm dài bất thường và đẩy về phía trước so với khuôn mặt.<br>- Niềng răng hô:Răng hô là tình trạng răng hoặc hàm trên bị đẩy nhô ra so với bình thường. Điều này khiến người gặp phải tình trạng răng hô khó khép miệng. Đồng thời chức năng cắn xé và nhai đồ ăn của răng bị ảnh hưởng. Không chỉ gây mất tự tin trong giao tiếp, răng hô trên thực tế còn gây ảnh tới sinh hoạt và ăn uống hàng ngày.</p>"+
    "<img style='width: 23%;height:45% ;left: 70%;top:45%;position: absolute;' src='hinhanh/niengrang.jpg' alt=''>";
    macdinh2();
    }
    function tk() 
{
    macdinh();
    document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 36%;font-family:arial;'>DỊCH VỤ NIỀNG RĂNG</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 35%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;'>Niềng răng</a></li></ul></div>"+
   "<p style='font-family:arial;text-align: justify;font-size:18px;margin:5%;width:60%;'>Một hàm răng đều và trắng luôn là mơ ước của rất nhiều người. Tuy nhiên, không phải ai cũng có may mắn này. Vì vậy, các phương pháp chỉnh nha được sinh ra để giúp bạn giải quyết tình trạng răng thưa, răng móm và răng hô. Niềng răng là một phương pháp chỉnh nha sử dụng tác động vật lý để đưa răng vào đúng vị trí. Niềng răng được sử dụng rất phổ biến trong các trường hợp như: răng thưa, răng móm, răng hô…<br> Các loại niềng răng:<br>- Niềng răng thưa:Răng thưa là tình trạng giữa các răng có khoảng cách lớn hơn so với bình thường. Nguyên nhân gây ra tình trạng răng thưa có thể kể đến như:Yếu tố di truyền,Răng sữa bị hỏng nặng, Thói quen sinh hoạt…<br>- Niềng răng móm:Răng móm là tình trạng phần hàm dưới bị đưa ra quá nhiều so với hàm trên. Vì vậy, hàm trên và hàm dưới không thể căn khít, ảnh hưởng tới chức năng nhai. Những người bị móm thường có phần cằm dài bất thường và đẩy về phía trước so với khuôn mặt.<br>- Niềng răng hô:Răng hô là tình trạng răng hoặc hàm trên bị đẩy nhô ra so với bình thường. Điều này khiến người gặp phải tình trạng răng hô khó khép miệng. Đồng thời chức năng cắn xé và nhai đồ ăn của răng bị ảnh hưởng. Không chỉ gây mất tự tin trong giao tiếp, răng hô trên thực tế còn gây ảnh tới sinh hoạt và ăn uống hàng ngày.</p>"+
   "<img style='width: 23%;height:45% ;left: 70%;top:45%;position: absolute;' src='hinhanh/niengrang.jpg' alt=''>";
   macdinh2();
}

    function dg() 
    {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 31%;font-family:arial;'>QUẢN LÝ ĐÁNH GIÁ CỦA KHÁCH HÀNG</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 35%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;'>Đánh giá của khách hàng</a></li></ul></div>"+
    "<p style='font-family:arial;text-align: justify;font-size:18px;margin:7% 0px 0px 5%;width:60%;'> <br>- Việc tầm soát và chẩn đoán sớm bệnh là một trong những vấn đề có tính chất quyết định đến hiệu quả điều trị của người bệnh.<br><br>- Giúp phòng khám dễ nắm bắt được tình hình hiện tại. Từ đó đưa ra những quyết định sửa đổi những bất cập, nhược điểm của phòng khám và đồng thời nắm bắt được những ưu điểm để phát huy một cách tích cực...</p>"+
    "<img style='width: 30%;height:200px ;left: 68%;top:45%;position: absolute;' src='hinhanh/dg.JPG' alt=''>";
    macdinh2();
    }

    function cd() 
    {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 34%;font-family:arial;'>QUẢN LÝ THỦ THUẬT - CHUẨN ĐOÁN</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 35%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;'>Quản lí thủ thuật - chuẩn đoán</a></li></ul></div>"+
        "<p style='font-family:arial;text-align: justify;font-size:18px;margin:5%;width:60%;'>-Việc tầm soát và chẩn đoán sớm bệnh là một trong những vấn đề có tính chất quyết định đến hiệu quả điều trị của người bệnh.<br><br>-Chẩn đoán là thuật ngữ đơn giản diễn tả tình trạng hay diễn tiến của bệnh của bệnh nhân. Khả năng đưa ra chẩn đoán một cách chính xác là vấn đề cơ bản trong thực hành lâm sàng. Chỉ với một chẩn đoán đúng hoặc một danh sách ngắn gọn các chẩn đoán có khả năng.<br><br>-<strong> Kết luận việc chuẩn đoán với phiếu kết quả, phiếu đó bao gồm các thông tin liên quan đến:</strong><br>+ Lịch hẹn tái khám<br>+ Đơn thuốc<br>+ Thủ thuật</p>"+
    "<img style='width:28%;height:40% ;left:66%;top:40%;position: absolute;' src='hinhanh/NV_phieuketqua.JPG' alt=''>";
    macdinh2();
    }

    //Khi nhấn vào quản lý doanh thu bac sy
    function dtbs() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 35%;font-family:arial;'>QUẢN LÝ DOANH THU BÁC SĨ</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 33%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='dichvu.html'>Dịch vụ > </a></li><li style='float: left ;font-weight:bolder;font-family: arial;'><a style='color: white;'>Doanh thu bác sĩ</a></li></ul></div>"+
        "<p style='width: 86%;height: 350px;margin-left: 7%;text-align: justify;margin-top: 7%;font-family: arial;'>Tiền lương cho bác sĩ và nhân viên là chi phí lớn của phòng khám, nên chúng ta cần phải theo dõi và phản ánh kịp thời. <br>Đặc biệt tiền lương chi trả cho bác sĩ khá là phức tạp. Ngoài tiền lương cơ bản, thì còn có thưởng thủ thuật, thưởng doanh thu theo tỉ lệ phần trăm, thêm giờ v.v… <span style='color: rgb(24, 162, 180);'>Phần mềm quản lý Nha khoa</span><span style='color: red;'>BambuFit sẽ giúp Phòng khám:</span><br>- Tạo bảng lương đơn giản, dễ dàng, nhanh chóng. <br>- <span style='color: red;'>Thông tin lưu trữ  dữ liệu đầy đủ:</span> Lương cơ bản, hệ số, ngày công, lương thực tế, thêm giờ, thưởng doanh thu (thực thu, %), thưởng thủ thuật, thưởng khác, phụ cấp (cơm xe, trách nhiệm), bảo hiểm, tạm ứng, thực lĩnh. <br>- Hiển thị thông tin trực quan, sinh động với đầy đủ các thông tin <br>- <span>Dễ dàng điều chỉnh</span>, thay đổi các thông tin của bảng lương <br>- Lên báo cáo thống kê bảng lương <span style='color: red;'>chi tiết theo tháng</span>.<br>"+
        "- <span style='color: red;'>Báo cáo tổng hợp doanh thu cho nhân viên</span> Thống kê Họ tên, doanh số, đã thu, tiêu hao, tổng tiền, thưởng (%), thưởng d.thu, ghi chú nếu có <br>- Hỗ trợ <span style='color: red;'>tìm kiếm doanh thu</span> theo ngày, tháng, năm <br>- <span style='color: red;'>Kết xuất ra file Excel</span> Bảng lương, doanh thu để lưu trữ <br>- <span style='color: red;'>In dữ liệu trực tiếp </span></p>";
        macdinh2();
    }

    //khi nhấn vào thủ thuật
    function tt() {
    macdinh();
    document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 36%;font-family:arial;'>QUẢN LÝ THÔNG TIN NHÂN SỰ</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 35%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;'>Quản lí thông tin nhân sự</a></li></ul></div>"+
    "<p style='font-family:arial;text-align: justify;font-size:18px;margin:5%;width:60%;'>- Quản lý thông tin nhân sự là một việc bắt buộc đối với hầu hết các doanh nghiệp. Việc quản lý thông tin nhân sự, giúp cho lãnh đạo không chỉ nắm được thông tin nhân viên mà còn hiểu được năng lực, quá trình học tập, công tác, tiểu sử bản thân, thành tích khen thưởng của toàn nhân viên trong công ty ... từ đó có quyết định giao việc, phân chia công việc một cách hợp lý. Thực hiện tốt được công việc này giúp công ty sẽ quản lý và sử dụng lao động một cách hiệu quả và tăng năng suất lao động của toàn thể cán bộ, công nhân viên<br>- Lưu trữ thông tin nhân viên về họ tên, email, số điện thoại, ngày tháng năm sinh, thông tin chi tiết sơ yếu lý lịch của nhân viên, thông tin liên lạc, trình độ chuyên môn và tình trạng sức khỏe của từng nhân viên.<br>- Quản lý thông tin của nhân viên để biết được quá trình thăng tiến của một nhân viên và các chính sách đãi ngộ đã hợp lý hay chưa?<br>- Chúng tôi coi trọng bảo mật dữ liệu cá nhân. Chúng tôi thực hiện việc phân quyền và bảo vệ dữ liệu của nhân viên</p>"+
    "<img style='width:30%;height:60% ;left:66%;top:40%;position: absolute;' src='hinhanh/AD_hsbs.JPG' alt=''>";
    macdinh2();
    }

    //Khi nhấn vào lịch hẹn
    function lh() {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 31%;font-family:arial;'>DỊCH VỤ RĂNG SỨ THẨM MỸ</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 33%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;'>Răng sứ thẩm mỹ</a></li></ul></div>"+
        "<p style='font-family:arial;text-align: justify;font-size:18px;margin:7% 0px 0px 5%;width:60%;'> <br>Trường hợp răng nhiễm Tetracycline, các phương pháp tẩy trắng răng sẽ không có hiệu quả. Vì vậy, bạn cần tìm cho mình một giải pháp giúp giải quyết tình trạng này. Bọc răng sứ chính là phương pháp giúp làm răng trắng hữu hiệu nhất trong trường hợp này. Bọc răng sứ có hai hình thức chính: bọc toàn bộ, bọc mặt ngoài<br><br>Với phương pháp bọc toàn bộ, các nha sĩ sẽ thực hiện mài nhỏ răng thật (xử lý tủy răng nếu cầu) và chụp ra bên ngoài răng thật răng sứ. Tuy nhiên nếu chất lượng răng bạn tốt, bọc mặt ngoài răng chính là phương pháp được các nha sĩ khuyến dùng hơn hết. Các nha sĩ sẽ tiến hành mài bề mặt răng một ít khoảng 0,2 mm. Sau đó, nha sĩ sẽ sử dụng một lớp sư mô phỏng răng thật với độ dày 0.5-0.6 mm để dán lên bề mặt răng thật. Với phương pháp này, bạn sẽ giải quyết được tình trạng răng xỉn màu. Đồng thời mang lại vẻ đẹp hài hòa cho toàn bộ hàm răng.</p>"+
        "<img style='width: 30%;height:250px ;left: 68%;top:45%;position: absolute;' src='hinhanh/rangsu.JPG' alt=''>";
        macdinh2();
    
    }
    function macdinh()
    {
    document.getElementById("p2").style.display = "block";
    document.getElementById("p2").innerHTML = "phap";
    document.getElementById("p2").style.width = "90%";
    document.getElementById("p2").style.height = "600px";
    document.getElementById("p2").style.position = "fixed";
    document.getElementById("p2").style.background = "white";
    document.getElementById("p2").style.top= "5%";
    document.getElementById("p2").style.left= "5%";
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
