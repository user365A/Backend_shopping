  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

    </a>
    <a href="{{ route('admin.logout') }}" style="margin-left: 20px" class="brand-text font-weight-light">
        Logout
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Nguyen Dinh Anh Tai</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{route('categories.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                List of products
                <span class="right badge badge-danger"> New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('menus.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Menus
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('products.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('sliders.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Slider
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('settings.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                List of employee
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('roles.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                List of roles
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('permissions.create')}}" class="nav-link">

              <p>
                Create table data: permissions
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
