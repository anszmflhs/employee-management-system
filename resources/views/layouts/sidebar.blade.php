<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>


    <li class="nav-item {{ Request::segment(1) == 'role' ? 'active' : '';}}">
        <a class="nav-link" href="{{ route('role.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Role</span></a>
    </li>
    <li class="nav-item {{ Request::segment(1) == 'permission' ? 'active' : '';}}">
        <a class="nav-link" href="{{ route('permission.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Permission</span></a>
    </li>
    <li class="nav-item {{ Request::segment(1) == 'role-permission' ? 'active' : '';}}">
        <a class="nav-link" href="{{ route('role-permission.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Role Permission</span></a>
    </li>
</ul>
