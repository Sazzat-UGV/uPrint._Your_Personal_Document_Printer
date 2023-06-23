<?php

namespace App\Http\Controllers\backend;

use App\Models\Semester;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\SemesterStoreRequest;
use App\Http\Requests\SemesterUpdateRequest;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semesters=Semester::select('id','semester_name','slug','created_at')->get();
        return view('backend.pages.semester.index',compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.semester.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SemesterStoreRequest $request)
    {
        Semester::create([
            'semester_name'=>$request->semester_name,
            'slug'=>Str::slug($request->semester_name),
        ]);
        Toastr::success('Semester Added Successfully!');
        return redirect()->route('semester.index');
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
        $semester=Semester::whereSlug($slug)->first();
        return view('backend.pages.semester.edit',compact('semester'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SemesterUpdateRequest $request, string $slug)
    {
        $semester=Semester::whereSlug($slug)->first();
        $semester->update([
            'semester_name'=>$request->semester_name,
            'slug'=>Str::slug($request->semester_name),
        ]);
        Toastr::success('Semester Update Successfully!');
        return redirect()->route('semester.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $semester=Semester::whereSlug($slug)->first();
        $semester->delete();

        Toastr::success('Semester Delete Successfully!');
        return redirect()->route('semester.index');
    }
}
