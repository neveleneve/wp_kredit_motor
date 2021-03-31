<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeKendaraan extends Model
{
    protected $table = 'tipe_kendaraan';

    protected $fillable = [
        'id_merk', 
        'tipe'
    ];
}
