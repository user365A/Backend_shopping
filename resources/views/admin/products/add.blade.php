@extends('layouts.admin')

@section('title')

<title>Add product</title>

@endsection

@section('css')

<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />

@endsection

@section('js')

<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('admins/product/add/add.js')}}"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

@endsection

@section('content')

  <div class="content-wrapper">

    @include('partials.content_header',['name'=>'Products','key'=>'Add'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container">
                <h2>Add form</h2>

                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                    <label for="">Ten San pham:</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror"  placeholder="ten san pham" >
                    @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="">Gia:</label>
                    <input type="text" name="price" value="{{old('price')}}" class="form-control @error('price') is-invalid @enderror"  placeholder="gia san pham" >
                    @error('price')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="">Anh dai dien:</label>
                    <input type="file" name="feature_image_path"  class="form-control-file @error('feature_image_path') is-invalid @enderror"  placeholder="hinh anh san pham" >
                    @error('feature_image_path')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="">Anh chi tiet:</label>
                    <input type="file" multiple name="image_path[]" class="form-control-file"  placeholder="hinh anh san pham" >
                  </div>
                  <div class="form-group">
                    <label for="">Chon danh muc</label>
                    <select class="form-control select2_init  @error('category_id') is-invalid @enderror" name="category_id">
                        <option value="">Chon danh muc</option>
                        {!! $option !!}
                    </select>
                    @error('category_id')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="">Noi dung:</label>
                    <textarea name="content"  class="form-control tinymce_editor @error('content') is-invalid @enderror" id="" cols="30" rows="10">{{old('content')}}</textarea>
                    @error('content')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="">Nhap tags cho san pham</label>
                    <select name="tags[]" style="color: cyan" class="form-control tags_select_choose" multiple="multiple">
                     
                    </select>

                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
        </div>
      </div>
    </div>

  </div>
@endsection



