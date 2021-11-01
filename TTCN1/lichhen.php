<html>
<head>
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
            margin:7px 2px 0 74%;
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
            padding: 8px 0px;
        }
        .bang a{
            text-decoration: none;
            padding:2px 5px;
            color:blue;
        }
        .bang input{
            text-align:center;
            outline:none;
            border:none;
            font-size:16px;
        }
   </style>
</head>
<body>
    <?php include("giaodienquanlybacsy.php");  
        $CONN = new mysqli ('localhost','root','','qlpknk');
        mysqli_query($CONN,'SET NAMES UTF8');
        if(isset($_GET['tentk']))
        {
            $tentk=$_GET['tentk'];
        }
    ?>
    
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
    <table class="bang" style="text-align:center;" >
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
                //khi người dùng ấn nút lọc tìm
                if(isset($_POST['loctim']))
                {
                    $nh=$_POST['ngayhen'];
                    $mabs=$_POST['mabs'];
                    if(empty($nh) && empty($mabs))
                    {
                        echo "<h3 style=' text-align:center;color:red;'>< Không tìm thấy kết quả ></h3>";
                        exit;
                        
                    }
                    //nếu ngày hẹn rỗng
                    if(empty($nh) && !empty($mabs))
                    {
                        $truyvan = "SELECT  LH.mabn AS LHMBN,LH.ngayhen AS LHNH,LH.noidung AS LHND,id AS ID FROM lichhen AS LH WHERE mabs='$mabs'";
                        $lienket = mysqli_query($CONN,$truyvan)or die("khong");
                        if(mysqli_num_rows($lienket)>0)
                        {
                            
                           while($row=mysqli_fetch_assoc($lienket))
                            {
                                $truyvanmbs= "SELECT HSBS.hoten AS HSBSHT FROM hosobacsy AS HSBS WHERE mabs='$mabs'";
                                $ketnoimbs= mysqli_query($CONN,$truyvanmbs);
                                $rowmbs= mysqli_fetch_assoc($ketnoimbs);
                                $mabn=$row['LHMBN'];
                                $truyvanmbn= "SELECT HSBN.hoten AS HSBNHT, HSBN.sdt AS HSBNSDT,HSBN.ngaysinh AS HSBNNS FROM hosobenhnhan AS HSBN WHERE mabn='$mabn'";
                                $ketnoimbn= mysqli_query($CONN,$truyvanmbn);
                                $rowmbn= mysqli_fetch_assoc($ketnoimbn);
                                $d=$rowmbn['HSBNNS'];
                                $bits = explode('-', $d);
                                $age = date('Y') - $bits[0] ;
                                $nh=date('d-m-Y',strtotime($row['LHNH']));
                            
                                echo "<form method='POST' action='sua.php?tentk=".$tentk."&&mabn=$mabn&&id=$row[ID]'>";
                                echo "<tr>";
                                echo "<td  style='background-color:rgb(150, 200, 30);'>" ."<input style='width:90px;background-color:rgb(150, 200, 30);' type='text' name='ngayhen' value='$nh' >" ."</td>";
                                echo "<td style='background-color:pink;color:blue;'>" ."<input style='width:180px;background-color:pink;' type='text' name='hotenbn' value='$rowmbn[HSBNHT]'>" ."<br>"."( $age tuổi)" ."</td>";
                                echo "<td>" ."<input style='width:120px;' type='text' name='mabn' value='$row[LHMBN]' >" ."</td>";
                                echo "<td>" ."<input style='width:180px;' type='text' name='sdt' value='$rowmbn[HSBNSDT] ' >" ."</td>";
                                echo "<td>" ."<input style='width:120px;' type='text' name='mabs' value='$mabs' >" ."</td>";
                                echo "<td>" ."<input style='width:180px;' type='text' name='hotenbs' value='$rowmbs[HSBSHT]' >" ."</td>";
                                echo "<td>" ."<input style='width:150px;' type='text' name='noidung' value='$row[LHND]' >" ."</td>";
                                echo "<td><input style='font-size:15px;border:2px solid rgb(75,70,70);padding:2px; background-color:rgb(37, 158, 37);color:white;' type=submit name='sua' value=Sửa><input style='font-size:15px;border:2px solid rgb(75,70,70);padding:2px; background-color:rgb(37, 158, 37);color:white;' type=submit name='xoa' value=Xóa></td></form>";
                            }exit;
                        }
                        else
                        {
                            echo "<h3 style=' text-align:center;color:red;'>< Không tìm thấy kết quả ></h3>";
                            exit;
                        }

                    }
                    //nếu mã bác sĩ rỗng
                    if(!empty($nh) && empty($mabs))
                    {
                        $ngayhen=date('Y-m-d',strtotime($nh));
                        $truyvan = "SELECT LH.ngayhen AS LHNH,LH.id AS ID,LH.mabn AS LHMBN,LH.mabs AS LHMBS,LH.noidung AS LHND FROM lichhen AS LH WHERE ngayhen='$ngayhen'";
                        $lienket = mysqli_query($CONN,$truyvan)or die("khong");
                        if(mysqli_num_rows($lienket)>0)
                        {
                            
                           
                            while($row=mysqli_fetch_assoc($lienket))
                            {
                                $mabs=$row['LHMBS'];
                                $truyvanmbs= "SELECT HSBS.hoten AS HSBSHT FROM hosobacsy AS HSBS WHERE mabs='$mabs'";
                                $ketnoimbs= mysqli_query($CONN,$truyvanmbs);
                                $rowmbs= mysqli_fetch_assoc($ketnoimbs);
                                $mabn=$row['LHMBN'];
                                $truyvanmbn= "SELECT HSBN.hoten AS HSBNHT, HSBN.sdt AS HSBNSDT,HSBN.ngaysinh AS HSBNNS FROM hosobenhnhan AS HSBN WHERE mabn='$mabn'";
                                $ketnoimbn= mysqli_query($CONN,$truyvanmbn);
                                $rowmbn= mysqli_fetch_assoc($ketnoimbn);
                                $d=$rowmbn['HSBNNS'];
                                $bits = explode('-', $d);
                                $age = date('Y') - $bits[0] ;
                                $nh=date('d-m-Y',strtotime($row['LHNH']));

                                echo "<form method='POST' action='sua.php?tentk=".$tentk."&&mabn=$mabn&&id=$row[ID]'>";
                                echo "<tr>";
                                echo "<td  style='background-color:rgb(150, 200, 30);'>" ."<input style='width:90px;background-color:rgb(150, 200, 30);' type='text' name='ngayhen' value='$nh' >" ."</td>";
                                echo "<td style='background-color:pink;color:blue;'>" ."<input style='width:180px;background-color:pink;' type='text' name='hotenbn' value='$rowmbn[HSBNHT]'>" ."<br>"."( $age tuổi)" ."</td>";
                                echo "<td>" ."<input style='width:120px;' type='text' name='mabn' value='$row[LHMBN]' >" ."</td>";
                                echo "<td>" ."<input style='width:180px;' type='text' name='sdt' value='$rowmbn[HSBNSDT] ' >" ."</td>";
                                echo "<td>" ."<input style='width:120px;' type='text' name='mabs' value='$mabs' >" ."</td>";
                                echo "<td>" ."<input style='width:180px;' type='text' name='hotenbs' value='$rowmbs[HSBSHT]' >" ."</td>";
                                echo "<td>" ."<input style='width:150px;' type='text' name='noidung' value='$row[LHND]' >" ."</td>";
                                echo "<td><input style='font-size:15px;border:2px solid rgb(75,70,70);padding:2px; background-color:rgb(37, 158, 37);color:white;' type=submit name='sua' value=Sửa><input style='font-size:15px;border:2px solid rgb(75,70,70);padding:2px; background-color:rgb(37, 158, 37);color:white;' type=submit name='xoa' value=Xóa></td></form>";
                            }
                            exit;
                        }
                        else
                        {
                            echo "<h3 style=' text-align:center;color:red;'>< Không tìm thấy kết quả ></h3>";
                           exit;
                        }
                    
                        
                    }
                }
                //nếu cả ngày hẹn và mã bác sĩ đều khong rỗng
                    if(!empty($nh) && !empty($mabs))
                    {
                        $ngayhen=date('Y-m-d',strtotime($nh));
                        $truyvan = "SELECT LH.ngayhen AS LHNH,LH.id AS ID,LH.mabn AS LHMBN,LH.mabs AS LHMBS,LH.noidung AS LHND FROM lichhen AS LH WHERE ngayhen='$ngayhen' AND mabs='$mabs'";
                        $lienket = mysqli_query($CONN,$truyvan)or die("khong");
                        if(mysqli_num_rows($lienket)>0)
                        {
                            
                           
                            while($row=mysqli_fetch_assoc($lienket))
                            {
                                $mabs=$row['LHMBS'];
                                $truyvanmbs= "SELECT HSBS.hoten AS HSBSHT FROM hosobacsy AS HSBS WHERE mabs='$mabs'";
                                $ketnoimbs= mysqli_query($CONN,$truyvanmbs);
                                $rowmbs= mysqli_fetch_assoc($ketnoimbs);
                                $mabn=$row['LHMBN'];
                                $truyvanmbn= "SELECT HSBN.hoten AS HSBNHT, HSBN.sdt AS HSBNSDT,HSBN.ngaysinh AS HSBNNS FROM hosobenhnhan AS HSBN WHERE mabn='$mabn'";
                                $ketnoimbn= mysqli_query($CONN,$truyvanmbn);
                                $rowmbn= mysqli_fetch_assoc($ketnoimbn);
                                $d=$rowmbn['HSBNNS'];
                                $bits = explode('-', $d);
                                $age = date('Y') - $bits[0] ;
                                $nh=date('d-m-Y',strtotime($row['LHNH']));

                                echo "<form method='POST' action='sua.php?tentk=".$tentk."&&mabn=$mabn&&id=$row[ID]'>";
                                echo "<tr>";
                                echo "<td  style='background-color:rgb(150, 200, 30);'>" ."<input style='width:90px;background-color:rgb(150, 200, 30);' type='text' name='ngayhen' value='$nh' >" ."</td>";
                                echo "<td style='background-color:pink;color:blue;'>" ."<input style='width:180px;background-color:pink;' type='text' name='hotenbn' value='$rowmbn[HSBNHT]'>" ."<br>"."( $age tuổi)" ."</td>";
                                echo "<td>" ."<input style='width:120px;' type='text' name='mabn' value='$row[LHMBN]' >" ."</td>";
                                echo "<td>" ."<input style='width:180px;' type='text' name='sdt' value='$rowmbn[HSBNSDT] ' >" ."</td>";
                                echo "<td>" ."<input style='width:120px;' type='text' name='mabs' value='$mabs' >" ."</td>";
                                echo "<td>" ."<input style='width:180px;' type='text' name='hotenbs' value='$rowmbs[HSBSHT]' >" ."</td>";
                                echo "<td>" ."<input style='width:150px;' type='text' name='noidung' value='$row[LHND]' >" ."</td>";
                                echo "<td><input style='font-size:15px;border:2px solid rgb(75,70,70);padding:2px; background-color:rgb(37, 158, 37);color:white;' type=submit name='sua' value=Sửa><input style='font-size:15px;border:2px solid rgb(75,70,70);padding:2px; background-color:rgb(37, 158, 37);color:white;' type=submit name='xoa' value=Xóa></td></form>";
                            }
                            exit;
                        }
                        else
                        {
                            echo "<h3 style=' text-align:center;color:red;'>< Không tìm thấy kết quả ></h3>";
                           exit;
                        }
          
                    
                        
                    }
                
                //in ra tất cả lịch hẹn
                
                $truyvan = "SELECT LH.ngayhen AS LHNH,LH.id AS ID, LH.noidung AS LHND,LH.mabn AS LHMBN,LH.mabs AS LHMBS FROM lichhen AS LH WHERE mabs='$tentk'";
                $lienket = mysqli_query($CONN,$truyvan);
                if(mysqli_num_rows($lienket)>0)
                        {         
                           
                            while($row=mysqli_fetch_assoc($lienket))
                            {
                                $mabn=$row['LHMBN'];
                                $truyvan1 = "SELECT hoten,sdt,ngaysinh FROM hosobenhnhan AS HSBN WHERE HSBN.mabn='$mabn'";
                                $lienket1 = mysqli_query($CONN,$truyvan1);
                                $row1= mysqli_fetch_assoc($lienket1);
                                $mabs=$row['LHMBS'];
                                $truyvan3 = "SELECT hoten FROM hosobacsy AS HSBS WHERE HSBS.mabs='$mabs'";
                                $lienket3 = mysqli_query($CONN,$truyvan3);
                                $row3= mysqli_fetch_assoc($lienket3);

                                $d=$row1['ngaysinh'];
                                $bits = explode('-', $d);
                                $age = date('Y') - $bits[0] ;
                                $nh=date('d-m-Y',strtotime($row['LHNH']));
                                echo "<form method='POST' action='sua.php?tentk=".$tentk."&&mabn=$mabn&&id=$row[ID]'>";
                                echo "<tr>";
                                echo "<td  style='background-color:rgb(150, 200, 30);'>" ."<input style='width:90px;background-color:rgb(150, 200, 30);' type='text' name='ngayhen' value='$nh' >" ."</td>";
                                echo "<td style='background-color:pink;color:blue;'>" ."<input style='width:180px;background-color:pink;' type='text' name='hotenbn' value='$row1[hoten]'>" ."<br>"."( $age tuổi)" ."</td>";
                                echo "<td>" ."<input style='width:120px;' type='text' name='mabn' value='$row[LHMBN]' >" ."</td>";
                                echo "<td>" ."<input style='width:180px;' type='text' name='sdt' value='$row1[sdt]' >" ."</td>";
                                echo "<td>" ."<input style='width:120px;' type='text' name='mabs' value='$row[LHMBS]' >" ."</td>";
                                echo "<td>" ."<input style='width:180px;' type='text' name='hotenbs' value='$row3[hoten]' >" ."</td>";
                                echo "<td>" ."<input style='width:150px;' type='text' name='noidung' value='$row[LHND]' >" ."</td>";
                                echo "<td><input style='font-size:15px;border:2px solid rgb(75,70,70);padding:2px; background-color:rgb(37, 158, 37);color:white;' type=submit name='sua' value=Sửa><input style='font-size:15px;border:2px solid rgb(75,70,70);padding:2px; background-color:rgb(37, 158, 37);color:white;' type=submit name='xoa' value=Xóa></td></form>";
                                //echo "<td><a style='background-color:rgb(37, 158, 37);color:white;width:50px;padding:2px;border:2px solid rgb(75,70,70);text-decoration:none; margin:0px 0 0 2px;font-size:13px;' href='sualichhen.php?id=".$row['ID']."'>Sửa</a><a style='background-color:rgb(37, 158, 37);color:white;width:50px;margin:0px 0 0 2px;padding:2px;border:2px solid rgb(75,70,70);text-decoration:none;font-size:13px;' href='xoalichhen.php?id=".$row['ID']."&tentk=".$tentk."'>xoa</a></td>";
                                
                                echo "</tr>";
                            }
                        
                        }
                        //Thêm lịch hẹn
                        if(isset($_POST['themmoi']))
                        {
                            echo "<form method='POST'>";
                            echo "<table border='1' style='border-collapse: collapse;' >";
                            echo "<tr>";
                            echo "<td > <input style='border:none;width:113px;text-align:center;outline: none;' type='text' name='ngayhen' ></td>";     
                            echo "<td> <input style='padding:5px;width:207px;text-align:center;border:none ;outline: none;' type='text' name='tenbn' ></td>";
                            echo "<td> <input style='padding:5px;width:170px;text-align:center;border:none;outline: none;' type='text' name='mabn' ></td>";
                            echo "<td> <input style='padding:5px;width:210px;text-align:center;border:none;outline: none;' type='text' name='sdt' ></td>";
                            echo "<td> <input style='padding:5px;width:170px;text-align:center;border:none;outline: none;' type='text' name='mabs' ></td>";
                            echo "<td> <input style='padding:5px;width:200px;text-align:center;border:none;outline: none;' type='text' name='tenbs' ></td>";
                            echo "<td> <input style='padding:5px;width:190px;text-align:center;border:none;outline: none;' type='text' name='noidung' ></td>";
                            echo "<td ><input style='background-color:rgb(37, 158, 37);color:white;padding:3px ;' type='submit' name='them' value='Thêm'><a style='background-color:rgb(37, 158, 37);color:white;width:50px;padding:3px;border:2px solid rgb(75,70,70);text-decoration:none; margin:5px 0 0 0px;font-size:13px;' href='lichhen.php?tentk=".$tentk."'>Hủy</a></td>";
                            echo "</tr>";
                            echo "</table>";
                            echo "</form>";
                            
                            if(isset($_POST['them']))
                            {
                                echo "<tr>";
                                echo "<td>khong</td>";
                                echo "</tr>";
                                $nh=$_POST['ngayhen'];
                                $ngayhen=date('Y-m-d',strtotime($nh));
                                $ns=$_POST['ngaysinh'];
                                $ngaysinh=date('Y-m-d',strtotime($ns));
                                $mabn=$_POST['mabn'];
                                $mabs=$_POST['mabs'];
                                $sdt=$_POST['sdt'];
                                $tenbn=$_POST['tenbn'];
                                $tenbs=$_POST['tenbs'];
                                $noidung=$_POST['noidung'];
                
                                $truyvan4 = "SELECT mabn,hoten,ngaysinh,sdt FROM hosobenhnhan AS HSBN where HSBN.mabn='$mabn' AND HSBN.ngaysinh='$ngaysinh' AND HSBN.hoten='$tenbn' AND HSBN.sdt='$sdt'";
                                $ketnoi4 = mysqli_query($CONN,$truyvan4)or die("sai");
                                $row4= mysqli_num_rows($ketnoi4);
                                if(mysqli_num_rows($ketnoi4)<1)
                            
                                echo "<h3 style=' margin-left:40%;color:red;'>< Không tồn tại bệnh nhân này ></h3>";                                
                                $truyvan5 = "SELECT mabs,hoten FROM hosobacsy AS HSBS WHERE HSBS.mabs='$mabs' AND HSBS.hoten='$tenbs'";
                                $ketnoi5=mysqli_query($CONN,$truyvan5);
                                $row5=mysqli_num_rows($ketnoi5);
                                if(mysqli_num_rows($ketnoi5)<1)
                                echo "<h3 style=' text-align:center;color:red;'>< Không tồn tại bác sĩ này ></h3>";                                

                                
                                if($row4 >0 && $row5>0)
                                {
                                    $truyvan6= "INSERT INTO lichhen(ngayhen,mabn,sdt,mabs,noidung) VALUES('$ngayhen','$mabn',$sdt','$mabs','$noidung')"or die("sai");
                                    $ketnoi6 = mysqli_query($CONN,$truyvan6) or die("khong");
                                }
                            
                        }
                    }
                    if(isset($_POST['them']))
                            {
                                
                                $nh=$_POST['ngayhen'];
                                $ngayhen=date('Y-m-d',strtotime($nh));
                                $mabn=$_POST['mabn'];
                                $mabs=$_POST['mabs'];
                                $sdt=$_POST['sdt'];
                                $tenbn=$_POST['tenbn'];
                                $tenbs=$_POST['tenbs'];
                                $noidung=$_POST['noidung'];
                                if(!empty($ngayhen) && !empty($mabn) && !empty($mabs) && !empty($sdt) && !empty($tenbn)&& !empty($tenbs)&& !empty($noidung) );
                                {
                                    
                                        $truyvan4 = "SELECT mabn,hoten,sdt FROM hosobenhnhan AS HSBN where HSBN.mabn='$mabn' AND HSBN.hoten='$tenbn' AND HSBN.sdt='$sdt'";
                                        $ketnoi4 = mysqli_query($CONN,$truyvan4)or die("sai1");
                                        $row4= mysqli_num_rows($ketnoi4);
                                        if(mysqli_num_rows($ketnoi4)<1)
                                        echo "<h3 style=' margin-left:40%;color:red;'>< Nhập sai thông tin bệnh nhân ></h3>";                                    
                                    $truyvan5 = "SELECT mabs,hoten FROM hosobacsy AS HSBS WHERE HSBS.mabs='$mabs' AND HSBS.hoten='$tenbs'";
                                    $ketnoi5=mysqli_query($CONN,$truyvan5);
                                    $row5=mysqli_num_rows($ketnoi5);
                                    if(mysqli_num_rows($ketnoi5)<1)
                                    echo "<h3 style=' text-align:center;color:red;'>< Nhập sai thông tin bác sĩ ></h3>";                                    

                                    
                                    if($row4 >0 && $row5>0)
                                    {
                                        $truyvan6= "INSERT INTO lichhen(ngayhen,mabn,mabs,noidung) VALUES('$ngayhen','$mabn','$mabs','$noidung')"or die("sai1");
                                        $ketnoi6 = mysqli_query($CONN,$truyvan6)or die("sai2");
                                        echo "<h3 style=' text-align:center;color:red;'>< Thêm thành công ></h3>";
                                    }

                            
                                }
                            }
                            
         ?>
     </table>
    </div>
 

</body>
</html>