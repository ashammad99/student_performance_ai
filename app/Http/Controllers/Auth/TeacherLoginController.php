<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherLoginController extends Controller
{
    public function showLoginForm() {
        return view('auth.teacher-login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'user_number' => ['required'],
            'password' => 'required',
        ]);

        if (Auth::guard('teacher')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.teacher');
        }

        return back()->withErrors([
            'user_number' => 'بيانات الدخول غير صحيحة',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('teacher')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/teacher/login');
    }
}
