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
            @if(count($cateName) > 0)
                    {{$cateName['name']}}
                @endif
        </span>
        </div>
        @if(count($cateName) > 0)
            <h2 class="page-title"
                style="font-weight: 400; color: #38A63A;border-bottom: 1px solid #eee;padding-bottom: 10px;">
                {{$cateName['name']}}
            </h2>
        @endif
        <div class="col-md-12 row introduces">
            <div class="col-xs-12 item-products" style="margin-bottom: 30px">
                <ul class="col-xs-12 row" style="list-style: none">
            @if(count($products) > 0)
                @foreach($products as $product)
                            <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12 item special" style="float: left; margin-bottom: 30px; position: relative;z-index: 0;height: 359px;">
                                <div class="item_content" style="display: block; margin: 0 0 11px 11px;background: #f1f3f2;position: relative;text-align: center;">
                                    <figure style="overflow: hidden;position: relative;display: inline-block;margin: 10px 10px 0 10px;height: 300px">
                                        <div class="image" style="">
                                            <a href="{{route('detail_product', $product['id'])}}">
                                                <img src="/upload/{{$product['image']}}" style="display: block;max-width: 100%;    height: 100%;">
                                            </a>
                                        </div>
                                    </figure>
                                    <h3 class="title">
                                        <a href="" style="display: block;margin: 0 7px;height: 44px;overflow: hidden;color: #2d8d47;font-weight: 600;font-size: 14px;">
                                            {{$product['title']}}
                                        </a>
                                    </h3>
                                </div>
                            </li>

                @endforeach
            @endif
                </ul>
            </div>
        </div>
        <div class="col-md-12" style="text-align: center">
            <?php echo $products->render(); ?>
        </div>
        <div class="col-md-12" style="border-bottom: 1px solid #eee;margin-bottom: 10px;"></div>
    </div>
@endsection