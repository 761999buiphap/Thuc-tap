<?php
    use Illuminate\Support\Facades\Schema;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('ADMIN.layout.index');
});

//===ADMIN===

//giongcay
route::get('danhsach-giongcay','GiongCayController@getDanhSach');
route::get('them-giongcay','GiongCayController@getThem');
route::post('them-giongcay','GiongCayController@postThem');
route::get('sua-giongcay/{id}','GiongCayController@getSua');
route::post('sua-giongcay/{id}','GiongCayController@postSua');
route::get('xoa-giongcay/{id}','GiongCayController@getXoa');
route::post('timkiem-giongcay','GiongCayController@postTimKiem');
route::get('ngunghoatdong-giongcay/{id}','GiongCayController@NgungHoatDong');
route::get('danghoatdong-giongcay/{id}','GiongCayController@DangHoatDong');

//loaicay
route::get('danhsach-loaicay/{id}','LoaiCayController@getDanhSach');
route::get('them-loaicay/{id}','LoaiCayController@getThem');
route::post('them-loaicay/{id}','LoaiCayController@postThem');
route::get('sua-loaicay/{id1}/{id2}','LoaiCayController@getSua');
route::post('sua-loaicay/{id}','LoaiCayController@postSua');
route::post('timkiem-loaicay','LoaiCayController@postTimKiem');
route::get('ngunghoatdong-loaicay/{id}/{idd}','LoaiCayController@NgungHoatDong');
route::get('danghoatdong-loaicay/{id}/{idd}','LoaiCayController@DangHoatDong');

//cay
route::get('danhsach-cay/{id}','CayController@getDanhSach');
route::get('them-cay/{id}','CayController@getThem');
route::post('them-cay/{id}','CayController@postThem');
route::get('sua-cay/{id1}/{id2}','CayController@getSua');
route::post('sua-cay/{id}','CayController@postSua');
route::post('timkiem-cay','CayController@postTimKiem');
route::get('ngunghoatdong-cay/{id}/{idd}','CayController@NgungHoatDong');
route::get('danghoatdong-cay/{id}/{idd}','CayController@DangHoatDong');

//user
route::get('danhsach-user/{id}','UserController@getDanhSach');
route::get('them-user/{id}','UserController@getThem');
route::post('them-user/{id}','UserController@postThem');
route::get('sua-user/{id1}/{id2}','UserController@getSua');
route::post('sua-user/{id}','UserController@postSua');
route::post('timkiem-user','UserController@postTimKiem');
route::get('ngunghoatdong-users/{id}/{idd}','UserController@NgungHoatDong');
route::get('danghoatdong-users/{id}/{idd}','UserController@DangHoatDong');

//slide
route::get('danhsach-slide','SlideController@getDanhSach');
route::get('them-slide','SlideController@getThem');
route::post('them-slide','SlideController@postThem');
route::get('sua-slide/{id}','SlideController@getSua');
route::post('sua-slide/{id}','SlideController@postSua');
route::get('xoa-slide/{id}','SlideController@getXoa');
route::post('timkiem-slide','SlideController@postTimKiem');

//Loaitin
route::get('danhsach-loaitin','LoaiTinController@getDanhSach');
route::get('them-loaitin','LoaiTinController@getThem');
route::post('them-loaitin','LoaiTinController@postThem');
route::get('sua-loaitin/{id}','LoaiTinController@getSua');
route::post('sua-loaitin/{id}','LoaiTinController@postSua');
route::get('xoa-loaitin/{id}','LoaiTinController@getXoa');
route::post('timkiem-loaitin','LoaiTinController@postTimKiem');
route::get('ngunghoatdong/{id}','LoaiTinController@NgungHoatDong');
route::get('danghoatdong/{id}','LoaiTinController@DangHoatDong');

//tintuc
route::get('danhsach-tintuc/{id}','TinTucController@getDanhSach');
route::get('them-tintuc/{id}','TinTucController@getThem');
route::post('them-tintuc/{id}','TinTucController@postThem');
route::get('sua-tintuc/{id1}/{id2}','TinTucController@getSua');
route::post('sua-tintuc/{id}','TinTucController@postSua');
route::post('timkiem-tintuc','TinTucController@postTimKiem');
route::get('xoa-tintuc/{id1}/{id2}','TinTucController@getXoa');
route::get('noibat/{id}/{idd}','TinTucController@NoiBat');
route::get('khongnoibat/{id}/{idd}','TinTucController@KhongNoiBat');

//nhanvien
route::get('danhsach-nhanvien','NhanVienController@getDanhSach');
route::get('them-nhanvien','NhanVienController@getThem');
route::post('them-nhanvien','NhanVienController@postThem');
route::get('sua-nhanvien/{id}','NhanVienController@getSua');
route::post('sua-nhanvien/{id}','NhanVienController@postSua');
route::get('xoa-nhanvien/{id}','NhanVienController@getXoa');
route::post('timkiem-nhanvien','NhanVienController@postTimKiem');

//khachhang
route::get('danhsach-khachhang','KhachHangController@getDanhSach');
route::get('them-khachhang','KhachHangController@getThem');
route::post('them-khachhang','KhachHangController@postThem');
route::get('sua-khachhang/{id}','KhachHangController@getSua');
route::post('sua-khachhang/{id}','KhachHangController@postSua');
route::get('xoa-khachhang/{id}','KhachHangController@getXoa');
route::post('timkiem-khachhang','KhachHangController@postTimKiem');

//lienhe
route::get('danhsach-lienhe','LienHeController@getDanhSach');
route::get('them-lienhe','LienHeController@getThem');
route::post('them-lienhe','LienHeController@postThem');
route::get('sua-lienhe/{id}','LienHeController@getSua');
route::post('sua-lienhe/{id}','LienHeController@postSua');
route::get('xoa-lienhe/{id}','LienHeController@getXoa');
route::post('timkiem-lienhe','LienHeController@postTimKiem');

//binhluan
route::get('danhsach-binhluan','BinhLuanController@getDanhSach');
route::get('them-binhluan','BinhLuanController@getThem');
route::post('them-binhluan','BinhLuanController@postThem');
route::get('sua-binhluan/{id}','BinhLuanController@getSua');
route::post('sua-binhluan/{id}','BinhLuanController@postSua');
route::get('xoa-binhluan/{id}','BinhLuanController@getXoa');
route::post('timkiem-binhluan','BinhLuanController@postTimKiem');

//donhang
route::get('choxuli','DonHangController@ChoXuLi');
route::post('timkiem-donhang','DonHangController@postTimKiem');
route::get('chitietdonhang-donhang/{id}','DonHangController@ChiTietDonHang');
route::get('dagiao/{id}','DonHangController@DaGiao');
route::get('dahuy/{id}','DonHangController@DaHuy');

//kho
route::get('nhapkho','DonHangController@NhapKho');
route::get('/them-chitietphieunhap/{id}','DonHangController@getThemChiTietPhieuNhap');
route::get('chitietphieunhap/{id}','DonHangController@ChiTietPhieuNhap');
route::post('/them-phieunhap','DonHangController@ThemPhieuNhap')->name('them-phieunhap');
route::post('/them-chitietphieunhap','DonHangController@ThemChiTietPhieuNhap')->name('them-chitietphieunhap');
route::post('timkiem-phieunhap','DonHangController@TimKiemPhieuNhap');

route::get('themhoadon', 'DonHangController@ThemHoaDon');
route::post('themhoadon', 'DonHangController@postThemHoaDon');

//baocao
route::get('danhsach-baocao','BaoCaoController@DanhSach');
route::get('binhluan-baocao','BaoCaoController@BinhLuan');
route::get('khachhang-baocao','BaoCaoController@KhachHang');
route::get('donhang-baocao','BaoCaoController@DonHang');
route::get('lienhe-baocao','BaoCaoController@LienHe');
route::get('chitietdonhang-baocao/{id}','BaoCaoController@ChiTietDonHang');
route::post('baocaobinhluan','BaoCaoController@BaoCaoBinhLuan');
route::post('baocaokhachhang','BaoCaoController@BaoCaoKhachHang');
route::post('baocaodonhang','BaoCaoController@BaoCaoDonHang');
route::post('baocaolienhe','BaoCaoController@BaoCaoLienHe');

//caidat
route::get('thongtin','UserController@getThongTin');
route::post('doimatkhau/{id}','UserController@postDoiMatKhau');

//===USER===
route::get('dangnhap','UserController@getDangNhap');
route::post('dangnhap','UserController@postDangNhap');
route::get('logout','UserController@getLogout');

route::post('dangki','UserController@postDangKi');


//trangchu
route::get('trangchu','TrangChuController@getTrangChu');
route::get('trangloaicay/{id}/{id1}/{view}','TrangChuController@getTrangLoaiCay');
route::get('trangloaicay/{id}','TrangChuController@getTrangLoaiCay_CC');
route::get('chitietcay/{id}','TrangChuController@getChiTietCay');
route::post('themgiohang/{id}','TrangChuController@ThemGioHang');
route::post('muahangnhanh','TrangChuController@MuaHangNhanh');
route::post('binhluan','TrangChuController@BinhLuan');
route::get('giohang','TrangChuController@GioHang');
route::get('xoagiohang/{id}','TrangChuController@XoaGioHang');
route::post('capnhatgiohang','TrangChuController@CapNhatGioHang');
route::get('thanhtoan','TrangChuController@ThanhToan');
route::post('dathang','TrangChuController@DatHang');
route::get('gioithieu','TrangChuController@GioiThieu');
route::get('chinhsach','TrangChuController@ChinhSach');
route::get('cuahang','TrangChuController@CuaHang');
route::get('lienhe','TrangChuController@GetLienHe');
route::post('lienhe','TrangChuController@PostLienHe');
route::get('donhang','TrangChuController@DonHang');
route::get('chitietdonhang/{id}','TrangChuController@ChiTietDonHang');
route::get('tintuctrangchu','TrangChuController@TinTucCC');
route::get('tintuc/{id}','TrangChuController@TinTuc');
route::get('chitiet-tintuc/{id}','TrangChuController@ChiTietTinTuc');
route::get('sanphambanchay','TrangChuController@SanPhamBanChay');
route::get('sanphammoinhat','TrangChuController@SanPhamMoiNhat');
route::get('sanphamkhuyenmai','TrangChuController@SanPhamKhuyenMai');
route::post('timkiem','TrangChuController@TimKiem');
