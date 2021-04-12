@extends('layouts.master')

@section('title')
    <title>Pengajuan</title>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Pengajuan</h1>
    </div>
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
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a id="pillmerk" class="nav-link {{ Session::get('pengajuanall') }}" data-toggle="pill"
                        href="#merk">Pengajuan Terverifikasi</a>
                </li>
                <li class="nav-item">
                    <a id="pilltype" class="nav-link {{ Session::get('pengajuan') }}" data-toggle="pill"
                        href="#tipe">Pengajuan Tertunda
                        ({{ count($pengajuan) }})</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane container {{ Session::get('pengajuanallx') }}" id="merk">
                    <div class="row my-3">
                        <div class="col-12">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <td>No.</td>
                                        <td>No. Pengajuan</td>
                                        <td>Status</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($pengajuanall) > 0)
                                        @foreach ($pengajuanall as $item)
                                            <tr>
                                                <td>{{ $nopengajuanall++ }}</td>
                                                <td>{{ $item->trx_code }}</td>
                                                <td>
                                                    @if ($item->penilaian == 0)
                                                        Belum Diverifikasi
                                                    @else
                                                        @if ($item->penilaian >= 0.6)
                                                            Pengajuan Diterima
                                                        @else
                                                            Pengajuan Ditolak

                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-warning" href="#">Lihat Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">
                                                <h4 class="text-center font-weight-bold">Data Kosong</h4>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane container {{ Session::get('pengajuanx') }}" id="tipe">
                    <div class="row my-3">
                        <div class="col-12">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <td>No.</td>
                                        <td>No. Pengajuan</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($pengajuan) > 0)
                                        @foreach ($pengajuan as $item)
                                            <tr>
                                                <td>{{ $nopengajuan++ }}</td>
                                                <td>{{ $item->trx_code }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-warning" href="{{ route('csverifikasitransaksi', ['id'=>$item->trx_code]) }}">Verifikasi Pengajuan</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">
                                                <h4 class="text-center font-weight-bold">Data Kosong</h4>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
