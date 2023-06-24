<?php

namespace App\Http\Controllers\frontend;


use Spatie\PdfToImage\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class DocumentController extends Controller
{
    public function DocumentPage(){
        return view('frontend.pages.document.document_upload');
    }


    public function CountColorAndBWPages(Request $request)
    {
        // dd($request->all());
        $file = $request->file('pdfFile');

        // Save the PDF file to storage
        $pdfFilePath = $file->store('pdf_files');

        // Convert the PDF to images
        $pdf = new Pdf(storage_path('app/' . $pdfFilePath));
        $pdf->setOptions(['jpegopt' => '-quality 100']); // Set image quality
        $pdf->saveImage(storage_path('app/pdf_images'));

        // Count the color and black-and-white pages
        $colorPages = 0;
        $bwPages = 0;

        foreach ($pdf->getImages() as $imagePath) {
            $image = Image::make($imagePath);

            // Check if the image is black and white
            if ($image->width() > 0 && $image->height() > 0) {
                // Count logic...
            }
        }

        // Delete the temporary files
        Storage::delete([$pdfFilePath, 'pdf_images']);

        return response()->json([
            'colorPages' => $colorPages,
            'bwPages' => $bwPages,
        ]);
    }

}
