@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Nasabah</h1>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-sm btn-primary btn-block" href="{{ route('addnasabah') }}">
                Tambah Nasabah
            </a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <table class="table table-hover table-bordered">
                <thead class="bg-primary text-light">
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>NIK</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @if (count($data) == 0)
                        <tr>
                            <td class="text-center" colspan="4">
                                <h3 class="font-weight-bold">Data Kosong</h3>
                            </td>
                        </tr>
                    @else
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ ucwords(strtolower($item->nama)) }}</td>
                                <td>{{ substr(trim(chunk_split($item->nik, 4, '.')), 0, -1) }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary "
                                        href="{{ route('viewnasabah', ['id' => $item->nik]) }}">
                                        Lihat Data
                                    </a>
                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('transaksinasabah', ['id' => $item->nik]) }}">
                                        Lihat Transaksi
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
