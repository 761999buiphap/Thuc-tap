/*document.getElementById("timhieuthem").addEventListener("click", tht);
//document.getElementById("hosobenhnhan").addEventListener("click", hsbn);
document.getElementById("doanhthubacsy").addEventListener("click", hsb);

//Khi nhấn vào tìm hiểu thêm
function tht() {
  document.getElementById("p2").style.display = "block";
  document.getElementById("p2").innerHTML = "phap";
  document.getElementById("p2").style.width = "90%";
  document.getElementById("p2").style.height = "600px";
  document.getElementById("p2").style.position = "fixed";
  document.getElementById("p2").style.background = "white";
  document.getElementById("p2").style.top= "5%";
  document.getElementById("p2").style.left= "5%";
  document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 44%;font-family:arial;'>GIỚI THIỆU</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 40%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial;'><a style='color: white;'>Giới thiệu</a></li></ul></div>"+
  "<div style='width: 86%;height: 400px;margin-left: 7%;margin-bottom: 0%;text-align: justify;'><p>Với kinh nghiệm và uy tín triển khai phần mềm quản lý phòng khám nha khoa trên 10 năm kinh nghiệm. BambuFit tự hào là nhà phát triển phần mềm quản lý phòng khám nha khoa đầu tiên tại Việt Nam, và được đánh giá là Phần mềm nha khoa tốt nhất hiện nay.<br> Đón đầu xu hướng sử dụng công nghệ (nền tảng cho cách mạng công nghiệp 4.0) vào ứng dụng trong đời sống. Công ty Bambu đã xây dựng thành công <strong> Phần mềm quản lý phòng khám nha khoa online BambuFit </strong>(trên nền Web base).</p><p><strong>+ Tính năng</strong> : Được kế thừa từ phần mềm offline Ovem Edental, BambuFit có đầy đủ các chức năng mà một Phòng khám nha khoa cần có: Quản lý dịch vụ khám, chữa bệnh, quản lý các thủ thuật, quản lý thu chi, báo cáo tổng hợp các thủ thuật đã điều trị, báo cáo thủ thuật theo nhân viên, bảng lương nhân viên v.v..<br> <strong>+ Phạm vi sử dụng </strong> : BambuFit được phát triển trên nền tảng web base, vì thế bạn có thể sử dụng phần mềm trên mọi thiết bị như PC, tablet, mobile và truy cập sử dụng, quản lý ở mọi nơi chỉ cần có Internet"+
  "<br><strong>+ Tính ổn định </strong> : Khi sử dụng BambuFit bạn không cần cài đặt nên tính ổn định phần mềm rất cao.<br><strong>+ Giao diện </strong> : Đơn giản, dễ sử dụng, thân thiện với người dùng<br><strong>+ Sao lưu dữ liệu (backup)</strong>: Dữ liệu phần mềm BambuFit sẽ được sao lưu (backup) hàng ngày và được lưu trữ trên hệ thống máy chủ. Vì thế bạn hoàn toàn yên tâm về tính toàn vẹn dữ liệu <br><strong>+ Tùy biến chức năng nâng cao </strong> : Ngoài các chức năng phần mềm đang hiện có, nếu quý khách hàng có nhu cầu phát triển thêm các tính năng đặc thù cho riêng phòng khám của mình thì BambuFit hoàn toàn có thể đáp ứng (chi phí phát sinh sẽ tùy thuộc vào các tính năng cụ thể). Ví dụ các tính năng tùy biến như: tích hợp SMS để thông báo lịch hẹn, chăm sóc khách hàng, gửi email thông báo lịch hẹn, tích hợp lịch hẹn với website, tra cứu hồ sơ bệnh án trực tuyến,...<br> <strong>+ Bảo hành</strong> : Vĩnh viễn suốt trong quá trình sử dụng</p></div>";

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
//Khi nhấn vào quản lý hồ sơ bệnh nhân
function hsb() {
  document.getElementById("p2").style.display = "block";
  document.getElementById("p2").innerHTML = "phap";
  document.getElementById("p2").style.width = "90%";
  document.getElementById("p2").style.height = "600px";
  document.getElementById("p2").style.position = "fixed";
  document.getElementById("p2").style.background = "white";
  document.getElementById("p2").style.top= "5%";
  document.getElementById("p2").style.left= "5%";
  document.getElementById("p2").innerHTML = "<button id='p5' style='margin:2px 2px 2px 1168px;color:white;background-color: rgb(173, 75, 75);padding:3px;'>Thoát</button><div style='background-size: 100% 100%;width: 100%;height: 150px;background-image: url(hinhanh/nen1.jpg);background-repeat: no-repeat,repeat;position: relative;text-align: center;'><h2 style='color:white;position: absolute; top: 10%;left: 35%;font-family:arial;'>QUẢN LÝ HỒ SƠ BỆNH NHÂN</h2><ul style='position: absolute;display:inline-block;list-style-type: none;left: 33%;top: 50%;'><li style='float:left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='trangchu.php'>Trang chủ ></a></li><li style='float: left ;font-weight:bolder;font-family: arial; '><a style='color: white;text-decoration: none;' href='dichvu.html'>Dịch vụ > </a></li><li style='float: left ;font-weight:bolder;font-family: arial;'><a style='color: white;'>Hồ sơ bệnh nhân</a></li></ul></div>"+
  "<div style=' width: 100%;height: 300px; position: relative;'><div style=' width: 60%;margin-left: 7%;margin-top: 7%; font-family: arial;' ><p  >+ Thông tin đặc biệt là <span style='color: red;' > hồ sơ bệnh án</span> phải được lưu trữ - bảo vệ an toàn để không bị mất, hư hại, tráo đổi, truy cập hoặc sử dụng trái phép </p><p >+<span style='color: red;'> Hồ sơ bệnh án</span> và các thông tin và dữ liệu khác được bảo mật và bảo vệ tại mọi thời điểm. Ví dụ như những hồ sơ bệnh án đang được sử dụng được để tại những khu vực mà chỉ có những nhân viên nào được phép mới có thể tiếp cận và hồ sơ bệnh án được lưu trữ tại những khu vực ít có khả năng bị hư hại bởi nhiệt độ, nước, lửa v... </p> <p>+ Triển khai các quy trình ngăn không cho truy cập trái phép vào các thông tin được lưu trữ dưới dạng điện tử</p><p>+ Giúp xác định rõ thời gian lưu giữ hồ sơ bệnh án và các loại dữ liệu và thông tin khác. Hồ sơ bệnh án và tất cả các loại dữ liệu và thông tin được lưu giữ để tuân thủ đúng các luật và quy định của nhà nước. Ngoài ra để hỗ trợ việc chăm sóc người bệnh, nghiên cứu và đào tạo. Việc lưu giữ hồ sơ bệnh án và các loại dữ liệu và thông tin phải luôn đi kèm với sự bảo mật và an ninh của các dạng thông tin đó. Khi hết thời gian lưu giữ, hồ sơ bệnh án và các loại hồ sơ, dữ liệu và thông tin khác được hủy bằng một cách thức đảm bảo được tính bảo mật và an ninh.</p></div>"+
  "<img style='width: 23%;height:60% ;left: 70%;top: 7%;position: absolute;' src='hinhanh/hosobenhan.jpg' alt=''></div>";
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
*/