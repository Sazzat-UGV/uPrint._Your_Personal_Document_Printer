<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homePage(){
        $info=GeneralSetting::select('about_us','our_policy')->get();
        return view('frontend.pages.home',compact('info'));
    }
}
