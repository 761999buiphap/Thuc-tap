<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
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
            margin:7px 2px 0 63%;
        }
        .div2form input{
            padding:5px;
        }
        .div3{
            text-align:center;
            font-family:arial;
            border-color:black;
        }
        .bang th,td{
            border-collapse: collapse;
            padding: 8px 2px;
        }
        .div4{
            font-family:arial;
            margin:10px;
        }
        .div4 input[type=text]{
            margin:5px;
            padding:5px;
            border:2px solid #bbb;
            
            margin-right:2px;
            
        }
        .div5{
            width:100%;
            height:40px;
            font-family:arial;
            display:inline-block;
        }
        .div5 input{
            background-color:rgb(37, 158, 37);
            color:white;
            padding:5px;
            margin-top:6px;
            margin-right:3px;
        }
    </style>
</head>
<body>
    <?php include("giaodienquanlybacsy.php");  ?>
    <div class="div2">
        <form class="div2form" method="POST">
            
            <input style="width:170px;" type="text" name="mabn" placeholder="Mã bệnh nhân (vd:BN01)">
            <input style="width:170px;" type="text" name="tenbn" placeholder="Họ tên bệnh nhân">
            <input style="background-color:rgb(37, 158, 37);color:white;" type="submit" name="loctim" value="Lọc tìm">
            <?php echo "<a style='background-color:rgb(37, 158, 37);padding:5px;color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='GDQL_BS.php?tentk=".$tentk."&&mabn='>Thoát</a>";?>
        </form>
        <p>DỮ LIỆU >> <span style="color:blue;">Hồ sơ bệnh nhân</span> </p>
    </div>
    <?php $CONN = new mysqli ('localhost','root','','qlpknk') ; ?>
    <div class="div4">
    </div>
    <div class="div3">
    <table class="bang" >
    <tr style="background-color:#bbb;">
        <th >MBN</th>
        <th style="width:140px;">Ngày đến</th>
        <th style="width:250px;">Họ tên</th>
        <th style="width:150px;">Ngày sinh</th>
        <th  style="width:30px;">Giới tính</th>
        <th style="width:70px;">Điện thoại</th>
        <th style="width:250px;">Địa chỉ</th>
        <th  style="width:200px;">Email</th>
        <th style="width:250px;">Tiểu sử bệnh</th>
        <th  style="width:130px;">Thao tác</th>


    </tr>
    <?php 
    //khi người dùng ấn nút lọc tìm
    if(isset($_POST['loctim']))
    {
        $mabn=$_POST['mabn'];
        $tenbn=$_POST['tenbn'];
        if(empty($mabn) && empty($tenbn))
        {
            echo "<tr>< Không tìm thấy dữ liệu ></tr>";
            exit;
                        
        }
        if(!empty($mabn) && empty($tenbn))
        {   
            mysqli_query($CONN,'SET NAMES UTF8');
            $truyvan1="SELECT mabn,hoten,ngaysinh,sdt,diachi,email,tieusubenh,ngayden,gioitinh FROM hosobenhnhan WHERE mabn='$mabn'";
            $lienket1=mysqli_query($CONN,$truyvan1) or die("sai");
            if(mysqli_num_rows($lienket1)>0)
                        {         
                           
                            while($row=mysqli_fetch_assoc($lienket1))
                            {
                                
                                echo "<tr>";
                                echo "<td>" .$row['mabn'] ."</td>";
                                echo "<td style='background-color:rgb(150, 200, 30);'>" .date('d-m-Y',strtotime($row['ngayden'])) ."</td>"; 
                                echo "<td style='background-color:pink;color:blue;'>" .$row['hoten'] ."</td>";
                                echo "<td >" .date('d-m-Y',strtotime($row['ngaysinh'])) ."</td>"; 
                                echo "<td>" .$row['gioitinh'] ."</td>";
                                echo "<td >" .$row['sdt'] ."</td>"; 
                                echo "<td>" .$row['diachi'] ."</td>";
                                echo "<td>" .$row['email'] ."</td>";
                                echo "<td>" .$row['tieusubenh'] ."</td>";    
                                echo "<td><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;padding:0px 4px 0px 4px;border:2px solid black;font-size:13px;' href='dangkikham.php?mabn=".$row['mabn']."&tentk=".$tentk."'>Ghi kết quả</a><br><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:3px;' href='LSBN_bacsy.php?mabn=".$row['mabn']."&tentk=".$tentk."'>Lịch sử </a><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='xoalichhen.php?xoabn=".$row['mabn']."&tentk=".$tentk."'>xoa</a></td>";
                                echo "</tr>";
                            }
                            
                        }
                        exit;
                        
        }
        if(empty($mabn) && !empty($tenbn))
        {
            mysqli_query($CONN,'SET NAMES UTF8');
            $truyvan1="SELECT mabn,hoten,ngaysinh,sdt,diachi,email,tieusubenh,ngayden,gioitinh FROM hosobenhnhan WHERE hoten='$tenbn'";
            $lienket1=mysqli_query($CONN,$truyvan1) or die("sai");
            if(mysqli_num_rows($lienket1)>0)
                        {         
                           
                            while($row=mysqli_fetch_assoc($lienket1))
                            {
                                
                                echo "<tr>";
                                echo "<td>" .$row['mabn'] ."</td>";
                                echo "<td style='background-color:rgb(150, 200, 30);'>" .date('d-m-Y',strtotime($row['ngayden'])) ."</td>"; 
                                echo "<td style='background-color:pink;color:blue;'>" .$row['hoten'] ."</td>";
                                echo "<td >" .date('d-m-Y',strtotime($row['ngaysinh'])) ."</td>"; 
                                echo "<td>" .$row['gioitinh'] ."</td>";
                                echo "<td >" .$row['sdt'] ."</td>"; 
                                echo "<td>" .$row['diachi'] ."</td>";
                                echo "<td>" .$row['email'] ."</td>";
                                echo "<td>" .$row['tieusubenh'] ."</td>";   
                                echo "<td><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;padding:0px 4px 0px 4px;border:2px solid black;font-size:13px;' href='dangkikham.php?mabn=".$row['mabn']."&tentk=".$tentk."'>Ghi kết quả</a><br><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:3px;' href='LSBN_bacsy.php?mabn=".$row['mabn']."&tentk=".$tentk."'>Lịch sử </a><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='xoalichhen.php?xoabn=".$row['mabn']."&tentk=".$tentk."'>xoa</a></td>";
                                echo "</tr>";
                            }
                            
                        }
                        exit;
                        
        }
        if(!empty($mabn) && !empty($tenbn))
        {
            mysqli_query($CONN,'SET NAMES UTF8');
            $truyvan1="SELECT mabn,hoten,ngaysinh,sdt,diachi,email,tieusubenh,ngayden,gioitinh FROM hosobenhnhan WHERE hoten='$tenbn' AND mabn='$mabn'";
            $lienket1=mysqli_query($CONN,$truyvan1) ;
            if(mysqli_num_rows($lienket1)>0)
                        {         
                           
                            while($row=mysqli_fetch_assoc($lienket1))
                            {
                                
                                echo "<tr>";
                                echo "<td>" .$row['mabn'] ."</td>";
                                echo "<td style='background-color:rgb(150, 200, 30);'>" .date('d-m-Y',strtotime($row['ngayden'])) ."</td>"; 
                                echo "<td style='background-color:pink;color:blue;'>" .$row['hoten'] ."</td>";
                                echo "<td >" .date('d-m-Y',strtotime($row['ngaysinh'])) ."</td>"; 
                                echo "<td>" .$row['gioitinh'] ."</td>";
                                echo "<td >" .$row['sdt'] ."</td>"; 
                                echo "<td>" .$row['diachi'] ."</td>";
                                echo "<td>" .$row['email'] ."</td>";
                                echo "<td>" .$row['tieusubenh'] ."</td>";     
                                echo "<td><a style='background-color:rgb(37, 158, 37);color:white;padding:0px 4px 0px 4px;text-decoration:none;border:2px solid black;font-size:13px;' href='dangkikham.php?mabn=".$row['mabn']."&tentk=".$tentk."'>Ghi kết quả</a><br><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:3px;' href='LSBN_bacsy.php?mabn=".$row['mabn']."&tentk=".$tentk."'>Lịch sử </a><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='xoalichhen.php?xoabn=".$row['mabn']."&tentk=".$tentk."'>xoa</a></td>";
                                echo "</tr>";
                            }
                            
                        }
                        else
                             echo "< Mã bệnh nhân và tên bệnh nhân không khớp >";
                        exit;
                        
        }
    }
    ?>
    <?php
         // in ra tất cả các hồ sơ bệnh nhân
         mysqli_query($CONN,'SET NAMES UTF8');
         $truyvan="SELECT mabn,hoten,ngaysinh,sdt,diachi,email,tieusubenh,ngayden,gioitinh FROM hosobenhnhan";
         $ketnoi=mysqli_query($CONN,$truyvan) or die("khong");
         if(mysqli_num_rows(mysqli_query($CONN,$truyvan))>0)
        {         
                     while($row=mysqli_fetch_assoc($ketnoi))
                     {
                         echo "<tr>";
                         echo "<td>" .$row['mabn'] ."</td>";
                         echo "<td style='background-color:rgb(150, 200, 30);'>" .date('d-m-Y',strtotime($row['ngayden'])) ."</td>"; 
                         echo "<td style='background-color:pink;color:blue;'>" .$row['hoten'] ."</td>";
                         echo "<td >" .date('d-m-Y',strtotime($row['ngaysinh'])) ."</td>"; 
                         echo "<td>" .$row['gioitinh'] ."</td>";
                         echo "<td >" .$row['sdt'] ."</td>"; 
                         echo "<td>" .$row['diachi'] ."</td>";
                         echo "<td>" .$row['email'] ."</td>";
                         echo "<td>" .$row['tieusubenh'] ."</td>";  
                         echo "<td><a style='background-color:rgb(37, 158, 37);color:white;padding:0px 4px 0px 4px;text-decoration:none;border:2px solid black;font-size:13px;' href='dangkikham.php?mabn=".$row['mabn']."&tentk=".$tentk."'>Ghi kết quả</a><br><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;margin-right:3px;' href='LSBN_bacsy.php?mabn=".$row['mabn']."&tentk=".$tentk."'>Lịch sử </a><a style='background-color:rgb(37, 158, 37);color:white;text-decoration:none;border:2px solid black;font-size:13px;' href='xoalichhen.php?xoabn=".$row['mabn']."&tentk=".$tentk."'>xoa</a></td>";
                         echo "</tr>";
                     }
        }
         
               
    ?>

</body>
</html>