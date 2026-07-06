<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\OtpMail;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.sign-in');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.sign-in');
    }

    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);
        
        $otp = rand(100000, 999999);
        
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            ['token' => Hash::make($otp), 'created_at' => now()]
        );
        
        Mail::to($request->email)->send(new OtpMail($otp));
        
        $request->session()->put('reset_email', $request->email);
        
        return redirect()->route('auth.otp-verification');
    }

    public function showOtpVerification()
    {
        if (!session('reset_email')) {
            return redirect()->route('auth.forgot-password');
        }
        return view('auth.otp-verification', ['email' => session('reset_email')]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|numeric|digits:6']);
        $email = session('reset_email');
        
        if (!$email) {
            return redirect()->route('auth.forgot-password');
        }

        $record = DB::table('password_reset_tokens')->where('email', $email)->first();

        if (!$record || !Hash::check($request->otp, $record->token)) {
            return back()->withErrors(['otp' => 'Invalid OTP']);
        }

        if (now()->diffInMinutes($record->created_at) > 10) {
            return back()->withErrors(['otp' => 'OTP has expired']);
        }

        $request->session()->put('otp_verified', true);
        return redirect()->route('auth.reset-password');
    }

    public function showResetPassword()
    {
        if (!session('otp_verified')) {
            return redirect()->route('auth.forgot-password');
        }
        return view('auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $email = session('reset_email');
        
        if (!$email || !session('otp_verified')) {
            return redirect()->route('auth.forgot-password');
        }

        User::where('email', $email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_reset_tokens')->where('email', $email)->delete();
        
        $request->session()->forget(['reset_email', 'otp_verified']);
        
        return redirect()->route('auth.sign-in')->with('success', 'Password reset successfully. You can now login.');
    }
}
