<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\AuditLog;

class LoginController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        // Redirect if already logged in
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }

        return view('login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $loginIdentifier = $request->input('login');
        $password = $request->input('password');
        $remember = $request->has('remember');

        // Try to find user by username, NIS, or email using Eloquent
        $user = User::where('username', $loginIdentifier)
            ->orWhere('nis', $loginIdentifier)
            ->orWhere('email', $loginIdentifier)
            ->first();

        if (!$user) {
            return back()->withErrors(['login' => 'Akun tidak ditemukan!'])->withInput();
        }

        // Check if user is banned
        if ($user->isBanned()) {
            return back()->withErrors(['login' => 'Akun Anda telah diblokir. Silakan hubungi admin.'])->withInput();
        }

        // Verify password
        if (!Hash::check($password, $user->password)) {
            return back()->withErrors(['login' => 'Password salah!'])->withInput();
        }

        // Login the user
        Auth::login($user, $remember);

        // Audit Log for Login
        AuditLog::log('Login User', ['method' => 'web_portal'], $user->id);

        // Redirect based on role
        return $this->redirectBasedOnRole();
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        $userId = Auth::id();
        AuditLog::log('Logout User', [], $userId);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Redirect user based on their role
     */
    protected function redirectBasedOnRole()
    {
        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        
        return redirect()->route('dashboard');
    }
}
