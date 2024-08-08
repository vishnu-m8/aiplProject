<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactShow() 
    {
        $contactUs_fetch = DB::table('contact_us')
                                 ->get();
                         return view('frontend.contact',compact('contactUs_fetch'));
    }
}
