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
           background-color:#ddd;
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
                if(isset($_GET['tentk']))
                {
                    $tentk=$_GET['tentk'];
                    $manv=$_GET['tentk'];
                    $mabs=$_GET['tentk'];
                    $madm=$_GET['tentk'];
                    $mabn=$_GET['tentk'];
                }
        ?>
    <?php
    
        $CONN = new mysqli ('localhost','root','','qlpknk');
        mysqli_query($CONN,'SET NAMES UTF8');
        $truyvannv="SELECT * FROM hosonhanvien WHERE manv='$manv'";
        $lienketnv= mysqli_query($CONN,$truyvannv);
        $rownv=mysqli_fetch_assoc($lienketnv);
        $truyvanbs="SELECT * FROM hosobacsy WHERE mabs='$mabs'";
        $lienketbs= mysqli_query($CONN,$truyvanbs);
        $rowbs=mysqli_fetch_assoc($lienketbs);
        $truyvandm="SELECT * FROM hosoadmin WHERE madm='$madm'";
        $lienketdm= mysqli_query($CONN,$truyvandm)or die("sai");
        $rowdm=mysqli_fetch_assoc($lienketdm);
        $truyvanbn="SELECT * FROM hosobenhnhan WHERE mabn='$mabn'";
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
  }
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
    $luongcb=$rowbs['luongcb'];
    $luongcb = number_format($rowbs['luongcb']);

  }
  if($rowdm>0)
  {
    $manv=$rowdm ['madm'];
    $tennv=$rowdm['hoten'];
    $ns=$rowdm['ngaysinh'];
    $ngaysinh=date('d-m-Y',strtotime($ns));
    $gioitinh=$rowdm['gioitinh'];
    $sdt=$rowdm['sdt'];
    $diachi=$rowdm['diachi'];
    $email=$rowdm['email'];
    $chucvu=$rowdm['chucvu'];
    $luongcb='';
  }
  if($rowbn>0)
  {
    $manv=$rowbn ['mabn'];
    $tennv=$rowbn['hoten'];
    $ns=$rowbn['ngaysinh'];
    $ngaysinh=date('d-m-Y',strtotime($ns));
    $gioitinh=$rowbn['gioitinh'];
    $sdt=$rowbn['sdt'];
    $diachi=$rowbn['diachi'];
    $email=$rowbn['email'];
    $tieusubenh=$rowbn['tieusubenh'];
  }
 ?>
<?php
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
        $gioitinh1=$_POST['gioitinh'];
        $truyvan2="UPDATE hosonhanvien SET hoten='$tennv',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sdt',email='$email',diachi='$diachi' WHERE manv='$manv'";
        $lienket2=mysqli_query($CONN,$truyvan2)or die("sai");
        $ngaysinh=date('d-m-Y',strtotime($ns));
  }
  if($rowbs>0)
  {
        $tennv=$_POST['tennv'];
        $ns=$_POST['nsnv'];
        $ngaysinh=date('Y-m-d',strtotime($ns));
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $diachi=$_POST['diachi'];
        $gioitinh1=$_POST['gioitinh'];
        $truyvan2="UPDATE hosobacsy SET hoten='$tennv',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sdt',email='$email',diachi='$diachi' WHERE mabs='$mabs'";
        $lienket2=mysqli_query($CONN,$truyvan2)or die("sai1");
        $ngaysinh=date('d-m-Y',strtotime($ns));
  }
  if($rowdm>0)
  {
        $tennv=$_POST['tennv'];
        $ns=$_POST['nsnv'];
        $ngaysinh=date('Y-m-d',strtotime($ns));
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $diachi=$_POST['diachi'];
        $gioitinh1=$_POST['gioitinh'];
        $truyvan2="UPDATE hosoadmin SET hoten='$tennv',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sdt',email='$email',diachi='$diachi' WHERE mabs='$madm'";
        $lienket2=mysqli_query($CONN,$truyvan2)or die("sai1");
        $ngaysinh=date('d-m-Y',strtotime($ns));
  }
  if($rowbn>0)
  {
        $tennv=$_POST['tennv'];
        $ns=$_POST['nsnv'];
        $ngaysinh=date('Y-m-d',strtotime($ns));
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $diachi=$_POST['diachi'];
        $gioitinh1=$_POST['gioitinh'];
        $truyvan2="UPDATE hosobenhnhan SET hoten='$tennv',ngaysinh='$ngaysinh',gioitinh='$gioitinh',sdt='$sdt',email='$email',diachi='$diachi' WHERE mabn='$mabn'";
        $lienket2=mysqli_query($CONN,$truyvan2)or die("sai1");
        $ngaysinh=date('d-m-Y',strtotime($ns));
  }
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
        <?php
            if($rowbs>0 || $rowdm>0 || $rownv>0)
            {
                echo "<lable for='chucvu' style='padding-right:85px;'>Chức vụ: </lable> $chucvu<br>";
                echo "<lable style='padding-right:45px;' for='chucvu'>Lương cơ bản: </lable> $luongcb<br>";
                echo "<input style='width:10%; margin-top:15px;background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;border:2px solid black;font-size:13px;' type='submit' name='sua' value='Sửa thông tin'>";
            }
            if($rowbn>0)
            {
                echo "<lable for='chucvu' style='margin-right:50px;'>Tiểu sử bệnh: </lable> $tieusubenh<br>";
                echo "<input style='width:10%; margin-top:15px;background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;border:2px solid black;font-size:13px;' type='submit' name='sua' value='Sửa thông tin'>";            
            }
        ?>
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
        </div>
        </form>
        </div>
        </div>
</body>
</html>