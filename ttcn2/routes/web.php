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
    return view('admin.layout.index');
});

//===ADMIN===
/*
Route::group(['prefix'=>'admin'],function(){
    route::group(['prefix'=>'loaisach'],function(){
        route::get('danhsach','LoaiSachController@getDanhSach');
        route::get('them','LoaiSachController@getThem');
        route::get('sua','LoaiSachController@getSua');
    });
    route::group(['prefix'=>'sach'],function(){
        route::get('danhsach','SachController@getDanhSach');
        route::get('them','SachController@getThem');
        route::get('sua','SachController@getSua');
    });
    route::group(['prefix'=>'slide'],function(){
        route::get('danhsach','SlideController@getDanhSach');
        route::get('them','SlideController@getThem');
        route::get('sua','SlideController@getSua');
    });
    route::group(['prefix'=>'tintuc'],function(){
        route::get('danhsach','TinTucController@getDanhSach');
        route::get('them','TinTucController@getThem');
        route::get('sua','TinTucController@getSua');
    });
    route::group(['prefix'=>'users'],function(){
        route::get('danhsach','UsersController@getDanhSach');
        route::get('them','UsersController@getThem');
        route::get('sua','UsersController@getSua');
    });
});
*/
route::get('danhsach-loaisach','LoaiSachController@getDanhSach');
route::post('them-loaisach','LoaiSachController@postThem');
route::post('sua-loaisach/{id}','LoaiSachController@postSua');
route::get('sua-loaisach/{id}','LoaiSachController@getSua');
route::get('xoa-loaisach/{id}','LoaiSachController@getXoa');
route::post('tk-loaisach','LoaiSachController@postTimKiem');

route::get('danhsach-loaitin','LoaiTinController@getDanhSach');
route::post('them-loaitin','LoaiTinController@postThem');
route::post('sua-loaitin/{id}','LoaiTinController@postSua');
route::get('sua-loaitin/{id}','LoaiTinController@getSua');
route::get('xoa-loaitin/{id}','LoaiTinController@getXoa');
route::post('tk-loaitin','LoaiTinController@postTimKiem');

route::get('danhsach-sach/{id}','SachController@getDanhSach');
route::get('them-sach','SachController@getThem');
route::get('sua-sach/{id}','SachController@getSua');
route::post('them-sach','SachController@postThem');
route::post('sua-sach/{id}','SachController@postSua');
route::get('xoa-sach/{id}','SachController@getXoa');
route::post('tk-sach','SachController@postTimKiem');
route::get('vd/{id}','SachController@vd');

route::get('danhsach-slide','SlideController@getDanhSach');
route::get('them-slide','SlideController@getThem');
route::get('sua-slide/{id}','SlideController@getSua');
route::get('xoa-slide/{id}','SlideController@getXoa');
route::post('them-slide','SlideController@postThem');
route::post('sua-slide/{id}','SlideController@postSua');
route::post('tk-slide','SlideController@postTimKiem');

route::get('danhsach-donhang','DonHangController@getDanhSach');
route::get('chitiet-donhang/{id}','DonHangController@getChiTiet');
route::post('giaohang/{id}','DonHangController@getGiaoHang');
route::post('huydonhang/{id}','DonHangController@getHuyDonHang');



route::get('danhsach-tintuc/{id}','TinTucController@getDanhSach');
route::get('them-tintuc','TinTucController@getThem');
route::get('sua-tintuc/{id}','TinTucController@getSua');
route::post('them-tintuc','TinTucController@postThem');
route::post('sua-tintuc/{id}','TinTucController@postSua');
route::get('xoa-tintuc/{id}','TinTucController@getXoa');
route::post('tk-tintuc','TinTucController@postTimKiem');

route::get('danhsach-khachhang','khachHangController@getDanhSach');
route::get('chitietkhachhang/{id}','khachHangController@getChiTiet');

route::get('baocao','BaoCaoController@getDanhSach');
route::get('baocao-donhang','BaoCaoController@getBaoCaoDonHang');
route::post('ketqua-baocao-donhang','BaoCaoController@PostBaoCaoDonHang');
route::get('baocao-khachhang','BaoCaoController@getBaoCaoKhachHang');
route::post('ketqua-baocao-khachhang','BaoCaoController@PostBaoCaoKhachHang');
route::get('baocao-doanhthu','BaoCaoController@getBaoCaoDoanhThu');
route::post('ketqua-baocao-doanhthu','BaoCaoController@PostBaoCaoDoanhThu');
route::get('baocao-mathangbanchay','BaoCaoController@getBaoCaoMatHangBanChay');
route::post('ketqua-baocao-mathangbanchay','BaoCaoController@PostBaoCaoMatHangBanChay');

route::get('danhsach-user/{id}','UserController@getDanhSach');
route::get('them-user','UserController@getThem');
route::get('sua-user/{id}','UserController@getSua');
route::post('them-user','UserController@postThem');
route::post('sua-user/{id}','UserController@postSua');
route::get('xoa-user/{id}','UserController@getXoa');

route::get('thongtincanhan','UserController@thongtincanhan');
route::post('doimatkhau/{id}','UserController@doimatkhau');


route::get('danhsach-binhluan','BinhLuanController@getDanhSach');
route::post('sua-binhluan/{id}','BinhLuanController@postSua');
route::get('sua-binhluan/{id}','BinhLuanController@getSua');
route::get('xoa-binhluan/{id}','BinhLuanController@getXoa');
route::post('them-binhluan','BinhLuanController@postThem');
route::get('them-binhluan','BinhLuanController@getThem');

route::get('dangnhap','UserController@getDangNhap');
route::post('dangnhap','UserController@postDangNhap');
route::get('dangki','UserController@getDangKi');
route::post('dangki','UserController@postDangKi');
route::get('logout','UserController@getLogout');



//===USER===
route::get('trangchu','TrangChuController@getTrangChu');
route::get('chitietsach/{id}','TrangChuController@getChiTietSach');
route::get('tintuc/{id}','TrangChuController@getTinTuc');
route::get('loaisach/{id}','TrangChuController@getLoaiSach');
route::get('timkiemsach','TrangChuController@getTimKiemSach');
route::get('giatotmoingay','TrangChuController@getGiaTotMoiNgay');
route::get('sachmuanhieu','TrangChuController@getSachMuaNhieu');
route::get('chitiettintuc/{id}','TrangChuController@getChiTietTinTuc');
route::post('themgiohang/{id}','TrangChuController@postThemGioHang');

route::get('danhsachdonhang','TrangChuController@getDonHang');
route::post('huydon/{id}','TrangChuController@getHuyDon');
route::get('chitietdonhang/{id}','TrangChuController@getChiTietDonHang');

route::get('lienhe','TrangChuController@getLienHe');


route::get('giohang','TrangChuController@getGioHang');
route::get('suagiohang/{id}','TrangChuController@getSuaGioHang');
route::post('suagiohang/{id}','TrangChuController@postSuaGioHang');
route::get('xoagiohang/{id}','TrangChuController@getXoaGioHang');

route::get('thanhtoan/{tongtien}','TrangChuController@getThanhToan');
route::post('thanhtoan/{tongtien}','TrangChuController@postThanhToan');

route::post('thembinhluan/{id}','TrangChuController@postthembinhluan');


/*
route::get('danhsach','LoaiSachController@getDanhSach');
route::get('them','LoaiSachController@getThem');
route::get('sua','LoaiSachController@getSua');

route::get('danhsach1','SachController@getDanhSach');
route::get('them','SachController@getThem');
route::get('sua','SachController@getSua');

route::get('danhsach2','SlideController@getDanhSach');
route::get('them','SlideController@getThem');
route::get('sua','SlideController@getSua');

route::get('danhsach3','TinTucController@getDanhSach');
route::get('them','TinTucController@getThem');
route::get('sua','TinTucController@getSua');

route::get('danhsach4','UsersController@getDanhSach');
route::get('them','UsersController@getThem');
route::get('sua','UsersController@getSua');*/