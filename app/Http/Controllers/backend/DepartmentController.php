<?php

namespace App\Http\Controllers\backend;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments=Department::latest('id')->select('id','name','slug','updated_at','is_active')->get();
        return view('backend.pages.department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentStoreRequest $request)
    {
        Department::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
        ]);
        Toastr::success('Department Added Successfully!');
        return redirect()->route('department.index');
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
        $department=Department::whereSlug($slug)->first();
        return view('backend.pages.department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentUpdateRequest $request, string $slug)
    {
        $department=Department::whereSlug($slug)->first();
        $department->update([
            'name'=>$request->name,
            'is_active'=>$request->filled('is_active'),
        ]);

        Toastr::success('Department Update Successfully!');
        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $department=Department::whereSlug($slug)->first();
        $department->delete();

        Toastr::success('Department Delete Successfully!');
        return back();
    }

}

