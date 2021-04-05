@extends('layouts.master')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 pt-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Nasabah
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $data['jmlnasabah'] }} Orang
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-primary">
                    <div class="row">
                        <div class="col">
                            <a class="text-xs text-light font-weight-bold" href="{{ route('csnasabah') }}">Lihat Selengkapnya <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 pt-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pengajuan Tahun {{ date('Y') }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $data['jmlpengajuanthn'] }} Transaksi
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-success">
                    <div class="row">
                        <div class="col">
                            <a id="merkpillx" class="text-xs text-light font-weight-bold" href="#">Lihat Selengkapnya <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 pt-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pengajuan Bulan {{ date('F') }} {{ date('Y') }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $data['jmlpengajuanbln'] }} Transaksi
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-info">
                    <div class="row">
                        <div class="col">
                            <a id="merkpill" class="text-xs text-light font-weight-bold" href="#">Lihat Selengkapnya <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 pt-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pengajuan Tertunda
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $data['jmlpengajuantunda'] }} Transaksi
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-warning">
                    <div class="row">
                        <div class="col">
                            <a id="tipepill" class="text-xs text-light font-weight-bold" href="#">Lihat Selengkapnya <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customjs')
    <script>
        $(document).ready(function() {
            $('#merkpillx').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "/pengajuan/2",
                    type: "GET",
                    success: function() {
                        window.location = '{{route("cstransaksi")}}'
                    }
                });
            });
            $('#merkpill').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "/pengajuan/2",
                    type: "GET",
                    success: function() {
                        window.location = '{{route("cstransaksi")}}'
                    }
                });
            });
            $('#tipepill').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "/pengajuan/1",
                    type: "GET",
                    success: function() {
                        window.location = '{{route("cstransaksi")}}'
                    }
                });
            });
        });

    </script>
@endsection
