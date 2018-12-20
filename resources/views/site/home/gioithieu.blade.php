@extends('site.layout')
@section('content')
    <div class="container">
        <div id="content">
            @if(Session::has('flag'))
                <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}

                </div>
            @endif
            @if(Session::has('thongbao'))
                <div class="alert alert-success" style="background:#00ced1;font-size:16px;color:black">
                    {{Session::get('thongbao')}}
                </div>
            @endif
            @if(Session::has('loi'))
                <div class="alert alert-danger" style="background:Red; color:black;font-size:16px;">
                    {{Session::get('loi')}}
                </div>
            @endif
           <!--  <div class="our-history">
               <h2 class="text-center wow fadeInDown">Our History</h2>
               <div class="space35">&nbsp;</div>
           
               <div class="history-slider">
                   <div class="history-navigation">
                       <a data-slide-index="0" href="blog_with_2sidebars_type_e.html" class="circle"><span
                                   class="auto-center">2011</span></a>
                       <a data-slide-index="1" href="blog_with_2sidebars_type_e.html" class="circle"><span
                                   class="auto-center">2012</span></a>
                       <a data-slide-index="2" href="blog_with_2sidebars_type_e.html" class="circle"><span
                                   class="auto-center">2013</span></a>
                       <a data-slide-index="3" href="blog_with_2sidebars_type_e.html" class="circle"><span
                                   class="auto-center">2014</span></a>
                       <a data-slide-index="4" href="blog_with_2sidebars_type_e.html" class="circle"><span
                                   class="auto-center">2015</span></a>
                       <a data-slide-index="5" href="blog_with_2sidebars_type_e.html" class="circle"><span
                                   class="auto-center">2016</span></a>
                       <a data-slide-index="6" href="blog_with_2sidebars_type_e.html" class="circle"><span
                                   class="auto-center">2017</span></a>
                   </div>
           
                   <div class="history-slides">
                       <div>
                           <div class="row">
                               <div class="col-sm-2">
                                   <img src="source/assets/dest/images/history1.jpg" alt="">
                               </div>
                               <div class="col-sm-10">
                                   <h5 class="other-title">Thành lập</h5>
                                   <p style="font-style: italic">
                                       Trần Đại Nghĩa, Hai Bà Trưng, Hà Nội
                                   </p>
                                   <div class="space20">&nbsp;</div>
                                   <p> Hệ thống bán lẻ điện thoại toàn quốc: Điện thoại di động, Máy tính bảng, Phụ
                                       kiện chính hãng,... chính thức được khai trương và đi vào hoạt động</p>
                               </div>
                           </div>
                       </div>
                       <div>
                           <div class="row">
                               <div class="col-sm-2">
                                   <img src="source/assets/dest/images/history2.jpg" alt="">
                               </div>
                               <div class="col-sm-10">
                                   <h5 class="other-title">Những thành tựu đầu tiên</h5>
                                   <p>
                                       Doanh thu, khách hàng
                                   </p>
                                   <div class="space20">&nbsp;</div>
                                   <p> Sau năm đầu tien kinh doanh, BKsmart đã đạt doanh thu 3 tỷ đồng, một con số
                                       ngoài mong đợi. Lợi nhuận trước thuế đạt 1 tỷ đồng</p>
                               </div>
                           </div>
                       </div>
                       <div>
                           <div class="row">
                               <div class="col-sm-2">
                                   <img src="source/assets/dest/images/history3.jpg" alt="">
                               </div>
                               <div class="col-sm-10">
                                   <h5 class="other-title">Tiếp tục phát triển</h5>
                                   <div class="space20">&nbsp;</div>
                                   <p>Quy mô hoạt động của cửa hàng không ngừng được mở rộng. Cung cấp thêm các dịch vụ
                                       chăm sóc khách hàng như giao hàng tận nơi, đặt hàng online.... </p>
                               </div>
                           </div>
                       </div>
                       <div>
                           <div class="row">
                               <div class="col-sm-2">
                                   <img src="source/assets/dest/images/history4.jpg" alt="">
                               </div>
                               <div class="col-sm-10">
                                   <h5 class="other-title">Bước tiến trong bán hàng </h5>
                                   <div class="space20">&nbsp;</div>
                                   <p> Doanh thu của cửa hàng đã tăng gấp 3 lần so với năm đầu. Lượng khách hàng trong
                                       năm đã đạt cột mốc 10000</p>
                               </div>
                           </div>
                       </div>
                       <div>
                           <div class="row">
                               <div class="col-sm-2">
                                   <img src="source/assets/dest/images/history5.jpg" alt="">
                               </div>
                               <div class="col-sm-10">
                                   <h5 class="other-title">Tăng cường hợp tác</h5>
                                   <div class="space20">&nbsp;</div>
                                   <p>Với sự phát triển nhanh chóng và tầm ảnh hưởng lớn dần của mình, BKsmart ngày
                                       càng nhận được nhiều đề nghị hợp tác
                                       lâu dài từ các nhà cung cấp</p>
                               </div>
                           </div>
                       </div>
                       <div>
                           <div class="row">
                               <div class="col-sm-2">
                                   <img src="source/assets/dest/images/history6.jpg" alt="">
                               </div>
                               <div class="col-sm-10">
                                   <h5 class="other-title">Đột phá </h5>
                                   <div class="space20">&nbsp;</div>
                                   <p>Nâng cấp cơ sở hạ tầng, chuyển từ cửa hàng bán lẻ thành công ty TNHH phân phối
                                       sản phẩm công nghệ</p>
                               </div>
                           </div>
                       </div>
                       <div>
                           <div class="row">
                               <div class="col-sm-2">
                                   <img src="source/assets/dest/images/history7.jpg" alt="">
                               </div>
                               <div class="col-sm-10">
                                   <h5 class="other-title">Mục tiêu mới</h5>
                                   <div class="space20">&nbsp;</div>
                                   <p>Phấn đấu đạt doanh thu trên 10 tỷ, mở thêm các chi nhánh trong thành phố Hà Nội</p>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           
           <div class="space50">&nbsp;</div>
           <hr/>
           <div class="space50">&nbsp;</div>
           <h2 class="text-center wow fadeInDown">Phương châm của chúng tôi <br>là mang sự hài lòng đến cho mọi khách hàng</h2>
           <div class="space20">&nbsp;</div>
           <p class="text-center wow fadeInLeft"></p>
           <div class="space35">&nbsp;</div>
           
           <div class="row">
               <div class="col-sm-2 col-sm-push-2">
                   <div class="beta-counter">
                       <p class="beta-counter-icon"><i class="fa fa-user-o"></i></p>
                       <p class="beta-counter-value timer numbers" data-to="19855" data-speed="2000">19855</p>
                       <p class="beta-counter-title">Khách hàng hài lòng</p>
                   </div>
               </div>
           
               <div class="col-sm-2 col-sm-push-2">
                   <div class="beta-counter">
                       <p class="beta-counter-icon"><i class="fa fa-heart-o"></i></p>
                       <p class="beta-counter-value timer numbers" data-to="3568" data-speed="2000">18989</p>
                       <p class="beta-counter-title">Phản hồi hài lòng</p>
                   </div>
               </div>
           
               <div class="col-sm-2 col-sm-push-2">
                   <div class="beta-counter">
                       <p class="beta-counter-icon"><i class="fa fa-clock-o"></i></p>
                       <p class="beta-counter-value timer numbers" data-to="258934" data-speed="2000">258934</p>
                       <p class="beta-counter-title">Giờ phục vụ</p>
                   </div>
               </div>
           
               <div class="col-sm-2 col-sm-push-2">
                   <div class="beta-counter">
                       <p class="beta-counter-icon"><i class="fa fa-handshake-o"></i></p>
                       <p class="beta-counter-value timer numbers" data-to="150" data-speed="2000">20+</p>
                       <p class="beta-counter-title">Đối tác thân thiết</p>
                   </div>
               </div>
           </div> .beta-counter block end
           
           <div class="space50">&nbsp;</div>
           <hr/>
           <div class="space50">&nbsp;</div> -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection