@extends('layouts.master')

@section('search1')
    <form method="get" class="d-none d-sm-inline-block form-inline ml-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Pencarian"
                value="{{ $search }}" aria-label="Search" aria-describedby="basic-addon2" name="search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
@endsection
@section('search2')
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form method="get" class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Pencarian" name="search"
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
        <h1 class="h3 mb-0 text-gray-800">Nasabah</h1>
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
    <div class="row mb-3">
        <div class="col-12">
            <table class="table table-hover table-bordered">
                <thead class="bg-primary text-light">
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>NIK</td>
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
                                <td>{{ $no++ }}</td>
                                <td>{{ ucwords(strtolower($item->nama)) }}</td>
                                <td>{{ substr(trim(chunk_split($item->nik, 4, '.')), 0, -1) }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary "
                                        href="{{ route('viewnasabah', ['id' => $item->nik]) }}">
                                        Lihat Data
                                    </a>
                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('transaksinasabah', ['id' => $item->nik]) }}">
                                        Lihat Transaksi
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
