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

    if($rownv>0)
        include("GDQL_nhanvien.php");  
    if($rowbs>0)
        include("giaodienquanlybacsy.php"); 
    if($rowdm>0)
        include("GDQL_admin.php");  
    ?>

<style>
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
<?php

$CONN = new mysqli('localhost','root','','qlpknk');
mysqli_query($CONN,'SET NAMES UTF8');
if(isset($_GET['mabn']))
{
    $mabn=$_GET['mabn'];
    $tentk=$_GET['tentk'];
    $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn'";
    $lienket1=mysqli_query($CONN,$truyvan1);
    if(mysqli_num_rows($lienket1)>0)
    {
        while($row1=mysqli_fetch_assoc($lienket1))
        {
            echo "<div class='div4'>";
            echo "<form method='POST' >";
            echo "<lable style='margin-right:45px;' for='mabn'>M?? b???nh nh??n:</lable>";
            echo $row1['mabn'] ."<br>";
            echo "<lable for='tenbn'>T??n b???nh nh??n:</lable>";
            echo "<input style='width:60%;margin-left:38px;' type='text' name='tenbn' value='$row1[hoten]'><br>";
            echo "<lable for='nsbn'>Ng??y sinh:</lable>";
            $ns=$row1['ngaysinh'];
            $ngaysinh=date('d-m-Y',strtotime($ns));
            $nd=$row1['ngayden'];
            $ngayden=date('d-m-Y',strtotime($nd));
            echo "<input style='margin-left:75px;' type='text' name='nsbn'value='$ngaysinh'>";
            echo "<lable style='margin-left:7px;' for='nsbn'>Gi???i t??nh:</lable>";
            echo "<input style='border:none;margin-left:20px;' type='text' name='gioitinh' value='$row1[gioitinh]'><br>";
            echo "<lable for='sdt'>S??? ??i???n tho???i:</lable>";
            echo "<input style='margin-left:53px;' type='text' name='sdt'value='$row1[sdt]'>";
            echo "<lable style='margin-left:7px;' for='email'>Email:</lable>";
            echo "<input style='margin-left:45px;width:20%;' type='text' name='email' value='$row1[email]'><br>";
            echo "<lable for='diachi'>?????a ch???:</lable>";
            echo "<input style='margin-left:98px;width:60%;' type='text' name='diachi' value='$row1[diachi]'><br>";
            echo "<lable for='tieusubenh'>Ti???u s??? b???nh:</lable>";
            echo "<input style='margin-left:53px;width:60%;' type='text' name='tieusubenh' value='$row1[tieusubenh]'><br>";
            echo "<lable style='margin-right:6%;' for='ngayden'>Ng??y ?????n:</lable>$ngayden<br><br>";
            /*
            if($rownv>0)
                include("GDQL_nhanvien.php");  
            if($rowbs>0)
                echo "<a style='width:10%;font-size:13px;margin:15px 0 0 0px; background-color:rgb(37, 158, 37);color:white;padding:5px;text-decoration:none;border:2px solid black;'  href='HSBN_bacsy.php?tentk=".$tentk."'>Quay l???i</a>";
            if($rowdm>0)
                echo "<a style='width:10%;font-size:13px;margin:15px 0 0 0px; background-color:rgb(37, 158, 37);color:white;padding:5px;text-decoration:none;border:2px solid black;'  href='HSBN_nhanvien.php?tentk=".$tentk."'>Quay l???i</a>";
            */echo "</form>";
            echo "</div>";

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
                //n???u t???t c??? ?????u kh??ng r???ng
                if(mysqli_num_rows($lienket2_lh1)>0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)>0)
                {
                    $nth=$row2_tt1['ngaythuchien'];
                    $ngaythuchien=date('d-m-Y',strtotime($nth));
                    $nh=$row2_lh1['ngayhen'];
                    $ngayhen=date('d-m-Y',strtotime($nh));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='6'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Th??? thu???t</th><th >Ng??y th???c hi???n</th><th style='width:50px;'>B??c s?? th???c hi???n</th><th>Tri???u ch???ng</th><th>Chu???n ??o??n</th><th>T??n th??? thu???t</th><th style='width:30px;'>V??? tr?? r??ng</th><th>G??a ti???n</th ><th style='width:30px;'>S??? l?????ng</th><th>Ghi ch??</th><th>Thao t??c</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td><td><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name=suathuthuat value=S???a></a><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=xoathuthuat value=X??a></a></td></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>????n thu???c</th><th style='width:15px;'>T??n thu???c</th><th >S??? l?????ng(H???p)</th><th>Li???u d??ng v?? c??ch d??ng</th><th>L???i d???n</th><th>Thao t??c</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'><td><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name=suadonthuoc value=S???a></a><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=xoadonthuoc value=X??a></a></td></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>L???ch h???n</th><th style='width:15px;'>Ng??y h???n</th><th >M?? b??c s??</th><th>N???i dung</th><th>Thao t??c</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td><td><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name=sualichhen value=S???a></a><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=xoalichhen value=X??a></a></td></form></tr>";
                    echo "</table><br>";
                }
                //n???u l???ch h???n r???ng
                if(mysqli_num_rows($lienket2_lh1)<=0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)>0)
                {
                    $nth=$row2_tt1['ngaythuchien'];
                    $ngaythuchien=date('d-m-Y',strtotime($nth));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='4'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Th??? thu???t</th><th >Ng??y th???c hi???n</th><th style='width:50px;'>B??c s?? th???c hi???n</th><th>Tri???u ch???ng</th><th>Chu???n ??o??n</th><th>T??n th??? thu???t</th><th style='width:30px;'>V??? tr?? r??ng</th><th>G??a ti???n</th ><th style='width:30px;'>S??? l?????ng</th><th>Ghi ch??</th><th>Thao t??c</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td><td><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name=suathuthuat value=S???a></a><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=xoathuthuat value=X??a></a></td></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>????n thu???c</th><th style='width:15px;'>T??n thu???c</th><th >S??? l?????ng(H???p)</th><th>Li???u d??ng v?? c??ch d??ng</th><th>L???i d???n</th><th>Thao t??c</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'><td><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name=suadonthuoc value=S???a></a><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=xoadonthuoc value=X??a></a></td></form></tr>";
                    echo "</table><br>";
                }
                //n???u th??? thu???t r???ng
                if(mysqli_num_rows($lienket2_lh1)>0 && mysqli_num_rows($lienket2_tt1)<=0 && mysqli_num_rows($lienket2_dt1)>0)
                {
                    $nth=$row2_tt1['ngaythuchien'];
                    $ngaythuchien=date('d-m-Y',strtotime($nth));
                    $nh=$row2_lh1['ngayhen'];
                    $ngayhen=date('d-m-Y',strtotime($nh));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;width:40px;' rowspan='4'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>????n thu???c</th><th style='width:1px;'>T??n thu???c</th><th style='width:50px;'>S??? l?????ng(H???p)</th><th style='width:188px;'>Li???u d??ng v?? c??ch d??ng</th><th style='width:180px;'>L???i d???n</th><th style='width:180px;'>Thao t??c</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:138px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'><td><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name=suadonthuoc value=S???a></a><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=xoadonthuoc value=X??a></a></td></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>L???ch h???n</th><th>Ng??y h???n</th><th >M?? b??c s??</th><th>N???i dung</th><th>Thao t??c</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:85px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input style='width:190px;'  type='text' name='noidung' value='$row2_lh1[noidung]'></td><td><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name=sualichhen value=S???a></a><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=xoalichhen value=X??a></a></td></form></tr>";
                    echo "</table><br>";
                }
                //n???u ????n thu???c r???ng
                if(mysqli_num_rows($lienket2_lh1)>0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)<=0)
                {
                    $nth=$row2_tt1['ngaythuchien'];
                    $ngaythuchien=date('d-m-Y',strtotime($nth));
                    $nh=$row2_lh1['ngayhen'];
                    $ngayhen=date('d-m-Y',strtotime($nh));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='4'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:45px;' rowspan='2'>Th??? thu???t</th><th >Ng??y th???c hi???n</th><th style='width:90px;'>B??c s?? th???c hi???n</th><th style='width:195px;'>Tri???u ch???ng</th><th style='width:183px;'>Chu???n ??o??n</th><th style='width:190px;'>T??n th??? thu???t</th><th style='width:30px;'>V??? tr?? r??ng</th><th style='width:100px;'>G??a ti???n</th ><th style='width:30px;'>S??? l?????ng</th><th style='width:160px;'>Ghi ch??</th><th style='width:90px;'>Thao t??c</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td><td><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name=suathuthuat value=S???a></a><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=xoathuthuat value=X??a></a></td></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);width:30px;' rowspan='2'>L???ch h???n</th><th style='width:15px;'>Ng??y h???n</th><th >M?? b??c s??</th><th>N???i dung</th><th>Thao t??c</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td><td><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name=sualichhen value=S???a></a><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=xoalichhen value=X??a></a></td></form></tr>";
                    echo "</table><br>";
                }
                //n???u th??? thu???t v?? ????n thu???c r???ng
                if(mysqli_num_rows($lienket2_lh1)>0 && mysqli_num_rows($lienket2_tt1)<=0 && mysqli_num_rows($lienket2_dt1)<=0)
                {
                    $nh=$row2_lh1['ngayhen'];
                    $ngayhen=date('d-m-Y',strtotime($nh));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='2'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:45px;' rowspan='2'>L???ch h???n</th><th style='width:15px;'>Ng??y h???n</th><th >M?? b??c s??</th><th>N???i dung</th><th style='width:185px;'>Thao t??c</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:85px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input style='width:190px;'  type='text' name='noidung' value='$row2_lh1[noidung]'></td><td><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name=sualichhen value=S???a></a><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=xoalichhen value=X??a></a></td></form></tr>";
                    echo "</table><br>";
                }
                //n???u th??? thu???t v?? l???ch h???n r???ng
                if(mysqli_num_rows($lienket2_lh1)<=0 && mysqli_num_rows($lienket2_tt1)<=0 && mysqli_num_rows($lienket2_dt1)>0)
                {
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='2'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>????n thu???c</th><th style='width:20px;'>T??n thu???c</th><th  style='width:15px;'>S??? l?????ng(H???p)</th><th >Li???u d??ng v?? c??ch d??ng</th><th  style='width:150px;'>L???i d???n</th><th style='width:185px;'>Thao t??c</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='25' >$row2_dt1[cachdung]</textarea></td><td><input  style='width:180px;' type='text' name='loidan' value='$row2_dt1[loidan]'><td><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name=suadonthuoc value=S???a></a><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=xoadonthuoc value=X??a></a></td></form></tr>";
                    echo "</table><br>";
                }
                    //n???u ????n thu???c v?? l???ch h???n r???ng
                if(mysqli_num_rows($lienket2_lh1)<=0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)<=0)
                {
                    $nth=$row2_tt1['ngaythuchien'];
                    $ngaythuchien=date('d-m-Y',strtotime($nth));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='6'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Th??? thu???t</th><th >Ng??y th???c hi???n</th><th style='width:50px;'>B??c s?? th???c hi???n</th><th>Tri???u ch???ng</th><th>Chu???n ??o??n</th><th>T??n th??? thu???t</th><th style='width:30px;'>V??? tr?? r??ng</th><th>G??a ti???n</th ><th style='width:30px;'>S??? l?????ng</th><th>Ghi ch??</th><th style='width:150px;'>Thao t??c</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td><td><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;margin-right:5px;' type=submit name=suathuthuat value=S???a></a><a href='sua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$i' ><input style='padding:5px; background-color:rgb(37, 158, 37);color:white;' type=submit name=xoathuthuat value=X??a></a></td></form></tr>";
                    echo "</table><br>";
                }
            }
        }
    
?>