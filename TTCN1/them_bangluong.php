<?php include("GDQL_admin.php");  ?>
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
            margin:7px 2px 0 72%;
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
        .bang{
            margin:4% 0px 0px 5%;
        }
        .bang,td, th{
            border:1px solid #ccc;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            }
        
</style>
<?php
$CONN = new mysqli('localhost','root','','qlpknk');
mysqli_query($CONN,'SET NAMES UTF8');
$thang=date("m");
$nam=Date("Y");
$truyvan1="SELECT * FROM luong ";
$lienket1=mysqli_query($CONN,$truyvan1) or die("sai");
            if(mysqli_num_rows($lienket1)>0)
            {
                            echo "<div class='div3'>";
                            echo "<table  class='bang' >";
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

                            echo "</tr>";
                            echo "<tr style='background-color:#bbb;'>";
                            echo "<th>Số giờ</th><th >Số tiền</th><th >Cơm xe</th><th >Trách nhiệm</th>";
                            echo "</tr>";
                            $i=0;
                            echo "<form method='POST' >";
                            while($row=mysqli_fetch_assoc($lienket1))
                            {
                                $truyvanbs="SELECT hoten FROM hosobacsy WHERE mabs='$row[mabs]'";
                                $lienketbs=mysqli_query($CONN,$truyvanbs);
                                $rowbs=mysqli_fetch_assoc($lienketbs);
                                echo "<tr>";
                                echo "<td>$i</td>";
                                echo "<td >" .$row['mabs'] ."</td>";
                                echo "<td >" .$rowbs['hoten'] ."</td>";
                                echo "<td >" ."<input style='width:90px;' type=text name=luongcb value=''>" ."</td>";
                                echo "<td >" ."<input style='width:20px;' type=text name=heso value=''>" ."</td>";
                                echo "<td >" ."<input style='width:35px;' type=text name=ngaycong value=''>" ."</td>";
                                echo "<td >" ."<input style='width:50px;'  type=text name=themgio value=''>" ."</td>";
                                echo "<td >" ."<input style='width:90px;' type=text name=tienthem value=''>" ."</td>";
                                echo "<td >" ."<input style='width:90px;' type=text name=thuong value=''>" ."</td>";
                                echo "<td >" ."<input style='width:90px;' type=text name=comxe value=''>" ."</td>";
                                echo "<td >" ."<input style='width:90px;' type=text name=trachnhiem value=''>" ."</td>";
                                echo "<td >" ."<input style='width:90px;' type=text name=baohiem value=''>" ."</td>";
                                echo "<td >" ."<input style='width:90px;' type=text name=ung value=''>" ."</td>";
                                echo "</tr>";

                                echo "</div>";
                                $i++;
                                
                            }
                            echo "<input style=' background-color:rgb(37, 158, 37);padding:5px 10px;color:white;text-decoration:none;border:2px solid black;font-size:13px;position:absolute;top:64%;' type=submit name='luu' value=Lưu bảng lương>" ;                                                               
                            echo "</form>";
                            if(isset($_POST['luu']))
                            {
                                $mabs=$_GET['mabs'];
                                $ung=$_POST['ung'];
                                $ung = str_replace( ',', '', $ung );
                                $luongcb=$_POST['luongcb'];
                                $luongcb = str_replace( ',', '', $luongcb );
                                $heso=$_POST['heso'];
                                $ngaycong=$_POST['ngaycong'];
                                $themgio=$_POST['themgio'];
                                $tienthem=$_POST['tienthem'];
                                $tienthem = str_replace( ',', '', $tienthem );
                                $thuong=$_POST['thuong'];
                                $thuong = str_replace( ',', '', $thuong );
                                $comxe=$_POST['comxe'];
                                $comxe = str_replace( ',', '', $comxe );
                                $trachnhiem=$_POST['trachnhiem'];
                                $trachnhiem = str_replace( ',', '', $trachnhiem );
                                $baohiem=$_POST['baohiem'];
                                $baohiem = str_replace( ',', '', $baohiem );
                                $tongluong = ($luongcb*$ngaycong)+($themgio*$tienthem)+$thuong+$comxe+$trachnhiem+$baohiem;
                            
                                $CONN = new mysqli('localhost','root','','qlpknk');
                                mysqli_query($CONN,'SET NAMES UTF8');
                                $truyvan="UPDATE luongnhanvien SET ung='$ung',luongcb='$luongcb',heso='$heso',ngaycong='$ngaycong',themgio='$themgio',tienthem='$tienthem',thuong='$thuong',comxe='$comxe',trachnhiem='$trachnhiem',baohiem='$baohiem',tongluong='$tongluong' WHERE manv='$manv' AND thang=$thang AND nam=$nam";
                                $lienket=mysqli_query($CONN,$truyvan)or die("sai");
                            }
            }
?>