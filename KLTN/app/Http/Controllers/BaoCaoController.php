<?php

namespace App\Http\Controllers;
use App\HoaDon;
use App\KhachHang;
use App\HoaDonChiTiet;
use App\Cay;
use App\User;
use App\LienHe;
use App\BinhLuan;
use App\TruyCapp;
use DateTime;
use Illuminate\Http\Request;

class BaoCaoController extends Controller
{
    //
    public function DanhSach()
    {
        $ngay = date("Y-m-d");
        $tong_binhluan = BinhLuan::all();
        $tong_khachhang = KhachHang::all();
        $tong_donhang = HoaDon::all();
        $tong_lienhe = LienHe::all();

        $binhluan = BinhLuan::where('ngay',$ngay)->get();
        $khachhang = KhachHang::where('created_at',$ngay)->get();
        $donhang = HoaDon::where('created_at',$ngay)->get();
        $lienhe = LienHe::where('created_at',$ngay)->get();

        $doanhthu = HoaDonChiTiet::all();
        $mindate = HoaDonChiTiet::min("created_at");
        $maxdate = HoaDonChiTiet::max("created_at");

        $begin = new DateTime($mindate);
		$end = new DateTime($maxdate);
        $data_thang = [];
        for ($j = $begin; $j <= $end; $j->modify('+1 day')) {
			$data_thang[$j->format("Y-m-d")]= 0;
		}

		foreach ($doanhthu as $value) {
			$thang = date("Y-m-d", strtotime($value->created_at));
			$data_thang[$thang] += $value->gia;
        }
        $truycap = TruyCapp::all();

        $mindate_truycap = TruyCapp::min("created_at");
        $maxdate_truycap = TruyCapp::max("created_at");
        $begin = new DateTime($mindate_truycap);
		$end = new DateTime($maxdate_truycap);
        $data_thang_truycap = [];
        for ($j = $begin; $j <= $end; $j->modify('+1 day')) {
			$data_thang_truycap[$j->format("Y-m-d")]= 0;
		}

		foreach ($truycap as $value) {
			$thang = date("Y-m-d", strtotime($value->created_at));
			$data_thang_truycap[$thang] += 1;
        }

        $donhangban = HoaDonChiTiet::all();
        $sanphambanchay = [];
        $arr_cay = Cay::where('trangthai','Đang hoạt động')->get();
         
        foreach($arr_cay as $value)
        {
            $arr_s[$value->id] = $value;
        }
        foreach($donhangban as $dh)
        {
            $sanphambanchay[$dh->id_cay]['soluong']=0;
            $sanphambanchay[$dh->id_cay]['doanhthu']=0;
        }
        foreach($donhangban as $dh)
        {
            $sanphambanchay[$dh->id_cay]['soluong']+=$dh->soluong;
            $sanphambanchay[$dh->id_cay]['doanhthu']+=($dh->gia * $dh->soluong);
        }
        $arr=[];
        $i=0;
        foreach($sanphambanchay as $dh=>$vl)
        {
            $arr[$i][0]=$dh;
            $arr[$i][1]=$vl['soluong'];
            $arr[$i][2]=$vl['doanhthu'];
            $i++;
        }
        $tam_cay=0;
        $tam_sl = 0;
        for($j=0;$j<$i-1;$j++)
        {
            for($k=$j+1;$k<$i;$k++)
            {
                if($arr[$j][1]<$arr[$k][1])
                {
                    $tam_cay = $arr[$j][0];
                    $tam_sl = $arr[$j][1];
                    $tam_dt = $arr[$j][2];
                    $arr[$j][0] = $arr[$k][0];
                    $arr[$j][1] = $arr[$k][1];
                    $arr[$j][2] = $arr[$k][2];
                    $arr[$k][0] = $tam_cay;
                    $arr[$k][1] = $tam_sl;
                    $arr[$k][2] = $tam_dt;
                }
            }
        }

        return view('Admin.pages.baocao.danhsach',['binhluan'=>$binhluan,'khachhang'=>$khachhang,'donhang'=>$donhang,'lienhe'=>$lienhe,'data_thang'=>$data_thang,'data_thang_truycap'=>$data_thang_truycap,'tong_binhluan'=>$tong_binhluan,'tong_khachhang'=>$tong_khachhang,'tong_lienhe'=>$tong_lienhe,'tong_donhang'=>$tong_donhang,'arr'=>$arr,'arr_s'=>$arr_s]);
    }

    public function BinhLuan()
    {
        $ngay = date("Y-m-d");
        $binhluan = BinhLuan::where('ngay',$ngay)->get();

        $arr_user = [];
        $arr_cay = [];
        $cay = Cay::where('trangthai','Đang hoạt động')->get();        
        foreach($cay as $value)
        {
            $arr_cay[$value->id] = $value->ten;
        }
        $tb_user = User::where('quyen','1')->get();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('Admin.pages.baocao.binhluan',['binhluan'=>$binhluan,'arr_user'=>$arr_user,'arr_cay'=>$arr_cay,'cay'=>$cay,'tb_user'=>$tb_user]);
    
    }
    public function KhachHang()
    {
        $khachhang = KhachHang::where('created_at',date("Y-m-d"))->get();
        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('Admin.pages.baocao.khachhang',['khachhang'=>$khachhang,'arr_user'=>$arr_user]);
    }
    public function LienHe()
    {
        $lienhe = LienHe::where('created_at',date("Y-m-d"))->get();
        return view('ADMIN.pages.baocao.lienhe',['lienhe'=>$lienhe]);
    }
    public function BaoCaoBinhLuan(request $request)
    {
        $this->validate($request,
        [
            'tungay' => 'required',
            'denngay' => 'required',
        ],
        [
            'tungay.required'=>'Bạn chưa chọn từ ngày',
            'denngay.required'=>'Bạn chưa chọn đến ngày',
        ]);
        $ngay = date("Y-m-d");
        if(!empty($request->cay))
        {
            $tungay = $request->tungay;
            $denngay = $request->denngay;
            $binhluan = BinhLuan::where('id_cay',$request->cay)->whereBetween('ngay', array($tungay,$denngay))->get();
        }
        else
        {
            $tungay = $request->tungay;
            $denngay = $request->denngay;
            $binhluan = BinhLuan::whereBetween('ngay', array($tungay,$denngay))->get();
        }
        $data_thang = [];
		$begin = new DateTime($tungay);
		$end = new DateTime($denngay);

		for ($j = $begin; $j <= $end; $j->modify('+1 day')) {
			$data_thang[$j->format("m-Y")]= 0;
		}

		foreach ($binhluan as $value) {
			$thang = date("m-Y", strtotime($value->created_at));
			$data_thang[$thang] += 1;
        }

        $arr_user = [];
        $arr_cay = [];
        $cay = Cay::where('trangthai','Đang hoạt động')->get();        
        foreach($cay as $value)
        {
            $arr_cay[$value->id] = $value->ten;
        }
        $tb_user = User::where('quyen','1')->get();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('Admin.pages.baocao.binhluan',['binhluan'=>$binhluan,'arr_user'=>$arr_user,'arr_cay'=>$arr_cay,'cay'=>$cay,'tb_user'=>$tb_user,'data_thang'=>$data_thang]);
    
    }
    public function BaoCaoKhachHang(request $request)
    {
        $this->validate($request,
        [
            'tungay' => 'required',
            'denngay' => 'required',
        ],
        [
            'tungay.required'=>'Bạn chưa chọn từ ngày',
            'denngay.required'=>'Bạn chưa chọn đến ngày',
        ]);
        $tungay = $request->tungay;
        $denngay = $request->denngay;
        $khachhang = KhachHang::whereBetween('created_at', array($tungay,$denngay))->get();

        $data_thang = [];
		$begin = new DateTime($tungay);
		$end = new DateTime($denngay);

		for ($j = $begin; $j <= $end; $j->modify('+1 day')) {
			$data_thang[$j->format("m-Y")]= 0;
		}

		foreach ($khachhang as $value) {
			$thang = date("m-Y", strtotime($value->created_at));
			$data_thang[$thang] += 1;
        }

        $tb_user = User::all();
        $arr_user = [];
        foreach($tb_user as $value)
        {
            $arr_user[$value->id] = $value->name;
        }
        return view('Admin.pages.baocao.khachhang',['khachhang'=>$khachhang,'arr_user'=>$arr_user,'data_thang'=>$data_thang]);
    }
    public function DonHang()
    {
        $khachhang = KhachHang::all();
        $arr_khachhang = [];
        foreach($khachhang as $value)
        {
            $arr_khachhang[$value->id]['taikhoan'] = $value->taikhoan;
            $arr_khachhang[$value->id]['ten'] = $value->ten;
            $arr_khachhang[$value->id]['sdt'] = $value->sdt;
            $arr_khachhang[$value->id]['diachi'] = $value->diachi;
        }
        $ngay = date("Y-m-d");
        $donhang = HoaDon::where('created_at',"$ngay")->get();

        return view("Admin.pages.baocao.donhang",['donhang'=>$donhang,'arr_khachhang'=>$arr_khachhang,'khachhang'=>$khachhang]);
    }
    public function BaoCaoDonHang(request $request)
    {
        $this->validate($request,
        [
            'tungay' => 'required',
            'denngay' => 'required',
        ],
        [
            'tungay.required'=>'Bạn chưa chọn từ ngày',
            'denngay.required'=>'Bạn chưa chọn đến ngày',
        ]);
        $tungay = $request->tungay;
        $denngay = $request->denngay;

        if(empty($request->trangthai) && empty($request->phuongthuc) && empty($request->khachhang))
            $donhang = HoaDon::whereBetween('created_at', array($tungay,$denngay))->get();
        else if(!empty($request->trangthai) && empty($request->phuongthuc) && empty($request->khachhang))
            $donhang = HoaDon::where('trangthai',$request->trangthai)->whereBetween('created_at', array($tungay,$denngay))->get();
        else if(empty($request->trangthai) && !empty($request->phuongthuc) && empty($request->khachhang))
            $donhang = HoaDon::where('phuongthuc',$request->phuongthuc)->whereBetween('created_at', array($tungay,$denngay))->get();
        else if(empty($request->trangthai) && empty($request->phuongthuc) && !empty($request->khachhang))
            $donhang = HoaDon::where('id_khachhang',$request->khachhang)->whereBetween('created_at', array($tungay,$denngay))->get();
        else if(!empty($request->trangthai) && !empty($request->phuongthuc) && empty($request->khachhang))
            $donhang = HoaDon::where('trangthai',$request->trangthai)->where('phuongthuc',$request->phuongthuc)->whereBetween('created_at', array($tungay,$denngay))->get();
         else if(!empty($request->trangthai) && empty($request->phuongthuc) && !empty($request->khachhang))
            $donhang = HoaDon::where('trangthai',$request->trangthai)->where('id_khachhang',$request->khachhang)->whereBetween('created_at', array($tungay,$denngay))->get();
        else if(empty($request->trangthai) && !empty($request->phuongthuc) && !empty($request->khachhang))
            $donhang = HoaDon::where('id_khachhang',$request->khachhang)->where('phuongthuc',$request->phuongthuc)->whereBetween('created_at', array($tungay,$denngay))->get();
        
        $data_thang = [];
		$begin = new DateTime($tungay);
		$end = new DateTime($denngay);

		for ($j = $begin; $j <= $end; $j->modify('+1 day')) {
			$data_thang[$j->format("m-Y")]= 0;
		}

		foreach ($donhang as $value) {
			$thang = date("m-Y", strtotime($value->created_at));
			$data_thang[$thang] += 1;
        }

        $khachhang = KhachHang::all();
        $arr_khachhang = [];
        foreach($khachhang as $value)
        {
            $arr_khachhang[$value->id]['taikhoan'] = $value->taikhoan;
            $arr_khachhang[$value->id]['ten'] = $value->ten;
            $arr_khachhang[$value->id]['sdt'] = $value->sdt;
            $arr_khachhang[$value->id]['diachi'] = $value->diachi;
        }
        $ngay = date("Y-m-d");

        return view("Admin.pages.baocao.donhang",['donhang'=>$donhang,'arr_khachhang'=>$arr_khachhang,'khachhang'=>$khachhang,'data_thang'=>$data_thang]);
    }
    public function ChiTietDonHang($id)
    {
        $donhang = HoaDon::where('id',$id)->get();
        foreach($donhang as $value)
        {
            $trangthai=$value->trangthai;
            $id_khachhang = $value->id_khachhang;
        }
        $khachhang = KhachHang::where('id',$id_khachhang)->get();
        $chitietdonhang = HoaDonChiTiet::where('id_hoadon',$id)->get();
        $madonhang  = HoaDon::where('id',$id)->get();
        $cay = Cay::where('trangthai','Đang hoạt động')->get();
        $arr_cay = [];
        foreach($cay as $value)
        {
            $arr_cay[$value->id]['anh'] = $value->anh;
            $arr_cay[$value->id]['ten'] = $value->ten;
        }
        return view("Admin.pages.baocao.donhang",['chitietdonhang'=>$chitietdonhang,'khachhang'=>$khachhang,'madonhang'=>$madonhang,'arr_cay'=>$arr_cay]);

    }
    public function BaoCaoLienHe(request $request)
    {
        $this->validate($request,
        [
            'tungay' => 'required',
            'denngay' => 'required',
        ],
        [
            'tungay.required'=>'Bạn chưa chọn từ ngày',
            'denngay.required'=>'Bạn chưa chọn đến ngày',
        ]);
        $tungay = $request->tungay;
        $denngay = $request->denngay;
        $lienhe = LienHe::whereBetween('created_at', array($tungay,$denngay))->get();

        $data_thang = [];
		$begin = new DateTime($tungay);
		$end = new DateTime($denngay);

		for ($j = $begin; $j <= $end; $j->modify('+1 day')) {
			$data_thang[$j->format("m-Y")]= 0;
		}

		foreach ($lienhe as $value) {
			$thang = date("m-Y", strtotime($value->created_at));
			$data_thang[$thang] += 1;
        }
        return view('ADMIN.pages.baocao.lienhe',['lienhe'=>$lienhe,'data_thang'=>$data_thang]);
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
