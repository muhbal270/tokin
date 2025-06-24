<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        // proses login
        $user = User::where('email', $request->email)->first();

        // cek email
        if (!$user) {
            toastr()->error('Email tidak terdaftar cuyyy!');
            return back()->withInput();
        }

        // cek password
        if (!Hash::check($request->password, $user->password)) {
            toastr()->error('Password salah cuyyy!');
            return back()->withInput();
        }

        // login user
        Auth::login($user);

        // cek peran dan redirect sesuai role
        if ($user->role === 'admin') {
            toastr()->success('Selamat datang admin cuyyy!');
            return redirect()->route('backend.dashboard');
        }

        // redirect ke halaman utama
        toastr()->success('Berhasil login cuyyy!');
        return redirect()->route('frontend.index');

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

        // proses registrasi
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            toastr()->success('Berhasil registrasi cuyyy! Silakan login.');
            return redirect()->route('login');
        } else {
            toastr()->error('Gagal registrasi cuyyy! Silakan coba lagi.');
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('frontend.auth.register');
    }   

    public function logout()
    {
        // proses logout
        Auth::logout(); // mengeluarkan user dari sesi login
        toastr()->success('Berhasil logout cuyyy!');
        return redirect()->route('frontend.auth.login');
    }
}
