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
            height: 53px;
        }
        .thanhquanli{
            display: inline-block;
            font-family: arial;
            margin-top: 8px;
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
        min-width: 220px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .div1_dulieu1 a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;

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
        #diva{
            border:2px solid rgb(37, 158, 37);

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
                    echo "<p class='header_p' style=' right:6%;border-right:2px solid white;padding-right:25px;bottom:1%;font-family:arial;position:absolute;color:white; padding-right:8px;'>Xin ch??o: ".$tentk ."</p>";
                    echo " <a class='header_a' style='right:1%;text-decoration:none;top:12px;' href='trangchu.php'>Tho??t</a>";
                }
        ?>

        </div>
        <div class="div1">
            <div class="thanhquanli">
                <div class="div1_dulieu">
                    <button class="dulieu" style='padding:9px;border:2px solid rgb(37, 158, 37);'>H??? S??</button>
                    <div class="div1_dulieu1">
                    <?php echo "<a style='color:black;'  href='HSNV_admin.php?tentk=".$tentk."'>H??? S?? NH??N VI??N</a>";?>
                    <?php echo "<a style='color:black;'  href='HSBS_admin.php?tentk=".$tentk."'>H??? S?? B??C S??</a>";?>
                    <?php echo "<a style='color:black;'  href='HSBN_nhanvien.php?tentk=".$tentk."'>H??? S?? B???NH NH??N</a>";?>
                </div>
                </div>
                <div class="div1_dulieu">
                    <button class="dulieu" style='padding:9px;border:2px solid rgb(37, 158, 37);'> D??? LI???U</button>
                    <div class="div1_dulieu1">
                    <?php echo "<a style='color:black;' href='bangluongbacsi.php?tentk=".$tentk."'>B???NG L????NG B??C S??</a>";?>
                    <?php echo "<a style='color:black;' href='bangluongnhanvien.php?tentk=".$tentk."'>B???NG L????NG NH??N VI??N</a>";?>
                    <?php echo "<a style='color:black;' href='quanlitaikhoan_admin.php?tentk=".$tentk."'>QU???N L?? T??I KHO???N</a>";?>
                    <?php echo "<a style='color:black;' href='ykienkhachhang_admin.php?tentk=".$tentk."'>????NH GI?? C???A KH??CH H??NG</a>";?>
                </div>
                </div>
                <?php echo "<a id='diva'  href='hoadon.php?tentk=".$tentk."&&hoadon'>THU???C</a>";?>
                <?php echo "<a id='diva' href='dichvurang.php?tentk=".$tentk."&&dichvu'>D???CH V???</a>";?>
                <div class="div1_dulieu">
                    <button class="dulieu" style='padding:9px;border:2px solid rgb(37, 158, 37);'>C??I ?????T</button>
                    <div class="div1_dulieu1">
                    <?php echo "<a style='color:black;' href='thongtincanhan.php?tentk=".$tentk."'>TH??NG TIN C?? NH??N</a>";?>
                    <?php echo "<a style='color:black;' href='taikhoan.php?tentk=".$tentk."'>T??I KHO???N</a>";?>
                </div>
                </div>
            </div>
        </div>
        
    </header>
    
    
</body>
</html>