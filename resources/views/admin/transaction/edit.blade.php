@extends('admin.layout')
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Thông tin chi tiết</h5>
                <span>Quản lý sản phẩm</span>
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

                    <div class="formRow">
                        <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
                        <div class="formRight">
                            <span class="oneTwo"><input name="name" value="{{ $order->name }}" id="param_name" _autocheck="true" type="text" required readonly /></span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
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
                                <input name="price" value="{{ $order->unit_price }}" style='width:100px' id="param_price" class="format_number" _autocheck="true" type="text" required readonly/>
                                <img class='tipS' title='Giá bán sử dụng để giao dịch' style='margin-bottom:-8px'  src='source/backend/admin/crown/images/icons/notifications/information.png'/>
                            </span>
                            <span name="price_autocheck" class="autocheck"></span>
                            <div name="price_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <!-- Price -->
                    <div class="formRow">
                        <label class="formLeft" for="param_cat">Trạng thái:<span class="req">*</span></label>
                        <div class="formRight">
                            <select name="status" id='status' class="left">
                                    <option value="" <?php if($order->status ==null) { echo 'selected'; }?>>Chờ xử lý</option>
                                    <option value="1" <?php if($order->status ==1) { echo 'selected'; }?>>Đã tiếp nhận</option>
                                    <option value="2" <?php if($order->status ==2) { echo 'selected'; }?>>Đang giao hàng</option>
                                    <option value="3" <?php if($order->status ==3) { echo 'selected'; }?>>Thành công</option>

                            </select>
                            <span name="cat_autocheck" ></span>
                            <div name="cat_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formSubmit">
                        <input type="submit" id="add" value="CẬP NHẬT" class="redB" />
                        <input type="reset" value="Hủy bỏ" class="basic" />
                    </div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="clear mt30"></div>
@endsection