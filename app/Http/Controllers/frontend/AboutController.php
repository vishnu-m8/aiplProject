<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutShow() 
    {
        $aboutData_fetch = DB::table('about_info')
                        ->where('status', 1)
                        ->orderByDesc('id') 
                        ->get();

        $values_fetch = DB::table('our_values')
                        ->get();

        $valuesDetails_fetch = DB::table('our_values_details')
                            ->where('status', 1)
                             ->orderByDesc('id') 
                             ->get();

        $team_fetch = DB::table('team')
                             ->where('status', 1)
                              ->orderByDesc('id') 
                              ->get();

        $history_fetch = DB::table('history')
                              ->where('status', 1)
                               ->orderByDesc('id') 
                               ->get();

        $aboutDetails_fetch = DB::table('about_details')
                               ->get();

        $about_vision_fetch = DB::table('about_vision')
                               ->get();

        $about_mission_fetch = DB::table('about_mission')
                               ->get();

                return view('frontend.about',compact('aboutData_fetch','values_fetch','valuesDetails_fetch',
                'team_fetch','history_fetch','aboutDetails_fetch','about_mission_fetch','about_vision_fetch'));
    }
    
}
