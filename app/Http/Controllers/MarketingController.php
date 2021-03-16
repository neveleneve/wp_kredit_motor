<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use App\Nasabah;
use App\Pasangan;
use App\Penjamin;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    #region DASHBOARD
    public function dashboard()
    {
        return view('admin.dashboard.index');
    }
    #endregion

    #region KREDIT
    public function kredit()
    {
        return view('admin.kredit.index');
    }
    #endregion

    #region NASABAH
    // menampilkan halaman list nasabah
    public function nasabah()
    {
        $datanasabah = Nasabah::get();
        return view('admin.nasabah.index', [
            'data' => $datanasabah
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
        // dd($data->all());
        $namafile = $data->nik;

        $input['ktpname'] =  $namafile . '_ktp.jpg';
        $destinationktp = public_path('/penyimpanan/ktp');

        $input['kepemilikanname'] =  $namafile . '_' . $data->buktikepemilikan . '.jpg';
        $destinationkepemilikan = public_path('/penyimpanan/buktikepemilikan');

        $imgktp = $data->file('fotoktp');
        $imgktp->move($destinationktp, $input['ktpname']);

        $imgkepemilikan = $data->file('fotokepemilikanhunian');
        $imgkepemilikan->move($destinationkepemilikan, $input['kepemilikanname']);


        // mengambil data pemohon ke dalam array variable
        $datapemohon = [
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

        // mengambil data pekerjaan pemohon ke dalam array variable

        // mengambil data rumah hunian pemohon ke dalam array variable

        // mengambil data unit kendaraan pemohon ke dalam array variable

        if ($data->statusperkawinan == 1) {
            Pasangan::insert($datapasangan);
        } else {
            Penjamin::insert($datapenjamin);
        }
        Nasabah::insert($datapemohon);
        return redirect(route('nasabah'));
    }
    #endregion

    #region PAYMENT
    public function payment()
    {
        return view('admin.payment.index');
    }
    #endregion

    #region SETTING
    public function setting()
    {
        return view('admin.setting.index');
    }
    #endregion
}
