<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function dashboard()
    {
        $department=Department::count();
        return view('backend.pages.dashboard',compact(
            'department',
        ));
    }
}
