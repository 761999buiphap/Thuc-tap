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
        .div2form{
                position:absolute;
                top:19%;
                left:73%;
        }
        .div2form input{
                padding:5px;
        }
        .bang{
            margin:3% 0px 0px 1%;
            font-size:18px;
            text-align:center;
        }
        .bang th{background-color:rgb(173, 75, 75);color: white;height:50px;}
        .bang,.bang th,td{
            border:1px solid black;
            border-collapse: collapse;
                     
        }
        .bang th, .bang td {
            padding:5px 10px;
        } 
        .bang input[type=text]
        {
            border:none;
            outline:none;
            font-size:18px;
            text-align:center;
        }
        .bang input[type=submit]
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
        <p style="margin-left:1%;">Quản lí răng >> <span style="color:blue;">răng</span> </p>
    </div>
    <div>
        <?php
            if(isset($_POST['suarang']))
            {
                if(isset($_POST['mara']))
                {
                    $mara=$_POST['mara'];
                    $tenrang=$_POST['tenrang'];
                    $soluong=$_POST['soluong'];
                    $gia=$_POST['gia'];
                    $gia = str_replace( ',', '', $gia );
                    $truyvan="UPDATE rang SET tenrang='$tenrang',soluong='$soluong',gia='$gia' WHERE mara='$mara'";
                    $lienket=mysqli_query($CONN,$truyvan);
                }
            }
        ?>
        <h4 style="text-align:center;">DANH SÁCH CÁC LOẠI RĂNG SỨ</h4>
        <table class="bang">
            <th></th><th>STT</th> <th># Mã</th><th>Tên loại răng</th><th>Số lượng kho</th><th>Gía</th><th>Thao tác</th>
            <?php
                $truyvan="SELECT * FROM rang";
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
                        echo "<td style='width:150px;'><input style='margin-right:4px;' type=submit name=suarang value='Sửa'><input type=submit name=xoarang value='Xóa'></td>";
                        echo "</tr></form>";
                        $i++;
                    }
                }
            ?>
        </table>
    </div>
</body>
</html>