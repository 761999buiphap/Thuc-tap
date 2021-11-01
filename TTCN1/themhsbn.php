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
        .div6 input[type=text]
        {
            outline:none;
        }
    </style>
</head>
<body style="font-family:arial;">
    <?php include("GDQL_nhanvien.php");  ?>
    <?php
                if(isset($_GET['tentk']))
                {
                    $tentk=$_GET['tentk'];
                    $mabn=$_GET['mabn'];
                }
        ?>
  
</div>
<?php 
 $mabn1=$tenbn1=$nsbn1=$gioitinh1=$sdt1=$diachi1=$email1=$tieusubenh1=$cmt1='';
 ?>    
<div class="div2">
        <p>Dữ liệu >> <span style="color:blue;">Hồ sơ bệnh nhân >></span> Thêm
        </p>
</div>
<?php
if(isset($_POST['luu']))
{
        $mabn=$_POST['mabn'];
        $tenbn=$_POST['tenbn'];
        $cmt=$_POST['cmt'];
        $ns=$_POST['ngaysinh'];
        $ngaysinh=date('Y-m-d',strtotime($ns));
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $tieusubenh=$_POST['tieusubenh'];
        $ngayden=date("Y-m-d");
        $diachi=$_POST['diachi'];
        $gioitinh=$_POST['gioitinh'];
        $CONN = new mysqli ('localhost','root','','qlpknk');
        mysqli_query($CONN,'SET NAMES UTF8');
        if(!empty($mabn)&& !empty($tenbn)&& !empty($ngaysinh)&& !empty($cmt)&& !empty($_POST['gioitinh'])&& !empty($sdt)&& !empty($email)&&!empty($tieusubenh)&&!empty($ngayden)&&!empty($diachi))
        {
            $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn'";
             $lienket1=mysqli_query($CONN,$truyvan1);
             if(mysqli_num_rows($lienket1)>0)
             {
                $row1=mysqli_fetch_assoc($lienket1);
                echo "<h2 style='text-align:center;color:red;'>< Đã tồn tại mã bệnh nhân này ></h2>";
                $mabn1=$row1['mabn'];
                $tenbn1=$row1['hoten'];
                $cmt1=$row1['cmt'];
                $nsbn1=$row1['ngaysinh'];
                $gioitinh1=$row1['gioitinh'];
                $sdt1=$row1['sdt'];
                $diachi1=$row1['diachi'];
                $email1=$row1['email'];
                $tieusubenh1=$row1['tieusubenh'];
             }
            else
            {
                $truyvanluu= "INSERT INTO hosobenhnhan(mabn,hoten,ngaysinh,gioitinh,sdt,email,diachi,tieusubenh,ngayden) VALUES('$mabn','$tenbn','$ngaysinh','$gioitinh','$sdt','$email','$diachi','$tieusubenh','$ngayden')";
                $lienketluu = mysqli_query($CONN,$truyvanluu)or die("sai1");
                echo "<h2 style='text-align:center;color:red;'>< Lập hồ sơ thành công! ></h2>";
                $truyvan2="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' OR sdt='$sdt'";
                $lienket2=mysqli_query($CONN,$truyvan2);
                $row2=mysqli_fetch_assoc($lienket2);
                $mabn1=$row2['mabn'];
                $tenbn1=$row2['hoten'];
                $cmt1=$row2['cmt'];
                $nsbn1=$row2['ngaysinh'];
                $gioitinh1=$row2['gioitinh'];
                $sdt1=$row2['sdt'];
                $diachi1=$row2['diachi'];
                $email1=$row2['email'];
                $tieusubenh1=$row2['tieusubenh'];
            }
        }
        else 
            echo "<h2 style='text-align:center;color:red;'>< Nhập vào đầy đủ thông tin! ></h2>";

}

?>
<?php echo "<a style='position:absolute; left:90%;top:105px; background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='lapphieukham.php?mabn=".$mabn1."&&tentk=$tentk'>Lập phiếu khám</a>";?>

<div class="div6" style="position:relative;width:100%;height:400px;">
    <img style="position:absolute;width:20%;" src="hinhanh/hoso.png" alt="">
    <div class="div4" >
        <form method="POST">
        <lable for="mabn">Mã bệnh nhân:</lable>
        <input style='margin-left:45px;' type='text' name='mabn' value="<?php echo $mabn1; ?>"><br>
        <lable for="tenbn">Tên bệnh nhân:</lable>
        <input style="width:60%;margin-left:38px;" type="text" name="tenbn" value="<?php echo $tenbn1; ?>"><br>
        <lable for="nsbn">Ngày sinh:</lable>   
        <input style="margin-left:75px;" type="text" name="ngaysinh" value="<?php echo $nsbn1; ?>"><br>
        <lable for="cmt">CMT:</lable>
        <input style="margin-left:114px;" type="text" name="cmt" value="<?php echo $cmt1; ?>">
        <lable for="tenbn" style="padding-right:26px;">Giới tính:</lable>
        <input type="text"  name="gioitinh" value="<?php echo $gioitinh1; ?>"><br>
        <lable for="sdt">Số điện thoại:</lable>
        <input style="margin-left:53px;" type="text" name="sdt" value="<?php echo $sdt1; ?>">
        <lable style="margin-left:7px;" for="email">Email:</lable>
        <input style="margin-left:45px;width:29%;" type="text" name="email" value="<?php echo $email1; ?>"><br>
        <lable for="diachi">Địa chỉ:</lable>
        <input style="margin-left:98px;width:60%;" type="text" name="diachi" value="<?php echo $diachi1; ?>"><br>
        <lable for="tieusubenh">Tiểu sử bệnh:</lable>
        <input style="margin-left:53px;width:60%;" type="text" name="tieusubenh" value="<?php echo $tieusubenh1; ?>"><br>
        <lable for="ngayden" style="margin-right:78px;">Ngày đến:</lable>
        <?php echo date("d-m-Y"); $ngayden = date("d-m-Y");?>
        <div class="div5">
        <div id="divthuthuat" ></div>
        <div id="divlichhen"></div>
        <div id="divdonthuoc"></div>
        <br><br><input style="width:10%; margin-top:15px;background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;border:2px solid black;font-size:13px;" type="submit" name="luu" value="Lưu">
        <?php echo "<a style='width:10%;font-size:13px; margin-top:15px;text-decoration:none;border:2px solid black;;background-color:rgb(37, 158, 37);padding:5px;color:white;'  href='HSBN_nhanvien.php?tentk=".$tentk."'>Quay lại</a>";?>

        </div>
        </form>
        </div>
        </div>

<?php
/*
</div>
<div class='div5'>    
<form method='POST'>
<div style='font-family:arial;' id='divlapphieukham'></div>
</form>
</div>
</div>
<script>
    document.getElementById("lapphieukham").addEventListener('click', lpk);
    function lpk() { document.getElementById('divlapphieukham').style.position='absolute';
                        document.getElementById('divlapphieukham').style.height='90%';
                        document.getElementById('divlapphieukham').style.width='70%';
                        document.getElementById('divlapphieukham').style.left='15%';
                        document.getElementById('divlapphieukham').style.top='5%';
                        document.getElementById('divlapphieukham').style.background='pink';
                        document.getElementById('divlapphieukham').innerHTML ='<form><div class=div5_1><button id=in >Print</button><input type=submit name=luu2></div><div class=div5_2 style=position:relative;><h5 style=width:40%;>NHA KHOA BAMBUFIT<br>Địa chỉ: Hà Nội<br>Điện thoại: 0968832922<br>Email: hoitv@bambu.vn</h5><div class=sothutu>Số thứ tự:<br> <input class=stt type=text name=stt></div></div><hr>'+
                        '<div ><span style=font-weight:bold;>Mã bệnh nhân: $mabn</span><span style=margin-left:55%;>Hà Nội,Ngày $nden tháng $tden năm $namden<span></div>'+'<h2 style=text-align:center;>PHIẾU KHÁM BỆNH</h2>'+
                        '<span style=font-weight:bold;>Ngày khám:</span> $ngayden <br><span style=font-weight:bold;> Họ và tên:</span> $row1[hoten]<br><span style=font-weight:bold;>Địa chỉ: </span>$row1[diachi]<br><span style=font-weight:bold;>Số điện thoại: </span>$row1[sdt] - <span style=font-weight:bold;>Email: </span>$row1[email]<br>'+
                        '<span style=font-weight:bold;>Lí do khám:</span> <br><textarea class=lidokham name=lidokham rows=0 cols=80></textarea><br><span style=font-weight:bold;>Bác sĩ khám: </span><input style=font-size:16px; type=text name=tenbs><br><span style=font-weight:bold;>Tiền khám: </span><input style=font-size:16px; type=text name=tienkham><br><span style=font-weight:bold;>Người lập phiếu: </span>$rownv[hoten]'+
                        '<br><div class=ki style=float:left;>KHÁCH HÀNG<br><span style=font-style:italic>(Ký và ghi rõ họ tên)</div><div class=ki style=float:left;>KẾ TOÁN<br><span style=font-style:italic>(Ký và ghi rõ họ tên)</div><div class=ki style=float:left;>Y BÁC SĨ<br><span style=font-style:italic>(Ký và ghi rõ họ tên)</div></form>'+
                        'function lpk() {  window.print();}'+
                        'document.getElementById("in").addEventListener(click, lp)'}
                        */?>
</script>
</html>