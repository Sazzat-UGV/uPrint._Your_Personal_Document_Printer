<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $users=User::with('department:id,full_name','semester:id,semester_name')->where('id',Auth::user()->id)->select('id','name','email','phone','student_id','department_id','semester_id')->get();
        return view('frontend.pages.dashboard',compact('users'));
    }
}
