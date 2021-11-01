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
            margin:7px 2px 0 70%;
           
        }
        .div2form input{
            width:80px;
            padding:5px 5px;
        }
        .nhap{
            margin:7% 0 0 25%;
            width:50%;
            height:400px;
            font-family:arial;
            font-size:20px;
        }
        .nhap input[type=text],textarea{
            margin:15px 0 0px 50px;
            width:50%;
            padding:10px;
           
        } 
       
    </style>
</head>
<body>
    <?php include("giaodienquanlybacsy.php"); ?>

    <div class="div2">
            <form class="div2form" method="POST">
                <input type="text" name="ngayhen" placeholder="Ngày hẹn">
                <input type="text" name="mabs" placeholder="Mã bác sĩ">
                <input style="background-color:rgb(37, 158, 37);color:white;" type="submit" name="loctim" value="Lọc tìm">
            </form>
            <p>Dữ liệu >> <span style="color:blue;">Lịch hẹn</span> >> <span style="color:blue;">Sửa</span></p>
        </div>
        

    
        <form class="nhap" method="POST">
        <label for="ngayhen">Ngày hẹn: </label>
        <input  type="text" name="ngayhen" value=""><br>
        <label  for="mabn">Mã bệnh nhân:</label>
        <input style="margin-left:6px;" type="text" name="mabn"><br>
        <label for="mabs">Mã bác sĩ:</label>
        <input type="text" name="mabs"><br>
        <label for="noidung">Nội dung:</label>
        <textarea style="margin-left:55px;"  name="noidung" id="" cols="60" rows="2"></textarea><br>
        <input style="margin:20px 0 0 45%; color:white;padding:10px;width:20%;background-color:rgb(37, 158, 37);" type="submit" name="sua" value="Sửa">
        <a style='background-color:rgb(37, 158, 37);color:white;width:50px;padding:9px;border:1px solid black;text-decoration:none; margin:5px 0 0 4px;font-size:15px;' href='lichhen.php'>Hủy</a>
    </div>
    <?php 
    if(isset($_POST['sua']))
    {
        if(isset($_GET['id']))
        {
            
            $id=$_GET['id'];
        }
        $nh=$_POST['ngayhen'];
        $ngayhen=date('Y-m-d',strtotime($nh));
        $mabn=$_POST['mabn'];
        $mabs=$_POST['mabs'];
        $noidung=$_POST['noidung'];
        $CONN = new mysqli('localhost','root','','qlpknk');
        mysqli_set_charset($CONN,'utf8');
    
        $truyvan1 = "UPDATE lichhen SET ngayhen='$ngayhen',mabn='$mabn',mabs='$mabs',noidung='$noidung' WHERE id='$id'";
        $ketnoi1 = mysqli_query($CONN,$truyvan1)or die("<br><p style='color:red; margin-left:30%;'>< Nhập vào nội dung cần sửa ></p>");
        if($ketnoi1)
            echo "<br><p style='color:red; margin-left:30%;'>< Sửa thành công ! > ></p>";
    }

    ?>
</body>
</html>

