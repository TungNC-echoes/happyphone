@extends('site.layout')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Thay đổi tài khoản</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="{{route('trangchu')}}">Trang chủ</a> / <span>Thay đổi tài khoản</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">
            <form action="" method="post" id="thaydoitk" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h4>Thay đổi tài khoản</h4>
                        <div class="space20">&nbsp;</div>
                        @if($user)
                            <div class="form-block">
                                <label for="your_last_name">Fullname*</label>
                                <input type="text" value="{{$user->full_name}}" id="your_last_name" name="fullname">
                            </div>

                            <div class="form-block">
                                <label for="adress">Address*</label>
                                <input type="text" id="adress" value="{{$user->address}}" name="address">
                            </div>


                            <div class="form-block">
                                <label for="phone">Phone*</label>
                                <input type="text" id="phone" value="{{$user->phone}}" name="phone">
                            </div>
                        @else
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
                        @endif
                        <div class="form-block">
                            <label for="phone">New Password</label>
                            <input type="password" style="height: 35px" id="password" name="password">
                        </div>
                        <div class="form-block">
                            <label for="phone">Re password</label>
                            <input type="password" id="repassword" style="height: 35px" name="repassword">
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary changeacc">Thay đổi</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
                <p class="col-sm-offset-4" style="color: red"><b>Chú ý</b> : <i>Nếu bạn không thay đổi password thì không cần phải nhập vào</i></p>
        </div> <!-- #content -->

    </div> <!-- .container -->
@endsection
@section('script')
    <script>
        $(document).ready(function ($) {
            jQuery.validator.addMethod("fullname", function(value) {
                return /^[a-zA-Z]/.test(value);
            }, "Tên không hợp lệ");
            $('#thaydoitk').validate({
                rules:{
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
                        minlength:6
                    },
                    repassword:{
                        minlength:6,
                        equalTo:'#password'
                    }

                } ,
                messages:{
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
                        minlength:'Mật khẩu tối thiểu 6 ký tự',
                    },
                    repassword:{
                        equalTo:'Mật khẩu không khớp',
                    }
                }
            });
            $('.changeacc').click(function () {
                if($('#thaydoitk').valid()){
                    return true;
                }
                return false;

            });
        })
    </script>
@endsection