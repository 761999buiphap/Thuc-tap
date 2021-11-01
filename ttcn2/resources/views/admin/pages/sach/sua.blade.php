@extends('admin.layout.index')

@section('noidung')
<div class="div2">
    <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Sách >> Sửa</span> </p>    
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
    <form action="sua-sach/{{$sach->id}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
        <fieldset >
            <legend><h2 style="color:grey;">Sửa thông tin sách:</h2></legend>
            <label for="">Loại sách: </label><br>
            <select style="width:58%;" name="loaisach" id="">
                @foreach($loaisach as $ls)
                    <option 
                    @if($sach->loaisach->id==$ls->id)
                    {{"selected"}}
                    @endif
                    value="{{$ls->id}}">{{$ls->ten}}</option>
                @endforeach
            </select><br>
            <label for="">Tên sách:</label><br>
            <input type="text" name="ten" id="" value="{{$sach->tensach}}"><br>
            <label for="">Nhà xuất bản:</label><br>
            <input type="text" name="nxb"value="{{$sach->nxb}}"><br>
            <label for="">Năm xuất bản:</label><br>
            <input type="text" name="nam"value="{{$sach->nam}}"><br>
            <label for="">Tác giả: </label><br>
            <input type="text" name="tacgia" id=""value="{{$sach->tacgia}}"><br>
            <label for="">Mô tả: </label><br>
            <textarea name="mota" id="">{{$sach->mota}}</textarea><br>
            <label for="">Gía: </label><br>
            <input type="text" name="gia" value="{{$sach->gia}}"><br>
            <label for="">Số lượng: </label><br>
            <input type="text" name="soluong" value="{{$sach->soluong}}"><br>
            <label for="">Khuyến mại: </label><br>
            <input type="text" name="khuyenmai" id="" value="{{$sach->khuyenmai}}"><br>
            <label for="">Ảnh: </label>
            <img style="width:250px;height:180px" src="admin_asset/img/{{$sach->anh}}" alt="">
            <input type="file" name="anh"><br><br>
           <input type="submit" value="Sửa">
        </fieldset>
    </form>
</div>
@endsection