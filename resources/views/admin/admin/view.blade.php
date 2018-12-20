@extends('admin.layout')
@section('content')
    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5>Admin</h5>
                <span>Quản lý Admin</span>
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
                <h6>
                    Thông tin admin			</h6>
            </div>

            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
                <thead>
                <tr>
                    <td style="width:60px;">Mã số</td>
                    <td>Tên</td>
                    <td>Email</td>
                    <td style="width:120px;">Hành động</td>
                </tr>
                </thead>
                <tbody class="list_item">
                @foreach($admin as $row)
                    <tr class='row_9'>
                        <td class="textC">{{$row->id}}</td>

                        <td class="textC">{{$row->user_name}}</td>
                        <td class="textC">{{$row->email}}</td>

                        <td class="option textC">
                            <a href="admin/admin/edit/{{$row->id}}.html" title="Chỉnh sửa" class="tipS">
                                <img src="source/backend/admin/images/icons/color/edit.png" />
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

    </div>
    <div class="clear mt30"></div>
@endsection
