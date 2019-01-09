<table width="75%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tbody><tr><td colspan="2"></td><td colspan="3" bgcolor="#E8E8E8" height="1px"></td><td colspan="3"></td></tr>
    <tr>
        <td bgcolor="#F8F8F8" width="1px"></td>
        <td bgcolor="#E8E8E8" width="1px"></td>
        <td bgcolor="#D1D1D1" width="1px"></td>
        <td>
            <div class="m_-5422268179432338897header">
                <div class="m_-5422268179432338897header-banner">
                    <table class="m_-5422268179432338897header" lang="header" cellpadding="0" cellspacing="0" width="100%" border="0" style="width:100%">
                        <tbody>
                        <tr>
                            <td width="100%" height="70" valign="top" bgcolor="#183545" style="background:#183545;height:70px">
                                <table cellpadding="0" cellspacing="0" width="100%" height="70" border="0" style="width:100%;height:70px">
                                    <tbody>
                                    <tr>
                                        <td class="m_-5422268179432338897space40" style="width:20px" width="20"><div lang="space40"></div></td>
                                        <td valign="middle" align="left">
                                            <div class="m_-5422268179432338897spacer" style="font-size:15px;line-height:15px;height:15px">&nbsp; </div>
                                            <div class="m_-5422268179432338897spacer" style="font-size:15px;line-height:15px;height:15px">&nbsp; </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="m_-5422268179432338897header-title">Yêu cầu đặt hàng đã được tiếp nhận</div>
                <div class="m_-5422268179432338897header-progressBar">
                    <img src="https://ci4.googleusercontent.com/proxy/GslMmGIR2boliFQQGegiXIVGX7_do9pFc4bKpp8sHuxq8P9r6_K8pW4Pungn2GzwzXANdnaMkm7Gbhs9ARkIbKPpypqqJTVGdlKASf4Yxh00JyefK_bD9aGpY93U45yU3ysK3lx7AfnqL_zVXv1Nv7ojC89jJ99XI0m6qGJRfXP5FRaOV1pdb9qDx8Dx=s0-d-e1-ft#http://static.cdn.responsys.net/i5/responsysimages/lazada/contentlibrary/!images/vn_progressbar_2018/vn-progressbar-01.jpg" style="max-height:120px" border="0" class="CToWUd">
                </div>
            </div>
            <div class="m_-5422268179432338897section m_-5422268179432338897section--dark">
                <div class="m_-5422268179432338897section-content">
                    <h2>{{$user->full_name}}  thân mến,</h2>

                    <div class="m_-5422268179432338897hide">
                    </div>
                    <p>Yêu cầu đặt hàng cho đơn hàng <span class="m_-5422268179432338897text-orange-normal">#{{$order->id}}</span> của bạn đã được tiếp nhận và đang chờ xử lý, thời gian đặt hàng là {{ $order->date_order }} với hình thức thanh toán là <b>{{$order->payment}}</b>. Chúng tôi sẽ tiếp tục cập nhật với bạn về trạng thái tiếp theo của đơn hàng.</p>
                </div>
            </div>
            <div class="m_-5422268179432338897section">
                <div class="m_-5422268179432338897section-header m_-5422268179432338897section-header--yourPackage">Đơn hàng của bạn</div>
                <div class="m_-5422268179432338897section-content">
                    <div class="m_-5422268179432338897two-column-left">
                        Thời gian giao hàng dự kiến:<br>
                        <p style="margin-top:5px;margin-bottom:5px"><b>Kiện hàng #1:</b> <?php $mydate = $order->date_order; ?>
                            {{ date('d-m-Y', strtotime($mydate.' + 2 days'))}} đến {{ date('d-m-Y', strtotime($mydate.' + 4 days'))}}</p>
                    </div>
                </div>
            </div>
            <div class="m_-5422268179432338897section">
                <div class="m_-5422268179432338897section-header m_-5422268179432338897section-header--whatsNext">Bước tiếp theo</div>
                <div class="m_-5422268179432338897section-content m_-5422268179432338897section-content--justify">
                    <ul>
                        <li>Bạn vui lòng chuẩn bị sẵn số tiền mặt tương ứng để thuận tiện cho việc thanh toán.</li>
                        <li>Trong một số trường hợp, Happy Phone sẽ thực hiện cuộc gọi tự động hoặc gửi tin nhắn đến số điện thoại bạn đã đăng ký để xác nhận đơn hàng. Để đơn hàng được xử lý nhanh chóng, bạn vui lòng thực hiện theo hướng dẫn của cuộc gọi hoặc nội dung tin nhắn nhận được. Nếu Happy Phone không nhận được phản hồi từ bạn, đơn hàng sẽ được ngưng thực hiện do xác nhận không thành công.</li>
                        <li>Trong trường hợp đơn hàng có dịch vụ kèm theo, Happy Phone sẽ liên hệ với bạn để xác nhận một số thông tin liên quan đến việc thực hiện dịch vụ (thời gian, địa điểm,...).</li>
                        <li>Bạn không cần phải trả bất kỳ khoản tiền đặt cọc nào. Vui lòng liên hệ chúng tôi tại trang <a href="http://happyphone.com/lienhe" target="_blank">Liên hệ</a>.</li>
                    </ul>
                </div>
            </div>
            <div class="m_-5422268179432338897section">
                <div class="m_-5422268179432338897section-header m_-5422268179432338897section-header m_-5422268179432338897section-header--deliveredTo">Đơn hàng được giao đến</div>
                <div class="m_-5422268179432338897section-content">
                    <div class="m_-5422268179432338897two-column-left">
                        <span class="m_-5422268179432338897text-orange-normal">{{$user->full_name}} </span> <br>
                        {{$user->address}} <br>

                    </div>
                    <div class="m_-5422268179432338897two-column-right">
                        Điện thoại: {{$user->phone}}<br>
                        Email: <a href="mailto:+bkaprodx@gmail.com" target="_blank">{{$user->email}}</a>
                    </div>
                </div>
            </div>
            <div class="m_-5422268179432338897section">
                <div class="m_-5422268179432338897section-header m_-5422268179432338897section-header--itemsDetails">Chi tiết đơn hàng</div>
                <div class="m_-5422268179432338897section-content">
                    <div class="m_-5422268179432338897shipmentIndex">
                        <p><b>KIỆN HÀNG #1</b><br>
                            {{ date('d-m-Y', strtotime($mydate.' + 2 days'))}} đến {{ date('d-m-Y', strtotime($mydate.' + 4 days'))}}</p></p>
                    </div>
                    <?php foreach ($order_detail as $detail): ?>
                    <div class="m_-5422268179432338897product">
                        <div class="m_-5422268179432338897product-productImage">
                            <a href="#"
                               target="_blank" data-saferedirecturl="#">
                                <img src="<?php echo $message->embed('source/image/product/'.$detail->image); ?>" width="160px" class="CToWUd">
                            </a>
                        </div>
                        <div class="m_-5422268179432338897product-productInfo">
                            <div class="m_-5422268179432338897product-productInfo-name">
                                <a href="#">{{ $detail->name }}</a>
                            </div>
                            <div class="m_-5422268179432338897product-productInfo-price">
                                {{ $detail->unit_price }} VNĐ
                            </div>
                            <div class="m_-5422268179432338897product-productInfo-subInfo">
                                Số lượng: {{ $detail->quantity }}<br>
                                Sản Phẩm: {{ $detail->name}}
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="m_-5422268179432338897checkout">
                        <div class="m_-5422268179432338897two-column-left">
                            <div class="m_-5422268179432338897checkout-info m_-5422268179432338897checkout-info--deliveryType">Giao hàng Tiêu chuẩn: {{$order->payment}}</div>
                        </div>
                        <div class="m_-5422268179432338897two-column-right">
                            <table class="m_-5422268179432338897checkout-amount" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td valign="top">Thành tiền: </td>
                                    <td valign="top" align="right">{{$order->total}} VNĐ</td>
                                </tr>
                                <tr class="m_-5422268179432338897total">
                                    <td valign="top">Tổng cộng: </td>
                                    <td valign="top" align="right">{{$order->total}} VNĐ</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m_-5422268179432338897section m_-5422268179432338897section--dark">
                <div class="m_-5422268179432338897section-header m_-5422268179432338897section-header--notes">Lưu ý</div>
                <div class="m_-5422268179432338897section-content">
                    <p>Bạn có thể tham khảo thêm thông tin tại trang <a href="http://happyphone.com" target="_blank">Trung tâm hỗ trợ</a> hoặc liên hệ với chúng tôi tại trang <a href="http://happyphone.com/lienhe" target="_blank" >Liên hệ</a>.</p>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>