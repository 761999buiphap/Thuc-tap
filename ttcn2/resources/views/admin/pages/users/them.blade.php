
@extends('admin.layout.index')

@section('noidung')
<div class="div2">
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Tài khoản >> Thêm</span> </p>    
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
    <form action="them-user" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <fieldset style="height:700px;">
            <legend><h2 style="color:grey;">Thêm user:</h2></legend>
            <label for="">Quyền đăng nhập:</label><br>
            <label for="">
                <input type="radio" name="quyen" value="user" checked="">User
            </label>
            <label for="">
                <input type="radio" name="quyen" value="admin" >Admin
            </label><br><br>
            <label for="">Ảnh bìa: </label><br>
            <input style="margin-left:18%;" type="file" name="anh"><br>
            <label for="">Tên:</label><br>
            <input type="text" name="name" id="" placeholder="Nhập vào tên"><br>
            <label for="">Email:</label><br>
            <input type="text" name="email" id="" placeholder="Nhập vào email"><br>
            <label for="">Số điện thoại:</label><br>
            <input type="text" name="sdt" id="" placeholder="Nhập vào số điện thoại"><br>
            <label for="">Password :</label><br>
            <input type="password" name="password" placeholder="******"><br>
            <label for="">Nhập lại password :</label><br>
            <input type="password" name="password1" placeholder="******"><br>
            <input type="submit" value="Thêm">
        </fieldset>
        
    </form>

</div>
@endsection