<!-- Sidebar -->
<div class="sidebar col-md-2" style="margin-top: -60px;float: left">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
{{--        <div class="image">--}}
{{--            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
{{--        </div>--}}
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2" style="width: 230px">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Tables
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url("/products")}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product Tables</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url("/categories")}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category Tables</p>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>

