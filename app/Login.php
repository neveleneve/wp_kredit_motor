<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'login';

    protected $fillable = [
        'nama',
        'username',
        'password',
        'level',
        'kontak',
    ];
}
