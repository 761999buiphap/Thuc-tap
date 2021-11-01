<?php 
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

    }
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

}
 
if(isset($_GET['mabs']))
{
    header("location:bangluongbacsi.php?tentk=$tentk&&thang=$thang&&nam=$nam");
}
if(isset($_GET['manv']))
{
    header("location:bangluongnhanvien.php?tentk=$tentk&&thang=$thang&&nam=$nam");
}

?>