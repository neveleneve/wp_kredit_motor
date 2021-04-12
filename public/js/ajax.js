$(document).ready(function () {
    $('#sidebarToggle').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: "/sidebar",
            type: "GET",
            success: function () { }
        });
    });
    $('#merkpillx').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: "/pengajuan/2",
            type: "GET",
            success: function () {
                window.location = '/cs/pengajuan'
            }
        });
    });
    $('#merkpill').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: "/pengajuan/2",
            type: "GET",
            success: function () {
                window.location = '/cs/pengajuan'
            }
        });
    });
    $('#tipepill').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: "/pengajuan/1",
            type: "GET",
            success: function () {
                window.location = '/cs/pengajuan'
            }
        });
    });
    $('#pillmerk').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: "/pengajuan/2",
            type: "GET",
            success: function () { }
        });
    });
    $('#pilltype').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: "/pengajuan/1",
            type: "GET",
            success: function () { }
        });
    });
    var kecamatan = $('#kecamatan');
    var kelurahan = $('#kelurahan');
    var merk = $('#merk');
    var pengajuan = $('#pengajuanplafon');
    var hargaotr = $('#hargaotr');
    var tipe = $('#tipe');
    var tahun = $('#tahunkendaraan');
    var tenor = $('#tenor');
    var angsuran = $('#angsuran');
    kecamatan.on('change', function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            url: '/kelurahan/' + id,
            type: 'GET',
            success: function (datax) {
                kelurahan.empty();
                kelurahan.append(
                    '<option selected disabled hidden value=>Pilih Kelurahan');
                var data = datax.replace('"', '');
                kelurahan.append(data.replace('"', ''));
                kelurahan.prop("disabled", false);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            },
        });
    });
    merk.on('change', function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            url: '/tipekendaraan/' + id,
            type: 'GET',
            success: function (datax) {
                tipe.empty();
                tipe.append(
                    '<option selected disabled hidden value=>Pilih Nama Kendaraan');
                var data = datax.replace('"', '');
                tipe.append(data.replace('"', ''));
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            },
        });
    });
    tipe.on('change', function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            url: '/tahunharga/' + id,
            type: 'GET',
            success: function (datax) {
                tahun.empty();
                tahun.append(
                    '<option selected disabled hidden value=>Pilih Tahun Kendaraan');
                var data = datax.replace('"', '');
                tahun.append(data.replace('"', ''));
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            },
        });
    });
    tahun.on('change', function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            url: '/harga/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (datax) {
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
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            },
        });
    });
    pengajuan.on('change', function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            url: '/tenor/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (datax) {
                tenor.empty();
                tenor.append('<option selected disabled hidden value=>Pilih Tenor Kredit');
                tenor.append(datax);
            }
        });
    });
    tenor.on('change', function (e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            url: '/angsuran/' + id,
            type: 'GET',
            dataType: 'json',
            success: function (datax) {
                angsuran.attr("placeholder", "Sedang Mendapatkan Data...");
                setTimeout(function () {
                    angsuran.val(datax);
                }, 3000);
            }
        });
    });
});
function tenor(pinjaman) {
    $("#listtenor").empty();
    $("#listtenor").append(
        '<tr><td class="text-center font-weight-bold" colspan=4><h4>Memuat <i class="fa fa-spinner fa-spin">'
    );
    $('#modaltitle').empty();
    $('#modaltitle').append('Data Tenor Pinjaman Rp. ' + new Intl.NumberFormat('de-DE').format(parseInt(
        pinjaman)));
    $.ajax({
        url: '/tenor/table/' + pinjaman,
        type: 'GET',
        dataType: 'json',
        success: function (datax) {
            setTimeout(function () {
                $("#listtenor").empty();
                $("#listtenor").append(datax);
            }, 1000);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        },
    });
}
function kecamatan(id, kecamatan) {
    $("#listkelurahan").empty();
    $("#listkelurahan").append(
        '<tr><td class="text-center font-weight-bold" colspan=3><h4>Memuat <i class="fa fa-spinner fa-spin">'
    );
    $('#modaltitle').empty();
    $('#modaltitle').append('Data Kelurahan : Kecamatan ' + kecamatan);
    $.ajax({
        url: '/kelurahan/table/' + id,
        type: 'GET',
        dataType: 'json',
        success: function (datax) {
            setTimeout(function () {
                $("#listkelurahan").empty();
                $("#listkelurahan").append(datax);
            }, 1000);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        },
    });
}

function pilihankawin(id) {
    if (id == 1) {
        document.getElementById('pasangan').style.display = 'block';
        document.getElementById('namapasangan').required = true;
        document.getElementById('tanggallahirpasangan').required = true;
        document.getElementById('usiapasangan').required = true;
        document.getElementById('nohppasangan').required = true;

        document.getElementById('penjamin').style.display = 'none';
        document.getElementById('namapenjamin').required = false;
        document.getElementById('tanggallahirpenjamin').required = false;
        document.getElementById('usiapenjamin').required = false;
        document.getElementById('nohppenjamin').required = false;
        document.getElementById('statuspenjamin').required = false;
    } else {
        document.getElementById('pasangan').style.display = 'none';
        document.getElementById('namapasangan').required = false;
        document.getElementById('tanggallahirpasangan').required = false;
        document.getElementById('usiapasangan').required = false;
        document.getElementById('nohppasangan').required = false;

        document.getElementById('penjamin').style.display = 'block';
        document.getElementById('namapenjamin').required = true;
        document.getElementById('tanggallahirpenjamin').required = true;
        document.getElementById('usiapenjamin').required = true;
        document.getElementById('nohppenjamin').required = true;
        document.getElementById('statuspenjamin').required = true;
    }
}

function getAge(dateString, target) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    document.getElementById(target).value = age;
}
