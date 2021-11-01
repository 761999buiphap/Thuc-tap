document.getElementById("dienthoai").addEventListener("click", dtt);

document.getElementById("hoso").addEventListener("click", hsbn);
document.getElementById("doanhthu").addEventListener("click", dtbs);
document.getElementById("tthuat").addEventListener("click", tt);
document.getElementById("lhen").addEventListener("click", lh);

function dtt()
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
function hsbn() {
    macdinh();
    document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 35%;font-family:arial;'>QUẢN LÝ HỒ SƠ BỆNH NHÂN</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 33%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='dichvu.html'>Dịch vụ > </a></li><li style='float: left ;font-weight:bolder;font-family: arial;'><a style='color: white;'>Hồ sơ bệnh nhân</a></li></ul></div>"+
    "<div style=' width: 100%;height: 300px; position: relative;'><div style=' width: 60%;margin-left: 7%;margin-top: 7%; font-family: arial;' ><p  >+ Thông tin đặc biệt là <span style='color: red;' > hồ sơ bệnh án</span> phải được lưu trữ - bảo vệ an toàn để không bị mất, hư hại, tráo đổi, truy cập hoặc sử dụng trái phép </p><p >+<span style='color: red;'> Hồ sơ bệnh án</span> và các thông tin và dữ liệu khác được bảo mật và bảo vệ tại mọi thời điểm. Ví dụ như những hồ sơ bệnh án đang được sử dụng được để tại những khu vực mà chỉ có những nhân viên nào được phép mới có thể tiếp cận và hồ sơ bệnh án được lưu trữ tại những khu vực ít có khả năng bị hư hại bởi nhiệt độ, nước, lửa v... </p> <p>+ Triển khai các quy trình ngăn không cho truy cập trái phép vào các thông tin được lưu trữ dưới dạng điện tử</p><p>+ Giúp xác định rõ thời gian lưu giữ hồ sơ bệnh án và các loại dữ liệu và thông tin khác. Hồ sơ bệnh án và tất cả các loại dữ liệu và thông tin được lưu giữ để tuân thủ đúng các luật và quy định của nhà nước. Ngoài ra để hỗ trợ việc chăm sóc người bệnh, nghiên cứu và đào tạo. Việc lưu giữ hồ sơ bệnh án và các loại dữ liệu và thông tin phải luôn đi kèm với sự bảo mật và an ninh của các dạng thông tin đó. Khi hết thời gian lưu giữ, hồ sơ bệnh án và các loại hồ sơ, dữ liệu và thông tin khác được hủy bằng một cách thức đảm bảo được tính bảo mật và an ninh.</p></div>"+
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
    document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 35%;font-family:arial;'>QUẢN LÝ HỒ SƠ BỆNH NHÂN</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 33%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='dichvu.html'>Dịch vụ > </a></li><li style='float: left ;font-weight:bolder;font-family: arial;'><a style='color: white;'>Hồ sơ bệnh nhân</a></li></ul></div>"+
    "<div style=' width: 100%;text-align: justify;font-family:arial;height: 300px; position: relative;'><div style=' width: 60%;margin-left: 7%;margin-top: 7%; font-family: arial;' ><p  >+ Thông tin đặc biệt là <span style='color: red;' > hồ sơ bệnh án</span> phải được lưu trữ - bảo vệ an toàn để không bị mất, hư hại, tráo đổi, truy cập hoặc sử dụng trái phép </p><p >+<span style='color: red;'> Hồ sơ bệnh án</span> và các thông tin và dữ liệu khác được bảo mật và bảo vệ tại mọi thời điểm. Ví dụ như những hồ sơ bệnh án đang được sử dụng được để tại những khu vực mà chỉ có những nhân viên nào được phép mới có thể tiếp cận và hồ sơ bệnh án được lưu trữ tại những khu vực ít có khả năng bị hư hại bởi nhiệt độ, nước, lửa v... </p> <p>+ Triển khai các quy trình ngăn không cho truy cập trái phép vào các thông tin được lưu trữ dưới dạng điện tử</p><p>+ Giúp xác định rõ thời gian lưu giữ hồ sơ bệnh án và các loại dữ liệu và thông tin khác. Hồ sơ bệnh án và tất cả các loại dữ liệu và thông tin được lưu giữ để tuân thủ đúng các luật và quy định của nhà nước. Ngoài ra để hỗ trợ việc chăm sóc người bệnh, nghiên cứu và đào tạo. Việc lưu giữ hồ sơ bệnh án và các loại dữ liệu và thông tin phải luôn đi kèm với sự bảo mật và an ninh của các dạng thông tin đó. Khi hết thời gian lưu giữ, hồ sơ bệnh án và các loại hồ sơ, dữ liệu và thông tin khác được hủy bằng một cách thức đảm bảo được tính bảo mật và an ninh.</p></div>"+
    "<img style='width: 23%;height:60% ;left: 70%;top: 7%;position: absolute;' src='hinhanh/hosobenhan.jpg' alt=''></div>";
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
function pp5() {
    document.getElementById("p2").style.display = "none";
    document.getElementById("p3").style.display = "none";

}
