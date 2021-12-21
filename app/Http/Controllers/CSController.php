<?php

namespace App\Http\Controllers;

use App\BaseKredit;
use App\Bobot;
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
    #region CUSTOM FUNCTION
    public function __construct()
    {
        $jmltertunda = MasterKredit::where('penilaian', '0')->paginate(3);
        View::share([
            'tertunda' => $jmltertunda
        ]);
    }
    private function vectorS($c, $w, $tipe)
    {
        $s = null;
        for ($i = 0; $i < count($c); $i++) {
            if ($i == 0) {
                if ($tipe[$i] == 0) {
                    $s = number_format(pow($c[$i], $w[$i]), 3, '.', ',');
                } elseif ($tipe[$i] == 1) {
                    $s = number_format(pow($c[$i], (-$w[$i])), 3, '.', ',');
                }
            } else {
                if ($tipe[$i] == 0) {
                    $s = $s *  number_format(pow($c[$i], $w[$i]), 3, '.', ',');
                } elseif ($tipe[$i] == 1) {
                    $s = $s * number_format(pow($c[$i], (-$w[$i])), 3, '.', ',');
                }
            }
        }
        return number_format($s, 3, '.', ',');
    }
    #endregion

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

        $data = Kecamatan::where('id', $id)->get();
        if ($data[0]->status == 1) {
            Kecamatan::where('id', $id)->update([
                'status' => 0
            ]);
            Kelurahan::where('id_kecamatan', $id)->update([
                'status' => 0
            ]);
            return redirect(route('cskecamatan'))->with('alert', 'Data Kecamatan dan Kelurahan berhasil di-non-aktifkan!')->with('warna', 'success');
        } else {
            Kecamatan::where('id', $id)->update([
                'status' => 1
            ]);
            Kelurahan::where('id_kecamatan', $id)->update([
                'status' => 1
            ]);
            return redirect(route('cskecamatan'))->with('alert', 'Data Kecamatan dan Kelurahan berhasil diaktifkan!')->with('warna', 'success');
        }
    }
    public function hapuskelurahan($id)
    {
        $data = Kelurahan::where('id', $id)->get();

        if ($data[0]['status'] == 1) {
            Kelurahan::where('id', $id)->update(['status' => 0]);
            return redirect(route('cskecamatan'))->with('alert', 'Data Kelurahan berhasil dinon-aktifkan!')->with('warna', 'success');
        } elseif ($data[0]['status'] == 0) {
            Kelurahan::where('id', $id)->update(['status' => 1]);
            return redirect(route('cskecamatan'))->with('alert', 'Data Kelurahan berhasil diaktifkan!')->with('warna', 'success');
        }
    }
    public function addkecamatan(Request $data)
    {
        Kecamatan::insert([
            'kecamatan' => $data->kecamatan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect(route('cskecamatan'))->with([
            'alert' => 'Data Kecamatan berhasil ditambah',
            'warna' => 'success'
        ]);
    }
    public function addkelurahan(Request $data)
    {
        Kelurahan::insert([
            'id_kecamatan' => $data->id_kecamatan,
            'kelurahan' => $data->kelurahan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect(route('cskecamatan'))->with([
            'alert' => 'Data Kelurahan berhasil ditambah',
            'warna' => 'success'
        ]);
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
        $data = Kredit::orderBy('pinjaman')->groupBy('pinjaman')->get();
        $basekredit = BaseKredit::orderBy('pinjaman')->get();
        return view('cs.kredit.index', [
            'data' => $data,
            'basekredit' => $basekredit,
            'no' => 1
        ]);
    }
    public function addbasekredit(Request $data)
    {
        // dd($data->all());
        $datapinjaman = $data->pinjaman;
        $data = BaseKredit::where('pinjaman', $datapinjaman)->get();
        if (count($data)  > 0) {
            $warna = 'danger';
            $alert = 'Data Kredit Sudah Tersedia. Silahkan Ulangi!';
        } else {
            BaseKredit::insert([
                'pinjaman' => $datapinjaman,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $warna = 'success';
            $alert = 'Data Kredit Berhasil Ditambahkan!';
        }
        return redirect(route('cskredit'))->with([
            'alert' => $alert,
            'warna' => $warna
        ]);
    }
    public function addkredit(Request $data)
    {
        $pinjam = $data->pinjaman;
        $tenor = $data->tenor;
        $angsuran = $data->angsuran;
        $datakredit = Kredit::where('pinjaman', $pinjam)->where('tenor', $tenor)->get();
        if (count($datakredit) > 0) {
            $warna = 'danger';
            $alert = 'Data Tenor Kredit Sudah Tersedia. Silahkan Ulangi!';
        } else {
            Kredit::insert([
                'pinjaman' => $pinjam,
                'tenor' => $tenor,
                'angsuran' => $angsuran,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $warna = 'success';
            $alert = 'Data Tenor Kredit Berhasil Ditambahkan!';
        }
        return redirect(route('cskredit'))->with([
            'alert' => $alert,
            'warna' => $warna
        ]);
    }
    public function hapustenor($id)
    {
        $data = Kredit::where('id', $id)->get();
        if ($data[0]['status'] == 0) {
            Kredit::where('id', $id)->update([
                'status' => 1
            ]);
            $alert = 'Data Tenor Berhasil Diaktifkan!';
            $warna = 'success';
        } else {
            Kredit::where('id', $id)->update([
                'status' => 0
            ]);
            $alert = 'Data Tenor Berhasil Di-non-aktifkan!';
            $warna = 'success';
        }
        return redirect(route('cskredit'))->with([
            'alert' => $alert,
            'warna' => $warna
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
            ->join('kendaraan', 'master_kredit.trx_code', '=', 'kendaraan.trx_code')
            ->join('tahun_harga_kendaraan', 'kendaraan.id_tahun_harga_kendaraan', '=', 'tahun_harga_kendaraan.id')
            ->join('tipe_kendaraan', 'tahun_harga_kendaraan.id_tipe_kendaraan', '=', 'tipe_kendaraan.id')
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
                'kredit.angsuran',
                'tipe_kendaraan.tipe',
                'kendaraan.nopol',
                'kendaraan.tgl_pajak',
                'kendaraan.tgl_stnk',
                'tahun_harga_kendaraan.harga_otr'
            )
            ->where('master_kredit.trx_code', $id)
            ->get();
        return view('cs.transaksi.verifikasi', [
            'data' => $data
        ]);
    }
    public function verification(Request $data)
    {
        $bobot = Bobot::get();
        $totalbobot = Bobot::sum('bobot');
        $s = 0;
        $c = [
            0 => $data->nilaipekerjaan,
            1 => $data->nilaipenghasilan,
            2 => $data->nilaikepemilikanrumah,
            3 => $data->nilaitipekendaraan
        ];
        $w = [];
        $tipe = [];
        for ($i = 0; $i < count($bobot); $i++) {
            array_push($w, number_format($bobot[$i]['bobot'] / $totalbobot, 3, '.', ','));
            array_push($tipe, $bobot[$i]['tipe']);
        }
        $s = $this->vectorS($c, $w, $tipe);
        MasterKredit::where('trx_code', $data->trx_code)->update([
            'penilaian' => $s
        ]);
        return redirect(route('cstransaksi'));
    }
    #endregion

    #region SETTING
    public function setting()
    {
        return view('cs.setting.index');
    }
    #endregion
}
