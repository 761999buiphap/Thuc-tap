@extends('USER.layout.index')

@section('noidung')
    <!-- chi tiet -->
    <div class="container-fluid " style="padding:1% 1% 10% 1%;">
       <div class="row" style="width: 90%;margin: 1% 5%;">
        <div class="col-md-7" style="border-right:1px solid #ccc;">
        <form style="margin-top:2%;" action="/capnhatgiohang" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <?php $i=1;$tong=0;?>
            <table class="table">
                <thead>
                  <tr>
                    <th>SẢN PHẨM</th>
                    <th>GIÁ</th>
                    <th>SỐ LƯỢNG</th>
                    <th>TỔNG</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($giohang as $value)
                  <tr>
                    <td>
                        <a id="x" href="/xoagiohang/{{$value->id}}" style="font-weight: bold;padding:1% 7px;border: 2px solid #ccc;color:#ccc;border-radius: 50%;text-decoration: none;">x</a>
                        <img style="width:22%;height:60px;" src="../ADMIN/img/cay/{{$arr_cay[$value->id_cay]['anh']}}" alt="">
                        <a style="text-decoration:none;color: rgb(18, 107, 110);" href="">{{$arr_cay[$value->id_cay]['ten']}}</a>
                    </td>
                    <td><b style="margin-top:3%;">@if($arr_cay[$value->id_cay]['khuyenmai'] == 0){{number_format($arr_cay[$value->id_cay]['gia'])}}₫ @else {{number_format($arr_cay[$value->id_cay]['khuyenmai'])}}₫ @endif</b></td>
                    <td>
                        <div class="buttons_added">
                            <input class="minus is-form " type="button" value="-">
                            <input aria-label="quantity" class="input-qty" max="10" min="1" name="sl[{{$i}}]" type="number" value="{{$value->soluong}}">
                            <input class="plus is-form" type="button" value="+">
                        </div>
                    </td>
                    <td><b>@if($arr_cay[$value->id_cay]['khuyenmai'] == 0){{number_format($arr_cay[$value->id_cay]['gia'] * $value->soluong)}}₫ @else {{number_format($arr_cay[$value->id_cay]['khuyenmai'] * $value->soluong)}}₫ @endif</b></td>
                    </tr>
                    <input type="hidden" name="giatri_i" value="{{$i}}" >
                    <input type="hidden" name="id[{{$i}}]" value="{{$value->id}}">
                    <?php $i++;
                    if($arr_cay[$value->id_cay]['khuyenmai'] == 0){$t = $arr_cay[$value->id_cay]['gia'] * $value->soluong;}else{$t = $arr_cay[$value->id_cay]['khuyenmai'] * $value->soluong;} 
                    $tong = $tong+$t; ?>
                  @endforeach
                </tbody>
            </table>
        <hr>
        <a id="tieptucxemsanpham" href="trangchu" > ← TIẾP TỤC XEM SẢN PHẨM	 </a>
        <input type="submit" style="background-color: rgb(18, 107, 110);opacity: 0.7;padding:5px 5%;border: 2px solid rgb(18, 107, 110);color: white;border-radius: 3px;margin-left: 2%;" value="CẬP NHẬT GIỎ HÀNG">
        </form>  
      </div>
        <div class="col-md-5">
            <table class="table">
                <thead>
                  <tr>
                    <th>CỘNG GIỎ HÀNG</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><p style="float:right;">TỔNG</p></td>
                    <td><h4 style="float:right;"><b style="margin-top:3%;">{{number_format($tong)}}₫</b></h4></td>
                  </tr>
                  <tr >
                      <td colspan="2">
                        <a href="/thanhtoan" class="form-control " style="background-color: rgb(18, 107, 110);color: white;height:50px;text-align:center;font-size:18px;text-decoration:none;">Tiến hành thanh toán</a>
                      </td>
                  </tr>
                </tbody>
            </table>
        </div>
       </div>
    </div>
    @if(count($errors) > 0)
    <?php foreach($errors->all() as $err){ ?>
    <div class="alert alert-danger alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:1%;width:25%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{$err}}
    </div>
    <?php } ?>
    @endif
    @if(session('thongbao'))
    <div class="alert alert-success alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:1%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{session('thongbao')}}
  </div>
    @endif
<script>//<![CDATA[
    $('input.input-qty').each(function() {
      var $this = $(this),
        qty = $this.parent().find('.is-form'),
        min = Number($this.attr('min')),
        max = Number($this.attr('max'))
      if (min == 0) {
        var d = 0
      } else d = min
      $(qty).on('click', function() {
        if ($(this).hasClass('minus')) {
          if (d > min) d += -1
        } else if ($(this).hasClass('plus')) {
          var x = Number($this.val()) + 1
          if (x <= max) d += 1
        }
        $this.attr('value', d).val(d)
      })
    })
    //]]></script>
@endsection