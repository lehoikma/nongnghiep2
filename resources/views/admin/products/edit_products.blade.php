@extends('admin.layouts.app')
@section('title-content')
    Sửa Tin Tức
@endsection
@section('content')
    <div class="col-md-12">
        <form action="{{route('edit_products')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="products_id" value="{{$products['id']}}">
            <div class="col-md-8">
                <label>Tên Tin Tức <span style="color: red">(*)</span></label>
                <div class="form-group">
                    <input type="text" name="title_products" class="form-control" placeholder="Nhập tên sản phẩm ..." value="{{$products['title']}}">
                </div>
                @if ($errors->has('title_products'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('title_products') }}</p>
                @endif
            </div>

            <div class="col-md-8">
                <label>Danh Mục Tin Tức :</label>
                <select class="form-control" id="sel1" name="select_cate_prd">
                    <option value=""></option>
                    @foreach($categories as $value)
                        <option value="{{$value['id']}}" @if ($value['id'] == $products['category_product_id'])selected @endif>{{$value['name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12" style="margin-top: 15px">
                <label>Giới Thiệu Về Sản Phẩm<span style="color: red">(*)</span></label>
                <textarea name="description" rows="7" class="form-control">{{$products['description']}}</textarea>

                @if ($errors->has('description'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('description') }}</p>
                @endif
            </div>

            <div class="col-md-12" style="margin-top: 15px">
                <label>Mô tả về tin tức <span style="color: red">(*)</span></label>
                <textarea id="editor1" name="content_products" rows="7" class="form-control ckeditor">{{$products['content']}}</textarea>
                <script src="/ckeditor/ckeditor.js"></script>

                <script type="text/javascript">
                  CKEDITOR.replace( 'editor1' );
                </script>
                @if ($errors->has('content_products'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('content_products') }}</p>
                @endif
            </div>

            <div class=" col-md-8" style="margin-top: 10px">
                <input name="status" type="checkbox" value="1" @if($products['favorite'] == 1) checked @endif> Tích chọn bài viết ra ngoài slide
            </div>

            <div class=" col-md-8" style="margin-top: 10px">
                <label>Hình ảnh đại diện <span style="color: red">(*)</span></label>
                <input type="file" name="fileToUpload">
                <img id="image" src="/upload/{{$products['image']}}" style="width: 150px; margin-top: 10px">
                @if ($errors->has('fileToUpload'))
                    <p class="help-block text-left" style="color: red">{{ $errors->first('fileToUpload') }}</p>
                @endif
            </div>

            <div class=" col-md-8" style="margin-top: 20px">
                <label>Hình ảnh nổi bật ( Hiển thị ở slide)</label>
                <input type="file" name="fileFavorite">
                @if(!empty($products['image_favorite']))
                <img id="image" src="/upload/{{$products['image_favorite']}}" style="width: 150px; margin-top: 10px">
                @endif
            </div>

            <div class=" col-md-8" style="margin-top: 20px">
                <button type="submit" class="btn btn-primary"> Sửa Tin Tức</button>
            </div>
        </form>
    </div>

@endsection