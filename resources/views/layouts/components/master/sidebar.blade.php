<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img class="d-inline-block" width="32px" height="30.61px" src="{{ asset('logo/HMJTK POLBAN.png') }}" alt="">
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="{{ asset('logo/HMJTK POLBAN.png') }}" alt="">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">{{ __('Master') }}</li>
            <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> <span>{{ __('Dashboard') }}</span></a></li>
        </ul>
    </aside>
</div>