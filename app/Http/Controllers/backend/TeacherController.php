<?php

namespace App\Http\Controllers\backend;

use App\Models\Teacher;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherCreateRequest;
use App\Http\Requests\TeacherUpdateRequest;
use Brian2694\Toastr\Facades\Toastr;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers=Teacher::with('department')->latest('id')->select('id','department_id','teacher_name','slug','teacher_designation','is_active')->get();
        return view('backend.pages.teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments=Department::where('is_active',1)->latest('id')->select('id','name')->get();
        return view('backend.pages.teacher.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherCreateRequest $request)
    {
        Teacher::create([
            'department_id'=>$request->department_id,
            'teacher_name'=>$request->Teacher_name,
            'slug'=>Str::slug($request->Teacher_name),
            'teacher_designation'=>$request->Teacher_designation,
        ]);

        Toastr::success('Teacher Added Successfully!');
        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $teacher=Teacher::whereSlug($slug)->first();
        $departments=Department::where('is_active',1)->latest('id')->select('id','name')->get();
        return view('backend.pages.teacher.edit',compact('teacher','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherUpdateRequest $request, string $slug)
    {
        $teacher=Teacher::whereSlug($slug)->first();
        $teacher->update([
            'department_id'=>$request->department_id,
            'teacher_name'=>$request->Teacher_name,
            'slug'=>Str::slug($request->Teacher_name),
            'teacher_designation'=>$request->Teacher_designation,
            'is_active'=>$request->filled('is_active'),
        ]);

        Toastr::success('Teacher Update Successfully!');
        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $teacher=Teacher::whereSlug($slug)->first();
        $teacher->delete();

        Toastr::success('Teacher Delete Successfully!');
        return redirect()->route('teacher.index');
    }
}
