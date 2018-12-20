@extends('admin.layout')
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Danh mục</h5>
                <span>Quản lý danh mục</span>
            </div>

            <div class="horControlB menu_action">
                <ul>
                    <li><a href="admin/catalog/add.html">
                            <img src="source/backend/admin/images/icons/control/16/add.png" />
                            <span>Thêm mới</span>
                        </a></li>
                    <li><a href="admin/catalog/view.html">
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
                        <h6>Thêm mới Danh mục</h6>
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
                            <div class="left"><input type="file" id="image" name="image" required /></div>
                            <div name="image_error" class="clear error"></div>
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
