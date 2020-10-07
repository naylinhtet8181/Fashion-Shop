@extends('admin.layout.admin')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p id="bt2">{{ $message }}<button id="bt1"><fa class="fa fa-close"></fa></button></p>
</div>
@endif
<div class="d-flex justify-content-around mb-2">
    <div class="p-2"><h2>Product</h2></div>
    <div class="p-2"><a href="{{route('item.create')}}" class="btn btn-info" id="h2">
        Add New Product</a></div>
  </div>
<table class="table mt-5">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
  <th>Name</th>
  <th class="one">Price</th>
  <th class="one">Image</th>
  <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
          <tr>
            <td>{{ ++$i }}</td>
  <td>{{$item->name}}</td>
  <td class="one">$ {{$item->price}}</td>
  <td class="one"><img src="{{asset($item->image)}}" width="50px" height="50px"></td>
      <td>
              <p class="d-inline">
            <a href="{{route('item.show',$item->id)}}" class="btn btn-success">Show</a>
              <a href="{{route('item.edit',$item->id)}}" class="btn btn-warning">Edit</a>
              <form action="{{route('item.destroy',$item->id)}}" method="post" style="display: inline;">
              @method('DELETE')
              @csrf
              <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger" onclick="return confirm('Are You Sure?');">
            </form>
              </p>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

<style>

</style>

      {!! $items->links() !!}

@endsection
