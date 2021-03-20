<?php

namespace App\Http\Controllers;

use App\Kelurahan;
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
}
