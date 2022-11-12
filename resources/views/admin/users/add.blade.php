@extends('layouts.admin')

@section('title')

<title>Users</title>

@endsection

@section('css')

<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/user/add/add.css')}}" rel="stylesheet" />

@endsection

@section('js')

<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('admins/user/add/add.js')}}"></script>

@endsection

@section('content')

  <div class="content-wrapper">

    @include('partials.content_header',['name'=>'Users','key'=>'Add'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container">
                <h2>User form</h2>
                <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                    <label for="">Ten User:</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror"  placeholder="Ten user" >
                    @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Email:</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"  placeholder="Nhap email" >
                    @error('email')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Password:</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Nhap password" >
                    @error('password')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Chon vai tro:</label>
                    <select name="role_id[]" class="form-control select2_init" multiple>
                        @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
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


