<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class BranchAuthController extends Controller
{
    public function login(Request $request) {
        $credential = $request->validate([
            'nama' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (Auth::guard('branch')->attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'nama' => 'Nama Branch atau password salah!',
        ]);
        return redirect()->route('/');
    }
    
    public function logout(Request $request) {
        Auth::guard('branch')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
