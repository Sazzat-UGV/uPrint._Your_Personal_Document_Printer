<?php

namespace App\Http\Controllers\frontend\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function studentloginPage(){
        return view('frontend.pages.auth.login');
    }
}
