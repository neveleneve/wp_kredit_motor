<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KreditController extends Controller
{
    public function index()
    {
        return view('cekkreditur');
    }
}
