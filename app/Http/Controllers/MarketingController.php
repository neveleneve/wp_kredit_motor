<?php

namespace App\Http\Controllers;

use App\Alamat;
use App\Hunian;
use App\Kecamatan;
use App\Kelurahan;
use App\Kendaraan;
use App\MasterKredit;
use App\Merk;
use App\Nasabah;
use App\Pasangan;
use App\Pekerjaan;
use App\Pengajuan;
use App\Penjamin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class MarketingController extends Controller
{
    #region CUSTOM FUNCTION
    private function addImagePemohon($nama, $storage, $img)
    {
        $destination = public_path($storage);
        $img->move($destination, $nama);
    }
    private function randomstringlah()
    {
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 15);
        return $randomString;
    }
    #endregion

    #region DASHBOARD
    public function dashboard()
    {
        $jumlahnasabah = Nasabah::count();
        $jumlahkredit = MasterKredit::count();
        $datax = [
            'jmlnsb' => $jumlahnasabah,
            'jmlkrd' => $jumlahkredit
        ];

        return view('marketing.dashboard.index', [
            'data' => $datax
        ]);
    }
    #endregion

    #region NASABAH
    // menampilkan halaman list nasabah
    public function nasabah()
    {
        $q = Input::get('s');
        if ($q == null || $q == '') {
            $datanasabah = Nasabah::where('id_marketing', Auth::user()->id)->get();
        } else {
            $datanasabah = Nasabah::where('id_marketing', Auth::user()->id)->where('nik', 'like', '%' . $q . '%')->orWhere('nama', 'like', '%' . $q . '%')->get();
        }
        return view('marketing.nasabah.index', [
            'data' => $datanasabah,
            'search' => $q
        ]);
    }
    // menampilkan halaman form tambah nasabah
    public function addnasabah()
    {
        $kelurahan = Kelurahan::orderBy('kelurahan')->get();
        $kecamatan = Kecamatan::orderBy('kecamatan')->get();
        $merk = Merk::orderBy('merk')->get();
        return view('marketing.nasabah.add', [
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'merk' => $merk,
        ]);
    }
    // proses add nasabah
    public function ceknasabah(Request $data)
    {
        $kodetrx = $this->randomstringlah();
        $nik = $data->nik;
        $tanggal = date('dMYHis');
        // $this->addImagePemohon($nik . '_ktp_' . $tanggal . '.jpg', '/penyimpanan/ktp', $data->file('fotoktp'));
        // $this->addImagePemohon($nik . '_kk_' . $tanggal . '.jpg', '/penyimpanan/kk', $data->file('fotokk'));
        // $this->addImagePemohon($nik . '_' . $data->buktikepemilikan . '_' . $tanggal . '.jpg', '/penyimpanan/buktikepemilikan', $data->file('fotokepemilikanhunian'));
        // $this->addImagePemohon($nik . '_bpkb_' . $tanggal . '.jpg', '/penyimpanan/bpkb', $data->file('fotobpkb'));
        // $this->addImagePemohon($nik . '_' . $data->nopol . '_stnk_' . $tanggal . '.jpg', '/penyimpanan/stnk', $data->file('fotostnk'));

        // mengambil data pemohon ke dalam array variable
        $datapemohon = [
            'id_marketing' => $data->id_marketing,
            'nik' => $nik,
            'nama' => $data->nama,
            'jenis_kelamin' => $data->jeniskelamin,
            'status_nikah' => $data->statusperkawinan,
            'tmpt_lahir' => $data->tempatlahir,
            'tgl_lahir' => $data->tanggallahir,
            'no_hp' => $data->nohp
        ];
        // mengambil data pasangan pemohon ke dalam array variable
        $datapasangan = [
            'nik_nasabah' => $nik,
            'nama' => $data->namapasangan,
            'tgl_lahir' => $data->tanggallahirpasangan,
            'no_hp' => $data->nohppasangan
        ];
        // mengambil data penjamin pemohon ke dalam array variable
        $datapenjamin = [
            'nik_nasabah' => $nik,
            'nama' => $data->namapenjamin,
            'tgl_lahir' => $data->tanggallahirpenjamin,
            'no_hp' => $data->nohppenjamin,
            'status_penjamin' => $data->statuspenjamin,
        ];
        // mengambil data alamat pemohon ke dalam array variable
        $dataalamat = [
            'nik_nasabah' => $nik,
            'alamat' => $data->alamat,
            'kelurahan' => $data->kelurahan,
            'lama_tinggal' => $data->lamatinggal,
        ];
        // mengambil data pekerjaan pemohon ke dalam array variable
        $datapekerjaan = [
            'nik_nasabah' => $nik,
            'jenis_kerja' => $data->jenispekerjaan,
            'desk_kerja' => $data->pekerjaan,
            'penghasilan' => $data->penghasilan,
            'pengeluaran' => $data->pengeluaran,
            'alamat_kerja' => $data->alamatkerja,
        ];
        // mengambil data rumah hunian pemohon ke dalam array variable
        $datahunian = [
            'nik_nasabah' => $nik,
            'status_kepemilikan' => $data->statuskepemilikan,
            'bukti_kepemilikan' => $data->buktikepemilikan,
        ];
        // mengambil data unit kendaraan pemohon ke dalam array variable
        $datakendaraan = [
            'trx_code' => $kodetrx,
            'id_tahun_kendaraan' => $data->tahunkendaraan,
            'nopol' => $data->nopol,
            'tgl_pajak' => $data->masaberlakupajak,
            'tgl_stnk' => $data->masaberlakustnk,
        ];
        $datapengajuan = [
            'trx_code' => $kodetrx,
            'id_kredit' => $data->tenor
        ];
        $datamasterkredit = [
            'id_marketing' => $data->id_marketing,
            'trx_code' => $kodetrx,
            'nik_nasabah' => $nik,
            'penilaian' => '0'
        ];
        if ($data->statusperkawinan == 1) {
            Pasangan::insert($datapasangan);
        } else {
            Penjamin::insert($datapenjamin);
        }
        Nasabah::insert($datapemohon);
        MasterKredit:: insert($datamasterkredit);
        Pengajuan:: insert($datapengajuan);
        Kendaraan:: insert($datakendaraan);
        Hunian:: insert($datahunian);
        Pekerjaan:: insert($datapekerjaan);
        Alamat:: insert($dataalamat);
        return redirect(route('nasabah'));
    }
    #endregion

    #region SETTING
    public function setting()
    {
        return view('marketing.setting.index');
    }
    #endregion
}
