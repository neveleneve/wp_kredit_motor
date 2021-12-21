@extends('layouts.master')

@section('title')
    <title>Data Daerah</title>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Data Daerah</h1>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <a class="btn btn-sm btn-primary btn-block" href="#" data-toggle="modal" data-target="#modaltambahkecamatan">
                Tambah Kecamatan
            </a>
        </div>
        <div class="col-6">
            <a class="btn btn-sm btn-warning btn-block" href="#" data-toggle="modal" data-target="#modaltambahkelurahan">
                Tambah Kelurahan
            </a>
        </div>
    </div>
    @if (session('alert'))
        <div class="alert alert-{{ session('warna') }} alert-dismissable fade show">
            {{ session('alert') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-nowrap">
                    <thead class="text-center bg-primary text-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Kecamatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @if (count($kecamatan) > 0)
                            @foreach ($kecamatan as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->kecamatan }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" id="kecamatan" name="{{ $item->id }}"
                                            data-toggle="modal" data-target="#kelurahanmodal"
                                            onclick="kecamatan({{ $item->id }}, '{{ $item->kecamatan }}')">
                                            Lihat Kelurahan
                                        </button>
                                        <a class="btn btn-sm btn-{{ $item->status == 1 ? 'danger' : 'success' }}" @if ($item->status == 1) onclick="return confirm('Data Kelurahan pada Kecamatan {{ $item->kecamatan }} akan ikut di-non-aktifkan! Yakin akan non-aktifkan Data Kecamatan {{ $item->kecamatan }}?')"
                                        @else onclick="return confirm('Data Kelurahan pada Kecamatan {{ $item->kecamatan }} akan ikut diaktifkan! Yakin akan aktifkan Data Kecamatan {{ $item->kecamatan }}?')" @endif href="{{ route('cshapuskecamatan', ['id' => $item->id]) }}">
                                            @if ($item->status == 1)
                                                Non-aktifkan Kecamatan
                                            @else
                                                Aktifkan Kecamatan
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">
                                    <h4 class="text-center font-weight-bold">Data Daerah Kosong</h4>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kelurahanmodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold" id="modaltitle">
                        Data Kelurahan di ...
                    </h6>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <table class="table table-hover table-bordered">
                                <thead class="text-center bg-primary text-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kelurahan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="listkelurahan">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modaltambahkecamatan" tabindex="-2" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">
                        Tambah Kecamatan
                    </h6>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('cstambahkecamatan') }}" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                {{ csrf_field() }}
                                <input class="form-control" type="text" name="kecamatan" id="kecamatan"
                                    placeholder="Masukkan Nama Kecamatan" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-sm btn-primary" type="submit" value="Tambah Kecamatan">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modaltambahkelurahan" tabindex="-3" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">
                        Tambah Kelurahan
                    </h6>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('cstambahkelurahan') }}" method="post">
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12">
                                {{ csrf_field() }}
                                <select class="form-control" name="id_kecamatan" id="id_kecamatan" required>
                                    <option selected disabled hidden value="">Pilih Kecamatan</option>
                                    @if (count($kecamatan) > 0)
                                        @foreach ($kecamatan as $item)
                                            <option value="{{ $item->id }}">{{ $item->kecamatan }}</option>
                                        @endforeach
                                    @else

                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input class="form-control" type="text" name="kelurahan" id="kelurahan"
                                    placeholder="Nama Kelurahan" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-sm btn-primary" type="submit" value="Tambah Kelurahan">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
