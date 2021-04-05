<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function loggingin(Request $data)
    {
        $datalogin = Login::where('username', $data->username)->get();
        if (count($datalogin) <= 0) {
            // Username tidak ditemukan
            return redirect(route('login'))
                ->with('infousername', 'Nama pengguna tidak ditemukan')
                ->with('color', 'danger');
        } else {
            // Username ditemukan
            if (Hash::check($data->password, $datalogin[0]['password'])) {
                // Berhasil login
                if ($datalogin[0]['level'] == 0) {
                    Session::remove('pengajuan');
                    Session::put('pengajuanx', 'fade');
                    Session::put('pengajuanall', 'active');
                    Session::put('pengajuanallx', 'active');
                    Auth::guard('cs')->LoginUsingId($datalogin[0]['id']);
                    return redirect(route('csdashboard'));
                } elseif ($datalogin[0]['level'] == 1) {
                    Auth::guard('marketing')->LoginUsingId($datalogin[0]['id']);
                    return redirect(route('dashboard'));
                }
            } else {
                // Password Salah
                return redirect(route('login'))
                    ->with('infousername', 'Password salah')
                    ->with('color', 'danger');
            }
        }
    }

    public function logout()
    {
        if (Auth::guard('marketing')->check()) {
            Auth::guard('marketing')->logout();
        } elseif (Auth::guard('cs')->check()) {
            Auth::guard('cs')->logout();
            Session::remove('pengajuan');
            Session::remove('pengajuanx');
            Session::remove('pengajuanall');
            Session::remove('pengajuanallx');
        }
        return redirect('/');
    }
}
