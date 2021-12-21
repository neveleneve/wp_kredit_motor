<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseKredit extends Model
{
    protected $table = 'base_kredit';
    protected $fillable = [
        'pinjaman'
    ];
}
