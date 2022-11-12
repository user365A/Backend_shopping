@extends('layouts.admin')

@section('title')

<title>Slider</title>

@endsection

@section('content')

  <div class="content-wrapper">

    @include('partials.content_header',['name'=>'Slider','key'=>'Add'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container">
                <h2>Slider form</h2>
                <form action="{{route('sliders.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                    <label for="">Ten Slider:</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror"  placeholder="ten slider" >
                    @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="">Mo ta:</label>
                    <textarea name="des"  id="" class="form-control @error('des') is-invalid @enderror" cols="30" rows="10">{{old('des')}}</textarea>
                    @error('des')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                  <div class="form-group">
                    <label for="">Hinh anh:</label>
                    <input type="file" name="image_path" class="form-control-file @error('image_path') is-invalid @enderror"  placeholder="" >
                    @error('image_path')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                  <button type="submit" class="btn btn-success">Submit</button>
                </form>
              </div>
        </div>
      </div>
    </div>

  </div>
@endsection


