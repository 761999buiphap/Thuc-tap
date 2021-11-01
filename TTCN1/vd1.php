<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        document.getElementById("divthuthuat").innerHTML = "helooe";

        
    </script>
    <style>
        .div2{
            border:2px solid #bbb;
            width: 100%;
            height: 45px;
           font-family:arial;
           position:relative;
        }
        .div2form{
            display:inline-block;
            position:absolute;
            margin:7px 2px 0 53%;
        }
        
        .div4{
            font-family:arial;
            margin:10px;
            margin-left:20%;
            position:absolute;
            width:70%;
        }
        .div4 input[type=text]{
            margin:5px;
            padding:5px;
            border:2px solid #bbb;
            
            margin-right:2px;
            
        }
        /*----------------in phiếu khám--------------------*/
        .div5 input[type=text],.div5 textarea{
            outline:none;
            background-color:pink;
            font-family:arial;
            border:0px;
        }
        .div5_1{
            width:100%;
            height:7%;
            background-color:#bbb;
        }
        .sothutu{
            position:absolute;
            top:0px;
            left:70%;
            height:80px;
            width:20%;
            text-align:center;
            border:2px solid black;
        }
        .stt{
            height:55px;
            text-align:center;
            font-size:40px;
            width:50%;
            border:0px solid black;
        }
        .lidokham{
            margin-left:9%;
            font-size:16px;
        }
        .ki{
            width:20%;
            margin-left:10%;
            margin-top:3%;
            text-align:center;
        }
    </style>
</head>
<body>
    <?php include("giaodienquanli.php");  ?>
    <?php
                if(isset($_GET['tentk']))
                {
                    $tentk=$_GET['tentk'];
                }
        ?>
    <div class="div2">
        <p>Dữ liệu >> <span style="color:blue;">Hồ sơ bệnh nhân</span> >> <span style="color:red;">Thêm</span>
        </p>
    </div>
    <?php 
if(isset($_POST['luu']))
{
        $mabn=$_POST['mabn'];
        $tenbn=$_POST['tenbn'];
        $ns=$_POST['nsbn'];
        $ngaysinh=date('Y-m-d',strtotime($ns));
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $tieusubenh=$_POST['tieusubenh'];
        $ngayden=date("Y-m-d");
        $diachi=$_POST['diachi'];

        $CONN = new mysqli ('localhost','root','','qlpknk');
        mysqli_query($CONN,'SET NAMES UTF8');
        if(!empty($mabn)&& !empty($tenbn)&& !empty($ngaysinh)&& !empty($_POST['gioitinh'])&& !empty($sdt)&& !empty($email)&&!empty($tieusubenh)&&!empty($ngayden)&&!empty($diachi))
        {
            $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' OR sdt='$sdt'";
             $lienket1=mysqli_query($CONN,$truyvan1);
             if(mysqli_num_rows($lienket1)>0)
             {
                 while($row1=mysqli_fetch_assoc($lienket1))
                 {
                     $truyvannv="SELECT hoten FROM hosonhanvien WHERE manv='$tentk'";
                     $lienketnv=mysqli_query($CONN,$truyvannv);
                     $rownv=mysqli_fetch_assoc($lienketnv);
                    echo "<h2 style='text-align:center;color:red;'>< Đã tồn tại mã bệnh nhân này ></h2>";
                    echo "<div style='position:relative;width:100%;height:300px;'>";
                    echo "<img style='position:absolute;width:20%;' src='hinhanh/hoso.png' alt=''>";
                    echo "<div class='div4'>";
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
                    echo "<input style='border:none;margin-left:20px;' type='text' name='gioitinh' value='$row1[gioitinh]'><br>";
                    echo "<lable for='sdt'>Số điện thoại:</lable>";
                    echo "<input style='margin-left:53px;' type='text' name='sdt'value='$row1[sdt]'>";
                    echo "<lable style='margin-left:7px;' for='email'>Email:</lable>";
                    echo "<input style='margin-left:45px;width:20%;' type='text' name='email' value='$row1[email]'><br>";
                    echo "<lable for='diachi'>Địa chỉ:</lable>";
                    echo "<input style='margin-left:98px;width:60%;' type='text' name='diachi' value='$row1[diachi]'><br>";
                    echo "<lable for='tieusubenh'>Tiểu sử bệnh:</lable>";
                    echo "<input style='margin-left:53px;width:60%;' type='text' name='tieusubenh' value='$row1[tieusubenh]'><br>";
                    echo "<lable for='ngayden'>Ngày đến:</lable>";
                    echo "<input style='margin-left:70px;width:60%;border:none;' type='text' name='ngayden' value='$ngayden'><br>";
                    echo "<input style='width:10%; margin-top:15px; background-color:rgb(37, 158, 37);color:white;padding:5px;' type='submit' name='suathongtin' value='Sửa thông tin'>";
                    echo "<a style='width:10%;font-size:13px;margin:15px 0 0 5px; background-color:rgb(37, 158, 37);color:white;padding:5px;text-decoration:none;border:2px solid black;'  href='hosobenhnhan.php?tentk=".$tentk."'>Quay lại</a>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                 
          
                    echo "<button id=lapphieukham style='margin:5px 0px 0px 20%; width:12%;font-size:13px;background-color:rgb(37, 158, 37);color:white;padding:5px;text-decoration:none;border:2px solid black;'  >Lập phiếu khám</button>";
                    $nden = date("d");$tden=date("m");$namden=date("Y");
                    echo "<div class='div5'>";    
                    echo "<form method='POST'>";
                    echo "<div style='font-family:arial;' id='divlapphieukham'></div>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "<script>";
                    echo "document.getElementById('lapphieukham').addEventListener('click', lpk);";
                    echo "function lpk() { document.getElementById('divlapphieukham').style.position='absolute';
                        document.getElementById('divlapphieukham').style.height='90%';
                        document.getElementById('divlapphieukham').style.width='70%';
                        document.getElementById('divlapphieukham').style.left='15%';
                        document.getElementById('divlapphieukham').style.top='5%';
                        document.getElementById('divlapphieukham').style.background='pink';
                        document.getElementById('divlapphieukham').innerHTML ='<form><div class=div5_1><button id=in >Print</button><input type=submit name=luu2></div><div class=div5_2 style=position:relative;><h5 style=width:40%;>NHA KHOA BAMBUFIT<br>Địa chỉ: Hà Nội<br>Điện thoại: 0968832922<br>Email: hoitv@bambu.vn</h5><div class=sothutu>Số thứ tự:<br> <input class=stt type=text name=stt></div></div><hr>'+
                        '<div ><span style=font-weight:bold;>Mã bệnh nhân: $mabn</span><span style=margin-left:55%;>Hà Nội,Ngày $nden tháng $tden năm $namden<span></div>'+'<h2 style=text-align:center;>PHIẾU KHÁM BỆNH</h2>'+
                        '<span style=font-weight:bold;>Ngày khám:</span> $ngayden <br><span style=font-weight:bold;> Họ và tên:</span> $row1[hoten]<br><span style=font-weight:bold;>Địa chỉ: </span>$row1[diachi]<br><span style=font-weight:bold;>Số điện thoại: </span>$row1[sdt] - <span style=font-weight:bold;>Email: </span>$row1[email]<br>'+
                        '<span style=font-weight:bold;>Lí do khám:</span> <br><textarea class=lidokham name=lidokham rows=0 cols=80></textarea><br><span style=font-weight:bold;>Bác sĩ khám: </span><input style=font-size:16px; type=text name=tenbs><br><span style=font-weight:bold;>Tiền khám: </span><input style=font-size:16px; type=text name=tienkham><br><span style=font-weight:bold;>Người lập phiếu: </span>$rownv[hoten]'+
                        '<br><div class=ki style=float:left;>KHÁCH HÀNG<br><span style=font-style:italic>(Ký và ghi rõ họ tên)</div><div class=ki style=float:left;>KẾ TOÁN<br><span style=font-style:italic>(Ký và ghi rõ họ tên)</div><div class=ki style=float:left;>Y BÁC SĨ<br><span style=font-style:italic>(Ký và ghi rõ họ tên)</div></form>';}";
                        echo "</script>";
                        
                    exit;}
    }
}
}
?>    
<div style="position:relative;width:100%;height:400px;">
    <img style="position:absolute;width:20%;" src="hinhanh/hoso.png" alt="">
    <div class="div4" >
        <form method="POST">
        <lable for="mabn">Mã bệnh nhân:</lable>
        <?php echo "<input style='margin-left:45px;' type='text' name='mabn' ><br>";?>
        <lable for="tenbn">Tên bệnh nhân:</lable>
        <input style="width:60%;margin-left:38px;" type="text" name="tenbn"><br>
        <lable for="nsbn">Ngày sinh:</lable>
        <input style="margin-left:75px;" type="text" name="nsbn">
        <input type="radio" name="gioitinh" value="Nam">Nam
        <input type="radio"  name="gioitinh" value="Nữ">Nữ<br>
        <lable for="sdt">Số điện thoại:</lable>
        <input style="margin-left:53px;" type="text" name="sdt">
        <lable style="margin-left:7px;" for="email">Email:</lable>
        <input style="margin-left:45px;width:29%;" type="text" name="email"><br>
        <lable for="diachi">Địa chỉ:</lable>
        <input style="margin-left:98px;width:60%;" type="text" name="diachi"><br>
        <lable for="tieusubenh">Tiểu sử bệnh:</lable>
        <input style="margin-left:53px;width:60%;" type="text" name="tieusubenh"><br>
        <lable for="ngayden">Ngày đến:</lable>
        <?php echo date("d-m-Y"); $ngayden = date("d-m-Y");?>
        <div class="div5">
        <div id="divthuthuat" ></div>
        <div id="divlichhen"></div>
        <div id="divdonthuoc"></div>
        <input style="width:10%; margin-top:15px;" type="submit" name="luu" value="Lưu">
        <?php echo "<a style='width:10%;font-size:13px; margin-top:15px;text-decoration:none;border:2px solid black;'  href='hosobenhnhan.php?tentk=".$tentk."'>Quay lại</a>";?>
        </div>
        </form>
        </div>
        </div>
     
</div>
</html>


////////////////////////////////////////////////////////////
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
    if(isset($_POST['inketqua']))
    {
                $nden = date("d");$tden=date("m");$namden=date("Y");
                $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn'";
                $lienket1=mysqli_query($CONN,$truyvan1);
                $row1=mysqli_fetch_assoc($lienket1);
                $truyvan2="SELECT * FROM hosonhanvien WHERE manv='$tentk'";
                $lienket2=mysqli_query($CONN,$truyvan2);
                $row2=mysqli_fetch_assoc($lienket2);
        
        <div class='div4'>
        <form method='POST'>
            <div style='font-family:arial;' id='divlapphieukham'>
                <div class=div4_1>
                    <button style="margin-left:2%;" id=in onclick="window.print();">Print</button>
                    <a style="text-decoration:none;border:2px solid black;font-size:13px;" href="themhsbn.php?tentk='phap'&&mabn=BN01">Thoat</a>
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
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='6'>Lần $i</td><th style='background-color:rgb(150, 200, 30);' rowspan='2'>Đơn thuốc</th><th style='width:15px;'>Tên thuốc</th><th >Số lượng(Hộp)</th><th>Liều dùng và cách dùng</th><th>Lời dặn</th></tr>";
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
            <br><span style=font-weight:bold;>Người lập phiếu: </span><?php echo $row2['hoten']; ?><br>
        <div class=ki style=float:left;height:120px;>KHÁCH HÀNG<br><span style=font-style:italic>(Ký và ghi rõ họ tên)</div><div class=ki style=float:left;>KẾ TOÁN<br><span style=font-style:italic>(Ký và ghi rõ họ tên)</div><div class=ki style=float:left;>Y BÁC SĨ<br><span style='font-style:italic'>(Ký và ghi rõ họ tên)</div>
        </form>
        </div>
    }
</html>
////////////////////////////////////////////////////////////////////////
<style>
.div5_1 input[type=submit],.div5_1 button, .div5_1 a{
    background-color:rgb(37, 158, 37);
    padding:5px 10px;
    color:white;
    text-decoration:none;
    margin-top:8px;
}
.div5 input[type=text],.div5 textarea{
            outline:none;
            font-family:arial;
            border:0px;
        }
        .div5_1{
            width:100%;
            height:7%;
            background-color:#bbb;
        }
        .sothutu{
            position:absolute;
            top:0px;
            left:70%;
            height:80px;
            width:15%;
            text-align:center;
            border:2px solid black;
        }
        .stt{
            height:55px;
            text-align:center;
            font-size:40px;
            width:55%;
            border:0px solid black;
        }
        .ki{
            width:20%;
            margin-left:10%;
            margin-top:3%;
            text-align:center;
        }
</style>
<html>
<?php
    $CONN = new mysqli ('localhost','root','','qlpknk');
    mysqli_query($CONN,'SET NAMES UTF8');
    $lidokham1=$mabs1=$tienkham1=$stt1=$lankham1='';
                if(isset($_GET['mabn']))
                {
                    $mabn=$_GET['mabn'];
                    $tentk=$_GET['tentk'];
                }
                $nden = date("d");$tden=date("m");$namden=date("Y");
                $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn'";
                $lienket1=mysqli_query($CONN,$truyvan1);
                $row1=mysqli_fetch_assoc($lienket1);
                $truyvan2="SELECT * FROM hosonhanvien WHERE manv='$tentk'";
                $lienket2=mysqli_query($CONN,$truyvan2);
                $row2=mysqli_fetch_assoc($lienket2);

        if(isset($_POST['luu']))
        {
            $mabs=$_POST['mabs'];
            $lidokham=$_POST['lidokham'];
            $tienkham=$_POST['tienkham'];
            $lankham=$_POST['lankham'];
            $ngaykham=date('Y-m-d');
            $stt=$_POST['stt'];
            $truyvan3="INSERT INTO phieukham(mabn,stt,ngaykham,lidokham,mabs,tienkham,manv) VALUES('$mabn','$stt','$ngaykham','$lidokham','$mabs','$tienkham','$tentk')";
            $lienket3=mysqli_query($CONN,$truyvan3);
            $mabs1=$mabs;
            $stt1=$stt;
            $lidokham1=$lidokham;
            $tienkham1=$tienkham;
            $lankham1=$lankham;
        }
                ?>
        
        <div class='div5'>
        <form method='POST'>
            <div style='font-family:arial;' id='divlapphieukham'>
                <div class=div5_1>
                    <button style="margin-left:2%;" id=in onclick="window.print();">Print</button>
                    <input type=submit name=luu value=Lưu>
                    <?php echo "<a style='text-decoration:none;border:2px solid black;font-size:13px;' href='themhsbn.php?tentk=$tentk&&mabn=BN01'>Thoat</a>";?>
                </div>
                <div class=div4_2 style='position:relative; font-famyly:arial;'>
                    <img style='float:left;margin-right:2%;' src="hinhanh/Capture.JPG" alt="">
                    <div >
                        <h5 style=width:40%;>NHA KHOA BAMBUFIT<br>
                        Địa chỉ: Hà Nội<br>Điện thoại: 0968832922<br>
                        Email: hoitv@bambu.vn</h5>
                    </div>
                    <?php echo "<div class=sothutu>Số thứ tự:<br> <input class=stt type=text name=stt value=$stt1></div>";?>
                </div><br><hr>
            <div >
                <span style=font-weight:bold;>Mã bệnh nhân: <?php echo $mabn; ?></span>
                <span style=margin-left:55%;font-style:italic>Hà Nội, Ngày <?php echo $nden; ?> tháng <?php echo $tden; ?> năm <?php echo $namden; ?><span>
            </div>
            <h1 style=text-align:center;>PHIẾU KHÁM BỆNH</h1>
            <?php echo "<span style=font-weight:bold;>Lần khám:</span><input style='font-size:16px;' type=text name=lankham value='$lankham1' ><br>";?>
            <span style=font-weight:bold;>Ngày khám:</span>
            <?php $nk=date('d-m-Y'); echo $nk; ?><br><span style=font-weight:bold;>Họ và tên:</span> <?php echo $row1['hoten']; ?><br>
            <span style=font-weight:bold;>Địa chỉ: </span><?php echo $row1['diachi']; ?><br>
            <span style=font-weight:bold;>Số điện thoại: </span><?php echo $row1['sdt']; ?> - 
            <span style=font-weight:bold;>Email: </span><?php echo $row1['email']; ?><br>
            <?php echo "<span style=font-weight:bold;>Lí do khám:</span><input style='font-size:16px;' type=text name=lidokham value='$lidokham1' ><br>";?>
            <?php echo "<span style=font-weight:bold;>Bác sĩ khám: </span><input style=font-size:16px; type=text name=mabs value=$mabs1><br>";?>
            <?php echo "<span style=font-weight:bold;>Tiền khám: </span><input style=font-size:16px; type=text name=tienkham value=$tienkham1><br>";?>
            <span style=font-weight:bold;>Người lập phiếu: </span><?php echo $row2['hoten']; ?><br>
        <div class=ki style=float:left;>KHÁCH HÀNG<br><span style=font-style:italic>(Ký và ghi rõ họ tên)</div><div class=ki style=float:left;>KẾ TOÁN<br><span style=font-style:italic>(Ký và ghi rõ họ tên)</div><div class=ki style=float:left;>Y BÁC SĨ<br><span style='font-style:italic'>(Ký và ghi rõ họ tên)</div>
        </form>
        </div>
</html>