@extends('user.layouts.app')
@section('title-web')
    Trang Chủ
@endsection
@section('content')
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding: 0px">
        <div class="slider">
            <div>
                <img src="image/slider.jpg">
                <div class="bx-caption">
                    <a id="img1a" href="google.com">
                        <span>Funky roots</span>
                    </a>
                </div>
            </div>
            <div>
                <img src="image/slider2.jpg">
                <div class="bx-caption">
                    <a id="img1a" href="google.com">
                        <span>Funky roots</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-12 san-pham">
            <button type="button" class="btn btn-success" style=" background: #8fcc6d; color: #fff;text-transform: uppercase; font-weight: 500; display: block;border-color: snow; border-radius: 0px; margin-bottom: 15px">SẢN PHẨM & DỊCH VỤ</button>
            @if(!empty($product))
                @foreach($product as $prd)
                    <div class="row col-lg-4 col-md-4 col-sm-4 col-xs-12 item-product" style="margin-right: 15px;">
                    <div class="infobox" style="    width: 100%;
        text-align: center;">
                        <div class="img-box" style="width: 100%;
        overflow: hidden;
        border: 1px solid #49a969;
        border-radius: 5px;
        height: 160px;">
                            <a href="#">
                                <img src="upload/{{$prd['image']}}" class="img-responsive">
                            </a>
                        </div>

                        <a href="#" class="title-box" style="display: block;
        font-size: 17px;
        font-weight: bold;
        color: #1c9343;
        margin: 15px 0 15px 0;">{{$prd['title']}}</a>
                        <div class="info-description" style="    font-weight: 400;
        line-height: 1.6;">
                            <p>{{substr($prd['description'], 0, 180)}} ...</p>
                        </div>
                        <div style="    margin: 25px 0 40px 0;">
                            <a href="#" style="    display: inline-block;
        text-transform: uppercase;
        color: #000;
        background-color: #f4f4f4;
        border-radius: 5px;
        border: 1px solid #dbdbdb;
        padding: 8px 15px;">Xem thêm</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        <div class="col-md-12" style="padding: 0px">
            @foreach($categoryNews as $category)
                <?php
                    $listNews = \App\Models\News::where('category_news_id', $category['id'])->orderBy('updated_at', 'desc')->limit(5)->get();
                ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-news" style="padding-bottom: 20px">
                <button type="button" class="btn btn-success" style=" background: #8fcc6d; color: #fff;text-transform: uppercase; font-weight: 500; display: block;border-color: snow; border-radius: 0px; margin-bottom: 15px">{{$category['name']}}</button>
                @if(count($listNews) > 0)
                    <div class="first-news">
                        <a href="#">
                            <img src="/upload/{{$listNews[0]['image']}}" class="img-responsive img-thumbnail">
                        </a>
                        <h3><a href="#">{{$listNews[0]['title']}}</a></h3>
                        <span class="time-posted">Ngày {{date_format(date_create($listNews[0]['updated_at']), 'Y-m-d')}}</span>
                    </div>
                    <ul class="more-news">
                        @foreach($listNews as $k=>$value)
                            @if($k != 0)
                                <li>
                                    <a href="#">{{$value['title']}}</a>
                                    <span class="time-posted">Ngày {{date_format(date_create($value['updated_at']), 'Y-m-d')}}</span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <div class="view-more">
                        <a href="#">Xem thêm</a>
                    </div>
                @endif
            </div>
            @endforeach
        </div>

    </div>
@endsection
@section('hotel')
    <div class="col-md-12" style="background-color: #f5f5f5;padding: 60px 10px;">
        <div class="row">
            <div id="aboutus1" class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <h2 style="margin-top:0;font-size:22px;">Về chúng tôi</h2>
                <h3>Khách Sạn Hà Anh</h3>
                <div class="description">
                    <p>Công ty Cổ phần DAP – VINACHEM là doanh nghiệp cổ phần với 64% vốn Nhà nước trực thuộc Tập đoàn Công nghiệp Hóa chất Việt Nam. Giấy chứng nhận đăng ký kinh doanh số 0200827051, do Sở kế hoạch &amp; Đầu tư Hải Phòng cấp&nbsp; ngày 29/7/2008 và đăng ký thay đổi lần thứ 4, ngày 26/12/2014.</p>

                    <p>Vốn điều lệ: 1.461 tỷ đồng.</p>

                    <p>- Ngành nghề kinh doanh chính:</p>
                </div>
                <div style="padding-top: 20px; text-align: center; padding-bottom: 20px">
                    <a href="" style="    background-color: #f1c02d;color: #000;border-radius: 5px;text-transform: uppercase;padding: 8px 20px;text-shadow: none;">Xem thêm</a>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 text-right">
                <img style="height: 350px;width: 100%;" src="http://images.sakihotel.com/content_img/2015/1028/05_phong_03_1_IMG_6909_resize.JPG" alt="Công ty cổ phần DAP - Vinachem" class="img-responsive img-thumbnail img-custom">
            </div>
        </div>
    </div>
@endsection