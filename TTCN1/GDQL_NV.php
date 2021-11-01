<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .div2 a:hover{
            color:white;
        }
        .div2{
            background-color:rgb(150, 200, 30);
            width:40%;
            height:330px;
            border:3px solid #f2f2f2;
            float:left;
        }
        .div2_a{
            text-decoration: none;
            font-family:arial;
            color:blue;
        }
    </style>
</head>
<body>
    <?php include("GDQL_nhanvien.php") ?>
    <div class="div2" style="margin:8% 2% 0px 115px;">
        <h2 style=" background-color:pink;margin-top:0px; font-family:arial;padding:10px;text-align:center;">DỮ LIỆU</h2>
        <div style="margin-left:10%;height:85px;">
            <img src="hinhanh/hosobn.png" alt="" style="width:17%;border-radius: 50%;float:left; margin-right:5%;">
            <?php echo "<a class='div2_a' href='HSBN_nhanvien.php?tentk=".$tentk."'><h2>Hồ sơ bệnh nhân</h2></a>";?>
        </div>
        <div style="margin-left:10%;height:85px;">
            <img src="hinhanh/lienhe.png" alt="" style="width:17%;border-radius: 50%;float:left; margin-right:5%;">
            <?php echo "<a class='div2_a' href='lienhekhachhang.php?tentk=".$tentk."'><h2>Liên hệ khách hàng</h2></a>";?>
        </div>
    </div>
    </div>
    </div>
    <div class="div2"  style="margin:8% 0px 0px 0px;">
        <h2 style=" background-color:pink;margin-top:0px; font-family:arial;padding:10px;text-align:center;">CÀI ĐẶT</h2>
        <div style="margin-left:10%;height:85px;">
            <img src="hinhanh/thongtin.png" alt="" style="width:17%;border-radius: 50%;float:left; margin-right:4%;">
            <?php echo "<a class='div2_a' href='thongtincanhan.php?tentk=".$tentk."'><h2>Thông tin cá nhân</h2></a>";?>
        </div>
        <div style="margin-left:10%;height:85px;">
            <img src="hinhanh/caidat.png" alt="" style="width:17%;border-radius: 50%;float:left; margin-right:5%;">
            <?php echo "<a class='div2_a' href='taikhoan.php?tentk=".$tentk."'><h2>Đổi mật khẩu</h2></a>";?>
        </div>
    <div>
   
</body>
</html>