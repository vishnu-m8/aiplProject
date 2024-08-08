<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class froManufacturingController extends Controller
{
    public function productsShow() 
    {
            $product_details_fetch = DB::table('product_details')
                            ->where('status', 1)
                            ->orderByDesc('id') 
                            ->get();

            $product_fetch = DB::table('products')
                            ->where('status', 1)
                            ->orderByDesc('id') 
                            ->get();

                   return view('frontend.products',compact('product_details_fetch','product_fetch'));
    }
    
    public function product_details($slug) 
    {
        $product_slug = $slug;
        
        $fetch_product_details  = DB::table('products')
                                ->where('slug', $product_slug)
                                ->first();

        return view('frontend.product-details',compact('fetch_product_details'));
    }


    public function manufacturing_details()
    {
        $manufacturingData = DB::table('manufacturing')
                            ->get();

        $strenthData = DB::table('our_strength')
                            ->where('status', 1) 
                            ->orderByDesc('id') 
                            ->get();

        $facilityData = DB::table('facility')
                            ->get();

        $facilitydetailsData = DB::table('facility_details')
                             ->where('status', 1) 
                             ->orderByDesc('id')
                            ->get();

        $italyState = DB::table('italy_state')
                             ->where('status', 1) 
                             ->orderByDesc('id')
                            ->get();

        $indiaState = DB::table('india_state')
                             ->where('status', 1) 
                             ->orderByDesc('id')
                            ->get();

        $chinaState = DB::table('china_state')
                             ->where('status', 1) 
                             ->orderByDesc('id')
                            ->get();

        $usaState = DB::table('usa_state')
                             ->where('status', 1) 
                             ->orderByDesc('id')
                            ->get();

        $canadaState = DB::table('canada_state')
                            ->where('status', 1) 
                            ->orderByDesc('id')
                           ->get();

        $locationDetails = DB::table('location_details')
                           ->get();

        $designData = DB::table('design_systems')
                           ->get();

        $designDetailsData = DB::table('design_details')
                            ->where('status', 1) 
                            ->orderByDesc('id')
                           ->get();

        $expertDesign = DB::table('expert_design')
                           ->get();

        $workingProcess = DB::table('working_process')
                           ->get();

        $logisticalData = DB::table('logistical_details') 
                         ->get();

        $production_fetch = DB::table('production')
                            ->where('status', 1) 
                            ->orderByDesc('id')
                            ->get();

        $inhouseDetails_fetch = DB::table('inhouse_details')
                            ->get();

        $productionTitle_fetch = DB::table('production_title')
                               ->get();


        return view('frontend.manufacturing',compact('manufacturingData','strenthData','facilityData',
                    'facilitydetailsData','italyState','indiaState','chinaState','usaState','canadaState',
                    'locationDetails','designData','designDetailsData','expertDesign','workingProcess',
                    'logisticalData','production_fetch','inhouseDetails_fetch','productionTitle_fetch'));
    }

}
