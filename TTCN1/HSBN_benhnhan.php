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
        .div4{
            font-family:arial;
            margin:10px 0px 0px 25%;
        }
        .div4 input[type=text]{
            margin:5px;
            padding:5px;
            border:2px solid #bbb;
            margin-right:2px;
            
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
        .div6{
            font-family:arial;
            margin:10px 10px 10px 30%;
        }
        .div6 input[type=text]{
            margin:5px;
            padding:5px;
            margin-right:2px;
            border:none;
            outline:none;
            font-size:15px;
        }
</style>
<body>
<div class="div2">
        <p style="margin-left:1%;">Lịch sử khám >> <span style="color:blue;">Hồ sơ bệnh nhân</span> </p>
    </div>
<?php

$CONN = new mysqli('localhost','root','','qlpknk');
mysqli_query($CONN,'SET NAMES UTF8');
if(isset($_GET['tentk']))
{
    $mabn=$_GET['tentk'];
    $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn'";
    $lienket1=mysqli_query($CONN,$truyvan1);
    if(mysqli_num_rows($lienket1)>0)
    {
        while($row1=mysqli_fetch_assoc($lienket1))
        {
            echo "<br><h2 style='text-align:center;'>HỒ SƠ BỆNH NHÂN</h2><br>";
            echo "<img style='position:absolute;width:20%;left:5%;' src='hinhanh/hoso.png' alt=''>";
            echo "<div class='div6'>";
            echo "<form method='POST' >";
            echo "<lable style='margin-right:45px;' for='mabn'>Mã bệnh nhân:</lable>";
            echo $row1['mabn'] ."<br>";
            echo "<lable for='tenbn'>Tên bệnh nhân:</lable>";
            echo "<input style='width:60%;margin-left:38px;' type='text' name='tenbn' value='$row1[hoten]'><br>";
            echo "<lable for='nsbn'>Ngày sinh:</lable>";
            $ns=$row1['ngaysinh'];
            $ngaysinh=date('d-m-Y',strtotime($ns));
            $nd=$row1['ngayden'];
            $ngayden=date('d-m-Y',strtotime($nd));
            echo "<input style='margin-left:75px;' type='text' name='nsbn'value='$ngaysinh'>";
            echo "<lable style='margin-left:7px;' for='nsbn'>Giới tính:</lable>";
            echo "<input style='margin-left:24px;' type='text' name='gioitinh' value='$row1[gioitinh]'><br>";
            echo "<lable for='sdt'>Số điện thoại:</lable>";
            echo "<input style='margin-left:53px;' type='text' name='sdt'value='$row1[sdt]'>";
            echo "<lable style='margin-left:7px;' for='email'>Email:</lable>";
            echo "<input style='margin-left:45px;width:20%;' type='text' name='email' value='$row1[email]'><br>";
            echo "<lable for='diachi'>Địa chỉ:</lable>";
            echo "<input style='margin-left:98px;width:60%;' type='text' name='diachi' value='$row1[diachi]'><br>";
            echo "<lable for='tieusubenh'>Tiểu sử bệnh:</lable>";
            echo "<input style='margin-left:53px;width:60%;' type='text' name='tieusubenh' value='$row1[tieusubenh]'><br>";
            echo "<lable for='ngayden'>Ngày đến:</lable><br><br>";
            echo "</form>";
            echo "</div>";
            echo "<br><h3 style='margin-left:8%;'>~~~ Bệnh án ~~~</h3><br>";


                }
        }
        //in ra lich su kham
        $truyvan2_lh="SELECT MAX(lankham),mabn,mabs,ngayhen,noidung FROM lichhen WHERE mabn='$mabn'";
        $lienket2_lh=mysqli_query($CONN,$truyvan2_lh)or die("sai");
        $row2_lh=mysqli_fetch_assoc($lienket2_lh);
        $truyvan2_tt="SELECT MAX(lankham) FROM thuthuat WHERE mabn='$mabn'";
        $lienket2_tt=mysqli_query($CONN,$truyvan2_tt)or die("sai");
        $row2_tt=mysqli_fetch_assoc($lienket2_tt);
        $truyvan2_dt="SELECT MAX(lankham) FROM lichhen WHERE mabn='$mabn'";
        $lienket2_dt=mysqli_query($CONN,$truyvan2_dt)or die("sai");
        $row2_dt=mysqli_fetch_assoc($lienket2_dt);
        $n=max($row2_lh['MAX(lankham)'],$row2_tt['MAX(lankham)'],$row2_dt['MAX(lankham)']);
        for($i=1;$i<=$n;$i++)
            {
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
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>Đơn thuốc</th><th style='width:15px;'>Tên thuốc</th><th >Số lượng(Hộp)</th><th>Liều dùng và cách dùng</th><th>Lời dặn</th><th>Thao tác</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'><td><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name=suathuthuat value=Sửa></a><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=xoathuthuat value=Xóa></a></td></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>Lịch hẹn</th><th style='width:15px;'>Ngày hẹn</th><th >Mã bác sĩ</th><th>Nội dung</th><th>Thao tác</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                    echo "</table><br>";
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
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>Đơn thuốc</th><th style='width:15px;'>Tên thuốc</th><th >Số lượng(Hộp)</th><th>Liều dùng và cách dùng</th><th>Lời dặn</th><th>Thao tác</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'></td></form></tr>";
                    echo "</table><br>";
                    //echo "<form method='POST' action='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name='inketqua' value='In Kết quả khám'><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name='inphieukham' value='In phiếu khám'></form><br>";
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
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:138px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'></td></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>Lịch hẹn</th><th>Ngày hẹn</th><th >Mã bác sĩ</th><th>Nội dung</th><th>Thao tác</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:135px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                    echo "</table><br>";
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
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);width:30px;' rowspan='2'>Lịch hẹn</th><th style='width:15px;'>Ngày hẹn</th><th >Mã bác sĩ</th><th>Nội dung</th><th>Thao tác</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                    echo "</table><br>";
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
                    echo "</table><br>";
                }
                //nếu thủ thuật và lịch hẹn rỗng
                if(mysqli_num_rows($lienket2_lh1)<=0 && mysqli_num_rows($lienket2_tt1)<=0 && mysqli_num_rows($lienket2_dt1)>0)
                {
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='2'>Lần $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Đơn thuốc</th><th style='width:20px;'>Tên thuốc</th><th  style='width:15px;'>Số lượng(Hộp)</th><th >Liều dùng và cách dùng</th><th  style='width:150px;'>Lời dặn</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='25' >$row2_dt1[cachdung]</textarea></td><td><input  style='width:180px;' type='text' name='loidan' value='$row2_dt1[loidan]'></td></form></tr>";
                    echo "</table><br>";
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
                    echo "</table><br>";
                }
            }
        }
    
?>
</body>