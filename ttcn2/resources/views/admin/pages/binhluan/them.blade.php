@extends('admin.layout.index')

@section('noidung')
<div class="div2">
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Bình luận >> Thêm</span> </p>    
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

<div class="suasach" >
    <form action="them-binhluan" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <fieldset style="height:550px;">
            <legend><h2 style="color:grey;">Sách:</h2></legend>
            <label for="">Tên sách:</label><br>
            <select style="width:58%;" name="sach" id="">
            @foreach($sach as $s)
                    <option value="{{$s->id}}">{{$s->tensach}}</option>
                @endforeach
            </select><br>
            <label for="">Nội dung:</label><br>
            <input type="text" name="noidung" id="" value=""><br>
            <label for="">users :</label><br>
            <select style="width:58%;" name="user" id="">
                @foreach($user as $u)
                        <option value="{{$u->id}}">{{$u->name}}</option>
                    @endforeach
                </select><br>
            <input type="submit" value="Sửa">
        </fieldset>
    </form>
</div>

@endsection