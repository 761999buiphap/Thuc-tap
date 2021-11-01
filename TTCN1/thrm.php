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
        if(!empty($lankham1) && !empty($mabn) && !empty($tenbn)&& !empty($diachi) && !empty($ns) && !empty($sdt) && !empty($email) && !empty($tieusubenh) && !empty($_POST['gioitinh'])&& !empty($trieuchung) && !empty($chuandoan) && !empty($thuthuat) && !empty($vitrirang) && !empty($dongia) && !empty($soluong) && !empty($tenbs1) && !empty($mabs1) && !empty($ghichu) )
        {
            
            $gioitinh=$_POST['gioitinh'];
            $truyvan3="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' AND hoten='$tenbn' AND ngaysinh='$ngaysinh' AND diachi='$diachi' AND gioitinh='$gioitinh' AND sdt='$sdt'";
            $lienket3=mysqli_query($CONN,$truyvan3);
            if(mysqli_num_rows($lienket3)>0)
            {
                echo "<h3 style=' margin-left:40%;color:red;'>< Đã tồn tại bệnh nhân này ></h3>";
            }
            else
            {
                $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' OR sdt='$sdt'";
                $lienket1=mysqli_query($CONN,$truyvan1);
                if(mysqli_num_rows($lienket1)>0)
                {
                    echo "<h3 style=' margin-left:30%;color:red;'>< Đã tồn tại mã bệnh nhân hoặc số điện thoại này, vui lòng nhập lại ! ></h3>";
                }
                else
                {
                    $truyvan2="SELECT mabs,hoten FROM hosobacsy WHERE mabs='$mabs1' AND hoten='$tenbs1'";
                    $lienket2=mysqli_query($CONN,$truyvan2);
                    if(mysqli_num_rows($lienket2)>0)
                    {
                        $truyvan2= "INSERT INTO hosobenhnhan(mabn,hoten,ngaysinh,gioitinh,sdt,email,diachi,tieusubenh,ngayden) VALUES('$mabn','$tenbn','$ngaysinh','$gioitinh','$sdt','$email','$diachi','$tieusubenh','$ngayden')";
                        $lienket2 = mysqli_query($CONN,$truyvan2)or die("sai1");
                        $truyvan3= "INSERT INTO thuthuat(lankham,mabn,mabs,ngaythuchien,trieuchung,chuandoan,thuthuatdieutri,vitrirang,gia,soluong,ghichu) VALUES('$lankham1','$mabn','$mabs1','$ngaythuchien','$trieuchung','$chuandoan','$thuthuat','$vitrirang','$dongia','$soluong','$ghichu')";
                        $lienket4 = mysqli_query($CONN,$truyvan3)or die("sai2");
                        echo "<h3 style=' margin-left:40%;color:red;'>< Đăng kí thành công ! ></h3>";
                    }
                    
                    
                }
            }
        }
        else
            echo "<h3 style=' margin-left:40%;color:red;'>< Nhập vào đầy đủ thông tin ></h3>";
    
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
        if(!empty($lankham1) &&!empty($lankham2) &&!empty($mabn) && !empty($tenbn)&& !empty($diachi) && !empty($ns) && !empty($sdt) && !empty($email) && !empty($tieusubenh) && !empty($_POST['gioitinh'])&& !empty($trieuchung) && !empty($chuandoan) && !empty($thuthuat) && !empty($vitrirang) && !empty($dongia) && !empty($soluong) && !empty($tenbs1) && !empty($mabs1) && !empty($ghichu) && !empty($ngayhen) && !empty($mabs) && !empty($tenbs) && !empty($noidung) )
        {
            $gioitinh=$_POST['gioitinh'];
            $truyvan3="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' AND hoten='$tenbn' AND ngaysinh='$ngaysinh' AND diachi='$diachi' AND gioitinh='$gioitinh' AND sdt='$sdt'";
            $lienket3=mysqli_query($CONN,$truyvan3);
            if(mysqli_num_rows($lienket3)>0)
            {
                echo "<h3 style=' margin-left:40%;color:red;'>< Đã tồn tại bệnh nhân này ></h3>";
            }
            else
            {
                $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' OR sdt='$sdt'";
                $lienket1=mysqli_query($CONN,$truyvan1);
                if(mysqli_num_rows($lienket1)>0)
                {
                    echo "<h3 style=' margin-left:30%;color:red;'>< Đã tồn tại mã bệnh nhân hoặc số điện thoại này, vui lòng nhập lại ! ></h3>";
                }
                else
                {
                    $truyvan2="SELECT mabs,hoten FROM hosobacsy WHERE mabs='$mabs1' AND hoten='$tenbs1'";
                    $lienket2=mysqli_query($CONN,$truyvan2);
                    if(mysqli_num_rows($lienket2)>0)
                    {
                        $truyvan2= "INSERT INTO hosobenhnhan(mabn,hoten,ngaysinh,gioitinh,sdt,email,diachi,tieusubenh,ngayden) VALUES('$mabn','$tenbn','$ngaysinh','$gioitinh','$sdt','$email','$diachi','$tieusubenh','$ngayden')";
                        $lienket2 = mysqli_query($CONN,$truyvan2)or die("sai1");
                        $truyvan3= "INSERT INTO thuthuat(lankham,mabn,mabs,ngaythuchien,trieuchung,chuandoan,thuthuatdieutri,vitrirang,gia,soluong,ghichu) VALUES('$lankham1','$mabn','$mabs1','$ngaythuchien','$trieuchung','$chuandoan','$thuthuat','$vitrirang','$dongia','$soluong','$ghichu')";
                        $lienket3 = mysqli_query($CONN,$truyvan3)or die("sai2");
                        $truyvan4= "INSERT INTO lichhen(lankham,ngayhen,mabn,mabs,noidung) VALUES('$lankham2','$ngayhen','$mabn','$mabs','$noidung')";
                        $lienket4 = mysqli_query($CONN,$truyvan4)or die("sai3");
                        echo "<h3 style=' margin-left:40%;color:red;'>< Đăng kí thành công ! ></h3>";
                    }
                    
                    
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
        if(!empty($lankham1) &&!empty($lankham2) &&!empty($lankham3) &&!empty($mabn) && !empty($tenbn)&& !empty($diachi) && !empty($ns) && !empty($sdt) && !empty($email) && !empty($tieusubenh) && !empty($_POST['gioitinh'])&& !empty($trieuchung) && !empty($chuandoan) && !empty($thuthuat) && !empty($vitrirang) && !empty($dongia) && !empty($soluong) && !empty($tenbs1) && !empty($mabs1) && !empty($ghichu) && !empty($ngayhen) && !empty($mabs) && !empty($tenbs) && !empty($noidung) && !empty($tenthuoc) && !empty($cachdung) && !empty($soluongthuoc) && !empty($loidan))
        {
            $gioitinh=$_POST['gioitinh'];
            $truyvan3="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' AND hoten='$tenbn' AND ngaysinh='$ngaysinh' AND diachi='$diachi' AND gioitinh='$gioitinh' AND sdt='$sdt'";
            $lienket3=mysqli_query($CONN,$truyvan3);
            if(mysqli_num_rows($lienket3)>0)
            {
                echo "<h3 style=' margin-left:40%;color:red;'>< Đã tồn tại bệnh nhân này ></h3>";
            }
            else
            {
                $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' OR sdt='$sdt'";
                $lienket1=mysqli_query($CONN,$truyvan1);
                if(mysqli_num_rows($lienket1)>0)
                {
                    echo "<h3 style=' margin-left:30%;color:red;'>< Đã tồn tại mã bệnh nhân hoặc số điện thoại này, vui lòng nhập lại ! ></h3>";
                }
                else
                {
                    $truyvan2="SELECT mabs,hoten FROM hosobacsy WHERE mabs='$mabs1' AND hoten='$tenbs1'";
                    $lienket2=mysqli_query($CONN,$truyvan2);
                    if(mysqli_num_rows($lienket2)>0)
                    {
                        $truyvan2= "INSERT INTO hosobenhnhan(mabn,hoten,ngaysinh,gioitinh,sdt,email,diachi,tieusubenh,ngayden) VALUES('$mabn','$tenbn','$ngaysinh','$gioitinh','$sdt','$email','$diachi','$tieusubenh','$ngayden')";
                        $lienket2 = mysqli_query($CONN,$truyvan2)or die("sai1");
                        $truyvan3= "INSERT INTO thuthuat(lankham,mabn,mabs,ngaythuchien,trieuchung,chuandoan,thuthuatdieutri,vitrirang,gia,soluong,ghichu) VALUES('$lankham1','$mabn','$mabs1','$ngaythuchien','$trieuchung','$chuandoan','$thuthuat','$vitrirang','$dongia','$soluong','$ghichu')";
                        $lienket3 = mysqli_query($CONN,$truyvan3)or die("sai2");
                        $truyvan4= "INSERT INTO lichhen(lankham,ngayhen,mabn,mabs,noidung) VALUES('$lankham2','$ngayhen','$mabn','$mabs','$noidung')";
                        $lienket4 = mysqli_query($CONN,$truyvan4)or die("sai3");
                        $truyvan5= "INSERT INTO donthuoc(lankham,mabn,tenthuoc,cachdung,soluong,loidan) VALUES('$lankham3','$mabn','$tenthuoc','$cachdung','$soluong','$loidan')";
                        $lienket5 = mysqli_query($CONN,$truyvan5)or die("sai4");
                        echo "<h3 style=' margin-left:40%;color:red;'>< Đăng kí thành công ! ></h3>";
                    }
                    
                    
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

        if(!empty($lankham1) &&!empty($lankham3) &&!empty($mabn) && !empty($tenbn)&& !empty($diachi) && !empty($ns) && !empty($sdt) && !empty($email) && !empty($tieusubenh) && !empty($_POST['gioitinh'])&& !empty($trieuchung) && !empty($chuandoan) && !empty($thuthuat) && !empty($vitrirang) && !empty($dongia) && !empty($soluong) && !empty($tenbs1) && !empty($mabs1) && !empty($ghichu) && empty($ngayhen) && empty($mabs) && empty($tenbs) && empty($noidung) && !empty($tenthuoc) && !empty($cachdung) && !empty($soluongthuoc) && !empty($loidan))
        {
            $gioitinh=$_POST['gioitinh'];
            $truyvan3="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' AND hoten='$tenbn' AND ngaysinh='$ngaysinh' AND diachi='$diachi' AND gioitinh='$gioitinh' AND sdt='$sdt'";
            $lienket3=mysqli_query($CONN,$truyvan3);
            if(mysqli_num_rows($lienket3)>0)
            {
                echo "<h3 style=' margin-left:40%;color:red;'>< Đã tồn tại bệnh nhân này ></h3>";
            }
            else
            {
                $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' OR sdt='$sdt'";
                $lienket1=mysqli_query($CONN,$truyvan1);
                if(mysqli_num_rows($lienket1)>0)
                {
                    echo "<h3 style=' margin-left:30%;color:red;'>< Đã tồn tại mã bệnh nhân hoặc số điện thoại này, vui lòng nhập lại ! ></h3>";
                }
                else
                {
                    $truyvan2="SELECT mabs,hoten FROM hosobacsy WHERE mabs='$mabs1' AND hoten='$tenbs1'";
                    $lienket2=mysqli_query($CONN,$truyvan2);
                    if(mysqli_num_rows($lienket2)>0)
                    {
                        $truyvan2= "INSERT INTO hosobenhnhan(mabn,hoten,ngaysinh,gioitinh,sdt,email,diachi,tieusubenh,ngayden) VALUES('$mabn','$tenbn','$ngaysinh','$gioitinh','$sdt','$email','$diachi','$tieusubenh','$ngayden')";
                        $lienket2 = mysqli_query($CONN,$truyvan2)or die("sai1");
                        $truyvan3= "INSERT INTO thuthuat(lankham,mabn,mabs,ngaythuchien,trieuchung,chuandoan,thuthuatdieutri,vitrirang,gia,soluong,ghichu) VALUES('$lankham1','$mabn','$mabs1','$ngaythuchien','$trieuchung','$chuandoan','$thuthuat','$vitrirang','$dongia','$soluong','$ghichu')";
                        $lienket3 = mysqli_query($CONN,$truyvan3)or die("sai2");
                        $truyvan5= "INSERT INTO donthuoc(lankham,mabn,tenthuoc,cachdung,soluong,loidan) VALUES('$lankham3','$mabn','$tenthuoc','$cachdung','$soluong','$loidan')";
                        $lienket5 = mysqli_query($CONN,$truyvan5)or die("sai3");
                        echo "<h3 style=' margin-left:40%;color:red;'>< Đăng kí thành công ! ></h3>";
                    }
                    
                    
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
        if(!empty($lankham2) &&!empty($lankham3) &&!empty($mabn) && !empty($tenbn)&& !empty($diachi) && !empty($ns) && !empty($sdt) && !empty($email) && !empty($tieusubenh) && !empty($_POST['gioitinh'])&& !empty($trieuchung) && !empty($chuandoan) && !empty($thuthuat) && !empty($vitrirang) && !empty($dongia) && !empty($soluong) && !empty($tenbs1) && !empty($mabs1) && !empty($ghichu) && !empty($ngayhen) && !empty($mabs) && !empty($tenbs) && !empty($noidung) && !empty($tenthuoc) && !empty($cachdung) && !empty($soluongthuoc) && !empty($loidan))
        {
            $gioitinh=$_POST['gioitinh'];
            $truyvan3="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' AND hoten='$tenbn' AND ngaysinh='$ngaysinh' AND diachi='$diachi' AND gioitinh='$gioitinh' AND sdt='$sdt'";
            $lienket3=mysqli_query($CONN,$truyvan3);
            if(mysqli_num_rows($lienket3)>0)
            {
                echo "<h3 style=' margin-left:40%;color:red;'>< Đã tồn tại bệnh nhân này ></h3>";
            }
            else
            {
                $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' OR sdt='$sdt'";
                $lienket1=mysqli_query($CONN,$truyvan1);
                if(mysqli_num_rows($lienket1)>0)
                {
                    echo "<h3 style=' margin-left:30%;color:red;'>< Đã tồn tại mã bệnh nhân hoặc số điện thoại này, vui lòng nhập lại ! ></h3>";
                }
                else
                {
                    $truyvan2="SELECT mabs,hoten FROM hosobacsy WHERE mabs='$mabs' AND hoten='$tenbs'";
                    $lienket2=mysqli_query($CONN,$truyvan2);
                    if(mysqli_num_rows($lienket2)>0)
                    {
                        $truyvan2= "INSERT INTO hosobenhnhan(mabn,hoten,ngaysinh,gioitinh,sdt,email,diachi,tieusubenh,ngayden) VALUES('$mabn','$tenbn','$ngaysinh','$gioitinh','$sdt','$email','$diachi','$tieusubenh','$ngayden')";
                        $lienket2 = mysqli_query($CONN,$truyvan2)or die("sai1");
                        $truyvan4= "INSERT INTO lichhen(lankham,ngayhen,mabn,mabs,noidung) VALUES('$lankham2','$ngayhen','$mabn','$mabs','$noidung')";
                        $lienket4 = mysqli_query($CONN,$truyvan4)or die("sai3");
                        $truyvan5= "INSERT INTO donthuoc(lankham,mabn,tenthuoc,cachdung,soluong,loidan) VALUES('$lankham3','$mabn','$tenthuoc','$cachdung','$soluong','$loidan')";
                        $lienket5 = mysqli_query($CONN,$truyvan5)or die("sai4");
                        echo "<h3 style=' margin-left:40%;color:red;'>< Đăng kí thành công ! ></h3>";
                    }
                    
                    
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
          if(!empty($lankham2) &&!empty($mabn) && !empty($tenbn)&& !empty($diachi) && !empty($ns) && !empty($sdt) && !empty($email) && !empty($tieusubenh) && !empty($_POST['gioitinh'])&& !empty($ngayhen) && !empty($mabs) && !empty($tenbs) && !empty($noidung))
          {
              $gioitinh=$_POST['gioitinh'];
              $truyvan3="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' AND hoten='$tenbn' AND ngaysinh='$ngaysinh' AND diachi='$diachi' AND gioitinh='$gioitinh' AND sdt='$sdt'";
              $lienket3=mysqli_query($CONN,$truyvan3);
              if(mysqli_num_rows($lienket3)>0)
              {
                  echo "<h3 style=' margin-left:40%;color:red;'>< Đã tồn tại bệnh nhân này ></h3>";
              }
              else
              {
                  $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' OR sdt='$sdt'";
                  $lienket1=mysqli_query($CONN,$truyvan1);
                  if(mysqli_num_rows($lienket1)>0)
                  {
                      echo "<h3 style=' margin-left:30%;color:red;'>< Đã tồn tại mã bệnh nhân hoặc số điện thoại này, vui lòng nhập lại ! ></h3>";
                  }
                  else
                  {
                      $truyvan2="SELECT mabs,hoten FROM hosobacsy WHERE mabs='$mabs' AND hoten='$tenbs'";
                      $lienket2=mysqli_query($CONN,$truyvan2);
                      if(mysqli_num_rows($lienket2)>0)
                      {
                          $truyvan2= "INSERT INTO hosobenhnhan(mabn,hoten,ngaysinh,gioitinh,sdt,email,diachi,tieusubenh,ngayden) VALUES('$mabn','$tenbn','$ngaysinh','$gioitinh','$sdt','$email','$diachi','$tieusubenh','$ngayden')";
                          $lienket2 = mysqli_query($CONN,$truyvan2)or die("sai1");
                          $truyvan4= "INSERT INTO lichhen(lankham,ngayhen,mabn,mabs,noidung) VALUES('$lankham2','$ngayhen','$mabn','$mabs','$noidung')";
                          $lienket4 = mysqli_query($CONN,$truyvan4)or die("sai3");
                          echo "<h3 style=' margin-left:40%;color:red;'>< Đăng kí thành công ! ></h3>";
                      }
                      
                      
                  }
              }
          }
          else
              echo "<h3 style=' margin-left:40%;color:red;'>< Nhập vào đầy đủ thông tin ></h3>";
      }
         //khi chi them don thuoc
    if(!isset($_POST['lankham1']) && !isset($_POST['lankham2']) && isset($_POST['lankham3']) &&isset($_POST['soluongthuoc']) && isset($_POST['cachdung']) && isset($_POST['tenthuoc'])  && !isset($_POST['noidung']) && !isset($_POST['tenbs']) && !isset($_POST['mabs']) && !isset($_POST['ngayhen']) && !isset($_POST['ghichu'])&& !isset($_POST['bsth']) && !isset($_POST['soluong']) && !isset($_POST['dongia']) && !isset($_POST['vitrirang']) && !isset($_POST['thuthuat']) && !isset($_POST['chuandoan']) && !isset($_POST['trieuchung'])  && isset($_POST['loidan']))
    {
       
        $tenthuoc=$_POST['tenthuoc'];
        $cachdung=$_POST['cachdung'];
        $soluongthuoc=$_POST['soluongthuoc'];
        $loidan=$_POST['loidan'];
        $lankham3=$_POST['lankham3'];
        if(!empty($lankham3) &&!empty($mabn) && !empty($tenbn)&& !empty($diachi) && !empty($ns) && !empty($sdt) && !empty($email) && !empty($tieusubenh) && !empty($_POST['gioitinh'])&&!empty($tenthuoc) && !empty($cachdung) && !empty($soluongthuoc) && !empty($loidan))
        {
            $gioitinh=$_POST['gioitinh'];
            $truyvan3="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' AND hoten='$tenbn' AND ngaysinh='$ngaysinh' AND diachi='$diachi' AND gioitinh='$gioitinh' AND sdt='$sdt'";
            $lienket3=mysqli_query($CONN,$truyvan3);
            if(mysqli_num_rows($lienket3)>0)
            {
                echo "<h3 style=' margin-left:40%;color:red;'>< Đã tồn tại bệnh nhân này ></h3>";
            }
            else
            {
                $truyvan1="SELECT * FROM hosobenhnhan WHERE mabn='$mabn' OR sdt='$sdt'";
                $lienket1=mysqli_query($CONN,$truyvan1);
                if(mysqli_num_rows($lienket1)>0)
                {
                    echo "<h3 style=' margin-left:30%;color:red;'>< Đã tồn tại mã bệnh nhân hoặc số điện thoại này, vui lòng nhập lại ! ></h3>";
                }
                else
                {
                  
                        $truyvan2= "INSERT INTO hosobenhnhan(mabn,hoten,ngaysinh,gioitinh,sdt,email,diachi,tieusubenh,ngayden) VALUES('$mabn','$tenbn','$ngaysinh','$gioitinh','$sdt','$email','$diachi','$tieusubenh','$ngayden')";
                        $lienket2 = mysqli_query($CONN,$truyvan2)or die("sai1");
                        $truyvan5= "INSERT INTO donthuoc(lankham,mabn,tenthuoc,cachdung,soluong,loidan) VALUES('$lankham3','$mabn','$tenthuoc','$cachdung','$soluongthuoc','$loidan')";
                        $lienket5 = mysqli_query($CONN,$truyvan5)or die("sai4");
                        echo "<h3 style=' margin-left:40%;color:red;'>< Đăng kí thành công ! ></h3>";
                    
                
                    
                }
            }
        }
        else
            echo "<h3 style=' margin-left:40%;color:red;'>< Nhập vào đầy đủ thông tin ></h3>";
    }
}
/////////////////////////////////////////////////////////////
if(mysqli_num_rows($lienket1)>0)
{
    while($row1=mysqli_fetch_assoc($lienket1))
    {
    echo "<div style='position:relative;width:100%;height:400px;'>";
    echo "<img style='position:absolute;width:20%;' src='hinhanh/hoso.png' alt=''>";
    echo "<div class='div4'>";
    echo "<form method='POST' >";
    echo "<lable style='margin-right:45px;' for='mabn'>Mã bệnh nhân:</lable>";
    echo $row1['mabn'] ."<br>";
    echo "<lable for='tenbn'>Tên bệnh nhân:</lable>";
    echo "<input style='width:60%;margin-left:38px;' type='text' name='tenbn' value='$row1[hoten]'><br>";
    echo "<lable for='nsbn'>Ngày sinh:</lable>";
    $ns=$row1['ngaysinh'];
    $ngaysinh=date('d-m-Y',strtotime($ns));
    $nd=$row1['ngayden'];
    $ngayden=date('d-m-Y',strtotime($nd));
    echo "<input style='margin-left:75px;' type='text' name='nsbn'value='$ngaysinh'>";
    echo "<lable style='margin-left:7px;' for='nsbn'>Giới tính:</lable>";
    echo "<input style='border:none;margin-left:20px;' type='text' name='gioitinh' value='$row1[gioitinh]'><br>";
    echo "<lable for='sdt'>Số điện thoại:</lable>";
    echo "<input style='margin-left:53px;' type='text' name='sdt'value='$row1[sdt]'>";
    echo "<lable style='margin-left:7px;' for='email'>Email:</lable>";
    echo "<input style='margin-left:45px;width:20%;' type='text' name='email' value='$row1[email]'><br>";
    echo "<lable for='diachi'>Địa chỉ:</lable>";
    echo "<input style='margin-left:98px;width:60%;' type='text' name='diachi' value='$row1[diachi]'><br>";
    echo "<lable for='tieusubenh'>Tiểu sử bệnh:</lable>";
    echo "<input style='margin-left:53px;width:60%;' type='text' name='tieusubenh' value='$row1[tieusubenh]'><br>";
    echo "<lable for='ngayden'>Ngày đến:</lable>";
    echo "<input style='margin-left:70px;width:60%;border:none;' type='text' name='ngayden' value='$ngayden'><br>";
    echo "<input style='width:10%; margin-top:15px; background-color:rgb(37, 158, 37);color:white;padding:5px;' type='submit' name='suathongtin' value='Sửa thông tin'>";
    echo "<button style=' width:15%;font-size:13px;margin:15px 0 0 5px; background-color:rgb(37, 158, 37);color:white;padding:5px;text-decoration:none;border:2px solid black;'  >Lập phiếu khám</button>";
    echo "<a style='width:10%;font-size:13px;margin:15px 0 0 5px; background-color:rgb(37, 158, 37);color:white;padding:5px;text-decoration:none;border:2px solid black;'  href='hosobenhnhan.php?tentk=".$tentk."'>Quay lại</a>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    }
}
?>