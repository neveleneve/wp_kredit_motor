<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasangan extends Model
{
    protected $table = 'pasangan';

    protected $fillable = [
        'nik_nasabah',
        'nama',
        'tgl_lahir',
        'no_hp'
    ];
}
