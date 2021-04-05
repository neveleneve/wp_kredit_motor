@extends('layouts.master')

@section('title')
    <title>Kendaraan</title>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Kendaraan</h1>
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
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#merk">Merk Kendaraan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#tipe">Tipe Kendaraan</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane container active" id="merk">
                    <div class="row my-3">
                        <div class="col-12">
                            <a class="btn btn-primary btn-sm btn-block" href="">Tambah Merk</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <td>No</td>
                                        <td>Merk Kendaraan</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($merk as $item)
                                        <tr>
                                            <td>{{ $nomerk++ }}</td>
                                            <td>{{ $item->merk }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" href="#">Ubah</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane container fade" id="tipe">
                    <div class="row my-3">
                        <div class="col-12">
                            <a class="btn btn-primary btn-sm btn-block" href="">Tambah Tipe</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <table class="table table-hover table-bordered text-center">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <td>No</td>
                                        <td>Tipe Kendaraan</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipe as $item)
                                        <tr>
                                            <td>{{ $notipe++ }}</td>
                                            <td>{{ $item->tipe }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" href="#">Ubah</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
