<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use App\MasterKredit;
use App\Nasabah;
use App\Pasangan;
use App\Penjamin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MarketingController extends Controller
{
    #region DASHBOARD
    public function dashboard()
    {
        $jumlahnasabah = Nasabah::count();
        $jumlahkredit = MasterKredit::count();

        $datax = [
            'jmlnsb' => $jumlahnasabah,
            'jmlkrd' => $jumlahkredit
        ];

        return view('admin.dashboard.index', [
            'data' => $datax
        ]);
    }
    #endregion

    #region NASABAH
    // menampilkan halaman list nasabah
    public function nasabah()
    {
        $q = Input::get('q');

        if ($q == null || $q == '') {
            $datanasabah = Nasabah::where('id_marketing', Auth::user()->id)->get();
        } else {
            $datanasabah = Nasabah::where('id_marketing', Auth::user()->id)->where('nik', 'like', '%' . $q . '%')->orWhere('nama', 'like', '%' . $q . '%')->get();
        }
        return view('admin.nasabah.index', [
            'data' => $datanasabah,
            'search' => $q
        ]);
    }
    // menampilkan halaman form tambah nasabah
    public function addnasabah()
    {
        $kelurahan = Kelurahan::orderBy('kelurahan')->get();
        $kecamatan = Kecamatan::orderBy('kecamatan')->get();
        return view('admin.nasabah.add', [
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan
        ]);
    }
    // proses add nasabah
    public function ceknasabah(Request $data)
    {
        // pemberian nama file menggunakan nomot NIK
        $namafile = $data->nik;

        // mengambil data gambar ktp, mengubah namanya, lalu mengatur lokasi simpan
        $input['ktpname'] =  $namafile . '_ktp.jpg';
        $destinationktp = public_path('/penyimpanan/ktp');
        // mengambil data gambar kk, mengubah namanya, lalu mengatur lokasi simpan
        $input['kkname'] =  $namafile . '_kk.jpg';
        $destinationkk = public_path('/penyimpanan/kk');
        // mengambil data gambar kepemilikan rumah, mengubah namanya, lalu mengatur lokasi simpan
        $input['kepemilikanname'] =  $namafile . '_' . $data->buktikepemilikan . '.jpg';
        $destinationkepemilikan = public_path('/penyimpanan/buktikepemilikan');
        // mengambil data gambar bpkb, mengubah namanya, lalu mengatur lokasi simpan
        $input['bpkbname'] =  $namafile . '_bpkb.jpg';
        $destinationbpkb = public_path('/penyimpanan/bpkb');
        // mengambil data gambar kepemilikan rumah, mengubah namanya, lalu mengatur lokasi simpan
        $input['stnkname'] =  $namafile . '_' . $data->nopol . '_stnk.jpg';
        $destinationstnk = public_path('/penyimpanan/stnk');

        // proses penyimpanan file foto ktp
        $imgktp = $data->file('fotoktp');
        $imgktp->move($destinationktp, $input['ktpname']);
        // proses penyimpanan file foto kk
        $imgkk = $data->file('fotokk');
        $imgkk->move($destinationkk, $input['kkname']);
        // proses penyimpanan file foto kepemilikan rumah
        $imgkepemilikan = $data->file('fotokepemilikanhunian');
        $imgkepemilikan->move($destinationkepemilikan, $input['kepemilikanname']);
        // proses penyimpanan file foto bpkb
        $imgbpkb = $data->file('fotobpkb');
        $imgbpkb->move($destinationbpkb, $input['bpkbname']);
        // proses penyimpanan file foto stnk
        $imgstnk = $data->file('fotostnk');
        $imgstnk->move($destinationstnk, $input['stnkname']);

        // mengambil data pemohon ke dalam array variable
        $datapemohon = [
            "id_marketing" => $data->id_marketing,
            "nik" => $data->nik,
            "nama" => $data->nama,
            "jenis_kelamin" => $data->jeniskelamin,
            "status_nikah" => $data->statusperkawinan,
            "tmpt_lahir" => $data->tempatlahir,
            "tgl_lahir" => $data->tanggallahir,
            "no_hp" => $data->nohp
        ];
        // mengambil data pasangan pemohon ke dalam array variable
        $datapasangan = [
            'nik_nasabah' => $data->nik,
            'nama' => $data->namapasangan,
            'tgl_lahir' => $data->tanggallahirpasangan,
            'no_hp' => $data->nohppasangan
        ];
        // mengambil data penjamin pemohon ke dalam array variable
        $datapenjamin = [
            'nik_nasabah' => $data->nik,
            'nama' => $data->namapenjamin,
            'tgl_lahir' => $data->tanggallahirpenjamin,
            'no_hp' => $data->nohppenjamin,
            'status_penjamin' => $data->statuspenjamin,
        ];
        // mengambil data alamat pemohon ke dalam array variable
        $dataalamat = [];
        // mengambil data pekerjaan pemohon ke dalam array variable
        $datapekerjaan = [];
        // mengambil data rumah hunian pemohon ke dalam array variable
        $datahunian = [];
        // mengambil data unit kendaraan pemohon ke dalam array variable
        $datakendaraan = [];

        if ($data->statusperkawinan == 1) {
            Pasangan::insert($datapasangan);
        } else {
            Penjamin::insert($datapenjamin);
        }
        Nasabah::insert($datapemohon);
        return redirect(route('nasabah'));
    }
    #endregion

    #region SETTING
    public function setting()
    {
        return view('admin.setting.index');
    }
    #endregion
}
