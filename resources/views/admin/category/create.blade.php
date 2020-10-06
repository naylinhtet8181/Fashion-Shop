@extends('admin.layout.admin')

@section('content')

<div class="modal-body">
    <div class="form-group">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf



                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
@endsection


