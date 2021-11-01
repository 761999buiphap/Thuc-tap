@extends('admin.layout.index')

@section('noidung')
<div class="div2">
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Slide >> Thêm</span> </p>    
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
    <form action="them-slide" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <fieldset>
            <legend><h2 style="color:grey;">Thêm slide:</h2></legend>
            <label for="">Ảnh:</label><br>
            <input type="file" name="anh"><br>
            <label for="">Link :</label><br>
            <input type="text" name="link" placeholder="Tên đường link"><br>
            <label for="">Nội dung :</label><br>
            <input type="text" name="noidung" placeholder="Tên nội dung"><br>
            <label for="">Trạng thái trình chiếu :</label><br>
            <label for="">
                <input type="radio" name="trangthai" value="không" checked="">Không
            </label>
            <label for="">
                <input type="radio" name="trangthai" value="có" >Có
            </label><br><br>
            <input type="submit" value="Thêm">
        </fieldset>
    </form>
</div>
    
@endsection