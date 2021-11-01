
@extends('admin.layout.index')

@section('noidung')

<div class="sach-body">
        <div class="div2">
        <form class="div2form" action="tk-tintuc" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input style="width:170px;" type="text" name="tukhoa" @if(isset($tukhoa)) value="{{$tukhoa}}" @endif  placeholder="Nhập vào tên tin tức">
            <button style="background-color: #E67E22;border:none;border-radius:3px;color:white;padding:6px;margin-top:3px;" type="submit" ><img src="https://img.icons8.com/pastel-glyph/15/ffffff/search--v1.png"/> Lọc tìm</button>

        </form>
        <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Tin tức</span> </p>
        <a href="them-tintuc" id="themloaisach" style="position:absolute;top:0px;left:20%;">+ Thêm mới</a>
        
        </div>
        @if(isset($tukhoa))
        <div style="padding:10px;background-color:pink;">
            <span >Từ khóa tìm kiếm:</span><i style="color:red;font-size:20px;">" {{$tukhoa}} "</i>
        </div>
        @endif
        <div class="sach-body-danhmuc">
            <p class="p">DANH MỤC LOẠI TIN</p>
            @foreach($loaitin as $ls)
                <p class="p1"><a style="text-decoration:none;color:black;" href="danhsach-tintuc/{{$ls->id}}" >{{$ls->tenloaitin}}</a></p>
            @endforeach
		</div>
        <div class="sach-body-sanpham">
            @if(session('thongbao'))
            <div class="noterr">
                {{session('thongbao')}}
            </div>
             @endif
             <table>
                <tr><th>ID</th><th>Ảnh bìa</th><th style="width:160px;">Tiêu đề</th><th>Nội dung</th><th>Nổi bật</th><th>Thời gian</th><th>Xóa</th><th>Sửa</th></tr>
                @foreach($tintuc as $tt)
                    <tr><td>{{$tt->id}}</td><td><img style="width: 150px;height:70px;" src="admin_asset/img/tintuc/{{$tt->anh}}" alt=""></td><td>{{$tt->tieude}}</td><td><textarea cols="30px;" rows="4">{{$tt->noidung}}</textarea></td><td>{{$tt->noibat}}</td><td>{{$tt->created_at}}</td><td><a href="xoa-tintuc/{{$tt->id}}"><img src="https://img.icons8.com/fluent/22/000000/delete-forever.png"/></a></td><td><a  href="sua-tintuc/{{$tt->id}}"><img src="https://img.icons8.com/color/22/000000/edit--v3.png"/></a></td></tr>
                @endforeach
               
            </table>
            
        </div>
        <div style="position:absolute;top:1000px;left:80%;" class="pagination">
        {!! $tintuc->links() !!}
        </div>
	</div>
@endsection