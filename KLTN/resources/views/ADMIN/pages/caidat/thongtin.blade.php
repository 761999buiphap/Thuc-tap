@extends('ADMIN.layout.index')

@section('noidung')
<div class="container-fluid" style="background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);">
<h5 style="padding: 5px;"><span style="color: white;margin-left: 3px;">DANH MỤC QUẢN LÝ » </span> <i style="color: #fed000;">Cài đặt</i></h5>
</div>
<div class="container-fluid" style="padding:1% 3%;">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home"><h4 class="fa fa-graduation-cap"> THÔNG TIN CÁ NHÂN</h4></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1"><h4 class=" fa fa-wrench"> BẢO MẬT</h4></a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active" ><br>
      @foreach($user as $value)
      <div  style="border:2px solid #f2f2f2;background-color:#EF5350;width:90%;margin-left:5%;color:white;">
      <div class="row" style="padding:5%;">
          <div class="col-md-4">
          <img src="../admin/img/user/{{$value->anh}}" alt="" style="width:80%;border:2px solid #f5f5f5;border-radius:5px;">
          </div>
          <div class="col-md-8">
          <h4><label for="" style="color:black;">Tên tài khoản:</label> {{$value->name}}</h4>
          <h4><label for="" style="color:black;">Email:</label> {{$value->email}}</h4>
          <h4><label for="" style="color:black;">Trạng thái:</label> {{$value->trangthai}}</h4>
          <h4><label for="" style="color:black;">Quyền đăng nhập:</label> Admin</h4>
          </div>
      </div>
      </div>
      @endforeach
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
    <div  style="border:2px solid #f2f2f2;background-color:#EF5350;width:70%;margin-left:15%;">
    <form action="doimatkhau/{{Auth::user()->id}}" style="padding:5%;" class="form-group" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />    
        <h4 style="color:white;">Đổi mật khẩu*</h4>
        <label for="" style="margin-top:3%;color:white;">Mật khẩu mới: </label>
        <input class="form-control" type="password" name="mk1" placeholder="Nhập vào mật khẩu mới">
        <label for="" style="margin-top:3%;color:white;">Xác nhận lại mật khẩu mới: </label>
        <input class="form-control" type="password" name="mk2" placeholder="Xác nhận lại mật khẩu mới">
        <input class="form-control" style="width:20%;background-color:white;color:#EF5350;margin-left:40%;margin-top:5%;font-weight:bold;border-radius:5px;" type="submit" value="Xác nhận">
    </form>
    </div>
    </div>
  </div>
</div>
  @if(count($errors) > 0)
    <?php foreach($errors->all() as $err){ ?>
    <div class="alert alert-danger alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:2%;width:25%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{$err}}
    </div>
    <?php } ?>
    @endif  
@endsection