@extends('user.layouts.app')
@section('title-web')
    Tin Tức
@endsection
@section('content')
    <div class="mobile-content col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding: 0px">
        <div class="vmag-breadcrumbs">
        <span>
            <a href="{{route('user_top')}}">Trang chủ</a>
        </span> >
            <span class="current">Tin Tức</span>
        </div>
        <h2 class="page-title" style="font-weight: 400; color: #38A63A;border-bottom: 1px solid #eee;padding-bottom: 10px;">
            TIN TỨC
        </h2>
        <div class="introduces">
            <ul style="list-style: none;padding-left: 0px;">
                @foreach($newsCtgs as $value)
                    <li style="margin-bottom: 10px;background: #f6f6f6;padding: 10px;border-radius: 8px;">
                        <h4>
                            <a href="{{route('list_news',[
                            'category' => str_slug($value['name']),
                            'id' => $value['id']
                            ])}}">{{$value['name']}}</a>
                        </h4>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12" style="border-bottom: 1px solid #eee;margin-bottom: 10px;"></div>
    </div>
@endsection