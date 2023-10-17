<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Wunmi Thrift 'N' More</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Welcome, {{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="{{url('redirects')}}" class="nav-link {{ isActive('redirects') }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        
        <li class="nav-item menu-open">
          <a href="#" class="nav-link {{ isActive('dashboard') }}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Managements
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('new-orders')}}" class="nav-link {{ isActive('new-orders') }}">
                <i class="far fa-circle nav-icon"></i>
                <span class="right badge badge-danger">New</span>
                <p>New Orders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('order-history')}}" class="nav-link {{ isActive('order-history') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Order History</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('users')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item {{ isMenuOpen('category*') }}">
            <a href="#" class="nav-link {{isActive('category*')}}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('category')}}" class="nav-link {{ isActive('category') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('add-category')}}" class="nav-link {{ isActive('category/add') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ isMenuOpen('product*') }}">
            <a href="#" class="nav-link {{isActive('product*')}}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('add-product')}}" class="nav-link {{ isActive('product/add') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product')}}" class="nav-link {{ isActive('product') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Products</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{route('message')}}" class="nav-link {{ isActive('messages') }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Message
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>