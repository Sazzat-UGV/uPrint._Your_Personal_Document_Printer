<?php

namespace App\Http\Controllers\backend;

use Image;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserImageUploadRequest;

class adminController extends Controller
{
    public function showProfile(){
        $data=User::select(['id','name','slug','phone','email'])->get();
        return view('backend.pages.account.myProfile',compact('data'));
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
