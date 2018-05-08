@extends('admin.layouts.app')
@section('title-content')
    Tạo Tin Tức
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
        <form action="{{route('save_news')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-md-8">
                <label>Tên Tin Tức <span style="color: red">(*)</span></label>
                <div class="form-group">
                    <input type="text" name="title_news" class="form-control" placeholder="Nhập tên tin tức ..." value="{{old('title_news')}}">
                </div>
                @if ($errors->has('title_news'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('title_news') }}</p>
                @endif
            </div>

            <div class="col-md-8">
                <label>Danh Mục Tin Tức :</label>
                <select class="form-control" id="sel1" name="select_cate_prd">
                    <option value=""></option>
                    @foreach($categories as $value)
                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12" style="margin-top: 15px">
                <label>Mô tả về tin tức <span style="color: red">(*)</span></label>
                <textarea id="editor1" name="content_news" rows="7" class="form-control ckeditor">{{old('content_news')}}</textarea>
                <script src="/ckeditor/ckeditor.js"></script>

                <script type="text/javascript">
                  CKEDITOR.replace( 'editor1' );
                </script>
                @if ($errors->has('content_news'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('content_news') }}</p>
                @endif
            </div>

            <div class=" col-md-8" style="margin-top: 10px">
                <input name="status" type="checkbox" value="1"> Tích chọn bài viết ra ngoài trang chủ
            </div>

            <div class=" col-md-8" style="margin-top: 10px">
                <label>Hình ảnh đại diện <span style="color: red">(*)</span></label>
                <input type="file" name="fileToUpload">
                @if ($errors->has('fileToUpload'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('fileToUpload') }}</p>
                @endif
            </div>

            <div class=" col-md-8" style="margin-top: 20px">
                <label>Hình ảnh nổi bật ( Hiển thị ở slide)</label>
                <input type="file" name="fileFavorite">
            </div>

            <div class=" col-md-8" style="margin-top: 20px">
                <button type="submit" class="btn btn-primary"> Tạo Tin Tức</button>
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