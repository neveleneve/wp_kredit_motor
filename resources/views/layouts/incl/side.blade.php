<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{Request::is('administrator') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>    
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{Request::is('administrator/nasabah*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('nasabah')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Nasabah</span>
        </a>
    </li>    
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{Request::is('administrator/kredit*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('kredit')}}">
            <i class="fas fa-fw fa-handshake"></i>
            <span>Kredit</span>
        </a>
    </li>    
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{Request::is('administrator/payment*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('payment')}}">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Payment</span>
        </a>
    </li>    
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{Request::is('administrator/setting*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('setting')}}">
            <i class="fas fa-fw fa-tools"></i>
            <span>Setting</span>
        </a>
    </li>    
    <hr class="sidebar-divider my-0">
</ul>
