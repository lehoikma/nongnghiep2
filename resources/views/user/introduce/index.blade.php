@extends('user.layouts.app')
@section('title-web')
    Giới Thiệu
@endsection
@section('content')
    <div class="mobile-content col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding: 0px">
        <div class="vmag-breadcrumbs">
        <span>
            <a href="{{route('user_top')}}">Trang chủ</a>
        </span> >
            <span class="current">Giới Thiệu</span>
        </div>
        <div class="introduces">
            <ul style="list-style: none;padding-left: 0px;">
                <li style="margin-bottom: 10px;background: #f6f6f6;padding: 10px;border-radius: 8px;">
                    <h4>
                        <a href="{{route('introduce1')}}">Lịch sử Hình Thành</a>
                    </h4>
                </li>
                <li style="margin-bottom: 10px;background: #f6f6f6;padding: 10px;border-radius: 8px;">
                    <h4>
                        <a href="{{route('introduce2')}}">Cơ Cấu Tổ Chức</a>
                    </h4>
                </li>
                <li style="margin-bottom: 10px;background: #f6f6f6;padding: 10px;border-radius: 8px;">
                    <h4>
                        <a href="{{route('introduce3')}}">Đơn Vị Thành Viên</a>
                    </h4>
                </li>
                <li style="margin-bottom: 10px;background: #f6f6f6;padding: 10px;border-radius: 8px;">
                    <h4>
                        <a href="{{route('introduce4')}}">Đảng, Đoàn Thể</a>
                    </h4>
                </li>
            </ul>
        </div>
        <div class="col-md-12" style="border-bottom: 1px solid #eee;margin-bottom: 10px;"></div>
    </div>
@endsection