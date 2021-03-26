<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'pekerjaan';

    protected $fillable = [
        'nik_nasabah',
        'jenis_kerja',
        'desk_kerja',
        'penghasilan',
        'pengeluaran',
        'alamat_kerja'
    ];
}
