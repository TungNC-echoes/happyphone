@extends('admin.layout')
@section('content')
<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Slide</h5>
            <span>Quản lý slide</span>
        </div>

        <div class="horControlB menu_action">
            <ul>
                <li><a href="admin/slide/add.html">
                        <img src="source/backend/admin/images/icons/control/16/add.png" />
                        <span>Thêm mới</span>
                    </a></li>

                <li><a href="admin/slide/view.html">
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
    <div class="widget">

        <div class="title">
            <img src="source/backend/admin/images/icons/dark/dialog.png" class="titleIcon" />
            <h6>
                Danh sách
                Slide
            </h6>
            <div class="num f12">Tổng số: <b>{{count($slide)}}</b></div>
        </div>
        @if(count($slide)>0)
        <div class="gallery">
            <ul>
                @foreach($slide as $row)
                <li id={{$row->id}}>

                    <a class="lightbox" title="Slide {{$row->id}}" href="source/image/slide/banner1.jpg" >
                        <img src="source/image/slide/{{$row->image}}"   width='280px' />
                    </a>

                    <div class="actions" style="display: none;">
                        <a href="admin/slide/edit/{{$row->id}}.html" title="Chỉnh sửa" class="tipS">
                            <img src="source/backend/admin/images/icons/color/edit.png" /></a>

                        <a href="admin/slide/delete/{{$row->id}}.html" value="{{$row->id}}" title="Xóa" class="tipS delete">
                            <img src="source/backend/admin/images/icons/color/delete.png" />
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="clear" style='height:20px'></div>
        </div>
        @else
            <h5 style="margin: 15px">Không có slide nào</h5>
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
                                window.location.href = 'admin/slide/delete/'+id+'.html';
                            }
                        },
                        Cancel: {}
                    }
                });
            });
        });
    </script>
@endsection