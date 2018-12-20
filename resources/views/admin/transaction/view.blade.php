@extends('admin.layout')
@section('content')
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Giao dịch</h5>
            <span>Quản lý các giao dịch của hệ thống</span>
        </div>

        <div class="horControlB menu_action">
            <ul>

                <li><a href="admin/transaction/view.html">
                        <img src="source/backend/admin/images/icons/control/16/list.png" />
                        <span>Danh sách</span>
                    </a></li>

                <li><a href="admin/tran/export.html">
                        <img src="source/backend/admin/images/excel.png" />
                        <span>Xuất file excel</span>
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

    <div class="widget">
        <div class="title">
            <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
            <h6>Danh sách Giao dịch</h6>
            <div class="num f12">Tổng số: <b id="total">{{count($tran)}}|{{$total}}</b></div>
        </div>
        @if(count($tran)>0)
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">

            <thead class="filter"><tr><td colspan="9">
                    <form class="list_filter form" action="{{route('search_transaction')}}" method="get">
                        <table cellpadding="0" cellspacing="0" width="100%"><tbody>

                            <tr>

                                <td class="label" style="width:60px;"><label for="filter_created">Từ ngày</label></td>
                                <td class="item"><input name="date_from" value="" id="filter_created" type="text" class="datepicker" /></td>

                                <td class="label"><label for="filter_created_to">Đến ngày</label></td>
                                <td class="item"><input name="date_to" value="" id="filter_created_to" type="text" class="datepicker" /></td>

                                <td class="label"></td>
                                <td class="item"></td>
                                <td colspan='2' style='width:60px'>
                                    <input type="submit" id="search" class="button blueB" value="Tìm kiếm" />
                                    <input type="reset" class="basic" value="Reset" onclick="window.location.href = 'admin/transaction/view.html'; ">
                                </td>


                            </tr>

                            </tbody></table>
                    </form>
                </td></tr></thead>
            <thead>
            <tr>
                <td style="width:10px;"><img src="source/backend/admin/images/icons/tableArrows.png" /></td>
                <td style="width:60px;">Mã số</td>
                <td style="width:175px;">Tên khách hàng</td>
                <td style="width:90px;">Số tiền</td>
                <td>Hình thức</td>
                <td style="width:100px;">Giao dịch</td>
                <td style="width:75px;">Ngày tạo</td>
                <td>Ghi chú</td>
                <td style="width:55px;">Hành động</td>
            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="9">
                    <div class="list_action itemActions" style="margin-top: 30px">
                        <a href="#" id="deleteAll" class="button blueB">
                            <span style='color:white;'>Xóa hết</span>
                        </a>
                    </div>
                    {{$tran->links()}}
                </td>
            </tr>
            </tfoot>

            <tbody class="list_item">
            @foreach($tran as $row)
                <tr class='row_{{$row->id}}'>
                <td><input type="checkbox" class="check-product" name="id[]" value="{{$row->id}}" /></td>

                <td class="textC">{{$row->id}}</td>

                <td>
                    {{$row->name}}
                </td>

                <td class="textR red">{{number_format($row->total)}} đ</td>

                <td>
                   {{$row->payment}}					</td>


                <td class="status textC">
						<span class="completed">
						Thành công						</span>
                </td>

                <td class="textC">{{$row->date_order}}</td>
                <td class="textC">{{$row->note}}</td>

                <td class="textC">
                    <a href="admin/tran/chitiet/{{$row->id}}.html" value="{{$row->id}}" title="Xem chi tiết giao dịch" class="tipS chitiet" >
                        <img src="source/backend/admin/images/icons/color/view.png" />
                    </a>

                    <a href="admin/tran/del/12.html" title="Xóa"  value="{{$row->id}}" class="tipS delete" >
                        <img src="source/backend/admin/images/icons/color/delete.png" />
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
        @else
            <h5 style="margin: 15px">Không có giao dịch nào</h5>
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
                    content: 'Bạn có chắc chắn muốn xóa giao dịch này',
                    buttons: {
                        Ok: {
                            btnClass: 'btn-blue',
                            action:function () {
                                window.location.href = 'admin/transaction/delete/'+id+'.html';
                            }
                        },
                        Cancel: {}
                    }
                });
            });
            $('#search').click(function () {
                if($('#filter_created').val()&&$('#filter_created_to').val())
                    return true;
                return false;
            });
            $('.chitiet').click(function (e) {
                e.preventDefault();
                $.ajax({
                    type:'get',
                    url:'admin/transaction/chitiet/'+$(this).attr('value')+'.html',
                    success:function (data) {
                        var str = '<table cellpadding="0" cellspacing="0" ' +
                            'width="100%" class="sTable mTable myTable" id="checkAll">'+
                            '<thead>\n' +
                            '                <tr>\n' +
                            '                    <td style="width:60px;">Mã số đơn hàng</td>\n' +
                            '                    <td>Sản phẩm</td>\n' +
                            '\n' +
                            '                    <td style="width:70px;">Số tiền</td>\n' +
                            '                    <td style="width:50px;">Số lượng</td>\n' +
                            '                    <td style="width:75px;">Đơn hàng</td>\n' +
                            '                    <td style="width:75px;">Ngày tạo</td>\n' +
                            '                </tr>\n' +
                            '                </thead>'+
                            ' <tbody class="list_item">\n';
                            data.forEach(function (value) {
                                str +='<tr><td class="textC">'+value.id_order+'</td>\n'+
                                ' <td>\n' +
                                '                        <div class="image_thumb">\n' +
                                '                            <img src="source/image/product/'+value.image+'" height="50">\n' +
                                '                        </div>\n' +
                                '                        <div style="margin-top: 17px">\n' +
                                '                            <a href="'+value.id_product+'/chitiet.html" class="tipS" title="" target="_blank">\n' +
                                '                                <b>'+value.name+'</b>\n' +
                                '                            </a>\n' +
                                '                        </div>\n' +
                                '                        <div class="clear"></div>\n' +
                                '\n' +
                                '                    </td>\n' +
                                '\n' +
                                '                    <td class="textC">\n' +
                                '                        '+value.unit_price+' đ\n' +
                                '                    </td>\n' +
                                '\n' +
                                '                    <td class="textC">'+value.quantity+'</td>\n' +
                                '\n' +
                                '                    <td class="status textC">\n' +
                                '\t\t\t\t\t\t<span class="pending">\n' +
                                '\t\t\t\t\t\tChờ xử lý\t\t\t\t\t\t</span>\n' +
                                '                    </td>\n' +
                                '\n' +
                                '                    <td class="textC">'+value.created_at+'</td></tr>'
                            });
                            str+='</tbody></table>';

                        $.dialog({
                            theme: 'material',
                            title: '',
                            content: str,
                            animationSpeed: 100,
                            backgroundDismiss: true,
                        });
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
                        content: 'Vui lòng chọn giao dịch muốn xóa',
                        animationSpeed: 200,
                        backgroundDismiss: true,
                    });
                }else{
                    $.confirm({
                        theme: 'material',
                        title:'',
                        content: 'Bạn có chắc chắn muốn xóa các giao dịch đã chọn',
                        buttons: {
                            Ok: {
                                btnClass: 'btn-blue',
                                action:function () {
                                    $.ajax({
                                        type: "post",
                                        url: 'admin/transaction/deleteMultiple.html',
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
                                                    content: 'Xóa giao dịch thành công',
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