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
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Khách hàng</span> </p>
    
    </div>
    @if(isset($tukhoa))
    <div style="padding:10px;background-color:pink;">
        <span >Từ khóa tìm kiếm:</span><i style="color:red;font-size:20px;">" {{$tukhoa}} "</i>
    </div>
    @endif
<div class="slide-body" style="height:1200px;">
<h5 style="padding-left:5%;padding-top:2%;">DANH SÁCH KHÁCH HÀNG</h5>
<table class="table table-hover" style="width:90%;margin-left:5%;">
                <thead>
                    <tr><th></th><th>#</th><th>Mã khách hàng</th><th>Tên khách hàng</th><th>Giới tính</th><th>SĐT</th><TH>Email</TH><th>Địa chỉ</th></tr>

                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($khachhang as $vl)
                        <tr><td><a href="chitietkhachhang/{{$vl->id}}"><img src="https://img.icons8.com/color/30/000000/opened-folder.png"/></a></td>
                          <td>{{$i}}</td>
                          <td>{{$vl->id}}</td>
                          <td>{{$vl->name}}</td>
                          <td>{{$vl->gioitinh}}</td>
                          <td>{{$vl->sdt}}</td>
                          <td>{{$vl->email}}</td>
                          <td>{{$vl->diachi}}</td>
                        <?php $i++; ?>
                    @endforeach
                </tbody>
              </table>
        
             
</div>

@endsection
