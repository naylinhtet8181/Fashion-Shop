
<div class="col-md-12 heading">
<div class="d-flex justify-content-around mb-2">
    <div class="p-2 admin"><h2>Admin</h2></div>
    <div class="p-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{Auth::user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{url('/')}}">Home</a>
          <a class="dropdown-item" href="{{url('/logout')}}">LogOut</a>
        </div></div>
  </div>
</div>
