<html>
<style>
        .div2{
            border:2px solid #bbb;
            width: 100%;
            height: 45px;
           font-family:arial;
           position:relative;
           background-color:#ccc;
        }
        .div2form{
            display:inline-block;
            position:absolute;
            top:0px;left:80%;
        }
        .div2form input{
            padding:5px;
        }
        .div3{
            border:2px solid grey;
            width:100%;
            height:525px;
            position:relative;
        }
        .div3_1{
            margin:1% 0px 0px 12%;
            width:50%;
            height:480px;
            border:3px solid green;
            padding:10px;
        }
        .div3_1 input[type=text]{
            
        }
        .div3_2{
            top:13px;left:1%;
            width:10%;
            height:500px;
            border:2px solid grey;
            position:absolute;
            text-align:center;
            position:absolute;
            background-color:green;

        }
        .div3_3{
            border:3px solid grey;
            width:450px;
            height:498px;
            top:13px;left:860px;
            position:absolute;
            overflow:scroll;
            background-color:green;

        }
        span {
            font-weight:bold;
        }
        .bang{
            margin-top:5%;
            margin-left:2%;
        }
        .bang th{
            background-color:rgb(173, 75, 75);
            color:white;       }
       .bang td{
        background-color:white;
        font-size:12px;

       }
        .bang,td,th{
            border:1px solid black;
            border-collapse: collapse;
                     
        }
</style>
<body style='font-family:arial;'>
    <?php 
        include("giaodienquanlybacsy.php") ;
        $CONN = new mysqli ('localhost','root','','qlpknk');
        mysqli_query($CONN,'SET NAMES UTF8');
    ?>
    <div class="div2">
        <p style='margin-left:1%;'>DỊCH VỤ >> <span style="color:blue;">Nhổ răng</span> </p>
        <div class=div2form>
        <?php 
            $truyvansum="SELECT COUNT(mabs) AS dem FROM nhorang WHERE mabs='$tentk'";
            $lienketsum=mysqli_query($CONN,$truyvansum);
            $rowsum=mysqli_fetch_assoc($lienketsum);
            echo "<h4 style=''>Tổng số ca đã thực hiện: <span style='color:red;'>$rowsum[dem] </span></h4>";
        ?>
    </div>
    <div class=div3>
        <?php 
            if(isset($_POST['luu']))
            {
                $mabn=$_POST['mabn'];
                $ngay=date("Y-m-d");
                $dungcu=$_POST['dungcu'];                
                $tinhtrang=$_POST['tinhtrang'];
                $soluongrang=$_POST['soluongrang'];
                $sorang=$_POST['sorang'];
                $denghi=$_POST['denghi'];
                $ghichu=$_POST['ghichu'];
                if(!empty($mabn&&$ngay&&$dungcu&&$denghi&&$ghichu))
                {
                    $truyvanluu="INSERT INTO nhorang(mabn,mabs,ngay,tinhtrang,soluongrang,sorang,denghi,ghichu) VALUES('$mabn','$tentk','$ngay','$tinhtrang','$soluongrang','$sorang','$denghi','$ghichu')";
                    $lienketluu=mysqli_query($CONN,$truyvanluu);
                }

            }
        ?>
        <div class="div3_1">
            <?php 
                if(isset($_POST['mabn'])||isset($_POST['kham']))
                {
                    echo "<form method=POST>";
                    $mabn=$_POST['mabn'];  
                    $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn'";
                    $lienket1=mysqli_query($CONN,$truyvan1);
                    $row1=mysqli_fetch_assoc($lienket1);
                    $nam=date('Y');
                    $ns=$row1['ngaysinh'];
                    $ngaysinh=date('Y',strtotime($ns));
                    $tuoi=$nam-$ngaysinh;
                    $truyvan2="SELECT * FROM hosobacsy WHERE mabs='$tentk'";
                    $lienket2=mysqli_query($CONN,$truyvan2);
                    $row2=mysqli_fetch_assoc($lienket2);
                    echo "<br><br><span>Mã bệnh nhân:</span> " ."<input style='color:green;margin-left:17px;border:none;font-weight:bold;' type=text name=mabn value='$mabn' ><br>" ;
                    echo "<br><span>Họ và tên:</span> " ."<span style='color:green;margin-left:52px;'>".$row1['hoten'] ."</span>"."<span style='margin-left:100px;font-weight:blod;'>Tuổi:</span> "  ."<span style='color:green;margin-left:34px;'>".$tuoi ."</span>" ."<span style='margin-left:100px;'>Giới tính: </span>"  ."<span style='color:green;'>".$row1['gioitinh'] ."</span>";
                    echo "<br><span>Bác sĩ thực hiện: </span>"  ."<span style='color:green;'>".$row2['hoten'] ."</span>" ."<span style='margin-left:40px;font-weight:blod;'>Chỉ định: </span><span style='color:green;'> Nhổ răng</span>";
                    echo "<br><br><br><span>Ngày: </span>"  ."<span style='margin-left:82px;font-weight:normal;'>".date('d-m-Y') ."</span>"; 
                    echo "<br><span>Tình trạng: <input style='margin-left:46px;font-weight:normal; width:73%;height:40px;outline:none;' type=text name=tinhtrang value=''> </span>";
                    echo "<br><span>Số lượng răng: <input style='margin:5px;margin-left:15px;font-weight:normal; width:20%;height:40px;outline:none;' type=text name=soluongrang value=''> </span>";
                    echo "<span>Số răng: <input style='margin-left:10px;font-weight:normal;margin:5px; width:40%;height:40px;outline:none;' type=text name=sorang value=''> </span>";
                    echo "<br><span>Dụng cụ: <input style='margin-left:60px;font-weight:normal; width:73%;height:40px;outline:none;' type=text name=dungcu value=''> </span>";
                    echo "<br><span>Đề nghị: <input style='margin:5px;height:40px;outline:none;margin-left:66px;font-weight:normal; width:73%;' type=text name=denghi value=''> </span>" ."<br><span>Ghi chú: <input style='margin:5px;height:40px;outline:none;margin-left:65px;font-weight:normal; width:73%;' type=text name=ghichu value=''> </span>";
                    echo "<br><input onclick='window.print();' style='padding:5px 20px;background-color:green;margin:5% 0px 0px 46%;color:white;' type=submit name=luu value='Print'></form>";
                }
                else
                {
                    $truyvan2="SELECT * FROM hosobacsy WHERE mabs='$tentk'";
                    $lienket2=mysqli_query($CONN,$truyvan2);
                    $row2=mysqli_fetch_assoc($lienket2);
                    echo "<br><br><span>Mã bệnh nhân:</span> " ."<input style='outline:none;color:green;margin-left:17px;border:none;font-weight:bold;' type=text name=mabn value='' ><br>" ;
                    echo "<br><span>Họ và tên:</span> " ."<input type=text name=hoten style='outline:none;border:none;color:green;margin-left:52px;'>" ."<span style='margin-left:15px;font-weight:blod;'>Tuổi:</span> "  ."<input type=text name=tuoi value='' style='outline:none;border:none;width:40px;color:green;margin-left:38px;'>"."<span style='margin-left:60px;'>Giới tính: </span>"  ."<input type=text name=gioitinh value='' style='border:none;outline:none;width:50px;color:green;'>";
                    echo "<br><span>Bác sĩ thực hiện: </span>"  ."<span style='color:green;'>".$row2['hoten'] ."</span>" ."<span style='margin-left:40px;font-weight:blod;'>Chỉ định: </span><span style='color:green;'> Nhổ răng</span>";
                    echo "<br><br><br><span>Ngày: </span>"  ."<span style='margin-left:82px;font-weight:normal;'>".date('d-m-Y') ."</span>"; 
                    echo "<br><span>Tình trạng: <input style='margin-left:46px;font-weight:normal; width:73%;height:40px;outline:none;' type=text name=tinhtrang value=''> </span>";
                    echo "<br><span>Số lượng răng: <input style='margin:5px;margin-left:15px;font-weight:normal; width:20%;height:40px;outline:none;' type=text name=soluongrang value=''> </span>";
                    echo "<span>Số răng: <input style='margin-left:10px;font-weight:normal;margin:5px; width:40%;height:40px;outline:none;' type=text name=dungcu value=''> </span>";
                    echo "<br><span>Dụng cụ: <input style='margin-left:60px;font-weight:normal; width:73%;height:40px;outline:none;' type=text name=dungcu value=''> </span>";
                    echo "<br><span>Đề nghị: <input style='margin:5px;height:40px;outline:none;margin-left:66px;font-weight:normal; width:73%;' type=text name=denghi value=''> </span>" ."<br><span>Ghi chú: <input style='margin:5px;height:40px;outline:none;margin-left:65px;font-weight:normal; width:73%;' type=text name=ghichu value=''> </span>";
                    echo "<br><input onclick='window.print();' style='padding:5px 20px;background-color:green;margin:5% 0px 0px 46%;color:white;' type=submit name=luu value='Print'></form>";
                }
            ?>
        </div>
        <div class='div3_2'>
            <h4 style='padding:15px 0px;color:white;'>Danh sách khám</h4>
            <?php
                $ngay=date('Y-m-d');
                $truyvan="SELECT * FROM thuthuat WHERE thuthuatdieutri='Nhổ răng' and ngaythuchien='$ngay'";
                $lienket=mysqli_query($CONN,$truyvan);
                if(mysqli_num_rows($lienket)>0)
                {
                        while($row=mysqli_fetch_assoc($lienket))
                        {
                            $truyvan1="SELECT * FROM nhorang WHERE ngay='$ngay' and mabn='$row[mabn]'";
                            $lienket1=mysqli_query($CONN,$truyvan1);
                            if(mysqli_num_rows($lienket1)<=0)
                            {
                                echo "<div>";
                                echo "<form method=POST >";
                                echo "<input style='padding:0px 15px;' type=submit name='mabn' value='$row[mabn]'>";
                                echo "</form>";
                                echo "<div>";
                        }
                    }
                }
                
            ?>
        </div>
        <div class=div3_3>
        <h4 style='margin-top:30px;color:white;text-align:center;'>Danh sách lịch hẹn</h4>
            <table class="bang">
            <th>STT</th><th></th><th>Mabn</th><th>Họ tên</th><th>Giới tính</th><th>Địa chỉ</th><th>Số điện thoại</th><th>Nội dung</th><th>Thao tác</th>
            <?php
                $truyvan2="SELECT * FROM lichhen WHERE noidung='Nhổ răng' and ngayhen='$ngay'";
                $lienket2=mysqli_query($CONN,$truyvan2);
                if(mysqli_num_rows($lienket2)>0)
                {
                    while($row2=mysqli_fetch_assoc($lienket2))
                    {
                        $i=1;
                        $truyvan1="SELECT * FROM nhorang WHERE ngay='$ngay' and mabn='$row2[mabn]'";
                        $lienket1=mysqli_query($CONN,$truyvan1);
                        if(mysqli_num_rows($lienket1)<=0)
                        {
                            echo "<tr>";
                            echo "<form method=POST >";
                            $truyvan3="SELECT * FROM hosobenhnhan WHERE mabn='$row2[mabn]'";
                            $lienket3=mysqli_query($CONN,$truyvan3);
                            $row3=mysqli_fetch_assoc($lienket3);
                            echo "<td style=''>$i</td>";
                            echo "<td><input type=checkbox name=mabn value='$row2[mabn]'</td>";
                            echo "<td>$row2[mabn]</td>";
                            echo "<td style='width:200px;'>$row3[hoten]</td>";
                            echo "<td>$row3[gioitinh]</td>";
                            echo "<td>$row3[diachi]</td>";
                            echo "<td>$row3[sdt]</td>";
                            echo "<td>$row2[noidung]</td>";
                            echo "<td><input type=submit name=kham value='Khám'</td>";
                            echo "</form>";
                            echo "</tr>";
                            $i++;
                        }
                    }
                }
            ?>
            </table>
        </div>
        
    </div>
</body>

</html>