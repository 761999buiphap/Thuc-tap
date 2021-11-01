@extends('user.layout.index')

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

<div class="slide-body" style="height: 750px;background-color:white;">
    <div class="container" style="margin-left:3%;">
    <h6 style="padding-top:2% ;color:rgb(25, 128, 197);font-weight:bold;"><img src="https://img.icons8.com/fluent/25/000000/opened-folder.png"/>THÔNG TIN ĐƠN HÀNG</h6>        
<br>
        <!-- thong tin-->
        @foreach ($hoadon as $value)
          @foreach ($khachhang as $vl )
            <div class="row" style="font-size:14px;color:grey;">
            <div class="col-md-4" >
              <label for="">Mã đơn hàng :</label>  {{$value->id}}
            </div>
            <div class="col-md-4">
              <label for="">Tên khách hàng :</label>  {{$vl->name}}
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
            <div class="col-md-4">
              <label for="">Phương thức vận chuyển :</label>  {{$value->phuongthucvanchuyen}}
            </div>
            <div class="col-md-4">
              <label for="">Phương thức thanh toán :</label>  {{$value->phuongthucthanhtoan}}
            </div>
            <div class="col-md-4">
              <label for="">Tổng hóa đơn :</label>  {{number_format($value->tongtien)}}
            </div>
          
          </div>
          @endforeach
        @endforeach
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Chi tiết đơn hàng</a>
          </li>
        </ul>
      
        <!-- Tab panes -->
        <div class="tab-content" >
          <div id="home" class="container tab-pane active"><br>
            <table class="table table-hover" >
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Ảnh</th>
                    <th>Tên sách</th>
                    <th>Gía</th>
                    <th>Số lượng</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php $i=1;
                    foreach ($hoadonchitiet as $value) {
                      ?>
                        <tr>
                        <td>{{$i}}</td>
                        <td><img style="width:40px;height:40px;" src="admin_asset/img/{{$sach[$value['id_sach']]['anh']}}" alt=""></td>
                        <td>{{$sach[$value['id_sach']]['tensach']}}</td>
                        <td>{{number_format($sach[$value['id_sach']]['gia'])}}</td>
                        <td>{{$value->soluong}}</td>
                        </tr>
                    <?php $i++; }?>
                  
                  </tr>

                 
                </tbody>
              </table>
              
          </div>
          <div style="margin-top:35%;margin-left:96%;" >
            {!! $hoadonchitiet->links() !!}
            </div>
          
        </div>
      </div>
      
</div>

@endsection
