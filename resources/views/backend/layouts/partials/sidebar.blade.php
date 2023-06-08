 <!-- sidebar menu area start -->
 @php
     $usr = Auth::guard('admin')->user();
 @endphp
<style>
    .show-sidebar{
        left: 0 !important;
    }
    .hide-sidebar{
        left: -90% !important;
    }
</style>
<style>
    
.toggle-sidebar{
    display: none;
    height: 55px;
    width: 57px;
  }
@media screen and (max-width: 1365px) {
  .toggle-sidebar{
    display: inherit;
  }
}
</style>
 <div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}">
                <h2 class="text-white">
          <img src="{{ URL::to('/') }}/img/logo/logo.png" alt="logo" width="130" style="background:white;padding:10px;border-radius: 10px;">
                </h2> 
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner" style="position:relative;">
            <nav>
                <ul class="metismenu" id="menu">

                    @if ($usr->can('dashboard.view') || $usr->can('Dashboard Pengunjung view') || $usr->can('Dashboard Pengelola view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                        <ul class="collapse">
                            @if ($usr->can('dashboard.view'))
                                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            @endif
                            @if ($usr->can('Dashboard Pengunjung view'))
                                <li class="{{ Route::is('dashboard-pengunjung') ? 'active' : '' }}"><a href="{{ route('dashboard-pengunjung') }}">Dashboard Pengunjung</a></li>
                            @endif
                            @if ($usr->can('Dashboard Pengelola view'))
                                <li class="{{ Route::is('dashboard-pengelola') ? 'active' : '' }}"><a href="{{ route('dashboard-pengelola') }}">Dashboard Pengelola</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if ($usr->can('profile.view'))
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>Pesanan </span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('pesanan-list') ? 'active' : '' }}"><a href="{{ route('pesanan-list') }}">List Pesanan</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>Profile </span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('profile') ? 'active' : '' }}"><a href="{{ route('profile') }}">Profile</a></li>
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            @if ($usr->can('role.view'))
                                <li class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            @endif
                            @if ($usr->can('role.create'))
                                <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    
                    @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Admins
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                            
                            @if ($usr->can('admin.view'))
                                <li class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}"><a href="{{ route('admin.admins.index') }}">All Admins</a></li>
                            @endif

                            @if ($usr->can('admin.create'))
                                <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a href="{{ route('admin.admins.create') }}">Create Admin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    
                    @if ($usr->can('Master Destinasi create') || $usr->can('Master Destinasi view') ||  $usr->can('Master Destinasi edit') ||  $usr->can('Master Destinasi delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Master Destinasi
                        </span></a>
                        <ul class="collapse {{ Route::is('destinasi-create') || Route::is('destinasi-list') || Route::is('destinasi-edit')  ? 'in' : '' }}">
                            
                            @if ($usr->can('Master Destinasi view'))
                                <li class="{{ Route::is('destinasi-list')  || Route::is('destinasi-edit') ? 'active' : '' }}"><a href="{{ route('destinasi-list') }}">List Destinasi</a></li>
                            @endif

                            @if ($usr->can('Master Destinasi create'))
                                <li class="{{ Route::is('destinasi-create')  ? 'active' : '' }}"><a href="{{ route('destinasi-create') }}">Create Destinasi</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('Master Destinasi create') || $usr->can('Master Destinasi view') ||  $usr->can('Master Destinasi edit') ||  $usr->can('Master Destinasi delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Master Kategori Explore
                        </span></a>
                        <ul class="collapse {{ Route::is('destinasi-create') || Route::is('kategori-explore') || Route::is('destinasi-edit')  ? 'in' : '' }}">
                            
                            @if ($usr->can('Master Destinasi view'))
                                <li class="{{ Route::is('kategori-explore') ? 'active' : '' }}"><a href="{{ route('kategori-explore') }}">List Kategori Explore</a></li>
                            @endif

                        </ul>
                    </li>
                    @endif

                    @if ($usr->can('Master Destinasi create') || $usr->can('Master Destinasi view') ||  $usr->can('Master Destinasi edit') ||  $usr->can('Master Destinasi delete'))
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                            Master Events
                        </span></a>
                        <ul class="collapse {{ Route::is('destinasi-create') || Route::is('kategori-explore') || Route::is('destinasi-edit')  ? 'in' : '' }}">
                            
                            @if ($usr->can('Master Destinasi view'))
                                <li class="{{ Route::is('event') ? 'active' : '' }}"><a href="{{ route('event') }}">List Events</a></li>
                            @endif

                        </ul>
                    </li>
                    @endif

                </ul>
            </nav>

            <div class="btn btn-secondary toggle-sidebar" style="font-size:20px;position: absolute;bottom: 0;left: 5%;">
                <
            </div>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->