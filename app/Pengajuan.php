<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $fillable = [
        'trx_code', 
        'id_kredit'
    ];
}
