<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryFormMail;

class InquiryController extends Controller
{
    public function sendinquiry(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_no' => $request->input('phone_no'),
            'message' => $request->input('message')
        ];

        Mail::to('vishnu@matrixbricks.com')->send(new InquiryFormMail($data));
        return view('frontend.thanku');
    }
}
