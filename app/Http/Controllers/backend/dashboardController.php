<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function dashboard()
    {
        $department=Department::count();
        $teacher=Teacher::count();
        $subject=Subject::count();
        $students=User::where('role_id',2)->count();
        return view('backend.pages.dashboard',compact(
            'department',
            'teacher',
            'subject',
            'students',
        ));
    }
}
