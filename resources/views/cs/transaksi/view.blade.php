@extends('layouts.master')

@section('title')
<title>Detail Pengajuan</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Detail Pengajuan</h1>
</div>
<div class="row mb-3">
    <div class="col-1">
        <a class="btn btn-danger btn-block" href="{{ route('cstransaksi') }}" title="Kembali">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
    @if($data[0]->penilaian >= 2.5)
        <div class="col-1">
            <form action="{{ route('csprintpengajuan') }}" method="post" target="__blank">
                {{ csrf_field() }}
                <input type="hidden" name="trx_code" value="{{ $data[0]->trx_code }}">
                <button type="submit" class="btn btn-warning btn-block" title="Print Data Pengajuan">
                    <i class="fa fa-print"></i>
                </button>
            </form>
        </div>
    @endif
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {{-- Batas --}}
                <h4 class="h3 font-weight-bold mb-3">Data Pengaju</h4>
                <label for="trx_code" class="font-weight-bold">Kode Pengajuan</label>
                <input type="text" class="form-control mb-3" id="trx_code" value="{{ $data[0]->trx_code }}" readonly>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="nama" class="font-weight-bold">Nama Pengaju</label>
                        <input type="text" class="form-control" id="nama" value="{{ $data[0]->nama }}" readonly>
                    </div>
                    <div class="col-6">
                        <label for="nik" class="font-weight-bold">Nomor Induk Kependudukan</label>
                        <input type="text" class="form-control" id="nik" value="{{ $data[0]->nik }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="alamat" class="font-weight-bold">Alamat</label>
                        <input type="text" class="form-control" id="alamat" value="{{ $data[0]->alamat }}" readonly>
                    </div>
                    <div class="col-4">
                        <label for="kelurahan" class="font-weight-bold">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" value="{{ $data[0]->kelurahan }}" readonly>
                    </div>
                    <div class="col-4">
                        <label for="kecamatan" class="font-weight-bold">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" value="{{ $data[0]->kecamatan }}" readonly>
                    </div>
                </div>
                <label for="no_hp" class="font-weight-bold">Kontak</label>
                <input type="text" class="form-control mb-3" id="no_hp" value="{{ $data[0]->no_hp }}" readonly>
                <label for="status_nikah" class="font-weight-bold">Status Nikah</label>
                @php
                    $statusnikah = null;
                    switch ($data[0]->status_nikah) {
                    case 1:
                    $statusnikah = 'Sudah Menikah';
                    break;
                    case 2:
                    $statusnikah = 'Belum Menikah';
                    break;
                    case 3:
                    $statusnikah = 'Cerai Hidup';
                    break;
                    case 4:
                    $statusnikah = 'Cerai Mati';
                    break;
                    }
                @endphp
                <input type="text" class="form-control mb-3" id="status_nikah" value="{{ $statusnikah }}" readonly>
                {{-- Batas --}}
                <h4 class="h3 font-weight-bold mb-3">Data Penjamin</h4>
                <label for="nama_penjamin" class="font-weight-bold">Nama Penjamin</label>
                <input type="text" class="form-control mb-3" id="nama_penjamin" value="{{ $data[0]->nama_penjamin == null ? $data[0]->nama_pasangan : $data[0]->nama_penjamin }}" readonly>
                <label for="status_penjamin" class="font-weight-bold">Status Penjamin</label>
                <input type="text" class="form-control mb-3" id="status_penjamin" value="{{ $data[0]->status_penjamin == null ? 'Pasangan (Istri)' : $data[0]->status_penjamin }}" readonly>
                <label for="kontak_penjamin" class="font-weight-bold">Kontak Penjamin</label>
                <input type="text" class="form-control mb-3" id="kontak_penjamin" value="{{ $data[0]->no_hp_penjamin == null ? $data[0]->no_hp_pasangan : $data[0]->no_hp_penjamin }}" readonly>
                {{-- Batas --}}
                <h4 class="h3 font-weight-bold mb-3">Data Kredit</h4>
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="pinjaman" class="font-weight-bold">Besar Pinjaman</label>
                        <input type="text" class="form-control" id="pinjaman" value="Rp. {{ number_format($data[0]->pinjaman,0,',','.') }}" readonly>
                    </div>
                    <div class="col-4">
                        <label for="angsuran" class="font-weight-bold">Besar Angsuran</label>
                        <input type="text" class="form-control" id="angsuran" value="Rp. {{ number_format($data[0]->angsuran,0,',','.') }}" readonly>
                    </div>
                    <div class="col-4">
                        <label for="tenor" class="font-weight-bold">Tenor Pembayaran</label>
                        <input type="text" class="form-control" id="tenor" value="{{ $data[0]->tenor }} Bulan" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="merk" class="font-weight-bold">Merk Kendaraan</label>
                        <input type="text" class="form-control" id="merk" value="{{ $data[0]->merk }}" readonly>
                    </div>
                    <div class="col-4">
                        <label for="tipe" class="font-weight-bold">Tipe Kendaraan</label>
                        <input type="text" class="form-control" id="tipe" value="{{ $data[0]->tipe }}" readonly>
                    </div>
                    <div class="col-4">
                        <label for="tahun" class="font-weight-bold">Tahun Kendaraan</label>
                        <input type="text" class="form-control" id="tahun" value="{{ $data[0]->tahun }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
