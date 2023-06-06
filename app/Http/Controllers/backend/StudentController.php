<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        $students=User::with('department')->where('role_id',2)->where('is_system_admin',0)->select('id','name','student_id','user_image','created_at','department_id')->get();

        return view('backend.pages.student.index',compact('students'));
    }



    public function student_details($student_id){
        $students=User::where('student_id',$student_id)->with('department','semester')->get();
        return view('backend.pages.student.full_profile',compact('students'));
    }



}
