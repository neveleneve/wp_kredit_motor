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
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Pencarian Nama/NIK" name="search"
                        value="{{ $search }}" aria-label="Search" aria-describedby="basic-addon2">
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
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Nasabah</h1>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-sm btn-primary btn-block" href="{{ route('addnasabah') }}">
                Tambah Nasabah
            </a>
        </div>
    </div>
    @if ($search != null || $search != '')
        <div class="row mb-3">
            <div class="col-12">
                Hasil pencarian untuk "{{ $search }}". <a class="text-gray-700"
                    href="{{ route('nasabah') }}">Kembali</a>
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
                <table class="table table-hover table-bordered text-nowrap">
                    <thead class="bg-primary text-light text-center">
                        <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>Nomor Induk Kependudukan</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @if (count($data) == 0)
                            <tr>
                                <td class="text-center" colspan="4">
                                    <h3 class="font-weight-bold">Data Kosong</h3>
                                </td>
                            </tr>
                        @else
                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td class="text-center">{{ ucwords(strtolower($item->nama)) }}</td>
                                    <td class="text-center">{{ substr(trim(chunk_split($item->nik, 4, '.')), 0, -1) }}
                                    </td>
                                    <td class="text-center">
                                        <div class="row">
                                            <div class="col-sm-12 col-xl-4 mb-1">
                                                <a class="btn btn-sm btn-block btn-dark border"
                                                    href="{{ route('viewnasabah', ['id' => $item->nik]) }}">
                                                    Data Nasabah
                                                </a>
                                            </div>
                                            <div class="col-sm-12 col-xl-4 mb-1">
                                                <a class="btn btn-sm btn-block btn-light border"
                                                    href="{{ route('transaksinasabah', ['id' => $item->nik]) }}">
                                                    Data Pengajuan
                                                </a>
                                            </div>
                                            <div class="col-sm-12 col-xl-4">
                                                <a class="btn btn-sm btn-block btn-info"
                                                    href="{{ route('pengajuannasabah', ['id' => $item->nik]) }}">
                                                    Pengajuan
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
