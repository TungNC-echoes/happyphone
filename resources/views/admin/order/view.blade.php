@extends('admin.layout')
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Đơn hàng sản phẩm</h5>
                <span>Quản lý đơn hàng</span>
            </div>

            <div class="horControlB menu_action">
                <ul>

                    <li><a href="admin/order/view.html">
                            <img src="source/backend/admin/images/icons/control/16/list.png" />
                            <span>Danh sách</span>
                        </a></li>

                    <li><a href="">
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
                <h6>Danh sách Đơn hàng sản phẩm</h6>

                <div class="num f12">Tổng số: <b>{{count($orders)}}|{{$total}}</b></div>
            </div>
            @if(count($orders)>0)
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                <thead class="filter"><tr><td colspan="9">
                        <form class="list_filter form" action="{{route('search_order')}}" method="get">
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
                    <td style="width:60px;">Mã số đơn hàng</td>
                    <td style="width:60px;">Mã số giao dịch</td>
                    <td>Sản phẩm</td>

                    <td style="width:70px;">Số tiền</td>
                    <td style="width:50px;">Số lượng</td>
                    <td style="width:75px;">Đơn hàng</td>
                    <td style="width:75px;">Ngày tạo</td>
                    <td style="width:55px;">Hành động</td>
                </tr>
                </thead>

                <tfoot class="auto_check_pages">
                <tr>
                    <td colspan="10">
                        <div class="list_action itemActions" style="margin-top: 30px">
                            <a href="#" id="deleteAll" class="button blueB">
                                <span style='color:white;'>Xóa hết</span>
                            </a>
                        </div>
                        {{$orders->links()}}
                    </td>
                </tr>
                </tfoot>

                <tbody class="list_item">
                @if(count($orders)>0)
                <?php $start = $orders[0]->id_bill;$index = 0?>
                <?php static $v =0?>
                @foreach($orders as $order)

                <tr class='row_{{$order->id}}'>
                    <td><input type="checkbox" class="check-product" name="id[]" value="{{$order->id}}" /></td>
                    <td class="textC">{{$order->id_order}}</td>
                    @if($index == 0)
                        <?php $count = 0;?>
                        @foreach($orders as $row)
                            @if($start == $row->id_bill)
                                <?php $count++;$v++ ?>
                            @endif
                        @endforeach
                        <?php $index = $count;?>
                    @endif
                    <?php $index--;?>
                    @if(($count - $index) == 1)
                        <td class="textC" rowspan="{{$count}}">{{$order->id_bill}}</td>
                    @endif
                    @if($index == 0)
                        <?php if($v < count($orders)) $start = $orders[$v]->id_bill?>
                    @endif

                    <td>
                        <div class="image_thumb">
                            <img src="source/image/product/{{$order->image}}" height="50">
                        </div>
                        <div style="margin-top: 17px">
                            <a href="{{route('chitiet',['id' =>$order->id_product ])}}" class="tipS" title="" target="_blank">
                                <b>{{$order->name}}</b>
                            </a>
                        </div>
                        <div class="clear"></div>

                    </td>

                    <td class="textC">
                        {{number_format($order->unit_price)}} đ
                    </td>

                    <td class="textC">{{$order->quantity}}</td>

                    <td class="status textC">
						<span class="pending">
						Chờ xử lý						</span>
                    </td>

                    <td class="textC">{{$order->created_at}}</td>

                    <td class="textC">
                        <a href="admin/tran/del/12.html" title="Xóa"  value="{{$order->id_order}}" class="tipS delete" >
                            <img src="source/backend/admin/images/icons/color/delete.png" />
                        </a>
                    </td>

                </tr>
                @endforeach
                @endif
                </tbody>

            </table>
            @else
                <h5 style="margin: 15px">Không có đơn hàng nào</h5>
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
                    content: 'Bạn có chắc chắn muốn xóa đơn hàng này',
                    buttons: {
                        Ok: {
                            btnClass: 'btn-blue',
                            action:function () {
                                window.location.href = 'admin/order/delete/'+id+'.html';
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
                        content: 'Vui lòng chọn đơn hàng muốn xóa',
                        animationSpeed: 200,
                        backgroundDismiss: true,
                    });
                }else{
                    $.confirm({
                        theme: 'material',
                        title:'',
                        content: 'Bạn có chắc chắn muốn xóa các đơn hàng đã chọn',
                        buttons: {
                            Ok: {
                                btnClass: 'btn-blue',
                                action:function () {
                                    $.ajax({
                                        type: "post",
                                        url: 'admin/order/deleteMultiple.html',
                                        data:{
                                            _token:$('meta[name="csrf-token"]').attr('content'),
                                            allVals:allVals
                                        },
                                        success:function (data) {
                                            window.location.href = 'admin/order/view.html';
                                            $.dialog({
                                                theme: 'material',
                                                title: '',
                                                content: 'Xóa đơn hàng thành công',
                                                animationSpeed: 100,
                                                backgroundDismiss: true,
                                            });
                                               // window.location.href = 'admin/product/error.html';
                                            }
                                            // $.each(allVals, function( index, value ) {
                                            //     $('table tr').filter(".row_" + value).remove();
                                            // });
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