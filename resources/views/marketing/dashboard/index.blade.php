@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Nasabah
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $data['jmlnsb'] }} Orang
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Transaksi Kredit
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $data['jmlkrd'] }} Transaksi
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Jumlah Target Bulanan
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        {{ $data['jmltarget'] }} / 25
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: {{ ($data['jmltarget'] / 25) * 100 }}%"
                                            aria-valuenow="{{ $data['jmltarget'] }}" aria-valuemin="0"
                                            aria-valuemax="{{ $data['jmltarget'] }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Transaksi Tertunda
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$data['jmlpending']}} Transaksi
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="font-weight-bold">Tabel Penilaian Nasabah</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table table-hover table-bordered">
                <thead class="bg-primary text-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Kriteria Penilaian</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>1</td>
                        <td>Pekerjaan</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Penghasilan</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Status Kepemilikan Rumah</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Status Kendaraan</td>
                        <td>3</td>
                    </tr>
                </tbody>
                <tfoot class="bg-primary text-light text-center">
                    <tr>
                        <td class="font-weight-bold" colspan="2">Total Bobot</td>
                        <td class="font-weight-bold">15</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
