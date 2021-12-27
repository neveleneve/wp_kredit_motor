@extends('layouts.master')

@section('title')
<title>Kendaraan</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Kendaraan</h1>
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
                        <a class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#merkModal">Tambah Merk Kendaraan</a>
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
                                @foreach($merk as $item)
                                    <tr>
                                        <td>{{ $nomerk++ }}</td>
                                        <td>{{ $item->merk }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-warning" href="{{ route('csviewmerk', ['id' => $item->id]) }}">Ubah</a>
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
                        <a class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#tipeModal">Tambah Tipe</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <table class="table table-hover table-bordered text-center">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <td>No</td>
                                    <td>Merk Kendaraan</td>
                                    <td>Tipe Kendaraan</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tipe as $item)
                                    <tr>
                                        <td>{{ $notipe++ }}</td>
                                        <td>{{ $item->merk }}</td>
                                        <td>{{ $item->tipe }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="{{ route('csviewotrtipe', ['id' => $item->id]) }}">Lihat Harga OTR</a>
                                            <a class="btn btn-sm btn-warning" href="{{ route('csviewtipe', ['id' => $item->id]) }}">Ubah</a>
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
<div class="modal fade" id="merkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('csaddmerk') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Tambah Merk Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="merk" placeholder="Input Merk Kendaraan" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tipeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('csaddtipe') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Tambah Tipe Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select class="form-control mb-3" name="merk" id="merk">
                        <option selected disabled hidden>Pilihan Merk</option>
                        @foreach($merk as $item)
                            <option value="{{ $item->id }}">{{ $item->merk }}</option>
                        @endforeach
                    </select>
                    <input type="text" class="form-control" name="tipe" placeholder="Input Tipe Kendaraan" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
