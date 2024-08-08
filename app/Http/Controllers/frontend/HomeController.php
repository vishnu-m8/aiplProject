<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeShow() 
    {
        
        $alumaye_fetch = DB::table('home_alumaye')
                        ->orderByDesc('id') 
                         ->get();

        $homeProject_fetch = DB::table('projects')
                            ->where('home_status','1')
                            ->get();

        $clients_fetch = DB::table('clients_image')
                        ->where('status', 1)
                        ->orderByDesc('id') 
                        ->get();

        $banner_fetch = DB::table('home_banner')
                        ->orderByDesc('id') 
                        ->get();

        $bannerImage_fetch = DB::table('banner_image')
                          ->where('status', 1)
                          ->get();

        $leadership_fetch = DB::table('leadership')
                          ->get();

        $numberDetails_fetch = DB::table('number_details')
                          ->get();

        $numberDetailsData_fetch_1 = DB::table('number_details_data')
                          ->where('id', 1)
                          ->first();

        $numberDetailsData_fetch_2 = DB::table('number_details_data')
                          ->where('id', 4)
                          ->first();

        $numberDetailsData_fetch_3 = DB::table('number_details_data')
                          ->where('id', 5)
                          ->first();

        $product_fetch = DB::table('products')
                            ->where('status', 1)
                            ->get();

        $happyClient_fetch = DB::table('client_say')
                            ->where('status', 1)
                            ->get();

        $ourProject_fetch = DB::table('our_project')
                                 ->get();

        $homeIcon_fetch_1 = DB::table('home_icon')
                        ->where('id', 3)
                        ->first();

        $homeIcon_fetch_2 = DB::table('home_icon')
                        ->where('id', 2)                     
                        ->first();

        $homeIcon_fetch_3 = DB::table('home_icon')
                        ->where('id', 1)                   
                        ->first();

        $homeIcon_fetch_4 = DB::table('home_icon')
                        ->where('id', 6)                      
                        ->first();

        $fabricationimg_fetch = DB::table('fabrication_img')
                            ->where('status', 1)                      
                            ->get();

        $fabricationdata_fetch = DB::table('fabrication')
                                ->get();
                                
        //  $experience_fetch = DB::table('experience_company')
        //                         ->get();

         $experienceIcon1_fetch = DB::table('experience_logo')
                                ->where('id', 1) 
                                 ->get();

        $experienceIcon2_fetch = DB::table('experience_logo')
                                 ->where('id', 2) 
                                  ->get();

        $experienceIcon3_fetch = DB::table('experience_logo')
                                  ->where('id', 3) 
                                   ->get();
                            

                        return view('welcome',compact('homeProject_fetch','alumaye_fetch','clients_fetch',
                        'banner_fetch','leadership_fetch','numberDetails_fetch',
                        'homeIcon_fetch_1','homeIcon_fetch_2','homeIcon_fetch_3','homeIcon_fetch_4','ourProject_fetch',
                        'bannerImage_fetch','product_fetch','happyClient_fetch','numberDetailsData_fetch_1','numberDetailsData_fetch_2',
                        'numberDetailsData_fetch_3','fabricationimg_fetch','fabricationdata_fetch',
                        'experienceIcon1_fetch','experienceIcon2_fetch','experienceIcon3_fetch'));
    }
}
