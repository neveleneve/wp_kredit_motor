<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kredit extends Model
{
    protected $table = 'kredit';

    protected $fillable = [
        'pinjaman', 
        'tenor', 
        'angsuran'
    ];
}
