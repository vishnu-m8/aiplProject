<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QualityController extends Controller
{
    public function qualityShow() 
    {
        $qualityChecks_fetch = DB::table('quality_checks')
                              ->get();

        $qualityImage_fetch = DB::table('quality_image')
                             ->where('status', 1)
                             ->orderByDesc('id') 
                              ->get();

        $qualityDetails_fetch = DB::table('quality_details') 
                               ->get();

                         return view('frontend.quality',compact('qualityChecks_fetch','qualityImage_fetch','qualityDetails_fetch'));
    }
}
