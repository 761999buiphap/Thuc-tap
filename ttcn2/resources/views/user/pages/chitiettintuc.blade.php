
@extends('user.layout.index')

@section('noidung')
<div style=";width:100%;height:1200px;">
<p style="padding:1%;background-color:white;border:1px solid #bbb;width:64%;color:green;margin-left:7%;margin-top:1%;border-radius:3px;">Trang chủ / Tin tức / @foreach($tintuc as $tt){{$tt->tieude}} @endforeach</p>
    <div class="trangtintuc">
    @foreach($tintuc as $tt)
        <div >
            <h4 style="width:800px;">{{$tt->tieude}}</h4><br>
            <img style="width:600px;height: 300px; margin-left:50%;" src="admin_asset/img/tintuc/{{$tt->anh}}" alt=""><br><br>
            <p style="width:800px;height:500px;overflow: scroll;">{{$tt->noidung}}</p>
        </div>
    @endforeach
	</div>
    <div style="position:absolute;top:24%;right:5%;height:800px;" class="body-danhmuc-tintuc">
        <p class="p">DANH MỤC TIN TỨC</p>
        @foreach($loaitin as $lt)
            <a style="text-decoration:none;" href="tintuc/{{$lt->id}}"><p class="p1">{{$lt->tenloaitin}}</p></a>
        @endforeach
        <p style="margin-top:40px;" class="p">BÀI VIẾT MỚI NHẤT</p>
        <div class="tinmoi">
            @foreach($tinmoi as $tm)
            <div style="margin:7px;">
                <img style="width: 90px;height:70px;float: left;" src="admin_asset/img/tintuc/{{$tm->anh}}" alt="">
                <div style="float:left;overflow: hidden;width: 200px;height:85px;">
                        <a  href="chitiettintuc/{{$tm->id}}">{{$tm->tieude}}</a>
                        <?php $tm=date('d-m-Y H:i:s ',strtotime($tm->created_at)); ?>
                        <p>{{$tm}}</p>
                        
                </div>
            </div>
            @endforeach

        </div>
</div>
@endsection