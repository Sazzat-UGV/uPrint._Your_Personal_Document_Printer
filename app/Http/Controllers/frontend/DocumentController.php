<?php

namespace App\Http\Controllers\frontend;


use TCPDF;
use App\Models\User;
use App\Models\PagePrice;
use Spatie\PdfToImage\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DocumentUploadRequest;
use App\Models\TotalPrintedUserDocument;
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


    public function uploadDocument(DocumentUploadRequest $request)
    {
        $fileName = Auth::user()->id.'.'.$request->file_upload->extension();
        $request->file_upload->move(public_path('uploads/student_document'), $fileName);


        $path = public_path('uploads/student_document/' . $fileName);
        if(file_exists($path)){
            $pdftext = file_get_contents($path);
        $totalPage = preg_match_all("/\/Page\W/", $pdftext, $dummy);
        // $page=PagePrice::where('paper_type','Color')->first();
        $page=PagePrice::where('paper_slug','educational-document')->first();

        $per_page_price=$page->paper_price;
        $finalPrice=$totalPage*$per_page_price;
        return view('frontend.pages.document.index',compact('finalPrice'));
        }

    }


    public function processPrice($totalprice)
{
    $user=User::whereId(Auth::user()->id)->first();
    $totalprice=$totalprice;
    $account_balance=$user->balance;
    if($totalprice<=$account_balance){
        $new_balance = $account_balance - $totalprice;
        $user->update([
            'balance' => $new_balance,
        ]);

        TotalPrintedUserDocument::create([
            'user_id'=>Auth::user()->id,
            'printed_balance'=>$totalprice,
        ]);
        return response()->json($totalprice, 200);
    }

}

}
