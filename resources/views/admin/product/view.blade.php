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






<!-- Main content wrapper -->
<div class="wrapper" id="main_product">
    <div class="widget">

        <div class="title">
            <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
            <h6>
                Danh sách sản phẩm			</h6>
            <div class="num f12">Số lượng: <b id="total">{{count($product)}}|{{$total}}</b></div>
        </div>
        @if(count($product)>0)
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">

            <thead class="filter"><tr><td colspan="6">
                    <form class="list_filter form" action="{{route('search_admin')}}" method="get">
                        <table cellpadding="0" cellspacing="0" width="80%"><tbody>

                            <tr>
                                <td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
                                <td class="item" style="width:155px;" ><input name="name" value="" type="text" style="width:155px;" autocomplete="off" /></td>

                                <td class="label" style="width:60px;"><label for="filter_status">Danh mục</label></td>
                                <td class="item">
                                    <select name="catalog">
                                        <option value=""></option>
                                        @foreach($loaisp as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                        <!-- kiem tra danh muc co danh muc con hay khong -->


                                    </select>
                                </td>

                                <td style='width:150px'>
                                    <input type="submit" class="button blueB" value="Tìm kiếm" />
                                    <input type="reset" class="basic" value="Reset" onclick="window.location.href = 'admin/product/view.html'; ">
                                </td>

                            </tr>
                            </tbody></table>
                    </form>
                </td></tr></thead>

            <thead>
            <tr>
                <td style="width:21px;"><img src="source/backend/admin/images/icons/tableArrows.png" /></td>
                <td style="width:60px;">Mã số</td>
                <td>Tên</td>
                <td>Giá</td>
                <td style="width:75px;">Ngày tạo</td>
                <td style="width:120px;">Hành động</td>
            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="6">
                    <div class="list_action itemActions" style="margin-top: 32px">
                        <a href="#" id="deleteAll" class="button blueB">
                            <span style='color:white;'>Xóa hết</span>
                        </a>
                    </div>

                    {{$product->links()}}
                </td>
            </tr>
            </tfoot>

            <tbody class="list_item">
            @foreach($product as $row)
                <tr class='row_{{$row->id}}'>
                <td><input type="checkbox" class="check-product" name="id[]" value="{{$row->id}}" /></td>

                <td class="textC">{{$row->id}}</td>

                <td>
                    <div class="image_thumb">
                        <img src="source/image/product/{{$row->image}}" height="50">

                    </div>
                    <div style="margin-top: 17px">
                        <a href="{{route('chitiet',['id' => $row->id])}}" class="tipS" title="chi tiết" target="_blank">
                            <b>{{$row->name}}</b>
                        </a>
                    </div>
                    <div class="clear"></div>
                </td>
                <td class="textC">
                    {{number_format($row->unit_price)}} đ
                    @if($row->promotion_price>0)
                        <p style='text-decoration:line-through'>{{number_format($row->promotion_price)}} đ</p>
                    @endif

                </td>


                <td class="textC">{{$row->created_at}}</td>

                <td class="option textC">
                    <a href="admin/product/edit/{{$row->id}}.html" title="Chỉnh sửa" class="tipS">
                        <img src="source/backend/admin/images/icons/color/edit.png" />
                    </a>

                    <a href="admin/product/delete/{{$row->id}}.html" value="{{$row->id}}" title="Xóa" class="tipS delete" >
                        <img src="source/backend/admin/images/icons/color/delete.png" />
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
        @else
            <h5 style="margin: 15px">Không có sản phẩm nào</h5>
        @endif
    </div>

</div>		<div class="clear mt30"></div>
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
                                window.location.href = 'admin/product/delete/'+id+'.html';
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
                        content: 'Vui lòng chọn sản phẩm muốn xóa',
                        animationSpeed: 200,
                        backgroundDismiss: true,
                    });
                }else{
                    $.confirm({
                        theme: 'material',
                        title:'',
                        content: 'Bạn có chắc chắn muốn xóa các sản phẩm đã chọn',
                        buttons: {
                            Ok: {
                                btnClass: 'btn-blue',
                                action:function () {
                                    $.ajax({
                                        type: "post",
                                        url: 'admin/product/deleteMultiple.html',
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
                                                    content: 'Xóa sản phẩm thành công',
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
