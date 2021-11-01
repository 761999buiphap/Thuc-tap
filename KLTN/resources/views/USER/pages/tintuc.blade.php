@extends('USER.layout.index')

@section('noidung')
<!-- chi tiet -->
<div class="container-fluid " style="height:85px;padding-left: 7%;">
    <h3 style="font-weight: bold;color: black;">{{$tenloaitin}}</h3>
    <p><a style="text-decoration:none;color: rgb(18, 107, 110);" href="">Trang chủ</a>  <span style="color: #ccc;"> / </span>  <span style="font-weight: bold;color:rgb(18, 107, 110);"> Tin tức</span></p>
</div>
<div class="container-fluid" style="background-color:#f4f4f4;padding-top:1%;">
        <div class="row " style="width:90%;margin-left: 5%;">
            <div class="col-md-9">
                <div class="row" >
                @foreach($tintuc as $value)
                    <div  class=" col-md-3 " style="text-align:center;">
                        <div class="col-md-12 thumbnail" style="box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                            <a  href="/chitiet-tintuc/{{$value->id}}" style="text-decoration: none;">
                                <img src="../admin/img/tintuc/{{$value->anh}}" alt="Image" class="img-responsive" style="max-width:100%;height:180px;">
                                <h5 style="word-wrap:break-word;height:30px;overflow: hidden;">{{$value->tieude}}</h5>
                            </a>
                            <p style="height:20px;overflow: hidden;">{{$value->noidung}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <ul class="pagination" style="margin-left:72%;">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                      </ul>
                </div>
            </div>
            <div class="col-md-3" >
                <!--danh muc tin tức-->
                <div class="container-fluid ">
                    <div id="danhsach_tintuc" >
                        <a href="" style="font-weight: bold;font-size:17px; background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);padding: 5% 0;color: white;text-align: center;"><span class="fa fa-newspaper"></span> Danh mục Tin tức</a>
                        @foreach($loaitin as $value)
                        <a href="/tintuc/{{$value->id}}">{{$value->tenloaitin}}</a>
                        @endforeach
                    </div>
                </div>
                <!--sẩn phẩm mới-->
                <div class="container-fluid mt-1" >
                    <h4 style="font-weight: bold;background:linear-gradient( rgb(18, 107, 110),#3dafb3 100%);padding: 5% 0;color: white;text-align: center;"><span class="fa fa-cubes"></span> Sản phẩm mới</h4>
                    <div class="container-fluid" style="border: 1px solid #f4f4f4;width:100%;margin-left:0%;background-color:white;">
                    @foreach($sanphammoi as $value)
                        <div class="row " style="height:80px;overflow: hidden;border-bottom: 1px solid #f4f4f4;padding: 2%;">
                            <div class="col-md-4">
                                <img style="width:100%;" src="../admin/img/cay/{{$value->anh}}" alt="">
                            </div>
                            <div class="col-md-8" >
                                <div  style="height:35%;word-wrap:break-word;overflow: hidden;">
                                    <a href="chitietcay/{{$value->id}}" style="word-wrap:break-word;text-decoration:none;color: black;font-weight:bold;">{{$value->ten}}</a>
                                </div>
                                <div >
                                <p><?php if($value->khuyenmai==0)
                                    echo "<span  style='color: rgb(18, 107, 110);font-weight:bold;font-size:16px;'>".number_format($value->gia) ."₫</span>";
                                else
                                    echo "<strike style='font-size:1vw;color:#ccc;'>" .number_format($value->gia) ."₫</strike><br> <span style='color:rgb(18, 107, 110);font-weight:bold;font-size:16px;'>" .number_format($value->khuyenmai)."₫</span>";
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