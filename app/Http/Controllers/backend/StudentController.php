<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students=User::with('department:id,name')->where('role_id',2)->where('is_system_admin',0)->select('id','name','student_id','user_image','created_at','department_id')->get();
        return view('backend.pages.student.index',compact('students'));
    }



    public function student_details($student_id){
        $students=User::where('student_id',$student_id)->with('department:id,full_name','semester:id,semester_name')->select('id','role_id','name','email','phone','balance','student_id','user_image','semester_id','department_id')->get();
        return view('backend.pages.student.full_profile',compact('students'));
    }


    public function passwordResetPage($student_id)
    {
        $students=User::where('student_id',$student_id)->first();
        return view('backend.pages.student.reset_password',compact('students'));
    }


    public function passwordReset(Request $request, $student_id)
    {
        $validation=$request->validate([
            'reset_password'=>'required|string|min:8',
        ]);

        $student=User::where('student_id',$student_id)->first();
        $student->update([
            'password'=>Hash::make($request->reset_password),
        ]);

        Toastr::success('Password Updated Successfully!');
        return redirect()->route('admin.studentIndexPage');
    }


    public function DeleteStudent($student_id)
    {
        $student=User::where('student_id',$student_id)->first();
        $student->delete();

        Toastr::success('Student Delete Successfully!');
        return back();
    }




}
