@extends('layouts.master')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Tambah Nasabah</h1>
    </div>
    <form action="" method="post">
        {{ csrf_field() }}
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Biodata Nasabah Pemohon
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="h4 font-weight-bold">Data Pemohon</h1>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="nik">Nomor Induk Kependudukan<strong class="text-danger">*</strong></label>
                                <input name="nik" id="nik" type="number" class="form-control"
                                    placeholder="Contoh: 2172021902980001" min="16" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="nama">Nama Pemohon
                                    <strong class="text-danger">*</strong></label>
                                <input name="nama" id="nama" type="text" class="form-control"
                                    placeholder="Contoh: Budi Cokro Dewo" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="jeniskelamin">Jenis Kelamin<strong class="text-danger">*</strong></label>
                                <select class="form-control" name="jeniskelamin" id="jeniskelamin" required>
                                    <option value="P">Pria</option>
                                    <option value="W">Wanita</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="statusperkawinan">
                                    Status Perkawinan
                                    <strong class="text-danger">*</strong>
                                </label>
                                <select class="form-control" name="statusperkawinan" id="statusperkawinan" required
                                    onchange="pilihankawin(this.value)">
                                    <option value="1">Belum Menikah</option>
                                    <option value="2">Sudah Menikah</option>
                                    <option value="3">Cerai Hidup</option>
                                    <option value="4">Cerai Mati</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="tanggallahir">Tanggal Lahir<strong class="text-danger">*</strong></label>
                                <input type="date" name="tanggallahir" id="tanggallahir" class="form-control" required>
                            </div>
                            <div class="col-6">
                                <label for="usia">Usia<strong class="text-danger">*</strong></label>
                                <input type="number" name="usia" id="usia" class="form-control" placeholder="Contoh: 24"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="nohp">Nomor Handphone</label>
                                <input type="tel" name="nohp" id="nohp" class="form-control"
                                    placeholder="Contoh: 081234567890" required>
                            </div>
                        </div>
                        <div id="pasangan" style="display: none">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="h4 font-weight-bold">Data Pasangan Pemohon</h1>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="namapasangan">Nama Pasangan</label>
                                    <input type="text" name="namapasangan" id="namapasangan" class="form-control"
                                        placeholder="Contoh: Eka Fitria Gultom" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="tanggallahirpasangan">Tanggal Lahir</label>
                                    <input type="date" name="tanggallahirpasangan" id="tanggallahirpasangan"
                                        class="form-control" required>
                                </div>
                                <div class="col-6">
                                    <label for="usiapasangan">Usia</label>
                                    <input type="number" name="usiapasangan" id="usiapasangan" class="form-control" required
                                        placeholder="Contoh: 21">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h1 class="h4 font-weight-bold">Alamat Pemohon</h1>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="alamat">Alamat Domisili<strong class="text-danger">*</strong></label>
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5"
                                    placeholder="Contoh: Jalan Pendakian No. 6" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="kecamatan">Kecamatan<strong class="text-danger">*</strong></label>
                                <input list="kecamatan" name="kecamatan" class="form-control" placeholder="Pilih Kecamatan"
                                    required>
                                <datalist id="kecamatan">
                                    @foreach ($kecamatan as $item)
                                        <option value="{{ $item->kecamatan }}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="col-4">
                                <label for="kelurahan">Kelurahan<strong class="text-danger">*</strong></label>
                                <input list="kelurahan" name="kelurahan" class="form-control" placeholder="Pilih Kelurahan"
                                    required>
                                <datalist id="kelurahan">
                                    @foreach ($kelurahan as $item)
                                        <option value="{{ $item->kelurahan }}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="col-4">
                                <label for="lamatinggal">Lama Tinggal (Tahun)<strong class="text-danger">*</strong></label>
                                <input type="number" name="lamatinggal" id="lamatinggal" class="form-control"
                                    placeholder="Contoh: 5" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h1 class="h4 font-weight-bold">Pekerjaan Pemohon</h1>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="jenispekerjaan">Jenis Pekerjaan<strong class="text-danger">*</strong></label>
                                <input list="jenispekerjaan" name="jenispekerjaan" class="form-control"
                                    placeholder="Pilih Jenis Pekerjaan" required>
                                <datalist id="jenispekerjaan">
                                    <option value="Pegawai Negeri"></option>
                                    <option value="Wirausaha"></option>
                                    <option value="Wirawasta"></option>
                                    <option value="Buruh"></option>
                                    <option value="Lainnnya"></option>
                                </datalist>
                            </div>
                            <div class="col-6">
                                <label for="pekerjaan">Deskripsi Pekerjaan<strong class="text-danger">*</strong></label>
                                <input id="pekerjaan" name="pekerjaan" class="form-control" type="text"
                                    placeholder="Contoh: Pemilik Toko" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="penghasilan">Estimasi Penghasilan<strong class="text-danger">*</strong></label>
                                <input name="penghasilan" id="penghasilan" type="number" class="form-control"
                                    placeholder="Contoh: 10000000" required>
                            </div>
                            <div class="col-6">
                                <label for="pengeluaran">Estimasi Pengeluaran<strong class="text-danger">*</strong></label>
                                <input name="pengeluaran" id="pengeluaran" type="number" class="form-control"
                                    placeholder="Contoh: 10000000" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="alamatkerja">Alamat Pekerjaan<strong class="text-danger">*</strong></label>
                                <textarea name="alamatkerja" id="alamatkerja" class="form-control" cols="30" rows="5"
                                    placeholder="Contoh: Jalan Ganet" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <button class="btn btn-sm btn-primary btn-block" type="submit">Simpan</button>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('nasabah') }}" class="btn btn-sm btn-danger btn-block">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('customjs')
    <script language="javascript">
        function pilihankawin(id) {
            if (id == 2) {
                document.getElementById('pasangan').style.display = 'block';
            } else {
                document.getElementById('pasangan').style.display = 'none';
            }
        }

    </script>
@endsection
