@extends('admin.layout.index')

@section('noidung')
<div class="div2">
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Tin tức >> Sửa</span> </p>    
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
    <form action="sua-tintuc/{{$tintuc->id}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <fieldset style="height:850px;">
            <legend><h2 style="color:grey;">TIN TỨC:</h2></legend>
            <select style="width:58%;" name="loaitin" id="">
            @foreach($loaitin as $ls)
                    <option 
                    @if($tintuc->loaitin->id==$ls->id)
                    {{"selected"}}
                    @endif
                    value="{{$ls->id}}">{{$ls->tenloaitin}}</option>
                @endforeach
            </select><br>
            <label for="">Tiêu đề:</label><br>
            <input type="text" name="tieude" id="" value="{{$tintuc->tieude}}"><br>
            <label for="">Nội dung :</label><br>
            <textarea name="noidung"  cols="30" rows="10">{{$tintuc->noidung}}</textarea><br>
            <label for="">Nổi bật:</label><br>
            <label for="">
                <input type="radio" name="noibat" value="0"@if($tintuc->noibat == "0") {{"checked"}}@endif>Không
            </label>
            <label for="">
                <input type="radio" name="noibat" value="1"@if($tintuc->noibat == "1") {{"checked"}}@endif >Có
            </label><br><br>
            <label for="">Ảnh bìa: </label><br>
            <img style="margin-left:20%;width:250px;" src="admin_asset/img/tintuc/{{$tintuc->anh}}" alt=""><br>
            <input style="margin-left:18%;" type="file" name="anh"><br>
            <input type="submit" value="Sửa">
        </fieldset>
    </form>
</div>

@endsection