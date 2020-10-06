@extends('admin.layout.admin')

@section('content')

<div class="modal-body">
    <div class="form-group">
        <form action="{{ route('item.update',$items->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')

             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Category:</label>
                        <select class="form-control" name="category" placeholder="hello">
                       @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$items->name}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price:</strong>
                        <input type="text" name="price" class="form-control" placeholder="price" value="{{$items->price}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea name="description" rows="4" class="form-control" placeholder="Description" value="{{$items->description}}">{{$items->description}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image">
                    <input type="hidden" name="oldimage" value="{{$items->image}}">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                    </div>
            </div>

        </div>


@endsection
