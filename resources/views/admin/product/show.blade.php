@extends('admin.layout.admin')

@section('content')
<div class="container-fluid">
<div class="d-flex justify-content-around mb-2">
    <div class="p-2"><h3>Products</h3></div>
    <div class="p-2"><a href="{{route('item.index')}}" class="btn btn-info" class="form-control">
        Back</a></div>
  </div>
</br>
<div class="row">
<div class="col-md-3 offset-1"><img src="{{asset($item->image)}}" height="150px" width="150px"></p></div>
<div class="col-md-7 text-left">
    <p><b>Name :</b>{{ $item->name }}</br></p>
    <p><b>Price</b> :$ {{ $item->price }}</br></p>
    <p><b>Category :</b>{{ $item->category->name }}</p>
    <p><b>Description :</b>{{ $item->description}}</p>
</div></div>
</div>
</div>
<style>
    .col-md-7{
        font-size:16px;
    }
</style>
@endsection

