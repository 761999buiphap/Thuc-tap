<?php 
    include("GDQL_admin.php");
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
        .div4{
            background-color:red;
            width:40%;
            height:350px;
            margin:5% 0px 0px 30%;
            padding:5px;
            background-color:#bbb;
            border:10px solid grey;
        }
        .div4 input[type=radio]{
            margin:0% 15px 15px 35%;
            
        }
        .div4 label{
            font-size:20px;
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
            padding: 5px 40px;
            }
         th{
            background-color:#bbb;
        }
        .bang input[name=ten] ,.bang input[name=mk]
        {
            background-color:pink;
            text-align:center;
            border:none;
            outline:none;
        }
        .bt {
            margin:2px 0px 2px 91%;color:white;background-color: rgb(173, 75, 75);padding:3px;
        }
        #themtkbs{
            position:absolute;top:16%;right:1%;color:white;background-color: rgb(37, 158, 37);padding:5px;
        }
        .form1 input[type=text]
        {
            outline:none;
            padding:5px;
            margin:5% 20%;
            width:60%;
        }
        .form1 label
        {
            margin-left:20%;
            color:rgb(37, 158, 37);
        }
        .form1 input[type=submit]{
            margin:2px 0px 2px 45%;color:white;background-color: rgb(37, 158, 37);padding:3px;
        }
</style>

<html>
<body style="font-family:arial;">
<div class="div2">
        <p style="margin-left:1%;">Dữ liệu >> <span style="color:blue;">Tài khoản</span> </p>
    </div>
    <?php 
        $CONN = new mysqli ('localhost','root','','qlpknk');
        mysqli_query($CONN,'SET NAMES UTF8');
        if(isset($_POST['loctim']) || isset($_GET['taikhoanbs'])|| isset($_GET['taikhoannv'])||isset($_GET['taikhoanbn'])||isset($_GET['taikhoan']))
        {
            $tk1='';
            if(isset($_GET['taikhoan']))
            {
                $tk1=$_GET['taikhoan'];
            }
            //===Tai khoan bac si===
            if(isset($_POST['bacsi']) || isset($_GET['taikhoanbs']) || $tk1=='bacsi')
            {
                
                $truyvan="SELECT * FROM taikhoanbacsy";
                $lienket=mysqli_query($CONN,$truyvan);
                if(mysqli_num_rows($lienket)>0)
                {
                    //Them tai khoan 
                    echo "<button id='themtkbs'>Thêm tài khoản</button>";
                    echo "<div id='p3'></div>";
                    echo "<div id='p2'></div>";
                    if(isset($_GET['taikhoanbs']))
                    {
                        $tk=$_GET['taikhoanbs'];
                        if($tk=='sai')
                            echo "<h3 style=' margin-left:40%;color:red;'> Đã tồn tại tên tài khoản này! </h3>";
                        if($tk=='dung')
                            echo "<h3 style=' margin-left:44%;color:red;'> Thêm thành công ! </h3>";
                        if($tk=='chuatontai')
                            echo "<h3 style=' margin-left:42%;color:red;'> Chưa tồn tại bác sĩ này! </h3>";
                        
                    }
                    echo "<script>document.getElementById('themtkbs').addEventListener('click', ttk);";
                    echo "function ttk(){macdinh();document.getElementById('p2').innerHTML = '<button id=p5 class=bt>Thoát</button><hr><br><form class=form1 action=sua.php?tentk=".$tentk." method=POST><label>Tên tài khoản:</label><br><input  type=text name=ten value=><label>Tên mật khẩu:</label><input type=text name=mk value=><br><input type=submit name=themtkbs value=Thêm tai khoan></form>';macdinh2();document.getElementById('p5').addEventListener('click', pp5);}";
                    echo "function macdinh(){document.getElementById('p2').style.display = 'block';document.getElementById('p2').innerHTML = 'phap';document.getElementById('p2').style.width = '40%';document.getElementById('p2').style.height = '400px'; document.getElementById('p2').style.position = 'fixed'; document.getElementById('p2').style.background = 'white';document.getElementById('p2').style.top= '20%';document.getElementById('p2').style.left= '30%';}";
                    echo "function macdinh2(){document.getElementById('p3').style.display = 'block';document.getElementById('p3').style.background = 'black';document.getElementById('p3').style.width = '100%'; document.getElementById('p3').style.height = '700px';document.getElementById('p3').style.position = 'fixed';document.getElementById('p3').style.top = '0px';document.getElementById('p3').style.opacity = '0.7';document.getElementById('p2').style.zindex = '2';document.getElementById('p3').style.zindex = '1';}";
                    echo "function pp5() {document.getElementById('p2').style.display = 'none';document.getElementById('p3').style.display = 'none';}";
                    echo "</script>";
                    echo "<table class='bang'>";
                    echo "<th style='width:150px;'>STT</th>";
                    echo "<th style='width:300px;'>Họ tên</th>";
                    echo "<th style='width:300px;'>Tên tài khoản" ."<br>(Mặc định là mã bác sĩ)</th>";
                    echo "<th style='width:300px;'>Mật khẩu</th>";
                    echo "<th style='width:180px;'>Thao tác</th>";

                    echo "<h1 style=' margin:1% 0px 0px 40%;'>Tài khoản bác sĩ</h1>";
                    $i=0;
                    while($row=mysqli_fetch_assoc($lienket))
                    {
                        $i++;
                        $truyvan1="SELECT*FROM hosobacsy WHERE mabs='$row[tentk]'";
                        $lienket1=mysqli_query($CONN,$truyvan1);
                        $row1=mysqli_fetch_assoc($lienket1);
                        echo "<form action='sua.php?tentk=".$tentk."' method='POST'>";
                        echo "<tr>";
                        echo "<td style='background-color:#f2f2f2;'>" .$i ."</td>";
                        echo "<td style='background-color:rgb(150, 200, 30);'>" .$row1['hoten'] ."</td>";
                        echo "<td style='background-color:pink;'>" ."<input type='text' name='ten' value='$row[tentk]'" ."</td>";
                        echo "<td style='background-color:pink;'>"."<input type='text' name='mk' value='$row[matkhau]'" ."</td>";
                        echo "<td style='background-color:#f2f2f2;'>" ."<input style=' background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:1%;' type=submit name='suatkbs' value=Sửa>" ."<input style=' background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;border:2px solid black;font-size:13px;' type=submit name='xoatkbs' value=Xóa>" ."</td>";
                        echo "</tr>";
                        echo "</form>";
                    }
                }
                echo "</table>";
            }

            //===Tai khoan nhan vien
            if(isset($_POST['nhanvien'])|| isset($_GET['taikhoannv'])|| $tk1=='nhanvien')
            {
                
                $truyvan="SELECT * FROM taikhoannhanvien";
                $lienket=mysqli_query($CONN,$truyvan);
                if(mysqli_num_rows($lienket)>0)
                {
                    //Them tai khoan 
                    echo "<button id='themtkbs'>Thêm tài khoản</button>";
                    echo "<div id='p3'></div>";
                    echo "<div id='p2'></div>";
                    if(isset($_GET['taikhoannv']))
                    {
                        $tk=$_GET['taikhoannv'];
                        if($tk=='sai')
                            echo "<h3 style=' margin-left:40%;color:red;'> Đã tồn tại tên tài khoản này! </h3>";
                        if($tk=='dung')
                            echo "<h3 style=' margin-left:44%;color:red;'> Thêm thành công ! </h3>";
                        if($tk=='chuatontai')
                            echo "<h3 style=' margin-left:42%;color:red;'> Chưa tồn tại nhân viên này! </h3>";
                        
                    }
                    echo "<script>document.getElementById('themtkbs').addEventListener('click', ttk);";
                    echo "function ttk(){macdinh();document.getElementById('p2').innerHTML = '<button id=p5 class=bt>Thoát</button><hr><br><form class=form1 action=sua.php?tentk=".$tentk." method=POST><label>Tên tài khoản:</label><br><input  type=text name=ten value=><label>Tên mật khẩu:</label><input type=text name=mk value=><br><input type=submit name=themtknv value=Thêm tai khoan></form>';macdinh2();document.getElementById('p5').addEventListener('click', pp5);}";
                    echo "function macdinh(){document.getElementById('p2').style.display = 'block';document.getElementById('p2').innerHTML = 'phap';document.getElementById('p2').style.width = '40%';document.getElementById('p2').style.height = '400px'; document.getElementById('p2').style.position = 'fixed'; document.getElementById('p2').style.background = 'white';document.getElementById('p2').style.top= '20%';document.getElementById('p2').style.left= '30%';}";
                    echo "function macdinh2(){document.getElementById('p3').style.display = 'block';document.getElementById('p3').style.background = 'black';document.getElementById('p3').style.width = '100%'; document.getElementById('p3').style.height = '700px';document.getElementById('p3').style.position = 'fixed';document.getElementById('p3').style.top = '0px';document.getElementById('p3').style.opacity = '0.7';document.getElementById('p2').style.zindex = '2';document.getElementById('p3').style.zindex = '1';}";
                    echo "function pp5() {document.getElementById('p2').style.display = 'none';document.getElementById('p3').style.display = 'none';}";
                    echo "</script>";
                    echo "<table class='bang'>";
                    echo "<th style='width:150px;'>STT</th>";
                    echo "<th style='width:300px;'>Họ tên</th>";
                    echo "<th style='width:300px;'>Tên tài khoản" ."<br>(Mặc định là mã bác sĩ)</th>";
                    echo "<th style='width:300px;'>Mật khẩu</th>";
                    echo "<th style='width:180px;'>Thao tác</th>";
                    //in ra tai khoan nhan vien
                    echo "<h1 style=' margin:1% 0px 0px 40%;'>Tài khoản nhân viên</h1>";
                    $i=0;
                    while($row=mysqli_fetch_assoc($lienket))
                    {
                        $i++;
                        $truyvan1="SELECT*FROM hosonhanvien WHERE manv='$row[tentk]'";
                        $lienket1=mysqli_query($CONN,$truyvan1);
                        $row1=mysqli_fetch_assoc($lienket1);
                        echo "<form action='sua.php?tentk=".$tentk."' method='POST'>";
                        echo "<tr>";
                        echo "<td style='background-color:#f2f2f2;'>" .$i ."</td>";
                        echo "<td style='background-color:rgb(150, 200, 30);'>" .$row1['hoten'] ."</td>";
                        echo "<td style='background-color:pink;'>" ."<input type='text' name='ten' value='$row[tentk]'" ."</td>";
                        echo "<td style='background-color:pink;'>"."<input type='text' name='mk' value='$row[matkhau]'" ."</td>";
                        echo "<td style='background-color:#f2f2f2;'>" ."<input style=' background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:1%;' type=submit name='suatknv' value=Sửa>" ."<input style=' background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;border:2px solid black;font-size:13px;' type=submit name='xoatknv' value=Xóa>" ."</td>";
                        echo "</tr>";
                        echo "</form>";
                    }
                }
                echo "</table>";
                
            }
            //tai khoan benh nhan
            if(isset($_POST['benhnhan'])||isset($_GET['taikhoanbn'])|| $tk1=='benhnhan')
            {
                
                $truyvan="SELECT * FROM taikhoan";
                $lienket=mysqli_query($CONN,$truyvan);
                if(mysqli_num_rows($lienket)>0)
                {
                     //Them tai khoan 
                     echo "<button id='themtkbs'>Thêm tài khoản</button>";
                     echo "<div id='p3'></div>";
                     echo "<div id='p2'></div>";
                     if(isset($_GET['taikhoanbn']))
                     {
                         $tk=$_GET['taikhoanbn'];
                         if($tk=='sai')
                             echo "<h3 style=' margin-left:42%;color:red;'> Đã tồn tại tên tài khoản này! </h3>";
                         if($tk=='dung')
                             echo "<h3 style=' margin-left:44%;color:red;'> Thêm thành công ! </h3>";
                         if($tk=='chuatontai')
                             echo "<h3 style=' margin-left:42%;color:red;'> Chưa tồn tại bệnh nhân này! </h3>";
                         
                     }
                     echo "<script>document.getElementById('themtkbs').addEventListener('click', ttk);";
                     echo "function ttk(){macdinh();document.getElementById('p2').innerHTML = '<button id=p5 class=bt>Thoát</button><hr><br><form class=form1 action=sua.php?tentk=".$tentk." method=POST><label>Tên tài khoản:</label><br><input  type=text name=ten value=><label>Tên mật khẩu:</label><input type=text name=mk value=><br><input type=submit name=themtkbn value=Thêm tai khoan></form>';macdinh2();document.getElementById('p5').addEventListener('click', pp5);}";
                     echo "function macdinh(){document.getElementById('p2').style.display = 'block';document.getElementById('p2').innerHTML = 'phap';document.getElementById('p2').style.width = '40%';document.getElementById('p2').style.height = '400px'; document.getElementById('p2').style.position = 'fixed'; document.getElementById('p2').style.background = 'white';document.getElementById('p2').style.top= '20%';document.getElementById('p2').style.left= '30%';}";
                     echo "function macdinh2(){document.getElementById('p3').style.display = 'block';document.getElementById('p3').style.background = 'black';document.getElementById('p3').style.width = '100%'; document.getElementById('p3').style.height = '700px';document.getElementById('p3').style.position = 'fixed';document.getElementById('p3').style.top = '0px';document.getElementById('p3').style.opacity = '0.7';document.getElementById('p2').style.zindex = '2';document.getElementById('p3').style.zindex = '1';}";
                     echo "function pp5() {document.getElementById('p2').style.display = 'none';document.getElementById('p3').style.display = 'none';}";
                     echo "</script>";
                     echo "<table class='bang'>";
                     echo "<th style='width:150px;'>STT</th>";
                     echo "<th style='width:300px;'>Họ tên</th>";
                     echo "<th style='width:300px;'>Tên tài khoản" ."<br>(Mặc định là mã bác sĩ)</th>";
                     echo "<th style='width:300px;'>Mật khẩu</th>";
                     echo "<th style='width:180px;'>Thao tác</th>";
 
                    echo "<h1 style=' margin:1% 0px 0px 40%;'>Tài khoản bệnh nhân</h1>";
                    $i=0;
                    while($row=mysqli_fetch_assoc($lienket))
                    {
                        $i++;
                        $truyvan1="SELECT*FROM hosobenhnhan WHERE mabn='$row[tentk]'";
                        $lienket1=mysqli_query($CONN,$truyvan1);
                        $row1=mysqli_fetch_assoc($lienket1);
                        echo "<form action='sua.php?tentk=".$tentk."' method='POST'>";
                        echo "<tr>";
                        echo "<td style='background-color:#f2f2f2;'>" .$i ."</td>";
                        echo "<td style='background-color:rgb(150, 200, 30);'>" .$row1['hoten'] ."</td>";
                        echo "<td style='background-color:pink;'>" ."<input type='text' name='ten' value='$row[tentk]'" ."</td>";
                        echo "<td style='background-color:pink;'>"."<input type='text' name='mk' value='$row[matkhau]'" ."</td>";
                        echo "<td style='background-color:#f2f2f2;'>" ."<input style=' background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:1%;' type=submit name='suatkbn' value=Sửa>" ."<input style=' background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;border:2px solid black;font-size:13px;' type=submit name='xoatkbn' value=Xóa>" ."</td>";
                        echo "</tr>";
                        echo "</form>";
                    }
                }
                echo "</table>";
                
            }
           exit;
        }
    ?>
    <div class="div4">
    <h2 style="text-align:center;">Tài khoản</h2><hr style="margin-bottom:10%;">
        <form method="POST">
            <input  type="radio" name="bacsi" ><label>Bác sĩ</label><br>
            <input  type="radio" name="nhanvien" ><label>Nhân viên</label><br>
            <input  type="radio" name="benhnhan" ><label>Bệnh nhân</label><br>
            <input style="background-color:rgb(37, 158, 37);color:white;padding:5px 15px;margin:25px 0px 0px 43%;" type="submit" name="loctim" value="Lọc tìm">
           </form>
    </div>    
</body>
</html>