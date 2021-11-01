@extends('admin.layout.index')

@section('noidung')
<div class="div2">
        <form style="margin-top:14px;" class="div2form" method="POST" action="tk-slide">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input style="width:170px;" type="text" name="tukhoa" @if(isset($tukhoa)) value="{{$tukhoa}}" @endif placeholder="Nhập vào từ khóa">
            <button style="background-color: #E67E22;border:none;border-radius:3px;color:white;padding:6px;margin-top:3px;" type="submit" ><img src="https://img.icons8.com/pastel-glyph/15/ffffff/search--v1.png"/> Lọc tìm</button>

        </form>
        <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Slide</span> </p>
        <a href="them-slide" id="themloaisach" style="position:absolute;top:0px;left:20%;">+ Thêm mới</a>
        
        </div>
        @if(isset($tukhoa))
        <div style="padding:10px;background-color:pink;">
            <span >Từ khóa tìm kiếm:</span><i style="color:red;font-size:20px;">" {{$tukhoa}} "</i>
        </div>
        @endif
    <div class="slide-body">
            @if(session('thongbao'))
            <div class="noterr">
                {{session('thongbao')}}
            </div>
             @endif
            <table>
                <tr><th>ID</th><th>Ảnh</th><th >Nội dung</th><th >link</th><th >Trạng thái trình chiếu</th><th>Xóa</th><th>Sửa</th></tr>
                @foreach($slide as $sl)
                    <tr><td>{{$sl->id}}</td><td><img style="width: 150px;height:70px;" src="admin_asset/img/slide/{{$sl->anh}}" alt=""></td><td><textarea cols="32"> {{$sl->noidung}}</textarea></td><td>{{$sl->link}}</td><td>{{$sl->trangthai}}</td><td>  <a class="xoa-sua" href="xoa-slide/{{$sl->id}}"><img src="https://img.icons8.com/fluent/22/000000/delete-forever.png"/></a></td><td>  <a class="xoa-sua" href="sua-slide/{{$sl->id}}"><img src="https://img.icons8.com/color/22/000000/edit--v3.png"/></a></td></tr>

                @endforeach
                
            </table>
            <div style="position:absolute;top:95%;left:80%;" class="pagination">
        {!! $slide->links() !!}
        </div>
        </div>
        
@endsection