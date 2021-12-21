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
    <div class="modal fade" id="modalkredit">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-bold">
                        Tambah Data Kredit
                    </h6>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <nav>
                                <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="kredittab" data-toggle="tab" href="#kreditdiv"
                                        role="tab" aria-controls="kreditdiv" aria-selected="true">Tambah Jumlah Kredit</a>
                                    <a class="nav-item nav-link" id="tenortab" data-toggle="tab" href="#tenordiv" role="tab"
                                        aria-controls="tenordiv" aria-selected="false">Tambah Tenor Kredit</a>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="kreditdiv" role="tabpanel" aria-labelledby="kredittab">
                            <form action="{{ route('csaddbasekredit') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row my-3">
                                    <div class="col-12">
                                        <input type="number" name="pinjaman" class="form-control form-control-sm"
                                            step="500000" min="500000" placeholder="Masukkan Jumlah Kredit" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" value="Tambah" class="btn btn-primary btn-sm btn-block">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tenordiv" role="tabpanel" aria-labelledby="tenortab">
                            <form action="{{ route('csaddkredit') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row my-3">
                                    <div class="col-12">
                                        <select name="pinjaman" class="form-control form-control-sm" required>
                                            <option value="" selected disabled hidden>Pilih Jumlah Kredit</option>
                                            @foreach ($basekredit as $item)
                                                <option value="{{ $item->pinjaman }}">
                                                    Rp. {{ number_format($item->pinjaman, 0, ',', '.') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <select name="tenor" class="form-control form-control-sm" required>
                                            <option value="" selected disabled hidden>Pilih Tenor Pinjaman</option>
                                            <option value="6">6 Bulan</option>
                                            <option value="12">12 Bulan</option>
                                            <option value="18">18 Bulan</option>
                                            <option value="24">24 Bulan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <input type="number" name="angsuran" class="form-control form-control-sm"
                                            min="100000" step="1000" placeholder="Masukkan Jumlah Angsuran Bulanan"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" value="Tambah" class="btn btn-sm btn-primary btn-block">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
