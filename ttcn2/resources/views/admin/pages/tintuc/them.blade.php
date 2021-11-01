@extends('admin.layout.index')

@section('noidung')
<div class="div2">
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Tin tức >> Thêm</span> </p>    
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

<div class="suasach">
    <form action="them-tintuc" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <fieldset style="height:700px;">
            <legend><h2 style="color:grey;">TIN TỨC:</h2></legend>
            <label for="">Loại tin: </label><br>
            <select style="width:58%;" name="loaitin" id="">
                @foreach($loaitin as $lt)
                    <option value="{{$lt->id}}">{{$lt->tenloaitin}}</option>
                @endforeach
            </select><br>
            <label for="">Tiêu đề:</label><br>
            <input type="text" name="tieude" id=""><br>
            <label for="">Nội dung :</label><br>
            <textarea name="noidung"  cols="30" rows="10"></textarea><br>
            <label for="">Nổi bật:</label><br>
            <label for="">
                <input type="radio" name="noibat" value="0" checked="">Không
            </label>
            <label for="">
                <input type="radio" name="noibat" value="1" >Có
            </label><br><br>
            <label for="">Ảnh bìa: </label><br>
            <input style="margin-left:18%;" type="file" name="anh"><br>
            <input type="submit">
        </fieldset>
    </form>
</div>

@endsection