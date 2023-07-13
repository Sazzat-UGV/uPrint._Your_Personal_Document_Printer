<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Semester;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\TotalPrintedCoverPage;
use App\Models\TotalPrintedUserDocument;

class dashboardController extends Controller
{
    public function dashboard()
    {
        $department=Department::count();
        $teacher=Teacher::count();
        $subject=Subject::count();
        $semester=Semester::count();
        $students=User::where('role_id',2)->count();
        $print_cover_page=TotalPrintedCoverPage::count();
        $print_user_document=TotalPrintedUserDocument::count();
        $queries=Contact::count();
        return view('backend.pages.dashboard',compact(
            'department',
            'teacher',
            'subject',
            'students',
            'semester',
            'print_cover_page',
            'print_user_document',
            'queries'
        ));
    }
}
