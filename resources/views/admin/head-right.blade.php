<div class="topNav">
    <div class="wrapper">
        <div class="welcome">
            <span>Xin chào: <b>admin!</b></span>
        </div>

        <div class="userNav">
            <ul>
                <li><a href="{{route('index')}}" target="_blank">
                        <img style="margin-top:7px;" src="source/backend/admin/images/icons/light/home.png" />
                        <span>Trang chủ</span>
                    </a></li>

                <!-- Logout -->
                <li><a href="{{route('logout')}}">
                        <img src="source/backend/admin/images/icons/topnav/logout.png" alt="" />
                        <span>Đăng xuất</span>
                    </a></li>

            </ul>
        </div>

        <div class="clear"></div>
    </div>
</div>
<div id="thonbao" style="display: none">
    @if(session('thongbao'))
        <p class="nd">{{ session('thongbao') }}</p>
    @endif
</div>
<!-- Main content -->

<script type="text/javascript">
    (function($)
    {
        $(document).ready(function()
        {
            var main = $('#form');

            // Tabs
            main.contentTabs();

        });
    })(jQuery);
</script>