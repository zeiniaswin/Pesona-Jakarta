<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * AuthController - login dan logout admin.
 * Author: Zeini Aswin Rangkuti | v1.0 | 08-11-2026
 */
class AuthController extends Controller
{
    /**
     * Deskripsi : Menampilkan form login (atau langsung ke dashboard jika sudah login admin).
     * I.S.      : pengguna membuka "/login".
     * F.S.      : view `auth.login` tampil / redirect ke dashboard.
     */
    public function showLogin()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.login');
    }

    /**
     * Deskripsi : Memproses login: validasi input, cek kredensial, cek role admin.
     * I.S.      : form login dikirim (email + password).
     * F.S.      : sukses -> session dibuat & masuk dashboard; gagal -> kembali dengan pesan error.
     */
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (!Auth::attempt($data)) {
            return back()->withErrors(['email' => 'Email atau password salah.'])->onlyInput('email');
        }

        // Hanya role admin yang boleh masuk panel
        if (Auth::user()->role !== 'admin') {
            Auth::logout();
            return back()->withErrors(['email' => 'Akun ini tidak memiliki akses admin.'])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    /**
     * Deskripsi : Mengakhiri sesi login admin.
     * I.S.      : admin sedang login.
     * F.S.      : session dihapus, pengguna diarahkan ke beranda.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}