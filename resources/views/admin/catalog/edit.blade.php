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
                        <h6>Chỉnh sửa danh mục</h6>
                    </div>

                    <div class="formRow">
                        <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
                        <div class="formRight">
                            <span class="oneTwo"><input name="name" value="{{!session('loi')?$catalog->name:old('name')}}" id="param_name" _autocheck="true" type="text" required /></span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formRow">
                        <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                        <div class="formRight">
                            <div class="left">
                                <div><img src="source/image/product/{{$catalog->image}}" width="350px"></div>
                                <div><input type="file" id="image" name="image" /></div>
                            </div>

                            <div name="image_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="formRow">
                        <label for="param_mota" class="formLeft">Mô tả:<span class="req">*</span></label>
                        <div class="formRight">
                                    <span class="oneTwo">
                                        <textarea name="mota" id="param_mota" rows="5" required>{{!session('loi')?$catalog->description:old('mota')}}</textarea>
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