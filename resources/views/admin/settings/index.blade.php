@extends('layouts.admin')

@section('title')

<title>Settings</title>

@endsection

@section('css')

<link href="{{asset('admins/settings/add/add.css')}}" rel="stylesheet" />

@endsection

@section('js')
<script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/main.js')}}"></script>
@endsection


@section('content')

  <div class="content-wrapper">

    @include('partials.content_header',['name'=>'Settings','key'=>'List'])


    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="container mt-3">
                <div class="col-md-12">
                <div class="btn-group mb-2">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                        <span style="color: red">Add settings</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                          <li><a href="{{route('settings.create').'?type=Text'}}">Text</a></li>
                          <li><a href="{{route('settings.create').'?type=Textarea'}}">Textarea</a></li>
                    </ul>
                </div>

                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                          <tr style="background-color: cornflowerblue">
                            <th>Id</th>
                            <th>Config key</th>
                            <th>Config value</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($settings as $setting)


                          <tr>
                            <td>{{$setting->id}}</td>
                            <td>{{$setting->config_key}}</td>
                            <td>{{$setting->config_value}}</td>
                            <td>
                                <a data-url="{{route('settings.delete',['id'=>$setting->id])}}" class="btn btn-danger action_delete">Delete</a>
                                <a href="{{route('settings.edit',['id'=>$setting->id]).'?type='.$setting->type}}" class="btn btn-primary">Edit</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                <div class="col-md-12">
                    {{ $settings->links('pagination::bootstrap-4') }}
                </div>
              </div>

        </div>

      </div>
    </div>

  </div>
@endsection


