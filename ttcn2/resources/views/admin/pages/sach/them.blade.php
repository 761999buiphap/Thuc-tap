@extends('admin.layout.index')

@section('noidung')
<div class="div2">
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Sách >> Thêm</span> </p>    
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

<div class="themsach">
    <form action="them-sach" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <fieldset>
            <legend><h2 style="color:grey;">Thêm thông tin sách:</h2></legend>
            <label for="">Loại sách: </label><br>
            <select style="width:58%;" name="loaisach" id="">
                @foreach($loaisach as $ls)
                    <option value="{{$ls->id}}">{{$ls->ten}}</option>
                @endforeach
            </select><br>
            <label for="">Tên sách:</label><br>
            <input type="text" name="ten" id=""><br>
            <label for="">Nhà xuất bản:</label><br>
            <input type="text" name="nxb"><br>
            <label for="">Năm xuất bản:</label><br>
            <input type="text" name="nam"><br>
            <label for="">Tác giả: </label><br>
            <input type="text" name="tacgia" id=""><br>
            <label for="">Mô tả: </label><br>
            <input type="text" name="mota" id=""><br>
            <label for="">Gía: </label><br>
            <input type="text" name="gia"><br>
            <label for="">Số lượng: </label><br>
            <input type="text" name="soluong"><br>
            <label for="">Khuyến mại: </label><br>
            <input type="text" name="khuyenmai" id=""><br>
            <label for="">Ảnh: </label>
            <input type="file" name="anh"><br><br>
           <input type="submit" value="Thêm">
        </fieldset>
    </form>
</div>

@endsection