<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function locationIndex() 
    {
        $locationData = DB::table('location_details')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.location.locationPage',compact('locationData'));
    }
   

  

    public function locationEdit($id)
    { 
        $data = DB::table('location_details')
        ->where('id', $id)
        ->first();
        return view('admin.location.Editlocation',compact('data'));
    }  

    public function locationUpdate(Request $request, $id)
    {

        $request->validate([
            'location_detail' => 'required', 
            'location_url' => 'required',
        ]);

    $existingRecord = DB::table('location_details')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        $data = DB::table('location_details')->where('id', $id)->update([
            'location_detail' => $request->location_detail,
            'location_url' => $request->location_url,
        ]);

            return redirect()->route('Location_index')->with('status', 'Data updated successfully');
         }
    }
   
}
