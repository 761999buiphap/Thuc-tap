<?php include("GDQL_admin.php") ?>
<style>
    .div2{
            border:2px solid #bbb;
            width: 100%;
            height: 45px;
           font-family:arial;
           position:relative;
           background-color:#ddd;
    }
    .div4{
            background-color:red;
            width:27%;
            height:140px;
            text-align:center;
            margin:5% 0px 0px 30%;
            padding:5%;
            background-color:#bbb;
            border:3px solid grey;
        }
        .div4 input[type=text]{
            padding:10px 135px;
            margin-top:7%;
            text-align:center;
        }
        .div4 input[type=submit]{
            padding:5px;
            margin-top:7%;
        }
        .bang,td, th{
            border:1px solid #ccc;
            border-collapse: collapse;
        }
        .bang td{
            padding: 5px;
            height:150px;
            }
        .bang th{
            width:200px;
            background-color:rgb(150, 200, 30);
            padding: 5px;
        }
</style>
<html>
<body style="font-family:arial;">
<div class="div2">
        <p style="margin-left:1%;">Dữ liệu >> <span style="color:blue;">Đánh giá của khách hàng</span> </p>
    </div>
<?php 
    $CONN = new mysqli ('localhost','root','','qlpknk') ;
    mysqli_query($CONN,'SET NAMES UTF8');
    //Nếu tồn tại nút lọc tìm
    if(isset($_POST['loctim']))
    {
        $nam=$_POST['nam'];
        $truyvan="SELECT nam FROM danhgia WHERE nam='$nam'";
        $lienket=mysqli_query($CONN,$truyvan);
        $row=mysqli_fetch_assoc($lienket);
        if($row>0)
        {
            $truyvan1="SELECT COUNT(nhanxet) AS dem1  FROM danhgia WHERE nhanxet='Rất không hài lòng' ";
            $lienket1=mysqli_query($CONN,$truyvan1);
            $row1=mysqli_fetch_assoc($lienket1);
            $truyvan2="SELECT COUNT(nhanxet) AS dem2  FROM danhgia WHERE nhanxet='Không hài lòng' ";
            $lienket2=mysqli_query($CONN,$truyvan2);
            $row2=mysqli_fetch_assoc($lienket2);
            $truyvan3="SELECT COUNT(nhanxet) AS dem3  FROM danhgia WHERE nhanxet='Chấp nhận được' ";
            $lienket3=mysqli_query($CONN,$truyvan3);
            $row3=mysqli_fetch_assoc($lienket3);
            $truyvan4="SELECT COUNT(nhanxet) AS dem4  FROM danhgia WHERE nhanxet='Hài lòng' ";
            $lienket4=mysqli_query($CONN,$truyvan4);
            $row4=mysqli_fetch_assoc($lienket4);
            $truyvan5="SELECT COUNT(nhanxet) AS dem5  FROM danhgia WHERE nhanxet='Rất hài lòng' ";
            $lienket5=mysqli_query($CONN,$truyvan5);
            $row5=mysqli_fetch_assoc($lienket5);
            echo "<table class='bang' style='margin-left:7%;font-size:25px;text-align:center;'>";
                echo "<h2 style='text-align:center;margin:7% 0px 5% 0px;'>TỔNG HỢP ĐÁNH GIÁ NĂM $nam</h2>";
                echo "<tr><th style='width:89px;background-color:pink;'>Đánh giá</th><th>Rất không hài lòng</th><th>Không hài lòng</th><th>Chấp nhận được</th><th>Hài lòng</th><th>Rất hài lòng</th></tr>";
                echo "<tr><td style='width:89px;background-color:pink;'><strong>Số lượng</strong></td><td>$row1[dem1] <img style='width:30px;' src='hinhanh/ngoisao.jpg' alt=''></td><td>$row2[dem2] <img style='width:30px;' src='hinhanh/ngoisao.jpg' alt=''></td><td>$row3[dem3] <img style='width:30px;' src='hinhanh/ngoisao.jpg' alt=''></td><td>$row4[dem4] <img style='width:30px;' src='hinhanh/ngoisao.jpg' alt=''></td><td>$row5[dem5] <img style='width:30px;' src='hinhanh/ngoisao.jpg' alt=''></td></tr>";
            echo "</table>";
            $truyvan10="SELECT ykien FROM danhgia WHERE ykien LIKE 'K%' ";
            $lienket10=mysqli_query($CONN,$truyvan10);
            $row10=mysqli_fetch_assoc($lienket10);
            while(mysqli_fetch_assoc($lienket10))
            {
                echo $row10['ykien'];
            }
            exit;
        }
        else
             echo "<h3 style='color:red;text-align:center;'>< Không tìm thấy số liệu của năm này! ></h3>";              
    }
?>
<div class="div4">
    <form method="POST">
            <input style="width:70px;" type="text" name="nam" placeholder="year"><br>
            <input style="background-color:rgb(37, 158, 37);color:white;" type="submit" name="loctim" value="Lọc tìm">
    </form>
</div>
</body>
</html>