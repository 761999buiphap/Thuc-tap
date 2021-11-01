@extends('admin.layout.index')

@section('noidung')
<div class="div2">
        
        <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Bình luận</span> </p>
        <a href="them-binhluan" id="themloaisach" style="position:absolute;top:0px;left:20%;">+ Thêm mới</a>
        
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
            <table >
                <tr ><th>ID</th><th style="width:30%;">Nội dung</th><th style="width:25%;">Sách</th><th style="height: 30px;width:25%;">user</th><th>Xóa</th><th>Sửa</th></tr>
                @foreach($binhluan as $bl)
                    <tr><td>{{$bl->id}}</td><td><textarea cols="44"> {{$bl->noidung}}</textarea></td><td>{{$arr_sach[$bl->id_sach]}}</td><td>{{$arr_users[$bl->id_users]}}</td><td>  <a class="xoa-sua" href="xoa-binhluan/{{$bl->id}}"><img src="https://img.icons8.com/fluent/22/000000/delete-forever.png"/></a></td><td>  <a  href="sua-binhluan/{{$bl->id}}"><img src="https://img.icons8.com/color/22/000000/edit--v3.png"/></a></td></tr>

                @endforeach
                
            </table>
        </div>
@endsection