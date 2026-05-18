<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $messages = [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.string' => 'Password tidak valid.',
        ];

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ], $messages);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return Redirect::back()->withErrors(['login' => 'Email atau password tidak cocok.'])->withInput();
        }

        Session::put('user_id', $user->id);
        Session::put('user_role', $user->role);

        return match ($user->role) {
            'guru' => redirect()->route('teacher.dashboard')->with('success', 'Login berhasil. Selamat datang!'),
            default => redirect()->route('student.dashboard')->with('success', 'Login berhasil. Selamat datang!'),
        };
    }

    public function register(Request $request)
    {
        $messages = [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama tidak valid.',
            'name.max' => 'Nama maksimal 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.string' => 'Password tidak valid.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'role.required' => 'Peran wajib dipilih.',
            'role.in' => 'Peran tidak valid.',
        ];

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:guru,murid',
        ], $messages);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        Session::put('user_id', $user->id);
        Session::put('user_role', $user->role);

        return redirect()->route($user->role === 'guru' ? 'teacher.dashboard' : 'student.dashboard')
            ->with('success', 'Registrasi berhasil. Selamat datang!');
    }

    public function logout()
    {
        Session::flush();

        return redirect()->route('login');
    }
}
