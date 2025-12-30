<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller {
    
    public function login(Request $request) {
        $credential = $request->validate([
            'namaPegawai' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (Auth::guard('pegawai')->attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'namaPegawai' => 'Nama staff atau password salah!',
        ]);

        // Otentikasi Role admin 
        if (Auth::guard('pegawai')->user()->role !== 'admin') {
            Auth::guard('pegawai')->logout();

            return back()->withErrors([
                'namaPegawai' => 'Anda bukan admin!',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
    
}

?>