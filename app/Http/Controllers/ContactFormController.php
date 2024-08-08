<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactFormController extends Controller
{
    public function sendContactForm(Request $request)
    {
        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone_no' => $request->input('phone_no'),
            'location' => $request->input('location'),
            'subject' => $request->input('subject'),
            'comment' => $request->input('comment')
        ];

        DB::table('contactFrom')->insert($data);

        Mail::to('vishnu@matrixbricks.com')->send(new ContactFormMail($data));

        return view('frontend.thanku');
    }

    public function contactlisting()
    {
        $contactInfo = DB::table('contactFrom')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.contactFrom.contactListing',compact('contactInfo'));
    } 
}
