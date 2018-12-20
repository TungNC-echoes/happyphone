@extends('admin.layout')
@section('content')
    <div class="wrapper">

        <div class="widgets">
            <!-- Stats -->
            <!-- User -->
            <div class="oneTwo">
                <div class="widget">
                    <div class="title">
                        <img src="source/backend/admin/images/icons/dark/users.png" class="titleIcon" />
                        <h6>Thống kê dữ liệu</h6>
                    </div>

                    <table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
                        <tbody>

                        <tr>
                            <td>
                                <div class="left">Tổng số giao dịch</div>
                                <div class="right f11"><a href="admin/transaction/view.html" target="_blank">Chi tiết</a></div>
                            </td>

                            <td class="textC webStatsLink">
                                {{$total_tran}}					</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="left">Tổng số sản phẩm</div>
                                <div class="right f11"><a href="admin/product/view.html" target="_blank">Chi tiết</a></div>
                            </td>

                            <td class="textC webStatsLink">
                                {{$total_product}}					</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="left">Tổng số bài viết</div>
                                <div class="right f11"><a href="admin/contact/view.html" target="_blank">Chi tiết</a></div>
                            </td>

                            <td class="textC webStatsLink">
                                {{$total_comment}}					</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="left">Tổng số khách hàng</div>
                                <div class="right f11"><a href="admin/user/view.html" target="_blank">Chi tiết</a></div>
                            </td>

                            <td class="textC webStatsLink">
                                {{$total_user}}					</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="clear"></div>

            <!-- Giao dich thanh cong gan day nhat -->

            <div class="widget">
                <div class="title">
                    <h6>Danh sách giao dịch gần đây</h6>
                    <div class="num f12">Tổng số: <b>{{count($tran)}}|{{$total_tran}}</b></div>
                </div>
                @if(count($tran)>0)
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                    <thead>
                    <tr>
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
                    <tbody class="list_item">
                    @foreach($tran as $row)
                        <tr class='row_12'>
                            <td class="textC">{{$row->id}}</td>

                            <td>
                                {{$row->name}}
                            </td>

                            <td class="textR red">{{number_format($row->total)}}</td>

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

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
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
        });
    </script>
@endsection