@extends('layouts.admin')

@section('title')

<title>Menu</title>

@endsection

@section('content')

  <div class="content-wrapper">

    @include('partials.content_header',['name'=>'Menu','key'=>'List'])


    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container mt-3">
                <div class="col-md-12">
            <a href="{{route('menus.create')}}"  class="btn btn-primary  m-2">Add</a>

                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                          <tr style="background-color: darkgray">
                            <th>Id</th>
                            <th>Ten Menu</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($menus as $menu)


                          <tr>
                            <td>{{$menu->id}}</td>
                            <td>{{$menu->name}}</td>
                            <td>
                                @can('category-delete')
                                <a href="{{route('menus.delete',['id'=>$menu->id])}}" class="btn btn-danger">Delete</a>
                                @endcan
                                @can('category-delete')
                                <a href="{{route('menus.edit',['id'=>$menu->id])}}" class="btn btn-primary">Edit</a>
                                @endcan
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                <div class="col-md-12">
                    {{ $menus->links('pagination::bootstrap-4') }}
                </div>
              </div>

        </div>

      </div>
    </div>

  </div>
@endsection


