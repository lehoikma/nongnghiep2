@extends('user.layouts.app')
@section('title-web')
    Văn Bản
@endsection
@section('content')
    <div class="mobile-content col-lg-9 col-md-9 col-sm-9 col-xs-12" style="padding: 0px">
        <div class="vmag-breadcrumbs">
        <span>
            <a href="{{route('user_top')}}">Trang chủ</a>
        </span> >
            <span class="current">Văn Bản</span>
        </div>
        <table class="table table-bordered">
            <thead style="background: #8ecd6c;">
            <tr>
                <th>STT</th>
                <th>Số/Ký hiệu</th>
                <th>Tên văn bản</th>
                <th>Ngày ban hành</th>
                <th>Tài liệu đính kèm</th>
            </tr>
            </thead>
            <tbody>
            @foreach($document as $k=>$value)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$value['no_key']}}</td>
                    <td>{{$value['name']}}</td>
                    <td>{{$value['date']}}</td>
                    <td style="text-align: center">
                        <a target="_blank" href="/upload_documents/{{$value['attach']}}">Tải Về</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-12" style="border-bottom: 1px solid #eee;margin-bottom: 10px;"></div>
    </div>
@endsection