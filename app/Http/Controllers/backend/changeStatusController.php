<?php

namespace App\Http\Controllers\backend;

use App\Models\Department;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use Brian2694\Toastr\Facades\Toastr;

class changeStatusController extends Controller
{

    /*Change Department Status*/
    public function activeDepartment($department_id){
        $department=Department::find($department_id);
        if($department->is_active == 1){
            $department->is_active=0;
        }else{
            $department->is_active=1;
        }
        $department->update();
        return response()->json([
            'type' =>'success',
            'message' =>'Status Updated',
        ]);
    }

    /*Add Department Subject*/
    public function addDepartmentSubject($department_id){
        $department=Department::find($department_id);
        if($department->add_subject == 1){
            $department->add_subject=0;
        }else{
            $department->add_subject=1;
        }
        $department->update();
        return response()->json([
            'type' =>'success',
            'message' =>'Status Updated',
        ]);
    }


    /*Change Teacher Status*/
    public function activeTeacher($teacher_id){
        $teacher=Teacher::find($teacher_id);
        if($teacher->is_active == 1){
            $teacher->is_active=0;
        }else{
            $teacher->is_active=1;
        }
        $teacher->update();
        return response()->json([
            'type' =>'success',
            'message' =>'Status Updated',
        ]);
    }


    /*Change Subject Status*/
    public function activeSubject($subject_id){
        $subject=Subject::find($subject_id);
        if($subject->is_active == 1){
            $subject->is_active=0;
        }else{
            $subject->is_active=1;
        }
        $subject->update();
        return response()->json([
            'type' =>'success',
            'message' =>'Status Updated',
        ]);
    }
}
