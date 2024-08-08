<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function clientShow() 
    {

        $clientsImage_fetch = DB::table('clients_image')
                              ->where('status', 1)
                              ->orderByDesc('id') 
                               ->get();

        $clientsDetails_fetch = DB::table('clients_details')
                               ->get();

        $clientsRegion_fetch = DB::table('clients_region')
                                ->get();

        $clientsRegionSecond = DB::table('clients_region_second')                         
                                ->get();

        $clientsMap_fetch = DB::table('clients_map')
                                
                                 ->get();

                     return view('frontend.clients',compact('clientsImage_fetch','clientsDetails_fetch','clientsRegion_fetch','clientsRegionSecond','clientsMap_fetch'));
    }
}
