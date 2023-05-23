<?php

namespace App\Http\Controllers\frontend\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function studentRegistrationPage()
    {
        return view('frontend.pages.auth.registration');
    }
}
