<div class="container-fluid" style="background-color: #d5d5d5;">
        <div class="row" style="height:23px;font-size:13px;color:white;font-weight: bold;">
            <div class="col-md-6" style="margin-left:6%;color: black;font-weight: normal;">
                <p>Chào mừng bạn đến với cửa hàng cây giống </p>
            </div>
            <div class="col-md-3" >
                @if(Auth::check())
                <button type="button" class="border-none" data-toggle="dropdown" style="border:none;background-color:#d5d5d5;">
                    <img src="https://img.icons8.com/fluency-systems-filled/18/ffffff/user.png"/>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="dangnhap"><span class="fa  fa-share"></span> Sign in</a>
                    <a class="dropdown-item" href="logout"><span class="fa fa-reply"></span> sign out</a>
                </div>
                <a style="color: white;text-decoration: none;"><i>Xin chào: {{Auth::user()->name}}</i></a>
                @else
                <button type="button" class="border-none" data-toggle="dropdown" style="border:none;background-color:#d5d5d5;">
                    <img src="https://img.icons8.com/fluency-systems-filled/18/ffffff/user.png"/>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="dangnhap"> Sign in</a>
                    <a class="dropdown-item" href="logout">sign out</a>
                </div>
                <a style="color: white;text-decoration: none;" href="">Tài khoản</a>
                @endif
                <img style="margin-left:5%;" src="https://img.icons8.com/material-sharp/18/ffffff/available-updates.png"/>
                <?php foreach($giongcay as $vl){ ?>
                <a style="color: white;text-decoration: none;" href="/trangloaicay/{{$vl->id}}">Sản phẩm</a>
                <?php break;} ?>
            </div>
            <div class="col-md-2">
                <img style="float: left;" src="https://img.icons8.com/material-rounded/18/ffffff/marker.png"/>
                <p>Hệ thống cửa hàng</p>
            </div>
        </div>
    </div>
    <!-- tìm kiếm -->
    <div style="height:90px;" class="container-fluid pt-4">
        <div class="row " >
            <div class="col-md-2" style="margin-left:6%;">
                <img src="../USER/img/logo.JPG" alt="">
            </div>
            <div class="col-md-7 mt-3" >
            <form class="form-group" action="/timkiem" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="float-left " style="width:10%;height:40px;">
                    <select class="form-control h-100"  name="giongcay" id="" >
                        <option value=" ">All</option>
                        @foreach($giongcay as $value)
                        <option value="{{$value->id}}">{{$value->ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="float-left" style="width:75%;height:40px;">
                    <input  class="form-control h-100" type="text" name="ten">
                </div>
                <div class="float-left 5" style="height:40px;">
                    <input class="form-control h-100" type="submit" value="Tìm kiếm" style="color:white;background-color:rgb(18, 107, 110);">
                </div>
            </form>
            </div>
            <div  class="col-md-2 mt-2">
                <p style="border-radius: 99px;color:white;background-color: rgb(18, 107, 110);padding: 4%;width:70%;margin-top: 4%;">Gọi: 0968832922</p>
            </div>
        </div>
    </div>
    <!-- thanh quản lí -->
    <div style="background-color: rgb(18, 107, 110);" class="container-fluid" >
        <div class="row">
            <div class="col-md-3" >
                <button type="button" class="btn btn-primary" style="margin-left: 25%;border-radius:0;width: 90%;background-color: #3dafb3;height: 50px;font-size: 17px;font-weight: bold;" data-toggle="dropdown">
                    <img style="margin-right:3%;" src="https://img.icons8.com/ios-filled/25/ffffff/list.png"/> Danh mục sản phẩm
                </button>
                <div class="dropdown-menu" style="width: 82%;z-index:990;" >
                    <div id="danhmuc">
                        @foreach($giongcay as $value)
                        <a class="dropdown-item"  href="/trangloaicay/{{$value->id}}">> {{$value->ten}}</a>
                        @endforeach
                        <a class="dropdown-item"  href="/trangloaicay/{{$value->id}}">> Sản Phẩm bán chạy</a>
                        <a class="dropdown-item"  href="/trangloaicay/{{$value->id}}">> Sản phẩm mới nhất</a>
                        <a class="dropdown-item"  href="/trangloaicay/{{$value->id}}">> Sản phẩm khuyên mãi</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9" >
                <a class="float-left pt-4 p-2 mr-5 font-weight-bold text-white text-decoration-none" style="margin-left:2%;" href="/trangchu"><span>Trang chủ</span></a>
                <a class="float-left pt-4 p-2 mr-5 font-weight-bold text-white text-decoration-none" href="/gioithieu">Giới thiệu</a>
                <a class="float-left pt-4 p-2 mr-5 font-weight-bold text-white text-decoration-none" href="/chinhsach">Chính sách</a>
                <?php foreach($giongcay as $vl){ ?>
                <a class="float-left pt-4 p-2 mr-5 font-weight-bold text-white text-decoration-none" href="/trangloaicay/{{$vl->id}}">Sản phẩm  </a>
                <?php break;} ?>
                <a class="float-left pt-4 p-2 mr-5 font-weight-bold text-white text-decoration-none" @if(Auth::check()) href="donhang" @else href="dangnhap" @endif>Đơn hàng</a>
                <a class="float-left pt-4 p-2 mr-5 font-weight-bold text-white text-decoration-none" href="/tintuctrangchu">Tin tức</a>
                <a class="float-left pt-4 p-2 mr-5 font-weight-bold text-white text-decoration-none" href="/lienhe">Liên hệ</a>
                @if(Auth::check())
                <a class="float-left pt-4 p-2 font-weight-bold text-white text-decoration-none" style="margin-left:6%;" href="/giohang">Giỏ hàng</a>
                @else
                <a class="float-left pt-4 p-2 font-weight-bold text-white text-decoration-none" style="margin-left:6%;" href="/dangnhap">Giỏ hàng</a>
                @endif
                <img class="pt-3" src="https://img.icons8.com/pastel-glyph/25/ffffff/shopping-basket-2--v1.png"/>
            </div>
        </div>
    </div>