<?php

namespace App\Http\Controllers;
use App\HoaDon;
use App\KhachHang;
use App\HoaDonChiTiet;
use App\Sach;
use DateTime;
use Illuminate\Http\Request;

class BaoCaoController extends Controller
{
    //
    public function getDanhSach()
    {
        return view('admin.pages.baocao.danhsach');
    }
    public function getBaoCaoDonHang()
    {
        return view('admin.pages.baocao.baocaodonhang');
    }
    public function PostBaoCaoDonHang(request $request)
    {
        $tungay = $request->tungay;
        $denngay = $request->denngay;

        $donhang = HoaDon::whereBetween('created_at', array($tungay,$denngay))->get();
        $khachhang = KhachHang::all();

		$i = 1;
		$arr_ngay = [];
		$data_thang = [];


		$begin = new DateTime($tungay);
		$end = new DateTime($denngay);

		for ($j = $begin; $j <= $end; $j->modify('+1 day')) {
			$data_thang[$j->format("m-Y")]= 0;
		}

		foreach ($donhang as $dh) {
			$thang = date("m-Y", strtotime($dh->created_at));
			$data_thang[$thang] += 1;
        }
        return view('admin.pages.baocao.baocaodonhang',['donhang'=>$donhang,'khachhang'=>$khachhang,'data_thang'=>$data_thang]);
    }
    public function getBaoCaoKhachHang()
    {
        return view('admin.pages.baocao.baocaokhachhang');
    }
    public function PostBaoCaoKhachHang(request $request)
    {
        $tungay = $request->tungay;
        $denngay = $request->denngay;

        $khachhang = Khachhang::whereBetween('created_at', array($tungay,$denngay))->get();

		$i = 1;
		$arr_ngay = [];
		$data_thang = [];


		$begin = new DateTime($tungay);
		$end = new DateTime($denngay);

		for ($j = $begin; $j <= $end; $j->modify('+1 day')) {
			$data_thang[$j->format("m-Y")]= 0;
		}

		foreach ($khachhang as $dh) {
			$thang = date("m-Y", strtotime($dh->created_at));
			$data_thang[$thang] += 1;
        }
        return view('admin.pages.baocao.baocaokhachhang',['khachhang'=>$khachhang,'data_thang'=>$data_thang]);
    }
    public function getBaoCaoDoanhThu()
    {
        return view('admin.pages.baocao.baocaodoanhthu');
    }
    public function PostBaoCaoDoanhThu(request $request)
    {
        $tungay = $request->tungay;
        $denngay = $request->denngay;

        $donhang = HoaDon::whereBetween('created_at', array($tungay,$denngay))->get();
		$i = 1;
		$arr_ngay = [];
		$data_thang = [];

		$begin = new DateTime($tungay);
		$end = new DateTime($denngay);

		for ($j = $begin; $j <= $end; $j->modify('+1 day')) {
			$data_thang[$j->format("m-Y")]= 0;
		}

		foreach ($donhang as $dh) {
			$thang = date("m-Y", strtotime($dh->created_at));
			$data_thang[$thang] += $dh->tongtien;
        }
        return view('admin.pages.baocao.baocaodoanhthu',['donhang'=>$donhang,'data_thang'=>$data_thang]);
    }
    public function getBaoCaoMatHangBanChay()
    {
        return view('admin.pages.baocao.baocaomathangbanchay');
    }
    public function PostBaoCaoMatHangBanChay(request $request)
    {
        $tungay = $request->tungay;
        $denngay = $request->denngay;

        $donhang = HoaDonChiTiet::whereBetween('created_at', array($tungay,$denngay))->get();
        $arr_donhang = [];
        $arr_sach = Sach::all();         
        foreach($arr_sach as $s)
        {
            $arr_donhang[$s->id]=0;
            $arr_s[$s->id] = $s;
        }
        foreach($donhang as $dh)
        {
            $arr_donhang[$dh->id_sach]+=$dh->soluong;
        }
        $arr=[];
        $i=0;
        foreach($arr_donhang as $dh=>$vl)
        {
            $arr[$i][0]=$dh;
            $arr[$i][1]=$vl;
            $i++;
        }
        $tam_sach=0;
        $tam_sl = 0;
        for($j=0;$j<$i-1;$j++)
        {
            for($k=$j+1;$k<$i;$k++)
            {
                if($arr[$j][1]<$arr[$k][1])
                {
                    $tam_sach = $arr[$j][0];
                    $tam_sl = $arr[$j][1];
                    $arr[$j][0] = $arr[$k][0];
                    $arr[$j][1] = $arr[$k][1];
                    $arr[$k][0] = $tam_sach;
                    $arr[$k][1] = $tam_sl;
                }
            }
        }
        return view('admin.pages.baocao.baocaomathangbanchay',['arr'=>$arr,'arr_s'=>$arr_s]);
    }
}
