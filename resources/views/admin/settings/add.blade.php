@extends('layouts.admin')

@section('title')

<title>Settings</title>

@endsection

@section('content')

  <div class="content-wrapper">

    @include('partials.content_header',['name'=>'Settings','key'=>'Add'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container">
                <h2>Settings form</h2>
                <form action="{{route('settings.store').'?type='.request()->type}}" method="POST">
                    @csrf
                  <div class="form-group">
                    <label for="">Config key:</label>
                    <input type="text" name="config_key" class="form-control @error('config_key') is-invalid @enderror"  placeholder="Nhap config key" >
                    @error('config_key')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                  @if(request()->type=='Text')
                  <div class="form-group">
                    <label for="">Config value:</label>
                    <input type="text" name="config_value" class="form-control @error('config_value') is-invalid @enderror"  placeholder="Nhap config value" >
                    @error('config_value')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                  @elseif(request()->type=='Textarea')
                  <div class="form-group">
                    <label for="">Config value:</label>
                    <textarea name="config_value" id="" class="form-control @error('config_value') is-invalid @enderror" cols="30" rows="10"></textarea>
                    @error('config_value')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                  @endif


                  <button type="submit" class="btn btn-success">Submit</button>
                </form>
              </div>
        </div>
      </div>
    </div>

  </div>
@endsection


