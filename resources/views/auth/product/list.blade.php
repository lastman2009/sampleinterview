@extends('layouts.app')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset">
            <div class="panel panel-default">
                <div class="panel-heading">Product List  <a style="float:right;" href="/create-product">Add Product</a></div>

                <div class="panel-body">
                    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
   


    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <th scope="row">1</th>
      <td>{{$product->name }}</td>
      <td>{{$product->price }}</td>
      <td><a href="/delete-product/{{$product->id}}" class="btn btn-danger btn-sm">Delete</a>
        <a href="/edit-product/{{$product->id}}" class="btn btn-primary btn-sm">Edit</a>
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
