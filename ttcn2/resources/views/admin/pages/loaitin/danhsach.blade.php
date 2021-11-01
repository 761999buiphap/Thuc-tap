@extends('admin.layout.index')

@section('noidung')
    <div id="nen">

    </div>
    <div id="divthemloaisach">
        <button id="close" style="background-color:#E67E22;color:white;padding:5px;">[ X close ]</button>
        <hr>
        <form action="them-loaitin" method="post"><br><br>
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <label for="" class="lable" >Tên loại tin:</label><br><br>
            <input type="text" name="ten"><br><br>
            <input type="submit" name="" id="" value="Thêm">
        </form>
    </div>
   
    <div class="div2">
        <form class="div2form" action="tk-loaitin" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input style="" type="text" name="tukhoa"  @if(isset($tukhoa)) value="{{$tukhoa}}" @endif placeholder="Nhập vào tên loại tin">
            <button style="background-color: #E67E22;border:none;border-radius:3px;color:white;padding:6px;margin-top:3px;" type="submit" ><img src="https://img.icons8.com/pastel-glyph/15/ffffff/search--v1.png"/> Lọc tìm</button>

        </form>
        <p style="color:white;margin-left:1%;">DỮ LIỆU >> <span style="color:yellow;">Tin tức</span> </p>
        <button id="themloaisach1" >+ Thêm mới</button>
        
        
    </div>
    @if(isset($tukhoa))
        <div style="padding:10px;background-color:pink;">
            <span >Từ khóa tìm kiếm:</span><i style="color:red;font-size:20px;">" {{$tukhoa}} "</i>
        </div>
    @endif
    <div class="bodythemloaisach">
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
        
        <table>
            <tr><th>ID</th><th style="width:650px;">Tên loại tin</th><th>Xóa</th><th>Sửa</th></tr>
            @foreach($loaitin as $ls)
                    <tr><td>{{$ls->id}}</td><td>{{$ls->tenloaitin}}</td><td><a href="xoa-loaitin/{{$ls->id}}"><img src="https://img.icons8.com/fluent/22/000000/delete-forever.png"/></a></td><td><a  href="sua-loaitin/{{$ls->id}}"><img src="https://img.icons8.com/color/22/000000/edit--v3.png"/></a></td></tr>

            @endforeach
        </table>
    </div>
    <script>
		document.getElementById("themloaisach1").addEventListener("click",tls);
		document.getElementById("close").addEventListener("click",dong);
		document.getElementById("edit").addEventListener("click",tls);
		function tls(){
			document.getElementById("divthemloaisach").style.display = "block";
			document.getElementById("nen").style.display = "block";
			
		}
		function dong(){
			document.getElementById("divthemloaisach").style.display = "none";
			document.getElementById("nen").style.display = "none";
		}
	</script>
@endsection