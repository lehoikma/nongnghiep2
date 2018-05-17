@extends('user.layouts.app')
@section('title-web')
    Sản Phẩm
@endsection
@section('content')
    <div class="mobile-content col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding: 0px">
        <div class="vmag-breadcrumbs">
        <span>
            <a href="{{route('user_top')}}">Trang chủ</a>
        </span> >
            <span class="current">Sản Phẩm</span>
            >
            <span class="current">
            @if(count($products) > 0)
                    {{$products['title']}}
                @endif
        </span>
        </div>
        <h2 class="page-title"
            style="font-weight: 400; color: #38A63A;">
            123123
        </h2>
        <span class="posted-on">
            <span class="glyphicon glyphicon-calendar"></span>
            <a href="" rel="bookmark" style="color: #777;">
                {{date_format(date_create($products['created_at']), 'Y-m-d')}}
            </a>
        </span>

        <div class="col-md-12 row introduces" style="margin-top: 10px">
            {!! $products['content'] !!}
        </div>
        <div class="col-md-12" style="border-bottom: 1px solid #eee;margin-bottom: 10px;"></div>
    </div>
@endsection