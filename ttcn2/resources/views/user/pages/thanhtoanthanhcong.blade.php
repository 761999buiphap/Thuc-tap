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
        <div style="padding:3%;width: 55%;height:600px;margin:1% 0px 20% 20%;background-color:white;">
            <a style="text-decoration: none;color: #0a6e3b;" href=""><h1>PHAP GIANG BOOK</h1></a>
            <h3>Đặt hàng thành công</h3>
            <p>Mã đơn hàng: #{{$hoadon->id}}</p>
            <p>Cảm ơn bạn đã mua hàng !</p>
            <div style="border: 1px solid #bbb;padding:20px;border-radius:5px;margin-bottom:10%;">
                <p style="font-size:2vw;">Thông tin đơn hàng</p>
                <p>Thông tin giao hàng</p>
                <p>{{$khachhang->name}}</p>                
                <p>{{$khachhang->sdt}}</p>
                <p>{{$khachhang->diachi}}</p>
                <p style="font-size:2vw;">Phương thức thanh toán</p>
                <p>{{$hoadon->phuongthucthanhtoan}}</p>
            </div>
            <a  style="float:left; padding:20px 80px;background-color: rgb(14, 136, 184);color:white;margin-top:10px;margin-left:50%;" href="trangchu">Tiếp tục mua hàng</a>
        </div>
@endsection