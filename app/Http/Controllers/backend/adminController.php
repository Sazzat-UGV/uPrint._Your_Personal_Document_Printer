<?php

namespace App\Http\Controllers\backend;

use Image;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserImageUploadRequest;

class adminController extends Controller
{
    public function showProfile(){
        $data=User::where('role_id',1)->select(['id','name','slug','phone','email'])->get();
        return view('backend.pages.admin.adminProfile',compact('data'));
    }

    public function saveImage(UserImageUploadRequest $request , $slug){
        $user=User::whereslug($slug)->first();
        $user->update([

        ]);
        $this->image_upload($request, $user->id);
        Toastr::success('Your profile image has been Updated');
        return redirect()->route('admin.profile');
    }


    public function updateUser(UserUpdateRequest $request, $slug){
        $userUpdate=User::whereslug($slug)->first();
        $userUpdate->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'email'=>$request->email,
            'phone'=>$request->phoneNumber,
        ]);
        Toastr::success('Your profile has been Updated');
        return redirect()->route('admin.profile');

    }


    public function changePasswordPage(){
        return view('backend.pages.admin.changePassword');
    }


    public function changePassword(Request $request){
        $validation=$request->validate([
            'current_password'=>'required|string|min:8',
            'password'=>'required|string|min:8|confirmed'
        ]);
        $currentPasswordStatus=Hash::check($request->current_password, auth()->user()->password);

        if($currentPasswordStatus){
            User::findorFail(Auth::user()->id)->update([
                'password'=>Hash::make($request->password),
            ]);
            // return redirect()->route('admin.dashboard');
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Toastr::success('Password Updated Successfully!');
            return redirect()->route('admin.loginPage');

        }else{
            Toastr::error('Current Password does not match with old Password');
            return redirect()->route('admin.changePassPage');
        }



    }


    public function image_upload($request, $user_id){
        $user=User::findorFail($user_id);

        if($request->hasFile('user_image')){
            if($user->user_image != 'default_user.jpg'){
                //delete old photo
                $photo_location='public/uploads/user/';
                $old_photo_location=$photo_location .$user->user_image;
                unlink(base_path($old_photo_location));

            }
                $photo_loation='public/uploads/user/';
                $uploaded_photo=$request->file('user_image');
                $new_photo_name=$user->id .'.'.$uploaded_photo->getClientOriginalExtension();
                $new_photo_location= $photo_loation. $new_photo_name;
                Image::make($uploaded_photo)->resize(200,200)->save(base_path($new_photo_location),40);
                $check=$user->update([
                    'user_image'=>$new_photo_name,
                ]);

        }
    }
}
