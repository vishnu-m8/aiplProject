<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function facilityIndex() 
    {
        $facility_data = DB::table('facility')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.facility.facilityPage',compact('facility_data'));
    }
    public function facilityEdit($id)
    { 
        $data = DB::table('facility')
        ->where('id', $id)
        ->first();
        return view('admin.facility.Editfacility',compact('data',));
    }  
    public function facilityUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);

    $existingRecord = DB::table('facility')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        $data = DB::table('facility')->where('id', $id)->update([
            'description' => $request->description,
        ]);
        
            return redirect()->route('Facility_index')->with('status', 'Data updated successfully');
        }

   }
}
