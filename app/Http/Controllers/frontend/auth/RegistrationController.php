<?php

namespace App\Http\Controllers\frontend\auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRegistrationRequest;
use App\Models\Department;
use App\Models\Semester;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function studentRegistrationPage()
    {
        $semesters=Semester::select('id','semester_name')->get();
        $departments=Department::select('id','name')->latest('id')->get();
        return view('frontend.pages.auth.registration',compact('semesters','departments'));
    }

    public function studentRegistration(StudentRegistrationRequest $request)
    {
        $student=User::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'student_id'=>$request->student_Id,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
            'semester_id'=>$request->semester_name,
            'department_id'=>$request->department_name,
        ]);

        Toastr::success('Your Registration Successfully Completed!');
        return redirect()->route('student.LoginPage');
    }
}
