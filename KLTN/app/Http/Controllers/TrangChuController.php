<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\GiongCay;
use App\LoaiCay;
use App\Cay;
use App\TinTucc;
use App\LoaiTin;
use App\Slide;
use App\GioHang;
use App\HoaDon;
use App\KhachHang;
use App\HoaDonChiTiet;
use App\BinhLuan;
use App\LienHe;
use App\TruyCapp;


class TrangChuController extends Controller
{
    //
    public function getTrangChu()
    {
        $truycap = new TruyCapp;
        $truycap->soluot = 1;
        $truycap->save();

        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $loaitin = LoaiTin::where('trangthai','Đang hoạt động')->get();
        $tintuc = TinTucc::orderBy('id','DESC')->take(4)->get();
        $sanphammoinhat = Cay::where('trangthai','Đang hoạt động')->orderBy('id','DESC')->take(8)->get();
        $sanphamkhuyenmai = Cay::where('trangthai','Đang hoạt động')->where('khuyenmai','!=',0)->orderBy('id','DESC')->take(8)->get();
        
        $donhang = HoaDonChiTiet::all();
        $sanphambanchay = [];
        $arr_cay = Cay::where('trangthai','Đang hoạt động')->get();
         
        foreach($arr_cay as $value)
        {
            $arr_s[$value->id] = $value;
        }
        foreach($donhang as $dh)
        {
            $sanphambanchay[$dh->id_cay]=0;
        }
        foreach($donhang as $dh)
        {
            $sanphambanchay[$dh->id_cay]+=$dh->soluong;
        }
        $arr=[];
        $i=0;
        foreach($sanphambanchay as $dh=>$vl)
        {
            $arr[$i][0]=$dh;
            $arr[$i][1]=$vl;
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
                    $arr[$j][0] = $arr[$k][0];
                    $arr[$j][1] = $arr[$k][1];
                    $arr[$k][0] = $tam_cay;
                    $arr[$k][1] = $tam_sl;
                }
            }
        }
        
        $i=1;
        foreach($giongcay as $value)
        {
            if($i==2)
            {
                $ten_sp2 = ' ';
                $ten_sp2 = $value->id;
                break;
            }
            $ten_sp1 = ' ';
            $ten_sp1 = $value->id;
            $id_gc = $value->id;$i++;
        }
        $id_lc = LoaiCay::where('id_giongcay',$id_gc)->where('trangthai','Đang hoạt động')->orderBy('id','DESC')->get();
        $id_lc2 = LoaiCay::where('id_giongcay',17)->where('trangthai','Đang hoạt động')->orderBy('id','DESC')->get();
        $arr_lc = [];$arr_lc2 = [];$i=0;
        foreach($id_lc as $value)
        {
            $arr_lc[$i] = $value->id;$i++;
        };$i=0;
        foreach($id_lc2 as $value)
        {
            $arr_lc2[$i] = $value->id;$i++;
        }
        $str_id_ts = implode(",", $arr_lc);
        
        $sanpham1 = Cay::where('trangthai','Đang hoạt động')->orderBy('id','DESC')->whereIn('id_loaicay',[$arr_lc[0],$arr_lc[1],$arr_lc[2]])->take(10)->get();
        $sanpham2 = Cay::where('trangthai','Đang hoạt động')->orderBy('id','DESC')->whereIn('id_loaicay',[$arr_lc2[0],$arr_lc2[1],$arr_lc2[2]])->take(10)->get();
        foreach($loaitin as $value)
        {
            $id_loaitin = ' ';$id_loaitin = $value->id;
            break;
        }
        return view("User.pages.trangchu",['giongcay'=>$giongcay,'sanphammoinhat'=>$sanphammoinhat,'sanphamkhuyenmai'=>$sanphamkhuyenmai,'sanpham1'=>$sanpham1,'ten_sp1'=>$ten_sp1,'sanpham2'=>$sanpham2,'ten_sp2'=>$ten_sp2,'id_loaitin'=>$id_loaitin,'tintuc'=>$tintuc,'arr'=>$arr,'arr_s'=>$arr_s]);
    }
    public function getTrangLoaiCay($id,$id_loaicay,$view)
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $tengiongcay = GiongCay::where('id',$id)->get();
        $tenloaicay = LoaiCay::where('id',$id_loaicay)->get();
        $loaicay = LoaiCay::where('trangthai','Đang hoạt động')->where('id_giongcay',$id)->get();
        $arr_phobien = ' ';
        $arr_c = ' ';
        if($view == "thutumacdinh")
            $cay = Cay::where('id_loaicay',$id_loaicay)->get();
        elseif($view == "theothutucaodenthap")
            $cay = Cay::where('id_loaicay',$id_loaicay)->orderBy('gia', 'desc')->get();
        elseif($view == "theothututhapdencao")
            $cay = Cay::where('id_loaicay',$id_loaicay)->orderBy('gia', 'asc')->get();
        elseif($view == "theomucdophobien")
        {
            $arr_c = [];
            $phobien = [];
            $cay = Cay::where('id_loaicay',$id_loaicay)->where('trangthai','Đang hoạt động')->get();
            foreach($cay as $value)
            {
                $arr_c[$value->id]['ten'] = $value->ten;
                $arr_c[$value->id]['anh'] = $value->anh;
                $arr_c[$value->id]['view'] = $value->view;
                $arr_c[$value->id]['khuyenmai'] = $value->khuyenmai;
                $arr_c[$value->id]['gia'] = $value->gia;
                $phobien[$value->id]=0;
            }
            $donhang = HoaDonChiTiet::all();
            $arr_phobien=[];
            foreach($donhang as $dh)
            {
                if(isset($arr_c[$dh->id_cay]['ten']))
                    $phobien[$dh->id_cay]+=$dh->soluong;
            }
            $i=0;
            foreach($phobien as $dh=>$vl)
            {
                $arr_phobien[$i][0]=$dh;
                $arr_phobien[$i][1]=$vl;
                $i++;
            }
            $tam_cay=0;
            $tam_sl = 0;
            for($j=0;$j<$i-1;$j++)
            {
                for($k=$j+1;$k<$i;$k++)
                {
                    if($arr_phobien[$j][1]<$arr_phobien[$k][1])
                    {
                        $tam_cay = $arr_phobien[$j][0];
                        $tam_sl = $arr_phobien[$j][1];
                        $arr_phobien[$j][0] = $arr_phobien[$k][0];
                        $arr_phobien[$j][1] = $arr_phobien[$k][1];
                        $arr_phobien[$k][0] = $tam_cay;
                        $arr_phobien[$k][1] = $tam_sl;
                    }
                }
            }
        
        }
        elseif($view == "theodiemdanhgia")
            $cay = Cay::where('id_loaicay',$id_loaicay)->orderBy('danhgia', 'desc')->get();
        elseif($view == "theoluotxem")
            $cay = Cay::where('id_loaicay',$id_loaicay)->orderBy('view', 'desc')->get();
        return view("User.pages.trangloaicay",['giongcay'=>$giongcay,'tengiongcay'=>$tengiongcay,'tenloaicay'=>$tenloaicay,'loaicay'=>$loaicay,'cay'=>$cay,'view'=>$view,'arr_phobien'=>$arr_phobien,'arr_c'=>$arr_c]);
    }
    public function getTrangLoaiCay_CC($id)
    {
        $arr_phobien = ' ';
        $arr_c = ' ';
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $loaicay = LoaiCay::where('trangthai','Đang hoạt động')->where('id_giongcay',$id)->get();
        foreach($loaicay as $value)
        {
            $id_loaicay = ' ';$id_loaicay = $value->id;break;
        }
        $tengiongcay = GiongCay::where('id',$id)->get();
        $tenloaicay = LoaiCay::where('id',$id_loaicay)->get();
        $cay = Cay::where('id_loaicay',$id_loaicay)->get();
        $view = "thutumacdinh";
        return view("User.pages.trangloaicay",['giongcay'=>$giongcay,'tengiongcay'=>$tengiongcay,'tenloaicay'=>$tenloaicay,'loaicay'=>$loaicay,'cay'=>$cay,'view'=>$view,'arr_phobien'=>$arr_phobien,'arr_c'=>$arr_c]);
    }
    public function getChiTietCay($id)
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $tintuc = TinTucc::orderBy('id','DESC')->take(5)->get();
        $cay = Cay::where('trangthai','Đang hoạt động')->where('id',$id)->get();
        foreach($cay as $value)
        {
            $value->view = $value->view + 1;
            $value->save();
            $id_loaicay = ' ';$id_loaicay = $value->id_loaicay;break;
        }
        $lc = LoaiCay::where('trangthai','Đang hoạt động')->where('id',$id_loaicay)->get();
        foreach($lc as $value)
        {
            $tenloaicay= ' ';$tenloaicay = $value->ten;
            $id_loaicay = $value->id_giongcay;break;
        }
        $tengiongcay = Giongcay::where('trangthai','Đang hoạt động')->where('id',$id_loaicay)->get();

        $loaicay = LoaiCay::where('trangthai','Đang hoạt động')->where('id_giongcay',$id_loaicay)->get();
        if(isset(Auth::user()->id))
        {
            $khachhang = KhachHang::where('taikhoan',Auth::user()->id)->get();
        }
        else
            $khachhang="";
        $binhluan = BinhLuan::where('id_cay',$id)->get();
        $arr_anh_user = [];
        $anh_user = User::all();
        foreach($anh_user as $value)
        {
            $arr_anh_user[$value->id] = $value->anh;
        }
        return view("User.pages.chitietcay",['giongcay'=>$giongcay,'loaicay'=>$loaicay,'cay'=>$cay,'tenloaicay'=>$tenloaicay,'tengiongcay'=>$tengiongcay,'khachhang'=>$khachhang,'binhluan'=>$binhluan,'arr_anh_user'=>$arr_anh_user,'tintuc'=>$tintuc]);
    }
    public function ThemGioHang(request $request,$id)
    {
        $kho = GioHang::where('id_users',Auth::user()->id)->where('id_cay',$id)->get();
        if(count($kho) <= 0)
        {
            $giohang = new GioHang;
            $giohang->soluong = $request->soluong;
            $giohang->id_cay = $id;
            $giohang->id_users = Auth::user()->id;
            $giohang->save();
        }
        else
        {
            foreach($kho as $value)
            {
                $value->soluong =  $value->soluong + $request->soluong;
                $value->save();
            }
        }
    
        return redirect('chitietcay/'.$id)->with('thongbao','Thêm giỏ hàng thành công !');
    }
    public function MuaHangNhanh(request $request)
    {
        $hoadon = new HoaDon;
        $hoadon->id_khachhang = $request->id_khachhang;
        $hoadon->ngay = date("Y-m-d");
        $hoadon->phuongthuc = $request->phuongthucthanhtoan;
        $hoadon->trangthai = 'Chờ xử lí';
        $ghichu = ' ';
        if($request->ghichu == NULL)
            $ghichu = 'Không';
        else 
            $ghichu = $request->ghichu;
        $hoadon->ghichu = $ghichu;
        $hoadon->id_users = Auth::user()->id;
        $hoadon->save();

        $hoadonchittiet = new HoaDonChiTiet;
        $hoadonchittiet->id_cay = $request->id_cay;
        $hoadonchittiet->soluong = $request->soluong;
        $hoadonchittiet->gia = $request->gia;
        $hoadonchittiet->id_hoadon = $hoadon->id;
        $hoadonchittiet->save();

        $kho = Cay::find($request->id_cay);
        $kho->soluong = $kho->soluong - $request->soluong;
        $kho->save();
        return redirect('chitietcay/'.$request->id_cay)->with('thongbao','Đặt hàng thành công !');
    }
    public function BinhLuan(request $request)
    {
        $this->validate($request,
        [
            'danhgia' => 'required',
            'noidung' => 'required',
        ],
        [
            'danhgia.required'=>'Bạn chưa đánh giá sản phẩm',
            'noidung.required'=>'Bạn chưa nhập nội dung đánh giá',
        ]);
        $binhluan = new BinhLuan;
        $binhluan->id_users = Auth::user()->id;
        $binhluan->id_cay = $request->id_cay;
        $binhluan->danhgia = $request->danhgia;    
        $binhluan->noidung = $request->noidung;      
        $binhluan->ngay = date("Y-m-d");
        $binhluan->save();

        $cay = Cay::find($request->id_cay);
        $cay->danhgia = $cay->danhgia + $request->danhgia;
        $cay->save();
        return redirect('chitietcay/'.$request->id_cay)->with('thongbao','Đánh giá thành công');
    }
    public function GioHang()
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $giohang = GioHang::where('id_users',Auth::user()->id)->get();
        $cay = Cay::where('trangthai','Đang hoạt động')->get();
        $arr_cay = [];
        foreach($cay as $value)
        {
            $arr_cay[$value->id]['ten'] = $value->ten;
            $arr_cay[$value->id]['gia'] = $value->gia;
            $arr_cay[$value->id]['anh'] = $value->anh;
            $arr_cay[$value->id]['khuyenmai'] = $value->khuyenmai;
            $arr_cay[$value->id]['soluong'] = $value->soluong;
        }
       return view("User.pages.giohang",['giongcay'=>$giongcay,'giohang'=>$giohang,'arr_cay'=>$arr_cay]);
    }
    public function CapNhatGioHang(request $request)
    {
        for($i=1;$i<=$request->giatri_i;$i++)
        {
            $gh = GioHang::find($request->id[$i]);
            $gh->soluong = $request->sl[$i];

            $gh->save();
        }
        return redirect('giohang')->with('thongbao','Cập nhật giỏ hàng thành công !');
    }
    public function ThanhToan()
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $giohang = GioHang::where('id_users',Auth::user()->id)->get();
        $khachhang = KhachHang::where('taikhoan',Auth::user()->id)->get();
        $cay = Cay::where('trangthai','Đang hoạt động')->get();
        $arr_cay = [];
        foreach($cay as $value)
        {
            $arr_cay[$value->id]['ten'] = $value->ten;
            $arr_cay[$value->id]['gia'] = $value->gia;
            $arr_cay[$value->id]['anh'] = $value->anh;
            $arr_cay[$value->id]['khuyenmai'] = $value->khuyenmai;
            $arr_cay[$value->id]['soluong'] = $value->soluong;
        }

       return view("User.pages.thanhtoan",['giongcay'=>$giongcay,'giohang'=>$giohang,'khachhang'=>$khachhang,'arr_cay'=>$arr_cay]);
    }
    public function DatHang(request $request)
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $giohang = GioHang::where('id_users',Auth::user()->id)->get();
        $cay = Cay::where('trangthai','Đang hoạt động')->get();
        $arr_cay = [];
        foreach($cay as $value)
        {
            $arr_cay[$value->id]['gia'] = $value->gia;
            $arr_cay[$value->id]['ten'] = $value->ten;
            $arr_cay[$value->id]['khuyenmai'] = $value->khuyenmai;
        }

        $hoadon = new HoaDon;
        $hoadon->id_khachhang = $request->id_khachhang;
        $hoadon->ngay = date("Y-m-d");
        $hoadon->phuongthuc = $request->phuongthucthanhtoan;
        $hoadon->trangthai = 'Chờ xử lí';
        $ghichu = ' ';
        if($request->ghichu == NULL)
            $ghichu = 'Không';
        else 
            $ghichu = $request->ghichu;
        $hoadon->ghichu = $ghichu;
        $hoadon->id_users = Auth::user()->id;
        $hoadon->save();
        foreach($giohang as $value)
        {    
            $kho = ' ';
            $hoadonchittiet = new HoaDonChiTiet;
            $hoadonchittiet->id_cay = $value->id_cay;
            $hoadonchittiet->soluong = $value->soluong;
            $hoadonchittiet->gia = $arr_cay[$value->id_cay]['gia'];
            $hoadonchittiet->id_hoadon = $hoadon->id;
            $hoadonchittiet->save();

            $kho = Cay::find($value->id_cay);
            $kho->soluong = $kho->soluong - $value->soluong;
            $kho->save();
        }
        foreach($giohang as $value)
        {
            $value->delete();
        }
        return view("User.pages.dathang",['giongcay'=>$giongcay,'giohang'=>$giohang,'arr_cay'=>$arr_cay,'hoadon'=>$hoadon]);
    }
    public function XoaGioHang($id)
    {
        $giohang = GioHang::find($id);
        $giohang->delete();
        return redirect('giohang')->with('thongbao','Xoá thành công !');
    }
    public function GioiThieu()
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $tintuc = TinTucc::orderBy('id','DESC')->take(5)->get();
        $cay = Cay::orderBy('id','DESC')->take(5)->get();
        return view("User.pages.gioithieu",['giongcay'=>$giongcay,'tintuc'=>$tintuc,'cay'=>$cay]);
    }
    public function ChinhSach()
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $tintuc = TinTucc::orderBy('id','DESC')->take(5)->get();
        $cay = Cay::orderBy('id','DESC')->take(5)->get();
        return view("User.pages.chinhsach",['giongcay'=>$giongcay,'tintuc'=>$tintuc,'cay'=>$cay]);
    }
    public function CuaHang()
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        return view("User.pages.chinhsach",['giongcay'=>$giongcay]);
    }
    public function GetLienHe()
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        return view("User.pages.lienhe",['giongcay'=>$giongcay]);
    }
    public function PostLienHe(request $request)
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();

        $this->validate($request,
        [
            'hoten' =>'required',
            'noidung' =>'required',
            'sdt' =>'required',
            'email'=>'required|email',
        ],
        [
            'hoten.required'=>'Bạn chưa nhập họ tên',
            'noidung.required'=>'Bạn chưa nhập nội dung',
            'sdt.required'=>'Bạn chưa nhập số điện thoại',
            'diachi.required'=>'Bạn chưa nhập địa chỉ',
            'email.required'=>'Bạn chưa nhập nội dung email',
            'email.email'=> 'Bạn chưa nhập đúng định dạng email',
        ]);

        $lienhe = new LienHe;
        $lienhe->ngay = date("Y-m-d");
        $lienhe->hoten = $request->hoten;
        $lienhe->sdt = $request->sdt;
        $lienhe->noidung = $request->noidung;
        $lienhe->email = $request->email;
        $lienhe->save();
        return redirect('lienhe')->with('thongbao','Gửi liên hệ thành công !');
    }
    public function TinTucCC()
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $loaitin = LoaiTin::where('trangthai','Đang hoạt động')->get();
        foreach($loaitin as $value)
        {
            $id_loaitin = ' ';$id_loaitin = $value->id;$tenloaitin = $value->tenloaitin;
            break;
        }
        $tintuc = TinTucc::where('id_loaitin',$id_loaitin)->get();

        $sanphammoi = Cay::where('trangthai','Đang hoạt động')->orderBy('id','DESC')->take(8)->get();
        return view("User.pages.tintuc",['giongcay'=>$giongcay,'loaitin'=>$loaitin,'tintuc'=>$tintuc,'sanphammoi'=>$sanphammoi,'tenloaitin'=>$tenloaitin]);
    }
    public function TinTuc($id)
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $loaitin = LoaiTin::where('trangthai','Đang hoạt động')->get();
        $id_tenloaitin = LoaiTin::find($id);
        $tenloaitin = $id_tenloaitin->tenloaitin;
        $tintuc = TinTucc::where('id_loaitin',$id)->get();

        $sanphammoi = Cay::where('trangthai','Đang hoạt động')->orderBy('id','DESC')->take(8)->get();
        return view("User.pages.tintuc",['giongcay'=>$giongcay,'loaitin'=>$loaitin,'tintuc'=>$tintuc,'sanphammoi'=>$sanphammoi,'tenloaitin'=>$tenloaitin]);
    }
    public function ChiTietTinTuc($id)
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $loaitin = LoaiTin::where('trangthai','Đang hoạt động')->get();
        $tintuc = TinTucc::where('id',$id)->get();
        $sanphammoi = Cay::where('trangthai','Đang hoạt động')->orderBy('id','DESC')->take(8)->get();
        return view("User.pages.chitiet-tintuc",['giongcay'=>$giongcay,'loaitin'=>$loaitin,'tintuc'=>$tintuc,'sanphammoi'=>$sanphammoi]);
    }
    public function SanPhamBanChay()
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $donhang = HoaDonChiTiet::all();
        $sanphambanchay = [];
        $arr_cay = Cay::where('trangthai','Đang hoạt động')->get();
         
        foreach($arr_cay as $value)
        {
            $arr_s[$value->id] = $value;
        }
        foreach($donhang as $dh)
        {
            $sanphambanchay[$dh->id_cay]=0;
        }
        foreach($donhang as $dh)
        {
            $sanphambanchay[$dh->id_cay]+=$dh->soluong;
        }
        $arr=[];
        $i=0;
        foreach($sanphambanchay as $dh=>$vl)
        {
            $arr[$i][0]=$dh;
            $arr[$i][1]=$vl;
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
                    $arr[$j][0] = $arr[$k][0];
                    $arr[$j][1] = $arr[$k][1];
                    $arr[$k][0] = $tam_cay;
                    $arr[$k][1] = $tam_sl;
                }
            }
        }        
        return view("User.pages.sanphambanchay",['giongcay'=>$giongcay,'arr'=>$arr,'arr_s'=>$arr_s]);
    }
    public function SanPhamMoiNhat()
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $sanphammoi = Cay::where('trangthai','Đang hoạt động')->orderBy('id','DESC')->take(15)->get();
        return view("User.pages.sanphammoinhat",['giongcay'=>$giongcay,'sanphammoi'=>$sanphammoi]);
    }
    public function SanPhamKhuyenMai()
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $sanphamkhuyenmai = Cay::where('trangthai','Đang hoạt động')->where('khuyenmai','!=',0)->orderBy('id','DESC')->take(15)->get();
        return view("User.pages.sanphamkhuyenmai",['giongcay'=>$giongcay,'sanphamkhuyenmai'=>$sanphamkhuyenmai]);
    }
    public function TimKiem(request $request)
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        if(!empty($request->ten))
        {
            if($request->giongcay == NULL)
            {
                foreach($giongcay as $value)
                {
                    $id_giongcay = ' ';$id_giongcay = $value->id;break;
                }
                $loaicay = LoaiCay::where('trangthai','Đang hoạt động')->where('id_giongcay',$id_giongcay)->get();
                $cay = Cay::where('ten','like',"%$request->ten%")->get();
                foreach($loaicay as $value)
                {
                    $id_loaicay = ' ';$id_loaicay = $value->id;break;
                }
                $tenloaicay = LoaiCay::where('id',$id_loaicay)->get();
            }
            else
            {
                $loaicay = LoaiCay::where('trangthai','Đang hoạt động')->where('id_giongcay',$request->giongcay)->get();
                $arr_lc = [];
                foreach($loaicay as $value)
                {
                    $id_loaicay = ' ';$id_loaicay = $value->id;break;
                }
                $i=0;
                foreach($loaicay as $value)
                {
                    $arr_lc[$i] = $value->id;
                    $i++;
                }
                $stt=implode(",", $arr_lc);
                echo $stt;

                $tenloaicay = LoaiCay::where('id',$id_loaicay)->get();
                $cay = Cay::where('ten', 'like',"%$request->ten%")->whereIn('id_loaicay' ,[10,12,13])->get();
            }
        }
        $tengiongcay = "";
        $timkiem = " ";
        return view("User.pages.trangloaicay",['giongcay'=>$giongcay,'tengiongcay'=>$tengiongcay,'tenloaicay'=>$tenloaicay,'loaicay'=>$loaicay,'cay'=>$cay,'timkiem'=>$timkiem]);
    }
    public function DonHang()
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $khachhang = KhachHang::all();
        $arr_khachhang = [];
        foreach($khachhang as $value)
        {
            if($value->taikhoan == Auth::user()->id)
            {
                $id_taikhoan = $value->id;
            }
            $arr_khachhang[$value->id]['taikhoan'] = $value->taikhoan;
            $arr_khachhang[$value->id]['ten'] = $value->ten;
            $arr_khachhang[$value->id]['sdt'] = $value->sdt;
            $arr_khachhang[$value->id]['diachi'] = $value->diachi;
        }
        $donhang = HoaDon::where('id_khachhang',$id_taikhoan)->get();
        return view("User.pages.donhang",['giongcay'=>$giongcay,'donhang'=>$donhang,'arr_khachhang'=>$arr_khachhang]);
    }
    public function ChiTietDonHang($id)
    {
        $giongcay = GiongCay::where('trangthai','Đang hoạt động')->get();
        $khachhang = KhachHang::where('taikhoan', Auth::user()->id)->get();
        $chitietdonhang = HoaDonChiTiet::where('id_hoadon',$id)->get();
        $madonhang  = HoaDon::where('id',$id)->get();
        $cay = Cay::where('trangthai','Đang hoạt động')->get();
        $arr_cay = [];
        foreach($cay as $value)
        {
            $arr_cay[$value->id]['anh'] = $value->anh;
            $arr_cay[$value->id]['ten'] = $value->ten;
        }
        return view("User.pages.donhang",['giongcay'=>$giongcay,'chitietdonhang'=>$chitietdonhang,'khachhang'=>$khachhang,'madonhang'=>$madonhang,'arr_cay'=>$arr_cay]);
    }
    /*
    public function getTrangChu()
    {  
        $slide = Slide::where('trangthai',"có")->orderBy('id','DESC')->take(2)->get();
        $loaisach = LoaiSach::all();
        $sachmuanhieu = Sach::where('khuyenmai','!=',0)->orderBy('id','DESC')->take(7)->get();
        $donhang = HoaDonChiTiet::all();
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

        $sach = array();
        $i=0;
        foreach($loaisach as $ls)
        {
            $sach[$i] = Sach::where('id_loaisach',$ls->id)->get();
            $i++;
        }
        

        $tintuc = TinTuc::orderBy('id','DESC')->take(3)->get();
        return view('user.pages.trangchu',['arr'=>$arr,'arr_s'=>$arr_s,'loaisach'=>$loaisach,'sachmuanhieu'=>$sachmuanhieu,'sach'=>$sach,'tintuc'=>$tintuc,'slide'=>$slide]);
    }
    public function getChiTietSach($idd)
    {
        $binhluan = BinhLuan::where('id_sach',$idd)->orderBy('id','DESC')->paginate(5);
        $loaisach = LoaiSach::all();
        $users= User::all();


        if(isset(Auth::user()->id))
        {
            $u = User::where('id',Auth::user()->id)->get();
            
        }
        else
            $u = ' ';
        

        $sach = Sach::find($idd);
        return view('user.pages.chitietsach',['loaisach'=>$loaisach,'sach'=>$sach,'binhluan'=>$binhluan,'u'=>$u,'users'=>$users]);
    }
    public function getTinTuc($id)
    {
        $loaisach = LoaiSach::all();
        $loaitin = LoaiTin::all();
        $tenloaitin = LoaiTin::where('id',$id)->get();
        $tinmoi = TinTuc::orderBy('id','DESC')->take(4)->get();
        $tintuc = TinTuc::where('id_loaitin',$id)->orderBy('id','DESC')->paginate(6);
        return view('user.pages.tintuc',['tenloaitin'=>$tenloaitin,'loaisach'=>$loaisach,'loaitin'=>$loaitin,'tinmoi'=>$tinmoi,'tintuc'=>$tintuc]);
    }
    public function getLoaiSach($id)
    {
        $loaisach = LoaiSach::all();
        $sachmuanhieu = Sach::where('khuyenmai','!=',0)->orderBy('id','DESC')->take(1)->get();
        $tenloaisach = LoaiSach::where('id',$id)->get();
        $sach = Sach::where('id_loaisach',$id)->orderBy('id','DESC')->paginate(24);
        $tintuc = TinTuc::orderBy('id','DESC')->take(3)->get();
        $donhang = HoaDonChiTiet::all();
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

        return view('user.pages.loaisach',['arr'=>$arr,'arr_s'=>$arr_s,'loaisach'=>$loaisach,'sachmuanhieu'=>$sachmuanhieu,'sach'=>$sach,'tintuc'=>$tintuc,'tenloaisach'=>$tenloaisach]);
    }
    public function getTimKiemSach(request $request)
    {
        $loaisach = LoaiSach::all();
        $sachmuanhieu = Sach::where('khuyenmai','!=',0)->orderBy('id','DESC')->take(3)->get();
        $tintuc = TinTuc::orderBy('id','DESC')->take(3)->get();
        $tukhoa = $request->tukhoa;
        $sach = Sach::where('tensach','like',"%$tukhoa%")->paginate(24);
        $donhang = HoaDonChiTiet::all();
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

        return view('user.pages.timkiemsach',['arr'=>$arr,'arr_s'=>$arr_s,'tukhoa'=>$tukhoa,'loaisach'=>$loaisach,'sachmuanhieu'=>$sachmuanhieu,'sach'=>$sach,'tintuc'=>$tintuc]);
    }
    public function getGiaTotMoiNgay()
    {  
        $loaisach = LoaiSach::all();
        $sach = Sach::where('khuyenmai','!=',0)->orderBy('id','DESC')->paginate(12);
        return view('user.pages.giatotmoingay',['loaisach'=>$loaisach,'sach'=>$sach]);
    }
    public function getSachMuaNhieu()
    {  
        $loaisach = LoaiSach::all();
        $donhang = HoaDonChiTiet::all();
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
        return view('user.pages.sachmuanhieu',['loaisach'=>$loaisach,'arr'=>$arr,'arr_s'=>$arr_s]);
    }
    public function getChiTietTinTuc($id)
    {
        $loaisach = LoaiSach::all();
        $loaitin = LoaiTin::all();
        $tenloaitin = LoaiTin::where('id',$id)->get();
        $tinmoi = TinTuc::orderBy('id','DESC')->take(4)->get();
        $tintuc = TinTuc::where('id',$id)->get();
        return view('user.pages.chitiettintuc',['tenloaitin'=>$tenloaitin,'loaisach'=>$loaisach,'loaitin'=>$loaitin,'tinmoi'=>$tinmoi,'tintuc'=>$tintuc]);
    }
    public function postThemGioHang(request $request,$id)
    {
        $giohang = new GioHang;
        $giohang->soluong = $request->soluong;
        $giohang->id_sach = $id;
        $giohang->id_users = Auth::user()->id;
        $giohang->save();

        
        $slide = Slide::where('trangthai',"có")->orderBy('id','DESC')->take(2)->get();
        $loaisach = LoaiSach::all();
        $sachmuanhieu = Sach::where('khuyenmai','!=',0)->orderBy('id','DESC')->take(3)->get();

        $sach = array();
        $i=0;
        foreach($loaisach as $ls)
        {
            $sach[$i] = Sach::where('id_loaisach',$ls->id)->get();
            $i++;
        }

        $donhang = HoaDonChiTiet::all();
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

        $tintuc = TinTuc::orderBy('id','DESC')->take(3)->get();
        return view('user.pages.trangchu',['arr'=>$arr,'arr_s'=>$arr_s,'loaisach'=>$loaisach,'sachmuanhieu'=>$sachmuanhieu,'sach'=>$sach,'tintuc'=>$tintuc,'slide'=>$slide]);
    }

    public function getGioHang()
    {
        $loaisach = LoaiSach::all();
        $giohang = GioHang::where('id_users',Auth::user()->id)->get();
        $sach = array();
        $i=1;
        foreach($giohang as $gh)
        {
            $sach[$i] = Sach::where('id',$gh->id_sach)->get();
            $i++;
        }
        return view('user.pages.giohang',['loaisach'=>$loaisach,'giohang'=>$giohang,'sach'=>$sach]);
    }
    public function getSuaGioHang($id)
    {
        $loaisach = LoaiSach::all();
        $giohang = GioHang::find($id);
        return view('user.pages.suagiohang',['loaisach'=>$loaisach,'giohang'=>$giohang]);
    }
    public function postSuaGioHang(request $request,$id)
    {
        $giohang = GioHang::find($id);
        $giohang->soluong = $request->soluong;

        $this->validate($request,
        [
            'soluong' => 'required',
        ],
        [
            'soluong.required'=>'Bạn chưa nhập số lượng',
        ]);

        $giohang->save();

        $loaisach = LoaiSach::all();
        $giohang = GioHang::where('id_users',Auth::user()->id)->get();
        $sach = array();
        $i=1;
        foreach($giohang as $gh)
        {
            $sach[$i] = Sach::where('id',$gh->id_sach)->get();
            $i++;
        }
        return view('user.pages.giohang',['loaisach'=>$loaisach,'giohang'=>$giohang,'sach'=>$sach]);
    }
    public function getXoaGioHang($id)
    {
        $giohang = GioHang::find($id);

        $giohang->delete();
        return redirect('giohang')->with('thongbao','Xóa thành công');
    }
    public function getThanhToan($tongtien)
    {
        $loaisach = LoaiSach::all();
        return view('user.pages.thanhtoan',['loaisach'=>$loaisach,'tongtien'=>$tongtien]);
    }
    public function postThanhToan(request $request,$tongtien)
    {
        $loaisach = LoaiSach::all();

        $khachhang = new KhachHang;
        $khachhang->name = $request->name;
        $khachhang->gioitinh = $request->gioitinh;
        $khachhang->email = $request->email;
        $khachhang->diachi = $request->diachi;
        $khachhang->thanhpho = $request->thanhpho;
        $khachhang->sdt = $request->sdt;
        $khachhang->save();
        $idkhachhang =$khachhang->id;
        
        $hoadon = new HoaDon;
        $hoadon->id_khachhang = $idkhachhang;
        $hoadon->ngay = date("Y-m-d");
        $hoadon->trangthai = 0;
        $hoadon->phuongthucvanchuyen = $request->phuongthucvanchuyen;
        $hoadon->phuongthucthanhtoan = $request->thanhtoan;
        $hoadon->tongtien = $tongtien;
        $hoadon->id_users = Auth::user()->id;
        $hoadon->save();
        $idhoadon = $hoadon->id;

        $giohang = GioHang::where('id_users',Auth::user()->id)->get();
        foreach($giohang as $gh)
        {
            $sach = new HoaDonChiTiet;
            $sach->id_sach = $gh->id_sach;
            $sach->soluong = $gh->soluong;
            $sach->id_hoadon = $idhoadon;
            $sach->save();

            $gh->delete();
        }

        return view('user.pages.thanhtoanthanhcong',['loaisach'=>$loaisach,'hoadon'=>$hoadon,'khachhang'=>$khachhang]);
    }

    public function postthembinhluan(request $request,$id)
    {
        $binhluan = new BinhLuan;
        
        $this->validate($request,
        [
            'noidung' => 'required',
           
        ],
        [
            'noidung.required'=>'Bạn chưa nhập nội dung bình luận',

        ]);
        $binhluan->id_sach = $request->idsach;
        $binhluan->id_users = $id;
        $binhluan->noidung = $request->noidung;
        
        $binhluan->save();
        return redirect('chitietsach/'.$request->idsach)->with('thongbao','Thêm thành công');
    }
    public function getDonHang()
    {
        $loaisach = LoaiSach::all();
        $hoadon = HoaDon::where(['id_users'=>Auth::user()->id,'trangthai'=>0])->orderBy('id','DESC')->paginate(6);
        $hoadondagiao = HoaDon::where(['id_users'=>Auth::user()->id,'trangthai'=>1])->orderBy('id','DESC')->paginate(6);

        $khachhang = KhachHang::all();
        $arr_khachhang = [];
        foreach($khachhang as $value)
        {
            $arr_khachhang[$value['id']] = $value;
        }

        return view('user.pages.donhang',['loaisach'=>$loaisach,'hoadon'=>$hoadon,'hoadondagiao'=>$hoadondagiao,'arr_khachhang'=>$arr_khachhang]);
    }
    public function getHuyDon(request $request,$id)
    {
        $hoadonchitiet = HoaDonChiTiet::where('id_hoadon',$id)->get();
        $hoadon = HoaDon::where('id',$id)->get();

        foreach($hoadonchitiet as $hdct)
        {
            $hdct->delete();
        }
        foreach($hoadon as $hd)
        {
            $hd->delete();
        }
        $loaisach = LoaiSach::all();
        $hoadon = HoaDon::where(['id_users'=>Auth::user()->id,'trangthai'=>0])->orderBy('id','DESC')->paginate(6);
        $hoadondagiao = HoaDon::where(['id_users'=>Auth::user()->id,'trangthai'=>1])->orderBy('id','DESC')->paginate(6);

        $khachhang = KhachHang::all();
        $arr_khachhang = [];
        foreach($khachhang as $value)
        {
            $arr_khachhang[$value['id']] = $value;
        }

        return view('user.pages.donhang',['loaisach'=>$loaisach,'hoadon'=>$hoadon,'hoadondagiao'=>$hoadondagiao,'arr_khachhang'=>$arr_khachhang]);
    }
    public function getChiTietDonHang($id)
    {
        $loaisach = LoaiSach::all();
        $hoadon = HoaDon::where('id',$id)->get();
        foreach($hoadon as $value)
        {
            $id_khachhang = $value['id_khachhang'];
        }
        $khachhang = KhachHang::where('id',$id_khachhang)->get();

        $hoadonchitiet = HoaDonChiTiet::where('id_hoadon',$id)->orderBy('id','DESC')->paginate(5);

        $sach = Sach::all();
        $arr_sach = [];
        foreach($sach as $value)
        {
            $arr_sach[$value['id']] = $value;
        }

        $tong = 0;


        return view('user.pages.chitietdonhang',['loaisach'=>$loaisach,'hoadon'=>$hoadon,'khachhang'=>$khachhang,'hoadonchitiet'=>$hoadonchitiet,'sach'=>$arr_sach]);
    }
    public function getLienHe()
    {
        $loaisach = LoaiSach::all();
        $loaitin = LoaiTin::all();
        $tinmoi = TinTuc::orderBy('id','DESC')->take(4)->get();
        return view('user.pages.lienhe',['loaisach'=>$loaisach,'loaitin'=>$loaitin,'tinmoi'=>$tinmoi]);
    }
    */
}
