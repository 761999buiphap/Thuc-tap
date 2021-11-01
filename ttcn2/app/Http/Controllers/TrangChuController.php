<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\LoaiSach;
use App\Sach;
use App\TinTuc;
use App\LoaiTin;
use App\Slide;
use App\GioHang;
use App\HoaDon;
use App\KhachHang;
use App\HoaDonChiTiet;
use App\BinhLuan;


class TrangChuController extends Controller
{
    //
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
}
