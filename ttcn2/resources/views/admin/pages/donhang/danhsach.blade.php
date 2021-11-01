@extends('admin.layout.index')

@section('noidung')
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
      #diva{
          height:60px;
      }
     
  </style>

  <div class="div2" style="margin-top:1%;padding:3px 0;">
    <form style="margin-top:3px;margin-left:73%;" class="div2form" method="POST" action="tk-slide">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
  
    </form>
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Đơn hàng</span> </p>
    
    </div>
    @if(isset($tukhoa))
    <div style="padding:10px;background-color:pink;">
        <span >Từ khóa tìm kiếm:</span><i style="color:red;font-size:20px;">" {{$tukhoa}} "</i>
    </div>
    @endif
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
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">Danh sách đơn hàng bị hủy</a>
          </li>
        </ul>
      
        <!-- Tab panes -->
        <div class="tab-content">
          <div id="home" class="container tab-pane active"><br>
            <table class="table table-hover" style="width:90%;">
                <thead>
                    <tr><th></th><th>#</th><th>Mã đơn hàng</th><th>Tên khách hàng</th><th>SĐT</th><TH>Email</TH><th>Địa chỉ</th><th >Phương thức vận chuyển</th><th >Phương thức thanh toán</th><th >Tổng tiền</th><th>Trạng thái </th><th>Xóa</th></tr>

                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($hoadon as $value)
                      @foreach ($arr_khachhang as $vl)
                        @if ($vl['id'] == $value['id_khachhang'])
                        <tr><td><a href="chitiet-donhang/{{$value->id}}"><img src="https://img.icons8.com/color/30/000000/opened-folder.png"/></a></td>
                          <td>{{$i}}</td>
                          <td>{{$value->id}}</td>
                          <td>{{$vl->name}}</td>
                          <td>{{$vl->sdt}}</td>
                          <td>{{$vl->email}}</td>
                          <td>{{$vl->diachi}}</td>
                          <td>{{$value->phuongthucvanchuyen}}</td>
                          <td> {{$value->phuongthucthanhtoan}}</td>
                          <td>{{number_format($value->tongtien)}}</td>
                          <td>
                            <form action="giaohang/{{$value->id}}" method="POST">
                              <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <button type="submit" style="border:2px solid rgb(54, 221, 54);border-radius:3px;"><img src="https://img.icons8.com/emoji/20/000000/check-mark-emoji.png"/></button>
                          </form>
                          </td>
                          <td>
                            <form action="huydonhang/{{$value->id}}" method="POST">
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
            <table class="table table-hover" style="width:90%;">
                <thead>
                  <tr><th></th><th>#</th><th>Mã đơn hàng</th><th>Tên khách hàng</th><th>SĐT</th><TH>Email</TH><th>Địa chỉ</th><th >Phương thức vận chuyển</th><th >Phương thức thanh toán</th><th >Tổng tiền</th><th>Trạng thái </th><th>Xóa</th></tr>

                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($hoadondagiao as $value)
                    @foreach ($arr_khachhang as $vl)
                    @if ($vl['id'] == $value['id_khachhang'])
                    <tr><td><a href="chitiet-donhang/{{$value->id}}"><img src="https://img.icons8.com/color/30/000000/opened-folder.png"/></a></td>
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
                      <td>
                            <form action="huydonhang/{{$value->id}}" method="POST">
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
          </div>
          <div id="menu2" class="container tab-pane fade"><br>
            <table class="table table-hover" style="width:90%;">
                <thead>
                  <tr><th></th><th>#</th><th>Mã đơn hàng</th><th>Tên khách hàng</th><th>SĐT</th><TH>Email</TH><th>Địa chỉ</th><th >Phương thức vận chuyển</th><th >Phương thức thanh toán</th><th >Tổng tiền</th><th>Trạng thái </th><th>Xóa</th></tr>

                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($hoadonbihuy as $value)
                    @foreach ($arr_khachhang as $vl)
                    @if ($vl['id'] == $value['id_khachhang'])
                    <tr><td><a href="chitiet-donhang/{{$value->id}}"><img src="https://img.icons8.com/color/30/000000/opened-folder.png"/></a></td>
                      <td>{{$i}}</td>
                      <td>{{$value->id}}</td>
                      <td>{{$vl->name}}</td>
                      <td>{{$vl->sdt}}</td>
                      <td>{{$vl->email}}</td>
                      <td>{{$vl->diachi}}</td>
                      <td>{{$value->phuongthucvanchuyen}}</td>
                      <td> {{$value->phuongthucthanhtoan}}</td>
                      <td>{{number_format($value->tongtien)}}</td>
                      <td>Hủy đơn</td>
                      <td>
                            <form action="huydonhang/{{$value->id}}" method="POST">
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
          </div>
        </div>
      </div>
      
</div>

@endsection
