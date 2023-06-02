<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoverPageDataRequest;
use App\Models\Department;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

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



    public function PrintCoverPage(CoverPageDataRequest $request){

        $teachers=Teacher::with('department')->where('id',$request->teacher_id)->select('id','teacher_name','department_id','teacher_designation')->get();
        $assignment_topic=$request->assignment_topics;
        $subjects=Subject::where('id',$request->subject_id)->select('id','subject_name','subject_code')->get();
        $student_semester=Semester::where('id',$request->semester_id)->select('id','semester_name')->get();
        $submission_date=$request->submission_date;
        $newDate = date("d-m-Y", strtotime($submission_date));
        $student_details=User::with('department')->where('id',Auth::user()->id)->select('id','name','department_id','student_id')->get();

        $pdf = PDF::loadView('frontend.pages.cover_page.cover_page_view',compact(
            'teachers',
            'student_details',
            'assignment_topic',
            'subjects',
            'student_semester',
            'newDate'
            ))->setPaper('a4', 'portrait');
        return $pdf->stream('info.pdf', array("Attachment" => 0));

    }


    public function FunctionName()
    {

    }


}
