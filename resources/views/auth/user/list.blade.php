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
        <div class="col-md-12 col-md-offset">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
      <th scope="col">Role</th>


    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">#</th>
      <th ><img src="/images/{{$user->profile_image}}" height="50px" width="50px"></th>

      <td>{{$user->first_name }}</td>
      <td>{{$user->last_name }}</td>
      <td>{{$user->email }}</td>
      <td><a href="/delete-user/{{$user->id}}" class="btn btn-danger btn-sm">Delete</a>
        <a href="/edit-user/{{$user->id}}" class="btn btn-primary btn-sm">Edit</a>
      </td>
      <td>
        <a href="/make-admin/{{$user->id}}" class="btn btn-info btn-sm">Make Admin</a>
          
      </td>

    </tr>
    @endforeach
   
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
