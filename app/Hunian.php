<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hunian extends Model
{
    protected $table = 'hunian';

    protected $fillable = [
        'nik_nasabah', 
        'status_kepemilikan',
        'bukti_kepemilikan'
    ];
}
