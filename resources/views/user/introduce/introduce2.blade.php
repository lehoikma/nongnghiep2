@extends('user.layouts.app')
@section('title-web')
    Cơ Cấu, Tổ Chức
@endsection
@section('content')
    <div class="mobile-content col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding: 0px">
        <div class="vmag-breadcrumbs">
        <span>
            <a href="{{route('user_top')}}">Trang chủ</a>
        </span> >
            <span class="current">Cơ Cấu, Tổ Chức</span>
        </div>
        <div class="introduces">
            {{$introduce['content']}}
        </div>
        <div class="col-md-12" style="border-bottom: 1px solid #eee;margin-bottom: 10px;"></div>
    </div>
@endsection