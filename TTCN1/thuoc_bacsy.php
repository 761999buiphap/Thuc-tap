<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
    .div3{
        margin:5px;
        width:20%;
        height:300px;
        background-color:white;    
        float:left;
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
        background-color:#f2f2f2;    
        color:rgb(173, 75, 75);
    }
    #p2{
        height:600px;background-color:white;width:70%;border:1px solid black;float:left;
    }
    .bang,td,th{
            border:2px solid #ccc;
            border-collapse: collapse;
                     
        }
    .bang input,textarea,select{
        text-align:center; 
        border:none;
        outline:none;
        background-color:#f9f9f9;
        font-family:arial;
    }
    .bang tr{background-color:#f9f9f9}
    .bang th {
        background-color: rgb(173, 75, 75);
        color: white;
        padding:10px 0px;
    }
</style>
<body style="Background-color:#f2f2f2;font-family:arial;">
    <?php 
        $tentk=$_GET['tentk'];
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
        if($rowbs>0)
        {
            include("giaodienquanlybacsy.php") ;
        }
        if($rownv>0)
        {
            include("GDQL_nhanvien.php") ;
        }
    ?>
    <div class="div2">
        <form class="div2form" method="POST">
            <input style="width:170px;" type="text" name="tenthuoc" placeholder="Nh???p t??n thu???c">
            <input style="background-color:rgb(37, 158, 37);color:white;" type="submit" name="loctim" value="L???c t??m">
            <input style="background-color:rgb(37, 158, 37);color:white;" type="submit" name="them" value="+ Th??m">
        </form>
        <p>D??? LI???U >> <span style="color:blue;">H??? s?? b???nh nh??n</span> </p>
    </div>
    <div class="div3">
        <h3 style="text-align:center;color:green;">Danh s??ch thu???c</h3>
        <form method="POST">       
            <input id="khang" class="bt" type="submit" name="khangsinh" value="khang sinh">
            <input class="bt" type="submit" name="giamdau" value="Giam dau">
            <input class="bt"  type="submit" name="nhiemtrung"  value="nhiem trung">
            <input class="bt" type="submit" name="khangviem" value="Kh??ng vi??m">
            <input class="bt" type="submit" name="khangviruss" value="Kh??ng viruss">
            <input class="bt" type="submit" name="thuocboi" value="Thu???c b??i">
            <input class="bt" type="submit" name="chongebuot" value="Ch???ng ?? bu???t">
            <input class="bt" type="submit" name="giamsung" value="Gi???m s??ng">
        </form> 
    </div>
    <div id="p2"></div>
    <?php 
        // Giao di???n c???a b??c s??
        if($rowbs>0)
        { 
            $CONN = new mysqli('localhost','root','','qlpknk');
            mysqli_query($CONN,'SET NAMES UTF8'); 
            if(isset($_POST['khangsinh']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:35px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:90px;'>Thao t??c</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kh??ng sinh'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:170px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style=' overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE mabs='$tentk' AND tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td></tr></from>";
                        //echo "<td style='text-align:center;'>" ."<input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='sualuongbs' value=S???a><input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='xoaluongbs' value=X??a>" ."</td></tr></from>" ;                                                               

                    }
                    exit;
            }
            if(isset($_POST['giamdau']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:35px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:90px;'>Thao t??c</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Gi???m ??au'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:170px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style=' overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE mabs='$tentk' AND tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td></tr></from>";
                    }
                    exit;
            }
            if(isset($_POST['nhiemtrung']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:35px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:90px;'>Thao t??c</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Nhi???m tr??ng'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:170px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style=' overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE mabs='$tentk' AND tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td></tr></from>";
                    }
                    exit;
            }
            if(isset($_POST['khangviem']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:35px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:90px;'>Thao t??c</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kh??ng vi??m'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:170px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style=' overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE mabs='$tentk' AND tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td></tr></from>";
                    }
                    exit;
            }
            if(isset($_POST['khangviruss']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:35px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:90px;'>Thao t??c</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kh??ng viruss'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:170px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style=' overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE mabs='$tentk' AND tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td></tr></from>";
                    }
                    exit;
            }
            if(isset($_POST['thuocboi']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:35px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:90px;'>Thao t??c</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Thu???c b??i'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:170px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style=' overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE mabs='$tentk' AND tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td></tr></from>";
                    }
                    exit;
            }
            if(isset($_POST['chongebuot']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:35px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:90px;'>Thao t??c</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Ch???ng ?? bu???t'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:170px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style=' overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE mabs='$tentk' AND tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td></tr></from>";
                    }
                    exit;
            }
            if(isset($_POST['loctim']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:35px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:90px;'>S??? l?????ng b??n</th></tr>";
                $tenthuoc=$_POST['tenthuoc'];
                $truyvan="SELECT*FROM thuoc WHERE tenthuoc='$tenthuoc'";
                $lienket=mysqli_query($CONN,$truyvan);
                $row=mysqli_fetch_assoc($lienket);
                echo "<tr><from method=POST>";
                echo "<td><input style='width:90px;' type=text name='mathuoc' value='TH0000$row[mathuoc]'</td>";
                echo "<td><input style='width:170px;' type=text name='mathuoc' value='$row[tenthuoc]'</td>";
                echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[donvi]'</td>";
                echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[gia]'</td>";
                echo "<td><textarea name='' style=' overflow-y:scroll;' rows='3' cols='25'>$row[cachdung]</textarea></td>";
                echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[soluong]'</td>";
                $truyvan1="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE mabs='$tentk' AND tenthuoc='$tenthuoc'";
                $lienket1=mysqli_query($CONN,$truyvan1);
                $row1=mysqli_fetch_assoc($lienket1);
                echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[dem]'</td></tr></from>";
                
                exit;
            }
            echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:35px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:90px;'>Thao t??c</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kh??ng sinh'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:170px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style=' overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE mabs='$tentk' AND tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td></tr></from>";
                        //echo "<td style='text-align:center;'>" ."<input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='sualuongbs' value=S???a><input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='xoaluongbs' value=X??a>" ."</td></tr></from>" ;                                                               

                    }
                    exit;
        }
        //Giao di???n c???a nh??n vi??n
        if($rownv>0)
        { 
            $CONN = new mysqli('localhost','root','','qlpknk');
            mysqli_query($CONN,'SET NAMES UTF8'); 
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
                         echo "<table class='bang' style='position:absolute;top:40%;left:23%;'><tr><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th>Lo???i thu???c</th><th></th></tr>";
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
              
            //Th??m m???i thu???c
            /*
               $err1=$err2=$err3=$err4=$err5=$err6='';
               if(isset($_POST['them']) || isset($_GET['n'])||isset($_POST['gui']))
               {    
                   if(isset($_POST['gui'])||isset($_GET['n']))
                   {
                        if(isset($_POST['gui']))
                        {
                            $n=$_POST['so'];
                        }
                       if(isset($_GET['n']))
                       {
                            $n=$_GET['n'];
                       }
                       $a=array();
                       if(isset($_GET['mathuoc']))
                            {
                                echo $_GET['i'] ."<br>";
                                $i=$_GET['i'];
                                $mathuoc=$_GET['mathuoc'];
                                $a[$i]=$mathuoc;
                                echo $mathuoc;
                            }
                       $t=35;
                       echo "<table class='bang' style='position:absolute;top:$t%;left:23%;'><tr><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th>Lo???i thu???c</th><th></th></tr>";
                       for($i=0;$i<$n;$i++)
                       {
                            echo "<form method=POST action='sua.php?tentk=".$tentk."&&n=$n&&i=$i'&&a=array()>";
                            if(isset($_GET['mathuoc']))
                            {
                                echo "<br>";
                                echo $i;
                                $mathuoc='';
                                if(!empty($a[$i]))
                                {
                                     $mathuoc=$a[$i];
                                     echo $mathuoc;
                                }
                                $truyvan2="SELECT * FROM thuoc WHERE mathuoc='$mathuoc'";
                                $lienket2=mysqli_query($CONN,$truyvan2);
                                if((mysqli_num_rows($lienket2))>0)
                                {
                                    $row2=mysqli_fetch_assoc($lienket2);
                                    $err1=$row2['tenthuoc'];
                                    $err3=$row2['gia'];
                                    $err2=$row2['donvi'];
                                    $err4=$row2['cachdung'];
                                    $err5=$row2['soluong'];
                                }
                            }
                           echo "<tr>";
                           echo "<td><input style='width:190px;' type=text name='tenthuoc' value='$err1'</td>";
                           echo "<td><input style='width:90px;' type=text name='donvi' value='$err2'</td>";
                           echo "<td><input style='width:120px;' type=text name='gia' value='$err3'</td>";
                           echo "<td><textarea name='cachdung' style=' overflow-y:scroll;font-family:arial;' rows='3' cols='28'>$err4</textarea></td>";
                           echo "<td><input style='width:90px;' type=text name='soluong' value='$err5'</td>";
                           echo "<td><select name='loaithuoc' value='$err6'><option value='Kh??ng sinh'>Kh??ng sinh</option><option value='Gi???m ??au'>Gi???m ??au</option><option value='Nhi???m tr??ng' selected>Nhi???m tr??ng</option><option value='Kh??ng vi??m'>Kh??ng vi??m</option><option value='Kh??ng viruss'>Kh??ng viruss</option><option value='Thu???c b??i'>Thu???c b??i</option><option value='Ch???ng ?? bu???t'>Ch???ng ?? bu???t</option><option value='Gi???m s??ng'>Gi???m s??ng</option></select>";
                           echo "<td><input style=' background-color:rgb(173, 75, 75);padding:5px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='luuhoadon' value=L??u></tr></form>" ;                                                               
                        $t=$t+15;
                        $err1=$err2=$err3=$err4=$err5=$err6='';
                        }//echo "<td><input style=' background-color:rgb(173, 75, 75);padding:5px ;color:white;border:2px solid #ccc;font-size:13px;position:absolute;top:55%;left:53%;' type=submit name='luu' value=L??u></tr></form>" ;                                                               

                       exit;
                   }
                   echo "<form method='POST'>";
                   echo "<input style='position:absolute;top:50%;left:50%;' type='text' name='so' >";
                   echo "<input style='position:absolute;top:55%;left:55%;' type='submit' name='gui'>";
                   echo "</form>";
                   exit;
                }*/
            //hien thuoc
            if(isset($_POST['khangsinh']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kh??ng sinh'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:70px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:160px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:50px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style=' overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td>";
                        $tong=$row['dem']*$row1['gia'];
                        $tong1 = number_format($tong);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$tong1'</td></tr></from>";
                        //echo "<td style='text-align:center;'>" ."<input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='sualuongbs' value=S???a><input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='xoaluongbs' value=X??a>" ."</td></tr></from>" ;                                                               

                    }
                    exit;
            }
            if(isset($_POST['giamdau']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:40px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Gi???m ??au'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo $row1['mathuoc'];
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:70px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:160px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:50px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style='overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td>";
                        $tong=$row['dem']*$row1['gia'];
                        $tong1 = number_format($tong);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$tong1'</td></tr></from>";
                        //echo "<td style='text-align:center;'>" ."<input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='sualuongbs' value=S???a><input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='xoaluongbs' value=X??a>" ."</td></tr></from>" ;                                                               

                    }
                    exit;
            }
            if(isset($_POST['nhiemtrung']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Nhi???m tr??ng'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:70px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:160px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:50px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style=' overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td>";
                        $tong=$row['dem']*$row1['gia'];
                        $tong1 = number_format($tong);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$tong1'</td></tr></from>";
                        //echo "<td style='text-align:center;'>" ."<input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='sualuongbs' value=S???a><input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='xoaluongbs' value=X??a>" ."</td></tr></from>" ;                                                               

                    }
                    exit;
            }
            if(isset($_POST['khangviem']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kh??ng vi??m'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:70px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:160px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:50px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style='overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td>";
                        $tong=$row['dem']*$row1['gia'];
                        $tong1 = number_format($tong);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$tong1'</td></tr></from>";
                        //echo "<td style='text-align:center;'>" ."<input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='sualuongbs' value=S???a><input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='xoaluongbs' value=X??a>" ."</td></tr></from>" ;                                                               

                    }
                    exit;
            }
            if(isset($_POST['khangviruss']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kh??ng viruss'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:70px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:160px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:50px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style='overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td>";
                        $tong=$row['dem']*$row1['gia'];
                        $tong1 = number_format($tong);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$tong1'</td></tr></from>";
                        //echo "<td style='text-align:center;'>" ."<input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='sualuongbs' value=S???a><input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='xoaluongbs' value=X??a>" ."</td></tr></from>" ;                                                               

                    }
                    exit;
            }
            if(isset($_POST['thuocboi']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Thu???c b??i'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:70px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:160px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:50px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style=' overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td>";
                        $tong=$row['dem']*$row1['gia'];
                        $tong1 = number_format($tong);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$tong1'</td></tr></from>";
                        //echo "<td style='text-align:center;'>" ."<input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='sualuongbs' value=S???a><input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='xoaluongbs' value=X??a>" ."</td></tr></from>" ;                                                               

                    }
                    exit;
            }
            if(isset($_POST['chongebuot']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th></tr>";
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Ch???ng ?? bu???t'";
                    $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                    while($row1=mysqli_fetch_assoc($lienket1))
                    {
                        echo "<tr><from method=POST>";
                        echo "<td><input style='width:70px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                        echo "<td><input style='width:160px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                        echo "<td><input style='width:50px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                        echo "<td><textarea name='' style=' overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                        $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        $row=mysqli_fetch_assoc($lienket);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td>";
                        $tong=$row['dem']*$row1['gia'];
                        $tong1 = number_format($tong);
                        echo "<td><input style='width:90px;' type=text name='mathuoc' value='$tong1'</td></tr></from>";
                        //echo "<td style='text-align:center;'>" ."<input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='sualuongbs' value=S???a><input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='xoaluongbs' value=X??a>" ."</td></tr></from>" ;                                                               

                    }
                    exit;
            }

            //Khi l???c t??m
            if(isset($_POST['loctim']))
            {
                echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th></tr>";
                $tenthuoc=$_POST['tenthuoc'];
                $truyvan="SELECT*FROM thuoc WHERE tenthuoc='$tenthuoc'";
                $lienket=mysqli_query($CONN,$truyvan);
                $row1=mysqli_fetch_assoc($lienket);
                echo "<tr><from method=POST>";
                echo "<td><input style='width:70px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                echo "<td><input style='width:160px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                echo "<td><input style='width:50px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                echo "<td><textarea name='' style=' overflow-y:scroll;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                $lienket=mysqli_query($CONN,$truyvan);
                $row=mysqli_fetch_assoc($lienket);
                echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td>";
                $tong=$row['dem']*$row1['gia'];
                $tong1 = number_format($tong);
                echo "<td><input style='width:90px;' type=text name='mathuoc' value='$tong1'</td></tr></from>";
                        //echo "<td style='text-align:center;'>" ."<input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='sualuongbs' value=S???a><input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='xoaluongbs' value=X??a>" ."</td></tr></from>" ;                                                               
                exit;
            }


            echo "<table class='bang' style='position:absolute;top:31%;left:23%;'><tr><th style='width:30px;'>M?? thu???c</th><th style='width:60px;'>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th style='width:50px;'>C??ch d??ng</th><th>S??? l?????ng</th><th style='width:50px;'>T???ng b??n</th><th style='width:90px;'>T???ng ti???n</th></tr>";
            $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Kh??ng sinh'";
                $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                while($row1=mysqli_fetch_assoc($lienket1))
                {
                    echo "<from method=POST>";
                    echo "<tr>";
                    echo "<td><input style='width:70px;' type=text name='mathuoc' value='TH0000$row1[mathuoc]'</td>";
                    echo "<td><input style='width:160px;' type=text name='mathuoc' value='$row1[tenthuoc]'</td>";
                    echo "<td><input style='width:50px;' type=text name='mathuoc' value='$row1[donvi]'</td>";
                    echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[gia]'</td>";
                    echo "<td><textarea name='' style=' overflow-y:scroll;font-family:arial;' rows='3' cols='25'>$row1[cachdung]</textarea></td>";
                    echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row1[soluong]'</td>";
                    $truyvan="SELECT COUNT(tenthuoc) AS dem FROM donthuoc WHERE tenthuoc='$row1[tenthuoc]'";
                    $lienket=mysqli_query($CONN,$truyvan);
                    $row=mysqli_fetch_assoc($lienket);
                    echo "<td><input style='width:90px;' type=text name='mathuoc' value='$row[dem]'</td>";
                    $tong=$row['dem']*$row1['gia'];
                    $tong1 = number_format($tong);
                    echo "<td><input style='width:90px;' type=text name='mathuoc' value='$tong1'</td></tr></from>";
                    //echo "<td style='text-align:center;'>" ."<input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='sualuongbs' value=S???a><input style=' background-color:rgb(173, 75, 75);padding:2px 3px ;color:white;border:2px solid #ccc;font-size:13px;' type=submit name='xoaluongbs' value=X??a>" ."</td></tr></from>" ;                                                               

                }
                exit;
        }
    ?>
</body>
    <script>
    

    /*
        document.getElementById("nhiemtrung").addEventListener("click", nt);
        function nt(){
            document.getElementById("p2").style.display = "block";
            document.getElementById("p2").innerHTML = "phap";
            document.getElementById("p2").style.width = "70%";
            document.getElementById("p2").style.height = "600px";
            document.getElementById("p2").style.background = "white";
            document.getElementById("p2").style.top= "25%";
            document.getElementById("p2").style.left= "28%";
            document.getElementById('p2').innerHTML= "<table class='bang' style='margin:5% 0px 0px 5%;background-color:red;'><tr><th>M?? thu???c</th><th>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th>C??ch d??ng</th><th>S??? l?????ng</th></tr>";
            <?php 
            /*
                $truyvan1="SELECT * FROM thuoc WHERE nhomthuoc='Nhi???m tr??ng'";
                $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                while($row1=mysqli_fetch_assoc($lienket1))
                {
                    echo "var para = document.createElement('table');";
                    echo "document.getElementById('p2').appendChild(para);";
                    echo "var para = document.createElement('tr');";
                    echo "document.getElementById('p2').appendChild(para);";
                    echo "var para = document.createElement('td');";
                    echo "node = document.createTextNode('$row1[mathuoc]');";
                    echo "para.appendChild(node);";
                    echo "document.getElementById('p2').appendChild(para);";
                    echo "var para = document.createElement('td');";
                    echo "node = document.createTextNode('$row1[tenthuoc]');";
                    echo "para.appendChild(node);";
                    echo "document.getElementById('p2').appendChild(para);";
                    echo "var para = document.createElement('td');";
                    echo "node = document.createTextNode('$row1[donvi]');";
                    echo "para.appendChild(node);";
                    echo "document.getElementById('p2').appendChild(para);";
                    echo "var para = document.createElement('td');";
                    echo "node = document.createTextNode('$row1[gia]');";
                    echo "para.appendChild(node);";
                    echo "document.getElementById('p2').appendChild(para);";
                    echo "var para = document.createElement('td');";
                    echo "node = document.createTextNode('$row1[soluong]');";
                    echo "para.appendChild(node);";
                    echo "document.getElementById('p2').appendChild(para);";
                    echo "var para = document.createElement('td');";
                    echo "node = document.createTextNode('$row1[cachdung]');";
                    echo "para.appendChild(node);";
                    echo "document.getElementById('p2').appendChild(para);";
                   //echo "document.getElementById('p2').innerHTML= '<table class=bang style=margin:5% 0px 0px 5%;><tr><th>M?? thu???c</th><th>T??n thu???c</th><th>????n v???</th><th>G??a thu???c</th><th>C??ch d??ng</th><th>S??? l?????ng</th></tr></table>';";
                   
                }
                */
            ?>            
        }
*/
    </script>
</html>