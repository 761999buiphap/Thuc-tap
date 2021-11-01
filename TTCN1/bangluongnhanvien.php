<?php include("GDQL_admin.php");  ?>
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
            margin:7px 2px 0px 87%;
        }
        .div2form input{
            padding:5px;
        }
        .div3{
            text-align:center;
            font-family:arial;
            border-color:black;
        }
        .div3 input[type=text]{
            border:none;
            outline:none;
            font-size:15px;
            text-align:center;
        }
        .bang,td, th{
            border:1px solid #ccc;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            }
        .div4{
            background-color:red;
            width:30%;
            height:150px;
            text-align:center;
            margin:5% 0px 0px 30%;
            padding:3%;
            background-color:#bbb;
            border:10px solid grey;
        }
        .div4 input[type=text]{
            padding:10px 135px;
            margin:5px;
            text-align:center;
            outline:none;
        }
        .div4 input[type=submit]{
            padding:5px;
        }
</style>
<html>
<div class="div2">
<form class="div2form" method="POST">
<input style='background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;text-align:center;border:2px solid black;font-size:13px;' type="submit" name="them" value="Thêm bảng lương">
        </form>
        <p>BẢNG LƯƠNG >> <span style="color:blue;">Nhân viên</span> </p>
</div>
<?php
//===Khi them moi===
if(isset($_POST['them'])||isset($_GET['luong']))
{
    $CONN = new mysqli('localhost','root','','qlpknk');
    mysqli_query($CONN,'SET NAMES UTF8');
    $thang=date("m");
    $nam=Date("Y");

                                echo "<div class='div3' >";
                                echo "<table  class='bang'style='margin:4% 0px 0px 1%;' >";
                                echo "<h3 style='text-align:center;margin-top:5%;'>BẢNG LƯƠNG THÁNG $thang NĂM $nam</h3>";
                                echo "<tr style='background-color:#bbb;'>";
                                    echo "<th rowspan='2'>TT</th>";
                                    echo "<th rowspan='2'>MBS</th>";
                                    echo "<th style='width:180px;' rowspan='2'>Họ và tên</th>";
                                    echo "<th rowspan='2'>Lương cơ bản</th>";
                                    echo "<th style='width:20px;' rowspan='2'>Hệ số</th>";
                                    echo "<th  style='width:35px;' rowspan='2'>Ngày công</th>";
                                    echo "<th style='width:190px;' colspan='2'>Thêm giờ</th>";
                                    echo "<th style='width:90px;' rowspan='2'>Thưởng </th>";
                                    echo "<th  style='width:180px;' colspan='2'>Phụ cấp</th>";
                                    echo "<th style='width:90px;' rowspan='2'>Bảo hiểm</th>";
                                    echo "<th  style='width:90px;'rowspan='2'>Ứng</th>";
                                    echo "<th style='width:120px;'rowspan='2'>Thao tác </th>";

                                echo "</tr>";
                                echo "<tr style='background-color:#bbb;'>";
                                echo "<th>Số giờ</th><th >Số tiền</th><th >Cơm xe</th><th >Trách nhiệm</th>";
                                echo "</tr>";
                                $i=0;
                                    $truyvanbs="SELECT * FROM hosonhanvien ";
                                    $lienketbs=mysqli_query($CONN,$truyvanbs);
                                    if(mysqli_num_rows($lienketbs)>0)
                                    {
                                        while($rowbs=mysqli_fetch_assoc($lienketbs))
                                        {
                                            $truyvanbs1="SELECT * FROM luongnhanvien WHERE manv='$rowbs[manv]' AND nam=$nam AND thang=$thang";
                                            $lienketbs1=mysqli_query($CONN,$truyvanbs1);
                                            $rowbs1=mysqli_fetch_assoc($lienketbs1);
                                            $luongcb = number_format($rowbs1['luongcb']);
                                            $tienthem = number_format($rowbs1['tienthem']);
                                            $thuong = number_format($rowbs1['thuong']);
                                            $comxe = number_format($rowbs1['comxe']);
                                            $trachnhiem = number_format($rowbs1['trachnhiem']);
                                            $baohiem = number_format($rowbs1['baohiem']);
                                            $ung = number_format($rowbs1['ung']);
                                            //Khi tra ve 0
                                            if($luongcb==0)$luongcb='';
                                            if($tienthem==0)$tienthem='';
                                            if($thuong==0)$thuong='';
                                            if($comxe==0)$comxe='';
                                            if($trachnhiem==0)$trachnhiem='';
                                            if($baohiem==0)$baohiem='';
                                            if($ung==0)$ung='';
                                            if($rowbs1['heso']==0)$heso='';else $heso=$rowbs1['heso'];
                                            if($rowbs1['ngaycong']==0)$ngaycong='';else $ngaycong=$rowbs1['ngaycong'];
                                            if($rowbs1['themgio']==0)$themgio='';else $themgio=$rowbs1['themgio'];
                                            echo "<form method='POST' action='sua.php?tentk=$tentk&&nhanvien=$rowbs[manv]'>";
                                            echo "<tr>";
                                            echo "<td>$i</td>";
                                            echo "<td >" .$rowbs['manv'] ."</td>";
                                            echo "<td >" .$rowbs['hoten'] ."</td>";
                                            echo "<td >" ."<input style='width:90px;' type=text name=luongcb value='$luongcb'>" ."</td>";
                                            echo "<td >" ."<input style='width:20px;' type=text name=heso value='$heso'>" ."</td>";
                                            echo "<td >" ."<input style='width:35px;' type=text name=ngaycong value='$ngaycong'>" ."</td>";
                                            echo "<td >" ."<input style='width:50px;'  type=text name=themgio value='$themgio'>" ."</td>";
                                            echo "<td >" ."<input style='width:90px;' type=text name=tienthem value='$tienthem'>" ."</td>";
                                            echo "<td >" ."<input style='width:90px;' type=text name=thuong value='$thuong'>" ."</td>";
                                            echo "<td >" ."<input style='width:90px;' type=text name=comxe value='$comxe'>" ."</td>";
                                            echo "<td >" ."<input style='width:90px;' type=text name=trachnhiem value='$trachnhiem'>" ."</td>";
                                            echo "<td >" ."<input style='width:90px;' type=text name=baohiem value='$baohiem'>" ."</td>";
                                            echo "<td >" ."<input style='width:90px;' type=text name=ung value='$ung'>" ."</td>";
                                            echo "<td>" ."<input style=' background-color:rgb(37, 158, 37);padding:2px 3px ;color:white;border:2px solid black;font-size:13px;' type=submit name='luongnv' value=Thêm><input style=' background-color:rgb(37, 158, 37);padding:2px 3px ;color:white;border:2px solid black;font-size:13px;' type=submit name='sualuongnv' value=Sửa><input style=' background-color:rgb(37, 158, 37);padding:2px 3px ;color:white;border:2px solid black;font-size:13px;' type=submit name='xoaluongnv' value=Xóa>" ."</td>" ;                                                               
                                            echo "</tr>";
                                            echo "</form>";
                                            echo "</div>";
                                        
                                            $i++;
                                        }
                                    }
                            
                            
                exit;
}
            
?>
    <?php
    $CONN = new mysqli ('localhost','root','','qlpknk') ;
    mysqli_query($CONN,'SET NAMES UTF8');
    if(isset($_POST['loctim'])|| isset($_GET['bangluong']))
    {
        if(isset($_POST['loctim']))
        {
            $thang=$_POST['thang'];
            $nam=$_POST['nam'];
        }
        if(isset($_GET['thang']))
        {
            $thang=$_GET['thang'];
            $nam=$_GET['nam'];
        }
        if(!empty($thang) && !empty($nam))
        {   

            $truyvan1="SELECT * FROM luongnhanvien WHERE thang='$thang' and nam='$nam'";
            $lienket1=mysqli_query($CONN,$truyvan1) or die("sai1");
            if(mysqli_num_rows($lienket1)>0)
                        {   
                            echo "<div class='div3'>";
                            echo "<table class='bang' >";
                            echo "<h3 style='text-align:center;'>BẢNG LƯƠNG THÁNG $thang NĂM $nam</h3>";
                            echo "<tr style='background-color:#bbb;'>";
                                echo "<th rowspan='2'>TT</th>";
                                echo "<th rowspan='2'>MBS</th>";
                                echo "<th style='width:180px;' rowspan='2'>Họ và tên</th>";
                                echo "<th rowspan='2'>Lương cơ bản</th>";
                                echo "<th style='width:20px;' rowspan='2'>Hệ số</th>";
                                echo "<th  style='width:35px;' rowspan='2'>Ngày công</th>";
                                echo "<th style='width:190px;' colspan='2'>Thêm giờ</th>";
                                echo "<th style='width:90px;' rowspan='2'>Thưởng </th>";
                                echo "<th  style='width:180px;' colspan='2'>Phụ cấp</th>";
                                echo "<th style='width:90px;' rowspan='2'>Bảo hiểm</th>";
                                echo "<th  style='width:90px;'rowspan='2'>Ứng</th>";
                                echo "<th  style='width:110px;' rowspan='2'>Tổng lương</th>";


                            echo "</tr>";
                            echo "<tr style='background-color:#bbb;'>";
                            echo "<th>Số giờ</th><th >Số tiền</th><th >Cơm xe</th><th >Trách nhiệm</th>";
                            echo "</tr>";
                            $i=1;
                            while($row=mysqli_fetch_assoc($lienket1))
                            {
                                $truyvannv="SELECT hoten FROM hosonhanvien WHERE manv='$row[manv]'";
                                $lienketnv=mysqli_query($CONN,$truyvannv);
                                $rownv=mysqli_fetch_assoc($lienketnv);
                                echo "<form method='POST' action='sua.php?tentk=".$tentk."&&thang=$thang&&nam=$nam&&manv=$row[manv] '>";
                                echo "<tr>";
                                echo "<td>$i</td>";
                                echo "<td >" .$row['manv'] ."</td>";
                                echo "<td >" .$rownv['hoten'] ."</td>";
                                $luongcb = number_format($row['luongcb']);
                                echo "<td >" ."<input style='width:90px;' type=text name=luongcb value=$luongcb>" ."</td>";
                                echo "<td >" ."<input style='width:20px;' type=text name=heso value=$row[heso]>" ."</td>";
                                echo "<td >" ."<input style='width:35px;' type=text name=ngaycong value=$row[ngaycong]>" ."</td>";
                                echo "<td >" ."<input style='width:50px;'  type=text name=themgio value=$row[themgio]>" ."</td>";
                                $tienthem = number_format($row['tienthem']);
                                echo "<td >" ."<input style='width:90px;' type=text name=tienthem value=$tienthem>" ."</td>";
                                $thuong = number_format($row['thuong']);
                                echo "<td >" ."<input style='width:90px;' type=text name=thuong value=$thuong>" ."</td>";
                                $comxe = number_format($row['comxe']);
                                echo "<td >" ."<input style='width:90px;' type=text name=comxe value=$comxe>" ."</td>";
                                $trachnhiem = number_format($row['trachnhiem']);
                                echo "<td >" ."<input style='width:90px;' type=text name=trachnhiem value=$trachnhiem>" ."</td>";
                                $baohiem = number_format($row['baohiem']);
                                echo "<td >" ."<input style='width:90px;' type=text name=baohiem value=$baohiem>" ."</td>";
                                $ung = number_format($row['ung']);
                                echo "<td >" ."<input style='width:90px;' type=text name=ung value=$ung>" ."</td>";
                                $tongluong = number_format($row['tongluong']);
                                echo "<td >" ."<input style='width:90px;' type=text name=tongluong value=$tongluong>" ."</td>";
                                echo "</tr>";
                                echo "</form>";

                                echo "</div>";
                                $i++;
                            }
                            exit;
                        }
                        else
                            echo "<h3 style='color:red;text-align:center;'> Không tồn tại bảng lương của tháng $thang năm $nam </h3>";              
        }
        else
        {
            echo "<h3 style='color:red;text-align:center;'>< Nhập vào đầy dủ thông tin ></h3>";              
        }
    }
?>
<div class="div4">
<form method="POST">
            <input style="width:70px;" type="text" name="thang" placeholder="month"><br>
            <input style="width:70px;" type="text" name="nam" placeholder="year"><br>
            <input style="background-color:rgb(37, 158, 37);color:white;" type="submit" name="loctim" value="Lọc tìm">
           
        </form>
</div>
</html>
