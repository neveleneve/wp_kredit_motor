<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('penyimpanan/logo/alco-square.jpg') }}">
    <title>Cek Nomor Induk Kependudukan</title>
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('template/css/sb-admin-2.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="pt-5">
                <div id="content" class="pt-5">
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed-top">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="navbar-nav">
                            <a class="navbar-brand" href="{{ route('login') }}">
                                <img class="d-none d-md-inline" src="{{ asset('/penyimpanan/logo/alco-width.png') }}" style="width: 10%" alt="">
                            </a>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Login</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="container-fluid">
                        <h1 class="h3 mb-0 text-gray-800 text-center font-weight-bold">Cek Status Kredit</h1>
                        <div class="row d-flex justify-content-center">
                            <div class="col-10">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row my-3">
                                            <div class="col-6">
                                                <strong>Nama :&nbsp;</strong> {{ $datanasabah[0]->nama }}
                                            </div>
                                            <div class="col-6">
                                                <strong>Nomor Induk Kependudukan :&nbsp;</strong> {{ $datanasabah[0]->nik }}
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <table class="table table-bordered">
                                                    <thead class="bg-primary text-light text-center">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>ID Kredit</th>
                                                            <th>Pinjaman</th>
                                                            <th>Tenor</th>
                                                            <th>Tanggal</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-center">
                                                        @php
                                                            $no=1;
                                                        @endphp
                                                        @forelse($datanasabah as $item)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $item->trx_code }}</td>
                                                                <td>Rp. {{ number_format($item->pinjaman, 0, ',', '.') }}</td>
                                                                <td>{{ $item->tenor }} Bulan</td>
                                                                <td>{{ date('d F Y', strtotime($item->created_at)) }}</td>
                                                                <td>
                                                                    @if($item->penilaian == null)
                                                                        Belum Diverifikasi
                                                                    @else
                                                                        @if($item->penilaian >= 1.800)
                                                                            Pengajuan Diterima
                                                                        @else
                                                                            Pengajuan Ditolak
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @empty

                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-2">
                                                <a class="btn btn-danger btn-block" href="{{ route('credit-check') }}" title="Kembali">
                                                    <i class="fa fa-chevron-left"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
