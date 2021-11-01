<?php include("giaodienquanli.php") ?>
<html>
<head>
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
            margin:7px 2px 0 70%;
        }
        .div2form input{
            width:80px;
            padding:5px 5px;
        }
        .div3{
            text-align:center;
            font-family:arial;
            border-color:black;
        }
        .bang th,td{
            border-collapse: collapse;
            padding: 8px 15px;
        }
        .bang a{
            text-decoration: none;
            padding:2px 10px;
            color:blue;
        }
   </style>
</head>
<body>
    <div class="div2">
        <form class="div2form" method="POST">
            <input type="text" name="ngayhen" placeholder="Ngày hẹn">
            <input type="text" name="mabs" placeholder="Mã bác sĩ">
            <input style="background-color:rgb(37, 158, 37);color:white;" type="submit" name="loctim" value="Lọc tìm">
            <input style="background-color:rgb(37, 158, 37);color:white;" type="submit" name="themmoi" value="Thêm mới">

        </form>
        <p>Dữ liệu >> <span style="color:blue;">Lịch hẹn</span></p>
    </div>
    <div class="div3">
    <table class="bang" >
    <tr style="background-color:#bbb;">
        <th style="width:150px;">ngày hẹn</th>
        <th style="width:250px;">Khách hàng</th>
        <th style="width:250px;">Mã khách hàng</th>
        <th style="width:250px;">Điện thoại</th>
        <th style="width:250px;">Mã bác sĩ</th>
        <th  style="width:250px;">Bác sĩ</th>
        <th style="width:250px;">nội dung hẹn</th>
        <th  style="width:130px;">Thao tác</th>
    </tr>
    <?php 
                
                if(isset($_POST['loctim']))
                {
                    $nh=$_POST['ngayhen'];
                    $ngayhen=date('Y-m-d',strtotime($nh));
                    $mabs=$_POST['mabs'];
                    $CONN = new mysqli ('localhost','root','','qlpknk');
                    mysqli_query($CONN,'SET NAMES UTF8');
                    if(empty($nh) && empty($mabs))
                    {
                        echo "<tr>Không tìm thấy dữ liệu</tr>";
                        exit;
                        
                    }
                    if(empty($ngayhen) && !empty($mabs))
                    {

                        $truyvan = "SELECT LH.ngayhen AS LHNH,LH.id AS ID, HSBN.hoten AS HSBNHT, HSBN.sdt AS HSBNSDT, HSBS.hoten AS HSBSHT, LH.noidung AS LHND,HSBN.ngaysinh AS HSBNNS FROM lichhen AS LH, hosobenhnhan AS HSBN, hosobacsy AS HSBS WHERE HSBS.mabs='$mabs'";
                        $lienket = mysqli_query($CONN,$truyvan)or die("khong");
                        if(mysqli_num_rows($lienket)>0)
                        {
                            
                           
                            while($row=mysqli_fetch_assoc($lienket))
                            {
                                $d=$row['HSBNNS'];
                                $bits = explode('-', $d);
                                $age = date('Y') - $bits[0] ;
                                
                            
                                echo "<tr>";
                                echo "<td style='background-color:rgb(150, 200, 30);'>" .$row['LHNH'] ."</td>"; 
                                echo "<td style='background-color:pink;color:blue;'>" .$row['HSBNHT'] ." (" .$age ."tuổi" .")" ."</td>";
                                echo "<td >" .$row['HSBNSDT'] ."</td>"; 
                                echo "<td>" .$row['HSBSHT'] ."</td>";
                                echo "<td>" .$row['LHND'] ."</td>"; 
                                echo "<td><a style='border-right:2px solid #bbb;' href='sualichhen.php?id=".$row['ID']."'>Sửa</a> <a href='xoalichhen.php?id=".$row['ID']."'>xoa</a></td>";
                                echo "</tr>";
                                exit;
                            }
                        }
                        

                    }
                    if(!empty($ngayhen) && empty($mabs))
                    {
                        $truyvan = "SELECT LH.ngayhen AS LHNH,LH.id AS ID, HSBN.hoten AS HSBNHT, HSBN.sdt AS HSBNSDT, HSBS.hoten AS HSBSHT, LH.noidung AS LHND,HSBN.ngaysinh AS HSBNNS FROM lichhen AS LH, hosobenhnhan AS HSBN, hosobacsy AS HSBS WHERE LH.ngayhen='$ngayhen'";
                        $lienket = mysqli_query($CONN,$truyvan)or die("khong");
                        if(mysqli_num_rows($lienket)>0)
                        {
                            
                           
                            while($row=mysqli_fetch_assoc($lienket))
                            {
                                $d=$row['HSBNNS'];
                                $bits = explode('-', $d);
                                $age = date('Y') - $bits[0] ;
                                
                              
                                echo "<tr>";
                                echo "<td style='background-color:rgb(150, 200, 30);'>" .date('d-m-Y',strtotime($row['LHNH'])) ."</td>"; 
                                echo "<td style='background-color:pink;color:blue;'>" .$row['HSBNHT'] ." (" .$age ."tuổi" .")" ."</td>";
                                echo "<td >" .$row['HSBNSDT'] ."</td>"; 
                                echo "<td>" .$row['HSBSHT'] ."</td>";
                                echo "<td>" .$row['LHND'] ."</td>"; 
                                echo "<td><a style='border-right:2px solid #bbb;' href='sualichhen.php?id=".$row['ID']."'>Sửa</a> <a href='xoalichhen.php?id=".$row['ID']."'>xoa</a></td>";
                                echo "</tr>";
                                exit;
                            }
                        }
                    
                        
                    }
                
                    if(!empty($ngayhen) && !empty($mabs))
                    {
                        $truyvan = "SELECT LH.ngayhen AS LHNH, HSBN.hoten AS HSBNHT, HSBN.sdt AS HSBNSDT,LH.id AS ID, HSBS.hoten AS HSBSHT, LH.noidung AS LHND,HSBN.ngaysinh AS HSBNNS FROM lichhen AS LH, hosobenhnhan AS HSBN, hosobacsy AS HSBS WHERE LH.ngayhen='$ngayhen' AND HSBS.mabs='$mabs'";
                        $lienket = mysqli_query($CONN,$truyvan)or die("khong");
                        if(mysqli_num_rows($lienket)>0)
                        {
                            
                           
                            while($row=mysqli_fetch_assoc($lienket))
                            {
                                $d=$row['HSBNNS'];
                                $bits = explode('-', $d);
                                $age = date('Y') - $bits[0] ;
                                
                              
                                echo "<tr>";
                                echo "<td style='background-color:rgb(150, 200, 30);'>" .date('d-m-Y',strtotime($row['LHNH'])) ."</td>"; 
                                echo "<td style='background-color:pink;color:blue;'>" .$row['HSBNHT'] ." (" .$age ."tuổi" .")" ."</td>";
                                echo "<td >" .$row['HSBNSDT'] ."</td>"; 
                                echo "<td>" .$row['HSBSHT'] ."</td>";
                                echo "<td>" .$row['LHND'] ."</td>"; 
                                echo "<td><a style='border-right:2px solid #bbb;' href='sualichhen.php?id=".$row['ID']."'>Sửa</a> <a href='xoalichhen.php?id=".$row['ID']."'>xoa</a></td>";
                                echo "</tr>";
                                exit;
                            
                            }
                        }
                    
                        
                    }
                }
                $CONN = new mysqli ('localhost','root','','qlpknk');
                mysqli_query($CONN,'SET NAMES UTF8');
                 
                $truyvan = "SELECT LH.ngayhen AS LHNH,LH.id AS ID, LH.noidung AS LHND,LH.mabn AS LHMBN,LH.mabs AS LHMBS,LH.tenbn AS LHTBN, LH.tenbs AS LHTBS,LH.ngaysinh AS LHNS, LH.sdt AS LHSDT FROM lichhen AS LH";
                $lienket = mysqli_query($CONN,$truyvan)or die("khong");
                if(mysqli_num_rows($lienket)>0)
                        {         
                           
                            while($row=mysqli_fetch_assoc($lienket))
                            {
                                $d=$row['LHNS'];
                                $bits = explode('-', $d);
                                $age = date('Y') - $bits[0] ;
                                
                              
                                echo "<tr>";
                                echo "<td style='background-color:rgb(150, 200, 30);'>" .date('d-m-Y',strtotime($row['LHNH'])) ."</td>"; 
                                echo "<td style='background-color:pink;color:blue;'>" .$row['LHTBN'] ." (" .$age ."tuổi" .")" ."</td>";
                                echo "<td>" .$row['LHMBN'] ."</td>";
                                echo "<td >" .$row['LHSDT'] ."</td>"; 
                                echo "<td>" .$row['LHMBS'] ."</td>";
                                echo "<td>" .$row['LHTBS'] ."</td>";
                                echo "<td>" .$row['LHND'] ."</td>"; 
                                echo "<td><a style='border-right:2px solid #bbb;' href='sualichhen.php?id=".$row['ID']."'>Sửa</a> <a href='xoalichhen.php?id=".$row['ID']."'>xoa</a></td>";
                                echo "</tr>";
                            }
                        }
                        if(isset($_POST['themmoi']))
                        {
                            echo "<form method='POST'>";
                            echo "<table border='1' style='border-collapse: collapse;' >";
                            echo "<tr>";
                            echo "<td > <input style='border:none;width:94px;outline: none;' type='text' name='ngayhen' ></td>";     
                            echo "<td> <input style='padding:5px;width:147px;border:none;outline: none;' type='text' name='tenbn' ></td>";
                            echo "<td> <input style='padding:5px;width:145px;border:none;outline: none;' type='text' name='mabn' ></td>";
                            echo "<td> <input style='padding:5px;width:144px;border:none;outline: none;' type='text' name='sdt' ></td>";
                            echo "<td> <input style='padding:5px;width:136px;border:none;outline: none;' type='text' name='tenbs' ></td>";
                            echo "<td> <input style='padding:5px;width:140px;border:none;outline: none;' type='text' name='tenbs' ></td>";
                            echo "<td> <input style='padding:5px;width:141px;border:none;outline: none;' type='text' name='noidung' ></td>";
                            echo "<td><input style='background-color:rgb(37, 158, 37);color:white;width:90px;padding:5px;' type='submit' name='them' value='Thêm'></td>";
                            echo "</tr>";
                            echo "</table>";
                            echo "</form>";
                            if(isset($_POST['them']))
                            {
                                $nh=$_POST['ngayhen'];
                                $ngayhen=date('Y-m-d',strtotime($nh));
                                $tenbn=$_POST['tenbn'];
                                $tenbs=$_POST['tenbs'];
                                $sdt=$_POST['sdt'];
                                $noidung=$_POST['noidung'];
                                $truyvan = "SELECT HSBN.mabn,HSBS.mabs FROM hosobenhnhan AS HSBN,hosobacsi AS HSBS WHERE HSBN.hoten='$tenbn' AND HSBN.sdt='$sdt' AND HSBS.hoten='$tenbs'";
                                $ketnoi = mysqli_query($CONN,$truyvan)or die("sai");
                                header('location:lichhen.php');
                            }
                        }
                      

     ?>
     </table>
    </div>
    </div>

</body>
</html>