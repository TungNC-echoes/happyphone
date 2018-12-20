@extends('admin.layout')
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Sản phẩm</h5>
                <span>Quản lý sản phẩm</span>
            </div>

            <div class="horControlB menu_action">
                <ul>
                    <li><a href="admin/product/add.html">
                            <img src="source/backend/admin/images/icons/control/16/add.png" />
                            <span>Thêm mới</span>
                        </a></li>
                    <li><a href="admin/product/view.html">
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
                        <h6>Thêm mới Sản phẩm</h6>
                    </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo"><input name="name" value="{{old('name')}}" id="param_name" _autocheck="true" type="text" required /></span>
                                    <span name="name_autocheck" class="autocheck"></span>
                                    <div name="name_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                                <div class="formRight">
                                    <div class="left"><input type="file"  id="image" name="image" required /></div>
                                    <div name="image_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <!-- Price -->
                            <div class="formRow">
                                <label class="formLeft" for="param_price">
                                    Giá :
                                    <span class="req">*</span>
                                </label>
                                <div class="formRight">
		<span class="oneTwo">
			<input name="price" value="{{old('price')}}" style='width:100px' id="param_price" class="format_number" _autocheck="true" type="text" required/>
			<img class='tipS' title='Giá bán sử dụng để giao dịch' style='margin-bottom:-8px'  src='source/backend/admin/crown/images/icons/notifications/information.png'/>
		</span>
                                    <span name="price_autocheck" class="autocheck"></span>
                                    <div name="price_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <!-- Price -->
                            <div class="formRow">
                                <label class="formLeft" for="param_discount">
                                    Giảm giá (VNĐ)
                                    <span></span>:
                                </label>
                                <div class="formRight">
		<span>
			<input name="discount" value="{{old('discount')}}" style='width:100px' id="param_discount" class="format_number"  type="text" />
			<img class='tipS' title='Số tiền giảm giá' style='margin-bottom:-8px'  src='source/backend/admin/crown/images/icons/notifications/information.png'/>
		</span>
                                    <span name="discount_autocheck" class="autocheck"></span>
                                    <div name="discount_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>


                            <div class="formRow">
                                <label class="formLeft" for="param_cat">Danh mục:<span class="req">*</span></label>
                                <div class="formRight">
                                    <select name="cat" _autocheck="true" id='param_cat' class="left">
                                        @foreach($loaisp as $row)
                                            @if(old('cat') == $row->id)
                                                <option value="{{$row->id}}" selected="selected">{{$row->name}}</option>
                                            @else
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                    <span name="cat_autocheck" class="autocheck"></span>
                                    <div name="cat_error" class="clear error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_name">Sản phẩm mới:<span class="req">*</span></label>
                                <div class="formRight">
                                        @if(old('new')==1)
                                            <span class="oneFour">Có<input name="new" value="1" type="radio" checked="checked" /></span>
                                            <span>Không<input name="new" value="0" type="radio" /></span>
                                        @else
                                            <span class="oneFour">Có<input name="new" value="1" type="radio" /></span>
                                            <span>Không<input name="new" value="0" type="radio" checked="checked"  /></span>
                                        @endif
                                </div>
                                <div class="clear"></div>
                            </div>

                        <div class="formRow">
                            <label for="param_mota" class="formLeft">Mô tả:<span class="req">*</span></label>
                            <div class="formRight">
                                    <span class="oneTwo">
                                        <textarea name="mota" id="param_mota" rows="5" required>{{old('mota')}}</textarea>

                                    </span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="param_mota"></div>
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
{{--@section('script')--}}
    {{--<script>--}}
        {{--(function($)--}}
        {{--{--}}
            {{--$(document).ready(function () {--}}
                {{--jQuery.validator.addMethod("fullname", function(value) {--}}
                    {{--return /^[a-zA-Z]/.test(value);--}}
                {{--}, "Tên không hợp lệ");--}}
                {{--// $('#form').validate({--}}
                {{--//     rules:{--}}
                {{--//         image:{--}}
                {{--//             required:true,--}}
                {{--//         },--}}
                {{--//         name:{--}}
                {{--//             required:true,--}}
                {{--//             minlength:5,--}}
                {{--//             fullname:true--}}
                {{--//         },--}}
                {{--//         price:{--}}
                {{--//             required:true,--}}
                {{--//             number:true--}}
                {{--//         },--}}
                {{--//         discount:{--}}
                {{--//             number:true--}}
                {{--//         },--}}
                {{--//         mota:{--}}
                {{--//             required:true,--}}
                {{--//         }--}}
                {{--//     }--}}
                {{--// });--}}
                {{--// $('#add').click(function () {--}}
                {{--//     // if($('#form').valid()){--}}
                {{--//     //     return true;--}}
                {{--//     // }--}}
                {{--//     // return false;--}}
                {{--// });--}}
            {{--});--}}
        {{--})(jQuery);--}}
    {{--</script>--}}
{{--@endsection--}}