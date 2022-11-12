@extends('layouts.admin')

@section('title')

<title>Edit</title>

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

    @include('partials.content_header',['name'=>'Products','key'=>'Edit'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container">
                <h2>Edit form</h2>
                    <form action="{{route('products.update',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="">Ten San pham:</label>
                        <input value="{{$product->name}}" type="text" name="name" class="form-control"  placeholder="ten san pham" >
                      </div>
                      <div class="form-group">
                        <label for="">Gia:</label>
                        <input type="text" value="{{$product->price}}" name="price" class="form-control"  placeholder="gia san pham" >
                      </div>
                      <div class="form-group">
                        <label for="">Anh dai dien:</label>
                        <input type="file"  name="feature_image_path" class="form-control-file"  placeholder="hinh anh san pham" >
                        <div class="col-md-12 m-3">
                            <div class="row">
                                <img src="{{$product->feature_image_path}}" alt="" width="500px" height="500px">
                            </div>
                        </div>
                    </div>
                      <div class="form-group">
                        <label for="">Anh chi tiet:</label>
                        <input type="file" multiple name="image_path[]" class="form-control-file"  placeholder="hinh anh san pham" >
                        <div class="col-md-12 m-3">
                            <div class="row">
                                @foreach($product->images as $image)
                                <div class="col-md-3">
                                    <img class="image_detail_product" src="{{$image->image_path}}" alt="" >
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                      <div class="form-group">
                        <label for="">Chon danh muc</label>
                        <select class="form-control select2_init" name="category_id">
                            {!! $option !!}
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Noi dung:</label>
                        <textarea  name="content" class="form-control tinymce_editor" id="" cols="30" rows="10">{{$product->content}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="">Nhap tags cho san pham</label>
                        <select name="tags[]" style="color: cyan" class="form-control tags_select_choose" multiple="multiple">
                          @foreach($product->tags as $tagItem)
                            <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                          @endforeach
                        </select>

                      </div>
                      <button type="submit" class="btn btn-success">Submit</button>
                    </form>

              </div>
        </div>
      </div>
    </div>

  </div>
@endsection

