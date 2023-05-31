<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoverPageContoller extends Controller
{
    public function getCoverPageForm(){
        return view('frontend.pages.cover_page.cover_page_form');
    }
}
