<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.teacher-register'); // الفورم اللي عندك
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|string',
            'specialization' => 'required|string',
            'hire_date' => 'required|date',
        ]);

        Teacher::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'specialization' => $request->specialization,
            'hire_date' => $request->hire_date,
        ]);

        return redirect()->route('teacher.register')->with('success', 'تم إنشاء الحساب بنجاح!');
    }
}
