@extends('user.layout.index')

@section('noidung')
        @if(count($errors) > 0)
            @foreach($errors->all() as $err)
                <div class="err">
                    {{$err}}<br>
                </div>
            @endforeach
        @endif
        @if(session('thongbao'))
            <div class="noterr">
                {{session('thongbao')}}
            </div>
        @endif
        <div style="padding:3%;width: 55%;height:1400px;margin:1% 0px 1% 20%;background-color:white;border:1px solid #ccc;">
            <a style="text-decoration: none;color: #0a6e3b;" href=""><h1>PHAP GIANG BOOK</h1></a>
            <p><a style="color:rgb(14, 136, 184);text-decoration: none;" href="giohang">Giỏ hàng</a> > Thông tin giao hàng > Phương thức thanh toán</p>
            <h3>Thông tin giao hàng</h3>
            <p>Bạn đã có tài khoản? <a style="color:rgb(14, 136, 184);text-decoration: none;" href="dangnhap">Đăng nhập</a></p>
            <form action="thanhtoan/{{$tongtien}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input style="padding: 15px 10px; width: 90%;margin:3px;" type="text" name="name" placeholder="Họ và tên"><br>
                <input type="radio" name="gioitinh" value="Nam"><label for="">Nam</label>
                <input type="radio" name="gioitinh" value="Nữ"><label for="">Nữ</label><br>
                <input style="padding: 15px 10px;width: 44%;margin:3px;" type="text" name="email" placeholder="Email">
                <input style="padding: 15px 10px;width: 44%;margin:3px;" type="text" name="sdt" placeholder="Số điện thoại"><br>
                <input style="padding: 15px 10px; width:90%;margin:3px;" type="text" name="diachi" placeholder="Địa chỉ"><br>
                <select style="padding: 15px 10px;margin:3px;width:45%;" name="thanhpho" id="">
                    <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                    <option value="Hà Nội">Hà Nội</option>
                    <option value="Đà Nẵng">Đà Nẵng</option>
                    <option value="An Giang">An Giang</option>
                    <option value="Bắc Giang">Bắc Giang</option>
                    <option value="Bắc Cạn">Bắc Cạn</option>
                    <option value="Bạc Liêu">Bạc Liêu</option>
                    <option value="Bắc Ninh">Bắc Ninh</option>
                    <option value="Bến Tre">Bến Tre</option>
                    <option value="Bình Định">Bình Định</option>
                    <option value="Bình Dương">Bình Dương</option>
                    <option value="Bình Phước">Bình Phước</option>
                    <option value="Bình Thuận">Bình Thuận</option>
                    <option value="Cà Mau">Cà Mau</option>
                    <option value="Cần Thơ">Cần Thơ</option>
                    <option value="Cao Bằng">Cao Bằng</option>
                    <option value="Đắc Lắk">Đắc Lắk</option>
                    <option value="Đắc Nông">Đắc Nông</option>
                </select>
               
                <h3>Phương thức vận chuyển</h3>
                <div style="border:1px solid #bbb;border-radius:3px;padding:20px;">
                    <input type="radio" name="phuongthucvanchuyen" value="Giao Hàng" checked="">
                    <label for="">Giao hàng tận nơi</label>
                    <label style="margin-left:65%;" for="">30,000 đ</label>
                </div>
                <br>
                <h3>Phương thức thanh toán</h3>
                <div style="border:1px solid #bbb;border-radius:3px 3px 0px 0px;padding:20px;">
                    <input type="radio" name="thanhtoan" value="Thanh toán khi giao hàng(COD)" checked="">
                    <label for="">Thanh toán khi giao hàng(COD)</label>
                </div>
                <div style="background-color:#f6f6f6;padding:20px;border:1px solid #bbb;border-top:none;">
                    <p>Quý khách nhận hàng và thanh toán tiền mặt trực tiếp cho Nhân viên giao hàng theo giá trị ghi trên đơn hàng (Quý khách vui lòng giữ lại đơn hàng để đối chiếu khi cần thiết).</p>
                </div>
                <div style="margin-top:10px;border:1px solid #bbb;border-radius:3px 3px 0px 0px;padding:20px;">
                    <input type="radio" name="thanhtoan" value="Thanh toán chuyển khoản">
                    <label for="">Chuyển khoản qua ngân hàng</label>
                </div>
                <div style="text-align:center;background-color:#f6f6f6;padding:20px;border:1px solid #bbb;border-top:none;">
                    <p>1. Công ty TNHH Một Thành viên Thương mại & Dịch vụ Văn hóa Pháp giang <br> Số TK: 170214851003641 <br> Ngân hàng Eximbank, Chi nhánh Thủ Đô <br> 2. Công ty TNHH Một Thành Viên Thương Mại và Dịch Vụ Văn Hóa Pháp Giang <br> STK: 12410005555686 <br> Ngân Hàng Thương Mại Cổ Phần Đầu Tư và Phát Triển Việt Nam – Chi nhánh Hoàn Kiếm - Hà Nội</p>
                </div>

                <a href="giohang" style="float: left;text-decoration: none;color:rgb(14, 136, 184); margin:30px 36% 0px 2%;">< Giỏ hàng</a>
                <input style="float:left; padding:20px 80px;background-color: rgb(14, 136, 184);color:white;margin-top:10px;margin-left:4%;" type="submit" value="Tiếp tục thanh toán">
            </form>

        </div>
@endsection