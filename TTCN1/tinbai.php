<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin bài</title>
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
    .div8tintuc{
    font-family: Arial;
    text-align: center; 
    margin-top: 3%;
    text-decoration: none;
    color: black;

}
    .div8tintuc:hover{
        color: red;
        font-size:30px;
    }
    .div8_tin1{
        width: 27%;
        left: 7%;
        position: absolute;
    }

    .div8_tin2{
        width: 27%;
        left: 36%;
        position: absolute;
    }
    .div8_tin3{
        width: 27%;
        left: 65%;
        position: absolute;
    }
    
    .div8hover:hover{
        color: red;
    }
    .div8,h4,p{
        font-family: arial;
    }
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
                
                <li class="li" style="background-color: rgb(24, 162, 180)"><a class="dangnhap" href="dangnhap.php" >ĐĂNG NHẬP</a></li>
                <li class="li" style="background-color: rgb(24, 162, 180); border-right:1px solid #bbb;"><a class="dangnhap" href="dangki.php" >ĐĂNG KÍ</a></li>
                <li class="li"><a class="menu" href="lienhe.php">LIÊN HỆ</a></li>
                <li class="li"><a class="menu" href="dichvu.php">DỊCH VỤ</a></li>
                <li  class="li"><a class="menu" href="tinbai.php" style=" color:rgb(24, 162, 180)" ><u>TIN TỨC - SỰ KIỆN</u></a></li>
                <li class="li"><a class="menu" href="trangchu.php" > TRANG CHỦ</a></li>
            </ul>
        </div>
    </div>
    <div class="div1">
        <h2 style="color:white;position: absolute;left: 44%; top: 10%;font-family: arial;">TIN TỨC - SỰ KIỆN</h2>
        <ul class="div1_ul">
            <li style="float: left ;font-weight:bolder;font-family: arial; "><a style="color: white;text-decoration: none;" href="trangchu.php">Trang chủ > </a></li>
            <li style="float: left ;font-weight:bolder;font-family: arial;"><a style="color: white;text-decoration: none;" href="tinbai.php">TIN TỨC - SỰ KIỆN</a></li>
        </ul>
    </div>
    
    <div class="div8" style="height: 450px; position: relative;">
        <h2 style="text-align: center;" ><a href="" class="div8tintuc"> TIN TỨC - SỰ KIỆN </a></h2>
        <hr style="background-color: rgb(24, 162, 180)" width="10%"><br>
        <div class="div8_tin1">
            <img id="divh44_1" style="width: 100%;height: 205px;" src="hinhanh/sukien4.JPG" alt="">
            <h4 id="divh44" class="div8hover">Điều kiện, quy định và chi phí mở phòng khám nha khoa</h4>
            <p style="text-align: justify;">Do Phòng khám nha khoa, răng hàm mặt là phòng khám chuyên khoa thuộc lĩnh vực y tế, nên để mở Phòng khám nha khoa, răng hàm mặt thì cần phải tuân thủ các quy định, nghị định của Nhà nước</p>
        </div>
        <div class="div8_tin2">
            <img id="divh48_1" style="width: 100%;height: 205px;" src="hinhanh/sukien8.JPG" alt="">
            <h4 id="divh48" class="div8hover">Phòng khám nha khoa răng hàm mặt uy tín, tốt nhất ở Lào Cai</h4>
            <p style="text-align: justify;">Bạn không muốn chờ đợi, xếp hàng, mua sổ khám bệnh thì có thể lựa chọn những phòng khám nha khoa, răng hàm mặt tốt nhất, uy tín nhất tại Lào Cai</p>
        </div>
        <div class="div8_tin3">
            <img id="divh43_1" style="width: 100%;height: 205px;" src="hinhanh/sukien3.jpg" alt="">
            <h4 id="divh43" class="div8hover">Nên niềng răng ở độ tuổi nào thì tốt nhất</h4>
            <p style="text-align: justify;">Niềng răng là dùng tác dụng vật lý để chỉnh răng trở về đúng vị trí, giúp bạn có một hàm răng đều và đẹp. Do đó, ngoài giá cả, thời gian, thì độ tuổi nào niềng răng hiệu quả là mối quan tâm hàng đầu.</p>
        </div>
        
    </div>
    <div class="div8_1" style="height: 450px;position: relative; ">
        <div class="div8_tin1">
            <img id="divh41_1" style="width: 100%;height: 205px;" src="hinhanh/sukien1.JPG" alt="">
            <h4 id="divh41" class="div8hover">Danh sách các Phòng khám răng uy tín nhất tại Huế</h4>
            <p style="text-align: justify;">Với đội ngũ y bác sĩ được đào tạo chuyên sâu tại các trường đại học Y nổi tiếng, các Phòng khám răng uy tín nhất tại Huế sẽ làm yên tâm các khách hàng tại đây.</p>
        </div>
        <div class="div8_tin2">
            <img id="divh45_1" style="width: 100%;height: 205px;" src="hinhanh/sukien5.JPG" alt="">
            <h4 id="divh45" class="div8hover">Phòng khám nha khoa răng hàm mặt uy tín tại Hà Tĩnh</h4>
            <p style="text-align: justify;">Tại Hà Tĩnh có rất nhiều phòng khám nha khoa. Vậy đâu là Phòng khám nha khoa uy tín, chất lượng cao tại Hà Tĩnh? Mọi người cùng tham khảo bài viết dưới đây để lựa chọn cho mình Phòng khám nha khoa răng hàm mặt tốt nhất tại Hà Tĩnh</p>
        </div>
        <div class="div8_tin3">
            <img id="divh46_1" style="width: 100%;height: 205px;" src="hinhanh/sukien6.JPG" alt="">
            <h4 id="divh46" class="div8hover">Phòng khám nha khoa chất lượng tốt, uy tín tại Thái Bình</h4>
            <p style="text-align: justify;">Các Phòng khám nha khoa tại Thái Bình ngày càng phát triển, đi kèm theo là dịch vụ, chất lượng, uy tín tốt nhất hiện nay.</p>
        </div>
        
    </div>
    <div class="div8_2" style=" height: 450px; position: relative;">
        <div class="div8_tin1">
            <img id="divh47_1" style="width: 100%;height: 205px;" src="hinhanh/sukien7.JPG" alt="">
            <h4 id="divh47" class="div8hover">Những mẫu áo đồng phục nha khoa blouse đẹp nhất hiện nay</h4>
            <p style="text-align: justify;">Đối với những người bác sĩ nói chung thì việc mặc áo Blouse luôn nhận được sự tin tưởng, yên tâm của bệnh nhân bởi sự chuyên nghiệp nghiệp, và hình ảnh chiếc áo blouse luôn đi kèm với người bác sĩ.</p>
        </div>
        <div class="div8_tin2">
            <img id="divh42_1" style="width: 100%;height: 205px;" src="hinhanh/qc10_1.JPG" alt="">
            <h4 id="divh42" class="div8hover">Nên khám răng, nhổ răng khôn ở bệnh viện hay phòng khám</h4>
            <p style="text-align: justify;">Bạn bị bệnh răng miệng, bạn cần nhổ răng số 8 và bạn còn đang phân vân chưa biết lựa chọn nên vào phòng khám hay ra bệnh viện? Để có một quyết định chính xác nhất thì bạn tham khảo thông tin dưới đây.Quá trình khám răng, điều trị nha khoa, nhổ răng khôn tuy không quá khó. Nhưng nếu lựa chọn những nơi làm việc không uy tín thì ngoài mất tiền, còn ảnh hưởng rất nhiều đến sức khoẻ.</p>
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
        
    document.getElementById("divh41_1").addEventListener("click", qc4);
    document.getElementById("divh41").addEventListener("click", qc4);
    document.getElementById("divh42_1").addEventListener("click", qc5);
    document.getElementById("divh42").addEventListener("click", qc5);
    document.getElementById("divh43_1").addEventListener("click", qc6);
    document.getElementById("divh43").addEventListener("click", qc6);
    document.getElementById("divh44_1").addEventListener("click", qc7);
    document.getElementById("divh44").addEventListener("click", qc7);
    document.getElementById("divh45_1").addEventListener("click", qc8);
    document.getElementById("divh45").addEventListener("click", qc8);
    document.getElementById("divh46_1").addEventListener("click", qc9);
    document.getElementById("divh46").addEventListener("click", qc9);
    document.getElementById("divh47_1").addEventListener("click", qc10);
    document.getElementById("divh47").addEventListener("click", qc10);
    document.getElementById("divh48_1").addEventListener("click", qc11);
    document.getElementById("divh48").addEventListener("click", qc11);

    function qc4() 
    {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='font-family:arial;text-align: justify;margin:3% 0px 0px 5%;width:63%;'><h3 ><strong>Danh sách các Phòng khám răng uy tín nhất tại Huế</strong></h3>Danh sách các Phòng khám Phòng khám nha khoa chất lượng, uy tín nhất tại Huế<br><strong>1. Nha khoa CHESSE </strong><br>Trung tâm Nha Khoa Chesse tự hào  về việc cung cấp một dịch vụ nha khoa toàn diện, được thiết kế riêng, bất kể yêu cầu nha khoa của bạn là gì."+
        "<br>Tại Nha Khoa Chesse bạn sẽ được nghe những lời tư vấn trung thực nhất từ các chuyên gia với đội ngũ y bác sỹ thân thiện, chuyên nghiệp có nhiều năm kinh nghiệm và chuyên môn cao. Các bác sỹ sẽ lên kế hoạch điều trị mang đến chất lượng hàng đầu với mức chi phí tốt nhất cho khách hàng .<br>Hiện đại – tận tâm – chất lượng – Trung tâm Nha Khoa Chesse  mong mỏi mang đến nụ cười đẹp và hoàn hảo cho tất cả mọi người<br><strong>TRUNG TÂM NHA KHOA CHEESE</strong><br>\"Nụ cười của bạn - Sứ mệnh của chúng tôi\"<br><i>Địa chỉ: 6 Hùng Vương, phường Phú Nhuận, TP Huế<br>096.246.2727 - 0234.656.2727</i>"+
        "<br><br><strong>2. Nha khoa Bình Minh</strong><br>NHA KHOA BÌNH MINH ( tiền thân là Nha khoa An Phong ) do Cố Nha sĩ-Bác Sĩ Dương Đình Phong – Nguyên trưởng Khoa Răng Hàm Mặt Bệnh Viện Trung Ương Huế, Trưởng bộ môn Răng Hàm Mặt Đại học Y Dược Huế. Người từng là Bác sĩ nha khoa đầu tiên tại Thành phố Huế, đã thể hiện tấm gương y đức trong việc chăm sóc bệnh nhân và là người thầy của ngành Y dược, đã đào tạo nhiều thế hệ bác sĩ, nha khoa xuất sắc mẫu mực cho đời"+
        "<br><strong>NHA KHOA BÌNH MINH</strong><br><i>Địa chỉ : Số 1 - Huỳnh Thúc Kháng - Phường Phú Hòa . Thành phố Huế .<br>Hotline : 0763524536 - 02343524536</i>"+
        "<img style='float:right;position:absolute;top:15%;right:3%;width:25%;' src='hinhanh/qc5_1.JPG' alt=''>"+
        "<img style='float:right;position:absolute;top:55%;right:3%;width:25%;' src='hinhanh/qc5_2.JPG' alt=''>";

        macdinh2();

    }
    function qc5() 
    {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='font-family:arial;text-align: justify;margin:3% 0px 0px 5%;width:70%;'><h3 ><strong>Nên khám răng, nhổ răng khôn ở bệnh viện hay phòng khám</strong></h3>Bạn bị bệnh răng miệng, bạn cần nhổ răng số 8 và bạn còn đang phân vân chưa biết lựa chọn nên vào phòng khám hay ra bệnh viện? Để có một quyết định chính xác nhất thì bạn tham khảo thông tin dưới đây.Quá trình khám răng, điều trị nha khoa, nhổ răng khôn tuy không quá khó. Nhưng nếu lựa chọn những nơi làm việc không uy tín thì ngoài mất tiền, còn ảnh hưởng rất nhiều đến sức khoẻ."+
        "<br><br><strong>1. Lựa chọn khám tại bệnh viện.</strong><br>- Ưu điểm: <br>+ Giá hợp lý<br>+ Yên tâm: Thông thường, nếu chúng ta đến bệnh việc thì tâm lý sẽ yên tâm hơn với phòng khám ngoài<br>+ Hỗ trợ kịp thời nếu chẳng may xảy ra sự cố về sức khoẻ<br>- Nhược điểm<br>+ Phải xếp hàng, chờ đợi lâu<br>+ Không được tư vấn kỹ<br>+ Không được lựa chọn bác sĩ<br>+ Có nhiều câu hỏi cũng rất khó được giải đáp.<br>Những trường hợp nên đến bệnh viện để nhổ răng khôn, điều trị bệnh răng miệng: Bệnh răng miệng quá phức tạp, đang mắc bệnh mãn tính nguy hiểm: Tim mạch, ung thư,…"+
        "<br><br><strong>2. Lựa chọn tại Phòng khám</strong><br>- Ưu điểm: Ân cần, chu đáo, Phòng khám sạch sẽ, mát mẻ, Không mất thời gian chờ đợi, Được lựa chọn bác sĩ giỏi, có uy tín, Nhận được sự quan tâm, tư vấn nhiệt tình từ bác sĩ chuyên khoa., Thời gian thực hiện khám, làm thủ thuật, nhổ răng khôn nhanh chóng, chuẩn xác., Sử dụng những công nghệ mới nhất, Nhiều phòng khám áp dụng Phần mềm quản lý nha khoa BambuFit cho việc thăm khám và điều trị. Do đó khách hàng sẽ không sợ bị quên khi có lịch hẹn với Bác sĩ.<br>- Nhược điểm: Chi phí cao hơn bệnh viện công,Nếu bạn không mắc các bệnh mãn tính thì nên lựa chọn khám, điều trị, nhổ răng số 8 tại Phòng khám. Vì chi phí cũng không quá cao so với bệnh viện công nhiều."+
        "<img style='float:right;position:absolute;top:18%;right:3%;width:20%;' src='hinhanh/qc10_1.JPG' alt=''>"+
        "<img style='float:right;position:absolute;top:55%;right:3%;height:230px;width:20%;' src='hinhanh/qc10_2.JPG' alt=''>";
        macdinh2();
    }
    function qc6() 
    {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='font-family:arial;text-align: justify;margin:3% 0px 0px 5%;width:70%;'><h3 ><strong>Nên niềng răng ở độ tuổi nào thì tốt nhất</strong></h3>Niềng răng là dùng tác dụng vật lý để chỉnh răng trở về đúng vị trí, giúp bạn có một hàm răng đều và đẹp. Do đó, ngoài giá cả, thời gian, thì độ tuổi nào niềng răng hiệu quả là mối quan tâm hàng đầu. <br><br><strong>Những hàm răng cần phải niềng:</strong> Hô, móm, vẩu, Răng mọc lộn xộn, khấp khểnh, Răng thưaCắn ngược răng sau, răng trước, Cung răng bị hẹp."+
        "<br><strong>Thời gian niềng răng:</strong><br>Tùy thuộc vào  mức độ lệch lạc của xương hàm, mà thời gian điều trị chỉnh nha niềng răng khác nhau, trung bình chỉnh nha thường là từ 18 tới 30 tháng., độ tuổi niềng răng càng cao thì thời gian bạn phải đeo niềng răng càng lâu.<br><strong>Độ tuổi niềng răng:</strong><br>Không có giới hạn tuổi cho việc điều trị nắn chỉnh nha, người lớn ở tuổi 40, 50 thậm chí 60 tuổi vẫn có thể được điều trị nắn chỉnh nha<br>+ Độ tuổi lý tưởng nhất để niềng răng là từ khoảng 9-16 tuổi. Vì trong khoảng thời gian này cấu trúc đang trong quá trình hoàn chỉnh, sẽ rất dễ uốn nắn các răng về vị trí theo ý mình.<br>+ Ngoài độ tuổi lý tưởng này thì ngày nay có nhiều kỹ thuật cũng như công nghệ nắn chỉnh hiện đại nên rất nhiều khách hàng nhiều tuổi vấn có thể làm. Tuy nhiên, hiệu quả niềng răng ở lứa tuổi này không đạt hiệu quả cao như  khi còn trẻ, và thời gian đeo niềng cũng lâu hơn.Nguyên nhân do ở người lớn xương đã phát triển hoàn thiện cho nên khá cứng chắc, các mắc cài niềng răng sẽ tương đối khó khăn trong việc kéo và dịch chuyển răng."+
        "<br><strong>Chăm sóc sau niềng răng: </strong><br>+ Cần tránh thức ăn cứng, thức ăn nhiều đường, tinh bột. <br>+ Giữ vệ sinh răng miệng: sau mỗi bữa ăn đánh răng bằng bàn chải lông mịn, xỉa các thức ăn bám ở niềng răng và dây thép<br>+ Nên sử dụng chỉ nha khoa <br>+ Dùng kem đánh răng có chứa fluoride<br>+ Khám răng định kỳ theo lịch hẹn của bác sĩ nha khoa."+
        "<img style='float:right;position:absolute;top:18%;right:3%;width:20%;' src='hinhanh/qc7.jpg' alt=''>";
        macdinh2();

    }
    function qc7() 
    {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='font-family:arial;text-align: justify;margin:3% 0px 0px 5%;width:90%;'><h3 ><strong>Điều kiện, quy định và chi phí mở phòng khám nha khoa</strong></h3>Do Phòng khám nha khoa, răng hàm mặt là phòng khám chuyên khoa thuộc lĩnh vực y tế, nên để mở Phòng khám nha khoa, răng hàm mặt thì cần phải tuân thủ các quy định, nghị định của Nhà nước <strong><br>Căn cứ theo:</strong><br>- Luật khám bệnh chữa bệnh 2009<br>- Thông tư số 41/2011/TT-BYT- Điều 25 Thông tư 40/2011/TT-BYT:<br>- Nghị định 109/2016/ND-CP ngày 01/07/2016 Quy định cấp chứng chỉ hành nghề đối với người hành nghề và cấp giấy phép hoạt động đối với cơ sở khám bệnh, chữa bệnh<br>- Nghị định 78/2015/NĐ-CP về đăng ký doanh nghiệp"+
        "<br><strong>Thẩm quyền cấp phép:</strong><br>- Sở y tế tỉnh, thành phố.<br>Để được cấp phép hoạt động phòng khám răng hàm mặt, trước hết các Phòng khám cần phải đáp ứng được đầy đủ các yêu cầu sau:<br><img style='margin-left:5%;width:22%;' src='hinhanh/qc4.JPG' alt=''><br><strong>1. Thành lập Phòng khám.<br>2. Nhân sự của phòng khám<br>3. Cơ sở vật chất <br>4. Thiết bị y tế<br>5. Các công việc được thực hiện<br>6. Hồ sơ mở phòng khám nha khoa – răng hàm mặt tư nhân<br>7. Thông tin mã ngành về lĩnh vực kinh doanh nha khoa:</strong>";
        macdinh2();

    }
    function qc8() 
    {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='font-family:arial;text-align: justify;margin:3% 0px 0px 5%;width:70%;'><h3 ><strong>Phòng khám nha khoa răng hàm mặt uy tín tại Hà Tĩnh</strong></h3><br>Tại Hà Tĩnh có rất nhiều phòng khám nha khoa. Vậy đâu là Phòng khám nha khoa uy tín, chất lượng cao tại Hà Tĩnh? Mọi người cùng tham khảo bài viết dưới đây để lựa chọn cho mình Phòng khám nha khoa răng hàm mặt tốt nhất tại Hà Tĩnh"+
        "<br><br><strong>1. Nha Khoa Răng Xinh </strong><br>Nha khoa Răng xinh áp dụng công nghệ cao hàng đầu khu vực.<br> Đội ngũ chuyên gia trồng răng, chỉnh nha nhiều năm <br>kinh nghiệm luôn làm hài lòng Quý khách<br>Các dịch vụ tại Nha khoa Răng Xinh: <br>+ Khám, chữa các bệnh về nha khoa, răng hàm mặt<br>+ Nhổ Răng Khôn<br>+ Niềng Răng<br>+ Trồng Răng Implant.<br>+ Tẩy trắng răng.<br>+ Điều trị cười hở lợi.<br>+ Nha khoa trẻ em"+
        "<br><img style='height:300px;width:50%;position:absolute;top:35%;right:5%;' src='hinhanh/qc6.JPG' alt=''>";
        macdinh2();

    }
    function qc9() 
    {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='font-family:arial;text-align: justify;margin:3% 0px 0px 5%;width:70%;'><h3 ><strong>Phòng khám nha khoa chất lượng tốt, uy tín tại Thái Bình</strong></h3>Các Phòng khám nha khoa tại Thái Bình ngày càng phát triển, đi kèm theo là dịch vụ, chất lượng, uy tín tốt nhất hiện nay.Mọi người có thể yên tâm đến các Phòng khám nha khoa tại Thái Bình uy tín để khám, tư vấn, sử dụng các dịch vụ nha khoa."+
        "<br><strong>1. Nha khoa Thẩm mỹ Pha Lê</strong><br>Tại Nha khoa Thẩm mỹ Pha Lê, các Bác Sỹ có trên 10 năm kinh nghiệm và đã trải qua hàng trăm ca phục hình răng sứ.<br>- Lấy cao răng , vệ sinh răng miệng #MIỄN_PHÍ<br>- Chụp CEPHALO , PANORAMA toàn cảnh<br>- Tư vấn, thăm khám  <br>- Hỗ trợ chi phí đi lại và chỗ nghỉ cho khách hàng ở xa<br>- Tặng gói chăm sóc răng miệng cho cả gia đình khi sử dụng dịch vụ tại nha khoa .<br>- Bọc sứ diamond chỉ từ 960k /R<br>- COMBO 16 răng diamond chỉ từ 14tr<br>- Bọc sứ diamondHT chỉ từ 2,1tr /R<br>- COMBO 16 răng diamondHT chỉ từ 30tr<br>- Bọc sứ THZirconiaVision CAO CẤP nhập khẩu từ USA chỉ từ 7tr/R<br>- Bọc sứ GermanyTH CAO CẤP nhập khẩu từ ĐỨC chỉ từ 10 tr/R<i><br>Địa chỉ: Số 50 đường Bùi Sỹ Tiêm, tổ 8, thị trấn Đông Hưng, huyện Đông Hưng, tỉnh Thái Bình</i>"+
        "<br><strong>2. Nha khoa Vemela</strong><br>Nha khoa Vemela áp dụng công nghệ cao hàng đầu khu vực. Đội ngũ chuyên gia trồng răng, chỉnh nha nhiều năm kinh nghiệm luôn làm hài lòng Quý khách<br><span syule='color:blue;'>Các dịch vụ tại Nha khoa Vemela</span><br>Khám, chữa các bệnh về nha khoa, răng hàm mặt; Nhổ Răng Khôn;Niềng Răng;Trồng Răng Implant; Tẩy trắng răng.;Điều trị cười hở lợi; Nha khoa trẻ em<br><i>Địa chỉ: Thôn Đầu, Thị Trấn Hưng Nhân, huyện Hưng Hà, tỉnh Thái Bình</i>"+
        "<img style='float:right;position:absolute;top:18%;right:3%;width:21%;' src='hinhanh/qc8.JPG' alt=''>";
        macdinh2();

    }
    function qc10() 
    {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='font-family:arial;text-align: justify;margin:3% 0px 0px 5%;width:70%;'><h3 ><strong>Những mẫu áo đồng phục nha khoa blouse đẹp nhất hiện nay</strong></h3>Mẫu áo đồng phục nha khoa dành cho các bác sĩ nha khoa, nha tá, điều dưỡng, lễ tân tại các phòng khám nha khoa rất cần được chú trọng.Đối với những người bác sĩ  nói chung thì việc mặc áo Blouse luôn nhận được sự tin tưởng, yên tâm của bệnh nhân bởi sự chuyên nghiệp nghiệp, và hình ảnh chiếc áo blouse luôn đi kèm với người bác sĩ.Khi lựa chọn mẫu áo nha khoa thì việc đầu tiên, quan trọng nhất chúng ta cần quan tâm đó là "+
        "<br><br><strong>1. Chất liệu vải:</strong><br>Chất liệu vải yêu cầu phải thấm hút mồ hôi, không nhăn, mềm mại: Thô biên đỏ, thô nhà máy, Thô Oxford, vải kate fore sài gòn, vải kate fore thành công, Kate Ý, Kaki Nam Định, Kaki Pangrim, Kaki Chun, Kate Oxford, Tuytsi Chun, Lon Mỹ<br><br><strong>2. Màu sắc:</strong><br>Ngoài  màu trắng là màu chủ đạo, chúng ta có thể lé thêm màu xanh, tím hoặc hồng để những mẫu áo nha khoa của Phòng khám không còn đơn điệu. Chúng ta có thể lựa chọn thêm màu xanh đậm, tím hoặc hồng nhạt dành cho các bác sĩ nha khoa và lễ tân theo màu sắc chủ đạo của Phòng khám.<br><br><strong>3. Giá thành:</strong>Những mẫu áo nha khoa có giá thành rẻ ta có thể lựa chọn: vải kate fore sài gòn, vải kate fore thành công, Kaki Nam Định. "+
        "<br><br><strong>4. Kiểu dáng:</strong><br>Trước đây mẫu áo nha khoa thường sử dụng một kiểu chung cho cả nam và nữa. Giờ đây, những bác sĩ nha khoa nữ thường được thiết kế cách tân với những mẫu khá đẹp, bắt mắt.Các bạn có thể tham khảo những mẫu áo nha khoa blouse đẹp dưới đây để chọn cho Phòng khám nha khoa của mình một mẫu áo phù hợp nhất."+
        "<img style='float:right;position:absolute;top:15%;height:230px;right:3%;width:18%;' src='hinhanh/qc9_2.jpg' alt=''>"+
        "<img style='float:right;position:absolute;top:57%;height:230px;right:3%;width:18%;' src='hinhanh/qc9_1.jpg' alt=''>";
        macdinh2();

    }
    function qc11() 
    {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='font-family:arial;text-align: justify;margin:3% 0px 0px 25%;width:90%;'><h3 ><strong>Phòng khám nha khoa răng hàm mặt uy tín, tốt nhất ở Lào Cai</strong></h3><br><strong>1. Nha khoa Elise</strong><br><br>Là Phòng khám nha khoa, răng hàm mặt uy tín nhất tại Lào Cai.<br>Nha khoa Elise chuyên:<br>- Nha khoa tổng quát<br>- Nắn chỉnh răng<br>- Cấy ghép Implant<br>- Răng sứ thẩm mỹ"+
        "<br><br><img style='height:270px;right:20%;width:50%;' src='hinhanh/sukien8.JPG' alt=''><br><i>Địa chỉ: 455 Nguyễn Huệ, Phố Mới, TX.Lào Cai, Lào Cai</i>";
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
