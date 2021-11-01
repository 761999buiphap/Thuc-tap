<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
         .header{
            width:100%;
            height:45px;
            background-color:rgb(37, 158, 37);
            position:relative;

        }
        .div1{
            background-color:green;
            width: 100%;
            height:50px;
        }
        .thanhquanli{
            display: inline-block;
            font-family: arial;
            margin-top: 7px;
        }
        .dulieu {
            color: white;
            padding: 5px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            font-weight:bold;
            background-color:green;

        }

        .div1_dulieu {
            position: relative;
            display: inline-block;

        }

        .div1_dulieu1 {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 240px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;

        }

        .div1_dulieu1 a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;


        }
        #diva{
            border:2px solid rgb(37, 158, 37);

        }

        .div1_dulieu1 a:hover {background-color: #f1f1f1;}

        .div1_dulieu:hover .div1_dulieu1 {
        display: block;
        }

        .div1_dulieu:hover .dulieu, .thanhquanli a:hover{
        background-color:#f2f2f2;
        color:black;
        }
        .thanhquanli a{
            text-decoration:none; 
            padding:9px;
            color:white;
            font-weight:bold;
            z-index:2;
        }
        .header_p,.header_a{
            bottom:1%;
             font-family:arial;
             position:absolute;
             color:white; 
             padding-right:8px;
        }
    </style>
</head>
<body>
    <header>
        <div class="header">
            <img style="height: 45px;" src="hinhanh/Capture.JPG" alt="">            
            <?php
                if(isset($_GET['tentk']))
                {
                    $tentk=$_GET['tentk'];
                    echo "<p class='header_p' style=' right:6%;border-right:2px solid white;padding-right:25px;bottom:1%;font-family:arial;position:absolute;color:white; padding-right:8px;'>Xin chào: ".$tentk ."</p>";
                    echo " <a class='header_a' style='right:1%;text-decoration:none;top:12px;' href='trangchu.php'>Thoát</a>";
                }
        ?>

        </div>
        <div class="div1">
            <div class="thanhquanli">
                <?php echo "<a id='diva' href='HSBN_nhanvien.php?tentk=".$tentk."'>BỆNH NHÂN</a>";?>
                <?php echo "<a id='diva' href='lienhekhachhang.php?tentk=".$tentk."'>LIÊN HỆ KHÁCH HÀNG</a>";?>
                <?php echo "<a id='diva' href='thuoc_bacsy.php?tentk=".$tentk."'>THUỐC</a>";?>
                <?php echo "<a id='diva' href='banggiadichvu.php?tentk=".$tentk."'>BẢNG GIÁ DỊCH VỤ</a>";?>
                <div class="div1_dulieu">
                    <button class="dulieu" style='padding:9px;border:2px solid rgb(37, 158, 37);'>CÀI ĐẶT</button>
                    <div class="div1_dulieu1">
                    <?php echo "<a style='color:black;' href='thongtincanhan.php?tentk=".$tentk."'>THÔNG TIN CÁ NHÂN</a>";?>
                    <?php echo "<a <a style='color:black;' href='taikhoan.php?tentk=".$tentk."'>TÀI KHOẢN</a>";?>
                </div>
            </div>
            </div>
        </div>
       
    </header>
    
    
</body>
</html>