<link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @yield('title-web')
    </title>
    <link rel="shortcut icon" href="image/favicon.png" type="image/x-icon"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <link rel="stylesheet" href="/bxslider/src/css/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="/bxslider/src/js/jquery.bxslider.js"></script>
    <script>
      $(function(){
        $('.slider').bxSlider({
          mode: 'fade',
          captions: true,
          pager: false,
          infiniteLoop: true,
          auto: true,
          autoStart:true
        });
      });
      $(document).ready(function () {
        $(window).scroll(function () {
          if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
          } else {
            $('.scrollToTop').fadeOut();
          }
        });
        $('.scrollToTop').click(function () {
          $('html, body').animate({ scrollTop: 0 }, 800);
          return false;
        });
      });
    </script>
</head>
<body style="margin: 0px">
<div class="page">
    <div class="header">
        <header>
            <div class="logotop">
                <div class="container">
                    <div class="row">
                        <div class="row col-md-7 logo-img" style="margin: 15px 0px; padding-left: 0px">
                            <a href="">
                                <img src="http://www.dap-vinachem.com.vn/images/contact/4926logo.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="menubar">
                <div class="container" style="background: #8fcc6d">
                    <div class="row">
                        <div id="nav-wrapper" class="nav-wrapper" style="position: relative;float: left;width: 100%;background: #f6f6f6;border: 1px solid #d9d8d8;">
                            <ul id="primary-menu" class="menu menu-custom" style="list-style: none; position: relative;">
                                <li>
                                    <a class="menu-active" href="{{route('user_top')}}">Trang chủ</a>
                                </li>
                                <li>
                                    <a class="menu-active" href="{{route('introduce')}}">Giới Thiệu</a>
                                    <ul class="sub-menu" style="padding: 0px">
                                        <li>
                                            <a href="{{route('introduce1')}}" style="border: none">
                                                Lịch Sử Hình Thành
                                            </a>
                                        </li>
                                        <br>
                                        <li>
                                            <a href="{{route('introduce2')}}" style="border: none">
                                                Cơ Cấu Tổ Chức
                                            </a>
                                        </li>
                                        <br>
                                        <li>
                                            <a href="{{route('introduce3')}}" style="border: none">
                                                Đơn Vị Thành Viên
                                            </a>
                                        </li>
                                        <br>
                                        <li>
                                            <a href="{{route('introduce4')}}" style="border: none">
                                                Đảng, Đoàn Thể
                                            </a>
                                        </li>
                                        <br>
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-active" href="{{route('news')}}">Tin Tức</a>
                                    <ul class="sub-menu" style="padding: 0px">
                                        <?php
                                        $cateNews = \App\Models\CategoriesNews::all();
                                        ?>
                                        @foreach($cateNews as $catNews)
                                            <li>
                                                <a href="{{route('list_news_user',[
                            'category' => str_slug($catNews['name']),
                            'id' => $catNews['id']
                            ])}}" style="border: none">
                                                    {{$catNews['name']}}
                                                </a>
                                            </li>
                                            <br>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-active" href="{{route('products')}}">Sản Phẩm</a>
                                    <ul class="sub-menu" style="padding: 0px">
                                        <?php
                                        $catePrds = \App\Models\CategoriesProducts::all();
                                        ?>
                                        @foreach($catePrds as $catprd)
                                            <li>
                                                <a href="{{route('list_product_user', [
                            'category' => str_slug($catprd['name']),
                            'id' => $catprd['id']
                            ])}}" style="border: none">
                                                    {{$catprd['name']}}
                                                </a>
                                            </li>
                                            <br>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-active" href="{{route('hotel')}}">Khách Sạn</a>
                                </li>
                                <li>
                                    <a href="{{route('document')}}" class="menu-active" >Văn Bản</a>
                                </li>
                                <li>
                                    <a class="menu-active" href="{{route('videos')}}">Videos</a>
                                </li>
                                <li>
                                    <a class="menu-active" href="{{route('list_image')}}">Hình Ảnh</a>
                                </li>
                                <li>
                                    <a class="menu-active" href="{{route('contact')}}">Liên Hệ </a>
                                </li>
                            </ul>
                            <a href="javascript:void(0);" style="    color: #8fcc6d;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    display:none;padding-bottom:0px;font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="clearfix"></div>

    <div class="content">
        <div class="container">
            <div class="row" style="padding-top: 15px">
                @yield('content')
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="tin-tuc-noi-bat" style=" padding: 8px 16px; padding-left: 0px; padding-top: 0px">
                        <button type="button" class="btn btn-success" style=" background: #8fcc6d; color: #fff;text-transform: uppercase; font-weight: 500; display: block;border-color: snow; border-radius: 0px;">Tin Nổi Bật</button>
                        <?php
                        $newsFavorite = \App\Models\News::where('status', 1)->limit(5)
                            ->orderBy('updated_at', 'desc')->get();
                        ?>
                        @foreach($newsFavorite as $newF)
                            <div class="news_home_title">
                                <a href="#">{{$newF['title']}}</a>
                            </div>
                        @endforeach
                    </div>
                    <div class="tin-tuc-noi-bat" style=" padding: 8px 16px; padding-left: 0px; padding-top: 0px">
                        <button type="button" class="btn btn-success" style="margin-bottom: 10px; background: #8fcc6d; color: #fff;text-transform: uppercase; font-weight: 500; display: block;border-color: snow; border-radius: 0px;">Videos</button>
                        <?php $videos = \App\Models\Videos::limit(3)->orderBy('updated_at', 'desc')->get();?>
                        @foreach($videos as $video)
                            <strong>{{$video['name']}}</strong>
                            <div class="clearfix item-news-custom" style="padding: 10px 0px; ">
                                {!! $video['videos'] !!}
                            </div>
                        @endforeach
                    </div>
                    <div class="textCenter">
                        <button type="button" class="btn btn-success" style=" background: #8fcc6d; color: #fff;text-transform: uppercase; font-weight: 500; display: block;border-color: snow; border-radius: 0px;">Thư Viện Ảnh</button>
                        <a href="">
                            <img src="http://dabaco.vn/data/banners/rtx1392276809.jpg" border="0" style="width: 100%; padding-top: 10px">
                        </a>
                    </div>
                    <div class="textCenter">
                        <button type="button" class="btn btn-success" style="margin-top: 20px; background: #8fcc6d; color: #fff;text-transform: uppercase; font-weight: 500; display: block;border-color: snow; border-radius: 0px;">Phân Bón Doanh Nông</button>
                        <a href="">
                            <img src="http://alo-nongnghiep.com.vn/image/banner1.jpg" border="0" style="padding-top: 10px; width: 100%">
                        </a>
                        <a href="">
                            <img src="http://alo-nongnghiep.com.vn/image/banner2.jpg" border="0" style="padding-top: 20px; width: 100%">
                        </a>
                    </div>

                    <div class="textCenter">
                        <button type="button" class="btn btn-success" style="margin-top: 20px; background: #8fcc6d; color: #fff;text-transform: uppercase; font-weight: 500; display: block;border-color: snow; border-radius: 0px;">Quảng Cáo</button>
                        <a href="">
                            <img src="http://dabaco.vn/data/banners/yux1482887336.gif" border="0" style="padding-top: 10px; width: 100%">
                        </a>
                    </div>
                    <img src="http://dabaco.vn/data/banners/loe1357317276.jpg" border="0" style="padding-top: 20px; width: 100%">
                </div>
                <div class="clearfix"></div>
                @yield('hotel')
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <a href="#" class="scrollToTop"></a>
    <div class="footer" style="background: #8fcc6d; width: 100%; float: left; margin-top: 30px;">
        <div class="container" style="padding-top: 5px; padding-bottom: 0px;">
            <div class="blog1" style="width: 85%; float: left; padding: 20px;">
                <img class="footer-img" width="250" height="120" src="http://www.dap-vinachem.com.vn/images/contact/4926logo.png">
                <p class="footer-text-mobile" style="color: #fff; padding-top: 0px; padding-right: 20px; float: right;">Đơn vị chủ quản: Tập Đoàn Thành Đô<br>
                    Tòa nhà Plaschem, 562 Nguyễn Văn Cừ, Long Biên, Hà Nội<br>
                    Tel: 0243.652.7766 hoặc DĐ: 0913.311.678<br>
                    Chịu trách nhiệm nội dung: Vũ Thanh Khiết<br>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
  function myFunction() {
    var x = document.getElementById("nav-wrapper");
    if (x.className === "nav-wrapper") {
      x.className += " responsive";
    } else {
      x.className = "nav-wrapper";
    }
  }

  $(function() {
    var href = window.location.href;
    console.log(href.indexOf($(this).attr('href')));
    $('a.menu-active').each(function(e,i) {
      if (href.indexOf($(this).attr('href')) >= 0) {
        $('a.active').removeClass('active');
        $(this).addClass('active');
      }
    });

  });

</script>
