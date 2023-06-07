<?php

namespace App\Http\Controllers\backend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use Brian2694\Toastr\Facades\Toastr;

class ContactUsController extends Controller
{
    public function Insert(ContactUsRequest $request)
    {
        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);
        Toastr::success('Your Message has been Sent Successfully!');
        return back();
    }


    public function Index()
    {
        $contacts=Contact::latest('id')->select('id','name','email','subject','message','created_at')->get();
        return view('backend.pages.contact.index',compact('contacts'));
    }


    public function Delete($id)
    {
        $contact=Contact::where('id',$id)->first();
        $contact->delete();

        Toastr::success('Contact Message has been Delete Successfully!');
        return back();
    }
}
