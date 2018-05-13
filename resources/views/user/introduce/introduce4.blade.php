@extends('user.layouts.app')
@section('title-web')
    Đảng, Đoàn Thể
@endsection
@section('content')
    <div class="mobile-content col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding: 0px">
        <div class="vmag-breadcrumbs">
        <span>
            <a href="{{route('user_top')}}">Trang chủ</a>
        </span> >
            <span class="current">Đảng, Đoàn Thể</span>
        </div>
        <h2 class="page-title" style="font-weight: 400; color: #38A63A;border-bottom: 1px solid #eee;padding-bottom: 10px;">
            Đảng, Đoàn Thể
        </h2>
        <div class="introduces">
            {{$introduce['content']}}
        </div>
        <div class="col-md-12" style="border-bottom: 1px solid #eee;margin-bottom: 10px;"></div>
    </div>
@endsection