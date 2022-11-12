@extends('layouts.admin')

@section('title')

<title>Slider</title>

@endsection

@section('js')
<script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/main.js')}}"></script>
@endsection

@section('content')

  <div class="content-wrapper">

    @include('partials.content_header',['name'=>'Slider','key'=>'List'])


    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container mt-3">
                <div class="col-md-12">
            <a href="{{route('sliders.create')}}"  class="btn btn-primary  m-2">Add</a>

                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Ten Slider</th>
                            <th>Description</th>
                            <th>Hinh Anh</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($sliders as $slider)


                          <tr>
                            <td>{{$slider->id}}</td>
                            <td>{{$slider->name}}</td>
                            <td>{{$slider->des}}</td>
                            <td><img src="{{$slider->image_path}}" width="200" height="200" alt=""></td>
                            <td>
                                <a data-url="{{route('sliders.delete',['id'=>$slider->id])}}" class="btn btn-danger action_delete">Delete</a>
                                <a href="{{route('sliders.edit',['id'=>$slider->id])}}" class="btn btn-primary">Edit</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                <div class="col-md-12">
                    {{ $sliders->links('pagination::bootstrap-4') }}
                </div>
              </div>

        </div>

      </div>
    </div>

  </div>
@endsection


