@extends('admin.layout.admin')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <div class="d-flex justify-content-around mb-2">
        <div class="p-2"><h2>Category</h2></div>
        <div class="p-2"><a href="{{route('category.create')}}" class="btn btn-info" id="h2">
            Add New Category</a></div>
      </div>
<table class="table mt-5">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
<th>Name</th>
<th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $category)
      <tr>
        <td>{{ ++$i }}</td>
<td>{{$category->name}}</td>

        <td>
          <p class="d-inline">
          <a href="{{route('category.edit',$category->id)}}" class="edit btn btn-warning">Edit</a>
          <form action="{{route('category.destroy',$category->id)}}" method="post" style="display: inline;">
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

    {!! $products->links() !!}

@endsection


