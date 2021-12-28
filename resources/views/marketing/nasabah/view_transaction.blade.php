@extends('layouts.master')

@section('title')
<title>Transaksi Nasabah</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Transaksi Nasabah</h1>
</div>
<div class="row mb-3">
    <div class="col-1">
        <a class="btn btn-danger btn-block" href="{{ route('nasabah') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
</div>
@if(session('alert'))
    <div class="alert alert-{{ session('warna') }} alert-dismissable fade show">
        {{ session('alert') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-light font-weight-bold">
                Data Transaksi
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="font-weight-bold">Nomor Induk Kependudukan</label>
                        <p>
                            {{ $datanasabah[0]->nik }}
                        </p>
                    </div>
                    <div class="col-6">
                        <label class="font-weight-bold">Nama</label>
                        <p>
                            {{ $datanasabah[0]->nama }}
                        </p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <table class="table tabel-hover table-bordered">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">ID Kredit</th>
                                    <th class="text-center">Tenor</th>
                                    <th class="text-right">Pinjaman</th>
                                    <th class="text-center">Tanggal Pengajuan</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($data) == 0)
                                    <tr>
                                        <td colspan="7">
                                            <h4 class="text-center">Data Pengajuan Kosong</h4>
                                        </td>
                                    </tr>
                                @else
                                    @foreach($data as $item)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td class="text-center">{{ $item->trx_code }}</td>
                                            <td class="text-center">{{ $item->tenor }} Bulan</td>
                                            <td class="text-right">Rp.
                                                {{ number_format($item->pinjaman, 0, ',', '.') }}
                                            </td>
                                            <td class="text-center">
                                                {{ date('d F Y', strtotime($item->created_at)) }}
                                            </td>
                                            <td class="text-center">
                                                @if($item->penilaian == null)
                                                    Belum Verifikasi
                                                @else
                                                    @if($item->penilaian >= 1.850)
                                                        Pengajuan Diterima
                                                    @else
                                                        Pengajuan Ditolak
                                                    @endif
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($item->penilaian == 0)
                                                    <a onclick="return confirm('Hapus Data Pengajuan?')" class="btn btn-danger btn-sm" href="{{ route('hapuspengajuan', ['id' => $item->trx_code]) }}">
                                                        Hapus Pengajuan
                                                    </a>
                                                @else

                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a class="scroll-to-top rounded bg-danger" href="{{ route('nasabah') }}" style="margin-right: 50px">
    <i class="fas fa-angle-left"></i>
</a>
@endsection
