@extends('USER.layout.index')

@section('noidung')
<!-- chi tiet -->
<div class="container-fluid p-5" >
        <iframe style="width:89%;height: 300px;margin-left: 5%;" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d29804.286839080425!2d105.5714264450045!3d20.971146678988614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zdGjDtG4gcm8sIHR1eeG6v3QgbmdoxKlhLCBxdeG7kWMgb2FpLCBow6AgbuG7mWk!5e0!3m2!1svi!2s!4v1627979514048!5m2!1svi!2s"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>            
        <div class="row" style="padding: 5%;" >
            <div class="col">
                <h4 style="font-weight:bold;">Liên hệ với chúng tôi</h4><br>
                <h5 style="font-weight:bold;">Cửa hàng cây giống </h5><br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                        <p><b>Trụ sở chính:</b> Thôn Ro, Tuyết Nghĩa, Quốc Oai, Thành phố Hà Nội</p><br>
                        <p><b>Hotline:</b> 0968 832 922 </p><br>
                        <p><b>Email:</b> buithiphap761999@gmail.com</p>
                        <p>buithiphap761999@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <form action="/lienhe" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <input class="form-control" type="text" name="hoten" placeholder="Họ và tên...">
                    <input class="form-control mt-4" type="text" name="sdt" placeholder="Số điện thoại...">
                    <input class="form-control mt-4" type="text" name="email" placeholder="Email...">
                    <textarea class="form-control mt-4" name="noidung" id="" cols="30" rows="7" placeholder="Nội dung liên hệ..."></textarea>
                    <input class="form-control mt-4 w-25" style="background-color:rgb(18, 107, 110);color: white;" type="submit" value="Gửi liên hệ">
                </form>
                @if(session('thongbao'))
                    <div class="noterr">
                        {{session('thongbao')}}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!--Báo lỗi-->
    @if(count($errors) > 0)
    <?php foreach($errors->all() as $err){ ?>
    <div class="alert alert-danger alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:1%;width:25%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{$err}}
    </div>
    <?php } ?>
    @endif
@endsection