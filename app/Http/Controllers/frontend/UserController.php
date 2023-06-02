<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function changePasswordPage(){
        return view('frontend.pages.user.changePassword');
    }


    public function changePassword(Request $request){
        $validation=$request->validate([
            'current_password'=>'required|string|min:8',
            'password'=>'required|string|min:8|confirmed'
        ]);
        $currentPasswordStatus=Hash::check($request->current_password, Auth::user()->password);

        if($currentPasswordStatus){
            User::findorFail(Auth::user()->id)->update([
                'password'=>Hash::make($request->password),
            ]);
            Toastr::success('Password Updated Successfully!');
            return redirect()->route('student.dashboard');
        }else{
            Toastr::error('Current Password does not match with old Password');
            return redirect()->route('student.changePasswordPage');
        }
    }
}

