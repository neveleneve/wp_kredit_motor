@extends('layouts.master')

@section('title')
<title>Lihat Tipe Kendaraan</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Tipe Kendaraan</h1>
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
                <form action="{{ route('csedittipe') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $data[0]->id }}">
                    <label class="font-weight-bold" for="merk">Merk Kendaraan</label>
                    <select name="merk" id="merk" class="form-control mb-3">
                        @foreach($datamerk as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $data[0]->id_merk ? 'selected' : null }}>{{ $item->merk }}</option>
                        @endforeach
                    </select>
                    <label class="font-weight-bold" for="merk">Tipe Kendaraan</label>
                    <input type="text" class="form-control mb-3" name="tipe" id="tipe" value="{{ $data[0]->tipe }}">
                    <input type="submit" class="btn btn-sm btn-primary" value="Ubah Data">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
