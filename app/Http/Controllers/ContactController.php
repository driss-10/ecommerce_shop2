<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;
use App\Mail\Address;
use App\Jobs\ContactUsJob;



class ContactController extends Controller
{
    public function Contact()
    {
        return view('Ecommerce.Contact');
    }

    public function send()
    {
        $data= request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:5',
            
        ]);
        Message::create($data);
        Mail::to('aliabdoamhil@gmail.com')->send(new ContactUs($data));
        $job = (new ContactUsJob($data));
        dispatch($job);
        return  redirect()->back()->with('success', "Thanks for your comments");

    }
}

