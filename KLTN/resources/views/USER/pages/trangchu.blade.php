@extends('USER.layout.index')

@section('noidung')
<!-- banner -->
<div class="container-fluid " style="height:370px;background-color: #f1f1f1;">
        <div style="margin-left:6%;" id="banner-danhsach">
        @foreach($giongcay as $value)
            <a href="/trangloaicay/{{$value->id}}">> {{$value->ten}}</a>
        @endforeach
        <a class="dropdown-item"  href="/trangloaicay/{{$value->id}}">> Sản Phẩm bán chạy</a>
        <a class="dropdown-item"  href="sanphammoinhat">> Sản phẩm mới nhất</a>
        <a class="dropdown-item"  href="sanphamkhuyenmai">> Sản phẩm khuyên mãi</a>
        </div>
    </div>
    <div style="position: absolute;top:28%;left:28%;">
        <div id="demo" class="carousel slide" data-ride="carousel" style="width: 100%;">
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../USER/img/slide.JPG" alt="Los Angeles" width="1100" height="500">
                <div class="carousel-caption">
                  <h3>Los Angeles</h3>
                  <p>We had such a great time in LA!</p>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="../USER/img/slide.JPG" alt="Chicago" width="1100" height="500">
                <div class="carousel-caption">
                  <h3>Chicago</h3>
                  <p>Thank you, Chicago!</p>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="../USER/img/slide.JPG" alt="New York" width="1100" height="500">
                <div class="carousel-caption">
                  <h3>New York</h3>
                  <p>We love the Big Apple!</p>
                </div>   
              </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
    </div>
    <!-- logo -->
    <div class="container-fluid" style="height:165px;">
        <div class="row" style="padding-top:1%;">
            <div class="col-md-3" style="margin-left:7%;border:1px solid #ccc;margin-right:5%;padding:1%;border-radius: 10px;">
                <img style="float:left;width:60px;margin-right:4%;margin-top:3%;" src="../USER/img/logo1.JPG" alt="">
                <div>
                    <h4 style="color: rgb(14, 84, 87);font-weight:bold;">Thương hiệu lâu đời</h4>
                    <p style="font-size: 15px;">TRÀ sản phẩm chính hãng đã kinh doanh từ năm 1962</p>
                </div>
            </div>
            <div class="col-md-3" style="border:1px solid #ccc;margin-right:5%;padding:1%;border-radius: 10px;">
                <img style="float:left;width:60px;margin-right:4%;margin-top:3%;" src="../USER/img/logo2.JPG" alt="">
                <div>
                    <h4 style="color: rgb(14, 84, 87);font-weight:bold;">Đổi trả miễn phí</h4>
                    <p  style="font-size: 15px;">Chúng tôi hỗ trợ đổi trả miễn phí với hàng lỗi, hàng kém chất lượng</p>
                </div>
            </div>
            <div class="col-md-3" style="border:1px solid #ccc;padding:1%;border-radius: 10px;">
                <img style="float:left;width:60px;margin-right:4%;margin-top:3%;" src="../USER/img/logo3.JPG" alt="">
                <div>
                    <h4 style="color: rgb(14, 84, 87);font-weight:bold;">Thanh toán linh hoạt</h4>
                    <p  style="font-size: 15px;">Chúng tôi hỗ trợ thanh toán bằng nhiều hình thức linh hoạt</p>
                </div>
            </div>
        </div>
    </div>
    <!-- san pham -->
    <div id="sanpham" class="container-fluid" style="background-color: #f9f9f9;">
        <div id="sanphambanchay">
            <h4>SẢN PHẨM BÁN CHẠY</h4>
            <a href="/sanphambanchay" style="margin-left:72%;">Xem tất cả ></a>
        </div>
        <!--trang cuộn sản phẩm-->
        <div class="container-fluid"> 
            <h3 class="text-center"></h3> 
            <div class="row"> 
             <div class="col-md-12"> 
              <div class="carousel carousel-showmanymoveone slide" id="carousel_alphabe" style="width: 89%;margin-left: 5%;"> 
               <div class="carousel-inner" > 
               <?php $i=0; ?>
               <?php  foreach($arr as $key=>$vl) { ?>
                <div class="item active" style="width: 100%;"> 
                 <div id="sp_hover" class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="text-align:center;margin-right:1%;width:24%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                    <a  href="/chitietcay/{{$vl[0]}}" style="color:#4e4e4e;text-decoration:none;font-size:18px;">
                            <img src="../admin/img/cay/{{$arr_s[$vl[0]]->anh}}" alt="Image" style="max-width:100%;height:250px;">
                            <span style="word-wrap:break-word;">{{$arr_s[$vl[0]]->ten}}</span><br>
                            <span style="font-size:13px;font-weight:none;margin-right:3%;"><li class="fa fa-eye" style="color:blue;"></li>@if(empty($arr_s[$vl[0]]->view)) 0 @endif {{$arr_s[$vl[0]]->view}}</span><span  style="font-size:13px;"><li class="fa fa-star" style="color:#FBC02D;"></li>@if(empty($arr_s[$vl[0]]->danhgia)) 0 @endif {{$arr_s[$vl[0]]->danhgia}}</span>
                            <p><?php if($value->khuyenmai==0)
								echo "<span  style='color:rgb(18, 107, 110);'>".number_format($arr_s[$vl[0]]->gia) ." ₫</span>";
							else
								echo "<strike style='font-size:1vw;margin-right:3%;color:#9E9E9E'>" .number_format($arr_s[$vl[0]]->gia) ." ₫</strike><span style='color:rgb(18, 107, 110);'>" .number_format($arr_s[$vl[0]]->khuyenmai)." ₫</span>";
							?></p>
                    </a>
                 </div> 
                </div> 
                <?php break;} ?>
                <?php  foreach($arr as $key=>$vl) { 
                if($i>1){?>
                <div class="item"> 
                    <div id="sp_hover" class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="text-align:center;margin-right:1%;width:24%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                    <a  href="/chitietcay/{{$vl[0]}}" style="color:#4e4e4e;text-decoration:none;font-size:18px;">
                            <img src="../admin/img/cay/{{$arr_s[$vl[0]]->anh}}" alt="Image" style="max-width:100%;height:250px;">
                            <span style="word-wrap:break-word;">{{$arr_s[$vl[0]]->ten}}</span><br>
                            <span style="font-size:13px;font-weight:none;margin-right:3%;"><li class="fa fa-eye" style="color:blue;"></li>@if(empty($arr_s[$vl[0]]->view)) 0 @endif {{$arr_s[$vl[0]]->view}}</span><span  style="font-size:13px;"><li class="fa fa-star" style="color:#FBC02D;"></li>@if(empty($arr_s[$vl[0]]->danhgia)) 0 @endif {{$arr_s[$vl[0]]->danhgia}}</span>
                            <p><?php if($value->khuyenmai==0)
								echo "<span  style='color:rgb(18, 107, 110);'>".number_format($arr_s[$vl[0]]->gia) ."₫</span>";
							else
                                echo "<strike style='font-size:1vw;margin-right:3%;color:#9E9E9E'>" .number_format($arr_s[$vl[0]]->gia) ."₫</strike><span style='color:rgb(18, 107, 110);'>" .number_format($arr_s[$vl[0]]->khuyenmai)."₫</span>";
							?></p>
                    </a>
                    </div> 
                </div> 
                <?php }$i++;} ?>
               </div> <a style="background-image: -webkit-gradient(linear,left top,right top,from(white),to(white));width: 3%;height: 95%;" class="left carousel-control" href="http://hocwebgiare.com/#carousel_alphabe" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a> <a<a style="background-image: -webkit-gradient(linear,left top,right top,from(white),to(white));width: 3%;height: 95%;" class="right carousel-control" href="http://hocwebgiare.com/#carousel_alphabe" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> 
              </div> 
             </div> 
            </div> 
        </div>
        <!-- sản phẩm mói nhất-->
        <div id="sanphambanchay">
            <h4>SẢN PHẨM MỚI NHẤT</h4>
            <a href="/sanphammoinhat" style="margin-left:72%;">Xem tất cả ></a>
        </div>
        <!--trang cuộn sản phẩm-->
        <div class="container-fluid" > 
            <h3 class="text-center"></h3> 
            <div class="row"> 
             <div class="col-md-12"> 
              <div class="carousel carousel-showmanymoveone slide" id="carousel_number" style="width: 89%;margin-left: 5%;"> 
               <div class="carousel-inner" > 
               <?php  foreach($sanphammoinhat as $value) { ?>
                <div class="item active" style="width: 100%;"> 
                 <div id="sp_hover" class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="text-align:center;margin-right:1%;width:24%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                        <a  href="/chitietcay/{{$value->id}}" style="color:#4e4e4e;text-decoration:none;font-size:18px;">
                            <img src="../admin/img/cay/{{$value->anh}}" alt="Image" style="max-width:100%;height:250px;">
                            <span style="word-wrap:break-word;">{{$value->ten}}</span><br>
                            <span style="font-size:13px;font-weight:none;margin-right:3%;"><li class="fa fa-eye" style="color:blue;"></li>@if(empty($value->view)) 0 @endif {{$value->view}}</span><span  style="font-size:13px;"><li class="fa fa-star" style="color:#FBC02D;"></li>@if(empty($value->danhgia)) 0 @endif {{$value->danhgia}}</span>
                            <p><?php if($value->khuyenmai==0)
								echo "<span  style='color:rgb(18, 107, 110);'>".number_format($value->gia) ."₫</span>";
							else
                                echo "<strike style='font-size:1vw;margin-right:3%;color:#9E9E9E'>" .number_format($value->gia) ."₫</strike><span style='color:rgb(18, 107, 110);'>" .number_format($value->khuyenmai)."₫</span>";
							?></p>                      
                        </a>
                 </div> 
                </div>
                <?php break;} ?>
                <?php $i=1; foreach($sanphammoinhat as $value) {
                if($i>1){?>
                <div class="item"> 
                    <div id="sp_hover" class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="text-align:center;margin-right:1%;width:24%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                        <a  href="/chitietcay/{{$value->id}}" style="color:#4e4e4e;text-decoration:none;font-size:18px;">
                            <img src="../admin/img/cay/{{$value->anh}}" alt="Image" style="max-width:100%;height:250px;">
                            <span style="word-wrap:break-word;">{{$value->ten}}</span><br>
                            <span style="font-size:13px;font-weight:none;margin-right:3%;"><li class="fa fa-eye" style="color:blue;"></li>@if(empty($value->view)) 0 @endif {{$value->view}}</span><span  style="font-size:13px;"><li class="fa fa-star" style="color:#FBC02D;"></li>@if(empty($value->danhgia)) 0 @endif {{$value->danhgia}}</span>
                            <p><?php if($value->khuyenmai==0)
								echo "<span  style='color:rgb(18, 107, 110);'>".number_format($value->gia) ."₫</span>";
							else
                                echo "<strike style='font-size:1vw;margin-right:3%;color:#9E9E9E'>" .number_format($value->gia) ."₫</strike><span style='color:rgb(18, 107, 110);'>" .number_format($value->khuyenmai)."₫</span>";
							?></p>
                        </a>
                    </div> 
                </div> 
                <?php }$i++;} ?>
               </div> <a style="background-image: -webkit-gradient(linear,left top,right top,from(white),to(white));width: 3%;height: 95%;" class="left carousel-control" href="http://hocwebgiare.com/cpadmin/form_blog.php?ID_blog=226#carousel_number" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a> <a style="background-image: -webkit-gradient(linear,left top,right top,from(white),to(white));width: 3%;height: 95%;" class="right carousel-control" href="http://hocwebgiare.com/cpadmin/form_blog.php?ID_blog=226#carousel_number" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> 
              </div> 
             </div> 
            </div> 
        </div>
        <!-- sản phẩm khuyến mãi -->
        <div id="sanphambanchay">
            <h4>SẢN PHẨM KHUYẾN MÃI</h4>
            <a href="/sanphamkhuyenmai" >Xem tất cả ></a>
        </div>
        <!--trang cuộn sản phẩm-->
        <div class="container-fluid"> 
            <h3 class="text-center"></h3> 
            <div class="row"> 
             <div class="col-md-12"> 
              <div class="carousel carousel-showmanymoveone slide" id="carousel_alphabe_2" style="width: 89%;margin-left: 5%;"> 
               <div class="carousel-inner" > 
               <?php  foreach($sanphamkhuyenmai as $value) { ?>
                <div class="item active" style="width: 100%;"> 
                 <div id="sp_hover" class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="text-align:center;margin-right:1%;width:24%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                    <a  href="/chitietcay/{{$value->id}}" style="color:#4e4e4e;text-decoration:none;font-size:18px;">
                            <img src="../admin/img/cay/{{$value->anh}}" alt="Image" style="max-width:100%;height:270px;">
                            <span style="word-wrap:break-word;">{{$value->ten}}</span><br>
                            <span style="font-size:13px;font-weight:none;margin-right:3%;"><li class="fa fa-eye" style="color:blue;"></li>@if(empty($value->view)) 0 @endif {{$value->view}}</span><span  style="font-size:13px;"><li class="fa fa-star" style="color:#FBC02D;"></li>@if(empty($value->danhgia)) 0 @endif {{$value->danhgia}}</span>
                            <p><?php if($value->khuyenmai==0)
								echo "<span  style='color:rgb(18, 107, 110);'>".number_format($value->gia) ."₫</span>";
							else
                                echo "<strike style='font-size:1vw;margin-right:3%;color:#9E9E9E'>" .number_format($value->gia) ."₫</strike><span style='color:rgb(18, 107, 110);'>" .number_format($value->khuyenmai)."₫</span>";
							?></p>
                        </a>
                 </div> 
                </div>
                <?php break;} ?>
                <?php $i=1; foreach($sanphamkhuyenmai as $value) {
                if($i>1){?>
                <div class="item"> 
                    <div id="sp_hover" class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="text-align:center;margin-right:1%;width:24%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                        <a  href="/chitietcay/{{$value->id}}" style="color:#4e4e4e;text-decoration:none;font-size:18px;">
                            <img src="../admin/img/cay/{{$value->anh}}" alt="Image" style="max-width:100%;height:270px;">
                            <span style="word-wrap:break-word;">{{$value->ten}}</span><br>
                            <span style="font-size:13px;font-weight:none;margin-right:3%;"><li class="fa fa-eye" style="color:blue;"></li>@if(empty($value->view)) 0 @endif {{$value->view}}</span><span  style="font-size:13px;"><li class="fa fa-star" style="color:#FBC02D;"></li>@if(empty($value->danhgia)) 0 @endif {{$value->danhgia}}</span>
                            <p><?php if($value->khuyenmai==0)
								echo "<span  style='color:rgb(18, 107, 110);'>".number_format($value->gia) ."₫</span>";
							else
                                echo "<strike style='font-size:1vw;margin-right:3%;color:#9E9E9E'>" .number_format($value->gia) ."₫</strike><span style='color:rgb(18, 107, 110);'>" .number_format($value->khuyenmai)."₫</span>";
							?></p>
                        </a>
                    </div> 
                </div> 
                <?php }$i++;} ?>
               </div> <a style="background-image: -webkit-gradient(linear,left top,right top,from(white),to(white));width: 3%;height: 95%;" class="left carousel-control" href="http://hocwebgiare.com/#carousel_alphabe_2" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a> <a style="background-image: -webkit-gradient(linear,left top,right top,from(white),to(white));width: 3%;height: 95%;" class="right carousel-control" href="http://hocwebgiare.com/#carousel_alphabe_2" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> 
              </div> 
             </div> 
            </div> 
        </div>
        <!-- quảng cáo -->
        <div>
            <img style="margin-left: 6%;border-radius: 5px;height:330px;width:86%;" src="../USER/img/quang cao 2.png" alt="">
        </div>
        <!-- cây ăn quả -->
        <div id="sanphambanchay" style="margin-top:4%;">
            <h4 >CÂY ĂN QUẢ</h4>
            <a style="margin-left:79%;" href="/trangloaicay/{{$ten_sp1}}">Xem tất cả ></a>
        </div>
        <div class="container-fluid" >
            <div class="row"></div>
        </div>
        <div class="row" style="margin-left:5%;">
            @foreach($sanpham1 as $value)
            <div id="sp_hover" class=" col-md-2 thumbnail" style="text-align:center; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);margin: 10px;">
                <a  href="/chitietcay/{{$value->id}}" style="color:#4e4e4e;text-decoration:none;font-size:18px;">
                    <img src="../admin/img/cay/{{$value->anh}}" alt="Image" style="max-width:100%;height:210px;">
                    <span style="word-wrap:break-word;">{{$value->ten}}</span><br>
                    <span style="font-size:13px;font-weight:none;margin-right:3%;"><li class="fa fa-eye" style="color:blue;"></li>@if(empty($value->view)) 0 @endif {{$value->view}}</span><span  style="font-size:13px;"><li class="fa fa-star" style="color:#FBC02D;"></li>@if(empty($value->danhgia)) 0 @endif {{$value->danhgia}}</span>
                    <p><?php if($value->khuyenmai==0)
								echo "<span  style='color:rgb(18, 107, 110);'>".number_format($value->gia) ."₫</span>";
							else
                                echo "<strike style='font-size:1vw;margin-right:3%;color:#9E9E9E'>" .number_format($value->gia) ."₫</strike><span style='color:rgb(18, 107, 110);'>" .number_format($value->khuyenmai)."₫</span>";
							?></p>
               </a>
            </div>
            @endforeach    
        </div>
        <!-- cây ăn quả trưởng thành-->
        <div id="sanphambanchay" style="margin-top:2%;">
            <h4 >CÂY CÔNG TRÌNH</h4>
            <a style="margin-left:75%;" href="/trangloaicay/17">Xem tất cả ></a>
        </div>
        <div class="container-fluid" >
            <div class="row"></div>
        </div>
        <div class="row" style="margin-left:5%;">
            @foreach($sanpham2 as $value)
            <div id="sp_hover" class=" col-md-2 thumbnail" style="text-align:center; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);margin: 10px;">
                <a  href="/chitietcay/{{$value->id}}" style="color:#4e4e4e;text-decoration:none;font-size:18px;">
                    <img src="../admin/img/cay/{{$value->anh}}" alt="Image" style="max-width:100%;height:210px;">
                    <span style="word-wrap:break-word;">{{$value->ten}}</span><br>
                    <span style="font-size:13px;font-weight:none;margin-right:3%;"><li class="fa fa-eye" style="color:blue;"></li>@if(empty($value->view)) 0 @endif {{$value->view}}</span><span  style="font-size:13px;"><li class="fa fa-star" style="color:#FBC02D;"></li>@if(empty($value->danhgia)) 0 @endif {{$value->danhgia}}</span>
                    <p><?php if($value->khuyenmai==0)
								echo "<span  style='color:rgb(18, 107, 110);'>".number_format($value->gia) ."₫</span>";
							else
                                echo "<strike style='font-size:1vw;margin-right:3%;color:#9E9E9E'>" .number_format($value->gia) ."₫</strike><span style='color:rgb(18, 107, 110);'>" .number_format($value->khuyenmai)."₫</span>";
							?></p>
               </a>
            </div>
            @endforeach    
        </div>
        <!-- đối tác -->   
    </div>
    <div  style="height:450px;background-color:white;padding:3% 5% 3% 6%;">
        <table><tr >
            <td style="width:37%"><hr></td>
            <td ><h3 style="color: rgb(18, 107, 110);font-weight: bold;"> ĐỐI TÁC CỦA CHÚNG TÔI </h3></td>
            <td style="width:37%"><hr/></td>
        </tr>
        </table>
        <div style="text-align:center;">
            <p>Chân thành cảm ơn các đối tác đã tin tưởng sử dụng sản phẩm cây giống để trao đến tay nhà nông</p>
        </div>
        <!--trang cuộn đối tác-->
        <div class="container-fluid"> 
            <h3 class="text-center"></h3> 
            <div class="row"> 
            <div class="col-md-12"> 
            <div class="carousel carousel-showmanymoveone slide" id="carousel_alphabe_doitac" style="width: 89%;margin-left: 5%;"> 
            <div class="carousel-inner" > 
                <div class="item active" style="width: 100%;"> 
                <div  class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="text-align:center;margin-right:3%;width:22%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                    <a  href="http://hocwebgiare.com/">
                        <img src="../USER/img/hợp tác/học viện nông nghiệp.png" alt="Image" class="img-responsive" style="max-width:100%;">
                    </a>
                </div> 
                </div> 
                <div class="item"> 
                    <div class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="text-align:center;margin-right:3%;width:22%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                        <a  href="http://hocwebgiare.com/">
                            <img src="../USER/img/hợp tác/bộ nông nghiệp và phát triển nông thôn.png" alt="Image" style="max-width:100%;">
                        </a>
                    </div> 
                </div> 
                <div class="item"> 
                    <div class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="text-align:center;margin-right:3%;width:22%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                        <a  href="http://hocwebgiare.com/">
                            <img src="../USER/img/hợp tác/khu nhà vườn.jpg" alt="Image" style="max-width:100%;">
                        </a>
                    </div> 
                </div>
                <div class="item"> 
                    <div class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="text-align:center;margin-right:3%;width:22%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                        <a  href="http://hocwebgiare.com/">
                            <img src="../USER/img/hợp tác/khuyến nông việt nam.jpg" alt="Image" style="max-width:100%;">
                        </a>
                    </div> 
                </div> 
                <div class="item"> 
                    <div class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="text-align:center;margin-right:3%;width:22%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                        <a  href="http://hocwebgiare.com/">
                            <img src="../USER/img/hợp tác/tong cuc lam nghiep.jpg" alt="Image" style="max-width:100%;">
                        </a>
                    </div> 
                </div> 
                <div class="item"> 
                    <div class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="text-align:center;margin-right:3%;width:22%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                        <a  href="http://hocwebgiare.com/">
                            <img src="../USER/img/hợp tác/nông nghiệp hữu cơ.jpg" alt="Image" style="max-width:100%;">
                        </a>
                    </div> 
                </div> 
                <div class="item"> 
                    <div class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="text-align:center;margin-right:3%;width:22%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                        <a  href="http://hocwebgiare.com/">
                            <img src="../USER/img/hợp tác/nông thôn mới.jpg" alt="Image" style="max-width:100%;">
                        </a>
                    </div> 
                </div> 
                <div class="item"> 
                    <div class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="text-align:center;margin-right:3%;width:22%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                        <a  href="http://hocwebgiare.com/">
                            <img src="../USER/img/hợp tác/vien môi truong.jpg" alt="Image" style="max-width:100%;">
                        </a>
                    </div> 
                </div> 
            </div> <a style="background-image: -webkit-gradient(linear,left top,right top,from(white),to(white));width: 3%;height: 95%;" class="left carousel-control" href="http://hocwebgiare.com/#carousel_alphabe_doitac" data-slide="prev"><i class="glyphicon glyphicon-chevron-left" style="background-color: #3dafb3;border-radius: 50%;"></i></a> <a style="background-image: -webkit-gradient(linear,left top,right top,from(white),to(white));width: 3%;height: 95%;" class="right carousel-control" href="http://hocwebgiare.com/#carousel_alphabe_doitac" data-slide="next"><i class="glyphicon glyphicon-chevron-right" style="background-color: #3dafb3;border-radius: 50%;"></i></a> 
            </div> 
            </div> 
            </div> 
        </div>
    </div>
    <!-- tin tức -->
    <div class="container-fluid" style="height: 900px;background-color: #f1f1f1;">
        <h3 style="width:100%;text-align:center;font-weight:bold;color:rgb(18, 107, 110);">Tin tức - Bài viết</h3>
        <div class="container-fluid"> 
            <h3 class="text-center"></h3> 
            <div class="row"> 
            <div class="col-md-12"> 
              <div class="carousel carousel-showmanymoveone slide" id="carousel_number" style="width: 89%;margin-left: 5%;"> 
               <div class="carousel-inner" > 
                @foreach($tintuc as $value)
                <div style="width: 100%; " > 
                 <div class="col-xs-12 col-sm-6 col-md-3 thumbnail" style="overflow:hidden;margin-right:1%;width:24%; box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                     <a  href="/chitiet-tintuc/{{$value->id}}" style="text-decoration: none;">
                        <img src="../admin/img/tintuc/{{$value->anh}}" alt="Image" class="img-responsive" style="max-width:100%;height:250px;">
                        <h4 style="word-wrap:break-word;height:40px;overflow:hidden;">{{$value->tieude}}</h4>
                    </a>
                    <p style="height:40px;overflow:hidden;">{{$value->tieude}}</p>
                 </div> 
                </div> 
                @endforeach
              </div> 
             </div> 
            </div> 
        </div>
        <a href="/tintuctrangchu" style="padding:8px 15px;background-color:rgb(18, 107, 110);margin-left:45%;color:white;border-radius: 3px;">Xem thêm</a>
        <img style="margin-left: 5%;margin-top:5%;height:330px;width:88%;" src="../USER/img/quang cao 3.jpg" alt="">
    </div>
    </div>
    @if(session('thongbao'))
    <div class="alert alert-success alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:1%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{session('thongbao')}}
  </div>
    @endif
@endsection