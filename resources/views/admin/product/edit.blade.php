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
    <div id="thonbao" style="display: none">
        @if(session('loi'))
            <p class="loi">{{ session('loi') }}</p>
        @endif
    </div>
    <!-- Main content wrapper -->
    <div class="wrapper">

        <!-- Form -->
        <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img src="source/backend/admin/images/icons/dark/edit.png" class="titleIcon" />
                        <h6>Chỉnh sửa sản phẩm</h6>
                    </div>

                    <div class="formRow">
                        <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
                        <div class="formRight">
                            <span class="oneTwo"><input name="name" value="{{!session('loi')?$product->name:old('name')}}" id="param_name" _autocheck="true" type="text" required /></span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formRow">
                        <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                        <div class="formRight">
                            <div class="left">
                                <div><img src="source/image/product/{{$product->image}}" width="350px"></div>
                                <div><input type="file" id="image" name="image" /></div>
                            </div>

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
			<input name="price" value="{{!session('loi')?$product->unit_price:old('price')}}" style='width:100px' id="param_price" class="format_number" _autocheck="true" type="text" required/>
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
			<input name="discount" value="{{!session('loi')?$product->promotion_price:old('discount')}}" style='width:100px' id="param_discount" class="format_number"  type="text" />
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
                                @if(!session('loi'))
                                    @foreach($loaisp as $row)
                                        @if($product->id_type == $row->id)
                                            <option value="{{$row->id}}" selected="selected">{{$row->name}}</option>
                                        @else
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach($loaisp as $row)
                                        @if(old('cat') == $row->id)
                                            <option value="{{$row->id}}" selected="selected">{{$row->name}}</option>
                                        @else
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endif
                                    @endforeach
                                @endif

                            </select>
                            <span name="cat_autocheck" class="autocheck"></span>
                            <div name="cat_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formRow">
                        <label class="formLeft" for="param_name">Sản phẩm mới:<span class="req">*</span></label>
                        <div class="formRight">
                            @if(!session('loi'))
                                @if($product->new==1)
                                    <span class="oneFour">Có<input name="new" value="1" type="radio" checked="checked" /></span>
                                    <span>Không<input name="new" value="0" type="radio" /></span>
                                @else
                                    <span class="oneFour">Có<input name="new" value="1" type="radio" /></span>
                                    <span>Không<input name="new" value="0" type="radio" checked="checked"  /></span>
                                @endif

                            @else
                                @if(old('new')==1)
                                    <span class="oneFour">Có<input name="new" value="1" type="radio" checked="checked" /></span>
                                    <span>Không<input name="new" value="0" type="radio" /></span>
                                @else
                                    <span class="oneFour">Có<input name="new" value="1" type="radio" /></span>
                                    <span>Không<input name="new" value="0" type="radio" checked="checked"  /></span>
                                @endif
                            @endif
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formRow">
                        <label for="param_mota" class="formLeft">Mô tả:<span class="req">*</span></label>
                        <div class="formRight">
                                    <span class="oneTwo">
                                        <textarea name="mota" id="param_mota" rows="5" required>{{!session('loi')?$product->description:old('mota')}}</textarea>
                                    </span>
                            <span class="autocheck" name="name_autocheck"></span>
                            <div class="clear error" name="param_mota"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formSubmit">
                        <input type="submit" id="add" value="Chỉnh sửa" class="redB" />
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
        $(document).ready(function () {
            if($('.loi').length ){
                $.dialog({
                    theme: 'material',
                    title: '',
                    content: $('.loi').html(),
                    animationSpeed: 200,
                    boxWidth:30,
                    backgroundDismiss: true,
                });
            }
        })
    </script>
@endsection