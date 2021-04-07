@extends('layouts.master')

@section('title')
    <title>Pengajuan</title>
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Tambah Pengajuan Nasabah</h1>
    </div>
    <div class="row mb-3">
        <div class="col-1">
            <a class="btn btn-danger btn-block" href="{{ route('nasabah') }}">
                <i class="fa fa-chevron-left"></i>
            </a>
        </div>
    </div>
    <form action="{{ route('ceknasabah') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id_marketing" value="{{ Auth::user()->id }}">
        <input type="hidden" name="nik" value="{{ $nik }}">
        <div class="row">
            <div class="col-12">
                <h1 class="h4 font-weight-bold">Unit</h1>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label class="font-weight-bold" for="merk">Merk <strong class="text-danger">*</strong></label>
                <select class="form-control" name="merk" id="merk" required>
                    <option selected disabled hidden value="">Pilih Merk Kendaraan</option>
                    @foreach ($merk as $item)
                        <option value="{{ $item->id }}">{{ $item->merk }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <label class="font-weight-bold" for="tipe">Type <strong class="text-danger">*</strong></label>
                <select class="form-control" name="tipe" id="tipe" required>
                    <option selected disabled hidden value="">Pilih Nama Kendaraan</option>
                </select>
            </div>
            <div class="col-4">
                <label class="font-weight-bold" for="tahunkendaraan">Tahun <strong class="text-danger">*</strong></label>
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
                <input type="text" class="form-control" placeholder="Rp. xx.xxx.xxx" name="hargaotr" id="hargaotr" readonly>
            </div>
            <div class="col-6">
                <label class="font-weight-bold" for="pengajuanplafon">
                    Pengajuan Plafon
                    <strong class="text-danger">*</strong>
                </label>
                <select class="form-control" name="pengajuanplafon" id="pengajuanplafon">
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
                <select class="form-control" name="tenor" id="tenor" required>
                    <option selected disabled hidden value="">Pilih Tenor Kredit</option>
                </select>
            </div>
            <div class="col-6">
                <label class="font-weight-bold" for="angsuran">
                    Angsuran
                    <strong class="text-danger">*</strong>
                </label>
                <input type="text" name="angsuran" id="angsuran" class="form-control" placeholder="Angsuran Pinjaman"
                    required readonly>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label class="font-weight-bold" for="nopol">
                    Nomor Polisi
                    <strong class="text-danger">*</strong>
                </label>
                <input pattern="^[A-Z]{1,2}[0-9]{1,4}[A-Z]{2,3}" type="text" class="form-control" placeholder="BP1234XZ"
                    name="nopol" id="nopol" required>
            </div>
            <div class="col-4">
                <label class="font-weight-bold" for="masaberlakupajak">
                    Masa Berlaku Pajak
                    <strong class="text-danger">*</strong>
                </label>
                <input type="date" value="{{ date('Y-m-d') }}" name="masaberlakupajak" id="masaberlakupajak"
                    class="form-control">
            </div>
            <div class="col-4">
                <label class="font-weight-bold" for="masaberlakustnk">
                    Masa Berlaku STNK
                    <strong class="text-danger">*</strong>
                </label>
                <input type="date" value="{{ date('Y-m-d') }}" name="masaberlakustnk" id="masaberlakustnk"
                    class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label class="font-weight-bold" for="fotobpkb">Foto BPKP <strong class="text-danger">*</strong></label>
                <input type="file" class="form-control" name="fotobpkb" id="fotobpkb"
                    accept="image/x-png,image/gif,image/jpeg" required>
            </div>
            <div class="col-6">
                <label class="font-weight-bold" for="fotostnk">Foto STNK <strong class="text-danger">*</strong></label>
                <input type="file" class="form-control" name="fotostnk" id="fotostnk"
                    accept="image/x-png,image/gif,image/jpeg" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <button class="btn btn-primary btn-block" name="pengajuan" type="submit">Simpan</button>
            </div>
        </div>
    </form>
    <a class="scroll-to-top rounded bg-danger" href="{{ route('nasabah') }}" style="margin-right: 50px">
        <i class="fas fa-angle-left"></i>
    </a>
@endsection

@section('customjs')
    <script>
        $(document).ready(function() {
            var merk = $('#merk');
            var pengajuan = $('#pengajuanplafon');
            var hargaotr = $('#hargaotr');
            var tipe = $('#tipe');
            var tahun = $('#tahunkendaraan');
            var tenor = $('#tenor');
            var angsuran = $('#angsuran');
            var tahunkendaraan = $('#id_tahun_kendaraan');
            
            merk.on('change', function(e) {
                e.preventDefault();
                var id = $(this).val();
                $.ajax({
                    url: '/tipekendaraan/' + id,
                    type: 'GET',
                    success: function(datax) {
                        tipe.empty();
                        tipe.append(
                            '<option selected disabled hidden value=>Pilih Nama Kendaraan');
                        var data = datax.replace('"', '');
                        tipe.append(data.replace('"', ''));
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                    },
                });
            });
            tipe.on('change', function(e) {
                e.preventDefault();
                var id = $(this).val();
                $.ajax({
                    url: '/tahunharga/' + id,
                    type: 'GET',
                    success: function(datax) {
                        tahun.empty();
                        tahun.append(
                            '<option selected disabled hidden value=>Pilih Tahun Kendaraan');
                        var data = datax.replace('"', '');
                        tahun.append(data.replace('"', ''));
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                    },
                });
            });
            tahun.on('change', function(e) {
                e.preventDefault();
                var id = $(this).val();
                $.ajax({
                    url: '/harga/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(datax) {
                        pengajuan.empty();
                        if (datax.otr == 0) {
                            hargaotr.val("Pencairan Bersih");
                            pengajuan.append(
                                "<option selected disabled value=>Pilih Dana Peminjaman (Maks. Pencairan : Rp. " +
                                new Intl
                                .NumberFormat(
                                    'de-DE').format(datax.cair) + ")");
                            pengajuan.append(datax.kredit);
                        } else {
                            hargaotr.val("Rp. " + new Intl.NumberFormat('de-DE').format(datax
                                .otr));
                            pengajuan.append(
                                "<option selected disabled hidden value=>Pilih Dana Peminjaman (Maks. Pencairan : Rp. " +
                                new Intl
                                .NumberFormat(
                                    'de-DE').format(datax.cair) + ")");
                            pengajuan.append(datax.kredit);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                    },
                });
            });
            pengajuan.on('change', function(e) {
                e.preventDefault();
                var id = $(this).val();
                $.ajax({
                    url: '/tenor/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(datax) {
                        tenor.empty();
                        tenor.append('<option selected disabled hidden value=>Pilih Tenor Kredit');
                        tenor.append(datax);
                    }
                });
            });
            tenor.on('change', function(e) {
                e.preventDefault();
                var id = $(this).val();
                $.ajax({
                    url: '/angsuran/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(datax) {
                        angsuran.attr("placeholder", "Sedang Mendapatkan Data...");
                        setTimeout(function() {
                            angsuran.val(datax);
                        }, 3000);
                    }
                });
            });
        });
    </script>
@endsection
