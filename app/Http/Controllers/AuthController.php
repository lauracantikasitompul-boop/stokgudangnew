<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Ambil input
        $username = $request->email; // kita pakai name="email" di form, tapi ini untuk username
        $password = $request->password;

        // Validasi Dummy (Hanya izinkan admin tertentu)
        if (($username == "admin" || $username == "admin@gmail.com") && $password == "123") {
            // Login sukses, arahkan ke dashboard
            return redirect()->route('dashboard');
        } else {
            // Login gagal, kembalikan ke halaman login dengan pesan error
            return back()->with('error', 'Username atau password salah!');
        }
    }
}