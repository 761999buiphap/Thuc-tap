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
            margin:7px 2px 0 53%;
        }
        .div3{
            width:86%;
            height:350px;
            margin:5% 0px 0px 7%;
            background-color:#f2f2f2;
            border:1px solid #bbb;
            font-family:arial;
        }
        .div3 input[type=text]{
            padding:5px;
            margin:10px;
            width:35%;
        }
    </style>
</head>
<body>
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
    $truyvanbn="SELECT * FROM taikhoan WHERE tentk='$tentk'";
    $lienketbn= mysqli_query($CONN,$truyvanbn)or die("sai");
    $rowbn=mysqli_fetch_assoc($lienketbn);
    $mk1err=$mk2err=$mk3err=$mkerr='';

    if($rownv>0)
        include("GDQL_nhanvien.php");  
    if($rowbs>0)
        include("giaodienquanlybacsy.php"); 
    if($rowdm>0)
        include("GDQL_admin.php");  
    if($rowbn>0)
        include("GDQL_benhnhan.php");  
    ?>

<?php 
    if(isset($_POST['luu']))
    {
        if($rownv>0)
        {
            if(!empty($_POST['mk1'])&&!empty($_POST['mk2'])&&!empty($_POST['mk3']))
            {
                $mk1=$_POST['mk1'];
                $mk2=$_POST['mk2'];
                $mk3=$_POST['mk3'];
                $truyvannv_1="SELECT * FROM taikhoannhanvien WHERE tentk='$tentk' AND matkhau='$mk1'";
                $lienketnv_1=mysqli_query($CONN,$truyvannv_1);
                $rownv=mysqli_fetch_assoc($lienketnv_1);
                if($rownv>0)
                {
                    if($mk2==$mk3)
                    {
                        $truyvannv_2="UPDATE taikhoannhanvien SET matkhau='$mk2'";
                        $lienketnv_2=mysqli_query($CONN,$truyvannv_2);
                        $mkerr="Thay đổi thành công !";
                    }
                    else
                        $mk3err="* Mật khẩu mới không khớp";
                }
                else
                    $mk1err="* Sai mật khẩu hiện tại";

            }
            else
                $mkerr="* Nhập vào đầy đủ thông tin";
        }
    
        if($rowbs>0)
        {
            if(!empty($_POST['mk1'])&&!empty($_POST['mk2'])&&!empty($_POST['mk3']))
            {
                $mk1=$_POST['mk1'];
                $mk2=$_POST['mk2'];
                $mk3=$_POST['mk3'];
                $truyvanbs_1="SELECT * FROM taikhoanbacsy WHERE tentk='$tentk' AND matkhau='$mk1'";
                $lienketbs_1=mysqli_query($CONN,$truyvanbs_1);
                $rowbs=mysqli_fetch_assoc($lienketbs_1);
                if($rowbs>0)
                {
                    if($mk2==$mk3)
                    {
                        $truyvanbs_2="UPDATE taikhoanbacsy SET matkhau='$mk2'";
                        $lienketbs_2=mysqli_query($CONN,$truyvanbs_2);
                        $mkerr="Thay đổi thành công !";
                    }
                    else
                        $mk3err="* Mật khẩu mới không khớp";
                }
                else
                    $mk1err="* Sai mật khẩu hiện tại";

            }
            else
                $mkerr="* Nhập vào đầy đủ thông tin";
        }
        if($rowdm>0)
        {
            if(!empty($_POST['mk1'])&&!empty($_POST['mk2'])&&!empty($_POST['mk3']))
            {
                $mk1=$_POST['mk1'];
                $mk2=$_POST['mk2'];
                $mk3=$_POST['mk3'];
                $truyvandm_1="SELECT * FROM taikhoanadmin WHERE tentk='$tentk' AND matkhau='$mk1'";
                $lienketdm_1=mysqli_query($CONN,$truyvandm_1);
                $rowdm=mysqli_fetch_assoc($lienketdm_1);
                if($rowdm>0)
                {
                    if($mk2==$mk3)
                    {
                        $truyvandm_2="UPDATE taikhoanadmin SET matkhau='$mk2'";
                        $lienketdm_2=mysqli_query($CONN,$truyvandm_2);
                        $mkerr="Thay đổi thành công !";
                    }
                    else
                        $mk3err="* Mật khẩu mới không khớp";
                }
                else
                    $mk1err="* Sai mật khẩu hiện tại";

            }
            else
                $mkerr="* Nhập vào đầy đủ thông tin";
        }
        if($rowbn>0)
        {
            if(!empty($_POST['mk1'])&&!empty($_POST['mk2'])&&!empty($_POST['mk3']))
            {
                $mk1=$_POST['mk1'];
                $mk2=$_POST['mk2'];
                $mk3=$_POST['mk3'];
                $truyvanbn_1="SELECT * FROM taikhoan WHERE tentk='$tentk' AND matkhau='$mk1'";
                $lienketbn_1=mysqli_query($CONN,$truyvanbn_1);
                $rowbn=mysqli_fetch_assoc($lienketbn_1);
                if($rowbn>0)
                {
                    if($mk2==$mk3)
                    {
                        $truyvanbn_2="UPDATE taikhoan SET matkhau='$mk2'";
                        $lienketbn_2=mysqli_query($CONN,$truyvanbn_2);
                        $mkerr="Thay đổi thành công !";
                    }
                    else
                        $mk3err="* Mật khẩu mới không khớp";
                }
                else
                    $mk1err="* Sai mật khẩu hiện tại";

            }
            else
                $mkerr="* Nhập vào đầy đủ thông tin";
        }
    
    }

?>
<div class="div2">
    <p>CÀI ĐẶT >> <span style="color:blue;">Tài khoản >></span></p>
</div>
<div class="div3">
    <h3 style="margin-left:30px;">Đổi mật khẩu</h3><hr>
    <form method='POST' style="margin:5% 0px 0px 15%;">
    <b><label for="">Mật khẩu hiện tại</label></b>
    <input style="margin-left:90px;" type="text" name="mk1" ><span style="color:red;"><?php echo $mk1err; ?></span><br>
    <b><label for="">Mật khẩu mới</label></b>
    <input style="margin-left:115px;" type="text" name="mk2"><span style="color:red;"><?php echo $mk2err; ?></span><br>
    <b><label for="">Nhập lại mật khẩu mới</label></b>
    <input style="margin-left:48px;" type="text" name="mk3"><span style="color:red;"><?php echo $mk3err; ?></span><br>
    <span style="color:red;margin-left:25%;"><?php echo $mkerr; ?></span><br>
    <input style='width:10%;font-size:13px;margin-left:35%; margin-top:15px;background-color:rgb(37, 158, 37);padding:5px;color:white;' type="submit" name=luu value='Lưu thay đổi'>
    <?php
            if($rownv>0)
                echo "<a style='width:10%;font-size:13px; margin-top:15px;text-decoration:none;border:2px solid black;;background-color:rgb(37, 158, 37);padding:5px;color:white;'  href='GDQL_NV.php?tentk=".$tentk."'>Quay lại</a>";
            if($rowbs>0)
                echo "<a style='width:10%;font-size:13px; margin-top:15px;text-decoration:none;border:2px solid black;;background-color:rgb(37, 158, 37);padding:5px;color:white;'  href='GDQL_BS.php?tentk=".$tentk."'>Quay lại</a>";
            if($rowdm>0)
                echo "<a style='width:10%;font-size:13px; margin-top:15px;text-decoration:none;border:2px solid black;;background-color:rgb(37, 158, 37);padding:5px;color:white;'  href='GDQL_AD.php?tentk=".$tentk."'>Quay lại</a>";
            if($rowbn>0)
                echo "<a style='width:10%;font-size:13px; margin-top:15px;text-decoration:none;border:2px solid black;;background-color:rgb(37, 158, 37);padding:5px;color:white;'  href='GDQL_BN.php?tentk=".$tentk."'>Quay lại</a>";

    ?>
    </form>
</div>
</body>
</html>