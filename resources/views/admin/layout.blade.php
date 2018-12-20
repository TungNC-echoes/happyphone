@include('admin.header')
<body>

<!-- Left side content -->
@include('admin.sidebar')


<!-- Right side -->
<div id="rightSide">

    <!-- Account panel top -->

    <div class="topNav">
        @include('admin.head-right')
    </div>

    <!-- Main content -->

    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Bảng điều khiển</h5>
                <span>Trang quản lý hệ thống</span>
            </div>

            <div class="clear"></div>
        </div>
    </div>

    <div class="line"></div>


    <!-- Message -->


    <!-- Main content wrapper -->
    @yield('content')
    <div class="clear mt30"></div>

    <!-- Footer -->
    @include('admin.footer')
</div>
<div class="clear"></div>
</body>
</html>