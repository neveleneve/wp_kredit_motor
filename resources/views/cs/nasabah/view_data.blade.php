@extends('layouts.master')

@section('title')
<title>Data Nasabah</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold text-dark">Data Nasabah</h1>
</div>
<div class="row mb-3">
    <div class="col-1">
        <a class="btn btn-danger btn-block" href="{{ route('csnasabah') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
</div>
@if (count($datanasabah) > 0)
<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-light font-weight-bold">
                Data Identitas
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <label class="font-weight-bold text-dark" for="nama">Nama</label>
                        <p>{{ $datanasabah[0]->nama }}</p>
                    </div>
                    <div class="col-4">
                        <label class="font-weight-bold text-dark" for="nik">Nomor Induk Kependudukan</label>
                        <p>{{ substr(trim(chunk_split($datanasabah[0]->nik, 4, '.')), 0, -1) }}</p>
                    </div>
                    <div class="col-4">
                        <label class="font-weight-bold text-dark" for="nohp">Nomor Handphone</label>
                        <p>{{ $datanasabah[0]->no_hp }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label class="font-weight-bold text-dark" for="jeniskelamin">Jenis Kelamin</label>
                        <p>
                            @if ($datanasabah[0]->jenis_kelamin == 'L')
                            Laki - Laki
                            @elseif($datanasabah[0]->jenis_kelamin == 'P')
                            Perempuan
                            @endif
                        </p>
                    </div>
                    <div class="col-4">
                        <label class="font-weight-bold text-dark" for="ttl">Tempat, Tanggal Lahir</label>
                        <p>
                            {{ $datanasabah[0]->tmpt_lahir }},
                            {{ date('d F Y', strtotime($datanasabah[0]->tgl_lahir)) }}
                        </p>
                    </div>
                    <div class="col-4">
                        <label class="font-weight-bold text-dark" for="statusnikah">Status Perkawinan</label>
                        <p>
                            @if ($datanasabah[0]->status_nikah == 1)
                            Sudah Menikah
                            @elseif($datanasabah[0]->status_nikah == 2)
                            Belum Menikah
                            @elseif($datanasabah[0]->status_nikah == 3)
                            Cerai Hidup
                            @elseif($datanasabah[0]->status_nikah == 2)
                            Cerai Mati
                            @endif
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="font-weight-bold text-dark" for="fotoktp">Foto KTP</label>
                        <p>
                            <img class="img-fluid img-thumbnail" style="width: 50%" src="{{ asset('penyimpanan/ktp/' . $datanasabah[0]->nik . '_ktp.jpg') }}">
                        </p>
                    </div>
                    <div class="col-6">
                        <label class="font-weight-bold text-dark" for="fotokk">Foto KK</label>
                        <p>
                            <img class="img-fluid img-thumbnail" style="width: 50%" src="{{ asset('penyimpanan/kk/' . $datanasabah[0]->nik . '_kk.jpg') }}">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-light font-weight-bold">
                Data Domisili
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <label class="font-weight-bold text-dark" for="alamat">Alamat</label>
                        <p>
                            {{ $datanasabah[0]->alamat }}
                        </p>
                    </div>
                    <div class="col-3">
                        <label class="font-weight-bold text-dark" for="kecamatan">Kecamatan</label>
                        <p>
                            {{ $datanasabah[0]->kecamatan }}
                        </p>
                    </div>
                    <div class="col-3">
                        <label class="font-weight-bold text-dark" for="kelurahan">Kelurahan</label>
                        <p>
                            {{ $datanasabah[0]->kelurahan }}
                        </p>
                    </div>
                    <div class="col-3">
                        <label class="font-weight-bold text-dark" for="lamatinggal">Lama Tinggal</label>
                        <p>
                            {{ $datanasabah[0]->lama_tinggal }} Tahun
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="font-weight-bold text-dark">Status Kepemlikan</label>
                        <p>
                            {{ ucfirst($datanasabah[0]->status_kepemilikan) }}
                        </p>
                    </div>
                    <div class="col-6">
                        <label class="font-weight-bold text-dark">Bukti Kepemlikan</label>
                        <p>
                            {{ ucfirst($datanasabah[0]->bukti_kepemilikan) }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="font-weight-bold text-dark">Foto Bukti Kepemilikan</label>
                        <p class="text-center">
                            <img style="width: 25%" src="{{ asset('penyimpanan/buktikepemilikan/' . $datanasabah[0]->nik . '_' . $datanasabah[0]->bukti_kepemilikan . '.jpg') }}" class="img-float img-thumbnail">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-light font-weight-bold">
                @if ($datanasabah[0]->status_nikah == 1)
                Data Pasangan
                @else
                Data Penjamin
                @endif
            </div>
            <div class="card-body">
                @if ($datanasabah[0]->status_nikah == 1)
                <div class="row">
                    <div class="col-4">
                        <label class="font-weight-bold text-dark" for="namapasangan">Nama</label>
                        <p>
                            {{ $datanasabah[0]->namapasangan }}
                        </p>
                    </div>
                    <div class="col-4">
                        <label class="font-weight-bold text-dark" for="tgllahirpasangan">Tanggal Lahir</label>
                        <p>
                            {{ date('d F Y', strtotime($datanasabah[0]->tgllahirpasangan)) }}
                        </p>
                    </div>
                    <div class="col-4">
                        <label class="font-weight-bold text-dark" for="nohppasangan">Nomor Handphone</label>
                        <p>
                            {{ $datanasabah[0]->nohppasangan }}
                        </p>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="col-3">
                        <label class="font-weight-bold text-dark" for="namapenjamin">Nama</label>
                        <p>
                            {{ $datanasabah[0]->namapenjamin }}
                        </p>
                    </div>
                    <div class="col-3">
                        <label class="font-weight-bold text-dark" for="tgllahirpenjamin">Tanggal Lahir</label>
                        <p>
                            {{ date('d F Y', strtotime($datanasabah[0]->tgllahirpenjamin)) }}
                        </p>
                    </div>
                    <div class="col-3">
                        <label class="font-weight-bold text-dark" for="nohppenjamin">Nomor Handphone</label>
                        <p>
                            {{ $datanasabah[0]->nohppenjamin }}
                        </p>
                    </div>
                    <div class="col-3">
                        <label class="font-weight-bold text-dark" for="statuspenjamin">Status Penjamin</label>
                        <p>
                            @if ($datanasabah[0]->statuspenjamin == 1)
                            Keluarga
                            @elseif ($datanasabah[0]->statuspenjamin == 2)
                            Tetangga
                            @elseif($datanasabah[0]->statuspenjamin == 3)
                            Lainnya
                            @endif
                        </p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-light font-weight-bold">
                Data Pekerjaan
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <label class="font-weight-bold text-dark">Jenis Pekerjaan</label>
                        <p>
                            {{ $datanasabah[0]->jenis_kerja }}
                        </p>
                    </div>
                    <div class="col-4">
                        <label class="font-weight-bold text-dark">Deskripsi Pekerjaan</label>
                        <p>
                            {{ $datanasabah[0]->desk_kerja }}
                        </p>
                    </div>
                    <div class="col-4">
                        <label class="font-weight-bold text-dark">Alamat Pekerjaan</label>
                        <p>
                            {{ $datanasabah[0]->alamat_kerja }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="font-weight-bold text-dark">Penghasilan</label>
                        <p>
                            Rp. {{ number_format($datanasabah[0]->penghasilan, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="col-6">
                        <label class="font-weight-bold text-dark">Pengeluaran</label>
                        <p>
                            Rp. {{ number_format($datanasabah[0]->pengeluaran, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center font-weight-bold text-dark">
                    Data Nasabah Tidak Ditemukan
                </h1>
            </div>
        </div>
    </div>
</div>
@endif
<a class="scroll-to-top rounded bg-danger" href="{{ route('csnasabah') }}" style="margin-right: 50px">
    <i class="fas fa-angle-left"></i>
</a>
@endsection
