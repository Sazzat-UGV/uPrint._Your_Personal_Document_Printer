<?php

namespace App\Http\Controllers\frontend\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function studentloginPage(){
        return view('frontend.pages.auth.login');
    }

    public function studentlogin(Request $request)
    {
        $validated=$request->validate([
            'student_id'=>'required|numeric|digits_between:4,12',
            'password'=>'required|string|min:6'
        ]);

        $credentials=[
            'student_id'=>$request->student_id,
            'password'=>$request->password,
        ];

        if(Auth::attempt($credentials, $request->filled('remember'))){
            $request->session()->regenerate();
            return redirect()->route('student.dashboard');
        }
        return back()->withErrors([
            'student_id'=>'Wrong Credentials found!'
        ])->onlyInput('student_id');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('student.LoginPage');
    }
}
