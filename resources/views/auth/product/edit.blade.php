
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
        <div class="panel-heading">Edit Product <b>{{$product->name}}</b></div>

        <div class="panel-body">
          <form method="POST" action="/edit-product/{{$product->id}}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Product Name</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby="productName" value="{{$product->name}}" >
            </div>
              <div class="form-group">
              <label for="exampleInputEmail1">Product price</label>
              <input type="text" class="form-control" name="price" id="exampleInputEmail1" aria-describedby="productPrice" placeholder="Product Price" value="{{$product->price}}">
            </div>
            <button type="submit" class="btn btn-primary">Add Product</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
