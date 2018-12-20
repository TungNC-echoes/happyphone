<div id="left_content">
    <div id="leftSide" style="padding-top:30px;">

        <!-- Account panel -->

        <div class="sideProfile">
            <a href="admin/admin/edit/{{Auth::guard('admin')->user()->id}}.html" title="" class="profileFace"><img width="40" src="source/backend/admin/images/user.png" /></a>
            <span>Xin chào: <strong>admin!</strong></span>
            <span>{{Auth::guard('admin')->user()->user_name}}</span>
            <div class="clear"></div>
        </div>
        <div class="sidebarSep"></div>
        <!-- Left navigation -->

        <ul id="menu" class="nav">

            <li class="home">

                <a href="admin/home/index.html" class="active" id="current">
                    <span>Bảng điều khiển</span>
                    <strong></strong>
                </a>


            </li>
            <li class="tran">

                <a href="admin/tran.html" class=" exp" >
                    <span>Quản lý bán hàng</span>
                    <strong>2</strong>
                </a>

                <ul class="sub">
                    <li >
                        <a href="{{route('transaction')}}">
                            Giao dịch							</a>
                    </li>
                    <li >
                        <a href="{{route('order')}}">
                            Đơn hàng sản phẩm							</a>
                    </li>
                </ul>

            </li>
            <li class="product">

                <a href="admin/product.html" class=" exp" >
                    <span>Sản phẩm</span>
                    <strong>3</strong>
                </a>

                <ul class="sub">
                    <li >
                        <a href="{{route('product')}}">
                            Sản phẩm							</a>
                    </li>
                    <li >
                        <a href="{{route('catalog')}}">
                            Danh mục							</a>
                    </li>
                    <li >
                        <a href="{{route('contact')}}">
                            Phản hồi							</a>
                    </li>
                </ul>

            </li>
            <li class="account">

                <a href="admin/account.html" class=" exp" >
                    <span>Tài khoản</span>
                    <strong>2</strong>
                </a>

                <ul class="sub">
                    <li >
                        <a href="admin/admin/view.html">
                            Admin							</a>
                    </li>
                    <li >
                        <a href="{{route('user')}}">
                            Khách hàng							</a>
                    </li>
                </ul>

            </li>
            <li class="content">

                <a href="admin/content.html" class=" exp" >
                    <span>Nội dung</span>
                    <strong>1</strong>
                </a>

                <ul class="sub">
                    <li >
                        <a href="{{route('slide')}}">
                            Slide							</a>
                    </li>
                </ul>

            </li>

        </ul>

    </div>
    <div class="clear"></div>
</div>
