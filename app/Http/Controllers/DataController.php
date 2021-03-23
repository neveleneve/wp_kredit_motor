<?php

namespace App\Http\Controllers;

use App\Kelurahan;
use App\TahunHarga;
use App\TipeKendaraan;
use Illuminate\Http\Request;

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
            if ($key->tahun == 0) {
                $tahun = '-';
            } else {
                $tahun = $key->tahun;
            }
            $data .= "<option value=" . $key->id . ">" . $tahun;
        }
        return json_encode($data);
    }
    public function harga($id)
    {
        $data = null;
        $tahunharga = TahunHarga::where('id', $id)->get();
        $hargaotr = $tahunharga[0]['harga_otr'];
        $pencairan = $tahunharga[0]['maks_pencairan'];
        if ($pencairan >= '10000000') {
            $pencairan = '10000000';
        }
        $data = [
            'otr' => $hargaotr,
            'cair' => $pencairan,
        ];
        return json_encode($data);
    }
}
