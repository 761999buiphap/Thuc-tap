<?php 
    include("GDQL_nhanvien.php");
?>
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
            margin:7px 2px 0 70%;
    }
    .div2form input{
            padding:5px;
    }
        .bang{
            text-align:center;
            margin:1% 1% 0px 1%;
        }
        .bang,td, th{
            border:2px solid white;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            }
         th{
            background-color:rgb(173, 75, 75);;
            padding:1% 0px;
            color:white;
        }

</style>
<html>
<body style="font-family:arial;">
<div class="div2">
        <form class="div2form" method="POST">
            <input style="width:170px;" type="text" name="ngay" placeholder="Nhập (d/m/y)">
            <input style="background-color:rgb(37, 158, 37);color:white;" type="submit" name="loctim" value="Lọc tìm">
        </form>
        <p>DỮ LIỆU >> <span style="color:blue;">Hồ sơ bệnh nhân</span> </p>
    </div>
    <div class="div4">
    <form method="POST">
        <h2 style="margin:2% 0px 0px 40%;">Thông liên tin hệ khách hàng</h2>
        <table class="bang">
            <th style="width:5%;">STT</th>
            <th style="width:8%;">Ngày tháng</th>
            <th style="width:15%;">Họ tên</th>
            <th style="width:10%;">Số điện thoại</th>
            <th style="width:10%;">Email</th>
            <th style="width:10%;">Địa chỉ</th>
            <th style="width:15%;">Nội dung</th>
            <?php 
                $CONN = new mysqli ('localhost','root','','qlpknk');
                mysqli_query($CONN,'SET NAMES UTF8');
                if(isset($_POST['ngay']))
                {
                    $ng=$_POST['ngay'];
                    $ngay=date('Y-m-d',strtotime($ng));
                    $truyvan="SELECT * FROM lienhe WHERE ngay='$ngay'" ;
                    $lienket=mysqli_query($CONN,$truyvan);
                    if(mysqli_num_rows($lienket)>0)
                    {
                        $i=0;
                        while($row=mysqli_fetch_assoc($lienket))
                        {
                            $i++;
                            $ng=$row['ngay'];
                            $ngay=date('d-m-Y',strtotime($ng));
                            echo "<tr>";
                            echo "<td style='background-color:#f2f2f2;'>$i</td>";
                            echo "<td style='background-color:pink;'>" .$ngay ."</td>";
                            echo "<td style='background-color:rgb(150, 200, 30);'>" .$row['hoten'] ."</td>";
                            echo "<td >" .$row['sdt'] ."</td>";
                            echo "<td>" .$row['email'] ."</td>";
                            echo "<td >" .$row['diachi'] ."</td>";
                            echo "<td >" .$row['noidung'] ."</td>";
                            echo "</tr>";
                        }
                    }exit;
                }
                
                $truyvan="SELECT * FROM lienhe";
                $lienket=mysqli_query($CONN,$truyvan);
                if(mysqli_num_rows($lienket)>0)
                {
                    $i=0;
                    while($row=mysqli_fetch_assoc($lienket))
                    {
                        $i++;
                        $ng=$row['ngay'];
                        $ngay=date('d-m-Y',strtotime($ng));
                        echo "<tr>";
                        echo "<td style='background-color:#f2f2f2;'>$i</td>";
                        echo "<td style='background-color:pink;'>" .$ngay ."</td>";
                        echo "<td style='background-color:rgb(150, 200, 30);'>" .$row['hoten'] ."</td>";
                        echo "<td >" .$row['sdt'] ."</td>";
                        echo "<td>" .$row['email'] ."</td>";
                        echo "<td>" .$row['diachi'] ."</td>";
                        echo "<td >" .$row['noidung'] ."</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </form>
    </div>

</body>
</html>