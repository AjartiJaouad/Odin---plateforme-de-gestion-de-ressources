<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyOtpController extends Controller
{
    public function show()
    {
        return view('auth.verify-otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);
        $user = User::where('otp_code', $request->otp)->first();

        if (! $user) {
            return back()->withErrors(['otp' => 'Le code OTP est incorrect.']);
        }
        $user->update([
            'is_active' => true,

            'is_verified' => true,
            'otp_code' => null,
        ]);
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Votre compte a été activé !');
    }
}
