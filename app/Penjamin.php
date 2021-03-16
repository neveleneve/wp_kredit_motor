<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjamin extends Model
{
    protected $table = 'penjamin';

    protected $fillable = [
        'nik_nasabah',
        'nama',
        'tgl_lahir',
        'no_hp',
        'status_penjamin',
    ];
}
