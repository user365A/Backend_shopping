@extends('layouts.admin')

@section('title')

<title>Edit</title>

@endsection

@section('content')

  <div class="content-wrapper">

    @include('partials.content_header',['name'=>'Menu','key'=>'Edit'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container">
                <h2>Edit form</h2>
                <form action="{{route('menus.update',['id'=>$menu->id])}}" method="POST">
                    @csrf
                  <div class="form-group">
                    <label for="">Ten Danh Muc:</label>
                    <input type="text" name="name" class="form-control" value="{{$menu->name}}"  placeholder="ten danh muc" >
                  </div>
                  <div class="form-group">
                    <label for="pwd">Danh muc cha:</label>
                    <select class="form-control" name="parent_id">
                        <option value="0">Chon danh muc cha </option>
                         {!! $option !!}
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

