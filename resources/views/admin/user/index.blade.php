@extends('admin.layout.admin')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<h2>User Table</h2>
<table class="table mt-5">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
  <th>Name</th>
  <th>Email</th>
  <th>Date</th>
  <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
          <tr>
            <td>{{ ++$i }}</td>
  <td>{{$item->name}}</td>
  <td>{{$item->email}}</td>
  <td>{{$item->created_at}}</td>
      <td>
              <p class="d-inline">
              <form action="{{route('user.destroy',$item->id)}}" method="post" style="display: inline;">
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