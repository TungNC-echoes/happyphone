@extends('admin.layout')
@section('content')
<!-- Title area -->
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

    <!-- Static table -->
    <div class="widget" id='main_content'>

        <div class="title">
            <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
            <h6>Danh sách Danh mục</h6>
            <div class="num f12">Tổng số: <b id="total">{{count($loaisp)}}</b></div>
        </div>
        @if(count($loaisp)>0)
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
            <thead>
            <tr>
                <td style="width:21px;"><img src="source/backend/admin/images/icons/tableArrows.png" /></td>
                <td>Tên</td>
                <td>Mô tả</td>
                <td>Hình ảnh</td>
                <td style="width:150px;">Hành động</td>
            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="5">
                    <div class="list_action itemActions">
                        <a href="#" id="deleteAll" class="button blueB">
                            <span style='color:white;'>Xóa hết</span>
                        </a>
                    </div>
                </td>
            </tr>
            </tfoot>

            <tbody>
            @foreach($loaisp as $row)
                <tr class='row_{{$row->id}}'>
                <td><input type="checkbox" class="check-product" name="id[]" value="{{$row->id}}" /></td>

                <td>{{$row->name}}</td>
                <td>{{$row->description}}</td>
                <td>
                    <div class="image_thumb">
                        <img src="source/image/catalog/{{$row->image}}" height="50">
                        <div class="clear"></div>
                    </div>
                </td>
                <td class="option">
                    <a href="admin/catalog/edit/{{$row->id}}.html" title="Chỉnh sửa" class="tipS ">
                        <img src="source/backend/admin/images/icons/color/edit.png" />
                    </a>

                    <a href="admin/catalog/delete/{{$row->id}}.html"  value="{{$row->id}}" title="Xóa" class="tipS delete" >
                        <img src="source/backend/admin/images/icons/color/delete.png" />
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <h5 style="margin: 15px">Không có danh mục nào</h5>
        @endif
    </div>
</div>
<div class="clear mt30"></div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.delete').click(function (e) {
                e.preventDefault();
                id = $(this).attr('value');
                $.confirm({
                    theme: 'material',
                    title:'',
                    content: 'Bạn có chắc chắn muốn xóa danh mục này',
                    buttons: {
                        Ok: {
                            btnClass: 'btn-blue',
                            action:function () {
                                window.location.href = 'admin/catalog/delete/'+id+'.html';
                            }
                        },
                        Cancel: {}
                    }
                });
            });
            $('#deleteAll').click(function (e) {
                e.preventDefault();
                var allVals = [];
                $(".check-product:checked").each(function() {
                    allVals.push($(this).attr('value'));
                });
                if(allVals.length ==0){
                    $.dialog({
                        theme: 'material',
                        title: '',
                        content: 'Vui lòng chọn danh mục muốn xóa',
                        animationSpeed: 200,
                        backgroundDismiss: true,
                    });
                }else{
                    $.confirm({
                        theme: 'material',
                        title:'',
                        content: 'Bạn có chắc chắn muốn xóa các danh mục đã chọn',
                        buttons: {
                            Ok: {
                                btnClass: 'btn-blue',
                                action:function () {
                                    $.ajax({
                                        type: "post",
                                        url: 'admin/catalog/deleteMultiple.html',
                                        data:{
                                            _token:$('meta[name="csrf-token"]').attr('content'),
                                            allVals:allVals
                                        },
                                        success:function (data) {
                                            if(data =='ok'){
                                                $.each(allVals, function( index, value ) {
                                                    $('table tr').filter(".row_" + value).remove();
                                                });
                                                $('#total').html($('#total').html() - allVals.length);
                                                $.dialog({
                                                    theme: 'material',
                                                    title: '',
                                                    content: 'Xóa danh mục thành công',
                                                    animationSpeed: 100,
                                                    backgroundDismiss: true,
                                                });
                                            }else{
                                                window.location.href = 'admin/product/error.html';
                                            }
                                        }

                                    });
                                }
                            },
                            Cancel: {}
                        }
                    });
                }
            });
        });
    </script>
@endsection

