@extends('user.layout.index')

@section('noidung')
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div style="height:800px;background-color:white;">
<h4 style="padding:1% 4%;background-color:white;color:green;"><img src="https://img.icons8.com/fluent/25/000000/opened-folder.png"/>DANH SÁCH ĐƠN HÀNG CỦA BẠN</h4>
<div class="slide-body" style="height:1000px;">
    <div class="container" style="margin-left:3%;">
        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Danh sách đơn hàng chưa giao</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">Danh sách đơn hàng đã giao</a>
          </li>
        </ul>
      
        <!-- Tab panes -->
        <div class="tab-content">
          <div id="home" class="container tab-pane active"><br>
            <table class="table table-hover" >
                <thead>
                    <tr><th></th><th>#</th><th>Mã đơn hàng</th><th>Tên khách hàng</th><th>SĐT</th><TH>Email</TH><th>Địa chỉ</th><th >Phương thức vận chuyển</th><th >Phương thức thanh toán</th><th >Tổng tiền</th><th>Trạng thái </th><th>Hủy đơn</th></tr>

                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($hoadon as $value)
                      @foreach ($arr_khachhang as $vl)
                        @if ($vl['id'] == $value['id_khachhang'])
                        <tr><td><a href="chitietdonhang/{{$value->id}}"><img src="https://img.icons8.com/color/30/000000/opened-folder.png"/></a></td>
                          <td>{{$i}}</td>
                          <td>{{$value->id}}</td>
                          <td>{{$vl->name}}</td>
                          <td>{{$vl->sdt}}</td>
                          <td>{{$vl->email}}</td>
                          <td>{{$vl->diachi}}</td>
                          <td>{{$value->phuongthucvanchuyen}}</td>
                          <td> {{$value->phuongthucthanhtoan}}</td>
                          <td>{{number_format($value->tongtien)}}</td>
                          <td>Chưa giao</td>
                          <td>
                            <form action="huydon/{{$value->id}}" method="POST">
                              <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <button type="submit" style="border:2px solid red;border-radius:3px;"><img src="https://img.icons8.com/fluent/22/000000/delete-forever.png"/></button>
                          </form>
                          </td>
                        @endif
                        @endforeach
                        <?php $i++; ?>
                    @endforeach
                </tbody>
              </table>
              <div style="margin-top:65%;margin-left:100%;" >
                {!! $hoadon->links() !!}
                </div>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-hover" >
                <thead>
                  <tr><th></th><th>#</th><th>Mã đơn hàng</th><th>Tên khách hàng</th><th>SĐT</th><TH>Email</TH><th>Địa chỉ</th><th >Phương thức vận chuyển</th><th >Phương thức thanh toán</th><th >Tổng tiền</th><th>Trạng thái </th></tr>

                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($hoadondagiao as $value)
                    @foreach ($arr_khachhang as $vl)
                    @if ($vl['id'] == $value['id_khachhang'])
                    <tr><td><a href="chitietdonhang/{{$value->id}}"><img src="https://img.icons8.com/color/30/000000/opened-folder.png"/></a></td>
                      <td>{{$i}}</td>
                      <td>{{$value->id}}</td>
                      <td>{{$vl->name}}</td>
                      <td>{{$vl->sdt}}</td>
                      <td>{{$vl->email}}</td>
                      <td>{{$vl->diachi}}</td>
                      <td>{{$value->phuongthucvanchuyen}}</td>
                      <td> {{$value->phuongthucthanhtoan}}</td>
                      <td>{{number_format($value->tongtien)}}</td>
                      <td>Đã giao</td>
                     
                    @endif
                    @endforeach
                    <?php $i++; ?>
                    @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
      </div>
</div>
@endsection