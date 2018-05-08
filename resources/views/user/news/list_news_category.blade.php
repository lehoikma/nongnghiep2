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
            >
        <span class="current">@if(count($news) > 0)
                <?php
                    $categoryNews = \App\Models\CategoriesNews::where('id', $news[0]['category_news_id'])->first();
                ?>
                {{$categoryNews['name']}}
            @endif
        </span>
        </div>
        @if(count($news) > 0)
            <h2 class="page-title" style="font-weight: 400; color: #38A63A;border-bottom: 1px solid #eee;padding-bottom: 10px;">
                    {{$categoryNews['name']}}
            </h2>
        @endif
        <div class="col-md-12 row introduces">
            <div class="col-xs-12 item-news" style="margin-bottom: 30px">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 row news-image">
                    <img src="http://kenh14cdn.com/thumb_w/300/2018/5/6/photo1525603787523-1525603787523647087986.jpg" style="width: 240px; height: 150px">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 news-content">
                    <a style="font-family: SFD-Bold;
    font-size: 20px;
    line-height: 26px;
    color: #333;
    text-decoration: none;
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
    margin-top: -5px;" href="#">9X được bố đặt tên "Nguyễn Thị Nô En" chỉ vì 1 câu nói định mệnh của ông hàng xóm</a>
                    <span class="time-posted">Ngày: 2018-05-05</span>
                    <p>Nghe xong tâm sự này của cô bạn có tên Nguyễn Thị Nô En, dân tình cảm thấy cuộc sống đôi lúc giống như một trò đùa, ...</p>
                </div>
            </div>
            <div class="col-xs-12 item-news" style="margin-bottom: 20px">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 row news-image">
                    <img src="http://kenh14cdn.com/thumb_w/300/2018/5/6/photo1525603787523-1525603787523647087986.jpg" style="width: 240px; height: 150px">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 news-content">
                    <a style="font-family: SFD-Bold;
    font-size: 20px;
    line-height: 26px;
    color: #333;
    text-decoration: none;
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
    margin-top: -5px;" href="#">9X được bố đặt tên "Nguyễn Thị Nô En" chỉ vì 1 câu nói định mệnh của ông hàng xóm</a>
                    <span class="time-posted">Ngày: 2018-05-05</span>
                    <p>Nghe xong tâm sự này của cô bạn có tên Nguyễn Thị Nô En, dân tình cảm thấy cuộc sống đôi lúc giống như một trò đùa, ...</p>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="border-bottom: 1px solid #eee;margin-bottom: 10px;"></div>
    </div>
@endsection