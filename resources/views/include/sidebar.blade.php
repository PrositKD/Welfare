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
            <li class="sidebar-item {{ request()->routeIs('apartment-category.index') || request()->routeIs('apartment-category.create') || request()->routeIs('apartment-category.edit') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('apartment-category.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Apartments Category</span>
                </a>
            </li>
            @endif
            @if(auth()->user()->type == "user")
            <!-- Collection Report -->
            <li class="sidebar-item {{ request()->routeIs('user.collection-report') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('user.collection-report') }}">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Collection Report</span>
                </a>
            </li>
            
            <!-- Payment History -->
            <li class="sidebar-item {{ request()->routeIs('user.payment-history') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('user.payment-history') }}">
                    <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Payment History</span>
                </a>
            </li>
        
            <!-- Collect Payment -->
            <li class="sidebar-item {{ request()->routeIs('user.collect-payment') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('user.collect-payment') }}">
                    <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Collect Payment</span>
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

                <div class="d-grid">
                    <a href="{{ route('logout') }}" class="btn btn-primary"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="align-middle me-1" data-feather="log-out"></i>Log out
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
