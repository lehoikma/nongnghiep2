@extends('admin.layouts.app')
@section('title-content')
    Sửa Danh Mục Tin Tức
@endsection
@section('content')
    <div class="col-md-12 flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- end .flash-message -->
    <div class="col-md-12">
        <div class="col-md-12" ><h4>Tên Danh Mục</h4></div>
        <form method="post" action="{{route('save_edit_news_category')}}">
            {{csrf_field()}}
            <div class="col-md-8">
                <div class="form-group">
                    <input type="hidden" name="id_category_news" class="form-control" value="{{$category['id']}}">
                    <input type="text" name="name_category_news" class="form-control" value="{{$category['name']}}">
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Sửa Danh Mục</button>
            </div>
        </form>
    </div>
    <div class="col-md-12" style="border-top: 1px solid #ffffff;"></div>
    <div class="col-md-12" >
        <div class="col-md-12" ><h4>Danh Sách Danh Mục</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width:10%;">STT</th>
                    <th style="width: 50%">Tên Danh Mục</th>
                    <th style="width: 20%">Ngày Tạo</th>
                    <th style="width: 20%"></th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($categoriesNews))
                    @foreach($categoriesNews as $value)
                        <tr>
                            <td>{{$value['id']}}</td>
                            <td>{{$value['name']}}</td>
                            <td>{{$value['created_at']}}</td>
                            <td>
                                <a href="{{route('form_edit_news_category', $value['id'])}}">
                                    <button class="btn btn-warning btn-sm" data-id="{{$value['id']}}"><i class="fa fa-trash"></i> Sửa</button>
                                </a>
                                <a href="{{route('delete_news_category', $value['id'])}}">
                                    <button class="btn btn-danger btn-sm" data-id="{{$value['id']}}"><i class="fa fa-trash"></i> Xoá</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>
@endsection
@section('script')
    <script>
      $(function () {
        $(".alert" ).fadeOut(5000);
      });
    </script>
@endsection