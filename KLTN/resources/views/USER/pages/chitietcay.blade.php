@extends('USER.layout.index')

@section('noidung')
  <!-- chi tiet -->
  <div class="container-fluid" style="background-color: #eff0f3;">
        <div class="row p-5" style="margin:2% 4%;width:92%;background-color:white;">
            <div class="col-md-9">
                <div class="row ">
                    @foreach($cay as $value)
                    <div class="col-md-5" >
                        <img style="width:100%;height:330px;" src="../admin/img/cay/{{$value->anh}}" alt="">
                    </div>
                    <div class="col-md-7 ">
                        <p><a href="" style="color: rgb(18, 107, 110);text-decoration: none;">Trang chủ</a><span> / </span><a href="" style="color: black;text-decoration: none;">@foreach($tengiongcay as $vl){{$vl->ten}}@endforeach</a><span> / </span><a href="" style="color: rgb(18, 107, 110);text-decoration: none;">{{$tenloaicay}}</a></p>
                        <h4 style="font-size: 22px;">{{$value->ten}}</h4>
                        <span style="font-size:13px;font-weight:none;margin-right:3%;"><li class="fa fa-eye" style="color:blue;"></li>@if(empty($value->view)) 0 @endif {{$value->view}}</span><span  style="font-size:13px;"><li class="fa fa-star" style="color:#FBC02D;"></li>@if(empty($value->danhgia)) 0 @endif {{$value->danhgia}}</span>
                        <h3 style="color: rgb(18, 107, 110);">
                            <?php if($value->khuyenmai==0)
								echo "<span>".number_format($value->gia) ."₫</span>";
							else
								echo "<strike style='font-size:1vw;margin-right:3%;color:#9E9E9E;'>" .number_format($value->gia) ."₫</strike><span >" .number_format($value->khuyenmai)."₫</span>";
							?>
                        </h3>
                        <p>{{$value->tieude}}</p>
                        <div style="border: 1px solid #f4f4f4;padding:3%;border-radius: 5px;">
                            <h4 style="color: #d7102c;font-weight: bold;">Tiêu chí của chúng tôi:</h4>
                            <ul>
                                <li>Chọn lọc kĩ lưỡng từng giống cây</li>
                                <li>Mức giá cạnh tranh nhất!</li>
                                <li>Giao hàng nhanh nhất trong nội thành Hà Nội</li>
                                <li>Hoàn tiền 100% nếu bạn không hài lòng</li>
                            </ul>
                        </div>
                        <!--Thêm giỏ hàng-->
                        <form style="margin-top:2%;" action="/themgiohang/{{$value->id}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="buttons_added">
                                <input class="minus is-form" type="button" value="-">
                                <input name="soluong" aria-label="quantity" class="input-qty" max="{{$value->soluong}}" min="1" name="" type="number" value="1">
                                <input class="plus is-form" type="button" value="+">
                            </div>
                            @if(isset(Auth::user()->id))
                            <button style="padding: 10px 25px;background-color:rgb(18, 107, 110);border: none;border-radius: 5px;color: white;" type="submit"  >Mua hàng</button>
                            @else
                            <a href="dangnhap" style="padding: 10px 25px;background-color:rgb(18, 107, 110);border: none;border-radius: 5px;color: white;text-decoration:none;" type="submit"  >Mua hàng</a>
                            @endif
                        </form>
                        <!-- Button mua ngay -->
                        @if(isset(Auth::user()->id))
                        <button style="background: -webkit-linear-gradient(top,#f59000,#fd6e1d);padding:0 10%;margin-top:2%;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <h4>MUA NGAY</h4>
                            <p>Gọi điện xác nhận và mua hàng tận nơi</p>
                        </button>
                        <div class="modal" id="myModal" >
                            <div class="modal-dialog" style="margin-left: 20%;margin-top: 10%;">
                            <div class="modal-content" style="width:800px;">
                            
                                <!-- Modal Header -->
                                <div class="modal-header" style="color:white;background:linear-gradient(rgb(253, 110, 29) 0%, rgb(18, 107, 110) 100%);">
                                <h4 class="modal-title">ĐẶT MUA</h4>
                                <button type="button " style="background-color: white;" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="row">
                                    <form action="/muahangnhanh" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden" name="id_khachhang" @foreach($khachhang as $vl)value="{{$vl->id}}" @endforeach />
                                        <input type="hidden" name="id_cay" value="{{$value->id}}" />
                                        <input type="hidden" name="gia" value="{{$value->gia}}" />
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <img style="width:100%;height:130px;" src="../admin/img/cay/{{$value->anh}}" alt="">
                                                </div>
                                                <div class="col-md-7">
                                                    <h4 >{{$value->ten}}</h4>
                                                </div>
                                            </div>
                                            <div class="row" style="padding:3%;">
                                                <div class="col-md-3"><p>Số lượng</p></div>
                                                <div class="col-md-9">
                                                    <div class="buttons_added">
                                                        <input class="minus is-form" type="button" value="-">
                                                        <input  aria-label="quantity" class="input-qty" max="{{$value->soluong}}" min="1" name="soluong" type="number" value="1">
                                                        <input class="plus is-form" type="button" value="+">
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Bạn vui lòng nhập đúng số điện thoại để chúng tôi sẽ gọi xác nhận đơn hàng trước khi giao hàng. Xin cảm ơn!</p>
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Thông tin người mua</h4>
                                            @foreach($khachhang as $vl)
                                                <input name="gioitinh" type="radio" @if($vl->gioitinh == "Nam") {{"checked"}}@endif><label for="">Anh</label>
                                                <input name="gioitinh" type="radio" @if($vl->gioitinh == "Nữ") {{"checked"}}@endif><label for="">Chị</label>
                                                <div class=" row">
                                                    <div class="col">
                                                        <input class="form-control " type="text" value="{{$vl->ten}}" placeholder="Họ và tên">
                                                    </div>
                                                    <div class="col">
                                                        <input class="form-control " type="text" value="{{$vl->sdt}}" placeholder="Số điện thoại">
                                                    </div>
                                                </div>
                                                <input class="form-control mt-1" type="text" value="{{$vl->email}}" placeholder="Email">
                                                <textarea class="form-control mt-1" name="" id="" cols="30" rows="2"  placeholder="Địa chỉ">{{$vl->diachi}}</textarea>
                                                <input class="form-control " type="text" value="{{$vl->thanhpho}}" value="{{$vl->thanhpho}}" placeholder="Thành phố">
                                                <input name="phuongthucthanhtoan" type="radio" value="Chuyển khoản" placeholder="Chuyển khoản"><label for="">Chuyển khoản</label><br>
                                                <input name="phuongthucthanhtoan" type="radio" value="Nhận tiền khi giao hàng" placeholder="Nhận tiền khi giao hàng" checked=""><label for="">Nhận tiền khi giao hàng</label>
                                                <textarea class="form-control mt-1" name="ghichu" id="" cols="30" rows="2" placeholder="Ghi chú về đơn hàng, ví dụ: Thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
                                            @endforeach
                                            <input class="form-control mt-1" style="background-color: #fe5d21;color: white;" type="submit" value="ĐẶT HÀNG NGAY">
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        @else 
                        <a href="dangnhap" style="background: -webkit-linear-gradient(top,#f59000,#fd6e1d);padding:0 10%;margin-top:2%;" type="button" class="btn btn-primary"  >
                            <h4>MUA NGAY</h4>
                            <p>Gọi điện xác nhận và mua hàng tận nơi</p>
                        </a>
                        @endif
                    </div>
                    @endforeach
                </div>
                <hr>
                <!--mô tả-đánh giá-->
                <div class="row">
                    <div class="col-md-12" >
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#home"> <h4>Đánh giá ({{count($binhluan)}})</h4></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " data-toggle="pill" href="#menu1" ><h4>Mô tả</h4></a>
                            </li>
                        </ul>
                        <div class="tab-content ">
                            <div class="tab-pane  fade" id="menu1">
                                {{$value->mota}}
                            </div>
                            <div class="tab-pane active" id="home">
                                <h4 style="font-weight:bold;margin-top:4%;">Đánh giá</h4>
                                @foreach($binhluan as $bl)
                                <div class="row" style="margin-top:4px;" >
                                    <div class="col-md-1" style="border-right:1px solid #ccc;">
                                        <img style="width:100%;" src="../admin/img/user/{{$arr_anh_user[$bl->id_users]}}" alt="">
                                    </div>
                                    <div class="col-md-11">
                                        <p>{{$bl->noidung}}</p>
                                    </div>
                                </div>
                                @endforeach
                                @if(Auth::check())
                                @foreach($cay as $value)
                                    <form action="/binhluan" method="post" style="border:1px solid green;width: 73%;padding: 2%;margin-top:7%;">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <input type="hidden" name="id_cay" value="{{$value->id}}" />
                                        <label for="">Đánh giá của bạn </label><br>
                                        <input type="radio" name="danhgia" value="1">
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <input type="radio" name="danhgia" value="2" style="margin-left:1%;">
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <input type="radio" name="danhgia" value="3" style="margin-left:1%;">
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <input type="radio" name="danhgia" value="4" style="margin-left:1%;">
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <input type="radio" name="danhgia" value="5" style="margin-left:1%;">
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <img src="https://img.icons8.com/fluency/25/000000/star.png"/>
                                        <br><br>
                                        <label for="">Nhận xét của bạn *</label>
                                        <textarea class="form-control" name="noidung" id="" cols="30" rows="5"></textarea>
                                        <input class="form-control w-25" style="background-color: rgb(18, 107, 110);color: white;margin-top: 2%;" type="submit" value="Gửi đi">
                                    </form>
                                    @endforeach
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <!--danh muc san pham-->
                <div class="container-fluid">
                    <h4 style="font-weight: bold;">Danh mục sản phẩm</h4>
                    <div id="danhsach_cay" >
                        @foreach($loaicay as $value)
                        <a href="/trangloaicay/{{$value->id_giongcay}}/{{$value->id}}">> {{$value->ten}}</a>
                        @endforeach
                    </div>
                </div>
                <!--bai viet-->
                <div  style="margin-left:5%;">
                    <h4 style="font-weight: bold;">Bài viết mới</h4>
                    <div class="container-fluid" style="border: 1px solid #ececec;width:90%;margin-left:0%;">
                    @foreach($tintuc as $value)    
                    <div class="row " style="height:80px;overflow: hidden;border-bottom: 1px solid #ececec;padding: 2%;">
                            <div class="col-md-4">
                                <img style="width:100%;height:40px;" src="../admin/img//tintuc/{{$value->anh}}" alt="">
                            </div>
                            <div class="col-md-8" >
                                <a href="" style="color:black;text-decoration:none;">{{$value->tieude}}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Báo lỗi-->
    @if(count($errors) > 0)
    <?php foreach($errors->all() as $err){ ?>
    <div class="alert alert-danger alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:1%;width:25%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{$err}}
    </div>
    <?php } ?>
    @endif
    @if(session('thongbao'))
    <div class="alert alert-success alert-dismissible" style="position:fixed;bottom:10%;z-index:99999;right:1%;">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{session('thongbao')}}
  </div>
    @endif
    
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
<script>//<![CDATA[
    $('input.input-qty').each(function() {
      var $this = $(this),
        qty = $this.parent().find('.is-form'),
        min = Number($this.attr('min')),
        max = Number($this.attr('max'))
      if (min == 0) {
        var d = 0
      } else d = min
      $(qty).on('click', function() {
        if ($(this).hasClass('minus')) {
          if (d > min) d += -1
        } else if ($(this).hasClass('plus')) {
          var x = Number($this.val()) + 1
          if (x <= max) d += 1
        }
        $this.attr('value', d).val(d)
      })
    })
    //]]></script>
@endsection