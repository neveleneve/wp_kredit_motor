<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed-top">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img class="d-none d-md-inline" src="{{ asset('/penyimpanan/logo/alco-width.png') }}" style="width: 10%"
                alt="">
        </a>
        @yield('search1')
    </ul>
    <ul class="navbar-nav ml-auto">
        @yield('search2')
        @auth('cs')

            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    @if (count($tertunda) == 0)

                    @else
                        <span class="badge badge-danger badge-counter">
                            {{ count($tertunda) }}
                        </span>
                    @endif
                </a>
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">
                        Pengajuan
                    </h6>
                    @if (count($tertunda) > 0)
                        @foreach ($tertunda as $item)
                            <a class="dropdown-item d-flex align-items-center "
                                href="{{ route('csverifikasitransaksi', ['id' => $item->trx_code]) }}">
                                <div>
                                    Pengajuan <span class="font-weight-bold"> {{ $item->trx_code }}</span> sedang
                                    menunggu
                                    untuk diverifikasi!
                                </div>
                            </a>
                        @endforeach
                        <a class="dropdown-item text-center small text-gray-500" href="{{ route('cstransaksi') }}">
                            Lihat Pengajuan Lainnya
                        </a>
                    @else
                        <a class="dropdown-item align-items-center text-center" href="{{ route('cstransaksi') }}">
                            Tidak Ada Pengajuan Terbaru
                        </a>
                    @endif
                </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
        @endauth
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ ucwords(Auth::user()->nama) }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('template/img/undraw_profile.svg') }}">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('setting') }}">
                    <i class="fas fa-tools fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
