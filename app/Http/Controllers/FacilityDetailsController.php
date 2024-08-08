<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FacilityDetailsController extends Controller
{
    public function facilityDetailsIndex() 
    {
        $facilitydetails = DB::table('facility_details')
                        ->orderBy('id', 'DESC')
                        ->get();
        return view('admin.facilityDetails.facilityDetailsPage',compact('facilitydetails'));
    }
    public function facilityDetailsAdd() 
    {
        return view('admin.facilityDetails.Addfacilitydetails');
    }

    public function facilityDetailsStore(Request $request)
    {
    $request->validate([
        'image' => 'required|mimes:jpeg,jpg,png',
        'title' => 'required', 
    ]);
     
        $image = '';
     if ($file = $request->file('image')) {
        $about_image_name = rand(100,999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/facilityDetails/icon/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
        }
    
        $data = DB::table('facility_details')->insert([
            'image' => $image,
            'title' => $request->title,
        ]);

        if ($data) {
            return redirect()->route('facilityDetails_index')->with('status', 'Data inserted successfully');
        }     
    }

    public function facilityDetailsEdit($id)
    { 
        $data = DB::table('facility_details')
        ->where('id', $id)
        ->first();
        return view('admin.facilityDetails.Editfacilitydetails',compact('data'));
    }  

    public function facilityDetailsUpdate(Request $request, $id)
    {

    $request->validate([
        'image' => 'nullable|mimes:jpeg,jpg,png',
        'title' => 'required', 
    ]);

    $image = '';

    if ($file = $request->file('image')) {
        $about_image_name = rand(100, 999);
        $ext = strtolower($file->getClientOriginalExtension());
        $about_image_full = $about_image_name . '.' . $ext;
        $upload = 'public/facilityDetails/icon/';
        $image_url = $upload . $about_image_full;
        $file->move($upload, $about_image_full);
        $image = $about_image_full;
    }

    
    $existingRecord = DB::table('facility_details')
    ->where('id', $id)
    ->first();


    if ($existingRecord) {
        $data = DB::table('facility_details')->where('id', $id)->update([
            'image' => $image ? $image : $existingRecord->image,
            'title' => $request->title,
        ]);

            return redirect()->route('facilityDetails_index')->with('status', 'Data updated successfully');
         }
    }
   public function facilityDetailsDestory($id)
   {
     $existingRecord = DB::table('facility_details')
     ->where('id', $id)
     ->first();
 
     if ($existingRecord) {
         DB::table('facility_details')
         ->where('id', $id)
         ->delete();
 
         return redirect()->route('facilityDetails_index')->with('status', 'Data deleted successfully');
       }
    }

    public function facilityDetailsActionUpdate($userId)
   {
    $user = DB::table('facility_details')
    ->where('id', $userId)
    ->first();

    if ($user) {
        // Toggle the status
        $newStatus = !$user->status;

        DB::table('facility_details')
        ->where('id', $userId)
        ->update(['status' => $newStatus]);
    }

    return back();
 }
}
