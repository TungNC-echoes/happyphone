@extends('site.layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <form action="" method="post" id="dangky" class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" id="email" name="email">
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Fullname*</label>
                        <input type="text" id="your_last_name" name="fullname">
                    </div>

                    <div class="form-block">
                        <label for="adress">Address*</label>
                        <input type="text" id="adress" value="" name="address">
                    </div>


                    <div class="form-block">
                        <label for="phone">Phone*</label>
                        <input type="text" id="phone" name="phone">
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="password" style="height: 35px" id="password" name="password">
                    </div>
                    <div class="form-block">
                        <label for="phone">Re password*</label>
                        <input type="password" id="repassword" style="height: 35px" name="repassword">
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary dangky">Register</button>
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
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            jQuery.validator.addMethod("fullname", function(value) {
                return /^[a-zA-Z]/.test(value);
            }, "Tên không hợp lệ");
            $('#dangky').validate({
                rules:{
                    email:{
                        required:true,
                        email:true,
                        remote: {
                            url: "check-email.html",
                            type: "post",
                            data: {_token: CSRF_TOKEN},
                        }
                    },
                    fullname:{
                        required:true,
                        fullname:true,
                        minlength:3
                    },
                    address:{
                        required:true,
                        minlength:3
                    },
                    phone:{
                        required:true,
                        number:true
                    },
                    password:{
                        required:true,
                        minlength:6
                    },
                    repassword:{
                        required:true,
                        minlength:6,
                        equalTo:'#password'
                    }

                } ,
                messages:{
                    email:{
                        required:'Bạn chưa nhập Email',
                        email:'Emai không hợp lệ',
                        remote:'Email đã được sử dụng rồi'
                    },
                    fullname:{
                        required:'Bạn chưa điền tên',
                        minlength:'Tên tối thiểu 3 ký tự',
                    },
                    address:{
                        required:'Bạn chưa điền địa chỉ',
                        minlength:'Địa chỉ tối thiểu 3 ký tự',
                    },
                    phone:{
                        required:'Bạn chưa điền số điện thoại',
                        number:'Số điện thoại không hợp lệ',
                    },
                    password:{
                        required:'Bạn chưa điền mật khẩu',
                        minlength:'Mật khẩu tối thiểu 6 ký tự',
                    },
                    repassword:{
                        required:'Bạn chưa điền lại mật khẩu',
                        equalTo:'Mật khẩu không khớp',
                    }
                }
            });
            $('.dangky').click(function () {
                if($('#dangky').valid()){
                    return true;
                }
                return false;

            });
        })
    </script>
@endsection