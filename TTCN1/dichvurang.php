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
        .div4{
                position:absolute;
                top:9%;
                left:59%;
        }
        .div4 input{
                padding:5px;
        }
        .div3 input[type=submit]{
            padding:7px 77px;
            background-color:rgb(150, 200, 30);
            color:black;
            font-size:18px;
            margin-top:1%;
        }
        .div3 input[type=submit]:hover,.div4 input[type=submit]:hover{background-color:rgb(173, 75, 75);color:white;}
        .bang input[type=text]{
            border:none;
            outline:none;
            text-align:center;
        }
        .div4 input{
            padding:7px 35px;
            background-color:rgb(37, 158, 37);
            color:white;
            font-size:18px;
        }
        .div4 input[type=submit]:hover{background-color:#f2f2f2;color:black;border:2px solid rgb(37, 158, 37);}
        .bang{
            margin-left:1%;
            font-size:15px;
            text-align:center;
        }
        .bang th{background-color:rgb(173, 75, 75);color: white;width:30px;}
        .bang,.bang th,td{
            border:1px solid black;
            border-collapse: collapse;
                     
        }
        .bang th, .bang td {
            padding:4px;
        }
        .bangdv{
            margin:3% 0px 0px 1%;
            font-size:18px;
            text-align:center;
        }
        .bangdv th{background-color:rgb(173, 75, 75);color: white;height:50px;}
        .bangdv,.bangdv th,.bangdv td{
            border:1px solid black;
            border-collapse: collapse;
                     
        }
        .bangdv th, .bangdv td {
            padding:5px 10px;
        } 
        .bangdv input[type=text]
        {
            border:none;
            outline:none;
            font-size:18px;
            text-align:center;
        }
        .bangdv input[type=submit]
        {
            background-color:rgb(173, 75, 75);
            color:white;
        }
    </style>
<body style='font-family:arial;'>
    <?php include("GDQL_admin.php") ; 
        $CONN = new mysqli('localhost','root','','qlpknk');
        mysqli_query($CONN,'SET NAMES UTF8');
     ?>
    <div class="div2">
        <p style="margin-left:1%;">Thu???c >> <span style="color:blue;">D???ch v???</span> </p>
        <div class="div4">
        <form  method=POST>
            <input type="submit" name='banggia' value='B???ng gi??'>
            <input type="submit" name='lichsu' value='L???ch s??? c??c d???ch v???'>
            <input type="submit" name='them' value='+ Th??m'>
        </form>
        </div>
    </div>
        <?php
            //===Th??m d???ch v???===
            if(isset($_POST['them'])||isset($_POST['luu']))
            {
                if(isset($_POST['luu']))
                {
                    $tendv=$_POST['tendv'];
                    $gia=$_POST['gia'];
                    $soluong=$_POST['soluong'];
                    $loaidv=$_POST['loaidv'];
                    $truyvan="INSERT INTO rang(tenrang,gia,soluong,dichvu) VALUES('$tendv','$gia','$soluong','$loaidv') ";
                    $lienket=mysqli_query($CONN,$truyvan);
                }
                echo "<table class='bangdv'>";
                    echo "<th>T??n d???ch v???</th><th>G??a</th><th>S??? l?????ng</th><th>Lo???i d???ch v???</th><th>Thao t??c</th>";
                                echo "<form method=POST><tr style='height:70px;'>";
                                echo "<td><input style='width:250px;' type=text name=tendv value=''></td>";
                                echo "<td><input style='width:250px;' type=text name=gia value=''></td>";
                                echo "<td><input style='width:300px;' type=text name=soluong value=''></td>";
                                echo "<td><select style='font-size:17px;width:300px;outline:none;padding:15px 20px;font-weight:normal; ' id=loaidv name='loaidv'> <option value='R??ng s??? th???m m???'>R??ng s??? th???m m???</option><option value='L???y cao r??ng'>L???y cao r??ng</option><option value='Ni???ng r??ng'>Ni???ng r??ng</option><option value='Nh??? r??ng'>Nh??? r??ng</option><option value='T???y tr???ng r??ng'>T???y tr???ng r??ng</option></select></td>";
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=luu value='Th??m'></td>";
                    echo "</table>";
                    exit;
            }
            //===l???ch s??? c??c d???ch v???===
            if(isset($_POST['lichsu'])||isset($_POST['nhorang'])||isset($_POST['niengrang'])||isset($_POST['rangsuthammy'])||isset($_POST['taytrangrang'])||isset($_POST['laycaorang']))
            {
                echo "<div class='div3'>";
                echo "<form method=POST>";
                    echo "<input style='margin-left:1%;' type='submit' name='laycaorang' value='L???y cao r??ng'>";
                    echo "<input type='submit' name='nhorang' value='Nh??? r??ng'>";
                    echo "<input type='submit' name='niengrang' value='Ni???ng r??ng'>";
                    echo "<input type='submit' name='rangsuthammy' value='R??ng s??? th???m m???'>";
                    echo "<input type='submit' name='taytrangrang' value='T???y tr???ng r??ng'>";
                echo "</form>";
                echo "</div> ";
                
                //Xu???t ra danh s??ch ng?????i nh??? r??ng
                if(isset($_POST['nhorang']))
                {
                    $truyvansum="SELECT COUNT(id) AS dem FROM nhorang ";
                    $lienketsum=mysqli_query($CONN,$truyvansum);
                    $rowsum=mysqli_fetch_assoc($lienketsum);
                    echo "<h4 style='text-align:center;'>T???ng s??? ca ???? th???c hi???n: <span style='color:red;'>$rowsum[dem] </span> </h4>";
                    echo "<table class=bang>";
                    echo "<th>STT</th><th># mabn</th><th>H??? t??n</th><th># mabs</th><th>H??? t??n</th><th>Th??? thu???t</th><th>T??nh tr???ng</th><th>S??? l?????ng r??ng</th><th>S??? r??ng</th><th>Ng??y</th><th>D???ng c???</th><th>????? ngh???</th><th>ghi ch??</th>";
                    $truyvan="SELECT * FROM nhorang";
                    $lienket=mysqli_query($CONN,$truyvan);
                    if(mysqli_num_rows($lienket)>0)
                    {
                        $i=1;
                        while($row=mysqli_fetch_assoc($lienket))
                        {
                            $truyvan_1="SELECT * FROM hosobenhnhan WHERE mabn='$row[mabn]'";
                            $lienket_1=mysqli_query($CONN,$truyvan_1);
                            $row_1=mysqli_fetch_assoc($lienket_1);
                            $truyvan_2="SELECT * FROM hosobacsy WHERE mabs='$row[mabs]'";
                            $lienket_2=mysqli_query($CONN,$truyvan_2);
                            $row_2=mysqli_fetch_assoc($lienket_2);
                            echo "<tr>";
                            echo "<td ><input style='width:30px;' type=text name='' value='$i'></td>";
                            echo "<td><input style='width:45px;' type=text name='' value='$row[mabn]'></td>";
                            echo "<td ><input style='width:120px;' type=text name='' value='$row_1[hoten]'></td>";
                            echo "<td><input style='width:45px;' type=text name='' value='$row[mabs]'></td>";
                            echo "<td><input style='width:130px;' type=text name='' value='$row_2[hoten]'></td>";
                            echo "<td>Nh??? r??ng</td>";
                            echo "<td><input style='width:80px;' type=text name='' value='$row[tinhtrang]'></td>";
                            echo "<td><input style='width:80px;' type=text name='' value='$row[soluongrang]'></td>";
                            echo "<td><input style='width:80px;' type=text name='' value='$row[sorang]'></td>";
                            echo "<td><input style='width:80px;' type=text name='' value='$row[ngay]'></td>";
                            echo "<td ><input style='width:130px;' type=text name='' value='$row[dungcu]'></td>";
                            echo "<td ><input style='width:140px;' type=text name='' value='$row[denghi]'></td>";
                            echo "<td ><input style='width:130px;' type=text name='' value='$row[ghichu]'></td>";
                            echo "</tr>";
                            $i++;
                        }
                    }
                    echo "</table>";
                    exit;
                }
    
                //Xu???t ra danh s??ch ng?????i ni???ng r??ng
                if(isset($_POST['niengrang']))
                {
                    $truyvansum="SELECT COUNT(mabs) AS dem FROM niengrang ";
                    $lienketsum=mysqli_query($CONN,$truyvansum);
                    $rowsum=mysqli_fetch_assoc($lienketsum);
                    echo "<h4 style='text-align:center;'>T???ng s??? ca ???? th???c hi???n: <span style='color:red;'>$rowsum[dem] </span> </h4>";
                    echo "<table class=bang>";
                    echo "<th>STT</th><th># mabn</th><th>H??? t??n</th><th># mabs</th><th>H??? t??n</th><th>Th??? thu???t</th><th>T??nh tr???ng</th><th>Lo???i m???c c??i</th><th>Giai ??o???n ni???ng</th><th>Ng??y</th><th>D???ng c???</th><th>????? ngh???</th><th>ghi ch??</th>";
                    $truyvan="SELECT * FROM niengrang";
                    $lienket=mysqli_query($CONN,$truyvan);
                    if(mysqli_num_rows($lienket)>0)
                    {
                        $i=1;
                        while($row=mysqli_fetch_assoc($lienket))
                        {
                            $truyvan_1="SELECT * FROM hosobenhnhan WHERE mabn='$row[mabn]'";
                            $lienket_1=mysqli_query($CONN,$truyvan_1);
                            $row_1=mysqli_fetch_assoc($lienket_1);
                            $truyvan_2="SELECT * FROM hosobacsy WHERE mabs='$row[mabs]'";
                            $lienket_2=mysqli_query($CONN,$truyvan_2);
                            $row_2=mysqli_fetch_assoc($lienket_2);
                            echo "<tr>";
                            echo "<td ><input style='width:30px;' type=text name='' value='$i'></td>";
                            echo "<td><input style='width:45px;' type=text name='' value='$row[mabn]'></td>";
                            echo "<td ><input style='width:120px;' type=text name='' value='$row_1[hoten]'></td>";
                            echo "<td><input style='width:45px;' type=text name='' value='$row[mabs]'></td>";
                            echo "<td><input style='width:130px;' type=text name='' value='$row_2[hoten]'></td>";
                            echo "<td>Nh??? r??ng</td>";
                            echo "<td '><input style='width:100px;' type=text name='' value='$row[tinhtrang]'></td>";
                            echo "<td><input style='width:100px;' type=text name='' value='$row[loaimaccai]'></td>";
                            echo "<td><input style='width:100px;' type=text name='' value='$row[giaidoannieng]'></td>";
                            echo "<td><input style='width:80px;' type=text name='' value='$row[ngay]'></td>";
                            echo "<td ><input style='width:120px;' type=text name='' value='$row[dungcu]'></td>";
                            echo "<td ><input style='width:120px;' type=text name='' value='$row[denghi]'></td>";
                            echo "<td ><input style='width:120px;' type=text name='' value='$row[ghichu]'></td>";
                            echo "</tr>";
                            $i++;
                        }
                    }
                    echo "</table>";
                    exit;
                }
    
                //Xu???t ra danh s??ch ng?????i lam rang su tham my
                if(isset($_POST['rangsuthammy']))
                {
                    $truyvansum="SELECT COUNT(mabs) AS dem FROM rangsuthammy ";
                    $lienketsum=mysqli_query($CONN,$truyvansum);
                    $rowsum=mysqli_fetch_assoc($lienketsum);
                    echo "<h4 style='text-align:center;'>T???ng s??? ca ???? th???c hi???n: <span style='color:red;'>$rowsum[dem] </span> </h4>";
                    echo "<table class=bang>";
                    echo "<th>STT</th><th># mabn</th><th>H??? t??n</th><th># mabs</th><th>H??? t??n</th><th>Th??? thu???t</th><th>Lo???i r??ng</th><th>S??? l?????ng r??ng</th><th>Ng??y</th><th>D???ng c???</th><th>????? ngh???</th><th>ghi ch??</th>";
                    $truyvan="SELECT * FROM rangsuthammy";
                    $lienket=mysqli_query($CONN,$truyvan);
                    if(mysqli_num_rows($lienket)>0)
                    {
                        $i=1;
                        while($row=mysqli_fetch_assoc($lienket))
                        {
                            $truyvan_1="SELECT * FROM hosobenhnhan WHERE mabn='$row[mabn]'";
                            $lienket_1=mysqli_query($CONN,$truyvan_1);
                            $row_1=mysqli_fetch_assoc($lienket_1);
                            $truyvan_2="SELECT * FROM hosobacsy WHERE mabs='$row[mabs]'";
                            $lienket_2=mysqli_query($CONN,$truyvan_2);
                            $row_2=mysqli_fetch_assoc($lienket_2);
                            $truyvan_3="SELECT * FROM rang WHERE mara='$row[mara]'";
                            $lienket_3=mysqli_query($CONN,$truyvan_3);
                            $row_3=mysqli_fetch_assoc($lienket_3);
                            echo "<tr>";
                            echo "<td ><input style='width:30px;' type=text name='' value='$i'></td>";
                            echo "<td><input style='width:45px;' type=text name='' value='$row[mabn]'></td>";
                            echo "<td ><input style='width:120px;' type=text name='' value='$row_1[hoten]'></td>";
                            echo "<td><input style='width:55px;' type=text name='' value='$row[mabs]'></td>";
                            echo "<td><input style='width:130px;' type=text name='' value='$row_2[hoten]'></td>";
                            echo "<td>R??ng s??? th???m m???</td>";
                            echo "<td '><input style='width:100px;' type=text name='' value='$row_3[tenrang]'></td>";
                            echo "<td><input style='width:100px;' type=text name='' value='$row[soluongrang]'></td>";
                            echo "<td><input style='width:80px;' type=text name='' value='$row[ngay]'></td>";
                            echo "<td ><input style='width:140px;' type=text name='' value='$row[dungcu]'></td>";
                            echo "<td ><input style='width:140px;' type=text name='' value='$row[denghi]'></td>";
                            echo "<td ><input style='width:140px;' type=text name='' value='$row[ghichu]'></td>";
                            echo "</tr>";
                            $i++;
                        }
                    }
                    echo "</table>";
                    exit;
                }
    
                //Xu???t ra danh s??ch ng?????i lam tay trang rang
                if(isset($_POST['taytrangrang']))
                {
                    $truyvansum="SELECT COUNT(mabs) AS dem FROM taytrangrang ";
                    $lienketsum=mysqli_query($CONN,$truyvansum);
                    $rowsum=mysqli_fetch_assoc($lienketsum);
                    echo "<h4 style='text-align:center;'>T???ng s??? ca ???? th???c hi???n: <span style='color:red;'>$rowsum[dem] </span> </h4>";
                    echo "<table class=bang>";
                    echo "<th>STT</th><th># mabn</th><th>H??? t??n</th><th># mabs</th><th>H??? t??n</th><th>Th??? thu???t</th><th>Ng??y</th><th>D???ng c???</th><th>????? ngh???</th><th>ghi ch??</th>";
                    $truyvan="SELECT * FROM taytrangrang";
                    $lienket=mysqli_query($CONN,$truyvan);
                    if(mysqli_num_rows($lienket)>0)
                    {
                        $i=1;
                        while($row=mysqli_fetch_assoc($lienket))
                        {
                            $truyvan_1="SELECT * FROM hosobenhnhan WHERE mabn='$row[mabn]'";
                            $lienket_1=mysqli_query($CONN,$truyvan_1);
                            $row_1=mysqli_fetch_assoc($lienket_1);
                            $truyvan_2="SELECT * FROM hosobacsy WHERE mabs='$row[mabs]'";
                            $lienket_2=mysqli_query($CONN,$truyvan_2);
                            $row_2=mysqli_fetch_assoc($lienket_2);
                        
                            echo "<tr>";
                            echo "<td ><input style='width:30px;' type=text name='' value='$i'></td>";
                            echo "<td><input style='width:45px;' type=text name='' value='$row[mabn]'></td>";
                            echo "<td ><input style='width:120px;' type=text name='' value='$row_1[hoten]'></td>";
                            echo "<td><input style='width:60px;' type=text name='' value='$row[mabs]'></td>";
                            echo "<td><input style='width:130px;' type=text name='' value='$row_2[hoten]'></td>";
                            echo "<td>T???y tr???ng r??ng</td>";
                            echo "<td><input style='width:80px;' type=text name='' value='$row[ngay]'></td>";
                            echo "<td ><input style='width:220px;' type=text name='' value='$row[dungcu]'></td>";
                            echo "<td ><input style='width:220px;' type=text name='' value='$row[denghi]'></td>";
                            echo "<td ><input style='width:220px;' type=text name='' value='$row[ghichu]'></td>";
                            echo "</tr>";
                            $i++;
                        }
                    }
                    echo "</table>";
                    exit;
                }
    
                //Xu???t ra danh s??ch ng?????i l???y cao r??ng
                if(isset($_POST['laycaorang'])||isset($_GET['dichvu']))
                {
                    $truyvansum="SELECT COUNT(mabs) AS dem FROM laycaorang ";
                    $lienketsum=mysqli_query($CONN,$truyvansum);
                    $rowsum=mysqli_fetch_assoc($lienketsum);
                    echo "<h4 style='text-align:center;'>T???ng s??? ca ???? th???c hi???n: <span style='color:red;'>$rowsum[dem] </span> </h4>";
                    echo "<table class=bang>";
                    echo "<th>STT</th><th># mabn</th><th>H??? t??n</th><th># mabs</th><th>H??? t??n</th><th>Th??? thu???t</th><th>Ng??y</th><th>D???ng c???</th><th>????? ngh???</th><th>ghi ch??</th>";
                    $truyvan="SELECT * FROM laycaorang";
                    $lienket=mysqli_query($CONN,$truyvan);
                    if(mysqli_num_rows($lienket)>0)
                    {
                        $i=1;
                        while($row=mysqli_fetch_assoc($lienket))
                        {
                            $truyvan_1="SELECT * FROM hosobenhnhan WHERE mabn='$row[mabn]'";
                            $lienket_1=mysqli_query($CONN,$truyvan_1);
                            $row_1=mysqli_fetch_assoc($lienket_1);
                            $truyvan_2="SELECT * FROM hosobacsy WHERE mabs='$row[mabs]'";
                            $lienket_2=mysqli_query($CONN,$truyvan_2);
                            $row_2=mysqli_fetch_assoc($lienket_2);
                            echo "<tr>";
                            echo "<td ><input style='width:30px;' type=text name='' value='$i'></td>";
                            echo "<td><input style='width:45px;' type=text name='' value='$row[mabn]'></td>";
                            echo "<td ><input style='width:120px;' type=text name='' value='$row_1[hoten]'></td>";
                            echo "<td><input style='width:60px;' type=text name='' value='$row[mabs]'></td>";
                            echo "<td><input style='width:130px;' type=text name='' value='$row_2[hoten]'></td>";
                            echo "<td>T???y tr???ng r??ng</td>";
                            echo "<td><input style='width:80px;' type=text name='' value='$row[ngay]'></td>";
                            echo "<td ><input style='width:220px;' type=text name='' value='$row[dungcu]'></td>";
                            echo "<td ><input style='width:220px;' type=text name='' value='$row[denghi]'></td>";
                            echo "<td ><input style='width:220px;' type=text name='' value='$row[ghichu]'></td>";
                            echo "</tr>";
                            $i++;
                        }
                    }
                    echo "</table>";
                    exit;
                }
                exit;
            }
            
            //===B???ng gi??===
            if(isset($_POST['banggia'])||isset($_POST['suarangsu'])||isset($_POST['suanr'])||isset($_POST['suaniengrang'])||isset($_POST['sualaycaorang'])||isset($_POST['suataytrangrang'])||isset($_POST['xoanr'])||isset($_POST['xoarangsu'])||isset($_POST['xoaniengrang'])||isset($_POST['xoalaycaorang'])||isset($_POST['xoataytrangrang'])||isset($_POST['laycaorang1'])||isset($_POST['nhorang1'])||isset($_POST['niengrang1'])||isset($_POST['rangsuthammy1'])||isset($_POST['taytrangrang1'])||isset($_GET['dichvu']))
            {
                if(isset($_POST['suanr'])||isset($_POST['suarangsu'])||isset($_POST['suaniengrang'])||isset($_POST['sualaycaorang'])||isset($_POST['suataytrangrang']))
                {
                    if(isset($_POST['mara']))
                    {
                        if(!isset($_POST['soluong']))
                        {
                            $soluong=0;
                        }
                        else
                        $soluong=$_POST['soluong'];
                        $mara=$_POST['mara'];
                        $tenrang=$_POST['tenrang'];
                        $gia=$_POST['gia'];
                        $gia = str_replace( ',', '', $gia );
                        $truyvan="UPDATE rang SET tenrang='$tenrang',soluong='$soluong',gia='$gia' WHERE mara='$mara'";
                        $lienket=mysqli_query($CONN,$truyvan);
                    }
                }
                if(isset($_POST['xoanr'])||isset($_POST['xoarangsu'])||isset($_POST['xoaniengrang'])||isset($_POST['xoalaycaorang'])||isset($_POST['xoataytrangrang']))
                {
                    if(isset($_POST['mara']))
                    {
                        $mara=$_POST['mara'];
                        $truyvan="DELETE FROM rang WHERE mara='$mara'";
                        $lienket=mysqli_query($CONN,$truyvan)or die("sai");
                    }
                }
                echo "<div class='div3'>";
                echo "<form method=POST>";
                    echo "<input style='margin-left:1%;' type='submit' name='rangsuthammy1' value='R??ng s??? th???m m???'>";
                    echo "<input type='submit' name='nhorang1' value='Nh??? r??ng'>";
                    echo "<input type='submit' name='niengrang1' value='Ni???ng r??ng'>";
                    echo "<input type='submit' name='laycaorang1' value='L???y cao r??ng'>";
                    echo "<input type='submit' name='taytrangrang1' value='T???y tr???ng r??ng'>";
                echo "</form>";
                echo "</div> ";

                //b???ng gi?? l???y cao r??ng
                if(isset($_POST['laycaorang1'])||isset($_POST['sualaycaorang'])||isset($_POST['xoalaycaorang']))
                {
                    echo "<table class='bangdv'>";
                    echo "<th></th><th>STT</th> <th># M??</th><th>T??n d???ch v???</th><th>G??a</th><th>Thao t??c</th>";
                    $truyvan="SELECT * FROM rang WHERE dichvu='L???y cao r??ng'";
                    $lienket=mysqli_query($CONN,$truyvan);
                    if(mysqli_num_rows($lienket)>0)
                        {
                            $i=1;
                            while($row=mysqli_fetch_assoc($lienket))
                            {
                                echo "<form method=POST><tr>";
                                echo "<td ><input type=checkbox name=mara value='$row[mara]'></td>";
                                echo "<td style='width:110px;'>$i</td>";
                                echo "<td><input type=text name=mara1 value='RA00$row[mara]'></td>";
                                echo "<td><input style='width:330px;' type=text name=tenrang value='$row[tenrang]'></td>";
                                $gia = number_format($row['gia']);
                                echo "<td><input style='width:300px;' type=text name=gia value='$gia'></td>";
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=sualaycaorang value='S???a'><input type=submit name=xoalaycaorang value='X??a'></td>";
                                echo "</tr></form>";
                                $i++;
                            }
                        }
                    echo "</table>";
                    exit;
                }
                //b???ng gi?? nh??? r??ng
                if(isset($_POST['nhorang1'])||isset($_POST['suanr'])||isset($_POST['xoanr']))
                {
                    echo "<table class='bangdv'>";
                    echo "<th></th><th>STT</th> <th># M??</th><th>T??n d???ch v???</th><th>G??a</th><th>Thao t??c</th>";
                    $truyvan="SELECT * FROM rang WHERE dichvu='Nh??? r??ng'";
                    $lienket=mysqli_query($CONN,$truyvan);
                    if(mysqli_num_rows($lienket)>0)
                        {
                            $i=1;
                            while($row=mysqli_fetch_assoc($lienket))
                            {
                                echo "<form method=POST><tr>";
                                echo "<td ><input type=checkbox name=mara value='$row[mara]'></td>";
                                echo "<td style='width:110px;'>$i</td>";
                                echo "<td><input type=text name=mara1 value='RA00$row[mara]'></td>";
                                echo "<td><input style='width:330px;' type=text name=tenrang value='$row[tenrang]'></td>";
                                $gia = number_format($row['gia']);
                                echo "<td><input style='width:300px;' type=text name=gia value='$gia'></td>";
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=suanr value='S???a'><input type=submit name=xoanr value='X??a'></td>";
                                echo "</tr></form>";
                                $i++;
                            }
                        }
                    echo "</table>";
                    exit;
                }

                //b???ng gi?? ni???ng r??ng
                if(isset($_POST['niengrang1'])||isset($_POST['suaniengrang'])||isset($_POST['xoaniengrang']))
                {
                    echo "<table class='bangdv'>";
                    echo "<th></th><th>STT</th> <th># M??</th><th>T??n d???ch v???</th><th>G??a</th><th>Thao t??c</th>";
                    $truyvan="SELECT * FROM rang WHERE dichvu='Ni???ng r??ng'";
                    $lienket=mysqli_query($CONN,$truyvan);
                    if(mysqli_num_rows($lienket)>0)
                        {
                            $i=1;
                            while($row=mysqli_fetch_assoc($lienket))
                            {
                                echo "<form method=POST><tr>";
                                echo "<td ><input type=checkbox name=mara value='$row[mara]'></td>";
                                echo "<td style='width:110px;'>$i</td>";
                                echo "<td><input type=text name=mara1 value='RA00$row[mara]'></td>";
                                echo "<td><input style='width:330px;' type=text name=tenrang value='$row[tenrang]'></td>";
                                $gia = number_format($row['gia']);
                                echo "<td><input style='width:300px;' type=text name=gia value='$gia'></td>";
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=sualaycaorang value='S???a'><input type=submit name=xoalaycaorang value='X??a'></td>";
                                echo "</tr></form>";
                                $i++;
                            }
                        }
                    echo "</table>";
                    exit;
                }

                //B???ng gi?? t???y tr???ng r??ng
                if(isset($_POST['taytrangrang1'])||isset($_POST['suataytrangrang'])||isset($_POST['xoataytrangrang']))
                {
                    echo "<table class='bangdv'>";
                    echo "<th></th><th>STT</th> <th># M??</th><th>T??n d???ch v???</th><th>G??a</th><th>Thao t??c</th>";
                    $truyvan="SELECT * FROM rang WHERE dichvu='T???y tr???ng r??ng'";
                    $lienket=mysqli_query($CONN,$truyvan);
                    if(mysqli_num_rows($lienket)>0)
                        {
                            $i=1;
                            while($row=mysqli_fetch_assoc($lienket))
                            {
                                echo "<form method=POST><tr>";
                                echo "<td ><input type=checkbox name=mara value='$row[mara]'></td>";
                                echo "<td style='width:110px;'>$i</td>";
                                echo "<td><input type=text name=mara1 value='RA00$row[mara]'></td>";
                                echo "<td><input style='width:330px;' type=text name=tenrang value='$row[tenrang]'></td>";
                                $gia = number_format($row['gia']);
                                echo "<td><input style='width:300px;' type=text name=gia value='$gia'></td>";
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=sualaycaorang value='S???a'><input type=submit name=xoalaycaorang value='X??a'></td>";
                                echo "</tr></form>";
                                $i++;
                            }
                        }
                    echo "</table>";
                    exit;
                }

                //B???ng gi?? r??ng s??? th???m m???
                echo "<table class='bangdv'>";
                echo "<th></th><th>STT</th> <th># M??</th><th>T??n d???ch v???</th><th>S??? l?????ng kho</th><th>G??a</th><th>Thao t??c</th>";
                $truyvan="SELECT * FROM rang WHERE dichvu='R??ng s??? th???m m???'";
                $lienket=mysqli_query($CONN,$truyvan);
                if(mysqli_num_rows($lienket)>0)
                    {
                        $i=1;
                        while($row=mysqli_fetch_assoc($lienket))
                        {
                            echo "<form method=POST><tr>";
                            echo "<td ><input type=checkbox name=mara value='$row[mara]'></td>";
                            echo "<td style='width:90px;'>$i</td>";
                            echo "<td><input type=text name=mara1 value='RA00$row[mara]'></td>";
                            echo "<td><input style='width:235px;' type=text name=tenrang value='$row[tenrang]'></td>";
                            echo "<td><input type=text name=soluong value='$row[soluong]'></td>";
                            $gia = number_format($row['gia']);
                            echo "<td><input type=text name=gia value='$gia'></td>";
                            echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=suarangsu value='S???a'><input type=submit name=xoarangsu value='X??a'></td>";
                            echo "</tr></form>";
                            $i++;
                        }
                    }
                echo "</table>";
                exit;
            }
        ?>
</body>
</html>