<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunHarga extends Model
{
    protected $table = 'tahun_harga_kendaraan';

    protected $fillable = [
        'id_tipe_kendaraan', 
        'tahun',
        'harga_otr',
        'maks_pencairan'
    ];
}
