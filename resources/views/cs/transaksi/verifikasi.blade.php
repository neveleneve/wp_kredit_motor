@extends('layouts.master')

@section('title')
    <title>Verifikasi Pengajuan</title>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Verifikasi Pengajuan</h1>
    </div>
    <div class="row mb-3">
        <div class="col-1">
            <a class="btn btn-sm btn-danger btn-block" href="{{ route('cstransaksi') }}"><i
                    class="fa fa-chevron-left"></i></a>
        </div>
    </div>
    <div class="row mb-3">
        <form action="{{ route('csverification') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="trx_code" value="{{ $data[0]->trx_code }}">
            <div class="col-12">
                <table class="table table-bordered text-center text-nowrap">
                    <thead class="bg-light font-weight-bold">
                        <tr>
                            <td>No</td>
                            <td>Poin Penilaian</td>
                            <td>Keterangan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-primary text-light">
                            <td colspan="3">
                                <h6 class="text-left font-weight-bold">
                                    Pekerjaan
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Jenis Pekerjaan</td>
                            <td>{{ $data[0]->jenis_kerja }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Deskripsi Pekerjaan</td>
                            <td>{{ $data[0]->desk_kerja }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h6 class="text-left font-weight-bold">Penilaian Pekerjaan</h6>
                            </td>
                            <td>
                                <input type="number" name="nilaipekerjaan" class="form-control" placeholder="Penilaian 0-5"
                                    min="0" max="5" required>
                            </td>
                        </tr>
                        <tr class="bg-primary text-light">
                            <td colspan="4">
                                <h6 class="text-left font-weight-bold">
                                    Penghasilan dan Pengajuan
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Penghasilan per Bulan (Estimasi)</td>
                            <td>Rp. {{ number_format($data[0]->penghasilan, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Pengeluaran per Bulan (Estimasi)</td>
                            <td>Rp. {{ number_format($data[0]->pengeluaran, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Pendapatan Bersih (Estimasi)</td>
                            <td>
                                @php
                                    $selisih = $data[0]->penghasilan - $data[0]->pengeluaran;
                                @endphp
                                <input type="text" class="form-control form-control-plaintext text-center bg-gray-100"
                                    value="Rp. {{ number_format($selisih, 0, ',', '.') }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Pengajuan Kredit</td>
                            <td>Rp. {{ number_format($data[0]->pinjaman, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Angsuran</td>
                            <td>Rp. {{ number_format($data[0]->angsuran, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Tenor</td>
                            <td>{{ $data[0]->tenor }} Bulan</td>
                        </tr>
                        @php
                            $val = null;
                            $selisihtotal = $selisih - $data[0]->angsuran;
                            if ($selisihtotal <= 0) {
                                $val = 0;
                            } elseif ($selisihtotal <= 1000000 && $selisihtotal > 0) {
                                $val = 1;
                            } elseif ($selisihtotal <= 2500000 && $selisihtotal > 1000000) {
                                $val = 2;
                            } elseif ($selisihtotal <= 4500000 && $selisihtotal > 2500000) {
                                $val = 3;
                            } elseif ($selisihtotal <= 7500000 && $selisihtotal > 4500000) {
                                $val = 4;
                            } elseif ($selisihtotal > 7500000) {
                                $val = 5;
                            }
                        @endphp
                        <tr>
                            <td colspan="2">
                                <h6 class="text-left font-weight-bold">Penilaian Penghasilan</h6>
                            </td>
                            <td>
                                <input value="{{ $val }}" type="number" class="form-control"
                                    name="nilaipenghasilan" id="nilaipenghasilan" readonly>

                            </td>
                        </tr>
                        <tr class="bg-primary text-light">
                            <td colspan="4">
                                <h6 class="text-left font-weight-bold">
                                    Kepemilikan Rumah
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Status Kepemilikan Rumah</td>
                            <td>{{ ucwords($data[0]->status_kepemilikan) }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Bukti Kepemilikan</td>
                            <td>{{ ucwords($data[0]->bukti_kepemilikan) }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Foto Bukti Kepemilikan</td>
                            <td>
                                <a href="{{ url('penyimpanan/buktikepemilikan/' . $data[0]->nik_nasabah . '_' . $data[0]->bukti_kepemilikan . '.jpg') }}"
                                    target="_blank">
                                    <img class="img-fluid"
                                        src="{{ asset('penyimpanan/buktikepemilikan/' . $data[0]->nik_nasabah . '_' . $data[0]->bukti_kepemilikan . '.jpg') }}"
                                        style="width: 20%">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h6 class="text-left font-weight-bold">Penilaian Kepemilikan Rumah</h6>
                            </td>
                            <td>
                                @php
                                    $nilai = 0;
                                    if ($data[0]->status_kepemilikan == 'sendiri') {
                                        $nilai = 2;
                                    } elseif ($data[0]->status_kepemilikan == 'keluarga') {
                                        $nilai = 1;
                                    } else {
                                        $nilai = 0;
                                    }
                                @endphp
                                <input value="{{ $nilai }}" class="form-control" name="nilaikepemilikanrumah"
                                    id="nilaikepemilikanrumah" readonly>
                            </td>
                        </tr>
                        <tr class="bg-primary text-light">
                            <td colspan="4">
                                <h6 class="text-left font-weight-bold">
                                    Status Kendaraan
                                </h6>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Penilaian Kendaraan</td>
                            <td>{{ ucwords($data[0]->tipe) }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Harga On The Road (OTR)</td>
                            <td>Rp. {{ number_format($data[0]->harga_otr, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Nomor Polisi</td>
                            <td>{{ ucwords($data[0]->nopol) }}</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Masa Pajak</td>
                            <td>{{ date('d F Y', strtotime($data[0]->tgl_pajak)) }}</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Masa STNK</td>
                            <td>{{ date('d F Y', strtotime($data[0]->tgl_stnk)) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h6 class="text-left font-weight-bold">Penilaian Kendaraan</h6>
                            </td>
                            <td>
                                <input type="number" placeholder="Penilaian 0-5" class="form-control"
                                    name="nilaitipekendaraan" id="nilaitipekendaraan" min="0" max="5" required>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-sm btn-primary btn-block" value="Verifikasi">
            </div>
        </form>
    </div>
@endsection
