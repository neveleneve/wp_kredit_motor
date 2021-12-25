<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('penyimpanan/logo/alco-square.jpg') }}">
    <title>Cek Pengajuan Kredit</title>
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
                                <a class="nav-link dropdown-toggle" href="{{ route('login') }}" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                        <div class="row">
                                            <div class="col-12">
                                                @if(session('alert'))
                                                    <div class="alert alert-{{ session('warna') }} alert-dismissable fade show">
                                                        {{ session('alert') }}
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                @endif
                                                <form action="{{ route('credit-check-nik') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input value="{{ session('value') ? session('value') : null }}" type="text" class="form-control mb-3" placeholder="Masukkan NIK Anda..." name="nik">
                                                    <input type="submit" value="Cari NIK" class="btn btn-dark btn-block">
                                                </form>
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
    {{-- <script type="text/javascript" src="{{ asset('js/ajax.js') }}"></script> --}}
</body>

</html>
