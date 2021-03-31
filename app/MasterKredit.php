<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterKredit extends Model
{
    protected $table = 'master_kredit';
    
    protected $fillable = [
        'id_marketing', 
        'trx_code', 
        'nik_nasabah', 
        'penilaian'
    ];
}
