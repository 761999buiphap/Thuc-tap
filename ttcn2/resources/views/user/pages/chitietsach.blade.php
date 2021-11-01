@extends('user.layout.index')

@section('noidung')
<p style="padding:1%;border:1px solid #bbb;width:85%;color:green;margin-left:7%;margin-top:1%;border-radius:3px;background-color:white;height:">Trang chủ / Danh Mục / Sách : <i style="color:red;">" {{$sach->tensach}} " </i></p>
    <div class="chitietsach" style="height:800px;">
        <img src="admin_asset/img/{{$sach->anh}}" alt="">
        <div class="noidung">
            <h3 >SÁCH:<span style="color:green;"> {{$sach->tensach}}</span></h2>
            <p>Tác giả: {{$sach->tacgia}}</p>
            <p>NXB: {{$sach->nxb}}</p>
            <p>Năm xuất bản: {{$sach->nam}}</p>
            <span style="font-weight:bold;">Mô tả:</span>
            <p style="height:300px;width:90%;overflow-y: scroll;">{{$sach->mota}}</p>
            <div class="gia">
                <p style="font-size: 30px;color:red;">{{$sach->gia}}đ<p>
                <p style="font-size: 20px;color:#026e36;"><strike><i>{{$sach->khuyenmai}}</i></strike></p>
                <label style="font-weight: bold;" for="">Số lượng</label><br>
                <select name="soluong" id="" style="height:40px;">
					<?php
					for($i=1;$i<=10;$i++)
					{?>
						<option><?php echo $i; ?></option>	
					<?php } ?>					
					</select>
                @if(Auth::check())
                <button type="submit" style="text-align:center;" class="btn btn-primary"><img src="https://img.icons8.com/material-sharp/70/fa314a/shopping-cart.png"/></button>
                @else
                    <button type="button" style="text-align:center;"  class="btn btn-primary" data-toggle="modal" data-target="#myModal"><img src="https://img.icons8.com/material-sharp/70/fa314a/shopping-cart.png"/></button>					
                @endif
            </div>
            <div class="camket">
                <h4>Dịch vụ của chúng tôi</h4>
				<img style="width:30px;" src="https://img.icons8.com/wired/64/000000/delivery.png"/><p style="margin-top: 10%;">Giao tận nhà trong 3 - 7 ngày làm việc.</p>
				<img style="width: 30px;" src="https://img.icons8.com/ios-filled/50/000000/star--v2.png"/><p style="margin-top: 8%;">Miễn phí giao hàng Toàn Quốc cho đơn hàng trên 300k.</p>
            </div>
               
			</div>
        </div>
        <div style="padding-left:7%;width:85%;height:700px;margin-left:100px;background-color:white;">
            <label for="" style="font-weight:bold;">Bình luận: </label>
            <?php
            
             if(isset(Auth::user()->id)){ ?>
            <form action="thembinhluan/{{Auth::user()->id}}" method="POST">
                <input type="hidden" name="idsach" id="idsach" value="{{$sach->id}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <img style="width:4%;" src="admin_asset/img/user/{{$u}}"/>
                <input type="text" name="noidung" style="width:90%;border:1px solid #ccc;padding:10px;"><br>
                <input style=" background-color:rgb(25, 140, 175);color:white;border:none;padding: 5px;margin:1% 0px 5% 85%;" type="submit" value="Bình luận">
            </form>
            <?php } ?>
            <?php 
             $arr_users = [];
            foreach($users as $value)
            {
                $arr_users[$value->id] = $value->anh;
            }
                foreach ($binhluan as $value) {
                    $anh=$arr_users[$value->id_users];?>
                    <div style="margin-top:1%;"><img style="width:4%;" src="admin_asset/img/user/{{$anh}}" alt="">
                    <span style="margin-left:3%;">{{$value->noidung}}</span></div><br>
                <?php }
            ?>     
             <div style="margin-top:3%;margin-left:80%;" class="container">
                {!! $binhluan->links() !!}
                </div>
            </div>
           
       
        </div>
    
    </div>
    <div class="modal" id="myModal">
    <div class="div-body" style="height:70%;margin-top:7%;">
        <h2  style="color:white;">ĐĂNG NHẬP</h2>
        <form action="dangnhap" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <input class="ten" type="text" name="email" placeholder="Email">
            <input class="matkhau" type="text" name="password" placeholder="Password">
            <input style="width:65%;" type="submit" value="Đăng nhập">
            <h4><a  style="color:white;" href="">Bạn chưa có tài khoản ?</a></h4>
        </form>
  </div>
</div>
@endsection