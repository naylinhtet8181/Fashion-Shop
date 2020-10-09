@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="header"><div class="card-header"><center><h5>My Account</h5></center></div></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

  <p>Name :{{ Auth::user()->name }}</p>
    <p>Email :{{ Auth::user()->email }}</p>
   <a href="{{ route('logout') }}">  <button type="submit" class="btn btn-outline-danger waves-effect">Log Out</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
   .header{
        background-color:#ff6666;
    }
  .card-header{
      color:white;
  }
button{
    background-color:#ff6666;
    color:white;
    border:white;
}
</style>
