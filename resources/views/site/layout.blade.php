<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel </title>
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta property="og:description"   content="Bơi hết vào đây" />
    <link rel="stylesheet" title="style" href="css/index.css">
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="source/assets/dest/css/bootstrap.css">
    <link rel="stylesheet" href="source/assets/dest/css/intlTelInput.css">
    <link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
    <link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
    <link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
    <link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
    <link rel="stylesheet" href="source/assets/dest/css/animate.css">
    <link rel="stylesheet" href="source/assets/dest/css/error.css">
    <link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
    <link rel="stylesheet" href="source/assets/dest/css/jquery-confirm.min.css">

</head>
<body>

@include('site.header')
<div class="rev-slider">
    @yield('content')
</div>
@include('site.footer')
<div class="copyright">
    <div class="container">
        <p class="pull-left">Privacy policy. (&copy;) 2017</p>
        <p class="pull-right pay-options">
        </p>
        <div class="clearfix"></div>
    </div> <!-- .container -->
</div> <!-- .copyright -->
<!-- include js files -->
<script src="source/assets/dest/js/jquery.js"></script>
<script src="source/assets/dest/js/jquery.countTo.js"></script>
<script src="source/assets/dest/js/intlTelInput.min.js"></script>
<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
<script src="source/assets/dest/js/bootstrap.min.js"></script>
<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
<script src="source/assets/dest/vendors/animo/Animo.js"></script>
<script src="source/assets/dest/vendors/dug/dug.js"></script>
<script src="source/assets/dest/js/scripts.min.js"></script>
<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="source/assets/dest/js/waypoints.min.js"></script>
<script src="source/assets/dest/js/wow.min.js"></script>
<script src="source/assets/dest/js/jquery.validate.js"></script>
<script src="source/assets/dest/js/typeahead.bundle.js"></script>
<script src="source/assets/dest/js/jquery-confirm.min.js"></script>
<script src="source/assets/dest/js/custom2.js"></script>
<script src="source/assets/dest/js/utils.js"></script>
<script>
    $(document).ready(function($) {
        //hiển thị thông báo
        if($('.nd').length ){
            $.dialog({
                theme: 'material',
                title: '',
                content: $('.nd').html(),
                animationSpeed: 300,
                backgroundDismiss: true,
            });
        }
        //
        $('#s').on('keydown',function (e) {
            if(e.keyCode == 13){
                if($(this).val()) return true;
                return false;
            }
        });
        $('searchsubmit').click(function () {
            if($('#s').val()) return true;
            return false;
        });
        $.ajax({
            type: "GET",
            url: 'gio-hang.html'
        })
            .done(function(data) {
                var title ='';
                if(data[1]>0){
                    title +=' <div class="beta-select"><i class="fa fa-shopping-cart"></i> ' +
                        '<span id="count">Giỏ hàng ( '+data[1]+' )</span> <i class="fa fa-chevron-down"></i></div>\n' +
                        ' <div class="beta-dropdown cart-body" style="width: 360px" id="noidung">'+
                        '<div style="overflow: auto;max-height: 340px">';
                    data[0].forEach(function (value) {
                        title+='<div class="cart-item">\n' +
                            '                                    <div class="media col-sm-10">\n' +
                            '                                        <a class="pull-left" href="#" style="width: 70px;"><img src="source/image/product/'+value.image+'" height="70px"></a>\n' +
                            '                                        <div class="media-body">\n' +
                            '                                            <span class="cart-item-title">'+value.name+'</span>\n' +
                            '                                            <span class="cart-item-amount">'+value.price+' VNĐ</span>\n' +
                            '                                            <input type="number" class="number" value="'+value.qty+'" product_id="'+value.rowId+'" min="1" required style="width: 40px"/>\n' +
                            '                                        </div>\n' +
                            '                                    </div>\n' +
                            '                                    <a class="col-sm-2 delete" product_id="'+value.rowId+'" style="margin-top: 15px"><img src="source/image/delete.png"></a>\n' +
                            '                                    <div class="clearfix"></div>\n' +
                            '                                </div>';
                    })
                    title+='</div><div class="cart-caption">\n' +
                        '<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value" id="total">'+data[2]+' VNĐ</span></div>\n' +
                        '                                <div class="clearfix"></div>\n'+
                        '                                <div class="center">\n' +
                        '                                    <div class="space10">&nbsp;</div>\n' +
                        '                                    <a href="dat-hang.html" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '                        </div>';
                    $('#div-cart').html(title);

                }
                // else{
                //     title+=' <div class="beta-select"><i class="fa fa-shopping-cart"></i> ' +
                //         '<span id="count">Giỏ hàng (Trống)</span> <i class="fa fa-chevron-down"></i></div>';
                // }

            });
        $(document).on('click','.beta-select', function(){
            $('#noidung').slideToggle(500);
        })
        $(window).scroll(function(){
            if($(this).scrollTop()>150){
                $(".header-bottom").addClass('fixNav')
            }else{
                $(".header-bottom").removeClass('fixNav')
            }}
        )
        var vl;
        $(document).on('click keyup','.number', function(){
            var id = $(this).attr('product_id');
            var value = $(this).val();
            if(value!='') vl=value;
            var temp =$(this);
            if(value){
                $.ajax({
                    type: "GET",
                    url: id+'/'+value+'/update-cart.html'
                }). done(function( msg ) {
                    temp.val(msg[0]);
                    $('#total').html( msg[1]+' VNĐ');
                    $('#'+id).find('#qty').html('Số lượng : '+msg[0]);
                    $('#'+id).find('#thanhtien').html('Thành tiền : '+msg[2]+' VNĐ');
                    $('#tongtien').html('Tổng tiền : '+msg[1]+' VNĐ')

                });
            }
        });
        $(document).on('focusout','.number', function(){
            if($(this).val()=='')
                $(this).val(vl);
        });
        $(document).on('click','.delete', function(){
            var temp = $(this);
            $.confirm({
                icon: 'glyphicon glyphicon-warning-sign',
                title: 'Warning',
                content:'Bạn chắc chắn muốn xóa',
                boxWidth: '30%',
                useBootstrap: false,
                backgroundDismiss: false,
                backgroundDismissAnimation: 'glow',
                buttons: {
                    Ok: function () {
                        var id = temp.attr('product_id');
                            $.ajax({
                                type: "GET",
                                url: id+'/delete-cart.html'
                            }). done(function( data ) {
                                $('#count').html('Giỏ hàng ( '+data[0]+' )');
                                temp.parent().remove();
                                $('#total').html(data[1]+' VNĐ');
                                $('#'+id).remove();
                                $('#tongtien').html('Tổng tiền : '+data[1]+' VNĐ')
                                if(data[1]!='0'){

                                }else{
                                    $('#count').html('Giỏ hàng (Trống)');
                                    $('#noidung').remove();
                                    $('#order').remove();
                                }
                                $.dialog({
                                    title: '',
                                    content: 'Xóa sản phẩm trong giỏ hàng thành công!',
                                    animationSpeed: 100,
                                    backgroundDismiss: false,
                                    backgroundDismissAnimation: 'glow',
                                });
                                $('#noidung').slideDown(600);
                            });
                    },
                    Cancel: {
                    }
                }
            });
            // if(confirm('Bạn có chắc chắn xóa sản phẩm này trong giỏ hàng')){
            //     var id = $(this).attr('product_id');
            //     var temp = $(this);
            //     $.ajax({
            //         type: "GET",
            //         url: id+'/delete-cart.html'
            //     }). done(function( data ) {
            //         $('#count').html('Giỏ hàng ( '+data[0]+' )');
            //         temp.parent().remove();
            //         $('#total').html(data[1]+' VNĐ');
            //         alert('Xóa sản phẩm thành công');
            //     });
            // }
        });
        $(".add-to-cart").on("click", function(e){
            e.preventDefault();
            var id = $(this).attr('product_id');
            if($(this).prev().attr('value')!=undefined){
                url = id+'/'+$(this).prev().val()+'/add-to-cart.html'

            }else{
                url = id+'/1/add-to-cart.html';
            }
            var title = '';
            $.ajax({
                type: "GET",
                url: url
            })
                .done(function(data) {
                    if(data) {
                        title += ' <div class="beta-select"><i class="fa fa-shopping-cart"></i> ' +
                            '<span id="count">Giỏ hàng ( ' + data[1] + ' )</span> <i class="fa fa-chevron-down"></i></div>\n' +
                            ' <div class="beta-dropdown cart-body" style="width: 360px" id="noidung">' +
                            '<div style="overflow: auto;max-height: 340px">';
                        data[0].forEach(function (value) {
                            title += '<div class="cart-item">\n' +
                                '                                    <div class="media col-sm-10">\n' +
                                '                                        <a class="pull-left" href="#" style="width: 70px;"><img src="source/image/product/' + value.image + '" height="70px"></a>\n' +
                                '                                        <div class="media-body">\n' +
                                '                                            <span class="cart-item-title">' + value.name + '</span>\n' +
                                '                                            <span class="cart-item-amount">' + value.price + ' VNĐ</span>\n' +
                                '                                            <input type="number" class="number" value="' + value.qty + '" product_id="' + value.rowId + '" min="1" style="width: 40px"/>\n' +
                                '                                        </div>\n' +
                                '                                    </div>\n' +
                                '                                    <a class="col-sm-2 delete" product_id="' + value.rowId + '" style="margin-top: 15px"><img src="source/image/delete.png"></a>\n' +
                                '                                    <div class="clearfix"></div>\n' +
                                '                                </div>';
                        })
                        title += '</div><div class="cart-caption">\n' +
                            '<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value" id="total">' + data[2] + ' VNĐ</span></div>\n' +
                            '                                <div class="clearfix"></div>\n' +
                            '                                <div class="center">\n' +
                            '                                    <div class="space10">&nbsp;</div>\n' +
                            '                                    <a href="dat-hang.html" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>\n' +
                            '                                </div>\n' +
                            '                            </div>\n' +
                            '                        </div>';
                        $('#div-cart').html(title);
                        $.dialog({
                            theme: 'material',
                            title: '',
                            content: 'Sản phẩm được thêm vào giỏ hàng thành công!',
                            animationSpeed: 300,
                            backgroundDismiss: false,
                            backgroundDismissAnimation: 'glow',
                        });
                    }else{
                        $.confirm({
                            theme: 'material',
                            title:'',
                            content: 'Bạn phải đăng nhập trước mới thêm được sản phẩm vào giỏ hàng',
                            buttons: {
                                Ok: {
                                    btnClass: 'btn-blue',
                                    action:function () {
                                        window.location.href = 'dang-nhap.html';
                                    }
                                },
                                Cancel: {}
                            }
                        });

                    }
                    // $('body,html').animate({scrollTop:0},600,function () {
                    //     $('#noidung').slideDown(600);
                    // });
                });
        });
        //suggest search
        var engine = new Bloodhound({
            remote: {
                url: 'search.html?q=%QUERY%',
                wildcard: '%QUERY%'
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });
        engine.initialize();
        $(".search-input").typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            source: engine.ttAdapter(),
            name: 'search-input',
            displayKey:'name',
            templates: {
                empty: [
                    // '<div class="list-group search-results-dropdown"><div class="list-group-item">Không có kết quả phù hợp.</div></div>'
                ],
                header: [
                    '<div class="list-group search-results-dropdown">'
                ],
                suggestion: function (data) {
                    return '<a style="cursor: pointer" class="list-group-item">' + data.name + '</a>'
                }
            }
        });
        //không sử dụng bloodhound
        // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // $('.search-input').typeahead({
        //     source: function(query, result)
        //     {
        //         $.ajax({
        //             url:"search.html",
        //             method:"post",
        //             dataType:"json",
        //             data:{key:query,_token: CSRF_TOKEN},
        //             success:function(data)
        //             {
        //                 result($.map(data, function(item){
        //                     return item;
        //                 }));
        //             }
        //         })
        //     },
        // });
        //c2
        // $('.search-input').typeahead({
        //     source:  function (query, process) {
        //         return $.get('search.html', { key: query }, function (data) {
        //             return process(data);
        //         });
        //     }
        // });
        $('input[name=subject],textarea[name=message]').click(function () {
            if(!$('#user').length){
                window.location.href = 'dang-nhap.html';
            }
        });
        if($('#user').length){
            $('#btphanhoi').removeAttr('disabled');
        }
    })
</script>
@yield('script')
</body>
</html>
