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
        <h2 style="font-family: Arial, Helvetica, sans-serif; margin-top: 3%;">PH???N M???M QU???N L?? NHA KHOA ONLINE BAMBUFIT</h2>
    </div>
    <div class="div4" >
        <div class="div4thongtin">
            <img class="div4img" src="hinhanh/div4.jpg" alt="">
            <h3 class="div4h3">GI???I THI???U</h3>
        </div>
        <div class="div4thongtin1">
        <p style="font-size:larger;text-align: justify;">"Ph???n m???m qu???n l?? ph??ng kh??m nha khoa BambuFit l?? m???t ph???n m???m ???????c x??y d???ng b???i nh???ng ng?????i am hi???u v??? chuy??n m??n nha khoa, k??? thu???t, v?? qu???n l?? ph??ng kh??m. BambuFit lu??n h?????ng t???i ng?????i s??? d???ng, t???o n??n m???t ph???n m???m c?? t??nh linh ho???t c???c cao, c?? th??? m??? r???ng th??m c??c ch???c n??ng ?????c bi???t c???a t???ng ph??ng kh??m theo y??u c???u."</p>
        <button id="timhieuthem" class="div4timhieuthem">T??m hi???u th??m</button>
        
        </div>
         <img class="div4img1" src="hinhanh/div45.JPG" alt="">
    
    </div>
    <div class="div5" >
        <h2 style="padding: 2%;background-color: rgb(24, 162, 180); text-align: center; color: white;font-family: Arial; opacity: 0.8;" >H??n 500 kh??ch h??ng tin d??ng trong h??n 10 n??m qua!</h2>
        <h2 style="text-align: center;"><a class="div5dichvu" href=""> D???CH V???</a></h2>
        <hr style="background-color: rgb(24, 162, 180)" width="10%">
        <div class="div5tinhnangtrai">
                <h3 id="hosobenhnhan" class="div5h3" >L???y cao r??ng</h3>
                <p>Th??? thu???t l???y v??i r??ng l?? m???t trong nh???ng th??? thu???t ph??? bi???n nh???t t???i c??c ph??ng kh??m nha khoa. </p>
                <h3 id="doanhthubacsy" class="div5h3"  >Nh??? r??ng</h3>
                <p>Doanh thu b??c s?? - nh??n vi??n ???????c t??nh theo l????ng c?? b???n t???ng ph??ng kh??m, c???ng th??m th?????ng doanh thu, th?????ng th??? thu???t, th??m gi???, th?????ng kh??c....</p>
                <h3 id="taikhoan" class="div5h3"  >Ni???ng r??ng</h3>
                <p> M???t h??m r??ng ?????u v?? tr???ng lu??n l?? m?? ?????c c???a r???t nhi???u ng?????i. Tuy nhi??n, kh??ng ph???i ai c??ng c?? may m???n n??y.<br><br><br></p>
        </div>
        <div class="div5tinhnangphai">
                <h3 id="tayrang" class="div5h3"  >T???y tr???ng r??ng laser </h3>
                <p>T???y tr???ng r??ng l?? m???t ph????ng ph??p l??m tr???ng r??ng ???????c ch??? ?????nh trong tr?????ng h???p men r??ng b??? ??? m??u do qu?? tr??nh ??n u???ng h??ng ng??y.  </p>  
                <h3 id="danhgia" class="div5h3"  >R??ng s??? th???m m??? </h3>
                <p>Tr?????ng h???p r??ng nhi???m Tetracycline, c??c ph????ng ph??p t???y tr???ng r??ng s??? kh??ng c?? hi???u qu???. V?? v???y, b???n c???n t??m cho m??nh m???t gi???i ph??p gi??p gi???i quy???t t??nh tr???ng n??y. B???c r??ng s??? ch??nh l?? ph????ng ph??p gi??p l??m r??ng tr???ng h???u hi???u nh???t trong tr?????ng h???p n??y. </p>
                
        </div>
        <img style="position: absolute;left: 52%;border-radius: 50%;top: 54%;width:6%;" src="hinhanh/nhor.jpg" alt="">
        <img style="position: absolute;left: 7%;border-radius: 50%;top: 54%;width:6%;" src="hinhanh/nr1.png" alt="">
        <img style="position: absolute;left: 7%;border-radius: 50%;top: 35%;width:6%;height:80px;" src="hinhanh/lcr1.jpg" alt="">
        <img style="position: absolute;left: 7%;border-radius: 50%;top: 75%;width:6%;" src="hinhanh/niengr.jpg" alt="">
        <img style="position: absolute;left: 52%;border-radius: 50%;top: 35%;width:6%;" src="hinhanh/rs.png" alt="">
    </div>
    
    <div class="div7" style="padding: 120px; background-image: url(../TTCN1/hinhanh/nhanxet.JPG);"></div>
    <div class="div8" style="height: 450px;position: relative;">
        <h2 style="text-align: center;" ><a href="tinbai.php" class="div8tintuc"> TIN T???C - S??? KI???N </a></h2>
        <hr style="background-color: rgb(24, 162, 180)" width="10%">
        <div class="div8_tin1">
            <img id="div8a1" style="width: 100%;height: 205px;" src="hinhanh/tintuc5.JPG" alt="">
            <h3 id="div8h31" class="div8hover">??n u???ng th??? n??o ????? c?? h??m r??ng kh???e, ?????p?</h3>
            <p style="text-align: justify;">M???t h??m r??ng tr???ng, s??ng h??i th??? th??m tho l?? ni???m mong mu???n c???a t???t c??? m???i ng?????i. Ngo??i vi???c ch??m s??c r??ng mi???ng ????ng c??ch, l???a ch???n kem ????nh r??ng ph?? h???p, th?? ??n u???ng c??ng ???nh h?????ng r???t nhi???u ????? c?? h??m r??ng kh???e, ?????p.</p>
        </div>
        <div class="div8_tin2">
            <img id="div8a2" style="width: 100%;height: 205px;" src="hinhanh/tintuc4.JPG" alt="">
            <h3 id="div8h32" class="div8hover">Ph??ng kh??m Nha khoa R??ng h??m m???t t???t nh???t hi???n nay t???i Qu???ng Ninh</h3>
            <p style="text-align: justify;">????y l?? nh???ng Ph??ng kh??m nha khoa, r??ng h??m m???t uy t??n, t???t nh???t t???i Qu???ng Ninh. ???????c r???t nhi???u kh??ch h??ng ????nh gi?? cao, trang thi???t b??? hi???n ?????i, ?????i ng?? B??c s?? gi??u kinh nghi???m</p>
        </div>
        <div class="div8_tin3">
            <img id="div8a3" style="width: 100%;height: 205px;" src="hinhanh/tintuc3.JPG" alt="">
            <h3 id="div8h33" class="div8hover">Ch???i r??ng ????ng c??ch th??? n??o? B???n ???? ????ng ch??a?</h3>
            <p style="text-align: justify;">Ch???i r??ng, ai h??ng ng??y c??ng ch???i. Nh??ng ????? ch???i ????ng c??ch th?? l???i r???t nhi???u ng?????i kh??ng bi???t</p>
        </div>
    </div>
    <div  style="position: relative; background-color:rgb(24, 162, 180);padding: 1% 7%;">
        <h3 style="color: white; font-family: arial;" >"H??Y ????? CH??NG T??I QU???N TR???, V???N H??NH V?? B???O TR?? PH???N M???M NHA KHOA CHO B???N"</h3>
        <a class="dangkinhanbaogia" href="lienhe.php">????ng k??,nh???n b??o gi??</a>
    </div>
    <div  style="height: 350px; background-color: #f2f2f2;position: relative; ">
        <img style="position: absolute; left: 7%;" src="hinhanh/lienhe.JPG" alt="">
        <div style=" width: 40%;top: 20%;left: 7%; position: absolute;">
            <p><strong>?????a ch???</strong>: S??? 10 t???ng 2, TTTM V+, t??a nh?? H??a B??nh Green City 505 Minh Khai, Qu???n Hai B?? Tr??ng, H?? N???i</p>
            <p><strong>??i???n tho???i</strong> : 024.22151674 - <strong>Hotline 24/7</strong> : 0942 116 117</p>
            <p><strong>Email</strong>: info@bambu.vn</p>
            <p><strong>Gi???y ph??p ??KKD</strong>: S??? 0104002632 c???p ng??y 30/01/2008 b???i S??? K??? Ho???ch v?? ?????u T?? TP. H?? N???i</p>
        </div>
        
        <div class="div10_trai">
            <ul class="div10_ul_1">
                <li style="float: right ;padding: 10px;font-family: arial;">H??NH TH???C THANH TO??N</li>
                <li style="float: right ;border-right: 2px solid #bbb; padding: 10px;font-family: arial;">K???T N???I V???I BAMBU.VN</li>
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
    <p style="background-color:grey;text-align: center;padding: 1%;margin: 0%;">@ Copyright 2018 bambu.net.vn. Thi???t k??? ph??t tri???n b???i Bambu??</p>
    <a href="#trangchu"><img style="position:fixed;bottom: 5%;right: 2%; border-radius: 50%;width: 55px; height: 55px; " src="hinhanh/muiten.jpg" alt=""></a>
    <img id="dienthoai" class="dienthoai" src="hinhanh/dienthoai.png" alt="">
    <a href="https://www.messenger.com/login.php" target="_blank"><img style="position:fixed;bottom: 30%;right: 2%; border-radius: 50%;width: 55px; height: 55px; " src="hinhanh/mess.jpg" alt=""></a>
    <div id="p3"></div>
    <div  id="p2" ></div>
</body>
<script  src="trangchu3.js"></script>
</html>