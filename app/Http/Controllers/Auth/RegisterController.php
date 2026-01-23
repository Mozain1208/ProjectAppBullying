<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Show the registration form
     */
    public function showRegistrationForm()
    {
        // Redirect if already logged in
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }

        return view('register');
    }

    /**
     * Handle registration request
     */
    public function register(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'age' => 'required|numeric|between:4,99',
        ], [
            'username.required' => 'Username harus diisi!',
            'username.unique' => 'Username sudah digunakan!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Format email tidak valid!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password minimal 6 karakter!',
            'password.confirmed' => 'Password dan konfirmasi password tidak cocok!',
            'age.required' => 'Umur harus diisi!',
            'age.numeric' => 'Umur harus berupa angka!',
            'age.between' => 'Umur harus antara 4 sampai 99 tahun!',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create new user using Eloquent
        try {
            User::create([
                'username' => $request->username,
                'nis' => uniqid('AUTO'), // Auto-generate NIS to satisfy DB constraint
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
                'age' => $request->age,
                'status' => 'active',
                'trust_score' => 100,
            ]);

            // Set success message and redirect to login
            return redirect()
                ->route('login')
                ->with('register_success', 'Registrasi berhasil! Silakan login dengan akun baru Anda.');

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Registration Error: ' . $e->getMessage());
            return back()
                ->withErrors(['register' => 'Registrasi gagal! ' . $e->getMessage()])
                ->withInput();
        }
    }
}
