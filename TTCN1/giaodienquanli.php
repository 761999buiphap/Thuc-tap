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
            background-color: #f2f2f2;
            width: 100%;
            height: 40px;
            
        }
        .thanhquanli{
            display: inline-block;
            font-family: arial;
            margin-top: 10px;
        }
        .dulieu {
        color: black;
        padding: 5px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        }

        .div1_dulieu {
        position: relative;
        display: inline-block;
        }

        .div1_dulieu1 {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .div1_dulieu1 a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        }

        .div1_dulieu1 a:hover {background-color: #f1f1f1}

        .div1_dulieu:hover .div1_dulieu1 {
        display: block;
        }

        .div1_dulieu:hover .dulieu, .thanhquanli a:hover{
        background-color:rgb(37, 158, 37);
        color:white;
        }
        .thanhquanli a{
            text-decoration:none; 
            padding:5px;
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
                    <button class="dulieu">D??? li???u</button>
                    <div class="div1_dulieu1">
                    <?php echo "<a id='diva' href='lichhen.php?tentk=".$tentk."'>lichhen</a>";?>
                    <?php echo "<a id='diva' href='hosobenhnhan.php?tentk=".$tentk."'>H??? s?? b???nh nh??n</a>";?>
                    <a href="hosobs.php">H??? s?? b??c s??</a>
                    <a href="bangluong.php">B???ng l????ng</a>
                    <a href="doanhthu.php">T???ng doanh thu</a>
                </div>
                </div>
                <a class=" div1a" href="">B??o c??o</a>
                <a class=" div1a" href="">C??i ?????t</a>
            </div>
        </div>
        
    </header>
    
    
</body>
</html>