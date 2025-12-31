<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.student-register'); // الفورم اللي عندك
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:students',
            'password' => 'required|min:6|confirmed', // حقل confirm_password لازم يكون بالفورم
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:male,female',
            'grade' => 'required|string',
        ]);

        Student::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'gender' => $request->gender,
            'grade' => $request->grade,
        ]);

        return redirect()->route('student.register')->with('success', 'تم إنشاء الحساب بنجاح!');
    }
}
