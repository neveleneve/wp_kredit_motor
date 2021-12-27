@extends('layouts.master')

@section('title')
<title>Lihat Merk Kendaraan</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Merk Kendaraan</h1>
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
                <form action="{{ route('cseditmerk') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $data[0]->id }}">
                    <label class="font-weight-bold" for="merk">Merk Kendaraan</label>
                    <input type="text" class="form-control mb-3" name="merk" id="merk" value="{{ $data[0]->merk }}">
                    <input type="submit" class="btn btn-sm btn-primary" value="Ubah Data">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
