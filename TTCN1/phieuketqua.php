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
                    ?????a ch???: H?? N???i<br>??i???n tho???i: 0968832922<br>
                    Email: hoitv@bambu.vn</h5>
                </div>
                </div><hr>
            <div >
                <span style=font-weight:bold;>M?? b???nh nh??n: <?php echo $mabn; ?></span>
                <span style=margin-left:68%;font-style:italic>H?? N???i, Ng??y <?php echo $nden; ?> th??ng <?php echo $tden; ?> n??m <?php echo $namden; ?><span>
            </div>
            <h1 style=text-align:center;>K???T QU??? KH??M B???NH</h1>
            <span style=font-weight:bold;>Ng??y kh??m:</span>
            <?php $nk=date('d-m-Y'); echo $nk; ?><br><span style=font-weight:bold;>H??? v?? t??n:</span> <?php echo $row1['hoten']; ?><br>
            <span style=font-weight:bold;>?????a ch???: </span><?php echo $row1['diachi']; ?><br>
            <span style=font-weight:bold;>S??? ??i???n tho???i: </span><?php echo $row1['sdt']; ?> - 
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
                //n???u t???t c??? ?????u kh??ng r???ng
                if(mysqli_num_rows($lienket2_lh1)>0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)>0)
                {
                    $nth=$row2_tt1['ngaythuchien'];
                    $ngaythuchien=date('d-m-Y',strtotime($nth));
                    $nh=$row2_lh1['ngayhen'];
                    $ngayhen=date('d-m-Y',strtotime($nh));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='6'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Th??? thu???t</th><th >Ng??y th???c hi???n</th><th style='width:50px;'>B??c s?? th???c hi???n</th><th>Tri???u ch???ng</th><th>Chu???n ??o??n</th><th>T??n th??? thu???t</th><th style='width:30px;'>V??? tr?? r??ng</th><th>G??a ti???n</th ><th style='width:30px;'>S??? l?????ng</th><th>Ghi ch??</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>????n thu???c</th><th style='width:15px;'>T??n thu???c</th><th >S??? l?????ng(H???p)</th><th>Li???u d??ng v?? c??ch d??ng</th><th>L???i d???n</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>L???ch h???n</th><th style='width:15px;'>Ng??y h???n</th><th >M?? b??c s??</th><th>N???i dung</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                    echo "</table></div><br>";
                    }  
                //n???u l???ch h???n r???ng
                if(mysqli_num_rows($lienket2_lh1)<=0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)>0)
                {
                    $nth=$row2_tt1['ngaythuchien'];
                    $ngaythuchien=date('d-m-Y',strtotime($nth));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='4'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Th??? thu???t</th><th >Ng??y th???c hi???n</th><th style='width:50px;'>B??c s?? th???c hi???n</th><th>Tri???u ch???ng</th><th>Chu???n ??o??n</th><th>T??n th??? thu???t</th><th style='width:30px;'>V??? tr?? r??ng</th><th>G??a ti???n</th ><th style='width:30px;'>S??? l?????ng</th><th>Ghi ch??</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>????n thu???c</th><th style='width:15px;'>T??n thu???c</th><th >S??? l?????ng(H???p)</th><th>Li???u d??ng v?? c??ch d??ng</th><th>L???i d???n</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'></form></tr>";
                    echo "</table></div><br>";
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
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;width:40px;' rowspan='4'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>????n thu???c</th><th style='width:1px;'>T??n thu???c</th><th style='width:50px;'>S??? l?????ng(H???p)</th><th style='width:188px;'>Li???u d??ng v?? c??ch d??ng</th><th style='width:180px;'>L???i d???n</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:138px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);' rowspan='2'>L???ch h???n</th><th>Ng??y h???n</th><th >M?? b??c s??</th><th>N???i dung</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:135px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                    echo "</table></div><br>";
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
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='4'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:45px;' rowspan='2'>Th??? thu???t</th><th >Ng??y th???c hi???n</th><th style='width:90px;'>B??c s?? th???c hi???n</th><th style='width:195px;'>Tri???u ch???ng</th><th style='width:183px;'>Chu???n ??o??n</th><th style='width:190px;'>T??n th??? thu???t</th><th style='width:30px;'>V??? tr?? r??ng</th><th style='width:100px;'>G??a ti???n</th ><th style='width:30px;'>S??? l?????ng</th><th style='width:160px;'>Ghi ch??</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td></form></tr>";
                    echo "<tr  style='background-color:#bbb;' ><th style='background-color:rgb(150, 200, 30);width:30px;' rowspan='2'>L???ch h???n</th><th style='width:15px;'>Ng??y h???n</th><th >M?? b??c s??</th><th>N???i dung</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                    echo "</table></div><br>";
                }
                //n???u th??? thu???t v?? ????n thu???c r???ng
                if(mysqli_num_rows($lienket2_lh1)>0 && mysqli_num_rows($lienket2_tt1)<=0 && mysqli_num_rows($lienket2_dt1)<=0)
                {
                    $nh=$row2_lh1['ngayhen'];
                    $ngayhen=date('d-m-Y',strtotime($nh));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='2'>L???n $i</td><th style='background-color:rgb(150, 200, 30);' rowspan='2'>L???ch h???n</th><th style='width:15px;'>Ng??y h???n</th><th >M?? b??c s??</th><th>N???i dung</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;'  type='text' name='ngayhen' value=$ngayhen></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_lh1[mabs]'></td><td><input type='text' name='noidung' value='$row2_lh1[noidung]'></td></form></tr>";
                    echo "</table></div><br>";
                }
                //n???u th??? thu???t v?? l???ch h???n r???ng
                if(mysqli_num_rows($lienket2_lh1)<=0 && mysqli_num_rows($lienket2_tt1)<=0 && mysqli_num_rows($lienket2_dt1)>0)
                {
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='2'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>????n thu???c</th><th style='width:20px;'>T??n thu???c</th><th  style='width:15px;'>S??? l?????ng(H???p)</th><th >Li???u d??ng v?? c??ch d??ng</th><th  style='width:150px;'>L???i d???n</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td><input style='width:140px;' type='text' name='tenthuoc' value='$row2_dt1[tenthuoc]'></td><td><input style='width:50px;' type='text' name='soluong' value='$row2_dt1[soluong]'></td><td><textarea name='cachdung' rows='2' cols='21' >$row2_dt1[cachdung]</textarea></td><td><input type='text' name='loidan' value='$row2_dt1[loidan]'></form></tr>";
                    echo "</table></div><br>";
                }
                //n???u ????n thu???c v?? l???ch h???n r???ng
                if(mysqli_num_rows($lienket2_lh1)<=0 && mysqli_num_rows($lienket2_tt1)>0 && mysqli_num_rows($lienket2_dt1)<=0)
                {
                    $nth=$row2_tt1['ngaythuchien'];
                    $ngaythuchien=date('d-m-Y',strtotime($nth));
                    echo "<div class='div5'>";
                    echo "<table class='bang' >";
                    echo "<tr style='background-color:#bbb;'><td style='background-color:pink;' rowspan='6'>L???n $i</td><th style='background-color:rgb(150, 200, 30);width:15px;' rowspan='2'>Th??? thu???t</th><th >Ng??y th???c hi???n</th><th style='width:50px;'>B??c s?? th???c hi???n</th><th>Tri???u ch???ng</th><th>Chu???n ??o??n</th><th>T??n th??? thu???t</th><th style='width:30px;'>V??? tr?? r??ng</th><th>G??a ti???n</th ><th style='width:30px;'>S??? l?????ng</th><th>Ghi ch??</th></tr>";
                    echo "<tr><form method='POST' action='sua.php?mabn=$mabn&tentk=$tentk&lan=$i'><td ><input style='width:140px;' type='text' name='ngaythuchien' value=$ngaythuchien></td><td><input style='width:50px;' type='text' name='mabs' value='$row2_tt1[mabs]'></td><td><textarea name='trieuchung' rows='2' cols='21'>$row2_tt1[trieuchung]</textarea></td><td><input  type='text' name='chuandoan' value='$row2_tt1[chuandoan]'></td><td><input type='text' name='thuthuat' value='$row2_tt1[thuthuatdieutri]'></td><td><input style='width:30px;' type='text' name='vitrirang' value='$row2_tt1[vitrirang]'></td><td><input style='width:80px;' type='text' name='giatien' value='$row2_tt1[gia]'></td><td><input style='width:40px;' type='text' name='soluong' value='$row2_tt1[soluong]'></td><td><textarea name='ghichu' rows='2' cols='19'>$row2_tt1[ghichu]</textarea></td></form></tr>";
                    echo "</table></div><br>";
                }
                    
        ?>
        <div class=ki style=float:left;height:120px;>KH??CH H??NG<br><span style=font-style:italic>(K?? v?? ghi r?? h??? t??n)</div><div class=ki style=float:left;>K??? TO??N<br><span style=font-style:italic>(K?? v?? ghi r?? h??? t??n)</div><div class=ki style=float:left;>Y B??C S??<br><span style='font-style:italic'>(K?? v?? ghi r?? h??? t??n)</div>
        </form>
        </div>
</html>