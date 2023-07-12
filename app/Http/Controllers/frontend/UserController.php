<?php

namespace App\Http\Controllers\frontend;

use Image;
use App\Models\User;
use App\Models\Semester;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentProfileImageRequest;
use App\Http\Requests\StudentProfileUpdateRequest;

class UserController extends Controller
{
    public function changePasswordPage(){
        $fileName = Auth::user()->id.'.pdf';
        // Update with the actual name of your PDF file
       $filePath = public_path('pdf/' . $fileName);
        if (file_exists($filePath)) {
            unlink($filePath);
            Session::forget('message');
        }
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


    public function UserProfilePage()
    {$fileName = Auth::user()->id.'.pdf';
        // Update with the actual name of your PDF file
       $filePath = public_path('pdf/' . $fileName);
        if (file_exists($filePath)) {
            unlink($filePath);
            Session::forget('message');
        }
        $users=User::with('department:id,full_name','semester:id,semester_name')->where('id',Auth::user()->id)->select('id','name','email','phone','student_id','department_id','semester_id')->get();
        return view('frontend.pages.user.profile',compact('users'));
    }


    public function changeImage(StudentProfileImageRequest $request, $id){
        $user=User::whereId($id)->first();
        $user->update([

        ]);
        $this->image_upload($request, $user->id);
        Toastr::success('Your profile image has been Updated');
        return redirect()->route('student.profile');
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
                Image::make($uploaded_photo)->resize(512,512)->save(base_path($new_photo_location),40);
                $check=$user->update([
                    'user_image'=>$new_photo_name,
                ]);
        }
    }


    public function profile_EditPage(){
        $fileName = Auth::user()->id.'.pdf';
        // Update with the actual name of your PDF file
       $filePath = public_path('pdf/' . $fileName);
        if (file_exists($filePath)) {
            unlink($filePath);
            Session::forget('message');
        }
        $user=User::where('id',Auth::user()->id)->select('id','name','email','phone','semester_id','department_id')->get();
        $semesters=Semester::select('id','semester_name')->get();
        $departments=Department::where('is_active',1)->latest('id')->select('id','full_name')->get();
        return view('frontend.pages.user.update_profile',compact('semesters','departments','user'));
    }


    public function profile_edit(StudentProfileUpdateRequest $request){
        $user=User::where('id',Auth::user()->id)->first();
        $user->update([
            "name" => $request->name,
            "slug" =>Str::slug($request->name),
            "email" => $request->email,
            "phone" => $request->phone,
            "semester_id" => $request->semester_name,
            "department_id" =>$request->department_name,
        ]);
        Toastr::success('Your profile has been Updated');
        return redirect()->route('student.profile');

    }
}

