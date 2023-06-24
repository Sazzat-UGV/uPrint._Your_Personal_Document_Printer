<?php

namespace App\Http\Controllers\backend;

use App\Models\PagePrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\PaperPageUpdateRequest;

class PagePriceController extends Controller
{
    public function IndexPage(){
        $pages=PagePrice::select('id','paper_type','paper_price','show_on_hompage','updated_at')->get();
        return view('backend.pages.price.index',compact('pages'));
    }


    public function EditPage($page_id){
        $page=PagePrice::find($page_id);
        return view('backend.pages.price.edit',compact('page'));
    }


    public function UpdatePrice(PaperPageUpdateRequest $request,$page_id){
        $page=PagePrice::find($page_id);
        $page->update([
            'paper_price'=>$request->page_price,
        ]);

        Toastr::success('Price Update Successfully!');
        return redirect()->route('admin.PagePriceIndex');
    }


    public function ActiveOrInactive($page_id){
        $page=PagePrice::find($page_id);
        if($page->show_on_hompage == 1){
            $page->show_on_hompage=0;
        }else{
            $page->show_on_hompage=1;
        }
        $page->update();
        return response()->json([
            'type' =>'success',
            'message' =>'Status Updated',
        ]);
    }
}
