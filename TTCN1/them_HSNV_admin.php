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
    <?php include("GDQL_admin.php");  ?>
    <?php
                if(isset($_GET['tentk']))
                {
                    $tentk=$_GET['tentk'];
                   
                }
        ?>
<div class="div2">
        <p>Dữ liệu >> <span style="color:blue;">Hồ sơ bác sĩ >></span>  <span style="color:red;">Thêm </span>
        </p>
</div> 
<?php 
 $manv1=$tennv1=$ngaysinh1=$gioitinh1=$sdt1=$diachi1=$email1=$tieusubenh1=$ttk1=$mk1=$luongcb1=$chucvu1='';
 ?>    
<?php
if(isset($_POST['luu']))
{
        $manv=$_POST['manv'];
        $tennv=$_POST['tennv'];
        $ns=$_POST['nsnv'];
        $ngaysinh=date('Y-m-d',strtotime($ns));
        $sdt=$_POST['sdt'];
        $email=$_POST['email'];
        $chucvu=$_POST['chucvu'];
        $luongcb=$_POST['luongcb'];
        $ngayden=date("Y-m-d");
        $diachi=$_POST['diachi'];
        $gioitinh=$_POST['gioitinh'];
        $ttk=$_POST['tentk'];
        $mk=$_POST['mk'];
        $CONN = new mysqli ('localhost','root','','qlpknk');
        mysqli_query($CONN,'SET NAMES UTF8');
        if(!empty($chucvu)&&!empty($luongcb)&&!empty($ttk)&&!empty($mk)&&!empty($manv)&& !empty($tennv)&& !empty($ngaysinh)&& !empty($_POST['gioitinh'])&& !empty($sdt)&& !empty($email)&&!empty($ngayden)&&!empty($diachi))
        {
             $truyvan1="SELECT * FROM hosonhanvien WHERE manv='$manv' OR sdt='$sdt'";
             $lienket1=mysqli_query($CONN,$truyvan1);
             $truyvantk="SELECT * FROM taikhoannhanvien WHERE tentk='$manv'";
             $lienkettk=mysqli_query($CONN,$truyvantk);
             $rowtk=mysqli_num_rows($lienkettk);
             if(mysqli_num_rows($lienkettk)>0)
             {
                $row1=mysqli_fetch_assoc($lienket1);
                echo "<h2 style='text-align:center;color:red;'>< Đã tồn tại mã bệnh nhân này ></h2>";
                $manv1=$row1['manv'];
                $tennv1=$row1['hoten'];
                $nsbs1=$row1['ngaysinh'];
                $ngaysinh1=date('d-m-Y',strtotime($nsbs1));
                $gioitinh1=$row1['gioitinh'];
                $sdt1=$row1['sdt'];
                $diachi1=$row1['diachi'];
                $email1=$row1['email'];
                $chucvu1=$row1['chucvu'];
                $luongcb1=$row1['luongcb'];
                $ttk1=$rowtk['tentk'];
                $mk1=$rowtk['matkhau'];
             }
            else
            {
                $truyvanluu= "INSERT INTO hosonhanvien(manv,hoten,ngaysinh,gioitinh,sdt,email,diachi,ngayden,chucvu,luongcb) VALUES('$manv','$tennv','$ngaysinh','$gioitinh','$sdt','$email','$diachi','$ngayden','$chucvu','$luongcb')";
                $lienketluu = mysqli_query($CONN,$truyvanluu)or die("sai1");
                $truyvantk1= "INSERT INTO taikhoannhanvien(tentk,matkhau) VALUES('$ttk','$mk')";
                $lienkettk1 = mysqli_query($CONN,$truyvantk1)or die("sai2");
                echo "<h3 style=' margin-left:40%;color:red;'>< Thêm thành công! ></h3>";
                $truyvan2="SELECT * FROM hosonhanvien WHERE manv='$manv' OR sdt='$sdt'";
                $lienket2=mysqli_query($CONN,$truyvan2);
                $row2=mysqli_fetch_assoc($lienket2);
                $truyvantk2="SELECT * FROM taikhoannhanvien WHERE tentk='$manv'";
                $lienkettk2=mysqli_query($CONN,$truyvantk2)or die("sai...");
                $rowtk=mysqli_num_rows($lienkettk2);
                $manv1=$row2['manv'];
                $tennv1=$row2['hoten'];
                $nsnv1=$row2['ngaysinh'];
                $ngaysinh1=date('d-m-Y',strtotime($nsnv1));
                $gioitinh1=$row2['gioitinh'];
                $sdt1=$row2['sdt'];
                $diachi1=$row2['diachi'];
                $email1=$row2['email'];
                $chucvu1=$row2['chucvu'];
                $luongcb1=$row2['luongcb'];
                $ttk1=$rowtk['tentk'];
                $mk1=$rowtk['matkhau'];
            }
    }
    else
        echo "<h3 style=' margin-left:40%;color:red;'>< Nhập vào đầy đủ thông tin ></h3>";
}

?>

<div style="position:relative;width:100%;height:400px;">
    <img style="position:absolute;width:20%;" src="hinhanh/hoso.png" alt="">
    <div class="div4" >
        <form method="POST">
        <lable for="mabs">Mã: </lable>
        <input style='margin-left:125px;' type='text' name='manv' value="<?php echo $manv1; ?>"><br>
        <lable for="tenbs">Họ tên: </lable>
        <input style="width:60%;margin-left:100px;" type="text" name="tennv" value="<?php echo $tennv1; ?>"><br>
        <lable for="nsbn">Ngày sinh:</lable>
        <input style="margin-left:75px;" type="text" name="nsnv" value="<?php echo $ngaysinh1; ?>">
        <lable for="tenbn">Giới tính:</lable>
        <input style="margin-left:30px;" type="text"  name="gioitinh" value="<?php echo $gioitinh1; ?>"><br>
        <lable for="sdt">Số điện thoại:</lable>
        <input style="margin-left:53px;" type="text" name="sdt" value="<?php echo $sdt1; ?>">
        <lable style="margin-left:7px;" for="email">Email:</lable>
        <input style="margin-left:45px;width:29%;" type="text" name="email" value="<?php echo $email1; ?>"><br>
        <lable for="diachi">Địa chỉ:</lable>
        <input style="margin-left:98px;width:60%;" type="text" name="diachi" value="<?php echo $diachi1; ?>"><br>
        <lable for="tieusubenh">Chức vụ:</lable>
        <input style="margin-left:88px;width:60%;" type="text" name="chucvu" value="<?php echo $chucvu1; ?>"><br>
        <lable for="tieusubenh">Lương cơ bản:</lable>
        <input style="margin-left:45px;width:60%;" type="text" name="luongcb" value="<?php echo $luongcb1; ?>"><br>
        <lable for="ngayden" style="margin-right:8%;">Ngày đến:</lable>
        <?php echo date("d-m-Y"); $ngayden = date("d-m-Y");?>
        <?php echo "<h2>--- Tài khoản ---</h2>" ?>
        <lable for="tieusubenh">Tên tài khoản:</lable>
        <input style="margin-left:53px;width:60%;" type="text" name="tentk" value="<?php echo $ttk1; ?>"><br>
        <lable for="tieusubenh">Mật khẩu:</lable>
        <input style="margin-left:85px;width:60%;" type="text" name="mk" value="<?php echo $mk1; ?>"><br>
        <div class="div5">
        <input style="width:10%; margin-top:15px;background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;border:2px solid black;font-size:13px;" type="submit" name="luu" value="Lưu">
        <?php echo "<a style='width:10%;font-size:13px; margin-top:15px;text-decoration:none;border:2px solid black;;background-color:rgb(37, 158, 37);padding:5px;color:white;'  href='HSNV_admin.php?tentk=".$tentk."'>Quay lại</a>";?>

        </div>
        </form>
        </div>
        </div>
</script>
</html>