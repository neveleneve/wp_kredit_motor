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
    @endauth
    @auth('cs')
        <li class="nav-item {{ Request::is('cs') ? 'active border-left-primary' : '' }}">
            <a class="nav-link" href="{{ route('csdashboard') }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <hr class="sidebar-divider my-0">
        <li class="nav-item {{ Request::is('cs/daerah*') ? 'active border-left-primary' : '' }}">
            <a class="nav-link" href="{{ route('cskecamatan') }}">
                <i class="fas fa-map"></i>
                <span>Data Daerah</span>
            </a>
        </li>
        <hr class="sidebar-divider my-0">
        <li class="nav-item {{ Request::is('cs/kredit*') ? 'active border-left-primary' : '' }}">
            <a class="nav-link" href="{{ route('cskredit') }}">
                <i class="fas fa-dollar-sign"></i>
                <span>Kredit</span>
            </a>
        </li>
        <hr class="sidebar-divider my-0">
        <li class="nav-item {{ Request::is('cs/kendaraan*') ? 'active border-left-primary' : '' }}">
            <a class="nav-link" href="{{ route('cskendaraan') }}">
                <i class="fas fa-motorcycle"></i>
                <span>Kendaraan</span>
            </a>
        </li>
        <hr class="sidebar-divider my-0">
        <li class="nav-item {{ Request::is('cs/nasabah*') ? 'active border-left-primary' : '' }}">
            <a class="nav-link" href="{{ route('csnasabah') }}">
                <i class="fas fa-users"></i>
                <span>Nasabah</span>
            </a>
        </li>
        <hr class="sidebar-divider my-0">
        <li class="nav-item {{ Request::is('cs/pengajuan*') ? 'active border-left-primary' : '' }}">
            <a class="nav-link" href="{{ route('cstransaksi') }}">
                <i class="fas fa-handshake"></i>
                <span>                    
                    Pengajuan
                </span>
            </a>
        </li>
        <hr class="sidebar-divider my-0">
        <li class="nav-item {{ Request::is('cs/setting*') ? 'active border-left-primary' : '' }}">
            <a class="nav-link" href="{{ route('cssetting') }}">
                <i class="fas fa-cog"></i>
                <span>Setting</span>
            </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
    @endauth
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle bg-gray-700 border-0" id="sidebarToggle"></button>
    </div>
</ul>
