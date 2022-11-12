@extends('layouts.admin')

@section('title')

<title>Menu</title>

@endsection

@section('content')

  <div class="content-wrapper">

    @include('partials.content_header',['name'=>'Menu','key'=>'Add'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container">
                <h2>Menu form</h2>
                <form action="{{route('menus.store')}}" method="POST">
                    @csrf
                  <div class="form-group">
                    <label for="">Ten Menu:</label>
                    <input type="text" name="name" class="form-control"  placeholder="ten menu" >
                  </div>
                  <div class="form-group">
                    <label for="pwd">Chon menu cha:</label>
                    <select class="form-control" name="parent_id">
                        <option value="0">Menu cha </option>
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


