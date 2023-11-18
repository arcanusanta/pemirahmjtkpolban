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

            <li class="menu-header">{{ __('Manajemen Pengguna') }}</li>
            <li class="{{ Request::routeIs('operator.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('operator.index') }}"><i class="fas fa-users"></i> <span>{{ __('Operator') }}</span></a></li>
            <li class="dropdown ">
                    <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>{{ __('Pemilih') }}</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::routeIs('voter.study-program.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('voter.study-program.index') }}">{{ __('Program Studi') }}</a></li>
                        <li class="{{ Request::routeIs('voter.grade.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('voter.grade.index') }}">{{ __('Kelas') }}</a></li>
                        <li class="{{ Request::routeIs('voter.data.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('voter.data.index') }}">{{ __('Data') }}</a></li>
                    </ul>
                </li>
        </ul>
    </aside>
</div>