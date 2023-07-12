<?php

namespace App\Http\Controllers\frontend;


use TCPDF;
use Spatie\PdfToImage\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class DocumentController extends Controller
{
    public function DocumentPage()
    {$fileName = Auth::user()->id.'.pdf';
        // Update with the actual name of your PDF file
       $filePath = public_path('pdf/' . $fileName);
        if (file_exists($filePath)) {
            unlink($filePath);
            Session::forget('message');
        }
        return view('frontend.pages.document.document_upload');
    }


    public function CountColorAndBWPages(Request $request)
    {
        $fileName = Auth::user()->id.'.pdf';
        // Update with the actual name of your PDF file
       $filePath = public_path('pdf/' . $fileName);
        if (file_exists($filePath)) {
            unlink($filePath);
            Session::forget('message');
        }
    }
}
