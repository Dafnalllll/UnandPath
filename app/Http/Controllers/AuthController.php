<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('signup');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'redirect' => $user->role === 'admin' ? url('/admin') : url('/dashboard')
                ]);
            }

            return redirect($user->role === 'admin' ? '/admin' : '/dashboard');
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah.'
            ], 401);
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Role otomatis admin kalau email tertentu
        $role = $request->email === 'UnandPath23@gmail.com' ? 'admin' : 'user';


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
