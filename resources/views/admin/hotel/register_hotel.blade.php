@extends('admin.layouts.app')
@section('title-content')
    Tạo, Sửa Khách Sạn
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
        <form action="{{route('save_hotel')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input name="id" value="{{$hotel['id']}}" type="hidden">
            <div class="col-md-8">
                <label>Tên Khách Sạn <span style="color: red">(*)</span></label>
                <div class="form-group">
                    <input type="text" name="title_hotel" class="form-control" placeholder="Nhập tên khách sạn ..." value="{{!empty(old('title_hotel')) ? old('title_hotel') : $hotel['name']}}">
                </div>
                @if ($errors->has('title_hotel'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('title_hotel') }}</p>
                @endif
            </div>

            <div class="col-md-12" style="margin-top: 15px">
                <label>Giới Thiệu Về  Khách Sạn ( Hiện thị ở trang chủ )<span style="color: red">(*)</span></label>
                <textarea name="description" rows="7" class="form-control">{{!empty(old('description')) ? old('description') : $hotel['description']}}</textarea>

                @if ($errors->has('description'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('description') }}</p>
                @endif
            </div>

            <div class="col-md-12" style="margin-top: 15px">
                <label>Mô tả về khách sạn <span style="color: red">(*)</span></label>
                <textarea id="editor1" name="content_hotel" rows="7" class="form-control ckeditor">{{!empty(old('content_hotel')) ? old('content_hotel') : $hotel['content']}}</textarea>
                <script src="/ckeditor/ckeditor.js"></script>

                <script type="text/javascript">
                    CKEDITOR.replace( 'editor1' );
                </script>
                @if ($errors->has('content_hotel'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('content_hotel') }}</p>
                @endif
            </div>

            <div class=" col-md-8" style="margin-top: 10px">
                <label>Hình ảnh nổi bật ( Hiển thị ở trang chủ)<span style="color: red">(*)</span></label>
                <input type="file" name="fileToUpload">
                @if(!empty($hotel['image']))
                    <img src="/upload/{{$hotel['image']}}" style="padding-top: 20px">
                @endif
            </div>

            <div class=" col-md-8" style="margin-top: 20px">
                <button type="submit" class="btn btn-primary">Tạo, Sửa Khách Sạn</button>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $(".alert" ).fadeOut(5000);
        });
    </script>
@endsection