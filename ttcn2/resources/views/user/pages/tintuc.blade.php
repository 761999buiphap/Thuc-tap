
@extends('user.layout.index')

@section('noidung')
<p style="padding:1%;border:1px solid #bbb;width:64%;color:green;margin-left:7%;margin-top:1%;border-radius:3px;background-color:white;">Trang chủ / @foreach($tenloaitin as $tlt) {{$tlt->tenloaitin}} @endforeach</p>
<div style=";width:100%;height:750px;">
    <div class="trangtintuc" >
    @foreach($tintuc as $tt)
        <div >
            <a><img style="width:100%;height: 150px; " src="admin_asset/img/tintuc/{{$tt->anh}}" alt=""></a><br>
            <a href="chitiettintuc/{{$tt->id}}">{{$tt->tieude}}</a>
            <p style="height:30px;overflow: hidden;">{{$tt->noidung}}</p>
        </div>
    @endforeach
	</div>
    <div style="position:absolute;top:24%;right:5%;height:780px;"  class="body-danhmuc-tintuc" >
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
        <div style="position:relative;top:85%;right:15%;" class="pagination">
        {!! $tintuc->links() !!}
        </div>
</div>
@endsection