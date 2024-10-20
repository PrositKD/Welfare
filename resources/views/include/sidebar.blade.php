<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle">Admin Panel</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            @if(auth()->user()->type === 'admin')
            <li class="sidebar-item {{ request()->routeIs('staff.index') || request()->routeIs('staff.create') ||request()->routeIs('staff.edit') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('staff.index')}}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Staffs</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('building.index') || request()->routeIs('building.create') ||request()->routeIs('building.edit') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('building.index')}}">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Buildings</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('apartment.index') || request()->routeIs('apartment.create') ||request()->routeIs('apartment.edit') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('apartment.index')}}">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Apartments</span>
                </a>
            </li>
            @endif

            {{-- <li class="sidebar-item {{ request()->routeIs('leave_request.index') || request()->routeIs('leave_request.create') ||request()->routeIs('leave_request.edit') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('leave_request.index')}}">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Leave Request</span>
                </a>
            </li> --}}
        </ul>

        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components? Check out our premium version.
                </div>
                <div class="d-grid">
                    <a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
                </div>
            </div>
        </div>
    </div>
</nav>
