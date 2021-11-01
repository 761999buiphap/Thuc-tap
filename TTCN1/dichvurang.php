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
        <p style="margin-left:1%;">Thuốc >> <span style="color:blue;">Dịch vụ</span> </p>
        <div class="div4">
        <form  method=POST>
            <input type="submit" name='banggia' value='Bảng giá'>
            <input type="submit" name='lichsu' value='Lịch sử các dịch vụ'>
            <input type="submit" name='them' value='+ Thêm'>
        </form>
        </div>
    </div>
        <?php
            //===Thêm dịch vụ===
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
                    echo "<th>Tên dịch vụ</th><th>Gía</th><th>Số lượng</th><th>Loại dịch vụ</th><th>Thao tác</th>";
                                echo "<form method=POST><tr style='height:70px;'>";
                                echo "<td><input style='width:250px;' type=text name=tendv value=''></td>";
                                echo "<td><input style='width:250px;' type=text name=gia value=''></td>";
                                echo "<td><input style='width:300px;' type=text name=soluong value=''></td>";
                                echo "<td><select style='font-size:17px;width:300px;outline:none;padding:15px 20px;font-weight:normal; ' id=loaidv name='loaidv'> <option value='Răng sứ thẩm mỹ'>Răng sứ thẩm mỹ</option><option value='Lấy cao răng'>Lấy cao răng</option><option value='Niềng răng'>Niềng răng</option><option value='Nhổ răng'>Nhổ răng</option><option value='Tẩy trắng răng'>Tẩy trắng răng</option></select></td>";
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=luu value='Thêm'></td>";
                    echo "</table>";
                    exit;
            }
            //===lịch sử các dịch vụ===
            if(isset($_POST['lichsu'])||isset($_POST['nhorang'])||isset($_POST['niengrang'])||isset($_POST['rangsuthammy'])||isset($_POST['taytrangrang'])||isset($_POST['laycaorang']))
            {
                echo "<div class='div3'>";
                echo "<form method=POST>";
                    echo "<input style='margin-left:1%;' type='submit' name='laycaorang' value='Lấy cao răng'>";
                    echo "<input type='submit' name='nhorang' value='Nhổ răng'>";
                    echo "<input type='submit' name='niengrang' value='Niềng răng'>";
                    echo "<input type='submit' name='rangsuthammy' value='Răng sứ thẩm mỹ'>";
                    echo "<input type='submit' name='taytrangrang' value='Tẩy trắng răng'>";
                echo "</form>";
                echo "</div> ";
                
                //Xuất ra danh sách người nhổ răng
                if(isset($_POST['nhorang']))
                {
                    $truyvansum="SELECT COUNT(id) AS dem FROM nhorang ";
                    $lienketsum=mysqli_query($CONN,$truyvansum);
                    $rowsum=mysqli_fetch_assoc($lienketsum);
                    echo "<h4 style='text-align:center;'>Tổng số ca đã thực hiện: <span style='color:red;'>$rowsum[dem] </span> </h4>";
                    echo "<table class=bang>";
                    echo "<th>STT</th><th># mabn</th><th>Họ tên</th><th># mabs</th><th>Họ tên</th><th>Thủ thuật</th><th>Tình trạng</th><th>Số lượng răng</th><th>Số răng</th><th>Ngày</th><th>Dụng cụ</th><th>Đề nghị</th><th>ghi chú</th>";
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
                            echo "<td>Nhổ răng</td>";
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
    
                //Xuất ra danh sách người niềng răng
                if(isset($_POST['niengrang']))
                {
                    $truyvansum="SELECT COUNT(mabs) AS dem FROM niengrang ";
                    $lienketsum=mysqli_query($CONN,$truyvansum);
                    $rowsum=mysqli_fetch_assoc($lienketsum);
                    echo "<h4 style='text-align:center;'>Tổng số ca đã thực hiện: <span style='color:red;'>$rowsum[dem] </span> </h4>";
                    echo "<table class=bang>";
                    echo "<th>STT</th><th># mabn</th><th>Họ tên</th><th># mabs</th><th>Họ tên</th><th>Thủ thuật</th><th>Tình trạng</th><th>Loại mắc cài</th><th>Giai đoạn niềng</th><th>Ngày</th><th>Dụng cụ</th><th>Đề nghị</th><th>ghi chú</th>";
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
                            echo "<td>Nhổ răng</td>";
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
    
                //Xuất ra danh sách người lam rang su tham my
                if(isset($_POST['rangsuthammy']))
                {
                    $truyvansum="SELECT COUNT(mabs) AS dem FROM rangsuthammy ";
                    $lienketsum=mysqli_query($CONN,$truyvansum);
                    $rowsum=mysqli_fetch_assoc($lienketsum);
                    echo "<h4 style='text-align:center;'>Tổng số ca đã thực hiện: <span style='color:red;'>$rowsum[dem] </span> </h4>";
                    echo "<table class=bang>";
                    echo "<th>STT</th><th># mabn</th><th>Họ tên</th><th># mabs</th><th>Họ tên</th><th>Thủ thuật</th><th>Loại răng</th><th>Số lượng răng</th><th>Ngày</th><th>Dụng cụ</th><th>Đề nghị</th><th>ghi chú</th>";
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
                            echo "<td>Răng sứ thẩm mỹ</td>";
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
    
                //Xuất ra danh sách người lam tay trang rang
                if(isset($_POST['taytrangrang']))
                {
                    $truyvansum="SELECT COUNT(mabs) AS dem FROM taytrangrang ";
                    $lienketsum=mysqli_query($CONN,$truyvansum);
                    $rowsum=mysqli_fetch_assoc($lienketsum);
                    echo "<h4 style='text-align:center;'>Tổng số ca đã thực hiện: <span style='color:red;'>$rowsum[dem] </span> </h4>";
                    echo "<table class=bang>";
                    echo "<th>STT</th><th># mabn</th><th>Họ tên</th><th># mabs</th><th>Họ tên</th><th>Thủ thuật</th><th>Ngày</th><th>Dụng cụ</th><th>Đề nghị</th><th>ghi chú</th>";
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
                            echo "<td>Tẩy trắng răng</td>";
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
    
                //Xuất ra danh sách người lấy cao răng
                if(isset($_POST['laycaorang'])||isset($_GET['dichvu']))
                {
                    $truyvansum="SELECT COUNT(mabs) AS dem FROM laycaorang ";
                    $lienketsum=mysqli_query($CONN,$truyvansum);
                    $rowsum=mysqli_fetch_assoc($lienketsum);
                    echo "<h4 style='text-align:center;'>Tổng số ca đã thực hiện: <span style='color:red;'>$rowsum[dem] </span> </h4>";
                    echo "<table class=bang>";
                    echo "<th>STT</th><th># mabn</th><th>Họ tên</th><th># mabs</th><th>Họ tên</th><th>Thủ thuật</th><th>Ngày</th><th>Dụng cụ</th><th>Đề nghị</th><th>ghi chú</th>";
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
                            echo "<td>Tẩy trắng răng</td>";
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
            
            //===Bảng giá===
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
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=sualaycaorang value='Sửa'><input type=submit name=xoalaycaorang value='Xóa'></td>";
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
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=suanr value='Sửa'><input type=submit name=xoanr value='Xóa'></td>";
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
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=sualaycaorang value='Sửa'><input type=submit name=xoalaycaorang value='Xóa'></td>";
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
                                echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=sualaycaorang value='Sửa'><input type=submit name=xoalaycaorang value='Xóa'></td>";
                                echo "</tr></form>";
                                $i++;
                            }
                        }
                    echo "</table>";
                    exit;
                }

                //Bảng giá răng sứ thẩm mỹ
                echo "<table class='bangdv'>";
                echo "<th></th><th>STT</th> <th># Mã</th><th>Tên dịch vụ</th><th>Số lượng kho</th><th>Gía</th><th>Thao tác</th>";
                $truyvan="SELECT * FROM rang WHERE dichvu='Răng sứ thẩm mỹ'";
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
                            echo "<td style='width:200px;'><input style='margin-right:4px;' type=submit name=suarangsu value='Sửa'><input type=submit name=xoarangsu value='Xóa'></td>";
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