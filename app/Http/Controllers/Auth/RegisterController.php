<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\EmailVerificationMail;
use Carbon\Carbon;

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
            'email' => 'required|email:rfc,dns|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'age' => 'required|numeric|between:4,99',
        ], [
            'username.required' => 'Username harus diisi!',
            'username.unique' => 'Username sudah digunakan!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Isi email dengan benar !',
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

        // Create new user using Eloquent (unverified)
        try {
            DB::beginTransaction();

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
                'age' => $request->age,
                'account_status' => 'pending', // Mark as pending
                'trust_score' => 100,
            ]);

            // Generate OTP
            $code = rand(100000, 999999);
            
            DB::table('email_verification_codes')->updateOrInsert(
                ['email' => $request->email],
                [
                    'code' => $code,
                    'created_at' => Carbon::now()
                ]
            );

            // Send Email
            Mail::to($request->email)->send(new EmailVerificationMail($code));

            DB::commit();

            return redirect()->route('verification.notice', ['email' => $request->email])
                ->with('success', 'Registrasi hampir selesai! Kode verifikasi telah dikirim ke email Anda.');

        } catch (\Exception $e) {
            DB::rollBack();
            \Illuminate\Support\Facades\Log::error('Registration Error: ' . $e->getMessage());
            return back()
                ->withErrors(['register' => 'Registrasi gagal! ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function showVerifyForm(Request $request)
    {
        $email = $request->email;
        if (!$email) return redirect()->route('register');
        return view('auth.verify_email', compact('email'));
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'code' => 'required|string',
        ]);

        $verification = DB::table('email_verification_codes')
            ->where('email', $request->email)
            ->where('code', $request->code)
            ->first();

        if (!$verification || Carbon::parse($verification->created_at)->addMinutes(30)->isPast()) {
            return back()->withErrors(['code' => 'Kode verifikasi tidak valid atau sudah kadaluwarsa.']);
        }

        // Update user status
        $user = User::where('email', $request->email)->first();
        $user->update([
            'account_status' => 'active',
            'email_verified_at' => Carbon::now()
        ]);

        // Delete code
        DB::table('email_verification_codes')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('register_success', 'Email berhasil diverifikasi! Silakan login untuk masuk ke dashboard.');
    }

    public function resendCode(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);
        
        $user = User::where('email', $request->email)->first();
        if ($user->account_status === 'active') {
            return redirect()->route('login')->with('info', 'Email ini sudah terverifikasi.');
        }

        $code = rand(100000, 999999);
        DB::table('email_verification_codes')->updateOrInsert(
            ['email' => $request->email],
            ['code' => $code, 'created_at' => Carbon::now()]
        );

        Mail::to($request->email)->send(new EmailVerificationMail($code));

        return back()->with('success', 'Kode verifikasi baru telah dikirim.');
    }
}
