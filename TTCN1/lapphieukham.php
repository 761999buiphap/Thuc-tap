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
                if(isset($_GET['mabn']))
                {
                    $mabn=$_GET['mabn'];
                    $tentk=$_GET['tentk'];
                }
                if(isset($_GET['lan']))
                {
                    $lankham1=$_GET['lan'];
                }
                else
                    $lankham1='';
                $truyvanpk="SELECT * FROM phieukham WHERE lankham='$lankham1'";
                $lienketpk=mysqli_query($CONN,$truyvanpk);
                $rowpk=mysqli_fetch_assoc($lienketpk);
                $lidokham1=$rowpk['lidokham'];
                $mabs1=$rowpk['mabs'];
                $tienkham1=$rowpk['tienkham'];
                $stt1=$rowpk['stt'];

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
                    <input type=submit name=luu value=L??u>
                    <?php echo "<a style='text-decoration:none;border:2px solid black;font-size:13px;' href='HSBN_nhanvien.php?tentk=".$tentk."&&mabn=$mabn'>Thoat</a>";?>
                </div>
                <div class=div4_2 style='position:relative; font-famyly:arial;'>
                    <img style='float:left;margin-right:2%;' src="hinhanh/Capture.JPG" alt="">
                    <div >
                        <h5 style=width:40%;>NHA KHOA BAMBUFIT<br>
                        ?????a ch???: H?? N???i<br>??i???n tho???i: 0968832922<br>
                        Email: hoitv@bambu.vn</h5>
                    </div>
                    <?php echo "<div class=sothutu>S??? th??? t???:<br> <input class=stt type=text name=stt value=$stt1></div>";?>
                </div><br><hr>
            <div >
                <span style=font-weight:bold;>M?? b???nh nh??n: <?php echo $mabn; ?></span>
                <span style=margin-left:55%;font-style:italic>H?? N???i, Ng??y <?php echo $nden; ?> th??ng <?php echo $tden; ?> n??m <?php echo $namden; ?><span>
            </div>
            <h1 style=text-align:center;>PHI???U KH??M B???NH</h1>
            <?php echo "<span style=font-weight:bold;>L???n kh??m:</span><input style='font-size:16px;' type=text name=lankham value='$lankham1' ><br>";?>
            <span style=font-weight:bold;>Ng??y kh??m:</span>
            <?php $nk=date('d-m-Y'); echo $nk; ?><br><span style=font-weight:bold;>H??? v?? t??n:</span> <?php echo $row1['hoten']; ?><br>
            <span style=font-weight:bold;>?????a ch???: </span><?php echo $row1['diachi']; ?><br>
            <span style=font-weight:bold;>S??? ??i???n tho???i: </span><?php echo $row1['sdt']; ?> - 
            <span style=font-weight:bold;>Email: </span><?php echo $row1['email']; ?><br>
            <?php echo "<span style=font-weight:bold;>L?? do kh??m:</span><input style='font-size:16px;' type=text name=lidokham value='$lidokham1' ><br>";?>
            <?php echo "<span style=font-weight:bold;>B??c s?? kh??m: </span><input style=font-size:16px; type=text name=mabs value=$mabs1><br>";?>
            <?php echo "<span style=font-weight:bold;>Ti???n kh??m: </span><input style=font-size:16px; type=text name=tienkham value=$tienkham1><br>";?>
            <span style=font-weight:bold;>Ng?????i l???p phi???u: </span><?php echo $row2['hoten']; ?><br>
        <div class=ki style=float:left;>KH??CH H??NG<br><span style=font-style:italic>(K?? v?? ghi r?? h??? t??n)</div><div class=ki style=float:left;>K??? TO??N<br><span style=font-style:italic>(K?? v?? ghi r?? h??? t??n)</div><div class=ki style=float:left;>Y B??C S??<br><span style='font-style:italic'>(K?? v?? ghi r?? h??? t??n)</div>
        </form>
        </div>
</html>