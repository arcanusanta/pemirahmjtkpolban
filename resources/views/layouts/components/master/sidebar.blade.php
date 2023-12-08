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
            @hasanyrole('Administrator|Operator|Witness|Voter')
                <li class="menu-header">{{ __('Master') }}</li>
            @endhasanyrole
            @hasanyrole('Administrator|Operator|Witness|Voter')
                <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> <span>{{ __('Dashboard') }}</span></a></li>
            @endhasanyrole

            @hasanyrole('Administrator|Operator')
                <li class="menu-header">{{ __('Manajemen Pengguna') }}</li>
            @endhasanyrole
            @hasanyrole('Administrator')
                <li class="{{ Request::routeIs('operator.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('operator.index') }}"><i class="fas fa-user-lock"></i> <span>{{ __('Operator') }}</span></a></li>
            @endhasanyrole
            @hasanyrole('Administrator|Operator')
                <li class="{{ Request::routeIs('voter.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('voter.index') }}"><i class="fas fa-users"></i> <span>{{ __('Pemilih') }}</span></a></li>
            @endhasanyrole
            @hasanyrole('Administrator|Operator')
                <li class="{{ Request::routeIs('witness.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('witness.index') }}"><i class="fas fa-user-tag"></i> <span>{{ __('Saksi') }}</span></a></li>
            @endhasanyrole
            

            @hasanyrole('Administrator|Operator')
                <li class="menu-header">{{ __('Manajemen Data') }}</li>
            @endhasanyrole
            @hasanyrole('Administrator|Operator')
                <li class="{{ Request::routeIs('study-program.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('study-program.index') }}"><i class="fas fa-hourglass-half"></i> <span>{{ __('Program Studi') }}</span></a></li>
            @endhasanyrole
            @hasanyrole('Administrator|Operator')
                <li class="{{ Request::routeIs('grade.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('grade.index') }}"><i class="fas fa-landmark"></i> <span>{{ __('Kelas') }}</span></a></li>
            @endhasanyrole
            @hasanyrole('Administrator|Operator')
                <li class="{{ Request::routeIs('candidate.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('candidate.index') }}"><i class="fas fa-users-cog"></i> <span>{{ __('Kandidat') }}</span></a></li>
            @endhasanyrole

            @hasanyrole('Administrator|Operator|Witness')
                <li class="menu-header">{{ __('Status Pemilihan') }}</li>
            @endhasanyrole
            @hasanyrole('Administrator|Operator|Witness')
                <li class="{{ Request::routeIs('election-status.already') ? 'active' : '' }}"><a class="nav-link" href="{{ route('election-status.already') }}"><i class="fas fa-book"></i> <span>{{ __('Sudah Memilih') }}</span></a></li>
            @endhasanyrole
            @hasanyrole('Administrator|Operator|Witness')
                <li class="{{ Request::routeIs('election-status.notyet') ? 'active' : '' }}"><a class="nav-link" href="{{ route('election-status.notyet') }}"><i class="fas fa-book-reader"></i> <span>{{ __('Belum Memilih') }}</span></a></li>
            @endhasanyrole

            @hasrole('Voter')
                <li class="menu-header">{{ __('Tempat Pemungutan Suara') }}</li>
                <li class="{{ Request::routeIs('polling-booth.index') ? 'active' : '' }}"><a class="nav-link" href="{{ route('polling-booth.index') }}"><i class="fas fa-box"></i> <span>{{ __('Bilik Suara') }}</span></a></li>
            @endhasrole
        </ul>
    </aside>
</div>