@extends('user.layouts.app')
@section('title-web')
Videos
@endsection
@section('content')
    <div class="mobile-content col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding: 0px">
        <div class="vmag-breadcrumbs">
        <span>
            <a href="{{route('user_top')}}">Trang chủ</a>
        </span> >
            <span class="current">Videos</span>
        </div>
        <div class="videos" style="width: 80%">
            @foreach($videos as $value)
                <strong>{{$value['name']}}</strong>
                <div class="clearfix item-news-custom" style="padding: 10px 0px; ">
                    {!! $value['videos'] !!}
                </div>
            @endforeach
        </div>
        <div class="col-md-12" style="border-bottom: 1px solid #eee;margin-bottom: 10px;"></div>
    </div>
@endsection