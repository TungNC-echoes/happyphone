@extends('site.layout')
@section('content')
    <div class="container">
        <div id="content">
            @if(Session::has('flag'))
                <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}

                </div>
            @endif
            @if(Session::has('thongbao'))
                <div class="alert alert-success" style="background:#00ced1;font-size:16px;color:black">
                    {{Session::get('thongbao')}}
                </div>
            @endif
            @if(Session::has('loi'))
                <div class="alert alert-danger" style="background:Red; color:black;font-size:16px;">
                    {{Session::get('loi')}}
                </div>
            @endif
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection