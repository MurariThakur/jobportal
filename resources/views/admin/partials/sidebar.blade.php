<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold">Job Portal</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.user') ? 'active' : '' }}">
            <a href="{{ route('admin.user') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.category*') ? 'active' : '' }}">
            <a href="{{ route('admin.category') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-folder"></i>
                <div data-i18n="Categories">Categories</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.jobtype*') ? 'active' : '' }}">
            <a href="{{ route('admin.jobtype') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-list"></i>
                <div data-i18n="Job Types">Job Types</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.job.*') ? 'active' : '' }}">
            <a href="{{ route('admin.job.list') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-briefcase"></i>
                <div data-i18n="Jobs">Jobs</div>
            </a>
        </li>
        
    </ul>
    <div class="menu-footer mt-auto p-3">
        <form method="POST" action="{{ url('/admin/logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger w-100">
                <i class="ti ti-logout me-2"></i>Logout
            </button>
        </form>
    </div>
</aside>
