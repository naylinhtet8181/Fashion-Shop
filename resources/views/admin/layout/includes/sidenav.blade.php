<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            <li class="current"><a href=""><i class="glyphicon glyphicon-home"></i>
                    Dashboard</a></li>
                  <li>
                <a href="{{ url('admin/user') }}">
                    <i class="glyphicon glyphicon-list"></i>Users
                </a>
            </li>          
            <li>
                <a href="{{ url('admin/item') }}">
                    <i class="glyphicon glyphicon-list"></i> Products
                </a>
            </li>
            <li >
                <a href="{{ url('admin/category') }}">
                    <i class="glyphicon glyphicon-list"></i> Categories
                </a>
                </li>
            <li>
                <a href="{{ url('admin/order') }}">
                    <i class="glyphicon glyphicon-list"></i> Orders
                </a>
            </li>
        </ul>
    </div>
</div> <!-- ADMIN SIDE NAV-->
