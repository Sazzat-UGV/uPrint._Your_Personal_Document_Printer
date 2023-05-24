<?php

namespace App\Http\Controllers\frontend\auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRegistrationRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function studentRegistrationPage()
    {
        return view('frontend.pages.auth.registration');
    }

    public function studentRegistration(StudentRegistrationRequest $request)
    {
        $student=User::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'student_id'=>$request->student_Id,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
        ]);

        Toastr::success('Your Registration Successfully Completed!');
        return redirect()->route('student.LoginPage');
    }
}
