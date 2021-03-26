<ul class="navbar-nav bg-light sidebar sidebar-light accordion border {{ Session::get('sidebarState') }}"
    id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img class="img-fluid" src="{{ asset('/penyimpanan/logo/alco-width.png') }}" style="width: 50%">
        </div>
        {{-- <div class="sidebar-brand-text mx-3">PT ALCO MOTOR</div> --}}
    </a>
    <hr class="sidebar-divider my-0">
    @auth('marketing')
        <li class="nav-item {{ Request::is('marketing') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <hr class="sidebar-divider my-0">
        <li class="nav-item {{ Request::is('marketing/nasabah*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('nasabah') }}">
                <i class="fas fa-users"></i>
                <span>Nasabah</span>
            </a>
        </li>
        <hr class="sidebar-divider my-0">
        <li class="nav-item {{ Request::is('marketing/setting*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('setting') }}">
                <i class="fas fa-fw fa-tools"></i>
                <span>Setting</span>
            </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle bg-gray-700 border-0" id="sidebarToggle"></button>
        </div>
    @endauth
    {{-- <li class="nav-item {{ Request::is('marketing/kredit*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kredit') }}">
            <i class="fas fa-handshake"></i>
            <span>Kredit</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Request::is('marketing/payment*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('payment') }}">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Payment</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0"> --}}
</ul>
