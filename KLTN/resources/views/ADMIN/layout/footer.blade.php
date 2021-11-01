@if(session('thongbao'))
    <div class="alert alert-success alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:0;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{session('thongbao')}}
  </div>
@endif