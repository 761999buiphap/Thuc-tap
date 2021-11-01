<?php
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
                        echo "<h3 style=' margin-left:40%;color:red;'>< Đăng kí thành công ! ></h3>";
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
                        echo "<h3 style=' margin-left:40%;color:red;'>< Đăng kí thành công ! ></h3>";
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
                        $truyvan5= "INSERT INTO donthuoc(lankham,mabn,tenthuoc,cachdung,soluong,loidan) VALUES('$lankham3','$mabn','$tenthuoc','$cachdung','$soluong','$loidan')";
                        $lienket5 = mysqli_query($CONN,$truyvan5)or die("sai4");
                        echo "<h3 style=' margin-left:40%;color:red;'>< Đăng kí thành công ! ></h3>";
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
                        $truyvan5= "INSERT INTO donthuoc(lankham,mabn,tenthuoc,cachdung,soluong,loidan) VALUES('$lankham3','$mabn','$tenthuoc','$cachdung','$soluong','$loidan')";
                        $lienket5 = mysqli_query($CONN,$truyvan5)or die("sai3");
                        echo "<h3 style=' margin-left:40%;color:red;'>< Đăng kí thành công ! ></h3>";
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
        if(!empty($lankham2) &&!empty($lankham3) && !empty($trieuchung) && !empty($chuandoan) && !empty($thuthuat) && !empty($vitrirang) && !empty($dongia) && !empty($soluong) && !empty($tenbs1) && !empty($mabs1) && !empty($ghichu) && !empty($ngayhen) && !empty($mabs) && !empty($tenbs) && !empty($noidung) && !empty($tenthuoc) && !empty($cachdung) && !empty($soluongthuoc) && !empty($loidan))
        {
                    $truyvan2="SELECT mabs,hoten FROM hosobacsy WHERE mabs='$mabs' AND hoten='$tenbs'";
                    $lienket2=mysqli_query($CONN,$truyvan2);
                    if(mysqli_num_rows($lienket2)>0)
                    {
                        $truyvan4= "INSERT INTO lichhen(lankham,ngayhen,mabn,mabs,noidung) VALUES('$lankham2','$ngayhen','$mabn','$mabs','$noidung')";
                        $lienket4 = mysqli_query($CONN,$truyvan4)or die("sai3");
                        $truyvan5= "INSERT INTO donthuoc(lankham,mabn,tenthuoc,cachdung,soluong,loidan) VALUES('$lankham3','$mabn','$tenthuoc','$cachdung','$soluong','$loidan')";
                        $lienket5 = mysqli_query($CONN,$truyvan5)or die("sai4");
                        echo "<h3 style=' margin-left:40%;color:red;'>< Đăng kí thành công ! ></h3>";
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
                          echo "<h3 style=' margin-left:40%;color:red;'>< Đăng kí thành công ! ></h3>";
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
                        $truyvan5= "INSERT INTO donthuoc(lankham,mabn,tenthuoc,cachdung,soluong,loidan) VALUES('$lankham3','$mabn','$tenthuoc','$cachdung','$soluongthuoc','$loidan')";
                        $lienket5 = mysqli_query($CONN,$truyvan5)or die("sai4");
                        echo "<h3 style=' margin-left:40%;color:red;'>< Đăng kí thành công ! ></h3>";
        }
        else
            echo "<h3 style=' margin-left:40%;color:red;'>< Nhập vào đầy đủ thông tin ></h3>";
    }
}
?>