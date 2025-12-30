<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    public function login(Request $request) {
        $request->validate([
            'nama' => 'required|string',
            'password' => 'string',
            'login_as' =>'required|in:branch,pegawai',
        ]);

        // Admin 
        if ($request->login_as === 'pegawai') {
            if (Auth::guard('pegawai')->attempt([
                'namaPegawai' => $request->nama,
                'password' => $request->password
            ])) {
                $user =Auth::guard('pegawai')->user();
                if ($user-> role !== 'admin') {
                    Auth::guard('pegawai')->logout();

                    return back()->withErrors([
                        'nama' => 'Anda bukan Admin!',
                    ]);
                }

                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            }
            return back()->withErrors([
                'nama' => "Nama Admin atau password salah!"
            ]);
        }

        // Pegawai 
        if ($request->login_as === 'branch') {
            if (Auth::guard('branch')->attempt([
                'nama' => $request->nama,
                'password' => $request->password
            ])) {
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }
            return back()->withErrors([
                'nama' => "Nama Branch atau password salah!"
            ]);
        }
    }

    public function logout(Request $request) {
        Auth::guard('pegawai')->logout();
        Auth::guard('branch')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
?>