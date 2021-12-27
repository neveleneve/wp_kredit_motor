@extends('layouts.master')

@section('title')
<title>Lihat Harga OTR</title>
@endsection


@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Harga OTR Kendaraan {{$tipe[0]->tipe}}</h1>
</div>
<div class="row mb-3">
    <div class="col-1">
        <a class="btn btn-danger btn-block" href="{{ route('csviewotrtipe',['id'=>$data[0]->id_tipe_kendaraan]) }}">
            <i class="fa fa-chevron-left"></i>
        </a>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('cseditotr') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $data[0]->id }}">
                    <input type="hidden" name="idtipekendaraan" value="{{ $data[0]->id_tipe_kendaraan }}">
                    <label class="font-weight-bold" for="tahun">Tahun</label>
                    <input type="text" class="form-control mb-3" name="tahun" id="tahun" value="{{ $data[0]->tahun }}">
                    <label class="font-weight-bold" for="harga_otr">Harga OTR</label>
                    <input type="text" class="form-control mb-3" name="harga_otr" id="harga_otr" value="{{ $data[0]->harga_otr }}">
                    <label class="font-weight-bold" for="maks_pencairan">Maks. Pencairan</label>
                    <input type="text" class="form-control mb-3" name="maks_pencairan" id="maks_pencairan" value="{{ $data[0]->maks_pencairan }}">
                    <input type="submit" class="btn btn-sm btn-primary" value="Ubah Data">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
