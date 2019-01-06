<style>
    [view=footer] {
        display: flex;
        align-items: center;
        flex-flow: column nowrap;
        background: rgb(37, 57, 81);
        padding-top: 40px;
        padding-bottom: 40px;
    }

    [view=footer] .main {
        display: flex;
        width: 100%;
    }

    [view=footer] .main > :not(:first-child) {
        margin-left: 8px;
    }

    [view=footer] .main > :not(:last-child) {
        margin-right: 8px;
    }

    [view=footer] .main .col {
        width: 25%;
    }

    [view=footer] h4 {
        color: orange;
        font-family: Lato !important;
        font-size: 24px;

        margin-bottom: 10px;
    }

    [view=footer] h4 span {
        font-family: Material Icons;
        font-size: 24px;
    }

    [view=footer] p {
        color: white;
        font-family: Arial !important;
        font-size: 14px;
    }

</style>

<div view="footer">
    <div class="main row">
        <div class="col-12">
            <div class="col-md-3 col-xs-6">
                <h4>Like và share</h4>
                <div class="fb-like" data-href="http://websitebanhang.gq/index" width="100"
                             data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=297041787469942&autoLogAppEvents=1';
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
            </div>
            <div class="col-md-3 col-xs-6">
                <h4><span></span> Hỗ trợ tư vấn</h4>
                <p>Hỗ trợ tư vấn trực tuyến nhiệt tình. Giúp quý khách sớm giải tỏa thắc mắc.</p>
            </div>

            <div class="col-md-3 col-xs-6">
                <h4><span></span> Quà tặng khuyến mãi</h4>
                <p>Khi mua sản phẫm sẽ được nhiều phần quà khuyến mại kèm theo hấp dấn.Chúng tôi thường tổ chức các chương trình khuyến mãi vào dịp lễ tết.</p>
            </div>

            <div class="col-md-3 col-xs-6">
                <h4><span></span> Đảm bảo</h4>
                <p>Chúng tôi cam đoan sẽ giao hàng cho bạn trong thời gian sớm nhất kể từ khi xác nhận đơn đặt hàng của bạn.</p>
            </div>
        </div>
    </div>

</div>

