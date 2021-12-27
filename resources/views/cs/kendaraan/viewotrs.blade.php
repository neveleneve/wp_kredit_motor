@extends('layouts.master')

@section('title')
<title>Lihat Harga OTR Kendaraan</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Daftar Harga OTR Kendaraan</h1>
</div>
<div class="row mb-3">
    <div class="col-1">
        <a class="btn btn-danger btn-block" href="{{ route('cskendaraan') }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12">
                        <strong>Tipe Kendaraan :</strong> {{ $tipe[0]->tipe }}
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <a class="btn btn-sm btn-primary btn-block" data-toggle="modal" data-target="#tambahOtrModal">Tambah Harga OTR</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Harga OTR</th>
                                    <th>Pencairan Maksimal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1
                                @endphp
                                @forelse($data as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>Rp. {{ number_format($item->harga_otr, 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($item->maks_pencairan, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('csviewotr', ['id'=>$item->id]) }}" class="btn btn-sm btn-warning">Ubah</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="5">
                                            <h4>Data Harga OTR Belum Tersedia</h4>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahOtrModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('csaddotr') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id_tipe_kendaraan" value="{{$tipe[0]->id}}">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Tambah Harga OTR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                    
                    <input type="text" class="form-control mb-3" name="tahun" placeholder="Tahun Kendaraan" required>
                    <input type="number" class="form-control mb-3" name="harga_otr" placeholder="Harga OTR Kendaraan" required>
                    <input type="number" class="form-control mb-3" name="maks_pencairan" placeholder="Maksimal Pencairan" required>
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
