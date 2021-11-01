<html>
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
            position:absolute;
            top:18%;
            left:80%;
    }
    .div2form input{
            padding:5px;
    }
    .div3{
        width:90%;
        height:1000px;
        background-color:#f9f9f9;
        margin-left:5%;
        margin-top:1%;
        border:1px solid #ccc;
    }
    .bang{
        margin:1% 0px 0px 5%;
    }
    .bang,.bang th,.bang td,.bang1 {
            border:2px solid #ccc;
            border-collapse: collapse;
                     
    } 
    .bang tr{
            border-bottom:2px solid #ccc;
            border-collapse: collapse;
                     
    }
    
    
    .bang th, .bang td {
            padding:8px 15px;
    }
    .bang input[type=text]{
        width:200px;
        text-align:center;
        border:none;
        outline:none;
        background-color:#ddd;
        font-size:18px;
    }
    .bang1 input[type=text]{
        width:90px;
        text-align:center;
        border:none;
        background-color:white;
        outline:none;
        font-size:14px;
    }
    .bang1 td,.bang1 th{
        border:none;
        background-color:white;

    }
    .div4{
        height:8%;
        width:100%;
        background-color:white;
    }
    .div4 input{
        padding:8px 17px;
        background-color:green;
        color:white;
        font-size:20px;
        border:2px solid #ccc;
    }
    .div4 input:hover{
        color:green;
        background-color:#f9f9f9;
        border:1px solid rgb(37, 158, 37);}
    .div5{
        margin:5px;
        width:20%;
        height:300px;
        background-color:white;    
        float:left;
        margin-top:1%;
        margin-left:1%;
    }
    .bt{
        width:100%;
        padding:7px;
        background-color:rgb(37, 158, 37);
        border:1px solid #f2f2f2;
        font-size:15px;
        color:white;
        font-weight:bold;

    }
    .bt:hover{
        color:white;
        background-color:rgb(173, 75, 75);
    }
    #p2{
        height:600px;background-color:#f2f2f2;width:75%;border:1px solid #f9f9f9;position:absolute;left:23%;top:26%;
    }
    .bangnhomthuoc{
        position:absolute;top:210px;left:24%;
    }
    .bangnhomthuoc,.bangnhomthuoc td,.bangnhomthuoc th{
            border:2px solid #ccc;
            border-collapse: collapse;
                     
        }
    .bangnhomthuoc input[type=text],.bangnhomthuoc textarea,.bangnhomthuoc select{
        text-align:center; 
        border:none;
        outline:none;
        background-color:#f9f9f9;
        font-family:arial;
    }
    .bangnhomthuoc tr{background-color:#f9f9f9}
    .bangnhomthuoc th {
        background-color: rgb(173, 75, 75);
        color: white;
        padding:14px 7px;
    }
</style>
<body style="font-family:arial;">
    <?php include("GDQL_admin.php") ; 
        $CONN = new mysqli('localhost','root','','qlpknk');
        mysqli_query($CONN,'SET NAMES UTF8');
     ?>
    <div class="div2">
        <p style="margin-left:1%;">Thuốc >> <span style="color:blue;">Hóa đơn</span> </p>
    </div>
    <div class=div4>
        <form method=POST>
            <input style="margin:1% 0px 0px 1%;" type="submit" name='hoadon' value='Hóa đơn'>
            <input type="submit" name='nhomthuoc' value='Nhóm thuốc'>
        </form>
    </div>
    <?php 
    //===Nhóm thuốc===
        if(isset($_POST['suathuoc'])||isset($_POST['xoathuoc'])||isset($_POST['suathuocks'])||isset($_POST['suathuocgd'])||isset($_POST['suathuocnt'])||isset($_POST['suathuockv'])||isset($_POST['suathuockvr'])||isset($_POST['suathuoctb'])||isset($_POST['suathuocceb'])||isset($_POST['suathuocgs'])||isset($_POST['xoathuocks'])||isset($_POST['xoathuocgd'])||isset($_POST['xoathuocnt'])||isset($_POST['xoathuockv'])||isset($_POST['xoathuockvr'])||isset($_POST['xoathuoctb'])||isset($_POST['xoathuocceb'])||isset($_POST['xoathuocgs'])||isset($_POST['nhomthuoc'])||isset($_POST['loctim'])||isset($_POST['khangsinh'])||isset($_POST['giamdau'])||isset($_POST['nhiemtrung'])||isset($_POST['khangviem'])||isset($_POST['khangviruss'])||isset($_POST['thuocboi'])||isset($_POST['chongebuot'])||isset($_POST['giamsung'])||isset($_GET['khangsinh'])||isset($_GET['giamdau'])||isset($_GET['nhiemtrung'])||isset($_GET['khangviem'])||isset($_GET['khangviruss'])||isset($_GET['thuocboi'])||isset($_GET['chongebuot'])||isset($_GET['giamsung']))
        {
            //Sửa và xóa thuốc
                if(isset($_POST['suathuocks'])||isset($_POST['suathuocgd'])||isset($_POST['suathuocnt'])||isset($_POST['suathuockv'])||isset($_POST['suathuockvr'])||isset($_POST['suathuoctb'])||isset($_POST['suathuocceb'])||isset($_POST['suathuocgs'])||isset($_POST['xoathuocks'])||isset($_POST['xoathuocgd'])||isset($_POST['xoathuocnt'])||isset($_POST['xoathuockv'])||isset($_POST['xoathuockvr'])||isset($_POST['xoathuoctb'])||isset($_POST['xoathuocceb'])||isset($_POST['xoathuocgs']))
                {
                    if(isset($_POST['mathuoc']))
                    {
                        $mathuoc=$_POST['mathuoc'];
                        $tenthuoc=$_POST['tenthuoc'];
                        $donvi=$_POST['donvi'];
                        $soluong=$_POST['soluong'];
                        $gia=$_POST['gia'];
                        $cachdung=$_POST['cachdung'];
                        $nhomthuoc=$_POST['nhomthuoc'];
                        if(isset($_POST['suathuocks'])||isset($_POST['suathuocgd'])||isset($_POST['suathuocnt'])||isset($_POST['suathuockv'])||isset($_POST['suathuockvr'])||isset($_POST['suathuoctb'])||isset($_POST['suathuocceb'])||isset($_POST['suathuocgs']))
                        {
                            $truyvan1="UPDATE thuoc SET tenthuoc='$tenthuoc', donvi='$donvi',soluong='$soluong',gia='$gia',cachdung='$cachdung',nhomthuoc='$nhomthuoc' WHERE mathuoc='$mathuoc'";
                            $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                        }
                        if(isset($_POST['xoathuocks'])||isset($_POST['xoathuocgd'])||isset($_POST['xoathuocnt'])||isset($_POST['xoathuockv'])||isset($_POST['xoathuockvr'])||isset($_POST['xoathuoctb'])||isset($_POST['xoathuocceb'])||isset($_POST['xoathuocgs']))
                        {
                            $truyvan1="DELETE FROM thuoc WHERE mathuoc='$mathuoc'";
                            $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                        }
                    }
                }

            //bang danh sach ten nhom thuoc
                echo "<form class='div2form' method='POST'>";
                    echo "<input style='width:170px;' type='text' name='tenthuoc' placeholder='Nhập tên thuốc'>";
                    echo "<input style='background-color:rgb(37, 158, 37);color:white;' type='submit' name='loctim' value='Lọc tìm'>";
                echo "</form>";
                echo "<div class='div5'>";
                echo "<h3 style='text-align:center;color:green;'>Danh sách thuốc</h3>";
                echo "<form method='POST'>    ";   
                    echo "<input id='khang' class='bt' type='submit' name='khangsinh' value='khang sinh'>";
                    echo "<input class='bt' type='submit' name='giamdau' value='Giam dau'>";
                    echo "<input class='bt'  type='submit' name='nhiemtrung'  value='nhiem trung'>";
                    echo "<input class='bt' type='submit' name='khangviem' value='Kháng viêm'>";
                    echo "<input class='bt' type='submit' name='khangviruss' value='Kháng viruss'>";
                    echo "<input class='bt' type='submit' name='thuocboi' value='Thuốc bôi'>";
                    echo "<input class='bt' type='submit' name='chongebuot' value='Chống ê buốt'>";
                    echo "<input class='bt' type='submit' name='giamsung' value='Giảm sưng'>";
                echo "</form> ";
                echo "</div>";
                echo "<div id='p2'></div>";
            //Thêm mới thuốc
                $err1=$err2=$err3=$err4=$err5=$err6='';
                if(isset($_POST['them']) || (isset($_POST['luu'])))
                {    
                    if(isset($_POST['luu']))
                    {
                        $err1=$_POST['tenthuoc'];
                        $err2=$_POST['donvi'];
                        $err3=$_POST['gia'];
                        $err4=$_POST['cachdung'];
                        $err5=$_POST['soluong'];
                        $err6=$_POST['loaithuoc'];
                        if(!empty($err1&&$err2&&$err3&&$err4&&$err5&&$err6))
                        {
                            $truyvan1="INSERT INTO thuoc(tenthuoc,donvi,gia,cachdung,soluong,nhomthuoc) values('$err1','$err2','$err3','$err4','$err5','$err6')";
                            $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                        }
                        else
                            echo "<h3 style='position:absolute;top:28%; left:45%;color:red;'> Nhập vào đầy đủ thông tin </h3>";
                    }
                        echo "<table class='bangnhomthuoc' style='position:absolute;top:40%;left:23%;'><tr><th style='width:60px;'>Tên thuốc</th><th>Đơn vị</th><th>Gía thuốc</th><th style='width:50px;'>Cách dùng</th><th>Số lượng</th><th>Loại thuốc</th><th></th></tr>";
                            echo "<form method=POST>";
                            echo "<tr>";
                            echo "<td><input style='width:190px;' type=text name='tenthuoc' value='$err1'</td>";
                            echo "<td><input style='width:90px;' type=text name='donvi' value='$err2'</td>";
                            echo "<td><input style='width:120px;' type=text name='gia' value='$err3'</td>";
                            echo "<td><textarea name='cachdung' style=' overflow-y:scroll;font-family:arial;' rows='3' cols='28'>$err4</textarea></td>";
                            echo "<td><input style='width:90px;' type=text name='soluong' value='$err5'</td>";
                            echo "<td><select name='loaithuoc' value='$err6'><option value='Kháng sinh'>Kháng sinh</option><option value='Giảm đau'>Giảm đau</option><option value='Nhiễm trùng' selected>Nhiễm trùng</option><option value='Kháng viêm'>Kháng viêm</option><option value='Kháng viruss'>Kháng viruss</option><option value='Thuốc bôi'>Thuốc bôi</option><option value='Chống ê buốt'>Chống ê buốt</option><option value='Giảm sưng'>Giảm sưng</option></select>";
                            echo "<td><input style=' background-color:rgb(173, 75, 75);padding:5px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='luu' value=Lưu></tr></form>" ;                                                               
                        //echo "<td><input style=' background-color:rgb(173, 75, 75);padding:5px ;color:white;border:2px solid #ccc;font-size:13px;position:absolute;top:55%;left:53%;' type=submit name='luu' value=Lưu></tr></form>" ;                                                               

                        exit;

                }
            //hien thuoc
                if(isset($_POST['khangsinh'])||isset($_POST['suathuocks']))
                {
                    echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>Mã thuốc</th><th style='width:60px;'>Tên thuốc</th><th>Đơn vị</th><th>Gía thuốc</th><th style='width:50px;'>Cách dùng</th><th>Số lượng</th><th>Nhóm thuốc</th><th style='width:50px;'>Tổng bán</th><th style='width:90px;'>Tổng tiền</th><th>Thao tác</th></tr>";
                    $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kháng sinh'";
                        $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                        while($row1=mysqli_fetch_assoc($lienket1))
                        {
                            echo "<form method=POST >";
                            echo "<tr>";
                            echo "<td ><input type=checkbox name=mathuoc value='$row1[mathuoc]'></td>";
                            echo "<td><input style='width:70px;' type=text name='mathuoc1' value='TH0000$row1[mathuoc]'</td>";
                            echo "<td><input style='width:100px;' type=text name='tenthuoc' value='$row1[tenthuoc]'</td>";
                            echo "<td><input style='width:50px;' type=text name='donvi' value='$row1[donvi]'</td>";
                            echo "<td><input style='width:70px;' type=text name='gia' value='$row1[gia]'</td>";
                            echo "<td><textarea name='cachdung' style=' overflow-y:scroll;' rows='3' cols='20'>$row1[cachdung]</textarea></td>";
                            echo "<td><input style='width:70px;' type=text name='soluong' value='$row1[soluong]'</td>";
                            echo "<td><input style='width:90px;' type=text name='nhomthuoc' value='$row1[nhomthuoc]'</td>";
                            $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                            $lienket=mysqli_query($CONN,$truyvan);
                            $row=mysqli_fetch_assoc($lienket);
                            echo "<td><input style='width:70px;' type=text name='dem' value='$row[dem]'</td>";
                            $tong=$row['dem']*$row1['gia'];
                            $tong1 = number_format($tong);
                            echo "<td><input style='width:90px;' type=text name='tong' value='$tong1'</td>";
                            echo "<td style='width:82px;'><input type=submit name=suathuocks value=Sửa><input type=submit name=xoathuocks value=Xóa></td></tr></form>";

                        }
                        $_GET['khangsinh']='';
                        exit;
                }
                if(isset($_POST['giamdau'])||isset($_POST['suathuocgd']))
                {
                    echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>Mã thuốc</th><th style='width:60px;'>Tên thuốc</th><th>Đơn vị</th><th>Gía thuốc</th><th style='width:50px;'>Cách dùng</th><th>Số lượng</th><th>Nhóm thuốc</th><th style='width:50px;'>Tổng bán</th><th style='width:90px;'>Tổng tiền</th><th>Thao tác</th></tr>";
                    $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Giảm đau'";
                        $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                        while($row1=mysqli_fetch_assoc($lienket1))
                        {
                            echo "<form method=POST >";
                            echo "<tr>";
                            echo "<td ><input type=checkbox name=mathuoc value='$row1[mathuoc]'></td>";
                            echo "<td><input style='width:70px;' type=text name='mathuoc1' value='TH0000$row1[mathuoc]'></td>";
                            echo "<td><input style='width:100px;' type=text name='tenthuoc' value='$row1[tenthuoc]'></td>";
                            echo "<td><input style='width:50px;' type=text name='donvi' value='$row1[donvi]'></td>";
                            echo "<td><input style='width:70px;' type=text name='gia' value='$row1[gia]'></td>";
                            echo "<td><textarea name='cachdung' style=' overflow-y:scroll;' rows='3' cols='20'>$row1[cachdung]</textarea></td>";
                            echo "<td><input style='width:70px;' type=text name='soluong' value='$row1[soluong]'></td>";
                            echo "<td><input style='width:90px;' type=text name='nhomthuoc' value='$row1[nhomthuoc]'></td>";
                            $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                            $lienket=mysqli_query($CONN,$truyvan);
                            $row=mysqli_fetch_assoc($lienket);
                            echo "<td><input style='width:70px;' type=text name='dem' value='$row[dem]'></td>";
                            $tong=$row['dem']*$row1['gia'];
                            $tong1 = number_format($tong);
                            echo "<td><input style='width:90px;' type=text name='tong' value='$tong1'></td>";
                            echo "<td style='width:82px;'><input type=submit name=suathuocgd value=Sửa><input type=submit name=xoathuocgd value=Xóa></td></tr></form>";

                        }
                        exit;
                }
                if(isset($_POST['nhiemtrung'])||isset($_POST['suathuocnt']))
                {
                    echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>Mã thuốc</th><th style='width:60px;'>Tên thuốc</th><th>Đơn vị</th><th>Gía thuốc</th><th style='width:50px;'>Cách dùng</th><th>Số lượng</th><th>Nhóm thuốc</th><th style='width:50px;'>Tổng bán</th><th style='width:90px;'>Tổng tiền</th><th>Thao tác</th></tr>";
                    $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Nhiễm trùng'";
                        $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                        while($row1=mysqli_fetch_assoc($lienket1))
                        {
                            echo "<form method=POST >";
                            echo "<tr>";
                            echo "<td ><input type=checkbox name=mathuoc value='$row1[mathuoc]'></td>";
                            echo "<td><input style='width:70px;' type=text name='mathuoc1' value='TH0000$row1[mathuoc]'</td>";
                            echo "<td><input style='width:100px;' type=text name='tenthuoc' value='$row1[tenthuoc]'</td>";
                            echo "<td><input style='width:50px;' type=text name='donvi' value='$row1[donvi]'</td>";
                            echo "<td><input style='width:70px;' type=text name='gia' value='$row1[gia]'</td>";
                            echo "<td><textarea name='cachdung' style=' overflow-y:scroll;' rows='3' cols='20'>$row1[cachdung]</textarea></td>";
                            echo "<td><input style='width:70px;' type=text name='soluong' value='$row1[soluong]'</td>";
                            echo "<td><input style='width:90px;' type=text name='nhomthuoc' value='$row1[nhomthuoc]'</td>";
                            $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                            $lienket=mysqli_query($CONN,$truyvan);
                            $row=mysqli_fetch_assoc($lienket);
                            echo "<td><input style='width:70px;' type=text name='dem' value='$row[dem]'</td>";
                            $tong=$row['dem']*$row1['gia'];
                            $tong1 = number_format($tong);
                            echo "<td><input style='width:90px;' type=text name='tong' value='$tong1'</td>";
                            echo "<td style='width:82px;'><input type=submit name=suathuocnt value=Sửa><input type=submit name=xoathuocnt value=Xóa></td></tr></form>";

                        }
                        exit;
                }
                if(isset($_POST['khangviem'])||isset($_POST['suathuockv']))
                {
                    echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>Mã thuốc</th><th style='width:60px;'>Tên thuốc</th><th>Đơn vị</th><th>Gía thuốc</th><th style='width:50px;'>Cách dùng</th><th>Số lượng</th><th>Nhóm thuốc</th><th style='width:50px;'>Tổng bán</th><th style='width:90px;'>Tổng tiền</th><th>Thao tác</th></tr>";
                    $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kháng viêm'";
                        $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                        while($row1=mysqli_fetch_assoc($lienket1))
                        {
                            echo "<form method=POST >";
                            echo "<tr>";
                            echo "<td ><input type=checkbox name=mathuoc value='$row1[mathuoc]'></td>";
                            echo "<td><input style='width:70px;' type=text name='mathuoc1' value='TH0000$row1[mathuoc]'</td>";
                            echo "<td><input style='width:100px;' type=text name='tenthuoc' value='$row1[tenthuoc]'</td>";
                            echo "<td><input style='width:50px;' type=text name='donvi' value='$row1[donvi]'</td>";
                            echo "<td><input style='width:70px;' type=text name='gia' value='$row1[gia]'</td>";
                            echo "<td><textarea name='cachdung' style=' overflow-y:scroll;' rows='3' cols='20'>$row1[cachdung]</textarea></td>";
                            echo "<td><input style='width:70px;' type=text name='soluong' value='$row1[soluong]'</td>";
                            echo "<td><input style='width:90px;' type=text name='nhomthuoc' value='$row1[nhomthuoc]'</td>";
                            $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                            $lienket=mysqli_query($CONN,$truyvan);
                            $row=mysqli_fetch_assoc($lienket);
                            echo "<td><input style='width:70px;' type=text name='dem' value='$row[dem]'</td>";
                            $tong=$row['dem']*$row1['gia'];
                            $tong1 = number_format($tong);
                            echo "<td><input style='width:90px;' type=text name='tong' value='$tong1'</td>";
                            echo "<td style='width:82px;'><input type=submit name=suathuockv value=Sửa><input type=submit name=xoathuockv value=Xóa></td></tr></form>";

                        }
                        exit;
                }
                if(isset($_POST['khangviruss'])||isset($_POST['suathuockvr']))
                {
                    echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>Mã thuốc</th><th style='width:60px;'>Tên thuốc</th><th>Đơn vị</th><th>Gía thuốc</th><th style='width:50px;'>Cách dùng</th><th>Số lượng</th><th>Nhóm thuốc</th><th style='width:50px;'>Tổng bán</th><th style='width:90px;'>Tổng tiền</th><th>Thao tác</th></tr>";
                    $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kháng viruss'";
                        $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                        while($row1=mysqli_fetch_assoc($lienket1))
                        {
                            echo "<form method=POST >";
                            echo "<tr>";
                            echo "<td ><input type=checkbox name=mathuoc value='$row1[mathuoc]'></td>";
                            echo "<td><input style='width:70px;' type=text name='mathuoc1' value='TH0000$row1[mathuoc]'</td>";
                            echo "<td><input style='width:100px;' type=text name='tenthuoc' value='$row1[tenthuoc]'</td>";
                            echo "<td><input style='width:50px;' type=text name='donvi' value='$row1[donvi]'</td>";
                            echo "<td><input style='width:70px;' type=text name='gia' value='$row1[gia]'</td>";
                            echo "<td><textarea name='cachdung' style=' overflow-y:scroll;' rows='3' cols='20'>$row1[cachdung]</textarea></td>";
                            echo "<td><input style='width:70px;' type=text name='soluong' value='$row1[soluong]'</td>";
                            echo "<td><input style='width:90px;' type=text name='nhomthuoc' value='$row1[nhomthuoc]'</td>";
                            $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                            $lienket=mysqli_query($CONN,$truyvan);
                            $row=mysqli_fetch_assoc($lienket);
                            echo "<td><input style='width:70px;' type=text name='dem' value='$row[dem]'</td>";
                            $tong=$row['dem']*$row1['gia'];
                            $tong1 = number_format($tong);
                            echo "<td><input style='width:90px;' type=text name='tong' value='$tong1'</td>";
                            echo "<td style='width:82px;'><input type=submit name=suathuockvr value=Sửa><input type=submit name=xoathuockvr value=Xóa></td></tr></form>";

                        }
                        exit;
                }
                if(isset($_POST['thuocboi'])||isset($_POST['suathuoctb']))
                {
                    echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>Mã thuốc</th><th style='width:60px;'>Tên thuốc</th><th>Đơn vị</th><th>Gía thuốc</th><th style='width:50px;'>Cách dùng</th><th>Số lượng</th><th>Nhóm thuốc</th><th style='width:50px;'>Tổng bán</th><th style='width:90px;'>Tổng tiền</th><th>Thao tác</th></tr>";
                    $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Thuốc bôi'";
                        $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                        while($row1=mysqli_fetch_assoc($lienket1))
                        {
                            echo "<form method=POST >";
                            echo "<tr>";
                            echo "<td ><input type=checkbox name=mathuoc value='$row1[mathuoc]'></td>";
                            echo "<td><input style='width:70px;' type=text name='mathuoc1' value='TH0000$row1[mathuoc]'</td>";
                            echo "<td><input style='width:100px;' type=text name='tenthuoc' value='$row1[tenthuoc]'</td>";
                            echo "<td><input style='width:50px;' type=text name='donvi' value='$row1[donvi]'</td>";
                            echo "<td><input style='width:70px;' type=text name='gia' value='$row1[gia]'</td>";
                            echo "<td><textarea name='cachdung' style=' overflow-y:scroll;' rows='3' cols='20'>$row1[cachdung]</textarea></td>";
                            echo "<td><input style='width:70px;' type=text name='soluong' value='$row1[soluong]'</td>";
                            echo "<td><input style='width:90px;' type=text name='nhomthuoc' value='$row1[nhomthuoc]'</td>";
                            $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                            $lienket=mysqli_query($CONN,$truyvan);
                            $row=mysqli_fetch_assoc($lienket);
                            echo "<td><input style='width:70px;' type=text name='dem' value='$row[dem]'</td>";
                            $tong=$row['dem']*$row1['gia'];
                            $tong1 = number_format($tong);
                            echo "<td><input style='width:90px;' type=text name='tong' value='$tong1'</td>";
                            echo "<td style='width:82px;'><input type=submit name=suathuoctb value=Sửa><input type=submit name=xoathuoctb value=Xóa></td></tr></form>";

                        }
                        exit;
                }
                if(isset($_POST['chongebuot'])||isset($_POST['suathuocceb']))
                {
                    echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>Mã thuốc</th><th style='width:60px;'>Tên thuốc</th><th>Đơn vị</th><th>Gía thuốc</th><th style='width:50px;'>Cách dùng</th><th>Số lượng</th><th>Nhóm thuốc</th><th style='width:50px;'>Tổng bán</th><th style='width:90px;'>Tổng tiền</th><th>Thao tác</th></tr>";
                    $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Chống ê buốt'";
                        $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                        while($row1=mysqli_fetch_assoc($lienket1))
                        {
                            echo "<form method=POST >";
                            echo "<tr>";
                            echo "<td ><input type=checkbox name=mathuoc value='$row1[mathuoc]'></td>";
                            echo "<td><input style='width:70px;' type=text name='mathuoc1' value='TH0000$row1[mathuoc]'</td>";
                            echo "<td><input style='width:100px;' type=text name='tenthuoc' value='$row1[tenthuoc]'</td>";
                            echo "<td><input style='width:50px;' type=text name='donvi' value='$row1[donvi]'</td>";
                            echo "<td><input style='width:70px;' type=text name='gia' value='$row1[gia]'</td>";
                            echo "<td><textarea name='cachdung' style=' overflow-y:scroll;' rows='3' cols='20'>$row1[cachdung]</textarea></td>";
                            echo "<td><input style='width:70px;' type=text name='soluong' value='$row1[soluong]'</td>";
                            echo "<td><input style='width:90px;' type=text name='nhomthuoc' value='$row1[nhomthuoc]'</td>";
                            $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                            $lienket=mysqli_query($CONN,$truyvan);
                            $row=mysqli_fetch_assoc($lienket);
                            echo "<td><input style='width:70px;' type=text name='dem' value='$row[dem]'</td>";
                            $tong=$row['dem']*$row1['gia'];
                            $tong1 = number_format($tong);
                            echo "<td><input style='width:90px;' type=text name='tong' value='$tong1'</td>";
                            echo "<td style='width:82px;'><input type=submit name=suathuocceb value=Sửa><input type=submit name=xoathuocceb value=Xóa></td></tr></form>";

                        }
                        exit;
                }
                if(isset($_POST['giamsung'])||isset($_POST['suathuocgs']))
                {
                    echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>Mã thuốc</th><th style='width:60px;'>Tên thuốc</th><th>Đơn vị</th><th>Gía thuốc</th><th style='width:50px;'>Cách dùng</th><th>Số lượng</th><th>Nhóm thuốc</th><th style='width:50px;'>Tổng bán</th><th style='width:90px;'>Tổng tiền</th><th>Thao tác</th></tr>";
                    $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Giảm sưng'";
                        $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                        while($row1=mysqli_fetch_assoc($lienket1))
                        {
                            echo "<form method=POST >";
                            echo "<tr>";
                            echo "<td ><input type=checkbox name=mathuoc value='$row1[mathuoc]'></td>";
                            echo "<td><input style='width:70px;' type=text name='mathuoc1' value='TH0000$row1[mathuoc]'</td>";
                            echo "<td><input style='width:100px;' type=text name='tenthuoc' value='$row1[tenthuoc]'</td>";
                            echo "<td><input style='width:50px;' type=text name='donvi' value='$row1[donvi]'</td>";
                            echo "<td><input style='width:70px;' type=text name='gia' value='$row1[gia]'</td>";
                            echo "<td><textarea name='cachdung' style=' overflow-y:scroll;' rows='3' cols='20'>$row1[cachdung]</textarea></td>";
                            echo "<td><input style='width:70px;' type=text name='soluong' value='$row1[soluong]'</td>";
                            echo "<td><input style='width:90px;' type=text name='nhomthuoc' value='$row1[nhomthuoc]'</td>";
                            $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                            $lienket=mysqli_query($CONN,$truyvan);
                            $row=mysqli_fetch_assoc($lienket);
                            echo "<td><input style='width:70px;' type=text name='dem' value='$row[dem]'</td>";
                            $tong=$row['dem']*$row1['gia'];
                            $tong1 = number_format($tong);
                            echo "<td><input style='width:90px;' type=text name='tong' value='$tong1'</td>";
                            echo "<td style='width:82px;'><input type=submit name=suathuocgs value=Sửa><input type=submit name=xoathuocgs value=Xóa></td></tr></form>";

                        }   exit;
                }

            //Khi lọc tìm
                if(isset($_POST['loctim'])||isset($_POST['suathuoc'])||isset($_POST['xoathuoc']))
                {
                    $tenthuoc=$_POST['tenthuoc'];
                    if(!empty($_POST['tenthuoc']))
                    {
                    $truyvan="SELECT*FROM thuoc WHERE tenthuoc='$tenthuoc'";
                    $lienket=mysqli_query($CONN,$truyvan);
                    if(mysqli_num_rows($lienket)>0)
                    {
                        while($row1=mysqli_fetch_assoc($lienket))
                        {
                            echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>Mã thuốc</th><th style='width:60px;'>Tên thuốc</th><th>Đơn vị</th><th>Gía thuốc</th><th style='width:50px;'>Cách dùng</th><th>Số lượng</th><th>Nhóm thuốc</th><th style='width:50px;'>Tổng bán</th><th style='width:90px;'>Tổng tiền</th><th>Thao tác</th></tr>";
                            echo "<form method=POST >";
                            echo "<tr>";
                            echo "<td ><input type=checkbox name=mathuoc value='$row1[mathuoc]'></td>";
                                echo "<td><input style='width:70px;' type=text name='mathuoc1' value='TH0000$row1[mathuoc]'</td>";
                                echo "<td><input style='width:100px;' type=text name='tenthuoc' value='$row1[tenthuoc]'</td>";
                                echo "<td><input style='width:50px;' type=text name='donvi' value='$row1[donvi]'</td>";
                                echo "<td><input style='width:70px;' type=text name='gia' value='$row1[gia]'</td>";
                                echo "<td><textarea name='cachdung' style=' overflow-y:scroll;' rows='3' cols='20'>$row1[cachdung]</textarea></td>";
                                echo "<td><input style='width:70px;' type=text name='soluong' value='$row1[soluong]'</td>";
                                echo "<td><input style='width:90px;' type=text name='nhomthuoc' value='$row1[nhomthuoc]'</td>";
                                $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                                $lienket=mysqli_query($CONN,$truyvan);
                                $row=mysqli_fetch_assoc($lienket);
                                echo "<td><input style='width:70px;' type=text name='dem' value='$row[dem]'</td>";
                                $tong=$row['dem']*$row1['gia'];
                                $tong1 = number_format($tong);
                                echo "<td><input style='width:90px;' type=text name='tong' value='$tong1'</td>";
                                echo "<td style='width:82px;'><input type=submit name=suathuoc value=Sửa><input type=submit name=xoathuoc value=Xóa></td></tr></form>";

                            }
                            exit;
                    }
                    else
                        echo "<h3 style='position:absolute;top:28%; left:45%;color:red;'> Không tồn tại loại thuốc này </h3>";
                    }
                else
                    echo "<h3 style='position:absolute;top:28%; left:45%;color:red;'> Nhập vào đầy đủ thông tin </h3>";
                    exit;
                }
        echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>Mã thuốc</th><th style='width:60px;'>Tên thuốc</th><th>Đơn vị</th><th>Gía thuốc</th><th style='width:50px;'>Cách dùng</th><th>Số lượng</th><th>Nhóm thuốc</th><th style='width:50px;'>Tổng bán</th><th style='width:90px;'>Tổng tiền</th><th>Thao tác</th></tr>";
              $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kháng sinh'";
                  $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                  while($row1=mysqli_fetch_assoc($lienket1))
                  {
                     echo "<form method=POST >";
                     echo "<tr>";
                     echo "<td ><input type=checkbox name='mathuoc' value='$row1[mathuoc]'></td>";
                      echo "<td><input style='width:70px;' type=text name='mathuoc1' value='TH0000$row1[mathuoc]'</td>";
                      echo "<td><input style='width:100px;' type=text name='tenthuoc' value='$row1[tenthuoc]'</td>";
                      echo "<td><input style='width:50px;' type=text name='donvi' value='$row1[donvi]'</td>";
                      echo "<td><input style='width:70px;' type=text name='gia' value='$row1[gia]'</td>";
                      echo "<td><textarea name='cachdung' style=' overflow-y:scroll;' rows='3' cols='20'>$row1[cachdung]</textarea></td>";
                      echo "<td><input style='width:70px;' type=text name='soluong' value='$row1[soluong]'</td>";
                      echo "<td><input style='width:90px;' type=text name='nhomthuoc' value='$row1[nhomthuoc]'</td>";
                      $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                      $lienket=mysqli_query($CONN,$truyvan);
                      $row=mysqli_fetch_assoc($lienket);
                      echo "<td><input style='width:70px;' type=text name='dem' value='$row[dem]'</td>";
                      $tong=$row['dem']*$row1['gia'];
                      $tong1 = number_format($tong);
                      echo "<td><input style='width:90px;' type=text name='tong' value='$tong1'</td>";
                      echo "<td style='width:82px;'><input type=submit name=suathuocks value=Sửa><input type=submit name=xoathuocks value=Xóa></td></tr></form>";
  
                  }
                  exit;
}

    //===tìm kiếm hóa đơn thuốc===
       if(isset($_POST['hoadon'])||isset($_GET['hoadon']))
       {
           echo "<div class='div3'>";
           echo "<table class='bang'>";
           echo "<tr style='background-color:rgb(173, 75, 75);color:white;' ><th>Mã hóa đơn</th><th>Nhà cung cấp</th><th>Người lập</th><th>Ngày lập</th></tr>";
           
               $truyvan1="SELECT * FROM hoadon";
               $lienket1=mysqli_query($CONN,$truyvan1);
               while($row1=mysqli_fetch_array($lienket1))
               {
                   echo "<tr style='background-color:#ddd'>";
                   echo "<td><input  type=text name=mahd value='HD0000$row1[mahd]'></td>";
                   echo "<td><input type=text name=nhacungcap value='Không khai báo'></td>";
                   echo "<td><input type=text name=nguoilap value='Thu ngân'></td>";
                   $ng=$row1['ngay'];
                   $ngay=date('d-m-Y',strtotime($ng));
                   echo "<td><input type=text name=ngay value='$ngay'></td>";
                   echo "</tr>";
                   echo "<tr>";
                   echo "<td colspan='10'>";
                   $truyvan1_1="SELECT * FROM thuoc WHERE mahd='$row1[mahd]'";
                   $lienket1_1=mysqli_query($CONN,$truyvan1_1);
                   if(mysqli_num_rows($lienket1_1)>0)
                   {
                       echo "<table class='bang1' style='margin-left:1%;'>";
                       echo "<tr><th># Mã</th><th>Tên</th><th>Đơn vị</th><th>Số lượng</th><th>Gía</th><th>Cách dùng</th><th>Nhóm thuốc</th><th>Thao tác</th></tr>";
                       while($row1_1=mysqli_fetch_assoc($lienket1_1))
                       {
                           echo "<form method=POST action='sua.php?tentk=$tentk'>";
                           echo "<tr >";
                           echo "<td style='width:140px;'><input type=checkbox name=mathuoc value='$row1_1[mathuoc]'><input type=text name=mathuoc1 value='TH0000$row1_1[mathuoc]'></td>";
                           echo "<td><input type=text name=tenthuoc value='$row1_1[tenthuoc]'></td>";
                           echo "<td><input type=text name=donvi value='$row1_1[donvi]'></td>";
                           echo "<td><input type=text name=soluong value='$row1_1[soluong]'></td>";
                           echo "<td><input type=text name=gia value='$row1_1[gia]'></td>";
                           echo "<td><input type=text name=cachdung value='$row1_1[cachdung]'></td>";
                           echo "<td><input type=text name=nhomthuoc value='$row1_1[nhomthuoc]'></td>";
                           echo "<td style='width:110px;'><input type=submit name=suathuoc value=Sửa><input type=submit name=xoathuoc value=Xóa></td>";
                           echo "</tr>";
                           echo "</form>";
   
                       }
                       echo "</table>";
                   }
                   echo "</td>";
                   echo "</tr>";
                               
               }  
               echo "</table>";
               echo "</div>";
               exit;
       }
   

    ?>
</body>
</html>