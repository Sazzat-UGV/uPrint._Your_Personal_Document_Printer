<?php

namespace App\Http\Controllers\backend;

use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectCreateRequest;
use App\Http\Requests\SubjectUpdateRequest;
use App\Models\Department;
use App\Models\Semester;
use Brian2694\Toastr\Facades\Toastr;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects=Subject::with('semester','department')->latest('id')->select('id','semester_id','department_id', 'slug','subject_name','subject_code','updated_at','is_active')->get();
        return view('backend.pages.subject.index',compact('subjects'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semesters=Semester::select('id','semester_name')->get();
        $departments=Department::where('is_active',1)->latest('id')->select('id','name')->get();
        return view('backend.pages.subject.create',compact('semesters','departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectCreateRequest $request)
    {
        Subject::create([
            'semester_id'=>$request->semester_id,
            'department_id'=>$request->department_id,
            'subject_name'=>$request->subject_name,
            'slug'=>Str::slug($request->subject_name),
            'subject_code'=>$request->subject_code,
        ]);
        Toastr::success('Subject Added Successfully!');
        return redirect()->route('subject.index');
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
        $subject=Subject::whereSlug($slug)->first();
        $departments=Department::where('is_active',1)->latest('id')->select('id','name')->get();
        $semesters=Semester::select('id','semester_name')->get();
        return view('backend.pages.subject.edit',compact('subject','semesters','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectUpdateRequest $request, string $slug)
    {
        $subject=Subject::whereSlug($slug)->first();
        $subject->update([
            'semester_id'=>$request->semester_id,
            'department_id'=>$request->department_id,
            'subject_name'=>$request->subject_name,
            'slug'=>Str::slug($request->subject_name),
            'subject_code'=>$request->subject_code,
            'is_active'=>$request->filled('is_active'),
        ]);
        Toastr::success('Subject Update Successfully!');
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $subject=Subject::whereSlug($slug)->first();
        $subject->delete();
        Toastr::success('Subject Delete Successfully!');
        return redirect()->route('subject.index');

    }
}
