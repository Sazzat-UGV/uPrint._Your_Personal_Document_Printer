<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Semester;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CoverPageDataRequest;
use PDF;

class CoverPageController extends Controller
{
    public function getCoverPageForm(){
        $deparments=Department::where('is_active',1)->latest('id')->select('id','full_name')->get();
        $semesters=Semester::select('id','semester_name')->get();
        $teachers=Teacher::where('is_active',1)->select('id','teacher_name')->get();
        return view('frontend.pages.cover_page.cover_page_form',compact('deparments','semesters','teachers'));
    }



    public function loadSubjectAjax($semester_name, Request $request)
    {
        $department_name = $request->query('department_name');
        $subjects = Subject::where('department_id',$department_name)->where('semester_id', $semester_name)->where('is_active',1)->select('id','subject_name')->get();
        return response()->json($subjects, 200);
    }



    public function PrintCoverPage(CoverPageDataRequest $request){

        $teachers=Teacher::with('department:id,full_name')->where('id',$request->teacher_name)->select('id','teacher_name','department_id','teacher_designation')->get();
        $assignment_topic=$request->assignment_topics;
        $subjects=Subject::where('id',$request->subject_name)->select('id','subject_name','subject_code')->get();
        $student_semester=Semester::where('id',$request->semester_name)->select('id','semester_name')->get();
        $submission_date=$request->submission_date;
        $newDate = date("d-m-Y", strtotime($submission_date));
        $student_details=User::with('department:id,full_name')->where('id',Auth::user()->id)->select('id','name','department_id','student_id')->get();
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
}
