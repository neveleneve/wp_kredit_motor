<?php

namespace App\Http\Controllers;

use App\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KreditController extends Controller
{
    public function index()
    {
        return view('cekkreditur');
    }
    public function nikcheck(Request $data)
    {
        // dd($data->all());
        $datanasabah = Nasabah::where('nik', $data->nik)->get();
        if (count($datanasabah) > 0) {
            return redirect(route('credit-checking-nik', ['id' => $data->nik]));
        } else {
            return redirect(route('credit-check'))->with([
                'value' => $data->nik,
                'alert' => 'NIK tidak ditemukan!',
                'warna' => 'danger',
            ]);
        }
    }
    public function nikchecking($id)
    {
        $datanasabah = Nasabah::where('nik', $id)->get();
        if (count($datanasabah) > 0) {
            $datansb = DB::table('nasabah')
                ->join('master_kredit', 'nasabah.nik', '=', 'master_kredit.nik_nasabah')
                ->join('pengajuan', 'master_kredit.trx_code', '=', 'pengajuan.trx_code')
                ->join('kredit', 'pengajuan.id_kredit', '=', 'kredit.id')
                ->select('nik','nama', 'master_kredit.trx_code', 'master_kredit.created_at', 'pinjaman', 'tenor', 'penilaian')
                ->where('nik', $id)
                ->get();
        } else {
            return redirect(route('credit-check'))->with([
                'alert' => 'NIK tidak ditemukan!',
                'warna' => 'danger',
            ]);
        }
        return view('ceknik', [
            'datanasabah' => $datansb
        ]);
    }
}
