<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a style="text-decoration: none"><i class="fa fa-home"></i> Trường ĐHBKHN</a></li>
                    <li><a style="text-decoration: none"><i class="fa fa-phone"></i> 0384 102 112 </a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                    <li><a href="{{route('thaydoitk')}}" id="user"><i class="fa fa-user"></i>{{(Auth::user())->full_name}}</a></li>
                        <li><a href="{{route('dangxuat')}}">Đăng xuất</a></li>
                    @else
                        <li><a href="{{route('dangky')}}">Đăng kí</a></li>
                        <li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="index.html" id="logo"><img style="opacity: 0" src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('search')}}">
                        <input type="text" value="" class="search-input" name="s" id="s" autocomplete="off" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    <div class="cart" id="div-cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i><span id="count">Giỏ hàng (Trống)</span><i class="fa fa-chevron-down"></i></div>
                        {{--@if(count($cart)==0)--}}
                        {{--<div class="beta-select"><i class="fa fa-shopping-cart"></i> <span id="count">Giỏ hàng (Trống)</span> <i class="fa fa-chevron-down"></i></div>--}}
                        {{--@else--}}
                            {{--<div class="beta-select"><i class="fa fa-shopping-cart"></i> <span id="count">Giỏ hàng ( {{$count}} )</span> <i class="fa fa-chevron-down"></i></div>--}}
                        {{--<div class="beta-dropdown cart-body" style="width: 360px" id="noidung">--}}
                            {{--<div style="height: 310px;overflow: auto;" id="result">--}}
                                {{--<div id="cart">--}}
                                {{--@foreach($cart as $row)--}}
                                    {{--<div class="cart-item">--}}
                                         {{--<div class="media col-sm-10">--}}
                                             {{--<a class="pull-left" href="#" style="width: 70px;"><img src="source/image/product/{{$image[$row->id]}}" height="70px"></a>--}}
                                             {{--<div class="media-body">--}}
                                                 {{--<span class="cart-item-title">{{$row->name}}</span>--}}
                                                 {{--<span class="cart-item-amount">{{$row->price}}</span>--}}
                                                 {{--<input type="number" id="number" value="{{$row->qty}}" product_id="{{$row->id}}" min="1" style="width: 40px">--}}
                                             {{--</div>--}}
                                         {{--</div>--}}
                                        {{--<a class="col-sm-2" href="#" style="margin-top: 15px"><img src="source/image/delete.png"></a>--}}
                                        {{--<div class="clearfix"></div>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="cart-caption">--}}
                                {{--<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value" id="total"></span></div>--}}
                                {{--<div class="clearfix"></div>--}}

                                {{--<div class="center">--}}
                                    {{--<div class="space10">&nbsp;</div>--}}
                                    {{--<a href="checkout.html" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--@endif--}}
                    </div> <!-- .cart -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('trangchu')}}">Trang chủ</a></li>
                    <li><a>Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($loaisp as $row)
                                <li><a href="{{route('loaisp',['id' => $row->id])}}">{{$row->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
                    <li><a href="{{route('lienhe')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
    <div id="thonbao" style="display: none">
        @if(session('thongbao'))
            <p class="nd">{{ session('thongbao') }}</p>
        @endif
    </div>

</div> <!-- #header -->
