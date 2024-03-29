@extends('layouts.master')

@section('title')
    <title>Tambah Nasabah</title>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Tambah Nasabah</h1>
    </div>
    <div class="row mb-3">
        <div class="col-lg-2 col-md-12">
            <a class="btn btn-danger btn-block" href="{{ route('nasabah') }}">
                <i class="fa fa-chevron-left"></i>
                Kembali
            </a>
        </div>
    </div>
    <form action="{{ route('ceknasabah') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id_marketing" value="{{ Auth::user()->id }}">
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Biodata Nasabah Pemohon
                    </div>
                    <div class="card-body">
                        {{-- Data Pemohon --}}
                        <div class="row">
                            <div class="col-12">
                                <h1 class="h4 font-weight-bold">Data Pemohon</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xl-4 mb-3">
                                <label class="font-weight-bold" for="nik">Nomor Induk Kependudukan <strong
                                        class="text-danger">*</strong></label>
                                <input type="text" pattern="^[0-9]{16}" minlength="16" maxlength="16" name="nik" id="nik"
                                    class="form-control" placeholder="Masukkan 16 digit angka NIK"
                                    title="Masukkan 16 digit pada NIK" required>
                            </div>
                            <div class="col-lg-12 col-xl-4 mb-3">
                                <label class="font-weight-bold" for="fotoktp">Foto KTP <strong
                                        class="text-danger">*</strong></label>
                                <input class="form-control" type="file" name="fotoktp" id="fotoktp"
                                    accept="image/x-png,image/gif,image/jpeg" required>
                            </div>
                            <div class="col-lg-12 col-xl-4 mb-3">
                                <label class="font-weight-bold" for="fotoktp">Foto Kartu Keluarga <strong
                                        class="text-danger">*</strong></label>
                                <input class="form-control" type="file" name="fotokk" id="fotokk"
                                    accept="image/x-png,image/gif,image/jpeg" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="font-weight-bold" for="nama">
                                    Nama Pemohon
                                    <strong class="text-danger">*</strong>
                                </label>
                                <input name="nama" id="nama" type="text" class="form-control" placeholder="Budi Cokro Dewo"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6 mb-3">
                                <label class="font-weight-bold" for="jeniskelamin">Jenis Kelamin <strong
                                        class="text-danger">*</strong></label>
                                <select class="form-control" name="jeniskelamin" id="jeniskelamin" required>
                                    <option disabled selected hidden value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki - laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-6 mb-3">
                                <label class="font-weight-bold" for="statusperkawinan">
                                    Status Pernikahan
                                    <strong class="text-danger">*</strong>
                                </label>
                                <select class="form-control" name="statusperkawinan" id="statusperkawinan"
                                    onchange="pilihankawin(this.value)" required>
                                    <option disabled selected hidden value="">Pilih Status Penikahan</option>
                                    <option value="1">Sudah Menikah</option>
                                    <option value="2">Belum Menikah</option>
                                    <option value="3">Cerai Hidup</option>
                                    <option value="4">Cerai Mati</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-3 col-sm-12 mb-3">
                                <label class="font-weight-bold" for="tempatlahir">Tempat Lahir <strong
                                        class="text-danger">*</strong></label>
                                <input type="text" name="tempatlahir" id="tempatlahir" class="form-control"
                                    placeholder="Tanjungpinang" required>
                            </div>
                            <div class="col-md-6 col-lg-3 col-sm-12 mb-3">
                                <label class="font-weight-bold" for="tanggallahir">Tanggal Lahir <strong
                                        class="text-danger">*</strong></label>
                                <input type="date" name="tanggallahir" id="tanggallahir" value="{{ date('Y-m-d') }}"
                                    onchange="getAge(this.value, 'usia')" class="form-control" required>
                            </div>
                            <div class="col-md-6 col-lg-3 col-sm-12 mb-3">
                                <label class="font-weight-bold" for="usia">Usia <strong
                                        class="text-danger">*</strong></label>
                                <input type="number" name="usia" id="usia" class="form-control" min="21"
                                    placeholder="Minimal usia : 21" required>
                            </div>
                            <div class="col-md-6 col-lg-3 col-sm-12 mb-3">
                                <label class="font-weight-bold" for="nohp">Nomor Handphone <strong
                                        class="text-danger">*</strong></label>
                                <input type="tel" name="nohp" id="nohp" class="form-control" placeholder="081234567890"
                                    required>
                            </div>
                        </div>
                        {{-- Data Pasangan (bila sudah menikah) --}}
                        <div id="pasangan" style="display: none">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="h4 font-weight-bold">Data Pasangan</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="font-weight-bold" for="namapasangan">Nama Pasangan <strong
                                            class="text-danger">*</strong></label>
                                    <input type="text" name="namapasangan" id="namapasangan" class="form-control"
                                        placeholder="Eka Fitria Gultom">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 mb-3">
                                    <label class="font-weight-bold" for="tanggallahirpasangan">Tanggal Lahir <strong
                                            class="text-danger">*</strong></label>
                                    <input type="date" value="{{ date('Y-m-d') }}"
                                        onchange="getAge(this.value, 'usiapasangan')" name="tanggallahirpasangan"
                                        id="tanggallahirpasangan" class="form-control">
                                </div>
                                <div class="col-sm-12 col-md-4 mb-3">
                                    <label class="font-weight-bold" for="usiapasangan">Usia <strong
                                            class="text-danger">*</strong></label>
                                    <input type="number" name="usiapasangan" id="usiapasangan" class="form-control"
                                        placeholder="Minimal usia : 21" min="21">
                                </div>
                                <div class="col-sm-12 col-md-4 mb-3">
                                    <label class="font-weight-bold" for="nohppasangan">Nomor Handphone <strong
                                            class="text-danger">*</strong></label>
                                    <input type="text" name="nohppasangan" id="nohppasangan" class="form-control"
                                        placeholder="081234567890">
                                </div>
                            </div>
                        </div>
                        {{-- Data Penjamin (selain sudah menikah) --}}
                        <div id="penjamin" style="display: none">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="h4 font-weight-bold">Data Penjamin</h1>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 mb-3">
                                    <label class="font-weight-bold" for="namapenjamin">Nama Penjamin <strong
                                            class="text-danger">*</strong></label>
                                    <input type="text" name="namapenjamin" id="namapenjamin" class="form-control"
                                        placeholder="Hendra Iman Juliansyah">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6 col-xl-3 mb-3">
                                    <label class="font-weight-bold" for="tanggallahirpenjamin">Tanggal Lahir <strong
                                            class="text-danger">*</strong></label>
                                    <input type="date" value="{{ date('Y-m-d') }}"
                                        onchange="getAge(this.value, 'usiapenjamin')" name="tanggallahirpenjamin"
                                        id="tanggallahirpenjamin" class="form-control">
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-3 mb-3">
                                    <label class="font-weight-bold" for="usiapenjamin">Usia <strong
                                            class="text-danger">*</strong></label>
                                    <input type="number" name="usiapenjamin" id="usiapenjamin" class="form-control"
                                        placeholder="Minimal usia : 21" min="21">
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-3 mb-3">
                                    <label class="font-weight-bold" for="nohppenjamin">Nomor Handphone <strong
                                            class="text-danger">*</strong></label>
                                    <input type="text" name="nohppenjamin" id="nohppenjamin" class="form-control"
                                        placeholder="081234567890">
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-3 mb-3">
                                    <label for="statuspenjamin" class="font-weight-bold">Status Hubungan <strong
                                            class="text-danger">*</strong></label>
                                    <select class="form-control" name="statuspenjamin" id="statuspenjamin">
                                        <option selected disabled>Pilih Hubungan Pemohon</option>
                                        <option value="1">Keluarga</option>
                                        <option value="2">Tetangga</option>
                                        <option value="3">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Alamat Pemohon --}}
                        <div class="row">
                            <div class="col-12">
                                <h1 class="h4 font-weight-bold">Alamat Pemohon</h1>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="font-weight-bold" for="alamat">Alamat Domisili (Sesuai KTP) <strong
                                        class="text-danger">*</strong></label>
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5"
                                    placeholder="Jalan Pendakian No. 6"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label class="font-weight-bold" for="kecamatan">
                                    Kecamatan
                                    <strong class="text-danger">*</strong>
                                </label>
                                <select class="form-control" name="kecamatan" id="kecamatan">
                                    <option selected disabled hidden value="">Pilih Kecamatan</option>
                                    @foreach ($kecamatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="font-weight-bold" for="kelurahan">
                                    Kelurahan
                                    <strong class="text-danger">*</strong>
                                </label>
                                <select class="form-control" name="kelurahan" id="kelurahan">
                                    <option selected disabled hidden value="">Pilih Kelurahan</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="font-weight-bold" for="lamatinggal">Lama Tinggal (Tahun) <strong
                                        class="text-danger">*</strong></label>
                                <input type="number" name="lamatinggal" id="lamatinggal" class="form-control"
                                    placeholder="Minimal 3 Tahun" min="3">
                            </div>
                        </div>
                        {{-- Pekerjaan Pemohon --}}
                        <div class="row">
                            <div class="col-12">
                                <h1 class="h4 font-weight-bold">Pekerjaan Pemohon</h1>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="font-weight-bold" for="jenispekerjaan">Jenis Pekerjaan<strong
                                        class="text-danger">*</strong></label>
                                <input list="jenispekerjaan" name="jenispekerjaan" class="form-control"
                                    placeholder="Pilih Jenis Pekerjaan">
                                <datalist id="jenispekerjaan">
                                    <option value="Pegawai Negeri"></option>
                                    <option value="Wirausaha"></option>
                                    <option value="Wirawasta"></option>
                                    <option value="Buruh"></option>
                                    <option value="Lainnya"></option>
                                </datalist>
                            </div>
                            <div class="col-6">
                                <label class="font-weight-bold" for="pekerjaan">Deskripsi Pekerjaan<strong
                                        class="text-danger">*</strong></label>
                                <input id="pekerjaan" name="pekerjaan" class="form-control" type="text"
                                    placeholder="Pemilik Toko">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="font-weight-bold" for="penghasilan">Estimasi Penghasilan<strong
                                        class="text-danger">*</strong></label>
                                <input name="penghasilan" id="penghasilan" type="number" class="form-control"
                                    placeholder="10000000">
                            </div>
                            <div class="col-6">
                                <label class="font-weight-bold" for="pengeluaran">Estimasi Pengeluaran<strong
                                        class="text-danger">*</strong></label>
                                <input name="pengeluaran" id="pengeluaran" type="number" class="form-control"
                                    placeholder="10000000">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="font-weight-bold" for="alamatkerja">Alamat Pekerjaan<strong
                                        class="text-danger">*</strong></label>
                                <textarea name="alamatkerja" id="alamatkerja" class="form-control" cols="30" rows="5"
                                    placeholder="Jalan Ganet"></textarea>
                            </div>
                        </div>
                        {{-- Rumah Hunian --}}
                        <div class="row">
                            <div class="col-12">
                                <h1 class="h4 font-weight-bold">Rumah Hunian</h1>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="font-weight-bold" for="statuskepemilikan">Status Kepemilikan <strong
                                        class="text-danger">*</strong></label>
                                <br>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" value="sendiri" name="statuskepemilikan"
                                        id="sendiri">
                                    <label class="form-check-label" for="sendiri">Sendiri</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" value="keluarga" name="statuskepemilikan"
                                        id="keluarga">
                                    <label class="form-check-label" for="keluarga">Keluarga</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" value="dinas" name="statuskepemilikan"
                                        id="dinas">
                                    <label class="form-check-label" for="dinas">Dinas</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" value="sewa" name="statuskepemilikan"
                                        id="sewa">
                                    <label class="form-check-label" for="sewa">Sewa</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" value="kost" name="statuskepemilikan"
                                        id="kost">
                                    <label class="form-check-label" for="kost">Kost</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="font-weight-bold" for="buktikepemilikan">Bukti Kepemilikan <strong
                                        class="text-danger">*</strong></label>
                                <br>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" value="sertifikat" name="buktikepemilikan"
                                        id="sertifikat">
                                    <label class="form-check-label" for="sertifikat">Sertifikat</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" value="pbb" name="buktikepemilikan"
                                        id="pbb">
                                    <label class="form-check-label" for="pbb">Pajak Bumi dan Bangunan (PBB)</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" value="rekeninglistrik"
                                        name="buktikepemilikan" id="rekeninglistrik">
                                    <label class="form-check-label" for="rekeninglistrik">Rekening Listrik</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" value="ajb" name="buktikepemilikan"
                                        id="ajb">
                                    <label class="form-check-label" for="ajb">Akta Jual Beli (AJB)</label>
                                </div>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" value="lainnya" name="buktikepemilikan"
                                        id="lainnya">
                                    <label class="form-check-label" for="Lainnya">
                                        Lainnya
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="font-weight-bold" for="fotokepemilikanhunian">Foto Bukti Kepemilikan <strong
                                        class="text-danger"> *</strong></label>
                                <input class="form-control" type="file" name="fotokepemilikanhunian"
                                    id="fotokepemilikanhunian" accept="image/x-png,image/gif,image/jpeg">
                            </div>
                        </div>
                        {{-- Unit --}}
                        <div class="row">
                            <div class="col-12">
                                <h1 class="h4 font-weight-bold">Unit</h1>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label class="font-weight-bold" for="merk">Merk <strong
                                        class="text-danger">*</strong></label>
                                <select class="form-control" name="merk" id="merk" required>
                                    <option selected disabled hidden value="">Pilih Merk Kendaraan</option>
                                    @foreach ($merk as $item)
                                        <option value="{{ $item->id }}">{{ $item->merk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="font-weight-bold" for="tipe">Type <strong
                                        class="text-danger">*</strong></label>
                                <select class="form-control" name="tipe" id="tipe" required>
                                    <option selected disabled hidden value="">Pilih Nama Kendaraan</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="font-weight-bold" for="tahunkendaraan">Tahun <strong
                                        class="text-danger">*</strong></label>
                                <select class="form-control" name="tahunkendaraan" id="tahunkendaraan" required>
                                    <option selected disabled hidden value="">Pilih Tahun Kendaraan</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="font-weight-bold" for="hargaotr">
                                    Harga On the Road (OTR)
                                    <strong class="text-danger">*</strong>
                                </label>
                                <input type="text" class="form-control" placeholder="Rp. xx.xxx.xxx" name="hargaotr"
                                    id="hargaotr" readonly>
                            </div>
                            <div class="col-6">
                                <label class="font-weight-bold" for="pengajuanplafon">
                                    Pengajuan Plafon
                                    <strong class="text-danger">*</strong>
                                </label>
                                <select class="form-control" name="pengajuanplafon" id="pengajuanplafon" required>
                                    <option disabled selected hidden value="">Pilih Dana Peminjaman (Maks. Pencairan : Rp. x.xxx.xxx)
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="font-weight-bold" for="tenor">
                                    Tenor
                                    <strong class="text-danger">*</strong>
                                </label>
                                <select class="form-control" name="tenor" id="tenor">
                                    <option selected disabled hidden value="">Pilih Tenor Kredit</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="font-weight-bold" for="angsuran">
                                    Angsuran
                                    <strong class="text-danger">*</strong>
                                </label>
                                <input type="text" name="angsuran" id="angsuran" class="form-control"
                                    placeholder="Angsuran Pinjaman" required readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <label class="font-weight-bold" for="nopol">
                                    Nomor Polisi
                                    <strong class="text-danger">*</strong>
                                </label>
                                <input pattern="^[A-Z]{1,2}[0-9]{1,4}[A-Z]{2,3}" type="text" class="form-control"
                                    placeholder="BP1234XZ" name="nopol" id="nopol" required>
                            </div>
                            <div class="col-4">
                                <label class="font-weight-bold" for="masaberlakupajak">
                                    Masa Berlaku Pajak
                                    <strong class="text-danger">*</strong>
                                </label>
                                <input type="date" value="{{ date('Y-m-d') }}" name="masaberlakupajak"
                                    id="masaberlakupajak" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label class="font-weight-bold" for="masaberlakustnk">
                                    Masa Berlaku STNK
                                    <strong class="text-danger">*</strong>
                                </label>
                                <input type="date" value="{{ date('Y-m-d') }}" name="masaberlakustnk"
                                    id="masaberlakustnk" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="font-weight-bold" for="fotobpkb">Foto BPKP <strong
                                        class="text-danger">*</strong></label>
                                <input type="file" class="form-control" name="fotobpkb" id="fotobpkb"
                                    accept="image/x-png,image/gif,image/jpeg" required>
                            </div>
                            <div class="col-6">
                                <label class="font-weight-bold" for="fotostnk">Foto STNK <strong
                                        class="text-danger">*</strong></label>
                                <input type="file" class="form-control" name="fotostnk" id="fotostnk"
                                    accept="image/x-png,image/gif,image/jpeg" required>
                            </div>
                        </div>
                        {{-- Tombol --}}
                        <div class="row mb-3">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block" name="tambahnasabah" type="submit">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <a class="scroll-to-top rounded bg-danger" href="{{ route('nasabah') }}" style="margin-right: 50px" title="Kembali">
        <i class="fas fa-angle-left"></i>
    </a>
@endsection
