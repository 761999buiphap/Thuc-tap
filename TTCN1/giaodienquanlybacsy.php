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
            height: 50px;
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
        min-width: 180px;
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
                <?php echo "<a id='diva' href='lichhen.php?tentk=".$tentk."'>L???CH H???N</a>";?>
                <?php echo "<a id='diva' href='HSBN_bacsy.php?tentk=".$tentk."'>B???NH NH??N</a>";?>
                <?php echo "<a id='diva' href='thuoc_bacsy.php?tentk=".$tentk."'>THU???C</a>";?>
                <?php echo "<a id='diva' href='laycaorang.php?tentk=".$tentk."'>L???Y CAO R??NG</a>";?>
                <?php echo "<a id='diva' href='rangsuthammy.php?tentk=".$tentk."'>R??NG S??? TH???M M???</a>";?>
                <?php echo "<a id='diva' href='niengrang.php?tentk=".$tentk."'>NI???NG R??NG</a>";?>
                <?php echo "<a id='diva' href='nhorang.php?tentk=".$tentk."'>NH??? R??NG</a>";?>
                <?php echo "<a id='diva' href='taytrangrang.php?tentk=".$tentk."'>T???Y TR???NG R??NG LASER</a>";?>             
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
    <?php /*
        if(isset($_GET['giaodien']))
        {
            echo "<div class='div12' style='margin:8% 2% 0px 115px;'>";
            echo "<h2 style=' background-color:pink;margin-top:0px; font-family:arial;padding:10px;text-align:center;'>D??? LI???U</h2>";
            echo "<div style='margin-left:10%;height:85px;'>";
                echo "<img src='hinhanh/timhieuthem5.JPG' alt='' style='width:17%;border-radius: 50%;float:left; margin-right:5%;'>";
                echo "<a class='div2_a' href='lichhen.php?tentk=".$tentk."'><h2>L???ch h???n</h2></a>";
            echo "</div>";
            echo "<div style='margin-left:10%;height:85px;'>";
                echo "<img src='hinhanh/hosobn.png' alt='' style='width:17%;border-radius: 50%;float:left; margin-right:5%;'>";
                 echo "<a class='div2_a' href='HSBN_bacsy.php?tentk=".$tentk."'><h2>H??? s?? b???nh nh??n</h2></a>";
            echo "</div>";
            echo "<div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='div2'  style='margin:8% 0px 0px 0px;'>";
            echo "<h2 style=' background-color:pink;margin-top:0px; font-family:arial;padding:10px;text-align:center;'>C??I ?????T</h2>";
            echo "<div style='margin-left:10%;height:85px;'>";
                echo "<img src='hinhanh/thongtin.png' alt='' style='width:17%;border-radius: 50%;float:left; margin-right:4%;'>";
                echo "<a class='div2_a' href='thongtincanhan.php?tentk=".$tentk."'><h2>Th??ng tin c?? nh??n</h2></a>";
            echo "</div>";
            echo "<div style='margin-left:10%;height:85px;'>";
                echo "<img src='hinhanh/caidat.png' alt='' style='width:17%;border-radius: 50%;float:left; margin-right:5%;'>";
                echo "<a class='div2_a' href='taikhoan.php?tentk=".$tentk."'><h2>?????i m???t kh???u</h2></a>";
            echo "</div>";
        echo "<div>";
        }
   */ ?>
    
</body>
</html>