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
    <div class="wrapper" id="main_product">
        <div class="widget">

            <div class="title">
                <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
                <h6>
                    Danh sách khách hàng			</h6>
                <div class="num f12">Số lượng: <b id="total">{{count($user)}}|{{$total}}</b></div>
            </div>
            @if(count($user)>0)
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                <thead>
                <tr>
                    <td style="width:21px;"><img src="source/backend/admin/images/icons/tableArrows.png" /></td>
                    <td style="width:60px;">Mã số</td>
                    <td>Tên khách hàng</td>
                    <td>Email</td>
                    <td style="width:75px;">Số điện thoại</td>
                    <td>Địa chỉ</td>
                    <td style="width:120px;">Hành động</td>
                </tr>
                </thead>

                <tfoot class="auto_check_pages">
                @if(count($user)>0)
                    <tr>
                        <td colspan="7">
                            <div class="list_action itemActions" style="margin-top: 32px">
                                <a href="#" id="deleteAll" class="button blueB">
                                    <span style='color:white;'>Xóa hết</span>
                                </a>
                            </div>

                            {{$user->links()}}
                        </td>
                    </tr>
                @endif
                </tfoot>

                <tbody class="list_item">
                @foreach($user as $row)
                    <tr class='row_{{$row->id}}'>
                        <td><input type="checkbox" class="check-product" name="id[]" value="{{$row->id}}" /></td>

                        <td class="textC">{{$row->id}}</td>
                        <td class="textC">{{$row->full_name}}</td>
                        <td class="textC">{{$row->email}}</td>
                        <td class="textC">{{$row->phone}}</td>
                        <td class="textC">{{$row->address}}</td>

                        <td class="option textC">
                            <a href="admin/user/edit/{{$row->id}}.html" title="Chỉnh sửa" class="tipS">
                                <img src="source/backend/admin/images/icons/color/edit.png" />
                            </a>

                            <a href="admin/user/delete/{{$row->id}}.html" value="{{$row->id}}" title="Xóa" class="tipS delete" >
                                <img src="source/backend/admin/images/icons/color/delete.png" />
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            @else
                <h5 style="margin: 15px">Không có khách hàng nào</h5>
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
                    content: 'Bạn có chắc chắn muốn xóa sản phẩm này',
                    buttons: {
                        Ok: {
                            btnClass: 'btn-blue',
                            action:function () {
                                window.location.href = 'admin/user/delete/'+id+'.html';
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
                        content: 'Vui lòng chọn khách hàng muốn xóa',
                        animationSpeed: 200,
                        backgroundDismiss: true,
                    });
                }else{
                    $.confirm({
                        theme: 'material',
                        title:'',
                        content: 'Bạn có chắc chắn muốn xóa các khách hàng đã chọn',
                        buttons: {
                            Ok: {
                                btnClass: 'btn-blue',
                                action:function () {
                                    $.ajax({
                                        type: "post",
                                        url: 'admin/user/deleteMultiple.html',
                                        data:{
                                            _token:$('meta[name="csrf-token"]').attr('content'),
                                            allVals:allVals
                                        },
                                        success:function (data) {
                                            if(data =='ok'){
                                                $.each(allVals, function( index, value ) {
                                                    $('table tr').filter(".row_" + value).remove();
                                                });
                                                var str = $('#total').html().split('|');
                                                for(var i=0;i<str.length;i++){
                                                    str[i] = str[i]-allVals.length;
                                                }
                                                $('#total').html(str[0]+'|'+str[1]);
                                                $.dialog({
                                                    theme: 'material',
                                                    title: '',
                                                    content: 'Xóa khách hàng thành công',
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
