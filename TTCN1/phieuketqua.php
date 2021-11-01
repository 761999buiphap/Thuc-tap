<style>
        .div4_1 input[type=submit],.div4_1 button, .div4_1 a{
            background-color:rgb(37, 158, 37);
            padding:5px 10px;
            color:white;
            text-decoration:none;
            margin-top:8px;
        }
        .div4 input[type=text],.div5 textarea{
            outline:none;
            font-family:arial;
            border:0px;
        }
        .div4_1{
            width:100%;
            height:7%;
            background-color:#bbb;
        }
        .ki{
            width:20%;
            margin-left:10%;
            margin-top:3%;
            text-align:center;
        }
        .div5{
            margin-left:3%;
        }
        .div5 th,td{
            text-align:center;
        }
        .bang, th,td{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px 0px;
            font-family:arial;
        }
        .div5 input[type=text],.div5 textarea{
            border:none;
            text-align:center;
            font-family:arial;
            outline:none;
        }
        </style>
 <html>
<?php
    $CONN = new mysqli ('localhost','root','','qlpknk');
    mysqli_query($CONN,'SET NAMES UTF8');
    $lidokham1=$mabs1=$tienkham1=$stt1='';
                if(isset($_GET['mabn']))
                {
                    $mabn=$_GET['mabn'];
                    $tentk=$_GET['tentk'];
                    $i=$_GET['lan'];
                }
                $nden = date("d");$tden=date("m");$namden=date("Y");
                $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn'";
                $lienket1=mysqli_query($CONN,$truyvan1);
                $row1=mysqli_fetch_assoc($lienket1);
                $truyvan2="SELECT * FROM hosonhanvien WHERE manv='$tentk'";
                $lienket2=mysqli_query($CONN,$truyvan2);
                $row2=mysqli_fetch_assoc($lienket2);
                $truyvan3="SELECT * FROM hosobacsy WHERE mabs='$tentk'";
                $lienket3=mysqli_query($CONN,$truyvan3);
                $row3=mysqli_fetch_assoc($lienket3);
        ?>
        <div class='div4'>
        <form method='POST'>
            <div style='font-family:arial;' id='divlapphieukham'>
                <div class=div4_1>
                    <button style="margin-left:2%;" id=in onclick="window.print();">Print</button>
                    <?php echo "<a style='text-decoration:none;border:2px solid black;font-size:13px;' href='HSBN_nhanvien.php?tentk=".$tentk."&&mabn=$mabn'>Thoat</a>";?>
                </div>
                <div class=div4_2 style='position:relative; font-famyly:arial;'>
                <img style='float:left;margin-right:2%;' src="hinhanh/Capture.JPG" alt="">
                <div >
                    <h5 style=width:40%;>NHA KHOA BAMBUFIT<br>
                    Địa chỉ: Hà Nội<br>Điện thoại: 0968832922<br>
                    Email: hoitv@bambu.vn</h5>
                </div>
                </div><hr>
            <div >
                <span style=font-weight:bold;>Mã bệnh nhân: <?php echo $mabn; ?></span>
                <span style=margin-left:68%;font-style:italic>Hà Nội, Ngày <?php echo $nden; ?> tháng <?php echo $tden; ?> năm <?php echo $namden; ?><span>
            </div>
            <h1 style=text-align:center;>KẾT QUẢ KHÁM BỆNH</h1>
            <span style=font-weight:bold;>Ngày khám:</span>
            <?php $nk=date('d-m-Y'); echo $nk; ?><br><span style=font-weight:bold;>Họ và tên:</span> <?php echo $row1['hoten']; ?><br>
            <span style=font-weight:bold;>Địa chỉ: </span><?php echo $row1['diachi']; ?><br>
            <span style=font-weight:bold;>Số điện thoại: </span><?php echo $row1['sdt']; ?> - 
            <span style=font-weight:bold;>Email: </span><?php echo $row1['email']; ?>
            <br><br>
            <?php

                        $truyvan2_lh1="SELECT * FROM lichhen WHERE mabn='$mabn' AND lankham='$i'";
                        $lienket2_lh1=mysqli_query($CONN,$truyvan2_lh1)or die("sai");
                        $row2_lh1=mysqli_fetch_assoc($lienket2_lh1);
                        $truyvan2_tt1="SELECT * FROM thuthuat WHERE mabn='$mabn' AND lankham='$i'";
                        $lienket2_tt1=mysqli_query($CONN,$truyvan2_tt1)or die("sai");
                        $row2_tt1=mysqli_fetch_assoc($lienket2_tt1);
                        $truyvan2_dt1="SELECT * FROM donthuoc WHERE mabn='$mabn' AND lankham='$i'";
                        $lienket2_dt1=mysqli_query($CONN,$truyvan2_dt1)or die("sai");
                        $row2_dt1=mysqli_fetch_assoc($lienket2_dt1);
                //nếu tất cả đều không rỗng
                if(mysqli_num_rows($lienket2_lh1)>0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)>0)
                {
                    $nth=$row2_tt1['ngaythuchien'];
                    $ngaythuchien=date('d-m-Y',strtotime($nth));
                    $nh=$row2_lh1['ngayhen'];
                    $ngayhen=date('d-m-Y',strtotime($nh));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='6'>Lần $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Thủ thuật</th><th >Ngày thực hiện</th><th style='width:50px;'>Bác sĩ thực hiện</th><th>Triệu chứng</th><th>Chuẩn đoán</th><th>Tên thủ thuật</th><th style='width:30px;'>Vị trí răng</th><th>Gía tiền</th ><th style='width:30px;'>Số lượng</th><th>Ghi chú</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>Đơn thuốc</th><th style='width:15px;'>Tên thuốc</th><th >Số lượng(Hộp)</th><th>Liều dùng và cách dùng</th><th>Lời dặn</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>Lịch hẹn</th><th style='width:15px;'>Ngày hẹn</th><th >Mã bác sĩ</th><th>Nội dung</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                    echo "</table></div><br>";
                    }  
                //nếu lịch hẹn rỗng
                if(mysqli_num_rows($lienket2_lh1)<=0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)>0)
                {
                    $nth=$row2_tt1['ngaythuchien'];
                    $ngaythuchien=date('d-m-Y',strtotime($nth));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='4'>Lần $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Thủ thuật</th><th >Ngày thực hiện</th><th style='width:50px;'>Bác sĩ thực hiện</th><th>Triệu chứng</th><th>Chuẩn đoán</th><th>Tên thủ thuật</th><th style='width:30px;'>Vị trí răng</th><th>Gía tiền</th ><th style='width:30px;'>Số lượng</th><th>Ghi chú</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>Đơn thuốc</th><th style='width:15px;'>Tên thuốc</th><th >Số lượng(Hộp)</th><th>Liều dùng và cách dùng</th><th>Lời dặn</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'></form></tr>";
                    echo "</table></div><br>";
                }
                //nếu thủ thuật rỗng
                if(mysqli_num_rows($lienket2_lh1)>0 && mysqli_num_rows($lienket2_tt1)<=0 && mysqli_num_rows($lienket2_dt1)>0)
                {
                    $nth=$row2_tt1['ngaythuchien'];
                    $ngaythuchien=date('d-m-Y',strtotime($nth));
                    $nh=$row2_lh1['ngayhen'];
                    $ngayhen=date('d-m-Y',strtotime($nh));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;width:40px;' rowspan='4'>Lần $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Đơn thuốc</th><th style='width:1px;'>Tên thuốc</th><th style='width:50px;'>Số lượng(Hộp)</th><th style='width:188px;'>Liều dùng và cách dùng</th><th style='width:180px;'>Lời dặn</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:138px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>Lịch hẹn</th><th>Ngày hẹn</th><th >Mã bác sĩ</th><th>Nội dung</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:135px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                    echo "</table></div><br>";
                }
                //nếu đơn thuốc rỗng
                if(mysqli_num_rows($lienket2_lh1)>0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)<=0)
                {
                    $nth=$row2_tt1['ngaythuchien'];
                    $ngaythuchien=date('d-m-Y',strtotime($nth));
                    $nh=$row2_lh1['ngayhen'];
                    $ngayhen=date('d-m-Y',strtotime($nh));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='4'>Lần $i</td><th style='background-color:rgb(150, 200, 30);width:45px;' rowspan='2'>Thủ thuật</th><th >Ngày thực hiện</th><th style='width:90px;'>Bác sĩ thực hiện</th><th style='width:195px;'>Triệu chứng</th><th style='width:183px;'>Chuẩn đoán</th><th style='width:190px;'>Tên thủ thuật</th><th style='width:30px;'>Vị trí răng</th><th style='width:100px;'>Gía tiền</th ><th style='width:30px;'>Số lượng</th><th style='width:160px;'>Ghi chú</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);width:30px;' rowspan='2'>Lịch hẹn</th><th style='width:15px;'>Ngày hẹn</th><th >Mã bác sĩ</th><th>Nội dung</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                    echo "</table></div><br>";
                }
                //nếu thủ thuật và đơn thuốc rỗng
                if(mysqli_num_rows($lienket2_lh1)>0 && mysqli_num_rows($lienket2_tt1)<=0 && mysqli_num_rows($lienket2_dt1)<=0)
                {
                    $nh=$row2_lh1['ngayhen'];
                    $ngayhen=date('d-m-Y',strtotime($nh));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='2'>Lần $i</td><th style='background-color:rgb(150, 200, 30);' rowspan='2'>Lịch hẹn</th><th style='width:15px;'>Ngày hẹn</th><th >Mã bác sĩ</th><th>Nội dung</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                    echo "</table></div><br>";
                }
                //nếu thủ thuật và lịch hẹn rỗng
                if(mysqli_num_rows($lienket2_lh1)<=0 && mysqli_num_rows($lienket2_tt1)<=0 && mysqli_num_rows($lienket2_dt1)>0)
                {
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='2'>Lần $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Đơn thuốc</th><th style='width:20px;'>Tên thuốc</th><th  style='width:15px;'>Số lượng(Hộp)</th><th >Liều dùng và cách dùng</th><th  style='width:150px;'>Lời dặn</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'></form></tr>";
                    echo "</table></div><br>";
                }
                //nếu đơn thuốc và lịch hẹn rỗng
                if(mysqli_num_rows($lienket2_lh1)<=0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)<=0)
                {
                    $nth=$row2_tt1['ngaythuchien'];
                    $ngaythuchien=date('d-m-Y',strtotime($nth));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='6'>Lần $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Thủ thuật</th><th >Ngày thực hiện</th><th style='width:50px;'>Bác sĩ thực hiện</th><th>Triệu chứng</th><th>Chuẩn đoán</th><th>Tên thủ thuật</th><th style='width:30px;'>Vị trí răng</th><th>Gía tiền</th ><th style='width:30px;'>Số lượng</th><th>Ghi chú</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td></form></tr>";
                    echo "</table></div><br>";
                }
                    
        ?>
        <div class=ki style=float:left;height:120px;>KHÁCH HÀNG<br><span style=font-style:italic>(Ký và ghi rõ họ tên)</div><div class=ki style=float:left;>KẾ TOÁN<br><span style=font-style:italic>(Ký và ghi rõ họ tên)</div><div class=ki style=float:left;>Y BÁC SĨ<br><span style='font-style:italic'>(Ký và ghi rõ họ tên)</div>
        </form>
        </div>
</html>