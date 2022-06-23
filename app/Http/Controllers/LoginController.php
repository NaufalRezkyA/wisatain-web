<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   # authenticate
    public function authenticate(Request $request)
    {
        # validasi email dan password
        $credentials =  $request->validate([
            'email'=> 'required|email:dns',
            'password' => 'required'
        ]);

        # fungsi Auth email user dan password
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin-wisata');
        }

        # notifikasi gagal
        return back()->with('loginError','Login failed!!!');
    }

    # fungsi untuk logout
    public function logout(Request $request){
        # fungsi Auth logout akun user
        Auth::logout();
        
        $request->session()->invalidate();
        
        # regenerate Token
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
