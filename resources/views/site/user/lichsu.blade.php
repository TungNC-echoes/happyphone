@extends('site.layout')
@section('content')
    <div class="wrapper">
        <div class="widget">
            <div class="title">
                <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
                <h6>Danh sách các sản phẩm đã đặt</h6>

                <div class="num f12">Tổng số sản phẩm đã đặt: <b>{{count($orders)}}</b></div>
            </div>
        </div>
    </div>
    <div data-v-6150d07e="" class="table-responsive mb-4">
        @if(count($orders)>0)
        <table data-v-6150d07e="" class="table">
            <thead data-v-6150d07e="">
            <tr data-v-6150d07e="">
                <th data-v-6150d07e="">Mã số đơn hàng</th>
                <th data-v-6150d07e="">Mã số giao dịch</th>
                <th data-v-6150d07e="">Sản phẩm</th>
                <th data-v-6150d07e="">Số tiền</th>
                <th data-v-6150d07e="">Số lượng</th>
                <th data-v-6150d07e="">Ngày tạo</th>
            </tr>
            </thead>
            <tbody data-v-6150d07e="">
            @foreach ($orders as $order)
                <tr data-v-6150d07e="">
                    <td data-v-6150d07e="">{{ $order->id }}</td>
                    <td data-v-6150d07e="">{{$order->id_bill}}</td>
                    <td data-v-6150d07e="">
                        <div class="image_thumb">
                            <img src="source/image/product/{{$order->image}}" height="70">
                        </div>
                        <div style="margin-top: 17px">
                            <a href="{{route('chitiet',['id' =>$order->id_product ])}}" class="tipS" title="" target="_blank">
                                <b>{{$order->name}}</b>
                            </a>
                        </div>
                        <div class="clear"></div>
                    </td>
                    <td data-v-6150d07e="">
                        <span data-v-6150d07e="">{{number_format($order->unit_price)}} đ</span>
                    </td>
                    <td data-v-6150d07e="">{{$order->quantity}}</td>
                    <td data-v-6150d07e="">{{$order->created_at}}</td>
                </tr>

            @endforeach
            </tbody>
        </table>
        @else
            <h5 style="margin: 15px">Bạn chưa mua sản phẩm nào !!!</h5>
        @endif
    </div>
    <div class="clear mt30"></div>
@endsection
