@extends('admin.layout')
@section('content')
    <!-- Title area -->
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Phản hồi</h5>
                <span>Quản lý phản hồi</span>
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
                <h6>Danh sách phản hồi</h6>
                <div class="num f12">Tổng số: <b id="total">{{count($contact)}}</b></div>
            </div>
            @if(count($contact)>0)
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
                <thead>
                <tr>
                    <td style="width:21px;"><img src="source/backend/admin/images/icons/tableArrows.png" /></td>
                    <td>Tên khách hàng</td>
                    <td>Tiêu đề</td>
                    <td>Thông điệp</td>
                    <td>Ngày gửi</td>
                    <td style="width:150px;">Hành động</td>
                </tr>
                </thead>

                <tfoot class="auto_check_pages">
                <tr>
                    <td colspan="6">
                        <div class="list_action itemActions">
                            <a href="#submit" id="deleteAll" class="button blueB">
                                <span style='color:white;'>Xóa hết</span>
                            </a>
                        </div>
                    </td>
                </tr>
                </tfoot>

                <tbody>
                @foreach($contact as $row)
                    <tr class='row_{{$row->id}}'>
                        <td><input type="checkbox" class="check-product" name="id[]" value="{{$row->id}}" /></td>

                        <td>{{$row->name}}</td>
                        <td>{{$row->subject}}</td>
                        <td>{{$row->message}}</td>
                        <td>{{$row->date}}</td>
                        <td class="option">
                            <a href="admin/contact/delete/{{$row->id}}.html"  value="{{$row->id}}" title="Xóa" class="tipS delete" >
                                <img src="source/backend/admin/images/icons/color/delete.png" />
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <h5 style="margin: 15px">Không có phản hồi nào</h5>
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
                                window.location.href = 'admin/contact/delete/'+id+'.html';
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
                        content: 'Vui lòng chọn phản hồi muốn xóa',
                        animationSpeed: 200,
                        backgroundDismiss: true,
                    });
                }else{
                    $.confirm({
                        theme: 'material',
                        title:'',
                        content: 'Bạn có chắc chắn muốn xóa các phản hồi đã chọn',
                        buttons: {
                            Ok: {
                                btnClass: 'btn-blue',
                                action:function () {
                                    $.ajax({
                                        type: "post",
                                        url: 'admin/contact/deleteMultiple.html',
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
                                                    content: 'Xóa phản hồi thành công',
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
