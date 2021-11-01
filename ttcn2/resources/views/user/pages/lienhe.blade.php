@extends('user.layout.index')

@section('noidung')
<p style="padding:1%;background-color:white;border:1px solid #bbb;width:64%;color:green;margin-left:7%;margin-top:1%;border-radius:3px;">Trang chủ / Liên hệ</p>
    <div class="lienhe">
        <img style="width:75%;height:10%;" src="user_asset/img/header/logo.JPG" alt="">
		<div>
			<p><span style="font-weight: bold;">Công ty TNHH Một Thành Viên Thương Mại & Dịch Vụ Văn Hóa Pháp Giang</span><br><i>Tên giao dịch Quốc tế:</i> Pháp Giang Trading and Culture Service One Member Company Limited<br><i>Tên viết tắt:</i> PhapGiang – TDV Co.,</p><br>
			<p >📗 Địa chỉ: Phòng 501B, Nhà H2, Tập thể Văn Chương, phường Khâm Thiên, quận Đống Đa, Thành phố Hà Nội <br>➡️ Mã số thuế: 010 272 622 4 <br>🏦 Số Tài Khoản:- Số: 170 214 851 003 641 <br> – Ngân hàng Eximbank – Chi nhánh Thủ Đô – Hà Nộ <br> - Số: 94573391 – Ngân Hàng TMCP Á Châu – Chi nhánh Hà Nội.</p><br>
			<p>🏣 - Văn phòng tại Hà Nội <br> 📗 Địa chỉ: LK 02 - 03 khu đô thị Green Pearl, 378 Minh Khai, Hai Bà Trưng, Hà Nội <br> ☎ Điện thoại: (84-4) 6294 3819 <br> 🖱 Website: www.minhlongbook.com.vn</p><br>
			<p>✅Phòng truyền thông - Hotline: 0966.160.925  <br> 📧 Email:  truyenthong@phapgiangbook.com.vn</p><br>
			<p>✅Phụ trách Kinh doanh:  Lê Trung Kiên <br> ☎ Mobile: 0987.319.688 – 0982.665.855 <br> 📧 Email: kinhdoanh.pt@phapgiangbook.com.vn</p><br>
			<p>🏣 - Chi nhánh tại Tp. Hồ Chí Minh <br> 📗 Địa chỉ: 33 Đỗ Thừa Tự, P. Tân Quý, Q. Tân Phú, Thành phố Hồ Chí Minh. <br> ☎ Điện thoại: (84-8) 6675.1142 – Fax: (84-8) 6267.8342 <br> 📧 Email: phapgiangbook@gmail.com</p><br>
			<p>✅ Phụ trách Kinh doanh: Lê Xuân Phương <br> ☎ Mobile: 0988.349.179</p>
		</div>
    </div>
    <div style="position:absolute;top:24%;right:5%;height:780px;"  class="body-danhmuc-tintuc" >
        <p class="p">DANH MỤC TIN TỨC</p>
        @foreach($loaitin as $lt)
            <a style="text-decoration:none;" href="tintuc/{{$lt->id}}"><p class="p1">{{$lt->tenloaitin}}</p></a>
        @endforeach
        <p style="margin-top:40px;" class="p">BÀI VIẾT MỚI NHẤT</p>
        <div class="tinmoi">
            @foreach($tinmoi as $tm)
            <div style="margin:7px;">
                <img style="width: 90px;height:70px;float: left;" src="admin_asset/img/tintuc/{{$tm->anh}}" alt="">
                <div style="float:left;overflow: hidden;width: 200px;height:85px;">
                        <a  href="chitiettintuc/{{$tm->id}}">{{$tm->tieude}}</a>
                        <?php $tm=date('d-m-Y H:i:s ',strtotime($tm->created_at)); ?>
                        <p>{{$tm}}</p>
                        
                </div>
            </div>
            @endforeach

        </div>
        

            
    </div>
@endsection