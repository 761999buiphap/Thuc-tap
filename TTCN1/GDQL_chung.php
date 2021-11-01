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
                    echo "<p class='header_p' style=' right:6%;border-right:2px solid white;padding-right:25px;bottom:1%;font-family:arial;position:absolute;color:white; padding-right:8px;'>Xin chào: ".$tentk ."</p>";
                    echo " <a class='header_a' style='right:1%;text-decoration:none;top:12px;' href='trangchu.php'>Thoát</a>";
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
                {
                    echo "<div class='div1'>";
                        echo "<div class='thanhquanli'>";
                            echo "<div class='div1_dulieu'>";
                                echo "<button class='dulieu'>DỮ LIỆU</button>";
                                echo "<div class='div1_dulieu1'>";
                                echo "<a id='diva' href='HSBN_nhanvien.php?tentk=".$tentk."'>HỒ SƠ BỆNH NHÂN</a>";
                                echo "</div>";
                                echo "</div>";
                    echo "<div class='div1_dulieu'>";
                        echo "<button class='dulieu'>CÀI ĐẶT</button>";
                            echo "<div class='div1_dulieu1'>";
                                echo "<a href='thongtincanhan.php?tentk=".$tentk."'>THÔNG TIN CÁ NHÂN</a>";
                                echo "<a href='taikhoan.php?tentk=".$tentk."'>TÀI KHOẢN</a>";
                            echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div> ";
                }
                if($rowbs>0)
                {
                        echo "<div class='div1'>";
                        echo "<div class='thanhquanli'>";
                            echo "<div class='div1_dulieu'>";
                                echo "<button class='dulieu'>DỮ LIỆU</button>";
                                echo "<div class='div1_dulieu1'>";
                                echo "<a id='diva' href='lichhen.php?tentk=".$tentk."'>LỊCH HẸN</a>";
                                echo "<a id='diva' href='HSBN_nhanvien.php?tentk=".$tentk."'>HỒ SƠ BỆNH NHÂN</a>";
                            echo "</div>";
                            echo "</div>";
                        echo "<div class='div1_dulieu'>";
                            echo "<button class='dulieu'>CÀI ĐẶT</button>";
                                echo "<div class='div1_dulieu1'>";
                                echo "<a href='thongtincanhan.php?tentk=".$tentk."'>THÔNG TIN CÁ NHÂN</a>";
                                echo "<a href='taikhoan.php?tentk=".$tentk."'>TÀI KHOẢN</a>";
                            echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div> ";
                }
                if($rowdm>0)
                {
                        echo "<div class='div1'>";
                        echo "<div class='thanhquanli'>";
                            echo "<div class='div1_dulieu'>";
                                echo "<button class='dulieu'>DỮ LIỆU</button>";
                                echo "<div class='div1_dulieu1'>";
                                echo "<a id='diva' href='HSNV_admin.php?tentk=".$tentk."'>HỒ SƠ NHÂN VIÊN</a>";
                                echo "<a id='diva' href='HSBS_admin.php?tentk=".$tentk."'>HỒ SƠ BÁC SĨ</a>";
                                 echo "<a id='diva' href='HSBN_nhanvien.php?tentk=".$tentk."'>HỒ SƠ BỆNH NHÂN</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='div1_dulieu'>";
                                echo "<button class='dulieu'>BẢNG LƯƠNG</button>";
                                echo "<div class='div1_dulieu1'>";
                                echo "<a href='bangluongbacsi.php?tentk=".$tentk."'>BÁC SĨ</a>";
                                echo "<a href='bangluongnhanvien.php?tentk=".$tentk."'>NHÂN VIÊN</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='div1_dulieu'>";
                                echo "<button class='dulieu'>CÀI ĐẶT</button>";
                                echo "<div class='div1_dulieu1'>";
                                echo "<a href='thongtincanhan.php?tentk=".$tentk."'>THÔNG TIN CÁ NHÂN</a>";
                                echo "<a href='taikhoan.php?tentk=".$tentk."'>TÀI KHOẢN</a>";
                            echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div> ";
                }
                if($rowbn>0)
                {
                        echo "<div class='div1'>";
                        echo "<div class='thanhquanli'>";
                            echo "<div class='div1_dulieu'>";
                                echo "<button class='dulieu'>DỮ LIỆU</button>";
                                echo "<div class='div1_dulieu1'>";
                                echo "<a id='diva' href='HSBN_benhnhan.php?tentk=".$tentk."'>LỊCH SỬ KHÁM BỆNH</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='div1_dulieu'>";
                                echo "<button class='dulieu'>CÀI ĐẶT</button>";
                                echo "<div class='div1_dulieu1'>";
                                echo "<a href='thongtincanhan.php?tentk=".$tentk."'>THÔNG TIN CÁ NHÂN</a>";
                                echo "<a href='taikhoan.php?tentk=".$tentk."'>TÀI KHOẢN</a>";
                            echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div> "; 
                }

            ?>

        </div>
        
        
    </header>
    
    
</body>
</html>