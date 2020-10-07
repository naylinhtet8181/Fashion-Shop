@extends('admin.layout.admin')

@section('content')
<div class="d-flex justify-content-around mb-2">
    <div class="p-2"><h3>Users</h3></div>
    <div class="p-2"><a href="{{route('user.index')}}" class="btn btn-info" class="form-control">
        Back</a></div>
  </div>
</br>
@foreach($items as $item)
    <p><b>Name :</b>{{ $item->name }}</br></p>
    <p><b>Email</b> :{{ $item->email }}</br></p>
    <p><b>Date :</b>{{ $item->created_at }}</p>
</div></div>
@endforeach
<style>
    .col-md-7{
        font-size:16px;
    }
</style>
@endsection

