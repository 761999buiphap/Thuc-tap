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
                left:70%;
        }
        .div4 input{
                padding:5px;
        }
        .div4 input{
            padding:7px 40px;
            background-color:rgb(37, 158, 37);
            color:white;
            font-size:18px;
        }
        .div3 input[type=submit]{
            padding:7px 77px;
            background-color:rgb(150, 200, 30);
            color:black;
            font-size:18px;
            margin-top:1%;
        }
        .div3 input[type=submit]:hover,.div4 input[type=submit]:hover{background-color:#f2f2f2;color:black;border-color:rgb(37, 158, 37);}
        .bangdv {margin-left:10px;}
        .bangdv th{background-color:rgb(173, 75, 75);color: white;height:50px;}
        .bangdv,.bangdv th,.bangdv td{
            border:1px solid black;
            border-collapse: collapse;
                     
        }
        .bangdv th, .bangdv td {
            padding:5px 10px;
            text-align:center;
        } 
        .bangdv input[type=text]
        {
            border:none;
            outline:none;
            font-size:18px;
            text-align:center;
            width:230px;
        }
        .bangdv input[type=submit]
        {
            background-color:rgb(173, 75, 75);
            color:white;
        }
        .div6{
            width:100%;height:500px;
            position:fixed;
            z-index:2;
            background-color:black;
            opacity:0.7;
        }
        .div5{
            width:90%;height:480px;
            z-index:3;
            background-color:white;
            position:fixed;
            top:25%;left:5%;
            overflow:scroll;
            border:2px solid grey;
        }
    </style>
<body style='font-family:arial;'>
    <?php include("GDQL_benhnhan.php") ; 
        $CONN = new mysqli('localhost','root','','qlpknk');
        mysqli_query($CONN,'SET NAMES UTF8');
     ?>
    <div class="div2">
        <p style="margin-left:1%;">Dịch vụ >> <span style="color:blue;">Đặt lịch</span> </p>
        <div class="div4">
        <form  method=POST>
            <input type="submit" name='banggia' value='Bảng giá'>
            <input type="submit" name='lichsudatlich' value='Lịch sử đặt lịch'>
        </form>
        </div>
    <?php
    //==========lich su dat lich=================
    if(isset($_POST['lichsudatlich'])||isset($_POST['huy']))
    {
        if(isset($_POST['huy']))
        {
            if(isset($_POST['id'])){$id=$_POST['id'];}

            $truyvan7="DELETE FROM lichhen WHERE id='$id' ";
            $lienket7=mysqli_query($CONN,$truyvan7)or die("sai");
        }
        //xuat ra danh sach lich da dat
        
            echo "<table class='bangdv' style='margin-top:3%;'>";
            echo "<th></th><th>STT</th><th>Ngày</th> <th># Mã</th><th>Tên dịch vụ</th><th>Loại dịch vụ</th><th>Gía</th><th>Thao tác</th>";
            $truyvan="SELECT * FROM lichhen WHERE mabn='$tentk'";
            $lienket=mysqli_query($CONN,$truyvan);
            if(mysqli_num_rows($lienket)>0)
                {
                    $i=1;
                    while($row=mysqli_fetch_assoc($lienket))
                    {
                        $ngay=$row['ngayhen'];
                        $truyvan1="SELECT * FROM laycaorang WHERE mabn='$tentk' and ngay='$ngay'";
                        $lienket1=mysqli_query($CONN,$truyvan1);
                        $row1=mysqli_fetch_assoc($lienket1);
                        $truyvan2="SELECT * FROM nhorang WHERE mabn='$tentk' and ngay='$ngay'";
                        $lienket2=mysqli_query($CONN,$truyvan2);
                        $row2=mysqli_fetch_assoc($lienket2);
                        $truyvan3="SELECT * FROM niengrang WHERE mabn='$tentk' and ngay='$ngay'";
                        $lienket3=mysqli_query($CONN,$truyvan3);
                        $row3=mysqli_fetch_assoc($lienket3);
                        $truyvan4="SELECT * FROM taytrangrang WHERE mabn='$tentk' and ngay='$ngay'";
                        $lienket4=mysqli_query($CONN,$truyvan4);
                        $row4=mysqli_fetch_assoc($lienket4);
                        $truyvan5="SELECT * FROM rangsuthammy WHERE mabn='$tentk' and ngay='$ngay'";
                        $lienket5=mysqli_query($CONN,$truyvan5);
                        $row5=mysqli_fetch_assoc($lienket5);
                        if($row1<=0&&$row2<=0&&$row3<=0&&$row4<=0&&$row5<=0)
                        {
                            $truyvan6="SELECT * FROM rang WHERE mara='$row[thuthuat]' ";
                            $lienket6=mysqli_query($CONN,$truyvan6);
                            $row6=mysqli_fetch_assoc($lienket6);
                            $ng=$row['ngayhen'];$ngay1=date('d-m-Y',strtotime($ng));
                            echo "<form method=POST><tr>";
                            echo "<td ><input type=checkbox name=id value='$row[id]'></td>";
                            echo "<td style='width:110px;'>$i</td>";
                            echo "<td><input style='width:100px;'  type=text name=ngay value='$ngay1'></td>";
                            echo "<td><input type=text name=mara1 value='RA00$row[thuthuat]'></td>";
                            echo "<td><input style='width:250px;' type=text name=tenrang value='$row6[tenrang]'></td>";
                            echo "<td><input style='width:250px;' type=text name=tenrang value='$row[noidung]'></td>";
                            $gia = number_format($row6['gia']);
                            echo "<td><input style='width:150px;' type=text name=gia value='$gia'></td>";
                            echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=huy value='Hủy'></td>";
                            echo "</tr></form>";
                            $i++;
                        }
                    }
                }
            echo "</table>";
            exit;
    }

    //==========Bang gia va dat lich=============
        if(isset($_POST['banggia'])||isset($_POST['luunhorang'])||isset($_POST['luuniengrang'])||isset($_POST['luulaycaorang'])||isset($_POST['luutaytrangrang'])||isset($_POST['luurangsuthammy'])||isset($_POST['dlnhorang'])||isset($_POST['dlniengrang'])||isset($_POST['dllaycaorang'])||isset($_POST['dltaytrangrang'])||isset($_POST['dlrangsuthammy'])||isset($_POST['thoat1'])||isset($_POST['laycaorang1'])||isset($_POST['nhorang1'])||isset($_POST['niengrang1'])||isset($_POST['taytrangrang1'])||isset($_POST['rangsuthammy1'])||isset($_GET['dichvu']))
        {
        //===Dặt lịch===
            //Lưu
                if(isset($_POST['luunhorang'])||isset($_POST['luuniengrang'])||isset($_POST['luulaycaorang'])||isset($_POST['luutaytrangrang'])||isset($_POST['luurangsuthammy']))
                {
                    $truyvanmax1="SELECT MAX(lankham) AS dem FROM lichhen WHERE mabn='$tentk'";
                    $lienketmax1=mysqli_query($CONN,$truyvanmax1);
                    $rowmax1=mysqli_fetch_assoc($lienketmax1);
                    $truyvanmax2="SELECT MAX(lankham) AS dem FROM thuthuat WHERE mabn='$tentk'";
                    $lienketmax2=mysqli_query($CONN,$truyvanmax2);
                    $rowmax2=mysqli_fetch_assoc($lienketmax2);
                    $truyvanmax3="SELECT MAX(lankham) AS dem FROM donthuoc WHERE mabn='$tentk'";
                    $lienketmax3=mysqli_query($CONN,$truyvanmax3);
                    $rowmax3=mysqli_fetch_assoc($lienketmax3);
                    $max=max($rowmax1['dem'],$rowmax2['dem'],$rowmax3['dem'])+1;

                    $tenbs=$_POST['tenbs'];
                    $truyvanbs="SELECT * FROM hosobacsy WHERE hoten='$tenbs'";
                    $lienketbs=mysqli_query($CONN,$truyvanbs);
                    $rowbs=mysqli_fetch_assoc($lienketbs);
                    if(isset($_POST['mara']))
                    {
                        $mara=$_POST['mara'];
                    }
                    if(isset($_POST['luunhorang'])){$noidung='Nhổ răng';}
                    if(isset($_POST['luuniengrang'])){$noidung='Niềng răng';}
                    if(isset($_POST['luulaycaorang'])){$noidung='Lấy cao răng';}
                    if(isset($_POST['luutaytrangrang'])){$noidung='Tẩy trắng răng';}
                    if(isset($_POST['luurangsuthammy'])){$noidung='Răng sứ thẩm mỹ';}
                    $ng=$_POST['ngay'];
                    $ngay=date('Y-m-d',strtotime($ng));
                    $truyvan="INSERT INTO lichhen(mabn,mabs,ngayhen,noidung,thuthuat,lankham) VALUES('$tentk','$rowbs[mabs]','$ngay','$noidung','$mara','$max')";
                    $lienket=mysqli_query($CONN,$truyvan)or die("sai");
                }
            //danh sách lịch trống
                if(isset($_POST['dlnhorang'])||isset($_POST['dlniengrang'])||isset($_POST['dllaycaorang'])||isset($_POST['dltaytrangrang'])||isset($_POST['dlrangsuthammy'])||isset($_POST['luunhorang'])||isset($_POST['luuniengrang'])||isset($_POST['luulaycaorang'])||isset($_POST['luutaytrangrang'])||isset($_POST['luurangsuthammy']))
                {
                    $mara=$_POST['mara'];
                    $tenrang=$_POST['tenrang'];
                    echo "<div class=div6></div>";
                    echo "<div class=div5>";
                    echo "<form method='POST'><input style='position:absolute;top:1%;left:94%;color:white;background-color:rgb(173, 75, 75);padding:5px;' type=submit name=thoat1 value='Thoát'></form>";
                    echo "<table class='bangdv' style='margin-left:3%;'>";
                    echo "<h4 style='text-align:center;'>DANH SÁCH LỊCH CÒN TRỐNG</h4>";
                    echo "<th></th><th>STT</th><th>Ngày</th> <th># Mã</th><th>Tên dịch vụ</th><th>Tên bác sĩ</th><th>Thao tác</th>";
                    $i=1;
                    $j=1;
                    while($i<8)
                    {
                                $truyvan="SELECT * FROM hosobacsy ";
                                $lienket=mysqli_query($CONN,$truyvan);
                                if(mysqli_num_rows($lienket)>0)
                                {
                                    while($row=mysqli_fetch_assoc($lienket))
                                    {
                                        $n=date('d');$ng=$n+$i;
                                        $ng1=date("Y-m-$ng");
                                        $ngay=date("$ng-m-Y");
                                        $truyvan1="SELECT * FROM lichhen WHERE ngayhen='$ng1' and mabs='$row[mabs]'";
                                        $lienket1=mysqli_query($CONN,$truyvan1);
                                        if(mysqli_num_rows($lienket1)<=0)
                                        {
                                                echo "<form method=POST><tr>";
                                                echo "<td ><input type=checkbox name=mara value='$mara'></td>";
                                                echo "<td style='width:80px;'>$j</td>";
                                                echo "<td><input type=text name=ngay value='$ngay'></td>";
                                                echo "<td><input type=text name=mara1 value='RA00$mara'></td>";
                                                echo "<td><input style='width:230px;' type=text name=tenrang value='$tenrang'></td>";
                                                echo "<td><input style='width:230px;' type=text name=tenbs value='$row[hoten]'></td>";
                                                if(isset($_POST['dlnhorang'])||isset($_POST['luunhorang'])){echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=luunhorang value='Đặt lịch'></td>";}
                                                if(isset($_POST['dlniengrang'])||isset($_POST['luuniengrang'])){echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=luuniengrang value='Đặt lịch'></td>";}
                                                if(isset($_POST['dllaycaorang'])||isset($_POST['luulaycaorang'])){echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=luulaycaorang value='Đặt lịch'></td>";}
                                                if(isset($_POST['dltaytrangrang'])||isset($_POST['luutaytrangrang'])){echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=luutaytrangrang value='Đặt lịch'></td>";}
                                                if(isset($_POST['dlrangsuthammy'])||isset($_POST['luurangsuthammy'])){echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=luurangsuthammy value='Đặt lịch'></td>";}
                                                $j++;
                                                echo "</tr></form>";
                                        }
                                    }
                                }$i++;
                            }
                    echo "</table>";
                    exit;
                    echo "</div>";
                }
        
        //===Bảng giá===
                echo "<div class='div3'>";
                echo "<form method=POST>";
                    echo "<input style='margin-left:1%;' type='submit' name='rangsuthammy1' value='Răng sứ thẩm mỹ'>";
                    echo "<input type='submit' name='nhorang1' value='Nhổ răng'>";
                    echo "<input type='submit' name='niengrang1' value='Niềng răng'>";
                    echo "<input type='submit' name='laycaorang1' value='Lấy cao răng'>";
                    echo "<input type='submit' name='taytrangrang1' value='Tẩy trắng răng'>";
                echo "</form>";
                echo "</div> ";

                //bảng giá lấy cao răng
                if(isset($_POST['thoat1'])||isset($_POST['laycaorang1'])||isset($_POST['sualaycaorang'])||isset($_POST['xoalaycaorang']))
                {
                    echo "<table class='bangdv'>";
                    echo "<th></th><th>STT</th> <th># Mã</th><th>Tên dịch vụ</th><th>Gía</th><th>Thao tác</th>";
                    $truyvan="SELECT * FROM rang WHERE dichvu='Lấy cao răng'";
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
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=dllaycaorang value='Đăt lịch'></td>";
                                echo "</tr></form>";
                                $i++;
                            }
                        }
                    echo "</table>";
                    exit;
                }
                //bảng giá nhổ răng
                if(isset($_POST['thoat1'])||isset($_POST['nhorang1'])||isset($_POST['suanr'])||isset($_POST['xoalaycaorang']))
                {
                    echo "<table class='bangdv'>";
                    echo "<th></th><th>STT</th> <th># Mã</th><th>Tên dịch vụ</th><th>Gía</th><th>Thao tác</th>";
                    $truyvan="SELECT * FROM rang WHERE dichvu='Nhổ răng'";
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
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=dlnhorang value='Đặt lịch'></td>";
                                echo "</tr></form>";
                                $i++;
                            }
                        }
                    echo "</table>";
                    exit;
                }

                //bảng giá niềng răng
                if(isset($_POST['niengrang1'])||isset($_POST['suaniengrang'])||isset($_POST['xoaniengrang']))
                {
                    echo "<table class='bangdv'>";
                    echo "<th></th><th>STT</th> <th># Mã</th><th>Tên dịch vụ</th><th>Gía</th><th>Thao tác</th>";
                    $truyvan="SELECT * FROM rang WHERE dichvu='Niềng răng'";
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
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=dlniengrang value='Đặt lịch'></td>";
                                echo "</tr></form>";
                                $i++;
                            }
                        }
                    echo "</table>";
                    exit;
                }

                //Bảng giá tẩy trắng răng
                if(isset($_POST['taytrangrang1'])||isset($_POST['suataytrangrang'])||isset($_POST['xoataytrangrang']))
                {
                    echo "<table class='bangdv'>";
                    echo "<th></th><th>STT</th> <th># Mã</th><th>Tên dịch vụ</th><th>Gía</th><th>Thao tác</th>";
                    $truyvan="SELECT * FROM rang WHERE dichvu='Tẩy trắng răng'";
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
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=dltaytrangrang value='Đặt lịch'></td>";
                                echo "</tr></form>";
                                $i++;
                            }
                        }
                    echo "</table>";
                    exit;
                }

                //Bảng giá răng sứ thẩm mỹ
                echo "<table class='bangdv'>";
                echo "<th></th><th>STT</th> <th># Mã</th><th>Tên dịch vụ</th><th>Gía</th><th>Thao tác</th>";
                $truyvan="SELECT * FROM rang WHERE dichvu='Răng sứ thẩm mỹ'";
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
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=dlniengrang value='Đặt lịch'></td>";
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