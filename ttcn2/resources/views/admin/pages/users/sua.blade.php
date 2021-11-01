
@extends('admin.layout.index')

@section('noidung')
<div class="div2">
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Tài khoản >> Sửa</span> </p>    
</div>
    @if(count($errors) > 0)
            @foreach($errors->all() as $err)
                <div class="err">
                    {{$err}}<br>
                </div>
            @endforeach
        @endif
        @if(session('thongbao'))
            <div class="noterr">
                {{session('thongbao')}}
            </div>
@endif

<div class="themslide">
    <form action="sua-user/{{$user->id}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <fieldset style="height:880px;">
            <legend><h2 style="color:grey;">Thêm user:</h2></legend>
            <label for="">Quyền đăng nhập:</label><br>
            <label for="">
                <input type="radio" name="quyen" value="user" @if($user->quyen == "user") {{"checked"}}@endif>User
            </label>
            <label for="">
                <input type="radio" name="quyen" value="admin" @if($user->quyen == "admin") {{"checked"}}@endif>Admin
            </label><br><br>
            <label for="">Ảnh bìa: </label><br>
            <img style="margin-left:20%;width:200px;" src="admin_asset/img/user/{{$user->anh}}" alt=""><br>
            <input style="margin-left:18%;" type="file" name="anh"><br>
            <label for="">Tên:</label><br>
            <input type="text" name="name" id="" placeholder="Nhập vào tên" value="{{$user->name}}"><br>
            <label for="">Email:</label><br>
            <input type="text" name="email" id="" placeholder="Nhập vào email" value="{{$user->email}}" readonly=""><br>
            <label  for="">Password :</label><br>
            <input type="password" name="password" placeholder="********"  class="password" ><br>
            <label for="">Nhập lại password :</label><br>
            <input type="password" name="password1" placeholder="********"  class="password"><br>
            <input type="submit" value="Sửa">
        </fieldset>
        
    </form>

</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#check").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection