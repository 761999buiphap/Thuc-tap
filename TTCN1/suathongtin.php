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
    <?php
    $CONN = new mysqli ('localhost','root','','qlpknk');
    mysqli_query($CONN,'SET NAMES UTF8');
                if(isset($_GET['tentk']))
                {
                    $mk1err=$mk2err=$mk3err=$mkerr='';
                    $tentk=$_GET['tentk'];
                    if(isset($_GET['mabs']))
                    {
                        $mabs=$_GET['mabs'];
                        $truyvanbs="SELECT * FROM hosobacsy WHERE mabs='$mabs'";
                        $lienketbs= mysqli_query($CONN,$truyvanbs);
                        $rowbs=mysqli_fetch_assoc($lienketbs);
                            if($rowbs>0)
                                include("GDQL_admin.php");
                            if($rowbs>0)
                            {
                              $manv=$rowbs['mabs'];
                              $tennv=$rowbs['hoten'];
                              $ns=$rowbs['ngaysinh'];
                              $ngaysinh=date('d-m-Y',strtotime($ns));
                              $gioitinh=$rowbs['gioitinh'];
                              $sdt=$rowbs['sdt'];
                              $diachi=$rowbs['diachi'];
                              $email=$rowbs['email'];
                              $chucvu=$rowbs['chucvu'];
                              $luongcb = number_format($rowbs['luongcb']);
                              $nd=$rowbs['ngayden'];
                              $ngayden=date('d-m-Y',strtotime($nd));
                            }
                            if(isset($_POST['sua']))
                            {
                                if($rowbs>0)
                                {
                                        $tennv=$_POST['tennv'];
                                        $ns=$_POST['nsnv'];
                                        $ngaysinh=date('Y-m-d',strtotime($ns));
                                        $sdt=$_POST['sdt'];
                                        $email=$_POST['email'];
                                        $diachi=$_POST['diachi'];
                                        $gioitinh=$_POST['gioitinh'];
                                        $chucvu=$_POST['chucvu'];
                                        $lcb=$_POST['luongcb'];
                                        $luongcb=str_replace( ',', '', $lcb );
                                        $nd=$_POST['ngayden'];
                                        $ngayden=date('Y-m-d',strtotime($nd));
                                        $truyvan2="UPDATE hosobacsy SET hoten='$tennv',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sdt',email='$email',diachi='$diachi',chucvu='$chucvu',luongcb='$luongcb',ngayden='$ngayden' WHERE mabs='$mabs'";
                                        $lienket2=mysqli_query($CONN,$truyvan2)or die("sai1");
                                        $ngayden=date('d-m-Y',strtotime($nd));
                                        $ngaysinh=date('d-m-Y',strtotime($ns));
                                        $luongcb = number_format($luongcb);

                                }
                            }
                    }
                    if(isset($_GET['manv']))
                    {
                        $manv=$_GET['manv'];
                        $truyvannv="SELECT * FROM hosonhanvien WHERE manv='$manv'";
                        $lienketnv= mysqli_query($CONN,$truyvannv);
                        $rownv=mysqli_fetch_assoc($lienketnv);
                            if($rownv>0)
                                include("GDQL_admin.php"); 
                            if($rownv>0)
                            {
                              $manv=$rownv['manv'];
                              $tennv=$rownv['hoten'];
                              $ns=$rownv['ngaysinh'];
                              $ngaysinh=date('d-m-Y',strtotime($ns));
                              $gioitinh=$rownv['gioitinh'];
                              $sdt=$rownv['sdt'];
                              $diachi=$rownv['diachi'];
                              $email=$rownv['email'];
                              $chucvu=$rownv['chucvu'];
                              $luongcb = number_format($rownv['luongcb']);
                              $nd=$rownv['ngayden'];
                              $ngayden=date('d-m-Y',strtotime($nd));
                            }
                            if(isset($_POST['sua']))
                            {
                                if($rownv>0)
                                {
                                    $tennv=$_POST['tennv'];
                                    $ns=$_POST['nsnv'];
                                    $ngaysinh=date('Y-m-d',strtotime($ns));
                                    $sdt=$_POST['sdt'];
                                    $email=$_POST['email'];
                                    $diachi=$_POST['diachi'];
                                    $gioitinh=$_POST['gioitinh'];
                                    $chucvu=$_POST['chucvu'];
                                    $lcb=$_POST['luongcb'];
                                    $luongcb=str_replace( ',', '', $lcb );
                                    $nd=$_POST['ngayden'];
                                    $ngayden=date('Y-m-d',strtotime($nd));
                                    $truyvan2="UPDATE hosonhanvien SET hoten='$tennv',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sdt',email='$email',diachi='$diachi',chucvu='$chucvu',luongcb='$luongcb',ngayden='$ngayden' WHERE manv='$manv'";
                                    $lienket2=mysqli_query($CONN,$truyvan2)or die("sai");
                                    $ngayden=date('d-m-Y',strtotime($nd));
                                    $ngaysinh=date('d-m-Y',strtotime($ns));
                                    $luongcb = number_format($luongcb);

                                }
                            
                    }
                }
        ?>

<?php

  
  
}

?>
<div class="div2">
        <p>CÀI ĐẶT >> <span style="color:blue;">Thông tin cá nhân >></span></p>
</div>
<div style="position:relative;width:100%;height:400px;">
    <img style="position:absolute;width:20%;" src="hinhanh/hoso.png" alt="">
    <div class="div4" >
        <form method="POST">
        <lable for="manv" style='margin-right:105px;'>Mã số:</lable>
        <?php echo $manv; ?><br>
        <lable for="tennv">Họ tên:</lable>
        <input style="width:60%;margin-left:100px;" type="text" name="tennv" value="<?php echo $tennv; ?>"><br>
        <lable for="nsnv">Ngày sinh:</lable>
        <input style="margin-left:75px;" type="text" name="nsnv" value="<?php echo $ngaysinh; ?>">
        <lable for="gioitinh">Giới tính:</lable>
        <input style="margin-left:30px;"  type="text"  name="gioitinh" value="<?php echo $gioitinh; ?>"><br>
        <lable for="sdt">Số điện thoại:</lable>
        <input style="margin-left:53px;" type="text" name="sdt" value="<?php echo $sdt; ?>">
        <lable style="margin-left:7px;" for="email">Email:</lable>
        <input style="margin-left:45px;width:29%;" type="text" name="email" value="<?php echo $email; ?>"><br>
        <lable for="diachi">Địa chỉ:</lable>
        <input style="margin-left:98px;width:60%;" type="text" name="diachi" value="<?php echo $diachi; ?>"><br>
        <lable for="chucvu" style="padding-right:81px;">Chức vụ: </lable>
        <input  type="text"  name="chucvu" value="<?php echo $chucvu; ?>"><br>
        <lable for="luongcb" style="padding-right:40px;">Lương cơ bản: </lable>
        <input  type="text"  name="luongcb" value="<?php echo $luongcb; ?>"><br>
        <lable for="ngayden">Ngày đến:</lable>
        <input style="margin-left:78px;" type="text" name="ngayden" value="<?php echo $ngayden; ?>"><br>
        <input style="width:10%; margin-top:15px;background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;border:2px solid black;font-size:13px;" type="submit" name="sua" value="Sửa thông tin">
        <?php
        if(isset($_GET['manv']))
        {
            if($rownv>0)
                echo "<a style='width:10%;font-size:13px; margin-top:15px;text-decoration:none;border:2px solid black;background-color:rgb(37, 158, 37);padding:5px;color:white;'  href='HSNV_admin.php?tentk=".$tentk."'>Quay lại</a>";
        }
        if(isset($_GET['mabs']))
        {
            if($rowbs>0)
                echo "<a style='width:10%;font-size:13px; margin-top:15px;text-decoration:none;border:2px solid black;;background-color:rgb(37, 158, 37);padding:5px;color:white;'  href='HSBS_admin.php?tentk=".$tentk."'>Quay lại</a>";
        }
        ?>
        </div>
        </form>
        </div>
        </div>
</script>
</html>