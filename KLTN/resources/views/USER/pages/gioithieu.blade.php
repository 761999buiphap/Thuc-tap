@extends('USER.layout.index')

@section('noidung')
    <!-- chi tiet -->
<div class="container-fluid" style="background-color:#f4f4f4" >
        <div class="row " style="margin:1% 5%;width:95%;">
            <div class="col-md-9" style="background-color: white;">
               <h3 style="font-weight: bold;">Giới thiệu</h3>
               <p>"Cây giống góp phần tạo nên một trái đất xanh",chúng tôi nỗ lực hết mình theo đuổi sự hoàn thiện và liên tục cải tiến không ngừng để nâng cao chất lượng sản phẩm và hiệu quả trong mọi hoạt động, đem đến cho mọi người dân Việt Nam những sản phẩm giá trị gia tăng lớn nhất với chi phí hợp lý và an toàn cho sức khỏe con người.Với mong muốn mang tới tay khách hàng những loại giống cây trồng chất lượng và tốt nhất. Bằng sự nỗ lực, nhiệt huyết và đam mê cháy bỏng cây giống Việt, chúng tôi đã tìm tòi, nghiên cứu và cho ra đời hệ thống bán cây giống “chất lượng với năng suất cao” .</p>
               <h3 style="font-weight: bold;">Tầm nhìn – Sứ mệnh</h3>
               <p><i style="font-weight: bold;">1. Tầm nhìn</i></p>
               <p>Cây giống việt phấn đấu trở thành Tập đoàn cung cấp các giải pháp phát triển nông nghiệp bền vững hàng đầu Việt Nam, thực hiện giấc mơ cải thiện thu nhập và điều kiện sống của nông dân Việt Nam.</p>
                <p><i style="font-weight: bold;">2. Sứ mệnh</i></p>
                <p>Bằng tất cả tình cảm và trách nhiệm của mình với cuộc sống con người và xã hội, Vinaseed cam kết mang đến các giải pháp phát triển nông nghiệp bền vững, nhằm thực hiện giấc mơ cải thiện thu nhập và điều kiện sống của nông dân Việt Nam.</p>
                <p><i style="font-weight: bold;">3. Gía trị cốt lõi</i></p>
                <p>Năng động – Sáng tạo – Chuyên nghiệp</p>
            </div>
            <div class="col-md-3" >
                <!--bai viet-->
                <div class="container-fluid" style="background-color: white;padding-bottom:5%;">
                    <h4 style="font-weight: bold;">Bài viết</h4>
                    <div class="container-fluid" style="border: 1px solid #f4f4f4;width:100%;margin-left:0%;background-color: white;">
                    @foreach($tintuc as $value)
                    <div class="row " style="height:80px;overflow: hidden;border-bottom: 1px solid #f4f4f4;padding: 2%;">
                            <div class="col-md-4" >
                                <img style="width:100%;height:40px;" src="../admin/img/tintuc/{{$value->anh}}" alt="">
                            </div>
                            <div class="col-md-8" >
                                <a href="/chitiet-tintuc/{{$value->id}}" style="word-wrap:break-word;color:black;text-decoration:none;">{{$value->tieude}}</a>
                            </div>
                    </div>
                    @endforeach
                    </div>
                </div>
                <!--sẩn phẩm mới-->
                <div class="container-fluid" style="background-color: white;margin-top:10%;padding-bottom:5%;">
                    <h4 style="font-weight: bold;">Sản phẩm mới</h4>
                    <div class="container-fluid" style="background-color: white;border: 1px solid #f4f4f4;width:100%;margin-left:0%;">
                    @foreach($cay as $value)    
                        <div class="row " style="height:80px;overflow: hidden;border-bottom: 1px solid #f4f4f4;padding: 2%;">
                            <div class="col-md-5">
                                <img style="width:100%;height:60px;" src="../admin/img/cay/{{$value->anh}}" alt="">
                            </div>
                            <div class="col-md-7" >
                                <div  style="height:35%;word-wrap:break-word;overflow: hidden;">
                                    <a href="chitietcay/{{$value->id}}" style="word-wrap:break-word;text-decoration:none;color: black;font-weight:bold;">{{$value->ten}}</a>
                                </div>
                                <div >
                                <p><?php if($value->khuyenmai==0)
                                    echo "<span  style='color: rgb(18, 107, 110);font-weight:bold;font-size:16px;'>".number_format($value->gia) ."₫</span>";
                                else
                                    echo "<strike style='font-size:1vw;color:#ccc;'>" .number_format($value->gia) ."₫</strike> <span style='color:rgb(18, 107, 110);font-weight:bold;font-size:16px;'>" .number_format($value->khuyenmai)."₫</span>";
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