<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\PagePrice;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homePage(){
        $info=GeneralSetting::select('id','about_us','our_policy')->get();
        $price=PagePrice::where('show_on_hompage',1)->select('id','paper_type','paper_price')->get();
        return view('frontend.pages.home',compact('info','price'));
    }
}
