@extends('admin.layout.index')

@section('noidung')
<div class="div2">
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Comment >> Sửa</span> </p>    
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


<div class="themslide" >
    <form action="sua-slide/{{$slide->id}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <fieldset style="height:600px;">
            <legend><h2 style="color:grey;">Thêm comment:</h2></legend>
            <label for="">Ảnh:</label><br>
            <img style="margin-left:20%;width:250px;height:180px" src="admin_asset/img/slide/{{$slide->anh}}" alt="">
            <input type="file" name="anh"><br>
            <label for="">Link :</label><br>
            <input type="text" name="link" placeholder="Tên đường link" value="{{$slide->link}}"><br>
            <label for="">Nội dung :</label><br>
            <input type="text" name="noidung" placeholder="Tên nội dung" value="{{$slide->noidung}}"><br>
            <label for="">
                <input type="radio" name="trangthai" value="không" @if($slide->trangthai == "không") {{"checked"}}@endif>Không
            </label>
            <label for="">
                <input type="radio" name="trangthai" value="có" @if($slide->trangthai == "có") {{"checked"}}@endif>Có
            </label><br><br>
            <input type="submit" value="Sửa">
        </fieldset>
    </form>
</div>
    
@endsection