<?php 
    include("GDQL_benhnhan.php");
?>
<style>
    .div2{
            border:2px solid #bbb;
            width: 100%;
            height: 45px;
           font-family:arial;
           position:relative;
           background-color:#ddd;
    }
    .div3{
        margin:5% 0px 0px 14%;
        width:70%;
        height:600px;
        border:2px solid #bbb;
    }
    .bang td, th{
        border-top: 2px solid #ddd;
    }
    td{
        padding:5px;
        width:40%;
    }
    .bang label{
        font-size:30px;
        margin-left:3%;
    }
    .div4{
        width:60%;
        height:615px;
        background-color:rgb(150, 200, 30);
        margin:5% 20%;
    }
    .div4 label{
        font-size:25px;
        margin-left:3%;
    }
    .div4 input{
        margin-left:5%;
    }
</style>
<html>
<body style="font-family:arial;">
<div class="div2">
        <p style="margin-left:1%;">Đánh giá >> <span style="color:blue;">Phiếu lấy ý kiến</span> </p>
    </div>
    <?php
        $CONN = new mysqli ('localhost','root','','qlpknk') ;
        mysqli_query($CONN,'SET NAMES UTF8');
        if(isset($_POST['gui']))
        {
            if(!empty($_POST['yk']))
            {
                $yk=$_POST['yk'];
                $date=date('Y');
                $truyvan="INSERT INTO danhgia(nhanxet,nam) VALUES('$yk','$date')";
                $ketnoi=mysqli_query($CONN,$truyvan);

                //Phiếu ý kiến không hài lòng
                echo "<div class='div4'>";
                echo "<form method='POST'>";
                echo "<h2 style='background-color:pink;padding:5px;text-align:center;'>Qúy khách không hài lòng về</h2>";
                echo "<input type=checkbox id=yk1 name=yk1 value='Khâu làm thủ tục đăng kí khám'><label for=yk1>Khâu làm thủ tục đăng kí khám</label><br><hr>";
                echo "<input type=checkbox id=yk2 name=yk2 value='Khâu thanh toán chi phí khám chữa bệnh'><label for=yk2>Khâu thanh toán chi phí khám chữa bệnh</label><br><hr>";
                echo "<input type=checkbox id=yk3 name=yk3 value='Cách hỏi bệnh và thăm khám của bác sĩ'><label for=yk3>Cách hỏi bệnh và thăm khám của bác sĩ</label><br><hr>";
                echo "<input type=checkbox id=yk4 name=yk4 value='Thời gian làm xét nghiệm, siêu âm, chụp phim'><label for=yk4>Thời gian làm xét nghiệm, siêu âm, chụp phim</label><br><hr>";
                echo "<input type=checkbox id=yk5 name=yk5 value='Chăm sóc người bệnh của điều dưỡng'><label for=yk5>Chăm sóc người bệnh của điều dưỡng</label><br><hr>";
                echo "<input type=checkbox id=yk6 name=yk6 value='Khâu cấp phát thuốc'><label for=yk6>Khâu cấp phát thuốc</label><br><hr>";
                echo "<input type=checkbox id=yk7 name=yk7 value='Thái độ ứng xử, giao tiếp của nhân viên bệnh viện'><label for=yk7>Thái độ ứng xử, giao tiếp của nhân viên bệnh viện</label><br><hr>";
                echo "<input type=checkbox id=yk8 name=yk8 value='Nhà vệ sinh phục vụ người bệnh của bệnh viện'><label for=yk8>Nhà vệ sinh phục vụ người bệnh của bệnh viện</label><br><hr>";
                echo "<input type=checkbox id=yk9 name=yk9 value='Chỗ ngồi chờ khám, chờ xét nghiệm'><label for=yk9>Chỗ ngồi chờ khám, chờ xét nghiệm</label><br><hr>";
                echo "<input type=checkbox id=yk10 name=yk10 value='Chỗ để xe khi vào bệnh viện'><label for=yk10>Chỗ để xe khi vào bệnh viện</label><br><hr>";
                echo "<input type=checkbox id=yk11 name=yk11 value='Dịch vụ khám của bệnh viện'><label for=yk11>Dịch vụ khám của bệnh viện</label><br><hr>";
                echo "<input type=checkbox id=yk12 name=yk12 value='Cảnh quan xung quanh của bệnh viện'><label for=yk12>Cảnh quan xung quanh của bệnh viện</label><br><hr>";
                echo "<input style='margin:3% 0px 30px 48%; color:white;background-color:green;padding:5px 15px;' type='submit' name='gui1' value='Gửi'>";
                echo "</form>";
                echo "</div>";
                exit;
                
            }
        }

    //nếu nhấn vào nút gửi
    if(isset($_POST['gui1']))
    {
        if(isset($_POST['yk1'])){$yk1=$_POST['yk1'];}else$yk1='\0';
        if(isset($_POST['yk2'])){$yk2=$_POST['yk2'];}else$yk2='\0';
        if(isset($_POST['yk3'])){$yk3=$_POST['yk3'];}else$yk3='\0';
        if(isset($_POST['yk4'])){$yk4=$_POST['yk4'];}else$yk4='\0';
        if(isset($_POST['yk5'])){$yk5=$_POST['yk5'];}else$yk5='\0';
        if(isset($_POST['yk6'])){$yk6=$_POST['yk6'];}else$yk6='\0';
        if(isset($_POST['yk7'])){$yk7=$_POST['yk7'];}else$yk7='\0';
        if(isset($_POST['yk8'])){$yk8=$_POST['yk8'];}else$yk8='\0';
        if(isset($_POST['yk9'])){$yk9=$_POST['yk9'];}else$yk9='\0';
        if(isset($_POST['yk10'])){$y10=$_POST['yk01'];}else$yk10='\0';
        if(isset($_POST['yk11'])){$yk11=$_POST['yk11'];}else$yk11='\0';
        if(isset($_POST['yk12'])){$yk12=$_POST['yk12'];}else$yk12='\0';
        $truyvan1="SELECT MAX(id) AS maxid FROM danhgia;";
        $lienket1=mysqli_query($CONN,$truyvan1);
        $row1=mysqli_fetch_assoc($lienket1);
        $id=$row1['maxid'];
        $truyvan2="UPDATE danhgia SET ykien='$yk1$yk2$yk3$yk4$yk5$yk6$yk7$yk8$yk9$yk10$yk11$yk12' WHERE(id=$id)";
        $lienket2=mysqli_query($CONN,$truyvan2);
    }
    ?>
    <form method="POST">
    <table class="bang" style="margin-left:25%;border-bottom: 2px solid #ddd;">
    <h1 style="text-align:center;">Mức độ hài lòng của bạn đối với CS KCB</h1>
    <img style="width:70px;margin:0px 5px 5% 36%;" src="hinhanh/ngoisao.jpg" alt="">
    <img style="width:70px;margin:0px 5px 5% 0px;" src="hinhanh/ngoisao.jpg" alt="">
    <img style="width:70px;margin:0px 5px 5% 0px;" src="hinhanh/ngoisao.jpg" alt="">
    <img style="width:70px;margin:0px 5px 5% 0px;" src="hinhanh/ngoisao.jpg" alt="">
    <img style="width:70px;margin:0px 0px 5% 0px;" src="hinhanh/ngoisao.jpg" alt="">
        <tr><td><input type="radio" id="yk" name="yk" value="Rất không hài lòng"><label  for="yk">Rất không hài lòng</label></td><td><img style="width:40px;margin-right:5px;margin-left:34%;" src="hinhanh/ngoisao.jpg" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao2.png" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao2.png" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao2.png" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao2.png" alt=""></td></tr>
        <tr><td><input type="radio" id="yk" name="yk" value="Không hài lòng"><label   for="yk">Không hài lòng</label></td><td><img style="width:40px;margin-right:5px;margin-left:34%;" src="hinhanh/ngoisao.jpg" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao.jpg" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao2.png" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao2.png" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao2.png" alt=""></td></tr>
        <tr><td><input type="radio" id="yk" name="yk" value="Chấp nhận được"><label   for="yk">Chấp nhận được</label></td><td><img style="width:40px;margin-right:5px;margin-left:34%;" src="hinhanh/ngoisao.jpg" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao.jpg" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao.jpg" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao2.png" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao2.png" alt=""></td></tr>
        <tr><td><input type="radio" id="yk" name="yk" value="Hài lòng"><label   for="yk">Hài lòng</label></td><td><img style="width:40px;margin-right:5px;margin-left:34%;" src="hinhanh/ngoisao.jpg" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao.jpg" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao.jpg" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao.jpg" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao2.png" alt=""></td></tr>
        <tr><td><input type="radio" id="yk" name="yk" value="Rất hài lòng"><label   for="yk">Rất hài lòng</label></td><td><img style="width:40px;margin-right:5px;margin-left:34%;" src="hinhanh/ngoisao.jpg" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao.jpg" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao.jpg" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao.jpg" alt=""><img style="width:40px;margin-right:5px;" src="hinhanh/ngoisao.jpg" alt=""></td></tr>
    </table>
    <input style="margin:3% 0px 30px 48%; color:white;background-color:green;padding:5px 15px;" type="submit" name="gui" value="Gửi">
    </form>
</body>
</html>
  