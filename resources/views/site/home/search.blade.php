@extends('site.layout')
@section('content')
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Kết quả tìm kiếm: <i><b>{{$key}}</b></i></h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Có {{$count}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            <?php $i = 0;?>
                            @foreach($result as $row)
                                <?php $i++?>
                                <div class="col-sm-2 col-xs-4">
                                    <div class="single-item">
                                        @if($row->promotion_price != 0)
                                            <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="{{route('chitiet',$row->id)}}">
                                                <img src="source/image/product/{{$row->image}}" alt="" height="200px">
                                            </a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$row->name}}</p>
                                            @if($row->promotion_price == 0)
                                                <p class="single-item-price singer-item-phone">
                                                    <span>{{number_format($row->unit_price)}} VNĐ</span><br><br>
                                                </p>
                                            @else
                                                <p class="single-item-price">
                                                    <span class="flash-del">{{number_format($row->unit_price)}} VNĐ</span><br>
                                                    <span class="flash-sale">{{number_format($row->promotion_price)}} VNĐ</span>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left"  product_id="{{$row->id}}" ><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="{{route('chitiet',['id' => $row->id ])}}">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                @if($i%6==0)
                                    <div class="space50">&nbsp;</div>
                                @endif
                            @endforeach
                        </div>
                        <div class="row">{{$result->appends(request()->input())->links()}}</div>
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection