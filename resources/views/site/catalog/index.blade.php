@extends('site.layout')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('trangchu')}}">Trang chủ</a> / <span>Loại Sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="aside-menu">
                            @foreach($loaisp as $row)
                                <li><a href="{{route('loaisp',$row->id)}}">{{$row->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">
                            <h4>Sản phẩm mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Có {{count($product_theoloaisp)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($product_theoloaisp as $row)
                                    <div class="col-sm-4">
                                        <div class="single-item">
                                            @if($row->promotion_price != 0)
                                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="{{route('chitiet',$row->id)}}">
                                                    <img src="source/image/product/{{$row->image}}" alt="" height="250px">
                                                </a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$row->name}}</p>
                                                @if($row->promotion_price == 0)
                                                    <p class="single-item-price">
                                                        <span>{{number_format($row->unit_price)}} VNĐ</span>
                                                    </p>
                                                @else
                                                    <p class="single-item-price">
                                                        <span class="flash-del">{{number_format($row->unit_price)}} VNĐ</span>
                                                        <span class="flash-sale">{{number_format($row->promotion_price)}} VNĐ</span>
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" product_id="{{$row->id}}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{route('chitiet',$row->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Sản phẩm khuyến mại</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Có {{count($sanphamkhuyenmai)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($sanphamkhuyenmai as $row)
                                <div class="col-sm-4">
                                    <div class="single-item">
                                        @if($row->promotion_price != 0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('chitiet',$row->id)}}">
                                                <img src="source/image/product/{{$row->image}}" alt="" height="250px">
                                            </a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$row->name}}</p>
                                            @if($row->promotion_price == 0)
                                                <p class="single-item-price">
                                                    <span>{{number_format($row->unit_price)}} VNĐ</span>
                                                </p>
                                            @else
                                                <p class="single-item-price">
                                                    <span class="flash-del">{{number_format($row->unit_price)}} VNĐ</span>
                                                    <span class="flash-sale">{{number_format($row->promotion_price)}} VNĐ</span>
                                                </p>
                                            @endif
                                        </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" product_id="{{$row->id}}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{route('chitiet',$row->id)}}">Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>


                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection