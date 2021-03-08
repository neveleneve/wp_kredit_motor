@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Nasabah</h1>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <a class="btn btn-sm btn-primary btn-block" href="{{route('addnasabah')}}">
                Tambah Nasabah
            </a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>NIK</td>
                        <td>Status</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
