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
    .div3 input[type=submit]{
            padding:7px 77px;
            background-color:rgb(150, 200, 30);
            color:black;
            font-size:18px;
            margin-top:1%;
        }
    .div3 input[type=submit]:hover,.div4 input[type=submit]:hover{background-color:rgb(173, 75, 75);color:white;}
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
            padding:5px 31px;
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
    <?php include("GDQL_nhanvien.php") ; 
        $CONN = new mysqli('localhost','root','','qlpknk');
        mysqli_query($CONN,'SET NAMES UTF8');
     ?>
    <div class="div2">
        <p style="margin-left:1%;">Dịch vụ >> <span style="color:blue;">Bảng giá</span> </p>
    </div>
    <?php
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
                    if(isset($_POST['laycaorang1'])||isset($_POST['sualaycaorang'])||isset($_POST['xoalaycaorang']))
                    {
                        echo "<table class='bangdv'>";
                        echo "<th>STT</th> <th># Mã</th><th>Tên dịch vụ</th><th>Gía</th>";
                        $truyvan="SELECT * FROM rang WHERE dichvu='Lấy cao răng'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        if(mysqli_num_rows($lienket)>0)
                            {
                                $i=1;
                                while($row=mysqli_fetch_assoc($lienket))
                                {
                                    echo "<form method=POST><tr>";
                                    echo "<td style='width:110px;'>$i</td>";
                                    echo "<td><input type=text name=mara1 value='RA00$row[mara]'></td>";
                                    echo "<td><input style='width:430px;' type=text name=tenrang value='$row[tenrang]'></td>";
                                    $gia = number_format($row['gia']);
                                    echo "<td><input style='width:300px;' type=text name=gia value='$gia'></td>";
                                    echo "</tr></form>";
                                    $i++;
                                }
                            }
                        echo "</table>";
                        exit;
                    }
                    //bảng giá nhổ răng
                    if(isset($_POST['nhorang1'])||isset($_POST['suanr'])||isset($_POST['xoanr']))
                    {
                        echo "<table class='bangdv'>";
                        echo "<th>STT</th> <th># Mã</th><th>Tên dịch vụ</th><th>Gía</th>";
                        $truyvan="SELECT * FROM rang WHERE dichvu='Nhổ răng'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        if(mysqli_num_rows($lienket)>0)
                            {
                                $i=1;
                                while($row=mysqli_fetch_assoc($lienket))
                                {
                                    echo "<form method=POST><tr>";
                                    echo "<td style='width:110px;'>$i</td>";
                                    echo "<td><input type=text name=mara1 value='RA00$row[mara]'></td>";
                                    echo "<td><input style='width:430px;' type=text name=tenrang value='$row[tenrang]'></td>";
                                    $gia = number_format($row['gia']);
                                    echo "<td><input style='width:300px;' type=text name=gia value='$gia'></td>";
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
                        echo "<th>STT</th> <th># Mã</th><th>Tên dịch vụ</th><th>Gía</th>";
                        $truyvan="SELECT * FROM rang WHERE dichvu='Niềng răng'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        if(mysqli_num_rows($lienket)>0)
                            {
                                $i=1;
                                while($row=mysqli_fetch_assoc($lienket))
                                {
                                    echo "<form method=POST><tr>";
                                    echo "<td style='width:110px;'>$i</td>";
                                    echo "<td><input type=text name=mara1 value='RA00$row[mara]'></td>";
                                    echo "<td><input style='width:430px;' type=text name=tenrang value='$row[tenrang]'></td>";
                                    $gia = number_format($row['gia']);
                                    echo "<td><input style='width:300px;' type=text name=gia value='$gia'></td>";
                                    echo "</tr></form>";
                                }
                                $i++;
                            }
                        echo "</table>";
                        exit;
                    }
    
                    //Bảng giá tẩy trắng răng
                    if(isset($_POST['taytrangrang1'])||isset($_POST['suataytrangrang'])||isset($_POST['xoataytrangrang']))
                    {
                        echo "<table class='bangdv'>";
                        echo "<th>STT</th> <th># Mã</th><th>Tên dịch vụ</th><th>Gía</th>";
                        $truyvan="SELECT * FROM rang WHERE dichvu='Tẩy trắng răng'";
                        $lienket=mysqli_query($CONN,$truyvan);
                        if(mysqli_num_rows($lienket)>0)
                            {
                                $i=1;
                                while($row=mysqli_fetch_assoc($lienket))
                                {
                                    echo "<form method=POST><tr>";
                                    echo "<td style='width:110px;'>$i</td>";
                                    echo "<td><input type=text name=mara1 value='RA00$row[mara]'></td>";
                                    echo "<td><input style='width:430px;' type=text name=tenrang value='$row[tenrang]'></td>";
                                    $gia = number_format($row['gia']);
                                    echo "<td><input style='width:300px;' type=text name=gia value='$gia'></td>";
                                    echo "</tr></form>";
                                    $i++;
                                }
                            }
                        echo "</table>";
                        exit;
                    }
    
                    //Bảng giá răng sứ thẩm mỹ
                    echo "<table class='bangdv'>";
                    echo "<th>STT</th> <th># Mã</th><th>Tên dịch vụ</th><th>Số lượng kho</th><th>Gía</th>";
                    $truyvan="SELECT * FROM rang WHERE dichvu='Răng sứ thẩm mỹ'";
                    $lienket=mysqli_query($CONN,$truyvan);
                    if(mysqli_num_rows($lienket)>0)
                        {
                            $i=1;
                            while($row=mysqli_fetch_assoc($lienket))
                            {
                                echo "<form method=POST><tr>";
                                echo "<td style='width:90px;'>$i</td>";
                                echo "<td><input type=text name=mara1 value='RA00$row[mara]'></td>";
                                echo "<td><input style='width:235px;' type=text name=tenrang value='$row[tenrang]'></td>";
                                echo "<td><input type=text name=soluong value='$row[soluong]'></td>";
                                $gia = number_format($row['gia']);
                                echo "<td><input type=text name=gia value='$gia'></td>";
                                echo "</tr></form>";
                                $i++;
                            }
                        }
                    echo "</table>";
                    exit;
    ?>
</body>
</html>