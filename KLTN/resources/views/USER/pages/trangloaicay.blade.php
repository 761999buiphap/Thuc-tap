@extends('USER.layout.index')

@section('noidung')
<!-- tieu de -->
<div class="container-fluid row" style="height:85px;padding-left: 7%;">
    <div class="col-md-7">
    @if(isset($timkiem))
        <h3 style="font-weight: bold;color: black;">Kết quả tìm kiếm: “”</h3>
        <p><a style="text-decoration:none;color: rgb(18, 107, 110);" href="">Trang chủ</a>  <span style="color: #ccc;">  /  </span>  <span style="font-weight: bold;color:rgb(18, 107, 110);"> Kết quả tìm kiếm cho: “”</span></p>
    @else
        <h3 style="font-weight: bold;color: black;">@foreach($tengiongcay as $value){{$value->ten}} @endforeach</h3>
        <p><a style="text-decoration:none;color: rgb(18, 107, 110);" href="">Trang chủ</a>  <span style="color: #ccc;"> / </span>  <span style="font-weight: bold;color:rgb(18, 107, 110);"> @foreach($tenloaicay as $value){{$value->ten}} @endforeach</span></p>
    @endif
    </div>
    <div class="col-md-5">
        <form action="/trangloaicay" method="GET">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
            <div class="row mt-5">
                <div class="col-md-2">
                    <label for="">Showing</label>
                </div>
                <div class="col-md-10">
                <div class="nav-item dropdown "  style="width:80%;">
                @foreach($tengiongcay as $value)
                @foreach($tenloaicay as $vl)
                    <a class="nav-link form-control" data-toggle="dropdown" ><?php
                    if($view == "thutumacdinh") {echo 'Thứ tự mặc định'; }
                    elseif($view == "theomucdophobien")echo 'Thứ tự theo mức độ phổ biến'; 
                    elseif($view == "theodiemdanhgia")echo 'Thứ tự theo điểm đánh giá'; 
                    elseif($view == "theoluotxem")echo 'Thứ tự theo lượt xem'; 
                    elseif($view == "theothututhapdencao")echo 'Thứ tự theo giá: Thấp đến cao'; 
                    elseif($view == "theothutucaodenthap")echo 'Thứ tự theo giá: Cao xuống thấp'; 

                    ?></a>
                    <div class="dropdown-menu" style="width:100%;">
                    <a class="dropdown-item" href="/trangloaicay/{{$value->id}}/{{$vl->id}}/thutumacdinh">Thứ tự mặc định</a>
                    <a class="dropdown-item" href="/trangloaicay/{{$value->id}}/{{$vl->id}}/theomucdophobien">Thứ tự theo mức độ phổ biến</a>
                    <a class="dropdown-item" href="/trangloaicay/{{$value->id}}/{{$vl->id}}/theodiemdanhgia" >Thứ tự theo điểm đánh giá</a>
                    <a class="dropdown-item" href="/trangloaicay/{{$value->id}}/{{$vl->id}}/theoluotxem" >Thứ tự theo lượt xem</a>
                    <a class="dropdown-item" href="/trangloaicay/{{$value->id}}/{{$vl->id}}/theothututhapdencao">Thứ tự theo giá: Thấp đến cao</a>
                    <a class="dropdown-item" href="/trangloaicay/{{$value->id}}/{{$vl->id}}/theothutucaodenthap">Thứ tự theo giá: Cao xuống thấp</a>
                    </div>
                @endforeach
                @endforeach
                </div>
                </div>
            </div>
        </form>
    </div>
</div>
    <!-- san pham -->
    <div class="container-fluid" style="background-color: #f4f4f4;padding-top:2%;">
        <div class="row" style="width:88%;margin-left:5%;">
            <div class="col-md-3">
                <h4 style="font-weight: bold;color: black;">Danh mục sản phẩm</h4>
                <div id="danhsach_cay" >
                    @foreach($tenloaicay as $vl)
                    @foreach($loaicay as $value)
                    <a href="/trangloaicay/{{$vl->id_giongcay}}/{{$value->id}}/thutumacdinh" class="fa fa-angle-right" ><span style="font-family:arial;"> {{$value->ten}}</span></a>
                    @endforeach
                    @endforeach
                </div>
            </div>
            <div class="col-md-9" >
                <div class="row" >
                    @if($arr_phobien != ' ')
                    <?php  foreach($arr_phobien as $key=>$v) { ?>
                    <div  class=" col-md-3 " style="text-align:center;">
                        <div id="lc_hover"  class="col-md-12 thumbnail" style="box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                        <a  href="/chitietcay/{{$v[0]}}" style="color:#4e4e4e;text-decoration:none;font-size:18px;">
                                <img src="../admin/img/cay/{{$arr_c[$v[0]]['anh']}}" alt="Image" class="img-responsive" style="max-width:100%;height:180px;">
                                <p style="height:30px;overflow:hidden;width:100%;">{{$value->ten}}</p>
                                <span style="font-size:13px;font-weight:none;margin-right:3%;"><li class="fa fa-eye" style="color:blue;"></li>@if(empty($value->view)) 0 @endif {{$value->view}}</span><span  style="font-size:13px;"><li class="fa fa-star" style="color:#FBC02D;"></li>@if(empty($value->danhgia)) 0 @endif {{$value->danhgia}}</span>
                                <p><?php if($value->khuyenmai==0)
                                    echo "<span  style='color:rgb(18, 107, 110);'>".number_format($arr_s[$vl[0]]->gia) ."₫</span>";
                                else
                                    echo "<strike style='font-size:1vw;margin-right:3%;color:#9E9E9E'>" .number_format($arr_s[$vl[0]]->gia) ."₫</strike><span style='color:rgb(18, 107, 110);'>" .number_format($arr_s[$vl[0]]->khuyenmai)."₫</span>";
                                ?></p> 
                            </a>
                        </div>
                    </div> 
                    <?php } ?>  
                    @else
                    @foreach($cay as $value)
                    <div  class=" col-md-3 " style="text-align:center;">
                        <div id="lc_hover"  class="col-md-12 thumbnail" style="box-shadow: 0 0px 8px 0 rgba(0, 0, 0, 0.2);">
                        <a  href="/chitietcay/{{$value->id}}" style="color:#4e4e4e;text-decoration:none;font-size:18px;">
                                <img src="../admin/img/cay/{{$value->anh}}" alt="Image" class="img-responsive" style="max-width:100%;height:180px;">
                                <p style="height:30px;overflow:hidden;width:100%;">{{$value->ten}}</p>
                                <span style="font-size:13px;font-weight:none;margin-right:3%;"><li class="fa fa-eye" style="color:blue;"></li>@if(empty($value->view)) 0 @endif {{$value->view}}</span><span  style="font-size:13px;"><li class="fa fa-star" style="color:#FBC02D;"></li>@if(empty($value->danhgia)) 0 @endif {{$value->danhgia}}</span>
                                <p><?php if($value->khuyenmai==0)
								    echo "<span  style='color:rgb(18, 107, 110);'>".number_format($value->gia) ."₫</span>";
                                else
                                    echo "<strike style='font-size:1vw;margin-right:3%;color:#9E9E9E'>" .number_format($value->gia) ."₫</strike><span style='color:rgb(18, 107, 110);'>" .number_format($value->khuyenmai)."₫</span>";
                                ?></p> 
                            </a>
                        </div>
                    </div> 
                    @endforeach     
                    @endif
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
        </div>
    </div>

<script>
    
    (function(){  
    $('#carousel_number').carousel({ 
    interval: 2000 
    });  
    
    $('#carousel_alphabe').carousel({ 
    interval: 3600 
    });
    $('#carousel_alphabe_2').carousel({ 
    interval: 3600 
    });
    $('#carousel_alphabe_doitac').carousel({ 
    interval: 3600 
    });
    }());
 
    
    
    
    (function(){  $('.carousel-showmanymoveone .item').each(function(){    
    var itemToClone = $(this);
        
    for (var i=1;i<4;i++) {      
    
    itemToClone = itemToClone.next();
        
    if (!itemToClone.length) {        
    itemToClone = $(this).siblings(':first');      
    }
        

    itemToClone.children(':first-child').clone()        
    .addClass("cloneditem-"+(i))        
    .appendTo($(this));    
    }  
    });
    }());
</script>
@endsection