<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';

    protected $fillable = [
        'trx_code', 
        'id_tahun_harga_kendaraan',
        'nopol', 
        'tgl_pajak', 
        'tgl_stnk'
    ];
}
