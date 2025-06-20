<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('frontend.auth.login');
    }

    public function login_post(Request $request)
    {
        // valiadasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ],
    [
        'email.required' => 'Email tidak boleh kosong cuyyy!',
        'email.email' => 'Format email tidak valid cuyyy!',
        'password.required' => 'Password tidak boleh kosong cuyyy!',
        'password.min' => 'Password minimal 8 karakter cuyyy!',
        ]);
    }

    public function register_post(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ],
        [
            'name.required' => 'Nama tidak boleh kosong cuyyy!',
            'phone.required' => 'Nomor telepon tidak boleh kosong cuyyy!',
            'phone.numeric' => 'Nomor telepon harus berupa angka cuyyy!',
            'phone.unique' => 'Nomor telepon sudah terdaftar cuyyy!',
            'email.required' => 'Email tidak boleh kosong cuyyy!',
            'email.email' => 'Format email tidak valid cuyyy!',
            'email.unique' => 'Email sudah terdaftar cuyyy!',
            'password.required' => 'Password tidak boleh kosong cuyyy!',
            'password.min' => 'Password minimal 8 karakter cuyyy!',
            'password.confirmed' => 'Konfirmasi password tidak cocok cuyyy!',
        ]);
    }

    public function register()
    {
        return view('frontend.auth.register');
    }   
}
