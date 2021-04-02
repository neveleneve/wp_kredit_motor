<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CSController extends Controller
{
    public function dashboard()
    {
        return view('cs.dashboard.index');
    }

    public function kecamatan()
    {
        return view('cs.kecamatan.index');
    }

    public function nasabah()
    {
        return view('cs.nasabah.index');
    }
    
    public function kredit()
    {
        return view('cs.kredit.index');
    }

    public function kendaraan()
    {
        return view('cs.kendaraan.index');
    }
    
    public function transaksi()
    {
        return view('cs.transaksi.index');
    }

    public function pembayaran()
    {
        return view('cs.pembayaran.index');
    }

    public function setting()
    {
        return view('cs.setting.index');
    }
}
