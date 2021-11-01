<?php
$CONN = new mysqli('localhost','root','','qlpknk');
mysqli_query($CONN,'SET NAMES UTF8');
if(isset($_GET['lan']))
{
    $mabn=$_GET['mabn'];
    $tentk=$_GET['tentk'];
    $lankham=$_GET['lan'];
    echo $lankham;
}

//===Ket qua dieu tri===
    //sửa thủ thuật
    if(isset($_POST['suathuthuat']))
    {
        $nth=$_POST['ngaythuchien'];
        $ngaythuchien=date('Y-m-d',strtotime($nth));
        $mabs=$_POST['mabs'];
        $trieuchung=$_POST['trieuchung'];
        $chuandoan=$_POST['chuandoan'];
        $tenthuthuat=$_POST['thuthuat'];
        $vitrirang=$_POST['vitrirang'];
        $giatien=$_POST['giatien'];
        $soluong=$_POST['soluong'];
        $ghichu=$_POST['ghichu'];

        $truyvan1="UPDATE thuthuat SET ngaythuchien='$ngaythuchien', mabs='$mabs',trieuchung='$trieuchung',chuandoan='$chuandoan',thuthuatdieutri='$tenthuthuat', vitrirang='$vitrirang',gia='$giatien',soluong='$soluong',ghichu='$ghichu' WHERE mabn='$mabn' AND lankham='$lankham'";
        $lienket1=mysqli_query($CONN,$truyvan1);

        header("location:LSBN_bacsy.php?mabn=$mabn&&tentk=$tentk");

    }
    //sửa lịch hẹn
    if(isset($_POST['sualichhen']))
    {   
        $nh=$_POST['ngayhen'];
        $ngayhen=date('Y-m-d',strtotime($nh));
        $mabs=$_POST['mabs'];
        $noidung=$_POST['noidung'];

        $truyvan2="UPDATE lichhen SET ngayhen='$ngayhen',mabs='$mabs',noidung='$noidung' WHERE mabn='$mabn' AND lankham='$lankham'" ;
        $lienket2=mysqli_query($CONN,$truyvan2);

        header("location:LSBN_bacsy.php?mabn=$mabn&&tentk=$tentk");

    }
    if(isset($_POST['sua']))
    {
        if(isset($_GET['id']))
        {
            $tentk=$_GET['tentk'];
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
        $ketnoi1 = mysqli_query($CONN,$truyvan1);

        header("location:lichhen.php?tentk=".$tentk."");

    }
    //sửa đơn thuốc
    if(isset($_POST['suadonthuoc']))
    {
        $tenthuoc=$_POST['tenthuoc'];
        $soluong=$_POST['soluong'];
        $cachdung=$_POST['cachdung'];
        $loidan=$_POST['loidan'];

        $truyvan3="UPDATE donthuoc SET tenthuoc='$tenthuoc',soluong='$soluong',cachdung='$cachdung',loidan='$loidan' WHERE mabn='$mabn' AND lankham='$lankham'";
        $lienket3=mysqli_query($CONN,$truyvan3);

        header("location:LSBN_bacsy.php?mabn=$mabn&&tentk=$tentk");


    }
    //xóa thủ thuật
    if(isset($_POST['xoathuthuat']))
    {
        $ngaythuchien=$_POST['ngaythuchien'];
        $mabs=$_POST['mabs'];
        $trieuchung=$_POST['trieuchung'];
        $chuandoan=$_POST['chuandoan'];
        $tenthuthuat=$_POST['thuthuat'];
        $vitrirang=$_POST['vitrirang'];
        $giatien=$_POST['giatien'];
        $soluong=$_POST['soluong'];
        $ghichu=$_POST['ghichu'];

        $truyvan4="DELETE FROM thuthuat WHERE mabn='$mabn' AND lankham='$lankham'";
        $lienket4=mysqli_query($CONN,$truyvan4);

        header("location:LSBN_bacsy.php?mabn=$mabn&&tentk=$tentk");

    }
    //xoa lich hen
    if(isset($_POST['xoalichhen']))
    {   $ngayhen=$_POST['ngayhen'];
        $mabs=$_POST['mabs'];
        $noidung=$_POST['noidung'];
        $truyvan5="DELETE FROM lichhen WHERE mabn='$mabn' AND lankham='$lankham'";
        $lienket5=mysqli_query($CONN,$truyvan5) or die("sai");
        header("location:LSBN_bacsy.php?mabn=$mabn&&tentk=$tentk");

    }
    if(isset($_POST['xoa']))
    {   
        if(isset($_GET['id']))
        {
            $tentk=$_GET['tentk'];
            $id=$_GET['id'];
        }
        $mabn=$_POST['mabn'];
        $truyvan5="DELETE FROM lichhen WHERE mabn='$mabn' AND id='$id'";
        $lienket5=mysqli_query($CONN,$truyvan5) or die("sai");
        header("location:lichhen.php?tentk=".$tentk."");

    }
    //xoa đơn thuốc
    if(isset($_POST['xoadonthuoc']))
    {
        $tenthuoc=$_POST['tenthuoc'];
        $soluong=$_POST['soluong'];
        $cachdung=$_POST['cachdung'];
        $loidan=$_POST['loidan'];
        $truyvan6="DELETE FROM donthuoc WHERE mabn='$mabn' AND lankham='$lankham'";
        $lienket6=mysqli_query($CONN,$truyvan6) or die("sai");

        header("location:LSBN_bacsy.php?mabn=$mabn&&tentk=$tentk");

    }

//===bang luong===
    //bac si
    if(isset($_GET['mabs']))
    {
        $tentk=$_GET['tentk'];
        $thang=$_GET['thang'];
        $nam=$_GET['nam'];
        $mabs=$_GET['mabs'];
        $ung=$_POST['ung'];
        $ung = str_replace( ',', '', $ung );
        $luongcb=$_POST['luongcb'];
        $luongcb = str_replace( ',', '', $luongcb );
        $heso=$_POST['heso'];
        $ngaycong=$_POST['ngaycong'];
        $themgio=$_POST['themgio'];
        $tienthem=$_POST['tienthem'];
        $tienthem = str_replace( ',', '', $tienthem );
        $thuong=$_POST['thuong'];
        $thuong = str_replace( ',', '', $thuong );
        $comxe=$_POST['comxe'];
        $comxe = str_replace( ',', '', $comxe );
        $trachnhiem=$_POST['trachnhiem'];
        $trachnhiem = str_replace( ',', '', $trachnhiem );
        $baohiem=$_POST['baohiem'];
        $baohiem = str_replace( ',', '', $baohiem );
        $tongluong = ($luongcb*$ngaycong)+($themgio*$tienthem)+$thuong+$comxe+$trachnhiem+$baohiem;

        $CONN = new mysqli('localhost','root','','qlpknk');
        mysqli_query($CONN,'SET NAMES UTF8');
        $truyvan="UPDATE luong SET ung='$ung',luongcb='$luongcb',heso='$heso',ngaycong='$ngaycong',themgio='$themgio',tienthem='$tienthem',thuong='$thuong',comxe='$comxe',trachnhiem='$trachnhiem',baohiem='$baohiem',tongluong='$tongluong' WHERE mabs='$mabs' AND thang=$thang AND nam=$nam";
        $lienket=mysqli_query($CONN,$truyvan)or die("sai");

        if(isset($_POST['xoalbs']))
        {
            $truyvan2="DELETE FROM luong WHERE mabs='$mabs' AND thang=$thang AND nam=$nam";
            $lienket2=mysqli_query($CONN,$truyvan2)or die("sai");
        }
        header("location:bangluongbacsi.php?tentk=$tentk&&thang=$thang&&nam=$nam&&bangluong");
    }

    //nhan vien
    if(isset($_GET['manv']))
    {
        $tentk=$_GET['tentk'];
        $thang=$_GET['thang'];
        $nam=$_GET['nam'];
        $manv=$_GET['manv'];
        $ung=$_POST['ung'];
        $ung = str_replace( ',', '', $ung );
        $luongcb=$_POST['luongcb'];
        $luongcb = str_replace( ',', '', $luongcb );
        $heso=$_POST['heso'];
        $ngaycong=$_POST['ngaycong'];
        $themgio=$_POST['themgio'];
        $tienthem=$_POST['tienthem'];
        $tienthem = str_replace( ',', '', $tienthem );
        $thuong=$_POST['thuong'];
        $thuong = str_replace( ',', '', $thuong );
        $comxe=$_POST['comxe'];
        $comxe = str_replace( ',', '', $comxe );
        $trachnhiem=$_POST['trachnhiem'];
        $trachnhiem = str_replace( ',', '', $trachnhiem );
        $baohiem=$_POST['baohiem'];
        $baohiem = str_replace( ',', '', $baohiem );
        $tongluong = ($luongcb*$ngaycong)+($themgio*$tienthem)+$thuong+$comxe+$trachnhiem+$baohiem;

        $CONN = new mysqli('localhost','root','','qlpknk');
        mysqli_query($CONN,'SET NAMES UTF8');
        $truyvan="UPDATE luongnhanvien SET ung='$ung',luongcb='$luongcb',heso='$heso',ngaycong='$ngaycong',themgio='$themgio',tienthem='$tienthem',thuong='$thuong',comxe='$comxe',trachnhiem='$trachnhiem',baohiem='$baohiem',tongluong='$tongluong' WHERE manv='$manv' AND thang=$thang AND nam=$nam";
        $lienket=mysqli_query($CONN,$truyvan)or die("sai");

        if(isset($_POST['xoalnv']))
        {
            $truyvan2="DELETE FROM luongnhanvien WHERE manv='$manv' AND thang=$thang AND nam=$nam";
            $lienket2=mysqli_query($CONN,$truyvan2)or die("sai");
        }
        header("location:bangluongnhanvien.php?tentk=$tentk&&thang=$thang&&nam=$nam&&bangluong");
    }

//===thong tin(them sua xoa)===
    //Xoa benh nhan
    if(isset($_GET['xoabn']))
    {
        $id=$_GET['xoabn'];
        echo $id;
        $tentk=$_GET['tentk'];
        echo $tentk;
        $CONN = new mysqli('localhost','root','','qlpknk');
        $truyvan1 = "DELETE FROM donthuoc WHERE mabn='$id'";
        $ketnoi1 = mysqli_query($CONN,$truyvan1);
        $truyvan = "DELETE FROM hosobenhnhan WHERE mabn='$id'";
        $ketnoi = mysqli_query($CONN,$truyvan);
        $truyvan2 = "DELETE FROM lichhen WHERE mabn='$id'";
        $ketnoi2 = mysqli_query($CONN,$truyvan2);
        $truyvan3 = "DELETE FROM thuthuat WHERE mabn='$id'";
        $ketnoi3 = mysqli_query($CONN,$truyvan3);
        $truyvan4 = "DELETE FROM taikhoan WHERE tentk='$id'";
        $ketnoi4 = mysqli_query($CONN,$truyvan4)or die("");
        header("location:HSBN_nhanvien.php?tentk=$tentk");
    }
    //xoa nhan vien
    if(isset($_GET['xoanv']))
    {
        $id=$_GET['xoanv'];
        $tentk=$_GET['tentk'];
        $CONN = new mysqli('localhost','root','','qlpknk');
        $truyvan1 = "DELETE FROM hosonhanvien WHERE manv='$id'";
        $ketnoi1 = mysqli_query($CONN,$truyvan1)or die("");
        $truyvan2 = "DELETE FROM taikhoannhanvien WHERE tentk='$id'";
        $ketnoi2 = mysqli_query($CONN,$truyvan2)or die("");
        header("location:HSNV_admin.php?tentk=$tentk");

    }

    //xoa bác sĩ
    if(isset($_GET['xoabs']))
    {
        $id=$_GET['xoabs'];
        $tentk=$_GET['tentk'];
        $CONN = new mysqli('localhost','root','','qlpknk');
        $truyvan1 = "DELETE FROM hosobacsy WHERE mabs='$id'";
        $ketnoi1 = mysqli_query($CONN,$truyvan1)or die("");
        $truyvan2 = "DELETE FROM taikhoanbacsy WHERE tentk='$id'";
        $ketnoi2 = mysqli_query($CONN,$truyvan2)or die("");
        header("location:HSBS_admin.php?tentk=$tentk");

    }

//===Thêm bảng lương===
    //bac si
    if(isset($_POST['luongbs'])||isset($_POST['sualuongbs'])||isset($_POST['xoaluongbs']))
    {
        $thang=date("m");
        $nam=Date("Y");
        $mabs=$ung=$luongcb=$heso=$ngaycong=$themgio=$tienthem=$thuong=$comxe=$trachnhien=$baohiem='';

        $mabs=$_GET['bacsi'];
        $ung=$_POST['ung'];
        if(!empty($ung))
        {
            $ung = str_replace( ',', '', $ung );
        }
        else
            $ung=0;
        $luongcb=$_POST['luongcb'];
        if(!empty($luongcb))
        {
            $luongcb = str_replace( ',', '', $luongcb );
        }
        else
            $luongcb=0;
        $heso=$_POST['heso'];
        $ngaycong=$_POST['ngaycong'];
        if(empty($ngaycong))
             $ngaycong=0;
        $themgio=$_POST['themgio'];
        if(empty($themgio))
             $themgio=0;
        $tienthem=$_POST['tienthem'];
        if(!empty($tienthem))
        {
            $tienthem = str_replace( ',', '', $tienthem );
        }
        else
            $tienthem=0;
        $thuong=$_POST['thuong'];
        if(!empty($thuong))
        {
            $thuong = str_replace( ',', '', $thuong );
        }
        else
            $thuong=0;
        $comxe=$_POST['comxe'];
        if(!empty($comxe))
        {
            $comxe = str_replace( ',', '', $comxe );
        }
        else
            $comxe=0;
        $trachnhiem=$_POST['trachnhiem'];
        if(!empty($trachnhiem))
        {
            $trachnhiem = str_replace( ',', '', $trachnhiem );
        }
        else
            $trachnhiem=0;
        $baohiem=$_POST['baohiem'];
        if(!empty($baohiem))
        {
            $baohiem = str_replace( ',', '', $baohiem );
        }
        else
            $baohiem=0;
        $tongluong = ($luongcb*$ngaycong)+($themgio*$tienthem)+$thuong+$comxe+$trachnhiem+$baohiem;
        if(isset($_POST['luongbs']))
        {
            $truyvan1="SELECT * FROM luong WHERE mabs='$mabs' AND thang='$thang' AND nam='$nam'";
            $lienket1=mysqli_query($CONN,$truyvan1);
            if(mysqli_num_rows($lienket1)<=0)
            {
                $truyvan="INSERT INTO luong(mabs,ung,luongcb,heso,ngaycong,themgio,tienthem,thuong,comxe,trachnhiem,baohiem,tongluong,thang,nam) VALUES('$mabs','$ung','$luongcb','$heso','$ngaycong','$themgio','$tienthem','$thuong','$comxe','$trachnhiem','$baohiem','$tongluong','$thang','$nam')";
                $lienket=mysqli_query($CONN,$truyvan)or die("sai");
            }
        }
        if(isset($_POST['sualuongbs']))
        {
            $truyvan2="UPDATE luong SET ung='$ung',luongcb='$luongcb',heso='$heso',ngaycong='$ngaycong',themgio='$themgio',tienthem='$tienthem',thuong='$thuong',comxe='$comxe',trachnhiem='$trachnhiem',baohiem='$baohiem',tongluong='$tongluong' WHERE mabs='$mabs' AND thang=$thang AND nam=$nam";
            $lienket2=mysqli_query($CONN,$truyvan2)or die("sai");
        }
        if(isset($_POST['xoaluongbs']))
        {
            $truyvan2="DELETE FROM luong WHERE mabs='$mabs' AND thang=$thang AND nam=$nam";
            $lienket2=mysqli_query($CONN,$truyvan2)or die("sai");
        }
        header("location:bangluongbacsi.php?tentk=$tentk&&luong");

    }

    //nhan vien
    if(isset($_POST['luongnv'])||isset($_POST['sualuongnv'])||isset($_POST['xoaluongnv']))
    {
        $thang=date("m");
        $nam=Date("Y");
        $mabs=$ung=$luongcb=$heso=$ngaycong=$themgio=$tienthem=$thuong=$comxe=$trachnhien=$baohiem='';

        $mabs=$_GET['nhanvien'];
        $ung=$_POST['ung'];
        if(!empty($ung))
        {
            $ung = str_replace( ',', '', $ung );
        }
        else
            $ung=0;
        $luongcb=$_POST['luongcb'];
        if(!empty($luongcb))
        {
            $luongcb = str_replace( ',', '', $luongcb );
        }
        else
            $luongcb=0;
        $heso=$_POST['heso'];
        $ngaycong=$_POST['ngaycong'];
        if(empty($ngaycong))
             $ngaycong=0;
        $themgio=$_POST['themgio'];
        if(empty($themgio))
             $themgio=0;
        $tienthem=$_POST['tienthem'];
        if(!empty($tienthem))
        {
            $tienthem = str_replace( ',', '', $tienthem );
        }
        else
            $tienthem=0;
        $thuong=$_POST['thuong'];
        if(!empty($thuong))
        {
            $thuong = str_replace( ',', '', $thuong );
        }
        else
            $thuong=0;
        $comxe=$_POST['comxe'];
        if(!empty($comxe))
        {
            $comxe = str_replace( ',', '', $comxe );
        }
        else
            $comxe=0;
        $trachnhiem=$_POST['trachnhiem'];
        if(!empty($trachnhiem))
        {
            $trachnhiem = str_replace( ',', '', $trachnhiem );
        }
        else
            $trachnhiem=0;
        $baohiem=$_POST['baohiem'];
        if(!empty($baohiem))
        {
            $baohiem = str_replace( ',', '', $baohiem );
        }
        else
            $baohiem=0;
        $tongluong = ($luongcb*$ngaycong)+($themgio*$tienthem)+$thuong+$comxe+$trachnhiem+$baohiem;
        echo $tongluong;
        if(isset($_POST['luongnv']))
        {
            $truyvan1="SELECT * FROM luongnhanvien WHERE manv='$mabs' AND thang='$thang' AND nam='$nam'";
            $lienket1=mysqli_query($CONN,$truyvan1);
            if(mysqli_num_rows($lienket1)<=0)
            {
                $truyvan="INSERT INTO luongnhanvien(manv,ung,luongcb,heso,ngaycong,themgio,tienthem,thuong,comxe,trachnhiem,baohiem,tongluong,thang,nam) VALUES('$mabs','$ung','$luongcb','$heso','$ngaycong','$themgio','$tienthem','$thuong','$comxe','$trachnhiem','$baohiem','$tongluong','$thang','$nam')";
                $lienket=mysqli_query($CONN,$truyvan)or die("sai");
            }
        }
        if(isset($_POST['sualuongnv']))
        {
            $truyvan2="UPDATE luongnhanvien SET ung='$ung',luongcb='$luongcb',heso='$heso',ngaycong='$ngaycong',themgio='$themgio',tienthem='$tienthem',thuong='$thuong',comxe='$comxe',trachnhiem='$trachnhiem',baohiem='$baohiem',tongluong='$tongluong' WHERE manv='$mabs' AND thang=$thang AND nam=$nam";
            $lienket2=mysqli_query($CONN,$truyvan2)or die("sai");
        }
        if(isset($_POST['xoaluongnv']))
        {
            $truyvan2="DELETE FROM luongnhanvien WHERE manv='$mabs' AND thang=$thang AND nam=$nam";
            $lienket2=mysqli_query($CONN,$truyvan2)or die("sai");
        }
        //header("location:bangluongnhanvien.php?tentk=$tentk&&luong");

    }

//===Sửa tài khoản===
    //bac si
    if(isset($_POST['suatkbs']))
    {
        $tentk=$_GET['tentk'];
        $mk=$_POST['mk'];
        $ten=$_POST['ten'];
        echo $ten;
        $truyvan="UPDATE taikhoanbacsy SET matkhau='$mk' WHERE tentk='$ten'";
        $lienket=mysqli_query($CONN,$truyvan)or die("sai");
        header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoan=bacsi");
    }
    
    //nhan vien
    if(isset($_POST['suatknv']))
    {
        $tentk=$_GET['tentk'];
        $mk=$_POST['mk'];
        $ten=$_POST['ten'];
        echo $ten;
        $truyvan="UPDATE taikhoannhanvien SET matkhau='$mk' WHERE tentk='$ten'";
        $lienket=mysqli_query($CONN,$truyvan)or die("sai");
        header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoan=nhanvien");
    }

    //benhnhan
    if(isset($_POST['suatkbn']))
    {
        $tentk=$_GET['tentk'];
        $mk=$_POST['mk'];
        $ten=$_POST['ten'];
        echo $ten;
        $truyvan="UPDATE taikhoan SET matkhau='$mk' WHERE tentk='$ten'";
        $lienket=mysqli_query($CONN,$truyvan)or die("sai");
        header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoan=benhnhan");
    }

//===xoa tai khan===
    //bac si
    if(isset($_POST['xoatkbs']))
        {
            $tentk=$_GET['tentk'];
            $ten=$_POST['ten'];
            echo $ten;
            $truyvan2 = "DELETE FROM taikhoanbacsy WHERE tentk='$ten'";
            $ketnoi2 = mysqli_query($CONN,$truyvan2)or die("");
            header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoan=bacsi");
        }
    //nhan vien
    if(isset($_POST['xoatknv']))
    {
        $tentk=$_GET['tentk'];
            $ten=$_POST['ten'];
            echo $ten;
            $truyvan2 = "DELETE FROM taikhoannhanvien WHERE tentk='$ten'";
            $ketnoi2 = mysqli_query($CONN,$truyvan2)or die("");
            header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoan=nhanvien");
    }
    //benh nhan
    if(isset($_POST['xoatkbn']))
    {
            $tentk=$_GET['tentk'];
            $ten=$_POST['ten'];
            echo $ten;
            $truyvan2 = "DELETE FROM taikhoan WHERE tentk='$ten'";
            $ketnoi2 = mysqli_query($CONN,$truyvan2)or die("sai");
            header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoan=benhnhan");
    }
//===them tai khoan===

    //bac si
    if(isset($_POST['themtkbs']))
    {
        $tentk=$_GET['tentk'];
        $mk=$_POST['mk'];
        $ten=$_POST['ten'];
        echo $ten;echo $mk;
        $truyvanbs="SELECT * FROM taikhoanbacsy WHERE tentk='$ten'";
        $lienketbs=mysqli_query($CONN,$truyvanbs);
        $rowbs=mysqli_fetch_assoc($lienketbs);
        if($rowbs<=0)
        {
            $truyvanbs1="SELECT * FROM hosobacsy WHERE mabs='$ten'";
            $lienketbs1=mysqli_query($CONN,$truyvanbs1);
            $rowbs1=mysqli_fetch_assoc($lienketbs1);
            if($rowbs1>0)
            {
                $truyvan1="INSERT INTO taikhoanbacsy(tentk,matkhau) VALUES('$ten','$mk')";
                $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoanbs=dung");
            }
            else
                header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoanbs=chuatontai");
        }
        else
            header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoanbs=sai");

    }

    //nhan vien
    if(isset($_POST['themtknv']))
    {
        $tentk=$_GET['tentk'];
        $mk=$_POST['mk'];
        $ten=$_POST['ten'];
        echo $ten;echo $mk;
        $truyvanbs="SELECT * FROM taikhoannhanvien WHERE tentk='$ten'";
        $lienketbs=mysqli_query($CONN,$truyvanbs);
        $rowbs=mysqli_fetch_assoc($lienketbs);
        if($rowbs<=0)
        {
            $truyvanbs1="SELECT * FROM hosonhanvien WHERE manv='$ten'";
            $lienketbs1=mysqli_query($CONN,$truyvanbs1);
            $rowbs1=mysqli_fetch_assoc($lienketbs1);
            if($rowbs1>0)
            {
                $truyvan1="INSERT INTO taikhoannhanvien(tentk,matkhau) VALUES('$ten','$mk')";
                $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoannv=dung");
            }
            else
                header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoannv=chuatontai");
        }
        else
            header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoannv=sai");

    }
    
    //benh nhan
    if(isset($_POST['themtkbn']))
    {
        $tentk=$_GET['tentk'];
        $mk=$_POST['mk'];
        $ten=$_POST['ten'];
        echo $ten;echo $mk;
        $truyvanbs="SELECT * FROM taikhoan WHERE tentk='$ten'";
        $lienketbs=mysqli_query($CONN,$truyvanbs);
        $rowbs=mysqli_fetch_assoc($lienketbs);
        if($rowbs<=0)
        {
            $truyvanbs1="SELECT * FROM hosobenhnhan WHERE mabn='$ten'";
            $lienketbs1=mysqli_query($CONN,$truyvanbs1);
            $rowbs1=mysqli_fetch_assoc($lienketbs1);
            if($rowbs1>0)
            {
                $truyvan1="INSERT INTO taikhoan(tentk,matkhau) VALUES('$ten','$mk')";
                $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
                header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoanbn=dung");
            }
            else
                header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoanbn=chuatontai");
        }
        else
            header("location:quanlitaikhoan_admin.php?tentk=$tentk&&taikhoanbn=sai");

    }
    
//===Them hoa don===
    if(isset($_GET['n']))
    {
        $tentk=$_GET['tentk'];
        $n=$_GET['n'];
        $i=$_GET['i'];
        $err1=$_POST['tenthuoc'];
        $err2=$_POST['donvi'];
        $err3=$_POST['gia'];
        $err4=$_POST['cachdung'];
        $err5=$_POST['soluong'];
        $err6=$_POST['loaithuoc'];
        if(!empty($err1&&$err2&&$err3&&$err4&&$err5&&$err6))
        {
            $truyvan1="INSERT INTO thuoc(tenthuoc,donvi,gia,cachdung,soluong,nhomthuoc) values('$err1','$err2','$err3','$err4','$err5','$err6')";
            $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
            $truyvan2="SELECT mathuoc FROM thuoc WHERE tenthuoc='$err1' and donvi='$err2' and gia='$err3'and cachdung='$err4' and nhomthuoc='$err6'";
            $lienket2=mysqli_query($CONN,$truyvan2);
            $row=mysqli_fetch_assoc($lienket2);
            $mathuoc=$row['mathuoc'];
            //header("location:thuoc_bacsy.php?tentk=".$tentk."&&n=$n&&mathuoc=$mathuoc&&i=$i");
            if(isset($_GET['a']))
            {
               echo "sai";
            }

        }
        else
            header("location:thuoc_bacsy.php?tentk=".$tentk."&&n=$n&&=sai");


    }

//===Sửa và xóa thuốc===
    //Sửa thuốc
    if(isset($_POST['suathuoc'])||isset($_POST['xoathuoc']))
    {
        $tentk=$_GET['tentk'];
        if(isset($_POST['mathuoc']))
        {
            $mathuoc=$_POST['mathuoc'];
            $tenthuoc=$_POST['tenthuoc'];
            $donvi=$_POST['donvi'];
            $soluong=$_POST['soluong'];
            $gia=$_POST['gia'];
            $cachdung=$_POST['cachdung'];
            $nhomthuoc=$_POST['nhomthuoc'];
            echo $gia;
            echo $nhomthuoc;
            echo $soluong;
            if(isset($_POST['suathuoc']))
            {
                $truyvan1="UPDATE thuoc SET tenthuoc='$tenthuoc', donvi='$donvi',soluong='$soluong',gia='$gia',cachdung='$cachdung',nhomthuoc='$nhomthuoc' WHERE mathuoc='$mathuoc'";
                $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
            }
            if(isset($_POST['xoathuoc']))
            {
                $truyvan1="DELETE FROM thuoc WHERE mathuoc='$mathuoc'";
                $lienket1=mysqli_query($CONN,$truyvan1)or die("sai");
            }
            
            if(isset($_GET['khangsinh'])||isset($_GET['nhomthuoc']))
            {
                header("location:hoadon.php?tentk=$tentk&&khangsinh=khangsinh");
            }
            else if(isset($_GET['giamdau']))
            {
                header("location:hoadon.php?tentk=$tentk&&giamdau=giamdau");
            }
            else if(isset($_GET['nhiemtrung']))
            {
                header("location:hoadon.php?tentk=$tentk&&nhiemtrung=nhiemtrung");
            }
            else if(isset($_GET['khangviem']))
            {
                header("location:hoadon.php?tentk=$tentk&&khangviem=khangviem");
            }
            else if(isset($_GET['khangviruss']))
            {
                header("location:hoadon.php?tentk=$tentk&&khangviruss=khangviruss");
            }
            else if(isset($_GET['thuocboi']))
            {
                header("location:hoadon.php?tentk=$tentk&&thuocboi=thuocboi");
            }
            else if(isset($_GET['chongebuot']))
            {
                header("location:hoadon.php?tentk=$tentk&&chongebuot=chongebuot");
            }
            else if(isset($_GET['giamsung']))
            {
                header("location:hoadon.php?tentk=$tentk&&giamsung=giamsung");
            }
            else 
                header("location:hoadon.php?tentk=$tentk&&hoadon");
        }
        else
        {
            if(isset($_GET['khangsinh']))
            {
                header("location:hoadon.php?tentk=$tentk&&khangsinh");
            }
            else if(isset($_GET['giamdau']))
            {
                header("location:hoadon.php?tentk=$tentk&&giamdau");
            }
            else if(isset($_GET['nhiemtrung']))
            {
                header("location:hoadon.php?tentk=$tentk&&nhiemtrung");
            }
            else if(isset($_GET['khangviem']))
            {
                header("location:hoadon.php?tentk=$tentk&&khangviem");
            }
            else if(isset($_GET['khangviruss']))
            {
                header("location:hoadon.php?tentk=$tentk&&khangviruss");
            }
            else if(isset($_GET['thuocboi']))
            {
                header("location:hoadon.php?tentk=$tentk&&thuocboi");
            }
            else if(isset($_GET['chongebuot']))
            {
                header("location:hoadon.php?tentk=$tentk&&chongebuot");
            }
            else if(isset($_GET['giamsung']))
            {
                header("location:hoadon.php?tentk=$tentk&&giamsung");
            }
            else 
                header("location:hoadon.php?tentk=$tentk&&hoadon");
        }
    }
    
?>