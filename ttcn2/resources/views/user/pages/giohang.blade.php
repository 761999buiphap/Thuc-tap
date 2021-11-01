@extends('user.layout.index')

@section('noidung')
		@if(session('thongbao'))
            <div class="noterr">
                {{session('thongbao')}}
            </div>
        @endif
<!--body-->
<div class="thongtingiohang">
	<h1> <img src="https://img.icons8.com/emoji/48/000000/shopping-cart-emoji.png"/> Giỏ hàng</h1>
	<hr><br><br>
	<div style="height: 60%;overflow:scroll;">
		<table class="table-giohang">
			<tr ><td >STT</td><td>Ảnh</td><td>Sản phẩm</td><td>Gía</td><td>Số lượng</td><td>Tổng tiền</td><td >Xóa</td><td>Sửa</td></tr>
			<?php $i=1; $tong=0;?>
			@foreach($giohang as $gh)
				@foreach($sach[$i] as $s)
				<tr>
					<td>{{$i}}</td>
					<td><img style="width:70px;height:70px;margin:3px 0;" src="admin_asset/img/{{$s->anh}}" alt=""></td>
					<td>{{$s->tensach}}</td>
					<td>{{number_format($s->gia)}}</td>
					<td>{{$gh->soluong}}</td>
					<td>{{number_format($gh->soluong * $s->gia)}}</td>
					<td><img src="https://img.icons8.com/fluent/22/000000/delete-forever.png"/><a class="xoa-sua" href="xoagiohang/{{$gh->id}}">Delete</a></td>
					<td><img src="https://img.icons8.com/color/22/000000/edit--v3.png"/><a class="xoa-sua" href="suagiohang/{{$gh->id}}">Edit</a></td>
				</tr>
				@endforeach
				<?php $i++; $tong=$tong+$gh->soluong * $s->gia?>
			@endforeach
		</table>
	</div>
	<div class="muahang">
		<p style="margin-left:54%">Tổng <span style="font-size:25px;color:red;">{{number_format($tong)}} đ</span></p><br>
		<a class="tieptucmuahang" href="trangchu">Tiếp tục mua hàng</a>
		<a class="thanhtoan" href="thanhtoan/{{$tong}}">Thanh toán</a>
	</div>
</div>

</form>
@endsection