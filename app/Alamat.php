<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'alamat';

    protected $fillable = [
        'nik_nasabah', 
        'alamat',
        'kelurahan',
        'lama_tinggal'
    ];
}
