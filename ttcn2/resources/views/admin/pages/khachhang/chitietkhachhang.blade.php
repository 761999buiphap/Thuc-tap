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
      label{
        font-weight: bold;
      }
  </style>

  <div class="div2" style="margin-top:1%;padding:3px 0;">
    <form style="margin-top:3px;margin-left:73%;" class="div2form" method="POST" action="tk-slide">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <input style="width:170px;height:27px;" type="text" name="tukhoa" @if(isset($tukhoa)) value="{{$tukhoa}}" @endif placeholder="Nhập vào từ khóa">
        <button style="background-color: #E67E22;border:none;font-size:13px;border-radius:3px;color:white;padding:5px;margin-top:3px;" type="submit" ><img src="https://img.icons8.com/pastel-glyph/15/ffffff/search--v1.png"/> Lọc tìm</button>

    </form>
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Hồ sơ bệnh nhân</span> </p>
    <a href="them-slide" id="themloaisach" style="position:absolute;top:0px;left:20%;font-size:13px;height:30px;">+ Thêm mới</a>
    
    </div>
    @if(isset($tukhoa))
    <div style="padding:10px;background-color:pink;">
        <span >Từ khóa tìm kiếm:</span><i style="color:red;font-size:20px;">" {{$tukhoa}} "</i>
    </div>
    @endif
<div class="slide-body" style="height: 750px;">
    <div class="container" style="margin-left:3%;">
    <h6 style="padding-top:2% ;color:rgb(25, 128, 197);font-weight:bold;"><img src="https://img.icons8.com/fluent/25/000000/opened-folder.png"/>THÔNG TIN KHÁCH HÀNG</h6>        
<br>
        <!-- thong tin-->
          @foreach ($khachhang as $vl )
            <div class="row" style="font-size:14px;color:grey;">
            <div class="col-md-4" >
              <label for="">Mã khách hàng :</label>  {{$vl->id}}
            </div>
            <div class="col-md-4">
              <label for="">Tên khách hàng :</label>  {{$vl->name}}
            </div>
            <div class="col-md-4">
              <label for="">Giói tính:</label>  {{$vl->gioitinh}}
            </div>
            <div class="col-md-4">
              <label for="">Số điện thoại:</label>  {{$vl->sdt}}
            </div>
            <div class="col-md-4">
              <label for="">Email :</label>  {{$vl->email}}
            </div>
            <div class="col-md-4">
              <label for="">Địa chỉ :</label>  {{$vl->diachi}}
            </div>
          
          </div>
        @endforeach
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Danh sách đơn hàng</a>
          </li>
        </ul>
      
        <!-- Tab panes -->
        <div class="tab-content">
          <div id="home" class="container tab-pane active"><br>
            <table class="table table-hover" style="width: 87%;">
                <thead>
                <tr><th></th><th>#</th><th>Mã đơn hàng</th><th>Tên khách hàng</th><th>SĐT</th><TH>Email</TH><th>Địa chỉ</th><th >Phương thức vận chuyển</th><th >Phương thức thanh toán</th><th >Tổng tiền</th><th>Trạng thái </th></tr>
                </thead>
                <tbody>
                  <tr>
                    <?php $i=1;
                    foreach ($hoadon as $value) {
                      ?>
                        <tr>
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
                      @if($value->trangthai == 1)
                        <td>Giao hàng</td>
                      @elseif($value->trangthai == 0)
                      <td>Giao hàng</td>
                      @else
                      <td>Giao hàng</td>
                      @endif
                        </tr>
                    <?php $i++; }?>
                  
                  </tr>

                 
                </tbody>
              </table>
              
          </div>
       
        </div>
      </div>
      
</div>

@endsection
