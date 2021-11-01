@extends('USER.layout.index')

@section('noidung')
 <!-- chi tiet -->
 <div class="container-fluid p-5" >
        <form style="margin-top:2%;" action="/dathang" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
       <div class="row" style="width: 90%;margin: 1% 4%;">
        <div class="col-md-7" style="border-right:1px solid #ccc;">
           <h4 style="font-weight: bold;padding-bottom: 3% ;">Thông tin thanh toán</h4>
           @foreach($khachhang as $value)
               <div class="row">
                <input type="hidden" name="id_khachhang" value="{{$value->id}}">
                   <div class="col">
                       <label for="" style="color: rgb(18, 107, 110) ;">Họ tên* : </label>
                       <input class="form-control" type="text" placeholder="Họ và tên" value="{{$value->ten}}" disabled="" style="cursor: no-drop;">
                   </div>
                   <div class="col"><label for="" style="color: rgb(18, 107, 110);">Giới tính* : </label><br>
                   <input name="gioitinh" type="radio"  @if($value->gioitinh == "Nam") {{"checked"}}@endif><label for="">Anh</label>
                    <input name="gioitinh" type="radio" style="margin-left:4%;" @if($value->gioitinh == "Nữ") {{"checked"}}@endif><label for="">Chị</label>
                </div>
               </div>
               <label for="" style="color: rgb(18, 107, 110);margin-top:3% ;">Số điện thoại* : </label>
               <input class="form-control " type="text" placeholder="Số điện thoại" value="{{$value->sdt}}" disabled="" style="cursor: no-drop;">
               <label for="" style="color: rgb(18, 107, 110);margin-top:3% ;">Email* : </label>
               <input class="form-control" type="text" placeholder="Địa chỉ email" value="{{$value->email}}" disabled="" style="cursor: no-drop;">
               <label for="" style="color: rgb(18, 107, 110);margin-top:3% ;">Địa chỉ* : </label>
               <input class="form-control " type="text" placeholder="Địa chỉ" value="{{$value->diachi}}" disabled="" style="cursor: no-drop;">
               <label for="" style="color: rgb(18, 107, 110);margin-top:3% ;">Thành Phố* : </label>
               <input class="form-control " type="text" placeholder="Thành Phố" value="{{$value->thanhpho}}" disabled="" style="cursor: no-drop;">

            <h4 style="font-weight: bold;margin-top: 8%;">Thông tin bổ sung</h4>
            <textarea class="form-control mt-4" name="ghichu" id="" cols="30" rows="5" placeholder="Ghi chú về đơn hàng, ví dụ: Thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
           @endforeach
        </div>
        <div class="col-md-5">
            <div class="container-fluid p-5" style="border:2px solid rgb(18, 107, 110);">
                <h4 style="font-weight: bold;">Đơn hàng của bạn</h4>
                <table class="table">
                    <thead>
                      <tr>
                        <th>SẢN PHẨM</th>
                        <th >TỔNG</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $tong = 0;$t=0; ?>
                    @foreach($giohang as $value)
                      <tr>
                        <td>{{$arr_cay[$value->id_cay]['ten']}}  × {{$value->soluong}}</td>
                        <td><p style="float:right;"><b style="margin-top:3%;">@if($arr_cay[$value->id_cay]['khuyenmai'] == 0){{number_format($arr_cay[$value->id_cay]['gia'] * $value->soluong)}}₫ @else{{number_format($arr_cay[$value->id_cay]['khuyenmai'] * $value->soluong)}}₫ @endif</b></p></td>
                      </tr>
                    <?php if($arr_cay[$value->id_cay]['khuyenmai'] == 0){$t = $arr_cay[$value->id_cay]['gia'] * $value->soluong;}else{$t = $arr_cay[$value->id_cay]['khuyenmai'] * $value->soluong;} 
                    $tong = $tong + $t; ?>
                    @endforeach
                        <td><span style="font-weight:bold;">Tổng</span></td>
                        <td><p style="float:right;"><b style="margin-top:3%;color: red;">{{number_format($tong)}}₫</b></p></td>
                        </tr>
                        <tr>
                            <td colspan="2"> 
                                <input type="radio" checked="" name="phuongthucthanhtoan" value="Chuyển khoản"><label for="" style="margin-left:5%;">Chuyển khoản</label>
                                <p>Thực hiện thanh toán vào ngay tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng Mã đơn hàng của bạn trong phần Nội dung thanh toán. Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"> 
                                <input type="radio" name="phuongthucthanhtoan" value="Nhận tiền khi giao hàng"><label for="" style="margin-left:5%;">Nhận tiền khi giao hàng</label>
                                <p>Trả tiền mặt khi giao hàng</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input class="form-control " type="submit" value="Đặt hàng" style="background-color: rgb(18, 107, 110);color: white;height:50px"><br>
                <i style="font-size: 12px;color: rgb(18, 107, 110);">( *Dữ liệu cá nhân của bạn sẽ được sử dụng để xử lý đơn đặt hàng, hỗ trợ trải nghiệm của bạn trên toàn bộ trang web này*)</i>
            </div>
        </div>
       </div>
       </form>
    </div>
@endsection