@extends('USER.layout.index')

@section('noidung')
 <!-- chi tiet -->
 
 <div class="container-fluid" >
        <div class="row " style="width:90%;margin-left: 5%;">
            @foreach($tintuc as $value)
            <div class="col-md-9">
                <p style="padding:1%;border:1px solid #bbb;width:100%;color:#3dafb3;margin-top:1%;border-radius:3px;background-color:white;">Trang chủ » Tin tức » {{$value->tieude}}</p>
                <h3>{{$value->tieude}}</h3>
                <img src="https://img.icons8.com/material-rounded/20/4a90e2/folder-invoices.png"/>
                <a href="/tintuctrangchu" style="text-decoration:none;color: #3dafb3;margin-right: 2%;">Tin tức</a>
                <img src="https://img.icons8.com/windows/20/4a90e2/clock--v1.png"/>
                <span>Posted on {{date("d-m-Y", strtotime($value->ngay))}}</span><br>
                <img src="../admin/img/tintuc/{{$value->anh}}" alt="" style="width:100%;margin:5% 0;">
                <p>{{$value->noidung}}</p>
            </div>
            @endforeach
            <div class="col-md-3" >
                <!--danh muc tin tức-->
                <div class="container-fluid ">
                    <div id="danhsach_tintuc" style="margin-top:3%;">
                        <a href="" style="font-weight: bold;font-size:17px; background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);padding: 5% 0;color: white;text-align: center;"><span class="fa fa-newspaper"></span> Danh mục Tin tức</a>
                        @foreach($loaitin as $value)
                        <a href="/tintuc/{{$value->id}}">{{$value->tenloaitin}}</a>
                        @endforeach
                    </div>
                </div>
                 <!--sẩn phẩm mới-->
                 <div class="container-fluid mt-5" >
                    <h4 style="font-weight: bold;background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);padding: 5% 0;color: white;text-align: center;"><span class="fa fa-cubes"></span> Sản phẩm mới</h4>
                    <div class="container-fluid" style="border: 1px solid #f4f4f4;width:100%;margin-left:0%;">
                    @foreach($sanphammoi as $value)
                        <div class="row " style="height:80px;overflow: hidden;border-bottom: 1px solid #f4f4f4;padding: 2%;">
                            <div class="col-md-4">
                                <img style="width:100%;height:40px;" src="../admin/img/cay/{{$value->anh}}" alt="">
                            </div>
                            <div class="col-md-8" >
                                <div  style="height:35%;word-wrap:break-word;overflow: hidden;">
                                    <a href="" style="word-wrap:break-word;text-decoration:none;color: black;font-weight:bold;">{{$value->ten}}</a>
                                </div>
                                <div >
                                <p><?php if($value->khuyenmai==0)
                                    echo "<span  style='color: rgb(18, 107, 110);font-weight:bold;font-size:16px;'>".number_format($value->gia) ."₫</span>";
                                else
                                    echo "<strike style='font-size:1vw;'>" .number_format($value->gia) ."₫</strike> <span style='color:rgb(18, 107, 110);font-weight:bold;font-size:16px;'>" .number_format($value->khuyenmai)."₫</span>";
                                ?></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection