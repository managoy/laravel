<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactForm;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create(){
        return view('contact.create');
    }

    public function store(StoreContactForm $request){

//        $data = $request->validated();
        $data = $request->data();

        // Send An Email
        Mail::to('test@test.com')->send(new ContactFormMail($data));

        return redirect('contact')->with('message','Thanks for your message. We \'ll be in touch.');

    }
}
