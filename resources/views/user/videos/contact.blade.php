@extends('user.layouts.app')
@section('title-web')
Liên Hệ
@endsection
@section('content')
    <div class="mobile-content col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding: 0px">
        <div class="vmag-breadcrumbs">
        <span>
            <a href="{{route('user_top')}}">Trang chủ</a>
        </span> >
            <span class="current">Liên Hệ</span>
        </div>
        <h3>Bản đồ :</h3>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0053722781136!2d105.78364601429789!3d21.032471043028952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4ca1ce8cd9%3A0x8f23470d428d5e90!2zUGjhu5EgRHV5IFTDom4sIEThu4tjaCBW4buNbmcgSOG6rXUsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1525603734838" width="800" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="detail_contact" style="text-align: left;font-size: 16px;">
            <h3>Công ty cổ phần DAP - Vinachem</h3>
            <p class="address-1"><strong>Trụ sở chính:</strong> Lô GI-7, Khu Kinh tế Đình Vũ, Phường Đông Hải II, Quận Hải An, Tp. Hải Phòng</p>
            <p class="mobile-1"><strong>Điện thoại:</strong> 02253.979.368 - <span style="color: #e00;"><strong>Hotline:</strong> 02253.979.368</span></p>
            <p class="fax-1"><strong>Fax:</strong> 031.3979170</p>
            <p class="email-1"><strong>Email:</strong> <a href="mailto:daphaiphong@gmail.com">daphaiphong@gmail.com</a></p>
        </div>
        <div class="col-md-12" style="border-bottom: 1px solid #eee;margin-bottom: 10px;"></div>
    </div>
@endsection