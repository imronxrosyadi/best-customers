<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Best Customer</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="{{ (request()->is('admin/dashboard*')) ? 'active nav-item' : 'nav-item' }}">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Customers -->
    <li class="{{ (request()->is('admin/customers*')) ? 'active nav-item' : 'nav-item' }}">
        <a class="nav-link" href="{{ route('customers.index') }}">
            <i class="fas fa-user-friends"></i>
            <span>Customers</span></a>
    </li>

    <!-- Nav Item - Criteria -->
    <li class="{{ (request()->is('admin/criterias*')) ? 'active nav-item' : 'nav-item' }}">
        <a class="nav-link" href="{{ url('admin/criterias') }}">
            <i class="fas fa-splotch"></i>
            <span>Criteria</span></a>
    </li>

    <li class="{{ (request()->is('admin/sub-criterias*')) ? 'active nav-item' : 'nav-item' }}">
        <a class="nav-link" href="{{ url('admin/sub-criterias') }}">
        <i class="fas fa-splotch"></i>

            <span>Sub Criterias</span></a>
    </li>

    <!-- Nav Item - Evaluation -->
    <li class="{{ (request()->is('admin/evaluations*')) ? 'active nav-item' : 'nav-item' }}">
        <a class="nav-link" href="{{ url('admin/evaluations') }}">
            <i class="fas fa-users-cog"></i>
            <span>Evaluation</span></a>
    </li>


    <!-- Nav Item - Calculate -->
    <li class="{{ (request()->is('admin/calculates*')) ? 'active nav-item' : 'nav-item' }}">
        <a class="nav-link" href="{{ url('admin/calculates') }}">
            <i class="fas fa-calculator"></i>
            <span>Calculate</span></a>
    </li>

    <!-- Nav Item - Report -->
{{--    <li class="{{ (request()->is('admin/reports*')) ? 'active nav-item' : 'nav-item' }}">--}}
{{--        <a class="nav-link" href="{{ url('admin/reports') }}">--}}
{{--            <i class="fas fa-poll"></i>--}}
{{--            <span>Reports</span></a>--}}
{{--    </li>--}}


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
