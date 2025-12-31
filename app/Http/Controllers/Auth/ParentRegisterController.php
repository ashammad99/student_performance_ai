<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Parnet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentRegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.parent-register'); // الفورم اللي عندك
    }

    public function register(Request $request)
    {
        $request->validate([
            'user_number' => 'required|unique:parents,user_number',
            'email' => 'required|email|unique:parents,email',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|string',
            'relation' => 'required|string',
        ]);


        Parnet::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'relation' => $request->relation,
        ]);

        return redirect()->route('parent.register')->with('success', 'تم إنشاء الحساب بنجاح!');
    }
}
