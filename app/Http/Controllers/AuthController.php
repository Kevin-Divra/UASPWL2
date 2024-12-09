<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman pilihan login (Admin atau User)
    public function showAdminLoginForm()
    {
        return view('auth.admin-login'); // Pastikan path file Blade sudah benar
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('products.index'); // Sesuaikan rutenya
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function showUserLoginForm()
    {
        return view('auth.user-login'); // Pastikan path file Blade sudah benar
    }

    public function userLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('user.home');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function showLoginChoice()
    {
        return view('auth.login-choice');
    }

    // Menampilkan form login untuk Admin
    // public function showAdminLoginForm()
    // {
    //     return view('auth.admin-login');
    // }

    // Menampilkan form login untuk User
    // public function showUserLoginForm()
    // {
    //     return view('auth.user-login');
    // }

    // Proses login Admin
    // public function adminLogin(Request $request)
    // {
    // $credentials = $request->validate([
    //     'email' => 'required|email',
    //     'password' => 'required',
    // ]);

    // Mengecek kredensial untuk login sebagai Admin
    // if (Auth::guard('admin')->attempt($credentials)) {
    //     // Jika login berhasil, arahkan admin ke halaman produk
    //     return redirect()->route('products.index'); // Mengarah ke resource 'products'
    // }

    // return back()->withErrors(['email' => 'Invalid credentials']);
    // }


    // Proses login User
    // public function userLogin(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    
    //     // Mengecek kredensial untuk login sebagai Admin
    //     if (Auth::guard('user')->attempt($credentials)) {
    //         // Jika login berhasil, arahkan user ke halaman user
    //         return redirect()->route('user.home'); // Mengarah ke resource 'user'
    //     }
    
    //     return back()->withErrors(['email' => 'Invalid credentials']);
    //     }
}
