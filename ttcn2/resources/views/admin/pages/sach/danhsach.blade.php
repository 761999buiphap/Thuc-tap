@extends('admin.layout.index')

@section('noidung')

    
<div class="sach-body" >
        <div class="div2">
        <form class="div2form" action="tk-sach" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input style="width:170px;border:1px solid #006832;padding:6px ;" type="text" name="tukhoa" @if(isset($tukhoa)) value="{{$tukhoa}}" @endif  placeholder="Nhập vào tên sách">
            <button style="background-color: #006832;border:none;border-radius:3px;color:white;padding:6px;margin-top:3px;" type="submit" ><img src="https://img.icons8.com/pastel-glyph/15/ffffff/search--v1.png"/> Lọc tìm</button>

        </form>
        <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Sách</span> </p>
        <a href="them-sach" id="themloaisach" style="position:absolute;top:0px;left:20%;">+ Thêm mới</a>
        
        </div>
        @if(isset($tukhoa))
        <div style="padding:10px;background-color:pink;">
            <span >Từ khóa tìm kiếm:</span><i style="color:red;font-size:20px;">" {{$tukhoa}} "</i>
        </div>
        @endif
        <div class="sach-body-danhmuc">
            <p class="p">DANH MỤC LOẠI SÁCH</p>
            @foreach($loaisach as $ls)
                <p class="p1"><a  style="text-decoration:none;color: #026e36;" href="danhsach-sach/{{$ls->id}}" >{{$ls->ten}}</a></p>
            @endforeach
		</div>
        <div class="sach-body-sanpham">
            @if(session('thongbao'))
            <div class="noterr">
                {{session('thongbao')}}
            </div>
             @endif
            <table>
                <tr><th>ID</th><th>Ảnh bìa</th><th>Tên sách</th><th>Tác giả</th><th>Mô tả</th><th>Năm xuất bản</th><th>NSB</th><th>Gía</th><th>Khuyến mại</th><th>Số lượng kho</th><th style="width:50px;">Xóa</th><th>Sửa</th></tr>
                @foreach($sach as $s)
                    <tr><td>{{$s->id}}</td><td><img style="width: 50px;" src="admin_asset/img/{{$s->anh}}" alt=""></td><td>{{$s->tensach}}</td><td>{{$s->tacgia}}</td><td><textarea name="" id="" cols="17" rows="0">{{$s->mota}}</textarea></td><td>{{$s->nam}}</td><td>{{$s->nxb}}</td><td>{{number_format($s->gia)}}</td><td>{{number_format($s->khuyenmai)}}</td><td>{{$s->soluong}}</td><td><a  href="xoa-sach/{{$s->id}}"><img src="https://img.icons8.com/fluent/22/000000/delete-forever.png"/></a></td><td><a  href="sua-sach/{{$s->id}}"><img src="https://img.icons8.com/color/22/000000/edit--v3.png"/></a></td></tr>
                @endforeach
            </table>
            <div style="margin-left:75%;" >
            {!! $sach->links() !!}
            </div>
        </div>
        
	</div>
@endsection