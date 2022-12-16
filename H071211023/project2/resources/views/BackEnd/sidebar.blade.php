  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('AdminLTE')}}/dist/img/AdminLTELogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Foodiee</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('AdminLTE')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/foods" class="nav-link">
              <i class="nav-icon fas fa-hamburger"></i>
              <p>
                Makanan
                <span class="right fas fa-angle-left"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/orders" class="nav-link">
              <i class="nav-icon fas fa-receipt"></i>
              <p>
                Pesanan
                <span class="right fas fa-angle-left"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/categories" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Category
                <span class="right fas fa-angle-left"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/tags" class="nav-link">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Tag
                <span class="right fas fa-angle-left"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/users" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
                <span class="right fas fa-angle-left"></span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>