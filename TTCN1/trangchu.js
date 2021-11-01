
document.getElementById("timhieuthem").addEventListener("click", tht);
document.getElementById("hosobenhnhan").addEventListener("click", hsbn);
document.getElementById("doanhthubacsy").addEventListener("click", dtbs);
document.getElementById("taikhoan").addEventListener("click", tk);
document.getElementById("danhgia").addEventListener("click", dg);
document.getElementById("thongtin").addEventListener("click", tt);
document.getElementById("chuandoan").addEventListener("click", cdd);
document.getElementById("lichhen").addEventListener("click", lh);


//Khi nhấn vào tìm hiểu thêm
function tht() {
  macdinh();
  document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 44%;font-family:arial;'>GIỚI THIỆU</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 40%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial;'><a style='color: white;'>Giới thiệu</a></li></ul></div>"+
  "<div style='width: 86%;height: 400px;margin-left: 7%;margin-bottom: 0%;text-align: justify;font-family:arial;'><p>Với kinh nghiệm và uy tín triển khai phần mềm quản lý phòng khám nha khoa trên 10 năm kinh nghiệm. BambuFit tự hào là nhà phát triển phần mềm quản lý phòng khám nha khoa đầu tiên tại Việt Nam, và được đánh giá là Phần mềm nha khoa tốt nhất hiện nay.<br> Đón đầu xu hướng sử dụng công nghệ (nền tảng cho cách mạng công nghiệp 4.0) vào ứng dụng trong đời sống. Công ty Bambu đã xây dựng thành công <strong> Phần mềm quản lý phòng khám nha khoa online BambuFit </strong>(trên nền Web base).</p><p><strong>+ Tính năng</strong> : Được kế thừa từ phần mềm offline Ovem Edental, BambuFit có đầy đủ các chức năng mà một Phòng khám nha khoa cần có: Quản lý dịch vụ khám, chữa bệnh, quản lý các thủ thuật, quản lý thu chi, báo cáo tổng hợp các thủ thuật đã điều trị, báo cáo thủ thuật theo nhân viên, bảng lương nhân viên v.v..<br> <strong>+ Phạm vi sử dụng </strong> : BambuFit được phát triển trên nền tảng web base, vì thế bạn có thể sử dụng phần mềm trên mọi thiết bị như PC, tablet, mobile và truy cập sử dụng, quản lý ở mọi nơi chỉ cần có Internet"+
  "<br><strong>+ Tính ổn định </strong> : Khi sử dụng BambuFit bạn không cần cài đặt nên tính ổn định phần mềm rất cao.<br><strong>+ Giao diện </strong> : Đơn giản, dễ sử dụng, thân thiện với người dùng<br><strong>+ Sao lưu dữ liệu (backup)</strong>: Dữ liệu phần mềm BambuFit sẽ được sao lưu (backup) hàng ngày và được lưu trữ trên hệ thống máy chủ. Vì thế bạn hoàn toàn yên tâm về tính toàn vẹn dữ liệu <br><strong>+ Tùy biến chức năng nâng cao </strong> : Ngoài các chức năng phần mềm đang hiện có, nếu quý khách hàng có nhu cầu phát triển thêm các tính năng đặc thù cho riêng phòng khám của mình thì BambuFit hoàn toàn có thể đáp ứng (chi phí phát sinh sẽ tùy thuộc vào các tính năng cụ thể). Ví dụ các tính năng tùy biến như: tích hợp SMS để thông báo lịch hẹn, chăm sóc khách hàng, gửi email thông báo lịch hẹn, tích hợp lịch hẹn với website, tra cứu hồ sơ bệnh án trực tuyến,...<br> <strong>+ Bảo hành</strong> : Vĩnh viễn suốt trong quá trình sử dụng</p></div>";
    macdinh2();

}
function tk() 
{
    macdinh();
    document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 36%;font-family:arial;'>QUẢN LÝ LỊCH HẸN</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 35%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;'>tài khoản</a></li></ul></div>"+
   "<p style='font-family:arial;text-align: justify;font-size:18px;margin:5%;width:60%;'>- Khi bạn tạo một tài khoản người dùng trong phòng khám, Hệ thống tạo ra một ID người dùng và mật khẩu tạm thời cho người dùng<br>- Sau khi bạn tạo hoặc cập nhật người dùng, các trường hồ sơ người dùng này sẽ tự động cập nhật và đồng bộ hóa<br>- Với hệ thống quyền dựa theo công việc, bạn có thể thấy rõ các hoạt động cụ thể mà mình cho phép từng người thực hiện.Nhờ hệ thống quyền này, bạn có thể bảo vệ thông tin của mình trên website<br>- Vai trò bảo mật kiểm soát quyền truy nhập của người dùng vào dữ liệu thông qua một loạt cấp độ truy nhập và quyền. Sự kết hợp giữa các cấp độ truy nhập và quyền có trong một vai trò bảo mật cụ thể sẽ đặt giới hạn về quyền xem dữ liệu của người dùng cũng như hoạt động tương tác của họ với dữ liệu đó.<br>- vai trò người quản trị quản lý người dùng có thể đặt lại mật khẩu người dùng cũng như thêm, chỉnh sửa, hoặc xoá tài khoản người dùng</p>"+
   "<br>- Quản lý tài khoản đăng nhập và phân quyền truy cập vào hệ thống cho từng nhân viên tương ứng với từng chức vụ, phòng ban mà nhân viên đó làm việc. "+
   "<img style='width: 23%;height:60% ;left: 70%;top:32%;position: absolute;' src='hinhanh/tk.jpg' alt=''>";
   macdinh2();
}

function dg() 
    {
        macdinh();
        document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 31%;font-family:arial;'>QUẢN LÝ ĐÁNH GIÁ CỦA KHÁCH HÀNG</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 35%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;'>Đánh giá của khách hàng</a></li></ul></div>"+
    "<p style='font-family:arial;text-align: justify;font-size:18px;margin:7% 0px 0px 5%;width:60%;'> <br>- Việc tầm soát và chẩn đoán sớm bệnh là một trong những vấn đề có tính chất quyết định đến hiệu quả điều trị của người bệnh.<br><br>- Giúp phòng khám dễ nắm bắt được tình hình hiện tại. Từ đó đưa ra những quyết định sửa đổi những bất cập, nhược điểm của phòng khám và đồng thời nắm bắt được những ưu điểm để phát huy một cách tích cực...</p>"+
    "<img style='width: 30%;height:200px ;left: 68%;top:45%;position: absolute;' src='hinhanh/dg.JPG' alt=''>";
    macdinh2();
    }

function cdd() 
{
    macdinh();
    document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 34%;font-family:arial;'>QUẢN LÝ THỦ THUẬT - CHUẨN ĐOÁN</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 35%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;'>Quản lí thủ thuật - chuẩn đoán</a></li></ul></div>"+
    "<p style='font-family:arial;text-align: justify;font-size:18px;margin:5%;width:60%;'>-Việc tầm soát và chẩn đoán sớm bệnh là một trong những vấn đề có tính chất quyết định đến hiệu quả điều trị của người bệnh.<br><br>-Chẩn đoán là thuật ngữ đơn giản diễn tả tình trạng hay diễn tiến của bệnh của bệnh nhân. Khả năng đưa ra chẩn đoán một cách chính xác là vấn đề cơ bản trong thực hành lâm sàng. Chỉ với một chẩn đoán đúng hoặc một danh sách ngắn gọn các chẩn đoán có khả năng.<br><br>-<strong> Kết luận việc chuẩn đoán với phiếu kết quả, phiếu đó bao gồm các thông tin liên quan đến:</strong><br>+ Lịch hẹn tái khám<br>+ Đơn thuốc<br>+ Thủ thuật</p>"+
    "<img style='width:28%;height:40% ;left:66%;top:40%;position: absolute;' src='hinhanh/NV_phieuketqua.JPG' alt=''>";
    macdinh2();
}


//Khi nhấn vào quản lý hồ sơ bệnh nhân
function hsbn() {
  macdinh();
  document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 35%;font-family:arial;'>QUẢN LÝ HỒ SƠ BỆNH NHÂN</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 33%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='dichvu.html'>Dịch vụ > </a></li><li style='float: left ;font-weight:bolder;font-family: arial;'><a style='color: white;'>Hồ sơ bệnh nhân</a></li></ul></div>"+
  "<div style=' width: 100%;height: 300px; position: relative;text-align: justify;'><div style=' width: 60%;margin-left: 7%;margin-top: 7%; font-family: arial;' ><p  >+ Thông tin đặc biệt là <span style='color: red;' > hồ sơ bệnh án</span> phải được lưu trữ - bảo vệ an toàn để không bị mất, hư hại, tráo đổi, truy cập hoặc sử dụng trái phép </p><p >+<span style='color: red;'> Hồ sơ bệnh án</span> và các thông tin và dữ liệu khác được bảo mật và bảo vệ tại mọi thời điểm. Ví dụ như những hồ sơ bệnh án đang được sử dụng được để tại những khu vực mà chỉ có những nhân viên nào được phép mới có thể tiếp cận và hồ sơ bệnh án được lưu trữ tại những khu vực ít có khả năng bị hư hại bởi nhiệt độ, nước, lửa v... </p> <p>+ Triển khai các quy trình ngăn không cho truy cập trái phép vào các thông tin được lưu trữ dưới dạng điện tử</p><p>+ Giúp xác định rõ thời gian lưu giữ hồ sơ bệnh án và các loại dữ liệu và thông tin khác. Hồ sơ bệnh án và tất cả các loại dữ liệu và thông tin được lưu giữ để tuân thủ đúng các luật và quy định của nhà nước. Ngoài ra để hỗ trợ việc chăm sóc người bệnh, nghiên cứu và đào tạo. Việc lưu giữ hồ sơ bệnh án và các loại dữ liệu và thông tin phải luôn đi kèm với sự bảo mật và an ninh của các dạng thông tin đó. Khi hết thời gian lưu giữ, hồ sơ bệnh án và các loại hồ sơ, dữ liệu và thông tin khác được hủy bằng một cách thức đảm bảo được tính bảo mật và an ninh.</p></div>"+
  "<img style='width: 23%;height:60% ;left: 70%;top: 7%;position: absolute;' src='hinhanh/hosobenhan.jpg' alt=''></div>";
  macdinh2();
}

//Khi nhấn vào quản lý doanh thu bac sy
function dtbs() {
    macdinh();
    document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 35%;font-family:arial;'>QUẢN LÝ DOANH THU BÁC SĨ</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 33%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='dichvu.html'>Dịch vụ > </a></li><li style='float: left ;font-weight:bolder;font-family: arial;'><a style='color: white;'>Doanh thu bác sĩ</a></li></ul></div>"+
    "<p style='width: 86%;height: 350px;margin-left: 7%;text-align: justify;margin-top: 7%;font-family: arial;'>Tiền lương cho bác sĩ và nhân viên là chi phí lớn của phòng khám, nên chúng ta cần phải theo dõi và phản ánh kịp thời. <br>Đặc biệt tiền lương chi trả cho bác sĩ khá là phức tạp. Ngoài tiền lương cơ bản, thì còn có thưởng thủ thuật, thưởng doanh thu theo tỉ lệ phần trăm, thêm giờ v.v… <span style='color: rgb(24, 162, 180);'>Phần mềm quản lý Nha khoa</span><span style='color: red;'>BambuFit sẽ giúp Phòng khám:</span><br>- Tạo bảng lương đơn giản, dễ dàng, nhanh chóng. <br>- <span style='color: red;'>Thông tin lưu trữ  dữ liệu đầy đủ:</span> Lương cơ bản, hệ số, ngày công, lương thực tế, thêm giờ, thưởng doanh thu (thực thu, %), thưởng thủ thuật, thưởng khác, phụ cấp (cơm xe, trách nhiệm), bảo hiểm, tạm ứng, thực lĩnh. <br>- Hiển thị thông tin trực quan, sinh động với đầy đủ các thông tin <br>- <span>Dễ dàng điều chỉnh</span>, thay đổi các thông tin của bảng lương <br>- Lên báo cáo thống kê bảng lương <span style='color: red;'>chi tiết theo tháng</span>.<br>"+
    "- <span style='color: red;'>Báo cáo tổng hợp doanh thu cho nhân viên</span> Thống kê Họ tên, doanh số, đã thu, tiêu hao, tổng tiền, thưởng (%), thưởng d.thu, ghi chú nếu có <br>- Hỗ trợ <span style='color: red;'>tìm kiếm doanh thu</span> theo ngày, tháng, năm <br>- <span style='color: red;'>Kết xuất ra file Excel</span> Bảng lương, doanh thu để lưu trữ <br>- <span style='color: red;'>In dữ liệu trực tiếp </span></p>";
    macdinh2();
}

//khi nhấn vào thủ thuật
function tt() {
  macdinh();
  document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 36%;font-family:arial;'>QUẢN LÝ LỊCH HẸN</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 35%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;'>Quản lí nhân sự</a></li></ul></div>"+
  "<p style='font-family:arial;text-align: justify;font-size:18px;margin:5%;width:60%;'>- Quản lý thông tin nhân sự là một việc bắt buộc đối với hầu hết các doanh nghiệp. Việc quản lý thông tin nhân sự, giúp cho lãnh đạo không chỉ nắm được thông tin nhân viên mà còn hiểu được năng lực, quá trình học tập, công tác, tiểu sử bản thân, thành tích khen thưởng của toàn nhân viên trong công ty ... từ đó có quyết định giao việc, phân chia công việc một cách hợp lý. Thực hiện tốt được công việc này giúp công ty sẽ quản lý và sử dụng lao động một cách hiệu quả và tăng năng suất lao động của toàn thể cán bộ, công nhân viên<br>- Lưu trữ thông tin nhân viên về họ tên, email, số điện thoại, ngày tháng năm sinh, thông tin chi tiết sơ yếu lý lịch của nhân viên, thông tin liên lạc, trình độ chuyên môn và tình trạng sức khỏe của từng nhân viên.<br>- Quản lý thông tin của nhân viên để biết được quá trình thăng tiến của một nhân viên và các chính sách đãi ngộ đã hợp lý hay chưa?<br>- Chúng tôi coi trọng bảo mật dữ liệu cá nhân. Chúng tôi thực hiện việc phân quyền và bảo vệ dữ liệu của nhân viên</p>"+
 "<img style='width:30%;height:60% ;left:66%;top:40%;position: absolute;' src='hinhanh/AD_hsbs.JPG' alt=''>";
 macdinh2();
}

//Khi nhấn vào lịch hẹn
function lh() {
    macdinh();
    document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 36%;font-family:arial;'>QUẢN LÝ LỊCH HẸN</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 33%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='dichvu.html'>Dịch vụ > </a></li><li style='float: left ;font-weight:bolder;font-family: arial;'><a style='color: white;'>Lịch hẹn</a></li></ul></div>"+
    "<p style='width: 86%;height: 350px;text-align: justify;margin-top: 7%;margin-left: 7%; font-family: arial;'>Nguyên nhân dẫn đến tình trạng nhầm lẫn, quên lịch hẹn với khách hàng  là do quản lý thủ công, dữ liệu không đồng nhất (bằng word, excel, giấy nhớ). Mỗi nhân viên lưu một cách, nên không thể tránh được nếu sai sót lịch hẹn, làm giảm uy tín và độ chuyên nghiệp của phòng khám, khách hàng không hài lòng. <br>Tối ưu hóa quy trình xếp lịch hẹn sẽ giúp tăng lợi nhuận, tăng năng suất làm việc và thể hiện sự chuyên nghiệp với khách hàng <br>Quản lý lịch hẹn tại <span style='color:red'>Phần mềm quản lý Nha khoa BambuFit</span> sẽ giúp Phòng khám: <br>- Ghi lại lịch hẹn của khách hàng trên một hệ thống duy nhất <br>- <span style='color:red'>Tạo lịch hẹn đơn giản</span>, dễ dàng, nhanh chóng. <br>- <span style='color:red'>Thông tin lưu trữ lịch hẹn đầy đủ:</span> Ngày, tháng, năm, giờ, họ tên, số điện thoại, nội dung hẹn, Bác sĩ hẹ<n class='br'></span><br>- <span style='color:red'>Hiển thị trạng thái lịch hẹn trực quan,</span> sinh động với đầy đủ các thông tin được lưu trữ <br>- <span style='color:red'>Tìm kiếm lịch hẹn theo nhiều tiêu chí:</span> Tìm kiếm theo từ khóa, bác sĩ thực hiện, tìm trạng hẹn. <br>"+
    "- Thống kê lịch hẹn chi tiết trong khoảng thời gian, giúp người quản lý biết khi nào phòng khám và bác sĩ đã kín lịch. Ngoài ra quản lý cũng biết được lịch còn trống lúc nào xếp lịch cho hợp lý. <br>- Hỗ trợ kiểm tra khách hàng nào đã đến, khách hàng nào hủy hẹn để kịp thời xử lý cho phù hợp. <br>- Dễ dàng điều chỉnh, thay đổi các thông tin của lịch hẹn: Thời gian, nội dung … <br>- Xác nhận lịch hẹn nhanh chóng ngay trên giao diện phần mềm. <br>- Nhắc nhở hoặc cảnh báo khi khi đến hẹn</p>";
    macdinh2();
  }

// khi nhấn vào các tin tức sự kiện
document.getElementById("div8h31").addEventListener("click", qc1);
document.getElementById("div8a1").addEventListener("click", qc1);
document.getElementById("div8h32").addEventListener("click", qc2);
document.getElementById("div8a2").addEventListener("click", qc2);
document.getElementById("div8h33").addEventListener("click", qc3);
document.getElementById("div8a3").addEventListener("click", qc3);


function qc1() 
{
    macdinh();
    document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='font-family:arial;margin:3% 0px 0px 5%;width:70%;'><h3 ><strong>Ăn uống thế nào để có hàm răng khỏe, đẹp?</strong></h3>"+
    "<div style='text-align: justify;'><p>Một hàm răng trắng, sáng hơi thở thơm tho là niềm mong muốn của tất cả mọi người. Ngoài việc <span style='color:blue;'>chăm sóc răng miệng</span> đúng cách, <span style='color:blue;'>lựa chọn kem đánh răng</span> phù hợp, thì ăn uống cũng ảnh hưởng rất nhiều để có hàm răng khỏe, đẹp.<br><strong>Nên:</strong><br>- Chế độ ăn uống hợp lý, bổ sung canxi, vitamin;<br>- Ăn nhiều thực phẩm tốt cho răng, chứa Vitamin C như đu đủ, khoai lang, dâu tây, cam, chanh...và canxi như hải sản, sữa, trứng để răng thêm chắc khoẻ, sáng bóng.<br>- Uống nhiều nước sau mỗi bữa ăn giúp cuốn sạch mảnh vụn thức ăn và ngăn hình thành mảng bám.<br>- Nhai kẹo cao su không đường"+
    "<p><strong>Không nên:</strong><br>- Hạn chế uống rượu, bia, cà phê, nước ngọt...<br>- Hạn chế ăn quà vặt, không ăn nhiều đồ ngọt như bánh kẹo, bim bim…vv trước khi đi ngủ; <br>- Hạn chế ăn các đồ sau: Rượu vang đỏ, Cà phê, Trái việt quất, Củ cải đường<br>- Súc miệng sau khi ăn trái cây chua<br>- Tránh các thực phẩm có màu tối<br>- Từ bỏ cà phê, soda và những thức uống sậm màu<br>- Không nên hút thuốc lá<br>- Không ăn những thực phẩm quá cứng vì có thể gây tổn thương răng, ảnh hưởng đến nướu và tuỷ răng.<br>- Không dùng răng để cắn móng tay <br>- Không ăn các thức ăn quá nóng, quá lạnh, quá cứng, quá chua;"+
    "<br><strong>Cần:</strong><br>- Kiểm tra răng miệng tại các phòng khám nha khoa theo định kỳ 6 tháng một lần để được phát hiện và điều trị sớm các bệnh răng miệng.<br>- Chải răng ít nhất là 2 lần/1 ngày<br>- Súc miệng Flo hàng tuần<br>- Sau khi ăn uống các món nhiều axit, nên chờ ít nhất nửa tiếng mới đánh răng."+"</p></div><img style='float:right;position:absolute;top:15%;right:3%;width:18%;' src='hinhanh/qc1.jpg' alt=''>";
    macdinh2();
}
function qc2() 
{
    
    macdinh();
    document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='font-family:arial;margin:3% 0px 0px 5%;width:70%;'><h3 >Phòng khám Nha khoa Răng hàm mặt tốt nhất hiện nay tại Quảng Ninh</h3><p>Đây là những<span style='color:blue;'> Phòng khám nha khoa</span>, răng hàm mặt uy tín, tốt nhất tại Quảng Ninh. Được rất nhiều khách hàng đánh giá cao, trang thiết bị hiện đại, đội ngũ Bác sĩ giàu kinh nghiệm</p>1.<strong style='color:blue;'> Nha khoa Việt Pháp Quảng Ninh</strong><br>NHA KHOA VIỆT PHÁP QUẢNG NINH với tiêu chí: Hiện đại, chất lượng, an toàn, mang lại nụ cười đẹp cho quý khách, để xây dựng thương hiệu NHA KHOA VIỆT PHÁP QUẢNG NINH ngày càng phát triển hơn nữa.Khi chất lượng cuộc sống của mỗi gia đình được nâng cao thì vấn đề về bệnh tật mà đặc biệt về răng miệng cũng từ đó trở nên phổ biến và xuất hiện ở mọi lứa tuổi. "+
    "</div><img style='float:right;position:absolute;top:25%;right:3%;width:18%;' src='hinhanh/qc2.jpg' alt=''>"+"<div style='font-family:arial;text-align: justify;margin-left: 5%;width:70%;'><p>Để những biến chứng về răng miệng làm cho Chúng ta có cảm giác khó chịu, đau nhức thì ngay từ bây giờ mỗi người nên có những biện pháp phòng ngừa và điều trị kịp thời nhằm mang lại cho chúng ta nụ cười rạng rỡ, tươi xinh khi giao tiếp.Hiểu được vấn đề đó, Nha Khoa Việt Pháp Quảng Ninh ra đời với hệ thống vô trùng tuyệt đối, trang thiết bị hiện đại, sẽ đem đến cho Qúy khách hàng thật sự thoải mái, hài lòng mỗi khi đến khám và điều trị. Với đội ngũ Bác sĩ giỏi, tận tâm, giàu kinh nghiệm cùng đội ngũ nhân viên phục vụ tận tình, chu đáo và chuyên nghiệp.Cơ sở 1: Số 1 phố Trần Quốc Tảng, phường Bạch Đằng , TP Hạ Long , Quảng Ninh (Trung tâm cột đồng hồ gần Vincom) Cơ sở 2: số 250 đường Trần Phú , Phường Cẩm Thành , TP Cẩm Phả , Quảng Ninh"+
    "<br><br><div style='text-align: justify;'><strong style='color:blue';>2. Nha khoa ATHENA</strong><br>- Hệ thống công nghệ tiên tiến, trang thiết bị hiện đại được nhập khẩu từ Mỹ, Ý, Đức- Đội ngũ chuyên gia bác sĩ tốt nghiệp cao học Đại học Y Hà Nội, Đại học Bordeaux Pháp, kinh nghiệp trên 10 năm. Hiện đang công tác tại Bệnh viện Bãi Cháy và Bệnh viện tỉnh Quảng Ninh- Quy trình vô trùng theo chuẩn quốc tế- Phục vụ chuyên nghiệp, uy tín, tin cậy<br><br><i>Địa chỉ: 229 Nguyễn Văn Cừ, TP Hạ Long, Quảng Ninh</i></p></div><img style='float:right;position:absolute;top:65%;right:3%;width:18%;' src='hinhanh/qc2_1.JPG' alt=''>";
    macdinh2();

}
function qc3() 
{
    macdinh();
    document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='font-family:arial;text-align: justify;margin:3% 0px 0px 5%;width:70%;'><h3 ><strong>Chải răng đúng cách thế nào? Bạn đã đúng chưa?</strong></h3>Chải răng, ai hàng ngày cũng chải. Nhưng để chải đúng cách thì lại rất nhiều người không biết.<br>1. Chải răng vào lúc nào.<br>- Chúng ta sẽ chải rằng  vào buổi tối trước khi đi ngủ và buổi sáng khi thức dậy<br>- Chải răng sau các bữa. Không nên chải răng ngay sau khi ăn hoặc uống vì làm tăng nguy cơ hại cho men <br>- Đặc biệt: Sau khi ăn hoặc sau khi uống các nước nhiều axit như nước cam, chanh...thì nên đợi khoảng 30 phút để nước bọt tiết ra trung hoà các axit có trong thực phẩm, tránh làm hỏng men răng và mòn răng.<br><strong>2. Thời gian chải răng:</strong><br>- Khoảng từ 2-3 phút<br>Ngoài ra, một số trường hợp thì thời gian chải răng đúng cách sẽ kéo dài hơn ví dụ như:<br>+ Các bé mới tập chải răng: Do thao tác chậm hơn người lớn, vì vậy thời gian chải răng đúng cách sẽ vào khoảng 3-4 phút."+
    "<br><strong>3. Thứ tự chải răng</strong><br>- Chải hàm trên trước, hàm dưới sau<br>- Chải mặt ngoài đến mặt trong<br><strong>4. Cách chải răng:</strong> Theo như hình dưới<br>- Súc miệng bằng nước khoảng 30s để loại bỏ mảng bám<br>- Sử dụng chỉ nha khoa làm sạch răng<br>- Rửa sạch bàn chải, lấy kem đánh răng vừa đủ<br>- Đặt bàn chải nằm ngang và nghiêng chải nghiêng từ 300-450  so với nướu. Đầu lông bàn chải phải tiếp xúc cả răng lẫn nướu.<br>- Di chuyển bàn chải qua lại nhẹ nhàng<br>- Sử dụng đầu bàn chải để làm sạch bề mặt bên trong của răng trên theo bằng các chuyển động lên xuống<br>- Đánh lưỡi từ trong ra ngoài<br>- Súc miệng lại bằng nước sạch<br>- Không nên chải răng quá 3 lần / ngày. Do nhiều hơn 3 lần, răng dễ bị mòn do tác động cơ học dẫn đến ê buốt về sau."+
    "<img style='float:right;position:absolute;top:15%;right:3%;width:22%;' src='hinhanh/qc3.jpg' alt=''>";
    macdinh2();

}

function macdinh()
{
  document.getElementById("p2").style.display = "block";
  document.getElementById("p2").innerHTML = "phap";
  document.getElementById("p2").style.width = "90%";
  document.getElementById("p2").style.height = "600px";
  document.getElementById("p2").style.position = "fixed";
  document.getElementById("p2").style.background = "white";
  document.getElementById("p2").style.top= "5%";
  document.getElementById("p2").style.left= "5%";
}
function macdinh2(){

 document.getElementById("p3").style.display = "block";
  document.getElementById("p3").style.background = "grey";
  document.getElementById("p3").style.width = "100%";
  document.getElementById("p3").style.height = "700px";
  document.getElementById("p3").style.position = "fixed";
  document.getElementById("p3").style.top = "0px";
  document.getElementById("p3").style.opacity = "0.5";
  document.getElementById("p2").style.zindex = "2";
  document.getElementById("p3").style.zindex = "1";

  document.getElementById("p5").addEventListener("click", pp5);
}
//Khi nhan vao dien thoai
document.getElementById("dienthoai").addEventListener("click", dt);
function dt()
{
  document.getElementById("p2").style.display = "block";
  document.getElementById("p2").style.width = "25%";
  document.getElementById("p2").style.height = "300px";
  document.getElementById("p2").style.position = "fixed";
  document.getElementById("p2").style.background = "white";
  document.getElementById("p2").style.top= "0px";
  document.getElementById("p2").style.right= "11%";
  document.getElementById("p2").style.boxShadow= "0px 0px 2px 1px #bbb";
  document.getElementById("p2").style.border="1px solid #bbb";
  document.getElementById("p2").style.borderRadius="5px";
  document.getElementById("p2").innerHTML ="<div style='background-color:rgb(24, 162, 180);'><button id='p5' style='margin:2px 2px 2px 92%;padding:3px 6px;color:white;background-color:red;'>X</button></div><div style='width:100%;height:140px;text-align:center;'><img style='width:110px;border-radius:50%;height:110px;margin-top:3%;' src='hinhanh/canhan.jpg' alt=''></div><div style='width:100%;height:130px;background-color:#f2f2f2;font-family:arial;text-align:center;'><br><p>Liên hệ qua số điện thoại<br><strong style='font-size:25px;'>0968832922</strong></p></div>";
  

  document.getElementById("p5").addEventListener("click", pp5);
}
function pp5() {
    document.getElementById("p2").style.display = "none";
    document.getElementById("p3").style.display = "none";

}


