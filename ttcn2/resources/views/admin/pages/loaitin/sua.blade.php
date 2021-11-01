@extends('admin.layout.index')

@section('noidung')
<div class="div2">
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Loại tin >> Sửa</span> </p>    
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

    <div class="sualoaisach">
    <form action="sua-loaitin/{{$loaitin->id}}" method="get">    
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <fieldset>
            <legend><h2 style="color:grey;">Sửa loại tin:</h2></legend>
            <label for="">Tên loại tin :</label><br>
            <input type="text" name="ten" value="{{$loaitin->tenloaitin}}"><br>
            <input type="submit" value="Sửa">
        </fieldset>
    </form>
</div>
@endsection