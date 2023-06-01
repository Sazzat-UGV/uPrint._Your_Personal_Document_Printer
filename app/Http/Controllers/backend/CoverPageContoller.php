<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CoverPageContoller extends Controller
{
    public function getCoverPageForm(){
        $deparments=Department::where('is_active',1)->latest('id')->select('id','full_name')->get();
        $semesters=Semester::select('id','semester_name')->get();
        $teachers=Teacher::where('is_active',1)->select('id','teacher_name')->get();
        return view('frontend.pages.cover_page.cover_page_form',compact('deparments','semesters','teachers'));
    }



    public function loadSubjectAjax($semester_id, Request $request)
    {
        $department_id = $request->query('department_id');
        $subjects = Subject::where('department_id',$department_id)->where('semester_id', $semester_id)->where('is_active',1)->select('id','subject_name')->get();
        return response()->json($subjects, 200);
    }



    public function PreviewCoverPage(Request $request){
        dd($request->all());
    }


}
