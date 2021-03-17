<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $table = "nasabah";

    protected $fillable = [
        'id_marketing',
        'nik',
        'nama',
        'jenis_kelamin',
        'status_nikah',
        'tmpt_lahir',
        'tgl_lahir',
        'no_hp',
    ];
}
