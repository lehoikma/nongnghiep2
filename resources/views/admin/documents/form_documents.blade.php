@extends('admin.layouts.app')
@section('title-content')
    Tạo Văn Bản
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
        <form action="{{route('save_documents')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-md-8">
                <label>Tên Văn Bản <span style="color: red">(*)</span></label>
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Nhập tên văn bản ..." value="{{old('title')}}">
                </div>
                @if ($errors->has('title'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('title') }}</p>
                @endif
            </div>

            <div class="col-md-8">
                <label>Số, Ký Hiệu  <span style="color: red">(*)</span></label>
                <div class="form-group">
                    <input type="text" name="no_key" class="form-control" value="{{old('no_key')}}">
                </div>
                @if ($errors->has('no_key'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('no_key') }}</p>
                @endif
            </div>

            <div class="col-md-8">
                <label>Ngày Ban Hành<span style="color: red">(*)</span></label>
                <div class="form-group">
                    <input id="date" type="date" name="date">
                </div>
                @if ($errors->has('date'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('date') }}</p>
                @endif
            </div>

            <div class=" col-md-8" style="margin-top: 10px">
                <label>Tài Liệu Đính Kèm <span style="color: red">(*)</span></label>
                <input type="file" name="fileToUpload">
                @if ($errors->has('fileToUpload'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('fileToUpload') }}</p>
                @endif
            </div>

            <div class=" col-md-8" style="margin-top: 20px">
                <button type="submit" class="btn btn-primary"> Tạo Văn Bản</button>
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