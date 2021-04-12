<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use App\Kredit;
use App\MasterKredit;
use App\Merk;
use App\Nasabah;
use App\Pengajuan;
use App\TipeKendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class CSController extends Controller
{
    public function __construct()
    {
        $jmltertunda = MasterKredit::where('penilaian', '0')->paginate(3);
        View::share([
            'tertunda' => $jmltertunda
        ]);
    }
    #region DASHBOARD
    public function dashboard()
    {
        $jumlahnasabah = Nasabah::count();
        $pengajuantahunan = MasterKredit::where('penilaian', '!=', '0')->whereYear('created_at', date('Y'))->count();
        $pengajuanbulanan = MasterKredit::where('penilaian', '!=', '0')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $pengajuantunda = MasterKredit::where('penilaian', '0')->count();
        $data = [
            'jmlnasabah' => $jumlahnasabah,
            'jmlpengajuanthn' => $pengajuantahunan,
            'jmlpengajuanbln' => $pengajuanbulanan,
            'jmlpengajuantunda' => $pengajuantunda
        ];
        return view('cs.dashboard.index', [
            'data' => $data
        ]);
    }
    #endregion

    #region DAERAH
    public function kecamatan()
    {
        $kecamatan = Kecamatan::get();
        return view('cs.kecamatan.index', [
            'kecamatan' => $kecamatan,
            'no' => 1
        ]);
    }
    public function hapuskecamatan($id)
    {
        Kecamatan::where('id', $id)->delete();
        Kelurahan::where('id_kecamatan', $id)->delete();
        return redirect(route('cskecamatan'))->with('alert', 'Data Kecamatan berhasil dihapus!')->with('warna', 'success');
    }
    public function hapuskelurahan($id)
    {
        // Kelurahan::where('id', $id)->delete();
        return redirect(route('cskecamatan'))->with('alert', 'Data Kelurahan berhasil dihapus!')->with('warna', 'success');
    }
    #endregion

    #region NASABAH
    public function nasabah()
    {
        $q = Input::get('s');
        if ($q == null || $q == '') {
            $nasabah = Nasabah::get();
        } else {
            $nasabah = Nasabah::where('nik', 'like', '%' . $q . '%')->orWhere('nama', 'like', '%' . $q . '%')->get();
        }

        return view('cs.nasabah.index', [
            'nasabah' => $nasabah,
            'no' => 1,
            'search' => $q
        ]);
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
        return view('cs.nasabah.view_data', [
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
            return redirect(route('csnasabah'))->with('alert', 'Transaksi tidak tersedia. NIK Nasabah tidak terdaftar!')->with('warna', 'info');
        } else {
            return view('cs.nasabah.view_transaction', [
                'data' => $datamaster,
                'datanasabah' => $niknasabah,
                'no' => 1
            ]);
        }
    }

    #endregion

    #region KREDIT
    public function kredit()
    {
        $data = Kredit::groupBy('pinjaman')->get();
        return view('cs.kredit.index', [
            'data' => $data,
            'no' => 1
        ]);
    }
    #endregion

    #region KENDARAAN
    public function kendaraan()
    {
        $merk = Merk::get();
        $tipe = TipeKendaraan::get();
        return view('cs.kendaraan.index', [
            'merk' => $merk,
            'tipe' => $tipe,
            'nomerk' => 1,
            'notipe' => 1
        ]);
    }
    #endregion

    #region PENGAJUAN
    public function transaksi()
    {
        $pengajuanall = MasterKredit::where('penilaian', '!=', '0')->get();
        $pengajuan = MasterKredit::where('penilaian', '0')->get();
        return view('cs.transaksi.index', [
            'pengajuanall' => $pengajuanall,
            'nopengajuanall' => 1,
            'pengajuan' => $pengajuan,
            'nopengajuan' => 1,
        ]);
    }
    public function verifikasitransaksi($id)
    {
        $data = DB::table('master_kredit')
            ->join('nasabah', 'master_kredit.nik_nasabah', '=', 'nasabah.nik')
            ->join('pekerjaan', 'nasabah.nik', '=', 'pekerjaan.nik_nasabah')
            ->join('hunian', 'nasabah.nik', '=', 'pekerjaan.nik_nasabah')
            ->join('pengajuan', 'master_kredit.trx_code', '=', 'pengajuan.trx_code')
            ->join('kredit', 'pengajuan.id_kredit', '=', 'kredit.id')
            ->select(
                'master_kredit.trx_code',
                'master_kredit.nik_nasabah',
                'pekerjaan.jenis_kerja',
                'pekerjaan.desk_kerja',
                'pekerjaan.pengeluaran',
                'pekerjaan.penghasilan',
                'hunian.status_kepemilikan',
                'hunian.bukti_kepemilikan',
                'kredit.pinjaman',
                'kredit.tenor',
                'kredit.angsuran'
            )
            ->where('master_kredit.trx_code', $id)
            ->get();
        return view('cs.transaksi.verifikasi', [
            'data' => $data
        ]);
    }
    #endregion

    #region SETTING
    public function setting()
    {
        return view('cs.setting.index');
    }
    #endregion
}
