@extends('USER.layout.index')

@section('noidung')
 <!-- chi tiet -->
 <div class="container-fluid p-5" >
       <div class="row" style="width: 91%;margin: 0% 4%;">
        <div class="col-md-7" >
            <h3 style="font-weight: bold;">Chi tiết đơn hàng</h3>
            <table class="table">
                <thead>
                  <tr>
                    <th>SẢN PHẨM</th>
                    <th><p style="float:right;">TỔNG</p></th>
                  </tr>
                </thead>
                <tbody>
                <?php $tong=0;$t=0; ?>
                @foreach($giohang as $value)
                  <tr>
                    <td><p style="color: #3dafb3;">{{$arr_cay[$value->id_cay]['ten']}}  × {{$value->soluong}}</p></td>
                    <td><p style="float:right;"><b style="margin-top:3%;">@if($arr_cay[$value->id_cay]['khuyenmai'] == 0){{number_format($arr_cay[$value->id_cay]['gia'] * $value->soluong)}}₫ @else{{number_format($arr_cay[$value->id_cay]['khuyenmai'] * $value->soluong)}}₫ @endif</b></p></td>
                  </tr>
                  <?php if($arr_cay[$value->id_cay]['khuyenmai'] == 0){$t = $arr_cay[$value->id_cay]['gia'] * $value->soluong;}else{$t = $arr_cay[$value->id_cay]['khuyenmai'] * $value->soluong;} 
                    $tong = $tong + $t; ?>
                    @endforeach
                    <tr>
                        <td><b>Phương thức thanht toán:</b></td>
                        <td><p style="float:right;">{{$hoadon->phuongthuc}}</p></td>
                    </tr>
                  <tr>
                    <td><b>Tổng cộng:</b></td>
                    <td><p style="float:right;"><b style="margin-top:3%;">{{number_format($tong)}}₫</b></p></td>
                    </tr>
                    <tr>
                        <td></td><td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-5">
            <div class="container-fluid p-5 mt-5" style="box-shadow: 1px 1px 3px 0px rgb(0 0 0 / 20%), 0 1px 0 rgb(0 0 0 / 7%), inset 0 0 0 1px rgb(0 0 0 / 5%);background-color: #f9f9f9;">
                <h5 style="font-weight: bold;font-size: 16px;color: #3dafb3;">Cảm ơn bạn. Đơn hàng của bạn đã được nhận. </h5>
                <ul style="font-size: 16px;margin-top: 8%;">
                    <li style="margin:2% 0;">Mã đơn hàng: <b>{{$hoadon->id}}</b></li>
                    <li style="margin:2% 0;">Ngày: <b>{{date("d-m-Y", strtotime($hoadon->ngay))}}</b></li>
                    <li style="margin:2% 0;">Tổng cộng: <b>{{number_format($tong)}}</b></li>
                    <li style="margin:2% 0;">Phương thức thanh toán:<b>Chuyển khoản ngân hàng</b> </li>
                </ul>
            </div>
        </div>
       </div>
    </div>
@endsection