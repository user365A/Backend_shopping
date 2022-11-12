@extends('layouts.admin')

@section('title')

<title>Roles</title>

@endsection

@section('js')
<script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/main.js')}}"></script>
@endsection

@section('content')

  <div class="content-wrapper">

    @include('partials.content_header',['name'=>'Roles','key'=>'List'])


    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container mt-3">
                <div class="col-md-12">
            <a href="{{route('roles.create')}}"  class="btn btn-primary  m-2">Add</a>

                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Ten vai tro</th>
                            <th>Mo ta vai tro</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($roles as $role)


                          <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->display_name}}</td>
                            <td>
                                {{-- <a data-url="{{route('roles.delete',['id'=>$role->id])}}" class="btn btn-danger action_delete">Delete</a> --}}
                                <a href="{{route('roles.edit',['id'=>$role->id])}}" class="btn btn-primary">Edit</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                <div class="col-md-12">
                    {{ $roles->links('pagination::bootstrap-4') }}
                </div>
              </div>

        </div>

      </div>
    </div>

  </div>
@endsection


