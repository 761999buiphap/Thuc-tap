<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        .div2{
            border:2px solid #bbb;
            width: 100%;
            height: 45px;
           font-family:arial;
           position:relative;
           background-color:#ddd;
    }
        .div2form{
            display:inline-block;
            position:absolute;
            margin:7px 2px 0 90%;
        }
        .div2form input{
            padding:5px;
        }
        .div4{
            font-family:arial;
            margin:10px;
        }
        .div4 input[type=text]{
            margin:5px;
            padding:5px;
            border:2px solid #bbb;
            
            margin-right:2px;
            
        }
        .div5{
            width:100%;
            height:40px;
            font-family:arial;
            display:inline-block;
        }
        .div5 input{
            background-color:rgb(37, 158, 37);
            color:white;
            padding:5px;
            margin-top:6px;
            margin-right:3px;
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
        .div7 th,td{
            text-align:center;
        }
        .bang, th,td{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px 0px;
            font-family:arial;
            margin-left:5%;
        }
        .div7 input[type=text],.div7 textarea{
            border:none;
            text-align:center;
            font-family:arial;
            outline:none;
        }
        .div8{
            background-color:red;
            width:30%;
            height:150px;
            text-align:center;
            margin:5% 0px 0px 30%;
            padding:3%;
            background-color:#bbb;
            border:10px solid grey;
        }
        .div8 input[type=text]{
            padding:10px 135px;
            margin:5px;
            text-align:center;
            outline:none;
        }
        .div8 input[type=submit]{
            padding:5px;
        }
    </style>
</head>
<body style="font-family:arial;";>
<?php
if(isset($_GET['tentk']))
    {
        $tentk=$_GET['tentk'];
    }
    
    $CONN = new mysqli ('localhost','root','','qlpknk');
    mysqli_query($CONN,'SET NAMES UTF8');
    $truyvannv="SELECT * FROM taikhoannhanvien WHERE tentk='$tentk'";
    $lienketnv=mysqli_query($CONN,$truyvannv);
    $rownv=mysqli_fetch_assoc($lienketnv);
    $truyvanbs="SELECT * FROM taikhoanbacsy WHERE tentk='$tentk'";
    $lienketbs=mysqli_query($CONN,$truyvanbs);
    $rowbs=mysqli_fetch_assoc($lienketbs);
    $truyvandm="SELECT * FROM taikhoanadmin WHERE tentk='$tentk'";
    $lienketdm=mysqli_query($CONN,$truyvandm);
    $rowdm=mysqli_fetch_assoc($lienketdm);
    $mk1err=$mk2err=$mk3err=$mkerr='';
?>
    <?php
    if($rownv>0)
        include("GDQL_nhanvien.php");  
    if($rowbs>0)
        include("giaodienquanlybacsy.php"); 
    if($rowdm>0)
        include("GDQL_admin.php");  
          
    ?>
    <div class="div2">
        <?php  echo "<a class='div2form' style='background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='themhsbn.php?tentk=".$tentk."&&mabn='>Th??m m???i</a>";?>
        <p>D??? LI???U >> <span style="color:blue;">H??? s?? b???nh nh??n</span> </p>
    </div>
    <?php $CONN = new mysqli ('localhost','root','','qlpknk') ; ?>
    
    <?php 
    //khi ng?????i d??ng ???n n??t l???c t??m
    if(isset($_POST['loctim']) || isset($_POST['suathongtin']))
    {
        if(!empty($_POST['cmt']) || isset($_POST['suathongtin']) )
        {   
            
                mysqli_query($CONN,'SET NAMES UTF8');
                //neu nhan vao nut sua thong tin
                if(isset($_POST['suathongtin']))
                {
                    $mabn=$_POST['mabn'];
                    $tenbn=$_POST['tenbn'];
                    $ns=$_POST['nsbn'];
                    $ngaysinh=date('Y-m-d',strtotime($ns));
                    $gioitinh=$_POST['gioitinh'];
                    $sdt=$_POST['sdt'];
                    $email=$_POST['email'];
                    $diachi=$_POST['diachi'];
                    $tieusubenh=$_POST['tieusubenh'];
                    $nd=$_POST['ngayden'];
                    $ngayden=date('Y-m-d',strtotime($nd));
                    $truyvan2="UPDATE hosobenhnhan SET hoten='$tenbn',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sdt',email='$email',diachi='$diachi',tieusubenh='$tieusubenh',ngayden='$ngayden' WHERE mabn='$mabn'";
                    $lienket2=mysqli_query($CONN,$truyvan2)or die("sai");

                    $truyvancmt="SELECT * FROM hosobenhnhan WHERE mabn='$mabn'";
                    $lienketcmt=mysqli_query($CONN,$truyvancmt) or die("sai1");
                    $rowcmt=mysqli_fetch_assoc($lienketcmt);
                    $cmt=$rowcmt['cmt'];
                }
                if(isset($_POST['loctim']))
                {
                    $cmt=$_POST['cmt'];
                }
                $truyvan1="SELECT * FROM hosobenhnhan WHERE cmt='$cmt'";
                $lienket1=mysqli_query($CONN,$truyvan1) or die("sai");
                if(mysqli_num_rows($lienket1)>0)
                {
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<br><h2 style='text-align:center;'>H??? S?? B???NH NH??N</h2><br>";
                        echo "<img style='position:absolute;width:20%;left:5%;' src='hinhanh/hoso.png' alt=''>";
                        echo "<div class='div6'>";
                        echo "<form method='POST' >";
                        echo "<lable for='mabn' style='font-weight:bold;'>1. M?? b???nh nh??n:</lable>";
                        echo "<input style='margin-left:35px;' type='text' name='mabn' value='$row1[mabn]'>";
                        echo "<lable style='font-weight:bold;' for='email'>6. Email:</lable>";
                        echo "<input style='margin-left:86px;width:20%;' type='text' name='email' value='$row1[email]'><br>";
                        echo "<lable for='tenbn' style='font-weight:bold;'>2. T??n b???nh nh??n:</lable>";
                        echo "<input style='margin-left:28px;' type='text' name='tenbn' value='$row1[hoten]'>";
                        echo "<lable for='diachi'style='font-weight:bold;'>7. ?????a ch???:</lable>";
                        echo "<input style='margin-left:76px;' type='text' name='diachi' value='$row1[diachi]'><br>";
                        echo "<lable for='nsbn' style='font-weight:bold;'>3. Ng??y sinh:</lable>";
                        $ns=$row1['ngaysinh'];
                        $ngaysinh=date('d-m-Y',strtotime($ns));
                        $nd=$row1['ngayden'];
                        $ngayden=date('d-m-Y',strtotime($nd));
                        echo "<input style='margin-left:65px;' type='text' name='nsbn'value='$ngaysinh'>";
                        echo "<lable for='tieusubenh'style='font-weight:bold;'>8. Ti???u s??? b???nh:</lable>";
                        echo "<input style='margin-left:30px;' type='text' name='tieusubenh' value='$row1[tieusubenh]'><br>";
                        echo "<lable style='font-weight:bold;' for='nsbn' >4. Gi???i t??nh:</lable>";
                        echo "<input style='border:none;margin-left:75px;' type='text' name='gioitinh' value='$row1[gioitinh]'>";
                        echo "<lable for='ngayden'style='font-weight:bold;'>9. Ng??y ?????n:</lable>";
                        echo "<input style='margin-left:58px;border:none;' type='text' name='ngayden' value='$ngayden'><br>";
                        echo "<lable for='sdt'style='font-weight:bold;'>5. S??? ??i???n tho???i:</lable>";
                        echo "<input style='margin-left:41px;' type='text' name='sdt'value='$row1[sdt]'><br>";
                        echo "<input style='width:10%; margin-top:15px; background-color:rgb(37, 158, 37);color:white;padding:5px;' type='submit' name='suathongtin' value='S???a th??ng tin'>";
                        echo "<a style='width:10%;font-size:13px;margin:15px 0 0 5px; background-color:rgb(37, 158, 37);color:white;padding:5px;text-decoration:none;border:2px solid black;'  href='HSBN_nhanvien.php?tentk=".$tentk."'>Quay l???i</a>";
                        echo "</form>";
                        echo "</div>";
                        echo "<br><h3 style='margin-left:8%;'>~~~ B???nh ??n ~~~</h3><br>";

                    }
                    //in ra lich su kham
                    $truyvan1="SELECT * FROM hosobenhnhan WHERE cmt='$cmt'";
                    $lienket1=mysqli_query($CONN,$truyvan1) or die("sai1");
                    $row1=mysqli_fetch_assoc($lienket1);
                    $mabn=$row1['mabn'];
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
                            //n???u t???t c??? ?????u kh??ng r???ng
                            if(mysqli_num_rows($lienket2_lh1)>0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)>0)
                            {
                                $nth=$row2_tt1['ngaythuchien'];
                                $ngaythuchien=date('d-m-Y',strtotime($nth));
                                $nh=$row2_lh1['ngayhen'];
                                $ngayhen=date('d-m-Y',strtotime($nh));
                                echo "<div class='div7'>";
                                echo "<table class='bang' >";
                                echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='6'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Th??? thu???t</th><th >Ng??y th???c hi???n</th><th style='width:50px;'>B??c s?? th???c hi???n</th><th>Tri???u ch???ng</th><th>Chu???n ??o??n</th><th>T??n th??? thu???t</th><th style='width:30px;'>V??? tr?? r??ng</th><th>G??a ti???n</th ><th style='width:30px;'>S??? l?????ng</th><th>Ghi ch??</th></tr>";
                                echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td></form></tr>";
                                echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>????n thu???c</th><th style='width:15px;'>T??n thu???c</th><th >S??? l?????ng(H???p)</th><th>Li???u d??ng v?? c??ch d??ng</th><th>L???i d???n</th></tr>";
                                echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'></form></tr>";
                                echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>L???ch h???n</th><th style='width:15px;'>Ng??y h???n</th><th >M?? b??c s??</th><th>N???i dung</th></tr>";
                                echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                                echo "</table><br>";
                                echo "<a href='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin:0px 5px 0px 5%;' type=submit name=inketqua value='In k???t qu???'></a><a href='lapphieukham.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=inphieukham value='In phi???u kh??m'></a><br><br>";
                            }
                            //n???u l???ch h???n r???ng
                            if(mysqli_num_rows($lienket2_lh1)<=0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)>0)
                            {
                                $nth=$row2_tt1['ngaythuchien'];
                                $ngaythuchien=date('d-m-Y',strtotime($nth));
                                echo "<div class='div7'>";
                                echo "<table class='bang' >";
                                echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='4'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Th??? thu???t</th><th >Ng??y th???c hi???n</th><th style='width:50px;'>B??c s?? th???c hi???n</th><th>Tri???u ch???ng</th><th>Chu???n ??o??n</th><th>T??n th??? thu???t</th><th style='width:30px;'>V??? tr?? r??ng</th><th>G??a ti???n</th ><th style='width:30px;'>S??? l?????ng</th><th>Ghi ch??</th></tr>";
                                echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td></form></tr>";
                                echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>????n thu???c</th><th style='width:15px;'>T??n thu???c</th><th >S??? l?????ng(H???p)</th><th>Li???u d??ng v?? c??ch d??ng</th><th>L???i d???n</th></tr>";
                                echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'></td></form></tr>";
                                echo "</table><br>";
                                echo "<a href='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin:0px 5px 0px 5%;' type=submit name=inketqua value='In k???t qu???'></a><a href='lapphieukham.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=inphieukham value='In phi???u kh??m'></a><br><br>";
                                //echo "<form method='POST' action='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name='inketqua' value='In K???t qu??? kh??m'><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name='inphieukham' value='In phi???u kh??m'></form><br>";
                            }
                            //n???u th??? thu???t r???ng
                            if(mysqli_num_rows($lienket2_lh1)>0 && mysqli_num_rows($lienket2_tt1)<=0 && mysqli_num_rows($lienket2_dt1)>0)
                            {
                                $nth=$row2_tt1['ngaythuchien'];
                                $ngaythuchien=date('d-m-Y',strtotime($nth));
                                $nh=$row2_lh1['ngayhen'];
                                $ngayhen=date('d-m-Y',strtotime($nh));
                                echo "<div class='div7'>";
                                echo "<table class='bang' >";
                                echo "<tr style='background-color:#bbb;'><td style='background-color:pink;width:40px;' rowspan='4'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>????n thu???c</th><th style='width:1px;'>T??n thu???c</th><th style='width:50px;'>S??? l?????ng(H???p)</th><th style='width:188px;'>Li???u d??ng v?? c??ch d??ng</th><th style='width:180px;'>L???i d???n</th></tr>";
                                echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:138px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'></td></form></tr>";
                                echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>L???ch h???n</th><th>Ng??y h???n</th><th >M?? b??c s??</th><th>N???i dung</th></tr>";
                                echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:135px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                                echo "</table><br>";
                                echo "<a href='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin:0px 5px 0px 5%;' type=submit name=inketqua value='In k???t qu???'></a><a href='lapphieukham.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=inphieukham value='In phi???u kh??m'></a><br><br>";
                            }
                            //n???u ????n thu???c r???ng
                            if(mysqli_num_rows($lienket2_lh1)>0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)<=0)
                            {
                                $nth=$row2_tt1['ngaythuchien'];
                                $ngaythuchien=date('d-m-Y',strtotime($nth));
                                $nh=$row2_lh1['ngayhen'];
                                $ngayhen=date('d-m-Y',strtotime($nh));
                                echo "<div class='div7'>";
                                echo "<table class='bang' >";
                                echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='4'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:45px;' rowspan='2'>Th??? thu???t</th><th >Ng??y th???c hi???n</th><th style='width:90px;'>B??c s?? th???c hi???n</th><th style='width:195px;'>Tri???u ch???ng</th><th style='width:183px;'>Chu???n ??o??n</th><th style='width:190px;'>T??n th??? thu???t</th><th style='width:30px;'>V??? tr?? r??ng</th><th style='width:100px;'>G??a ti???n</th ><th style='width:30px;'>S??? l?????ng</th><th style='width:160px;'>Ghi ch??</th></tr>";
                                echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td></form></tr>";
                                echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);width:30px;' rowspan='2'>L???ch h???n</th><th style='width:15px;'>Ng??y h???n</th><th >M?? b??c s??</th><th>N???i dung</th></tr>";
                                echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                                echo "</table><br>";
                                echo "<a href='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin:0px 5px 0px 5%;' type=submit name=inketqua value='In k???t qu???'></a><a href='lapphieukham.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=inphieukham value='In phi???u kh??m'></a><br><br>";
                            }
                            //n???u th??? thu???t v?? ????n thu???c r???ng
                            if(mysqli_num_rows($lienket2_lh1)>0 && mysqli_num_rows($lienket2_tt1)<=0 && mysqli_num_rows($lienket2_dt1)<=0)
                            {
                                $nh=$row2_lh1['ngayhen'];
                                $ngayhen=date('d-m-Y',strtotime($nh));
                                echo "<div class='div7'>";
                                echo "<table class='bang' >";
                                echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='2'>L???n $i</td><th style='background-color:rgb(150, 200, 30);' rowspan='2'>L???ch h???n</th><th style='width:15px;'>Ng??y h???n</th><th >M?? b??c s??</th><th>N???i dung</th></tr>";
                                echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                                echo "</table><br>";
                                echo "<a href='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin:0px 5px 0px 5%;' type=submit name=inketqua value='In k???t qu???'></a><a href='lapphieukham.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=inphieukham value='In phi???u kh??m'></a><br><br>";
                            }
                            //n???u th??? thu???t v?? l???ch h???n r???ng
                            if(mysqli_num_rows($lienket2_lh1)<=0 && mysqli_num_rows($lienket2_tt1)<=0 && mysqli_num_rows($lienket2_dt1)>0)
                            {
                                echo "<div class='div7'>";
                                echo "<table class='bang' >";
                                echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='2'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>????n thu???c</th><th style='width:20px;'>T??n thu???c</th><th  style='width:15px;'>S??? l?????ng(H???p)</th><th >Li???u d??ng v?? c??ch d??ng</th><th  style='width:150px;'>L???i d???n</th></tr>";
                                echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='25' >$row2_dt1[cachdung]</textarea></td><td><input  style='width:180px;' type='text' name='loidan' value='$row2_dt1[loidan]'></form></tr>";
                                echo "</table><br>";
                                echo "<a href='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin:0px 5px 0px 5%;' type=submit name=inketqua value='In k???t qu???'></a><a href='lapphieukham.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=inphieukham value='In phi???u kh??m'></a><br><br>";
                            }
                                //n???u ????n thu???c v?? l???ch h???n r???ng
                            if(mysqli_num_rows($lienket2_lh1)<=0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)<=0)
                            {
                                $nth=$row2_tt1['ngaythuchien'];
                                $ngaythuchien=date('d-m-Y',strtotime($nth));
                                echo "<div class='div7'>";
                                echo "<table class='bang' >";
                                echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='6'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Th??? thu???t</th><th >Ng??y th???c hi???n</th><th style='width:50px;'>B??c s?? th???c hi???n</th><th>Tri???u ch???ng</th><th>Chu???n ??o??n</th><th>T??n th??? thu???t</th><th style='width:30px;'>V??? tr?? r??ng</th><th>G??a ti???n</th ><th style='width:30px;'>S??? l?????ng</th><th>Ghi ch??</th></tr>";
                                echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td></form></tr>";
                                echo "</table><br>";
                                echo "<a href='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin:0px 5px 0px 5%;' type=submit name=inketqua value='In k???t qu???'></a><a href='lapphieukham.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=inphieukham value='In phi???u kh??m'></a><br><br>";
                            }
                        }exit;
                    }
                    else
                            {
                                 echo "<h3 style='color:red;text-align:center;'>< Kh??ng t??m th???y s??? ch???ng minh th?? n??y ></h3>";              
                                
                            }
                
            /*
                        {         
                           
                            while($row=mysqli_fetch_assoc($lienket1))
                            {
                                
                                echo "<tr>";
                                echo "<td>" .$row['mabn'] ."</td>";
                                echo "<td style='background-color:rgb(150, 200, 30);'>" .date('d-m-Y',strtotime($row['ngayden'])) ."</td>"; 
                                echo "<td style='background-color:pink;color:blue;'>" .$row['hoten'] ."</td>";
                                echo "<td >" .date('d-m-Y',strtotime($row['ngaysinh'])) ."</td>"; 
                                echo "<td>" .$row['gioitinh'] ."</td>";
                                echo "<td >" .$row['sdt'] ."</td>"; 
                                echo "<td>" .$row['diachi'] ."</td>";
                                echo "<td>" .$row['email'] ."</td>";
                                echo "<td>" .$row['tieusubenh'] ."</td>";    
                                $truyvankt="SELECT manv FROM hosonhanvien WHERE manv='$tentk' ";
                                $lienketkt=mysqli_query($CONN,$truyvankt);
                                if(mysqli_num_rows($lienketkt)>0)
                                {
                                    echo "<td><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:3px;' href='suahosobenhnhan.php?mabn=".$row['mabn']."&tentk=".$tentk."'>L???ch s??? </a><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='sua.php?xoabn=".$row['mabn']."&tentk=".$tentk."'>xoa</a></td>";
                                }
                                else
                                    echo "<td><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:3px;' href='LSBN_bacsy.php?mabn=".$row['mabn']."&tentk=".$tentk."'>L???ch s??? </a><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='sua.php?xoabn=".$row['mabn']."&tentk=".$tentk."'>xoa</a></td>";
                                echo "</tr>";
                            }
                            
                        }
                        exit;
                        
        }
        if(empty($mabn) && !empty($tenbn))
        {
            mysqli_query($CONN,'SET NAMES UTF8');
            $truyvan1="SELECT mabn,hoten,ngaysinh,sdt,diachi,email,tieusubenh,ngayden,gioitinh FROM hosobenhnhan WHERE hoten='$tenbn'";
            $lienket1=mysqli_query($CONN,$truyvan1) or die("sai");
            if(mysqli_num_rows($lienket1)>0)
                        {         
                           
                            while($row=mysqli_fetch_assoc($lienket1))
                            {
                                
                                echo "<tr>";
                                echo "<td>" .$row['mabn'] ."</td>";
                                echo "<td style='background-color:rgb(150, 200, 30);'>" .date('d-m-Y',strtotime($row['ngayden'])) ."</td>"; 
                                echo "<td style='background-color:pink;color:blue;'>" .$row['hoten'] ."</td>";
                                echo "<td >" .date('d-m-Y',strtotime($row['ngaysinh'])) ."</td>"; 
                                echo "<td>" .$row['gioitinh'] ."</td>";
                                echo "<td >" .$row['sdt'] ."</td>"; 
                                echo "<td>" .$row['diachi'] ."</td>";
                                echo "<td>" .$row['email'] ."</td>";
                                echo "<td>" .$row['tieusubenh'] ."</td>";   
                                $truyvankt="SELECT manv FROM hosonhanvien WHERE manv='$tentk' ";
                                $lienketkt=mysqli_query($CONN,$truyvankt);
                                if(mysqli_num_rows($lienketkt)>0)
                                {
                                    echo "<td><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:3px;' href='suahosobenhnhan.php?mabn=".$row['mabn']."&tentk=".$tentk."'>L???ch s??? </a><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='sua.php?xoabn=".$row['mabn']."&tentk=".$tentk."'>xoa</a></td>";
                                }
                                else
                                    echo "<td><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:3px;' href='LSBN_bacsy.php?mabn=".$row['mabn']."&tentk=".$tentk."'>L???ch s??? </a><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='sua.php?xoabn=".$row['mabn']."&tentk=".$tentk."'>xoa</a></td>";
                                echo "</tr>";
                            }
                            
                        }
                        exit;
                        
        }
        if(!empty($mabn) && !empty($tenbn))
        {
            mysqli_query($CONN,'SET NAMES UTF8');
            $truyvan1="SELECT mabn,hoten,ngaysinh,sdt,diachi,email,tieusubenh,ngayden,gioitinh FROM hosobenhnhan WHERE hoten='$tenbn' AND mabn='$mabn'";
            $lienket1=mysqli_query($CONN,$truyvan1) ;
            if(mysqli_num_rows($lienket1)>0)
                        {         
                           
                            while($row=mysqli_fetch_assoc($lienket1))
                            {
                                
                                echo "<tr>";
                                echo "<td>" .$row['mabn'] ."</td>";
                                echo "<td style='background-color:rgb(150, 200, 30);'>" .date('d-m-Y',strtotime($row['ngayden'])) ."</td>"; 
                                echo "<td style='background-color:pink;color:blue;'>" .$row['hoten'] ."</td>";
                                echo "<td >" .date('d-m-Y',strtotime($row['ngaysinh'])) ."</td>"; 
                                echo "<td>" .$row['gioitinh'] ."</td>";
                                echo "<td >" .$row['sdt'] ."</td>"; 
                                echo "<td>" .$row['diachi'] ."</td>";
                                echo "<td>" .$row['email'] ."</td>";
                                echo "<td>" .$row['tieusubenh'] ."</td>";     
                                $truyvankt="SELECT manv FROM hosonhanvien WHERE manv='$tentk' ";
                                $lienketkt=mysqli_query($CONN,$truyvankt);
                                if(mysqli_num_rows($lienketkt)>0)
                                {
                                    echo "<td><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:3px;' href='suahosobenhnhan.php?mabn=".$row['mabn']."&tentk=".$tentk."'>L???ch s??? </a><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='sua.php?xoabn=".$row['mabn']."&tentk=".$tentk."'>xoa</a></td>";
                                }
                                else
                                    echo "<td><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:3px;' href='LSBN_bacsy.php?mabn=".$row['mabn']."&tentk=".$tentk."'>L???ch s??? </a><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='sua.php?xoabn=".$row['mabn']."&tentk=".$tentk."'>xoa</a></td>";
                                echo "</tr>";
                            }
                            
                        }
                        else
                            echo "<h3 style='color:red;text-align:center;'>< M?? b???nh nh??n v?? t??n b???nh nh??n kh??ng kh???p! ></h3>";              
                        exit;
                        
        }
    }
    ?>
    <?php
         // in ra t???t c??? c??c h??? s?? b???nh nh??n
         mysqli_query($CONN,'SET NAMES UTF8');
         $truyvan="SELECT mabn,hoten,ngaysinh,sdt,diachi,email,tieusubenh,ngayden,gioitinh FROM hosobenhnhan";
         $ketnoi=mysqli_query($CONN,$truyvan) or die("khong");
         if(mysqli_num_rows(mysqli_query($CONN,$truyvan))>0)
        {         
                     while($row=mysqli_fetch_assoc($ketnoi))
                     {
                         echo "<tr>";
                         echo "<td>" .$row['mabn'] ."</td>";
                         echo "<td style='background-color:rgb(150, 200, 30);'>" .date('d-m-Y',strtotime($row['ngayden'])) ."</td>"; 
                         echo "<td style='background-color:pink;color:blue;'>" .$row['hoten'] ."</td>";
                         echo "<td >" .date('d-m-Y',strtotime($row['ngaysinh'])) ."</td>"; 
                         echo "<td>" .$row['gioitinh'] ."</td>";
                         echo "<td >" .$row['sdt'] ."</td>"; 
                         echo "<td>" .$row['diachi'] ."</td>";
                         echo "<td>" .$row['email'] ."</td>";
                         echo "<td>" .$row['tieusubenh'] ."</td>";  
                         $truyvankt="SELECT manv FROM hosonhanvien WHERE manv='$tentk' ";
                         $lienketkt=mysqli_query($CONN,$truyvankt);
                         if(mysqli_num_rows($lienketkt)>0)
                         {
                             echo "<td><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:3px;' href='suahosobenhnhan.php?mabn=".$row['mabn']."&tentk=".$tentk."'>L???ch s??? </a><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='sua.php?xoabn=".$row['mabn']."&tentk=".$tentk."'>xoa</a></td>";
                         }
                         else
                             echo "<td><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:3px;' href='LSBN_bacsy.php?mabn=".$row['mabn']."&tentk=".$tentk."'>L???ch s??? </a><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='sua.php?xoabn=".$row['mabn']."&tentk=".$tentk."'>xoa</a></td>";
                         echo "</tr>";*/
                     }
        }
         
               
    ?>
<div class="div8">
<form method="POST">
            <input style="width:130px;" type="text" name="cmt" placeholder="Nh???p v??o ch???ng minh th??"><br><br><br>
            <input style="background-color:rgb(37, 158, 37);color:white;" type="submit" name="loctim" value="L???c t??m">
</form>
</div>
</body>
</html>