@extends('layouts.master')

@section('title')
    <title>Nasabah</title>
@endsection

@section('search1')
    <form method="get" class="d-none d-md-inline-block form-inline ml-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Pencarian Nama/NIK"
                value="{{ $search }}" aria-label="Search" aria-describedby="basic-addon2" name="s">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
@endsection
@section('search2')
    <li class="nav-item dropdown no-arrow d-md-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form method="get" class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Pencarian Nama/NIK"
                        name="search" value="{{ $search }}" aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>
@endsection


@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Nasabah</h1>
    </div>
    @if ($search != null || $search != '')
        <div class="row mb-3">
            <div class="col-12">
                Hasil pencarian untuk "{{ $search }}". <a class="text-gray-700"
                    href="{{ route('csnasabah') }}">Kembali</a>
            </div>
        </div>
    @endif
    @if (session('alert'))
        <div class="alert alert-{{ session('warna') }} alert-dismissable fade show">
            {{ session('alert') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row mb-3">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center text-nowrap">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th>No</th>
                            <th>Nomor Induk Kependudukan</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($nasabah) > 0)
                            @foreach ($nasabah as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <a class="btn btn-info btn-sm btn-block"
                                                    href="{{ route('csviewnasabah', ['id' => $item->nik]) }}">
                                                    Lihat Data Nasabah
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a class="btn btn-dark btn-sm btn-block"
                                                    href="{{ route('cstransaksinasabah', ['id' => $item->nik]) }}">Lihat
                                                    Data Pengajuan</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">
                                    <h4 class="font-weight-bold text-center">Data Kosong</h4>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
