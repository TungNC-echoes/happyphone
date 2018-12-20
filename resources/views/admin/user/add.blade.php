@extends('admin.layout')
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Khách hàng</h5>
                <span>Quản lý khách hàng</span>
            </div>

            <div class="horControlB menu_action">
                <ul>
                    <li><a href="admin/user/add.html">
                            <img src="source/backend/admin/images/icons/control/16/add.png" />
                            <span>Thêm mới</span>
                        </a></li>
                    <li><a href="admin/user/view.html">
                            <img src="source/backend/admin/images/icons/control/16/list.png" />
                            <span>Danh sách</span>
                        </a></li>

                </ul>
            </div>

            <div class="clear"></div>
        </div>
    </div>
    <div class="line"></div>
    <!-- Message -->

    <!-- Main content wrapper -->
    <div class="wrapper">

        <!-- Form -->
        <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="source/backend/admin/images/icons/dark/add.png" class="titleIcon" />
                        <h6>Thêm mới khách hàng</h6>
                    </div>

                    <div class="formRow">
                        <label class="formLeft" for="param_name">Tên khách hàng:<span class="req">*</span></label>
                        <div class="formRight">
                            <span class="oneTwo"><input name="name" autocomplete="off" value="{{old('name')}}" id="param_name" _autocheck="true" type="text" required /></span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_email">Email:<span class="req">*</span></label>
                        <div class="formRight">
                            <span class="oneTwo"><input name="email" autocomplete="off" value="{{old('email')}}" id="param_email" _autocheck="true" type="text" required /></span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_phone">Số điện thoại:<span class="req">*</span></label>
                        <div class="formRight">
                            <span class="oneTwo"><input name="phone" autocomplete="off" value="{{old('phone')}}" id="param_phone" _autocheck="true" type="text" required /></span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_address">Địa chỉ:<span class="req">*</span></label>
                        <div class="formRight">
                            <span class="oneTwo"><input name="address" autocomplete="off" value="{{old('address')}}" id="param_address" _autocheck="true" type="text" required /></span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_password">Mật khẩu:<span class="req">*</span></label>
                        <div class="formRight">
                            <span class="oneTwo"><input name="password" value="" id="password" _autocheck="true" type="password" required /></span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_repassword">Nhập lại mật khẩu:<span class="req">*</span></label>
                        <div class="formRight">
                            <span class="oneTwo"><input name="repassword" value="" id="repassword" _autocheck="true" type="password" required /></span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formSubmit">
                        <input type="submit" id="add" value="Thêm mới" class="redB" />
                        <input type="reset" value="Hủy bỏ" class="basic" />
                    </div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="clear mt30"></div>
@endsection
@section('script')
    <script>
        $(document).ready(function ($) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            jQuery.validator.addMethod("fullname", function(value) {
                return /^[a-zA-Z]/.test(value);
            }, "Tên không hợp lệ");
            $('#form').validate({
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
                    name:{
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
                    name:{
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
            $('#add').click(function () {
                if($('#form').valid()){
                    return true;
                }
                return false;
            });
        })
    </script>
@endsection
