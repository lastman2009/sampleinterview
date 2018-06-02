@extends('layouts.app')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if(session()->has('danger'))
    <div class="alert alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Setting</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/update-setting" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        

                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required autofocus>

                            </div>
                        </div>

                         <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required autofocus>

                              
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"  value="{{ $user->email }}" required>

                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="profile_image" class="col-md-4 control-label">Profile Image</label>

                            <div class="col-md-6">
                                <input id="profile_image" type="file" class="form-control" name="profile_image">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="profile_image" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                             <img src="/images/{{$user->profile_image}}" width="50px" height="50px">

                            </div>
                    

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
