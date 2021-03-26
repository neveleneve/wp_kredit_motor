<?php

namespace App\Http\Controllers;

use App\Kelurahan;
use App\Kredit;
use App\TahunHarga;
use App\TipeKendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataController extends Controller
{
    public function kelurahan($id)
    {
        $data = null;
        $kelurahan = Kelurahan::where('id_kecamatan', $id)->get();
        foreach ($kelurahan as $key) {
            $data .= "<option value=" . $key->id . ">" . $key->kelurahan;
        }
        return json_encode($data);
    }
    public function tipekendaraan($id)
    {
        $data = null;
        $tipe = TipeKendaraan::where('id_merk', $id)->get();
        foreach ($tipe as $key) {
            $data .= "<option value=" . $key->id . ">" . $key->tipe;
        }
        return json_encode($data);
    }
    public function tahunharga($id)
    {
        $data = null;
        $tahun = null;
        $tahunharga = TahunHarga::where('id_tipe_kendaraan', $id)->get();
        foreach ($tahunharga as $key) {
            $data .= "<option value=" . $key->id . ">" . $key->tahun;
        }
        return json_encode($data);
    }
    public function harga($id)
    {
        $data = null;
        $datakredit = null;
        $tahunharga = TahunHarga::where('id', $id)->get();
        $hargaotr = $tahunharga[0]['harga_otr'];
        $pencairan = $tahunharga[0]['maks_pencairan'];
        if ($pencairan >= '10000000') {
            $pencairan = '10000000';
            $kredit = Kredit::where('pinjaman', '<=', $pencairan)->groupBy('pinjaman')->get();
        } else {
            $kredit = Kredit::where('pinjaman', '<=', $pencairan)->groupBy('pinjaman')->get();
        }
        foreach ($kredit as $key) {
            $datakredit .= "<option value=" . $key->pinjaman . ">Rp. " . number_format($key->pinjaman, 0, ',', '.');
        }
        $data = [
            'otr' => $hargaotr,
            'cair' => $pencairan,
            'kredit' => $datakredit,
        ];
        return json_encode($data);
    }
    public function tenor($id)
    {
        $data = null;
        $tenor = Kredit::where('pinjaman', $id)->get();
        foreach ($tenor as $key) {
            $data .= "<option value=" . $key->id . ">" . $key->tenor . " Bulan";
        }
        return json_encode($data);
    }

    public function angsuran($id)
    {
        $data = null;
        $angsuran = Kredit::where('id', $id)->get('angsuran');
        $data = 'Rp. ' . number_format($angsuran[0]['angsuran'], 0, ',', '.');
        return json_encode($data);
    }
    public function sidebar()
    {
        if (Session::has('sidebarState')) {
            Session::remove('sidebarState');
        } else {
            Session::put('sidebarState', 'toggled');
        }
    }
}
