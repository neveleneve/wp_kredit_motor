@extends('layouts.master')

@section('title')
    <title>Kredit</title>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Kredit</h1>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-sm btn-primary btn-block" href="#" data-toggle="modal" data-target="#modalkredit">
                Tambah Kredit
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
    <div class="row mb-3">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th>No</th>
                            <th>Pinjaman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>Rp. {{ number_format($item->pinjaman, 0, ',', '.') }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modaltenor"
                                        onclick="tenor({{ $item->pinjaman }})">
                                        Lihat Tenor
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modaltenor" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold" id="modaltitle">
                        Data Tenor Pinjaman
                    </h6>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered text-nowrap">
                                    <thead class="text-center bg-primary text-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Tenor</th>
                                            <th>Angsuran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listtenor">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
