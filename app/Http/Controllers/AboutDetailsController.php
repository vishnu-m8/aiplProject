<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutDetailsController extends Controller
{
    public function aboutDetailsIndex() 
    {
        $aboutDetailsData = DB::table('about_details')
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('admin.aboutDetails.aboutDetailsPage',compact('aboutDetailsData'));
    }
    public function aboutDetailEdit($id)
    { 
        $data = DB::table('about_details')
        ->where('id', $id)
        ->first();
        return view('admin.aboutDetails.EditaboutDetails',compact('data',));
    }  
    public function aboutDetailUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);

    $existingRecord = DB::table('about_details')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        $data = DB::table('about_details')->where('id', $id)->update([
            'description' => $request->description,
        ]);
        
            return redirect()->route('aboutDetail_index')->with('status', 'Data updated successfully');
        }

   }

}
