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
            top:19%;
            left:73%;
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
        padding:8px 40px;
        background-color:rgb(150, 200, 30);
        color:white;
        font-size:20px;
        border:2px solid #ccc;
    }
    .div5{
        margin:5px;
        width:20%;
        height:300px;
        background-color:white;    
        float:left;
        margin-top:1%;
        margin-left:5%;
    }
    .bt{
        width:100%;
        padding:7px;
        background-color:green;    
        border:1px solid #f2f2f2;
        font-size:15px;
        color:white;
        font-weight:bold;

    }
    .bt:hover{
        color:rgb(173, 75, 75);
        background-color:#f2f2f2;
    }
    #p2{
        height:600px;background-color:#f2f2f2;width:70%;border:1px solid #ccc;float:left;margin-top:73px;
    }
    .bangnhomthuoc{
        position:absolute;top:300px;left:26%;
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
        padding:10px 0px;
    }
</style>
<body style="font-family:arial;">
    <?php include("GDQL_admin.php") ; 
        $CONN = new mysqli('localhost','root','','qlpknk');
        mysqli_query($CONN,'SET NAMES UTF8');
     ?>
    <div class="div2">
        <p style="margin-left:1%;">Thu???c >> <span style="color:blue;">H??a ????n</span> </p>
    </div>
    <div class=div4>
        <form method=POST>
            <input style="margin:1% 0px 0px 5%;" type="submit" name='hoadon' value='H??a ????n'>
            <input type="submit" name='nhomthuoc' value='Nh??m thu???c'>
        </form>
    </div>
    <?php 
    if(isset($_POST['nhomthuoc'])||isset($_POST['loctim'])||isset($_POST['khangsinh'])||isset($_POST['giamdau'])||isset($_POST['nhiemtrung'])||isset($_POST['khangviem'])||isset($_POST['khangviruss'])||isset($_POST['thuocboi'])||isset($_POST['chongebuot'])||isset($_POST['giamsung'])||isset($_GET['khangsinh'])||isset($_GET['giamdau'])||isset($_GET['nhiemtrung'])||isset($_GET['khangviem'])||isset($_GET['khangviruss'])||isset($_GET['thuocboi'])||isset($_GET['chongebuot'])||isset($_GET['giamsung']))
    {
        echo "<form class='div2form' method='POST'>";
            echo "<input style='width:170px;' type='text' name='tenthuoc' placeholder='Nh???p t??n thu???c'>";
            echo "<input style='background-color:rgb(37, 158, 37);color:white;' type='submit' name='loctim' value='L???c t??m'>";
        echo "</form>";
        echo "<div class='div5'>";
        echo "<h3 style='text-align:center;color:green;'>Danh s??ch thu???c</h3>";
        echo "<form method='POST'>    ";   
            echo "<input id='khang' class='bt' type='submit' name='khangsinh' value='khang sinh'>";
            echo "<input class='bt' type='submit' name='giamdau' value='Giam dau'>";
            echo "<input class='bt'  type='submit' name='nhiemtrung'  value='nhiem trung'>";
            echo "<input class='bt' type='submit' name='khangviem' value='Kh??ng vi??m'>";
            echo "<input class='bt' type='submit' name='khangviruss' value='Kh??ng viruss'>";
            echo "<input class='bt' type='submit' name='thuocboi' value='Thu???c b??i'>";
            echo "<input class='bt' type='submit' name='chongebuot' value='Ch???ng ?? bu???t'>";
            echo "<input class='bt' type='submit' name='giamsung' value='Gi???m s??ng'>";
        echo "</form> ";
        echo "</div>";
        echo "<div id='p2'></div>";
        //Th??m m???i thu???c
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
                       echo "<h3 style='position:absolute;top:28%; left:45%;color:red;'> Nh???p v??o ?????y ????? th??ng tin </h3>";
               }
                echo "<table class='bangnhomthuoc' style='position:absolute;top:40%;left:23%;'><tr><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th>Lo???i thu???c</th><th></th></tr>";
                     echo "<form method=POST>";
                    echo "<tr>";
                    echo "<td><input style='width:190px;' type=text name='tenthuoc' value='$err1'</td>";
                    echo "<td><input style='width:90px;' type=text name='donvi' value='$err2'</td>";
                    echo "<td><input style='width:120px;' type=text name='gia' value='$err3'</td>";
                    echo "<td><textarea name='cachdung' style=' overflow-y:scroll;font-family:arial;' rows='3' cols='28'>$err4</textarea></td>";
                    echo "<td><input style='width:90px;' type=text name='soluong' value='$err5'</td>";
                    echo "<td><select name='loaithuoc' value='$err6'><option value='Kh??ng sinh'>Kh??ng sinh</option><option value='Gi???m ??au'>Gi???m ??au</option><option value='Nhi???m tr??ng' selected>Nhi???m tr??ng</option><option value='Kh??ng vi??m'>Kh??ng vi??m</option><option value='Kh??ng viruss'>Kh??ng viruss</option><option value='Thu???c b??i'>Thu???c b??i</option><option value='Ch???ng ?? bu???t'>Ch???ng ?? bu???t</option><option value='Gi???m s??ng'>Gi???m s??ng</option></select>";
                    echo "<td><input style=' background-color:rgb(173, 75, 75);padding:5px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='luu' value=L??u></tr></form>" ;                                                               
                 //echo "<td><input style=' background-color:rgb(173, 75, 75);padding:5px ;color:white;border:2px solid #ccc;font-size:13px;position:absolute;top:55%;left:53%;' type=submit name='luu' value=L??u></tr></form>" ;                                                               

                exit;

        }
         //hien thuoc
         if(isset($_POST['khangsinh']))
         {
             echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th>Nh??m thu???c</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th><th>Thao t??c</th></tr>";
             $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kh??ng sinh'";
                 $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                 while($row1=mysqli_fetch_assoc($lienket1))
                 {
                    echo "<form method=POST action='sua.php?tentk=$tentk&&khangsinh'>";
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
                     echo "<td style='width:82px;'><input type=submit name=suathuoc value=S???a><input type=submit name=xoathuoc value=X??a></td></tr></from>";

                 }
                 $_GET['khangsinh']='';
                 exit;
         }
         if(isset($_POST['giamdau']))
         {
             echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th>Nh??m thu???c</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th><th>Thao t??c</th></tr>";
             $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Gi???m ??au'";
                 $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                 while($row1=mysqli_fetch_assoc($lienket1))
                 {
                    echo "<form method=POST action='sua.php?tentk=$tentk&&giamdau'>";
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
                     echo "<td style='width:82px;'><input type=submit name=suathuoc value=S???a><input type=submit name=xoathuoc value=X??a></td></tr></from>";

                 }
                exit;
         }
         if(isset($_POST['nhiemtrung']))
         {
             echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th>Nh??m thu???c</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th><th>Thao t??c</th></tr>";
             $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Nhi???m tr??ng'";
                 $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                 while($row1=mysqli_fetch_assoc($lienket1))
                 {
                    echo "<form method=POST action='sua.php?tentk=$tentk&&nhiemtrung'>";
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
                     echo "<td style='width:82px;'><input type=submit name=suathuoc value=S???a><input type=submit name=xoathuoc value=X??a></td></tr></from>";

                 }
                 exit;
         }
         if(isset($_POST['khangviem']))
         {
             echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th>Nh??m thu???c</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th><th>Thao t??c</th></tr>";
             $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kh??ng vi??m'";
                 $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                 while($row1=mysqli_fetch_assoc($lienket1))
                 {
                    echo "<form method=POST action='sua.php?tentk=$tentk&&khangviem'>";
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
                     echo "<td style='width:82px;'><input type=submit name=suathuoc value=S???a><input type=submit name=xoathuoc value=X??a></td></tr></from>";

                 }
                 exit;
         }
         if(isset($_POST['khangviruss']))
         {
             echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th>Nh??m thu???c</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th><th>Thao t??c</th></tr>";
             $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kh??ng viruss'";
                 $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                 while($row1=mysqli_fetch_assoc($lienket1))
                 {
                    echo "<form method=POST action='sua.php?tentk=$tentk&&khangviruss'>";
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
                     echo "<td style='width:82px;'><input type=submit name=suathuoc value=S???a><input type=submit name=xoathuoc value=X??a></td></tr></from>";

                 }
                 exit;
         }
         if(isset($_POST['thuocboi']))
         {
             echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th>Nh??m thu???c</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th><th>Thao t??c</th></tr>";
             $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Thu???c b??i'";
                 $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                 while($row1=mysqli_fetch_assoc($lienket1))
                 {
                    echo "<form method=POST action='sua.php?tentk=$tentk&&thuocboi'>";
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
                     echo "<td style='width:82px;'><input type=submit name=suathuoc value=S???a><input type=submit name=xoathuoc value=X??a></td></tr></from>";

                 }
                 exit;
         }
         if(isset($_POST['chongebuot']))
         {
             echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th>Nh??m thu???c</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th><th>Thao t??c</th></tr>";
             $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Ch???ng ?? bu???t'";
                 $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                 while($row1=mysqli_fetch_assoc($lienket1))
                 {
                    echo "<form method=POST action='sua.php?tentk=$tentk&&chongebuot'>";
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
                     echo "<td style='width:82px;'><input type=submit name=suathuoc value=S???a><input type=submit name=xoathuoc value=X??a></td></tr></from>";

                 }
                 exit;
         }
         if(isset($_POST['giamsung']))
         {
             echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th>Nh??m thu???c</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th><th>Thao t??c</th></tr>";
             $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Gi???m s??ng'";
                 $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                 while($row1=mysqli_fetch_assoc($lienket1))
                 {
                    echo "<form method=POST action='sua.php?tentk=$tentk&&giamsung'>";
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
                     echo "<td style='width:82px;'><input type=submit name=suathuoc value=S???a><input type=submit name=xoathuoc value=X??a></td></tr></from>";

                 }   exit;
         }

    //Khi l???c t??m
    if(isset($_POST['loctim']))
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
                echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th>Nh??m thu???c</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th><th>Thao t??c</th></tr>";
                echo "<form method=POST action='sua.php?tentk=$tentk&&nhomthuoc'>";
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
                    echo "<td style='width:82px;'><input type=submit name=suathuoc value=S???a><input type=submit name=xoathuoc value=X??a></td></tr></from>";

                }
                exit;
           }
           else
               echo "<h3 style='position:absolute;top:28%; left:45%;color:red;'> Kh??ng t???n t???i lo???i thu???c n??y </h3>";
        }
       else
           echo "<h3 style='position:absolute;top:28%; left:45%;color:red;'> Nh???p v??o ?????y ????? th??ng tin </h3>";
        exit;
    }
    echo "<table class='bangnhomthuoc' ><tr><th></th><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th>Nh??m thu???c</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th><th>Thao t??c</th></tr>";
              $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kh??ng sinh'";
                  $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                  while($row1=mysqli_fetch_assoc($lienket1))
                  {
                     echo "<form method=POST action='sua.php?tentk=$tentk&&khangsinh'>";
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
                      echo "<td style='width:82px;'><input type=submit name=suathuoc value=S???a><input type=submit name=xoathuoc value=X??a></td></tr></from>";
  
                  }
                  exit;
}

       //===t??m ki???m h??a ????n thu???c===
       if(isset($_POST['hoadon'])||isset($_GET['hoadon']))
       {
           echo "<div class='div3'>";
           echo "<table class='bang'>";
           echo "<tr style='background-color:rgb(173, 75, 75);color:white;' ><th>M?? h??a ????n</th><th>Nh?? cung c???p</th><th>Ng?????i l???p</th><th>Ng??y l???p</th></tr>";
           
               $truyvan1="SELECT * FROM hoadon";
               $lienket1=mysqli_query($CONN,$truyvan1);
               while($row1=mysqli_fetch_array($lienket1))
               {
                   echo "<tr style='background-color:#ddd'>";
                   echo "<td><input  type=text name=mahd value='HD0000$row1[mahd]'></td>";
                   echo "<td><input type=text name=nhacungcap value='Kh??ng khai b??o'></td>";
                   echo "<td><input type=text name=nguoilap value='Thu ng??n'></td>";
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
                       echo "<tr><th># M??</th><th>T??n</th><th>????n v???</th><th>S??? l?????ng</th><th>G??a</th><th>C??ch d??ng</th><th>Nh??m thu???c</th><th>Thao t??c</th></tr>";
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
                           echo "<td style='width:110px;'><input type=submit name=suathuoc value=S???a><input type=submit name=xoathuoc value=X??a></td>";
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