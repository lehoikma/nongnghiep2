@extends('user.layouts.app')
@section('title-web')
    Hình Ảnh
@endsection
@section('content')
    <div class="mobile-content col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding: 0px">
        <div class="vmag-breadcrumbs">
        <span>
            <a href="{{route('user_top')}}">Trang chủ</a>
        </span> >
            <span class="current">Hình Ảnh</span>
        </div>
        <h2 class="page-title" style="font-weight: 400; color: #38A63A;border-bottom: 1px solid #eee;padding-bottom: 10px;">
            Hình Ảnh
        </h2>
        @foreach($categoryImage as $category)
            <div class="image" style="text-align: center; margin-bottom: 10px;">
                @foreach($listImage as $image)
                    @if($category['id'] == $image['category_image_id'])
                        <img src="upload/{{$image['image']}}" style="width: 50%; margin-bottom: 10px"></br>
                        @if(isset($image['description']))
                            <i>{{$image['description']}}</i>
                        @endif
                    @endif
                @endforeach
            </div>
        @endforeach
        <div class="col-md-12" style="border-bottom: 1px solid #eee;margin-bottom: 10px;"></div>
    </div>
@endsection