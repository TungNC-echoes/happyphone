@extends('site.layout')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Liên hệ</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('trangchu')}}">Trang chủ</a> / <span>Liên hệ</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="beta-map">

        <div class="abs-fullwidth beta-map wow flipInY">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6760662492416!2d105.84115344910703!3d21.00561828594225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ccab6dd7%3A0x55e92a5b07a97d03!2sHanoi+University+of+Science+and+Technology!5e0!3m2!1sen!2s!4v1517829114867" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">

            <div class="space50">&nbsp;</div>
            <div class="row">
                <div class="col-sm-8">
                    <h2>Phản hồi</h2>

                    <br>

                    <p>Hãy đưa ra phản hồi về sản phẩm, phục vụ... để chúng tôi có thể hoàn thiện hơn!</p>
                    <div class="space20">&nbsp;</div>
                    <form action="" id="phanhoi" method="post" class="contact-form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-block">
                            <input name="subject" type="text" placeholder="Tiêu đề">
                        </div>
                        <div class="form-block">
                            <textarea name="message" placeholder="Phản hồi của bạn"></textarea>
                        </div>
                        <div class="form-block">
                            <button type="submit" id="btphanhoi" disabled class="beta-btn primary">Gửi phản hồi <i class="fa fa-chevron-right"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4">
                    <h2>Thông tin liên hệ</h2>

                    <br>

                    <h3>Địa chỉ</h3>
                    <p>
                        Số 1 Trần Đại Nghĩa<br>
                    </p>

                    <br>

                    <h3>Liên lạc</h3>
                    <p>0357831525</p> <br>

                    <br>

                    <h3>Email</h3>
                    <p>bkaprodx@gmail.com</p>
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
@section('script')
    <script>
        $(document).ready(function ($) {
            $('#phanhoi').validate({
                rules:{
                    subject:{
                        required:true,
                        minlength:3
                    },
                    message:{
                        required:true,
                        minlength:10
                    },

                } ,
                messages:{
                    subject:{
                        required:'Bạn chưa nhập tiêu đề',
                        minlength:'Tiêu đề tối thiểu 3 ký tự',
                    },
                    message:{
                        required:'Bạn chưa nhập phản hồi',
                        minlength:'Phản hồi tối thiểu 10 ký tự',
                    }
                }
            });
            $('button[type=submit]').click(function () {
                if($('#phanhoi').valid()){
                    return true;
                }
                return false;

            });
        })
    </script>
@endsection