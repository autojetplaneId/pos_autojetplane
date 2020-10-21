<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('uploads/users/'.Auth::user()->photo) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{  ucfirst(Auth::user()->name) }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        @include('layouts.module.sidebar.main_nav')
        @include('layouts.module.sidebar.sidebar_admen')
        @include('layouts.module.sidebar.sidebar_ukp')
        @role('admin')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Manajemen Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> Users</a></li>
            <li><a href="{{ route('role.index') }}"><i class="fa fa-circle-o"></i> Role</a></li>
            <li><a href="{{ route('users.roles_permission') }}"><i class="fa fa-circle-o"></i> Role Permission</a></li>
          </ul>
        </li>
        @endrole
        @role('admin|kasir')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Manajemen Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('order.transaksi') }}"><i class="fa fa-circle-o"></i> Transaksi</a></li>
          </ul>
        </li>
        @endrole
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
