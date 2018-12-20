@extends('site.layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('trangchu')}}">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">

        <form action="" method="post" id="xulydathang" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-sm-6">
                    <div class="beta-breadcrumb">
                        <h4><span >Thông tin cá nhân</span> / <a href="{{route('thaydoitk')}}">Thay đổi</a></h4>
                    </div>
                    <div class="space20">&nbsp;</div>

                    @if($user)
                        <div class="form-block">
                            <label for="your_last_name">Fullname</label>
                            <input type="text" value="{{$user->full_name}}" disabled id="your_last_name" name="fullname">
                        </div>
                        <div class="form-block">
                            <label for="email">Email address</label>
                            <input type="email" id="email" disabled value="{{$user->email}}" name="email">
                        </div>
                        <div class="form-block">
                            <label for="adress">Address</label>
                            <input type="text" id="adress" disabled value="{{$user->address}}" name="address">
                        </div>


                        <div class="form-block">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" disabled value="{{$user->phone}}" name="phone">
                        </div>
                    @else
                        <div class="form-block">
                            <label for="your_last_name">Fullname*</label>
                            <input type="text" id="your_last_name" name="fullname">
                        </div>
                        <div class="form-block">
                            <label for="email">Email address*</label>
                            <input type="email" id="email" name="email">
                        </div>
                        <div class="form-block">
                            <label for="adress">Address*</label>
                            <input type="text" id="adress" value="" name="address">
                        </div>
                        <div class="form-block">
                            <label for="phone">Phone*</label>
                            <input type="text" id="phone" name="phone">
                        </div>
                    @endif
                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea id="notes" name="note"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" id="order" style="padding: 0px 10px">
                            <div style="overflow: auto;max-height: 520px">
                            @foreach($cart as $row)
                            <div class="your-order-item" id="{{$row->rowId}}">
                                <div>
                                    <!--  one item	 -->
                                    <div class="media">
                                        <img width="25%" src="source/image/product/{{$image[$row->id]}}" alt="" class="pull-left">
                                        <div class="media-body">
                                            <p class="font-large">{{$row->name}}</p>
                                            <span class="color-gray your-order-info" id="gia">Giá : {{number_format($row->price,0)}} VNĐ</span>
                                            <span class="color-gray your-order-info" id="qty">Số lượng : {{$row->qty}}</span>
                                            <span class="color-gray your-order-info" id="thanhtien">Thành tiền : {{number_format($row->price*$row->qty,0)}} VNĐ</span>
                                        </div>
                                    </div>
                                    <!-- end one item -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @endforeach
                            </div>
                            @if($total>0)
                                 <h5 id="tongtien">Tổng tiền : {{$total}} VNĐ</h5>
                             @endif
                        </div>
                        <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>
                                </li>

                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                                    <label for="payment_method_cheque">Chuyển khoản </label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Chuyển tiền đến tài khoản sau:
                                        <br>- Số tài khoản: 123 456 789
                                        <br>- Chủ TK: Nguyễn A
                                        <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <div class="text-center"><button class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
@section('script')
    <script>
        $(document).ready(function($) {
            $('button').click(function () {
                if($('#count').html()=='Giỏ hàng (Trống)'){
                    $.alert({
                        theme: 'material',
                        title:'',
                        content: 'Đơn hàng của bạn trống,Vui lòng thêm sản phẩm vào giỏ hàng trước khi đặt hàng',
                        buttons: {
                            OK: {
                                btnClass: 'btn-blue',
                                action:function () {
                                    window.location.href = 'index.html';
                                }
                            }
                        }
                    });
                    return false;
                }
            });
        });
    </script>
@endsection