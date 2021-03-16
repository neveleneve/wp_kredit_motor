<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3">PT ALCO MOTOR</div>
    </a>
    <hr class="sidebar-divider my-0">
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
    <li class="nav-item {{ Request::is('marketing/kredit*') ? 'active' : '' }}">
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
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Request::is('marketing/setting*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('setting') }}">
            <i class="fas fa-fw fa-tools"></i>
            <span>Setting</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
</ul>
