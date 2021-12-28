<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('penyimpanan/logo/alco-square.jpg') }}">
    <title>Cetak Detail Pengajuan</title>
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('template/css/sb-admin-2.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid pt-5">
        <div class="row mb-3 align-items-center text-center">
            <div class="col-2">
                <img class="img-responsive" style="width: 100px" src="{{ asset('penyimpanan/logo/alco-square.jpg') }}" alt="">
            </div>
            <div class="col-8">
                <h2 class="font-weight-bold">Form Data Pengajuan</h2>
            </div>
            <div class="col-2">

            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 border border-dark">
                <table class="table table-sm mt-3">
                    <tbody>
                        <tr>
                            <td style="width: 50%">
                                <h5 class="my-0 mx-3 font-weight-bold">
                                    Data Pegawai
                                </h5>
                            </td>
                            <td style="width: 2%;"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Nama Pegawai</td>
                            <td>:</td>
                            <td>{{ $data[0]->nama_marketing }}</td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp;
                            </td>
                            <td>
                                &nbsp;
                            </td>
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 class="my-0 mx-3 font-weight-bold">
                                    Data Pemohon
                                </h4>
                            <td></td>
                            <td></td>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Nama</td>
                            <td>:</td>
                            <td>{{ $data[0]->nama }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $data[0]->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ date('d/m/Y', strtotime($data[0]->tgl_lahir)) }}</td>
                        </tr>
                        @php
                            function getUsia($tanggal)
                            {
                            $date = new DateTime($tanggal);
                            $now = new DateTime();
                            $interval = $now->diff($date);
                            return $interval->y;
                            }
                        @endphp
                        <tr>
                            <td class="font-weight-bold">Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ getUsia($data[0]->tgl_lahir) }} Tahun</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Nomor Induk Kependudukan</td>
                            <td>:</td>
                            <td>{{ $data[0]->nik }}</td>
                        </tr>
                        <tr style="height: 70px;" class="align-baseline">
                            <td class="font-weight-bold">Alamat Domisili</td>
                            <td>:</td>
                            <td>{{ $data[0]->alamat }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Kelurahan</td>
                            <td>:</td>
                            <td>{{ $data[0]->kelurahan }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Kecamatan</td>
                            <td>:</td>
                            <td>{{ $data[0]->kecamatan }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Kota</td>
                            <td>:</td>
                            <td>Tanjungpinang</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Provinsi</td>
                            <td>:</td>
                            <td>Kepulauan Riau</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Lama Tinggal</td>
                            <td>:</td>
                            <td>{{ $data[0]->lama_tinggal }} Tahun</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Kontak</td>
                            <td>:</td>
                            <td>{{ $data[0]->no_hp }}</td>
                        </tr>
                        @php
                            $statusnikah = null;
                            switch ($data[0]->status_nikah) {
                            case 1:
                            $statusnikah = 'Sudah Menikah';
                            break;
                            case 2:
                            $statusnikah = 'Belum Menikah';
                            break;
                            case 3:
                            $statusnikah = 'Cerai Hidup';
                            break;
                            case 4:
                            $statusnikah = 'Cerai Mati';
                            break;
                            }
                        @endphp
                        <tr>
                            <td class="font-weight-bold">Status</td>
                            <td>:</td>
                            <td>{{ $statusnikah }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Pekerjaan</td>
                            <td>:</td>
                            <td>{{ $data[0]->jenis_kerja }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Detail Pekerjaan</td>
                            <td>:</td>
                            <td>{{ $data[0]->desk_kerja }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Estimasi Pendapatan</td>
                            <td>:</td>
                            <td>Rp. {{ number_format($data[0]->penghasilan,0,',','.') }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Estimasi Pengeluaran</td>
                            <td>:</td>
                            <td>Rp. {{ number_format($data[0]->pengeluaran, 0, ',', '.') }}</td>
                        </tr>
                        <tr style="height: 70px;" class="align-baseline">
                            <td class="font-weight-bold">Alamat Pekerjaan</td>
                            <td>:</td>
                            <td>{{ $data[0]->alamat_kerja }}</td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp;
                            </td>
                            <td>
                                &nbsp;
                            </td>
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 class="my-0 mx-3 font-weight-bold">
                                    Data Penjamin
                                </h4>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Nama</td>
                            <td>:</td>
                            <td>{{ $data[0]->nama_penjamin == null ? $data[0]->nama_pasangan : $data[0]->nama_penjamin }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Tanggal Lahir</td>
                            <td>:</td>
                            <td>{{ date('d/m/Y', strtotime($data[0]->tgl_lahir_penjamin == null ? $data[0]->tgl_lahir_pasangan : $data[0]->tgl_lahir_penjamin)) }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Usia</td>
                            <td>:</td>
                            <td>{{ getUsia($data[0]->tgl_lahir_penjamin == null ? $data[0]->tgl_lahir_pasangan : $data[0]->tgl_lahir_penjamin) }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Status</td>
                            <td>:</td>
                            <td>{{ $data[0]->status_penjamin == null ? 'Pasangan (Istri)' : $data[0]->status_penjamin }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Kontak</td>
                            <td>:</td>
                            <td>{{ $data[0]->no_hp_penjamin == null ? $data[0]->no_hp_pasangan : $data[0]->no_hp_penjamin }}</td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp;
                            </td>
                            <td>
                                &nbsp;
                            </td>
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 class="my-0 mx-3 font-weight-bold">
                                    Data Kredit
                                </h4>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Besar Pinjaman</td>
                            <td>:</td>
                            <td>Rp. {{ number_format($data[0]->pinjaman,0,',','.') }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Besar Angsuran</td>
                            <td>:</td>
                            <td>Rp. {{ number_format($data[0]->angsuran,0,',','.') }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Tenor Pembayaran</td>
                            <td>:</td>
                            <td>{{ $data[0]->tenor }} Bulan</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Merk</td>
                            <td>:</td>
                            <td>{{ $data[0]->merk }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Tipe</td>
                            <td>:</td>
                            <td>{{ $data[0]->tipe }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Tahun</td>
                            <td>:</td>
                            <td>{{ $data[0]->tahun }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Harga OTR</td>
                            <td>:</td>
                            <td>Rp. {{ number_format($data[0]->harga_otr,0,',','.') }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Nomor Polisi</td>
                            <td>:</td>
                            <td>{{ $data[0]->nopol }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Masa Berlaku Pajak</td>
                            <td>:</td>
                            <td>{{ date('d/m/Y',strtotime($data[0]->tgl_pajak)) }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Masa Berlaku STNK</td>
                            <td>:</td>
                            <td>{{ date('d/m/Y',strtotime($data[0]->tgl_stnk)) }}</td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp;
                            </td>
                            <td>
                                &nbsp;
                            </td>
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4 class="my-0 mx-3 font-weight-bold">
                                    Data Hunian
                                </h4>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Status Kepemilikan</td>
                            <td>:</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sendiri" name="status_kepemilikan" value="sendiri" {{ $data[0]->status_kepemilikan == 'sendiri' ? 'checked' : 'disabled' }}>
                                    <label class="form-check-label" for="sendiri">Sendiri</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="keluarga" name="status_kepemilikan" value="keluarga" {{ $data[0]->status_kepemilikan == 'keluarga' ? 'checked' : 'disabled' }}>
                                    <label class="form-check-label" for="keluarga">Keluarga</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="dinas" name="status_kepemilikan" value="dinas" {{ $data[0]->status_kepemilikan == 'dinas' ? 'checked' : 'disabled' }}>
                                    <label class="form-check-label" for="dinas">Dinas</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sewa" name="status_kepemilikan" value="sewa" {{ $data[0]->status_kepemilikan == 'sewa' ? 'checked' : 'disabled' }}>
                                    <label class="form-check-label" for="sewa">Sewa</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="kost" name="status_kepemilikan" value="kost" {{ $data[0]->status_kepemilikan == 'kost' ? 'checked' : 'disabled' }}>
                                    <label class="form-check-label" for="kost">Kost</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Bukti Kepemilikan</td>
                            <td>:</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sertifikat" name="bukti_kepemilikan" value="sertifikat" {{ $data[0]->bukti_kepemilikan == 'sertifikat' ? 'checked' : 'disabled' }}>
                                    <label class="form-check-label" for="sertifikat">Sertifikat</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="pbb" name="bukti_kepemilikan" value="pbb" {{ $data[0]->bukti_kepemilikan == 'pbb' ? 'checked' : 'disabled' }}>
                                    <label class="form-check-label" for="pbb">Pajak Bumi dan Bangunan (PBB)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rekeninglistrik" name="bukti_kepemilikan" value="rekeninglistrik" {{ $data[0]->bukti_kepemilikan == 'rekeninglistrik' ? 'checked' : 'disabled' }}>
                                    <label class="form-check-label" for="rekeninglistrik">Rekening Listrik</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ajb" name="bukti_kepemilikan" value="ajb" {{ $data[0]->bukti_kepemilikan == 'ajb' ? 'checked' : 'disabled' }}>
                                    <label class="form-check-label" for="ajb">Akta Jual Beli (AJB)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="lainnya" name="bukti_kepemilikan" value="lainnya" {{ $data[0]->bukti_kepemilikan == 'lainnya' ? 'checked' : 'disabled' }}>
                                    <label class="form-check-label" for="lainnya">Lainnya</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp;
                            </td>
                            <td>
                                &nbsp;
                            </td>
                            <td>
                                &nbsp;
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 border border-dark">
                <table class="table table-bordered table-sm mt-3">
                    <tbody>
                        <tr style="height: 100px;" class="align-baseline">
                            <td style="width: 30%" class="font-weight-bold">1. Ketersediaan waktu pemohon untuk disurvey</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 28%">
                            </td>
                            <td rowspan="2" style="width: 40%">
                                <h6 class="font-weight-bold text-center">Tanda Tangan Marketing</h6>
                            </td>
                        </tr>
                        <tr style="height: 100px;" class="align-baseline">
                            <td class="font-weight-bold">2.</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
