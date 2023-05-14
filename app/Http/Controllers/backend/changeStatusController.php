<?php

namespace App\Http\Controllers\backend;

use App\Models\Department;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class changeStatusController extends Controller
{
    
    /*Change Department Status*/
    public function activeDepartment($slug, $status)
    {
        $department = Department::whereSlug($slug)->select('id', 'is_active')->first();
        if ($status == 1) {
            $department->update([
                'is_active' => 0
            ]);
            Toastr::success('Department Deactivated Successfully!');
            return back();
        }
        elseif ($status == 0) {
            $department->update([
                'is_active' => 1
            ]);
            Toastr::success('Department Activated Successfully!');
            return back();
        };


    }
}
