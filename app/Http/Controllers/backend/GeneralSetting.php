<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\GeneralSetting as ModelsGeneralSetting;

class GeneralSetting extends Controller
{
    public function settingPage(){
        $data=ModelsGeneralSetting::where('id',1)->select('id','about_us','our_policy')->first();
        return view('backend.pages.setting.general_setting',compact('data'));
    }

    public function getSettings(UpdateSettingRequest $request ,$id){
        $settings=ModelsGeneralSetting::where('id',$id)->first();
        $settings->update([
           'about_us'=>$request->about_us,
           'our_policy'=>$request->our_policy,
        ]);
        Toastr::success('Settings Updated!');
        return redirect()->route('admin.dashboard');
    }
}
