<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns|exists:users,email',
            'password' => 'required|min:3|max:30'
        ], [
            'email.exists' => 'Email tidak ditemukan.',
            'email.required' => 'Harap mengisi kolom email.',
            'email.email' => 'Email tidak sesuai.',
            'password.required' => 'Harap mengisi kolom password.',
            'password.min' => 'Password minimal 3 karakter.',
            'password.max' => 'Password maksimal 30 karakter.'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->role_id === 1) {
                // jika user superadmin
                return redirect()->intended('/superadmin/home')->with('successLogin', 'Welcome to Sistem Informasi Manajemen Inventaris (SIMI)!');
            } else if(auth()->user()->role_id === 2) {
                // jika user pegawai
                return redirect()->intended('/admin/home');
            }
            
        }


        return back()->with('loginError', 'Password Salah!');

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
