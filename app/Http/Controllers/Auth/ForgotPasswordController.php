<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Mail\PasswordResetCodeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetCode(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        // Generate 6 digit code
        $code = rand(100000, 999999);

        // Save to DB
        DB::table('password_reset_codes')->updateOrInsert(
            ['email' => $request->email],
            [
                'code' => $code,
                'created_at' => Carbon::now()
            ]
        );

        // Send Email
        Mail::to($request->email)->send(new PasswordResetCodeMail($code));

        return redirect()->route('password.verify.form', ['email' => $request->email])
            ->with('success', 'Kode verifikasi telah dikirim ke email Anda.');
    }

    public function showVerifyForm(Request $request)
    {
        $email = $request->email;
        return view('auth.passwords.verify', compact('email'));
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string',
        ]);

        $resetData = DB::table('password_reset_codes')
            ->where('email', $request->email)
            ->where('code', $request->code)
            ->first();

        if (!$resetData || Carbon::parse($resetData->created_at)->addMinutes(60)->isPast()) {
            return back()->withErrors(['code' => 'Kode verifikasi tidak valid atau sudah kadaluwarsa.']);
        }

        return redirect()->route('password.reset.form', ['email' => $request->email, 'code' => $request->code]);
    }

    public function showResetForm(Request $request)
    {
        $email = $request->email;
        $code = $request->code;
        return view('auth.passwords.reset', compact('email', 'code'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'code' => 'required|string',
            'password' => 'required|min:8|confirmed',
        ]);

        $resetData = DB::table('password_reset_codes')
            ->where('email', $request->email)
            ->where('code', $request->code)
            ->first();

        if (!$resetData || Carbon::parse($resetData->created_at)->addMinutes(60)->isPast()) {
            return redirect()->route('password.request')->withErrors(['email' => 'Sesi reset password tidak valid.']);
        }

        // Update password
        $user = User::where('email', $request->email)->first();
        $user->update(['password' => Hash::make($request->password)]);

        // Delete reset code
        DB::table('password_reset_codes')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Kata sandi berhasil diubah. Silakan login kembali.');
    }
}
