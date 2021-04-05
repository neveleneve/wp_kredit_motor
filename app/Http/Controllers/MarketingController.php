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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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

    public function generateDataPemohon($data, $tanggal, $nik)
    {
        $datapemohon = [
            'id_marketing' => $data->id_marketing,
            'nik' => $nik,
            'nama' => $data->nama,
            'jenis_kelamin' => $data->jeniskelamin,
            'status_nikah' => $data->statusperkawinan,
            'tmpt_lahir' => $data->tempatlahir,
            'tgl_lahir' => $data->tanggallahir,
            'no_hp' => $data->nohp,
            'created_at' => $tanggal,
            'updated_at' => $tanggal
        ];
        $datapasangan = [
            'nik_nasabah' => $nik,
            'nama' => $data->namapasangan,
            'tgl_lahir' => $data->tanggallahirpasangan,
            'no_hp' => $data->nohppasangan,
            'created_at' => $tanggal,
            'updated_at' => $tanggal
        ];
        $datapenjamin = [
            'nik_nasabah' => $nik,
            'nama' => $data->namapenjamin,
            'tgl_lahir' => $data->tanggallahirpenjamin,
            'no_hp' => $data->nohppenjamin,
            'status_penjamin' => $data->statuspenjamin,
            'created_at' => $tanggal,
            'updated_at' => $tanggal
        ];
        $dataalamat = [
            'nik_nasabah' => $nik,
            'alamat' => $data->alamat,
            'kelurahan' => $data->kelurahan,
            'lama_tinggal' => $data->lamatinggal,
            'created_at' => $tanggal,
            'updated_at' => $tanggal
        ];
        $datapekerjaan = [
            'nik_nasabah' => $nik,
            'jenis_kerja' => $data->jenispekerjaan,
            'desk_kerja' => $data->pekerjaan,
            'penghasilan' => $data->penghasilan,
            'pengeluaran' => $data->pengeluaran,
            'alamat_kerja' => $data->alamatkerja,
            'created_at' => $tanggal,
            'updated_at' => $tanggal
        ];
        $datahunian = [
            'nik_nasabah' => $nik,
            'status_kepemilikan' => $data->statuskepemilikan,
            'bukti_kepemilikan' => $data->buktikepemilikan,
            'created_at' => $tanggal,
            'updated_at' => $tanggal
        ];
        $datax = [
            'datapemohon' => $datapemohon,
            'datapasangan' => $datapasangan,
            'datapenjamin' => $datapenjamin,
            'dataalamat' => $dataalamat,
            'datapekerjaan' => $datapekerjaan,
            'datahunian' => $datahunian,
        ];
        return $datax;
    }

    private function generateDataPengajuan($data, $kodetrx, $tanggal, $nik)
    {
        $datakendaraan = [
            'trx_code' => $kodetrx,
            'id_tahun_harga_kendaraan' => $data->tahunkendaraan,
            'nopol' => $data->nopol,
            'tgl_pajak' => $data->masaberlakupajak,
            'tgl_stnk' => $data->masaberlakustnk,
            'created_at' => $tanggal,
            'updated_at' => $tanggal
        ];
        $datapengajuan = [
            'trx_code' => $kodetrx,
            'id_kredit' => $data->tenor,
            'created_at' => $tanggal,
            'updated_at' => $tanggal
        ];
        $datamasterkredit = [
            'id_marketing' => $data->id_marketing,
            'trx_code' => $kodetrx,
            'nik_nasabah' => $nik,
            'penilaian' => '0',
            'created_at' => $tanggal,
            'updated_at' => $tanggal
        ];
        $datax = [
            'datakendaraan' => $datakendaraan,
            'datapengajuan' => $datapengajuan,
            'datamasterkredit' => $datamasterkredit
        ];
        return $datax;
    }

    private function cekPengajuanTerkahir($nik)
    {
        $datapengajuan = MasterKredit::where('nik_nasabah', $nik)->orderBy('created_at', 'asc')->get();
        $tglpengajuanterakhir = strtotime($datapengajuan[0]->created_at);
        $tglhariini = strtotime(date('Y-m-d H:i:s'));
        $diff = abs($tglhariini - $tglpengajuanterakhir);
        $tahun = floor($diff / (365 * 60 * 60 * 24));
        $bulan = floor(($diff - $tahun * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        return $bulan;
    }
    #endregion

    #region DASHBOARD
    public function dashboard()
    {
        $jumlahnasabah = Nasabah::where('id_marketing', Auth::user()->id)->count();
        $jumlahkredit = MasterKredit::where('id_marketing', Auth::user()->id)->where('penilaian', '!=', '0')->count();
        $targetbulanan = MasterKredit::where('id_marketing', Auth::user()->id)->where('penilaian', '!=', '0')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $kreditpending = MasterKredit::where('id_marketing', Auth::user()->id)->where('penilaian', '=', '0')->count();
        $datax = [
            'jmlnsb' => $jumlahnasabah,
            'jmlkrd' => $jumlahkredit,
            'jmltarget' => $targetbulanan,
            'jmlpending' => $kreditpending,
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
        $tanggal = date('Y-m-d H:i:s');
        $ceknik = Nasabah::where('nik', $nik)->count();
        $pengajuan = $this->generateDataPengajuan($data, $kodetrx, $tanggal, $nik);
        $pemohon = $this->generateDataPemohon($data, $tanggal, $nik);
        if ($data->has('pengajuan')) {
            $bulan = $this->cekPengajuanTerkahir($nik);
            if ($bulan >= 3) {
                $this->addImagePemohon($kodetrx . '_bpkb.jpg', '/penyimpanan/bpkb', $data->file('fotobpkb'));
                $this->addImagePemohon($kodetrx . '_stnk.jpg', '/penyimpanan/stnk', $data->file('fotostnk'));
                MasterKredit::insert($pengajuan['datamasterkredit']);
                Pengajuan::insert($pengajuan['datapengajuan']);
                Kendaraan::insert($pengajuan['datakendaraan']);
                return redirect(route('transaksinasabah', ['id' => $nik]))->with('alert', 'Data Pengajuan Berhasil Ditambah!')->with('warna', 'success');
            } else {
                return redirect(route('transaksinasabah', ['id' => $nik]))->with('alert', 'Data Pengajuan Gagal Ditambah! Pengajuan sebelumnya belum mencapai 3 Bulan')->with('warna', 'success');
            }
        } else if ($data->has('tambahnasabah')) {
            if ($ceknik > 0) {
                return redirect(route('nasabah'))->with('alert', 'Data Nasabah Sudah Ada!!!')->with('warna', 'danger');
            } else {
                $this->addImagePemohon($nik . '_ktp.jpg', '/penyimpanan/ktp', $data->file('fotoktp'));
                $this->addImagePemohon($nik . '_kk.jpg', '/penyimpanan/kk', $data->file('fotokk'));
                $this->addImagePemohon($nik . '_' . $data->buktikepemilikan . '.jpg', '/penyimpanan/buktikepemilikan', $data->file('fotokepemilikanhunian'));
                $this->addImagePemohon($kodetrx . '_bpkb.jpg', '/penyimpanan/bpkb', $data->file('fotobpkb'));
                $this->addImagePemohon($kodetrx . '_stnk.jpg', '/penyimpanan/stnk', $data->file('fotostnk'));
                if ($data->statusperkawinan == 1) {
                    Pasangan::insert($pemohon['datapasangan']);
                } else {
                    Penjamin::insert($pemohon['datapenjamin']);
                }
                Nasabah::insert($pemohon['datapemohon']);
                Hunian::insert($pemohon['datahunian']);
                Pekerjaan::insert($pemohon['datapekerjaan']);
                Alamat::insert($pemohon['dataalamat']);
                MasterKredit::insert($pengajuan['datamasterkredit']);
                Pengajuan::insert($pengajuan['datapengajuan']);
                Kendaraan::insert($pengajuan['datakendaraan']);
                return redirect(route('nasabah'))->with('alert', 'Data Nasabah Berhasil Di Input!')->with('warna', 'success');
            }
        }
    }

    public function viewnasabah($id)
    {
        $statusnikah = Nasabah::where('nik', $id)->get();
        if ($statusnikah[0]['status_nikah'] == 1) {
            $datanasabah = DB::table('nasabah')
                ->join('alamat', 'nasabah.nik', '=', 'alamat.nik_nasabah')
                ->join('kelurahan', 'alamat.kelurahan', '=', 'kelurahan.id')
                ->join('kecamatan', 'kelurahan.id_kecamatan', '=', 'kecamatan.id')
                ->join('pasangan', 'nasabah.nik', '=', 'pasangan.nik_nasabah')
                ->join('pekerjaan', 'nasabah.nik', '=', 'pekerjaan.nik_nasabah')
                ->join('hunian', 'nasabah.nik', '=', 'hunian.nik_nasabah')
                ->select(
                    'nasabah.nama as nama',
                    'nasabah.nik',
                    'nasabah.no_hp',
                    'nasabah.jenis_kelamin',
                    'nasabah.tmpt_lahir',
                    'nasabah.tgl_lahir',
                    'nasabah.status_nikah',
                    'alamat.alamat',
                    'alamat.lama_tinggal',
                    'kelurahan.kelurahan',
                    'kecamatan.kecamatan',
                    'pasangan.nama as namapasangan',
                    'pasangan.tgl_lahir as tgllahirpasangan',
                    'pasangan.no_hp as nohppasangan',
                    'pekerjaan.jenis_kerja',
                    'pekerjaan.desk_kerja',
                    'pekerjaan.penghasilan',
                    'pekerjaan.pengeluaran',
                    'pekerjaan.alamat_kerja',
                    'hunian.status_kepemilikan',
                    'hunian.bukti_kepemilikan'
                )
                ->where('nasabah.nik', $id)
                ->get();
        } else {
            $datanasabah = DB::table('nasabah')
                ->join('alamat', 'nasabah.nik', '=', 'alamat.nik_nasabah')
                ->join('kelurahan', 'alamat.kelurahan', '=', 'kelurahan.id')
                ->join('kecamatan', 'kelurahan.id_kecamatan', '=', 'kecamatan.id')
                ->join('penjamin', 'nasabah.nik', '=', 'penjamin.nik_nasabah')
                ->join('pekerjaan', 'nasabah.nik', '=', 'pekerjaan.nik_nasabah')
                ->join('hunian', 'nasabah.nik', '=', 'hunian.nik_nasabah')
                ->select(
                    'nasabah.nama',
                    'nasabah.nik',
                    'nasabah.no_hp',
                    'nasabah.jenis_kelamin',
                    'nasabah.tmpt_lahir',
                    'nasabah.tgl_lahir',
                    'nasabah.status_nikah',
                    'alamat.alamat',
                    'alamat.lama_tinggal',
                    'kelurahan.kelurahan',
                    'kecamatan.kecamatan',
                    'penjamin.nama as namapenjamin',
                    'penjamin.tgl_lahir as tgllahirpenjamin',
                    'penjamin.no_hp as nohppenjamin',
                    'penjamin.status_penjamin as statuspenjamin',
                    'pekerjaan.jenis_kerja',
                    'pekerjaan.desk_kerja',
                    'pekerjaan.penghasilan',
                    'pekerjaan.pengeluaran',
                    'pekerjaan.alamat_kerja',
                    'hunian.status_kepemilikan',
                    'hunian.bukti_kepemilikan'
                )
                ->where('nasabah.nik', $id)
                ->get();
        }
        return view('marketing.nasabah.view_data', [
            'datanasabah' => $datanasabah
        ]);
    }

    public function transaksinasabah($id)
    {
        $niknasabah = Nasabah::where('nik', $id)->get(['nik', 'nama']);
        $datamaster = DB::table('master_kredit')
            ->join('pengajuan', 'master_kredit.trx_code', '=', 'pengajuan.trx_code')
            ->join('kredit', 'pengajuan.id_kredit', '=', 'kredit.id')
            ->select(
                'master_kredit.trx_code',
                'master_kredit.penilaian',
                'master_kredit.created_at',
                'kredit.tenor',
                'kredit.pinjaman',
                'kredit.angsuran'
            )
            ->where('master_kredit.nik_nasabah', $id)
            ->get();
        if (count($niknasabah) == 0) {
            return redirect(route('nasabah'))->with('alert', 'Transaksi tidak tersedia. NIK Nasabah tidak terdaftar!')->with('warna', 'info');
        } else {
            return view('marketing.nasabah.view_transaction', [
                'data' => $datamaster,
                'datanasabah' => $niknasabah,
                'no' => 1
            ]);
        }
    }

    public function pengajuannasabah($id)
    {
        $merk = Merk::get();
        return view('marketing.nasabah.pengajuan', [
            'nik' => $id,
            'merk' => $merk
        ]);
    }

    public function hapuspengajuan($id)
    {
        $niknasabah = MasterKredit::where('trx_code', $id)->get()[0]['nik_nasabah'];
        $penilaian = MasterKredit::where('trx_code', $id)->get()[0]['penilaian'];
        if ($penilaian != 0) {
            return redirect(route('transaksinasabah', ['id' => $niknasabah]))->with('alert', 'Data pengajuan tidak dapat dihapus karena sudah di verifikasi')->with('warna', 'danger');
        } else {
            MasterKredit::where('trx_code', $id)->delete();
            Pengajuan::where('trx_code', $id)->delete();
            Kendaraan::where('trx_code', $id)->delete();
            File::delete(public_path('/penyimpanan/bpkb/' . $id . '_bpkb.jpg'));
            File::delete(public_path('/penyimpanan/stnk/' . $id . '_stnk.jpg'));
            return redirect(route('transaksinasabah', ['id' => $niknasabah]))->with('alert', 'Data pengajuan berhasil dihapus!')->with('warna', 'info');
        }
    }
    #endregion

    #region SETTING
    public function setting()
    {
        return view('marketing.setting.index');
    }
    #endregion
}
