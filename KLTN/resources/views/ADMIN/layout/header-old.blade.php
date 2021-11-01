<!--logo và đăng nhập-->
<div class="container-fluid" style="background:linear-gradient( rgb(14, 84, 87) ,rgb(18, 107, 110) 100%);">
        <div class="row" style="height:40px;" >
            <div class="col-md-8 ">
                <img style="height: 38px;" src="../ADMIN/img/logo.JPG" alt="">
            </div>
            <div class="col-md-4" >
            @if(Auth::check())
                <img src="https://img.icons8.com/fluency-systems-filled/18/ffffff/user.png"/>
                <a style="color: white;text-decoration: none;" href=""><i>Xin chào: {{Auth::user()->name}} !</i></a>
                <img style="margin-left:9%;"src="https://img.icons8.com/ios-glyphs/18/ffffff/exit.png"/>
                <a style="color: white;text-decoration: none;" href="logout"> Logout</a>
            @endif
            </div>
           
        </div>
    </div>
    <!--danh mục quản lí-->
    <div class="container-fluid">
        <div class="row " style="background-color:rgb(18, 107, 110);">
            <div class="col-md-1">
                <div class="dropdown" style="margin:0%">
                    <button style="background-color:rgb(14, 84, 87);color: white;font-weight: bold;" class="btn btn-default " type="button" data-toggle="dropdown"><img src="https://img.icons8.com/emoji/25/000000/deciduous-tree-emoji.png"/><br> CÂY GIỐNG</button>
                    <ul class="dropdown-menu" >
                      <li ><a id="the_a" style="font-weight: bold;" href="danhsach-giongcay">CÂY GIỐNG</a></li>
                      <li ><a id="the_a" style="font-weight: bold;" href="danhsach-loaicay/15">LOẠI CÂY</a></li>
                      <li ><a id="the_a" style="font-weight: bold;" href="danhsach-cay/10">CÂY</a></li>
                    </ul>
                </div>
            </div>
            <div class="col ">
                <a href="danhsach-slide" style="background-color:rgb(14, 84, 87);color: white;font-weight: bold;padding:7% 38%;" class="btn btn-default " type="button" ><img src="https://img.icons8.com/color/25/000000/sladeshare--v1.png"/><br> SLIDE</a>
            </div>
            <div class="col">
                <div class="dropdown">
                    <button style="background-color:rgb(14, 84, 87);color: white;font-weight: bold;padding: 7% 30%;" class="btn btn-default " type="button" data-toggle="dropdown"><img src="https://img.icons8.com/fluency/25/000000/newspaper-.png"/><br>TIN TỨC</button>
                    <ul class="dropdown-menu" >
                        <li ><a id="the_a" style="font-weight: bold;" href="danhsach-loaitin">LOẠI TIN</a></li>
                        <li ><a id="the_a" style="font-weight: bold;" href="danhsach-tintuc/12">TIN TỨC</a></li>
                      </ul>
                </div>
            </div>
            <div class="col">
                <div class="dropdown">
                    <a  href="/choxuli" style="background-color:rgb(14, 84, 87);color: white;font-weight: bold;padding: 7% 19%;" class="btn btn-default " type="button" ><img src="https://img.icons8.com/office/25/000000/List-of-parts.png"/><br>ĐƠN HÀNG</a>
                </div>
            </div>
            <div class="col">
                <div class="dropdown">
                    <a  href="/nhapkho" style="background-color:rgb(14, 84, 87);color: white;font-weight: bold;padding: 7% 19%;" class="btn btn-default " type="button" ><img src="https://img.icons8.com/office/25/000000/List-of-parts.png"/><br>NHẬP KHO</a>
                </div>
            </div>
            <div class="col">
                <a href="danhsach-khachhang" style="background-color:rgb(14, 84, 87);color: white;font-weight: bold;padding: 7% 12%;" class="btn btn-default " type="button" ><img src="https://img.icons8.com/color/25/000000/attract-customers.png"/><br>KHÁCH HÀNG</a>
            </div>
            <div class="col">
                <a href="danhsach-binhluan" style="background-color:rgb(14, 84, 87);color: white;font-weight: bold;padding: 7% 20%;" class="btn btn-default " type="button"><img src="https://img.icons8.com/fluency/25/000000/edit-chat-history.png"/><br>BÌNH LUẬN</a>
            </div>
            <div class="col">
                <a href="danhsach-lienhe" style="background-color:rgb(14, 84, 87);color: white;font-weight: bold;padding: 7% 32%;" class="btn btn-default " type="button" ><img src="https://img.icons8.com/fluency/25/000000/new-contact.png"/><br>LIÊN HỆ</a>
            </div>
            <div class="col">
                <a href="danhsach-nhanvien" style="background-color:rgb(14, 84, 87);color: white;font-weight: bold;padding: 7% 20%;" class="btn btn-default " type="button" ><img src="https://img.icons8.com/fluency/25/000000/staff.png"/><br>NHÂN VIÊN</a>
            </div>
            <div class="col">
                <a href="danhsach-user/0" style="background-color:rgb(14, 84, 87);color: white;font-weight: bold;padding: 7% 20%;" class="btn btn-default "  ><img src="https://img.icons8.com/color/25/000000/blocked-account-male.png"/><br>TÀI KHOẢN</a>
            </div>
            <div class="col">
                <a href="danhsach-baocao" style="background-color:rgb(14, 84, 87);color: white;font-weight: bold;padding: 7% 26%;" class="btn btn-default " type="button"><img src="https://img.icons8.com/office/25/000000/play-graph-report.png"/><br>THỐNG KÊ</a>
            </div>
            <div class="col">
                <a href="thongtin" style="background-color:rgb(14, 84, 87);color: white;font-weight: bold;padding: 7% 20%;" class="btn btn-default " ><img src="https://img.icons8.com/office/25/000000/settings.png"/><br>CÀI ĐẶT</a>
            </div>
            </div>
        </div>
    </div>