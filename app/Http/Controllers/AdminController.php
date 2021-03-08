<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard.index');
    }

    public function kredit()
    {
        return view('admin.kredit.index');
    }

    public function nasabah()
    {
        return view('admin.nasabah.index');
    }
    public function addnasabah()
    {
        $kelurahan = Kelurahan::orderBy('kelurahan')->get();
        $kecamatan = Kecamatan::orderBy('kecamatan')->get();
        return view('admin.nasabah.add', [
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan
        ]);
    }
    public function ceknasabah(Request $data)
    {
        dd($data->all());
    }

    public function payment()
    {
        return view('admin.payment.index');
    }

    public function setting()
    {
        return view('admin.setting.index');
    }
}
