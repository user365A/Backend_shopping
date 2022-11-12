@extends('layouts.admin')

@section('title')

<title>Home</title>

@endsection

@section('content')

  <div class="content-wrapper">

    @include('partials.content_header',['name'=>'Category','key'=>'List'])


    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container mt-3">
                <div class="col-md-12">
                    @can('category-add')
                    <a href="{{route('categories.create')}}"  class="btn btn-primary  m-2">Add</a>
                    @endcan
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                          <tr style="background-color: darkgray">
                            <th>Id</th>
                            <th>Ten Danh Muc</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($categories as $category)


                          <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                @can('category-delete')
                                <a href="{{route('categories.delete',['id'=>$category->id])}}" class="btn btn-danger">Delete</a>
                                @endcan
                               @can('category-edit')
                               <a href="{{route('categories.edit',['id'=>$category->id])}}" class="btn btn-primary">Edit</a>
                               @endcan
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                <div class="col-md-12">
                    {{ $categories->links('pagination::bootstrap-4') }}
                </div>
              </div>

        </div>

      </div>
    </div>

  </div>
@endsection


