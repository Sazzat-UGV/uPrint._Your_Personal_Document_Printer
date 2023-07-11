<?php

namespace App\Http\Controllers\frontend;


use Spatie\PdfToImage\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use TCPDF;


class DocumentController extends Controller
{
    public function DocumentPage()
    {
        return view('frontend.pages.document.document_upload');
    }


    public function CountColorAndBWPages(Request $request)
    {
      
    }
}
