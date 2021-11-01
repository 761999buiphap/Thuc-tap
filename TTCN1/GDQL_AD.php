<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
.div4{ position: relative;padding: 10%;background-image: url(../TTCN1/hinhanh/div46.JPG);}
.div4thongtin{
    width: 40%;
    top: 10%;
    position: absolute;
}
.div4h3{
    position: absolute;
    top: 0%;
    left:8%;
    font-family: Arial
}
.div4thongtin1{
    width: 40%;
    top: 30%;
    position: absolute;
}
.div4img1{
    position: absolute;
    top: 10%;
    width: 35%;
    left: 58%;
}
.div4timhieuthem{
    position: absolute;
    top: 85%;
    padding: 10px 20px;
    left: 73%;
    text-align: center;
    background-color: white;
    text-decoration: none;
    border-radius: 8px;
    border:1px solid rgb(24, 162, 180);
    color:rgb(24, 162, 180);
}
.div4timhieuthem:hover{
    background-color: rgb(24, 162, 180);
    color: white;
}
.div5{
    position: relative;
    background-color:#f2f2f2;
    height:500px;
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
}
.div5tinhnangphai{
    left: 60%;
    position: absolute;
    width: 35%;
}
.div5h3{
    color: black;
    text-decoration: none;
    font-family: Arial;
}
.div5h3:hover{
    color: red;
    
}
.div6{
    position: relative;padding: 20px;
}
.div6giaodien{
    font-family: Arial;
    margin-top: 3%;
    text-decoration: none;
    color: black;
}
.div6giaodien:hover{
    color: red;
    font-size:35px;
}
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
    color: white; 
}
.dangkinhanbaogia:hover{
    border-color: yellow;
    color: yellow;
}
.div8tintuc{
    font-family: Arial;
    text-align: center; 
    margin-top: 3%;
    text-decoration: none;
    color: black;

}
.div8tintuc:hover{
    color:red;
    font-size:30px;
}
.div8_tin1{
    width: 25%;
    left: 7%;
    top: 17%;
    position: absolute;
}

.div8_tin2{
    width: 25%;
    left: 37%;
    top: 17%;
    position: absolute;
}
.div8_tin3{
    width: 25%;
    left: 68%;
    top: 17%;
    position: absolute;
}
.div8hover:hover{
    color: red;
}
.div10_trai{
    width: 550px;
    height: 35%; 
    position: absolute; 
    left: 50%; 
    top:5%;
    
}
.div10_ul_1{
    list-style-type: none;
    position: absolute;
    display: block;
    overflow: hidden;
    padding: 0px 15px;
    top:0px;
}
.div10_ul_2{
    list-style-type: none;
    position: absolute;
    display: block;
    overflow: hidden;
    padding: 10px 15px;
    top: 25%;
}
.div10_ul_3{
    list-style-type: none;
    position: absolute;
    left: 47%;
    top: 40%;
    display: block;
    overflow: hidden;

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
<body  >
    <?php   include("GDQL_admin.php") ; ?>
    <div class="div3" >
        <h2 style="font-family: Arial, Helvetica, sans-serif; margin-top: 3%;">PHẦN MỀM QUẢN LÝ NHA KHOA ONLINE BAMBUFIT</h2>
    </div>
    <div class="div4" >
        <div class="div4thongtin">
            <img class="div4img" src="hinhanh/div4.jpg" alt="">
            <h3 class="div4h3">GIỚI THIỆU</h3>
        </div>
        <div class="div4thongtin1">
        <p style="font-size:larger;text-align: justify;">"Phần mềm quản lý phòng khám nha khoa BambuFit là một phần mềm được xây dựng bởi những người am hiểu về chuyên môn nha khoa, kỹ thuật, và quản lý phòng khám. BambuFit luôn hướng tới người sử dụng, tạo nên một phần mềm có tính linh hoạt cực cao, có thể mở rộng thêm các chức năng đặc biệt của từng phòng khám theo yêu cầu."</p>
        <button id="timhieuthem" class="div4timhieuthem">Tìm hiểu thêm</button>
        
        </div>
         <img class="div4img1" src="hinhanh/div45.JPG" alt="">
    
    </div>
    <div class="div5" >
        <h2 style="padding: 2%;background-color: rgb(24, 162, 180); text-align: center; color: white;font-family: Arial; opacity: 0.8;" >Hơn 500 khách hàng tin dùng trong hơn 10 năm qua!</h2>
        <h2 style="text-align: center;"><a class="div5dichvu" href=""> DỊCH VỤ</a></h2>
        <hr style="background-color: rgb(24, 162, 180)" width="10%">
        <div class="div5tinhnangtrai">
                <h3 id="hosobenhnhan" class="div5h3" >Lấy cao răng</h3>
                <p>Thủ thuật lấy vôi răng là một trong những thủ thuật phổ biến nhất tại các phòng khám nha khoa. </p>
                <h3 id="doanhthubacsy" class="div5h3"  >Nhổ răng</h3>
                <p>Doanh thu bác sĩ - nhân viên được tính theo lương cơ bản từng phòng khám, cộng thêm thưởng doanh thu, thưởng thủ thuật, thêm giờ, thưởng khác....</p>
                <h3 id="taikhoan" class="div5h3"  >Niềng răng</h3>
                <p> Một hàm răng đều và trắng luôn là mơ ước của rất nhiều người. Tuy nhiên, không phải ai cũng có may mắn này.<br><br><br></p>
        </div>
        <div class="div5tinhnangphai">
                <h3 id="tayrang" class="div5h3"  >Tẩy trắng răng laser </h3>
                <p>Tẩy trắng răng là một phương pháp làm trắng răng được chỉ định trong trường hợp men răng bị ố màu do quá trình ăn uống hàng ngày.  </p>  
                <h3 id="danhgia" class="div5h3"  >Răng sứ thẩm mỹ </h3>
                <p>Trường hợp răng nhiễm Tetracycline, các phương pháp tẩy trắng răng sẽ không có hiệu quả. Vì vậy, bạn cần tìm cho mình một giải pháp giúp giải quyết tình trạng này. Bọc răng sứ chính là phương pháp giúp làm răng trắng hữu hiệu nhất trong trường hợp này. </p>
                
        </div>
        <img style="position: absolute;left: 52%;border-radius: 50%;top: 54%;width:6%;" src="hinhanh/nhor.jpg" alt="">
        <img style="position: absolute;left: 7%;border-radius: 50%;top: 54%;width:6%;" src="hinhanh/nr1.png" alt="">
        <img style="position: absolute;left: 7%;border-radius: 50%;top: 35%;width:6%;height:80px;" src="hinhanh/lcr1.jpg" alt="">
        <img style="position: absolute;left: 7%;border-radius: 50%;top: 75%;width:6%;" src="hinhanh/niengr.jpg" alt="">
        <img style="position: absolute;left: 52%;border-radius: 50%;top: 35%;width:6%;" src="hinhanh/rs.png" alt="">
    </div>
    
    <div class="div7" style="padding: 120px; background-image: url(../TTCN1/hinhanh/nhanxet.JPG);"></div>
    <div class="div8" style="height: 450px;position: relative;">
        <h2 style="text-align: center;" ><a href="tinbai.php" class="div8tintuc"> TIN TỨC - SỰ KIỆN </a></h2>
        <hr style="background-color: rgb(24, 162, 180)" width="10%">
        <div class="div8_tin1">
            <img id="div8a1" style="width: 100%;height: 205px;" src="hinhanh/tintuc5.JPG" alt="">
            <h3 id="div8h31" class="div8hover">Ăn uống thế nào để có hàm răng khỏe, đẹp?</h3>
            <p style="text-align: justify;">Một hàm răng trắng, sáng hơi thở thơm tho là niềm mong muốn của tất cả mọi người. Ngoài việc chăm sóc răng miệng đúng cách, lựa chọn kem đánh răng phù hợp, thì ăn uống cũng ảnh hưởng rất nhiều để có hàm răng khỏe, đẹp.</p>
        </div>
        <div class="div8_tin2">
            <img id="div8a2" style="width: 100%;height: 205px;" src="hinhanh/tintuc4.JPG" alt="">
            <h3 id="div8h32" class="div8hover">Phòng khám Nha khoa Răng hàm mặt tốt nhất hiện nay tại Quảng Ninh</h3>
            <p style="text-align: justify;">Đây là những Phòng khám nha khoa, răng hàm mặt uy tín, tốt nhất tại Quảng Ninh. Được rất nhiều khách hàng đánh giá cao, trang thiết bị hiện đại, đội ngũ Bác sĩ giàu kinh nghiệm</p>
        </div>
        <div class="div8_tin3">
            <img id="div8a3" style="width: 100%;height: 205px;" src="hinhanh/tintuc3.JPG" alt="">
            <h3 id="div8h33" class="div8hover">Chải răng đúng cách thế nào? Bạn đã đúng chưa?</h3>
            <p style="text-align: justify;">Chải răng, ai hàng ngày cũng chải. Nhưng để chải đúng cách thì lại rất nhiều người không biết</p>
        </div>
    </div>
    <div  style="position: relative; background-color:rgb(24, 162, 180);padding: 1% 7%;">
        <h3 style="color: white; font-family: arial;" >"HÃY ĐỂ CHÚNG TÔI QUẢN TRỊ, VẬN HÀNH VÀ BẢO TRÌ PHẦN MỀM NHA KHOA CHO BẠN"</h3>
        <a class="dangkinhanbaogia" href="lienhe.php">Đăng kí,nhận báo giá</a>
    </div>
    <div  style="height: 350px; background-color: #f2f2f2;position: relative; ">
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
                <li style="float: left;"><a href="https://www.facebook.com/BambuFit.vn"><img  src="hinhanh/facebook.JPG" alt=""></a></li>
                <li style="float: left;"><a href=""><img src="hinhanh/youtube.JPG" alt=""></a></li>
                <li style="float: left;"><a href="https://twitter.com/Bambufit_vn"><img src="hinhanh/twe.JPG" alt=""></a></li>
                <li style="float: left;"><a href=""><img src="hinhanh/instagram.JPG" alt=""></a></li>
                <li style="float: left;"><a href=""><img src="hinhanh/goole.JPG" alt=""></a></li>
            </ul> 
        </div>
        <ul class="div10_ul_3">
            <li style="float: left;width: 290px; "><img  src="hinhanh/phongban.JPG" alt=""></li>
            <iframe style="float: left; width: 290px; height: 173px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.8057955710287!2d105.86774071440692!3d21.000420494122245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135adddb6e65abf%3A0xa475a1d91f7768a6!2sC%C3%94NG%20TY%20TNHH%20BAMBU%20VI%E1%BB%86T%20NAM!5e0!3m2!1svi!2s!4v1599795769835!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </ul>
    </div>
    <p style="background-color:grey;text-align: center;padding: 1%;margin: 0%;">@ Copyright 2018 bambu.net.vn. Thiết kế phát triển bởi Bambu®</p>
    <a href="#trangchu"><img style="position:fixed;bottom: 5%;right: 2%; border-radius: 50%;width: 55px; height: 55px; " src="hinhanh/muiten.jpg" alt=""></a>
    <img id="dienthoai" class="dienthoai" src="hinhanh/dienthoai.png" alt="">
    <a href="https://www.messenger.com/login.php" target="_blank"><img style="position:fixed;bottom: 30%;right: 2%; border-radius: 50%;width: 55px; height: 55px; " src="hinhanh/mess.jpg" alt=""></a>
    <div id="p3"></div>
    <div  id="p2" ></div>
</body>
<script  src="trangchu3.js"></script>
</html>