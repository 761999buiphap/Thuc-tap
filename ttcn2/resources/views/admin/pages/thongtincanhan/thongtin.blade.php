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
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">tài khoản</span> </p>
    
    </div>
    @if(isset($tukhoa))
    <div style="padding:10px;background-color:pink;">
        <span >Từ khóa tìm kiếm:</span><i style="color:red;font-size:20px;">" {{$tukhoa}} "</i>
    </div>
    @endif
<div class="slide-body" style="height: 900px;">
    <div class="container" style="margin-left:3%;">
    <h6 style="padding-top:2% ;color:rgb(25, 128, 197);font-weight:bold;"><img src="https://img.icons8.com/fluent/25/000000/opened-folder.png"/>THÔNG TIN TÀI KHOẢN</h6>        
<br>
        <!-- thong tin-->
          @foreach ($user as $vl )
            <img style="width:30%;padding-bottom:2%;" src="admin_asset/img/user/{{$vl->anh}}" alt="">
            <div style="float:right;" class="row" style="font-size:14px;color:grey;">
            <div class="col-md-12" >
              <label for="">Mã  :</label>  {{$vl->id}}
            </div>
            <div class="col-md-12">
              <label for="">Tên tài khoản :</label>  {{$vl->name}}
            </div>
            <div class="col-md-12">
              <label for="">Email :</label>  {{$vl->email}}
            </div>
            <div class="col-md-12">
              <label for="">Phân quyền :</label>  {{$vl->quyen}}
            </div>
            <?php $idd=$vl->id; ?>
            
          </div>
          @endforeach
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Đổi mật khẩu</a>
          </li>
        </ul>
      
        <!-- Tab panes -->
        <div class="tab-content" >
            @if(session('thongbao'))
                <div class="noterr">
                    {{session('thongbao')}}
                </div>
            @endif
            <div id="home" class="container tab-pane active"><br>
                <form style="margin-left:13%;" class="form-group" action="doimatkhau/{{$idd}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />    
                <br>
                <label  for="">Mật khẩu mới: </label>
                <input class="form-control form-control" name="mk1" type="password" placeholder="Password "> <br>
            
                <br>
                <label  for="">Nhập mật khẩu xác nhận: </label>
                <input class="form-control form-control" name="mk2" type="password" placeholder="Password ">  <br>
                
                <br>
                @if(count($errors) > 0)
                @foreach($errors->all() as $err)
                    <div style="color:red;margin-left:20%;">
                        {{$err}}<br>
                    </div>
                @endforeach
                @endif
                <input style="margin-left:50%;background-color:#E67E22;border:none;padding:5px;border-radius:5px;color:white;" type="submit" value="Xác nhận">
                </form>    
            </div>
        </div>
      </div>
      
</div>

@endsection
