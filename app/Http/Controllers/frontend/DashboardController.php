<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $fileName = Auth::user()->id.'.pdf';
        // Update with the actual name of your PDF file
       $filePath = public_path('pdf/' . $fileName);
        if (file_exists($filePath)) {
            unlink($filePath);
            Session::forget('message');
        }
        $users=User::with('department:id,full_name','semester:id,semester_name')->where('id',Auth::user()->id)->select('id','name','email','phone','student_id','department_id','semester_id')->get();
        return view('frontend.pages.dashboard',compact('users'));
    }
}
