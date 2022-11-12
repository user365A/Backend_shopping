@extends('layouts.admin')

@section('title')

<title>Products</title>

@endsection

@section('js')
<script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/product/index/list.js')}}"></script>
@endsection

@section('content')

  <div class="content-wrapper">

    @include('partials.content_header',['name'=>'Products','key'=>'List'])


    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container mt-3">
                <div class="col-md-12">
            <a href="{{route('products.create')}}"  class="btn btn-primary  m-2">Add</a>

                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                          <tr style="background-color:darkgray">
                            <th>Id</th>
                            <th>Ten San pham</th>
                            <th>Gia</th>
                            <th>Hinh anh</th>
                            <th>Danh muc</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($products as $pro)


                          <tr>
                            <td>{{$pro->id}}</td>
                            <td>{{$pro->name}}</td>
                            <td>{{number_format($pro->price)}}</td>
                            <td><img src="{{$pro->feature_image_path}}" width="200" height="200" alt=""></td>
                            <td>{{optional($pro->category)->name}}</td>
                            <td>
                                <a href="" data-url="{{route('products.delete',['id'=>$pro->id])}}" class="btn btn-danger action_delete">Delete</a>
                                <a href="{{route('products.edit',['id'=>$pro->id])}}"  class="btn btn-primary">Edit</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                <div class="col-md-12">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
              </div>

        </div>

      </div>
    </div>

  </div>
@endsection


