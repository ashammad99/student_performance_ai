<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentLoginController extends Controller
{
    public function showLoginForm() {
        return view('auth.parent-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'user_number' => ['required'],
            'password' => 'required',
        ]);

        if (Auth::guard('parent')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.parent');
        }

        return back()->withErrors([
            'user_number' => 'بيانات الدخول غير صحيحة',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('parent')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/parent/login');
    }
}
