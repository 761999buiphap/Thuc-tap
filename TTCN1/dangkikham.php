<?php include("giaodienquanlybacsy.php");  ?>
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
            margin:7px 2px 0 53%;
        }
        .div5{
            font-family:arial;
            margin:7% ;
            
        }
        .div5 input[type=text]{
            margin:5px;
            padding:5px;
            border:2px solid #bbb;
            
            margin-right:2px;
            
        }
        .div6{
            width:100%;
            height:40px;
            font-family:arial;
            display:inline-block;
        }
        .div6 a, input[type=submit],#themthuthuat,#lichhen,#donthuoc,#loidan{
            background-color:rgb(37, 158, 37);
            color:white;
            padding:5px;
        }
        #divthuthuat input{
            margin-right:5px;
            
        }
        .bang,th,td{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 2px 0px;
            font-family:arial;
        }
        #divlichhen input[type=text],#divlichhen textarea,#divdonthuoc input[type=text],#divdonthuoc textarea{
            border:none;
            text-align:center;
            font-family:arial;
            outline:none;
        }
        #divthuthuat input[type=text],#divthuthuat textarea{
            outline:none;
        }
        .div7{
            font-family:arial;
            margin:20px 10px 10px 30%;
        }
        .div7 input[type=text]{
            margin:5px;
            padding:5px;
            margin-right:2px;
            border:none;
            outline:none;
            font-size:15px;
        }
</style>
<div class="div2">
        <p>Dữ liệu >> <span style="color:blue;">Hồ sơ bệnh nhân</span> >> <span style="color:red;">Đăng kí khám</span>
        <div style="position:absolute;top:8px;right:0px;">
        <button id="themthuthuat">Thêm thủ thuật</button>
        <button id="lichhen">Lich hẹn</button>
        <button id="donthuoc">Đơn thuốc</button>
        </div>
        </p>
    </div>
<?php

$CONN = new mysqli('localhost','root','','qlpknk');
mysqli_query($CONN,'SET NAMES UTF8');
if(isset($_GET['mabn']))
{
    $mabn=$_GET['mabn'];
    $tentk=$_GET['tentk'];
    $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn'";
    $lienket1=mysqli_query($CONN,$truyvan1);
    if(mysqli_num_rows($lienket1)>0)
    {
        while($row1=mysqli_fetch_assoc($lienket1))
        {
                        echo "<br><h2 style='text-align:center;'>THÔNG TIN BỆNH NHÂN</h2><br>";
                        echo "<img style='position:absolute;width:20%;left:5%;' src='hinhanh/hoso.png' alt=''>";
                        echo "<div class='div7'>";
                        echo "<form method='POST' >";
                        echo "<lable for='mabn' style='font-weight:bold;'>1. Mã bệnh nhân:</lable>";
                        echo "<input style='margin-left:35px;' type='text' name='mabn' value='$row1[mabn]'>";
                        echo "<lable style='font-weight:bold;' for='email'>6. Email:</lable>";
                        echo "<input style='margin-left:86px;width:30%;' type='text' name='email' value='$row1[email]'><br>";
                        echo "<lable for='tenbn' style='font-weight:bold;'>2. Tên bệnh nhân:</lable>";
                        echo "<input style='margin-left:28px;' type='text' name='tenbn' value='$row1[hoten]'>";
                        echo "<lable for='diachi'style='font-weight:bold;'>7. Địa chỉ:</lable>";
                        echo "<input style='margin-left:76px;' type='text' name='diachi' value='$row1[diachi]'><br>";
                        echo "<lable for='nsbn' style='font-weight:bold;'>3. Ngày sinh:</lable>";
                        $ns=$row1['ngaysinh'];
                        $ngaysinh=date('d-m-Y',strtotime($ns));
                        $nd=$row1['ngayden'];
                        $ngayden=date('d-m-Y',strtotime($nd));
                        echo "<input style='margin-left:65px;' type='text' name='nsbn'value='$ngaysinh'>";
                        echo "<lable for='tieusubenh'style='font-weight:bold;'>8. Tiểu sử bệnh:</lable>";
                        echo "<input style='margin-left:30px;' type='text' name='tieusubenh' value='$row1[tieusubenh]'><br>";
                        echo "<lable style='font-weight:bold;' for='nsbn' >4. Giới tính:</lable>";
                        echo "<input style='border:none;margin-left:75px;' type='text' name='gioitinh' value='$row1[gioitinh]'>";
                        echo "<lable for='ngayden'style='font-weight:bold;'>9. Ngày đến:</lable>";
                        echo "<input style='margin-left:58px;border:none;' type='text' name='ngayden' value='$ngayden'><br>";
                        echo "<lable for='sdt'style='font-weight:bold;'>5. Số điện thoại:</lable>";
                        echo "<input style='margin-left:41px;' type='text' name='sdt'value='$row1[sdt]'><br>";
                        echo "</form>";
                        echo "</div>";

        }
    }
}
$truyvan1="SELECT * FROM hosobacsy WHERE mabs='$tentk'";
$lienket1=mysqli_query($CONN,$truyvan1);
$row1=mysqli_fetch_assoc($lienket1);
?>
<div class="div5">
        <form method="POST">
        <div class="div6" >
                <div id="divthuthuat" ></div>
                <div id="divlichhen"></div>
                <div id="divdonthuoc"></div>
        <input style='width:15%;font-size:13px; margin-top:15px;text-decoration:none;border:2px solid black;margin-left:40%;' type='submit' name='luu' value='Lưu kết quả'>
        <?php echo "<a class='a' style='width:10%;font-size:13px; margin-top:15px;text-decoration:none;border:2px solid black;'  href='HSBN_bacsy.php?tentk=".$tentk."&&mabn=$mabn&&quaylai='>Quay lại</a>";?>
        </div>
        </form>
    <script>
        //khi click vao nut tem thu thuat
        
        document.getElementById("themthuthuat").addEventListener("click", ttt);
        function ttt() {
            document.getElementById("divthuthuat").innerHTML ="<h3 style='color:green;'> --- Thêm thủ thuật --- </h3>" + "Ngày thực hiện:<?php echo date("d-m-Y");?>" + "<br>" +"Lần Khám: <input type='text' style='width:60%; margin-left:84px;' name='lankham1'><br>" +"Triệu chứng: <input type='text' style='width:60%; margin-left:72px;' name='trieuchung'>" + "<br>" +
            "Chuẩn đoán: <input style='width:60%; margin-left:70px;' type='text' name='chuandoan'>" + "<br>" + "Thủ thuật điều trị: <input style='width:60%; margin-left:38px;' type='text' name='thuthuat'>" + "<br>" +
            "Vị trí răng: <input style=' margin-left:88px;' type='text' name='vitrirang'>" +"<br>" + "Đơn giá: <input style=' margin-left:99px;' type='text' name='dongia'>" + "<br>" +"Số lượng: <input style='width:60%; margin-left:89px;' type='text' name='soluong'>" + "<br>" + "Bác sĩ thực hiện: <input style='width:60%; margin-left:40px;' type='text' name='bsth' value='<?php echo $row1['hoten']; ?>'>" + "<br>" +
            "Mã bác sĩ: <input style=' margin-left:86px;' type='text' name='mabs1' value='<?php echo $tentk; ?>'>" + "<br>"+"Ghi chú: <textarea style=' margin-left:100px;' name='ghichu' rows='3' cols='30'></textarea>" +"<br>";
            document.getElementById("themthuthuat").addEventListener("click", pp5);
        }
        //khi click vao lich hen
        document.getElementById("lichhen").addEventListener("click", lh);
        function lh() {
        document.getElementById("divlichhen").innerHTML="<h3 style='color:green;'> --- Lịch hẹn --- </h3>" + "<table class='bang' ><tr><th style='padding: 8px 25px;background-color:rgb(150, 200, 30);'>Lần Khám</th><th style='padding: 8px 25px;background-color:rgb(150, 200, 30);'>Ngày hẹn</th><th style='padding: 8px 15px;background-color:pink;'>Mã bác sĩ</th><th style='padding: 8px 60px;'>Tên bác sĩ</th><th style='padding: 8px 95px;'>Nội dung hẹn</th></tr>"+
        "<tr><td><input type='text' name='lankham2'></td><td><input type='text' name='ngayhen'</td><td><input type='text' name='mabs' value='<?php echo $tentk; ?>'></td><td><input type='text' name='tenbs' value='<?php echo $row1['hoten']; ?>'></td><td><textarea name='noidung' rows='2' cols='38'></textarea></td></tr></table>";
        }
        //khi click vao don thuoc
        document.getElementById("donthuoc").addEventListener("click", dt);
        function dt() {
        document.getElementById("divdonthuoc").innerHTML="<h3 style='color:green;'> --- Đơn thuốc --- </h3>"+ "<table class='bang'><tr><th style='background-color:rgb(150, 200, 30);width:185px;'>Lần khám</th><th style='background-color:rgb(150, 200, 30);'>Tên thuốc</th><th style=background-color:pink;'>Liều lượng và cách dùng</th><th >Số lượng(hộp)</th><th >Lời dặn</th></tr>"+
        "<tr><td><input type='text' name='lankham3'></td><td><textarea  name='tenthuoc' rows='2' cols='22'></textarea></td><td><textarea name='cachdung' rows='2' cols='52'></textarea></td><td><input type='text' name='soluongthuoc'></td><td><textarea name='loidan' rows='2' cols='31'></textarea></td></tr></table>";
        
        }
       
    </script>

<?php
//đăng kí khám
if(isset($_POST['luu']))
{
    //khi chi them thu thuat
    if(isset($_POST['lankham1']) && !isset($_POST['lankham2']) && !isset($_POST['lankham3']) &&!isset($_POST['soluongthuoc']) && !isset($_POST['cachdung']) && !isset($_POST['tenthuoc'])  && !isset($_POST['noidung']) && !isset($_POST['tenbs']) && !isset($_POST['mabs']) && !isset($_POST['ngayhen']) && isset($_POST['ghichu'])&& isset($_POST['bsth']) && isset($_POST['mabs1']) && isset($_POST['soluong']) && isset($_POST['dongia']) && isset($_POST['vitrirang']) && isset($_POST['thuthuat']) && isset($_POST['chuandoan']) && isset($_POST['trieuchung']))
    {
        $ngaythuchien=date('Y-m-d');
        $trieuchung=$_POST['trieuchung'];
        $chuandoan=$_POST['chuandoan'];
        $thuthuat=$_POST['thuthuat'];
        $vitrirang=$_POST['vitrirang'];
        $dongia=$_POST['dongia'];
        $soluong=$_POST['soluong'];
        $tenbs1=$_POST['bsth'];
        $mabs1=$_POST['mabs1'];
        $ghichu=$_POST['ghichu'];
        $lankham1=$_POST['lankham1'];
        if(!empty($lankham1) && !empty($trieuchung) && !empty($chuandoan) && !empty($thuthuat) && !empty($vitrirang) && !empty($dongia) && !empty($soluong) && !empty($tenbs1) && !empty($mabs1) && !empty($ghichu) )
        {
                    $truyvan2="SELECT mabs,hoten FROM hosobacsy WHERE mabs='$mabs1' AND hoten='$tenbs1'";
                    $lienket2=mysqli_query($CONN,$truyvan2);
                    if(mysqli_num_rows($lienket2)>0)
                    {
                        $truyvan3= "INSERT INTO thuthuat(lankham,mabn,mabs,ngaythuchien,trieuchung,chuandoan,thuthuatdieutri,vitrirang,gia,soluong,ghichu) VALUES('$lankham1','$mabn','$mabs1','$ngaythuchien','$trieuchung','$chuandoan','$thuthuat','$vitrirang','$dongia','$soluong','$ghichu')";
                        $lienket4 = mysqli_query($CONN,$truyvan3)or die("sai2");
                        echo "<h3 style=' margin-left:40%;color:red;'> Đăng kí thành công ! </h3>";
                        echo "<a style='background-color:rgb(37, 158, 37);color:white;padding:5px;width:10%;font-size:13px; margin-top:15px;margin-left:45%;text-decoration:none;border:2px solid black;'  href='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$lankham2'>In kết quả</a>";
                        $truyvan6="SELECT * FROM thuoc WHERE tenthuoc='$tenthuoc'";
                        $lienket6=mysqli_query($CONN,$truyvan6);
                        if(mysqli_num_rows($lienket6)>0)
                        {
                            $row6=mysqli_fetch_assoc($lienket6);
                            $soluong=$row6['soluong']-$soluongthuoc;
                            $truyvan6_1="UPDATE thuoc SET soluong='$soluong' WHERE tenthuoc='$tenthuoc'";
                            $truyvan6_1=mysqli_query($CONN,$truyvan6_1);
                        }
                    }
        }
        else
            echo "<h3 style=' margin-left:40%;color:red;'>< Nhập vào đầy đủ thông tin  ></h3>";
    }
    //khi chi them thu thuat va lich hen
    if(isset($_POST['lankham1']) && isset($_POST['lankham2']) && !isset($_POST['lankham3']) && !isset($_POST['soluongthuoc']) && !isset($_POST['cachdung']) && !isset($_POST['tenthuoc'])  && isset($_POST['noidung']) && isset($_POST['tenbs']) && isset($_POST['mabs']) && isset($_POST['ngayhen']) && isset($_POST['ghichu'])&& isset($_POST['bsth']) && isset($_POST['soluong']) && isset($_POST['dongia']) && isset($_POST['vitrirang']) && isset($_POST['thuthuat']) && isset($_POST['chuandoan']) && isset($_POST['trieuchung']))
    {
        $ngaythuchien=date('Y-m-d');
        $trieuchung=$_POST['trieuchung'];
        $chuandoan=$_POST['chuandoan'];
        $thuthuat=$_POST['thuthuat'];
        $vitrirang=$_POST['vitrirang'];
        $dongia=$_POST['dongia'];
        $soluong=$_POST['soluong'];
        $tenbs1=$_POST['bsth'];
        $mabs1=$_POST['mabs1'];
        $ghichu=$_POST['ghichu'];
        $nh=$_POST['ngayhen'];
        $ngayhen=date('Y-m-d',strtotime($nh));
        $mabs=$_POST['mabs'];
        $tenbs=$_POST['tenbs'];
        $noidung=$_POST['noidung'];
        $lankham1=$_POST['lankham1'];
        $lankham2=$_POST['lankham2'];
        if(!empty($lankham1) &&!empty($lankham2)&& !empty($trieuchung) && !empty($chuandoan) && !empty($thuthuat) && !empty($vitrirang) && !empty($dongia) && !empty($soluong) && !empty($tenbs1) && !empty($mabs1) && !empty($ghichu) && !empty($ngayhen) && !empty($mabs) && !empty($tenbs) && !empty($noidung) )
        {
            
                    $truyvan2="SELECT mabs,hoten FROM hosobacsy WHERE mabs='$mabs1' AND hoten='$tenbs1'";
                    $lienket2=mysqli_query($CONN,$truyvan2);
                    if(mysqli_num_rows($lienket2)>0)
                    {
                        $truyvan3= "INSERT INTO thuthuat(lankham,mabn,mabs,ngaythuchien,trieuchung,chuandoan,thuthuatdieutri,vitrirang,gia,soluong,ghichu) VALUES('$lankham1','$mabn','$mabs1','$ngaythuchien','$trieuchung','$chuandoan','$thuthuat','$vitrirang','$dongia','$soluong','$ghichu')";
                        $lienket3 = mysqli_query($CONN,$truyvan3)or die("sai2");
                        $truyvan4= "INSERT INTO lichhen(lankham,ngayhen,mabn,mabs,noidung) VALUES('$lankham2','$ngayhen','$mabn','$mabs','$noidung')";
                        $lienket4 = mysqli_query($CONN,$truyvan4)or die("sai3");
                        echo "<h3 style=' margin-left:40%;color:red;'> Đăng kí thành công ! </h3>";
                        echo "<a style='background-color:rgb(37, 158, 37);color:white;padding:5px;width:10%;font-size:13px; margin-top:15px;margin-left:45%;text-decoration:none;border:2px solid black;'  href='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$lankham2'>In kết quả</a>";
                        $truyvan6="SELECT * FROM thuoc WHERE tenthuoc='$tenthuoc'";
                        $lienket6=mysqli_query($CONN,$truyvan6);
                        if(mysqli_num_rows($lienket6)>0)
                        {
                            $row6=mysqli_fetch_assoc($lienket6);
                            $soluong=$row6['soluong']-$soluongthuoc;
                            $truyvan6_1="UPDATE thuoc SET soluong='$soluong' WHERE tenthuoc='$tenthuoc'";
                            $truyvan6_1=mysqli_query($CONN,$truyvan6_1);
                        }
                    }
        }
        else
            echo "<h3 style=' margin-left:40%;color:red;'>< Nhập vào đầy đủ thông tin ></h3>";
    
    
    }
        //khi chi them thu thuat, lich hen, don thuoc
    if(isset($_POST['lankham1']) && isset($_POST['lankham2']) && isset($_POST['lankham3']) &&isset($_POST['soluongthuoc']) && isset($_POST['cachdung']) && isset($_POST['tenthuoc'])  && isset($_POST['noidung']) && isset($_POST['tenbs']) && isset($_POST['mabs']) && isset($_POST['ngayhen']) && isset($_POST['ghichu'])&& isset($_POST['bsth']) && isset($_POST['soluong']) && isset($_POST['dongia']) && isset($_POST['vitrirang']) && isset($_POST['thuthuat']) && isset($_POST['chuandoan']) && isset($_POST['trieuchung'])  && isset($_POST['loidan']))
    {
        $ngaythuchien=date('Y-m-d');
        $trieuchung=$_POST['trieuchung'];
        $chuandoan=$_POST['chuandoan'];
        $thuthuat=$_POST['thuthuat'];
        $vitrirang=$_POST['vitrirang'];
        $dongia=$_POST['dongia'];
        $soluong=$_POST['soluong'];
        $tenbs1=$_POST['bsth'];
        $mabs1=$_POST['mabs1'];
        $ghichu=$_POST['ghichu'];
        $nh=$_POST['ngayhen'];
        $ngayhen=date('Y-m-d',strtotime($nh));
        $mabs=$_POST['mabs'];
        $tenbs=$_POST['tenbs'];
        $noidung=$_POST['noidung'];
        $tenthuoc=$_POST['tenthuoc'];
        $cachdung=$_POST['cachdung'];
        $soluongthuoc=$_POST['soluongthuoc'];
        $loidan=$_POST['loidan'];
        $lankham1=$_POST['lankham1'];
        $lankham2=$_POST['lankham2'];
        $lankham3=$_POST['lankham3'];
        if(!empty($lankham1) &&!empty($lankham2) &&!empty($lankham3) && !empty($trieuchung) && !empty($chuandoan) && !empty($thuthuat) && !empty($vitrirang) && !empty($dongia) && !empty($soluong) && !empty($tenbs1) && !empty($mabs1) && !empty($ghichu) && !empty($ngayhen) && !empty($mabs) && !empty($tenbs) && !empty($noidung) && !empty($tenthuoc) && !empty($cachdung) && !empty($soluongthuoc) && !empty($loidan))
        {
                    $truyvan2="SELECT mabs,hoten FROM hosobacsy WHERE mabs='$mabs1' AND hoten='$tenbs1'";
                    $lienket2=mysqli_query($CONN,$truyvan2);
                    if(mysqli_num_rows($lienket2)>0)
                    {
                        $truyvan3= "INSERT INTO thuthuat(lankham,mabn,mabs,ngaythuchien,trieuchung,chuandoan,thuthuatdieutri,vitrirang,gia,soluong,ghichu) VALUES('$lankham1','$mabn','$mabs1','$ngaythuchien','$trieuchung','$chuandoan','$thuthuat','$vitrirang','$dongia','$soluong','$ghichu')";
                        $lienket3 = mysqli_query($CONN,$truyvan3)or die("sai2");
                        $truyvan4= "INSERT INTO lichhen(lankham,ngayhen,mabn,mabs,noidung) VALUES('$lankham2','$ngayhen','$mabn','$mabs','$noidung')";
                        $lienket4 = mysqli_query($CONN,$truyvan4)or die("sai3");
                        $truyvan5= "INSERT INTO donthuoc(lankham,mabn,mabs,tenthuoc,cachdung,soluong,loidan) VALUES('$lankham3','$mabn','$tentk','$tenthuoc','$cachdung','$soluong','$loidan')";
                        $lienket5 = mysqli_query($CONN,$truyvan5)or die("sai4");
                        echo "<h3 style=' margin-left:40%;color:red;'> Ghi thành công ! </h3>";
                        echo "<a style='background-color:rgb(37, 158, 37);color:white;padding:5px;width:10%;font-size:13px; margin-top:15px;margin-left:45%;text-decoration:none;border:2px solid black;'  href='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$lankham3'>In kết quả</a>";
                        $truyvan6="SELECT * FROM thuoc WHERE tenthuoc='$tenthuoc'";
                        $lienket6=mysqli_query($CONN,$truyvan6);
                        if(mysqli_num_rows($lienket6)>0)
                        {
                            $row6=mysqli_fetch_assoc($lienket6);
                            $soluong=$row6['soluong']-$soluongthuoc;
                            $truyvan6_1="UPDATE thuoc SET soluong='$soluong' WHERE tenthuoc='$tenthuoc'";
                            $truyvan6_1=mysqli_query($CONN,$truyvan6_1);
                        }
                    }
        }
        else
            echo "<h3 style=' margin-left:40%;color:red;'>< Nhập vào đầy đủ thông tin ></h3>";
    }
    //khi chi co them thu thuat va don thuoc
    if(isset($_POST['lankham1']) && !isset($_POST['lankham2']) && isset($_POST['lankham3']) &&isset($_POST['soluongthuoc']) && isset($_POST['cachdung']) && isset($_POST['tenthuoc'])  && !isset($_POST['noidung']) && !isset($_POST['tenbs']) && !isset($_POST['mabs']) && !isset($_POST['ngayhen'])  && isset($_POST['ghichu'])&& isset($_POST['bsth']) && isset($_POST['soluong']) && isset($_POST['dongia']) && isset($_POST['vitrirang']) && isset($_POST['thuthuat']) && isset($_POST['chuandoan']) && isset($_POST['trieuchung'])  && isset($_POST['loidan']))
    {
        $ngaythuchien=date('Y-m-d');
        $trieuchung=$_POST['trieuchung'];
        $chuandoan=$_POST['chuandoan'];
        $thuthuat=$_POST['thuthuat'];
        $vitrirang=$_POST['vitrirang'];
        $dongia=$_POST['dongia'];
        $soluong=$_POST['soluong'];
        $tenbs1=$_POST['bsth'];
        $mabs1=$_POST['mabs1'];
        $ghichu=$_POST['ghichu'];
        $tenthuoc=$_POST['tenthuoc'];
        $cachdung=$_POST['cachdung'];
        $soluongthuoc=$_POST['soluongthuoc'];
        $loidan=$_POST['loidan'];
        $lankham1=$_POST['lankham1'];
        $lankham3=$_POST['lankham3'];

        if(!empty($lankham1) &&!empty($lankham3) && !empty($trieuchung)&& !empty($chuandoan) && !empty($thuthuat) && !empty($vitrirang) && !empty($dongia) && !empty($soluong) && !empty($tenbs1) && !empty($mabs1) && !empty($ghichu) && empty($ngayhen) && empty($mabs) && empty($tenbs) && empty($noidung) && !empty($tenthuoc) && !empty($cachdung) && !empty($soluongthuoc) && !empty($loidan))
        {
                    $truyvan2="SELECT mabs,hoten FROM hosobacsy WHERE mabs='$mabs1' AND hoten='$tenbs1'";
                    $lienket2=mysqli_query($CONN,$truyvan2);
                    if(mysqli_num_rows($lienket2)>0)
                    {
                        $truyvan3= "INSERT INTO thuthuat(lankham,mabn,mabs,ngaythuchien,trieuchung,chuandoan,thuthuatdieutri,vitrirang,gia,soluong,ghichu) VALUES('$lankham1','$mabn','$mabs1','$ngaythuchien','$trieuchung','$chuandoan','$thuthuat','$vitrirang','$dongia','$soluong','$ghichu')";
                        $lienket3 = mysqli_query($CONN,$truyvan3)or die("sai2");
                        $truyvan5= "INSERT INTO donthuoc(lankham,mabn,mabs,tenthuoc,cachdung,soluong,loidan) VALUES('$lankham3','$mabn','$tentk','$tenthuoc','$cachdung','$soluong','$loidan')";
                        $lienket5 = mysqli_query($CONN,$truyvan5)or die("sai3");
                        echo "<h3 style=' margin-left:40%;color:red;'> Ghi thành công ! </h3>";
                        echo "<a style='background-color:rgb(37, 158, 37);color:white;padding:5px;width:10%;font-size:13px; margin-top:15px;margin-left:45%;text-decoration:none;border:2px solid black;'  href='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$lankham3'>In kết quả</a>";
                        $truyvan6="SELECT * FROM thuoc WHERE tenthuoc='$tenthuoc'";
                        $lienket6=mysqli_query($CONN,$truyvan6);
                        if(mysqli_num_rows($lienket6)>0)
                        {
                            $row6=mysqli_fetch_assoc($lienket6);
                            $soluong=$row6['soluong']-$soluongthuoc;
                            $truyvan6_1="UPDATE thuoc SET soluong='$soluong' WHERE tenthuoc='$tenthuoc'";
                            $truyvan6_1=mysqli_query($CONN,$truyvan6_1);
                        }
                    }
        }
        else
            echo "<h3 style=' margin-left:40%;color:red;'>< Nhập vào đầy đủ thông tin ></h3>";
    }
    //khi chi them  lich hen, don thuoc
    if(!isset($_POST['lankham1']) && isset($_POST['lankham2']) && isset($_POST['lankham3']) &&isset($_POST['soluongthuoc']) && isset($_POST['cachdung']) && isset($_POST['tenthuoc'])  && isset($_POST['noidung']) && isset($_POST['tenbs']) && isset($_POST['mabs']) && isset($_POST['ngayhen']) && !isset($_POST['ghichu'])&& !isset($_POST['bsth']) && !isset($_POST['soluong']) && !isset($_POST['dongia']) && !isset($_POST['vitrirang']) && !isset($_POST['thuthuat']) && !isset($_POST['chuandoan']) && !isset($_POST['trieuchung'])  && isset($_POST['loidan']))
    {
        $ngaythuchien=date('Y-m-d');
        $nh=$_POST['ngayhen'];
        $ngayhen=date('Y-m-d',strtotime($nh));
        $mabs=$_POST['mabs'];
        $tenbs=$_POST['tenbs'];
        $noidung=$_POST['noidung'];
        $tenthuoc=$_POST['tenthuoc'];
        $cachdung=$_POST['cachdung'];
        $soluongthuoc=$_POST['soluongthuoc'];
        $loidan=$_POST['loidan'];
        $lankham2=$_POST['lankham2'];
        $lankham3=$_POST['lankham3'];
        if(!empty($lankham2) &&!empty($lankham3) && empty($trieuchung) && empty($chuandoan) && empty($thuthuat) && empty($vitrirang) && empty($dongia) && empty($soluong) && empty($tenbs1) && empty($mabs1) && empty($ghichu) && !empty($ngayhen) && !empty($mabs) && !empty($tenbs) && !empty($noidung) && !empty($tenthuoc) && !empty($cachdung) && !empty($soluongthuoc) && !empty($loidan))
        {
                    $truyvan2="SELECT mabs,hoten FROM hosobacsy WHERE mabs='$mabs' AND hoten='$tenbs'";
                    $lienket2=mysqli_query($CONN,$truyvan2);
                    if(mysqli_num_rows($lienket2)>0)
                    {
                        $truyvan4= "INSERT INTO lichhen(lankham,ngayhen,mabn,mabs,noidung) VALUES('$lankham2','$ngayhen','$mabn','$mabs','$noidung')";
                        $lienket4 = mysqli_query($CONN,$truyvan4)or die("sai3");
                        $truyvan5= "INSERT INTO donthuoc(lankham,mabn,'mabs',tenthuoc,cachdung,soluong,loidan) VALUES('$lankham3','$mabn','$tentk','$tenthuoc','$cachdung','$soluongthuoc','$loidan')";
                        $lienket5 = mysqli_query($CONN,$truyvan5)or die("sai4");
                        echo "<h3 style=' margin-left:40%;color:red;'> Ghi thành công ! </h3>";
                        echo "<a style='background-color:rgb(37, 158, 37);color:white;padding:5px;width:10%;font-size:13px; margin-top:15px;margin-left:45%;text-decoration:none;border:2px solid black;'  href='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$lankham2'>In kết quả</a>";
                        $truyvan6="SELECT * FROM thuoc WHERE tenthuoc='$tenthuoc'";
                        $lienket6=mysqli_query($CONN,$truyvan6);
                        if(mysqli_num_rows($lienket6)>0)
                        {
                            $row6=mysqli_fetch_assoc($lienket6);
                            $soluong=$row6['soluong']-$soluongthuoc;
                            $truyvan6_1="UPDATE thuoc SET soluong='$soluong' WHERE tenthuoc='$tenthuoc'";
                            $truyvan6_1=mysqli_query($CONN,$truyvan6_1);
                        }
                    }
        }
        else
            echo "<h3 style=' margin-left:40%;color:red;'>< Nhập vào đầy đủ thông tin ></h3>";
    }
      //khi chi them  lich hen
      if(!isset($_POST['lankham1']) && isset($_POST['lankham2']) && !isset($_POST['lankham3']) && !isset($_POST['soluongthuoc']) && !isset($_POST['cachdung']) && !isset($_POST['tenthuoc'])  && isset($_POST['noidung']) && isset($_POST['tenbs']) && isset($_POST['mabs']) && isset($_POST['ngayhen']) && !isset($_POST['ghichu'])&& !isset($_POST['bsth']) && !isset($_POST['soluong']) && !isset($_POST['dongia']) && !isset($_POST['vitrirang']) && !isset($_POST['thuthuat']) && !isset($_POST['chuandoan']) && !isset($_POST['trieuchung'])  && !isset($_POST['loidan']))
      {
          $nh=$_POST['ngayhen'];
          $ngayhen=date('Y-m-d',strtotime($nh));
          $mabs=$_POST['mabs'];
          $tenbs=$_POST['tenbs'];
          $noidung=$_POST['noidung'];
          $lankham2=$_POST['lankham2'];
          if(!empty($lankham2) && !empty($ngayhen) && !empty($mabs) && !empty($tenbs) && !empty($noidung))
          {
                      $truyvan2="SELECT mabs,hoten FROM hosobacsy WHERE mabs='$mabs' AND hoten='$tenbs'";
                      $lienket2=mysqli_query($CONN,$truyvan2);
                      if(mysqli_num_rows($lienket2)>0)
                      {
                          $truyvan4= "INSERT INTO lichhen(lankham,ngayhen,mabn,mabs,noidung) VALUES('$lankham2','$ngayhen','$mabn','$mabs','$noidung')";
                          $lienket4 = mysqli_query($CONN,$truyvan4)or die("sai3");
                          echo "<h3 style=' margin-left:40%;color:red;'> Ghi thành công ! </h3>";
                          echo "<a style='background-color:rgb(37, 158, 37);color:white;padding:5px;width:10%;font-size:13px; margin-top:15px;margin-left:45%;text-decoration:none;border:2px solid black;'  href='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$lankham2'>In kết quả</a>";
                      }
          }
          else
              echo "<h3 style=' margin-left:40%;color:red;'>< Nhập vào đầy đủ thông tin ></h3>";
      }
         //khi chi them don thuoc
    if(!isset($_POST['lankham1']) && !isset($_POST['lankham2']) && isset($_POST['lankham3']) && isset($_POST['soluongthuoc']) && isset($_POST['cachdung']) && isset($_POST['tenthuoc'])  && !isset($_POST['noidung']) && !isset($_POST['tenbs']) && !isset($_POST['mabs']) && !isset($_POST['ngayhen']) && !isset($_POST['ghichu'])&& !isset($_POST['bsth']) && !isset($_POST['soluong']) && !isset($_POST['dongia']) && !isset($_POST['vitrirang']) && !isset($_POST['thuthuat']) && !isset($_POST['chuandoan']) && !isset($_POST['trieuchung'])  && isset($_POST['loidan']))
    {
        $tenthuoc=$_POST['tenthuoc'];
        $cachdung=$_POST['cachdung'];
        $soluongthuoc=$_POST['soluongthuoc'];
        $loidan=$_POST['loidan'];
        $lankham3=$_POST['lankham3'];
        if(!empty($lankham3) &&! empty($tenthuoc) && !empty($cachdung) && !empty($soluongthuoc) && !empty($loidan))
        {
                        $truyvan5= "INSERT INTO donthuoc(lankham,mabn,mabs,tenthuoc,cachdung,soluong,loidan) VALUES('$lankham3','$mabn','$tentk','$tenthuoc','$cachdung','$soluongthuoc','$loidan')";
                        $lienket5 = mysqli_query($CONN,$truyvan5)or die("sai4");
                        echo "<h3 style=' margin-left:40%;color:red;'> Ghi thành công ! </h3>";
                        echo "<a style='background-color:rgb(37, 158, 37);color:white;padding:5px;width:10%;font-size:13px; margin-top:15px;margin-left:45%;text-decoration:none;border:2px solid black;'  href='phieuketqua.php?tentk=".$tentk."&&mabn=$mabn&&lan=$lankham3'>In kết quả</a>";
                        $truyvan6="SELECT * FROM thuoc WHERE tenthuoc='$tenthuoc'";
                        $lienket6=mysqli_query($CONN,$truyvan6);
                        if(mysqli_num_rows($lienket6)>0)
                        {
                            $row6=mysqli_fetch_assoc($lienket6);
                            $soluong=$row6['soluong']-$soluongthuoc;
                            $truyvan6_1="UPDATE thuoc SET soluong='$soluong' WHERE tenthuoc='$tenthuoc'";
                            $truyvan6_1=mysqli_query($CONN,$truyvan6_1);
                        }
            }
        else
            echo "<h3 style=' margin-left:40%;color:red;'>< Nhập vào đầy đủ thông tin ></h3>";
    }
}
?>

    </div>