@extends('layouts.admin')

@section('title')

<title>Users</title>

@endsection

@section('js')
<script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/main.js')}}"></script>
@endsection

@section('content')

  <div class="content-wrapper">

    @include('partials.content_header',['name'=>'Users','key'=>'List'])


    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container mt-3">
                <div class="col-md-12">
            <a href="{{route('users.create')}}"  class="btn btn-primary  m-2">Add</a>

                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Ten </th>
                            <th>Email</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)


                          <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a data-url="{{route('users.delete',['id'=>$user->id])}}" class="btn btn-danger action_delete">Delete</a>
                                <a href="{{route('users.edit',['id'=>$user->id])}}" class="btn btn-primary">Edit</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                <div class="col-md-12">
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>
              </div>

        </div>

      </div>
    </div>

  </div>
@endsection


