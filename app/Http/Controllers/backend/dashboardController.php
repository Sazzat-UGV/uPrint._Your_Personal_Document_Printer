<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function dashboard()
    {
        $department=Department::count();
        $teacher=Teacher::count();
        return view('backend.pages.dashboard',compact(
            'department',
            'teacher',
        ));
    }
}
