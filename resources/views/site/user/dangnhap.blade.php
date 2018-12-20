@extends('site.layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng nhập</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Đăng nhập</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <form action="" method="post" id="dangnhap" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" id="email" name="email">
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="password" style="height: 35px" id="password" name="password">
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary dangnhap">Login</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection
@section('script')
    <script>
        $(document).ready(function ($) {
            $('#dangnhap').validate({
                rules:{
                    email:{
                        required:true,
                        email:true
                    },
                    password:{
                        required:true
                    },
                },
                messages: {
                    email: {
                        required: 'Bạn chưa nhập Email',
                        email: 'Emai không hợp lệ'
                    },
                    password: {
                        required: 'Bạn chưa điền mật khẩu'
                    }
                }

            });
            $('.dangnhap').click(function () {
                if($('#dangnhap').valid()){
                    return true;
                }
                return false;

            });
        });
    </script>
@endsection