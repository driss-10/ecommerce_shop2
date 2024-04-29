<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <a href="/">Home</a>


  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link" >
      <span class="brand-text "> <strong>E</strong>-commerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
 

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <div class="input-group-append">
            
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{url('admin/dashboard')}}" class="nav-link @if( Request::segment(2) == 'dashboard' ) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{url('admin/admin/list')}}" class="nav-link  @if( Request::segment(2) == 'admin' ) active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
        </li>
        <li class="nav-item ">
          <a href="{{url('admin/category/list')}}" class="nav-link  @if( Request::segment(2) == 'category' ) active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
              Category
            </p>
          </a>
        </li>
      </li>
      <li class="nav-item ">
        <a href="{{url('admin/sub_category/list')}}" class="nav-link  @if( Request::segment(2) == 'sub_category' ) active @endif">
          <i class="nav-icon fas fa-list-alt"></i>
          <p>
            Sub Category
          </p>
        </a>
      </li>
    </li>
    <li class="nav-item ">
      <a href="{{url('admin/brand/list')}}" class="nav-link  @if( Request::segment(2) == 'brand' ) active @endif">
        <i class="nav-icon fas fa-apple-alt" aria-hidden="true"></i>
        <p>
          Brand
        </p>
      </a>
    </li>
  </li>
  <li class="nav-item ">
    <a href="{{url('admin/color/list')}}" class="nav-link  @if( Request::segment(2) == 'color' ) active @endif">
      <i class="nav-icon fas fa-circle " aria-hidden="true"></i>
      <p>
        Color
      </p>
    </a>
  </li>
</li>
        <li class="nav-item ">
          <a href="{{url('admin/product/list')}}" class="nav-link  @if( Request::segment(2) == 'product' ) active @endif">
            <i class="nav-icon fas fa-box" aria-hidden="true"></i>
            <p>
              Product
            </p>
          </a>
        </li>
        <li class="nav-item ">
          <a href="{{url('admin/message/list')}}" class="nav-link  @if( Request::segment(2) == 'message' ) active @endif">
            <i class="nav-icon fas fa-comments" aria-hidden="true"></i>
            <p>
              Messages
            </p>
          </a>
        </li>
            <li class="nav-item">
              <a href="{{url('admin/logout')}}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
            </li>
      
          </li>
         
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>